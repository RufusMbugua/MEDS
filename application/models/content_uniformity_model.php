<?php
class Content_Uniformity_Model extends CI_Model{
   
   function __construct()
   {
    parent::__construct();
   }

   function process_uniformity_of_dosage(){

    $test_request_id=$this->input->post('tr_id');
    $assignment_id=$this->input->post('assignment_id');
    $method=$this->input->post('method');
    $test_type=52;
    $remark="COMPLIES";
    $status=1;

    if($method=='Weight Variation'){
      $data = array(
        'method'=>$this->input->post('method'),
      );
    $this->db->insert('uniformity_of_dosage',$data);

    $data_two = array(

   'test_request_id'=>$test_request_id,
   'balance_id'=>$this->input->post('balance_id'),
   'equipmentbalance'=>$this->input->post('equipmentbalance'),
   'weight_tablet_one'=>$this->input->post('weight_tablet_one'),
   'weight_tablet_two'=>$this->input->post('weight_tablet_two'),
   'weight_tablet_three'=>$this->input->post('weight_tablet_three'),
   'weight_tablet_four'=>$this->input->post('weight_tablet_four'),
   'weight_tablet_five'=>$this->input->post('weight_tablet_five'),
   'weight_tablet_six'=>$this->input->post('weight_tablet_six'),
   'weight_tablet_seven'=>$this->input->post('weight_tablet_seven'),
   'weight_tablet_eight'=>$this->input->post('weight_tablet_eight'),
   'weight_tablet_nine'=>$this->input->post('weight_tablet_nine'),
   'weight_tablet_ten'=>$this->input->post('weight_tablet_ten'),
   'weight_tablet_eleven'=>$this->input->post('weight_tablet_eleven'),
   'weight_tablet_twelve'=>$this->input->post('weight_tablet_twelve'),
   'weight_tablet_thirteen'=>$this->input->post('weight_tablet_thirteen'),
   'weight_tablet_fourteen'=>$this->input->post('weight_tablet_fourteen'),
   'weight_tablet_fifteen'=>$this->input->post('weight_tablet_fifteen'),
   'weight_tablet_sixteen'=>$this->input->post('weight_tablet_sixteen'),
   'weight_tablet_seventeen'=>$this->input->post('weight_tablet_seventeen'),
   'weight_tablet_eighteen'=>$this->input->post('weight_tablet_eighteen'),
   'weight_tablet_nineteen'=>$this->input->post('weight_tablet_nineteen'),
   'weight_tablet_twenty'=>$this->input->post('weight_tablet_twenty'),
   'dosage_form'=>$this->input->post('dosage_form'),
   'subtype'=>$this->input->post('subtype'),
   'method'=>$this->input->post('method'),
   'average'=>$this->input->post('average'),
   'dosage'=>$this->input->post('dosage'),
   'ratio'=>$this->input->post('ratio'),
   'test_status'=>$status

   
  );
  $result_data = array(
      'test_id'=>$test_id,
      'remarks'=>$remark,
      'method'=>$this->input->post('method_coa'),
      'results'=>"Average Weight = ".$this->input->post('average')."g"
      );  
  
  $this->db->update('uniformity_of_dosage', $data_two,array('method' => $method));
  $this->db->update('test_results', $result_data, array('test_request_id'=>$test_request_id,'test_type'=>$test_type));
  redirect('test/index/'.$assignment_id.'/'.$test_request_id);
  }

    if($method=='Content Uniformity'){
      $data = array(
        'method'=>$this->input->post('method'),
      );
      $this->db->insert('uniformity_of_dosage',$data);

    $data_two = array(

   'test_request_id'=>$test_request_id,
   'balance_id'=>$this->input->post('balance_id'),
   'equipmentbalance'=>$this->input->post('equipmentbalance'),
   'weight_tablet_one'=>$this->input->post('weight_tablet_one'),
   'weight_tablet_two'=>$this->input->post('weight_tablet_two'),
   'weight_tablet_three'=>$this->input->post('weight_tablet_three'),
   'weight_tablet_four'=>$this->input->post('weight_tablet_four'),
   'weight_tablet_five'=>$this->input->post('weight_tablet_five'),
   'weight_tablet_six'=>$this->input->post('weight_tablet_six'),
   'weight_tablet_seven'=>$this->input->post('weight_tablet_seven'),
   'weight_tablet_eight'=>$this->input->post('weight_tablet_eight'),
   'weight_tablet_nine'=>$this->input->post('weight_tablet_nine'),
   'weight_tablet_ten'=>$this->input->post('weight_tablet_ten'),
   'weight_tablet_eleven'=>$this->input->post('weight_tablet_eleven'),
   'weight_tablet_twelve'=>$this->input->post('weight_tablet_twelve'),
   'weight_tablet_thirteen'=>$this->input->post('weight_tablet_thirteen'),
   'weight_tablet_fourteen'=>$this->input->post('weight_tablet_fourteen'),
   'weight_tablet_fifteen'=>$this->input->post('weight_tablet_fifteen'),
   'weight_tablet_sixteen'=>$this->input->post('weight_tablet_sixteen'),
   'weight_tablet_seventeen'=>$this->input->post('weight_tablet_seventeen'),
   'weight_tablet_eighteen'=>$this->input->post('weight_tablet_eighteen'),
   'weight_tablet_nineteen'=>$this->input->post('weight_tablet_nineteen'),
   'weight_tablet_twenty'=>$this->input->post('weight_tablet_twenty'),
   'dosage_form'=>$this->input->post('dosage_form'),
   'subtype'=>$this->input->post('subtype'),
   'method'=>$this->input->post('method'),
   'average'=>$this->input->post('average'),
   'dosage'=>$this->input->post('dosage'),
   'ratio'=>$this->input->post('ratio'),
   'test_status'=>$status
  );
  
  $result_data = array(
      'test_id'=>$test_id,
      'remarks'=>$remark,
      'method'=>$this->input->post('method_coa'),
      'results'=>"Average Weight = ".$this->input->post('average')
      );  
  
  $this->db->update('uniformity_of_dosage', $data_two,array('method' => $method));
  $this->db->update('test_results', $result_data, array('test_request_id'=>$test_request_id,'test_type'=>$test_type));
  redirect('test/index/'.$assignment_id.'/'.$test_request_id);
      
    }

    
     
  }

