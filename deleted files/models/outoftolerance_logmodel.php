<?php
class Outoftolerance_Logmodel extends CI_Model{
    
    function Outoftolerance_Logmodel()
    {
      parent::__construct();
    }
    
     function log($id){
    $query = $this->db->get_where('outoftolerance_log', array('out_id' => $id));
    $results=$query->result_array();


    $data['query']=$results;
    $this->load->view('outoftolerance_logform',$data);
}
}
?>