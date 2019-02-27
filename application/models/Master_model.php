<?php 
 
class Master_model extends CI_Model{
	function tampil_data(){
		return $this->db->get('sob');
	}
	function tampil_dataProperty(){
		return $this->db->get('property');
	}
	function tampil_dataRoom(){
		$this->db->select('a.*, b.name as propertyName');
		$this->db->from('rooms as a');
		$this->db->join('property as b','a.propertyId=b.propertyId','LEFT');
		return $this->db->get();
	}
	function insertSob($data)
	{
		$this->db->insert('sob',$data);
		return TRUE;
	}
	function updateSob($sobId,$data)
	{
		$this->db->where('sobId',$sobId);
		$this->db->update('sob',$data);
		return TRUE;
	}
	function deleteSobM($where)
	{
		$this->db->where($where);
		$this->db->delete('sob');
		return TRUE;
	}
	function insertProperty($data)
	{
		$this->db->insert('property',$data);
	}
	function updateProperty($propertyId,$data)
	{
		$this->db->where('propertyId',$propertyId);
		$this->db->update('property',$data);
	}
	function deleteP($where)
	{
		$this->db->where($where);
		$this->db->delete('property');
		//return TRUE;
	}
	function insertRoom($data)
	{
		$this->db->insert('rooms',$data);
	}
	function updateRoom($roomId,$data)
	{
		$this->db->where('roomsId',$roomId);
		$this->db->update('rooms',$data);
	}
	function deleteRooms($where)
	{
		$this->db->where($where);
		$this->db->delete('rooms');
		return TRUE;
	}
}