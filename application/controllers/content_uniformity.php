<?php
class Content_Uniformity extends CI_Controller {

    function __construct() {
        parent::__construct();
    }
     
    function uniformity_of_dosage_specifications() {
        
    $assignment_id= $this->uri->segment(3);
    $test_request_id=$this->uri->segment(4);
    $test_type_id=$this->uri->segment(5);

        if($test_type_id==""){

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['uniformity_of_dosage']=
        $this->db->select('*')->get_where('uniformity_of_dosage', array('test_request_id' => $test_request_id))->result_array();
        
        $data['monograph']=
        $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array();
        

        $data['components']=
        $this->db->select('*')->get_where('components', array('test_request_id' => $test_request_id))->result_array();

        $data['sql']=
        $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array(); 

        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.strength_concentration,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
        

        $results=$query->result_array();
        $data['query']=$results[0];
        
        $this->load->view('content_uniformity/uniformity_of_dosage_specifications',$data);
        $this->load->helper(array('form'));    
        
        }else{

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['uniformity_of_dosage']=
        $this->db->select('*')->get_where('uniformity_of_dosage', array('test_request_id' => $test_request_id))->result_array();
        
        $data['monograph']=
        $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array();
        

        $data['components']=
        $this->db->select('*')->get_where('components', array('test_request_id' => $test_request_id))->result_array();

        $data['sql']=
        $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array(); 

        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.strength_concentration,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
        

        $results=$query->result_array();
        $data['query']=$results[0];
        
        $this->load->view('content_uniformity/uniformity_of_dosage_specifications_multi',$data);
        $this->load->helper(array('form'));
        }
    }
    function content_uniformity_specifications() {
        
    $assignment_id= $this->uri->segment(3);
    $test_request_id=$this->uri->segment(4);

    $data['request']=
    $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

    $data['content_uniformity']=
    $this->db->select('*')->get_where('content_uniformity', array('test_request_id' => $test_request_id))->result_array();
    
    $data['sql']=
    $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array(); 

    $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.strength_concentration,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
    

    $results=$query->result_array();
    $data['query']=$results[0];
    
    $this->load->view('content_uniformity/content_uniformity_specifications',$data);
    $this->load->helper(array('form'));
    }
    function weight_variation_specifications() {
        
    $assignment_id= $this->uri->segment(3);
    $test_request_id=$this->uri->segment(4);

    $data['request']=
    $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

    $data['content_uniformity']=
    $this->db->select('*')->get_where('content_uniformity', array('test_request_id' => $test_request_id))->result_array();
    
    $data['sql']=
    $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array(); 

    $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
    test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
    test_request.quantity_remaining,test_request.strength_concentration,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
    

    $results=$query->result_array();
    $data['query']=$results[0];
    
    $this->load->view('weight_variation/weight_variation_specifications',$data);
    $this->load->helper(array('form'));
    }
    function weight_variation_specifications_multi() {
        
    $assignment_id= $this->uri->segment(3);
    $test_request_id=$this->uri->segment(4);
    $test_type=$this->uri->segment(5);

    $data['request']=
    $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

    $data['content_uniformity']=
    $this->db->select('*')->get_where('content_uniformity', array('test_request_id' => $test_request_id))->result_array();
    
    $data['sql']=
    $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array(); 

    $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
    test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
    test_request.quantity_remaining,test_request.strength_concentration,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
    

    $results=$query->result_array();
    $data['query']=$results[0];
    
    $this->load->view('weight_variation/weight_variation_specifications_multi',$data);
    $this->load->helper(array('form'));
    }
    function uniformity_of_dosage_specifications_view() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $test_type=$this->uri->segment(5);
        $status=0;
        
        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['monograph']=
        $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array();
        
        $data['components']=
        $this->db->select('*')->get_where('components', array('test_request_id' => $test_request_id))->result_array();

        $data['monograph_specifications']=
        $this->db->select('*')->get_where('monograph_specifications', array('test_type' => $test_type, 'test_request_id' => $test_request_id))->result_array();
        
        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();

        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.strength_concentration,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
    

        $results=$query->result_array();
        $data['query']=$results[0];
        
