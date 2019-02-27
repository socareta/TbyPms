<?php 
 
class master extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('Master_model');
	}
 
	function index(){
		$data['sob'] = $this->Master_model->tampil_data()->result();
		$h=base_url();
		$dt=array('menu' =>'Master','homeUrl'=>$h,'logout'=>$h."login/logout");
		$this->load->view('template/header',$dt);$this->load->view('template/footer');
		$this->load->view('masterView',$data);

	}
	function property()
	{
		$data['property'] = $this->Master_model->tampil_dataProperty()->result();
		$h=base_url();
		$dt=array('menu' =>'Master','homeUrl'=>$h,'logout'=>$h."login/logout");
		$this->load->view('template/header',$dt);$this->load->view('template/footer');
		$this->load->view('masterViewProperty',$data);
	}

	function room()
	{
		$data['room'] = $this->Master_model->tampil_dataRoom()->result();
		$data['prty']=$this->Master_model->tampil_dataProperty()->result();
		$h=base_url();
		$dt=array('menu' =>'Master','homeUrl'=>$h,'logout'=>$h."login/logout");
		$this->load->view('template/header',$dt);$this->load->view('template/footer');
		$this->load->view('masterViewRoom',$data);
	}
	function saveSob(){
		$sobId=$this->input->post('id');
		$data['name']=$this->input->post('name');
		$data['url']=$this->input->post('url');
		$data['contact']=$this->input->post('contact');
		$data['email']=$this->input->post('email');
		$data['cs']=$this->input->post('cs');
		$data['other']=$this->input->post('other');
		if ($sobId=="")
		{
			$this->Master_model->insertSob($data);
			$this->session->set_flashdata('pesan','Your Data Inserted Successfuly');
		}
		else
		{
			$this->Master_model->updateSob($sobId,$data);
			$this->session->set_flashdata('pesan','Your Data Updated Successfuly');
		}
		
		redirect(base_url('master/'));
	}
	function deleteSob($sobId)
	{
		$where=array('sobId' => $sobId );
		$this->Master_model->deleteSobM($where);
		$this->session->set_flashdata('pesan','Your Data Deleted Successfuly');
		redirect('master');
	}
	function saveProperty(){
		$propertyId=$this->input->post('idP');
		$data['name']=$this->input->post('nameV');
		$data['address']=$this->input->post('address');
		$data['reservation']=$this->input->post('reservation');
		$data['phone']=$this->input->post('phone');
		$data['sales']=$this->input->post('sales');
		$data['web']=$this->input->post('web');
		$data['remark']=$this->input->post('remark');
		if ($propertyId=="")
		{
			$this->Master_model->insertProperty($data);
			$this->session->set_flashdata('pesan','Your Data Inserted Successfuly');
		}
		else
		{
			$this->Master_model->updateproperty($propertyId,$data);
			$this->session->set_flashdata('pesan','Your Data Updated Successfuly');
		}
		
		redirect(base_url('/master/property'));
	}
	function delProperty($PropertyId)
	{
		$where= array('propertyId' => $PropertyId);
		$this->Master_model->deleteP($where);
		$this->session->set_flashdata('pesan','Your Data Deleted Successfuly');
		redirect(base_url('/master/property'));
	}
	function saveRoom(){
		$roomId=$this->input->post('idR');
		$data['name']=$this->input->post('name');
		$data['propertyID']=$this->input->post('property');
		$data['typeOfRoom']=$this->input->post('typeOfRoom');
		$data['rateLowSeason']= str_replace(",", "",  $this->input->post('rateLowSeason'));
		$data['rateHightSeason']=str_replace(",", "",  $this->input->post('rateHightSeason'));
		$data['ratePeakSeason']=str_replace(",", "",  $this->input->post('ratePeakSeason'));
		$data['description']=$this->input->post('description');
		if ($roomId=="")
		{
			$this->Master_model->insertRoom($data);
			$this->session->set_flashdata('pesan','Your Data Inserted Successfuly');
		}
		else
		{
			$this->Master_model->updateRoom($roomId,$data);
			$this->session->set_flashdata('pesan','Your Data Updated Successfuly');
		}
		
		redirect(base_url('/master/room'));
	}
	function deleteRoom($idRoom)
	{
		$where=array('roomsId' => $idRoom );
		$this->Master_model->deleteRooms($where);
		$this->session->set_flashdata('pesan','Your Data Deleted Successfuly');
		redirect('master/room');
	}

	
	//redirect menu
	function home()
	{
		redirect(base_url());
	}
	function frontDesk()
	{
		redirect(base_url('frontDesk'));
	}
	function report()
	{
		redirect(base_url('report'));
	}
	function master()
	{
		redirect(base_url('master'));
	}
}

