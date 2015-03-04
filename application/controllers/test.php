<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {
function __construct()
 {
   parent::__construct();
   $this->load->helper(array('form', 'url'));
 }
function test_column(){
    $this->load->view('test_columns');

}

function index(){
    $id= $this->uri->segment(3);    
    $trid= $this->uri->segment(4);
    $test_type_id= $this->uri->segment(5);

    $data['request']=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
    test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
    test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.request_status')->get_where('test_request', array('id' => $trid))->result_array();
    
    $result=$this->db->select('test_request.tests')->get_where('test_request', array('id' => $trid))->result_array();
    $return= explode( ",", $result[0]['tests'] );
    $data['tests']=$return; 

    $test_type_sql=$this->db->select('monograph_specifications.test_type')->get_where('monograph_specifications', array('id' => $trid))->result_array();
    $return=array();
    foreach ($test_type_sql as $key => $value_a) {
          $return[]=$value_a['test_type'];
    }
    $data['test_type_specifications']=$return; 

    $hplc_internal_method=$this->db->select('*')->get_where('assay_hplc_internal_method', array('test_request_id' => $trid))->result_array();
     $return= array();
    foreach ($hplc_internal_method as $key => $value) {
    $return[]=$value['test_status'];
    }
    $data['hplc_internal_method']=$return;

    $data['hplc_ointment']=$this->db->select('assay_hplc_ointment.test_status')->get_where('assay_hplc_ointment', array('test_request_id' => $trid))->result_array();
    $data['hplc_cream']=$this->db->select('assay_hplc_injections.test_cream')->get_where('assay_hplc_injections', array('test_request_id' => $trid))->result_array();
    $data['hplc_injections']=$this->db->select('assay_hplc_injections.test_status')->get_where('assay_hplc_injections', array('test_request_id' => $trid))->result_array();
    $data['hplc_internal_method_two_components']=$this->db->select('assay_hplc_internal_method_two_components.test_status')->get_where('assay_hplc_internal_method_two_components', array('test_request_id' => $trid))->result_array();
    $data['assay_hplc_area_method_single_component']=$this->db->select('assay_hplc_area_method_single_component.test_status')->get_where('assay_hplc_area_method_single_component', array('test_request_id' => $trid))->result_array();
    $data['assay_hplc_area_method_multicomponent']=$this->db->select('assay_hplc_area_method_multicomponent.test_status')->get_where('assay_hplc_area_method_multicomponent', array('test_request_id' => $trid))->result_array();
    $data['assay_hplc_area_method_two_components_different_methods']=$this->db->select('assay_hplc_area_method_two_components_different_methods.test_status')->get_where('assay_hplc_area_method_two_components_different_methods', array('test_request_id' => $trid))->result_array();
    $data['assay_hplc_area_method_oral_liquids_single_component']=$this->db->select('assay_hplc_area_method_oral_liquids_single_component.test_status')->get_where('assay_hplc_area_method_oral_liquids_single_component', array('test_request_id' => $trid))->result_array();
    $data['assay_hplc_area_method_oral_liquids_two_components']=$this->db->select('assay_hplc_area_method_oral_liquids_two_components.test_status')->get_where('assay_hplc_area_method_oral_liquids_two_components', array('test_request_id' => $trid))->result_array();
    $data['assay_hplc_area_method_powder_for_oral_liquids']=$this->db->select('assay_hplc_area_method_powder_for_oral_liquids.test_status')->get_where('assay_hplc_area_method_powder_for_oral_liquids', array('test_request_id' => $trid))->result_array();
    $data['assay_hplc_area_method_injection_powder_single_component']=$this->db->select('assay_hplc_area_method_injection_powder_single_component.test_status')->get_where('assay_hplc_area_method_injection_powder_single_component', array('test_request_id' => $trid))->result_array();
    $data['assay_hplc_area_method_injection_powder_two_components']=$this->db->select('assay_hplc_area_method_injection_powder_two_components.test_status')->get_where('assay_hplc_area_method_injection_powder_two_components', array('test_request_id' => $trid))->result_array();
    $data['assay_titration']=$this->db->select('assay_titration.test_status')->get_where('assay_titration', array('test_request_id' => $trid))->result_array();
    $data['assay_indometric_titration']=$this->db->select('assay_indometric_titration.test_status')->get_where('assay_indometric_titration', array('test_request_id' => $trid))->result_array();
    $data['assay_ultraviolet_single_component']=$this->db->select('assay_ultraviolet_single_component.test_status')->get_where('assay_ultraviolet_single_component', array('test_request_id' => $trid))->result_array();
    $data['assay_ultraviolet_two_components']=$this->db->select('assay_ultraviolet_two_components.test_status')->get_where('assay_ultraviolet_two_components', array('test_request_id' => $trid))->result_array();
    $data['water_method']=$this->db->select('*')->get_where('water_method', array('test_request_id' => $trid))->result_array();
    $fri=$this->db->select('*')->get_where('friability', array('test_request_id' => $trid))->result_array();
     $return= array();
    foreach ($fri as $key => $value_c) {
          $return[]=$value_c['test_status'];
    }
    $data['friability']=$return;

    $ph_alkalinity=$this->db->select('*')->get_where('ph_alkalinity', array('test_request_id' => $trid))->result_array();
    $return= array();
    foreach ($ph_alkalinity as $key => $value_b) {
          $return[]=$value_b['status'];
    }
    $data['ph_alkalinity']=$return;
    
    //General tests queries
    $data['acidity_alkalinity']=$this->db->select('acidity_alkalinity.status')->get_where('acidity_alkalinity', array('test_request_id' => $trid))->result_array();
    $data['oxidisables']=$this->db->select('oxidisable.status')->get_where('oxidisable', array('test_request_id' => $trid))->result_array();
    $data['chlorides']=$this->db->select('chlorides.status')->get_where('chlorides', array('test_request_id' => $trid))->result_array();
    
    $data['weight_variation']=$this->db->select('*')->get_where('weight_variation', array('test_request_id' => $trid))->result_array();
    $data['content_uniformity']=$this->db->select('*')->get_where('content_uniformity', array('test_request_id' => $trid))->result_array();
    
    $data['weight_variation_hplc_single_component']=$this->db->select('weight_variation_hplc_single_component.test_status')->get_where('weight_variation_hplc_single_component', array('test_request_id' => $trid))->result_array();
    $data['weight_variation_hplc_two_components']=$this->db->select('weight_variation_hplc_two_components.test_status')->get_where('weight_variation_hplc_two_components', array('test_request_id' => $trid))->result_array();
    $data['content_uniformity_hplc_single_component']=$this->db->select('content_uniformity_hplc_single_component.test_status')->get_where('content_uniformity_hplc_single_component', array('test_request_id' => $trid))->result_array();
    $data['content_uniformity_hplc_two_components']=$this->db->select('content_uniformity_hplc_two_components.test_status')->get_where('content_uniformity_hplc_two_components', array('test_request_id' => $trid))->result_array();
    $data['content_uniformity_titration_single_component']=$this->db->select('content_uniformity_titration_single_component.test_status')->get_where('content_uniformity_titration_single_component', array('test_request_id' => $trid))->result_array();
    $data['content_uniformity_titration_two_components']=$this->db->select('content_uniformity_titration_two_components.test_status')->get_where('content_uniformity_titration_two_components', array('test_request_id' => $trid))->result_array();
    $data['content_uniformity_uv_single_component']=$this->db->select('content_uniformity_uv_single_component.test_status')->get_where('content_uniformity_uv_single_component', array('test_request_id' => $trid))->result_array();
    $data['content_uniformity_uv_two_components']=$this->db->select('content_uniformity_uv_two_components.test_status')->get_where('content_uniformity_uv_two_components', array('test_request_id' => $trid))->result_array();
    $data['uniformity_dosage']=$this->db->select('*')->get_where('uniformity_of_dosage', array('test_request_id' => $trid))->result_array();
    $sqla=$this->db->select('*')->get_where('uniformity_of_dosage', array('uniformity_of_dosage.test_request_id'=>$trid))->result_array();
    $return= array();
    foreach ($sqla as $key => $value_a) {
          $return[]=$value_a['method'];
    }
    $data['uniformity_of_dosage']=$return;
    
    $data['uniformity_of_dosage_multicomponent']=$this->db->select('*')->get_where('uniformity_of_dosage_multicomponent', array('test_request_id' => $trid))->result_array();
    $sqla=$this->db->select('*')->get_where('uniformity_of_dosage_multicomponent', array('uniformity_of_dosage_multicomponent.test_request_id'=>$trid))->result_array();
    $return= array();
    foreach ($sqla as $key => $value_a) {
          $return[]=$value_a['method_one'];
    }
    $data['uniformity_of_dosage_multicomponent']=$return;

    $data['uniformity_of_dosage_multicomponent']=$this->db->select('*')->get_where('uniformity_of_dosage_multicomponent', array('test_request_id' => $trid))->result_array();
    $sqla=$this->db->select('*')->get_where('uniformity_of_dosage_multicomponent', array('uniformity_of_dosage_multicomponent.test_request_id'=>$trid))->result_array();
    $return= array();
    foreach ($sqla as $key => $value_a) {
          $return[]=$value_a['method_one'];
    }
    $data['uniformity_of_dosage_multicomponent_m1']=$return;

    $data['uniformity_of_dosage_multicomponent']=$this->db->select('*')->get_where('uniformity_of_dosage_multicomponent', array('test_request_id' => $trid))->result_array();
    $sqla=$this->db->select('*')->get_where('uniformity_of_dosage_multicomponent', array('uniformity_of_dosage_multicomponent.test_request_id'=>$trid))->result_array();
    $return= array();
    foreach ($sqla as $key => $value_a) {
          $return[]=$value_a['method_two'];
    }
    $data['uniformity_of_dosage_multicomponent_m2']=$return;


    $data['uniformity_of_dosage_unit_single_component_uv_single_wavelength']=$this->db->select('uniformity_of_dosage_unit_single_component_uv_single_wavelength.test_status')->get_where('uniformity_of_dosage_unit_single_component_uv_single_wavelength', array('test_request_id' => $trid))->result_array();
    $data['uniformity_of_dosage_unit_two_components_uv_single_wavelength']=$this->db->select('uniformity_of_dosage_unit_two_components_uv_single_wavelength.test_status')->get_where('uniformity_of_dosage_unit_two_components_uv_single_wavelength', array('test_request_id' => $trid))->result_array();
    
     $sql=$this->db->select('*')->get_where('test_results', array('test_results.test_request_id'=>$trid))->result_array();
    $return= array();
    foreach ($sql as $key => $value) {
        $return[]=$value['test_type'];
    }    
    $data['test_results_test_type']=$return;

    $sql=$this->db->select('*')->get_where('monograph_specifications', array('monograph_specifications.test_request_id'=>$trid))->result_array();
    $return= array();
    foreach ($sql as $key => $value) {
        $return[]=$value['test_type'];
    }    

    $data['monograph_specifications']=$return;

    $full_monograph=$this->db->select('*')->get_where('full_monograph', array('full_monograph.test_request_id' => $trid))->result_array();
    
    if(empty($full_monograph)){
        $data['monograph'] = 0;
    }else{
        $data['monograph'] = $full_monograph;

        // get the tests to be done then expode then into an array
        foreach ($full_monograph as $key_ => $value_) {
            //print_r($value_);
              $tests_done=explode(',', $value_['tests_done']);
        }
        // echo"<pre>";print_r( $tests_done);die;
        $data['tests_done']=$tests_done;

        //convert the exploded array to one that is readable, i.e when using in_array() in the view
        if (empty($results_)) {       
        
            $tests_done = 0;
           
        }
        else{
            foreach ($results_ as $keys => $values) {
              $tests_done[]= $values;
          }
        }

    }

    

   

    $data['identification_assay']=$this->db->select('identification.status')->get_where('identification', array('identification.test_request' => $trid))->result_array();
    $data['identification_uv']=$this->db->select('identification_uv.status')->get_where('identification_uv', array('identification_uv.test_request' => $trid))->result_array();
    $data['identification_infrared']=$this->db->select('identification_infrared.status')->get_where('identification_infrared', array('identification_infrared.test_request' => $trid))->result_array();
    $data['identification_tlc']=$this->db->select('tlc.status')->get_where('tlc', array('tlc.test_request' => $trid))->result_array();
    $data['identification_hplc']=$this->db->select('identification_hplc.status')->get_where('identification_hplc', array('identification_hplc.test_request' => $trid))->result_array();
    $data['identification_chemical_method']=$this->db->select('identification_chemical_method.status')->get_where('identification_chemical_method', array('identification_chemical_method.test_request' => $trid))->result_array();
    $data['identification_thin_layer']=$this->db->select('identification_thin_layer.status')->get_where('identification_thin_layer', array('identification_thin_layer.test_request' => $trid))->result_array();
    $data['diss_uv']=$this->db->select('diss_data.status')->get_where('diss_data', array('diss_data.test_request' => $trid))->result_array();
    $data['dissolution_normal_hplc']=$this->db->select('diss_normal.status')->get_where('diss_normal', array('diss_normal.test_request' => $trid))->result_array();
    $data['dissolution_enteric_coated']=$this->db->select('diss_enteric_coated.status')->get_where('diss_enteric_coated', array('diss_enteric_coated.test_request' => $trid))->result_array();
    $data['dissolution_two_component']=$this->db->select('diss_two_components.status')->get_where('diss_two_components', array('diss_two_components.test_request' => $trid))->result_array();
    $data['dissolution_delayed']=$this->db->select('diss_delayed_release.status')->get_where('diss_delayed_release', array('diss_delayed_release.test_request' => $trid))->result_array();
    
    $query=$this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $id));
    
    $results=$query->result_array();
    $data['query']=$results[0];

    
    $this->load->view('test_conduction',$data);
    $this->load->helper(array('form'));
}
function monograph(){
   
    $assignment_id= $this->uri->segment(3);
    $test_request_id=$this->uri->segment(4);
    $component=1;
    $component2=2;
    $component3=1;
       
    $data['request']=
    $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();
    
    $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
    test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
    test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
    
    $result=$this->db->select('test_request.tests')->get_where('test_request', array('id' => $test_request_id))->result_array();
    $return= explode( ",", $result[0]['tests'] );
    $data['tests']=$return;

    $results=$query->result_array();
    $data['query']=$results[0];

    $data['subtests_multicomponent']=
    $this->db->select('*')->get_where('subtests', array('component' => $component2))->result_array();
    
    $data['subtests_single']=
    $this->db->select('*')->get_where('subtests', array('component' => $component))->result_array();
    

    $this->load->view('monograph',$data);
    $this->load->helper(array('form'));
}

