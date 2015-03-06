<?php
class Standard_Register_Recordsmodel extends CI_Model{
    
    function Standard_Register_Recordsmodel()
    {
      parent::__construct();
    }
    function standard_register_list_getall(){
        $this->load->database();
        $query=$this->db->get('standard_register');
        return $query->result();
    }
    function standard_register_list_get(){

        $sql = "SELECT * FROM standard_register WHERE status = '0'";
        $query = $this->db->query($sql);    
        return $query->result();
    }
    function expired(){

        $sql = "SELECT * FROM standard_register WHERE status = '1'";
        $query = $this->db->query($sql);
        return $query ->result();

    }
    function damaged(){

        $sql = "SELECT * FROM standard_register WHERE status = '2'";
        $query = $this->db->query($sql);
        return $query ->result();
    }
    function exhausted(){
        $sql = "SELECT * FROM standard_register WHERE status = '3'";
         $query = $this->db->query($sql);
        return $query ->result();
    }
}
?>