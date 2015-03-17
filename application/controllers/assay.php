<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Assay extends CI_Controller {

    function Assay() {
        parent::__construct();
        $this->load->model('assay_model');
    }
     
    function assay_specifications() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();
        
        $data['monograph']=
        $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array();
        
        $data['assay_hplc_internal_method']=
        $this->db->select('*')->get_where('assay_hplc_internal_method', array('test_request_id' => $test_request_id))->result_array();
        
        $data['sql']=
        $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array(); 

        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       
        $results=$query->result_array();
        $data['query']=$results[0];
        
        $this->load->view('assay/assay_specifications',$data);
        $this->load->helper(array('form'));
    }

    function assay_specifications_multi() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $test_type=$this->uri->segment(5);

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();
        
        $data['component_names'] = 
        $this->db->select('*')->get_where('components', array('test_request_id' => $test_request_id))->result_array();

        
        $data['monograph']=
        $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array();
        
        $data['assay_hplc_internal_method']=
        $this->db->select('*')->get_where('assay_hplc_internal_method', array('test_request_id' => $test_request_id))->result_array();
        
        $data['sql']=
        $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array(); 

        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        $this->load->view('assay/assay_specifications_multi',$data);
        $this->load->helper(array('form'));
    }
    
    function save_assay_specifications_multi(){
       if ($this->input->post('submit')) {
        $this->assay_model->process_specifications_multi();
        }
        
    }

    function specifications_view_worksheet() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $test_type='6';

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
           
        $this->load->view('assay/assay_specifications_view',$data);
        $this->load->helper(array('form'));
    }

    function specifications_multi_view_worksheet() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $test_type=$this->uri->segment(5);
        

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
           
        $this->load->view('assay/assay_specifications_multi_view',$data);
        $this->load->helper(array('form'));
    }

    function assay_tests(){
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $test_type_id=$this->uri->segment(5);
        $status=0; 
        $test_type='6';
        
        $data['monograph']=
        $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array();
        
        $data['monograph_specifications']=
        $this->db->select('*')->get_where('monograph_specifications', array('test_type' => $test_type, 'test_request_id' => $test_request_id))->result_array();
        
        $data['hplc_internal_method']=
        $this->db->select('*')->get_where('assay_hplc_internal_method', array('id' => $test_request_id))->result_array();
        
        $data['hplc_internal_method_reagents']=
        $this->db->select('*')->get_where('assay_hplc_internal_method_reagents', array('assay_hplc_internal_method_id' => $test_request_id))->result_array();

        $data['hplc_internal_method_peak_area_chromatograms']=
        $this->db->select('*')->get_where('assay_hplc_internal_method_peak_area_chromatograms', array('assay_hplc_internal_method_id' => $test_request_id))->result_array();

        $data['hplc_internal_method_chromatograms']=
        $this->db->select('*')->get_where('assay_hplc_internal_method_chromatograms', array('assay_hplc_internal_method_id' => $test_request_id))->result_array();
        
        $data['hplc_internal_method_chromatography_checklist']=
        $this->db->select('*')->get_where('assay_hplc_internal_method_chromatography_checklist', array('assay_hplc_internal_method_id' => $test_request_id))->result_array();

        $data['hplc_internal_method_chromatographic_conditions']=
        $this->db->select('*')->get_where('assay_hplc_internal_method_chromatographic_conditions', array('assay_hplc_internal_method_id' => $test_request_id))->result_array();

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['reagents']=
        $this->db->select('*')->get_where('reagents_inventory_record', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();

        $data['uniformity_of_dosage']=
        $this->db->select('*')->get_where('uniformity_of_dosage', array('test_request_id' => $test_request_id))->result_array();
            

        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.strength_concentration,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        $this->load->view('assay/assay_tests',$data);
        $this->load->helper(array('form'));

    }
    
    function assay_hplc_areamethod_multicomponent(){
    
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $test_type_id=$this->uri->segment(5);
        $status=0; 

        $data['monograph']=
        $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array();
        
        $data['components']=
        $this->db->select('*')->get_where('components', array('test_request_id' => $test_request_id))->result_array();
        
        $data['hplc_internal_method']=
        $this->db->select('*')->get_where('assay_hplc_internal_method', array('id' => $test_request_id))->result_array();
        
        $data['hplc_internal_method_reagents']=
        $this->db->select('*')->get_where('assay_hplc_internal_method_reagents', array('assay_hplc_internal_method_id' => $test_request_id))->result_array();

        $data['hplc_internal_method_peak_area_chromatograms']=
        $this->db->select('*')->get_where('assay_hplc_internal_method_peak_area_chromatograms', array('assay_hplc_internal_method_id' => $test_request_id))->result_array();

        $data['hplc_internal_method_chromatograms']=
        $this->db->select('*')->get_where('assay_hplc_internal_method_chromatograms', array('assay_hplc_internal_method_id' => $test_request_id))->result_array();
        
        $data['hplc_internal_method_chromatography_checklist']=
        $this->db->select('*')->get_where('assay_hplc_internal_method_chromatography_checklist', array('assay_hplc_internal_method_id' => $test_request_id))->result_array();

        $data['hplc_internal_method_chromatographic_conditions']=
        $this->db->select('*')->get_where('assay_hplc_internal_method_chromatographic_conditions', array('assay_hplc_internal_method_id' => $test_request_id))->result_array();

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['reagents']=
        $this->db->select('*')->get_where('reagents_inventory_record', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();

        $data['uniformity_of_dosage']=
        $this->db->select('*')->get_where('uniformity_of_dosage', array('test_request_id' => $test_request_id))->result_array();
        
        $data['uniformity_of_dosage_multicomponent']=
        $this->db->select('*')->get_where('uniformity_of_dosage_multicomponent', array('test_request_id' => $test_request_id))->result_array();
           

        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        $this->load->view('assay/assay_hplc_area_method_two_components',$data);
        $this->load->helper(array('form'));

    }

    function outofspecification(){
    
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $test_type_id=$this->uri->segment(5);
        $status=0; 

        $data['hplc_internal_monograph']=
        $this->db->select('assay_monograph_hplc_internal_method.id AS m,assay_monograph_hplc_internal_method.assignment_id,assay_monograph_hplc_internal_method.test_request_id,assay_monograph_hplc_internal_method.assay_hplc_internal_method_id,assay_monograph_hplc_internal_method.monograph')->get_where('assay_monograph_hplc_internal_method', array('id' => $test_request_id))->result_array();
        
        $data['hplc_internal_method']=
        $this->db->select('*')->get_where('assay_hplc_internal_method', array('id' => $test_request_id))->result_array();
        
        $data['hplc_internal_method_reagents']=
        $this->db->select('*')->get_where('assay_hplc_internal_method_reagents', array('assay_hplc_internal_method_id' => $test_request_id))->result_array();

        $data['hplc_internal_method_peak_area_chromatograms']=
        $this->db->select('*')->get_where('assay_hplc_internal_method_peak_area_chromatograms', array('assay_hplc_internal_method_id' => $test_request_id))->result_array();

        $data['hplc_internal_method_chromatograms']=
        $this->db->select('*')->get_where('assay_hplc_internal_method_chromatograms', array('assay_hplc_internal_method_id' => $test_request_id))->result_array();
        
        $data['hplc_internal_method_chromatography_checklist']=
        $this->db->select('*')->get_where('assay_hplc_internal_method_chromatography_checklist', array('assay_hplc_internal_method_id' => $test_request_id))->result_array();

        $data['hplc_internal_method_chromatographic_conditions']=
        $this->db->select('*')->get_where('assay_hplc_internal_method_chromatographic_conditions', array('assay_hplc_internal_method_id' => $test_request_id))->result_array();

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();


       $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
        

        $results=$query->result_array();
        $data['query']=$results[0];
        $this->load->view('assay/out_of_specification_investigation_view',$data);
        $this->load->helper(array('form'));

    }

    function full_worksheet_hplc_internal_method_single_component(){
    
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $test_type_id=$this->uri->segment(5);
        $status=0; 

        $data['monograph']=
        $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array();
        
        $data['hplc_internal_method']=
        $this->db->select('*')->get_where('assay_hplc_internal_method', array('id' => $test_request_id))->result_array();
        
        $data['hplc_internal_method_reagents']=
        $this->db->select('*')->get_where('assay_hplc_internal_method_reagents', array('assay_hplc_internal_method_id' => $test_request_id))->result_array();

        $data['hplc_internal_method_peak_area_chromatograms']=
        $this->db->select('*')->get_where('assay_hplc_internal_method_peak_area_chromatograms', array('assay_hplc_internal_method_id' => $test_request_id))->result_array();

        $data['hplc_internal_method_chromatograms']=
        $this->db->select('*')->get_where('assay_hplc_internal_method_chromatograms', array('assay_hplc_internal_method_id' => $test_request_id))->result_array();
        
        $data['hplc_internal_method_chromatography_checklist']=
        $this->db->select('*')->get_where('assay_hplc_internal_method_chromatography_checklist', array('assay_hplc_internal_method_id' => $test_request_id))->result_array();

        $data['hplc_internal_method_chromatographic_conditions']=
        $this->db->select('*')->get_where('assay_hplc_internal_method_chromatographic_conditions', array('assay_hplc_internal_method_id' => $test_request_id))->result_array();

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['reagents']=
        $this->db->select('*')->get_where('reagents_inventory_record', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();

        $data['uniformity_of_dosage']=
        $this->db->select('*')->get_where('uniformity_of_dosage', array('test_request_id' => $test_request_id))->result_array();
            

        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.strength_concentration,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       
        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/full_assay_hplc_internal_method_worksheet_view',$data);
        $this->load->helper(array('form'));

    }

    function full_worksheet_hplc_injections(){
    
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $status=0; 

        $data['hplc_injections_monograph']=
        $this->db->select('*')->get_where('assay_monograph_hplc_injections', array('test_request_id' => $test_request_id))->result_array();
        
        $data['hplc_injections']=
        $this->db->select('*')->get_where('assay_hplc_injections', array('test_request_id' => $test_request_id))->result_array();
        
        $data['hplc_injections_reagents']=
        $this->db->select('*')->get_where('assay_hplc_injections_reagents', array('test_request_id' => $test_request_id))->result_array();

        $data['hplc_injections_peak_area_chromatograms']=
        $this->db->select('*')->get_where('assay_hplc_injections_peak_area_chromatograms', array('test_request_id' => $test_request_id))->result_array();

        $data['hplc_injections_chromatograms']=
        $this->db->select('*')->get_where('assay_hplc_injections_chromatograms', array('test_request_id' => $test_request_id))->result_array();
        
        $data['hplc_injections_chromatography_checklist']=
        $this->db->select('*')->get_where('assay_hplc_injections_chromatography_checklist', array('test_request_id' => $test_request_id))->result_array();

        $data['hplc_injections_chromatographic_conditions']=
        $this->db->select('*')->get_where('assay_hplc_injections_chromatographic_conditions', array('test_request_id' => $test_request_id))->result_array();

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();


        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
        

        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/full_assay_hplc_injections_worksheet_view',$data);
        $this->load->helper(array('form'));

    }

    function full_worksheet_hplc_internal_hplc_injections(){
    
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $status=0; 

        $data['hplc_injections_monograph']=
        $this->db->select('*')->get_where('assay_monograph_hplc_injections', array('test_request_id' => $test_request_id))->result_array();
        
        $data['hplc_injections']=
        $this->db->select('*')->get_where('assay_hplc_injections', array('test_request_id' => $test_request_id))->result_array();
        
        $data['hplc_injections_reagents']=
        $this->db->select('*')->get_where('assay_hplc_injections_reagents', array('test_request_id' => $test_request_id))->result_array();

        $data['hplc_injections_peak_area_chromatograms']=
        $this->db->select('*')->get_where('assay_hplc_injections_peak_area_chromatograms', array('test_request_id' => $test_request_id))->result_array();

        $data['hplc_injections_chromatograms']=
        $this->db->select('*')->get_where('assay_hplc_injections_chromatograms', array('test_request_id' => $test_request_id))->result_array();
        
        $data['hplc_injections_chromatography_checklist']=
        $this->db->select('*')->get_where('assay_hplc_injections_chromatography_checklist', array('test_request_id' => $test_request_id))->result_array();

        $data['hplc_injections_chromatographic_conditions']=
        $this->db->select('*')->get_where('assay_hplc_injections_chromatographic_conditions', array('test_request_id' => $test_request_id))->result_array();

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();


        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
        

        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/full_assay_hplc_injections_worksheet_view',$data);
        $this->load->helper(array('form'));

    }

    function full_worksheet_hplc_internal_method_two_components(){
    
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $status=0; 

        $data['hplc_internal_monograph']=
        $this->db->select('*')->get_where('assay_monograph_hplc_internal_method', array('test_request_id' => $test_request_id))->result_array();
        
        $data['hplc_internal_method']=
        $this->db->select('*')->get_where('assay_hplc_internal_method', array('test_request_id' => $test_request_id))->result_array();
        
        $data['hplc_internal_method_reagents']=
        $this->db->select('*')->get_where('assay_hplc_internal_method_reagents', array('test_request_id' => $test_request_id))->result_array();

        $data['hplc_internal_method_peak_area_chromatograms']=
        $this->db->select('*')->get_where('assay_hplc_internal_method_peak_area_chromatograms', array('test_request_id' => $test_request_id))->result_array();

        $data['hplc_internal_method_chromatograms']=
        $this->db->select('*')->get_where('assay_hplc_internal_method_chromatograms', array('test_request_id' => $test_request_id))->result_array();
        
        $data['hplc_internal_method_chromatography_checklist']=
        $this->db->select('*')->get_where('assay_hplc_internal_method_chromatography_checklist', array('test_request_id' => $test_request_id))->result_array();

        $data['hplc_internal_method_chromatographic_conditions']=
        $this->db->select('*')->get_where('assay_hplc_internal_method_chromatographic_conditions', array('test_request_id' => $test_request_id))->result_array();

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();


        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
         

        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/full_assay_hplc_internal_method_two_components_worksheet_view',$data);
        $this->load->helper(array('form'));

    }

    function full_worksheet_hplc_area_method_single_component(){
    
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $status=0; 

        $data['hplc_area_method_single_component_monograph']=
        $this->db->select('*')->get_where('assay_monograph_hplc_area_method_single_component', array('test_request_id' => $test_request_id))->result_array();
        
        $data['hplc_area_method_single_component']=
        $this->db->select('*')->get_where('assay_hplc_area_method_single_component', array('test_request_id' => $test_request_id))->result_array();
        
        $data['hplc_area_method_single_component_reagents']=
        $this->db->select('*')->get_where('assay_hplc_area_method_single_component_reagents', array('test_request_id' => $test_request_id))->result_array();

        $data['hplc_area_method_single_component_peak_area_chromatograms']=
        $this->db->select('*')->get_where('assay_hplc_area_method_single_comp_peak_area_chromatograms', array('test_request_id' => $test_request_id))->result_array();

        $data['hplc_area_method_single_component_chromatograms']=
        $this->db->select('*')->get_where('assay_hplc_area_method_single_component_chromatograms', array('test_request_id' => $test_request_id))->result_array();
        
        $data['hplc_area_method_single_component_chromatography_checklist']=
        $this->db->select('*')->get_where('assay_hplc_area_method_single_comp_chromatography_checklist', array('test_request_id' => $test_request_id))->result_array();

        $data['hplc_area_method_single_component_chromatographic_conditions']=
        $this->db->select('*')->get_where('assay_hplc_area_method_single_comp_chromatographic_conditions', array('test_request_id' => $test_request_id))->result_array();

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();


        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/full_assay_hplc_area_method_single_component_worksheet_view',$data);
        $this->load->helper(array('form'));

    }

    function full_worksheet_hplc_area_method_two_components(){
    
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $test_type_id=$this->uri->segment(5);
        $status=0; 

        $data['hplc_area_method_two_components_monograph']=
        $this->db->select('*')->get_where('assay_monograph_hplc_area_method_two_components', array('test_request_id' => $test_request_id))->result_array();
        
        $data['hplc_area_method_two_components']=
        $this->db->select('*')->get_where('assay_hplc_area_method_two_components', array('test_request_id' => $test_request_id))->result_array();
        
        $data['hplc_area_method_two_components_reagents']=
        $this->db->select('*')->get_where('assay_hplc_area_method_two_components_reagents', array('test_request_id' => $test_request_id))->result_array();

        $data['hplc_area_method_two_components_comp_one_peak_area_chromatograms']=
        $this->db->select('*')->get_where('assay_hplc_area_method_two_comp_one_peak_area_chromatograms', array('test_request_id' => $test_request_id))->result_array();

        $data['hplc_area_method_two_components_comp_two_peak_area_chromatograms']=
        $this->db->select('*')->get_where('assay_hplc_area_method_two_comp_two_peak_area_chromatograms', array('test_request_id' => $test_request_id))->result_array();

        $data['hplc_area_method_tow_components_chromatograms']=
        $this->db->select('*')->get_where('assay_hplc_area_method_two_components_two_chromatograms', array('test_request_id' => $test_request_id))->result_array();
        
        $data['hplc_area_method_two_components_chromatography_checklist']=
        $this->db->select('*')->get_where('assay_hplc_area_method_two_components_chromatography_checklist', array('test_request_id' => $test_request_id))->result_array();

        $data['hplc_area_method_two_components_chromatographic_conditions']=
        $this->db->select('*')->get_where('assay_hplc_area_method_two_components_chromatographic_conditions', array('test_request_id' => $test_request_id))->result_array();

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();


        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/full_assay_hplc_area_method_two_components_worksheet_view',$data);
        $this->load->helper(array('form'));

    }

    function monograph_hplc_internal_method() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
       
        $data['request']=
         $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        
        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/assay_monograph_hplc_internal_method',$data);
        $this->load->helper(array('form'));
    }

    function monograph_hplc_injections() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        
        $data['monograph']=
        $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array();
        
        $data['request']=
         $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        
        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/assay_monograph_hplc_injections',$data);
        $this->load->helper(array('form'));
    }

    function monograph_hplc_internal_method_two_components() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
       
        $data['request']=
         $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        
        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/assay_monograph_hplc_internal_method_two_components',$data);
        $this->load->helper(array('form'));
    }

    function view_monograph_hplc_internal_method() {
    
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $test_type=6;
       
        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();
        
        $data['sql']=
        $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array();

        $data['monograph_specifications']=
        $this->db->select('*')->get_where('monograph_specifications', array('test_type' => $test_type, 'test_request_id' => $test_request_id))->result_array();
        
        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/assay_specifications_view',$data);
        $this->load->helper(array('form'));
    }

    function view_monograph_hplc_injections() {
    
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
       
        $data['request']=
         $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();
        $data['sql']=
         $this->db->select('*')->get_where('assay_monograph_hplc_injections', array('assignment_id' => $assignment_id))->result_array();

        
        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/view_monograph_injections',$data);
        $this->load->helper(array('form'));
    }

    function view_monograph_hplc_internal_method_two_components() {
    
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
       
        $data['request']=
         $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();
        $data['sql']=
         $this->db->select('*')->get_where('assay_monograph_hplc_internal_method_two_components', array('assignment_id' => $assignment_id))->result_array();

        
        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/view_monograph_internal_method_two_components',$data);
        $this->load->helper(array('form'));
    }

    function view_monograph_hplc_area_method_single_component() {
    
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
       
        $data['request']=
         $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('test_request_id' => $test_request_id))->result_array();
        $data['sql']=
         $this->db->select('*')->get_where('assay_monograph_hplc_area_method_single_component', array('assignment_id' => $assignment_id))->result_array();

        
        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/view_monograph',$data);
        $this->load->helper(array('form'));
    }

    function view_monograph_area_method_two_components() {
    
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
       
        $data['request']=
         $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('test_request_id' => $test_request_id))->result_array();
        $data['sql']=
         $this->db->select('*')->get_where('assay_monograph_hplc_area_method_two_components', array('assignment_id' => $assignment_id))->result_array();

        
        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/view_monograph_area_method_two_components',$data);
        $this->load->helper(array('form'));
    }

    function monograph_area_method_single_component() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        

        $data['request']=
         $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        
        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       
        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/assay_monograph_hplc_are_method_single_component',$data);
        $this->load->helper(array('form'));
    }
    
    function monograph_area_method_two_components() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        

        $data['request']=
         $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        
        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/assay_monograph_hplc_are_method_two_components',$data);
        $this->load->helper(array('form'));
    }
    
    function monograph_hplc_area_method_two_components_dif_methods() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        

        $data['request']=
         $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        
        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/assay_monograph_hplc_are_method_two_components_dif_methods',$data);
        $this->load->helper(array('form'));
    }

    function view_monograph_hplc_area_method_two_components_dif_methods() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql']=
        $this->db->select('*')->get_where('assay_monograph_hplc_area_method_two_components_dif_methods', array('assignment_id' => $assignment_id))->result_array();

        
        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/view_assay_monograph_hplc_are_method_two_components_dif_methods',$data);
        $this->load->helper(array('form'));
    }

    function monograph_hplc_area_method_two_oral_liquids_single_component() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        

        $data['request']=
         $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        
        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/assay_monograph_hplc_area_method_two_oral_liquids_single_component',$data);
        $this->load->helper(array('form'));
    }

    function view_monograph_hplc_area_method_two_oral_liquids_single_component() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        

        $data['request']=
         $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql']=
        $this->db->select('*')->get_where('assay_monograph_hplc_area_method_oral_liquids_single_component', array('assignment_id' => $assignment_id))->result_array();


        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/view_assay_monograph_ham_two_oral_liquids_single_component',$data);
        $this->load->helper(array('form'));
    }

    function monograph_hplc_area_method_two_oral_liquids_two_components() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        

        $data['request']=
         $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        
        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/assay_monograph_hplc_area_method_two_oral_liquids_two_components',$data);
        $this->load->helper(array('form'));
    }

    function view_monograph_hplc_area_method_two_oral_liquids_two_components() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        

        $data['request']=
         $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql']=
        $this->db->select('*')->get_where('assay_monograph_hplc_area_method_oral_liquids_two_components', array('assignment_id' => $assignment_id))->result_array();


        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/view_assay_monograph_ham_two_oral_liquids_two_components',$data);
        $this->load->helper(array('form'));
    }
    function monograph_hplc_area_method_powder_for_oral_liquids() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        

        $data['request']=
         $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        
        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/assay_monograph_hplc_area_method_powder_for_oral_liquids',$data);
        $this->load->helper(array('form'));
    }

    function view_monograph_hplc_area_method_powder_for_oral_liquids() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        

        $data['request']=
         $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql']=
        $this->db->select('*')->get_where('assay_monograph_hplc_area_method_powder_for_oral_liquids', array('assignment_id' => $assignment_id))->result_array();
        
        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/view_assay_monograph_hplc_area_method_powder_for_oral_liquids',$data);
        $this->load->helper(array('form'));
    }

    function monograph_hplc_area_method_injection_powder_single_component() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        

        $data['request']=
         $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        
        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/assay_monograph_hplc_area_method_injection_powder_single_component',$data);
        $this->load->helper(array('form'));

    }
    function view_monograph_hplc_area_method_injection_powder_single_component() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql']=
        $this->db->select('*')->get_where('assay_monograph_hplc_area_method_injection_powder_single_comp', array('assignment_id' => $assignment_id))->result_array();
        
        
        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/view_assay_monograph_ham_injection_powder_single_component',$data);
        $this->load->helper(array('form'));
    }
    function monograph_hplc_area_method_injection_powder_two_components() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        
        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/assay_monograph_hplc_area_method_injection_powder_two_components',$data);
        $this->load->helper(array('form'));
    }

    function monograph_titration() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        

        $data['request']=
         $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        
        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
         

        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/assay_monograph_titration',$data);
        $this->load->helper(array('form'));
    }

    function view_monograph_titration() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql']=
        $this->db->select('*')->get_where('assay_monograph_titration', array('assignment_id' => $assignment_id))->result_array();
        
        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/view_assay_monograph_titration',$data);
        $this->load->helper(array('form'));
    }

    function monograph_indometric_titration() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        

        $data['request']=
         $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        
        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       
        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/assay_monograph_indometric_titration',$data);
        $this->load->helper(array('form'));
    }

    function view_monograph_indometric_titration() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql']=
        $this->db->select('*')->get_where('assay_monograph_indometric_titration', array('assignment_id' => $assignment_id))->result_array();
        
        
        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/view_assay_monograph_indometric_titration',$data);
        $this->load->helper(array('form'));
    }

    function monograph_ultraviolet_single_component() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        

        $data['request']=
         $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        
        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/assay_monograph_ultraviolet_single_component',$data);
        $this->load->helper(array('form'));
    }

    function monograph_ultraviolet_two_components() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        

        $data['request']=
         $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        
       $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        $this->load->view('assay/assay_monograph_ultraviolet_two_components',$data);
        $this->load->helper(array('form'));
    }

    function worksheet_area_method_single_component() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $status=0; 

        $data['assay_monograph_hplc_area_method_single_component']=$this->db->select('*')->get_where('assay_monograph_hplc_area_method_single_component', array('assay_monograph_hplc_area_method_single_component.test_request_id' => $test_request_id))->result_array();
        

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();


        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        // var_dump($results);
        // die;
     
        $this->load->view('assay/assay_hplc_area_method_single_component',$data);
        $this->load->helper(array('form'));
    }

    function worksheet_area_method_two_components() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $status=0; 

        $data['assay_monograph_hplc_area_method_two_components']=$this->db->select('*')->get_where('assay_monograph_hplc_area_method_two_components', array('test_request_id' => $test_request_id))->result_array();
        
        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();


        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        // var_dump($results);
        // die;
     
        $this->load->view('assay/assay_hplc_area_method_two_components',$data);
        $this->load->helper(array('form'));
    }
    
    function worksheet_area_method_two_components_different_methods(){

        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $status=0; 

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();


        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        // var_dump($results);
        // die;
     
        $this->load->view('assay/assay_hplc_area_method_two_components_different_methods',$data);
        $this->load->helper(array('form'));
    }

    function worksheet_oral_liquids_single_component(){

        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $status=0; 

        $data['assay_monograph_hplc_area_method_oral_liquids_single_component']=
        $this->db->select('*')->get_where('assay_monograph_hplc_area_method_oral_liquids_single_component', array('test_request_id' => $test_request_id))->result_array();

        $data['assay_hplc_area_method_oral_liquids_single_component']=
        $this->db->select('assay_hplc_area_method_oral_liquids_single_component.test_status')->get_where('assay_hplc_area_method_oral_liquids_single_component', array('id' => $test_request_id))->result_array();

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();


        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        // var_dump($results);
        // die;
     
        $this->load->view('assay/assay_hplc_area_method_oral_liquids_single_component',$data);
        $this->load->helper(array('form'));
    }

    function worksheet_oral_liquids_two_components(){

        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $status=0; 

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();


        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        // var_dump($results);
        // die;
     
        $this->load->view('assay/assay_hplc_area_method_oral_liquids_two_components',$data);
        $this->load->helper(array('form'));
    }

    function worksheet_powder_for_oral_liquids(){

        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $status=0; 

        $data['assay_monograph_hplc_area_method_powder_for_oral_liquids']=
        $this->db->select('*')->get_where('assay_monograph_hplc_area_method_powder_for_oral_liquids', array('test_request_id' => $test_request_id))->result_array();

        $data['assay_hplc_area_method_powder_for_oral_liquids']=
        $this->db->select('assay_hplc_area_method_powder_for_oral_liquids.test_status')->get_where('assay_hplc_area_method_powder_for_oral_liquids', array('id' => $test_request_id))->result_array();

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();


        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        // var_dump($results);
        // die;
     
        $this->load->view('assay/assay_hplc_area_method_powder_for_oral_liquids',$data);
        $this->load->helper(array('form'));

    }

    function worksheet_injection_powder_single_component(){

        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $status=0; 

        $data[' assay_monograph_hplc_area_method_injection_powder_single_comp']=
        $this->db->select('*')->get_where(' assay_monograph_hplc_area_method_injection_powder_single_comp', array('test_request_id' => $test_request_id))->result_array();

        $data['assay_hplc_area_method_injection_powder_single_component']=
        $this->db->select('assay_hplc_area_method_injection_powder_single_component.test_status')->get_where('assay_hplc_area_method_injection_powder_single_component', array('id' => $test_request_id))->result_array();

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();


        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       


        $results=$query->result_array();
        $data['query']=$results[0];
        
        // var_dump($results);
        // die;
     
        $this->load->view('assay/assay_hplc_area_method_injection_powder_single_component',$data);
        $this->load->helper(array('form'));
    }

    function worksheet_injection_powder_two_components(){

        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $status=0; 

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();


        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        // var_dump($results);
        // die;
     
        $this->load->view('assay/assay_hplc_area_method_injection_powder_two_components',$data);
        $this->load->helper(array('form'));
    }

    function worksheet_internal_method_single_component() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $test_type_id=$this->uri->segment(5);
        $status=0;
        $user_id=6;

        $data['users']=
        $this->db->select('*')->get_where('user', array('user_type' => $user_id))->result_array();
     
        $data['monograph']=
        $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array();
        
        $data['hplc_internal_method']=
        $this->db->select('assay_hplc_internal_method.test_status')->get_where('assay_hplc_internal_method', array('id' => $test_type_id))->result_array();

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();
        
        $data['uniformity_of_dosage']=
        $this->db->select('*')->get_where('uniformity_of_dosage', array('test_request_id' => $test_request_id))->result_array();
        

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();


        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.strength_concentration,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];  
        
        $this->load->view('assay/assay_hplc_internal_method_single_component',$data);
        $this->load->helper(array('form'));
    }

    function worksheet_cream() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $test_type_id=$this->uri->segment(5);
        $status=0;
        $user_id=6;

        $data['users']=
        $this->db->select('*')->get_where('user', array('user_type' => $user_id))->result_array();
     
        $data['hplc_cream_monograph']=
        $this->db->select('*')->get_where('assay_monograph_hplc_cream', array('test_request_id' => $test_request_id))->result_array();

        $data['hplc_cream']=
        $this->db->select('assay_hplc_cream.test_status')->get_where('assay_hplc_cream', array('id' => $test_type_id))->result_array();

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();
        
        $data['uniformity_of_dosage']=
        $this->db->select('*')->get_where('uniformity_of_dosage', array('test_request_id' => $test_request_id))->result_array();
        

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();


        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        // var_dump($results);
        // die;
     
        $this->load->view('assay/assay_hplc_cream',$data);
        $this->load->helper(array('form'));
    }

    function worksheet_ointment() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $test_type_id=$this->uri->segment(5);
        $status=0;
        $user_id=6;

        $data['users']=
        $this->db->select('*')->get_where('user', array('user_type' => $user_id))->result_array();
     
        $data['hplc_ointment_monograph']=
        $this->db->select('*')->get_where('assay_monograph_hplc_ointment', array('test_request_id' => $test_request_id))->result_array();

        $data['hplc_ointment']=
        $this->db->select('assay_hplc_ointment.test_status')->get_where('assay_hplc_ointment', array('id' => $test_type_id))->result_array();

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();
        
        $data['uniformity_of_dosage']=
        $this->db->select('*')->get_where('uniformity_of_dosage', array('test_request_id' => $test_request_id))->result_array();
        

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();


        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        // var_dump($results);
        // die;
     
        $this->load->view('assay/assay_hplc_ointment',$data);
        $this->load->helper(array('form'));
    }

    function worksheet_injections() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $test_type_id=$this->uri->segment(5);
        $status=0;
        $user_id=6;

        $data['users']=
        $this->db->select('*')->get_where('user', array('user_type' => $user_id))->result_array();
     
        $data['hplc_injections_monograph']=
        $this->db->select('*')->get_where('assay_monograph_hplc_injections', array('test_request_id' => $test_request_id))->result_array();

        $data['hplc_injections']=
        $this->db->select('assay_hplc_injections.test_status')->get_where('assay_hplc_injections', array('id' => $test_type_id))->result_array();

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();
        
        $data['uniformity_of_dosage']=
        $this->db->select('*')->get_where('uniformity_of_dosage', array('test_request_id' => $test_request_id))->result_array();
        

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['reagents']=
        $this->db->select('*')->get_where('reagents_inventory_record', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();


        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
     
        $this->load->view('assay/assay_hplc_injections',$data);
        $this->load->helper(array('form'));
    }

    function worksheet_internal_method_two_components() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $test_type_id=$this->uri->segment(5);
        $status=0; 

        $data['monograph']=
        $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array();
        
        $data['reagents']=
        $this->db->select('*')->get_where('reagents_inventory_record', array('status' => $status))->result_array();

        $data['component_names']=
        $this->db->select('*')->get_where('components', array('test_request_id' => $test_request_id))->result_array();

        $data['hplc_internal_method']=
        $this->db->select('assay_hplc_internal_method.test_status')->get_where('assay_hplc_internal_method', array('id' => $test_type_id))->result_array();

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();


        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       

        $results=$query->result_array();
        $data['query']=$results[0];
        
        // var_dump($results);
        // die;
     
        $this->load->view('assay/assay_hplc_internal_method_two_components',$data);
        $this->load->helper(array('form'));
    }


    function worksheet_ultravioletv_single_component() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $status=0; 

        $data['assay_monograph_ultraviolet_single_component']=
        $this->db->select('*')->get_where('assay_monograph_ultraviolet_single_component', array('test_request_id' => $test_request_id))->result_array();

        $data['assay_ultraviolet_single_component']=
        $this->db->select('assay_ultraviolet_single_component.test_status')->get_where('assay_ultraviolet_single_component', array('id' => $test_request_id))->result_array();

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();


        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       
        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        // var_dump($results);
        // die;
     
        $this->load->view('assay/assay_ultraviolet_single_component',$data);
        $this->load->helper(array('form'));
    }

    function worksheet_ultravioletv_two_components() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $status=0; 

       $data['assay_monograph_ultraviolet_two_components']=
        $this->db->select('*')->get_where('assay_monograph_ultraviolet_two_components', array('test_request_id' => $test_request_id))->result_array();

        $data['assay_ultraviolet_two_components']=
        $this->db->select('assay_ultraviolet_two_components.test_status')->get_where('assay_ultraviolet_two_components', array('id' => $test_request_id))->result_array();

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();


        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       
        $results=$query->result_array();
        $data['query']=$results[0];
        
        
        // var_dump($results);
        // die;
     
        $this->load->view('assay/assay_ultraviolet_two_components',$data);
        $this->load->helper(array('form'));
    }

    function worksheet_titration() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $status=0; 

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();


        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       
        $results=$query->result_array();
        $data['query']=$results[0];
        
        // var_dump($results);
        // die;
     
        $this->load->view('assay/assay_titration_view',$data);
        $this->load->helper(array('form'));
    }

    function worksheet_indometric_titration() {
        
        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $status=0; 

        $data['assay_monograph_indometric_titration']=
        $this->db->select('*')->get_where('assay_monograph_indometric_titration', array('test_request_id' => $test_request_id))->result_array();

        $data['assay_indometric_titration']=
        $this->db->select('assay_indometric_titration.test_status')->get_where('assay_indometric_titration', array('id' => $test_request_id))->result_array();

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();


        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       
        $results=$query->result_array();
        $data['query']=$results[0];
        
        // var_dump($results);
        // die;
     
        $this->load->view('assay/assay_titration_indometric_view',$data);
        $this->load->helper(array('form'));
    }

    function worksheet_karl_fisher(){

        $assignment_id= $this->uri->segment(3);
        $test_request_id=$this->uri->segment(4);
        $status=0; 

        $data['request']=
        $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

        $data['sql_equipment']=
        $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

        $data['sql_standards']=
        $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

        $data['sql_columns']=
        $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();


        $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
       
        $results=$query->result_array();
        $data['query']=$results[0];
        
        // var_dump($results);
        // die;
     
        $this->load->view('assay/assay_karl_fisher',$data);
        $this->load->helper(array('form'));

    }

    function save_hplc_single_method(){
        
       

        if ($this->input->post('submit')) {
            $this->assay_model->process_hplc_single_method();
        }                
    }
    function save_multicomponent_area_method(){
        
       

        if ($this->input->post('submit')) {
            $this->assay_model->process_multicomponent_area_method();
        }
    }                    
    function save_cream(){
        
       

        if ($this->input->post('submit')) {
            $this->assay_model->process_cream();
        }                
    }
    function save_ointment(){
        
       

        if ($this->input->post('submit')) {
            $this->assay_model->process_ointment();
        }                
    }
    function save_injections(){
        
       

        if ($this->input->post('submit')) {
            $this->assay_model->process_injections();
        }                
    }
    function save_reagents(){ 
       
        if ($this->input->post('submit')) {
            $this->assay_model->process_reagents();
        }                
    }
    function save_area_method_single_component(){
       

        if ($this->input->post('submit')) {
            $this->assay_model->process_area_method_single_component();
        }
    }                
    function save_area_method_two_components(){
       

        if ($this->input->post('submit')) {
            $this->assay_model->process_area_method_two_components();
        }                
    }
    function save_indometric_titration(){
       

        if ($this->input->post('submit')) {
            $this->assay_model->process_indometric_titration();
        }                
    }
    function save_monograph_hplc_internal_method(){
       

        if ($this->input->post('submit')) {
            $this->assay_model->process_monograph_hplc_internal_method();
        }                
    }
    function save_monograph_hplc_internal_method_two_components(){
       

        if ($this->input->post('submit')) {
            $this->assay_model->process_monograph_hplc_internal_method_two_components();
        }                
    }
    function save_monograph_hplc_area_method_single_component(){
       

        if ($this->input->post('submit')) {
            $this->assay_model->process_monograph_hplc_area_method_single_component();
        }                
    }
    function save_monograph_hplc_area_method_two_components(){
       

        if ($this->input->post('submit')) {
            $this->assay_model->process_monograph_hplc_area_method_two_components();
        }                
    }
    function save_monograph_hplc_area_method_two_components_different_methods(){
       

        if ($this->input->post('submit')) {
            $this->assay_model->process_monograph_hplc_area_method_two_components_different_methods();
        }                
    }
    function save_monograph_hplc_area_method_oral_liquids_single_component(){
       

        if ($this->input->post('submit')) {
            $this->assay_model->process_monograph_hplc_area_method_oral_liquids_single_component();
        }                
    }
    function save_monograph_hplc_area_method_oral_liquids_two_components(){
       

        if ($this->input->post('submit')) {
            $this->assay_model->process_monograph_hplc_area_method_oral_liquids_two_components();
        }                
    }
    function save_monograph_hplc_area_method_powder_for_oral_liquids(){
       

        if ($this->input->post('submit')) {
            $this->assay_model->process_monograph_hplc_area_method_powder_for_oral_liquids();
        }                
    }
    function save_monograph_hplc_area_method_injection_powder_single_component(){
       

        if ($this->input->post('submit')) {
            $this->assay_model->process_monograph_hplc_area_method_injection_powder_single_component();
        }                
    }
    function save_monograph_hplc_area_method_injection_powder_two_components(){
       

        if ($this->input->post('submit')) {
            $this->assay_model->process_monograph_hplc_area_method_injection_powder_two_components();
        }                
    }
    function save_monograph_titration(){
       

        if ($this->input->post('submit')) {
            $this->assay_model->process_monograph_titration();
        }                
    }
    function save_monograph_indometric_titration(){
       

        if ($this->input->post('submit')) {
            $this->assay_model->process_monograph_indometric_titration();
        }                
    }
    function save_monograph_ultraviolet(){
       
        if ($this->input->post('submit')) {
            $this->assay_model->process_monograph_ultraviolet();
        }                
    }
    function save_assay_specifications(){

        if ($this->input->post('submit')) {
            $this->assay_model->process_specifications();
        }                
    }
    
}