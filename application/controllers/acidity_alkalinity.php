<?php
class Acidity_Alkalinity extends CI_Controller {

    function __construct() {
        parent::__construct();
    }
     function acidity_alkalinity_specifications() {
        
    $assignment_id= $this->uri->segment(3);
    $test_request_id=$this->uri->segment(4);

    $data['request']=
    $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

    $data['acidity_alkalinity']=
    $this->db->select('*')->get_where('acidity_alkalinity', array('test_request_id' => $test_request_id))->result_array();
    
    $data['sql']=
    $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array(); 

    
    $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
    test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
    test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
     

    $results=$query->result_array();
    $data['query']=$results[0];
    
    $this->load->view('general_tests/acidity_alkalinity_specifications',$data);
    $this->load->helper(array('form'));
    }
    function specifications_view_worksheet() {
        
    $assignment_id= $this->uri->segment(3);
    $test_request_id=$this->uri->segment(4);
    $test_type='o';

    $data['request']=
    $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

    $data['monograph']=
    $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array();
    
    $data['monograph_specifications']=
    $this->db->select('*')->get_where('monograph_specifications', array('test_type' => $test_type, 'test_request_id' => $test_request_id))->result_array();
    
    
    $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
    test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
    test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
      
    $results=$query->result_array();
    $data['query']=$results[0];
       
    $this->load->view('general_tests/acidity_alkalinity_specifications_view',$data);
    $this->load->helper(array('form'));
    }
    function monograph_view() {
        
    $assignment_id= $this->uri->segment(3);
    $test_request_id=$this->uri->segment(4);
    $test_type='b';

    $data['request']=
    $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

    $data['monograph']=
    $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array();
    
    $data['monograph_specifications']=
    $this->db->select('*')->get_where('monograph_specifications', array('test_type' => $test_type, 'test_request_id' => $test_request_id))->result_array();
    
    
    $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
    test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
    test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
     
    $results=$query->result_array();
    $data['query']=$results[0];
       
    $this->load->view('general_tests/monograph_view',$data);
    $this->load->helper(array('form'));
    }
    function worksheet() {
        
    $assignment_id= $this->uri->segment(3);
    $test_request_id=$this->uri->segment(4);
    $test_type='o';

    $data['request']=
    $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

    $data['monograph']=
    $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array();
    
    $data['monograph_specifications']=
    $this->db->select('*')->get_where('monograph_specifications', array('test_type' => $test_type, 'test_request_id' => $test_request_id))->result_array();
    
   
    $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
    test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
    test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
     
    $results=$query->result_array();
    $data['query']=$results[0];
       
    $this->load->view('general_tests/acidity_alkalinity_view',$data);
    $this->load->helper(array('form'));
    }
    function acidity_alkalinity_complete_worksheet() {
        
    $assignment_id= $this->uri->segment(3);
    $test_request_id=$this->uri->segment(4);
    $test_type='o';

    $data['request']=
    $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

    $data['monograph']=
    $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array();
    
    $data['monograph_specifications']=
    $this->db->select('*')->get_where('monograph_specifications', array('test_type' => $test_type, 'test_request_id' => $test_request_id))->result_array();
    
    $data['acidity_alkalinity']=$this->db->select('*')->get_where('acidity_alkalinity', array('test_request_id' => $test_request_id))->result_array();
    
    
    $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
    test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
    test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
     
    $results=$query->result_array();
    $data['query']=$results[0];
       
    $this->load->view('general_tests/acidity_alkalinity_complete_worksheet_view',$data);
    $this->load->helper(array('form'));
    }
    function save(){
        $this->load->model('acidity_alkalinity_model');

        if ($this->input->post('submit')) {
            $this->acidity_alkalinity_model->process();
        }
	}
     function save_acidity_alkalinity_specifications(){
       $this->load->model('acidity_alkalinity_model');

        if ($this->input->post('submit')) {
            $this->acidity_alkalinity_model->process_specifications();
        }                
    }

}
