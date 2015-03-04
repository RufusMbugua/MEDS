<?php
class Client_Listmodel extends CI_Model{
    
    function Client_Listmodel()
    {
      parent::__construct();
    }
    function client_list_getall(){
        $query=$this->db->get('client');
        return $query->result();
    }
    function client_list_get(){

        $query=$this->db->get('client');
        $this->db->where('status',1 );
        return $query->result();
    }
    function client_requests_get($client_ref){
            
            $sql="SELECT *  FROM test_request where applicant_ref_number='$client_ref'";
            $query=$this->db->query($sql);
            return $query->result();

    }
    function client_invoices_get($client_ref){

         $sql="SELECT *  FROM invoice where invoice.customer_reference='$client_ref'";
            $query=$this->db->query($sql);
            return $query->result();

    }
}
?>