	<?php
class Report_model extends CI_Model
{
	function thisMonthBooking()
	{
		$d=date("Y-m-");
		$start=$d."1";
		$end=$d."31";
		$this->db->where('tanggal >=', $start);
		$this->db->where('tanggal <=', $end);
		$this->db->where('status <>','canceled');
		return $this->db->get('reservation');
	}
	function lastMonthBooking()
	{
		$m=date("m");$ld=intval($m)-1;
		$y=date("Y");
		$start=$y."-".$ld."-1";
		$end=$y."-".$ld."-31";
		$this->db->where('tanggal >=', $start);
		$this->db->where('tanggal <=', $end);
		$this->db->where('status <>','canceled');
		return $this->db->get('reservation');
	}
	function thisMonthReserved()
	{
		$d=date("Y-m-");
		$start=$d."1";
		$end=$d."31";
		$this->db->where('check_in >=', $start);
		$this->db->where('check_in <=', $end);
		$this->db->where('status <>','canceled');
		return $this->db->get('reservation');
	}
	function lastMonthReserved()
	{
		$m=date("m");$ld=intval($m)-1;
		$y=date("Y");
		$start=$y."-".$ld."-1";
		$end=$y."-".$ld."-31";
		$this->db->where('check_in >=', $start);
		$this->db->where('check_in <=', $end);
		$this->db->where('status <>','canceled');
		return $this->db->get('reservation');
	}
	function bookingThisYear()
	{
		$start=date("Y")."-01-01";
		$end=date("Y")."-12-31";
		$this->db->select('MONTH(tanggal) as bulan, COUNT( resId) as jumBooking');
		$this->db->from("reservation");
		$this->db->where('tanggal >=',$start);
		$this->db->where('tanggal <=',$end);
		$this->db->where('status <>','canceled');
		$this->db->group_by('MONTH(tanggal)');
		$rs=$this->db->get();
		return $rs;
	}
	function reservThisYear()
	{
		$start=date("Y")."-01-01";
		$end=date("Y")."-12-31";
		$this->db->select('MONTH(check_in) as bulan, COUNT( resId) as jumBooking');
		$this->db->from("reservation");
		$this->db->where('check_in >=',$start);
		$this->db->where('check_in <=',$end);
		$this->db->where('status <>','canceled');
		$this->db->group_by('MONTH(check_in)');
		$rs=$this->db->get();
		return $rs;
	}
	function revenueThisYear()
	{
		$start=date("Y")."-01-01";
		$end=date("Y")."-12-31";
		$this->db->select('MONTH(check_in) as bulan, SUM(rate_idr) as revenue,sum(rate_idr-rate_contract) as margin');
		$this->db->from("reservation");
		$this->db->where('check_in >=',$start);
		$this->db->where('check_in <=',$end);
		$this->db->where('status =','registered');
		$this->db->group_by('MONTH(check_in)');
		$rs=$this->db->get();
		return $rs;
	}
	function revenueLastYear()
	{
		$y= intval(date("Y"))-1;
		$start=$y."-01-01";
		$end=$y."-12-31";
		$this->db->select('MONTH(check_in) as bulan, SUM(rate_idr) as revenue,sum(rate_idr-rate_contract) as margin');
		$this->db->from("reservation");
		$this->db->where('check_in >=',$start);
		$this->db->where('check_in <=',$end);
		$this->db->where('status =','registered');
		$this->db->group_by('MONTH(check_in)');
		$rs=$this->db->get();
		return $rs;
	}
	function bookingLastYear()
	{
		$y= intval(date("Y"))-1;
		$start=$y."-01-01";
		$end=$y."-12-31";
		$this->db->select('MONTH(tanggal) as bulan, COUNT( resId) as jumBooking');
		$this->db->from("reservation");
		$this->db->where('tanggal >=',$start);
		$this->db->where('tanggal <=',$end);
		$this->db->where('status <>','canceled');
		$this->db->group_by('MONTH(tanggal)');
		$rs=$this->db->get();
		return $rs;
	}
	function reservLastYear()
	{
		$y= intval(date("Y"))-1;
		$start=$y."-01-01";
		$end=$y."-12-31";
		$this->db->select('MONTH(check_in) as bulan, COUNT( resId) as jumBooking');
		$this->db->from("reservation");
		$this->db->where('check_in >=',$start);
		$this->db->where('check_in <=',$end);
		$this->db->where('status <>','canceled');
		$this->db->group_by('MONTH(check_in)');
		$rs=$this->db->get();
		return $rs;
	}
	function bookingSob($type)
	{
		if($type=="this")
		{
			$start=date("Y")."-01-01";
			$end=date("Y")."-12-31";
			$this->db->select("MONTH(tanggal) as bulan, count(resId) as jumBooking, b.name ");
			$this->db->from("reservation as a");
			$this->db->where("tanggal >=",$start);
			$this->db->where("tanggal <=",$end);
			$this->db->where("status <>",'canceled');
			$this->db->group_by('MONTH(a.tanggal),a.sobId');
			$this->db->join('sob as b','a.sobId = b.sobId','LEFT');
			$this->db->order_by('b.name, bulan');
			return $this->db->get();
		}
		else
		{
			$y= intval(date("Y"))-1;
			$start=$y."-01-01";
			$end=$y."-12-31";
			$this->db->select("MONTH(tanggal) as bulan, count(resId) as jumBooking, b.name ");
			$this->db->from("reservation as a");
			$this->db->where("tanggal >=",$start);
			$this->db->where("tanggal <=",$end);
			$this->db->where("status <>",'canceled');
			$this->db->group_by('MONTH(a.tanggal),a.sobId');
			$this->db->join('sob as b','a.sobId = b.sobId','LEFT');
			$this->db->order_by('b.name, bulan');
			return $this->db->get();
		}
		

	}
	function revSob($type)
	{
		if($type=="this")
		{
			$start=date("Y")."-01-01";
			$end=date("Y")."-12-31";
			$this->db->select("MONTH(check_in) as bulan, sum(rate_idr) as rev, b.name ");
			$this->db->from("reservation as a");
			$this->db->where("check_in >=",$start);
			$this->db->where("check_in <=",$end);
			$this->db->where("status =",'registered');
			$this->db->group_by('MONTH(a.check_in),a.sobId');
			$this->db->join('sob as b','a.sobId = b.sobId','LEFT');
			$this->db->order_by('b.name, bulan');
			return $this->db->get();
		}
		else
		{
			$y= intval(date("Y"))-1;
			$start=$y."-01-01";
			$end=$y."-12-31";
			$this->db->select("MONTH(check_in) as bulan, sum(rate_idr) as rev, b.name ");
			$this->db->from("reservation as a");
			$this->db->where("check_in >=",$start);
			$this->db->where("check_in <=",$end);
			$this->db->where("status =",'registered');
			$this->db->group_by('MONTH(a.check_in),a.sobId');
			$this->db->join('sob as b','a.sobId = b.sobId','LEFT');
			$this->db->order_by('b.name, bulan');
			return $this->db->get();
		}
		

	}
}

?>