  function process_uniformity_of_dosage_multicomponent(){

    $test_request_id=$this->input->post('tr_id');
    $assignment_id=$this->input->post('assignment_id');
    $method=$this->input->post('method');
    $status=1;

     $sql=$this->db->select_max('id')->get('uniformity_of_dosage_multicomponent')->result();
      $test_id=$sql[0]->id;
      $test_id++;

    if($this->input->post('method_one')=='Weight Variation' && $this->input->post('method_two')=='Weight Variation'){

     

      $data = array(
        'method_one'=>$this->input->post('method_one'),
        'method_two'=>$this->input->post('method_two')
      );
      $this->db->insert('uniformity_of_dosage_multicomponent',$data);
     

      $data_two = array(
     
       'test_request_id'=>$test_request_id,
       'balance_id'=>$this->input->post('balance_id'),
       'equipmentbalance'=>$this->input->post('equipmentbalance'),
       'weight_tablet_one'=>$this->input->post('weight_tablet_one'),
       'weight_tablet_two'=>$this->input->post('weight_tablet_two'),
       'weight_tablet_three'=>$this->input->post('weight_tablet_three'),
       'weight_tablet_four'=>$this->input->post('weight_tablet_four'),
       'weight_tablet_five'=>$this->input->post('weight_tablet_five'),
       'weight_tablet_six'=>$this->input->post('weight_tablet_six'),
       'weight_tablet_seven'=>$this->input->post('weight_tablet_seven'),
       'weight_tablet_eight'=>$this->input->post('weight_tablet_eight'),
       'weight_tablet_nine'=>$this->input->post('weight_tablet_nine'),
       'weight_tablet_ten'=>$this->input->post('weight_tablet_ten'),
       'weight_tablet_eleven'=>$this->input->post('weight_tablet_eleven'),
       'weight_tablet_twelve'=>$this->input->post('weight_tablet_twelve'),
       'weight_tablet_thirteen'=>$this->input->post('weight_tablet_thirteen'),
       'weight_tablet_fourteen'=>$this->input->post('weight_tablet_fourteen'),
       'weight_tablet_fifteen'=>$this->input->post('weight_tablet_fifteen'),
       'weight_tablet_sixteen'=>$this->input->post('weight_tablet_sixteen'),
       'weight_tablet_seventeen'=>$this->input->post('weight_tablet_seventeen'),
       'weight_tablet_eighteen'=>$this->input->post('weight_tablet_eighteen'),
       'weight_tablet_nineteen'=>$this->input->post('weight_tablet_nineteen'),
       'weight_tablet_twenty'=>$this->input->post('weight_tablet_twenty'),
       'dosage_form'=>$this->input->post('dosage_form'),
       'subtype'=>$this->input->post('subtype'),
       'component_one'=>$this->input->post('component_one'),
       'component_two'=>$this->input->post('component_two'),
       'method'=>$this->input->post('method'),
       'method_one'=>$this->input->post('method_one'),
       'method_two'=>$this->input->post('method_two'),
       'average'=>$this->input->post('average'),
       'dosage_one'=>$this->input->post('dosage_one'),
       'dosage_two'=>$this->input->post('dosage_two'),
       'lcg_one'=>$this->input->post('lcg_one'),
       'lcg_two'=>$this->input->post('lcg_two'),
       'ratio'=>$this->input->post('ratio'),
       'ratio_one'=>$this->input->post('ratio_one'),
       'ratio_two'=>$this->input->post('ratio_two'),
       'test_status'=>$status

        );

    $this->db->update('uniformity_of_dosage_multicomponent', $data_two,array('id' => $test_id));
    redirect('test/index/'.$assignment_id.'/'.$test_request_id);
    }

    if($this->input->post('method_one')=='Content Uniformity' &&$this->input->post('method_two')=='Content Uniformity'){
      $data = array(
        'method_one'=>$this->input->post('method_one'),
        'method_two'=>$this->input->post('method_two')
      );
      $this->db->insert('uniformity_of_dosage_multicomponent',$data);

     

      $data_two = array(
         
        'test_request_id'=>$test_request_id,
       'balance_id'=>$this->input->post('balance_id'),
       'equipmentbalance'=>$this->input->post('equipmentbalance'),
       'weight_tablet_one'=>$this->input->post('weight_tablet_one'),
       'weight_tablet_two'=>$this->input->post('weight_tablet_two'),
       'weight_tablet_three'=>$this->input->post('weight_tablet_three'),
       'weight_tablet_four'=>$this->input->post('weight_tablet_four'),
       'weight_tablet_five'=>$this->input->post('weight_tablet_five'),
       'weight_tablet_six'=>$this->input->post('weight_tablet_six'),
       'weight_tablet_seven'=>$this->input->post('weight_tablet_seven'),
       'weight_tablet_eight'=>$this->input->post('weight_tablet_eight'),
       'weight_tablet_nine'=>$this->input->post('weight_tablet_nine'),
       'weight_tablet_ten'=>$this->input->post('weight_tablet_ten'),
       'weight_tablet_eleven'=>$this->input->post('weight_tablet_eleven'),
       'weight_tablet_twelve'=>$this->input->post('weight_tablet_twelve'),
       'weight_tablet_thirteen'=>$this->input->post('weight_tablet_thirteen'),
       'weight_tablet_fourteen'=>$this->input->post('weight_tablet_fourteen'),
       'weight_tablet_fifteen'=>$this->input->post('weight_tablet_fifteen'),
       'weight_tablet_sixteen'=>$this->input->post('weight_tablet_sixteen'),
       'weight_tablet_seventeen'=>$this->input->post('weight_tablet_seventeen'),
       'weight_tablet_eighteen'=>$this->input->post('weight_tablet_eighteen'),
       'weight_tablet_nineteen'=>$this->input->post('weight_tablet_nineteen'),
       'weight_tablet_twenty'=>$this->input->post('weight_tablet_twenty'),
       'dosage_form'=>$this->input->post('dosage_form'),
       'subtype'=>$this->input->post('subtype'),
       'component_one'=>$this->input->post('component_one'),
       'component_two'=>$this->input->post('component_two'),
       'method'=>$this->input->post('method'),
       'method_one'=>$this->input->post('method_one'),
       'method_two'=>$this->input->post('method_two'),
       'average'=>$this->input->post('average'),
       'dosage_one'=>$this->input->post('dosage_one'),
       'dosage_two'=>$this->input->post('dosage_two'),
       'lcg_one'=>$this->input->post('lcg_one'),
       'lcg_two'=>$this->input->post('lcg_two'),
       'ratio'=>$this->input->post('ratio'),
       'ratio_one'=>$this->input->post('ratio_one'),
       'ratio_two'=>$this->input->post('ratio_two'),
       'test_status'=>$status

        );
      $this->db->update('uniformity_of_dosage_multicomponent', $data_two,array('id' => $test_id));
      redirect('test/index/'.$assignment_id.'/'.$test_request_id);
    }

  }
  
