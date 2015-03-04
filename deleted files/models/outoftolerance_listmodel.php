<?php
class Outoftolerance_Listmodel extends CI_Model{

	function Outoftolerance_Listmodel(){
	  parent::__construct();
	}
	
	function getdetails($id){
		//$sql="SELECT * FROM equipment_maintenance INNER JOIN equipment_maintenance_log WHERE equipment_maintenance_log.equipment_maintenance_id=equipment_maintenance.id AND equipment_maintenance.id=$id";
		$sql="SELECT * FROM equipment_maintenance WHERE id=$id";
		$query=$this->db->query($sql);
		return $query->result();
	}
	
	function get_record_list(){
		$sql="SELECT * FROM outoftolerance WHERE status='0'";
		$query=$this->db->query($sql);
		return $query->result();
	}
	
	function get_addressed_list(){
		$sql="SELECT * FROM outoftolerance WHERE status='1'";
		$query=$this->db->query($sql);
		return $query->result();
	}
}
?>