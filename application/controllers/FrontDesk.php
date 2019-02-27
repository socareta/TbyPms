	<?php
defined("BASEPATH") or exit ('No direct script access allowed');

class frontDesk extends CI_Controller
{
	function __construct(){
		parent::__construct();		
		$this->load->model('Frontdesk_model');
		$this->load->helper('date');
		$CI = & get_instance();
	    $CI->load->library('session');
	    $CI->load->helper('url');
	    if ( !$this->session->userdata('logged_in'))
	    { 
	        redirect('login');
	    }
	}

	public function index()
	{
		$h=base_url();
		$data=array('menu' =>'FrontDesk','homeUrl'=>$h,'logout'=>$h."login/logout");
		$this->load->view('template/header',$data);
		$data['resThisMonth']=$this->Frontdesk_model->getRes_dashboard(1)->result();
		$data['resNextMonth']=$this->Frontdesk_model->getRes_dashboard(2)->result();
		$data['bookThisMonth']=$this->Frontdesk_model->getRes_dashboard(3)->result();
		$data['bookLastMonth']=$this->Frontdesk_model->getRes_dashboard(4)->result();
		$data['production']=$this->Frontdesk_model->getRes_dashboard(5)->result();
		$this->load->view('frontDeskView',$data);
		$this->load->view('template/footer');
		
	}
	
	function reservation()
	{	
		$h=base_url();
		$dt=array('menu' =>'FrontDesk','homeUrl'=>$h,'logout'=>$h."login/logout");
		$data['reservation']=$this->Frontdesk_model->getReservation()->result();
		$data['roomsType']=$this->Frontdesk_model->getRoomType()->result();
		$data['sob']=$this->Frontdesk_model->getSob()->result();
		$this->load->view('template/header',$dt);$this->load->view('template/footer');
		$this->load->view('reservationView',$data);
		
		
	}
	function saveReservation()
	{
		$resId=$this->input->post('id');
		$data['guest_name']=$this->input->post('guestName');
		$data['roomsId']=$this->input->post('roomsId');
		$data['status']=$this->input->post('status');
		$data['check_in']=$this->input->post('checkIn');
		$data['check_out']=$this->input->post('checkOut');
		$data['rate_usd']= str_replace(",", "",$this->input->post('rateUSd'));
		$data['rate_idr']=str_replace(",", "",$this->input->post('rateIdr'));
		$data['rate_contract']=str_replace(",", "",$this->input->post('rateContract'));
		$data['sobId']=$this->input->post('sob');
		$data['los']=$this->input->post('los');
		$data['email']=$this->input->post('email');
		$data['remark']=$this->input->post('remark');
		if($resId=="")
		{
			$data['tanggal']=date('Y-m-d');
			$this->Frontdesk_model->insertReservation($data);
			$this->session->set_flashdata('pesan','Your Data Inserted Successfully!!');
		}
		else
		{
			$this->Frontdesk_model->updateRes($resId,$data);
			$this->session->set_flashdata('pesan','Your Data Updated Successfully!!');
		}
		redirect(base_url('frontDesk/reservation'));
	}
	function deleteRes($idRes)
	{
		$where=array('resId'=>$idRes);
		$this->Frontdesk_model->deleteReservation($where);
		$this->session->set_flashdata('pesan','Your Data Deleted Successfully!!');
		redirect(base_url('frontDesk/reservation'));
	}

	function folio()
	{
		$data['myFolio']=$this->Frontdesk_model->getFolio()->result();
		$data['roomsType']=$this->Frontdesk_model->getRoomType()->result();
		$data['sob']=$this->Frontdesk_model->getSob()->result();
		$h=base_url();
		$dt=array('menu' =>'FrontDesk','homeUrl'=>$h,'logout'=>$h."login/logout");
		$this->load->view('template/header',$dt);$this->load->view('template/footer');
		$this->load->view('folioView',$data);
		
	}
	function saveFolio()
	{
		$resId=$this->input->post('id');
		$data['guest_name']=$this->input->post('guestName');
		$data['roomsId']=$this->input->post('roomsId');
		$data['status']=$this->input->post('status');
		$data['check_in']=$this->input->post('checkIn');
		$data['check_out']=$this->input->post('checkOut');
		$data['rate_usd']=str_replace(",", "", $this->input->post('rateUSd'));
		$data['rate_idr']=str_replace(",", "", $this->input->post('rateIdr'));
		$data['rate_contract']=str_replace(",", "", $this->input->post('rateContract'));
		$data['sobId']=$this->input->post('sob');
		$data['los']=$this->input->post('los');
		$data['email']=$this->input->post('email');
		$data['remark']=$this->input->post('remark');
		
			$this->Frontdesk_model->updateRes($resId,$data);
			$this->session->set_flashdata('pesan','Your Data Updated Successfully!!');
		redirect(base_url('frontDesk/folio'));
	}
	function calender()
	{
		$data['Jan']=$this->Frontdesk_model->getCalender(1)->result();
		$data['Feb']=$this->Frontdesk_model->getCalender(2)->result();
		$data['Mar']=$this->Frontdesk_model->getCalender(3)->result();
		$data['Apr']=$this->Frontdesk_model->getCalender(4)->result();
		$data['May']=$this->Frontdesk_model->getCalender(5)->result();
		$data['Jun']=$this->Frontdesk_model->getCalender(6)->result();
		$data['Jul']=$this->Frontdesk_model->getCalender(7)->result();
		$data['Aug']=$this->Frontdesk_model->getCalender(8)->result();
		$data['Sep']=$this->Frontdesk_model->getCalender(9)->result();
		$data['Oct']=$this->Frontdesk_model->getCalender(10)->result();
		$data['Nov']=$this->Frontdesk_model->getCalender(11)->result();
		$data['Dec']=$this->Frontdesk_model->getCalender(12)->result();
		$h=base_url();
		$dt=array('menu' =>'FrontDesk','homeUrl'=>$h,'logout'=>$h."login/logout");
		$this->load->view('template/header',$dt);
		$this->load->view('calenderView',$data);
		$this->load->view('template/footer');
	}
	function chart()
	{
		
		if(!$_GET)
		{			
			$m= date('F');
			redirect(base_url("frontDesk/chart?m=".$m));
		}
		else
		{
			$m= $_GET['m'];
			$fullDate="2017-".$m."-1";
			$month=date("m",strtotime($fullDate));
			$h=base_url();
			$dt=array('menu' =>'FrontDesk','homeUrl'=>$h,'logout'=>$h."login/logout");
			$dt['chart']=$this->Frontdesk_model->getChart($month)->result();
			$dt['log']=array('m'=>$m,'homeUrl'=>$h);
			$this->load->view('template/header',$dt);
			$this->load->view('chartView',$dt);
			$this->load->view('template/footer');
		}
		
	}

	function home(){redirect(base_url());}
	function master(){redirect(base_url('master'));}
	function report(){redirect(base_url('report'));}
	function frontDesk(){redirect(base_url('frontDesk'));}
}

?>