  function process_uniformity_of_dosage_specifications(){

    $assignment_id=$this->input->post('assignment_id');
    $test_request_id=$this->input->post('tr_id');
    $test_name="Mass uniformity";
    $test_type=52;
      
    $sql=$this->db->select_max('id')->get('uniformity_of_dosage')->result();
    $test_id=$sql[0]->id;
    $test_id++;

    $sql=$this->db->select_max('id')->get('full_monograph')->result();
    $monograph_id=$sql[0]->id;

     //Sample Insertion
    $data_two = array(
    'monograph_id'=>$monograph_id,
    'test_request_id'=>$test_request_id,
    'test_type'=>$test_type,
    'monograph_specifications'=>$this->input->post('monograph_specifications'),
    'dosage_form'=>$this->input->post('dosage_form'),
    'dosage'=>$this->input->post('dosage'),
    'type'=>$this->input->post('type'),
    'subtype'=>$this->input->post('subtype')
    );

    $data_three = array( 
    'test_request_id'=>$test_request_id,
    'test_id'=>$test_id,
    'test_type'=>$test_type,
    'test_name'=>$test_name,
    'specifications'=>$this->input->post('monograph_specifications'),
    );

    $this->db->insert('monograph_specifications',$data_two);
    $this->db->insert('test_results',$data_three);
    redirect('test/index/'.$assignment_id.'/'.$test_request_id);
    
  }

