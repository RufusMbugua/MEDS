<?php
class Proforma_Invoice_Model extends CI_Model{
    
    function Proforma_Invoice_Model(){
      parent::__construct();
    }

    function invoice_listget(){
                 
    $this->db->select('*');
    $this->db->from('proforma_invoice');
    $query = $this->db->get();
     return $query->result();
    }
    
}
?>