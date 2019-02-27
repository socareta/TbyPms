<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("Home_model");
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
		$dt['upcoming']=$this->Home_model->upcoming()->result();
		$dt['pass']=$this->Home_model->pass()->result();
		$dt['booking']=$this->Home_model->booking()->result();
		$dt['revenue']=$this->Home_model->revenue()->result();
		$h=base_url();
		$data=array('menu' =>'Home','homeUrl'=>$h,'logout'=>$h."login/logout");
		$this->load->view('template/header',$data);
		$this->load->view('homeView',$dt);
		$this->load->view('template/footer');
	}
}