  function process_uniformity_of_dosage_specifications_multi(){

    $assignment_id=$this->input->post('assignment_id');
    $test_request_id=$this->input->post('tr_id');
    $test_name="Uniformity of Dosage";
    $test_type=53;
      
    $sql=$this->db->select_max('id')->get('uniformity_of_dosage')->result();
    $test_id=$sql[0]->id;
    $test_id++;

    $sql=$this->db->select_max('id')->get('full_monograph')->result();
    $monograph_id=$sql[0]->id;

     //Sample Insertion
    $data_two = array(
    'monograph_id'=>$monograph_id,
    'test_request_id'=>$test_request_id,
    'test_type'=>$test_type,
    'monograph_specifications'=>$this->input->post('monograph_specifications'),
    'dosage_form'=>$this->input->post('dosage_form'),
    'dosage'=>$this->input->post('dosage'),
    'type'=>$this->input->post('type'),
    'subtype'=>$this->input->post('subtype')
    );

    $data_three = array( 
    'test_request_id'=>$test_request_id,
    'test_id'=>$test_id,
    'test_type'=>$test_type,
    'test_name'=>$test_name,
    'specifications'=>$this->input->post('monograph_specifications'),
    );

    $this->db->insert('monograph_specifications',$data_two);
    $this->db->insert('test_results',$data_three);
    redirect('test/index/'.$assignment_id.'/'.$test_request_id);
    
  }

  function process_weight_variation_specifications(){

    $assignment_id=$this->input->post('assignment_id');
    $test_request_id=$this->input->post('tr_id');
    $test_name="Weight Variation";
    $test_type="54";
      
    $sql=$this->db->select_max('id')->get('weight_variation')->result();
    $test_id=$sql[0]->id;
    $test_id++;

    $sql=$this->db->select_max('id')->get('full_monograph')->result();
    $monograph_id=$sql[0]->id;

     //Sample Insertion
    $data_two = array(
    'monograph_id'=>$monograph_id,
    'test_request_id'=>$test_request_id,
    'test_type'=>$test_type,
    'monograph_specifications'=>$this->input->post('monograph_specifications'),
    'acceptance_value'=>$this->input->post('acceptance_value'),
    'range_minimum'=>$this->input->post('range_minimum'),
    'range_maximum'=>$this->input->post('range_maximum')
    );

    $data_three = array( 
    'test_request_id'=>$test_request_id,
    'test_id'=>$test_id,
    'test_type'=>$test_type,
    'test_name'=>$test_name,
    'specifications'=>$this->input->post('monograph_specifications')
    );

    $this->db->insert('monograph_specifications',$data_two);
    $this->db->insert('test_results',$data_three);
    redirect('test/index/'.$assignment_id.'/'.$test_request_id);
    
  }
  function process_weight_variation_specifications_multi(){

    $assignment_id=$this->input->post('assignment_id');
    $test_request_id=$this->input->post('tr_id');
    $test_name="Weight Variation";
    $test_type="55";
      
    $sql=$this->db->select_max('id')->get('weight_variation')->result();
    $test_id=$sql[0]->id;
    $test_id++;

    $sql=$this->db->select_max('id')->get('full_monograph')->result();
    $monograph_id=$sql[0]->id;

     //Sample Insertion
    $data_two = array(
    'monograph_id'=>$monograph_id,
    'test_request_id'=>$test_request_id,
    'test_type'=>$test_type,
    'monograph_specifications'=>$this->input->post('monograph_specifications'),
    'acceptance_value'=>$this->input->post('acceptance_value'),
    'range_minimum'=>$this->input->post('range_minimum'),
    'range_maximum'=>$this->input->post('range_maximum')
    );

    $data_three = array( 
    'test_request_id'=>$test_request_id,
    'test_id'=>$test_id,
    'test_type'=>$test_type,
    'test_name'=>$test_name,
    'specifications'=>$this->input->post('monograph_specifications')
    );

    $this->db->insert('monograph_specifications',$data_two);
    $this->db->insert('test_results',$data_three);
    redirect('test/index/'.$assignment_id.'/'.$test_request_id);
    
  }
  
