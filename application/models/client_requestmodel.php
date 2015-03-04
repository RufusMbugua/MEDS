<?php
Class Client_Requestmodel extends CI_Model{
 function __construct()
 {
  parent::__construct();
 }
 function process(){
  
  $user_type_id=$this->input->post('id');
  
  $data=$this->db->select_max('id')->get('client_ref')->result();
  $request_type= 'CL/RQ/#'.$data[0]->id;
  $new_code=$applicant_reference_number=$this->input->post('capplicant_reference_number');
  $client_id_data=$this->db->select_max('id')->get('client')->result();
  $client_id= $client_id_data[0]->id;

  $data_ntr=$this->db->select_max('id')->get('test_request')->result();
  $test_request_id= $data_ntr[0]->id;
  $test_request_id++;  


//Sample Insertion
  $data_two = array(
   
   'active_ingredients'=>$this->input->post('cactive_ingredients'),
   'manufacturer_name'=>$this->input->post('cmanufacturer_name'),
   'manufacturer_address'=>$this->input->post('cmanufacturer_address'),
   'brand_name'=>$this->input->post('cbrand_name'),
   'marketing_authorization_number'=>$this->input->post('cmarketing_authorization_number'),
   'batch_lot_number'=>$this->input->post('cbatch_lot_number'),
   'manufacture_date'=>$this->input->post('cdate_of_manufacture'),
   'expiry_date'=>$this->input->post('cexpiry_retest_date'),
   'storage_conditions'=>$this->input->post('cstorage_conditions'),
   'quantity_submitted'=>$this->input->post('cquantity_submitted'),
   'applicant_ref_number'=>$this->input->post('capplicant_reference_number'),
   'sample_source'=>$this->input->post('csample_source')
  
  );
  $this->db->insert('sample',$data_two);
   
 //Test Reason Insertion
  $data_three = array(
   'test'=>$this->input->post('creason')
  );
  $this->db->insert('test_reason',$data_three);
  
  //Specification Insertion
   $data_five = array(
   'specification'=>$this->input->post('cspecification')
  );
  $this->db->insert('specification',$data_five);
  
  //Authorizer Details Insertion
   $data_six = array( 
   'authorizer_name'=>$this->input->post('cauthorizing_name'),
   'authorizer_designation'=>$this->input->post('cdesignation')
   
  );
  $this->db->insert('authorizer',$data_six);
  
  //Inspection Insertion
   $data_seven = array(
   'findings_comments'=>$this->input->post('cfindings_comment'),
  );
   $this->db->insert('inspection',$data_seven); 
  
  //Laboratory Insertion
   $data_eight = array(
   'findings_comments'=>$this->input->post('cfindings_comment'),
   'received_by'=>$this->input->post('creceived_by'),
   'date_received'=>$this->input->post('cdate_received'),
   'authorizer_name'=>$this->input->post('cauthorizer_name'),
   'date_authorized'=>$this->input->post('cdate_authorized'),
   'lab_reg_number'=>$this->input->post('clab_reg_number')
  );
  $this->db->insert('laboratory',$data_eight);
 
 //Test_request Data Insertion
 $this->post();
 //$this->output->enable_profiler();
}

function post(){
  $test_req=$this->input->post('test_req');
  $user_type_id=$this->input->post('id');
  
  
 //Client Insertion
  $data_one = array(
   'applicant_name'=>$this->input->post('applicant_name'),
   'applicant_address'=>$this->input->post('applicant_address')
  );
  $this->db->insert('client',$data_one);
  
 $data=$this->db->select_max('id')->get('client_ref')->result();
  $request_type= 'CL/RQ/#'.$data[0]->id;
  $new_code=$this->input->post('applicant_reference_number');
  $client_id_data=$this->db->select_max('id')->get('client')->result();
  $client_id= $client_id_data[0]->id;
  
  $data_ntr=$this->db->select_max('id')->get('test_request')->result();
  $test_request_id= $data_ntr[0]->id;
  $test_request_id++;  
 
  
  $user_id = $this->input->post('user_id');  
  $applicant_reference_number=$this->input->post('applicant_reference_number');
  $data= $this->db->where('applicant_ref_number',$applicant_reference_number)->get('test_request')->num_rows();

if($data==1){
  $data = array(
   'request_type'=>$request_type,
   'client_id'=>$client_id,
   'applicant_name'=>$this->input->post('capplicant_name'),
   'applicant_address'=>$this->input->post('capplicant_address'),
   'active_ingredients'=>$this->input->post('cactive_ingredients'),
   'label_claim'=>$this->input->post('clabel_claim'),
   'dosage_from'=>$this->input->post('cdosage_from'),
   'strength_concentration'=>$this->input->post('cstrength_concentration'),
   'pack_size'=>$this->input->post('cpack_size'),
   'manufacturer_name'=>$this->input->post('cmanufacturer_name'),
   'manufacturer_address'=>$this->input->post('cmanufacturer_address'),
   'brand_name'=>$this->input->post('cbrand_name'),
   'marketing_authorization_number'=>$this->input->post('cmarketing_authorization_number'),
   'batch_lot_number'=>$this->input->post('cbatch_lot_number'),
   'date_manufactured'=>$this->input->post('cdate_of_manufacture'),
   'expiry_date'=>$this->input->post('cexpiry_retest_date'),
   'storage_conditions'=>$this->input->post('cstorage_conditions'),
   'quantity_submitted'=>$this->input->post('cquantity_submitted'),
   'quantity_remaining'=>$this->input->post('cquantity_submitted'),
   'quantity_type'=>$this->input->post('cquantity_type'),
   'applicant_ref_number'=>$new_code,
   'sample_source'=>$this->input->post('csample_source'),
   'testing_reason'=>$this->input->post('creason'),       
   'other_reason'=>$this->input->post('cother_reason'),
   'other_test_required'=>$this->input->post('cother_test'),
   'other_specification'=>$this->input->post('cother_specification'),
   'identification'=>$this->input->post('cidentification'),
   'dissolution'=>$this->input->post('cdissolution'),  
   'friability'=>$this->input->post('cfriability'),  
   'assay'=>$this->input->post('cassay'),  
   'disintegration'=>$this->input->post('cdisintegration'),  
   'content_uniformity'=>$this->input->post('ccontent_uniformity'),  
   'ph_alkalinity'=>$this->input->post('cph_alkalinity'), 
   'full_monograph'=>$this->input->post('cfull_monograph'), 
   'microbiology'=>$this->input->post('cmicrobiology'),
   'related_substances'=>$this->input->post('crelated_substances'),
   'uniformity_of_dosage'=>$this->input->post('cuniformity_of_dosage'),
   'weight_variation_mass_uniformity'=>$this->input->post('cweight_variation_mass_uniformity'),
   'karl_fisher'=>$this->input->post('ckarl_fisher'),       
   'test_specification'=>$this->input->post('cspecification'),
   'authorizer_name'=>$this->input->post('cauthorizing_name'),
   'authorizer_designation'=>$this->input->post('cdesignation'),
   'date_authorized'=>$this->input->post('cdate_authorized'),
   'findings_comments'=>$this->input->post('cfindings_comment'),
   'received_by'=>$this->input->post('creceived_by'),
   'date_received'=>$this->input->post('cdate_received'),
   'laboratory_number'=>$this->input->post('clab_reg_number')
   );

   $datab = array(
   'test_request_id'=>$test_request_id, 
   'user_id'=>$user_id,
   'client_id'=>$client_id,
   'identification'=>$this->input->post('cidentification'),
   'dissolution'=>$this->input->post('cdissolution'),  
   'friability'=>$this->input->post('cfriability'),  
   'assay'=>$this->input->post('cassay'),  
   'disintegration'=>$this->input->post('cdisintegration'),  
   'content_uniformity'=>$this->input->post('ccontent_uniformity'),  
   'ph_alkalinity'=>$this->input->post('cph_alkalinity'), 
   'full_monograph'=>$this->input->post('cfull_monograph'), 
   'microbiology'=>$this->input->post('cmicrobiology'),
   'related_substances'=>$this->input->post('crelated_substances'),
   'uniformity_of_dosage'=>$this->input->post('cuniformity_of_dosage'),
   'weight_variation_mass_uniformity'=>$this->input->post('cweight_variation_mass_uniformity'),
   'karl_fisher'=>$this->input->post('ckarl_fisher')
  );
  $this->db->insert('test_request',$data);
  $this->db->insert('test',$datab);
  


}else{
  $data = array(
     'request_type'=>$request_type,
     'client_id'=>$client_id,
     'applicant_name'=>$this->input->post('capplicant_name'),
     'applicant_address'=>$this->input->post('capplicant_address'),
     'active_ingredients'=>$this->input->post('cactive_ingredients'),
     'label_claim'=>$this->input->post('clabel_claim'),
     'dosage_from'=>$this->input->post('cdosage_from'),
     'strength_concentration'=>$this->input->post('cstrength_concentration'),
     'pack_size'=>$this->input->post('cpack_size'),
     'manufacturer_name'=>$this->input->post('cmanufacturer_name'),
     'manufacturer_address'=>$this->input->post('cmanufacturer_address'),
     'brand_name'=>$this->input->post('cbrand_name'),
     'marketing_authorization_number'=>$this->input->post('cmarketing_authorization_number'),
     'batch_lot_number'=>$this->input->post('cbatch_lot_number'),
     'date_manufactured'=>$this->input->post('cdate_of_manufacture'),
     'expiry_date'=>$this->input->post('cexpiry_retest_date'),
     'storage_conditions'=>$this->input->post('cstorage_conditions'),
     'quantity_submitted'=>$this->input->post('cquantity_submitted'),
     'applicant_ref_number'=>$this->input->post('capplicant_reference_number'),
     'sample_source'=>$this->input->post('csample_source'),
     'testing_reason'=>$this->input->post('creason'),       
     'other_reason'=>$this->input->post('cother_reason'),
     'other_test_required'=>$this->input->post('cother_test'),
     'other_specification'=>$this->input->post('cother_specification'),
     'identification'=>$this->input->post('cidentification'),
     'dissolution'=>$this->input->post('cdissolution'),  
     'friability'=>$this->input->post('cfriability'),  
     'assay'=>$this->input->post('cassay'),  
     'disintegration'=>$this->input->post('cdisintegration'),  
     'content_uniformity'=>$this->input->post('ccontent_uniformity'),  
     'ph_alkalinity'=>$this->input->post('cph_alkalinity'), 
     'full_monograph'=>$this->input->post('cfull_monograph'), 
     'microbiology'=>$this->input->post('cmicrobiology'),
     'related_substances'=>$this->input->post('crelated_substances'),
     'uniformity_of_dosage'=>$this->input->post('cuniformity_of_dosage'),
     'weight_variation_mass_uniformity'=>$this->input->post('cweight_variation_mass_uniformity'),
     'karl_fisher'=>$this->input->post('ckarl_fisher'),  
     'test_specification'=>$this->input->post('cspecification'),
     'authorizer_name'=>$this->input->post('cauthorizing_name'),
     'authorizer_designation'=>$this->input->post('cdesignation'),
     'date_authorized'=>$this->input->post('cdate_authorized'),
     'findings_comments'=>$this->input->post('cfindings_comment'),
     'received_by'=>$this->input->post('creceived_by'),
     'date_received'=>$this->input->post('cdate_received'),
     'laboratory_number'=>$this->input->post('clab_reg_number')
    );

    $datab = array(
     'test_request_id'=>$test_request_id, 
     'user_id'=>$user_id,
     'client_id'=>$client_id,
     'identification'=>$this->input->post('cidentification'),
     'dissolution'=>$this->input->post('cdissolution'),  
     'friability'=>$this->input->post('cfriability'),  
     'assay'=>$this->input->post('cassay'),  
     'disintegration'=>$this->input->post('cdisintegration'),  
     'content_uniformity'=>$this->input->post('ccontent_uniformity'),  
     'ph_alkalinity'=>$this->input->post('cph_alkalinity'), 
     'full_monograph'=>$this->input->post('cfull_monograph'), 
     'microbiology'=>$this->input->post('cmicrobiology'),
     'related_substances'=>$this->input->post('crelated_substances'),
     'uniformity_of_dosage'=>$this->input->post('cuniformity_of_dosage'),
     'weight_variation_mass_uniformity'=>$this->input->post('cweight_variation_mass_uniformity'),
     'karl_fisher'=>$this->input->post('ckarl_fisher'),
    );

    $this->db->insert('test_request',$data);
    $this->db->insert('test',$datab);

  if($this->getClient($client_id)==1){
    echo '';
  }else{ 
    $data_client = array(
     'client_id'=>$client_id,
     'client_ref_no'=>$new_code
     );
    $this->db->insert('client_ref',$data_client);
  }
  redirect('home');
  }


  function getClient(){
   $applicant_reference_number=$this->input->post('capplicant_reference_number');
   $data= $this->db->where('client_ref_no',$applicant_reference_number)->get('client_ref')->num_rows();
    
    if($data=='1'){
     return 1;
    }else{
     return 0;
    }
  }

  function getRefNo(){
   $applicant_reference_number=$this->input->post('applicant_reference_number');
    $data= $this->db->select('applicant_ref_number')->where('applicant_ref_number',$applicant_reference_number)->group_by('applicant_ref_number')->get('test_request')->result();
    return $data;
  }

}
?>