function save_monograph(){
    $copy = $this->input->post('copy_paste');
    $upload_doc = $this->input->post('upload_document');


    if($this->input->post('upload')) {
            
         
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'gif|jpg|png|pdf|doc';
    $config['max_size'] = '100000';
    $config['max_width']  = '1024';
    $config['max_height']  = '768';

    $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload() && $upload_doc = 0){
          echo $upload_doc,$copy;
          $error = array('error' => $this->upload->display_errors());
          print_r($config['upload_path']);

          $this->load->view('upload_form', $error);
        }
        else
        {
           $data = $this->upload->data();
           // echo "<pre>";
           // print_r($data);die;
           $file_name = $data['file_name'];
           $full_path = $data['full_path'];

          $this->load->model('test_model');
          $path = $config['upload_path'];

          if($this->input->post('upload')) {
            $this->test_model->process_monograph($full_path, $file_name);
          } 

        }
    }
      
  }  
  function view_monograph(){
    $assignment_id= $this->uri->segment(3);
    $test_request_id=$this->uri->segment(4);
    $monograph_id=$this->uri->segment(5);

    $data['request']=
    $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();
    
    $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
    test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
    test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
    

    $results=$query->result_array();
    $data['query']=$results[0];

    $data['monograph_details'] = $this->db->select('*')->get_where('full_monograph', array('test_request_id'=>$test_request_id, 'id'=>$monograph_id))->result_array();
    $data['components'] = $this->db->select('*')->get_where('components', array('test_request_id'=>$test_request_id))->result_array();
   
    $this->load->view('monograph_view',$data);

  }

}
?>