  function process_content_uniformity_specifications(){

    $assignment_id=$this->input->post('assignment_id');
    $test_request_id=$this->input->post('tr_id');
    $test_name="Content Uniformity";
    $test_type="g";
      
    $sql=$this->db->select_max('id')->get('content_uniformity')->result();
    $test_id=$sql[0]->id;
    $test_id++;

    $sql=$this->db->select_max('id')->get('full_monograph')->result();
    $monograph_id=$sql[0]->id;

     //Sample Insertion
    $data_two = array(
    'monograph_id'=>$monograph_id,
    'test_request_id'=>$test_request_id,
    'test_type'=>$test_type,
    'monograph_specifications'=>$this->input->post('monograph_specifications'),
    'acceptance_value'=>$this->input->post('acceptance_value'),
    'minimum'=>$this->input->post('minimum'),
    'maximum'=>$this->input->post('maximum'),
    'range_minimum'=>$this->input->post('range_minimum'),
    'range_maximum'=>$this->input->post('range_maximum')
    );

    $data_three = array( 
    'test_request_id'=>$test_request_id,
    'test_id'=>$test_id,
    'test_type'=>$test_type,
    'test_name'=>$test_name,
    'specifications'=>$this->input->post('monograph_specifications')
    );

    $this->db->insert('monograph_specifications',$data_two);
    $this->db->insert('test_results',$data_three);
    redirect('test/index/'.$assignment_id.'/'.$test_request_id);
    
  }

