<?php
 class Frontdesk_model extends CI_Model
 {
 	function getReservation()
 	{
 		$this->db->select('a.*, b.name as roomsName,c.name as propertyName, d.name as sobName');
 		$this->db->from('reservation as a');
 		$this->db->where('status','confirmed');
 		$this->db->join('rooms as b','a.roomsId=b.roomsId','LEFT');
 		$this->db->join('property as c','c.propertyId=b.propertyId','LEFT');
 		$this->db->join('sob as d','a.sobId=d.sobId','LEFT');
 		$this->db->order_by('a.check_in','ASC');
 		$rs=$this->db->get();
 		return $rs;
 	}
 	function insertReservation($data)
 	{
 		$this->db->insert('reservation',$data);
 		return TRUE;
 	}
 	function updateRes($resId,$data)
 	{
 		$this->db->where('resId',$resId);
 		$this->db->update('reservation',$data);
 		return TRUE;
 	}
 	function deleteReservation($where)
 	{
 		$this->db->where($where);
 		$this->db->delete('reservation');
 		return TRUE;
 	}
 	function getRoomType()
 	{
 		$this->db->select('a.roomsId,concat(b.name,"  -  ", a.name) as roomsType');
 		$this->db->from('rooms as a');
 		$this->db->join('property as b','a.propertyId = b.propertyId','LEFT');
 		return $this->db->get();
 	}
 	function getSob()
 	{
 		return $this->db->get('sob');
 	}
 	function getFolio()
 	{
 		$this->db->select('a.*, b.name as roomsName,c.name as propertyName, d.name as sobName');
 		$this->db->from('reservation as a');
 		$this->db->where('status','registered');
 		$this->db->join('rooms as b','a.roomsId=b.roomsId','LEFT');
 		$this->db->join('property as c','c.propertyId=b.propertyId','LEFT');
 		$this->db->join('sob as d','a.sobId=d.sobId','LEFT');
 		$this->db->order_by('check_in','DESC');
 		$this->db->order_by('a.check_in','ASC');
 		$rs=$this->db->get();
 		return $rs;
 	}
 	function getCalender($m)
 	{
 		$y="2017";
 		$start=$y."-0".$m."-01";
 		$end=$y."-0".$m."-31";
 		$this->db->select('a.*,b.name as sob, c.name as roomsName,d.name as propertyName');
 		$this->db->from('reservation as a');
 		$this->db->where('check_in >=', $start);
 		$this->db->where('check_in <=', $end);
 		$this->db->where('status <>','canceled');
 		$this->db->join('sob as b','b.sobId=a.sobId','LEFT');
 		$this->db->join('rooms as c','a.roomsId=c.roomsId','LEFT');
 		$this->db->join('property as d','d.propertyId=c.propertyId', 'LEFT');
 		$this->db->order_by('a.check_in','ASC');
 		return $this->db->get();
 	}
 	function getRes_dashboard($type)
 	{
 		$m=date('m');
 		$m1=intval($m)+1;
 		$mL=intval($m)-1;
 		$mLast=intval($m)-1;
 		$start=date("y/").$m."/1";
 		$end=date("y/").$m."/31";
 		$startNext=date("y/").$m1."/1";
 		$endNext=date("y/").$m1."/31";
 		$startLast=date("y/").$mL."/1";
 		$endLast=date("y/").$mL."/31";
 		if($type==1)
 		{
 			$this->db->select('a.*, b.name as sobName');
 			$this->db->from("reservation as a ");
 			$this->db->join('sob as b','a.sobId=b.sobId','LEFT');
 			$this->db->where("a.check_in >=",$start);
 			$this->db->where("a.check_in <=",$end);
 			$this->db->where("a.status <>",'canceled');
			return $this->db->get();
 		}
 		elseif($type==2)
 		{
 			$this->db->select('a.*, b.name as sobName');
 			$this->db->from("reservation as a ");
 			$this->db->join('sob as b','a.sobId=b.sobId','LEFT');
 			$this->db->where("a.check_in >=",$startNext);
 			$this->db->where("a.check_in <=",$endNext);
 			$this->db->where("a.status <>",'canceled');
 			return $this->db->get();
 		}
 		elseif($type==3)
 		{
 			$this->db->select('a.*, b.name as sobName');
 			$this->db->from("reservation as a ");
 			$this->db->join('sob as b','a.sobId=b.sobId','LEFT');
 			$this->db->where("a.tanggal >=",$start);
 			$this->db->where("a.tanggal <=",$end);
 			$this->db->where("a.status <>",'canceled');
 			return $this->db->get();
 		}
 		elseif($type==4)
 		{
 			$this->db->select('a.*, b.name as sobName');
 			$this->db->from("reservation as a ");
 			$this->db->join('sob as b','a.sobId=b.sobId','LEFT');
 			$this->db->where("a.tanggal >=",$startLast);
 			$this->db->where("a.tanggal <=",$endLast);
 			$this->db->where("a.status <>",'canceled');
 			return $this->db->get();
 		}
 		elseif ($type==5) {
 			$query=$this->db->query(" (select 'Last', count(resId) as jum,sum( rate_idr) as rev, sum((rate_idr- rate_contract))as margin, sum(los) as los from reservation
				where status <>'canceled'
				and check_in between '$startLast' and '$endLast') union (select'This', count(resId) as jum,sum( rate_idr) as rev, sum((rate_idr- rate_contract))as margin, sum(los) as los from reservation
				where status <>'canceled'
				and check_in between '$start' and '$end') union(select'Next', count(resId) as jum,sum( rate_idr) as rev, sum((rate_idr- rate_contract))as margin, sum(los) as los from reservation
				where status <>'canceled'
				and check_in between '$startNext' and '$endNext')");
 			return $query;
 		}
 	}
 	function getChart($m)
 	{
 		$start=date("Y-").$m."-1";
 		$end=date("Y-").$m."-31";
 		$query=$this->db->query("select a.tanggal, a.resId, a.guest_name, a.roomsId, a.status, a.check_in, a.check_out, 
				a.rate_usd, a.rate_idr, a.rate_contract, a.country, a.sobId, a.los, a.email, a.remark,
				b.typeOfRoom, c.name as property,d.name as sob from (select * from reservation
				where check_in between '$start' and '$end' and status <>'canceled') a
				left join rooms b on a.roomsId = b.roomsId 
				left join property c on b.propertyId = c.propertyId 
				left join sob d on a.sobId = d.sobId");
 		return $query;
 	}
 }
?>