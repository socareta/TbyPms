<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class report extends  CI_Controller
{
	function __construct(){
		parent::__construct();		
		$this->load->model('Report_model');
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
		$data['booking']=$this->Report_model->thisMonthBooking()->result();
		$data['lastBooking']=$this->Report_model->lastMonthBooking()->result();
		$data['reserved']=$this->Report_model->thisMonthReserved()->result();
		$data['lastReserved']=$this->Report_model->lastMonthReserved()->result();
		$h=base_url();
		$dt=array('menu' =>'Report','homeUrl'=>$h,'logout'=>$h."login/logout");
		$this->load->view('template/header',$dt);
		$this->load->view('reportView',$data);
		$this->load->view('template/footer');
	}
	function comparison()
	{
		$h=base_url();
		$dt=array('menu' =>'Report','homeUrl'=>$h,'logout'=>$h."login/logout");
		$this->load->view('template/header',$dt);
		$data['booking']=$this->Report_model->bookingThisYear()->result();
		$data['bookingLastYear']=$this->Report_model->bookingLastYear()->result();
		$data['reserved']=$this->Report_model->reservThisYear()->result();
		$data['reservedLast']=$this->Report_model->reservLastYear()->result();
		$data['revenue']=$this->Report_model->revenueThisYear()->result();
		$data['revenueLast']=$this->Report_model->revenueLastYear()->result();
		$data['bookingSobThis']=$this->Report_model->bookingSob('this')->result();
		$data['bookingSobLast']=$this->Report_model->bookingSob('last')->result();
		$data['revenueSob']=$this->Report_model->revSob('this')->result();
		$data['revenueSobLast']=$this->Report_model->revSob('last')->result();
		$this->load->view('comparisonView',$data);
		$this->load->view('template/footer');
	}
	function home(){redirect(base_url());}
	function master(){redirect(base_url('master'));}
	function frontDesk(){redirect(base_url('frontDesk'));}
	function report(){redirect(base_url('report'));}
}

?>