  function process_monograph_weight_variation_two_components(){
    $assignment_id=$this->input->post('assignment_id');
    $test_request_id=$this->input->post('tr_id');
     
      $weight_variation_two_components_monograph='';
      
      $data=$this->db->select_max('id')->get('weight_variation_hplc_two_components')->result();

      $weight_variation_hplc_two_components_id=$data[0]->id;
      $weight_variation_hplc_two_components_id++;

     //Sample Insertion
      $data = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'weight_variation_hplc_two_components_id'=>$weight_variation_hplc_two_components_id,
     'serial_number'=>$this->input->post('serial_number'),
     'monograph'=>$this->input->post('monograph')

    );
     $this->db->insert('uniformity_monograph_weight_variation_two_components',$data);
     redirect('test/index/'.$assignment_id.'/'.$test_request_id);
    
  }
  
  function process_monograph_content_uniformity_hplc_single_component(){
    $assignment_id=$this->input->post('assignment_id');
    $test_request_id=$this->input->post('tr_id');
     
      $content_uniformity_hplc_single_component_monograph='';
      
      $data=$this->db->select_max('id')->get('content_uniformity_hplc_single_component')->result();

      $content_uniformity_hplc_single_component_id=$data[0]->id;
      $content_uniformity_hplc_single_component_id++;

     //Sample Insertion
      $data = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'content_uniformity_hplc_single_component_id'=>$content_uniformity_hplc_single_component_id,
     'serial_number'=>$this->input->post('serial_number'),
     'monograph'=>$this->input->post('monograph')

    );
     $this->db->insert('uniformity_monograp_content_uniformity_single_component',$data);
     redirect('test/index/'.$assignment_id.'/'.$test_request_id);
    
  }
  function process_monograph_content_uniformity_hplc_two_components(){
    $assignment_id=$this->input->post('assignment_id');
    $test_request_id=$this->input->post('tr_id');
     
      $content_uniformity_hplc_two_components_monograph='';
      
      $data=$this->db->select_max('id')->get('content_uniformity_hplc_two_components')->result();

      $content_uniformity_hplc_two_components_id=$data[0]->id;
      $content_uniformity_hplc_two_components_id++;

     //Sample Insertion
      $data = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'content_uniformity_hplc_two_components_id'=>$content_uniformity_hplc_two_components_id,
     'serial_number'=>$this->input->post('serial_number'),
     'monograph'=>$this->input->post('monograph')

    );
     $this->db->insert('uniformity_monograp_content_uniformity_two_components',$data);
     redirect('test/index/'.$assignment_id.'/'.$test_request_id);
    
  }
  function process_monograph_content_uniformity_titration_single_component(){
    $assignment_id=$this->input->post('assignment_id');
    $test_request_id=$this->input->post('tr_id');
     
      $content_uniformity_hplc_two_components_monograph='';
      
      $data=$this->db->select_max('id')->get('content_uniformity_titration_single_component')->result();

      $content_uniformity_titration_single_component_id=$data[0]->id;
      $content_uniformity_titration_single_component_id++;

     //Sample Insertion
      $data = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'content_uniformity_titration_single_component_id'=>$content_uniformity_titration_single_component_id,
     'serial_number'=>$this->input->post('serial_number'),
     'monograph'=>$this->input->post('monograph')

    );
     $this->db->insert('uniformity_monograp_content_uniformity_titra_single_component',$data);
     redirect('test/index/'.$assignment_id.'/'.$test_request_id);
    
  }
  function process_monograph_content_uniformity_titration_two_components(){
    $assignment_id=$this->input->post('assignment_id');
    $test_request_id=$this->input->post('tr_id');
     
      $content_uniformity_hplc_two_components_monograph='';
      
      $data=$this->db->select_max('id')->get('content_uniformity_titration_two_components')->result();

      $content_uniformity_titration_two_components_id=$data[0]->id;
      $content_uniformity_titration_two_components_id++;

     //Sample Insertion
      $data = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'content_uniformity_titration_two_components_id'=>$content_uniformity_titration_two_components_id,
     'serial_number'=>$this->input->post('serial_number'),
     'monograph'=>$this->input->post('monograph')

    );
     $this->db->insert('uniformity_monograp_content_uniformity_titra_two_components',$data);
     redirect('test/index/'.$assignment_id.'/'.$test_request_id);
    
  }
  function process_monograph_content_uniformity_uv_single_component(){
    $assignment_id=$this->input->post('assignment_id');
    $test_request_id=$this->input->post('tr_id');
     
      $content_uniformity_uv_single_component_monograph='';
      
      $data=$this->db->select_max('id')->get('content_uniformity_uv_single_component')->result();

      $content_uniformity_uv_single_component_id=$data[0]->id;
      $content_uniformity_uv_single_component_id++;

     //Sample Insertion
      $data = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'content_uniformity_uv_single_component_id'=>$content_uniformity_uv_single_component_id,
     'serial_number'=>$this->input->post('serial_number'),
     'monograph'=>$this->input->post('monograph')

    );
     $this->db->insert('uniformity_monograp_content_uniformity_uv_single_component',$data);
     redirect('test/index/'.$assignment_id.'/'.$test_request_id);
    
  }
  function process_monograph_content_uniformity_uv_two_components(){
    $assignment_id=$this->input->post('assignment_id');
    $test_request_id=$this->input->post('tr_id');
     
      $content_uniformity_uv_two_components_monograph='';
      
      $data=$this->db->select_max('id')->get('content_uniformity_uv_two_components')->result();

      $content_uniformity_uv_two_components_id=$data[0]->id;
      $content_uniformity_uv_two_components_id++;

     //Sample Insertion
      $data = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'content_uniformity_uv_two_components_id'=>$content_uniformity_uv_two_components_id,
     'serial_number'=>$this->input->post('serial_number'),
     'monograph'=>$this->input->post('monograph')

    );
     $this->db->insert('uniformity_monograp_content_uniformity_uv_two_components',$data);
     redirect('test/index/'.$assignment_id.'/'.$test_request_id);
    
  }
}
?>