        $this->load->view('uniformity_of_dosage/uniformity_of_dosage_specifications_view',$data);
        $this->load->helper(array('form'));
    }

    function content_uniformity_specifications_view() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $test_type='g';
        $status=0;
        
        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['monograph']=
        $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array();
        
        $data['monograph_specifications']=
        $this->db->select('*')->get_where('monograph_specifications', array('test_type' => $test_type, 'test_request_id' => $test_request_id))->result_array();
        
        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();

        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.strength_concentration,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
    

        $results=$query->result_array();
        $data['query']=$results[0];
        
        $this->load->view('content_uniformity/content_uniformity_specifications_view',$data);
        $this->load->helper(array('form'));
    }

    function weight_variation_specifications_view() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $test_type='54';
        $status=0;
        
        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['monograph']=
        $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array();
        
        $data['monograph_specifications']=
        $this->db->select('*')->get_where('monograph_specifications', array('test_type'=>$test_type,'test_request_id' => $test_request_id))->result_array();
        
        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();

        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.strength_concentration,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
     

        $results=$query->result_array();
        $data['query']=$results[0];
        
        $this->load->view('weight_variation/weight_variation_specifications_view',$data);
        $this->load->helper(array('form'));
    }

    function weight_variation_specifications_multi_view() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $test_type='55';
        $status=0;
        
        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['monograph']=
        $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array();
        
        $data['monograph_specifications']=
        $this->db->select('*')->get_where('monograph_specifications', array('test_type'=>$test_type,'test_request_id' => $test_request_id))->result_array();
        
        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();

        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.strength_concentration,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
     

        $results=$query->result_array();
        $data['query']=$results[0];
        
        $this->load->view('weight_variation/weight_variation_specifications_multi_view',$data);
        $this->load->helper(array('form'));
    }

    function uniformity_of_dosage() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $test_type='52';
        $status=0;
        
        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['monograph']=
        $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array();
        
        $data['monograph_specifications']=
        $this->db->select('*')->get_where('monograph_specifications', array('test_type' => $test_type, 'test_request_id' => $test_request_id))->result_array();
        
        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();

        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.strength_concentration,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
    

        $results=$query->result_array();
        $data['query']=$results[0];
        
        $this->load->view('uniformity_of_dosage/uniformity_of_dosage',$data);
        $this->load->helper(array('form'));
    }

    function uniformity_of_dosage_multicomponent() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $test_type=$this->uri->segment(5);
        $status=0;
        
        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['monograph']=
        $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array();
        
        $data['components']=
        $this->db->select('*')->get_where('components', array('test_request_id' => $test_request_id))->result_array();

        $data['monograph_specifications']=
        $this->db->select('*')->get_where('monograph_specifications', array('test_type' => $test_type, 'test_request_id' => $test_request_id))->result_array();
        
        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();

       $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.strength_concentration,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
    
        $results=$query->result_array();
        $data['query']=$results[0];
        
        $this->load->view('uniformity_of_dosage/uniformity_of_dosage_multicomponent',$data);
        $this->load->helper(array('form'));
    }
    
    
    function content_uniformity_tests() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $test_type='21';
        $status=0;
        
        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['monograph']=
        $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array();
        
        $data['monograph_specifications']=
        $this->db->select('*')->get_where('monograph_specifications', array('test_type' => $test_type, 'test_request_id' => $test_request_id))->result_array();
        
        $data['uniformity_of_dosage']=
        $this->db->select('*')->get_where('uniformity_of_dosage', array('test_request_id' => $test_request_id))->result_array();
        
        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();

        $$query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.strength_concentration,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
     

        $results=$query->result_array();
        $data['query']=$results[0];
        
        $this->load->view('content_uniformity/content_uniformity_tests',$data);
        $this->load->helper(array('form'));
    }

    function weight_variation_worksheet() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $test_type='54';
        $status=0;
        
        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['monograph']=
        $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array();
        
        $data['monograph_specifications']=
        $this->db->select('*')->get_where('monograph_specifications', array('test_type' => $test_type, 'test_request_id' => $test_request_id))->result_array();
        
        $data['uniformity_of_dosage']=
        $this->db->select('*')->get_where('uniformity_of_dosage', array('test_request_id' => $test_request_id))->result_array();
        
        $data['assay_hplc_internal_method']=
        $this->db->select('*')->get_where('assay_hplc_internal_method', array('test_request_id' => $test_request_id))->result_array();
        

        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();

        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.strength_concentration,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
    

        $results=$query->result_array();
        $data['query']=$results[0];
        
        $this->load->view('weight_variation/weight_variation_hplc_single_compworksheet',$data);
        $this->load->helper(array('form'));
    }

     function weight_variation_worksheet_view() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $test_type='54';
        $status=0;
        
        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['monograph']=
        $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array();
        
        $data['monograph_specifications']=
        $this->db->select('*')->get_where('monograph_specifications', array('test_type' => $test_type, 'test_request_id' => $test_request_id))->result_array();
        
        $data['uniformity_of_dosage']=
        $this->db->select('*')->get_where('uniformity_of_dosage', array('test_request_id' => $test_request_id))->result_array();
        
        $data['assay_hplc_internal_method']=
        $this->db->select('*')->get_where('assay_hplc_internal_method', array('test_request_id' => $test_request_id))->result_array();
        

        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();

        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.strength_concentration,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
    

        $results=$query->result_array();
        $data['query']=$results[0];
        
        $this->load->view('weight_variation/weight_variation_hplc_single_compworksheet_view',$data);
        $this->load->helper(array('form'));
    }

    function worksheet_uniformity_of_dosage_view() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $test_type='52';
        $status=0;
        
        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['monograph']=
        $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array();
        
        $data['monograph_specifications']=
        $this->db->select('*')->get_where('monograph_specifications', array('test_type' => $test_type, 'test_request_id' => $test_request_id))->result_array();
        
        $data['uniformity_of_dosage']=
        $this->db->select('*')->get_where('uniformity_of_dosage', array('test_request_id' => $test_request_id))->result_array();
        
        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();

        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.strength_concentration,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
     

        $results=$query->result_array();
        $data['query']=$results[0];
        
        $this->load->view('uniformity_of_dosage/worksheet_uniformity_of_dosage_view',$data);
        $this->load->helper(array('form'));
    }

    function worksheet_uniformity_of_dosage_view_multi() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $test_type=$this->uri->segment(5);
        
        $status=0;
        
        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['monograph']=
        $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array();
        
        $data['monograph_specifications']=
        $this->db->select('*')->get_where('monograph_specifications', array('test_type' => $test_type, 'test_request_id' => $test_request_id))->result_array();
        
        $data['uniformity_of_dosage']=
        $this->db->select('*')->get_where('uniformity_of_dosage_multicomponent', array('test_request_id' => $test_request_id))->result_array();
        
        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();

        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.strength_concentration,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
     

        $results=$query->result_array();
        $data['query']=$results[0];
        
        $this->load->view('uniformity_of_dosage/worksheet_uniformity_of_dosage_view_multicomponent',$data);
        $this->load->helper(array('form'));
    }
    
    function worksheet_uv() {
        
    $assignment_id= $this->uri->segment(3);
    $test_request_id=$this->uri->segment(4);
    $test_type='g';
    $status=0;

    $data['request']=
    $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

    $data['monograph']=
    $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array();
    
    $data['monograph_specifications']=
    $this->db->select('*')->get_where('monograph_specifications', array('test_type' => $test_type, 'test_request_id' => $test_request_id))->result_array();
    
    $data['uniformity_of_dosage']=
    $this->db->select('*')->get_where('uniformity_of_dosage', array('test_request_id' => $test_request_id))->result_array();    
    
    $data['sql_equipment']=
    $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

    $data['sql_standards']=
    $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

    $data['sql_columns']=
    $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();

    $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.strength_concentration,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
      

    $results=$query->result_array();
    $data['query']=$results[0];
 
    $this->load->view('content_uniformity/content_uniformity_uv_view',$data);
    $this->load->helper(array('form'));
    }

    function worksheet_titration() {
        
    $assignment_id= $this->uri->segment(3);
    $test_request_id=$this->uri->segment(4);
    $test_type='g';
    $status=0;

    $data['request']=
    $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

    $data['monograph']=
    $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array();
    
    $data['monograph_specifications']=
    $this->db->select('*')->get_where('monograph_specifications', array('test_type' => $test_type, 'test_request_id' => $test_request_id))->result_array();
    
    $data['uniformity_of_dosage']=
    $this->db->select('*')->get_where('uniformity_of_dosage', array('test_request_id' => $test_request_id))->result_array();    

    $data['sql_equipment']=
    $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

    $data['sql_standards']=
    $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

    $data['sql_columns']=
    $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();

    $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
    test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
    test_request.quantity_remaining,test_request.strength_concentration,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

    $results=$query->result_array();
    $data['query']=$results[0];
    
    $this->load->view('content_uniformity/content_uniformity_titration_view',$data);
    $this->load->helper(array('form'));
    }
     function unit_single_component_worksheet() {
        
    $assignment_id= $this->uri->segment(3);
    $test_request_id=$this->uri->segment(4);
    

    $data['request']=
     $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

    
   $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.strength_concentration,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
    
    

    $results=$query->result_array();
    $data['query']=$results[0];
    
    
    $this->load->view('uniformity_of_dosage_unit_single_component',$data);
    $this->load->helper(array('form'));
    }

    function save_uniformity_of_dosage(){
        
        $this->load->model('content_uniformity_model');
        if ($this->input->post('submit')) {
            $this->content_uniformity_model->process_uniformity_of_dosage();
        }                  
    }
    function save_uniformity_of_dosage_multicomponent(){
        
        $this->load->model('content_uniformity_model');
        if ($this->input->post('submit')) {
            $this->content_uniformity_model->process_uniformity_of_dosage_multicomponent();
        }                  
    }
    function save_uniformity_of_dosgage_specifications(){
       $this->load->model('content_uniformity_model');

        if ($this->input->post('submit')) {
            $this->content_uniformity_model->process_uniformity_of_dosage_specifications();
        }                
    }
    function save_uniformity_of_dosgage_specifications_multi(){

       $test_type_id=$this->uri->segment(5);

       $this->load->model('content_uniformity_model');

        if ($this->input->post('submit')) {
            $this->content_uniformity_model->process_uniformity_of_dosage_specifications_multi();
        }                
    }
    function save_content_uniformity_specifications(){
       $this->load->model('content_uniformity_model');

        if ($this->input->post('submit')) {
            $this->content_uniformity_model->process_content_uniformity_specifications();
        }                
    }
    function save_weight_variation_specifications(){
       $this->load->model('content_uniformity_model');

        if ($this->input->post('submit')) {
            $this->content_uniformity_model->process_weight_variation_specifications();
        }                
    }
    function save_weight_variation_specifications_multi(){
       $this->load->model('content_uniformity_model');

        if ($this->input->post('submit')) {
            $this->content_uniformity_model->process_weight_variation_specifications_multi();
        }                
    }
}
