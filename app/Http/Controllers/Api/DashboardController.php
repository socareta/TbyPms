<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Reservation;

class DashboardController extends Controller
{
	public function index(){
		return "dashboard";

	}

	public function  report(){
		return "report";
	}
	public function calender($ci,$co){
		
			$data=Reservation::leftJoin('rooms as r','r.id','reservations.room_id')
							->leftJoin('properties as p','p.id','r.property_id')
							->select('reservations.*','r.room_name','p.property_name')
							->whereIn('reservations.status',['confirmed','holding'])
							->where('check_out','>=',date('Y-m-d',strtotime($ci)))
							->where('check_in','<=',date('Y-m-d',strtotime($co)))
							->orderBy('r.room_name','ASC')
							->orderBy('p.property_name','ASC')
							->orderBy('reservations.room_id','ASC')
							->orderBy('reservations.check_in','ASC')
							->get();
			//create date
			//dd($data);
			/**/
			$date=$this->createDate($ci,30);
			
			$nData=array();
			$nData['header']=$date;
			$row=array();
			$tmpRoom="";
			$index=0;
			foreach ($data as $value) 
			{
					if($tmpRoom!=$value->room_name)
					{
						//cetak last kosong
						if($index!=0){
							for ($i=$index; $i <30 ; $i++) 
							{ 
								array_push($row, array('data'=>$date[$i]));
							}
						//pust to Ndata

							$nData['data'][] =array('header'=>array('head'=>$tmpRoom),'data'=>$row);
							//return to index to 0
							$index=0;
							$row=array();
							$tmpRoom=array();
						}
						
						///periksa index check in
						$newIndex=$this->cekIndex($value->check_in,$date);
						//jika chcek in di atas index
						if($newIndex!=null)
						{
							//cetak kosong
							for ($i=$index; $i < $newIndex; $i++) 
								{ 
									array_push($row, array('data'=>$date[$i]));
									$index+=1;
								}
							//push to  data 
							$lengthOfStay=$value->los;
							$lgth=$index+$lengthOfStay;//echo $lgth." ".$index."".$value->guest_name;
							if($lgth>30){
								$lengthOfStay=30-$index;

							}

							for ($i=0; $i <$lengthOfStay ; $i++) { 
								array_push($row,  array('data'=>$value));
							}
							
							$index+=$lengthOfStay;
							$tmpRoom=$value->room_name;	
						}
						//jika  index ci kurang dai 0 
						else
						{
							$newIndex=$this->cekIndex($value->check_out,$date);

							//push to  data 
							if($newIndex!=null){

								$lengthOfStay=$value->los-($value->los - $newIndex);
								for ($i=0; $i <$lengthOfStay ; $i++) 
								{ 
									array_push($row,  array('data'=>$value));
								}
								$index+=$lengthOfStay;
								$tmpRoom=$value->room_name;	
							}
							else{
								for ($i=0; $i <30 ; $i++) 
								{ 
									array_push($row,  array('data'=>$value));
								}
								$index=30;
								$tmpRoom=$value->room_name;	
							}
						}		
						
					}
					else
					{
						//cek index
						$newIndex=$this->cekIndex($value->check_in,$date);
							

							//cetak kosong
							for ($i=$index; $i <$newIndex; $i++) 
							{ 
								array_push($row, array('data'=>''));
								$index+=1;
							}
							$indexCo=$this->cekIndex($value->check_out,$date);

							if($indexCo!=null){
								$lengthOfStay=$value->los;
								for ($i=0; $i < $lengthOfStay; $i++) { 
									array_push($row,  array('data'=>$value));
								}
								$index+=$lengthOfStay;
								$tmpRoom=$value->room_name;
							}
							else
							{
								$lengthOfStay=30-$index;
								for ($i=0; $i < $lengthOfStay; $i++) { 
									array_push($row,  array('data'=>$value));
								}
								$index+=$lengthOfStay;
								$tmpRoom=$value->room_name;
							}
					}				
			}
			if($index!=0){
				for ($i=$index; $i <30 ; $i++) 
					{ 
						array_push($row, array('data'=>$date[$i]));
					}
					//pust to Ndata
					//dd($row);
				$nData['data'][]=array('header'=>array('head'=>$tmpRoom),'data'=>$row);
				//return to index to 0
				$index=0;
				$row=array();
				$tmpRoom=array();
			}
					               
			return response()->json($nData);
			
		

	}
	public function chart(){
		

	}
	private function createDate($date,$length){
		$tdate=array();
		for ($i=0; $i < $length; $i++) { 
			$nDate=date_create($date);
			date_add($nDate,date_interval_create_from_date_string($i."days"));
			array_push($tdate, date_format($nDate,"Y-m-d"));
		}
		return $tdate;
	}
	
	private function cekIndex($date,$arrDate){
		foreach ($arrDate as $key=>$value) {
			$nDate=date("Y-m-d",strtotime($date));
			if($nDate==$value){
				return $key;
			}
		}
		return null;
	}
}

