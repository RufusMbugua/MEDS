<?php
class Equipment_Maintenancerecordmodel extends CI_Model{
    
    function Equipment_Maintenancerecordmodel()
    {
      parent::__construct();
    }
    /*function equipment_maintenance_list_getall($test_request_id,$user_type_id){
        
        if($test_request_id==0 && $user_type_id==6){
            $sql="select * from equipment_maintenance";
            $query=$this->db->query($sql); 
            return $query->result();
        }
       
    }*/
    
    function equipment_maintenance_list_get(){
        $sql="SELECT * FROM equipment_maintenance WHERE status='0'";
        $query=$this->db->query($sql);
        return $query->result();
    }
    function equipment_maintenance_list_getdamaged(){
        $sql="SELECT * FROM equipment_maintenance WHERE status='2'";
        $query=$this->db->query($sql);
        return $query->result();
    }
    function equipment_maintenance_list_getmaintenance_calibration(){
        $sql="SELECT * FROM equipment_maintenance WHERE status='1'";
        $query=$this->db->query($sql);
        return $query->result();
    }
}
?>