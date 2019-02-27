<?php
 class Home_model extends CI_Model
 {
 	function upcoming()
 	{
 		$start=date("y/m/")."1";
 		$end=date("y/m/")."31";
 		$this->db->where('check_in>=',$start);
 		$this->db->where('check_in<=',$end);
 		$this->db->where('status<>','canceled');
 		return$this->db->get('reservation');
 	}
 	function pass()
 	{
 		$m=intval(date("m"))-1;
 		$start=date("y/").$m."/1";
 		$end=date("y/").$m."/31";
 		$this->db->where('check_in>=',$start);
 		$this->db->where('check_in<=',$end);
 		$this->db->where('status=','registered');
 		return $this->db->get('reservation');
 	}
 	function booking()
 	{
 		$start=date("y/m/")."1";
 		$end=date("y/m/")."31";
 		$this->db->select('count(resId) as jum');
 		$this->db->where('tanggal>=',$start);
 		$this->db->where('tanggal<=',$end);
 		$this->db->where('status<>','canceled');
 		return$this->db->get('reservation');
 	}
 	function revenue()
 	{
 		$start=date("y/m/")."1";
 		$end=date("y/m/")."31";
 		$query=$this->db->query("select sum(rate_idr) as jum from reservation
where check_in between '$start' and '$end' ");
 		return $query;
 	}
 }
