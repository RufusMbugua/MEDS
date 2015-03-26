<?php
class Weight_Variation_Model extends CI_Model {
// model constructor function
function __construct() {
    parent::__construct(); // call parent constructor
    $this->load->database();
}


function process(){
    $assignment_id=$this->input->post('assignment_id');
    $test_request_id=$this->input->post('tr_id');
    $test_name="Weight Variation";
    $test_type="54";
    $status=1;

    $data=$this->db->select_max('id')->get('weight_variation')->result();
    $test_id=$data[0]->id;
    $test_id++;

    $data = array(
        
        
        'equipment_name'=>$this->input->post('equipmentbalance'),
        'equipment_id'=>$this->input->post('equipment_id'),
        'assay_average_determinant'=>$this->input->post('av_det'),
        'wt_tablet_one'=>$this->input->post('wt_one'),
        'wt_tablet_two'=>$this->input->post('wt_two'),
        'wt_tablet_three'=>$this->input->post('wt_three'),
        'wt_tablet_four'=>$this->input->post('wt_four'),
        'wt_tablet_five'=>$this->input->post('wt_five'),
        'wt_tablet_six'=>$this->input->post('wt_six'),
        'wt_tablet_seven'=>$this->input->post('wt_seven'),
        'wt_tablet_eight'=>$this->input->post('wt_eight'),
        'wt_tablet_nine'=>$this->input->post('wt_nine'),
        'wt_tablet_ten'=>$this->input->post('wt_ten'),
        'wt_tablet_av'=>$this->input->post('mean'),
        'ec_content_one'=>$this->input->post('est_one'),
        'ec_content_two'=>$this->input->post('est_two'),
        'ec_content_three'=>$this->input->post('est_three'),
        'ec_content_four'=>$this->input->post('est_four'),
        'ec_content_five'=>$this->input->post('est_five'),
        'ec_content_six'=>$this->input->post('est_six'),
        'ec_content_seven'=>$this->input->post('est_seven'),
        'ec_content_eight'=>$this->input->post('est_eight'),
        'ec_content_nine'=>$this->input->post('est_nine'),
        'ec_content_ten'=>$this->input->post('est_ten'),
        'ec_content_av'=>$this->input->post('estmean'),
        'ec_content_sd'=>$this->input->post('standard_dev_est'),
        'ec_content_rsd'=>$this->input->post('rsd_est'),
        'ec_content_rsd'=>$this->input->post('t'),
        'ec_content_rsd'=>$this->input->post('m'),
        'test_request_id'=>$test_request_id,
        'test_status'=>$status
        
    );
     $data_two = array(
     
     'test_id'=>$test_id,
     'test_request_id'=>$test_request_id,
     'test_type'=>$test_type,
     'results'=>$this->input->post('determination_average')." Average = ".$this->input->post('estmean')."% , Acceptance Value = ".$this->input->post('acceptance_value_of_ten'),
     'method'=>$this->input->post('method'),
     'remarks'=>$this->input->post('test_conclusion')
    );

    $this->db->update('test_results', $data_two, array('test_request_id' => $test_request_id , 'test_type'=>$test_type,));
    $this->db->insert('weight_variation',$data);
    
    redirect('test/index/'.$assignment_id.'/'.$test_request_id.'/'.$test_type_id);
    }
}
?>