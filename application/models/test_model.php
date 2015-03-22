<?php
class Test_Model extends CI_Model{
   
 function __construct()
 {
  parent::__construct();
 }

  function process_monograph($full_path, $file_name){


  $assignment_id=$this->input->post('assignment_id');
  $test_request_id=$this->input->post('tr_id');
  $status=1; 


  $s=$this->input->post('singlecomponent');
  $m=$this->input->post('multicomponent');
  $testsa=$this->input->post('subtests');
  $tests= implode( ",", $testsa );
  
  if ($m == 2) {
  $component_one = $this->input->post('m_component_one');
  $component = $m;
  

  $data = array(
   
   'assignment_id'=>$assignment_id,
   'test_request_id'=>$test_request_id,
   'serial_number'=>$this->input->post('serial_number'),
   'appearance'=>$this->input->post('sample_appearance'),
   'components'=>$component,
   'monograph'=>$this->input->post('copypaste'),
   'monograph_path'=>$full_path,
   'monograph_title'=>$file_name,
   'tests_done'=>$tests,
   'status'=>$status,
   'upload_document'=>$this->input->post('upload_document')
  );

  $data_two=$this->input->post('component');
  $data_three=$this->input->post('lc_component');
  for ($j=0;$j<count($data_two);$j++){
    $array = array(
          'test_request_id'=>$test_request_id,
          'component'=>$data_two[$j],
          'label_claim'=>$data_three[$j]

      );
    $this->db->insert('components',$array);
  }
   $this->db->insert('full_monograph',$data);
   redirect('test/index/'.$assignment_id.'/'.$test_request_id);
  }
  else
  {
   $component_one = $this->input->post('s_component_one');
   $component = $s;

    $data = array(
   
   'assignment_id'=>$assignment_id,
   'test_request_id'=>$test_request_id,
   'serial_number'=>$this->input->post('serial_number'),
   'appearance'=>$this->input->post('sample_appearance'),
   'components'=>$component,
   'monograph'=>$this->input->post('copypaste'),
   'monograph_path'=>$full_path,
   'tests_done'=>$tests,
   'monograph_title'=>$file_name,
   'status'=>$status,
   'upload_document'=>$this->input->post('upload_document')
  );
  
  $data_two= array(
      'test_request_id'=>$test_request_id,
      'component'=>$this->input->post('single_component'),
      'label_claim'=>$this->input->post('single_lc_component')    
   );
    $this->db->insert('components',$data_two);
  }
   $this->db->insert('full_monograph',$data);
    redirect('test/index/'.$assignment_id.'/'.$test_request_id);
  }

  function process_edit_monograph($full_path, $file_name){

  $assignment_id=$this->input->post('assignment_id');
  $test_request_id=$this->input->post('tr_id');
  $status=1; 


  $s=$this->input->post('singlecomponent');
  $m=$this->input->post('multicomponent');
  $testsa=$this->input->post('subtests');
  $tests= implode( ",", $testsa );
  
  if ($m == 2) {
  $component_one = $this->input->post('m_component_one');
  $component = $m;
  

  $data = array(
   
   'assignment_id'=>$assignment_id,
   'test_request_id'=>$test_request_id,
   'serial_number'=>$this->input->post('serial_number'),
   'components'=>$component,
   'monograph'=>$this->input->post('copypaste'),
   'monograph_path'=>$full_path,
   'monograph_title'=>$file_name,
   'tests_done'=>$tests,
   'status'=>$status,
   'upload_document'=>$this->input->post('upload_document')
  );

  $data_two=$this->input->post('component');
  $data_three=$this->input->post('lc_component');
  for ($j=0;$j<count($data_two);$j++){
    $array = array(
          'test_request_id'=>$test_request_id,
          'component'=>$data_two[$j],
          'label_claim'=>$data_three[$j]

      );
    //$this->db->insert('components',$array);
    $this->db->update('components', $array, array('test_request_id' => $test_request_id ));
  }
   //$this->db->insert('full_monograph',$data);
   $this->db->update('full_monograph', $data, array('test_request_id' => $test_request_id ));
   redirect('test/index/'.$assignment_id.'/'.$test_request_id);
  }
  else
  {
   $component_one = $this->input->post('s_component_one');
   $component = $s;

    $data = array(
   
   'assignment_id'=>$assignment_id,
   'test_request_id'=>$test_request_id,
   'serial_number'=>$this->input->post('serial_number'),
   'components'=>$component,
   'monograph'=>$this->input->post('copypaste'),
   'monograph_path'=>$full_path,
   'tests_done'=>$tests,
   'monograph_title'=>$file_name,
   'status'=>$status,
   'upload_document'=>$this->input->post('upload_document')
  );
  
  $data_two= array(
      'test_request_id'=>$test_request_id,
      'component'=>$this->input->post('single_component'),
      'label_claim'=>$this->input->post('single_lc_component')    
   );
    //$this->db->insert('components',$data_two);
    $this->db->update('components', $data_two, array('test_request_id' => $test_request_id ));
  }
   //$this->db->insert('full_monograph',$data);
   $this->db->update('full_monograph', $data, array('test_request_id' => $test_request_id ));
   redirect('test/index/'.$assignment_id.'/'.$test_request_id);
  }     
}
?>
