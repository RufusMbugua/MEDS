<?php
class Assay_Model extends CI_Model{
   
     function __construct()
     {
      parent::__construct();
     }
    
    function process_reagents(){
        
    }

    function process_specifications(){
    $component;
    $assignment_id=$this->input->post('assignment_id');
    $test_request_id=$this->input->post('tr_id');
    $test_name="ASSAY";
    $test_type=6;
    $test_id=8;

    //Query the Test table to get id to identify test type
    $sql=$this->db->select('*')->get_where('test', array('id' => $test_id))->result();
    $main_test_id=$sql[0]->id;

    $sql=$this->db->select_max('id')->get('full_monograph')->result();
    $monograph_id=$sql[0]->id;
    
    $min=$this->input->post('range_minimum');
    $max=$this->input->post('range_maximum');

    $data_two = array( 
     'monograph_id'=>$monograph_id,
     'test_request_id'=>$test_request_id,
     'test_type'=>$test_type,
     'monograph_specifications'=>$this->input->post('monograph_specifications'),
     'range_minimum'=>$this->input->post('range_minimum'),
     'range_maximum'=>$this->input->post('range_maximum')
    );

    $data_three = array( 
    'test_request_id'=>$test_request_id,
     'test_id'=>$main_test_id,
     'test_type'=>$test_type,
     'test_name'=>$test_name,
     'specifications'=>"SHOULD RANGE BETWEEN ".$min."% AND ".$max."%" 
    );

    $this->db->insert('monograph_specifications',$data_two);
    $this->db->insert('test_results',$data_three);
    redirect('test/index/'.$assignment_id.'/'.$test_request_id);
    
   }

   function process_hplc_single_method(){

    $assignment_id=$this->input->post('assignment_id');
    $test_request_id=$this->input->post('tr_id');
    $test_type_id=$this->input->post('test_type_id');
    $status=0;
    $test_type="6";
    $internal_method='Assay HPLC Intenal Method Test';

    $data=$this->db->select_max('id')->get('assay_hplc_internal_method')->result();
    $assay_hplc_internal_method_id=$data[0]->id;
    $assay_hplc_internal_method_id++;

    $data=$this->db->select_max('id')->get('assay_hplc_internal_method')->result();
    $test_id=$data[0]->id;
    $test_id++;
    
    $conclusion=$this->input->post('test_conclusion');
    
    if( $conclusion=="COMPLIES"){

      $status=1;
      $data = array(
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,    
     'serial_number'=>$this->input->post('serial_number'),
     'analysis_date'=>$this->input->post('analysis_date'),
     'balance_make'=>$this->input->post('equipmentbalance'),
     'balance_id'=>$this->input->post('equipment_id'),

     'weight_of_sample_container_w1'=>$this->input->post('weight_sample_container_one'),
     'weight_of_sample_container_w2'=>$this->input->post('weight_sample_container_two'),
     'weight_of_sample_container_w3'=>$this->input->post('weight_sample_container_three'),

     'weight_of_container_w1'=>$this->input->post('weight_container_one'),
     'weight_of_container_w2'=>$this->input->post('weight_container_two'),
     'weight_of_container_w3'=>$this->input->post('weight_container_three'),

     'weight_of_sample_w1'=>$this->input->post('weight_sample_one'),
     'weight_of_sample_w2'=>$this->input->post('weight_sample_two'),
     'weight_of_sample_w3'=>$this->input->post('weight_sample_three'),

     'sample_dilution_preparation'=>$this->input->post('sample_dilution_preparation'),
     'sample_dilution_calculation'=>$this->input->post('sample_dilution_calculation'),

     'weight_of_standard_preparation'=>$this->input->post('weight_of_standard_preparation'),
     'standard_description'=>$this->input->post('standard_description_one'),
     'potency_one'=>$this->input->post('potency_one'),

     'weight_standard_container_std_one'=>$this->input->post('weight_standard_container_one'),
     'weight_container_of_std_one'=>$this->input->post('weight_container_of_std_one'),
     'weight_of_standard_one'=>$this->input->post('weight_of_standard_one'),
     'standard_dilution_preparation'=>$this->input->post('standard_dilution_preparation'),

     'dilution_two'=>$this->input->post('dilution_two'),
     'equipment_make'=>$this->input->post('equipmentmake'),
     'equipment_id'=>$this->input->post('make_id'),

     'reagent_description'=>$this->input->post('reagent_description'),
     'reagent_description_two'=>$this->input->post('reagent_description_two'),
     'reagent_description_three'=>$this->input->post('reagent_description_three'),
     'reagent_description_four'=>$this->input->post('reagent_description_four'),
     'reagent_description_five'=>$this->input->post('reagent_description_five'),
     'reagent_description_six'=>$this->input->post('reagent_description_six'),

     'weight_of_reagent_container_w1'=>$this->input->post('weight_reagent_container_one'),
     'weight_of_reagent_container_w2'=>$this->input->post('weight_reagent_container_two'),
     'weight_of_reagent_container_w3'=>$this->input->post('weight_reagent_container_three'),
     'weight_of_reagent_container_w4'=>$this->input->post('weight_reagent_container_four'),
     'weight_of_reagent_container_w5'=>$this->input->post('weight_reagent_container_five'),
     'weight_of_reagent_container_w6'=>$this->input->post('weight_reagent_container_six'),

     'weight_of_container_w1_reagent'=>$this->input->post('weight_container_one_reagent'),
     'weight_of_container_w2_reagent'=>$this->input->post('weight_container_two_reagent'),
     'weight_of_container_w3_reagent'=>$this->input->post('weight_container_three_reagent'),
     'weight_of_container_w4_reagent'=>$this->input->post('weight_container_four_reagent'),
     'weight_of_container_w5_reagent'=>$this->input->post('weight_container_five_reagent'),
     'weight_of_container_w6_reagent'=>$this->input->post('weight_container_six_reagent'),

     'weight_of_reagent_w1'=>$this->input->post('weight_reagent_one'),
     'weight_of_reagent_w2'=>$this->input->post('weight_reagent_two'),
     'weight_of_reagent_w3'=>$this->input->post('weight_reagent_three'),
     'weight_of_reagent_w4'=>$this->input->post('weight_reagent_four'),
     'weight_of_reagent_w5'=>$this->input->post('weight_reagent_five'),
     'weight_of_reagent_w6'=>$this->input->post('weight_reagent_six'),
     
     'mobile_phase_preparation'=>$this->input->post('mobile_phase_preparation'),

     'd_one_pkt'=>$this->input->post('d_one_pkt'),
     'd_one_wstd'=>$this->input->post('d_one_wstd'),
     'd_one_awt'=>$this->input->post('d_one_awt'),
     'd_one_df'=>$this->input->post('d_one_df'),
     'd_one_potency'=>$this->input->post('d_one_potency'),
     'd_one_pkstd'=>$this->input->post('d_one_pkstd'),
     'd_one_wt'=>$this->input->post('d_one_wt'),
     'd_one_lc'=>$this->input->post('d_one_lc'),

     'd_two_pkt'=>$this->input->post('d_two_pkt'),
     'd_two_wstd'=>$this->input->post('d_two_wstd'),
     'd_two_awt'=>$this->input->post('d_two_awt'),
     'd_two_df'=>$this->input->post('d_two_df'),
     'd_two_potency'=>$this->input->post('d_two_potency'),
     'd_two_pkstd'=>$this->input->post('d_two_pkstd'),
     'd_two_wt'=>$this->input->post('d_two_wt'),
     'd_two_lc'=>$this->input->post('d_two_lc'),

     'd_three_pkt'=>$this->input->post('d_three_pkt'),
     'd_three_wstd'=>$this->input->post('d_three_wstd'),
     'd_three_awt'=>$this->input->post('d_three_awt'),
     'd_three_df'=>$this->input->post('d_three_df'),
     'd_three_potency'=>$this->input->post('d_three_potency'),
     'd_three_pkstd'=>$this->input->post('d_three_pkstd'),
     'd_three_wt'=>$this->input->post('d_three_wt'),
     'd_three_lc'=>$this->input->post('d_three_lc'),

     'determination_one'=>$this->input->post('d_one_p_lc'),
     'determination_two'=>$this->input->post('d_two_p_lc'),
     'determination_three'=>$this->input->post('d_three_p_lc'),

     'average_determination'=>$this->input->post('determination_average'),
     'equivalent_to'=>$this->input->post('determination_equivalent_to'),

     'range_det_min'=>$this->input->post('range_det_min'),
     'range_det_max'=>$this->input->post('range_det_max'),
     
     'sd_determination'=>$this->input->post('determination_sd'),
     'rsd_determination'=>$this->input->post('determination_rsd'),

     'min_tolerance'=>$this->input->post('min_tolerance'),
     'max_tolerance'=>$this->input->post('max_tolerance'),
     'min_tolerance_comment'=>$this->input->post('min_tolerance_comment'),
     'max_tolerance_comment'=>$this->input->post('max_tolerance_comment'),
     'range_tolerance_comment'=>$this->input->post('range_tolerance_comment'),
     'sd_comment'=>$this->input->post('sd_comment'),
     'rsd_comment'=>$this->input->post('rsd_comment'),
     
     'sysytem_suitability_sequence'=>$this->input->post('sysytem_suitability_sequence'),
     'sysytem_suitability_sequence_comment'=>$this->input->post('sysytem_suitability_sequence_comment'),
     'sample_injection_sequence'=>$this->input->post('sample_injection_sequence'),
     'Sample_injection_sequence_comment'=>$this->input->post('Sample_injection_sequence_comment'),
     'chromatograms_attached'=>$this->input->post('chromatograms_attached'),
     'chromatograms_attached_comment'=>$this->input->post('chromatograms_attached_comment'),
     'conclusion'=>$this->input->post('test_conclusion'),
     
     'done_by'=>$this->input->post('done_by'),
     'date_done'=>$this->input->post('date_done'),
     'supervisor'=>$this->input->post('supervisor'),
     'date_appproved'=>$this->input->post('date_appproved'),
     'further_comments'=>$this->input->post('further_comments'),
     'test_status'=>$status,
     'choice'=>$conclusion
    );
    //insert data to table Assay Hplc Internal Method
    $this->db->insert('assay_hplc_internal_method', $data);
    $data_two = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'name'=>$this->input->post('column_name'),
     'length'=>$this->input->post('column_dimensions'),
     'lot_serial_number'=>$this->input->post('column_serial_number'),
     'manufacturer'=>$this->input->post('column_manufacturer'),
     
     'column_pressure'=>$this->input->post('column_pressure'),
     'column_pressure_units'=>$this->input->post('column_pressure_units'),
     'column_oven_temperature'=>$this->input->post('column_oven_temperature'),
     'column_oven_temperature_units'=>$this->input->post('column_oven_temperature_units'),
     'mobile_phase_flow_rate'=>$this->input->post('column_mp_flow_rate'),
     'detection_wavelength'=>$this->input->post('column_detection_wavelength')

    );

    $data_three = array(

     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,

     'retention_time_one'=>$this->input->post('retention_time_one'),
     'retention_time_two'=>$this->input->post('retention_time_two'),
     'retention_time_three'=>$this->input->post('retention_time_three'),
     'retention_time_four'=>$this->input->post('retention_time_four'),
     'retention_time_five'=>$this->input->post('retention_time_five'),
     'retention_time_six'=>$this->input->post('retention_time_six'),

     'peak_area_one'=>$this->input->post('peak_area_one'),
     'peak_area_two'=>$this->input->post('peak_area_two'),
     'peak_area_three'=>$this->input->post('peak_area_three'),
     'peak_area_four'=>$this->input->post('peak_area_four'),
     'peak_area_five'=>$this->input->post('peak_area_five'),
     'peak_area_six'=>$this->input->post('peak_area_six'),

     'asymmetry_one'=>$this->input->post('asymmetry_one'),
     'asymmetry_two'=>$this->input->post('asymmetry_two'),
     'asymmetry_three'=>$this->input->post('asymmetry_three'),
     'asymmetry_four'=>$this->input->post('asymmetry_four'),
     'asymmetry_five'=>$this->input->post('asymmetry_five'),
     'asymmetry_six'=>$this->input->post('asymmetry_six'),

     'resolution_one'=>$this->input->post('resolution_one'),
     'resolution_two'=>$this->input->post('resolution_two'),
     'resolution_three'=>$this->input->post('resolution_three'),
     'resolution_four'=>$this->input->post('resolution_four'),
     'resolution_five'=>$this->input->post('resolution_five'),
     'resolution_six'=>$this->input->post('resolution_six'),

     'relative_retention_time_one'=>$this->input->post('relative_retention_time_one'),
     'relative_retention_time_two'=>$this->input->post('relative_retention_time_two'),
     'relative_retention_time_three'=>$this->input->post('relative_retention_time_three'),
     'relative_retention_time_four'=>$this->input->post('relative_retention_time_four'),
     'relative_retention_time_five'=>$this->input->post('relative_retention_time_five'),
     'relative_retention_time_six'=>$this->input->post('relative_retention_time_six'),

     'average_retention_time'=>$this->input->post('average_retention_time'),
     'average_peak_area'=>$this->input->post('average_peak_area'),
     'average_asymmetry'=>$this->input->post('average_asymmetry'),
     'average_resolution'=>$this->input->post('average_resolution'),
     'average_relative_retention_time'=>$this->input->post('average_relative_retention_time'),

     'sd_retention_time'=>$this->input->post('standard_dev_retention_time'),
     'sd_peak_area'=>$this->input->post('standard_dev_peak_area'),
     'sd_asymmetry'=>$this->input->post('standard_dev_asymmetry'),
     'sd_resolution'=>$this->input->post('standard_dev_resolution'),
     'sd_relative_retention_time'=>$this->input->post('standard_dev_relative_retention_time'),

     'rsd_retention_time'=>$this->input->post('rsd_retention_time'),
     'rsd_peak_area'=>$this->input->post('rsd_peak_area'),
     'rsd_asymmetry'=>$this->input->post('rsd_asymmetry'),
     'rsd_resolution'=>$this->input->post('rsd_resolution'),
     'rsd_relative_retention_time'=>$this->input->post('rsd_relative_retention_time'),
     
     'comment_retention_time'=>$this->input->post('comment_retention_time'),
     'comment_peak_area'=>$this->input->post('comment_peak_area'),
     'comment_asymmetry'=>$this->input->post('comment_asymmetry'),
     'comment_resolution'=>$this->input->post('comment_resolution'),
     'comment_relative_retention_time'=>$this->input->post('comment_relative_retention_time')

    );


    $data_five = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,

     'std_one'=>$this->input->post('std_one'),
     'std_two'=>$this->input->post('std_two'),
     'std_three'=>$this->input->post('std_three'),
     'std_four'=>$this->input->post('std_four'),
     'std_five'=>$this->input->post('std_five'),

     'internal_std_a_one'=>$this->input->post('internal_std_a_one'),
     'internal_std_b_one'=>$this->input->post('internal_std_b_one'),
     'internal_std_c_one'=>$this->input->post('internal_std_c_one'),
     'internal_std_d_one'=>$this->input->post('internal_std_d_one'),
     // 'internal_std_e_one'=>$this->input->post('internal_std_e_one'),
     // 'internal_std_f_one'=>$this->input->post('internal_std_f_one'),
     // 'internal_std_g_one'=>$this->input->post('internal_std_g_one'),

     'internal_std_a_two'=>$this->input->post('internal_std_a_two'),
     'internal_std_b_two'=>$this->input->post('internal_std_b_two'),
     'internal_std_c_two'=>$this->input->post('internal_std_c_two'),
     'internal_std_d_two'=>$this->input->post('internal_std_d_two'),
     // 'internal_std_e_two'=>$this->input->post('internal_std_e_two'),
     // 'internal_std_f_two'=>$this->input->post('internal_std_f_two'),
     // 'internal_std_g_two'=>$this->input->post('internal_std_g_two'),

     'internal_std_a_three'=>$this->input->post('internal_std_a_three'),
     'internal_std_b_three'=>$this->input->post('internal_std_b_three'),
     'internal_std_c_three'=>$this->input->post('internal_std_c_three'),
     'internal_std_d_three'=>$this->input->post('internal_std_d_three'),
     // 'internal_std_e_three'=>$this->input->post('internal_std_e_three'),
     // 'internal_std_f_three'=>$this->input->post('internal_std_f_three'),
     // 'internal_std_g_three'=>$this->input->post('internal_std_g_three'),

     'internal_std_a_four'=>$this->input->post('internal_std_a_four'),
     'internal_std_b_four'=>$this->input->post('internal_std_b_four'),
     'internal_std_c_four'=>$this->input->post('internal_std_c_four'),
     'internal_std_d_four'=>$this->input->post('internal_std_d_four'),
     // 'internal_std_e_four'=>$this->input->post('internal_std_e_four'),
     // 'internal_std_f_four'=>$this->input->post('internal_std_f_four'),
     // 'internal_std_g_four'=>$this->input->post('internal_std_g_four'),

     'internal_std_a_five'=>$this->input->post('internal_std_a_five'),
     'internal_std_b_five'=>$this->input->post('internal_std_b_five'),
     'internal_std_c_five'=>$this->input->post('internal_std_c_five'),
     'internal_std_d_five'=>$this->input->post('internal_std_d_five'),
     // 'internal_std_e_five'=>$this->input->post('internal_std_e_five'),
     // 'internal_std_f_five'=>$this->input->post('internal_std_f_five'),
     // 'internal_std_g_five'=>$this->input->post('internal_std_g_five'),

     'internal_std_a_six'=>$this->input->post('internal_std_a_six'),
     'internal_std_b_six'=>$this->input->post('internal_std_b_six'),
     'internal_std_c_six'=>$this->input->post('internal_std_c_six'),
     'internal_std_d_six'=>$this->input->post('internal_std_d_six'),
     // 'internal_std_e_six'=>$this->input->post('internal_std_e_six'),
     // 'internal_std_f_six'=>$this->input->post('internal_std_f_six'),
     // 'internal_std_g_six'=>$this->input->post('internal_std_g_six'),

     'internal_std_a_seven'=>$this->input->post('internal_std_a_seven'),
     'internal_std_b_seven'=>$this->input->post('internal_std_b_seven'),
     'internal_std_c_seven'=>$this->input->post('internal_std_c_seven'),
     'internal_std_d_seven'=>$this->input->post('internal_std_d_seven'),
     // 'internal_std_e_seven'=>$this->input->post('internal_std_e_seven'),
     // 'internal_std_f_seven'=>$this->input->post('internal_std_f_seven'),
     // 'internal_std_g_seven'=>$this->input->post('internal_std_g_seven'),

     'sample_a_one'=>$this->input->post('sample_a_one'),
     'sample_b_one'=>$this->input->post('sample_b_one'),
     'sample_c_one'=>$this->input->post('sample_c_one'),
     'sample_d_one'=>$this->input->post('sample_d_one'),
     // 'sample_e_one'=>$this->input->post('sample_e_one'),
     // 'sample_f_one'=>$this->input->post('sample_f_one'),
     // 'sample_g_one'=>$this->input->post('sample_g_one'),

     'sample_a_two'=>$this->input->post('sample_a_two'),
     'sample_b_two'=>$this->input->post('sample_b_two'),
     'sample_c_two'=>$this->input->post('sample_c_two'),
     'sample_d_two'=>$this->input->post('sample_d_two'),
     // 'sample_e_two'=>$this->input->post('sample_e_two'),
     // 'sample_f_two'=>$this->input->post('sample_f_two'),
     // 'sample_g_two'=>$this->input->post('sample_g_two'),
     
     'sample_a_three'=>$this->input->post('sample_a_three'),
     'sample_b_three'=>$this->input->post('sample_b_three'),
     'sample_c_three'=>$this->input->post('sample_c_three'),
     'sample_d_three'=>$this->input->post('sample_d_three'),
     // 'sample_e_three'=>$this->input->post('sample_e_three'),
     // 'sample_f_three'=>$this->input->post('sample_f_three'),
     // 'sample_g_three'=>$this->input->post('sample_g_three'),
     
     'sample_a_four'=>$this->input->post('sample_a_four'),
     'sample_b_four'=>$this->input->post('sample_b_four'),
     'sample_c_four'=>$this->input->post('sample_c_four'),
     'sample_d_four'=>$this->input->post('sample_d_four'),
     // 'sample_e_four'=>$this->input->post('sample_e_four'),
     // 'sample_f_four'=>$this->input->post('sample_f_four'),
     // 'sample_g_four'=>$this->input->post('sample_g_four'),
     
     'sample_a_five'=>$this->input->post('sample_a_five'),
     'sample_b_five'=>$this->input->post('sample_b_five'),
     'sample_c_five'=>$this->input->post('sample_c_five'),
     'sample_d_five'=>$this->input->post('sample_d_five'),
     // 'sample_e_five'=>$this->input->post('sample_e_five'),
     // 'sample_f_five'=>$this->input->post('sample_f_five'),
     // 'sample_g_five'=>$this->input->post('sample_g_five'),
     
     'sample_a_six'=>$this->input->post('sample_a_six'),
     'sample_b_six'=>$this->input->post('sample_b_six'),
     'sample_c_six'=>$this->input->post('sample_c_six'),
     'sample_d_six'=>$this->input->post('sample_d_six'),
     // 'sample_e_six'=>$this->input->post('sample_e_six'),
     // 'sample_f_six'=>$this->input->post('sample_f_six'),
     // 'sample_g_six'=>$this->input->post('sample_g_six'),

     'ratio_std_a_one'=>$this->input->post('ratio_std_a_one'),
     'ratio_std_b_one'=>$this->input->post('ratio_std_b_one'),
     'ratio_std_c_one'=>$this->input->post('ratio_std_c_one'),
     'ratio_std_d_one'=>$this->input->post('ratio_std_d_one'),
     // 'ratio_std_e_one'=>$this->input->post('ratio_std_e_one'),
     // 'ratio_std_f_one'=>$this->input->post('ratio_std_f_one'),
     // 'ratio_std_g_one'=>$this->input->post('ratio_std_g_one'),

     'ratio_std_a_two'=>$this->input->post('ratio_std_a_two'),
     'ratio_std_b_two'=>$this->input->post('ratio_std_b_two'),
     'ratio_std_c_two'=>$this->input->post('ratio_std_c_two'),
     'ratio_std_d_two'=>$this->input->post('ratio_std_d_two'),
     // 'ratio_std_e_two'=>$this->input->post('ratio_std_e_two'),
     // 'ratio_std_f_two'=>$this->input->post('ratio_std_f_two'),
     // 'ratio_std_g_two'=>$this->input->post('ratio_std_g_two'),

     'ratio_std_a_three'=>$this->input->post('ratio_std_a_three'),
     'ratio_std_b_three'=>$this->input->post('ratio_std_b_three'),
     'ratio_std_c_three'=>$this->input->post('ratio_std_c_three'),
     'ratio_std_d_three'=>$this->input->post('ratio_std_d_three'),
     // 'ratio_std_e_three'=>$this->input->post('ratio_std_e_three'),
     // 'ratio_std_f_three'=>$this->input->post('ratio_std_f_three'),
     // 'ratio_std_g_three'=>$this->input->post('ratio_std_g_three'),

     'ratio_std_a_four'=>$this->input->post('ratio_std_a_four'),
     'ratio_std_b_four'=>$this->input->post('ratio_std_b_four'),
     'ratio_std_c_four'=>$this->input->post('ratio_std_c_four'),
     'ratio_std_d_four'=>$this->input->post('ratio_std_d_four'),
     // 'ratio_std_e_four'=>$this->input->post('ratio_std_e_four'),
     // 'ratio_std_f_four'=>$this->input->post('ratio_std_f_four'),
     // 'ratio_std_g_four'=>$this->input->post('ratio_std_g_four'),

     'ratio_std_a_five'=>$this->input->post('ratio_std_a_five'),
     'ratio_std_b_five'=>$this->input->post('ratio_std_b_five'),
     'ratio_std_c_five'=>$this->input->post('ratio_std_c_five'),
     'ratio_std_d_five'=>$this->input->post('ratio_std_d_five'),
     // 'ratio_std_e_five'=>$this->input->post('ratio_std_e_five'),
     // 'ratio_std_f_five'=>$this->input->post('ratio_std_f_five'),
     // 'ratio_std_g_five'=>$this->input->post('ratio_std_g_five'),

     'ratio_std_a_six'=>$this->input->post('ratio_std_a_six'),
     'ratio_std_b_six'=>$this->input->post('ratio_std_b_six'),
     'ratio_std_c_six'=>$this->input->post('ratio_std_c_six'),
     'ratio_std_d_six'=>$this->input->post('ratio_std_d_six'),
     // 'ratio_std_e_six'=>$this->input->post('ratio_std_e_six'),
     // 'ratio_std_f_six'=>$this->input->post('ratio_std_f_six'),
     // 'ratio_std_g_six'=>$this->input->post('ratio_std_g_six'),

     'ratio_std_a_seven'=>$this->input->post('ratio_std_a_seven'),
     'ratio_std_b_seven'=>$this->input->post('ratio_std_b_seven'),
     'ratio_std_c_seven'=>$this->input->post('ratio_std_c_sevee'),
     'ratio_std_d_seven'=>$this->input->post('ratio_std_d_seven'),
     // 'ratio_std_e_seven'=>$this->input->post('ratio_std_e_seven'),
     // 'ratio_std_f_seven'=>$this->input->post('ratio_std_f_seven'),
     // 'ratio_std_g_seven'=>$this->input->post('ratio_std_g_seven'),
     
     'std_average'=>$this->input->post('std_average'),
     'internal_std_a_average'=>$this->input->post('internal_std_a_average'),
     'ratio_std_a_average'=>$this->input->post('ratio_std_a_average'),

     'sample_a_average'=>$this->input->post('sample_a_average'),
     'internal_std_b_average'=>$this->input->post('internal_std_b_average'),
     'ratio_std_b_average'=>$this->input->post('ratio_std_b_average'),

     'sample_b_average'=>$this->input->post('sample_b_average'),
     'internal_std_c_average'=>$this->input->post('internal_std_c_average'),
     'ratio_std_c_average'=>$this->input->post('ratio_std_c_average'),

     'sample_c_average'=>$this->input->post('sample_c_average'),
     'internal_std_d_average'=>$this->input->post('internal_std_d_average'),
     'ratio_std_d_average'=>$this->input->post('ratio_std_d_average'),

     'sample_d_average'=>$this->input->post('sample_d_average'),
     'internal_std_e_average'=>$this->input->post('internal_std_e_average'),
     'ratio_std_e_average'=>$this->input->post('ratio_std_e_average'),

     'sample_e_average'=>$this->input->post('sample_e_average'),
     'internal_std_f_average'=>$this->input->post('internal_std_f_average'),
     'ratio_std_f_average'=>$this->input->post('ratio_std_f_average'),

     'sample_f_average'=>$this->input->post('sample_f_average'),
     'internal_std_g_average'=>$this->input->post('internal_std_g_average'),
     'ratio_std_g_average'=>$this->input->post('ratio_std_g_average')


    );

   $data_six = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'system_suitability_sequence_requirement'=>$this->input->post('system_suitability_sequence'),
     'sample_injection_sequence_requirement'=>$this->input->post('sample_injection_sequence'),
     'chromatograms_attached_requirement'=>$this->input->post('chromatograms_attached'),
     'system_suitability_sequence_comment'=>$this->input->post('system_suitability_sequence_comment'),
     'sample_injection_sequence_comment'=>$this->input->post('sample_injection_sequence_comment'),
     'chromatograms_attached_comment'=>$this->input->post('chromatograms_attached_comment')

    );

  
    $data_seven = array(
     
     'test_id'=>$test_id,
     'test_request_id'=>$test_request_id,
     'test_type'=>$test_type,
     'results'=>$this->input->post('determination_average'),
     'method'=>$this->input->post('method'),
     'remarks'=>$this->input->post('test_conclusion')
    );
    $this->db->update('test_results', $data_seven, array('test_request_id' => $test_request_id , 'test_type'=>$test_type,));
    $this->db->insert('assay_hplc_internal_method_chromatography_checklist',$data_six);
    $this->db->insert('assay_hplc_internal_method_peak_area_chromatograms',$data_five);
    $this->db->insert('assay_hplc_internal_method_chromatograms',$data_three);
    $this->db->insert('assay_hplc_internal_method_chromatographic_conditions',$data_two);

    }
    else if($conclusion=="DOES NOT COMPLY"){

   
      $status=2;
      $data = array(
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,    
     'serial_number'=>$this->input->post('serial_number'),
     'analysis_date'=>$this->input->post('analysis_date'),
     'balance_make'=>$this->input->post('equipmentbalance'),
     'balance_id'=>$this->input->post('equipment_id'),

     'weight_of_sample_container_w1'=>$this->input->post('weight_sample_container_one'),
     'weight_of_sample_container_w2'=>$this->input->post('weight_sample_container_two'),
     'weight_of_sample_container_w3'=>$this->input->post('weight_sample_container_three'),

     'weight_of_container_w1'=>$this->input->post('weight_container_one'),
     'weight_of_container_w2'=>$this->input->post('weight_container_two'),
     'weight_of_container_w3'=>$this->input->post('weight_container_three'),

     'weight_of_sample_w1'=>$this->input->post('weight_sample_one'),
     'weight_of_sample_w2'=>$this->input->post('weight_sample_two'),
     'weight_of_sample_w3'=>$this->input->post('weight_sample_three'),

     'sample_dilution_preparation'=>$this->input->post('sample_dilution_preparation'),
     'sample_dilution_calculation'=>$this->input->post('sample_dilution_calculation'),

     'weight_of_standard_preparation'=>$this->input->post('weight_of_standard_preparation'),
     'standard_description'=>$this->input->post('standard_description_one'),
     'potency_one'=>$this->input->post('potency_one'),

     'weight_standard_container_std_one'=>$this->input->post('weight_standard_container_one'),
     'weight_container_of_std_one'=>$this->input->post('weight_container_of_std_one'),
     'weight_of_standard_one'=>$this->input->post('weight_of_standard_one'),
     'standard_dilution_preparation'=>$this->input->post('standard_dilution_preparation'),

     'dilution_two'=>$this->input->post('dilution_two'),
     'equipment_make'=>$this->input->post('equipmentmake'),
     'equipment_id'=>$this->input->post('make_id'),

     'reagent_description'=>$this->input->post('reagent_description'),
     'reagent_description_two'=>$this->input->post('reagent_description_two'),
     'reagent_description_three'=>$this->input->post('reagent_description_three'),
     'reagent_description_four'=>$this->input->post('reagent_description_four'),
     'reagent_description_five'=>$this->input->post('reagent_description_five'),
     'reagent_description_six'=>$this->input->post('reagent_description_six'),

     'weight_of_reagent_container_w1'=>$this->input->post('weight_reagent_container_one'),
     'weight_of_reagent_container_w2'=>$this->input->post('weight_reagent_container_two'),
     'weight_of_reagent_container_w3'=>$this->input->post('weight_reagent_container_three'),
     'weight_of_reagent_container_w4'=>$this->input->post('weight_reagent_container_four'),
     'weight_of_reagent_container_w5'=>$this->input->post('weight_reagent_container_five'),
     'weight_of_reagent_container_w6'=>$this->input->post('weight_reagent_container_six'),

     'weight_of_container_w1_reagent'=>$this->input->post('weight_container_one_reagent'),
     'weight_of_container_w2_reagent'=>$this->input->post('weight_container_two_reagent'),
     'weight_of_container_w3_reagent'=>$this->input->post('weight_container_three_reagent'),
     'weight_of_container_w4_reagent'=>$this->input->post('weight_container_four_reagent'),
     'weight_of_container_w5_reagent'=>$this->input->post('weight_container_five_reagent'),
     'weight_of_container_w6_reagent'=>$this->input->post('weight_container_six_reagent'),

     'weight_of_reagent_w1'=>$this->input->post('weight_reagent_one'),
     'weight_of_reagent_w2'=>$this->input->post('weight_reagent_two'),
     'weight_of_reagent_w3'=>$this->input->post('weight_reagent_three'),
     'weight_of_reagent_w4'=>$this->input->post('weight_reagent_four'),
     'weight_of_reagent_w5'=>$this->input->post('weight_reagent_five'),
     'weight_of_reagent_w6'=>$this->input->post('weight_reagent_six'),
     
     'mobile_phase_preparation'=>$this->input->post('mobile_phase_preparation'),

     'd_one_pkt'=>$this->input->post('d_one_pkt'),
     'd_one_wstd'=>$this->input->post('d_one_wstd'),
     'd_one_awt'=>$this->input->post('d_one_awt'),
     'd_one_df'=>$this->input->post('d_one_df'),
     'd_one_potency'=>$this->input->post('d_one_potency'),
     'd_one_pkstd'=>$this->input->post('d_one_pkstd'),
     'd_one_wt'=>$this->input->post('d_one_wt'),
     'd_one_lc'=>$this->input->post('d_one_lc'),

     'd_two_pkt'=>$this->input->post('d_two_pkt'),
     'd_two_wstd'=>$this->input->post('d_two_wstd'),
     'd_two_awt'=>$this->input->post('d_two_awt'),
     'd_two_df'=>$this->input->post('d_two_df'),
     'd_two_potency'=>$this->input->post('d_two_potency'),
     'd_two_pkstd'=>$this->input->post('d_two_pkstd'),
     'd_two_wt'=>$this->input->post('d_two_wt'),
     'd_two_lc'=>$this->input->post('d_two_lc'),

     'd_three_pkt'=>$this->input->post('d_three_pkt'),
     'd_three_wstd'=>$this->input->post('d_three_wstd'),
     'd_three_awt'=>$this->input->post('d_three_awt'),
     'd_three_df'=>$this->input->post('d_three_df'),
     'd_three_potency'=>$this->input->post('d_three_potency'),
     'd_three_pkstd'=>$this->input->post('d_three_pkstd'),
     'd_three_wt'=>$this->input->post('d_three_wt'),
     'd_three_lc'=>$this->input->post('d_three_lc'),

     'determination_one'=>$this->input->post('d_one_p_lc'),
     'determination_two'=>$this->input->post('d_two_p_lc'),
     'determination_three'=>$this->input->post('d_three_p_lc'),

     'average_determination'=>$this->input->post('determination_average'),
     'equivalent_to'=>$this->input->post('determination_equivalent_to'),

     'range_det_min'=>$this->input->post('range_det_min'),
     'range_det_max'=>$this->input->post('range_det_max'),
     
     'sd_determination'=>$this->input->post('determination_sd'),
     'rsd_determination'=>$this->input->post('determination_rsd'),

     'min_tolerance'=>$this->input->post('min_tolerance'),
     'max_tolerance'=>$this->input->post('max_tolerance'),
     'min_tolerance_comment'=>$this->input->post('min_tolerance_comment'),
     'max_tolerance_comment'=>$this->input->post('max_tolerance_comment'),
     'range_tolerance_comment'=>$this->input->post('range_tolerance_comment'),
     'sd_comment'=>$this->input->post('sd_comment'),
     'rsd_comment'=>$this->input->post('rsd_comment'),
     
     'sysytem_suitability_sequence'=>$this->input->post('sysytem_suitability_sequence'),
     'sysytem_suitability_sequence_comment'=>$this->input->post('sysytem_suitability_sequence_comment'),
     'sample_injection_sequence'=>$this->input->post('sample_injection_sequence'),
     'Sample_injection_sequence_comment'=>$this->input->post('Sample_injection_sequence_comment'),
     'chromatograms_attached'=>$this->input->post('chromatograms_attached'),
     'chromatograms_attached_comment'=>$this->input->post('chromatograms_attached_comment'),
     'conclusion'=>$this->input->post('test_conclusion'),
     
     'done_by'=>$this->input->post('done_by'),
     'date_done'=>$this->input->post('date_done'),
     'supervisor'=>$this->input->post('supervisor'),
     'date_appproved'=>$this->input->post('date_appproved'),
     'further_comments'=>$this->input->post('further_comments'),
     'test_status'=>$status,
     'choice'=>$conclusion
    );
    //insert data to table Assay Hplc Internal Method
    $this->db->insert('assay_hplc_internal_method', $data);
    $data_two = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'name'=>$this->input->post('column_name'),
     'length'=>$this->input->post('column_dimensions'),
     'lot_serial_number'=>$this->input->post('column_serial_number'),
     'manufacturer'=>$this->input->post('column_manufacturer'),
     
     'column_pressure'=>$this->input->post('column_pressure'),
     'column_pressure_units'=>$this->input->post('column_pressure_units'),
     'column_oven_temperature'=>$this->input->post('column_oven_temperature'),
     'column_oven_temperature_units'=>$this->input->post('column_oven_temperature_units'),
     'mobile_phase_flow_rate'=>$this->input->post('column_mp_flow_rate'),
     'detection_wavelength'=>$this->input->post('column_detection_wavelength')

    );

    $data_three = array(

     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,

     'chrom_tile_one'=>$this->input->post('chrom_tile_one'),
     'chrom_tile_two'=>$this->input->post('chrom_tile_two'),
     'chrom_tile_three'=>$this->input->post('chrom_tile_three'),
     'chrom_tile_four'=>$this->input->post('chrom_tile_four'),
     'chrom_tile_five'=>$this->input->post('chrom_tile_five'),
     'chrom_tile_six'=>$this->input->post('chrom_tile_six'),

     'retention_time_one'=>$this->input->post('retention_time_one'),
     'retention_time_two'=>$this->input->post('retention_time_two'),
     'retention_time_three'=>$this->input->post('retention_time_three'),
     'retention_time_four'=>$this->input->post('retention_time_four'),
     'retention_time_five'=>$this->input->post('retention_time_five'),
     'retention_time_six'=>$this->input->post('retention_time_six'),

     'peak_area_one'=>$this->input->post('peak_area_one'),
     'peak_area_two'=>$this->input->post('peak_area_two'),
     'peak_area_three'=>$this->input->post('peak_area_three'),
     'peak_area_four'=>$this->input->post('peak_area_four'),
     'peak_area_five'=>$this->input->post('peak_area_five'),
     'peak_area_six'=>$this->input->post('peak_area_six'),

     'asymmetry_one'=>$this->input->post('asymmetry_one'),
     'asymmetry_two'=>$this->input->post('asymmetry_two'),
     'asymmetry_three'=>$this->input->post('asymmetry_three'),
     'asymmetry_four'=>$this->input->post('asymmetry_four'),
     'asymmetry_five'=>$this->input->post('asymmetry_five'),
     'asymmetry_six'=>$this->input->post('asymmetry_six'),

     'resolution_one'=>$this->input->post('resolution_one'),
     'resolution_two'=>$this->input->post('resolution_two'),
     'resolution_three'=>$this->input->post('resolution_three'),
     'resolution_four'=>$this->input->post('resolution_four'),
     'resolution_five'=>$this->input->post('resolution_five'),
     'resolution_six'=>$this->input->post('resolution_six'),

     'relative_retention_time_one'=>$this->input->post('relative_retention_time_one'),
     'relative_retention_time_two'=>$this->input->post('relative_retention_time_two'),
     'relative_retention_time_three'=>$this->input->post('relative_retention_time_three'),
     'relative_retention_time_four'=>$this->input->post('relative_retention_time_four'),
     'relative_retention_time_five'=>$this->input->post('relative_retention_time_five'),
     'relative_retention_time_six'=>$this->input->post('relative_retention_time_six'),

     'average_retention_time'=>$this->input->post('average_retention_time'),
     'average_peak_area'=>$this->input->post('average_peak_area'),
     'average_asymmetry'=>$this->input->post('average_asymmetry'),
     'average_resolution'=>$this->input->post('average_resolution'),
     'average_relative_retention_time'=>$this->input->post('average_relative_retention_time'),

     'sd_retention_time'=>$this->input->post('standard_dev_retention_time'),
     'sd_peak_area'=>$this->input->post('standard_dev_peak_area'),
     'sd_asymmetry'=>$this->input->post('standard_dev_asymmetry'),
     'sd_resolution'=>$this->input->post('standard_dev_resolution'),
     'sd_relative_retention_time'=>$this->input->post('standard_dev_relative_retention_time'),

     'rsd_retention_time'=>$this->input->post('rsd_retention_time'),
     'rsd_peak_area'=>$this->input->post('rsd_peak_area'),
     'rsd_asymmetry'=>$this->input->post('rsd_asymmetry'),
     'rsd_resolution'=>$this->input->post('rsd_resolution'),
     'rsd_relative_retention_time'=>$this->input->post('rsd_relative_retention_time'),
     
     'comment_retention_time'=>$this->input->post('comment_retention_time'),
     'comment_peak_area'=>$this->input->post('comment_peak_area'),
     'comment_asymmetry'=>$this->input->post('comment_asymmetry'),
     'comment_resolution'=>$this->input->post('comment_resolution'),
     'comment_relative_retention_time'=>$this->input->post('comment_relative_retention_time')

    );


    $data_five = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,

     'std_one'=>$this->input->post('std_one'),
     'std_two'=>$this->input->post('std_two'),
     'std_three'=>$this->input->post('std_three'),
     'std_four'=>$this->input->post('std_four'),
     'std_five'=>$this->input->post('std_five'),

     'internal_std_a_one'=>$this->input->post('internal_std_a_one'),
     'internal_std_b_one'=>$this->input->post('internal_std_b_one'),
     'internal_std_c_one'=>$this->input->post('internal_std_c_one'),
     'internal_std_d_one'=>$this->input->post('internal_std_d_one'),
     // 'internal_std_e_one'=>$this->input->post('internal_std_e_one'),
     // 'internal_std_f_one'=>$this->input->post('internal_std_f_one'),
     // 'internal_std_g_one'=>$this->input->post('internal_std_g_one'),

     'internal_std_a_two'=>$this->input->post('internal_std_a_two'),
     'internal_std_b_two'=>$this->input->post('internal_std_b_two'),
     'internal_std_c_two'=>$this->input->post('internal_std_c_two'),
     'internal_std_d_two'=>$this->input->post('internal_std_d_two'),
     // 'internal_std_e_two'=>$this->input->post('internal_std_e_two'),
     // 'internal_std_f_two'=>$this->input->post('internal_std_f_two'),
     // 'internal_std_g_two'=>$this->input->post('internal_std_g_two'),

     'internal_std_a_three'=>$this->input->post('internal_std_a_three'),
     'internal_std_b_three'=>$this->input->post('internal_std_b_three'),
     'internal_std_c_three'=>$this->input->post('internal_std_c_three'),
     'internal_std_d_three'=>$this->input->post('internal_std_d_three'),
     // 'internal_std_e_three'=>$this->input->post('internal_std_e_three'),
     // 'internal_std_f_three'=>$this->input->post('internal_std_f_three'),
     // 'internal_std_g_three'=>$this->input->post('internal_std_g_three'),

     'internal_std_a_four'=>$this->input->post('internal_std_a_four'),
     'internal_std_b_four'=>$this->input->post('internal_std_b_four'),
     'internal_std_c_four'=>$this->input->post('internal_std_c_four'),
     'internal_std_d_four'=>$this->input->post('internal_std_d_four'),
     // 'internal_std_e_four'=>$this->input->post('internal_std_e_four'),
     // 'internal_std_f_four'=>$this->input->post('internal_std_f_four'),
     // 'internal_std_g_four'=>$this->input->post('internal_std_g_four'),

     'internal_std_a_five'=>$this->input->post('internal_std_a_five'),
     'internal_std_b_five'=>$this->input->post('internal_std_b_five'),
     'internal_std_c_five'=>$this->input->post('internal_std_c_five'),
     'internal_std_d_five'=>$this->input->post('internal_std_d_five'),
     // 'internal_std_e_five'=>$this->input->post('internal_std_e_five'),
     // 'internal_std_f_five'=>$this->input->post('internal_std_f_five'),
     // 'internal_std_g_five'=>$this->input->post('internal_std_g_five'),

     'internal_std_a_six'=>$this->input->post('internal_std_a_six'),
     'internal_std_b_six'=>$this->input->post('internal_std_b_six'),
     'internal_std_c_six'=>$this->input->post('internal_std_c_six'),
     'internal_std_d_six'=>$this->input->post('internal_std_d_six'),
     // 'internal_std_e_six'=>$this->input->post('internal_std_e_six'),
     // 'internal_std_f_six'=>$this->input->post('internal_std_f_six'),
     // 'internal_std_g_six'=>$this->input->post('internal_std_g_six'),

     'internal_std_a_seven'=>$this->input->post('internal_std_a_seven'),
     'internal_std_b_seven'=>$this->input->post('internal_std_b_seven'),
     'internal_std_c_seven'=>$this->input->post('internal_std_c_seven'),
     'internal_std_d_seven'=>$this->input->post('internal_std_d_seven'),
     // 'internal_std_e_seven'=>$this->input->post('internal_std_e_seven'),
     // 'internal_std_f_seven'=>$this->input->post('internal_std_f_seven'),
     // 'internal_std_g_seven'=>$this->input->post('internal_std_g_seven'),

     'sample_a_one'=>$this->input->post('sample_a_one'),
     'sample_b_one'=>$this->input->post('sample_b_one'),
     'sample_c_one'=>$this->input->post('sample_c_one'),
     'sample_d_one'=>$this->input->post('sample_d_one'),
     // 'sample_e_one'=>$this->input->post('sample_e_one'),
     // 'sample_f_one'=>$this->input->post('sample_f_one'),
     // 'sample_g_one'=>$this->input->post('sample_g_one'),

     'sample_a_two'=>$this->input->post('sample_a_two'),
     'sample_b_two'=>$this->input->post('sample_b_two'),
     'sample_c_two'=>$this->input->post('sample_c_two'),
     'sample_d_two'=>$this->input->post('sample_d_two'),
     // 'sample_e_two'=>$this->input->post('sample_e_two'),
     // 'sample_f_two'=>$this->input->post('sample_f_two'),
     // 'sample_g_two'=>$this->input->post('sample_g_two'),
     
     'sample_a_three'=>$this->input->post('sample_a_three'),
     'sample_b_three'=>$this->input->post('sample_b_three'),
     'sample_c_three'=>$this->input->post('sample_c_three'),
     'sample_d_three'=>$this->input->post('sample_d_three'),
     // 'sample_e_three'=>$this->input->post('sample_e_three'),
     // 'sample_f_three'=>$this->input->post('sample_f_three'),
     // 'sample_g_three'=>$this->input->post('sample_g_three'),
     
     'sample_a_four'=>$this->input->post('sample_a_four'),
     'sample_b_four'=>$this->input->post('sample_b_four'),
     'sample_c_four'=>$this->input->post('sample_c_four'),
     'sample_d_four'=>$this->input->post('sample_d_four'),
     // 'sample_e_four'=>$this->input->post('sample_e_four'),
     // 'sample_f_four'=>$this->input->post('sample_f_four'),
     // 'sample_g_four'=>$this->input->post('sample_g_four'),
     
     'sample_a_five'=>$this->input->post('sample_a_five'),
     'sample_b_five'=>$this->input->post('sample_b_five'),
     'sample_c_five'=>$this->input->post('sample_c_five'),
     'sample_d_five'=>$this->input->post('sample_d_five'),
     // 'sample_e_five'=>$this->input->post('sample_e_five'),
     // 'sample_f_five'=>$this->input->post('sample_f_five'),
     // 'sample_g_five'=>$this->input->post('sample_g_five'),
     
     'sample_a_six'=>$this->input->post('sample_a_six'),
     'sample_b_six'=>$this->input->post('sample_b_six'),
     'sample_c_six'=>$this->input->post('sample_c_six'),
     'sample_d_six'=>$this->input->post('sample_d_six'),
     // 'sample_e_six'=>$this->input->post('sample_e_six'),
     // 'sample_f_six'=>$this->input->post('sample_f_six'),
     // 'sample_g_six'=>$this->input->post('sample_g_six'),

     'ratio_std_a_one'=>$this->input->post('ratio_std_a_one'),
     'ratio_std_b_one'=>$this->input->post('ratio_std_b_one'),
     'ratio_std_c_one'=>$this->input->post('ratio_std_c_one'),
     'ratio_std_d_one'=>$this->input->post('ratio_std_d_one'),
     // 'ratio_std_e_one'=>$this->input->post('ratio_std_e_one'),
     // 'ratio_std_f_one'=>$this->input->post('ratio_std_f_one'),
     // 'ratio_std_g_one'=>$this->input->post('ratio_std_g_one'),

     'ratio_std_a_two'=>$this->input->post('ratio_std_a_two'),
     'ratio_std_b_two'=>$this->input->post('ratio_std_b_two'),
     'ratio_std_c_two'=>$this->input->post('ratio_std_c_two'),
     'ratio_std_d_two'=>$this->input->post('ratio_std_d_two'),
     // 'ratio_std_e_two'=>$this->input->post('ratio_std_e_two'),
     // 'ratio_std_f_two'=>$this->input->post('ratio_std_f_two'),
     // 'ratio_std_g_two'=>$this->input->post('ratio_std_g_two'),

     'ratio_std_a_three'=>$this->input->post('ratio_std_a_three'),
     'ratio_std_b_three'=>$this->input->post('ratio_std_b_three'),
     'ratio_std_c_three'=>$this->input->post('ratio_std_c_three'),
     'ratio_std_d_three'=>$this->input->post('ratio_std_d_three'),
     // 'ratio_std_e_three'=>$this->input->post('ratio_std_e_three'),
     // 'ratio_std_f_three'=>$this->input->post('ratio_std_f_three'),
     // 'ratio_std_g_three'=>$this->input->post('ratio_std_g_three'),

     'ratio_std_a_four'=>$this->input->post('ratio_std_a_four'),
     'ratio_std_b_four'=>$this->input->post('ratio_std_b_four'),
     'ratio_std_c_four'=>$this->input->post('ratio_std_c_four'),
     'ratio_std_d_four'=>$this->input->post('ratio_std_d_four'),
     // 'ratio_std_e_four'=>$this->input->post('ratio_std_e_four'),
     // 'ratio_std_f_four'=>$this->input->post('ratio_std_f_four'),
     // 'ratio_std_g_four'=>$this->input->post('ratio_std_g_four'),

     'ratio_std_a_five'=>$this->input->post('ratio_std_a_five'),
     'ratio_std_b_five'=>$this->input->post('ratio_std_b_five'),
     'ratio_std_c_five'=>$this->input->post('ratio_std_c_five'),
     'ratio_std_d_five'=>$this->input->post('ratio_std_d_five'),
     // 'ratio_std_e_five'=>$this->input->post('ratio_std_e_five'),
     // 'ratio_std_f_five'=>$this->input->post('ratio_std_f_five'),
     // 'ratio_std_g_five'=>$this->input->post('ratio_std_g_five'),

     'ratio_std_a_six'=>$this->input->post('ratio_std_a_six'),
     'ratio_std_b_six'=>$this->input->post('ratio_std_b_six'),
     'ratio_std_c_six'=>$this->input->post('ratio_std_c_six'),
     'ratio_std_d_six'=>$this->input->post('ratio_std_d_six'),
     // 'ratio_std_e_six'=>$this->input->post('ratio_std_e_six'),
     // 'ratio_std_f_six'=>$this->input->post('ratio_std_f_six'),
     // 'ratio_std_g_six'=>$this->input->post('ratio_std_g_six'),

     'ratio_std_a_seven'=>$this->input->post('ratio_std_a_seven'),
     'ratio_std_b_seven'=>$this->input->post('ratio_std_b_seven'),
     'ratio_std_c_seven'=>$this->input->post('ratio_std_c_sevee'),
     'ratio_std_d_seven'=>$this->input->post('ratio_std_d_seven'),
     // 'ratio_std_e_seven'=>$this->input->post('ratio_std_e_seven'),
     // 'ratio_std_f_seven'=>$this->input->post('ratio_std_f_seven'),
     // 'ratio_std_g_seven'=>$this->input->post('ratio_std_g_seven'),
     
     'std_average'=>$this->input->post('std_average'),
     'internal_std_a_average'=>$this->input->post('internal_std_a_average'),
     'ratio_std_a_average'=>$this->input->post('ratio_std_a_average'),

     'sample_a_average'=>$this->input->post('sample_a_average'),
     'internal_std_b_average'=>$this->input->post('internal_std_b_average'),
     'ratio_std_b_average'=>$this->input->post('ratio_std_b_average'),

     'sample_b_average'=>$this->input->post('sample_b_average'),
     'internal_std_c_average'=>$this->input->post('internal_std_c_average'),
     'ratio_std_c_average'=>$this->input->post('ratio_std_c_average'),

     'sample_c_average'=>$this->input->post('sample_c_average'),
     'internal_std_d_average'=>$this->input->post('internal_std_d_average'),
     'ratio_std_d_average'=>$this->input->post('ratio_std_d_average'),

     'sample_d_average'=>$this->input->post('sample_d_average'),
     'internal_std_e_average'=>$this->input->post('internal_std_e_average'),
     'ratio_std_e_average'=>$this->input->post('ratio_std_e_average'),

     'sample_e_average'=>$this->input->post('sample_e_average'),
     'internal_std_f_average'=>$this->input->post('internal_std_f_average'),
     'ratio_std_f_average'=>$this->input->post('ratio_std_f_average'),

     'sample_f_average'=>$this->input->post('sample_f_average'),
     'internal_std_g_average'=>$this->input->post('internal_std_g_average'),
     'ratio_std_g_average'=>$this->input->post('ratio_std_g_average')


    );

   $data_six = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'system_suitability_sequence_requirement'=>$this->input->post('system_suitability_sequence'),
     'sample_injection_sequence_requirement'=>$this->input->post('sample_injection_sequence'),
     'chromatograms_attached_requirement'=>$this->input->post('chromatograms_attached'),
     'system_suitability_sequence_comment'=>$this->input->post('system_suitability_sequence_comment'),
     'sample_injection_sequence_comment'=>$this->input->post('sample_injection_sequence_comment'),
     'chromatograms_attached_comment'=>$this->input->post('chromatograms_attached_comment')

    );

  
    $data_seven = array(
     
     'test_id'=>$test_id,
     'test_request_id'=>$test_request_id,
     'test_type'=>$test_type,
     'results'=>$this->input->post('determination_average'),
     'method'=>$this->input->post('method'),
     'remarks'=>$this->input->post('test_conclusion')
    );
    $this->db->update('test_results', $data_seven, array('test_request_id' => $test_request_id , 'test_type'=>$test_type,));
    $this->db->insert('assay_hplc_internal_method_chromatography_checklist',$data_six);
    $this->db->insert('assay_hplc_internal_method_peak_area_chromatograms',$data_five);
    $this->db->insert('assay_hplc_internal_method_chromatograms',$data_three);
    $this->db->insert('assay_hplc_internal_method_chromatographic_conditions',$data_two);
    }  



    
    redirect('test/index/'.$assignment_id.'/'.$test_request_id.'/'.$test_type_id);
  }

   function process_multicomponent_area_method(){

    $assignment_id=$this->input->post('assignment_id');
    $test_request_id=$this->input->post('tr_id');
    $test_type_id=$this->input->post('test_type_id');
    $status=0;
    $test_type=2;
    $test_id=8;

    //$area_method_multicomponent=' Assay Area Method Multicomponent Test';
    $sql=$this->db->select_max('id')->get('assay_hplc_area_method_multicomponent')->result();
    $assay_hplc_area_method_multicomponent_id=$sql[0]->id;
    $assay_hplc_area_method_multicomponent_id++;

    $sql=$this->db->select('*')->get_where('test', array('id' => $test_id))->result();
    $main_test_id=$sql[0]->id;

    $test_conslusion=0;
    $conclusion=$this->input->post('test_conclusion');
    
    if( $conclusion=$this->input->post('test_conclusion')=="Complies"){
      $choice=1;
      $status=1.1;
    }else if($conclusion=$this->input->post('test_conclusion')=="Does Not Comply"){
      $choice=0;
      $status=1;
    }  

    $component_one=$this->input->post('component_one');
    $component_two=$this->input->post('component_two');

    //Sample Insertion
    $data = array(
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,    
     'serial_number'=>$this->input->post('serial_number'),
     'analysis_date'=>$this->input->post('analysis_date'),
     'balance_make'=>$this->input->post('equipmentbalance'),
     'balance_id'=>$this->input->post('equipment_id'),

     'weight_of_sample_container_w1'=>$this->input->post('weight_sample_container_one'),
     'weight_of_sample_container_w2'=>$this->input->post('weight_sample_container_two'),
     'weight_of_sample_container_w3'=>$this->input->post('weight_sample_container_three'),

     'weight_of_container_w1'=>$this->input->post('weight_container_one'),
     'weight_of_container_w2'=>$this->input->post('weight_container_two'),
     'weight_of_container_w3'=>$this->input->post('weight_container_three'),

     'weight_of_sample_w1'=>$this->input->post('weight_sample_one'),
     'weight_of_sample_w2'=>$this->input->post('weight_sample_two'),
     'weight_of_sample_w3'=>$this->input->post('weight_sample_three'),

     'sample_weight_dilution_preparation'=>$this->input->post('sample_weight_dilution_preparation'),
     'sample_dilution_calculation'=>$this->input->post('sample_dilution_calculation'),

     'standard_preparation'=>$this->input->post('standard_preparation'),

     'standard_description_one'=>$this->input->post('standard_description_one'),
     'potency_one'=>$this->input->post('potency_one'),
     'weight_standard_container_std_one'=>$this->input->post('weight_standard_container_one'),
     'weight_container_of_std_one'=>$this->input->post('weight_container_of_std_one'),
     'weight_of_standard_one'=>$this->input->post('weight_of_standard_one'),

     'standard_description_two'=>$this->input->post('standard_description_two'),
     'potency_two'=>$this->input->post('potency_two'),
     'weight_standard_container_std_two'=>$this->input->post('sc_component'),
     'weight_container_of_std_two'=>$this->input->post('c_component'),
     'weight_of_standard_two'=>$this->input->post('standard_difference'),
     
     'dilution_preparation_standard_one'=>$this->input->post('dilution_preparation_standard_one'),
     'dilution_preparation_standard_two'=>$this->input->post('dilution_preparation_standard_two'),

     'standard_calculation_dilution_one'=>$this->input->post('standard_calculation_dilution_one'),
     'standard_calculation_dilution_two'=>$this->input->post('value_p'),

     'equipment_make'=>$this->input->post('equipmentmake'),
     'equipment_id'=>$this->input->post('make_id'),

     'weight_of_reagent_container_w1'=>$this->input->post('weight_reagent_container_one'),
     'weight_of_reagent_container_w2'=>$this->input->post('weight_reagent_container_two'),
     'weight_of_reagent_container_w3'=>$this->input->post('weight_reagent_container_three'),
     'weight_of_reagent_container_w4'=>$this->input->post('weight_reagent_container_four'),
     'weight_of_reagent_container_w5'=>$this->input->post('weight_reagent_container_five'),
     'weight_of_reagent_container_w6'=>$this->input->post('weight_reagent_container_six'),
     'weight_of_container_w1_reagent'=>$this->input->post('weight_container_one_reagent'),
     'weight_of_container_w2_reagent'=>$this->input->post('weight_container_two_reagent'),
     'weight_of_container_w3_reagent'=>$this->input->post('weight_container_three_reagent'),
     'weight_of_container_w4_reagent'=>$this->input->post('weight_container_four_reagent'),
     'weight_of_container_w5_reagent'=>$this->input->post('weight_container_five_reagent'),
     'weight_of_container_w6_reagent'=>$this->input->post('weight_container_six_reagent'),
     'weight_of_reagent_w1'=>$this->input->post('weight_reagent_one'),
     'weight_of_reagent_w2'=>$this->input->post('weight_reagent_two'),
     'weight_of_reagent_w3'=>$this->input->post('weight_reagent_three'),
     'weight_of_reagent_w4'=>$this->input->post('weight_reagent_four'),
     'weight_of_reagent_w5'=>$this->input->post('weight_reagent_five'),
     'weight_of_reagent_w6'=>$this->input->post('weight_reagent_six'),
     
     'mobile_phase_preparation'=>$this->input->post('mobile_phase_preparation'),
     'd_one_pkt'=>$this->input->post('d_one_pkt'),
     'd_one_wstd'=>$this->input->post('d_one_wstd'),
     'd_one_awt'=>$this->input->post('d_one_awt'),
     'd_one_df'=>$this->input->post('d_one_df'),
     'd_one_potency'=>$this->input->post('d_one_potency'),
     'd_one_pkstd'=>$this->input->post('d_one_pkstd'),
     'd_one_wt'=>$this->input->post('d_one_wt'),
     'd_one_lc'=>$this->input->post('d_one_lc'),
     'd_two_pkt'=>$this->input->post('d_two_pkt'),
     'd_two_wstd'=>$this->input->post('d_two_wstd'),
     'd_two_awt'=>$this->input->post('d_two_awt'),
     'd_two_df'=>$this->input->post('d_two_df'),
     'd_two_potency'=>$this->input->post('d_two_potency'),
     'd_two_pkstd'=>$this->input->post('d_two_pkstd'),
     'd_two_wt'=>$this->input->post('d_two_wt'),
     'd_two_lc'=>$this->input->post('d_two_lc'),
     'd_three_pkt'=>$this->input->post('d_three_pkt'),
     'd_three_wstd'=>$this->input->post('d_three_wstd'),
     'd_three_awt'=>$this->input->post('d_three_awt'),
     'd_three_df'=>$this->input->post('d_three_df'),
     'd_three_potency'=>$this->input->post('d_three_potency'),
     'd_three_pkstd'=>$this->input->post('d_three_pkstd'),
     'd_three_wt'=>$this->input->post('d_three_wt'),
     'd_three_lc'=>$this->input->post('d_three_lc'),
     'd_four_pkt'=>$this->input->post('d_four_pkt'),
     'd_four_wstd'=>$this->input->post('d_four_wstd'),
     'd_four_awt'=>$this->input->post('d_four_awt'),
     'd_four_df'=>$this->input->post('d_four_df'),
     'd_four_potency'=>$this->input->post('d_four_potency'),
     'd_four_pkstd'=>$this->input->post('d_four_pkstd'),
     'd_four_wt'=>$this->input->post('d_four_wt'),
     'd_four_lc'=>$this->input->post('d_four_lc'),
     'd_five_pkt'=>$this->input->post('d_five_pkt'),
     'd_five_wstd'=>$this->input->post('d_five_wstd'),
     'd_five_awt'=>$this->input->post('d_five_awt'),
     'd_five_df'=>$this->input->post('d_five_df'),
     'd_five_potency'=>$this->input->post('d_five_potency'),
     'd_five_pkstd'=>$this->input->post('d_five_pkstd'),
     'd_five_wt'=>$this->input->post('d_five_wt'),
     'd_five_lc'=>$this->input->post('d_five_lc'),
     'd_six_pkt'=>$this->input->post('d_six_pkt'),
     'd_six_wstd'=>$this->input->post('d_six_wstd'),
     'd_six_awt'=>$this->input->post('d_six_awt'),
     'd_six_df'=>$this->input->post('d_six_df'),
     'd_six_potency'=>$this->input->post('d_six_potency'),
     'd_six_pkstd'=>$this->input->post('d_six_pkstd'),
     'd_six_wt'=>$this->input->post('d_six_wt'),
     'd_six_lc'=>$this->input->post('d_six_lc'),

     'determination_one'=>$this->input->post('d_one_p_lc'),
     'determination_two'=>$this->input->post('d_two_p_lc'),
     'determination_three'=>$this->input->post('d_three_p_lc'),

     'determination_four'=>$this->input->post('d_four_p_lc'),
     'determination_five'=>$this->input->post('d_five_p_lc'),
     'determination_six'=>$this->input->post('d_six_p_lc'),

     'average_determination'=>$this->input->post('determination_average'),
     'equivalent_to'=>$this->input->post('determination_equivalent_to'),
     'range_det_min'=>$this->input->post('range_det_min'),
     'range_det_max'=>$this->input->post('range_det_max'),
     'sd_determination'=>$this->input->post('determination_sd'),
     'rsd_determination'=>$this->input->post('determination_rsd'),

     'content_to'=>$this->input->post('content_to'),
     'content_from'=>$this->input->post('content_from'),

     'min_tolerance_comment'=>$this->input->post('min_tolerance_comment'),
     'max_tolerance_comment'=>$this->input->post('max_tolerance_comment'),
     'range_tolerance_comment'=>$this->input->post('range_tolerance_comment'),
     'sd_comment'=>$this->input->post('sd_comment'),
     'rsd_comment'=>$this->input->post('rsd_comment'),

     'average_determination_two'=>$this->input->post('determination_average_two'),
     'equivalent_to_two'=>$this->input->post('determination_equivalent_to_two'),
     'range_det_min_two'=>$this->input->post('range_det_min_two'),
     'range_det_max_two'=>$this->input->post('range_det_max_two'),
     'sd_determination_two'=>$this->input->post('determination_sd_two'),
     'rsd_determination_two'=>$this->input->post('determination_rsd_two'),

     'content_to_two'=>$this->input->post('content_to_two'),
     'content_from_two'=>$this->input->post('content_from_two'),

     'min_tolerance_comment_two'=>$this->input->post('min_tolerance_comment_two'),
     'max_tolerance_comment_two'=>$this->input->post('max_tolerance_comment_two'),
     'range_tolerance_comment_two'=>$this->input->post('range_tolerance_comment_two'),
     'sd_comment_two'=>$this->input->post('sd_comment_two'),
     'rsd_comment_two'=>$this->input->post('rsd_comment_two'),
     
     'sysytem_suitability_sequence'=>$this->input->post('sysytem_suitability_sequence'),
     'sysytem_suitability_sequence_comment'=>$this->input->post('sysytem_suitability_sequence_comment'),
     'sample_injection_sequence'=>$this->input->post('sample_injection_sequence'),
     'Sample_injection_sequence_comment'=>$this->input->post('Sample_injection_sequence_comment'),
     'chromatograms_attached'=>$this->input->post('chromatograms_attached'),
     'chromatograms_attached_comment'=>$this->input->post('chromatograms_attached_comment'),
     'conclusion'=>$this->input->post('test_conclusion'),
     
     'done_by'=>$this->input->post('done_by'),
     'date_done'=>$this->input->post('date_done'),
     'supervisor'=>$this->input->post('supervisor'),
     'date_appproved'=>$this->input->post('date_appproved'),
     'further_comments'=>$this->input->post('further_comments'),
     'test_status'=>$status,
     'choice'=>$conclusion
    );
    $data_two = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_area_method_multicomponent_id'=>$assay_hplc_area_method_multicomponent_id,
     'name'=>$this->input->post('column_name'),
     'length'=>$this->input->post('column_dimensions'),
     'lot_serial_number'=>$this->input->post('column_serial_number'),
     'manufacturer'=>$this->input->post('column_manufacturer'),
     
     'column_pressure'=>$this->input->post('column_pressure'),
     'column_pressure_units'=>$this->input->post('column_pressure_units'),
     'column_oven_temperature'=>$this->input->post('column_oven_temperature'),
     'column_oven_temperature_units'=>$this->input->post('column_oven_temperature_units'),
     'mobile_phase_flow_rate'=>$this->input->post('column_mp_flow_rate'),
     'detection_wavelength'=>$this->input->post('column_detection_wavelength')

    );

    $data_three = array(

     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_area_method_multicomponent_id'=>$assay_hplc_area_method_multicomponent_id,

     'retention_time_one'=>$this->input->post('retention_time_one'),
     'retention_time_two'=>$this->input->post('retention_time_two'),
     'retention_time_three'=>$this->input->post('retention_time_three'),
     'retention_time_four'=>$this->input->post('retention_time_four'),
     'retention_time_five'=>$this->input->post('retention_time_five'),
     'retention_time_six'=>$this->input->post('retention_time_six'),

     'peak_area_one'=>$this->input->post('peak_area_one'),
     'peak_area_two'=>$this->input->post('peak_area_two'),
     'peak_area_three'=>$this->input->post('peak_area_three'),
     'peak_area_four'=>$this->input->post('peak_area_four'),
     'peak_area_five'=>$this->input->post('peak_area_five'),
     'peak_area_six'=>$this->input->post('peak_area_six'),

     'asymmetry_one'=>$this->input->post('asymmetry_one'),
     'asymmetry_two'=>$this->input->post('asymmetry_two'),
     'asymmetry_three'=>$this->input->post('asymmetry_three'),
     'asymmetry_four'=>$this->input->post('asymmetry_four'),
     'asymmetry_five'=>$this->input->post('asymmetry_five'),
     'asymmetry_six'=>$this->input->post('asymmetry_six'),

     'resolution_one'=>$this->input->post('resolution_one'),
     'resolution_two'=>$this->input->post('resolution_two'),
     'resolution_three'=>$this->input->post('resolution_three'),
     'resolution_four'=>$this->input->post('resolution_four'),
     'resolution_five'=>$this->input->post('resolution_five'),
     'resolution_six'=>$this->input->post('resolution_six'),

     'relative_retention_time_one'=>$this->input->post('relative_retention_time_one'),
     'relative_retention_time_two'=>$this->input->post('relative_retention_time_two'),
     'relative_retention_time_three'=>$this->input->post('relative_retention_time_three'),
     'relative_retention_time_four'=>$this->input->post('relative_retention_time_four'),
     'relative_retention_time_five'=>$this->input->post('relative_retention_time_five'),
     'relative_retention_time_six'=>$this->input->post('relative_retention_time_six'),

     'average_retention_time'=>$this->input->post('average_retention_time'),
     'average_peak_area'=>$this->input->post('average_peak_area'),
     'average_asymmetry'=>$this->input->post('average_asymmetry'),
     'average_resolution'=>$this->input->post('average_resolution'),
     'average_relative_retention_time'=>$this->input->post('average_relative_retention_time'),

     'sd_retention_time'=>$this->input->post('standard_dev_retention_time'),
     'sd_peak_area'=>$this->input->post('standard_dev_peak_area'),
     'sd_asymmetry'=>$this->input->post('standard_dev_asymmetry'),
     'sd_resolution'=>$this->input->post('standard_dev_resolution'),
     'sd_relative_retention_time'=>$this->input->post('standard_dev_relative_retention_time'),

     'rsd_retention_time'=>$this->input->post('rsd_retention_time'),
     'rsd_peak_area'=>$this->input->post('rsd_peak_area'),
     'rsd_asymmetry'=>$this->input->post('rsd_asymmetry'),
     'rsd_resolution'=>$this->input->post('rsd_resolution'),
     'rsd_relative_retention_time'=>$this->input->post('rsd_relative_retention_time'),
     
     'comment_retention_time'=>$this->input->post('comment_retention_time'),
     'comment_peak_area'=>$this->input->post('comment_peak_area'),
     'comment_asymmetry'=>$this->input->post('comment_asymmetry'),
     'comment_resolution'=>$this->input->post('comment_resolution'),
     'comment_relative_retention_time'=>$this->input->post('comment_relative_retention_time')

    );


    $data_five = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_area_method_multicomponent_id'=>$assay_hplc_area_method_multicomponent_id,

     'std_one'=>$this->input->post('std_one'),
     'std_two'=>$this->input->post('std_two'),
     'std_three'=>$this->input->post('std_three'),
     'std_four'=>$this->input->post('std_four'),
     'std_five'=>$this->input->post('std_five'),

     'internal_std_a_one'=>$this->input->post('internal_std_a_one'),
     'internal_std_b_one'=>$this->input->post('internal_std_b_one'),
     'internal_std_c_one'=>$this->input->post('internal_std_c_one'),
     'internal_std_d_one'=>$this->input->post('internal_std_d_one'),

     'internal_std_a_two'=>$this->input->post('internal_std_a_two'),
     'internal_std_b_two'=>$this->input->post('internal_std_b_two'),
     'internal_std_c_two'=>$this->input->post('internal_std_c_two'),
     'internal_std_d_two'=>$this->input->post('internal_std_d_two'),

     'internal_std_a_three'=>$this->input->post('internal_std_a_three'),
     'internal_std_b_three'=>$this->input->post('internal_std_b_three'),
     'internal_std_c_three'=>$this->input->post('internal_std_c_three'),
     'internal_std_d_three'=>$this->input->post('internal_std_d_three'),

     'internal_std_a_four'=>$this->input->post('internal_std_a_four'),
     'internal_std_b_four'=>$this->input->post('internal_std_b_four'),
     'internal_std_c_four'=>$this->input->post('internal_std_c_four'),
     'internal_std_d_four'=>$this->input->post('internal_std_d_four'),

     'internal_std_a_five'=>$this->input->post('internal_std_a_five'),
     'internal_std_b_five'=>$this->input->post('internal_std_b_five'),
     'internal_std_c_five'=>$this->input->post('internal_std_c_five'),
     'internal_std_d_five'=>$this->input->post('internal_std_d_five'),

     'internal_std_a_six'=>$this->input->post('internal_std_a_six'),
     'internal_std_b_six'=>$this->input->post('internal_std_b_six'),
     'internal_std_c_six'=>$this->input->post('internal_std_c_six'),
     'internal_std_d_six'=>$this->input->post('internal_std_d_six'),

     'internal_std_a_seven'=>$this->input->post('internal_std_a_seven'),
     'internal_std_b_seven'=>$this->input->post('internal_std_b_seven'),
     'internal_std_c_seven'=>$this->input->post('internal_std_c_seven'),
     'internal_std_d_seven'=>$this->input->post('internal_std_d_seven'),

     'sample_a_one'=>$this->input->post('sample_a_one'),
     'sample_b_one'=>$this->input->post('sample_b_one'),
     'sample_c_one'=>$this->input->post('sample_c_one'),
     'sample_d_one'=>$this->input->post('sample_d_one'),
     // 'sample_e_one'=>$this->input->post('sample_e_one'),
     // 'sample_f_one'=>$this->input->post('sample_f_one'),
     // 'sample_g_one'=>$this->input->post('sample_g_one'),

     'sample_a_two'=>$this->input->post('sample_a_two'),
     'sample_b_two'=>$this->input->post('sample_b_two'),
     'sample_c_two'=>$this->input->post('sample_c_two'),
     'sample_d_two'=>$this->input->post('sample_d_two'),
     
     'sample_a_three'=>$this->input->post('sample_a_three'),
     'sample_b_three'=>$this->input->post('sample_b_three'),
     'sample_c_three'=>$this->input->post('sample_c_three'),
     'sample_d_three'=>$this->input->post('sample_d_three'),
     
     'sample_a_four'=>$this->input->post('sample_a_four'),
     'sample_b_four'=>$this->input->post('sample_b_four'),
     'sample_c_four'=>$this->input->post('sample_c_four'),
     'sample_d_four'=>$this->input->post('sample_d_four'),
     
     'sample_a_five'=>$this->input->post('sample_a_five'),
     'sample_b_five'=>$this->input->post('sample_b_five'),
     'sample_c_five'=>$this->input->post('sample_c_five'),
     'sample_d_five'=>$this->input->post('sample_d_five'),
     
     'sample_a_six'=>$this->input->post('sample_a_six'),
     'sample_b_six'=>$this->input->post('sample_b_six'),
     'sample_c_six'=>$this->input->post('sample_c_six'),
     'sample_d_six'=>$this->input->post('sample_d_six'),

     'ratio_std_a_one'=>$this->input->post('ratio_std_a_one'),
     'ratio_std_b_one'=>$this->input->post('ratio_std_b_one'),
     'ratio_std_c_one'=>$this->input->post('ratio_std_c_one'),
     'ratio_std_d_one'=>$this->input->post('ratio_std_d_one'),

     'ratio_std_a_two'=>$this->input->post('ratio_std_a_two'),
     'ratio_std_b_two'=>$this->input->post('ratio_std_b_two'),
     'ratio_std_c_two'=>$this->input->post('ratio_std_c_two'),
     'ratio_std_d_two'=>$this->input->post('ratio_std_d_two'),

     'ratio_std_a_three'=>$this->input->post('ratio_std_a_three'),
     'ratio_std_b_three'=>$this->input->post('ratio_std_b_three'),
     'ratio_std_c_three'=>$this->input->post('ratio_std_c_three'),
     'ratio_std_d_three'=>$this->input->post('ratio_std_d_three'),

     'ratio_std_a_four'=>$this->input->post('ratio_std_a_four'),
     'ratio_std_b_four'=>$this->input->post('ratio_std_b_four'),
     'ratio_std_c_four'=>$this->input->post('ratio_std_c_four'),
     'ratio_std_d_four'=>$this->input->post('ratio_std_d_four'),

     'ratio_std_a_five'=>$this->input->post('ratio_std_a_five'),
     'ratio_std_b_five'=>$this->input->post('ratio_std_b_five'),
     'ratio_std_c_five'=>$this->input->post('ratio_std_c_five'),
     'ratio_std_d_five'=>$this->input->post('ratio_std_d_five'),
     'ratio_std_a_six'=>$this->input->post('ratio_std_a_six'),
     'ratio_std_b_six'=>$this->input->post('ratio_std_b_six'),
     'ratio_std_c_six'=>$this->input->post('ratio_std_c_six'),
     'ratio_std_d_six'=>$this->input->post('ratio_std_d_six'),

     'ratio_std_a_seven'=>$this->input->post('ratio_std_a_seven'),
     'ratio_std_b_seven'=>$this->input->post('ratio_std_b_seven'),
     'ratio_std_c_seven'=>$this->input->post('ratio_std_c_sevee'),
     'ratio_std_d_seven'=>$this->input->post('ratio_std_d_seven'),
     
     'std_average'=>$this->input->post('std_average'),
     'internal_std_a_average'=>$this->input->post('internal_std_a_average'),
     'ratio_std_a_average'=>$this->input->post('ratio_std_a_average'),

     'sample_a_average'=>$this->input->post('sample_a_average'),
     'internal_std_b_average'=>$this->input->post('internal_std_b_average'),
     'ratio_std_b_average'=>$this->input->post('ratio_std_b_average'),

     'sample_b_average'=>$this->input->post('sample_b_average'),
     'internal_std_c_average'=>$this->input->post('internal_std_c_average'),
     'ratio_std_c_average'=>$this->input->post('ratio_std_c_average'),

     'sample_c_average'=>$this->input->post('sample_c_average'),
     'internal_std_d_average'=>$this->input->post('internal_std_d_average'),
     'ratio_std_d_average'=>$this->input->post('ratio_std_d_average'),

     'sample_d_average'=>$this->input->post('sample_d_average'),
     'internal_std_e_average'=>$this->input->post('internal_std_e_average'),
     'ratio_std_e_average'=>$this->input->post('ratio_std_e_average'),

     'sample_e_average'=>$this->input->post('sample_e_average'),
     'internal_std_f_average'=>$this->input->post('internal_std_f_average'),
     'ratio_std_f_average'=>$this->input->post('ratio_std_f_average'),

     'sample_f_average'=>$this->input->post('sample_f_average'),
     'internal_std_g_average'=>$this->input->post('internal_std_g_average'),
     'ratio_std_g_average'=>$this->input->post('ratio_std_g_average')


    );

   $data_six = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_area_method_multicomponent_id'=>$assay_hplc_area_method_multicomponent_id,
     'system_suitability_sequence_requirement'=>$this->input->post('system_suitability_sequence'),
     'sample_injection_sequence_requirement'=>$this->input->post('sample_injection_sequence'),
     'chromatograms_attached_requirement'=>$this->input->post('chromatograms_attached'),
     'system_suitability_sequence_comment'=>$this->input->post('system_suitability_sequence_comment'),
     'sample_injection_sequence_comment'=>$this->input->post('sample_injection_sequence_comment'),
     'chromatograms_attached_comment'=>$this->input->post('chromatograms_attached_comment')

    );

  
    $data_seven = array(
     'test_id'=>$main_test_id,
     'test_request_id'=>$test_request_id,
     'test_type'=>$test_type,
     'results'=>implode(',',array($component_one,$this->input->post('determination_average'),$component_two,$this->input->post('determination_average_two'))),
     'method'=>$this->input->post('test_specification'),
     'remarks'=>$this->input->post('test_conclusion')
    );
    $this->db->update('test_results', $data_seven, array('test_request_id' => $test_request_id , 'test_type'=>$test_type,));
    $this->db->insert('assay_hplc_area_method_multi_chromatography_checklist',$data_six);
    $this->db->insert('assay_hplc_area_method_multi_peak_area_chromatograms',$data_five);
    $this->db->insert('assay_hplc_area_method_multi_chromatograms',$data_three);
    $this->db->insert('assay_hplc_area_method_multi_chromatographic_conditions',$data_two);
    $this->db->insert('assay_hplc_area_method_multicomponent', $data);
    redirect('test/index/'.$assignment_id.'/'.$test_request_id);
  }
   function process_cream(){

    $assignment_id=$this->input->post('assignment_id');
    $test_request_id=$this->input->post('tr_id');
    $test_type_id=$this->input->post('test_type_id');
    $status=0;
    $test_type="f";
    $cream=' Assay Cream Test';
    $data=$this->db->select_max('id')->get('assay_hplc_cream')->result();
    $assay_hplc_cream_id=$data[0]->id;
    $assay_hplc_cream_id++;

    $data=$this->db->select_max('id')->get('assay_hplc_cream')->result();
    $test_id=$data[0]->id;
    $test_id++;
    
    $test_conslusion=0;
    $conclusion=$this->input->post('test_conclusion');
    
    if( $conclusion=$this->input->post('test_conclusion')=="Test Complies (Passed)"){
      $choice=1;
      $status=1.1;
    }else if($conclusion=$this->input->post('test_conclusion')=="Test Does Not Comply(Failed)"){
      $choice=0;
      $status=1;
    }  

    //Sample Insertion
    $data = array(
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,    
     'serial_number'=>$this->input->post('serial_number'),
     'analysis_date'=>$this->input->post('analysis_date'),
     'balance_make'=>$this->input->post('equipmentbalance'),
     'balance_id'=>$this->input->post('equipment_id'),
     'weight_of_sample_container_w1'=>$this->input->post('weight_sample_container_one'),
     'weight_of_sample_container_w2'=>$this->input->post('weight_sample_container_two'),
     'weight_of_sample_container_w3'=>$this->input->post('weight_sample_container_three'),
     'weight_of_container_w1'=>$this->input->post('weight_container_one'),
     'weight_of_container_w2'=>$this->input->post('weight_container_two'),
     'weight_of_container_w3'=>$this->input->post('weight_container_three'),
     'weight_of_sample_w1'=>$this->input->post('weight_sample_one'),
     'weight_of_sample_w2'=>$this->input->post('weight_sample_two'),
     'weight_of_sample_w3'=>$this->input->post('weight_sample_three'),
     'dilution_one'=>$this->input->post('dilution_one'),
     'sample_dilution_result'=>$this->input->post('sample_dilution_result'),
     'weight_of_standard_preparation'=>$this->input->post('weight_of_standard_preparation'),
     'standard_description_one'=>$this->input->post('standard_description_one'),
     'potency_one'=>$this->input->post('potency_one'),
     'weight_standard_container_std_one'=>$this->input->post('weight_standard_container_one'),
     'weight_container_of_std_one'=>$this->input->post('weight_container_of_std_one'),
     'weight_of_standard_one'=>$this->input->post('weight_of_standard_one'),
     'dilution_two'=>$this->input->post('dilution_two'),
     'equipment_make'=>$this->input->post('equipmentmake'),
     'equipment_id'=>$this->input->post('make_id'),
     'weight_of_reagent_container_w1'=>$this->input->post('weight_reagent_container_one'),
     'weight_of_reagent_container_w2'=>$this->input->post('weight_reagent_container_two'),
     'weight_of_reagent_container_w3'=>$this->input->post('weight_reagent_container_three'),
     'weight_of_reagent_container_w4'=>$this->input->post('weight_reagent_container_four'),
     'weight_of_reagent_container_w5'=>$this->input->post('weight_reagent_container_five'),
     'weight_of_reagent_container_w6'=>$this->input->post('weight_reagent_container_six'),
     'weight_of_container_w1_reagent'=>$this->input->post('weight_container_one_reagent'),
     'weight_of_container_w2_reagent'=>$this->input->post('weight_container_two_reagent'),
     'weight_of_container_w3_reagent'=>$this->input->post('weight_container_three_reagent'),
     'weight_of_container_w4_reagent'=>$this->input->post('weight_container_four_reagent'),
     'weight_of_container_w5_reagent'=>$this->input->post('weight_container_five_reagent'),
     'weight_of_container_w6_reagent'=>$this->input->post('weight_container_six_reagent'),
     'weight_of_reagent_w1'=>$this->input->post('weight_reagent_one'),
     'weight_of_reagent_w2'=>$this->input->post('weight_reagent_two'),
     'weight_of_reagent_w3'=>$this->input->post('weight_reagent_three'),
     'weight_of_reagent_w4'=>$this->input->post('weight_reagent_four'),
     'weight_of_reagent_w5'=>$this->input->post('weight_reagent_five'),
     'weight_of_reagent_w6'=>$this->input->post('weight_reagent_six'),
     
     'mobile_phase_preparation'=>$this->input->post('mobile_phase_preparation'),
     'd_one_pkt'=>$this->input->post('d_one_pkt'),
     'd_one_wstd'=>$this->input->post('d_one_wstd'),
     'd_one_awt'=>$this->input->post('d_one_awt'),
     'd_one_df'=>$this->input->post('d_one_df'),
     'd_one_potency'=>$this->input->post('d_one_potency'),
     'd_one_pkstd'=>$this->input->post('d_one_pkstd'),
     'd_one_wt'=>$this->input->post('d_one_wt'),
     'd_one_lc'=>$this->input->post('d_one_lc'),
     'd_two_pkt'=>$this->input->post('d_two_pkt'),
     'd_two_wstd'=>$this->input->post('d_two_wstd'),
     'd_two_awt'=>$this->input->post('d_two_awt'),
     'd_two_df'=>$this->input->post('d_two_df'),
     'd_two_potency'=>$this->input->post('d_two_potency'),
     'd_two_pkstd'=>$this->input->post('d_two_pkstd'),
     'd_two_wt'=>$this->input->post('d_two_wt'),
     'd_two_lc'=>$this->input->post('d_two_lc'),
     'd_three_pkt'=>$this->input->post('d_three_pkt'),
     'd_three_wstd'=>$this->input->post('d_three_wstd'),
     'd_three_awt'=>$this->input->post('d_three_awt'),
     'd_three_df'=>$this->input->post('d_three_df'),
     'd_three_potency'=>$this->input->post('d_three_potency'),
     'd_three_pkstd'=>$this->input->post('d_three_pkstd'),
     'd_three_wt'=>$this->input->post('d_three_wt'),
     'd_three_lc'=>$this->input->post('d_three_lc'),

     'determination_one'=>$this->input->post('d_one_p_lc'),
     'determination_two'=>$this->input->post('d_two_p_lc'),
     'determination_three'=>$this->input->post('d_three_p_lc'),

     'average_determination'=>$this->input->post('determination_average'),
     'equivalent_to'=>$this->input->post('determination_equivalent_to'),
     'range_det_min'=>$this->input->post('range_det_min'),
     'range_det_max'=>$this->input->post('range_det_max'),
     'sd_determination'=>$this->input->post('determination_sd'),
     'rsd_determination'=>$this->input->post('determination_rsd'),

     'min_tolerance'=>$this->input->post('min_tolerance'),
     'max_tolerance'=>$this->input->post('max_tolerance'),
     'min_tolerance_comment'=>$this->input->post('min_tolerance_comment'),
     'max_tolerance_comment'=>$this->input->post('max_tolerance_comment'),
     'range_tolerance_comment'=>$this->input->post('range_tolerance_comment'),
     'sd_comment'=>$this->input->post('sd_comment'),
     'rsd_comment'=>$this->input->post('rsd_comment'),
     
     'sysytem_suitability_sequence'=>$this->input->post('sysytem_suitability_sequence'),
     'sysytem_suitability_sequence_comment'=>$this->input->post('sysytem_suitability_sequence_comment'),
     'sample_injection_sequence'=>$this->input->post('sample_injection_sequence'),
     'Sample_injection_sequence_comment'=>$this->input->post('Sample_injection_sequence_comment'),
     'chromatograms_attached'=>$this->input->post('chromatograms_attached'),
     'chromatograms_attached_comment'=>$this->input->post('chromatograms_attached_comment'),
     'conclusion'=>$this->input->post('test_conclusion'),
     
     'done_by'=>$this->input->post('done_by'),
     'date_done'=>$this->input->post('date_done'),
     'supervisor'=>$this->input->post('supervisor'),
     'date_appproved'=>$this->input->post('date_appproved'),
     'further_comments'=>$this->input->post('further_comments'),
     'test_status'=>$status,
     'choice'=>$conclusion
    );
    $data_two = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_cream_id'=>$assay_hplc_cream_id,
     'name'=>$this->input->post('column_name'),
     'length'=>$this->input->post('column_dimensions'),
     'lot_serial_number'=>$this->input->post('column_serial_number'),
     'manufacturer'=>$this->input->post('column_manufacturer'),
     
     'column_pressure'=>$this->input->post('column_pressure'),
     'column_pressure_units'=>$this->input->post('column_pressure_units'),
     'column_oven_temperature'=>$this->input->post('column_oven_temperature'),
     'column_oven_temperature_units'=>$this->input->post('column_oven_temperature_units'),
     'mobile_phase_flow_rate'=>$this->input->post('column_mp_flow_rate'),
     'detection_wavelength'=>$this->input->post('column_detection_wavelength')

    );

    $data_three = array(

     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_cream_id'=>$assay_hplc_cream_id,

     'retention_time_one'=>$this->input->post('retention_time_one'),
     'retention_time_two'=>$this->input->post('retention_time_two'),
     'retention_time_three'=>$this->input->post('retention_time_three'),
     'retention_time_four'=>$this->input->post('retention_time_four'),
     'retention_time_five'=>$this->input->post('retention_time_five'),
     'retention_time_six'=>$this->input->post('retention_time_six'),

     'peak_area_one'=>$this->input->post('peak_area_one'),
     'peak_area_two'=>$this->input->post('peak_area_two'),
     'peak_area_three'=>$this->input->post('peak_area_three'),
     'peak_area_four'=>$this->input->post('peak_area_four'),
     'peak_area_five'=>$this->input->post('peak_area_five'),
     'peak_area_six'=>$this->input->post('peak_area_six'),

     'asymmetry_one'=>$this->input->post('asymmetry_one'),
     'asymmetry_two'=>$this->input->post('asymmetry_two'),
     'asymmetry_three'=>$this->input->post('asymmetry_three'),
     'asymmetry_four'=>$this->input->post('asymmetry_four'),
     'asymmetry_five'=>$this->input->post('asymmetry_five'),
     'asymmetry_six'=>$this->input->post('asymmetry_six'),

     'resolution_one'=>$this->input->post('resolution_one'),
     'resolution_two'=>$this->input->post('resolution_two'),
     'resolution_three'=>$this->input->post('resolution_three'),
     'resolution_four'=>$this->input->post('resolution_four'),
     'resolution_five'=>$this->input->post('resolution_five'),
     'resolution_six'=>$this->input->post('resolution_six'),

     'relative_retention_time_one'=>$this->input->post('relative_retention_time_one'),
     'relative_retention_time_two'=>$this->input->post('relative_retention_time_two'),
     'relative_retention_time_three'=>$this->input->post('relative_retention_time_three'),
     'relative_retention_time_four'=>$this->input->post('relative_retention_time_four'),
     'relative_retention_time_five'=>$this->input->post('relative_retention_time_five'),
     'relative_retention_time_six'=>$this->input->post('relative_retention_time_six'),

     'average_retention_time'=>$this->input->post('average_retention_time'),
     'average_peak_area'=>$this->input->post('average_peak_area'),
     'average_asymmetry'=>$this->input->post('average_asymmetry'),
     'average_resolution'=>$this->input->post('average_resolution'),
     'average_relative_retention_time'=>$this->input->post('average_relative_retention_time'),

     'sd_retention_time'=>$this->input->post('standard_dev_retention_time'),
     'sd_peak_area'=>$this->input->post('standard_dev_peak_area'),
     'sd_asymmetry'=>$this->input->post('standard_dev_asymmetry'),
     'sd_resolution'=>$this->input->post('standard_dev_resolution'),
     'sd_relative_retention_time'=>$this->input->post('standard_dev_relative_retention_time'),

     'rsd_retention_time'=>$this->input->post('rsd_retention_time'),
     'rsd_peak_area'=>$this->input->post('rsd_peak_area'),
     'rsd_asymmetry'=>$this->input->post('rsd_asymmetry'),
     'rsd_resolution'=>$this->input->post('rsd_resolution'),
     'rsd_relative_retention_time'=>$this->input->post('rsd_relative_retention_time'),
     
     'comment_retention_time'=>$this->input->post('comment_retention_time'),
     'comment_peak_area'=>$this->input->post('comment_peak_area'),
     'comment_asymmetry'=>$this->input->post('comment_asymmetry'),
     'comment_resolution'=>$this->input->post('comment_resolution'),
     'comment_relative_retention_time'=>$this->input->post('comment_relative_retention_time')

    );


    $data_five = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_cream_id'=>$assay_hplc_cream_id,

     'std_one'=>$this->input->post('std_one'),
     'std_two'=>$this->input->post('std_two'),
     'std_three'=>$this->input->post('std_three'),
     'std_four'=>$this->input->post('std_four'),
     'std_five'=>$this->input->post('std_five'),

     'internal_std_a_one'=>$this->input->post('internal_std_a_one'),
     'internal_std_b_one'=>$this->input->post('internal_std_b_one'),
     'internal_std_c_one'=>$this->input->post('internal_std_c_one'),
     'internal_std_d_one'=>$this->input->post('internal_std_d_one'),
     // 'internal_std_e_one'=>$this->input->post('internal_std_e_one'),
     // 'internal_std_f_one'=>$this->input->post('internal_std_f_one'),
     // 'internal_std_g_one'=>$this->input->post('internal_std_g_one'),

     'internal_std_a_two'=>$this->input->post('internal_std_a_two'),
     'internal_std_b_two'=>$this->input->post('internal_std_b_two'),
     'internal_std_c_two'=>$this->input->post('internal_std_c_two'),
     'internal_std_d_two'=>$this->input->post('internal_std_d_two'),
     // 'internal_std_e_two'=>$this->input->post('internal_std_e_two'),
     // 'internal_std_f_two'=>$this->input->post('internal_std_f_two'),
     // 'internal_std_g_two'=>$this->input->post('internal_std_g_two'),

     'internal_std_a_three'=>$this->input->post('internal_std_a_three'),
     'internal_std_b_three'=>$this->input->post('internal_std_b_three'),
     'internal_std_c_three'=>$this->input->post('internal_std_c_three'),
     'internal_std_d_three'=>$this->input->post('internal_std_d_three'),
     // 'internal_std_e_three'=>$this->input->post('internal_std_e_three'),
     // 'internal_std_f_three'=>$this->input->post('internal_std_f_three'),
     // 'internal_std_g_three'=>$this->input->post('internal_std_g_three'),

     'internal_std_a_four'=>$this->input->post('internal_std_a_four'),
     'internal_std_b_four'=>$this->input->post('internal_std_b_four'),
     'internal_std_c_four'=>$this->input->post('internal_std_c_four'),
     'internal_std_d_four'=>$this->input->post('internal_std_d_four'),
     // 'internal_std_e_four'=>$this->input->post('internal_std_e_four'),
     // 'internal_std_f_four'=>$this->input->post('internal_std_f_four'),
     // 'internal_std_g_four'=>$this->input->post('internal_std_g_four'),

     'internal_std_a_five'=>$this->input->post('internal_std_a_five'),
     'internal_std_b_five'=>$this->input->post('internal_std_b_five'),
     'internal_std_c_five'=>$this->input->post('internal_std_c_five'),
     'internal_std_d_five'=>$this->input->post('internal_std_d_five'),
     // 'internal_std_e_five'=>$this->input->post('internal_std_e_five'),
     // 'internal_std_f_five'=>$this->input->post('internal_std_f_five'),
     // 'internal_std_g_five'=>$this->input->post('internal_std_g_five'),

     'internal_std_a_six'=>$this->input->post('internal_std_a_six'),
     'internal_std_b_six'=>$this->input->post('internal_std_b_six'),
     'internal_std_c_six'=>$this->input->post('internal_std_c_six'),
     'internal_std_d_six'=>$this->input->post('internal_std_d_six'),
     // 'internal_std_e_six'=>$this->input->post('internal_std_e_six'),
     // 'internal_std_f_six'=>$this->input->post('internal_std_f_six'),
     // 'internal_std_g_six'=>$this->input->post('internal_std_g_six'),

     'internal_std_a_seven'=>$this->input->post('internal_std_a_seven'),
     'internal_std_b_seven'=>$this->input->post('internal_std_b_seven'),
     'internal_std_c_seven'=>$this->input->post('internal_std_c_seven'),
     'internal_std_d_seven'=>$this->input->post('internal_std_d_seven'),
     // 'internal_std_e_seven'=>$this->input->post('internal_std_e_seven'),
     // 'internal_std_f_seven'=>$this->input->post('internal_std_f_seven'),
     // 'internal_std_g_seven'=>$this->input->post('internal_std_g_seven'),

     'sample_a_one'=>$this->input->post('sample_a_one'),
     'sample_b_one'=>$this->input->post('sample_b_one'),
     'sample_c_one'=>$this->input->post('sample_c_one'),
     'sample_d_one'=>$this->input->post('sample_d_one'),
     // 'sample_e_one'=>$this->input->post('sample_e_one'),
     // 'sample_f_one'=>$this->input->post('sample_f_one'),
     // 'sample_g_one'=>$this->input->post('sample_g_one'),

     'sample_a_two'=>$this->input->post('sample_a_two'),
     'sample_b_two'=>$this->input->post('sample_b_two'),
     'sample_c_two'=>$this->input->post('sample_c_two'),
     'sample_d_two'=>$this->input->post('sample_d_two'),
     // 'sample_e_two'=>$this->input->post('sample_e_two'),
     // 'sample_f_two'=>$this->input->post('sample_f_two'),
     // 'sample_g_two'=>$this->input->post('sample_g_two'),
     
     'sample_a_three'=>$this->input->post('sample_a_three'),
     'sample_b_three'=>$this->input->post('sample_b_three'),
     'sample_c_three'=>$this->input->post('sample_c_three'),
     'sample_d_three'=>$this->input->post('sample_d_three'),
     // 'sample_e_three'=>$this->input->post('sample_e_three'),
     // 'sample_f_three'=>$this->input->post('sample_f_three'),
     // 'sample_g_three'=>$this->input->post('sample_g_three'),
     
     'sample_a_four'=>$this->input->post('sample_a_four'),
     'sample_b_four'=>$this->input->post('sample_b_four'),
     'sample_c_four'=>$this->input->post('sample_c_four'),
     'sample_d_four'=>$this->input->post('sample_d_four'),
     // 'sample_e_four'=>$this->input->post('sample_e_four'),
     // 'sample_f_four'=>$this->input->post('sample_f_four'),
     // 'sample_g_four'=>$this->input->post('sample_g_four'),
     
     'sample_a_five'=>$this->input->post('sample_a_five'),
     'sample_b_five'=>$this->input->post('sample_b_five'),
     'sample_c_five'=>$this->input->post('sample_c_five'),
     'sample_d_five'=>$this->input->post('sample_d_five'),
     // 'sample_e_five'=>$this->input->post('sample_e_five'),
     // 'sample_f_five'=>$this->input->post('sample_f_five'),
     // 'sample_g_five'=>$this->input->post('sample_g_five'),
     
     'sample_a_six'=>$this->input->post('sample_a_six'),
     'sample_b_six'=>$this->input->post('sample_b_six'),
     'sample_c_six'=>$this->input->post('sample_c_six'),
     'sample_d_six'=>$this->input->post('sample_d_six'),
     // 'sample_e_six'=>$this->input->post('sample_e_six'),
     // 'sample_f_six'=>$this->input->post('sample_f_six'),
     // 'sample_g_six'=>$this->input->post('sample_g_six'),

     'ratio_std_a_one'=>$this->input->post('ratio_std_a_one'),
     'ratio_std_b_one'=>$this->input->post('ratio_std_b_one'),
     'ratio_std_c_one'=>$this->input->post('ratio_std_c_one'),
     'ratio_std_d_one'=>$this->input->post('ratio_std_d_one'),
     // 'ratio_std_e_one'=>$this->input->post('ratio_std_e_one'),
     // 'ratio_std_f_one'=>$this->input->post('ratio_std_f_one'),
     // 'ratio_std_g_one'=>$this->input->post('ratio_std_g_one'),

     'ratio_std_a_two'=>$this->input->post('ratio_std_a_two'),
     'ratio_std_b_two'=>$this->input->post('ratio_std_b_two'),
     'ratio_std_c_two'=>$this->input->post('ratio_std_c_two'),
     'ratio_std_d_two'=>$this->input->post('ratio_std_d_two'),
     // 'ratio_std_e_two'=>$this->input->post('ratio_std_e_two'),
     // 'ratio_std_f_two'=>$this->input->post('ratio_std_f_two'),
     // 'ratio_std_g_two'=>$this->input->post('ratio_std_g_two'),

     'ratio_std_a_three'=>$this->input->post('ratio_std_a_three'),
     'ratio_std_b_three'=>$this->input->post('ratio_std_b_three'),
     'ratio_std_c_three'=>$this->input->post('ratio_std_c_three'),
     'ratio_std_d_three'=>$this->input->post('ratio_std_d_three'),
     // 'ratio_std_e_three'=>$this->input->post('ratio_std_e_three'),
     // 'ratio_std_f_three'=>$this->input->post('ratio_std_f_three'),
     // 'ratio_std_g_three'=>$this->input->post('ratio_std_g_three'),

     'ratio_std_a_four'=>$this->input->post('ratio_std_a_four'),
     'ratio_std_b_four'=>$this->input->post('ratio_std_b_four'),
     'ratio_std_c_four'=>$this->input->post('ratio_std_c_four'),
     'ratio_std_d_four'=>$this->input->post('ratio_std_d_four'),
     // 'ratio_std_e_four'=>$this->input->post('ratio_std_e_four'),
     // 'ratio_std_f_four'=>$this->input->post('ratio_std_f_four'),
     // 'ratio_std_g_four'=>$this->input->post('ratio_std_g_four'),

     'ratio_std_a_five'=>$this->input->post('ratio_std_a_five'),
     'ratio_std_b_five'=>$this->input->post('ratio_std_b_five'),
     'ratio_std_c_five'=>$this->input->post('ratio_std_c_five'),
     'ratio_std_d_five'=>$this->input->post('ratio_std_d_five'),
     // 'ratio_std_e_five'=>$this->input->post('ratio_std_e_five'),
     // 'ratio_std_f_five'=>$this->input->post('ratio_std_f_five'),
     // 'ratio_std_g_five'=>$this->input->post('ratio_std_g_five'),

     'ratio_std_a_six'=>$this->input->post('ratio_std_a_six'),
     'ratio_std_b_six'=>$this->input->post('ratio_std_b_six'),
     'ratio_std_c_six'=>$this->input->post('ratio_std_c_six'),
     'ratio_std_d_six'=>$this->input->post('ratio_std_d_six'),
     // 'ratio_std_e_six'=>$this->input->post('ratio_std_e_six'),
     // 'ratio_std_f_six'=>$this->input->post('ratio_std_f_six'),
     // 'ratio_std_g_six'=>$this->input->post('ratio_std_g_six'),

     'ratio_std_a_seven'=>$this->input->post('ratio_std_a_seven'),
     'ratio_std_b_seven'=>$this->input->post('ratio_std_b_seven'),
     'ratio_std_c_seven'=>$this->input->post('ratio_std_c_sevee'),
     'ratio_std_d_seven'=>$this->input->post('ratio_std_d_seven'),
     // 'ratio_std_e_seven'=>$this->input->post('ratio_std_e_seven'),
     // 'ratio_std_f_seven'=>$this->input->post('ratio_std_f_seven'),
     // 'ratio_std_g_seven'=>$this->input->post('ratio_std_g_seven'),
     
     'std_average'=>$this->input->post('std_average'),
     'internal_std_a_average'=>$this->input->post('internal_std_a_average'),
     'ratio_std_a_average'=>$this->input->post('ratio_std_a_average'),

     'sample_a_average'=>$this->input->post('sample_a_average'),
     'internal_std_b_average'=>$this->input->post('internal_std_b_average'),
     'ratio_std_b_average'=>$this->input->post('ratio_std_b_average'),

     'sample_b_average'=>$this->input->post('sample_b_average'),
     'internal_std_c_average'=>$this->input->post('internal_std_c_average'),
     'ratio_std_c_average'=>$this->input->post('ratio_std_c_average'),

     'sample_c_average'=>$this->input->post('sample_c_average'),
     'internal_std_d_average'=>$this->input->post('internal_std_d_average'),
     'ratio_std_d_average'=>$this->input->post('ratio_std_d_average'),

     'sample_d_average'=>$this->input->post('sample_d_average'),
     'internal_std_e_average'=>$this->input->post('internal_std_e_average'),
     'ratio_std_e_average'=>$this->input->post('ratio_std_e_average'),

     'sample_e_average'=>$this->input->post('sample_e_average'),
     'internal_std_f_average'=>$this->input->post('internal_std_f_average'),
     'ratio_std_f_average'=>$this->input->post('ratio_std_f_average'),

     'sample_f_average'=>$this->input->post('sample_f_average'),
     'internal_std_g_average'=>$this->input->post('internal_std_g_average'),
     'ratio_std_g_average'=>$this->input->post('ratio_std_g_average')


    );

   $data_six = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_cream_id'=>$assay_hplc_cream_id,
     'system_suitability_sequence_requirement'=>$this->input->post('system_suitability_sequence'),
     'sample_injection_sequence_requirement'=>$this->input->post('sample_injection_sequence'),
     'chromatograms_attached_requirement'=>$this->input->post('chromatograms_attached'),
     'system_suitability_sequence_comment'=>$this->input->post('system_suitability_sequence_comment'),
     'sample_injection_sequence_comment'=>$this->input->post('sample_injection_sequence_comment'),
     'chromatograms_attached_comment'=>$this->input->post('chromatograms_attached_comment')

    );

  
    $data_seven = array(
     
     'test_id'=>$test_id,
     'test_request_id'=>$test_request_id,
     'test_type'=>$test_type,
     'results'=>$this->input->post('determination_average'),
     'method'=>$this->input->post('method'),
     'remarks'=>$this->input->post('test_conclusion')
    );
    $this->db->update('test_results', $data_seven, array('test_request_id' => $test_request_id , 'test_type'=>$test_type,));
    $this->db->insert('assay_hplc_cream_chromatography_checklist',$data_six);
    $this->db->insert('assay_hplc_cream_peak_area_chromatograms',$data_five);
    $this->db->insert('assay_hplc_cream_chromatograms',$data_three);
    $this->db->insert('assay_hplc_cream_chromatographic_conditions',$data_two);
    $this->db->insert('assay_hplc_cream', $data);
    redirect('test/index/'.$assignment_id.'/'.$test_request_id.'/'.$test_type_id);
  }


     function process_ointment(){

    $assignment_id=$this->input->post('assignment_id');
    $test_request_id=$this->input->post('tr_id');
    $test_type_id=$this->input->post('test_type_id');
    $status=0;
    $test_type="f";
    $ointment=' Assay Ointment Test';
    $data=$this->db->select_max('id')->get('assay_hplc_ointment')->result();
    $assay_hplc_ointment_id=$data[0]->id;
    $assay_hplc_ointment_id++;

    $data=$this->db->select_max('id')->get('assay_hplc_ointment')->result();
    $test_id=$data[0]->id;
    $test_id++;
    
    $test_conslusion=0;
    $conclusion=$this->input->post('test_conclusion');
    
    if( $conclusion=$this->input->post('test_conclusion')=="Test Complies (Passed)"){
      $choice=1;
      $status=1.1;
    }else if($conclusion=$this->input->post('test_conclusion')=="Test Does Not Comply(Failed)"){
      $choice=0;
      $status=1;
    }  

    //Sample Insertion
    $data = array(
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,    
     'serial_number'=>$this->input->post('serial_number'),
     'analysis_date'=>$this->input->post('analysis_date'),
     'balance_make'=>$this->input->post('equipmentbalance'),
     'balance_id'=>$this->input->post('equipment_id'),
     'weight_of_sample_container_w1'=>$this->input->post('weight_sample_container_one'),
     'weight_of_sample_container_w2'=>$this->input->post('weight_sample_container_two'),
     'weight_of_sample_container_w3'=>$this->input->post('weight_sample_container_three'),
     'weight_of_container_w1'=>$this->input->post('weight_container_one'),
     'weight_of_container_w2'=>$this->input->post('weight_container_two'),
     'weight_of_container_w3'=>$this->input->post('weight_container_three'),
     'weight_of_sample_w1'=>$this->input->post('weight_sample_one'),
     'weight_of_sample_w2'=>$this->input->post('weight_sample_two'),
     'weight_of_sample_w3'=>$this->input->post('weight_sample_three'),
     'dilution_one'=>$this->input->post('dilution_one'),
     'sample_dilution_result'=>$this->input->post('sample_dilution_result'),
     'weight_of_standard_preparation'=>$this->input->post('weight_of_standard_preparation'),
     'standard_description_one'=>$this->input->post('standard_description_one'),
     'potency_one'=>$this->input->post('potency_one'),
     'weight_standard_container_std_one'=>$this->input->post('weight_standard_container_one'),
     'weight_container_of_std_one'=>$this->input->post('weight_container_of_std_one'),
     'weight_of_standard_one'=>$this->input->post('weight_of_standard_one'),
     'dilution_two'=>$this->input->post('dilution_two'),
     'equipment_make'=>$this->input->post('equipmentmake'),
     'equipment_id'=>$this->input->post('make_id'),
     'weight_of_reagent_container_w1'=>$this->input->post('weight_reagent_container_one'),
     'weight_of_reagent_container_w2'=>$this->input->post('weight_reagent_container_two'),
     'weight_of_reagent_container_w3'=>$this->input->post('weight_reagent_container_three'),
     'weight_of_reagent_container_w4'=>$this->input->post('weight_reagent_container_four'),
     'weight_of_reagent_container_w5'=>$this->input->post('weight_reagent_container_five'),
     'weight_of_reagent_container_w6'=>$this->input->post('weight_reagent_container_six'),
     'weight_of_container_w1_reagent'=>$this->input->post('weight_container_one_reagent'),
     'weight_of_container_w2_reagent'=>$this->input->post('weight_container_two_reagent'),
     'weight_of_container_w3_reagent'=>$this->input->post('weight_container_three_reagent'),
     'weight_of_container_w4_reagent'=>$this->input->post('weight_container_four_reagent'),
     'weight_of_container_w5_reagent'=>$this->input->post('weight_container_five_reagent'),
     'weight_of_container_w6_reagent'=>$this->input->post('weight_container_six_reagent'),
     'weight_of_reagent_w1'=>$this->input->post('weight_reagent_one'),
     'weight_of_reagent_w2'=>$this->input->post('weight_reagent_two'),
     'weight_of_reagent_w3'=>$this->input->post('weight_reagent_three'),
     'weight_of_reagent_w4'=>$this->input->post('weight_reagent_four'),
     'weight_of_reagent_w5'=>$this->input->post('weight_reagent_five'),
     'weight_of_reagent_w6'=>$this->input->post('weight_reagent_six'),
     
     'mobile_phase_preparation'=>$this->input->post('mobile_phase_preparation'),
     'd_one_pkt'=>$this->input->post('d_one_pkt'),
     'd_one_wstd'=>$this->input->post('d_one_wstd'),
     'd_one_awt'=>$this->input->post('d_one_awt'),
     'd_one_df'=>$this->input->post('d_one_df'),
     'd_one_potency'=>$this->input->post('d_one_potency'),
     'd_one_pkstd'=>$this->input->post('d_one_pkstd'),
     'd_one_wt'=>$this->input->post('d_one_wt'),
     'd_one_lc'=>$this->input->post('d_one_lc'),
     'd_two_pkt'=>$this->input->post('d_two_pkt'),
     'd_two_wstd'=>$this->input->post('d_two_wstd'),
     'd_two_awt'=>$this->input->post('d_two_awt'),
     'd_two_df'=>$this->input->post('d_two_df'),
     'd_two_potency'=>$this->input->post('d_two_potency'),
     'd_two_pkstd'=>$this->input->post('d_two_pkstd'),
     'd_two_wt'=>$this->input->post('d_two_wt'),
     'd_two_lc'=>$this->input->post('d_two_lc'),
     'd_three_pkt'=>$this->input->post('d_three_pkt'),
     'd_three_wstd'=>$this->input->post('d_three_wstd'),
     'd_three_awt'=>$this->input->post('d_three_awt'),
     'd_three_df'=>$this->input->post('d_three_df'),
     'd_three_potency'=>$this->input->post('d_three_potency'),
     'd_three_pkstd'=>$this->input->post('d_three_pkstd'),
     'd_three_wt'=>$this->input->post('d_three_wt'),
     'd_three_lc'=>$this->input->post('d_three_lc'),

     'determination_one'=>$this->input->post('d_one_p_lc'),
     'determination_two'=>$this->input->post('d_two_p_lc'),
     'determination_three'=>$this->input->post('d_three_p_lc'),

     'average_determination'=>$this->input->post('determination_average'),
     'equivalent_to'=>$this->input->post('determination_equivalent_to'),
     'range_det_min'=>$this->input->post('range_det_min'),
     'range_det_max'=>$this->input->post('range_det_max'),
     'sd_determination'=>$this->input->post('determination_sd'),
     'rsd_determination'=>$this->input->post('determination_rsd'),

     'min_tolerance'=>$this->input->post('min_tolerance'),
     'max_tolerance'=>$this->input->post('max_tolerance'),
     'min_tolerance_comment'=>$this->input->post('min_tolerance_comment'),
     'max_tolerance_comment'=>$this->input->post('max_tolerance_comment'),
     'range_tolerance_comment'=>$this->input->post('range_tolerance_comment'),
     'sd_comment'=>$this->input->post('sd_comment'),
     'rsd_comment'=>$this->input->post('rsd_comment'),
     
     'sysytem_suitability_sequence'=>$this->input->post('sysytem_suitability_sequence'),
     'sysytem_suitability_sequence_comment'=>$this->input->post('sysytem_suitability_sequence_comment'),
     'sample_injection_sequence'=>$this->input->post('sample_injection_sequence'),
     'Sample_injection_sequence_comment'=>$this->input->post('Sample_injection_sequence_comment'),
     'chromatograms_attached'=>$this->input->post('chromatograms_attached'),
     'chromatograms_attached_comment'=>$this->input->post('chromatograms_attached_comment'),
     'conclusion'=>$this->input->post('test_conclusion'),
     
     'done_by'=>$this->input->post('done_by'),
     'date_done'=>$this->input->post('date_done'),
     'supervisor'=>$this->input->post('supervisor'),
     'date_appproved'=>$this->input->post('date_appproved'),
     'further_comments'=>$this->input->post('further_comments'),
     'test_status'=>$status,
     'choice'=>$conclusion
    );
    $data_two = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_ointment_id'=>$assay_hplc_ointment_id,
     'name'=>$this->input->post('column_name'),
     'length'=>$this->input->post('column_dimensions'),
     'lot_serial_number'=>$this->input->post('column_serial_number'),
     'manufacturer'=>$this->input->post('column_manufacturer'),
     
     'column_pressure'=>$this->input->post('column_pressure'),
     'column_pressure_units'=>$this->input->post('column_pressure_units'),
     'column_oven_temperature'=>$this->input->post('column_oven_temperature'),
     'column_oven_temperature_units'=>$this->input->post('column_oven_temperature_units'),
     'mobile_phase_flow_rate'=>$this->input->post('column_mp_flow_rate'),
     'detection_wavelength'=>$this->input->post('column_detection_wavelength')

    );

    $data_three = array(

     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_ointment_id'=>$assay_hplc_ointment_id,

     'retention_time_one'=>$this->input->post('retention_time_one'),
     'retention_time_two'=>$this->input->post('retention_time_two'),
     'retention_time_three'=>$this->input->post('retention_time_three'),
     'retention_time_four'=>$this->input->post('retention_time_four'),
     'retention_time_five'=>$this->input->post('retention_time_five'),
     'retention_time_six'=>$this->input->post('retention_time_six'),

     'peak_area_one'=>$this->input->post('peak_area_one'),
     'peak_area_two'=>$this->input->post('peak_area_two'),
     'peak_area_three'=>$this->input->post('peak_area_three'),
     'peak_area_four'=>$this->input->post('peak_area_four'),
     'peak_area_five'=>$this->input->post('peak_area_five'),
     'peak_area_six'=>$this->input->post('peak_area_six'),

     'asymmetry_one'=>$this->input->post('asymmetry_one'),
     'asymmetry_two'=>$this->input->post('asymmetry_two'),
     'asymmetry_three'=>$this->input->post('asymmetry_three'),
     'asymmetry_four'=>$this->input->post('asymmetry_four'),
     'asymmetry_five'=>$this->input->post('asymmetry_five'),
     'asymmetry_six'=>$this->input->post('asymmetry_six'),

     'resolution_one'=>$this->input->post('resolution_one'),
     'resolution_two'=>$this->input->post('resolution_two'),
     'resolution_three'=>$this->input->post('resolution_three'),
     'resolution_four'=>$this->input->post('resolution_four'),
     'resolution_five'=>$this->input->post('resolution_five'),
     'resolution_six'=>$this->input->post('resolution_six'),

     'relative_retention_time_one'=>$this->input->post('relative_retention_time_one'),
     'relative_retention_time_two'=>$this->input->post('relative_retention_time_two'),
     'relative_retention_time_three'=>$this->input->post('relative_retention_time_three'),
     'relative_retention_time_four'=>$this->input->post('relative_retention_time_four'),
     'relative_retention_time_five'=>$this->input->post('relative_retention_time_five'),
     'relative_retention_time_six'=>$this->input->post('relative_retention_time_six'),

     'average_retention_time'=>$this->input->post('average_retention_time'),
     'average_peak_area'=>$this->input->post('average_peak_area'),
     'average_asymmetry'=>$this->input->post('average_asymmetry'),
     'average_resolution'=>$this->input->post('average_resolution'),
     'average_relative_retention_time'=>$this->input->post('average_relative_retention_time'),

     'sd_retention_time'=>$this->input->post('standard_dev_retention_time'),
     'sd_peak_area'=>$this->input->post('standard_dev_peak_area'),
     'sd_asymmetry'=>$this->input->post('standard_dev_asymmetry'),
     'sd_resolution'=>$this->input->post('standard_dev_resolution'),
     'sd_relative_retention_time'=>$this->input->post('standard_dev_relative_retention_time'),

     'rsd_retention_time'=>$this->input->post('rsd_retention_time'),
     'rsd_peak_area'=>$this->input->post('rsd_peak_area'),
     'rsd_asymmetry'=>$this->input->post('rsd_asymmetry'),
     'rsd_resolution'=>$this->input->post('rsd_resolution'),
     'rsd_relative_retention_time'=>$this->input->post('rsd_relative_retention_time'),
     
     'comment_retention_time'=>$this->input->post('comment_retention_time'),
     'comment_peak_area'=>$this->input->post('comment_peak_area'),
     'comment_asymmetry'=>$this->input->post('comment_asymmetry'),
     'comment_resolution'=>$this->input->post('comment_resolution'),
     'comment_relative_retention_time'=>$this->input->post('comment_relative_retention_time')

    );


    $data_five = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_ointment_id'=>$assay_hplc_ointment_id,

     'std_one'=>$this->input->post('std_one'),
     'std_two'=>$this->input->post('std_two'),
     'std_three'=>$this->input->post('std_three'),
     'std_four'=>$this->input->post('std_four'),
     'std_five'=>$this->input->post('std_five'),

     'internal_std_a_one'=>$this->input->post('internal_std_a_one'),
     'internal_std_b_one'=>$this->input->post('internal_std_b_one'),
     'internal_std_c_one'=>$this->input->post('internal_std_c_one'),
     'internal_std_d_one'=>$this->input->post('internal_std_d_one'),
     // 'internal_std_e_one'=>$this->input->post('internal_std_e_one'),
     // 'internal_std_f_one'=>$this->input->post('internal_std_f_one'),
     // 'internal_std_g_one'=>$this->input->post('internal_std_g_one'),

     'internal_std_a_two'=>$this->input->post('internal_std_a_two'),
     'internal_std_b_two'=>$this->input->post('internal_std_b_two'),
     'internal_std_c_two'=>$this->input->post('internal_std_c_two'),
     'internal_std_d_two'=>$this->input->post('internal_std_d_two'),
     // 'internal_std_e_two'=>$this->input->post('internal_std_e_two'),
     // 'internal_std_f_two'=>$this->input->post('internal_std_f_two'),
     // 'internal_std_g_two'=>$this->input->post('internal_std_g_two'),

     'internal_std_a_three'=>$this->input->post('internal_std_a_three'),
     'internal_std_b_three'=>$this->input->post('internal_std_b_three'),
     'internal_std_c_three'=>$this->input->post('internal_std_c_three'),
     'internal_std_d_three'=>$this->input->post('internal_std_d_three'),
     // 'internal_std_e_three'=>$this->input->post('internal_std_e_three'),
     // 'internal_std_f_three'=>$this->input->post('internal_std_f_three'),
     // 'internal_std_g_three'=>$this->input->post('internal_std_g_three'),

     'internal_std_a_four'=>$this->input->post('internal_std_a_four'),
     'internal_std_b_four'=>$this->input->post('internal_std_b_four'),
     'internal_std_c_four'=>$this->input->post('internal_std_c_four'),
     'internal_std_d_four'=>$this->input->post('internal_std_d_four'),
     // 'internal_std_e_four'=>$this->input->post('internal_std_e_four'),
     // 'internal_std_f_four'=>$this->input->post('internal_std_f_four'),
     // 'internal_std_g_four'=>$this->input->post('internal_std_g_four'),

     'internal_std_a_five'=>$this->input->post('internal_std_a_five'),
     'internal_std_b_five'=>$this->input->post('internal_std_b_five'),
     'internal_std_c_five'=>$this->input->post('internal_std_c_five'),
     'internal_std_d_five'=>$this->input->post('internal_std_d_five'),
     // 'internal_std_e_five'=>$this->input->post('internal_std_e_five'),
     // 'internal_std_f_five'=>$this->input->post('internal_std_f_five'),
     // 'internal_std_g_five'=>$this->input->post('internal_std_g_five'),

     'internal_std_a_six'=>$this->input->post('internal_std_a_six'),
     'internal_std_b_six'=>$this->input->post('internal_std_b_six'),
     'internal_std_c_six'=>$this->input->post('internal_std_c_six'),
     'internal_std_d_six'=>$this->input->post('internal_std_d_six'),
     // 'internal_std_e_six'=>$this->input->post('internal_std_e_six'),
     // 'internal_std_f_six'=>$this->input->post('internal_std_f_six'),
     // 'internal_std_g_six'=>$this->input->post('internal_std_g_six'),

     'internal_std_a_seven'=>$this->input->post('internal_std_a_seven'),
     'internal_std_b_seven'=>$this->input->post('internal_std_b_seven'),
     'internal_std_c_seven'=>$this->input->post('internal_std_c_seven'),
     'internal_std_d_seven'=>$this->input->post('internal_std_d_seven'),
     // 'internal_std_e_seven'=>$this->input->post('internal_std_e_seven'),
     // 'internal_std_f_seven'=>$this->input->post('internal_std_f_seven'),
     // 'internal_std_g_seven'=>$this->input->post('internal_std_g_seven'),

     'sample_a_one'=>$this->input->post('sample_a_one'),
     'sample_b_one'=>$this->input->post('sample_b_one'),
     'sample_c_one'=>$this->input->post('sample_c_one'),
     'sample_d_one'=>$this->input->post('sample_d_one'),
     // 'sample_e_one'=>$this->input->post('sample_e_one'),
     // 'sample_f_one'=>$this->input->post('sample_f_one'),
     // 'sample_g_one'=>$this->input->post('sample_g_one'),

     'sample_a_two'=>$this->input->post('sample_a_two'),
     'sample_b_two'=>$this->input->post('sample_b_two'),
     'sample_c_two'=>$this->input->post('sample_c_two'),
     'sample_d_two'=>$this->input->post('sample_d_two'),
     // 'sample_e_two'=>$this->input->post('sample_e_two'),
     // 'sample_f_two'=>$this->input->post('sample_f_two'),
     // 'sample_g_two'=>$this->input->post('sample_g_two'),
     
     'sample_a_three'=>$this->input->post('sample_a_three'),
     'sample_b_three'=>$this->input->post('sample_b_three'),
     'sample_c_three'=>$this->input->post('sample_c_three'),
     'sample_d_three'=>$this->input->post('sample_d_three'),
     // 'sample_e_three'=>$this->input->post('sample_e_three'),
     // 'sample_f_three'=>$this->input->post('sample_f_three'),
     // 'sample_g_three'=>$this->input->post('sample_g_three'),
     
     'sample_a_four'=>$this->input->post('sample_a_four'),
     'sample_b_four'=>$this->input->post('sample_b_four'),
     'sample_c_four'=>$this->input->post('sample_c_four'),
     'sample_d_four'=>$this->input->post('sample_d_four'),
     // 'sample_e_four'=>$this->input->post('sample_e_four'),
     // 'sample_f_four'=>$this->input->post('sample_f_four'),
     // 'sample_g_four'=>$this->input->post('sample_g_four'),
     
     'sample_a_five'=>$this->input->post('sample_a_five'),
     'sample_b_five'=>$this->input->post('sample_b_five'),
     'sample_c_five'=>$this->input->post('sample_c_five'),
     'sample_d_five'=>$this->input->post('sample_d_five'),
     // 'sample_e_five'=>$this->input->post('sample_e_five'),
     // 'sample_f_five'=>$this->input->post('sample_f_five'),
     // 'sample_g_five'=>$this->input->post('sample_g_five'),
     
     'sample_a_six'=>$this->input->post('sample_a_six'),
     'sample_b_six'=>$this->input->post('sample_b_six'),
     'sample_c_six'=>$this->input->post('sample_c_six'),
     'sample_d_six'=>$this->input->post('sample_d_six'),
     // 'sample_e_six'=>$this->input->post('sample_e_six'),
     // 'sample_f_six'=>$this->input->post('sample_f_six'),
     // 'sample_g_six'=>$this->input->post('sample_g_six'),

     'ratio_std_a_one'=>$this->input->post('ratio_std_a_one'),
     'ratio_std_b_one'=>$this->input->post('ratio_std_b_one'),
     'ratio_std_c_one'=>$this->input->post('ratio_std_c_one'),
     'ratio_std_d_one'=>$this->input->post('ratio_std_d_one'),
     // 'ratio_std_e_one'=>$this->input->post('ratio_std_e_one'),
     // 'ratio_std_f_one'=>$this->input->post('ratio_std_f_one'),
     // 'ratio_std_g_one'=>$this->input->post('ratio_std_g_one'),

     'ratio_std_a_two'=>$this->input->post('ratio_std_a_two'),
     'ratio_std_b_two'=>$this->input->post('ratio_std_b_two'),
     'ratio_std_c_two'=>$this->input->post('ratio_std_c_two'),
     'ratio_std_d_two'=>$this->input->post('ratio_std_d_two'),
     // 'ratio_std_e_two'=>$this->input->post('ratio_std_e_two'),
     // 'ratio_std_f_two'=>$this->input->post('ratio_std_f_two'),
     // 'ratio_std_g_two'=>$this->input->post('ratio_std_g_two'),

     'ratio_std_a_three'=>$this->input->post('ratio_std_a_three'),
     'ratio_std_b_three'=>$this->input->post('ratio_std_b_three'),
     'ratio_std_c_three'=>$this->input->post('ratio_std_c_three'),
     'ratio_std_d_three'=>$this->input->post('ratio_std_d_three'),
     // 'ratio_std_e_three'=>$this->input->post('ratio_std_e_three'),
     // 'ratio_std_f_three'=>$this->input->post('ratio_std_f_three'),
     // 'ratio_std_g_three'=>$this->input->post('ratio_std_g_three'),

     'ratio_std_a_four'=>$this->input->post('ratio_std_a_four'),
     'ratio_std_b_four'=>$this->input->post('ratio_std_b_four'),
     'ratio_std_c_four'=>$this->input->post('ratio_std_c_four'),
     'ratio_std_d_four'=>$this->input->post('ratio_std_d_four'),
     // 'ratio_std_e_four'=>$this->input->post('ratio_std_e_four'),
     // 'ratio_std_f_four'=>$this->input->post('ratio_std_f_four'),
     // 'ratio_std_g_four'=>$this->input->post('ratio_std_g_four'),

     'ratio_std_a_five'=>$this->input->post('ratio_std_a_five'),
     'ratio_std_b_five'=>$this->input->post('ratio_std_b_five'),
     'ratio_std_c_five'=>$this->input->post('ratio_std_c_five'),
     'ratio_std_d_five'=>$this->input->post('ratio_std_d_five'),
     // 'ratio_std_e_five'=>$this->input->post('ratio_std_e_five'),
     // 'ratio_std_f_five'=>$this->input->post('ratio_std_f_five'),
     // 'ratio_std_g_five'=>$this->input->post('ratio_std_g_five'),

     'ratio_std_a_six'=>$this->input->post('ratio_std_a_six'),
     'ratio_std_b_six'=>$this->input->post('ratio_std_b_six'),
     'ratio_std_c_six'=>$this->input->post('ratio_std_c_six'),
     'ratio_std_d_six'=>$this->input->post('ratio_std_d_six'),
     // 'ratio_std_e_six'=>$this->input->post('ratio_std_e_six'),
     // 'ratio_std_f_six'=>$this->input->post('ratio_std_f_six'),
     // 'ratio_std_g_six'=>$this->input->post('ratio_std_g_six'),

     'ratio_std_a_seven'=>$this->input->post('ratio_std_a_seven'),
     'ratio_std_b_seven'=>$this->input->post('ratio_std_b_seven'),
     'ratio_std_c_seven'=>$this->input->post('ratio_std_c_sevee'),
     'ratio_std_d_seven'=>$this->input->post('ratio_std_d_seven'),
     // 'ratio_std_e_seven'=>$this->input->post('ratio_std_e_seven'),
     // 'ratio_std_f_seven'=>$this->input->post('ratio_std_f_seven'),
     // 'ratio_std_g_seven'=>$this->input->post('ratio_std_g_seven'),
     
     'std_average'=>$this->input->post('std_average'),
     'internal_std_a_average'=>$this->input->post('internal_std_a_average'),
     'ratio_std_a_average'=>$this->input->post('ratio_std_a_average'),

     'sample_a_average'=>$this->input->post('sample_a_average'),
     'internal_std_b_average'=>$this->input->post('internal_std_b_average'),
     'ratio_std_b_average'=>$this->input->post('ratio_std_b_average'),

     'sample_b_average'=>$this->input->post('sample_b_average'),
     'internal_std_c_average'=>$this->input->post('internal_std_c_average'),
     'ratio_std_c_average'=>$this->input->post('ratio_std_c_average'),

     'sample_c_average'=>$this->input->post('sample_c_average'),
     'internal_std_d_average'=>$this->input->post('internal_std_d_average'),
     'ratio_std_d_average'=>$this->input->post('ratio_std_d_average'),

     'sample_d_average'=>$this->input->post('sample_d_average'),
     'internal_std_e_average'=>$this->input->post('internal_std_e_average'),
     'ratio_std_e_average'=>$this->input->post('ratio_std_e_average'),

     'sample_e_average'=>$this->input->post('sample_e_average'),
     'internal_std_f_average'=>$this->input->post('internal_std_f_average'),
     'ratio_std_f_average'=>$this->input->post('ratio_std_f_average'),

     'sample_f_average'=>$this->input->post('sample_f_average'),
     'internal_std_g_average'=>$this->input->post('internal_std_g_average'),
     'ratio_std_g_average'=>$this->input->post('ratio_std_g_average')


    );

   $data_six = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_ointment_id'=>$assay_hplc_ointment_id,
     'system_suitability_sequence_requirement'=>$this->input->post('system_suitability_sequence'),
     'sample_injection_sequence_requirement'=>$this->input->post('sample_injection_sequence'),
     'chromatograms_attached_requirement'=>$this->input->post('chromatograms_attached'),
     'system_suitability_sequence_comment'=>$this->input->post('system_suitability_sequence_comment'),
     'sample_injection_sequence_comment'=>$this->input->post('sample_injection_sequence_comment'),
     'chromatograms_attached_comment'=>$this->input->post('chromatograms_attached_comment')

    );

  
    $data_seven = array(
     
     'test_id'=>$test_id,
     'test_request_id'=>$test_request_id,
     'test_type'=>$test_type,
     'results'=>$this->input->post('determination_average'),
     'method'=>$this->input->post('method'),
     'remarks'=>$this->input->post('test_conclusion')
    );
    $this->db->update('test_results', $data_seven, array('test_request_id' => $test_request_id , 'test_type'=>$test_type,));
    $this->db->insert('assay_hplc_ointment_chromatography_checklist',$data_six);
    $this->db->insert('assay_hplc_ointment_peak_area_chromatograms',$data_five);
    $this->db->insert('assay_hplc_ointment_chromatograms',$data_three);
    $this->db->insert('assay_hplc_ointment_chromatographic_conditions',$data_two);
    $this->db->insert('assay_hplc_ointment', $data);
    redirect('test/index/'.$assignment_id.'/'.$test_request_id.'/'.$test_type_id);
  }
function process_injections(){

    $assignment_id=$this->input->post('assignment_id');
    $test_request_id=$this->input->post('tr_id');
    $test_type_id=$this->input->post('test_type_id');
    $status=0;
    $test_type="f";
    $injections=' Assay Injections Test';
    $data=$this->db->select_max('id')->get('assay_hplc_injections')->result();
    $assay_hplc_injections_id=$data[0]->id;
    $assay_hplc_injections_id++;

    $data=$this->db->select_max('id')->get('assay_hplc_injections')->result();
    $test_id=$data[0]->id;
    $test_id++;
    
    $test_conslusion=0;
    $conclusion=$this->input->post('test_conclusion');
    
    if( $conclusion=$this->input->post('test_conclusion')=="Test Complies (Passed)"){
      $choice=1;
      $status=1.1;
    }else if($conclusion=$this->input->post('test_conclusion')=="Test Does Not Comply(Failed)"){
      $choice=0;
      $status=1;
    }  

    //Sample Insertion
    $data = array(
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,    
     'serial_number'=>$this->input->post('serial_number'),
     'analysis_date'=>$this->input->post('analysis_date'),
     'balance_make'=>$this->input->post('equipmentbalance'),
     'balance_id'=>$this->input->post('equipment_id'),
     'weight_of_sample_container_w1'=>$this->input->post('weight_sample_container_one'),
     'weight_of_sample_container_w2'=>$this->input->post('weight_sample_container_two'),
     'weight_of_sample_container_w3'=>$this->input->post('weight_sample_container_three'),
     'weight_of_container_w1'=>$this->input->post('weight_container_one'),
     'weight_of_container_w2'=>$this->input->post('weight_container_two'),
     'weight_of_container_w3'=>$this->input->post('weight_container_three'),
     'weight_of_sample_w1'=>$this->input->post('weight_sample_one'),
     'weight_of_sample_w2'=>$this->input->post('weight_sample_two'),
     'weight_of_sample_w3'=>$this->input->post('weight_sample_three'),
     'dilution_one'=>$this->input->post('dilution_one'),
     'dilution_result_1'=>$this->input->post('dilution_result_1'),
     'dilution_result_2'=>$this->input->post('dilution_result_2'),
     'dilution_result_3'=>$this->input->post('dilution_result_3'),
     'determination_dilution_result'=>$this->input->post('determination_dilution_result'),
     'weight_of_standard_preparation'=>$this->input->post('weight_of_standard_preparation'),
     'standard_description_one'=>$this->input->post('standard_description_one'),
     'potency_one'=>$this->input->post('potency_one'),
     'weight_standard_container_std_one'=>$this->input->post('weight_standard_container_one'),
     'weight_container_of_std_one'=>$this->input->post('weight_container_of_std_one'),
     'weight_of_standard_one'=>$this->input->post('weight_of_standard_one'),
     'dilution_two'=>$this->input->post('dilution_two'),
     'equipment_make'=>$this->input->post('equipmentmake'),
     'equipment_id'=>$this->input->post('make_id'),
     'reagents_1'=>$this->input->post('reagents_1'),
     'reagents_2'=>$this->input->post('reagents_2'),
     'reagents_3'=>$this->input->post('reagents_3'),
     'reagents_4'=>$this->input->post('reagents_4'),
     'reagents_5'=>$this->input->post('reagents_5'),
     'reagents_6'=>$this->input->post('reagents_6'),
     'potency_two_one'=>$this->input->post('potency_two_1'),
     'potency_two_two'=>$this->input->post('potency_two_2'),
     'potency_two_three'=>$this->input->post('potency_two_1'),
     'potency_two_four'=>$this->input->post('potency_two_1'),
     'potency_two_five'=>$this->input->post('potency_two_1'),
     'potency_two_six'=>$this->input->post('potency_two_1'),

     'weight_of_reagent_container_w1'=>$this->input->post('weight_reagent_container_one'),
     'weight_of_reagent_container_w2'=>$this->input->post('weight_reagent_container_two'),
     'weight_of_reagent_container_w3'=>$this->input->post('weight_reagent_container_three'),
     'weight_of_reagent_container_w4'=>$this->input->post('weight_reagent_container_four'),
     'weight_of_reagent_container_w5'=>$this->input->post('weight_reagent_container_five'),
     'weight_of_reagent_container_w6'=>$this->input->post('weight_reagent_container_six'),
     'weight_of_container_w1_reagent'=>$this->input->post('weight_container_one_reagent'),
     'weight_of_container_w2_reagent'=>$this->input->post('weight_container_two_reagent'),
     'weight_of_container_w3_reagent'=>$this->input->post('weight_container_three_reagent'),
     'weight_of_container_w4_reagent'=>$this->input->post('weight_container_four_reagent'),
     'weight_of_container_w5_reagent'=>$this->input->post('weight_container_five_reagent'),
     'weight_of_container_w6_reagent'=>$this->input->post('weight_container_six_reagent'),
     'weight_of_reagent_w1'=>$this->input->post('weight_reagent_one'),
     'weight_of_reagent_w2'=>$this->input->post('weight_reagent_two'),
     'weight_of_reagent_w3'=>$this->input->post('weight_reagent_three'),
     'weight_of_reagent_w4'=>$this->input->post('weight_reagent_four'),
     'weight_of_reagent_w5'=>$this->input->post('weight_reagent_five'),
     'weight_of_reagent_w6'=>$this->input->post('weight_reagent_six'),

     'mobile_phase_preparation'=>$this->input->post('mobile_phase_preparation'),
     'd_one_pkt'=>$this->input->post('d_one_pkt'),
     'd_one_wstd'=>$this->input->post('d_one_wstd'),
     'd_one_awt'=>$this->input->post('d_one_awt'),
     'd_one_df'=>$this->input->post('d_one_df'),
     'd_one_potency'=>$this->input->post('d_one_potency'),
     'd_one_pkstd'=>$this->input->post('d_one_pkstd'),
     'd_one_wt'=>$this->input->post('d_one_wt'),
     'd_one_lc'=>$this->input->post('d_one_lc'),
     'd_two_pkt'=>$this->input->post('d_two_pkt'),
     'd_two_wstd'=>$this->input->post('d_two_wstd'),
     'd_two_awt'=>$this->input->post('d_two_awt'),
     'd_two_df'=>$this->input->post('d_two_df'),
     'd_two_potency'=>$this->input->post('d_two_potency'),
     'd_two_pkstd'=>$this->input->post('d_two_pkstd'),
     'd_two_wt'=>$this->input->post('d_two_wt'),
     'd_two_lc'=>$this->input->post('d_two_lc'),
     'd_three_pkt'=>$this->input->post('d_three_pkt'),
     'd_three_wstd'=>$this->input->post('d_three_wstd'),
     'd_three_awt'=>$this->input->post('d_three_awt'),
     'd_three_df'=>$this->input->post('d_three_df'),
     'd_three_potency'=>$this->input->post('d_three_potency'),
     'd_three_pkstd'=>$this->input->post('d_three_pkstd'),
     'd_three_wt'=>$this->input->post('d_three_wt'),
     'd_three_lc'=>$this->input->post('d_three_lc'),

     'determination_one'=>$this->input->post('d_one_p_lc'),
     'determination_two'=>$this->input->post('d_two_p_lc'),
     'determination_three'=>$this->input->post('d_three_p_lc'),

     'average_determination'=>$this->input->post('determination_average'),
     'equivalent_to'=>$this->input->post('determination_equivalent_to'),
     'range_det_min'=>$this->input->post('range_det_min'),
     'range_det_max'=>$this->input->post('range_det_max'),
     'sd_determination'=>$this->input->post('determination_sd'),
     'rsd_determination'=>$this->input->post('determination_rsd'),

     'min_tolerance'=>$this->input->post('min_tolerance'),
     'max_tolerance'=>$this->input->post('max_tolerance'),
     'min_tolerance_comment'=>$this->input->post('min_tolerance_comment'),
     'max_tolerance_comment'=>$this->input->post('max_tolerance_comment'),
     'range_tolerance_comment'=>$this->input->post('range_tolerance_comment'),
     'sd_comment'=>$this->input->post('sd_comment'),
     'rsd_comment'=>$this->input->post('rsd_comment'),
     
     'sysytem_suitability_sequence'=>$this->input->post('sysytem_suitability_sequence'),
     'sysytem_suitability_sequence_comment'=>$this->input->post('sysytem_suitability_sequence_comment'),
     'sample_injection_sequence'=>$this->input->post('sample_injection_sequence'),
     'Sample_injection_sequence_comment'=>$this->input->post('Sample_injection_sequence_comment'),
     'chromatograms_attached'=>$this->input->post('chromatograms_attached'),
     'chromatograms_attached_comment'=>$this->input->post('chromatograms_attached_comment'),
     'conclusion'=>$this->input->post('test_conclusion'),
     
     'done_by'=>$this->input->post('done_by'),
     'date_done'=>$this->input->post('date_done'),
     'supervisor'=>$this->input->post('supervisor'),
     'date_appproved'=>$this->input->post('date_appproved'),
     'further_comments'=>$this->input->post('further_comments'),
     'test_status'=>$status,
     'choice'=>$conclusion
    );
    $data_two = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_injections_id'=>$assay_hplc_injections_id,
     'name'=>$this->input->post('column_name'),
     'length'=>$this->input->post('column_dimensions'),
     'lot_serial_number'=>$this->input->post('column_serial_number'),
     'manufacturer'=>$this->input->post('column_manufacturer'),
     
     'column_pressure'=>$this->input->post('column_pressure'),
     'column_pressure_units'=>$this->input->post('column_pressure_units'),
     'column_oven_temperature'=>$this->input->post('column_oven_temperature'),
     'column_oven_temperature_units'=>$this->input->post('column_oven_temperature_units'),
     'mobile_phase_flow_rate'=>$this->input->post('column_mp_flow_rate'),
     'detection_wavelength'=>$this->input->post('column_detection_wavelength')

    );

    $data_three = array(

     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_injections_id'=>$assay_hplc_injections_id,

     'retention_time_one'=>$this->input->post('retention_time_one'),
     'retention_time_two'=>$this->input->post('retention_time_two'),
     'retention_time_three'=>$this->input->post('retention_time_three'),
     'retention_time_four'=>$this->input->post('retention_time_four'),
     'retention_time_five'=>$this->input->post('retention_time_five'),
     'retention_time_six'=>$this->input->post('retention_time_six'),

     'peak_area_one'=>$this->input->post('peak_area_one'),
     'peak_area_two'=>$this->input->post('peak_area_two'),
     'peak_area_three'=>$this->input->post('peak_area_three'),
     'peak_area_four'=>$this->input->post('peak_area_four'),
     'peak_area_five'=>$this->input->post('peak_area_five'),
     'peak_area_six'=>$this->input->post('peak_area_six'),

     'asymmetry_one'=>$this->input->post('asymmetry_one'),
     'asymmetry_two'=>$this->input->post('asymmetry_two'),
     'asymmetry_three'=>$this->input->post('asymmetry_three'),
     'asymmetry_four'=>$this->input->post('asymmetry_four'),
     'asymmetry_five'=>$this->input->post('asymmetry_five'),
     'asymmetry_six'=>$this->input->post('asymmetry_six'),

     'resolution_one'=>$this->input->post('resolution_one'),
     'resolution_two'=>$this->input->post('resolution_two'),
     'resolution_three'=>$this->input->post('resolution_three'),
     'resolution_four'=>$this->input->post('resolution_four'),
     'resolution_five'=>$this->input->post('resolution_five'),
     'resolution_six'=>$this->input->post('resolution_six'),

     'theoretical_plates_one'=>$this->input->post('theoretical_plates_one'),
     'theoretical_plates_two'=>$this->input->post('theoretical_plates_two'),
     'theoretical_plates_three'=>$this->input->post('theoretical_plates_three'),
     'theoretical_plates_four'=>$this->input->post('theoretical_plates_four'),
     'theoretical_plates_five'=>$this->input->post('theoretical_plates_five'),
     'theoretical_plates_six'=>$this->input->post('theoretical_plates_six'),

     'relative_retention_time_one'=>$this->input->post('relative_retention_time_one'),
     'relative_retention_time_two'=>$this->input->post('relative_retention_time_two'),
     'relative_retention_time_three'=>$this->input->post('relative_retention_time_three'),
     'relative_retention_time_final'=>$this->input->post('relative_retention_time_final'),
     // 'relative_retention_time_five'=>$this->input->post('relative_retention_time_five'),
     // 'relative_retention_time_six'=>$this->input->post('relative_retention_time_six'),

     'average_retention_time'=>$this->input->post('average_retention_time'),
     'average_peak_area'=>$this->input->post('average_peak_area'),
     'average_asymmetry'=>$this->input->post('average_asymmetry'),
     'average_resolution'=>$this->input->post('average_resolution'),
     'average_theoretical_plates_time'=>$this->input->post('average_theoretical_plates_time'),

     'sd_retention_time'=>$this->input->post('standard_dev_retention_time'),
     'sd_peak_area'=>$this->input->post('standard_dev_peak_area'),
     'sd_asymmetry'=>$this->input->post('standard_dev_asymmetry'),
     'sd_resolution'=>$this->input->post('standard_dev_resolution'),
     'sd_theoretical_plates_time'=>$this->input->post('standard_dev_theoretical_plates_time'),

     'rsd_retention_time'=>$this->input->post('rsd_retention_time'),
     'rsd_peak_area'=>$this->input->post('rsd_peak_area'),
     'rsd_asymmetry'=>$this->input->post('rsd_asymmetry'),
     'rsd_resolution'=>$this->input->post('rsd_resolution'),
     'rsd_theoretical_plates_time'=>$this->input->post('rsd_theoretical_plates_time'),
     
     'comment_retention_time'=>$this->input->post('comment_retention_time'),
     'comment_peak_area'=>$this->input->post('comment_peak_area'),
     'comment_asymmetry'=>$this->input->post('comment_asymmetry'),
     'comment_resolution'=>$this->input->post('comment_resolution'),
     'comment_theoretical_plates_time'=>$this->input->post('comment_theoretical_plates_time')

    );


    $data_five = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_injections_id'=>$assay_hplc_injections_id,

     'std_one'=>$this->input->post('std_one'),
     'std_two'=>$this->input->post('std_two'),
     'std_three'=>$this->input->post('std_three'),
     'std_four'=>$this->input->post('std_four'),
     'std_five'=>$this->input->post('std_five'),

     
     'sample_a_one'=>$this->input->post('sample_a_one'),
     'sample_b_one'=>$this->input->post('sample_b_one'),
     'sample_c_one'=>$this->input->post('sample_c_one'),
     
     'sample_a_two'=>$this->input->post('sample_a_two'),
     'sample_b_two'=>$this->input->post('sample_b_two'),
     'sample_c_two'=>$this->input->post('sample_c_two'),
    
     'sample_a_three'=>$this->input->post('sample_a_three'),
     'sample_b_three'=>$this->input->post('sample_b_three'),
     'sample_c_three'=>$this->input->post('sample_c_three'),
          
     'sample_a_four'=>$this->input->post('sample_a_four'),
     'sample_b_four'=>$this->input->post('sample_b_four'),
     'sample_c_four'=>$this->input->post('sample_c_four'),
    
     'sample_a_five'=>$this->input->post('sample_a_five'),
     'sample_b_five'=>$this->input->post('sample_b_five'),
     'sample_c_five'=>$this->input->post('sample_c_five'),
     
     // 'sample_a_six'=>$this->input->post('sample_a_six'),
     // 'sample_b_six'=>$this->input->post('sample_b_six'),
     // 'sample_c_six'=>$this->input->post('sample_c_six'),
     // 'sample_d_six'=>$this->input->post('sample_d_six'),
     // 'sample_e_six'=>$this->input->post('sample_e_six'),
     // 'sample_f_six'=>$this->input->post('sample_f_six'),
     // 'sample_g_six'=>$this->input->post('sample_g_six'),

     'std_average'=>$this->input->post('std_average'),     
     'sample_a_average'=>$this->input->post('sample_a_average'),
     'sample_b_average'=>$this->input->post('sample_b_average'),
     'sample_c_average'=>$this->input->post('sample_c_average'),
     
     
    );

   $data_six = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_injections_id'=>$assay_hplc_injections_id,
     'system_suitability_sequence_requirement'=>$this->input->post('system_suitability_sequence'),
     'sample_injection_sequence_requirement'=>$this->input->post('sample_injection_sequence'),
     'chromatograms_attached_requirement'=>$this->input->post('chromatograms_attached'),
     'system_suitability_sequence_comment'=>$this->input->post('system_suitability_sequence_comment'),
     'sample_injection_sequence_comment'=>$this->input->post('sample_injection_sequence_comment'),
     'chromatograms_attached_comment'=>$this->input->post('chromatograms_attached_comment')

    );

  
    $data_seven = array(
     
     'test_id'=>$test_id,
     'test_request_id'=>$test_request_id,
     'test_type'=>$test_type,
     'results'=>$this->input->post('determination_average'),
     'method'=>$this->input->post('method'),
     'remarks'=>$this->input->post('test_conclusion')
    );
    $this->db->update('test_results', $data_seven, array('test_request_id' => $test_request_id , 'test_type'=>$test_type,));
    $this->db->insert('assay_hplc_injections_chromatography_checklist',$data_six);
    $this->db->insert('assay_hplc_injections_peak_area_chromatograms',$data_five);
    $this->db->insert('assay_hplc_injections_chromatograms',$data_three);
    $this->db->insert('assay_hplc_injections_chromatographic_conditions',$data_two);
    $this->db->insert('assay_hplc_injections', $data);
    redirect('test/index/'.$assignment_id.'/'.$test_request_id.'/'.$test_type_id);
  }
   function process_internal_method_two_components(){

    $assignment_id=$this->input->post('assignment_id');
    $test_request_id=$this->input->post('tr_id');
    $test_type_id=$this->input->post('test_type_id');
    $status=1;
    $internal_method='6a';
    $data=$this->db->select_max('id')->get('assay_hplc_internal_method')->result();
    $assay_hplc_internal_method_id=$data[0]->id;
    $assay_hplc_internal_method_id++;
    
    $test_conslusion=0;
    $conclusion=$this->input->post('test_conclusion');
    
    if($conclusion=="Test Complies (Passed)"){
      $choice=1;
    }else if($conclusion=="Test Does Not Comply(Failed)"){
      $choice=0;
    }  

    //Sample Insertion
    $data = array(
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,    
     'serial_number'=>$this->input->post('serial_number'),
     'analysis_date'=>$this->input->post('analysis_date'),
     'balance_make'=>$this->input->post('equipmentbalance'),
     'balance_id'=>$this->input->post('equipment_id'),

     'component_one'=>$this->input->post('component_one'),
     'weight_of_sample_container_w1'=>$this->input->post('weight_sample_container_one'),
     'weight_of_sample_container_w2'=>$this->input->post('weight_sample_container_two'),
     'weight_of_sample_container_w3'=>$this->input->post('weight_sample_container_three'),
     'weight_of_sample_container_w4'=>$this->input->post('weight_sample_container_four'),
     'weight_of_sample_container_w5'=>$this->input->post('weight_sample_container_five'),
     'weight_of_sample_container_w6'=>$this->input->post('weight_sample_container_six'),
     'weight_of_container_w1'=>$this->input->post('weight_container_one'),
     'weight_of_container_w2'=>$this->input->post('weight_container_two'),
     'weight_of_container_w3'=>$this->input->post('weight_container_three'),
     'weight_of_container_w4'=>$this->input->post('weight_container_four'),
     'weight_of_container_w5'=>$this->input->post('weight_container_five'),
     'weight_of_container_w6'=>$this->input->post('weight_container_six'),
     'weight_of_sample_w1'=>$this->input->post('weight_sample_one'),
     'weight_of_sample_w2'=>$this->input->post('weight_sample_two'),
     'weight_of_sample_w3'=>$this->input->post('weight_sample_three'),
     'weight_of_sample_w4'=>$this->input->post('weight_sample_four'),
     'weight_of_sample_w5'=>$this->input->post('weight_sample_five'),
     'weight_of_sample_w6'=>$this->input->post('weight_sample_six'),
     'dilution_one'=>$this->input->post('dilution_one'),

     'component_two'=>$this->input->post('component_two'),
     'weight_of_sample_container_w1_comp2'=>$this->input->post('weight_sample_container_one_comp2'),
     'weight_of_sample_container_w2_comp2'=>$this->input->post('weight_sample_container_two_comp2'),
     'weight_of_sample_container_w3_comp2'=>$this->input->post('weight_sample_container_three_comp2'),
     'weight_of_sample_container_w4_comp2'=>$this->input->post('weight_sample_container_four_comp2'),
     'weight_of_sample_container_w5_comp2'=>$this->input->post('weight_sample_container_five_comp2'),
     'weight_of_sample_container_w6_comp2'=>$this->input->post('weight_sample_container_six_comp2'),
     'weight_of_container_w1_comp2'=>$this->input->post('weight_container_one_comp2'),
     'weight_of_container_w2_comp2'=>$this->input->post('weight_container_two_comp2'),
     'weight_of_container_w3_comp2'=>$this->input->post('weight_container_three_comp2'),
     'weight_of_container_w4_comp2'=>$this->input->post('weight_container_four_comp2'),
     'weight_of_container_w5_comp2'=>$this->input->post('weight_container_five_comp2'),
     'weight_of_container_w6_comp2'=>$this->input->post('weight_container_six_comp2'),
     'weight_of_sample_w1_comp2'=>$this->input->post('weight_sample_one_comp2'),
     'weight_of_sample_w2_comp2'=>$this->input->post('weight_sample_two_comp2'),
     'weight_of_sample_w3_comp2'=>$this->input->post('weight_sample_three_comp2'),
     'weight_of_sample_w4_comp2'=>$this->input->post('weight_sample_four_comp2'),
     'weight_of_sample_w5_comp2'=>$this->input->post('weight_sample_five_comp2'),
     'weight_of_sample_w6_comp2'=>$this->input->post('weight_sample_six_comp2'),
     'dilution_comp2'=>$this->input->post('dilution_comp2'),

     'weight_of_standard_preparation'=>$this->input->post('weight_of_standard_preparation'),
     'standard_description_one'=>$this->input->post('standard_description_one'),
     'standard_description_two'=>$this->input->post('standard_description_two'),
     'potency_one'=>$this->input->post('potency_one'),
     'potency_two'=>$this->input->post('potency_two'),
     'weight_standard_container_std_one'=>$this->input->post('weight_standard_container_one'),
     'weight_standard_container_std_two'=>$this->input->post('weight_standard_container_two'),
     'weight_container_of_std_one'=>$this->input->post('weight_container_of_std_one'),
     'weight_container_of_std_two'=>$this->input->post('weight_container_of_std_two'),
     'weight_of_standard_one'=>$this->input->post('weight_of_standard_one'),
     'weight_of_standard_two'=>$this->input->post('weight_of_standard_two'),
     'dilution_two'=>$this->input->post('dilution_two'),
     'equipment_make'=>$this->input->post('equipmentmake'),
     'equipment_id'=>$this->input->post('make_id'),
     'weight_of_reagent_container_w1'=>$this->input->post('weight_reagent_container_one'),
     'weight_of_reagent_container_w2'=>$this->input->post('weight_reagent_container_two'),
     'weight_of_reagent_container_w3'=>$this->input->post('weight_reagent_container_three'),
     'weight_of_reagent_container_w4'=>$this->input->post('weight_reagent_container_four'),
     'weight_of_reagent_container_w5'=>$this->input->post('weight_reagent_container_five'),
     'weight_of_reagent_container_w6'=>$this->input->post('weight_reagent_container_six'),
     'weight_of_container_w1_reagent'=>$this->input->post('weight_container_one_reagent'),
     'weight_of_container_w2_reagent'=>$this->input->post('weight_container_two_reagent'),
     'weight_of_container_w3_reagent'=>$this->input->post('weight_container_three_reagent'),
     'weight_of_container_w4_reagent'=>$this->input->post('weight_container_four_reagent'),
     'weight_of_container_w5_reagent'=>$this->input->post('weight_container_five_reagent'),
     'weight_of_container_w6_reagent'=>$this->input->post('weight_container_six_reagent'),
     'weight_of_reagent_w1'=>$this->input->post('weight_reagent_one'),
     'weight_of_reagent_w2'=>$this->input->post('weight_reagent_two'),
     'weight_of_reagent_w3'=>$this->input->post('weight_reagent_three'),
     'weight_of_reagent_w4'=>$this->input->post('weight_reagent_four'),
     'weight_of_reagent_w5'=>$this->input->post('weight_reagent_five'),
     'weight_of_reagent_w6'=>$this->input->post('weight_reagent_six'),
     
     'mobile_phase_preparation'=>$this->input->post('mobile_phase_preparation'),
     'd_one_pkt'=>$this->input->post('d_one_pkt'),
     'd_one_wstd'=>$this->input->post('d_one_wstd'),
     'd_one_awt'=>$this->input->post('d_one_awt'),
     'd_one_df'=>$this->input->post('d_one_df'),
     'd_one_potency'=>$this->input->post('d_one_potency'),
     'd_one_pkstd'=>$this->input->post('d_one_pkstd'),
     'd_one_wt'=>$this->input->post('d_one_wt'),
     'd_one_lc'=>$this->input->post('d_one_lc'),
     'd_two_pkt'=>$this->input->post('d_two_pkt'),
     'd_two_wstd'=>$this->input->post('d_two_wstd'),
     'd_two_awt'=>$this->input->post('d_two_awt'),
     'd_two_df'=>$this->input->post('d_two_df'),
     'd_two_potency'=>$this->input->post('d_two_potency'),
     'd_two_pkstd'=>$this->input->post('d_two_pkstd'),
     'd_two_wt'=>$this->input->post('d_two_wt'),
     'd_two_lc'=>$this->input->post('d_two_lc'),
     'd_three_pkt'=>$this->input->post('d_three_pkt'),
     'd_three_wstd'=>$this->input->post('d_three_wstd'),
     'd_three_awt'=>$this->input->post('d_three_awt'),
     'd_three_df'=>$this->input->post('d_three_df'),
     'd_three_potency'=>$this->input->post('d_three_potency'),
     'd_three_pkstd'=>$this->input->post('d_three_pkstd'),
     'd_three_wt'=>$this->input->post('d_three_wt'),
     'd_three_lc'=>$this->input->post('d_three_lc'),
     'd_four_pkt'=>$this->input->post('d_four_pkt'),
     'd_four_wstd'=>$this->input->post('d_four_wstd'),
     'd_four_awt'=>$this->input->post('d_four_awt'),
     'd_four_df'=>$this->input->post('d_four_df'),
     'd_four_potency'=>$this->input->post('d_four_potency'),
     'd_four_pkstd'=>$this->input->post('d_four_pkstd'),
     'd_four_wt'=>$this->input->post('d_four_wt'),
     'd_four_lc'=>$this->input->post('d_four_lc'),
     'd_five_pkt'=>$this->input->post('d_five_pkt'),
     'd_five_wstd'=>$this->input->post('d_five_wstd'),
     'd_five_awt'=>$this->input->post('d_five_awt'),
     'd_five_df'=>$this->input->post('d_five_df'),
     'd_five_potency'=>$this->input->post('d_five_potency'),
     'd_five_pkstd'=>$this->input->post('d_five_pkstd'),
     'd_five_wt'=>$this->input->post('d_five_wt'),
     'd_five_lc'=>$this->input->post('d_five_lc'),
     'd_six_pkt'=>$this->input->post('d_six_pkt'),
     'd_six_wstd'=>$this->input->post('d_six_wstd'),
     'd_six_awt'=>$this->input->post('d_six_awt'),
     'd_six_df'=>$this->input->post('d_six_df'),

     'determination_one'=>$this->input->post('d_one_p_lc'),
     'determination_two'=>$this->input->post('d_two_p_lc'),
     'determination_three'=>$this->input->post('d_three_p_lc'),
     'determination_four'=>$this->input->post('d_four_p_lc'),
     'determination_five'=>$this->input->post('d_five_p_lc'),
     'determination_six'=>$this->input->post('d_six_p_lc'),

     'average_determination'=>$this->input->post('determination_average'),
     'equivalent_to'=>$this->input->post('determination_equivalent_to'),
     'range_det_min'=>$this->input->post('range_det_min'),
     'range_det_max'=>$this->input->post('range_det_max'),
     'sd_determination'=>$this->input->post('determination_sd'),
     'rsd_determination'=>$this->input->post('determination_rsd'),

     'min_tolerance'=>$this->input->post('min_tolerance'),
     'max_tolerance'=>$this->input->post('max_tolerance'),
     'min_tolerance_comment'=>$this->input->post('min_tolerance_comment'),
     'max_tolerance_comment'=>$this->input->post('max_tolerance_comment'),
     'range_tolerance_comment'=>$this->input->post('range_tolerance_comment'),
     'sd_comment'=>$this->input->post('sd_comment'),
     'rsd_comment'=>$this->input->post('rsd_comment'),
     
     'sysytem_suitability_sequence'=>$this->input->post('sysytem_suitability_sequence'),
     'sysytem_suitability_sequence_comment'=>$this->input->post('sysytem_suitability_sequence_comment'),
     'sample_injection_sequence'=>$this->input->post('sample_injection_sequence'),
     'Sample_injection_sequence_comment'=>$this->input->post('Sample_injection_sequence_comment'),
     'chromatograms_attached'=>$this->input->post('chromatograms_attached'),
     'chromatograms_attached_comment'=>$this->input->post('chromatograms_attached_comment'),
     'conclusion'=>$this->input->post('test_conclusion'),
     
     'done_by'=>$this->input->post('done_by'),
     'date_done'=>$this->input->post('date_done'),
     'supervisor'=>$this->input->post('supervisor'),
     'date_appproved'=>$this->input->post('date_appproved'),
     'further_comments'=>$this->input->post('further_comments'),
     'test_status'=>$status,
     'choice'=>$conclusion
    );
    $data_two = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'name'=>$this->input->post('column_name'),
     'length'=>$this->input->post('column_dimensions'),
     'lot_serial_number'=>$this->input->post('column_serial_number'),
     'manufacturer'=>$this->input->post('column_manufacturer'),
     
     'column_pressure'=>$this->input->post('column_pressure'),
     'column_pressure_units'=>$this->input->post('column_pressure_units'),
     'column_oven_temperature'=>$this->input->post('column_oven_temperature'),
     'column_oven_temperature_units'=>$this->input->post('column_oven_temperature_units'),
     'mobile_phase_flow_rate'=>$this->input->post('column_mp_flow_rate'),
     'detection_wavelength'=>$this->input->post('column_detection_wavelength')

    );

    $data_three = array(

     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,

     'retention_time_one'=>$this->input->post('retention_time_one'),
     'retention_time_two'=>$this->input->post('retention_time_two'),
     'retention_time_three'=>$this->input->post('retention_time_three'),
     'retention_time_four'=>$this->input->post('retention_time_four'),
     'retention_time_five'=>$this->input->post('retention_time_five'),
     'retention_time_six'=>$this->input->post('retention_time_six'),

     'peak_area_one'=>$this->input->post('peak_area_one'),
     'peak_area_two'=>$this->input->post('peak_area_two'),
     'peak_area_three'=>$this->input->post('peak_area_three'),
     'peak_area_four'=>$this->input->post('peak_area_four'),
     'peak_area_five'=>$this->input->post('peak_area_five'),
     'peak_area_six'=>$this->input->post('peak_area_six'),

     'asymmetry_one'=>$this->input->post('asymmetry_one'),
     'asymmetry_two'=>$this->input->post('asymmetry_two'),
     'asymmetry_three'=>$this->input->post('asymmetry_three'),
     'asymmetry_four'=>$this->input->post('asymmetry_four'),
     'asymmetry_five'=>$this->input->post('asymmetry_five'),
     'asymmetry_six'=>$this->input->post('asymmetry_six'),

     'resolution_one'=>$this->input->post('resolution_one'),
     'resolution_two'=>$this->input->post('resolution_two'),
     'resolution_three'=>$this->input->post('resolution_three'),
     'resolution_four'=>$this->input->post('resolution_four'),
     'resolution_five'=>$this->input->post('resolution_five'),
     'resolution_six'=>$this->input->post('resolution_six'),

     'relative_retention_time_one'=>$this->input->post('relative_retention_time_one'),
     'relative_retention_time_two'=>$this->input->post('relative_retention_time_two'),
     'relative_retention_time_three'=>$this->input->post('relative_retention_time_three'),
     'relative_retention_time_four'=>$this->input->post('relative_retention_time_four'),
     'relative_retention_time_five'=>$this->input->post('relative_retention_time_five'),
     'relative_retention_time_six'=>$this->input->post('relative_retention_time_six'),

     'average_retention_time'=>$this->input->post('average_retention_time'),
     'average_peak_area'=>$this->input->post('average_peak_area'),
     'average_asymmetry'=>$this->input->post('average_asymmetry'),
     'average_resolution'=>$this->input->post('average_resolution'),
     'average_relative_retention_time'=>$this->input->post('average_relative_retention_time'),

     'sd_retention_time'=>$this->input->post('standard_dev_retention_time'),
     'sd_peak_area'=>$this->input->post('standard_dev_peak_area'),
     'sd_asymmetry'=>$this->input->post('standard_dev_asymmetry'),
     'sd_resolution'=>$this->input->post('standard_dev_resolution'),
     'sd_relative_retention_time'=>$this->input->post('standard_dev_relative_retention_time'),

     'rsd_retention_time'=>$this->input->post('rsd_retention_time'),
     'rsd_peak_area'=>$this->input->post('rsd_peak_area'),
     'rsd_asymmetry'=>$this->input->post('rsd_asymmetry'),
     'rsd_resolution'=>$this->input->post('rsd_resolution'),
     'rsd_relative_retention_time'=>$this->input->post('rsd_relative_retention_time'),
     
     'comment_retention_time'=>$this->input->post('comment_retention_time'),
     'comment_peak_area'=>$this->input->post('comment_peak_area'),
     'comment_asymmetry'=>$this->input->post('comment_asymmetry'),
     'comment_resolution'=>$this->input->post('comment_resolution'),
     'comment_relative_retention_time'=>$this->input->post('comment_relative_retention_time')

    );


    $data_five = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,

     'std_one'=>$this->input->post('std_one'),
     'std_two'=>$this->input->post('std_two'),
     'std_three'=>$this->input->post('std_three'),
     'std_four'=>$this->input->post('std_four'),
     'std_five'=>$this->input->post('std_five'),

     'internal_std_a_one'=>$this->input->post('internal_std_a_one'),
     'internal_std_b_one'=>$this->input->post('internal_std_b_one'),
     'internal_std_c_one'=>$this->input->post('internal_std_c_one'),
     'internal_std_d_one'=>$this->input->post('internal_std_d_one'),
     'internal_std_e_one'=>$this->input->post('internal_std_e_one'),
     'internal_std_f_one'=>$this->input->post('internal_std_f_one'),
     'internal_std_g_one'=>$this->input->post('internal_std_g_one'),

     'internal_std_a_two'=>$this->input->post('internal_std_a_two'),
     'internal_std_b_two'=>$this->input->post('internal_std_b_two'),
     'internal_std_c_two'=>$this->input->post('internal_std_c_two'),
     'internal_std_d_two'=>$this->input->post('internal_std_d_two'),
     'internal_std_e_two'=>$this->input->post('internal_std_e_two'),
     'internal_std_f_two'=>$this->input->post('internal_std_f_two'),
     'internal_std_g_two'=>$this->input->post('internal_std_g_two'),

     'internal_std_a_three'=>$this->input->post('internal_std_a_three'),
     'internal_std_b_three'=>$this->input->post('internal_std_b_three'),
     'internal_std_c_three'=>$this->input->post('internal_std_c_three'),
     'internal_std_d_three'=>$this->input->post('internal_std_d_three'),
     'internal_std_e_three'=>$this->input->post('internal_std_e_three'),
     'internal_std_f_three'=>$this->input->post('internal_std_f_three'),
     'internal_std_g_three'=>$this->input->post('internal_std_g_three'),

     'internal_std_a_four'=>$this->input->post('internal_std_a_four'),
     'internal_std_b_four'=>$this->input->post('internal_std_b_four'),
     'internal_std_c_four'=>$this->input->post('internal_std_c_four'),
     'internal_std_d_four'=>$this->input->post('internal_std_d_four'),
     'internal_std_e_four'=>$this->input->post('internal_std_e_four'),
     'internal_std_f_four'=>$this->input->post('internal_std_f_four'),
     'internal_std_g_four'=>$this->input->post('internal_std_g_four'),

     'internal_std_a_five'=>$this->input->post('internal_std_a_five'),
     'internal_std_b_five'=>$this->input->post('internal_std_b_five'),
     'internal_std_c_five'=>$this->input->post('internal_std_c_five'),
     'internal_std_d_five'=>$this->input->post('internal_std_d_five'),
     'internal_std_e_five'=>$this->input->post('internal_std_e_five'),
     'internal_std_f_five'=>$this->input->post('internal_std_f_five'),
     'internal_std_g_five'=>$this->input->post('internal_std_g_five'),

     'internal_std_a_six'=>$this->input->post('internal_std_a_six'),
     'internal_std_b_six'=>$this->input->post('internal_std_b_six'),
     'internal_std_c_six'=>$this->input->post('internal_std_c_six'),
     'internal_std_d_six'=>$this->input->post('internal_std_d_six'),
     'internal_std_e_six'=>$this->input->post('internal_std_e_six'),
     'internal_std_f_six'=>$this->input->post('internal_std_f_six'),
     'internal_std_g_six'=>$this->input->post('internal_std_g_six'),

     'internal_std_a_seven'=>$this->input->post('internal_std_a_seven'),
     'internal_std_b_seven'=>$this->input->post('internal_std_b_seven'),
     'internal_std_c_seven'=>$this->input->post('internal_std_c_seven'),
     'internal_std_d_seven'=>$this->input->post('internal_std_d_seven'),
     'internal_std_e_seven'=>$this->input->post('internal_std_e_seven'),
     'internal_std_f_seven'=>$this->input->post('internal_std_f_seven'),
     'internal_std_g_seven'=>$this->input->post('internal_std_g_seven'),

     'sample_a_one'=>$this->input->post('sample_a_one'),
     'sample_b_one'=>$this->input->post('sample_b_one'),
     'sample_c_one'=>$this->input->post('sample_c_one'),
     'sample_d_one'=>$this->input->post('sample_d_one'),
     'sample_e_one'=>$this->input->post('sample_e_one'),
     'sample_f_one'=>$this->input->post('sample_f_one'),
     'sample_g_one'=>$this->input->post('sample_g_one'),

     'sample_a_two'=>$this->input->post('sample_a_two'),
     'sample_b_two'=>$this->input->post('sample_b_two'),
     'sample_c_two'=>$this->input->post('sample_c_two'),
     'sample_d_two'=>$this->input->post('sample_d_two'),
     'sample_e_two'=>$this->input->post('sample_e_two'),
     'sample_f_two'=>$this->input->post('sample_f_two'),
     'sample_g_two'=>$this->input->post('sample_g_two'),
     
     'sample_a_three'=>$this->input->post('sample_a_three'),
     'sample_b_three'=>$this->input->post('sample_b_three'),
     'sample_c_three'=>$this->input->post('sample_c_three'),
     'sample_d_three'=>$this->input->post('sample_d_three'),
     'sample_e_three'=>$this->input->post('sample_e_three'),
     'sample_f_three'=>$this->input->post('sample_f_three'),
     'sample_g_three'=>$this->input->post('sample_g_three'),
     
     'sample_a_four'=>$this->input->post('sample_a_four'),
     'sample_b_four'=>$this->input->post('sample_b_four'),
     'sample_c_four'=>$this->input->post('sample_c_four'),
     'sample_d_four'=>$this->input->post('sample_d_four'),
     'sample_e_four'=>$this->input->post('sample_e_four'),
     'sample_f_four'=>$this->input->post('sample_f_four'),
     'sample_g_four'=>$this->input->post('sample_g_four'),
     
     'sample_a_five'=>$this->input->post('sample_a_five'),
     'sample_b_five'=>$this->input->post('sample_b_five'),
     'sample_c_five'=>$this->input->post('sample_c_five'),
     'sample_d_five'=>$this->input->post('sample_d_five'),
     'sample_e_five'=>$this->input->post('sample_e_five'),
     'sample_f_five'=>$this->input->post('sample_f_five'),
     'sample_g_five'=>$this->input->post('sample_g_five'),
     
     'sample_a_six'=>$this->input->post('sample_a_six'),
     'sample_b_six'=>$this->input->post('sample_b_six'),
     'sample_c_six'=>$this->input->post('sample_c_six'),
     'sample_d_six'=>$this->input->post('sample_d_six'),
     'sample_e_six'=>$this->input->post('sample_e_six'),
     'sample_f_six'=>$this->input->post('sample_f_six'),
     'sample_g_six'=>$this->input->post('sample_g_six'),

     'ratio_std_a_one'=>$this->input->post('ratio_std_a_one'),
     'ratio_std_b_one'=>$this->input->post('ratio_std_b_one'),
     'ratio_std_c_one'=>$this->input->post('ratio_std_c_one'),
     'ratio_std_d_one'=>$this->input->post('ratio_std_d_one'),
     'ratio_std_e_one'=>$this->input->post('ratio_std_e_one'),
     'ratio_std_f_one'=>$this->input->post('ratio_std_f_one'),
     'ratio_std_g_one'=>$this->input->post('ratio_std_g_one'),

     'ratio_std_a_two'=>$this->input->post('ratio_std_a_two'),
     'ratio_std_b_two'=>$this->input->post('ratio_std_b_two'),
     'ratio_std_c_two'=>$this->input->post('ratio_std_c_two'),
     'ratio_std_d_two'=>$this->input->post('ratio_std_d_two'),
     'ratio_std_e_two'=>$this->input->post('ratio_std_e_two'),
     'ratio_std_f_two'=>$this->input->post('ratio_std_f_two'),
     'ratio_std_g_two'=>$this->input->post('ratio_std_g_two'),

     'ratio_std_a_three'=>$this->input->post('ratio_std_a_three'),
     'ratio_std_b_three'=>$this->input->post('ratio_std_b_three'),
     'ratio_std_c_three'=>$this->input->post('ratio_std_c_three'),
     'ratio_std_d_three'=>$this->input->post('ratio_std_d_three'),
     'ratio_std_e_three'=>$this->input->post('ratio_std_e_three'),
     'ratio_std_f_three'=>$this->input->post('ratio_std_f_three'),
     'ratio_std_g_three'=>$this->input->post('ratio_std_g_three'),

     'ratio_std_a_four'=>$this->input->post('ratio_std_a_four'),
     'ratio_std_b_four'=>$this->input->post('ratio_std_b_four'),
     'ratio_std_c_four'=>$this->input->post('ratio_std_c_four'),
     'ratio_std_d_four'=>$this->input->post('ratio_std_d_four'),
     'ratio_std_e_four'=>$this->input->post('ratio_std_e_four'),
     'ratio_std_f_four'=>$this->input->post('ratio_std_f_four'),
     'ratio_std_g_four'=>$this->input->post('ratio_std_g_four'),

     'ratio_std_a_five'=>$this->input->post('ratio_std_a_five'),
     'ratio_std_b_five'=>$this->input->post('ratio_std_b_five'),
     'ratio_std_c_five'=>$this->input->post('ratio_std_c_five'),
     'ratio_std_d_five'=>$this->input->post('ratio_std_d_five'),
     'ratio_std_e_five'=>$this->input->post('ratio_std_e_five'),
     'ratio_std_f_five'=>$this->input->post('ratio_std_f_five'),
     'ratio_std_g_five'=>$this->input->post('ratio_std_g_five'),

     'ratio_std_a_six'=>$this->input->post('ratio_std_a_six'),
     'ratio_std_b_six'=>$this->input->post('ratio_std_b_six'),
     'ratio_std_c_six'=>$this->input->post('ratio_std_c_six'),
     'ratio_std_d_six'=>$this->input->post('ratio_std_d_six'),
     'ratio_std_e_six'=>$this->input->post('ratio_std_e_six'),
     'ratio_std_f_six'=>$this->input->post('ratio_std_f_six'),
     'ratio_std_g_six'=>$this->input->post('ratio_std_g_six'),

     'ratio_std_a_seven'=>$this->input->post('ratio_std_a_seven'),
     'ratio_std_b_seven'=>$this->input->post('ratio_std_b_seven'),
     'ratio_std_c_seven'=>$this->input->post('ratio_std_c_sevee'),
     'ratio_std_d_seven'=>$this->input->post('ratio_std_d_seven'),
     'ratio_std_e_seven'=>$this->input->post('ratio_std_e_seven'),
     'ratio_std_f_seven'=>$this->input->post('ratio_std_f_seven'),
     'ratio_std_g_seven'=>$this->input->post('ratio_std_g_seven'),
     
     'std_average'=>$this->input->post('std_average'),
     'internal_std_a_average'=>$this->input->post('internal_std_a_average'),
     'ratio_std_a_average'=>$this->input->post('ratio_std_a_average'),

     'sample_a_average'=>$this->input->post('sample_a_average'),
     'internal_std_b_average'=>$this->input->post('internal_std_b_average'),
     'ratio_std_b_average'=>$this->input->post('ratio_std_b_average'),

     'sample_b_average'=>$this->input->post('sample_b_average'),
     'internal_std_c_average'=>$this->input->post('internal_std_c_average'),
     'ratio_std_c_average'=>$this->input->post('ratio_std_c_average'),

     'sample_c_average'=>$this->input->post('sample_c_average'),
     'internal_std_d_average'=>$this->input->post('internal_std_d_average'),
     'ratio_std_d_average'=>$this->input->post('ratio_std_d_average'),

     'sample_d_average'=>$this->input->post('sample_d_average'),
     'internal_std_e_average'=>$this->input->post('internal_std_e_average'),
     'ratio_std_e_average'=>$this->input->post('ratio_std_e_average'),

     'sample_e_average'=>$this->input->post('sample_e_average'),
     'internal_std_f_average'=>$this->input->post('internal_std_f_average'),
     'ratio_std_f_average'=>$this->input->post('ratio_std_f_average'),

     'sample_f_average'=>$this->input->post('sample_f_average'),
     'internal_std_g_average'=>$this->input->post('internal_std_g_average'),
     'ratio_std_g_average'=>$this->input->post('ratio_std_g_average')


    );

   $data_six = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'system_suitability_sequence_requirement'=>$this->input->post('system_suitability_sequence'),
     'sample_injection_sequence_requirement'=>$this->input->post('sample_injection_sequence'),
     'chromatograms_attached_requirement'=>$this->input->post('chromatograms_attached'),
     'system_suitability_sequence_comment'=>$this->input->post('system_suitability_sequence_comment'),
     'sample_injection_sequence_comment'=>$this->input->post('sample_injection_sequence_comment'),
     'chromatograms_attached_comment'=>$this->input->post('chromatograms_attached_comment')

    );

    if($internal_method='6a'){
      $test_type="Assay HPLC Internal Method";
    }
     $data_seven = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'test_id'=>$assay_hplc_internal_method_id,
     'test_type'=>$test_type,
     'test_specification'=>$this->input->post('test_specification'),
     
     'min_tolerance'=>$this->input->post('min_tolerance'),
     'max_tolerance'=>$this->input->post('max_tolerance'),
     'min_tolerance_comment'=>$this->input->post('min_tolerance_comment'),
     'max_tolerance_comment'=>$this->input->post('max_tolerance_comment'),
     'range_tolerance_comment'=>$this->input->post('range_tolerance_comment'),
     'conclusion'=>$this->input->post('test_conclusion'),
     
     'done_by'=>$this->input->post('done_by'),
     'date_done'=>$this->input->post('date_done'),
     'supervisor'=>$this->input->post('supervisor'),
     'date_appproved'=>$this->input->post('date_appproved'),
     'further_comments'=>$this->input->post('further_comments'),
     'choice'=>$conclusion


    );

    $this->db->insert('coa',$data_seven);
    $this->db->insert('assay_hplc_internal_method_chromatography_checklist',$data_six);
    $this->db->insert('assay_hplc_internal_method_peak_area_chromatograms',$data_five);
    $this->db->insert('assay_hplc_internal_method_chromatograms',$data_three);
    $this->db->insert('assay_hplc_internal_method_chromatographic_conditions',$data_two);
    $this->db->insert('assay_hplc_internal_method', $data);
    redirect('test/index/'.$assignment_id.'/'.$test_request_id.'/'.$test_type_id);
  }
  function process_area_method_single_component(){

      $assignment_id=$this->input->post('assignment_id');
      $test_request_id=$this->input->post('tr_id');
      $test_type_id=$this->input->post('test_type_id');
      $status=1;
      $area_method_single_component='6b';

      $data=$this->db->select_max('id')->get('assay_hplc_area_method_single_component')->result();
      $assay_hplc_area_method_single_component_id=$data[0]->id;
      $assay_hplc_area_method_single_component_id++;

      $test_conslusion=0;
      $conclusion=$this->input->post('conclusion');
      
      if($conclusion==1){
        $test_conslusion="Passed";
      }else{
        $test_conslusion="Failed";
      }

  //test data Insertion
    $data = array(
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,    
     'analysis_date'=>$this->input->post('date'),
     'balance_make'=>$this->input->post('equipmentbalance'),
     'balance_id'=>$this->input->post('balance_id'),
     'weight_of_sample_container_w1'=>$this->input->post('weight_sample_container_one'),
     'weight_of_sample_container_w2'=>$this->input->post('weight_sample_container_two'),
     'weight_of_sample_container_w3'=>$this->input->post('weight_sample_container_three'),
     'weight_of_sample_container_w4'=>$this->input->post('weight_sample_container_four'),
     'weight_of_sample_container_w5'=>$this->input->post('weight_sample_container_five'),
     'weight_of_sample_container_w6'=>$this->input->post('weight_sample_container_six'), 
     'weight_of_container_w1'=>$this->input->post('weight_container_one'),
     'weight_of_container_w2'=>$this->input->post('weight_container_two'),
     'weight_of_container_w3'=>$this->input->post('weight_container_three'),
     'weight_of_container_w4'=>$this->input->post('weight_container_four'),
     'weight_of_container_w5'=>$this->input->post('weight_container_five'),
     'weight_of_container_w6'=>$this->input->post('weight_container_six'),
     'weight_of_sample_w1'=>$this->input->post('weight_sample_one'),
     'weight_of_sample_w2'=>$this->input->post('weight_sample_two'),
     'weight_of_sample_w3'=>$this->input->post('weight_sample_three'),
     'weight_of_sample_w4'=>$this->input->post('weight_sample_four'),
     'weight_of_sample_w5'=>$this->input->post('weight_sample_five'),
     'weight_of_sample_w6'=>$this->input->post('weight_sample_six'),
     'dilution_one'=>$this->input->post('dilution_one'),

     'weight_of_standard_preparation'=>$this->input->post('weight_of_standard_preparation'),
     'standard_description_one'=>$this->input->post('standard_description_one'),
     'standard_description_two'=>$this->input->post('standard_description_two'),
     'potency_one'=>$this->input->post('potency_one'),
     'potency_two'=>$this->input->post('potency_two'),

     'weight_standard_container_std_one'=>$this->input->post('weight_standard_container_of_std_one'),
     'weight_standard_container_std_two'=>$this->input->post('weight_standard_container_of_std_two'),
     'weight_container_of_std_one'=>$this->input->post('weight_container_of_std_one'),
     'weight_container_of_std_two'=>$this->input->post('weight_container_of_std_two'),
     'weight_of_standard_one'=>$this->input->post('weight_of_standard_one'),
     'weight_of_standard_two'=>$this->input->post('weight_of_standard_two'),
     'dilution_standard_one'=>$this->input->post('dilution_standard_one'),
     'dilution_standard_two'=>$this->input->post('dilution_standard_two'),

     'equipment_make'=>$this->input->post('equipmentmake'),
     'equipment_id'=>$this->input->post('make_id'),
     'weight_of_sample_container_w1_two'=>$this->input->post('weight_reagent_container_one'),
     'weight_of_sample_container_w2_two'=>$this->input->post('weight_reagent_container_two'),
     'weight_of_sample_container_w3_two'=>$this->input->post('weight_reagent_container_three'),
     'weight_of_sample_container_w4_two'=>$this->input->post('weight_reagent_container_four'),
     'weight_of_sample_container_w5_two'=>$this->input->post('weight_reagent_container_five'),
     'weight_of_sample_container_w6_two'=>$this->input->post('weight_reagent_container_six'),
     'weight_of_container_w1_two'=>$this->input->post('container_one'),
     'weight_of_container_w2_two'=>$this->input->post('container_two'),
     'weight_of_container_w3_two'=>$this->input->post('container_three'),
     'weight_of_container_w4_two'=>$this->input->post('container_four'),
     'weight_of_container_w5_two'=>$this->input->post('container_five'),
     'weight_of_container_w6_two'=>$this->input->post('container_six'),
     'weight_of_sample_w1_two'=>$this->input->post('weight_reagent_one'),
     'weight_of_sample_w2_two'=>$this->input->post('weight_reagent_two'),
     'weight_of_sample_w3_two'=>$this->input->post('weight_reagent_three'),
     'weight_of_sample_w4_two'=>$this->input->post('weight_reagent_four'),
     'weight_of_sample_w5_two'=>$this->input->post('weight_reagent_five'),
     'weight_of_sample_w6_two'=>$this->input->post('weight_reagent_six'),
     'mobile_phase_preparation'=>$this->input->post('mobile_phase_preparation'),
     
     'd_one_pkt'=>$this->input->post('d_one_pkt'),
     'd_one_wstd'=>$this->input->post('d_one_wstd'),
     'd_one_awt'=>$this->input->post('d_one_awt'),
     'd_one_df'=>$this->input->post('d_one_df'),
     'd_one_potency'=>$this->input->post('d_one_potency'),
     'd_one_pkstd'=>$this->input->post('d_one_pkstd'),
     'd_one_wt'=>$this->input->post('d_one_wt'),
     'd_one_lc'=>$this->input->post('d_one_lc'),

     'd_two_pkt'=>$this->input->post('d_two_pkt'),
     'd_two_wstd'=>$this->input->post('d_two_wstd'),
     'd_two_awt'=>$this->input->post('d_two_awt'),
     'd_two_df'=>$this->input->post('d_two_df'),
     'd_two_potency'=>$this->input->post('d_two_potency'),
     'd_two_pkstd'=>$this->input->post('d_two_pkstd'),
     'd_two_wt'=>$this->input->post('d_two_wt'),
     'd_two_lc'=>$this->input->post('d_two_lc'),

     'd_three_pkt'=>$this->input->post('d_three_pkt'),
     'd_three_wstd'=>$this->input->post('d_three_wstd'),
     'd_three_awt'=>$this->input->post('d_three_awt'),
     'd_three_df'=>$this->input->post('d_three_df'),
     'd_three_potency'=>$this->input->post('d_three_potency'),
     'd_three_pkstd'=>$this->input->post('d_three_pkstd'),
     'd_three_wt'=>$this->input->post('d_three_wt'),
     'd_three_lc'=>$this->input->post('d_three_lc'),

     'd_four_pkt'=>$this->input->post('d_four_pkt'),
     'd_four_wstd'=>$this->input->post('d_four_wstd'),
     'd_four_awt'=>$this->input->post('d_four_awt'),
     'd_four_df'=>$this->input->post('d_four_df'),
     'd_four_potency'=>$this->input->post('d_four_potency'),
     'd_four_pkstd'=>$this->input->post('d_four_pkstd'),
     'd_four_wt'=>$this->input->post('d_four_wt'),
     'd_four_lc'=>$this->input->post('d_four_lc'),

     'd_five_pkt'=>$this->input->post('d_five_pkt'),
     'd_five_wstd'=>$this->input->post('d_five_wstd'),
     'd_five_awt'=>$this->input->post('d_five_awt'),
     'd_five_df'=>$this->input->post('d_five_df'),
     'd_five_potency'=>$this->input->post('d_five_potency'),
     'd_five_pkstd'=>$this->input->post('d_five_pkstd'),
     'd_five_wt'=>$this->input->post('d_five_wt'),
     'd_five_lc'=>$this->input->post('d_five_lc'),

     'd_six_pkt'=>$this->input->post('d_six_pkt'),
     'd_six_wstd'=>$this->input->post('d_six_wstd'),
     'd_six_awt'=>$this->input->post('d_six_awt'),
     'd_six_df'=>$this->input->post('d_six_df'),
     'd_six_potency'=>$this->input->post('d_six_potency'),
     'd_six_pkstd'=>$this->input->post('d_six_pkstd'),
     'd_six_wt'=>$this->input->post('d_six_wt'),
     'd_six_lc'=>$this->input->post('d_six_lc'),

     'determination_one'=>$this->input->post('d_one_p_lc'),
     'determination_two'=>$this->input->post('d_two_p_lc'),
     'determination_three'=>$this->input->post('d_three_p_lc'),
     'determination_four'=>$this->input->post('d_four_p_lc'),
     'determination_five'=>$this->input->post('d_five_p_lc'),
     'determination_six'=>$this->input->post('d_six_p_lc'),
     
     'determination_average'=>$this->input->post('average_determination'),
     'determination_equivalent_to'=>$this->input->post('equivalent_to_determination'),
     'determination_sd'=>$this->input->post('sd_determination'),
     'determination_rsd'=>$this->input->post('rsd_determination'),

     'content_from'=>$this->input->post('content_from'),
     'content_to'=>$this->input->post('content_to'),
     'content_results'=>$this->input->post('content_results'),
     'content_comment'=>$this->input->post('content_comment'),

     'sd_results'=>$this->input->post('sd_results'),
     'sd_comment'=>$this->input->post('sd_comment'),

     'rsd_results'=>$this->input->post('rsd_results'),
     'rsd_comment'=>$this->input->post('rsd_comment'),

     'conclusion'=>$test_conslusion,
     'choice'=>$this->input->post('conclusion'),
     'supervisor'=>$this->input->post('supervisor'),
     
     'further_comments'=>$this->input->post('further_comments'),
     'test_status'=>$status
    );

    $data_two = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_area_method_single_component_id'=>$assay_hplc_area_method_single_component_id,
     'name'=>$this->input->post('column_name'),
     'length'=>$this->input->post('column_dimensions'),
     'lot_serial_number'=>$this->input->post('column_serial_number'),
     'manufacturer'=>$this->input->post('column_manufacturer'),
     'column_pressure'=>$this->input->post('column_pressure'),
     'column_oven_temperature'=>$this->input->post('column_oven_temperature'),
     'mobile_phase_flow_rate'=>$this->input->post('column_mp_flow_rate'),
     'detection_wavelength'=>$this->input->post('column_detection_wavelength')

    );

    $data_three = array(

     'assay_hplc_area_method_single_component_id'=>$assay_hplc_area_method_single_component_id,
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'retention_time_one'=>$this->input->post('retention_time_one'),
     'retention_time_two'=>$this->input->post('retention_time_two'),
     'retention_time_three'=>$this->input->post('retention_time_three'),
     'retention_time_four'=>$this->input->post('retention_time_four'),
     'retention_time_five'=>$this->input->post('retention_time_five'),
     'retention_time_six'=>$this->input->post('retention_time_six'),
     'peak_area_one'=>$this->input->post('peak_area_one'),
     'peak_area_two'=>$this->input->post('peak_area_two'),
     'peak_area_three'=>$this->input->post('peak_area_three'),
     'peak_area_four'=>$this->input->post('peak_area_four'),
     'peak_area_five'=>$this->input->post('peak_area_five'),
     'peak_area_six'=>$this->input->post('peak_area_six'),
     'asymmetry_one'=>$this->input->post('asymmetry_one'),
     'asymmetry_two'=>$this->input->post('asymmetry_two'),
     'asymmetry_three'=>$this->input->post('asymmetry_three'),
     'asymmetry_four'=>$this->input->post('asymmetry_four'),
     'asymmetry_five'=>$this->input->post('asymmetry_five'),
     'asymmetry_six'=>$this->input->post('asymmetry_six'),
     'resolution_one'=>$this->input->post('resolution_one'),
     'resolution_two'=>$this->input->post('resolution_two'),
     'resolution_three'=>$this->input->post('resolution_three'),
     'resolution_four'=>$this->input->post('resolution_four'),
     'resolution_five'=>$this->input->post('resolution_five'),
     'resolution_six'=>$this->input->post('resolution_six'),
     'relative_retention_time_one'=>$this->input->post('relative_retention_time_one'),
     'relative_retention_time_two'=>$this->input->post('relative_retention_time_two'),
     'relative_retention_time_three'=>$this->input->post('relative_retention_time_three'),
     'relative_retention_time_four'=>$this->input->post('relative_retention_time_four'),
     'relative_retention_time_five'=>$this->input->post('relative_retention_time_five'),
     'relative_retention_time_six'=>$this->input->post('relative_retention_time_six'),
     'average_retention_time'=>$this->input->post('average_retention_time'),
     'average_peak_area'=>$this->input->post('average_peak_area'),
     'average_asymmetry'=>$this->input->post('average_asymmetry'),
     'average_resolution'=>$this->input->post('average_resolution'),
     'average_relative_retention_time'=>$this->input->post('average_relative_retention_time'),
     'sd_retention_time'=>$this->input->post('standard_dev_retention_time'),
     'sd_peak_area'=>$this->input->post('standard_dev_peak_area'),
     'sd_asymmetry'=>$this->input->post('standard_dev_asymmetry'),
     'sd_resolution'=>$this->input->post('standard_dev_resolution'),
     'sd_relative_retention_time'=>$this->input->post('standard_dev_relative_retention_time'),
     'rsd_retention_time'=>$this->input->post('rsd_retention_time'),
     'rsd_peak_area'=>$this->input->post('rsd_peak_area'),
     'rsd_asymmetry'=>$this->input->post('rsd_asymmetry'),
     'rsd_resolution'=>$this->input->post('rsd_resolution'),
     'rsd_relative_retention_time'=>$this->input->post('rsd_relative_retention_time'),
     'comment_retention_time'=>$this->input->post('comment_retention_time'),
     'comment_peak_area'=>$this->input->post('comment_peak_area'),
     'comment_asymmetry'=>$this->input->post('comment_asymmetry'),
     'comment_resolution'=>$this->input->post('comment_resolution'),
     'comment_relative_retention_time'=>$this->input->post('comment_relative_retention_time')

    );

    $data_four = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_area_method_single_component_id'=>$assay_hplc_area_method_single_component_id,
     'test'=>$this->input->post('test'),
     'chemical_reagent'=>$this->input->post('chemical_reagent'),
     'batch_number'=>$this->input->post('batch_number'),
     'manufacturer'=>$this->input->post('manufacturer'),

    );

    $data_five = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_area_method_single_component_id'=>$assay_hplc_area_method_single_component_id,
     'sd_one'=>$this->input->post('std_one'),
     'sd_two'=>$this->input->post('std_two'),
     'sd_three'=>$this->input->post('std_three'),
     'sd_four'=>$this->input->post('std_four'),
     'sd_five'=>$this->input->post('std_five'),
     'sample_one_one'=>$this->input->post('sample_one_one'),
     'sample_one_two'=>$this->input->post('sample_one_two'),
     'sample_one_three'=>$this->input->post('sample_one_three'),
     'sample_one_four'=>$this->input->post('sample_one_four'),
     'sample_one_five'=>$this->input->post('sample_one_five'),
     'sample_two_one'=>$this->input->post('sample_two_one'),
     'sample_two_two'=>$this->input->post('sample_two_two'),
     'sample_two_three'=>$this->input->post('sample_two_three'),
     'sample_two_four'=>$this->input->post('sample_two_four'),
     'sample_two_five'=>$this->input->post('sample_two_five'),
     'sample_three_one'=>$this->input->post('sample_three_one'),
     'sample_three_two'=>$this->input->post('sample_three_two'),
     'sample_three_three'=>$this->input->post('sample_three_three'),
     'sample_three_four'=>$this->input->post('sample_three_four'),
     'sample_three_five'=>$this->input->post('sample_three_five'),
     'sample_four_one'=>$this->input->post('sample_four_one'),
     'sample_four_two'=>$this->input->post('sample_four_two'),
     'sample_four_three'=>$this->input->post('sample_four_three'),
     'sample_four_four'=>$this->input->post('sample_four_four'),
     'sample_four_five'=>$this->input->post('sample_five_five'),
     'sample_five_one'=>$this->input->post('sample_five_one'),
     'sample_five_two'=>$this->input->post('sample_five_two'),
     'sample_five_three'=>$this->input->post('sample_five_three'),
     'sample_five_four'=>$this->input->post('sample_five_four'),
     'sample_five_five'=>$this->input->post('sample_five_five'),
     'average_std'=>$this->input->post('std_average'),
     'average_sample_one'=>$this->input->post('sample_one_average'),
     'average_sample_two'=>$this->input->post('sample_two_average'),
     'average_sample_three'=>$this->input->post('sample_three_average'),
     'average_sample_four'=>$this->input->post('sample_four_average'),
     'average_sample_five'=>$this->input->post('sample_five_average'),
     'average_sample_six'=>$this->input->post('sample_six_average')
     

    );

    $data_six = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_area_method_single_component_id'=>$assay_hplc_area_method_single_component_id,
     'system_suitability_sequence_requirement'=>$this->input->post('system_suitability_sequence'),
     'sample_injection_sequence_requirement'=>$this->input->post('sample_injection_sequence'),
     'chromatograms_attached_requirement'=>$this->input->post('chromatograms_attached'),
     'system_suitability_sequence_comment'=>$this->input->post('system_suitability_sequence_comment'),
     'sample_injection_sequence_comment'=>$this->input->post('sample_injection_sequence_comment'),
     'chromatograms_attached_comment'=>$this->input->post('chromatograms_attached_comment')

    );

     $data_seven = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'test_id'=>$assay_hplc_area_method_single_component_id,
     'method'=>$this->input->post('method'),
     'specification'=>$this->input->post('specification'),
     'conclusion'=>$this->input->post('conclusion'),
     'supervisor'=>$this->input->post('supervisor'),
     'date_tested'=>$this->input->post('date'),
     'further_comments'=>$this->input->post('further_comments')

    );

    $this->db->insert('coa',$data_seven);
    $this->db->insert('assay_hplc_area_method_single_comp_chromatography_checklist',$data_six);
    $this->db->insert('assay_hplc_area_method_single_comp_peak_area_chromatograms',$data_five);
    $this->db->insert('assay_hplc_area_method_single_component_reagents',$data_four);
    $this->db->insert('assay_hplc_area_method_single_component_chromatograms',$data_three);
    $this->db->insert('assay_hplc_area_method_single_comp_chromatographic_conditions',$data_two);
    $this->db->insert('assay_hplc_area_method_single_component', $data);
    redirect('test/index/'.$assignment_id.'/'.$test_request_id.'/'.$test_type_id);
  }

  function process_area_method_two_components(){

      $assignment_id=$this->input->post('assignment_id');
      $test_request_id=$this->input->post('tr_id');
      $test_type_id=$this->input->post('test_type_id');
      $status=1;
      $area_method_two_components='6c';
      $data=$this->db->select_max('id')->get('assay_hplc_area_method_two_components')->result();
      $assay_hplc_area_method_two_components_id=$data[0]->id;
      $assay_hplc_area_method_two_components_id++;
      
       $test_conclusion=0;
      $conclusion=$this->input->post('conclusion');
      
    if($conclusion==1){
        $test_conclusion="Passed";
      }else{
        $test_conclusion="Failed";
      }

  //test data Insertion
    $data = array(
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,    
     'serial_number'=>$this->input->post('serial_number'),
     'analysis_date'=>$this->input->post('analysis_date'),

     'balance_make'=>$this->input->post('equipmentbalance'),
     'balance_id'=>$this->input->post('balance_id'),

     'weight_of_sample_container_w1'=>$this->input->post('weight_sample_container_one'),
     'weight_of_sample_container_w2'=>$this->input->post('weight_sample_container_two'),
     'weight_of_sample_container_w3'=>$this->input->post('weight_sample_container_three'),
     'weight_of_sample_container_w4'=>$this->input->post('weight_sample_container_four'),
     'weight_of_sample_container_w5'=>$this->input->post('weight_sample_container_five'),
     'weight_of_sample_container_w6'=>$this->input->post('weight_sample_container_six'), 

     'weight_of_container_w1'=>$this->input->post('weight_container_one'),
     'weight_of_container_w2'=>$this->input->post('weight_container_two'),
     'weight_of_container_w3'=>$this->input->post('weight_container_three'),
     'weight_of_container_w4'=>$this->input->post('weight_container_four'),
     'weight_of_container_w5'=>$this->input->post('weight_container_five'),
     'weight_of_container_w6'=>$this->input->post('weight_container_six'),

     'weight_of_sample_w1'=>$this->input->post('weight_sample_one'),
     'weight_of_sample_w2'=>$this->input->post('weight_sample_two'),
     'weight_of_sample_w3'=>$this->input->post('weight_sample_three'),
     'weight_of_sample_w4'=>$this->input->post('weight_sample_four'),
     'weight_of_sample_w5'=>$this->input->post('weight_sample_five'),
     'weight_of_sample_w6'=>$this->input->post('weight_sample_six'),

     'dilution_one'=>$this->input->post('dilution_one'),

     'weight_of_standard_preparation'=>$this->input->post('standard_preparation'),
     'standard_description_one'=>$this->input->post('standard_description_one'),
     'standard_description_two'=>$this->input->post('standard_description_two'),
     'potency_one'=>$this->input->post('potency_one'),
     'potency_two'=>$this->input->post('potency_two'),
     'weight_standard_container_std_one'=>$this->input->post('weight_standard_container_of_std_one'),
     'weight_standard_container_std_two'=>$this->input->post('weight_standard_container_of_std_two'),
     'weight_container_of_std_one'=>$this->input->post('weight_container_of_std_one'),
     'weight_container_of_std_two'=>$this->input->post('weight_container_of_std_two'),
     'weight_of_standard_one'=>$this->input->post('weight_of_standard_one'),
     'weight_of_standard_two'=>$this->input->post('weight_of_standard_two'),
     'dilution_standard_one'=>$this->input->post('dilution_standard_one'),
     'dilution_standard_two'=>$this->input->post('dilution_standard_two'),

     'equipment_make'=>$this->input->post('equipmentmake'),
     'equipment_id'=>$this->input->post('make_id'),

     'weight_of_sample_container_w1_two'=>$this->input->post('weight_reagent_container_one'),
     'weight_of_sample_container_w2_two'=>$this->input->post('weight_reagent_container_two'),
     'weight_of_sample_container_w3_two'=>$this->input->post('weight_reagent_container_three'),
     'weight_of_sample_container_w4_two'=>$this->input->post('weight_reagent_container_four'),
     'weight_of_sample_container_w5_two'=>$this->input->post('weight_reagent_container_five'),
     'weight_of_sample_container_w6_two'=>$this->input->post('weight_reagent_container_six'),

     'weight_of_container_w1_two'=>$this->input->post('container_one'),
     'weight_of_container_w2_two'=>$this->input->post('container_two'),
     'weight_of_container_w3_two'=>$this->input->post('container_three'),
     'weight_of_container_w4_two'=>$this->input->post('container_four'),
     'weight_of_container_w5_two'=>$this->input->post('container_five'),
     'weight_of_container_w6_two'=>$this->input->post('container_six'),

     'weight_of_sample_w1_two'=>$this->input->post('weight_reagent_one'),
     'weight_of_sample_w2_two'=>$this->input->post('weight_reagent_two'),
     'weight_of_sample_w3_two'=>$this->input->post('weight_reagent_three'),
     'weight_of_sample_w4_two'=>$this->input->post('weight_reagent_four'),
     'weight_of_sample_w5_two'=>$this->input->post('weight_reagent_five'),
     'weight_of_sample_w6_two'=>$this->input->post('weight_reagent_six'),

     'mobile_phase_preparation'=>$this->input->post('mobile_phase_preparation'),

     'd_one_pkt'=>$this->input->post('d_one_pkt'),
     'd_one_wstd'=>$this->input->post('d_one_wstd'),
     'd_one_awt'=>$this->input->post('d_one_awt'),
     'd_one_df'=>$this->input->post('d_one_df'),
     'd_one_potency'=>$this->input->post('d_one_potency'),
     'd_one_pkstd'=>$this->input->post('d_one_pkstd'),
     'd_one_wt'=>$this->input->post('d_one_wt'),
     'd_one_lc'=>$this->input->post('d_one_lc'),

     'd_two_pkt'=>$this->input->post('d_two_pkt'),
     'd_two_wstd'=>$this->input->post('d_two_wstd'),
     'd_two_awt'=>$this->input->post('d_two_awt'),
     'd_two_df'=>$this->input->post('d_two_df'),
     'd_two_potency'=>$this->input->post('d_two_potency'),
     'd_two_pkstd'=>$this->input->post('d_two_pkstd'),
     'd_two_wt'=>$this->input->post('d_two_wt'),
     'd_two_lc'=>$this->input->post('d_two_lc'),

     'd_three_pkt'=>$this->input->post('d_three_pkt'),
     'd_three_wstd'=>$this->input->post('d_three_wstd'),
     'd_three_awt'=>$this->input->post('d_three_awt'),
     'd_three_df'=>$this->input->post('d_three_df'),
     'd_three_potency'=>$this->input->post('d_three_potency'),
     'd_three_pkstd'=>$this->input->post('d_three_pkstd'),
     'd_three_wt'=>$this->input->post('d_three_wt'),
     'd_three_lc'=>$this->input->post('d_three_lc'),

     'd_four_pkt'=>$this->input->post('d_four_pkt'),
     'd_four_wstd'=>$this->input->post('d_four_wstd'),
     'd_four_awt'=>$this->input->post('d_four_awt'),
     'd_four_df'=>$this->input->post('d_four_df'),
     'd_four_potency'=>$this->input->post('d_four_potency'),
     'd_four_pkstd'=>$this->input->post('d_four_pkstd'),
     'd_four_wt'=>$this->input->post('d_four_wt'),
     'd_four_lc'=>$this->input->post('d_four_lc'),
     
     'd_five_pkt'=>$this->input->post('d_five_pkt'),
     'd_five_wstd'=>$this->input->post('d_five_wstd'),
     'd_five_awt'=>$this->input->post('d_five_awt'),
     'd_five_df'=>$this->input->post('d_five_df'),
     'd_five_potency'=>$this->input->post('d_five_potency'),
     'd_five_pkstd'=>$this->input->post('d_five_pkstd'),
     'd_five_wt'=>$this->input->post('d_five_wt'),
     'd_five_lc'=>$this->input->post('d_five_lc'),
     
     'd_six_pkt'=>$this->input->post('d_six_pkt'),
     'd_six_wstd'=>$this->input->post('d_six_wstd'),
     'd_six_awt'=>$this->input->post('d_six_awt'),
     'd_six_df'=>$this->input->post('d_six_df'),
     'd_six_potency'=>$this->input->post('d_six_potency'),
     'd_six_pkstd'=>$this->input->post('d_six_pkstd'),
     'd_six_wt'=>$this->input->post('d_six_wt'),
     'd_six_lc'=>$this->input->post('d_six_lc'),

     'c2_d_one_pkt'=>$this->input->post('c2_d_one_pkt'),
     'c2_d_one_wstd'=>$this->input->post('c2_d_one_wstd'),
     'c2_d_one_awt'=>$this->input->post('c2_d_one_awt'),
     'c2_d_one_df'=>$this->input->post('c2_d_one_df'),
     'c2_d_one_potency'=>$this->input->post('c2_d_one_potency'),
     'c2_d_one_pkstd'=>$this->input->post('c2_d_one_pkstd'),
     'c2_d_one_wt'=>$this->input->post('c2_d_one_wt'),
     'c2_d_one_lc'=>$this->input->post('c2_d_one_lc'),

     'c2_d_two_pkt'=>$this->input->post('c2_d_two_pkt'),
     'c2_d_two_wstd'=>$this->input->post('c2_d_two_wstd'),
     'c2_d_two_awt'=>$this->input->post('c2_d_two_awt'),
     'c2_d_two_df'=>$this->input->post('c2_d_two_df'),
     'c2_d_two_potency'=>$this->input->post('c2_d_two_potency'),
     'c2_d_two_pkstd'=>$this->input->post('c2_d_two_pkstd'),
     'c2_d_two_wt'=>$this->input->post('c2_d_two_wt'),
     'c2_d_two_lc'=>$this->input->post('c2_d_two_lc'),

     'c2_d_three_pkt'=>$this->input->post('c2_d_three_pkt'),
     'c2_d_three_wstd'=>$this->input->post('c2_d_three_wstd'),
     'c2_d_three_awt'=>$this->input->post('c2_d_three_awt'),
     'c2_d_three_df'=>$this->input->post('c2_d_three_df'),
     'c2_d_three_potency'=>$this->input->post('c2_d_three_potency'),
     'c2_d_three_pkstd'=>$this->input->post('c2_d_three_pkstd'),
     'c2_d_three_wt'=>$this->input->post('c2_d_three_wt'),
     'c2_d_three_lc'=>$this->input->post('c2_d_three_lc'),

     'c2_d_four_pkt'=>$this->input->post('c2_d_four_pkt'),
     'c2_d_four_wstd'=>$this->input->post('c2_d_four_wstd'),
     'c2_d_four_awt'=>$this->input->post('c2_d_four_awt'),
     'c2_d_four_df'=>$this->input->post('c2_d_four_df'),
     'c2_d_four_potency'=>$this->input->post('c2_d_four_potency'),
     'c2_d_four_pkstd'=>$this->input->post('c2_d_four_pkstd'),
     'c2_d_four_wt'=>$this->input->post('c2_d_four_wt'),
     'c2_d_four_lc'=>$this->input->post('c2_d_four_lc'),
     
     'c2_d_five_pkt'=>$this->input->post('c2_d_five_pkt'),
     'c2_d_five_wstd'=>$this->input->post('c2_d_five_wstd'),
     'c2_d_five_awt'=>$this->input->post('c2_d_five_awt'),
     'c2_d_five_df'=>$this->input->post('c2_d_five_df'),
     'c2_d_five_potency'=>$this->input->post('c2_d_five_potency'),
     'c2_d_five_pkstd'=>$this->input->post('c2_d_five_pkstd'),
     'c2_d_five_wt'=>$this->input->post('c2_d_five_wt'),
     'c2_d_five_lc'=>$this->input->post('c2_d_five_lc'),
     
     'c2_d_six_pkt'=>$this->input->post('c2_d_six_pkt'),
     'c2_d_six_wstd'=>$this->input->post('c2_d_six_wstd'),
     'c2_d_six_awt'=>$this->input->post('c2_d_six_awt'),
     'c2_d_six_df'=>$this->input->post('c2_d_six_df'),
     'c2_d_six_potency'=>$this->input->post('c2_d_six_potency'),
     'c2_d_six_pkstd'=>$this->input->post('c2_d_six_pkstd'),
     'c2_d_six_wt'=>$this->input->post('c2_d_six_wt'),
     'c2_d_six_lc'=>$this->input->post('c2_d_six_lc'),
     
     'determination_one'=>$this->input->post('d_one_p_lc'),
     'determination_two'=>$this->input->post('d_two_p_lc'),
     'determination_three'=>$this->input->post('d_three_p_lc'),
     'determination_four'=>$this->input->post('d_four_p_lc'),
     'determination_five'=>$this->input->post('d_five_p_lc'),
     'determination_six'=>$this->input->post('d_six_p_lc'),
     
     'c2_determination_one'=>$this->input->post('c2_d_one_p_lc'),
     'c2_determination_two'=>$this->input->post('c2_d_two_p_lc'),
     'c2_determination_three'=>$this->input->post('c2_d_three_p_lc'),
     'c2_determination_four'=>$this->input->post('c2_d_four_p_lc'),
     'c2_determination_five'=>$this->input->post('c2_d_five_p_lc'),
     'c2_determination_six'=>$this->input->post('c2_d_six_p_lc'),

     'average_determination'=>$this->input->post('determination_average'),
     'equivalent_to'=>$this->input->post('determination_equivalent_to'),
     'sd_determination'=>$this->input->post('determination_sd'),
     'rsd_determination'=>$this->input->post('determination_rsd'),

     'content_from'=>$this->input->post('content_from'),
     'content_to'=>$this->input->post('content_to'),
     'content_results'=>$this->input->post('content_results'),
     'content_comment'=>$this->input->post('content_comment'),
     
     'sd_acceptance_criteria'=>$this->input->post('sd_acceptance_criteria'),
     'sd_results'=>$this->input->post('sd_results'),
     'sd_comment'=>$this->input->post('sd_comment'),
     'rsd_acceptance_criteria'=>$this->input->post('rsd_acceptance_criteria'),
     'rsd_results'=>$this->input->post('rsd_results'),
     'rsd_comment'=>$this->input->post('rsd_comment'),

     'c2_average_determination'=>$this->input->post('c2_determination_average'),
     'c2_equivalent_to'=>$this->input->post('c2_equivalent_to_determination'),
     'c2_sd_determination'=>$this->input->post('c2_determination_sd'),
     'c2_rsd_determination'=>$this->input->post('c2_determination_rsd'),

     'c2_content_from'=>$this->input->post('c2_content_from'),
     'c2_content_to'=>$this->input->post('c2_content_to'),
     'c2_content_results'=>$this->input->post('c2_content_results'),
     'c2_content_comment'=>$this->input->post('c2_content_comment'),
     'c2_sd_acceptance_criteria'=>$this->input->post('c2_sd_acceptance_criteria'),
     'c2_sd_results'=>$this->input->post('c2_sd_results'),
     'c2_sd_comment'=>$this->input->post('c2_sd_comment'),
     'c2_rsd_acceptance_criteria'=>$this->input->post('c2_rsd_acceptance_criteria'),
     'c2_rsd_results'=>$this->input->post('c2_rsd_results'),
     'c2_rsd_comment'=>$this->input->post('c2_rsd_comment'),
     
     'conclusion'=>$test_conclusion,
     'choice'=>$this->input->post('conclusion'),
     'supervisor'=>$this->input->post('supervisor'),
     'date'=>$this->input->post('date'),
     'further_comments'=>$this->input->post('further_comments'),
     'test_status'=>$status
    );

    $data_two = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_area_method_two_components_id'=>$assay_hplc_area_method_two_components_id,
     'name'=>$this->input->post('column_name'),
     'length'=>$this->input->post('column_dimensions'),
     'lot_serial_number'=>$this->input->post('column_serial_number'),
     'manufacturer'=>$this->input->post('column_manufacturer'),
     'column_pressure'=>$this->input->post('column_pressure'),
     'column_oven_temperature'=>$this->input->post('column_over_temperature'),
     'mobile_phase_flow_rate'=>$this->input->post('mobile_phase_flow_rate'),
     'detection_wavelength'=>$this->input->post('detection_wavelength')

    );
    $data_eight = array(

     'assay_hplc_area_method_two_components_id'=>$assay_hplc_area_method_two_components_id,
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,

     'retention_time_one'=>$this->input->post('retention_time_one'),
     'retention_time_two'=>$this->input->post('retention_time_two'),
     'retention_time_three'=>$this->input->post('retention_time_three'),
     'retention_time_four'=>$this->input->post('retention_time_four'),
     'retention_time_five'=>$this->input->post('retention_time_five'),
     'retention_time_six'=>$this->input->post('retention_time_six'),

     'peak_area_one'=>$this->input->post('peak_area_one'),
     'peak_area_two'=>$this->input->post('peak_area_two'),
     'peak_area_three'=>$this->input->post('peak_area_three'),
     'peak_area_four'=>$this->input->post('peak_area_four'),
     'peak_area_five'=>$this->input->post('peak_area_five'),
     'peak_area_six'=>$this->input->post('peak_area_six'),

     'asymmetry_one'=>$this->input->post('asymmetry_one'),
     'asymmetry_two'=>$this->input->post('asymmetry_two'),
     'asymmetry_three'=>$this->input->post('asymmetry_three'),
     'asymmetry_four'=>$this->input->post('asymmetry_four'),
     'asymmetry_five'=>$this->input->post('asymmetry_five'),
     'asymmetry_six'=>$this->input->post('asymmetry_six'),

     'resolution_one'=>$this->input->post('resolution_one'),
     'resolution_two'=>$this->input->post('resolution_two'),
     'resolution_three'=>$this->input->post('resolution_three'),
     'resolution_four'=>$this->input->post('resolution_four'),
     'resolution_five'=>$this->input->post('resolution_five'),
     'resolution_six'=>$this->input->post('resolution_six'),

     'relative_retention_time_one'=>$this->input->post('relative_retention_time_one'),
     'relative_retention_time_two'=>$this->input->post('relative_retention_time_two'),
     'relative_retention_time_three'=>$this->input->post('relative_retention_time_three'),
     'relative_retention_time_four'=>$this->input->post('relative_retention_time_four'),
     'relative_retention_time_five'=>$this->input->post('relative_retention_time_five'),
     'relative_retention_time_six'=>$this->input->post('relative_retention_time_six'),

     'average_retention_time'=>$this->input->post('average_retention_time'),
     'average_peak_area'=>$this->input->post('average_peak_area'),
     'average_asymmetry'=>$this->input->post('average_asymmetry'),
     'average_resolution'=>$this->input->post('average_resolution'),
     'average_relative_retention_time'=>$this->input->post('average_relative_retention_time'),
     'sd_retention_time'=>$this->input->post('standard_dev_retention_time'),

     'sd_peak_area'=>$this->input->post('standard_dev_peak_area'),
     'sd_asymmetry'=>$this->input->post('standard_dev_asymmetry'),
     'sd_resolution'=>$this->input->post('standard_dev_resolution'),
     'sd_relative_retention_time'=>$this->input->post('standard_dev_relative_retention_time'),
     
     'rsd_retention_time'=>$this->input->post('rsd_retention_time'),
     'rsd_peak_area'=>$this->input->post('rsd_peak_area'),
     'rsd_asymmetry'=>$this->input->post('rsd_asymmetry'),
     'rsd_resolution'=>$this->input->post('rsd_resolution'),
     'rsd_relative_retention_time'=>$this->input->post('rsd_relative_retention_time'),
     
     'comment_retention_time'=>$this->input->post('comment_retention_time'),
     'comment_peak_area'=>$this->input->post('comment_peak_area'),
     'comment_asymmetry'=>$this->input->post('comment_asymmetry'),
     'comment_resolution'=>$this->input->post('comment_resolution'),
     'comment_relative_retention_time'=>$this->input->post('comment_relative_retention_time')

    );

    $data_three = array(

     'assay_hplc_area_method_two_components_id'=>$assay_hplc_area_method_two_components_id,
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,

     'c2_retention_time_one'=>$this->input->post('c2_retention_time_one'),
     'c2_retention_time_two'=>$this->input->post('c2_retention_time_two'),
     'c2_retention_time_three'=>$this->input->post('c2_retention_time_three'),
     'c2_retention_time_four'=>$this->input->post('c2_retention_time_four'),
     'c2_retention_time_five'=>$this->input->post('c2_retention_time_five'),
     'c2_retention_time_six'=>$this->input->post('c2_retention_time_six'),

     'c2_peak_area_one'=>$this->input->post('c2_peak_area_one'),
     'c2_peak_area_two'=>$this->input->post('c2_peak_area_two'),
     'c2_peak_area_three'=>$this->input->post('c2_peak_area_three'),
     'c2_peak_area_four'=>$this->input->post('c2_peak_area_four'),
     'c2_peak_area_five'=>$this->input->post('c2_peak_area_five'),
     'c2_peak_area_six'=>$this->input->post('c2_peak_area_six'),

     'c2_asymmetry_one'=>$this->input->post('c2_asymmetry_one'),
     'c2_asymmetry_two'=>$this->input->post('c2_asymmetry_two'),
     'c2_asymmetry_three'=>$this->input->post('c2_asymmetry_three'),
     'c2_asymmetry_four'=>$this->input->post('c2_asymmetry_four'),
     'c2_asymmetry_five'=>$this->input->post('c2_asymmetry_five'),
     'c2_asymmetry_six'=>$this->input->post('c2_asymmetry_six'),

     'c2_resolution_one'=>$this->input->post('c2_resolution_one'),
     'c2_resolution_two'=>$this->input->post('c2_resolution_two'),
     'c2_resolution_three'=>$this->input->post('c2_resolution_three'),
     'c2_resolution_four'=>$this->input->post('c2_resolution_four'),
     'c2_resolution_five'=>$this->input->post('c2_resolution_five'),
     'c2_resolution_six'=>$this->input->post('c2_resolution_six'),

     'c2_relative_retention_time_one'=>$this->input->post('c2_relative_retention_time_one'),
     'c2_relative_retention_time_two'=>$this->input->post('c2_relative_retention_time_two'),
     'c2_relative_retention_time_three'=>$this->input->post('c2_relative_retention_time_three'),
     'c2_relative_retention_time_four'=>$this->input->post('c2_relative_retention_time_four'),
     'c2_relative_retention_time_five'=>$this->input->post('c2_relative_retention_time_five'),
     'c2_relative_retention_time_six'=>$this->input->post('c2_relative_retention_time_six'),

     'c2_average_retention_time'=>$this->input->post('c2_average_retention_time'),
     'c2_average_peak_area'=>$this->input->post('c2_average_peak_area'),
     'c2_average_asymmetry'=>$this->input->post('c2_average_asymmetry'),
     'c2_average_resolution'=>$this->input->post('c2_average_resolution'),
     'c2_average_relative_retention_time'=>$this->input->post('c2_average_relative_retention_time'),

     'c2_sd_retention_time'=>$this->input->post('standard_dev_retention_time'),
     'c2_sd_peak_area'=>$this->input->post('c2_standard_dev_peak_area'),
     'c2_sd_asymmetry'=>$this->input->post('c2_standard_dev_asymmetry'),
     'c2_sd_resolution'=>$this->input->post('c2_standard_dev_resolution'),
     'c2_sd_relative_retention_time'=>$this->input->post('c2_standard_dev_relative_retention_time'),

     'c2_rsd_retention_time'=>$this->input->post('c2_rsd_retention_time'),
     'c2_rsd_peak_area'=>$this->input->post('c2_rsd_peak_area'),
     'c2_rsd_asymmetry'=>$this->input->post('c2_rsd_asymmetry'),
     'c2_rsd_resolution'=>$this->input->post('c2_rsd_resolution'),
     'c2_rsd_relative_retention_time'=>$this->input->post('c2_rsd_relative_retention_time'),
     
     'c2_comment_retention_time'=>$this->input->post('c2_comment_retention_time'),
     'c2_comment_peak_area'=>$this->input->post('c2_comment_peak_area'),
     'c2_comment_asymmetry'=>$this->input->post('c2_comment_asymmetry'),
     'c2_comment_resolution'=>$this->input->post('c2_comment_resolution'),
     'c2_comment_relative_retention_time'=>$this->input->post('c2_comment_relative_retention_time')

    );

    $data_four = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_area_method_two_components_id'=>$assay_hplc_area_method_two_components_id,
     'test'=>$this->input->post('test'),
     'chemical_reagent'=>$this->input->post('chemical_reagent'),
     'batch_number'=>$this->input->post('batch_number'),
     'manufacturer'=>$this->input->post('manufacturer'),

    );
    $data_nine = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_area_method_two_components_id'=>$assay_hplc_area_method_two_components_id,

     'sd_one'=>$this->input->post('std_one'),
     'sd_two'=>$this->input->post('std_two'),
     'sd_three'=>$this->input->post('std_three'),
     'sd_four'=>$this->input->post('std_four'),
     'sd_five'=>$this->input->post('std_five'),

     'sample_one_one'=>$this->input->post('sample_one_one'),
     'sample_one_two'=>$this->input->post('sample_one_two'),
     'sample_one_three'=>$this->input->post('sample_one_three'),
     'sample_one_four'=>$this->input->post('sample_one_four'),
     'sample_one_five'=>$this->input->post('sample_one_five'),

     'sample_two_one'=>$this->input->post('sample_two_one'),
     'sample_two_two'=>$this->input->post('sample_two_two'),
     'sample_two_three'=>$this->input->post('sample_two_three'),
     'sample_two_four'=>$this->input->post('sample_two_four'),
     'sample_two_five'=>$this->input->post('sample_two_five'),

     'sample_three_one'=>$this->input->post('sample_three_one'),
     'sample_three_two'=>$this->input->post('sample_three_two'),
     'sample_three_three'=>$this->input->post('sample_three_three'),
     'sample_three_four'=>$this->input->post('sample_three_four'),
     'sample_three_five'=>$this->input->post('sample_three_five'),

     'sample_four_one'=>$this->input->post('sample_four_one'),
     'sample_four_two'=>$this->input->post('sample_four_two'),
     'sample_four_three'=>$this->input->post('sample_four_three'),
     'sample_four_four'=>$this->input->post('sample_four_four'),
     'sample_four_five'=>$this->input->post('sample_five_five'),

     'sample_five_one'=>$this->input->post('sample_five_one'),
     'sample_five_two'=>$this->input->post('sample_five_two'),
     'sample_five_three'=>$this->input->post('sample_five_three'),
     'sample_five_four'=>$this->input->post('sample_five_four'),
     'sample_five_five'=>$this->input->post('sample_five_five'),

     'sample_six_one'=>$this->input->post('sample_one_six'),
     'sample_six_two'=>$this->input->post('sample_two_six'),
     'sample_six_three'=>$this->input->post('sample_three_six'),
     'sample_six_four'=>$this->input->post('sample_four_six'),
     'sample_six_five'=>$this->input->post('sample_five_six'),

     'relative_retention_one'=>$this->input->post('relative_retention_time_one'),
     'relative_retention_two'=>$this->input->post('relative_retention_time_two'),
     'relative_retention_three'=>$this->input->post('relative_retention_time_three'),
     'relative_retention_four'=>$this->input->post('relative_retention_time_four'),
     'relative_retention_five'=>$this->input->post('relative_retention_time_five'),

     'average_std'=>$this->input->post('average_std'),
     'average_sample_one'=>$this->input->post('sample_one_average'),
     'average_sample_two'=>$this->input->post('sample_two_average'),
     'average_sample_three'=>$this->input->post('sample_three_average'),
     'average_sample_four'=>$this->input->post('sample_four_average'),
     'average_sample_five'=>$this->input->post('sample_five_average'),
     'average_sample_six'=>$this->input->post('sample_six_average'),
     'relative_retention_time_average'=>$this->input->post('relative_average')

    );

    $data_five = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_area_method_two_components_id'=>$assay_hplc_area_method_two_components_id,

     'c2_sd_one'=>$this->input->post('c2_std_one'),
     'c2_sd_two'=>$this->input->post('c2_std_two'),
     'c2_sd_three'=>$this->input->post('c2_std_three'),
     'c2_sd_four'=>$this->input->post('c2_std_four'),
     'c2_sd_five'=>$this->input->post('c2_std_five'),

     'c2_sample_one_one'=>$this->input->post('c2_sample_one_one'),
     'c2_sample_one_two'=>$this->input->post('c2_sample_one_two'),
     'c2_sample_one_three'=>$this->input->post('c2_sample_one_three'),
     'c2_sample_one_four'=>$this->input->post('c2_sample_one_four'),
     'c2_sample_one_five'=>$this->input->post('c2_sample_one_five'),

     'c2_sample_two_one'=>$this->input->post('c2_sample_two_one'),
     'c2_sample_two_two'=>$this->input->post('c2_sample_two_two'),
     'c2_sample_two_three'=>$this->input->post('c2_sample_two_three'),
     'c2_sample_two_four'=>$this->input->post('c2_sample_two_four'),
     'c2_sample_two_five'=>$this->input->post('c2_sample_two_five'),

     'c2_sample_three_one'=>$this->input->post('c2_sample_three_one'),
     'c2_sample_three_two'=>$this->input->post('c2_sample_three_two'),
     'c2_sample_three_three'=>$this->input->post('c2_sample_three_three'),
     'c2_sample_three_four'=>$this->input->post('c2_sample_three_four'),
     'c2_sample_three_five'=>$this->input->post('c2_sample_three_five'),

     'c2_sample_four_one'=>$this->input->post('c2_sample_four_one'),
     'c2_sample_four_two'=>$this->input->post('c2_sample_four_two'),
     'c2_sample_four_three'=>$this->input->post('c2_sample_four_three'),
     'c2_sample_four_four'=>$this->input->post('c2_sample_four_four'),
     'c2_sample_four_five'=>$this->input->post('c2_sample_four_five'),

     'c2_sample_five_one'=>$this->input->post('c2_sample_five_one'),
     'c2_sample_five_two'=>$this->input->post('c2_sample_five_two'),
     'c2_sample_five_three'=>$this->input->post('c2_sample_five_three'),
     'c2_sample_five_four'=>$this->input->post('c2_sample_five_four'),
     'c2_sample_five_five'=>$this->input->post('c2_sample_five_five'),

     'c2_sample_six_one'=>$this->input->post('c2_sample_one_six'),
     'c2_sample_six_two'=>$this->input->post('c2_sample_two_six'),
     'c2_sample_six_three'=>$this->input->post('c2_sample_three_six'),
     'c2_sample_six_four'=>$this->input->post('c2_sample_four_six'),
     'c2_sample_six_five'=>$this->input->post('c2_sample_five_six'),

     'c2_relative_retention_one'=>$this->input->post('c2_relative_retention_time_one'),
     'c2_relative_retention_two'=>$this->input->post('c2_relative_retention_time_two'),
     'c2_relative_retention_three'=>$this->input->post('c2_relative_retention_time_three'),
     'c2_relative_retention_four'=>$this->input->post('c2_relative_retention_time_four'),
     'c2_relative_retention_five'=>$this->input->post('c2_relative_retention_time_five'),

     'c2_average_std'=>$this->input->post('c2_std_average'),
     'c2_average_sample_one'=>$this->input->post('c2_sample_one_average'),
     'c2_average_sample_two'=>$this->input->post('c2_sample_two_average'),
     'c2_average_sample_three'=>$this->input->post('c2_sample_three_average'),
     'c2_average_sample_four'=>$this->input->post('c2_sample_four_average'),
     'c2_average_sample_five'=>$this->input->post('c2_sample_five_average'),
     'c2_average_sample_six'=>$this->input->post('c2_sample_six_average'),
     'c2_relative_retention_time_average'=>$this->input->post('c2_relative_average')
    );

    $data_six = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_area_method_two_components_id'=>$assay_hplc_area_method_two_components_id,
     'system_suitability_sequence_requirement'=>$this->input->post('system_suitability_sequence'),
     'sample_injection_sequence_requirement'=>$this->input->post('sample_injection_sequence'),
     'chromatograms_attached_requirement'=>$this->input->post('chromatograms_attached'),
     'system_suitability_sequence_comment'=>$this->input->post('system_suitability_sequence_comment'),
     'sample_injection_sequence_comment'=>$this->input->post('sample_injection_sequence_comment'),
     'chromatograms_attached_comment'=>$this->input->post('chromatograms_attached_comment')

    );

     $data_seven = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'test_id'=>$assay_hplc_area_method_two_components_id,
     'method'=>$this->input->post('method'),
     'specification'=>$this->input->post('specification'),
     'conclusion'=>$this->input->post('conclusion'),
     'supervisor'=>$this->input->post('supervisor'),
     'date_tested'=>$this->input->post('date'),
     'further_comments'=>$this->input->post('further_comments')

    );

    $this->db->insert('coa',$data_seven);
    $this->db->insert('assay_hplc_area_method_two_components_chromatography_checklist',$data_six);
    $this->db->insert('assay_hplc_area_method_two_comp_two_peak_area_chromatograms',$data_five);
    $this->db->insert('assay_hplc_area_method_two_comp_one_peak_area_chromatograms',$data_nine);
    $this->db->insert('assay_hplc_area_method_two_components_reagents',$data_four);
    $this->db->insert('assay_hplc_area_method_two_components_two_chromatograms',$data_three);
    $this->db->insert('assay_hplc_area_method_two_components_one_chromatograms',$data_eight);
    $this->db->insert('assay_hplc_area_method_two_components_chromatographic_conditions',$data_two);
    $this->db->insert('assay_hplc_area_method_two_components', $data);
    redirect('test/index/'.$assignment_id.'/'.$test_request_id.'/'.$test_type_id);
  }

  function process_area_method_two_components_different_methods(){

      $assignment_id=$this->input->post('assignment_id');
      $test_request_id=$this->input->post('tr_id');
      $test_type_id=$this->input->post('test_type_id');
      $status=1;
      $area_method_two_components_different_methods='6d';

      $data=$this->db->select_max('id')->get('assay_hplc_area_method_two_components_different_methods')->result();
      $assay_hplc_area_method_two_components_different_methods_id=$data[0]->id;
      $assay_hplc_area_method_two_components_different_methods_id++;
      

  //test data Insertion
    $data = array(
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,    
     'serial_number'=>$this->input->post('serial_number'),
     'analysis_date'=>$this->input->post('analysis_date'),
     'balance_make_comp_one'=>$this->input->post('equipmentbalancecone'),
     'balance_id_comp_one'=>$this->input->post('equipment_id_c1'),
     'weight_of_sample_container_w1_comp_one'=>$this->input->post('weight_sample_container_one_comp_one'),
     'weight_of_sample_container_w2_comp_one'=>$this->input->post('weight_sample_container_two_comp_one'),
     'weight_of_sample_container_w3_comp_one'=>$this->input->post('weight_sample_container_three_comp_one'),
     'weight_of_sample_container_w4_comp_one'=>$this->input->post('weight_sample_container_four_comp_one'),
     'weight_of_sample_container_w5_comp_one'=>$this->input->post('weight_sample_container_five_comp_one'),
     'weight_of_sample_container_w6_comp_one'=>$this->input->post('weight_sample_container_six_comp_one'), 
     'weight_of_container_w1_comp_one'=>$this->input->post('weight_container_one_comp_one'),
     'weight_of_container_w2_comp_one'=>$this->input->post('weight_container_two_comp_one'),
     'weight_of_container_w3_comp_one'=>$this->input->post('weight_container_three_comp_one'),
     'weight_of_container_w4_comp_one'=>$this->input->post('weight_container_four_comp_one'),
     'weight_of_container_w5_comp_one'=>$this->input->post('weight_container_five_comp_one'),
     'weight_of_container_w6_comp_one'=>$this->input->post('weight_container_six_comp_one'),
     'weight_of_sample_w1_comp_one'=>$this->input->post('weight_sample_one_comp_one'),
     'weight_of_sample_w2_comp_one'=>$this->input->post('weight_sample_two_comp_one'),
     'weight_of_sample_w3_comp_one'=>$this->input->post('weight_sample_three_comp_one'),
     'weight_of_sample_w4_comp_one'=>$this->input->post('weight_sample_four_comp_one'),
     'weight_of_sample_w5_comp_one'=>$this->input->post('weight_sample_five_comp_one'),
     'weight_of_sample_w6_comp_one'=>$this->input->post('weight_sample_six_comp_one'),
     'dilution_comp_one'=>$this->input->post('dilution_comp_one'),
     'standard_preparation_comp_one'=>$this->input->post('standard_preparation_comp_one'),
     'standard_description_one_comp_one'=>$this->input->post('standard_description_one_comp_one'),
     'standard_description_two_comp_one'=>$this->input->post('standard_description_two_comp_one'),
     'potency_one_comp_one'=>$this->input->post('potency_one_comp_one'),
     'potency_two_comp_one'=>$this->input->post('potency_two_comp_one'),
     'weight_standard_container_one_comp_one'=>$this->input->post('weight_standard_container_one_comp_one'),
     'weight_standard_container_two_comp_one'=>$this->input->post('weight_standard_container_two_comp_one'),
     'weight_container_one_comp_one'=>$this->input->post('weight_container_one_comp_one'),
     'weight_container_two_comp_one'=>$this->input->post('weight_container_two_comp_one'),
     'weight_standard_one_comp_one'=>$this->input->post('weight_standard_one_comp_one'),
     'weight_standard_two_comp_one'=>$this->input->post('weight_standard_two_comp_one'),
     'dilution_standard_one_comp_one'=>$this->input->post('dilution_standard_one_comp_one'),
     'dilution_standard_two_comp_one'=>$this->input->post('dilution_standard_two_comp_one'),

     'equipment_make'=>$this->input->post('equipmentmakecompone'),
     'equipment_id'=>$this->input->post('make_id_comp_one'),
     'weight_sample_container_one_one_comp_one'=>$this->input->post('weight_sample_container_one_one_comp_one'),
     'weight_sample_container_two_one_comp_one'=>$this->input->post('weight_sample_container_two_one_comp_one'),
     'weight_sample_container_three_one_comp_one'=>$this->input->post('weight_sample_container_three_one_comp_one'),
     'weight_sample_container_four_one_comp_one'=>$this->input->post('weight_sample_container_four_one_comp_one'),
     'weight_sample_container_five_one_comp_one'=>$this->input->post('weight_sample_container_five_one_comp_one'),
     'weight_sample_container_six_one_comp_one'=>$this->input->post('weight_sample_container_six_one_comp_one'),
     'weight_container_one_two_comp_one'=>$this->input->post('weight_container_one_two_comp_one'),
     'weight_container_two_two_comp_one'=>$this->input->post('weight_container_two_two_comp_one'),
     'weight_container_three_two_comp_one'=>$this->input->post('weight_container_three_two_comp_one'),
     'weight_container_four_two_comp_one'=>$this->input->post('weight_container_four_two_comp_one'),
     'weight_container_five_two_comp_one'=>$this->input->post('weight_container_five_two_comp_one'),
     'weight_container_six_two_comp_one'=>$this->input->post('weight_container_six_two_comp_one'),
     'weight_sample_one_three_comp_one'=>$this->input->post('weight_sample_one_three_comp_one'),
     'weight_sample_two_three_comp_one'=>$this->input->post('weight_sample_two_three_comp_one'),
     'weight_sample_three_three_comp_one'=>$this->input->post('weight_sample_three_three_comp_one'),
     'weight_sample_four_three_comp_one'=>$this->input->post('weight_sample_four_three_comp_one'),
     'weight_sample_five_three_comp_one'=>$this->input->post('weight_sample_five_three_comp_one'),
     'weight_sample_six_three_comp_one'=>$this->input->post('weight_sample_six_three_comp_one'),
     'mobile_phase_preparation_comp_one'=>$this->input->post('mobile_phase_preparation_comp_one'),
     'balance_make_comp_two'=>$this->input->post('balancecomptwo'),
     'balance_id_comp_two'=>$this->input->post('balance_id_comp_two'),

     'weight_of_sample_container_w1_comp_two'=>$this->input->post('weight_sample_container_one_comp_two'),
     'weight_of_sample_container_w2_comp_two'=>$this->input->post('weight_sample_container_two_comp_two'),
     'weight_of_sample_container_w3_comp_two'=>$this->input->post('weight_sample_container_three_comp_two'),
     'weight_of_sample_container_w4_comp_two'=>$this->input->post('weight_sample_container_four_comp_two'),
     'weight_of_sample_container_w5_comp_two'=>$this->input->post('weight_sample_container_five_comp_two'),
     'weight_of_sample_container_w6_comp_two'=>$this->input->post('weight_sample_container_six_comp_two'), 
     'weight_of_container_w1_comp_two'=>$this->input->post('weight_container_one_comp_two'),
     'weight_of_container_w2_comp_two'=>$this->input->post('weight_container_two_comp_two'),
     'weight_of_container_w3_comp_two'=>$this->input->post('weight_container_three_comp_two'),
     'weight_of_container_w4_comp_two'=>$this->input->post('weight_container_four_comp_two'),
     'weight_of_container_w5_comp_two'=>$this->input->post('weight_container_five_comp_two'),
     'weight_of_container_w6_comp_two'=>$this->input->post('weight_container_six_comp_two'),
     'weight_of_sample_w1_comp_two'=>$this->input->post('weight_sample_one_comp_two'),
     'weight_of_sample_w2_comp_two'=>$this->input->post('weight_sample_two_comp_two'),
     'weight_of_sample_w3_comp_two'=>$this->input->post('weight_sample_three_comp_two'),
     'weight_of_sample_w4_comp_two'=>$this->input->post('weight_sample_four_comp_two'),
     'weight_of_sample_w5_comp_two'=>$this->input->post('weight_sample_five_comp_two'),
     'weight_of_sample_w6_comp_two'=>$this->input->post('weight_sample_six_comp_two'),
     'dilution_comp_two'=>$this->input->post('dilution_comp_two'),
     'standard_preparation_comp_two'=>$this->input->post('standard_preparation_comp_two'),
     'standard_description_one_comp_two'=>$this->input->post('standard_description_one_comp_two'),
     'standard_description_two_comp_two'=>$this->input->post('standard_description_two_comp_two'),
     'potency_one_comp_two'=>$this->input->post('potency_one_comp_two'),
     'potency_two_comp_two'=>$this->input->post('potency_two_comp_two'),
     'weight_standard_container_one_comp_two'=>$this->input->post('weight_standard_container_one_comp_two'),
     'weight_standard_container_two_comp_two'=>$this->input->post('weight_standard_container_two_comp_two'),
     'weight_container_one_comp_two'=>$this->input->post('weight_container_one_comp_two'),
     'weight_container_two_comp_two'=>$this->input->post('weight_container_two_comp_two'),
     'weight_standard_one_comp_two'=>$this->input->post('weight_standard_one_comp_two'),
     'weight_standard_two_comp_two'=>$this->input->post('weight_standard_two_comp_two'),
     'dilution_standard_one_comp_two'=>$this->input->post('dilution_standard_one_comp_two'),
     'dilution_standard_two_comp_two'=>$this->input->post('dilution_standard_two_comp_two'),
     'equipment_make_comp_two'=>$this->input->post('equipment_make_comp_two'),
     'equipment_id_comp_two'=>$this->input->post('equipment_id_comp_two'),

     'weight_sample_container_reagents_one_comp_two'=>$this->input->post('weight_sample_container_reagents_one_comp_two'),
     'weight_sample_container_reagents_two_comp_two'=>$this->input->post('weight_sample_container_reagents_two_comp_two'),
     'weight_sample_container_reagents_three_comp_two'=>$this->input->post('weight_sample_container_reagents_three_comp_two'),
     'weight_sample_container_reagents_four_comp_two'=>$this->input->post('weight_sample_container_reagents_four_comp_two'),
     'weight_sample_container_reagents_five_comp_two'=>$this->input->post('weight_sample_container_reagents_five_comp_two'),
     'weight_of_sample_container_w6_comp_two'=>$this->input->post('weight_sample_container_reagents_six_comp_two'), 
     'weight_container_reagents_one_comp_two'=>$this->input->post('weight_container_reagents_one_comp_two'),
     'weight_container_reagents_two_comp_two'=>$this->input->post('weight_container_reagents_two_comp_two'),
     'weight_container_reagents_three_comp_two'=>$this->input->post('weight_container_reagents_three_comp_two'),
     'weight_container_reagents_four_comp_two'=>$this->input->post('weight_container_reagents_four_comp_two'),
     'weight_container_reagents_five_comp_two'=>$this->input->post('weight_container_reagents_five_comp_two'),
     'weight_container_reagents_six_comp_two'=>$this->input->post('weight_container_reagents_six_comp_two'),
     'weight_sample_reagents_one_comp_two'=>$this->input->post('weight_sample_reagents_one_comp_two'),
     'weight_sample_reagents_two_comp_two'=>$this->input->post('weight_sample_reagents_two_comp_two'),
     'weight_sample_reagents_three_comp_two'=>$this->input->post('weight_sample_reagents_three_comp_two'),
     'weight_sample_reagents_four_comp_two'=>$this->input->post('weight_sample_reagents_four_comp_two'),
     'weight_sample_reagents_five_comp_two'=>$this->input->post('weight_sample_reagents_five_comp_two'),
     'weight_sample_reagents_six_comp_two'=>$this->input->post('weight_sample_reagents_six_comp_two'),
     'mobile_phase_preparation_comp_two'=>$this->input->post('mobile_phase_preparation_comp_two'),

     'd_one_pkt'=>$this->input->post('d_one_pkt'),
     'd_one_wstd'=>$this->input->post('d_one_wstd'),
     'd_one_awt'=>$this->input->post('d_one_awt'),
     'd_one_df'=>$this->input->post('d_one_df'),
     'd_one_potency'=>$this->input->post('d_one_potency'),
     'd_one_pkstd'=>$this->input->post('d_one_pkstd'),
     'd_one_wt'=>$this->input->post('d_one_wt'),
     'd_one_lc'=>$this->input->post('d_one_lc'),
     'd_two_pkt'=>$this->input->post('d_two_pkt'),
     'd_two_wstd'=>$this->input->post('d_two_wstd'),
     'd_two_awt'=>$this->input->post('d_two_awt'),
     'd_two_df'=>$this->input->post('d_two_df'),
     'd_two_potency'=>$this->input->post('d_two_potency'),
     'd_two_pkstd'=>$this->input->post('d_two_pkstd'),
     'd_two_wt'=>$this->input->post('d_two_wt'),
     'd_two_lc'=>$this->input->post('d_two_lc'),
     'd_three_pkt'=>$this->input->post('d_three_pkt'),
     'd_three_wstd'=>$this->input->post('d_three_wstd'),
     'd_three_awt'=>$this->input->post('d_three_awt'),
     'd_three_df'=>$this->input->post('d_three_df'),
     'd_three_potency'=>$this->input->post('d_three_potency'),
     'd_three_pkstd'=>$this->input->post('d_three_pkstd'),
     'd_three_wt'=>$this->input->post('d_three_wt'),
     'd_three_lc'=>$this->input->post('d_three_lc'),
     'd_four_pkt'=>$this->input->post('d_four_pkt'),
     'd_four_wstd'=>$this->input->post('d_four_wstd'),
     'd_four_awt'=>$this->input->post('d_four_awt'),
     'd_four_df'=>$this->input->post('d_four_df'),
     'd_four_potency'=>$this->input->post('d_four_potency'),
     'd_four_pkstd'=>$this->input->post('d_four_pkstd'),
     'd_four_wt'=>$this->input->post('d_four_wt'),
     'd_four_lc'=>$this->input->post('d_four_lc'),
     'd_five_pkt'=>$this->input->post('d_five_pkt'),
     'd_five_wstd'=>$this->input->post('d_five_wstd'),
     'd_five_awt'=>$this->input->post('d_five_awt'),
     'd_five_df'=>$this->input->post('d_five_df'),
     'd_five_potency'=>$this->input->post('d_five_potency'),
     'd_five_pkstd'=>$this->input->post('d_five_pkstd'),
     'd_five_wt'=>$this->input->post('d_five_wt'),
     'd_five_lc'=>$this->input->post('d_five_lc'),
     'd_six_pkt'=>$this->input->post('d_six_pkt'),
     'd_six_wstd'=>$this->input->post('d_six_wstd'),
     'd_six_awt'=>$this->input->post('d_six_awt'),
     'd_six_df'=>$this->input->post('d_six_df'),
     'd_six_potency'=>$this->input->post('d_six_potency'),
     'd_six_pkstd'=>$this->input->post('d_six_pkstd'),
     'd_six_wt'=>$this->input->post('d_six_wt'),
     'd_six_lc'=>$this->input->post('d_six_lc'),
     'determination_one'=>$this->input->post('d_one_p_lc'),
     'determination_two'=>$this->input->post('d_two_p_lc'),
     'determination_three'=>$this->input->post('d_three_p_lc'),
     'determination_four'=>$this->input->post('d_four_p_lc'),
     'determination_five'=>$this->input->post('d_five_p_lc'),
     'determination_six'=>$this->input->post('d_six_p_lc'),

     'average_determination'=>$this->input->post('average_determination'),
     'equivalent_to'=>$this->input->post('equivalent_to_determination'),
     'sd_determination'=>$this->input->post('sd_determination'),
     'rsd_determination'=>$this->input->post('rsd_determination'),
     'content_from'=>$this->input->post('content_from'),
     'content_to'=>$this->input->post('content_to'),
     'content_results'=>$this->input->post('content_results'),
     'content_comment'=>$this->input->post('content_comment'),
     'sd_acceptance_criteria'=>$this->input->post('sd_acceptance_criteria'),
     'sd_results'=>$this->input->post('sd_results'),
     'sd_comment'=>$this->input->post('sd_comment'),
     'rsd_acceptance_criteria'=>$this->input->post('rsd_acceptance_criteria'),
     'rsd_results'=>$this->input->post('rsd_results'),
     'rsd_comment'=>$this->input->post('rsd_comment'),
     'conclusion'=>$this->input->post('conclusion'),
     'supervisor'=>$this->input->post('supervisor'),
     'date'=>$this->input->post('date'),
     'further_comments'=>$this->input->post('further_comments'),
     'test_status'=>$status
    );
    $data_two = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_area_method_two_components_different_methods_id'=>$assay_hplc_area_method_two_components_different_methods_id,
     'name'=>$this->input->post('column_name'),
     'length'=>$this->input->post('column_dimensions'),
     'lot_serial_number'=>$this->input->post('column_serial_number'),
     'manufacturer'=>$this->input->post('column_manufacturer'),
     'column_pressure'=>$this->input->post('column_pressure'),
     'column_oven_temperature'=>$this->input->post('column_oven_temperature'),
     'mobile_phase_flow_rate'=>$this->input->post('column_mp_flow_rate'),
     'detection_wavelength'=>$this->input->post('column_detection_wavelength')

    );

    $data_three = array(

     'assay_hplc_area_method_two_components_different_methods_id'=>$assay_hplc_area_method_two_components_different_methods_id,
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'retention_time_one_comp_one'=>$this->input->post('retention_time_one_comp_one'),
     'retention_time_two_comp_one'=>$this->input->post('retention_time_two_comp_one'),
     'retention_time_three_comp_one'=>$this->input->post('retention_time_three_comp_one'),
     'retention_time_four_comp_one'=>$this->input->post('retention_time_four_comp_one'),
     'retention_time_five_comp_one'=>$this->input->post('retention_time_five_comp_one'),
     'retention_time_six_comp_one'=>$this->input->post('retention_time_six_comp_one'),
     'peak_area_one_comp_one'=>$this->input->post('peak_area_one_comp_one'),
     'peak_area_two_comp_one'=>$this->input->post('peak_area_two_comp_one'),
     'peak_area_three_comp_one'=>$this->input->post('peak_area_three_comp_one'),
     'peak_area_four_comp_one'=>$this->input->post('peak_area_four_comp_one'),
     'peak_area_five_comp_one'=>$this->input->post('peak_area_five_comp_one'),
     'peak_area_six_comp_one'=>$this->input->post('peak_area_six_comp_one'),
     'asymmetry_one_comp_one'=>$this->input->post('asymmetry_one_comp_one'),
     'asymmetry_two_comp_one'=>$this->input->post('asymmetry_two_comp_one'),
     'asymmetry_three_comp_one'=>$this->input->post('asymmetry_three_comp_one'),
     'asymmetry_four_comp_one'=>$this->input->post('asymmetry_four_comp_one'),
     'asymmetry_five_comp_one'=>$this->input->post('asymmetry_five_comp_one'),
     'asymmetry_six_comp_one'=>$this->input->post('asymmetry_six_comp_one'),
     'resolution_one_comp_one'=>$this->input->post('resolution_one_comp_one'),
     'resolution_two_comp_one'=>$this->input->post('resolution_two_comp_one'),
     'resolution_three_comp_one'=>$this->input->post('resolution_three_comp_one'),
     'resolution_four_comp_one'=>$this->input->post('resolution_four_comp_one'),
     'resolution_five_comp_one'=>$this->input->post('resolution_five_comp_one'),
     'resolution_six_comp_one'=>$this->input->post('resolution_six_comp_one'),
     'relative_retention_time_one_comp_one'=>$this->input->post('relative_retention_time_one_comp_one'),
     'relative_retention_time_two_comp_one'=>$this->input->post('relative_retention_time_two_comp_one'),
     'relative_retention_time_three_comp_one'=>$this->input->post('relative_retention_time_three_comp_one'),
     'relative_retention_time_four_comp_one'=>$this->input->post('relative_retention_time_four_comp_one'),
     'relative_retention_time_five_comp_one'=>$this->input->post('relative_retention_time_five_comp_one'),
     'relative_retention_time_six_comp_one'=>$this->input->post('relative_retention_time_six_comp_one'),
     'average_retention_time_comp_one'=>$this->input->post('average_retention_time_comp_one'),
     'average_peak_area_comp_one'=>$this->input->post('average_peak_area_comp_one'),
     'average_asymmetry_comp_one'=>$this->input->post('average_asymmetry_comp_one'),
     'average_resolution_comp_one'=>$this->input->post('average_resolution_comp_one'),
     'average_relative_retention_time_comp_one'=>$this->input->post('average_relative_retention_time_comp_one'),
     'standard_dev_retention_time_comp_one'=>$this->input->post('standard_dev_retention_time_comp_one'),
     'standard_dev_peak_area_comp_one'=>$this->input->post('standard_dev_peak_area_comp_one'),
     'standard_dev_asymmetry_comp_one'=>$this->input->post('standard_dev_asymmetry_comp_one'),
     'standard_dev_resolution_comp_one'=>$this->input->post('standard_dev_resolution_comp_one'),
     'standard_dev_relative_retention_time_comp_one'=>$this->input->post('standard_dev_relative_retention_time_comp_one'),
     'rsd_retention_time_comp_one'=>$this->input->post('rsd_retention_time_comp_one'),
     'rsd_peak_area_comp_one'=>$this->input->post('rsd_peak_area_comp_one'),
     'rsd_asymmetry_comp_one'=>$this->input->post('rsd_asymmetry_comp_one'),
     'rsd_resolution_comp_one'=>$this->input->post('rsd_resolution_comp_one'),
     'rsd_relative_retention_time_comp_one'=>$this->input->post('rsd_relative_retention_time_comp_one'),
     'comment_retention_time_comp_one'=>$this->input->post('comment_retention_time_comp_one'),
     'comment_peak_area_comp_one'=>$this->input->post('comment_peak_area_comp_one'),
     'comment_asymmetry_comp_one'=>$this->input->post('comment_asymmetry_comp_one'),
     'comment_resolution_comp_one'=>$this->input->post('comment_resolution_comp_one'),
     'comment_relative_retention_time_comp_one'=>$this->input->post('comment_relative_retention_time_comp_one')

    );
    
    $data_four = array(

     'assay_hplc_area_method_two_components_different_methods_id'=>$assay_hplc_area_method_two_components_different_methods_id,
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'retention_time_one_comp_two'=>$this->input->post('retention_time_one_comp_two'),
     'retention_time_two_comp_two'=>$this->input->post('retention_time_two_comp_two'),
     'retention_time_three_comp_two'=>$this->input->post('retention_time_three_comp_two'),
     'retention_time_four_comp_two'=>$this->input->post('retention_time_four_comp_two'),
     'retention_time_five_comp_two'=>$this->input->post('retention_time_five_comp_two'),
     'retention_time_six_comp_two'=>$this->input->post('retention_time_six_comp_two'),
     'peak_area_one_comp_two'=>$this->input->post('peak_area_one_comp_two'),
     'peak_area_two_comp_two'=>$this->input->post('peak_area_two_comp_two'),
     'peak_area_three_comp_two'=>$this->input->post('peak_area_three_comp_two'),
     'peak_area_four_comp_two'=>$this->input->post('peak_area_four_comp_two'),
     'peak_area_five_comp_two'=>$this->input->post('peak_area_five_comp_two'),
     'peak_area_six_comp_two'=>$this->input->post('peak_area_six_comp_two'),
     'asymmetry_one_comp_two'=>$this->input->post('asymmetry_one_comp_two'),
     'asymmetry_two_comp_two'=>$this->input->post('asymmetry_two_comp_two'),
     'asymmetry_three_comp_two'=>$this->input->post('asymmetry_three_comp_two'),
     'asymmetry_four_comp_two'=>$this->input->post('asymmetry_four_comp_two'),
     'asymmetry_five_comp_two'=>$this->input->post('asymmetry_five_comp_two'),
     'asymmetry_six_comp_two'=>$this->input->post('asymmetry_six_comp_two'),
     'resolution_one_comp_two'=>$this->input->post('resolution_one_comp_two'),
     'resolution_two_comp_two'=>$this->input->post('resolution_two_comp_two'),
     'resolution_three_comp_two'=>$this->input->post('resolution_three_comp_two'),
     'resolution_four_comp_two'=>$this->input->post('resolution_four_comp_two'),
     'resolution_five_comp_two'=>$this->input->post('resolution_five_comp_two'),
     'resolution_six_comp_two'=>$this->input->post('resolution_six_comp_two'),
     'relative_retention_time_one_comp_two'=>$this->input->post('relative_retention_time_one_comp_two'),
     'relative_retention_time_two_comp_two'=>$this->input->post('relative_retention_time_two_comp_two'),
     'relative_retention_time_three_comp_two'=>$this->input->post('relative_retention_time_three_comp_two'),
     'relative_retention_time_four_comp_two'=>$this->input->post('relative_retention_time_four_comp_two'),
     'relative_retention_time_five_comp_two'=>$this->input->post('relative_retention_time_five_comp_two'),
     'relative_retention_time_six_comp_two'=>$this->input->post('relative_retention_time_six_comp_two'),
     'average_retention_time_comp_two'=>$this->input->post('average_retention_time_comp_two'),
     'average_peak_area_comp_two'=>$this->input->post('average_peak_area_comp_two'),
     'average_asymmetry_comp_two'=>$this->input->post('average_asymmetry_comp_two'),
     'average_resolution_comp_two'=>$this->input->post('average_resolution_comp_two'),
     'average_relative_retention_time_comp_two'=>$this->input->post('average_relative_retention_time_comp_two'),
     'standard_dev_retention_time_comp_two'=>$this->input->post('standard_dev_retention_time_comp_two'),
     'standard_dev_peak_area_comp_two'=>$this->input->post('standard_dev_peak_area_comp_two'),
     'standard_dev_asymmetry_comp_two'=>$this->input->post('standard_dev_asymmetry_comp_two'),
     'standard_dev_resolution_comp_two'=>$this->input->post('standard_dev_resolution_comp_two'),
     'standard_dev_relative_retention_time_comp_two'=>$this->input->post('standard_dev_relative_retention_time_comp_two'),
     'rsd_retention_time_comp_two'=>$this->input->post('rsd_retention_time_comp_two'),
     'rsd_peak_area_comp_two'=>$this->input->post('rsd_peak_area_comp_two'),
     'rsd_asymmetry_comp_two'=>$this->input->post('rsd_asymmetry_comp_two'),
     'rsd_resolution_comp_two'=>$this->input->post('rsd_resolution_comp_two'),
     'rsd_relative_retention_time_comp_two'=>$this->input->post('rsd_relative_retention_time_comp_two'),
     'comment_retention_time_comp_two'=>$this->input->post('comment_retention_time_comp_two'),
     'comment_peak_area_comp_two'=>$this->input->post('comment_peak_area_comp_two'),
     'comment_asymmetry_comp_two'=>$this->input->post('comment_asymmetry_comp_two'),
     'comment_resolution_comp_two'=>$this->input->post('comment_resolution_comp_two'),
     'comment_relative_retention_time_comp_two'=>$this->input->post('comment_relative_retention_time_comp_two')

    );

    $data_eight = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_area_method_two_components_different_methods_id'=>$assay_hplc_area_method_two_components_different_methods_id,
     'test'=>$this->input->post('test'),
     'chemical_reagent'=>$this->input->post('chemical_reagent'),
     'batch_number'=>$this->input->post('reagent_batch_number'),
     'manufacturer'=>$this->input->post('reagent_manufacturer'),

    );

    $data_ = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_area_method_two_components_different_methods_id'=>$assay_hplc_area_method_two_components_different_methods_id,
     'sd_one'=>$this->input->post('sd_one'),
     'sd_two'=>$this->input->post('sd_two'),
     'sd_three'=>$this->input->post('sd_three'),
     'sd_four'=>$this->input->post('sd_four'),
     'sd_five'=>$this->input->post('sd_five'),
     'sample_one_one'=>$this->input->post('sample_one_one'),
     'sample_one_two'=>$this->input->post('sample_one_two'),
     'sample_one_three'=>$this->input->post('sample_one_three'),
     'sample_one_four'=>$this->input->post('sample_one_four'),
     'sample_one_five'=>$this->input->post('sample_one_five'),
     'sample_two_one'=>$this->input->post('sample_two_one'),
     'sample_two_two'=>$this->input->post('sample_two_two'),
     'sample_two_three'=>$this->input->post('sample_two_three'),
     'sample_two_four'=>$this->input->post('sample_two_four'),
     'sample_two_five'=>$this->input->post('sample_two_five'),
     'sample_three_one'=>$this->input->post('sample_three_one'),
     'sample_three_two'=>$this->input->post('sample_three_two'),
     'sample_three_three'=>$this->input->post('sample_three_three'),
     'sample_three_four'=>$this->input->post('sample_three_four'),
     'sample_three_five'=>$this->input->post('sample_three_five'),
     'sample_four_one'=>$this->input->post('sample_four_one'),
     'sample_four_two'=>$this->input->post('sample_four_two'),
     'sample_four_three'=>$this->input->post('sample_four_three'),
     'sample_four_four'=>$this->input->post('sample_four_four'),
     'sample_four_five'=>$this->input->post('sample_five_five'),
     'sample_five_one'=>$this->input->post('sample_five_one'),
     'sample_five_two'=>$this->input->post('sample_five_two'),
     'sample_five_three'=>$this->input->post('sample_five_three'),
     'sample_five_four'=>$this->input->post('sample_five_four'),
     'sample_five_five'=>$this->input->post('sample_five_five'),
     'sample_six_one'=>$this->input->post('sample_six_one'),
     'sample_six_two'=>$this->input->post('sample_six_two'),
     'sample_six_three'=>$this->input->post('sample_six_three'),
     'sample_six_four'=>$this->input->post('sample_six_four'),
     'sample_six_five'=>$this->input->post('sample_six_five'),
     'ratio_std_one_one'=>$this->input->post('ratio_std_one_one'),
     'ratio_std_one_two'=>$this->input->post('ratio_std_one_two'),
     'ratio_std_one_three'=>$this->input->post('ratio_std_one_three'),
     'ratio_std_one_four'=>$this->input->post('ratio_std_one_four'),
     'ratio_std_one_five'=>$this->input->post('ratio_std_one_five'),
     'ratio_std_two_one'=>$this->input->post('ratio_std_two_one'),
     'ratio_std_two_two'=>$this->input->post('ratio_std_two_two'),
     'ratio_std_two_three'=>$this->input->post('ratio_std_two_three'),
     'ratio_std_two_four'=>$this->input->post('ratio_std_two_four'),
     'ratio_std_two_five'=>$this->input->post('ratio_std_two_five'),
     'ratio_std_three_one'=>$this->input->post('ratio_std_three_one'),
     'ratio_std_three_two'=>$this->input->post('ratio_std_three_two'),
     'ratio_std_three_three'=>$this->input->post('ratio_std_three_three'),
     'ratio_std_three_four'=>$this->input->post('ratio_std_three_four'),
     'ratio_std_three_five'=>$this->input->post('ratio_std_three_five'),
     'ratio_std_four_one'=>$this->input->post('ratio_std_four_one'),
     'ratio_std_four_two'=>$this->input->post('ratio_std_four_two'),
     'ratio_std_four_three'=>$this->input->post('ratio_std_four_three'),
     'ratio_std_four_four'=>$this->input->post('ratio_std_four_four'),
     'ratio_std_four_five'=>$this->input->post('ratio_std_four_five'),
     'ratio_std_five_one'=>$this->input->post('ratio_std_five_one'),
     'ratio_std_five_two'=>$this->input->post('ratio_std_five_two'),
     'ratio_std_five_three'=>$this->input->post('ratio_std_five_three'),
     'ratio_std_five_four'=>$this->input->post('ratio_std_five_four'),
     'ratio_std_five_five'=>$this->input->post('ratio_std_five_five'),
     'ratio_std_six_one'=>$this->input->post('ratio_std_six_one'),
     'ratio_std_six_two'=>$this->input->post('ratio_std_six_two'),
     'ratio_std_six_three'=>$this->input->post('ratio_std_six_three'),
     'ratio_std_six_four'=>$this->input->post('ratio_std_six_four'),
     'ratio_std_six_five'=>$this->input->post('ratio_std_six_five'),
     'ratio_std_seven_one'=>$this->input->post('ratio_std_seven_one'),
     'ratio_std_seven_two'=>$this->input->post('ratio_std_seven_two'),
     'ratio_std_seven_three'=>$this->input->post('ratio_std_seven_three'),
     'ratio_std_seven_four'=>$this->input->post('ratio_std_seven_four'),
     'ratio_std_seven_five'=>$this->input->post('ratio_std_seven_five'),
     'internal_std_one_one'=>$this->input->post('internal_std_one_one'),
     'internal_std_one_two'=>$this->input->post('internal_std_one_two'),
     'internal_std_one_three'=>$this->input->post('internal_std_one_three'),
     'internal_std_one_four'=>$this->input->post('internal_std_one_four'),
     'internal_std_one_five'=>$this->input->post('internal_std_one_five'),
     'internal_std_two_one'=>$this->input->post('internal_std_two_one'),
     'internal_std_two_two'=>$this->input->post('internal_std_two_two'),
     'internal_std_two_three'=>$this->input->post('internal_std_two_three'),
     'internal_std_two_four'=>$this->input->post('internal_std_two_four'),
     'internal_std_two_five'=>$this->input->post('internal_std_two_five'),
     'internal_std_three_one'=>$this->input->post('internal_std_three_one'),
     'internal_std_three_two'=>$this->input->post('internal_std_three_two'),
     'internal_std_three_three'=>$this->input->post('internal_std_three_three'),
     'internal_std_three_four'=>$this->input->post('internal_std_three_four'),
     'internal_std_three_five'=>$this->input->post('internal_std_three_five'),
     'internal_std_four_one'=>$this->input->post('internal_std_four_one'),
     'internal_std_four_two'=>$this->input->post('internal_std_four_two'),
     'internal_std_four_three'=>$this->input->post('internal_std_four_three'),
     'internal_std_four_four'=>$this->input->post('internal_std_four_four'),
     'internal_std_four_five'=>$this->input->post('internal_std_four_five'),
     'internal_std_five_one'=>$this->input->post('internal_std_five_one'),
     'internal_std_five_two'=>$this->input->post('internal_std_five_two'),
     'internal_std_five_three'=>$this->input->post('internal_std_five_three'),
     'internal_std_five_four'=>$this->input->post('internal_std_five_four'),
     'internal_std_five_five'=>$this->input->post('internal_std_five_five'),
     'internal_std_six_one'=>$this->input->post('internal_std_six_one'),
     'internal_std_six_two'=>$this->input->post('internal_std_six_two'),
     'internal_std_six_three'=>$this->input->post('internal_std_six_three'),
     'internal_std_six_four'=>$this->input->post('internal_std_six_four'),
     'internal_std_six_five'=>$this->input->post('internal_std_six_five'),
     'internal_std_seven_one'=>$this->input->post('internal_std_seven_one'),
     'internal_std_seven_two'=>$this->input->post('internal_std_seven_two'),
     'internal_std_seven_three'=>$this->input->post('internal_std_seven_three'),
     'internal_std_seven_four'=>$this->input->post('internal_std_seven_four'),
     'internal_std_seven_five'=>$this->input->post('internal_std_seven_five'),
     'average_std'=>$this->input->post('average_std'),
     'average_sample_one'=>$this->input->post('average_sample_one'),
     'average_sample_two'=>$this->input->post('average_sample_two'),
     'average_sample_three'=>$this->input->post('average_sample_three'),
     'average_sample_four'=>$this->input->post('average_sample_four'),
     'average_sample_five'=>$this->input->post('average_sample_five'),
     'average_sample_six'=>$this->input->post('average_sample_six'),
     'ratio_std_one_average'=>$this->input->post('ratio_std_one_average'),
     'ratio_std_two_average'=>$this->input->post('ratio_std_two_average'),
     'ratio_std_three_average'=>$this->input->post('ratio_std_three_average'),
     'ratio_std_four_average'=>$this->input->post('ratio_std_four_average'),
     'ratio_std_five_average'=>$this->input->post('ratio_std_five_average'),
     'ratio_std_six_average'=>$this->input->post('ratio_std_six_average'),
     'ratio_std_seven_average'=>$this->input->post('ratio_std_seven_average'),
     'internal_std_one_average'=>$this->input->post('internal_std_one_average'),
     'internal_std_two_average'=>$this->input->post('internal_std_two_average'),
     'internal_std_three_average'=>$this->input->post('internal_std_three_average'),
     'internal_std_four_average'=>$this->input->post('internal_std_four_average'),
     'internal_std_five_average'=>$this->input->post('internal_std_five_average'),
     'internal_std_six_average'=>$this->input->post('internal_std_six_average'),
     'internal_std_seven_average'=>$this->input->post('internal_std_seven_average')
     

    );

    $data_six = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_area_method_two_components_different_methods_id'=>$assay_hplc_area_method_two_components_different_methods_id,
     'requirement'=>$this->input->post(''),
     'comment'=>$this->input->post('')

    );

     $data_seven = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_area_method_two_components_different_methods_id'=>$assay_hplc_area_method_two_components_different_methods_id,
     'method'=>$this->input->post('method'),
     'specification'=>$this->input->post('specification'),
     'conclusion'=>$this->input->post('conclusion'),
     'supervisor'=>$this->input->post('supervisor'),
     'date_tested'=>$this->input->post('date'),
     'further_comments'=>$this->input->post('further_comments')

    );

    // $this->db->insert('coa',$data_seven);
    // $this->db->insert('_chromatography_checklist',$data_six);
    // $this->db->insert('_peak_area_chromatograms',$data_five);
    // $this->db->insert('_reagents',$data_four);
    //not done yet, You are here!!!!!!!!!!!!!!!
    $this->db->insert('_reagents',$data_eight);
    $this->db->insert('coa',$data_seven);
    $this->db->insert('assay_hplc_area_method_two_comp_dif_one_peak_area_chromatograms',$data_six);
    $this->db->insert('assay_hplc_area_method_two_comp_dif_two_peak_area_chromatograms',$data_five);
    $this->db->insert('assay_hplc_area_method_two_comp_dif_methods_ctwo_chromatograms',$data_four);
    $this->db->insert('assay_hplc_area_method_two_comp_dif_methods_cone_chromatograms',$data_three);
    $this->db->insert('_chromatographic_conditions',$data_two);
    $this->db->insert('assay_hplc_area_method_two_components_different_methods', $data);
    redirect('test/index/'.$assignment_id.'/'.$test_request_id.'/'.$test_type_id);
  }
   function process_area_method_oral_liquids_single_component(){

      $assignment_id=$this->input->post('assignment_id');
      $test_request_id=$this->input->post('tr_id');
      $test_type_id=$this->input->post('test_type_id');
      $status=1;
      $area_method_single_component='6b';

      $data=$this->db->select_max('id')->get('assay_hplc_area_method_single_component')->result();
      $assay_hplc_area_method_single_component_id=$data[0]->id;
      $assay_hplc_area_method_single_component_id++;
      

  //test data Insertion
    $data = array(
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,    
     'serial_number'=>$this->input->post('serial_number'),
     'analysis_date'=>$this->input->post('analysis_date'),
     'balance_make'=>$this->input->post('equipmentbalance'),
     'balance_id'=>$this->input->post('balance_id'),
     'weight_of_sample_container_w1'=>$this->input->post('weight_sample_container_one'),
     'weight_of_sample_container_w2'=>$this->input->post('weight_sample_container_two'),
     'weight_of_sample_container_w3'=>$this->input->post('weight_sample_container_three'),
     'weight_of_sample_container_w4'=>$this->input->post('weight_sample_container_four'),
     'weight_of_sample_container_w5'=>$this->input->post('weight_sample_container_five'),
     'weight_of_sample_container_w6'=>$this->input->post('weight_sample_container_six'), 
     'weight_of_container_w1'=>$this->input->post('weight_container_one'),
     'weight_of_container_w2'=>$this->input->post('weight_container_two'),
     'weight_of_container_w3'=>$this->input->post('weight_container_three'),
     'weight_of_container_w4'=>$this->input->post('weight_container_four'),
     'weight_of_container_w5'=>$this->input->post('weight_container_five'),
     'weight_of_container_w6'=>$this->input->post('weight_container_six'),
     'weight_of_sample_w1'=>$this->input->post('weight_sample_one'),
     'weight_of_sample_w2'=>$this->input->post('weight_sample_two'),
     'weight_of_sample_w3'=>$this->input->post('weight_sample_three'),
     'weight_of_sample_w4'=>$this->input->post('weight_sample_four'),
     'weight_of_sample_w5'=>$this->input->post('weight_sample_five'),
     'weight_of_sample_w6'=>$this->input->post('weight_sample_six'),
     'dilution_one'=>$this->input->post('dilution_one'),
     'weight_of_standard_preparation'=>$this->input->post('weight_of_standard_preparation'),
     'standard_description_one'=>$this->input->post('standard_description_one'),
     'standard_description_two'=>$this->input->post('standard_description_two'),
     'potency_one'=>$this->input->post('potency_one'),
     'potency_two'=>$this->input->post('potency_two'),
     'weight_standard_container_std_one'=>$this->input->post('weight_standard_container_of_std_one'),
     'weight_standard_container_std_two'=>$this->input->post('weight_standard_container_of_std_two'),
     'weight_container_of_std_one'=>$this->input->post('weight_container_of_std_one'),
     'weight_container_of_std_two'=>$this->input->post('weight_container_of_std_two'),
     'weight_of_standard_one'=>$this->input->post('weight_of_standard_one'),
     'weight_of_standard_two'=>$this->input->post('weight_of_standard_two'),
     'dilution_standard_one'=>$this->input->post('dilution_standard_one'),
     'dilution_standard_two'=>$this->input->post('dilution_standard_two'),
     'equipment_make'=>$this->input->post('equipmentmake'),
     'equipment_id'=>$this->input->post('make_id'),
     'weight_of_sample_container_w1_two'=>$this->input->post('weight_sample_container_one_one'),
     'weight_of_sample_container_w2_two'=>$this->input->post('weight_sample_container_two_one'),
     'weight_of_sample_container_w3_two'=>$this->input->post('weight_sample_container_three_one'),
     'weight_of_sample_container_w4_two'=>$this->input->post('weight_sample_container_four_one'),
     'weight_of_sample_container_w5_two'=>$this->input->post('weight_sample_container_five_one'),
     'weight_of_sample_container_w6_two'=>$this->input->post('weight_sample_container_six_one'),
     'weight_of_container_w1_two'=>$this->input->post('weight_container_one_two'),
     'weight_of_container_w2_two'=>$this->input->post('weight_container_two_two'),
     'weight_of_container_w3_two'=>$this->input->post('weight_container_three_two'),
     'weight_of_container_w4_two'=>$this->input->post('weight_container_four_two'),
     'weight_of_container_w5_two'=>$this->input->post('weight_container_five_two'),
     'weight_of_container_w6_two'=>$this->input->post('weight_container_six_two'),
     'weight_of_sample_w1_two'=>$this->input->post('weight_sample_one_three'),
     'weight_of_sample_w2_two'=>$this->input->post('weight_sample_two_three'),
     'weight_of_sample_w3_two'=>$this->input->post('weight_sample_three_three'),
     'weight_of_sample_w4_two'=>$this->input->post('weight_sample_four_three'),
     'weight_of_sample_w5_two'=>$this->input->post('weight_sample_five_three'),
     'weight_of_sample_w6_two'=>$this->input->post('weight_sample_six_three'),
     'mobile_phase_preparation'=>$this->input->post('mobile_phase_preparation'),
     'd_one_pkt'=>$this->input->post('d_one_pkt'),
     'd_one_wstd'=>$this->input->post('d_one_wstd'),
     'd_one_awt'=>$this->input->post('d_one_awt'),
     'd_one_df'=>$this->input->post('d_one_df'),
     'd_one_potency'=>$this->input->post('d_one_potency'),
     'd_one_pkstd'=>$this->input->post('d_one_pkstd'),
     'd_one_wt'=>$this->input->post('d_one_wt'),
     'd_one_lc'=>$this->input->post('d_one_lc'),
     'd_two_pkt'=>$this->input->post('d_two_pkt'),
     'd_two_wstd'=>$this->input->post('d_two_wstd'),
     'd_two_awt'=>$this->input->post('d_two_awt'),
     'd_two_df'=>$this->input->post('d_two_df'),
     'd_two_potency'=>$this->input->post('d_two_potency'),
     'd_two_pkstd'=>$this->input->post('d_two_pkstd'),
     'd_two_wt'=>$this->input->post('d_two_wt'),
     'd_two_lc'=>$this->input->post('d_two_lc'),
     'd_three_pkt'=>$this->input->post('d_three_pkt'),
     'd_three_wstd'=>$this->input->post('d_three_wstd'),
     'd_three_awt'=>$this->input->post('d_three_awt'),
     'd_three_df'=>$this->input->post('d_three_df'),
     'd_three_potency'=>$this->input->post('d_three_potency'),
     'd_three_pkstd'=>$this->input->post('d_three_pkstd'),
     'd_three_wt'=>$this->input->post('d_three_wt'),
     'd_three_lc'=>$this->input->post('d_three_lc'),
     'd_four_pkt'=>$this->input->post('d_four_pkt'),
     'd_four_wstd'=>$this->input->post('d_four_wstd'),
     'd_four_awt'=>$this->input->post('d_four_awt'),
     'd_four_df'=>$this->input->post('d_four_df'),
     'd_four_potency'=>$this->input->post('d_four_potency'),
     'd_four_pkstd'=>$this->input->post('d_four_pkstd'),
     'd_four_wt'=>$this->input->post('d_four_wt'),
     'd_four_lc'=>$this->input->post('d_four_lc'),
     'd_five_pkt'=>$this->input->post('d_five_pkt'),
     'd_five_wstd'=>$this->input->post('d_five_wstd'),
     'd_five_awt'=>$this->input->post('d_five_awt'),
     'd_five_df'=>$this->input->post('d_five_df'),
     'd_five_potency'=>$this->input->post('d_five_potency'),
     'd_five_pkstd'=>$this->input->post('d_five_pkstd'),
     'd_five_wt'=>$this->input->post('d_five_wt'),
     'd_five_lc'=>$this->input->post('d_five_lc'),
     'd_six_pkt'=>$this->input->post('d_six_pkt'),
     'd_six_wstd'=>$this->input->post('d_six_wstd'),
     'd_six_awt'=>$this->input->post('d_six_awt'),
     'd_six_df'=>$this->input->post('d_six_df'),
     'd_six_potency'=>$this->input->post('d_six_potency'),
     'd_six_pkstd'=>$this->input->post('d_six_pkstd'),
     'd_six_wt'=>$this->input->post('d_six_wt'),
     'd_six_lc'=>$this->input->post('d_six_lc'),
     'determination_one'=>$this->input->post('d_one_p_lc'),
     'determination_two'=>$this->input->post('d_two_p_lc'),
     'determination_three'=>$this->input->post('d_three_p_lc'),
     'determination_four'=>$this->input->post('d_four_p_lc'),
     'determination_five'=>$this->input->post('d_five_p_lc'),
     'determination_six'=>$this->input->post('d_six_p_lc'),
     'average_determination'=>$this->input->post('average_determination'),
     'equivalent_to'=>$this->input->post('equivalent_to_determination'),
     'sd_determination'=>$this->input->post('sd_determination'),
     'rsd_determination'=>$this->input->post('rsd_determination'),
     'content_from'=>$this->input->post('content_from'),
     'content_to'=>$this->input->post('content_to'),
     'content_results'=>$this->input->post('content_results'),
     'content_comment'=>$this->input->post('content_comment'),
     'sd_acceptance_criteria'=>$this->input->post('sd_acceptance_criteria'),
     'sd_results'=>$this->input->post('sd_results'),
     'sd_comment'=>$this->input->post('sd_comment'),
     'rsd_acceptance_criteria'=>$this->input->post('rsd_acceptance_criteria'),
     'rsd_results'=>$this->input->post('rsd_results'),
     'rsd_comment'=>$this->input->post('rsd_comment'),
     'conclusion'=>$this->input->post('conclusion'),
     'supervisor'=>$this->input->post('supervisor'),
     'date'=>$this->input->post('date'),
     'further_comments'=>$this->input->post('further_comments'),
     'test_status'=>$status
    );
    $data_two = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'name'=>$this->input->post('column_name'),
     'length'=>$this->input->post('column_dimensions'),
     'lot_serial_number'=>$this->input->post('column_serial_number'),
     'manufacturer'=>$this->input->post('column_manufacturer'),
     'column_pressure'=>$this->input->post('column_pressure'),
     'column_oven_temperature'=>$this->input->post('column_oven_temperature'),
     'mobile_phase_flow_rate'=>$this->input->post('column_mp_flow_rate'),
     'detection_wavelength'=>$this->input->post('column_detection_wavelength')

    );

    $data_three = array(

     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'retention_time_one'=>$this->input->post('retention_time_one'),
     'retention_time_two'=>$this->input->post('retention_time_two'),
     'retention_time_three'=>$this->input->post('retention_time_three'),
     'retention_time_four'=>$this->input->post('retention_time_four'),
     'retention_time_five'=>$this->input->post('retention_time_five'),
     'retention_time_six'=>$this->input->post('retention_time_six'),
     'peak_area_one'=>$this->input->post('peak_area_one'),
     'peak_area_two'=>$this->input->post('peak_area_two'),
     'peak_area_three'=>$this->input->post('peak_area_three'),
     'peak_area_four'=>$this->input->post('peak_area_four'),
     'peak_area_five'=>$this->input->post('peak_area_five'),
     'peak_area_six'=>$this->input->post('peak_area_six'),
     'asymmetry_one'=>$this->input->post('asymmetry_one'),
     'asymmetry_two'=>$this->input->post('asymmetry_two'),
     'asymmetry_three'=>$this->input->post('asymmetry_three'),
     'asymmetry_four'=>$this->input->post('asymmetry_four'),
     'asymmetry_five'=>$this->input->post('asymmetry_five'),
     'asymmetry_six'=>$this->input->post('asymmetry_six'),
     'resolution_one'=>$this->input->post('resolution_one'),
     'resolution_two'=>$this->input->post('resolution_two'),
     'resolution_three'=>$this->input->post('resolution_three'),
     'resolution_four'=>$this->input->post('resolution_four'),
     'resolution_five'=>$this->input->post('resolution_five'),
     'resolution_six'=>$this->input->post('resolution_six'),
     'relative_retention_time_one'=>$this->input->post('relative_retention_time_one'),
     'relative_retention_time_two'=>$this->input->post('relative_retention_time_two'),
     'relative_retention_time_three'=>$this->input->post('relative_retention_time_three'),
     'relative_retention_time_four'=>$this->input->post('relative_retention_time_four'),
     'relative_retention_time_five'=>$this->input->post('relative_retention_time_five'),
     'relative_retention_time_six'=>$this->input->post('relative_retention_time_six'),
     'average_retention_time'=>$this->input->post('average_retention_time'),
     'average_peak_area'=>$this->input->post('average_peak_area'),
     'average_asymmetry'=>$this->input->post('average_asymmetry'),
     'average_resolution'=>$this->input->post('average_resolution'),
     'average_relative_retention_time'=>$this->input->post('average_relative_retention_time'),
     'sd_retention_time'=>$this->input->post('standard_dev_retention_time'),
     'sd_peak_area'=>$this->input->post('standard_dev_peak_area'),
     'sd_asymmetry'=>$this->input->post('standard_dev_asymmetry'),
     'sd_resolution'=>$this->input->post('standard_dev_resolution'),
     'sd_relative_retention_time'=>$this->input->post('standard_dev_relative_retention_time'),
     'rsd_retention_time'=>$this->input->post('rsd_retention_time'),
     'rsd_peak_area'=>$this->input->post('rsd_peak_area'),
     'rsd_asymmetry'=>$this->input->post('rsd_asymmetry'),
     'rsd_resolution'=>$this->input->post('rsd_resolution'),
     'rsd_relative_retention_time'=>$this->input->post('rsd_relative_retention_time'),
     'comment_retention_time'=>$this->input->post('comment_retention_time'),
     'comment_peak_area'=>$this->input->post('comment_peak_area'),
     'comment_asymmetry'=>$this->input->post('comment_asymmetry'),
     'comment_resolution'=>$this->input->post('comment_resolution'),
     'comment_relative_retention_time'=>$this->input->post('comment_relative_retention_time')

    );

    $data_four = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'test'=>$this->input->post('test'),
     'chemical_reagent'=>$this->input->post('chemical_reagent'),
     'batch_number'=>$this->input->post('reagent_batch_number'),
     'manufacturer'=>$this->input->post('reagent_manufacturer'),

    );

    $data_five = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'sd_one'=>$this->input->post('sd_one'),
     'sd_two'=>$this->input->post('sd_two'),
     'sd_three'=>$this->input->post('sd_three'),
     'sd_four'=>$this->input->post('sd_four'),
     'sd_five'=>$this->input->post('sd_five'),
     'sample_one_one'=>$this->input->post('sample_one_one'),
     'sample_one_two'=>$this->input->post('sample_one_two'),
     'sample_one_three'=>$this->input->post('sample_one_three'),
     'sample_one_four'=>$this->input->post('sample_one_four'),
     'sample_one_five'=>$this->input->post('sample_one_five'),
     'sample_two_one'=>$this->input->post('sample_two_one'),
     'sample_two_two'=>$this->input->post('sample_two_two'),
     'sample_two_three'=>$this->input->post('sample_two_three'),
     'sample_two_four'=>$this->input->post('sample_two_four'),
     'sample_two_five'=>$this->input->post('sample_two_five'),
     'sample_three_one'=>$this->input->post('sample_three_one'),
     'sample_three_two'=>$this->input->post('sample_three_two'),
     'sample_three_three'=>$this->input->post('sample_three_three'),
     'sample_three_four'=>$this->input->post('sample_three_four'),
     'sample_three_five'=>$this->input->post('sample_three_five'),
     'sample_four_one'=>$this->input->post('sample_four_one'),
     'sample_four_two'=>$this->input->post('sample_four_two'),
     'sample_four_three'=>$this->input->post('sample_four_three'),
     'sample_four_four'=>$this->input->post('sample_four_four'),
     'sample_four_five'=>$this->input->post('sample_five_five'),
     'sample_five_one'=>$this->input->post('sample_five_one'),
     'sample_five_two'=>$this->input->post('sample_five_two'),
     'sample_five_three'=>$this->input->post('sample_five_three'),
     'sample_five_four'=>$this->input->post('sample_five_four'),
     'sample_five_five'=>$this->input->post('sample_five_five'),
     'sample_six_one'=>$this->input->post('sample_six_one'),
     'sample_six_two'=>$this->input->post('sample_six_two'),
     'sample_six_three'=>$this->input->post('sample_six_three'),
     'sample_six_four'=>$this->input->post('sample_six_four'),
     'sample_six_five'=>$this->input->post('sample_six_five'),
     'ratio_std_one_one'=>$this->input->post('ratio_std_one_one'),
     'ratio_std_one_two'=>$this->input->post('ratio_std_one_two'),
     'ratio_std_one_three'=>$this->input->post('ratio_std_one_three'),
     'ratio_std_one_four'=>$this->input->post('ratio_std_one_four'),
     'ratio_std_one_five'=>$this->input->post('ratio_std_one_five'),
     'ratio_std_two_one'=>$this->input->post('ratio_std_two_one'),
     'ratio_std_two_two'=>$this->input->post('ratio_std_two_two'),
     'ratio_std_two_three'=>$this->input->post('ratio_std_two_three'),
     'ratio_std_two_four'=>$this->input->post('ratio_std_two_four'),
     'ratio_std_two_five'=>$this->input->post('ratio_std_two_five'),
     'ratio_std_three_one'=>$this->input->post('ratio_std_three_one'),
     'ratio_std_three_two'=>$this->input->post('ratio_std_three_two'),
     'ratio_std_three_three'=>$this->input->post('ratio_std_three_three'),
     'ratio_std_three_four'=>$this->input->post('ratio_std_three_four'),
     'ratio_std_three_five'=>$this->input->post('ratio_std_three_five'),
     'ratio_std_four_one'=>$this->input->post('ratio_std_four_one'),
     'ratio_std_four_two'=>$this->input->post('ratio_std_four_two'),
     'ratio_std_four_three'=>$this->input->post('ratio_std_four_three'),
     'ratio_std_four_four'=>$this->input->post('ratio_std_four_four'),
     'ratio_std_four_five'=>$this->input->post('ratio_std_four_five'),
     'ratio_std_five_one'=>$this->input->post('ratio_std_five_one'),
     'ratio_std_five_two'=>$this->input->post('ratio_std_five_two'),
     'ratio_std_five_three'=>$this->input->post('ratio_std_five_three'),
     'ratio_std_five_four'=>$this->input->post('ratio_std_five_four'),
     'ratio_std_five_five'=>$this->input->post('ratio_std_five_five'),
     'ratio_std_six_one'=>$this->input->post('ratio_std_six_one'),
     'ratio_std_six_two'=>$this->input->post('ratio_std_six_two'),
     'ratio_std_six_three'=>$this->input->post('ratio_std_six_three'),
     'ratio_std_six_four'=>$this->input->post('ratio_std_six_four'),
     'ratio_std_six_five'=>$this->input->post('ratio_std_six_five'),
     'ratio_std_seven_one'=>$this->input->post('ratio_std_seven_one'),
     'ratio_std_seven_two'=>$this->input->post('ratio_std_seven_two'),
     'ratio_std_seven_three'=>$this->input->post('ratio_std_seven_three'),
     'ratio_std_seven_four'=>$this->input->post('ratio_std_seven_four'),
     'ratio_std_seven_five'=>$this->input->post('ratio_std_seven_five'),
     'internal_std_one_one'=>$this->input->post('internal_std_one_one'),
     'internal_std_one_two'=>$this->input->post('internal_std_one_two'),
     'internal_std_one_three'=>$this->input->post('internal_std_one_three'),
     'internal_std_one_four'=>$this->input->post('internal_std_one_four'),
     'internal_std_one_five'=>$this->input->post('internal_std_one_five'),
     'internal_std_two_one'=>$this->input->post('internal_std_two_one'),
     'internal_std_two_two'=>$this->input->post('internal_std_two_two'),
     'internal_std_two_three'=>$this->input->post('internal_std_two_three'),
     'internal_std_two_four'=>$this->input->post('internal_std_two_four'),
     'internal_std_two_five'=>$this->input->post('internal_std_two_five'),
     'internal_std_three_one'=>$this->input->post('internal_std_three_one'),
     'internal_std_three_two'=>$this->input->post('internal_std_three_two'),
     'internal_std_three_three'=>$this->input->post('internal_std_three_three'),
     'internal_std_three_four'=>$this->input->post('internal_std_three_four'),
     'internal_std_three_five'=>$this->input->post('internal_std_three_five'),
     'internal_std_four_one'=>$this->input->post('internal_std_four_one'),
     'internal_std_four_two'=>$this->input->post('internal_std_four_two'),
     'internal_std_four_three'=>$this->input->post('internal_std_four_three'),
     'internal_std_four_four'=>$this->input->post('internal_std_four_four'),
     'internal_std_four_five'=>$this->input->post('internal_std_four_five'),
     'internal_std_five_one'=>$this->input->post('internal_std_five_one'),
     'internal_std_five_two'=>$this->input->post('internal_std_five_two'),
     'internal_std_five_three'=>$this->input->post('internal_std_five_three'),
     'internal_std_five_four'=>$this->input->post('internal_std_five_four'),
     'internal_std_five_five'=>$this->input->post('internal_std_five_five'),
     'internal_std_six_one'=>$this->input->post('internal_std_six_one'),
     'internal_std_six_two'=>$this->input->post('internal_std_six_two'),
     'internal_std_six_three'=>$this->input->post('internal_std_six_three'),
     'internal_std_six_four'=>$this->input->post('internal_std_six_four'),
     'internal_std_six_five'=>$this->input->post('internal_std_six_five'),
     'internal_std_seven_one'=>$this->input->post('internal_std_seven_one'),
     'internal_std_seven_two'=>$this->input->post('internal_std_seven_two'),
     'internal_std_seven_three'=>$this->input->post('internal_std_seven_three'),
     'internal_std_seven_four'=>$this->input->post('internal_std_seven_four'),
     'internal_std_seven_five'=>$this->input->post('internal_std_seven_five'),
     'average_std'=>$this->input->post('average_std'),
     'average_sample_one'=>$this->input->post('average_sample_one'),
     'average_sample_two'=>$this->input->post('average_sample_two'),
     'average_sample_three'=>$this->input->post('average_sample_three'),
     'average_sample_four'=>$this->input->post('average_sample_four'),
     'average_sample_five'=>$this->input->post('average_sample_five'),
     'average_sample_six'=>$this->input->post('average_sample_six'),
     'ratio_std_one_average'=>$this->input->post('ratio_std_one_average'),
     'ratio_std_two_average'=>$this->input->post('ratio_std_two_average'),
     'ratio_std_three_average'=>$this->input->post('ratio_std_three_average'),
     'ratio_std_four_average'=>$this->input->post('ratio_std_four_average'),
     'ratio_std_five_average'=>$this->input->post('ratio_std_five_average'),
     'ratio_std_six_average'=>$this->input->post('ratio_std_six_average'),
     'ratio_std_seven_average'=>$this->input->post('ratio_std_seven_average'),
     'internal_std_one_average'=>$this->input->post('internal_std_one_average'),
     'internal_std_two_average'=>$this->input->post('internal_std_two_average'),
     'internal_std_three_average'=>$this->input->post('internal_std_three_average'),
     'internal_std_four_average'=>$this->input->post('internal_std_four_average'),
     'internal_std_five_average'=>$this->input->post('internal_std_five_average'),
     'internal_std_six_average'=>$this->input->post('internal_std_six_average'),
     'internal_std_seven_average'=>$this->input->post('internal_std_seven_average')
     

    );

    $data_six = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'requirement'=>$this->input->post(''),
     'comment'=>$this->input->post('')

    );

     $data_seven = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'method'=>$this->input->post('method'),
     'specification'=>$this->input->post('specification'),
     'conclusion'=>$this->input->post('conclusion'),
     'supervisor'=>$this->input->post('supervisor'),
     'date_tested'=>$this->input->post('date'),
     'further_comments'=>$this->input->post('further_comments')

    );

    $this->db->insert('coa',$data_seven);
    $this->db->insert('assay_hplc_internal_method_chromatography_checklist',$data_six);
    $this->db->insert('assay_hplc_internal_method_peak_area_chromatograms',$data_five);
    $this->db->insert('assay_hplc_internal_method_reagents',$data_four);
    $this->db->insert('assay_hplc_internal_method_chromatograms',$data_three);
    $this->db->insert('assay_hplc_internal_method_chromatographic_conditions',$data_two);
    $this->db->insert('assay_hplc_internal_method', $data);
    redirect('test/index/'.$assignment_id.'/'.$test_request_id.'/'.$test_type_id);
  }
   function process_area_method_powder_for_oral_liquids(){

      $assignment_id=$this->input->post('assignment_id');
      $test_request_id=$this->input->post('tr_id');
      $test_type_id=$this->input->post('test_type_id');
      $status=1;
      $area_method_single_component='6b';

      $data=$this->db->select_max('id')->get('assay_hplc_area_method_single_component')->result();
      $assay_hplc_area_method_single_component_id=$data[0]->id;
      $assay_hplc_area_method_single_component_id++;
      

  //test data Insertion
    $data = array(
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,    
     'serial_number'=>$this->input->post('serial_number'),
     'analysis_date'=>$this->input->post('analysis_date'),
     'balance_make'=>$this->input->post('equipmentbalance'),
     'balance_id'=>$this->input->post('balance_id'),
     'weight_of_sample_container_w1'=>$this->input->post('weight_sample_container_one'),
     'weight_of_sample_container_w2'=>$this->input->post('weight_sample_container_two'),
     'weight_of_sample_container_w3'=>$this->input->post('weight_sample_container_three'),
     'weight_of_sample_container_w4'=>$this->input->post('weight_sample_container_four'),
     'weight_of_sample_container_w5'=>$this->input->post('weight_sample_container_five'),
     'weight_of_sample_container_w6'=>$this->input->post('weight_sample_container_six'), 
     'weight_of_container_w1'=>$this->input->post('weight_container_one'),
     'weight_of_container_w2'=>$this->input->post('weight_container_two'),
     'weight_of_container_w3'=>$this->input->post('weight_container_three'),
     'weight_of_container_w4'=>$this->input->post('weight_container_four'),
     'weight_of_container_w5'=>$this->input->post('weight_container_five'),
     'weight_of_container_w6'=>$this->input->post('weight_container_six'),
     'weight_of_sample_w1'=>$this->input->post('weight_sample_one'),
     'weight_of_sample_w2'=>$this->input->post('weight_sample_two'),
     'weight_of_sample_w3'=>$this->input->post('weight_sample_three'),
     'weight_of_sample_w4'=>$this->input->post('weight_sample_four'),
     'weight_of_sample_w5'=>$this->input->post('weight_sample_five'),
     'weight_of_sample_w6'=>$this->input->post('weight_sample_six'),
     'dilution_one'=>$this->input->post('dilution_one'),
     'weight_of_standard_preparation'=>$this->input->post('weight_of_standard_preparation'),
     'standard_description_one'=>$this->input->post('standard_description_one'),
     'standard_description_two'=>$this->input->post('standard_description_two'),
     'potency_one'=>$this->input->post('potency_one'),
     'potency_two'=>$this->input->post('potency_two'),
     'weight_standard_container_std_one'=>$this->input->post('weight_standard_container_of_std_one'),
     'weight_standard_container_std_two'=>$this->input->post('weight_standard_container_of_std_two'),
     'weight_container_of_std_one'=>$this->input->post('weight_container_of_std_one'),
     'weight_container_of_std_two'=>$this->input->post('weight_container_of_std_two'),
     'weight_of_standard_one'=>$this->input->post('weight_of_standard_one'),
     'weight_of_standard_two'=>$this->input->post('weight_of_standard_two'),
     'dilution_standard_one'=>$this->input->post('dilution_standard_one'),
     'dilution_standard_two'=>$this->input->post('dilution_standard_two'),
     'equipment_make'=>$this->input->post('equipmentmake'),
     'equipment_id'=>$this->input->post('make_id'),
     'weight_of_sample_container_w1_two'=>$this->input->post('weight_sample_container_one_one'),
     'weight_of_sample_container_w2_two'=>$this->input->post('weight_sample_container_two_one'),
     'weight_of_sample_container_w3_two'=>$this->input->post('weight_sample_container_three_one'),
     'weight_of_sample_container_w4_two'=>$this->input->post('weight_sample_container_four_one'),
     'weight_of_sample_container_w5_two'=>$this->input->post('weight_sample_container_five_one'),
     'weight_of_sample_container_w6_two'=>$this->input->post('weight_sample_container_six_one'),
     'weight_of_container_w1_two'=>$this->input->post('weight_container_one_two'),
     'weight_of_container_w2_two'=>$this->input->post('weight_container_two_two'),
     'weight_of_container_w3_two'=>$this->input->post('weight_container_three_two'),
     'weight_of_container_w4_two'=>$this->input->post('weight_container_four_two'),
     'weight_of_container_w5_two'=>$this->input->post('weight_container_five_two'),
     'weight_of_container_w6_two'=>$this->input->post('weight_container_six_two'),
     'weight_of_sample_w1_two'=>$this->input->post('weight_sample_one_three'),
     'weight_of_sample_w2_two'=>$this->input->post('weight_sample_two_three'),
     'weight_of_sample_w3_two'=>$this->input->post('weight_sample_three_three'),
     'weight_of_sample_w4_two'=>$this->input->post('weight_sample_four_three'),
     'weight_of_sample_w5_two'=>$this->input->post('weight_sample_five_three'),
     'weight_of_sample_w6_two'=>$this->input->post('weight_sample_six_three'),
     'mobile_phase_preparation'=>$this->input->post('mobile_phase_preparation'),
     'd_one_pkt'=>$this->input->post('d_one_pkt'),
     'd_one_wstd'=>$this->input->post('d_one_wstd'),
     'd_one_awt'=>$this->input->post('d_one_awt'),
     'd_one_df'=>$this->input->post('d_one_df'),
     'd_one_potency'=>$this->input->post('d_one_potency'),
     'd_one_pkstd'=>$this->input->post('d_one_pkstd'),
     'd_one_wt'=>$this->input->post('d_one_wt'),
     'd_one_lc'=>$this->input->post('d_one_lc'),
     'd_two_pkt'=>$this->input->post('d_two_pkt'),
     'd_two_wstd'=>$this->input->post('d_two_wstd'),
     'd_two_awt'=>$this->input->post('d_two_awt'),
     'd_two_df'=>$this->input->post('d_two_df'),
     'd_two_potency'=>$this->input->post('d_two_potency'),
     'd_two_pkstd'=>$this->input->post('d_two_pkstd'),
     'd_two_wt'=>$this->input->post('d_two_wt'),
     'd_two_lc'=>$this->input->post('d_two_lc'),
     'd_three_pkt'=>$this->input->post('d_three_pkt'),
     'd_three_wstd'=>$this->input->post('d_three_wstd'),
     'd_three_awt'=>$this->input->post('d_three_awt'),
     'd_three_df'=>$this->input->post('d_three_df'),
     'd_three_potency'=>$this->input->post('d_three_potency'),
     'd_three_pkstd'=>$this->input->post('d_three_pkstd'),
     'd_three_wt'=>$this->input->post('d_three_wt'),
     'd_three_lc'=>$this->input->post('d_three_lc'),
     'd_four_pkt'=>$this->input->post('d_four_pkt'),
     'd_four_wstd'=>$this->input->post('d_four_wstd'),
     'd_four_awt'=>$this->input->post('d_four_awt'),
     'd_four_df'=>$this->input->post('d_four_df'),
     'd_four_potency'=>$this->input->post('d_four_potency'),
     'd_four_pkstd'=>$this->input->post('d_four_pkstd'),
     'd_four_wt'=>$this->input->post('d_four_wt'),
     'd_four_lc'=>$this->input->post('d_four_lc'),
     'd_five_pkt'=>$this->input->post('d_five_pkt'),
     'd_five_wstd'=>$this->input->post('d_five_wstd'),
     'd_five_awt'=>$this->input->post('d_five_awt'),
     'd_five_df'=>$this->input->post('d_five_df'),
     'd_five_potency'=>$this->input->post('d_five_potency'),
     'd_five_pkstd'=>$this->input->post('d_five_pkstd'),
     'd_five_wt'=>$this->input->post('d_five_wt'),
     'd_five_lc'=>$this->input->post('d_five_lc'),
     'd_six_pkt'=>$this->input->post('d_six_pkt'),
     'd_six_wstd'=>$this->input->post('d_six_wstd'),
     'd_six_awt'=>$this->input->post('d_six_awt'),
     'd_six_df'=>$this->input->post('d_six_df'),
     'd_six_potency'=>$this->input->post('d_six_potency'),
     'd_six_pkstd'=>$this->input->post('d_six_pkstd'),
     'd_six_wt'=>$this->input->post('d_six_wt'),
     'd_six_lc'=>$this->input->post('d_six_lc'),
     'determination_one'=>$this->input->post('d_one_p_lc'),
     'determination_two'=>$this->input->post('d_two_p_lc'),
     'determination_three'=>$this->input->post('d_three_p_lc'),
     'determination_four'=>$this->input->post('d_four_p_lc'),
     'determination_five'=>$this->input->post('d_five_p_lc'),
     'determination_six'=>$this->input->post('d_six_p_lc'),
     'average_determination'=>$this->input->post('average_determination'),
     'equivalent_to'=>$this->input->post('equivalent_to_determination'),
     'sd_determination'=>$this->input->post('sd_determination'),
     'rsd_determination'=>$this->input->post('rsd_determination'),
     'content_from'=>$this->input->post('content_from'),
     'content_to'=>$this->input->post('content_to'),
     'content_results'=>$this->input->post('content_results'),
     'content_comment'=>$this->input->post('content_comment'),
     'sd_acceptance_criteria'=>$this->input->post('sd_acceptance_criteria'),
     'sd_results'=>$this->input->post('sd_results'),
     'sd_comment'=>$this->input->post('sd_comment'),
     'rsd_acceptance_criteria'=>$this->input->post('rsd_acceptance_criteria'),
     'rsd_results'=>$this->input->post('rsd_results'),
     'rsd_comment'=>$this->input->post('rsd_comment'),
     'conclusion'=>$this->input->post('conclusion'),
     'supervisor'=>$this->input->post('supervisor'),
     'date'=>$this->input->post('date'),
     'further_comments'=>$this->input->post('further_comments'),
     'test_status'=>$status
    );
    $data_two = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'name'=>$this->input->post('column_name'),
     'length'=>$this->input->post('column_dimensions'),
     'lot_serial_number'=>$this->input->post('column_serial_number'),
     'manufacturer'=>$this->input->post('column_manufacturer'),
     'column_pressure'=>$this->input->post('column_pressure'),
     'column_oven_temperature'=>$this->input->post('column_oven_temperature'),
     'mobile_phase_flow_rate'=>$this->input->post('column_mp_flow_rate'),
     'detection_wavelength'=>$this->input->post('column_detection_wavelength')

    );

    $data_three = array(

     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'retention_time_one'=>$this->input->post('retention_time_one'),
     'retention_time_two'=>$this->input->post('retention_time_two'),
     'retention_time_three'=>$this->input->post('retention_time_three'),
     'retention_time_four'=>$this->input->post('retention_time_four'),
     'retention_time_five'=>$this->input->post('retention_time_five'),
     'retention_time_six'=>$this->input->post('retention_time_six'),
     'peak_area_one'=>$this->input->post('peak_area_one'),
     'peak_area_two'=>$this->input->post('peak_area_two'),
     'peak_area_three'=>$this->input->post('peak_area_three'),
     'peak_area_four'=>$this->input->post('peak_area_four'),
     'peak_area_five'=>$this->input->post('peak_area_five'),
     'peak_area_six'=>$this->input->post('peak_area_six'),
     'asymmetry_one'=>$this->input->post('asymmetry_one'),
     'asymmetry_two'=>$this->input->post('asymmetry_two'),
     'asymmetry_three'=>$this->input->post('asymmetry_three'),
     'asymmetry_four'=>$this->input->post('asymmetry_four'),
     'asymmetry_five'=>$this->input->post('asymmetry_five'),
     'asymmetry_six'=>$this->input->post('asymmetry_six'),
     'resolution_one'=>$this->input->post('resolution_one'),
     'resolution_two'=>$this->input->post('resolution_two'),
     'resolution_three'=>$this->input->post('resolution_three'),
     'resolution_four'=>$this->input->post('resolution_four'),
     'resolution_five'=>$this->input->post('resolution_five'),
     'resolution_six'=>$this->input->post('resolution_six'),
     'relative_retention_time_one'=>$this->input->post('relative_retention_time_one'),
     'relative_retention_time_two'=>$this->input->post('relative_retention_time_two'),
     'relative_retention_time_three'=>$this->input->post('relative_retention_time_three'),
     'relative_retention_time_four'=>$this->input->post('relative_retention_time_four'),
     'relative_retention_time_five'=>$this->input->post('relative_retention_time_five'),
     'relative_retention_time_six'=>$this->input->post('relative_retention_time_six'),
     'average_retention_time'=>$this->input->post('average_retention_time'),
     'average_peak_area'=>$this->input->post('average_peak_area'),
     'average_asymmetry'=>$this->input->post('average_asymmetry'),
     'average_resolution'=>$this->input->post('average_resolution'),
     'average_relative_retention_time'=>$this->input->post('average_relative_retention_time'),
     'sd_retention_time'=>$this->input->post('standard_dev_retention_time'),
     'sd_peak_area'=>$this->input->post('standard_dev_peak_area'),
     'sd_asymmetry'=>$this->input->post('standard_dev_asymmetry'),
     'sd_resolution'=>$this->input->post('standard_dev_resolution'),
     'sd_relative_retention_time'=>$this->input->post('standard_dev_relative_retention_time'),
     'rsd_retention_time'=>$this->input->post('rsd_retention_time'),
     'rsd_peak_area'=>$this->input->post('rsd_peak_area'),
     'rsd_asymmetry'=>$this->input->post('rsd_asymmetry'),
     'rsd_resolution'=>$this->input->post('rsd_resolution'),
     'rsd_relative_retention_time'=>$this->input->post('rsd_relative_retention_time'),
     'comment_retention_time'=>$this->input->post('comment_retention_time'),
     'comment_peak_area'=>$this->input->post('comment_peak_area'),
     'comment_asymmetry'=>$this->input->post('comment_asymmetry'),
     'comment_resolution'=>$this->input->post('comment_resolution'),
     'comment_relative_retention_time'=>$this->input->post('comment_relative_retention_time')

    );

    $data_four = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'test'=>$this->input->post('test'),
     'chemical_reagent'=>$this->input->post('chemical_reagent'),
     'batch_number'=>$this->input->post('reagent_batch_number'),
     'manufacturer'=>$this->input->post('reagent_manufacturer'),

    );

    $data_five = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'sd_one'=>$this->input->post('sd_one'),
     'sd_two'=>$this->input->post('sd_two'),
     'sd_three'=>$this->input->post('sd_three'),
     'sd_four'=>$this->input->post('sd_four'),
     'sd_five'=>$this->input->post('sd_five'),
     'sample_one_one'=>$this->input->post('sample_one_one'),
     'sample_one_two'=>$this->input->post('sample_one_two'),
     'sample_one_three'=>$this->input->post('sample_one_three'),
     'sample_one_four'=>$this->input->post('sample_one_four'),
     'sample_one_five'=>$this->input->post('sample_one_five'),
     'sample_two_one'=>$this->input->post('sample_two_one'),
     'sample_two_two'=>$this->input->post('sample_two_two'),
     'sample_two_three'=>$this->input->post('sample_two_three'),
     'sample_two_four'=>$this->input->post('sample_two_four'),
     'sample_two_five'=>$this->input->post('sample_two_five'),
     'sample_three_one'=>$this->input->post('sample_three_one'),
     'sample_three_two'=>$this->input->post('sample_three_two'),
     'sample_three_three'=>$this->input->post('sample_three_three'),
     'sample_three_four'=>$this->input->post('sample_three_four'),
     'sample_three_five'=>$this->input->post('sample_three_five'),
     'sample_four_one'=>$this->input->post('sample_four_one'),
     'sample_four_two'=>$this->input->post('sample_four_two'),
     'sample_four_three'=>$this->input->post('sample_four_three'),
     'sample_four_four'=>$this->input->post('sample_four_four'),
     'sample_four_five'=>$this->input->post('sample_five_five'),
     'sample_five_one'=>$this->input->post('sample_five_one'),
     'sample_five_two'=>$this->input->post('sample_five_two'),
     'sample_five_three'=>$this->input->post('sample_five_three'),
     'sample_five_four'=>$this->input->post('sample_five_four'),
     'sample_five_five'=>$this->input->post('sample_five_five'),
     'sample_six_one'=>$this->input->post('sample_six_one'),
     'sample_six_two'=>$this->input->post('sample_six_two'),
     'sample_six_three'=>$this->input->post('sample_six_three'),
     'sample_six_four'=>$this->input->post('sample_six_four'),
     'sample_six_five'=>$this->input->post('sample_six_five'),
     'ratio_std_one_one'=>$this->input->post('ratio_std_one_one'),
     'ratio_std_one_two'=>$this->input->post('ratio_std_one_two'),
     'ratio_std_one_three'=>$this->input->post('ratio_std_one_three'),
     'ratio_std_one_four'=>$this->input->post('ratio_std_one_four'),
     'ratio_std_one_five'=>$this->input->post('ratio_std_one_five'),
     'ratio_std_two_one'=>$this->input->post('ratio_std_two_one'),
     'ratio_std_two_two'=>$this->input->post('ratio_std_two_two'),
     'ratio_std_two_three'=>$this->input->post('ratio_std_two_three'),
     'ratio_std_two_four'=>$this->input->post('ratio_std_two_four'),
     'ratio_std_two_five'=>$this->input->post('ratio_std_two_five'),
     'ratio_std_three_one'=>$this->input->post('ratio_std_three_one'),
     'ratio_std_three_two'=>$this->input->post('ratio_std_three_two'),
     'ratio_std_three_three'=>$this->input->post('ratio_std_three_three'),
     'ratio_std_three_four'=>$this->input->post('ratio_std_three_four'),
     'ratio_std_three_five'=>$this->input->post('ratio_std_three_five'),
     'ratio_std_four_one'=>$this->input->post('ratio_std_four_one'),
     'ratio_std_four_two'=>$this->input->post('ratio_std_four_two'),
     'ratio_std_four_three'=>$this->input->post('ratio_std_four_three'),
     'ratio_std_four_four'=>$this->input->post('ratio_std_four_four'),
     'ratio_std_four_five'=>$this->input->post('ratio_std_four_five'),
     'ratio_std_five_one'=>$this->input->post('ratio_std_five_one'),
     'ratio_std_five_two'=>$this->input->post('ratio_std_five_two'),
     'ratio_std_five_three'=>$this->input->post('ratio_std_five_three'),
     'ratio_std_five_four'=>$this->input->post('ratio_std_five_four'),
     'ratio_std_five_five'=>$this->input->post('ratio_std_five_five'),
     'ratio_std_six_one'=>$this->input->post('ratio_std_six_one'),
     'ratio_std_six_two'=>$this->input->post('ratio_std_six_two'),
     'ratio_std_six_three'=>$this->input->post('ratio_std_six_three'),
     'ratio_std_six_four'=>$this->input->post('ratio_std_six_four'),
     'ratio_std_six_five'=>$this->input->post('ratio_std_six_five'),
     'ratio_std_seven_one'=>$this->input->post('ratio_std_seven_one'),
     'ratio_std_seven_two'=>$this->input->post('ratio_std_seven_two'),
     'ratio_std_seven_three'=>$this->input->post('ratio_std_seven_three'),
     'ratio_std_seven_four'=>$this->input->post('ratio_std_seven_four'),
     'ratio_std_seven_five'=>$this->input->post('ratio_std_seven_five'),
     'internal_std_one_one'=>$this->input->post('internal_std_one_one'),
     'internal_std_one_two'=>$this->input->post('internal_std_one_two'),
     'internal_std_one_three'=>$this->input->post('internal_std_one_three'),
     'internal_std_one_four'=>$this->input->post('internal_std_one_four'),
     'internal_std_one_five'=>$this->input->post('internal_std_one_five'),
     'internal_std_two_one'=>$this->input->post('internal_std_two_one'),
     'internal_std_two_two'=>$this->input->post('internal_std_two_two'),
     'internal_std_two_three'=>$this->input->post('internal_std_two_three'),
     'internal_std_two_four'=>$this->input->post('internal_std_two_four'),
     'internal_std_two_five'=>$this->input->post('internal_std_two_five'),
     'internal_std_three_one'=>$this->input->post('internal_std_three_one'),
     'internal_std_three_two'=>$this->input->post('internal_std_three_two'),
     'internal_std_three_three'=>$this->input->post('internal_std_three_three'),
     'internal_std_three_four'=>$this->input->post('internal_std_three_four'),
     'internal_std_three_five'=>$this->input->post('internal_std_three_five'),
     'internal_std_four_one'=>$this->input->post('internal_std_four_one'),
     'internal_std_four_two'=>$this->input->post('internal_std_four_two'),
     'internal_std_four_three'=>$this->input->post('internal_std_four_three'),
     'internal_std_four_four'=>$this->input->post('internal_std_four_four'),
     'internal_std_four_five'=>$this->input->post('internal_std_four_five'),
     'internal_std_five_one'=>$this->input->post('internal_std_five_one'),
     'internal_std_five_two'=>$this->input->post('internal_std_five_two'),
     'internal_std_five_three'=>$this->input->post('internal_std_five_three'),
     'internal_std_five_four'=>$this->input->post('internal_std_five_four'),
     'internal_std_five_five'=>$this->input->post('internal_std_five_five'),
     'internal_std_six_one'=>$this->input->post('internal_std_six_one'),
     'internal_std_six_two'=>$this->input->post('internal_std_six_two'),
     'internal_std_six_three'=>$this->input->post('internal_std_six_three'),
     'internal_std_six_four'=>$this->input->post('internal_std_six_four'),
     'internal_std_six_five'=>$this->input->post('internal_std_six_five'),
     'internal_std_seven_one'=>$this->input->post('internal_std_seven_one'),
     'internal_std_seven_two'=>$this->input->post('internal_std_seven_two'),
     'internal_std_seven_three'=>$this->input->post('internal_std_seven_three'),
     'internal_std_seven_four'=>$this->input->post('internal_std_seven_four'),
     'internal_std_seven_five'=>$this->input->post('internal_std_seven_five'),
     'average_std'=>$this->input->post('average_std'),
     'average_sample_one'=>$this->input->post('average_sample_one'),
     'average_sample_two'=>$this->input->post('average_sample_two'),
     'average_sample_three'=>$this->input->post('average_sample_three'),
     'average_sample_four'=>$this->input->post('average_sample_four'),
     'average_sample_five'=>$this->input->post('average_sample_five'),
     'average_sample_six'=>$this->input->post('average_sample_six'),
     'ratio_std_one_average'=>$this->input->post('ratio_std_one_average'),
     'ratio_std_two_average'=>$this->input->post('ratio_std_two_average'),
     'ratio_std_three_average'=>$this->input->post('ratio_std_three_average'),
     'ratio_std_four_average'=>$this->input->post('ratio_std_four_average'),
     'ratio_std_five_average'=>$this->input->post('ratio_std_five_average'),
     'ratio_std_six_average'=>$this->input->post('ratio_std_six_average'),
     'ratio_std_seven_average'=>$this->input->post('ratio_std_seven_average'),
     'internal_std_one_average'=>$this->input->post('internal_std_one_average'),
     'internal_std_two_average'=>$this->input->post('internal_std_two_average'),
     'internal_std_three_average'=>$this->input->post('internal_std_three_average'),
     'internal_std_four_average'=>$this->input->post('internal_std_four_average'),
     'internal_std_five_average'=>$this->input->post('internal_std_five_average'),
     'internal_std_six_average'=>$this->input->post('internal_std_six_average'),
     'internal_std_seven_average'=>$this->input->post('internal_std_seven_average')
     

    );

    $data_six = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'requirement'=>$this->input->post(''),
     'comment'=>$this->input->post('')

    );

     $data_seven = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'method'=>$this->input->post('method'),
     'specification'=>$this->input->post('specification'),
     'conclusion'=>$this->input->post('conclusion'),
     'supervisor'=>$this->input->post('supervisor'),
     'date_tested'=>$this->input->post('date'),
     'further_comments'=>$this->input->post('further_comments')

    );

    $this->db->insert('coa',$data_seven);
    $this->db->insert('assay_hplc_internal_method_chromatography_checklist',$data_six);
    $this->db->insert('assay_hplc_internal_method_peak_area_chromatograms',$data_five);
    $this->db->insert('assay_hplc_internal_method_reagents',$data_four);
    $this->db->insert('assay_hplc_internal_method_chromatograms',$data_three);
    $this->db->insert('assay_hplc_internal_method_chromatographic_conditions',$data_two);
    $this->db->insert('assay_hplc_internal_method', $data);
    redirect('test/index/'.$assignment_id.'/'.$test_request_id.'/'.$test_type_id);
  }
  //  function process_area_method_single_component(){

  //     $assignment_id=$this->input->post('assignment_id');
  //     $test_request_id=$this->input->post('tr_id');
  //     $test_type_id=$this->input->post('test_type_id');
  //     $status=1;
  //     $area_method_single_component='6b';

  //     $data=$this->db->select_max('id')->get('assay_hplc_area_method_single_component')->result();
  //     $assay_hplc_area_method_single_component_id=$data[0]->id;
  //     $assay_hplc_area_method_single_component_id++;
      

  // //test data Insertion
  //   $data = array(
  //    'assignment_id'=>$assignment_id,
  //    'test_request_id'=>$test_request_id,    
  //    'serial_number'=>$this->input->post('serial_number'),
  //    'analysis_date'=>$this->input->post('analysis_date'),
  //    'balance_make'=>$this->input->post('equipmentbalance'),
  //    'balance_id'=>$this->input->post('balance_id'),
  //    'weight_of_sample_container_w1'=>$this->input->post('weight_sample_container_one'),
  //    'weight_of_sample_container_w2'=>$this->input->post('weight_sample_container_two'),
  //    'weight_of_sample_container_w3'=>$this->input->post('weight_sample_container_three'),
  //    'weight_of_sample_container_w4'=>$this->input->post('weight_sample_container_four'),
  //    'weight_of_sample_container_w5'=>$this->input->post('weight_sample_container_five'),
  //    'weight_of_sample_container_w6'=>$this->input->post('weight_sample_container_six'), 
  //    'weight_of_container_w1'=>$this->input->post('weight_container_one'),
  //    'weight_of_container_w2'=>$this->input->post('weight_container_two'),
  //    'weight_of_container_w3'=>$this->input->post('weight_container_three'),
  //    'weight_of_container_w4'=>$this->input->post('weight_container_four'),
  //    'weight_of_container_w5'=>$this->input->post('weight_container_five'),
  //    'weight_of_container_w6'=>$this->input->post('weight_container_six'),
  //    'weight_of_sample_w1'=>$this->input->post('weight_sample_one'),
  //    'weight_of_sample_w2'=>$this->input->post('weight_sample_two'),
  //    'weight_of_sample_w3'=>$this->input->post('weight_sample_three'),
  //    'weight_of_sample_w4'=>$this->input->post('weight_sample_four'),
  //    'weight_of_sample_w5'=>$this->input->post('weight_sample_five'),
  //    'weight_of_sample_w6'=>$this->input->post('weight_sample_six'),
  //    'dilution_one'=>$this->input->post('dilution_one'),
  //    'weight_of_standard_preparation'=>$this->input->post('weight_of_standard_preparation'),
  //    'standard_description_one'=>$this->input->post('standard_description_one'),
  //    'standard_description_two'=>$this->input->post('standard_description_two'),
  //    'potency_one'=>$this->input->post('potency_one'),
  //    'potency_two'=>$this->input->post('potency_two'),
  //    'weight_standard_container_std_one'=>$this->input->post('weight_standard_container_of_std_one'),
  //    'weight_standard_container_std_two'=>$this->input->post('weight_standard_container_of_std_two'),
  //    'weight_container_of_std_one'=>$this->input->post('weight_container_of_std_one'),
  //    'weight_container_of_std_two'=>$this->input->post('weight_container_of_std_two'),
  //    'weight_of_standard_one'=>$this->input->post('weight_of_standard_one'),
  //    'weight_of_standard_two'=>$this->input->post('weight_of_standard_two'),
  //    'dilution_standard_one'=>$this->input->post('dilution_standard_one'),
  //    'dilution_standard_two'=>$this->input->post('dilution_standard_two'),
  //    'equipment_make'=>$this->input->post('equipmentmake'),
  //    'equipment_id'=>$this->input->post('make_id'),
  //    'weight_of_sample_container_w1_two'=>$this->input->post('weight_sample_container_one_one'),
  //    'weight_of_sample_container_w2_two'=>$this->input->post('weight_sample_container_two_one'),
  //    'weight_of_sample_container_w3_two'=>$this->input->post('weight_sample_container_three_one'),
  //    'weight_of_sample_container_w4_two'=>$this->input->post('weight_sample_container_four_one'),
  //    'weight_of_sample_container_w5_two'=>$this->input->post('weight_sample_container_five_one'),
  //    'weight_of_sample_container_w6_two'=>$this->input->post('weight_sample_container_six_one'),
  //    'weight_of_container_w1_two'=>$this->input->post('weight_container_one_two'),
  //    'weight_of_container_w2_two'=>$this->input->post('weight_container_two_two'),
  //    'weight_of_container_w3_two'=>$this->input->post('weight_container_three_two'),
  //    'weight_of_container_w4_two'=>$this->input->post('weight_container_four_two'),
  //    'weight_of_container_w5_two'=>$this->input->post('weight_container_five_two'),
  //    'weight_of_container_w6_two'=>$this->input->post('weight_container_six_two'),
  //    'weight_of_sample_w1_two'=>$this->input->post('weight_sample_one_three'),
  //    'weight_of_sample_w2_two'=>$this->input->post('weight_sample_two_three'),
  //    'weight_of_sample_w3_two'=>$this->input->post('weight_sample_three_three'),
  //    'weight_of_sample_w4_two'=>$this->input->post('weight_sample_four_three'),
  //    'weight_of_sample_w5_two'=>$this->input->post('weight_sample_five_three'),
  //    'weight_of_sample_w6_two'=>$this->input->post('weight_sample_six_three'),
  //    'mobile_phase_preparation'=>$this->input->post('mobile_phase_preparation'),
  //    'd_one_pkt'=>$this->input->post('d_one_pkt'),
  //    'd_one_wstd'=>$this->input->post('d_one_wstd'),
  //    'd_one_awt'=>$this->input->post('d_one_awt'),
  //    'd_one_df'=>$this->input->post('d_one_df'),
  //    'd_one_potency'=>$this->input->post('d_one_potency'),
  //    'd_one_pkstd'=>$this->input->post('d_one_pkstd'),
  //    'd_one_wt'=>$this->input->post('d_one_wt'),
  //    'd_one_lc'=>$this->input->post('d_one_lc'),
  //    'd_two_pkt'=>$this->input->post('d_two_pkt'),
  //    'd_two_wstd'=>$this->input->post('d_two_wstd'),
  //    'd_two_awt'=>$this->input->post('d_two_awt'),
  //    'd_two_df'=>$this->input->post('d_two_df'),
  //    'd_two_potency'=>$this->input->post('d_two_potency'),
  //    'd_two_pkstd'=>$this->input->post('d_two_pkstd'),
  //    'd_two_wt'=>$this->input->post('d_two_wt'),
  //    'd_two_lc'=>$this->input->post('d_two_lc'),
  //    'd_three_pkt'=>$this->input->post('d_three_pkt'),
  //    'd_three_wstd'=>$this->input->post('d_three_wstd'),
  //    'd_three_awt'=>$this->input->post('d_three_awt'),
  //    'd_three_df'=>$this->input->post('d_three_df'),
  //    'd_three_potency'=>$this->input->post('d_three_potency'),
  //    'd_three_pkstd'=>$this->input->post('d_three_pkstd'),
  //    'd_three_wt'=>$this->input->post('d_three_wt'),
  //    'd_three_lc'=>$this->input->post('d_three_lc'),
  //    'd_four_pkt'=>$this->input->post('d_four_pkt'),
  //    'd_four_wstd'=>$this->input->post('d_four_wstd'),
  //    'd_four_awt'=>$this->input->post('d_four_awt'),
  //    'd_four_df'=>$this->input->post('d_four_df'),
  //    'd_four_potency'=>$this->input->post('d_four_potency'),
  //    'd_four_pkstd'=>$this->input->post('d_four_pkstd'),
  //    'd_four_wt'=>$this->input->post('d_four_wt'),
  //    'd_four_lc'=>$this->input->post('d_four_lc'),
  //    'd_five_pkt'=>$this->input->post('d_five_pkt'),
  //    'd_five_wstd'=>$this->input->post('d_five_wstd'),
  //    'd_five_awt'=>$this->input->post('d_five_awt'),
  //    'd_five_df'=>$this->input->post('d_five_df'),
  //    'd_five_potency'=>$this->input->post('d_five_potency'),
  //    'd_five_pkstd'=>$this->input->post('d_five_pkstd'),
  //    'd_five_wt'=>$this->input->post('d_five_wt'),
  //    'd_five_lc'=>$this->input->post('d_five_lc'),
  //    'd_six_pkt'=>$this->input->post('d_six_pkt'),
  //    'd_six_wstd'=>$this->input->post('d_six_wstd'),
  //    'd_six_awt'=>$this->input->post('d_six_awt'),
  //    'd_six_df'=>$this->input->post('d_six_df'),
  //    'd_six_potency'=>$this->input->post('d_six_potency'),
  //    'd_six_pkstd'=>$this->input->post('d_six_pkstd'),
  //    'd_six_wt'=>$this->input->post('d_six_wt'),
  //    'd_six_lc'=>$this->input->post('d_six_lc'),
  //    'determination_one'=>$this->input->post('d_one_p_lc'),
  //    'determination_two'=>$this->input->post('d_two_p_lc'),
  //    'determination_three'=>$this->input->post('d_three_p_lc'),
  //    'determination_four'=>$this->input->post('d_four_p_lc'),
  //    'determination_five'=>$this->input->post('d_five_p_lc'),
  //    'determination_six'=>$this->input->post('d_six_p_lc'),
  //    'average_determination'=>$this->input->post('average_determination'),
  //    'equivalent_to'=>$this->input->post('equivalent_to_determination'),
  //    'sd_determination'=>$this->input->post('sd_determination'),
  //    'rsd_determination'=>$this->input->post('rsd_determination'),
  //    'content_from'=>$this->input->post('content_from'),
  //    'content_to'=>$this->input->post('content_to'),
  //    'content_results'=>$this->input->post('content_results'),
  //    'content_comment'=>$this->input->post('content_comment'),
  //    'sd_acceptance_criteria'=>$this->input->post('sd_acceptance_criteria'),
  //    'sd_results'=>$this->input->post('sd_results'),
  //    'sd_comment'=>$this->input->post('sd_comment'),
  //    'rsd_acceptance_criteria'=>$this->input->post('rsd_acceptance_criteria'),
  //    'rsd_results'=>$this->input->post('rsd_results'),
  //    'rsd_comment'=>$this->input->post('rsd_comment'),
  //    'conclusion'=>$this->input->post('conclusion'),
  //    'supervisor'=>$this->input->post('supervisor'),
  //    'date'=>$this->input->post('date'),
  //    'further_comments'=>$this->input->post('further_comments'),
  //    'test_status'=>$status
  //   );
  //   $data_two = array(
     
  //    'assignment_id'=>$assignment_id,
  //    'test_request_id'=>$test_request_id,
  //    'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
  //    'name'=>$this->input->post('column_name'),
  //    'length'=>$this->input->post('column_dimensions'),
  //    'lot_serial_number'=>$this->input->post('column_serial_number'),
  //    'manufacturer'=>$this->input->post('column_manufacturer'),
  //    'column_pressure'=>$this->input->post('column_pressure'),
  //    'column_oven_temperature'=>$this->input->post('column_oven_temperature'),
  //    'mobile_phase_flow_rate'=>$this->input->post('column_mp_flow_rate'),
  //    'detection_wavelength'=>$this->input->post('column_detection_wavelength')

  //   );

  //   $data_three = array(

  //    'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
  //    'assignment_id'=>$assignment_id,
  //    'test_request_id'=>$test_request_id,
  //    'retention_time_one'=>$this->input->post('retention_time_one'),
  //    'retention_time_two'=>$this->input->post('retention_time_two'),
  //    'retention_time_three'=>$this->input->post('retention_time_three'),
  //    'retention_time_four'=>$this->input->post('retention_time_four'),
  //    'retention_time_five'=>$this->input->post('retention_time_five'),
  //    'retention_time_six'=>$this->input->post('retention_time_six'),
  //    'peak_area_one'=>$this->input->post('peak_area_one'),
  //    'peak_area_two'=>$this->input->post('peak_area_two'),
  //    'peak_area_three'=>$this->input->post('peak_area_three'),
  //    'peak_area_four'=>$this->input->post('peak_area_four'),
  //    'peak_area_five'=>$this->input->post('peak_area_five'),
  //    'peak_area_six'=>$this->input->post('peak_area_six'),
  //    'asymmetry_one'=>$this->input->post('asymmetry_one'),
  //    'asymmetry_two'=>$this->input->post('asymmetry_two'),
  //    'asymmetry_three'=>$this->input->post('asymmetry_three'),
  //    'asymmetry_four'=>$this->input->post('asymmetry_four'),
  //    'asymmetry_five'=>$this->input->post('asymmetry_five'),
  //    'asymmetry_six'=>$this->input->post('asymmetry_six'),
  //    'resolution_one'=>$this->input->post('resolution_one'),
  //    'resolution_two'=>$this->input->post('resolution_two'),
  //    'resolution_three'=>$this->input->post('resolution_three'),
  //    'resolution_four'=>$this->input->post('resolution_four'),
  //    'resolution_five'=>$this->input->post('resolution_five'),
  //    'resolution_six'=>$this->input->post('resolution_six'),
  //    'relative_retention_time_one'=>$this->input->post('relative_retention_time_one'),
  //    'relative_retention_time_two'=>$this->input->post('relative_retention_time_two'),
  //    'relative_retention_time_three'=>$this->input->post('relative_retention_time_three'),
  //    'relative_retention_time_four'=>$this->input->post('relative_retention_time_four'),
  //    'relative_retention_time_five'=>$this->input->post('relative_retention_time_five'),
  //    'relative_retention_time_six'=>$this->input->post('relative_retention_time_six'),
  //    'average_retention_time'=>$this->input->post('average_retention_time'),
  //    'average_peak_area'=>$this->input->post('average_peak_area'),
  //    'average_asymmetry'=>$this->input->post('average_asymmetry'),
  //    'average_resolution'=>$this->input->post('average_resolution'),
  //    'average_relative_retention_time'=>$this->input->post('average_relative_retention_time'),
  //    'sd_retention_time'=>$this->input->post('standard_dev_retention_time'),
  //    'sd_peak_area'=>$this->input->post('standard_dev_peak_area'),
  //    'sd_asymmetry'=>$this->input->post('standard_dev_asymmetry'),
  //    'sd_resolution'=>$this->input->post('standard_dev_resolution'),
  //    'sd_relative_retention_time'=>$this->input->post('standard_dev_relative_retention_time'),
  //    'rsd_retention_time'=>$this->input->post('rsd_retention_time'),
  //    'rsd_peak_area'=>$this->input->post('rsd_peak_area'),
  //    'rsd_asymmetry'=>$this->input->post('rsd_asymmetry'),
  //    'rsd_resolution'=>$this->input->post('rsd_resolution'),
  //    'rsd_relative_retention_time'=>$this->input->post('rsd_relative_retention_time'),
  //    'comment_retention_time'=>$this->input->post('comment_retention_time'),
  //    'comment_peak_area'=>$this->input->post('comment_peak_area'),
  //    'comment_asymmetry'=>$this->input->post('comment_asymmetry'),
  //    'comment_resolution'=>$this->input->post('comment_resolution'),
  //    'comment_relative_retention_time'=>$this->input->post('comment_relative_retention_time')

  //   );

  //   $data_four = array(
     
  //    'assignment_id'=>$assignment_id,
  //    'test_request_id'=>$test_request_id,
  //    'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
  //    'test'=>$this->input->post('test'),
  //    'chemical_reagent'=>$this->input->post('chemical_reagent'),
  //    'batch_number'=>$this->input->post('reagent_batch_number'),
  //    'manufacturer'=>$this->input->post('reagent_manufacturer'),

  //   );

  //   $data_five = array(
     
  //    'assignment_id'=>$assignment_id,
  //    'test_request_id'=>$test_request_id,
  //    'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
  //    'sd_one'=>$this->input->post('sd_one'),
  //    'sd_two'=>$this->input->post('sd_two'),
  //    'sd_three'=>$this->input->post('sd_three'),
  //    'sd_four'=>$this->input->post('sd_four'),
  //    'sd_five'=>$this->input->post('sd_five'),
  //    'sample_one_one'=>$this->input->post('sample_one_one'),
  //    'sample_one_two'=>$this->input->post('sample_one_two'),
  //    'sample_one_three'=>$this->input->post('sample_one_three'),
  //    'sample_one_four'=>$this->input->post('sample_one_four'),
  //    'sample_one_five'=>$this->input->post('sample_one_five'),
  //    'sample_two_one'=>$this->input->post('sample_two_one'),
  //    'sample_two_two'=>$this->input->post('sample_two_two'),
  //    'sample_two_three'=>$this->input->post('sample_two_three'),
  //    'sample_two_four'=>$this->input->post('sample_two_four'),
  //    'sample_two_five'=>$this->input->post('sample_two_five'),
  //    'sample_three_one'=>$this->input->post('sample_three_one'),
  //    'sample_three_two'=>$this->input->post('sample_three_two'),
  //    'sample_three_three'=>$this->input->post('sample_three_three'),
  //    'sample_three_four'=>$this->input->post('sample_three_four'),
  //    'sample_three_five'=>$this->input->post('sample_three_five'),
  //    'sample_four_one'=>$this->input->post('sample_four_one'),
  //    'sample_four_two'=>$this->input->post('sample_four_two'),
  //    'sample_four_three'=>$this->input->post('sample_four_three'),
  //    'sample_four_four'=>$this->input->post('sample_four_four'),
  //    'sample_four_five'=>$this->input->post('sample_five_five'),
  //    'sample_five_one'=>$this->input->post('sample_five_one'),
  //    'sample_five_two'=>$this->input->post('sample_five_two'),
  //    'sample_five_three'=>$this->input->post('sample_five_three'),
  //    'sample_five_four'=>$this->input->post('sample_five_four'),
  //    'sample_five_five'=>$this->input->post('sample_five_five'),
  //    'sample_six_one'=>$this->input->post('sample_six_one'),
  //    'sample_six_two'=>$this->input->post('sample_six_two'),
  //    'sample_six_three'=>$this->input->post('sample_six_three'),
  //    'sample_six_four'=>$this->input->post('sample_six_four'),
  //    'sample_six_five'=>$this->input->post('sample_six_five'),
  //    'ratio_std_one_one'=>$this->input->post('ratio_std_one_one'),
  //    'ratio_std_one_two'=>$this->input->post('ratio_std_one_two'),
  //    'ratio_std_one_three'=>$this->input->post('ratio_std_one_three'),
  //    'ratio_std_one_four'=>$this->input->post('ratio_std_one_four'),
  //    'ratio_std_one_five'=>$this->input->post('ratio_std_one_five'),
  //    'ratio_std_two_one'=>$this->input->post('ratio_std_two_one'),
  //    'ratio_std_two_two'=>$this->input->post('ratio_std_two_two'),
  //    'ratio_std_two_three'=>$this->input->post('ratio_std_two_three'),
  //    'ratio_std_two_four'=>$this->input->post('ratio_std_two_four'),
  //    'ratio_std_two_five'=>$this->input->post('ratio_std_two_five'),
  //    'ratio_std_three_one'=>$this->input->post('ratio_std_three_one'),
  //    'ratio_std_three_two'=>$this->input->post('ratio_std_three_two'),
  //    'ratio_std_three_three'=>$this->input->post('ratio_std_three_three'),
  //    'ratio_std_three_four'=>$this->input->post('ratio_std_three_four'),
  //    'ratio_std_three_five'=>$this->input->post('ratio_std_three_five'),
  //    'ratio_std_four_one'=>$this->input->post('ratio_std_four_one'),
  //    'ratio_std_four_two'=>$this->input->post('ratio_std_four_two'),
  //    'ratio_std_four_three'=>$this->input->post('ratio_std_four_three'),
  //    'ratio_std_four_four'=>$this->input->post('ratio_std_four_four'),
  //    'ratio_std_four_five'=>$this->input->post('ratio_std_four_five'),
  //    'ratio_std_five_one'=>$this->input->post('ratio_std_five_one'),
  //    'ratio_std_five_two'=>$this->input->post('ratio_std_five_two'),
  //    'ratio_std_five_three'=>$this->input->post('ratio_std_five_three'),
  //    'ratio_std_five_four'=>$this->input->post('ratio_std_five_four'),
  //    'ratio_std_five_five'=>$this->input->post('ratio_std_five_five'),
  //    'ratio_std_six_one'=>$this->input->post('ratio_std_six_one'),
  //    'ratio_std_six_two'=>$this->input->post('ratio_std_six_two'),
  //    'ratio_std_six_three'=>$this->input->post('ratio_std_six_three'),
  //    'ratio_std_six_four'=>$this->input->post('ratio_std_six_four'),
  //    'ratio_std_six_five'=>$this->input->post('ratio_std_six_five'),
  //    'ratio_std_seven_one'=>$this->input->post('ratio_std_seven_one'),
  //    'ratio_std_seven_two'=>$this->input->post('ratio_std_seven_two'),
  //    'ratio_std_seven_three'=>$this->input->post('ratio_std_seven_three'),
  //    'ratio_std_seven_four'=>$this->input->post('ratio_std_seven_four'),
  //    'ratio_std_seven_five'=>$this->input->post('ratio_std_seven_five'),
  //    'internal_std_one_one'=>$this->input->post('internal_std_one_one'),
  //    'internal_std_one_two'=>$this->input->post('internal_std_one_two'),
  //    'internal_std_one_three'=>$this->input->post('internal_std_one_three'),
  //    'internal_std_one_four'=>$this->input->post('internal_std_one_four'),
  //    'internal_std_one_five'=>$this->input->post('internal_std_one_five'),
  //    'internal_std_two_one'=>$this->input->post('internal_std_two_one'),
  //    'internal_std_two_two'=>$this->input->post('internal_std_two_two'),
  //    'internal_std_two_three'=>$this->input->post('internal_std_two_three'),
  //    'internal_std_two_four'=>$this->input->post('internal_std_two_four'),
  //    'internal_std_two_five'=>$this->input->post('internal_std_two_five'),
  //    'internal_std_three_one'=>$this->input->post('internal_std_three_one'),
  //    'internal_std_three_two'=>$this->input->post('internal_std_three_two'),
  //    'internal_std_three_three'=>$this->input->post('internal_std_three_three'),
  //    'internal_std_three_four'=>$this->input->post('internal_std_three_four'),
  //    'internal_std_three_five'=>$this->input->post('internal_std_three_five'),
  //    'internal_std_four_one'=>$this->input->post('internal_std_four_one'),
  //    'internal_std_four_two'=>$this->input->post('internal_std_four_two'),
  //    'internal_std_four_three'=>$this->input->post('internal_std_four_three'),
  //    'internal_std_four_four'=>$this->input->post('internal_std_four_four'),
  //    'internal_std_four_five'=>$this->input->post('internal_std_four_five'),
  //    'internal_std_five_one'=>$this->input->post('internal_std_five_one'),
  //    'internal_std_five_two'=>$this->input->post('internal_std_five_two'),
  //    'internal_std_five_three'=>$this->input->post('internal_std_five_three'),
  //    'internal_std_five_four'=>$this->input->post('internal_std_five_four'),
  //    'internal_std_five_five'=>$this->input->post('internal_std_five_five'),
  //    'internal_std_six_one'=>$this->input->post('internal_std_six_one'),
  //    'internal_std_six_two'=>$this->input->post('internal_std_six_two'),
  //    'internal_std_six_three'=>$this->input->post('internal_std_six_three'),
  //    'internal_std_six_four'=>$this->input->post('internal_std_six_four'),
  //    'internal_std_six_five'=>$this->input->post('internal_std_six_five'),
  //    'internal_std_seven_one'=>$this->input->post('internal_std_seven_one'),
  //    'internal_std_seven_two'=>$this->input->post('internal_std_seven_two'),
  //    'internal_std_seven_three'=>$this->input->post('internal_std_seven_three'),
  //    'internal_std_seven_four'=>$this->input->post('internal_std_seven_four'),
  //    'internal_std_seven_five'=>$this->input->post('internal_std_seven_five'),
  //    'average_std'=>$this->input->post('average_std'),
  //    'average_sample_one'=>$this->input->post('average_sample_one'),
  //    'average_sample_two'=>$this->input->post('average_sample_two'),
  //    'average_sample_three'=>$this->input->post('average_sample_three'),
  //    'average_sample_four'=>$this->input->post('average_sample_four'),
  //    'average_sample_five'=>$this->input->post('average_sample_five'),
  //    'average_sample_six'=>$this->input->post('average_sample_six'),
  //    'ratio_std_one_average'=>$this->input->post('ratio_std_one_average'),
  //    'ratio_std_two_average'=>$this->input->post('ratio_std_two_average'),
  //    'ratio_std_three_average'=>$this->input->post('ratio_std_three_average'),
  //    'ratio_std_four_average'=>$this->input->post('ratio_std_four_average'),
  //    'ratio_std_five_average'=>$this->input->post('ratio_std_five_average'),
  //    'ratio_std_six_average'=>$this->input->post('ratio_std_six_average'),
  //    'ratio_std_seven_average'=>$this->input->post('ratio_std_seven_average'),
  //    'internal_std_one_average'=>$this->input->post('internal_std_one_average'),
  //    'internal_std_two_average'=>$this->input->post('internal_std_two_average'),
  //    'internal_std_three_average'=>$this->input->post('internal_std_three_average'),
  //    'internal_std_four_average'=>$this->input->post('internal_std_four_average'),
  //    'internal_std_five_average'=>$this->input->post('internal_std_five_average'),
  //    'internal_std_six_average'=>$this->input->post('internal_std_six_average'),
  //    'internal_std_seven_average'=>$this->input->post('internal_std_seven_average')
     

  //   );

  //   $data_six = array(
     
  //    'assignment_id'=>$assignment_id,
  //    'test_request_id'=>$test_request_id,
  //    'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
  //    'requirement'=>$this->input->post(''),
  //    'comment'=>$this->input->post('')

  //   );

  //    $data_seven = array(
     
  //    'assignment_id'=>$assignment_id,
  //    'test_request_id'=>$test_request_id,
  //    'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
  //    'method'=>$this->input->post('method'),
  //    'specification'=>$this->input->post('specification'),
  //    'conclusion'=>$this->input->post('conclusion'),
  //    'supervisor'=>$this->input->post('supervisor'),
  //    'date_tested'=>$this->input->post('date'),
  //    'further_comments'=>$this->input->post('further_comments')

  //   );

  //   $this->db->insert('coa',$data_seven);
  //   $this->db->insert('assay_hplc_internal_method_chromatography_checklist',$data_six);
  //   $this->db->insert('assay_hplc_internal_method_peak_area_chromatograms',$data_five);
  //   $this->db->insert('assay_hplc_internal_method_reagents',$data_four);
  //   $this->db->insert('assay_hplc_internal_method_chromatograms',$data_three);
  //   $this->db->insert('assay_hplc_internal_method_chromatographic_conditions',$data_two);
  //   $this->db->insert('assay_hplc_internal_method', $data);
  //   redirect('test/index/'.$assignment_id.'/'.$test_request_id.'/'.$test_type_id);
  // }
   function process_area_method_injection_powder_single_component(){

      $assignment_id=$this->input->post('assignment_id');
      $test_request_id=$this->input->post('tr_id');
      $test_type_id=$this->input->post('test_type_id');
      $status=1;
      $area_method_single_component='6b';

      $data=$this->db->select_max('id')->get('assay_hplc_area_method_single_component')->result();
      $assay_hplc_area_method_single_component_id=$data[0]->id;
      $assay_hplc_area_method_single_component_id++;
      

  //test data Insertion
    $data = array(
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,    
     'serial_number'=>$this->input->post('serial_number'),
     'analysis_date'=>$this->input->post('analysis_date'),
     'balance_make'=>$this->input->post('equipmentbalance'),
     'balance_id'=>$this->input->post('balance_id'),
     'weight_of_sample_container_w1'=>$this->input->post('weight_sample_container_one'),
     'weight_of_sample_container_w2'=>$this->input->post('weight_sample_container_two'),
     'weight_of_sample_container_w3'=>$this->input->post('weight_sample_container_three'),
     'weight_of_sample_container_w4'=>$this->input->post('weight_sample_container_four'),
     'weight_of_sample_container_w5'=>$this->input->post('weight_sample_container_five'),
     'weight_of_sample_container_w6'=>$this->input->post('weight_sample_container_six'), 
     'weight_of_container_w1'=>$this->input->post('weight_container_one'),
     'weight_of_container_w2'=>$this->input->post('weight_container_two'),
     'weight_of_container_w3'=>$this->input->post('weight_container_three'),
     'weight_of_container_w4'=>$this->input->post('weight_container_four'),
     'weight_of_container_w5'=>$this->input->post('weight_container_five'),
     'weight_of_container_w6'=>$this->input->post('weight_container_six'),
     'weight_of_sample_w1'=>$this->input->post('weight_sample_one'),
     'weight_of_sample_w2'=>$this->input->post('weight_sample_two'),
     'weight_of_sample_w3'=>$this->input->post('weight_sample_three'),
     'weight_of_sample_w4'=>$this->input->post('weight_sample_four'),
     'weight_of_sample_w5'=>$this->input->post('weight_sample_five'),
     'weight_of_sample_w6'=>$this->input->post('weight_sample_six'),
     'dilution_one'=>$this->input->post('dilution_one'),
     'weight_of_standard_preparation'=>$this->input->post('weight_of_standard_preparation'),
     'standard_description_one'=>$this->input->post('standard_description_one'),
     'standard_description_two'=>$this->input->post('standard_description_two'),
     'potency_one'=>$this->input->post('potency_one'),
     'potency_two'=>$this->input->post('potency_two'),
     'weight_standard_container_std_one'=>$this->input->post('weight_standard_container_of_std_one'),
     'weight_standard_container_std_two'=>$this->input->post('weight_standard_container_of_std_two'),
     'weight_container_of_std_one'=>$this->input->post('weight_container_of_std_one'),
     'weight_container_of_std_two'=>$this->input->post('weight_container_of_std_two'),
     'weight_of_standard_one'=>$this->input->post('weight_of_standard_one'),
     'weight_of_standard_two'=>$this->input->post('weight_of_standard_two'),
     'dilution_standard_one'=>$this->input->post('dilution_standard_one'),
     'dilution_standard_two'=>$this->input->post('dilution_standard_two'),
     'equipment_make'=>$this->input->post('equipmentmake'),
     'equipment_id'=>$this->input->post('make_id'),
     'weight_of_sample_container_w1_two'=>$this->input->post('weight_sample_container_one_one'),
     'weight_of_sample_container_w2_two'=>$this->input->post('weight_sample_container_two_one'),
     'weight_of_sample_container_w3_two'=>$this->input->post('weight_sample_container_three_one'),
     'weight_of_sample_container_w4_two'=>$this->input->post('weight_sample_container_four_one'),
     'weight_of_sample_container_w5_two'=>$this->input->post('weight_sample_container_five_one'),
     'weight_of_sample_container_w6_two'=>$this->input->post('weight_sample_container_six_one'),
     'weight_of_container_w1_two'=>$this->input->post('weight_container_one_two'),
     'weight_of_container_w2_two'=>$this->input->post('weight_container_two_two'),
     'weight_of_container_w3_two'=>$this->input->post('weight_container_three_two'),
     'weight_of_container_w4_two'=>$this->input->post('weight_container_four_two'),
     'weight_of_container_w5_two'=>$this->input->post('weight_container_five_two'),
     'weight_of_container_w6_two'=>$this->input->post('weight_container_six_two'),
     'weight_of_sample_w1_two'=>$this->input->post('weight_sample_one_three'),
     'weight_of_sample_w2_two'=>$this->input->post('weight_sample_two_three'),
     'weight_of_sample_w3_two'=>$this->input->post('weight_sample_three_three'),
     'weight_of_sample_w4_two'=>$this->input->post('weight_sample_four_three'),
     'weight_of_sample_w5_two'=>$this->input->post('weight_sample_five_three'),
     'weight_of_sample_w6_two'=>$this->input->post('weight_sample_six_three'),
     'mobile_phase_preparation'=>$this->input->post('mobile_phase_preparation'),
     'd_one_pkt'=>$this->input->post('d_one_pkt'),
     'd_one_wstd'=>$this->input->post('d_one_wstd'),
     'd_one_awt'=>$this->input->post('d_one_awt'),
     'd_one_df'=>$this->input->post('d_one_df'),
     'd_one_potency'=>$this->input->post('d_one_potency'),
     'd_one_pkstd'=>$this->input->post('d_one_pkstd'),
     'd_one_wt'=>$this->input->post('d_one_wt'),
     'd_one_lc'=>$this->input->post('d_one_lc'),
     'd_two_pkt'=>$this->input->post('d_two_pkt'),
     'd_two_wstd'=>$this->input->post('d_two_wstd'),
     'd_two_awt'=>$this->input->post('d_two_awt'),
     'd_two_df'=>$this->input->post('d_two_df'),
     'd_two_potency'=>$this->input->post('d_two_potency'),
     'd_two_pkstd'=>$this->input->post('d_two_pkstd'),
     'd_two_wt'=>$this->input->post('d_two_wt'),
     'd_two_lc'=>$this->input->post('d_two_lc'),
     'd_three_pkt'=>$this->input->post('d_three_pkt'),
     'd_three_wstd'=>$this->input->post('d_three_wstd'),
     'd_three_awt'=>$this->input->post('d_three_awt'),
     'd_three_df'=>$this->input->post('d_three_df'),
     'd_three_potency'=>$this->input->post('d_three_potency'),
     'd_three_pkstd'=>$this->input->post('d_three_pkstd'),
     'd_three_wt'=>$this->input->post('d_three_wt'),
     'd_three_lc'=>$this->input->post('d_three_lc'),
     'd_four_pkt'=>$this->input->post('d_four_pkt'),
     'd_four_wstd'=>$this->input->post('d_four_wstd'),
     'd_four_awt'=>$this->input->post('d_four_awt'),
     'd_four_df'=>$this->input->post('d_four_df'),
     'd_four_potency'=>$this->input->post('d_four_potency'),
     'd_four_pkstd'=>$this->input->post('d_four_pkstd'),
     'd_four_wt'=>$this->input->post('d_four_wt'),
     'd_four_lc'=>$this->input->post('d_four_lc'),
     'd_five_pkt'=>$this->input->post('d_five_pkt'),
     'd_five_wstd'=>$this->input->post('d_five_wstd'),
     'd_five_awt'=>$this->input->post('d_five_awt'),
     'd_five_df'=>$this->input->post('d_five_df'),
     'd_five_potency'=>$this->input->post('d_five_potency'),
     'd_five_pkstd'=>$this->input->post('d_five_pkstd'),
     'd_five_wt'=>$this->input->post('d_five_wt'),
     'd_five_lc'=>$this->input->post('d_five_lc'),
     'd_six_pkt'=>$this->input->post('d_six_pkt'),
     'd_six_wstd'=>$this->input->post('d_six_wstd'),
     'd_six_awt'=>$this->input->post('d_six_awt'),
     'd_six_df'=>$this->input->post('d_six_df'),
     'd_six_potency'=>$this->input->post('d_six_potency'),
     'd_six_pkstd'=>$this->input->post('d_six_pkstd'),
     'd_six_wt'=>$this->input->post('d_six_wt'),
     'd_six_lc'=>$this->input->post('d_six_lc'),
     'determination_one'=>$this->input->post('d_one_p_lc'),
     'determination_two'=>$this->input->post('d_two_p_lc'),
     'determination_three'=>$this->input->post('d_three_p_lc'),
     'determination_four'=>$this->input->post('d_four_p_lc'),
     'determination_five'=>$this->input->post('d_five_p_lc'),
     'determination_six'=>$this->input->post('d_six_p_lc'),
     'average_determination'=>$this->input->post('average_determination'),
     'equivalent_to'=>$this->input->post('equivalent_to_determination'),
     'sd_determination'=>$this->input->post('sd_determination'),
     'rsd_determination'=>$this->input->post('rsd_determination'),
     'content_from'=>$this->input->post('content_from'),
     'content_to'=>$this->input->post('content_to'),
     'content_results'=>$this->input->post('content_results'),
     'content_comment'=>$this->input->post('content_comment'),
     'sd_acceptance_criteria'=>$this->input->post('sd_acceptance_criteria'),
     'sd_results'=>$this->input->post('sd_results'),
     'sd_comment'=>$this->input->post('sd_comment'),
     'rsd_acceptance_criteria'=>$this->input->post('rsd_acceptance_criteria'),
     'rsd_results'=>$this->input->post('rsd_results'),
     'rsd_comment'=>$this->input->post('rsd_comment'),
     'conclusion'=>$this->input->post('conclusion'),
     'supervisor'=>$this->input->post('supervisor'),
     'date'=>$this->input->post('date'),
     'further_comments'=>$this->input->post('further_comments'),
     'test_status'=>$status
    );
    $data_two = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'name'=>$this->input->post('column_name'),
     'length'=>$this->input->post('column_dimensions'),
     'lot_serial_number'=>$this->input->post('column_serial_number'),
     'manufacturer'=>$this->input->post('column_manufacturer'),
     'column_pressure'=>$this->input->post('column_pressure'),
     'column_oven_temperature'=>$this->input->post('column_oven_temperature'),
     'mobile_phase_flow_rate'=>$this->input->post('column_mp_flow_rate'),
     'detection_wavelength'=>$this->input->post('column_detection_wavelength')

    );

    $data_three = array(

     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'retention_time_one'=>$this->input->post('retention_time_one'),
     'retention_time_two'=>$this->input->post('retention_time_two'),
     'retention_time_three'=>$this->input->post('retention_time_three'),
     'retention_time_four'=>$this->input->post('retention_time_four'),
     'retention_time_five'=>$this->input->post('retention_time_five'),
     'retention_time_six'=>$this->input->post('retention_time_six'),
     'peak_area_one'=>$this->input->post('peak_area_one'),
     'peak_area_two'=>$this->input->post('peak_area_two'),
     'peak_area_three'=>$this->input->post('peak_area_three'),
     'peak_area_four'=>$this->input->post('peak_area_four'),
     'peak_area_five'=>$this->input->post('peak_area_five'),
     'peak_area_six'=>$this->input->post('peak_area_six'),
     'asymmetry_one'=>$this->input->post('asymmetry_one'),
     'asymmetry_two'=>$this->input->post('asymmetry_two'),
     'asymmetry_three'=>$this->input->post('asymmetry_three'),
     'asymmetry_four'=>$this->input->post('asymmetry_four'),
     'asymmetry_five'=>$this->input->post('asymmetry_five'),
     'asymmetry_six'=>$this->input->post('asymmetry_six'),
     'resolution_one'=>$this->input->post('resolution_one'),
     'resolution_two'=>$this->input->post('resolution_two'),
     'resolution_three'=>$this->input->post('resolution_three'),
     'resolution_four'=>$this->input->post('resolution_four'),
     'resolution_five'=>$this->input->post('resolution_five'),
     'resolution_six'=>$this->input->post('resolution_six'),
     'relative_retention_time_one'=>$this->input->post('relative_retention_time_one'),
     'relative_retention_time_two'=>$this->input->post('relative_retention_time_two'),
     'relative_retention_time_three'=>$this->input->post('relative_retention_time_three'),
     'relative_retention_time_four'=>$this->input->post('relative_retention_time_four'),
     'relative_retention_time_five'=>$this->input->post('relative_retention_time_five'),
     'relative_retention_time_six'=>$this->input->post('relative_retention_time_six'),
     'average_retention_time'=>$this->input->post('average_retention_time'),
     'average_peak_area'=>$this->input->post('average_peak_area'),
     'average_asymmetry'=>$this->input->post('average_asymmetry'),
     'average_resolution'=>$this->input->post('average_resolution'),
     'average_relative_retention_time'=>$this->input->post('average_relative_retention_time'),
     'sd_retention_time'=>$this->input->post('standard_dev_retention_time'),
     'sd_peak_area'=>$this->input->post('standard_dev_peak_area'),
     'sd_asymmetry'=>$this->input->post('standard_dev_asymmetry'),
     'sd_resolution'=>$this->input->post('standard_dev_resolution'),
     'sd_relative_retention_time'=>$this->input->post('standard_dev_relative_retention_time'),
     'rsd_retention_time'=>$this->input->post('rsd_retention_time'),
     'rsd_peak_area'=>$this->input->post('rsd_peak_area'),
     'rsd_asymmetry'=>$this->input->post('rsd_asymmetry'),
     'rsd_resolution'=>$this->input->post('rsd_resolution'),
     'rsd_relative_retention_time'=>$this->input->post('rsd_relative_retention_time'),
     'comment_retention_time'=>$this->input->post('comment_retention_time'),
     'comment_peak_area'=>$this->input->post('comment_peak_area'),
     'comment_asymmetry'=>$this->input->post('comment_asymmetry'),
     'comment_resolution'=>$this->input->post('comment_resolution'),
     'comment_relative_retention_time'=>$this->input->post('comment_relative_retention_time')

    );

    $data_four = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'test'=>$this->input->post('test'),
     'chemical_reagent'=>$this->input->post('chemical_reagent'),
     'batch_number'=>$this->input->post('reagent_batch_number'),
     'manufacturer'=>$this->input->post('reagent_manufacturer'),

    );

    $data_five = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'sd_one'=>$this->input->post('sd_one'),
     'sd_two'=>$this->input->post('sd_two'),
     'sd_three'=>$this->input->post('sd_three'),
     'sd_four'=>$this->input->post('sd_four'),
     'sd_five'=>$this->input->post('sd_five'),
     'sample_one_one'=>$this->input->post('sample_one_one'),
     'sample_one_two'=>$this->input->post('sample_one_two'),
     'sample_one_three'=>$this->input->post('sample_one_three'),
     'sample_one_four'=>$this->input->post('sample_one_four'),
     'sample_one_five'=>$this->input->post('sample_one_five'),
     'sample_two_one'=>$this->input->post('sample_two_one'),
     'sample_two_two'=>$this->input->post('sample_two_two'),
     'sample_two_three'=>$this->input->post('sample_two_three'),
     'sample_two_four'=>$this->input->post('sample_two_four'),
     'sample_two_five'=>$this->input->post('sample_two_five'),
     'sample_three_one'=>$this->input->post('sample_three_one'),
     'sample_three_two'=>$this->input->post('sample_three_two'),
     'sample_three_three'=>$this->input->post('sample_three_three'),
     'sample_three_four'=>$this->input->post('sample_three_four'),
     'sample_three_five'=>$this->input->post('sample_three_five'),
     'sample_four_one'=>$this->input->post('sample_four_one'),
     'sample_four_two'=>$this->input->post('sample_four_two'),
     'sample_four_three'=>$this->input->post('sample_four_three'),
     'sample_four_four'=>$this->input->post('sample_four_four'),
     'sample_four_five'=>$this->input->post('sample_five_five'),
     'sample_five_one'=>$this->input->post('sample_five_one'),
     'sample_five_two'=>$this->input->post('sample_five_two'),
     'sample_five_three'=>$this->input->post('sample_five_three'),
     'sample_five_four'=>$this->input->post('sample_five_four'),
     'sample_five_five'=>$this->input->post('sample_five_five'),
     'sample_six_one'=>$this->input->post('sample_six_one'),
     'sample_six_two'=>$this->input->post('sample_six_two'),
     'sample_six_three'=>$this->input->post('sample_six_three'),
     'sample_six_four'=>$this->input->post('sample_six_four'),
     'sample_six_five'=>$this->input->post('sample_six_five'),
     'ratio_std_one_one'=>$this->input->post('ratio_std_one_one'),
     'ratio_std_one_two'=>$this->input->post('ratio_std_one_two'),
     'ratio_std_one_three'=>$this->input->post('ratio_std_one_three'),
     'ratio_std_one_four'=>$this->input->post('ratio_std_one_four'),
     'ratio_std_one_five'=>$this->input->post('ratio_std_one_five'),
     'ratio_std_two_one'=>$this->input->post('ratio_std_two_one'),
     'ratio_std_two_two'=>$this->input->post('ratio_std_two_two'),
     'ratio_std_two_three'=>$this->input->post('ratio_std_two_three'),
     'ratio_std_two_four'=>$this->input->post('ratio_std_two_four'),
     'ratio_std_two_five'=>$this->input->post('ratio_std_two_five'),
     'ratio_std_three_one'=>$this->input->post('ratio_std_three_one'),
     'ratio_std_three_two'=>$this->input->post('ratio_std_three_two'),
     'ratio_std_three_three'=>$this->input->post('ratio_std_three_three'),
     'ratio_std_three_four'=>$this->input->post('ratio_std_three_four'),
     'ratio_std_three_five'=>$this->input->post('ratio_std_three_five'),
     'ratio_std_four_one'=>$this->input->post('ratio_std_four_one'),
     'ratio_std_four_two'=>$this->input->post('ratio_std_four_two'),
     'ratio_std_four_three'=>$this->input->post('ratio_std_four_three'),
     'ratio_std_four_four'=>$this->input->post('ratio_std_four_four'),
     'ratio_std_four_five'=>$this->input->post('ratio_std_four_five'),
     'ratio_std_five_one'=>$this->input->post('ratio_std_five_one'),
     'ratio_std_five_two'=>$this->input->post('ratio_std_five_two'),
     'ratio_std_five_three'=>$this->input->post('ratio_std_five_three'),
     'ratio_std_five_four'=>$this->input->post('ratio_std_five_four'),
     'ratio_std_five_five'=>$this->input->post('ratio_std_five_five'),
     'ratio_std_six_one'=>$this->input->post('ratio_std_six_one'),
     'ratio_std_six_two'=>$this->input->post('ratio_std_six_two'),
     'ratio_std_six_three'=>$this->input->post('ratio_std_six_three'),
     'ratio_std_six_four'=>$this->input->post('ratio_std_six_four'),
     'ratio_std_six_five'=>$this->input->post('ratio_std_six_five'),
     'ratio_std_seven_one'=>$this->input->post('ratio_std_seven_one'),
     'ratio_std_seven_two'=>$this->input->post('ratio_std_seven_two'),
     'ratio_std_seven_three'=>$this->input->post('ratio_std_seven_three'),
     'ratio_std_seven_four'=>$this->input->post('ratio_std_seven_four'),
     'ratio_std_seven_five'=>$this->input->post('ratio_std_seven_five'),
     'internal_std_one_one'=>$this->input->post('internal_std_one_one'),
     'internal_std_one_two'=>$this->input->post('internal_std_one_two'),
     'internal_std_one_three'=>$this->input->post('internal_std_one_three'),
     'internal_std_one_four'=>$this->input->post('internal_std_one_four'),
     'internal_std_one_five'=>$this->input->post('internal_std_one_five'),
     'internal_std_two_one'=>$this->input->post('internal_std_two_one'),
     'internal_std_two_two'=>$this->input->post('internal_std_two_two'),
     'internal_std_two_three'=>$this->input->post('internal_std_two_three'),
     'internal_std_two_four'=>$this->input->post('internal_std_two_four'),
     'internal_std_two_five'=>$this->input->post('internal_std_two_five'),
     'internal_std_three_one'=>$this->input->post('internal_std_three_one'),
     'internal_std_three_two'=>$this->input->post('internal_std_three_two'),
     'internal_std_three_three'=>$this->input->post('internal_std_three_three'),
     'internal_std_three_four'=>$this->input->post('internal_std_three_four'),
     'internal_std_three_five'=>$this->input->post('internal_std_three_five'),
     'internal_std_four_one'=>$this->input->post('internal_std_four_one'),
     'internal_std_four_two'=>$this->input->post('internal_std_four_two'),
     'internal_std_four_three'=>$this->input->post('internal_std_four_three'),
     'internal_std_four_four'=>$this->input->post('internal_std_four_four'),
     'internal_std_four_five'=>$this->input->post('internal_std_four_five'),
     'internal_std_five_one'=>$this->input->post('internal_std_five_one'),
     'internal_std_five_two'=>$this->input->post('internal_std_five_two'),
     'internal_std_five_three'=>$this->input->post('internal_std_five_three'),
     'internal_std_five_four'=>$this->input->post('internal_std_five_four'),
     'internal_std_five_five'=>$this->input->post('internal_std_five_five'),
     'internal_std_six_one'=>$this->input->post('internal_std_six_one'),
     'internal_std_six_two'=>$this->input->post('internal_std_six_two'),
     'internal_std_six_three'=>$this->input->post('internal_std_six_three'),
     'internal_std_six_four'=>$this->input->post('internal_std_six_four'),
     'internal_std_six_five'=>$this->input->post('internal_std_six_five'),
     'internal_std_seven_one'=>$this->input->post('internal_std_seven_one'),
     'internal_std_seven_two'=>$this->input->post('internal_std_seven_two'),
     'internal_std_seven_three'=>$this->input->post('internal_std_seven_three'),
     'internal_std_seven_four'=>$this->input->post('internal_std_seven_four'),
     'internal_std_seven_five'=>$this->input->post('internal_std_seven_five'),
     'average_std'=>$this->input->post('average_std'),
     'average_sample_one'=>$this->input->post('average_sample_one'),
     'average_sample_two'=>$this->input->post('average_sample_two'),
     'average_sample_three'=>$this->input->post('average_sample_three'),
     'average_sample_four'=>$this->input->post('average_sample_four'),
     'average_sample_five'=>$this->input->post('average_sample_five'),
     'average_sample_six'=>$this->input->post('average_sample_six'),
     'ratio_std_one_average'=>$this->input->post('ratio_std_one_average'),
     'ratio_std_two_average'=>$this->input->post('ratio_std_two_average'),
     'ratio_std_three_average'=>$this->input->post('ratio_std_three_average'),
     'ratio_std_four_average'=>$this->input->post('ratio_std_four_average'),
     'ratio_std_five_average'=>$this->input->post('ratio_std_five_average'),
     'ratio_std_six_average'=>$this->input->post('ratio_std_six_average'),
     'ratio_std_seven_average'=>$this->input->post('ratio_std_seven_average'),
     'internal_std_one_average'=>$this->input->post('internal_std_one_average'),
     'internal_std_two_average'=>$this->input->post('internal_std_two_average'),
     'internal_std_three_average'=>$this->input->post('internal_std_three_average'),
     'internal_std_four_average'=>$this->input->post('internal_std_four_average'),
     'internal_std_five_average'=>$this->input->post('internal_std_five_average'),
     'internal_std_six_average'=>$this->input->post('internal_std_six_average'),
     'internal_std_seven_average'=>$this->input->post('internal_std_seven_average')
     

    );

    $data_six = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'requirement'=>$this->input->post(''),
     'comment'=>$this->input->post('')

    );

     $data_seven = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'method'=>$this->input->post('method'),
     'specification'=>$this->input->post('specification'),
     'conclusion'=>$this->input->post('conclusion'),
     'supervisor'=>$this->input->post('supervisor'),
     'date_tested'=>$this->input->post('date'),
     'further_comments'=>$this->input->post('further_comments')

    );

    $this->db->insert('coa',$data_seven);
    $this->db->insert('assay_hplc_internal_method_chromatography_checklist',$data_six);
    $this->db->insert('assay_hplc_internal_method_peak_area_chromatograms',$data_five);
    $this->db->insert('assay_hplc_internal_method_reagents',$data_four);
    $this->db->insert('assay_hplc_internal_method_chromatograms',$data_three);
    $this->db->insert('assay_hplc_internal_method_chromatographic_conditions',$data_two);
    $this->db->insert('assay_hplc_internal_method', $data);
    redirect('test/index/'.$assignment_id.'/'.$test_request_id.'/'.$test_type_id);
  }
   function process_area_method_injection_powder_two_components(){

      $assignment_id=$this->input->post('assignment_id');
      $test_request_id=$this->input->post('tr_id');
      $test_type_id=$this->input->post('test_type_id');
      $status=1;
      $area_method_single_component='6b';

      $data=$this->db->select_max('id')->get('assay_hplc_area_method_single_component')->result();
      $assay_hplc_area_method_single_component_id=$data[0]->id;
      $assay_hplc_area_method_single_component_id++;
      

  //test data Insertion
    $data = array(
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,    
     'serial_number'=>$this->input->post('serial_number'),
     'analysis_date'=>$this->input->post('analysis_date'),
     'balance_make'=>$this->input->post('equipmentbalance'),
     'balance_id'=>$this->input->post('balance_id'),
     'weight_of_sample_container_w1'=>$this->input->post('weight_sample_container_one'),
     'weight_of_sample_container_w2'=>$this->input->post('weight_sample_container_two'),
     'weight_of_sample_container_w3'=>$this->input->post('weight_sample_container_three'),
     'weight_of_sample_container_w4'=>$this->input->post('weight_sample_container_four'),
     'weight_of_sample_container_w5'=>$this->input->post('weight_sample_container_five'),
     'weight_of_sample_container_w6'=>$this->input->post('weight_sample_container_six'), 
     'weight_of_container_w1'=>$this->input->post('weight_container_one'),
     'weight_of_container_w2'=>$this->input->post('weight_container_two'),
     'weight_of_container_w3'=>$this->input->post('weight_container_three'),
     'weight_of_container_w4'=>$this->input->post('weight_container_four'),
     'weight_of_container_w5'=>$this->input->post('weight_container_five'),
     'weight_of_container_w6'=>$this->input->post('weight_container_six'),
     'weight_of_sample_w1'=>$this->input->post('weight_sample_one'),
     'weight_of_sample_w2'=>$this->input->post('weight_sample_two'),
     'weight_of_sample_w3'=>$this->input->post('weight_sample_three'),
     'weight_of_sample_w4'=>$this->input->post('weight_sample_four'),
     'weight_of_sample_w5'=>$this->input->post('weight_sample_five'),
     'weight_of_sample_w6'=>$this->input->post('weight_sample_six'),
     'dilution_one'=>$this->input->post('dilution_one'),
     'weight_of_standard_preparation'=>$this->input->post('weight_of_standard_preparation'),
     'standard_description_one'=>$this->input->post('standard_description_one'),
     'standard_description_two'=>$this->input->post('standard_description_two'),
     'potency_one'=>$this->input->post('potency_one'),
     'potency_two'=>$this->input->post('potency_two'),
     'weight_standard_container_std_one'=>$this->input->post('weight_standard_container_of_std_one'),
     'weight_standard_container_std_two'=>$this->input->post('weight_standard_container_of_std_two'),
     'weight_container_of_std_one'=>$this->input->post('weight_container_of_std_one'),
     'weight_container_of_std_two'=>$this->input->post('weight_container_of_std_two'),
     'weight_of_standard_one'=>$this->input->post('weight_of_standard_one'),
     'weight_of_standard_two'=>$this->input->post('weight_of_standard_two'),
     'dilution_standard_one'=>$this->input->post('dilution_standard_one'),
     'dilution_standard_two'=>$this->input->post('dilution_standard_two'),
     'equipment_make'=>$this->input->post('equipmentmake'),
     'equipment_id'=>$this->input->post('make_id'),
     'weight_of_sample_container_w1_two'=>$this->input->post('weight_sample_container_one_one'),
     'weight_of_sample_container_w2_two'=>$this->input->post('weight_sample_container_two_one'),
     'weight_of_sample_container_w3_two'=>$this->input->post('weight_sample_container_three_one'),
     'weight_of_sample_container_w4_two'=>$this->input->post('weight_sample_container_four_one'),
     'weight_of_sample_container_w5_two'=>$this->input->post('weight_sample_container_five_one'),
     'weight_of_sample_container_w6_two'=>$this->input->post('weight_sample_container_six_one'),
     'weight_of_container_w1_two'=>$this->input->post('weight_container_one_two'),
     'weight_of_container_w2_two'=>$this->input->post('weight_container_two_two'),
     'weight_of_container_w3_two'=>$this->input->post('weight_container_three_two'),
     'weight_of_container_w4_two'=>$this->input->post('weight_container_four_two'),
     'weight_of_container_w5_two'=>$this->input->post('weight_container_five_two'),
     'weight_of_container_w6_two'=>$this->input->post('weight_container_six_two'),
     'weight_of_sample_w1_two'=>$this->input->post('weight_sample_one_three'),
     'weight_of_sample_w2_two'=>$this->input->post('weight_sample_two_three'),
     'weight_of_sample_w3_two'=>$this->input->post('weight_sample_three_three'),
     'weight_of_sample_w4_two'=>$this->input->post('weight_sample_four_three'),
     'weight_of_sample_w5_two'=>$this->input->post('weight_sample_five_three'),
     'weight_of_sample_w6_two'=>$this->input->post('weight_sample_six_three'),
     'mobile_phase_preparation'=>$this->input->post('mobile_phase_preparation'),
     'd_one_pkt'=>$this->input->post('d_one_pkt'),
     'd_one_wstd'=>$this->input->post('d_one_wstd'),
     'd_one_awt'=>$this->input->post('d_one_awt'),
     'd_one_df'=>$this->input->post('d_one_df'),
     'd_one_potency'=>$this->input->post('d_one_potency'),
     'd_one_pkstd'=>$this->input->post('d_one_pkstd'),
     'd_one_wt'=>$this->input->post('d_one_wt'),
     'd_one_lc'=>$this->input->post('d_one_lc'),
     'd_two_pkt'=>$this->input->post('d_two_pkt'),
     'd_two_wstd'=>$this->input->post('d_two_wstd'),
     'd_two_awt'=>$this->input->post('d_two_awt'),
     'd_two_df'=>$this->input->post('d_two_df'),
     'd_two_potency'=>$this->input->post('d_two_potency'),
     'd_two_pkstd'=>$this->input->post('d_two_pkstd'),
     'd_two_wt'=>$this->input->post('d_two_wt'),
     'd_two_lc'=>$this->input->post('d_two_lc'),
     'd_three_pkt'=>$this->input->post('d_three_pkt'),
     'd_three_wstd'=>$this->input->post('d_three_wstd'),
     'd_three_awt'=>$this->input->post('d_three_awt'),
     'd_three_df'=>$this->input->post('d_three_df'),
     'd_three_potency'=>$this->input->post('d_three_potency'),
     'd_three_pkstd'=>$this->input->post('d_three_pkstd'),
     'd_three_wt'=>$this->input->post('d_three_wt'),
     'd_three_lc'=>$this->input->post('d_three_lc'),
     'd_four_pkt'=>$this->input->post('d_four_pkt'),
     'd_four_wstd'=>$this->input->post('d_four_wstd'),
     'd_four_awt'=>$this->input->post('d_four_awt'),
     'd_four_df'=>$this->input->post('d_four_df'),
     'd_four_potency'=>$this->input->post('d_four_potency'),
     'd_four_pkstd'=>$this->input->post('d_four_pkstd'),
     'd_four_wt'=>$this->input->post('d_four_wt'),
     'd_four_lc'=>$this->input->post('d_four_lc'),
     'd_five_pkt'=>$this->input->post('d_five_pkt'),
     'd_five_wstd'=>$this->input->post('d_five_wstd'),
     'd_five_awt'=>$this->input->post('d_five_awt'),
     'd_five_df'=>$this->input->post('d_five_df'),
     'd_five_potency'=>$this->input->post('d_five_potency'),
     'd_five_pkstd'=>$this->input->post('d_five_pkstd'),
     'd_five_wt'=>$this->input->post('d_five_wt'),
     'd_five_lc'=>$this->input->post('d_five_lc'),
     'd_six_pkt'=>$this->input->post('d_six_pkt'),
     'd_six_wstd'=>$this->input->post('d_six_wstd'),
     'd_six_awt'=>$this->input->post('d_six_awt'),
     'd_six_df'=>$this->input->post('d_six_df'),
     'd_six_potency'=>$this->input->post('d_six_potency'),
     'd_six_pkstd'=>$this->input->post('d_six_pkstd'),
     'd_six_wt'=>$this->input->post('d_six_wt'),
     'd_six_lc'=>$this->input->post('d_six_lc'),
     'determination_one'=>$this->input->post('d_one_p_lc'),
     'determination_two'=>$this->input->post('d_two_p_lc'),
     'determination_three'=>$this->input->post('d_three_p_lc'),
     'determination_four'=>$this->input->post('d_four_p_lc'),
     'determination_five'=>$this->input->post('d_five_p_lc'),
     'determination_six'=>$this->input->post('d_six_p_lc'),
     'average_determination'=>$this->input->post('average_determination'),
     'equivalent_to'=>$this->input->post('equivalent_to_determination'),
     'sd_determination'=>$this->input->post('sd_determination'),
     'rsd_determination'=>$this->input->post('rsd_determination'),
     'content_from'=>$this->input->post('content_from'),
     'content_to'=>$this->input->post('content_to'),
     'content_results'=>$this->input->post('content_results'),
     'content_comment'=>$this->input->post('content_comment'),
     'sd_acceptance_criteria'=>$this->input->post('sd_acceptance_criteria'),
     'sd_results'=>$this->input->post('sd_results'),
     'sd_comment'=>$this->input->post('sd_comment'),
     'rsd_acceptance_criteria'=>$this->input->post('rsd_acceptance_criteria'),
     'rsd_results'=>$this->input->post('rsd_results'),
     'rsd_comment'=>$this->input->post('rsd_comment'),
     'conclusion'=>$this->input->post('conclusion'),
     'supervisor'=>$this->input->post('supervisor'),
     'date'=>$this->input->post('date'),
     'further_comments'=>$this->input->post('further_comments'),
     'test_status'=>$status
    );
    $data_two = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'name'=>$this->input->post('column_name'),
     'length'=>$this->input->post('column_dimensions'),
     'lot_serial_number'=>$this->input->post('column_serial_number'),
     'manufacturer'=>$this->input->post('column_manufacturer'),
     'column_pressure'=>$this->input->post('column_pressure'),
     'column_oven_temperature'=>$this->input->post('column_oven_temperature'),
     'mobile_phase_flow_rate'=>$this->input->post('column_mp_flow_rate'),
     'detection_wavelength'=>$this->input->post('column_detection_wavelength')

    );

    $data_three = array(

     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'retention_time_one'=>$this->input->post('retention_time_one'),
     'retention_time_two'=>$this->input->post('retention_time_two'),
     'retention_time_three'=>$this->input->post('retention_time_three'),
     'retention_time_four'=>$this->input->post('retention_time_four'),
     'retention_time_five'=>$this->input->post('retention_time_five'),
     'retention_time_six'=>$this->input->post('retention_time_six'),
     'peak_area_one'=>$this->input->post('peak_area_one'),
     'peak_area_two'=>$this->input->post('peak_area_two'),
     'peak_area_three'=>$this->input->post('peak_area_three'),
     'peak_area_four'=>$this->input->post('peak_area_four'),
     'peak_area_five'=>$this->input->post('peak_area_five'),
     'peak_area_six'=>$this->input->post('peak_area_six'),
     'asymmetry_one'=>$this->input->post('asymmetry_one'),
     'asymmetry_two'=>$this->input->post('asymmetry_two'),
     'asymmetry_three'=>$this->input->post('asymmetry_three'),
     'asymmetry_four'=>$this->input->post('asymmetry_four'),
     'asymmetry_five'=>$this->input->post('asymmetry_five'),
     'asymmetry_six'=>$this->input->post('asymmetry_six'),
     'resolution_one'=>$this->input->post('resolution_one'),
     'resolution_two'=>$this->input->post('resolution_two'),
     'resolution_three'=>$this->input->post('resolution_three'),
     'resolution_four'=>$this->input->post('resolution_four'),
     'resolution_five'=>$this->input->post('resolution_five'),
     'resolution_six'=>$this->input->post('resolution_six'),
     'relative_retention_time_one'=>$this->input->post('relative_retention_time_one'),
     'relative_retention_time_two'=>$this->input->post('relative_retention_time_two'),
     'relative_retention_time_three'=>$this->input->post('relative_retention_time_three'),
     'relative_retention_time_four'=>$this->input->post('relative_retention_time_four'),
     'relative_retention_time_five'=>$this->input->post('relative_retention_time_five'),
     'relative_retention_time_six'=>$this->input->post('relative_retention_time_six'),
     'average_retention_time'=>$this->input->post('average_retention_time'),
     'average_peak_area'=>$this->input->post('average_peak_area'),
     'average_asymmetry'=>$this->input->post('average_asymmetry'),
     'average_resolution'=>$this->input->post('average_resolution'),
     'average_relative_retention_time'=>$this->input->post('average_relative_retention_time'),
     'sd_retention_time'=>$this->input->post('standard_dev_retention_time'),
     'sd_peak_area'=>$this->input->post('standard_dev_peak_area'),
     'sd_asymmetry'=>$this->input->post('standard_dev_asymmetry'),
     'sd_resolution'=>$this->input->post('standard_dev_resolution'),
     'sd_relative_retention_time'=>$this->input->post('standard_dev_relative_retention_time'),
     'rsd_retention_time'=>$this->input->post('rsd_retention_time'),
     'rsd_peak_area'=>$this->input->post('rsd_peak_area'),
     'rsd_asymmetry'=>$this->input->post('rsd_asymmetry'),
     'rsd_resolution'=>$this->input->post('rsd_resolution'),
     'rsd_relative_retention_time'=>$this->input->post('rsd_relative_retention_time'),
     'comment_retention_time'=>$this->input->post('comment_retention_time'),
     'comment_peak_area'=>$this->input->post('comment_peak_area'),
     'comment_asymmetry'=>$this->input->post('comment_asymmetry'),
     'comment_resolution'=>$this->input->post('comment_resolution'),
     'comment_relative_retention_time'=>$this->input->post('comment_relative_retention_time')

    );

    $data_four = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'test'=>$this->input->post('test'),
     'chemical_reagent'=>$this->input->post('chemical_reagent'),
     'batch_number'=>$this->input->post('reagent_batch_number'),
     'manufacturer'=>$this->input->post('reagent_manufacturer'),

    );

    $data_five = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'sd_one'=>$this->input->post('sd_one'),
     'sd_two'=>$this->input->post('sd_two'),
     'sd_three'=>$this->input->post('sd_three'),
     'sd_four'=>$this->input->post('sd_four'),
     'sd_five'=>$this->input->post('sd_five'),
     'sample_one_one'=>$this->input->post('sample_one_one'),
     'sample_one_two'=>$this->input->post('sample_one_two'),
     'sample_one_three'=>$this->input->post('sample_one_three'),
     'sample_one_four'=>$this->input->post('sample_one_four'),
     'sample_one_five'=>$this->input->post('sample_one_five'),
     'sample_two_one'=>$this->input->post('sample_two_one'),
     'sample_two_two'=>$this->input->post('sample_two_two'),
     'sample_two_three'=>$this->input->post('sample_two_three'),
     'sample_two_four'=>$this->input->post('sample_two_four'),
     'sample_two_five'=>$this->input->post('sample_two_five'),
     'sample_three_one'=>$this->input->post('sample_three_one'),
     'sample_three_two'=>$this->input->post('sample_three_two'),
     'sample_three_three'=>$this->input->post('sample_three_three'),
     'sample_three_four'=>$this->input->post('sample_three_four'),
     'sample_three_five'=>$this->input->post('sample_three_five'),
     'sample_four_one'=>$this->input->post('sample_four_one'),
     'sample_four_two'=>$this->input->post('sample_four_two'),
     'sample_four_three'=>$this->input->post('sample_four_three'),
     'sample_four_four'=>$this->input->post('sample_four_four'),
     'sample_four_five'=>$this->input->post('sample_five_five'),
     'sample_five_one'=>$this->input->post('sample_five_one'),
     'sample_five_two'=>$this->input->post('sample_five_two'),
     'sample_five_three'=>$this->input->post('sample_five_three'),
     'sample_five_four'=>$this->input->post('sample_five_four'),
     'sample_five_five'=>$this->input->post('sample_five_five'),
     'sample_six_one'=>$this->input->post('sample_six_one'),
     'sample_six_two'=>$this->input->post('sample_six_two'),
     'sample_six_three'=>$this->input->post('sample_six_three'),
     'sample_six_four'=>$this->input->post('sample_six_four'),
     'sample_six_five'=>$this->input->post('sample_six_five'),
     'ratio_std_one_one'=>$this->input->post('ratio_std_one_one'),
     'ratio_std_one_two'=>$this->input->post('ratio_std_one_two'),
     'ratio_std_one_three'=>$this->input->post('ratio_std_one_three'),
     'ratio_std_one_four'=>$this->input->post('ratio_std_one_four'),
     'ratio_std_one_five'=>$this->input->post('ratio_std_one_five'),
     'ratio_std_two_one'=>$this->input->post('ratio_std_two_one'),
     'ratio_std_two_two'=>$this->input->post('ratio_std_two_two'),
     'ratio_std_two_three'=>$this->input->post('ratio_std_two_three'),
     'ratio_std_two_four'=>$this->input->post('ratio_std_two_four'),
     'ratio_std_two_five'=>$this->input->post('ratio_std_two_five'),
     'ratio_std_three_one'=>$this->input->post('ratio_std_three_one'),
     'ratio_std_three_two'=>$this->input->post('ratio_std_three_two'),
     'ratio_std_three_three'=>$this->input->post('ratio_std_three_three'),
     'ratio_std_three_four'=>$this->input->post('ratio_std_three_four'),
     'ratio_std_three_five'=>$this->input->post('ratio_std_three_five'),
     'ratio_std_four_one'=>$this->input->post('ratio_std_four_one'),
     'ratio_std_four_two'=>$this->input->post('ratio_std_four_two'),
     'ratio_std_four_three'=>$this->input->post('ratio_std_four_three'),
     'ratio_std_four_four'=>$this->input->post('ratio_std_four_four'),
     'ratio_std_four_five'=>$this->input->post('ratio_std_four_five'),
     'ratio_std_five_one'=>$this->input->post('ratio_std_five_one'),
     'ratio_std_five_two'=>$this->input->post('ratio_std_five_two'),
     'ratio_std_five_three'=>$this->input->post('ratio_std_five_three'),
     'ratio_std_five_four'=>$this->input->post('ratio_std_five_four'),
     'ratio_std_five_five'=>$this->input->post('ratio_std_five_five'),
     'ratio_std_six_one'=>$this->input->post('ratio_std_six_one'),
     'ratio_std_six_two'=>$this->input->post('ratio_std_six_two'),
     'ratio_std_six_three'=>$this->input->post('ratio_std_six_three'),
     'ratio_std_six_four'=>$this->input->post('ratio_std_six_four'),
     'ratio_std_six_five'=>$this->input->post('ratio_std_six_five'),
     'ratio_std_seven_one'=>$this->input->post('ratio_std_seven_one'),
     'ratio_std_seven_two'=>$this->input->post('ratio_std_seven_two'),
     'ratio_std_seven_three'=>$this->input->post('ratio_std_seven_three'),
     'ratio_std_seven_four'=>$this->input->post('ratio_std_seven_four'),
     'ratio_std_seven_five'=>$this->input->post('ratio_std_seven_five'),
     'internal_std_one_one'=>$this->input->post('internal_std_one_one'),
     'internal_std_one_two'=>$this->input->post('internal_std_one_two'),
     'internal_std_one_three'=>$this->input->post('internal_std_one_three'),
     'internal_std_one_four'=>$this->input->post('internal_std_one_four'),
     'internal_std_one_five'=>$this->input->post('internal_std_one_five'),
     'internal_std_two_one'=>$this->input->post('internal_std_two_one'),
     'internal_std_two_two'=>$this->input->post('internal_std_two_two'),
     'internal_std_two_three'=>$this->input->post('internal_std_two_three'),
     'internal_std_two_four'=>$this->input->post('internal_std_two_four'),
     'internal_std_two_five'=>$this->input->post('internal_std_two_five'),
     'internal_std_three_one'=>$this->input->post('internal_std_three_one'),
     'internal_std_three_two'=>$this->input->post('internal_std_three_two'),
     'internal_std_three_three'=>$this->input->post('internal_std_three_three'),
     'internal_std_three_four'=>$this->input->post('internal_std_three_four'),
     'internal_std_three_five'=>$this->input->post('internal_std_three_five'),
     'internal_std_four_one'=>$this->input->post('internal_std_four_one'),
     'internal_std_four_two'=>$this->input->post('internal_std_four_two'),
     'internal_std_four_three'=>$this->input->post('internal_std_four_three'),
     'internal_std_four_four'=>$this->input->post('internal_std_four_four'),
     'internal_std_four_five'=>$this->input->post('internal_std_four_five'),
     'internal_std_five_one'=>$this->input->post('internal_std_five_one'),
     'internal_std_five_two'=>$this->input->post('internal_std_five_two'),
     'internal_std_five_three'=>$this->input->post('internal_std_five_three'),
     'internal_std_five_four'=>$this->input->post('internal_std_five_four'),
     'internal_std_five_five'=>$this->input->post('internal_std_five_five'),
     'internal_std_six_one'=>$this->input->post('internal_std_six_one'),
     'internal_std_six_two'=>$this->input->post('internal_std_six_two'),
     'internal_std_six_three'=>$this->input->post('internal_std_six_three'),
     'internal_std_six_four'=>$this->input->post('internal_std_six_four'),
     'internal_std_six_five'=>$this->input->post('internal_std_six_five'),
     'internal_std_seven_one'=>$this->input->post('internal_std_seven_one'),
     'internal_std_seven_two'=>$this->input->post('internal_std_seven_two'),
     'internal_std_seven_three'=>$this->input->post('internal_std_seven_three'),
     'internal_std_seven_four'=>$this->input->post('internal_std_seven_four'),
     'internal_std_seven_five'=>$this->input->post('internal_std_seven_five'),
     'average_std'=>$this->input->post('average_std'),
     'average_sample_one'=>$this->input->post('average_sample_one'),
     'average_sample_two'=>$this->input->post('average_sample_two'),
     'average_sample_three'=>$this->input->post('average_sample_three'),
     'average_sample_four'=>$this->input->post('average_sample_four'),
     'average_sample_five'=>$this->input->post('average_sample_five'),
     'average_sample_six'=>$this->input->post('average_sample_six'),
     'ratio_std_one_average'=>$this->input->post('ratio_std_one_average'),
     'ratio_std_two_average'=>$this->input->post('ratio_std_two_average'),
     'ratio_std_three_average'=>$this->input->post('ratio_std_three_average'),
     'ratio_std_four_average'=>$this->input->post('ratio_std_four_average'),
     'ratio_std_five_average'=>$this->input->post('ratio_std_five_average'),
     'ratio_std_six_average'=>$this->input->post('ratio_std_six_average'),
     'ratio_std_seven_average'=>$this->input->post('ratio_std_seven_average'),
     'internal_std_one_average'=>$this->input->post('internal_std_one_average'),
     'internal_std_two_average'=>$this->input->post('internal_std_two_average'),
     'internal_std_three_average'=>$this->input->post('internal_std_three_average'),
     'internal_std_four_average'=>$this->input->post('internal_std_four_average'),
     'internal_std_five_average'=>$this->input->post('internal_std_five_average'),
     'internal_std_six_average'=>$this->input->post('internal_std_six_average'),
     'internal_std_seven_average'=>$this->input->post('internal_std_seven_average')
     

    );

    $data_six = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'requirement'=>$this->input->post(''),
     'comment'=>$this->input->post('')

    );

     $data_seven = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'method'=>$this->input->post('method'),
     'specification'=>$this->input->post('specification'),
     'conclusion'=>$this->input->post('conclusion'),
     'supervisor'=>$this->input->post('supervisor'),
     'date_tested'=>$this->input->post('date'),
     'further_comments'=>$this->input->post('further_comments')

    );

    $this->db->insert('coa',$data_seven);
    $this->db->insert('assay_hplc_internal_method_chromatography_checklist',$data_six);
    $this->db->insert('assay_hplc_internal_method_peak_area_chromatograms',$data_five);
    $this->db->insert('assay_hplc_internal_method_reagents',$data_four);
    $this->db->insert('assay_hplc_internal_method_chromatograms',$data_three);
    $this->db->insert('assay_hplc_internal_method_chromatographic_conditions',$data_two);
    $this->db->insert('assay_hplc_internal_method', $data);
    redirect('test/index/'.$assignment_id.'/'.$test_request_id.'/'.$test_type_id);
  }
   function titration(){

      $assignment_id=$this->input->post('assignment_id');
      $test_request_id=$this->input->post('tr_id');
      $test_type_id=$this->input->post('test_type_id');
      $status=1;
      $area_method_single_component='6b';

      $data=$this->db->select_max('id')->get('assay_hplc_area_method_single_component')->result();
      $assay_hplc_area_method_single_component_id=$data[0]->id;
      $assay_hplc_area_method_single_component_id++;
      

  //test data Insertion
    $data = array(
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,    
     'serial_number'=>$this->input->post('serial_number'),
     'analysis_date'=>$this->input->post('analysis_date'),
     'balance_make'=>$this->input->post('equipmentbalance'),
     'balance_id'=>$this->input->post('balance_id'),
     'weight_of_sample_container_w1'=>$this->input->post('weight_sample_container_one'),
     'weight_of_sample_container_w2'=>$this->input->post('weight_sample_container_two'),
     'weight_of_sample_container_w3'=>$this->input->post('weight_sample_container_three'),
     'weight_of_sample_container_w4'=>$this->input->post('weight_sample_container_four'),
     'weight_of_sample_container_w5'=>$this->input->post('weight_sample_container_five'),
     'weight_of_sample_container_w6'=>$this->input->post('weight_sample_container_six'), 
     'weight_of_container_w1'=>$this->input->post('weight_container_one'),
     'weight_of_container_w2'=>$this->input->post('weight_container_two'),
     'weight_of_container_w3'=>$this->input->post('weight_container_three'),
     'weight_of_container_w4'=>$this->input->post('weight_container_four'),
     'weight_of_container_w5'=>$this->input->post('weight_container_five'),
     'weight_of_container_w6'=>$this->input->post('weight_container_six'),
     'weight_of_sample_w1'=>$this->input->post('weight_sample_one'),
     'weight_of_sample_w2'=>$this->input->post('weight_sample_two'),
     'weight_of_sample_w3'=>$this->input->post('weight_sample_three'),
     'weight_of_sample_w4'=>$this->input->post('weight_sample_four'),
     'weight_of_sample_w5'=>$this->input->post('weight_sample_five'),
     'weight_of_sample_w6'=>$this->input->post('weight_sample_six'),
     'dilution_one'=>$this->input->post('dilution_one'),
     'weight_of_standard_preparation'=>$this->input->post('weight_of_standard_preparation'),
     'standard_description_one'=>$this->input->post('standard_description_one'),
     'standard_description_two'=>$this->input->post('standard_description_two'),
     'potency_one'=>$this->input->post('potency_one'),
     'potency_two'=>$this->input->post('potency_two'),
     'weight_standard_container_std_one'=>$this->input->post('weight_standard_container_of_std_one'),
     'weight_standard_container_std_two'=>$this->input->post('weight_standard_container_of_std_two'),
     'weight_container_of_std_one'=>$this->input->post('weight_container_of_std_one'),
     'weight_container_of_std_two'=>$this->input->post('weight_container_of_std_two'),
     'weight_of_standard_one'=>$this->input->post('weight_of_standard_one'),
     'weight_of_standard_two'=>$this->input->post('weight_of_standard_two'),
     'dilution_standard_one'=>$this->input->post('dilution_standard_one'),
     'dilution_standard_two'=>$this->input->post('dilution_standard_two'),
     'equipment_make'=>$this->input->post('equipmentmake'),
     'equipment_id'=>$this->input->post('make_id'),
     'weight_of_sample_container_w1_two'=>$this->input->post('weight_sample_container_one_one'),
     'weight_of_sample_container_w2_two'=>$this->input->post('weight_sample_container_two_one'),
     'weight_of_sample_container_w3_two'=>$this->input->post('weight_sample_container_three_one'),
     'weight_of_sample_container_w4_two'=>$this->input->post('weight_sample_container_four_one'),
     'weight_of_sample_container_w5_two'=>$this->input->post('weight_sample_container_five_one'),
     'weight_of_sample_container_w6_two'=>$this->input->post('weight_sample_container_six_one'),
     'weight_of_container_w1_two'=>$this->input->post('weight_container_one_two'),
     'weight_of_container_w2_two'=>$this->input->post('weight_container_two_two'),
     'weight_of_container_w3_two'=>$this->input->post('weight_container_three_two'),
     'weight_of_container_w4_two'=>$this->input->post('weight_container_four_two'),
     'weight_of_container_w5_two'=>$this->input->post('weight_container_five_two'),
     'weight_of_container_w6_two'=>$this->input->post('weight_container_six_two'),
     'weight_of_sample_w1_two'=>$this->input->post('weight_sample_one_three'),
     'weight_of_sample_w2_two'=>$this->input->post('weight_sample_two_three'),
     'weight_of_sample_w3_two'=>$this->input->post('weight_sample_three_three'),
     'weight_of_sample_w4_two'=>$this->input->post('weight_sample_four_three'),
     'weight_of_sample_w5_two'=>$this->input->post('weight_sample_five_three'),
     'weight_of_sample_w6_two'=>$this->input->post('weight_sample_six_three'),
     'mobile_phase_preparation'=>$this->input->post('mobile_phase_preparation'),
     'd_one_pkt'=>$this->input->post('d_one_pkt'),
     'd_one_wstd'=>$this->input->post('d_one_wstd'),
     'd_one_awt'=>$this->input->post('d_one_awt'),
     'd_one_df'=>$this->input->post('d_one_df'),
     'd_one_potency'=>$this->input->post('d_one_potency'),
     'd_one_pkstd'=>$this->input->post('d_one_pkstd'),
     'd_one_wt'=>$this->input->post('d_one_wt'),
     'd_one_lc'=>$this->input->post('d_one_lc'),
     'd_two_pkt'=>$this->input->post('d_two_pkt'),
     'd_two_wstd'=>$this->input->post('d_two_wstd'),
     'd_two_awt'=>$this->input->post('d_two_awt'),
     'd_two_df'=>$this->input->post('d_two_df'),
     'd_two_potency'=>$this->input->post('d_two_potency'),
     'd_two_pkstd'=>$this->input->post('d_two_pkstd'),
     'd_two_wt'=>$this->input->post('d_two_wt'),
     'd_two_lc'=>$this->input->post('d_two_lc'),
     'd_three_pkt'=>$this->input->post('d_three_pkt'),
     'd_three_wstd'=>$this->input->post('d_three_wstd'),
     'd_three_awt'=>$this->input->post('d_three_awt'),
     'd_three_df'=>$this->input->post('d_three_df'),
     'd_three_potency'=>$this->input->post('d_three_potency'),
     'd_three_pkstd'=>$this->input->post('d_three_pkstd'),
     'd_three_wt'=>$this->input->post('d_three_wt'),
     'd_three_lc'=>$this->input->post('d_three_lc'),
     'd_four_pkt'=>$this->input->post('d_four_pkt'),
     'd_four_wstd'=>$this->input->post('d_four_wstd'),
     'd_four_awt'=>$this->input->post('d_four_awt'),
     'd_four_df'=>$this->input->post('d_four_df'),
     'd_four_potency'=>$this->input->post('d_four_potency'),
     'd_four_pkstd'=>$this->input->post('d_four_pkstd'),
     'd_four_wt'=>$this->input->post('d_four_wt'),
     'd_four_lc'=>$this->input->post('d_four_lc'),
     'd_five_pkt'=>$this->input->post('d_five_pkt'),
     'd_five_wstd'=>$this->input->post('d_five_wstd'),
     'd_five_awt'=>$this->input->post('d_five_awt'),
     'd_five_df'=>$this->input->post('d_five_df'),
     'd_five_potency'=>$this->input->post('d_five_potency'),
     'd_five_pkstd'=>$this->input->post('d_five_pkstd'),
     'd_five_wt'=>$this->input->post('d_five_wt'),
     'd_five_lc'=>$this->input->post('d_five_lc'),
     'd_six_pkt'=>$this->input->post('d_six_pkt'),
     'd_six_wstd'=>$this->input->post('d_six_wstd'),
     'd_six_awt'=>$this->input->post('d_six_awt'),
     'd_six_df'=>$this->input->post('d_six_df'),
     'd_six_potency'=>$this->input->post('d_six_potency'),
     'd_six_pkstd'=>$this->input->post('d_six_pkstd'),
     'd_six_wt'=>$this->input->post('d_six_wt'),
     'd_six_lc'=>$this->input->post('d_six_lc'),
     'determination_one'=>$this->input->post('d_one_p_lc'),
     'determination_two'=>$this->input->post('d_two_p_lc'),
     'determination_three'=>$this->input->post('d_three_p_lc'),
     'determination_four'=>$this->input->post('d_four_p_lc'),
     'determination_five'=>$this->input->post('d_five_p_lc'),
     'determination_six'=>$this->input->post('d_six_p_lc'),
     'average_determination'=>$this->input->post('average_determination'),
     'equivalent_to'=>$this->input->post('equivalent_to_determination'),
     'sd_determination'=>$this->input->post('sd_determination'),
     'rsd_determination'=>$this->input->post('rsd_determination'),
     'content_from'=>$this->input->post('content_from'),
     'content_to'=>$this->input->post('content_to'),
     'content_results'=>$this->input->post('content_results'),
     'content_comment'=>$this->input->post('content_comment'),
     'sd_acceptance_criteria'=>$this->input->post('sd_acceptance_criteria'),
     'sd_results'=>$this->input->post('sd_results'),
     'sd_comment'=>$this->input->post('sd_comment'),
     'rsd_acceptance_criteria'=>$this->input->post('rsd_acceptance_criteria'),
     'rsd_results'=>$this->input->post('rsd_results'),
     'rsd_comment'=>$this->input->post('rsd_comment'),
     'conclusion'=>$this->input->post('conclusion'),
     'supervisor'=>$this->input->post('supervisor'),
     'date'=>$this->input->post('date'),
     'further_comments'=>$this->input->post('further_comments'),
     'test_status'=>$status
    );
    $data_two = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'name'=>$this->input->post('column_name'),
     'length'=>$this->input->post('column_dimensions'),
     'lot_serial_number'=>$this->input->post('column_serial_number'),
     'manufacturer'=>$this->input->post('column_manufacturer'),
     'column_pressure'=>$this->input->post('column_pressure'),
     'column_oven_temperature'=>$this->input->post('column_oven_temperature'),
     'mobile_phase_flow_rate'=>$this->input->post('column_mp_flow_rate'),
     'detection_wavelength'=>$this->input->post('column_detection_wavelength')

    );

    $data_three = array(

     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'retention_time_one'=>$this->input->post('retention_time_one'),
     'retention_time_two'=>$this->input->post('retention_time_two'),
     'retention_time_three'=>$this->input->post('retention_time_three'),
     'retention_time_four'=>$this->input->post('retention_time_four'),
     'retention_time_five'=>$this->input->post('retention_time_five'),
     'retention_time_six'=>$this->input->post('retention_time_six'),
     'peak_area_one'=>$this->input->post('peak_area_one'),
     'peak_area_two'=>$this->input->post('peak_area_two'),
     'peak_area_three'=>$this->input->post('peak_area_three'),
     'peak_area_four'=>$this->input->post('peak_area_four'),
     'peak_area_five'=>$this->input->post('peak_area_five'),
     'peak_area_six'=>$this->input->post('peak_area_six'),
     'asymmetry_one'=>$this->input->post('asymmetry_one'),
     'asymmetry_two'=>$this->input->post('asymmetry_two'),
     'asymmetry_three'=>$this->input->post('asymmetry_three'),
     'asymmetry_four'=>$this->input->post('asymmetry_four'),
     'asymmetry_five'=>$this->input->post('asymmetry_five'),
     'asymmetry_six'=>$this->input->post('asymmetry_six'),
     'resolution_one'=>$this->input->post('resolution_one'),
     'resolution_two'=>$this->input->post('resolution_two'),
     'resolution_three'=>$this->input->post('resolution_three'),
     'resolution_four'=>$this->input->post('resolution_four'),
     'resolution_five'=>$this->input->post('resolution_five'),
     'resolution_six'=>$this->input->post('resolution_six'),
     'relative_retention_time_one'=>$this->input->post('relative_retention_time_one'),
     'relative_retention_time_two'=>$this->input->post('relative_retention_time_two'),
     'relative_retention_time_three'=>$this->input->post('relative_retention_time_three'),
     'relative_retention_time_four'=>$this->input->post('relative_retention_time_four'),
     'relative_retention_time_five'=>$this->input->post('relative_retention_time_five'),
     'relative_retention_time_six'=>$this->input->post('relative_retention_time_six'),
     'average_retention_time'=>$this->input->post('average_retention_time'),
     'average_peak_area'=>$this->input->post('average_peak_area'),
     'average_asymmetry'=>$this->input->post('average_asymmetry'),
     'average_resolution'=>$this->input->post('average_resolution'),
     'average_relative_retention_time'=>$this->input->post('average_relative_retention_time'),
     'sd_retention_time'=>$this->input->post('standard_dev_retention_time'),
     'sd_peak_area'=>$this->input->post('standard_dev_peak_area'),
     'sd_asymmetry'=>$this->input->post('standard_dev_asymmetry'),
     'sd_resolution'=>$this->input->post('standard_dev_resolution'),
     'sd_relative_retention_time'=>$this->input->post('standard_dev_relative_retention_time'),
     'rsd_retention_time'=>$this->input->post('rsd_retention_time'),
     'rsd_peak_area'=>$this->input->post('rsd_peak_area'),
     'rsd_asymmetry'=>$this->input->post('rsd_asymmetry'),
     'rsd_resolution'=>$this->input->post('rsd_resolution'),
     'rsd_relative_retention_time'=>$this->input->post('rsd_relative_retention_time'),
     'comment_retention_time'=>$this->input->post('comment_retention_time'),
     'comment_peak_area'=>$this->input->post('comment_peak_area'),
     'comment_asymmetry'=>$this->input->post('comment_asymmetry'),
     'comment_resolution'=>$this->input->post('comment_resolution'),
     'comment_relative_retention_time'=>$this->input->post('comment_relative_retention_time')

    );

    $data_four = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'test'=>$this->input->post('test'),
     'chemical_reagent'=>$this->input->post('chemical_reagent'),
     'batch_number'=>$this->input->post('reagent_batch_number'),
     'manufacturer'=>$this->input->post('reagent_manufacturer'),

    );

    $data_five = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'sd_one'=>$this->input->post('sd_one'),
     'sd_two'=>$this->input->post('sd_two'),
     'sd_three'=>$this->input->post('sd_three'),
     'sd_four'=>$this->input->post('sd_four'),
     'sd_five'=>$this->input->post('sd_five'),
     'sample_one_one'=>$this->input->post('sample_one_one'),
     'sample_one_two'=>$this->input->post('sample_one_two'),
     'sample_one_three'=>$this->input->post('sample_one_three'),
     'sample_one_four'=>$this->input->post('sample_one_four'),
     'sample_one_five'=>$this->input->post('sample_one_five'),
     'sample_two_one'=>$this->input->post('sample_two_one'),
     'sample_two_two'=>$this->input->post('sample_two_two'),
     'sample_two_three'=>$this->input->post('sample_two_three'),
     'sample_two_four'=>$this->input->post('sample_two_four'),
     'sample_two_five'=>$this->input->post('sample_two_five'),
     'sample_three_one'=>$this->input->post('sample_three_one'),
     'sample_three_two'=>$this->input->post('sample_three_two'),
     'sample_three_three'=>$this->input->post('sample_three_three'),
     'sample_three_four'=>$this->input->post('sample_three_four'),
     'sample_three_five'=>$this->input->post('sample_three_five'),
     'sample_four_one'=>$this->input->post('sample_four_one'),
     'sample_four_two'=>$this->input->post('sample_four_two'),
     'sample_four_three'=>$this->input->post('sample_four_three'),
     'sample_four_four'=>$this->input->post('sample_four_four'),
     'sample_four_five'=>$this->input->post('sample_five_five'),
     'sample_five_one'=>$this->input->post('sample_five_one'),
     'sample_five_two'=>$this->input->post('sample_five_two'),
     'sample_five_three'=>$this->input->post('sample_five_three'),
     'sample_five_four'=>$this->input->post('sample_five_four'),
     'sample_five_five'=>$this->input->post('sample_five_five'),
     'sample_six_one'=>$this->input->post('sample_six_one'),
     'sample_six_two'=>$this->input->post('sample_six_two'),
     'sample_six_three'=>$this->input->post('sample_six_three'),
     'sample_six_four'=>$this->input->post('sample_six_four'),
     'sample_six_five'=>$this->input->post('sample_six_five'),
     'ratio_std_one_one'=>$this->input->post('ratio_std_one_one'),
     'ratio_std_one_two'=>$this->input->post('ratio_std_one_two'),
     'ratio_std_one_three'=>$this->input->post('ratio_std_one_three'),
     'ratio_std_one_four'=>$this->input->post('ratio_std_one_four'),
     'ratio_std_one_five'=>$this->input->post('ratio_std_one_five'),
     'ratio_std_two_one'=>$this->input->post('ratio_std_two_one'),
     'ratio_std_two_two'=>$this->input->post('ratio_std_two_two'),
     'ratio_std_two_three'=>$this->input->post('ratio_std_two_three'),
     'ratio_std_two_four'=>$this->input->post('ratio_std_two_four'),
     'ratio_std_two_five'=>$this->input->post('ratio_std_two_five'),
     'ratio_std_three_one'=>$this->input->post('ratio_std_three_one'),
     'ratio_std_three_two'=>$this->input->post('ratio_std_three_two'),
     'ratio_std_three_three'=>$this->input->post('ratio_std_three_three'),
     'ratio_std_three_four'=>$this->input->post('ratio_std_three_four'),
     'ratio_std_three_five'=>$this->input->post('ratio_std_three_five'),
     'ratio_std_four_one'=>$this->input->post('ratio_std_four_one'),
     'ratio_std_four_two'=>$this->input->post('ratio_std_four_two'),
     'ratio_std_four_three'=>$this->input->post('ratio_std_four_three'),
     'ratio_std_four_four'=>$this->input->post('ratio_std_four_four'),
     'ratio_std_four_five'=>$this->input->post('ratio_std_four_five'),
     'ratio_std_five_one'=>$this->input->post('ratio_std_five_one'),
     'ratio_std_five_two'=>$this->input->post('ratio_std_five_two'),
     'ratio_std_five_three'=>$this->input->post('ratio_std_five_three'),
     'ratio_std_five_four'=>$this->input->post('ratio_std_five_four'),
     'ratio_std_five_five'=>$this->input->post('ratio_std_five_five'),
     'ratio_std_six_one'=>$this->input->post('ratio_std_six_one'),
     'ratio_std_six_two'=>$this->input->post('ratio_std_six_two'),
     'ratio_std_six_three'=>$this->input->post('ratio_std_six_three'),
     'ratio_std_six_four'=>$this->input->post('ratio_std_six_four'),
     'ratio_std_six_five'=>$this->input->post('ratio_std_six_five'),
     'ratio_std_seven_one'=>$this->input->post('ratio_std_seven_one'),
     'ratio_std_seven_two'=>$this->input->post('ratio_std_seven_two'),
     'ratio_std_seven_three'=>$this->input->post('ratio_std_seven_three'),
     'ratio_std_seven_four'=>$this->input->post('ratio_std_seven_four'),
     'ratio_std_seven_five'=>$this->input->post('ratio_std_seven_five'),
     'internal_std_one_one'=>$this->input->post('internal_std_one_one'),
     'internal_std_one_two'=>$this->input->post('internal_std_one_two'),
     'internal_std_one_three'=>$this->input->post('internal_std_one_three'),
     'internal_std_one_four'=>$this->input->post('internal_std_one_four'),
     'internal_std_one_five'=>$this->input->post('internal_std_one_five'),
     'internal_std_two_one'=>$this->input->post('internal_std_two_one'),
     'internal_std_two_two'=>$this->input->post('internal_std_two_two'),
     'internal_std_two_three'=>$this->input->post('internal_std_two_three'),
     'internal_std_two_four'=>$this->input->post('internal_std_two_four'),
     'internal_std_two_five'=>$this->input->post('internal_std_two_five'),
     'internal_std_three_one'=>$this->input->post('internal_std_three_one'),
     'internal_std_three_two'=>$this->input->post('internal_std_three_two'),
     'internal_std_three_three'=>$this->input->post('internal_std_three_three'),
     'internal_std_three_four'=>$this->input->post('internal_std_three_four'),
     'internal_std_three_five'=>$this->input->post('internal_std_three_five'),
     'internal_std_four_one'=>$this->input->post('internal_std_four_one'),
     'internal_std_four_two'=>$this->input->post('internal_std_four_two'),
     'internal_std_four_three'=>$this->input->post('internal_std_four_three'),
     'internal_std_four_four'=>$this->input->post('internal_std_four_four'),
     'internal_std_four_five'=>$this->input->post('internal_std_four_five'),
     'internal_std_five_one'=>$this->input->post('internal_std_five_one'),
     'internal_std_five_two'=>$this->input->post('internal_std_five_two'),
     'internal_std_five_three'=>$this->input->post('internal_std_five_three'),
     'internal_std_five_four'=>$this->input->post('internal_std_five_four'),
     'internal_std_five_five'=>$this->input->post('internal_std_five_five'),
     'internal_std_six_one'=>$this->input->post('internal_std_six_one'),
     'internal_std_six_two'=>$this->input->post('internal_std_six_two'),
     'internal_std_six_three'=>$this->input->post('internal_std_six_three'),
     'internal_std_six_four'=>$this->input->post('internal_std_six_four'),
     'internal_std_six_five'=>$this->input->post('internal_std_six_five'),
     'internal_std_seven_one'=>$this->input->post('internal_std_seven_one'),
     'internal_std_seven_two'=>$this->input->post('internal_std_seven_two'),
     'internal_std_seven_three'=>$this->input->post('internal_std_seven_three'),
     'internal_std_seven_four'=>$this->input->post('internal_std_seven_four'),
     'internal_std_seven_five'=>$this->input->post('internal_std_seven_five'),
     'average_std'=>$this->input->post('average_std'),
     'average_sample_one'=>$this->input->post('average_sample_one'),
     'average_sample_two'=>$this->input->post('average_sample_two'),
     'average_sample_three'=>$this->input->post('average_sample_three'),
     'average_sample_four'=>$this->input->post('average_sample_four'),
     'average_sample_five'=>$this->input->post('average_sample_five'),
     'average_sample_six'=>$this->input->post('average_sample_six'),
     'ratio_std_one_average'=>$this->input->post('ratio_std_one_average'),
     'ratio_std_two_average'=>$this->input->post('ratio_std_two_average'),
     'ratio_std_three_average'=>$this->input->post('ratio_std_three_average'),
     'ratio_std_four_average'=>$this->input->post('ratio_std_four_average'),
     'ratio_std_five_average'=>$this->input->post('ratio_std_five_average'),
     'ratio_std_six_average'=>$this->input->post('ratio_std_six_average'),
     'ratio_std_seven_average'=>$this->input->post('ratio_std_seven_average'),
     'internal_std_one_average'=>$this->input->post('internal_std_one_average'),
     'internal_std_two_average'=>$this->input->post('internal_std_two_average'),
     'internal_std_three_average'=>$this->input->post('internal_std_three_average'),
     'internal_std_four_average'=>$this->input->post('internal_std_four_average'),
     'internal_std_five_average'=>$this->input->post('internal_std_five_average'),
     'internal_std_six_average'=>$this->input->post('internal_std_six_average'),
     'internal_std_seven_average'=>$this->input->post('internal_std_seven_average')
     

    );

    $data_six = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'requirement'=>$this->input->post(''),
     'comment'=>$this->input->post('')

    );

     $data_seven = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'method'=>$this->input->post('method'),
     'specification'=>$this->input->post('specification'),
     'conclusion'=>$this->input->post('conclusion'),
     'supervisor'=>$this->input->post('supervisor'),
     'date_tested'=>$this->input->post('date'),
     'further_comments'=>$this->input->post('further_comments')

    );

    $this->db->insert('coa',$data_seven);
    $this->db->insert('assay_hplc_internal_method_chromatography_checklist',$data_six);
    $this->db->insert('assay_hplc_internal_method_peak_area_chromatograms',$data_five);
    $this->db->insert('assay_hplc_internal_method_reagents',$data_four);
    $this->db->insert('assay_hplc_internal_method_chromatograms',$data_three);
    $this->db->insert('assay_hplc_internal_method_chromatographic_conditions',$data_two);
    $this->db->insert('assay_hplc_internal_method', $data);
    redirect('test/index/'.$assignment_id.'/'.$test_request_id.'/'.$test_type_id);
  }
  function process_indometric_titration(){

      $assignment_id=$this->input->post('assignment_id');
      $test_request_id=$this->input->post('tr_id');
      $test_type_id=$this->input->post('test_type_id');
      $status=1;
      $indometric_titration='6l';

      $data=$this->db->select_max('id')->get('assay_indometric_titration')->result();
      $assay_indometric_titration_id=$data[0]->id;
      $assay_indometric_titration_id++;
      

  //test data Insertion
    $data = array(
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,    
     'serial_number'=>$this->input->post('serial_number'),
     'analysis_date'=>$this->input->post('analysis_date'),
     'balance_make'=>$this->input->post('equipmentbalance'),
     'balance_id'=>$this->input->post('balance_id'),

     'weight_of_sample_container_w1'=>$this->input->post('weight_sample_container_one'),
     'weight_of_sample_container_w2'=>$this->input->post('weight_sample_container_two'),
     'weight_of_sample_container_w3'=>$this->input->post('weight_sample_container_three'),
     'weight_of_sample_container_w4'=>$this->input->post('weight_sample_container_four'),
     'weight_of_sample_container_w5'=>$this->input->post('weight_sample_container_five'),
     'weight_of_sample_container_w6'=>$this->input->post('weight_sample_container_six'), 
     'weight_of_container_w1'=>$this->input->post('weight_container_one'),
     'weight_of_container_w2'=>$this->input->post('weight_container_two'),
     'weight_of_container_w3'=>$this->input->post('weight_container_three'),
     'weight_of_container_w4'=>$this->input->post('weight_container_four'),
     'weight_of_container_w5'=>$this->input->post('weight_container_five'),
     'weight_of_container_w6'=>$this->input->post('weight_container_six'),
     'weight_of_sample_w1'=>$this->input->post('weight_sample_one'),
     'weight_of_sample_w2'=>$this->input->post('weight_sample_two'),
     'weight_of_sample_w3'=>$this->input->post('weight_sample_three'),
     'weight_of_sample_w4'=>$this->input->post('weight_sample_four'),
     'weight_of_sample_w5'=>$this->input->post('weight_sample_five'),
     'weight_of_sample_w6'=>$this->input->post('weight_sample_six'),
     'dilution_one'=>$this->input->post('dilution_one'),
     'weight_of_standard_preparation'=>$this->input->post('weight_of_standard_preparation'),
     'standard_description_one'=>$this->input->post('standard_description_one'),
     'standard_description_two'=>$this->input->post('standard_description_two'),
     'potency_one'=>$this->input->post('potency_one'),
     'potency_two'=>$this->input->post('potency_two'),
     'weight_standard_container_std_one'=>$this->input->post('weight_standard_container_of_std_one'),
     'weight_standard_container_std_two'=>$this->input->post('weight_standard_container_of_std_two'),
     'weight_container_of_std_one'=>$this->input->post('weight_container_of_std_one'),
     'weight_container_of_std_two'=>$this->input->post('weight_container_of_std_two'),
     'weight_of_standard_one'=>$this->input->post('weight_of_standard_one'),
     'weight_of_standard_two'=>$this->input->post('weight_of_standard_two'),
     'dilution_standard_one'=>$this->input->post('dilution_standard_one'),
     'dilution_standard_two'=>$this->input->post('dilution_standard_two'),
     'equipment_make'=>$this->input->post('equipmentmake'),
     'equipment_id'=>$this->input->post('make_id'),
     'weight_of_sample_container_w1_two'=>$this->input->post('weight_sample_container_one_one'),
     'weight_of_sample_container_w2_two'=>$this->input->post('weight_sample_container_two_one'),
     'weight_of_sample_container_w3_two'=>$this->input->post('weight_sample_container_three_one'),
     'weight_of_sample_container_w4_two'=>$this->input->post('weight_sample_container_four_one'),
     'weight_of_sample_container_w5_two'=>$this->input->post('weight_sample_container_five_one'),
     'weight_of_sample_container_w6_two'=>$this->input->post('weight_sample_container_six_one'),
     'weight_of_container_w1_two'=>$this->input->post('weight_container_one_two'),
     'weight_of_container_w2_two'=>$this->input->post('weight_container_two_two'),
     'weight_of_container_w3_two'=>$this->input->post('weight_container_three_two'),
     'weight_of_container_w4_two'=>$this->input->post('weight_container_four_two'),
     'weight_of_container_w5_two'=>$this->input->post('weight_container_five_two'),
     'weight_of_container_w6_two'=>$this->input->post('weight_container_six_two'),
     'weight_of_sample_w1_two'=>$this->input->post('weight_sample_one_three'),
     'weight_of_sample_w2_two'=>$this->input->post('weight_sample_two_three'),
     'weight_of_sample_w3_two'=>$this->input->post('weight_sample_three_three'),
     'weight_of_sample_w4_two'=>$this->input->post('weight_sample_four_three'),
     'weight_of_sample_w5_two'=>$this->input->post('weight_sample_five_three'),
     'weight_of_sample_w6_two'=>$this->input->post('weight_sample_six_three'),
     'mobile_phase_preparation'=>$this->input->post('mobile_phase_preparation'),
     'd_one_pkt'=>$this->input->post('d_one_pkt'),
     'd_one_wstd'=>$this->input->post('d_one_wstd'),
     'd_one_awt'=>$this->input->post('d_one_awt'),
     'd_one_df'=>$this->input->post('d_one_df'),
     'd_one_potency'=>$this->input->post('d_one_potency'),
     'd_one_pkstd'=>$this->input->post('d_one_pkstd'),
     'd_one_wt'=>$this->input->post('d_one_wt'),
     'd_one_lc'=>$this->input->post('d_one_lc'),
     'd_two_pkt'=>$this->input->post('d_two_pkt'),
     'd_two_wstd'=>$this->input->post('d_two_wstd'),
     'd_two_awt'=>$this->input->post('d_two_awt'),
     'd_two_df'=>$this->input->post('d_two_df'),
     'd_two_potency'=>$this->input->post('d_two_potency'),
     'd_two_pkstd'=>$this->input->post('d_two_pkstd'),
     'd_two_wt'=>$this->input->post('d_two_wt'),
     'd_two_lc'=>$this->input->post('d_two_lc'),
     'd_three_pkt'=>$this->input->post('d_three_pkt'),
     'd_three_wstd'=>$this->input->post('d_three_wstd'),
     'd_three_awt'=>$this->input->post('d_three_awt'),
     'd_three_df'=>$this->input->post('d_three_df'),
     'd_three_potency'=>$this->input->post('d_three_potency'),
     'd_three_pkstd'=>$this->input->post('d_three_pkstd'),
     'd_three_wt'=>$this->input->post('d_three_wt'),
     'd_three_lc'=>$this->input->post('d_three_lc'),
     'd_four_pkt'=>$this->input->post('d_four_pkt'),
     'd_four_wstd'=>$this->input->post('d_four_wstd'),
     'd_four_awt'=>$this->input->post('d_four_awt'),
     'd_four_df'=>$this->input->post('d_four_df'),
     'd_four_potency'=>$this->input->post('d_four_potency'),
     'd_four_pkstd'=>$this->input->post('d_four_pkstd'),
     'd_four_wt'=>$this->input->post('d_four_wt'),
     'd_four_lc'=>$this->input->post('d_four_lc'),
     'd_five_pkt'=>$this->input->post('d_five_pkt'),
     'd_five_wstd'=>$this->input->post('d_five_wstd'),
     'd_five_awt'=>$this->input->post('d_five_awt'),
     'd_five_df'=>$this->input->post('d_five_df'),
     'd_five_potency'=>$this->input->post('d_five_potency'),
     'd_five_pkstd'=>$this->input->post('d_five_pkstd'),
     'd_five_wt'=>$this->input->post('d_five_wt'),
     'd_five_lc'=>$this->input->post('d_five_lc'),
     'd_six_pkt'=>$this->input->post('d_six_pkt'),
     'd_six_wstd'=>$this->input->post('d_six_wstd'),
     'd_six_awt'=>$this->input->post('d_six_awt'),
     'd_six_df'=>$this->input->post('d_six_df'),
     'd_six_potency'=>$this->input->post('d_six_potency'),
     'd_six_pkstd'=>$this->input->post('d_six_pkstd'),
     'd_six_wt'=>$this->input->post('d_six_wt'),
     'd_six_lc'=>$this->input->post('d_six_lc'),
     'determination_one'=>$this->input->post('d_one_p_lc'),
     'determination_two'=>$this->input->post('d_two_p_lc'),
     'determination_three'=>$this->input->post('d_three_p_lc'),
     'determination_four'=>$this->input->post('d_four_p_lc'),
     'determination_five'=>$this->input->post('d_five_p_lc'),
     'determination_six'=>$this->input->post('d_six_p_lc'),
     'average_determination'=>$this->input->post('average_determination'),
     'equivalent_to'=>$this->input->post('equivalent_to_determination'),
     'sd_determination'=>$this->input->post('sd_determination'),
     'rsd_determination'=>$this->input->post('rsd_determination'),
     'content_from'=>$this->input->post('content_from'),
     'content_to'=>$this->input->post('content_to'),
     'content_results'=>$this->input->post('content_results'),
     'content_comment'=>$this->input->post('content_comment'),
     'sd_acceptance_criteria'=>$this->input->post('sd_acceptance_criteria'),
     'sd_results'=>$this->input->post('sd_results'),
     'sd_comment'=>$this->input->post('sd_comment'),
     'rsd_acceptance_criteria'=>$this->input->post('rsd_acceptance_criteria'),
     'rsd_results'=>$this->input->post('rsd_results'),
     'rsd_comment'=>$this->input->post('rsd_comment'),
     'conclusion'=>$this->input->post('conclusion'),
     'supervisor'=>$this->input->post('supervisor'),
     'date'=>$this->input->post('date'),
     'further_comments'=>$this->input->post('further_comments'),
     'test_status'=>$status
    );
    $data_two = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'name'=>$this->input->post('column_name'),
     'length'=>$this->input->post('column_dimensions'),
     'lot_serial_number'=>$this->input->post('column_serial_number'),
     'manufacturer'=>$this->input->post('column_manufacturer'),
     'column_pressure'=>$this->input->post('column_pressure'),
     'column_oven_temperature'=>$this->input->post('column_oven_temperature'),
     'mobile_phase_flow_rate'=>$this->input->post('column_mp_flow_rate'),
     'detection_wavelength'=>$this->input->post('column_detection_wavelength')

    );

    $data_three = array(

     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'retention_time_one'=>$this->input->post('retention_time_one'),
     'retention_time_two'=>$this->input->post('retention_time_two'),
     'retention_time_three'=>$this->input->post('retention_time_three'),
     'retention_time_four'=>$this->input->post('retention_time_four'),
     'retention_time_five'=>$this->input->post('retention_time_five'),
     'retention_time_six'=>$this->input->post('retention_time_six'),
     'peak_area_one'=>$this->input->post('peak_area_one'),
     'peak_area_two'=>$this->input->post('peak_area_two'),
     'peak_area_three'=>$this->input->post('peak_area_three'),
     'peak_area_four'=>$this->input->post('peak_area_four'),
     'peak_area_five'=>$this->input->post('peak_area_five'),
     'peak_area_six'=>$this->input->post('peak_area_six'),
     'asymmetry_one'=>$this->input->post('asymmetry_one'),
     'asymmetry_two'=>$this->input->post('asymmetry_two'),
     'asymmetry_three'=>$this->input->post('asymmetry_three'),
     'asymmetry_four'=>$this->input->post('asymmetry_four'),
     'asymmetry_five'=>$this->input->post('asymmetry_five'),
     'asymmetry_six'=>$this->input->post('asymmetry_six'),
     'resolution_one'=>$this->input->post('resolution_one'),
     'resolution_two'=>$this->input->post('resolution_two'),
     'resolution_three'=>$this->input->post('resolution_three'),
     'resolution_four'=>$this->input->post('resolution_four'),
     'resolution_five'=>$this->input->post('resolution_five'),
     'resolution_six'=>$this->input->post('resolution_six'),
     'relative_retention_time_one'=>$this->input->post('relative_retention_time_one'),
     'relative_retention_time_two'=>$this->input->post('relative_retention_time_two'),
     'relative_retention_time_three'=>$this->input->post('relative_retention_time_three'),
     'relative_retention_time_four'=>$this->input->post('relative_retention_time_four'),
     'relative_retention_time_five'=>$this->input->post('relative_retention_time_five'),
     'relative_retention_time_six'=>$this->input->post('relative_retention_time_six'),
     'average_retention_time'=>$this->input->post('average_retention_time'),
     'average_peak_area'=>$this->input->post('average_peak_area'),
     'average_asymmetry'=>$this->input->post('average_asymmetry'),
     'average_resolution'=>$this->input->post('average_resolution'),
     'average_relative_retention_time'=>$this->input->post('average_relative_retention_time'),
     'sd_retention_time'=>$this->input->post('standard_dev_retention_time'),
     'sd_peak_area'=>$this->input->post('standard_dev_peak_area'),
     'sd_asymmetry'=>$this->input->post('standard_dev_asymmetry'),
     'sd_resolution'=>$this->input->post('standard_dev_resolution'),
     'sd_relative_retention_time'=>$this->input->post('standard_dev_relative_retention_time'),
     'rsd_retention_time'=>$this->input->post('rsd_retention_time'),
     'rsd_peak_area'=>$this->input->post('rsd_peak_area'),
     'rsd_asymmetry'=>$this->input->post('rsd_asymmetry'),
     'rsd_resolution'=>$this->input->post('rsd_resolution'),
     'rsd_relative_retention_time'=>$this->input->post('rsd_relative_retention_time'),
     'comment_retention_time'=>$this->input->post('comment_retention_time'),
     'comment_peak_area'=>$this->input->post('comment_peak_area'),
     'comment_asymmetry'=>$this->input->post('comment_asymmetry'),
     'comment_resolution'=>$this->input->post('comment_resolution'),
     'comment_relative_retention_time'=>$this->input->post('comment_relative_retention_time')

    );

    $data_four = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'test'=>$this->input->post('test'),
     'chemical_reagent'=>$this->input->post('chemical_reagent'),
     'batch_number'=>$this->input->post('reagent_batch_number'),
     'manufacturer'=>$this->input->post('reagent_manufacturer'),

    );

    $data_five = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'sd_one'=>$this->input->post('sd_one'),
     'sd_two'=>$this->input->post('sd_two'),
     'sd_three'=>$this->input->post('sd_three'),
     'sd_four'=>$this->input->post('sd_four'),
     'sd_five'=>$this->input->post('sd_five'),
     'sample_one_one'=>$this->input->post('sample_one_one'),
     'sample_one_two'=>$this->input->post('sample_one_two'),
     'sample_one_three'=>$this->input->post('sample_one_three'),
     'sample_one_four'=>$this->input->post('sample_one_four'),
     'sample_one_five'=>$this->input->post('sample_one_five'),
     'sample_two_one'=>$this->input->post('sample_two_one'),
     'sample_two_two'=>$this->input->post('sample_two_two'),
     'sample_two_three'=>$this->input->post('sample_two_three'),
     'sample_two_four'=>$this->input->post('sample_two_four'),
     'sample_two_five'=>$this->input->post('sample_two_five'),
     'sample_three_one'=>$this->input->post('sample_three_one'),
     'sample_three_two'=>$this->input->post('sample_three_two'),
     'sample_three_three'=>$this->input->post('sample_three_three'),
     'sample_three_four'=>$this->input->post('sample_three_four'),
     'sample_three_five'=>$this->input->post('sample_three_five'),
     'sample_four_one'=>$this->input->post('sample_four_one'),
     'sample_four_two'=>$this->input->post('sample_four_two'),
     'sample_four_three'=>$this->input->post('sample_four_three'),
     'sample_four_four'=>$this->input->post('sample_four_four'),
     'sample_four_five'=>$this->input->post('sample_five_five'),
     'sample_five_one'=>$this->input->post('sample_five_one'),
     'sample_five_two'=>$this->input->post('sample_five_two'),
     'sample_five_three'=>$this->input->post('sample_five_three'),
     'sample_five_four'=>$this->input->post('sample_five_four'),
     'sample_five_five'=>$this->input->post('sample_five_five'),
     'sample_six_one'=>$this->input->post('sample_six_one'),
     'sample_six_two'=>$this->input->post('sample_six_two'),
     'sample_six_three'=>$this->input->post('sample_six_three'),
     'sample_six_four'=>$this->input->post('sample_six_four'),
     'sample_six_five'=>$this->input->post('sample_six_five'),
     'ratio_std_one_one'=>$this->input->post('ratio_std_one_one'),
     'ratio_std_one_two'=>$this->input->post('ratio_std_one_two'),
     'ratio_std_one_three'=>$this->input->post('ratio_std_one_three'),
     'ratio_std_one_four'=>$this->input->post('ratio_std_one_four'),
     'ratio_std_one_five'=>$this->input->post('ratio_std_one_five'),
     'ratio_std_two_one'=>$this->input->post('ratio_std_two_one'),
     'ratio_std_two_two'=>$this->input->post('ratio_std_two_two'),
     'ratio_std_two_three'=>$this->input->post('ratio_std_two_three'),
     'ratio_std_two_four'=>$this->input->post('ratio_std_two_four'),
     'ratio_std_two_five'=>$this->input->post('ratio_std_two_five'),
     'ratio_std_three_one'=>$this->input->post('ratio_std_three_one'),
     'ratio_std_three_two'=>$this->input->post('ratio_std_three_two'),
     'ratio_std_three_three'=>$this->input->post('ratio_std_three_three'),
     'ratio_std_three_four'=>$this->input->post('ratio_std_three_four'),
     'ratio_std_three_five'=>$this->input->post('ratio_std_three_five'),
     'ratio_std_four_one'=>$this->input->post('ratio_std_four_one'),
     'ratio_std_four_two'=>$this->input->post('ratio_std_four_two'),
     'ratio_std_four_three'=>$this->input->post('ratio_std_four_three'),
     'ratio_std_four_four'=>$this->input->post('ratio_std_four_four'),
     'ratio_std_four_five'=>$this->input->post('ratio_std_four_five'),
     'ratio_std_five_one'=>$this->input->post('ratio_std_five_one'),
     'ratio_std_five_two'=>$this->input->post('ratio_std_five_two'),
     'ratio_std_five_three'=>$this->input->post('ratio_std_five_three'),
     'ratio_std_five_four'=>$this->input->post('ratio_std_five_four'),
     'ratio_std_five_five'=>$this->input->post('ratio_std_five_five'),
     'ratio_std_six_one'=>$this->input->post('ratio_std_six_one'),
     'ratio_std_six_two'=>$this->input->post('ratio_std_six_two'),
     'ratio_std_six_three'=>$this->input->post('ratio_std_six_three'),
     'ratio_std_six_four'=>$this->input->post('ratio_std_six_four'),
     'ratio_std_six_five'=>$this->input->post('ratio_std_six_five'),
     'ratio_std_seven_one'=>$this->input->post('ratio_std_seven_one'),
     'ratio_std_seven_two'=>$this->input->post('ratio_std_seven_two'),
     'ratio_std_seven_three'=>$this->input->post('ratio_std_seven_three'),
     'ratio_std_seven_four'=>$this->input->post('ratio_std_seven_four'),
     'ratio_std_seven_five'=>$this->input->post('ratio_std_seven_five'),
     'internal_std_one_one'=>$this->input->post('internal_std_one_one'),
     'internal_std_one_two'=>$this->input->post('internal_std_one_two'),
     'internal_std_one_three'=>$this->input->post('internal_std_one_three'),
     'internal_std_one_four'=>$this->input->post('internal_std_one_four'),
     'internal_std_one_five'=>$this->input->post('internal_std_one_five'),
     'internal_std_two_one'=>$this->input->post('internal_std_two_one'),
     'internal_std_two_two'=>$this->input->post('internal_std_two_two'),
     'internal_std_two_three'=>$this->input->post('internal_std_two_three'),
     'internal_std_two_four'=>$this->input->post('internal_std_two_four'),
     'internal_std_two_five'=>$this->input->post('internal_std_two_five'),
     'internal_std_three_one'=>$this->input->post('internal_std_three_one'),
     'internal_std_three_two'=>$this->input->post('internal_std_three_two'),
     'internal_std_three_three'=>$this->input->post('internal_std_three_three'),
     'internal_std_three_four'=>$this->input->post('internal_std_three_four'),
     'internal_std_three_five'=>$this->input->post('internal_std_three_five'),
     'internal_std_four_one'=>$this->input->post('internal_std_four_one'),
     'internal_std_four_two'=>$this->input->post('internal_std_four_two'),
     'internal_std_four_three'=>$this->input->post('internal_std_four_three'),
     'internal_std_four_four'=>$this->input->post('internal_std_four_four'),
     'internal_std_four_five'=>$this->input->post('internal_std_four_five'),
     'internal_std_five_one'=>$this->input->post('internal_std_five_one'),
     'internal_std_five_two'=>$this->input->post('internal_std_five_two'),
     'internal_std_five_three'=>$this->input->post('internal_std_five_three'),
     'internal_std_five_four'=>$this->input->post('internal_std_five_four'),
     'internal_std_five_five'=>$this->input->post('internal_std_five_five'),
     'internal_std_six_one'=>$this->input->post('internal_std_six_one'),
     'internal_std_six_two'=>$this->input->post('internal_std_six_two'),
     'internal_std_six_three'=>$this->input->post('internal_std_six_three'),
     'internal_std_six_four'=>$this->input->post('internal_std_six_four'),
     'internal_std_six_five'=>$this->input->post('internal_std_six_five'),
     'internal_std_seven_one'=>$this->input->post('internal_std_seven_one'),
     'internal_std_seven_two'=>$this->input->post('internal_std_seven_two'),
     'internal_std_seven_three'=>$this->input->post('internal_std_seven_three'),
     'internal_std_seven_four'=>$this->input->post('internal_std_seven_four'),
     'internal_std_seven_five'=>$this->input->post('internal_std_seven_five'),
     'average_std'=>$this->input->post('average_std'),
     'average_sample_one'=>$this->input->post('average_sample_one'),
     'average_sample_two'=>$this->input->post('average_sample_two'),
     'average_sample_three'=>$this->input->post('average_sample_three'),
     'average_sample_four'=>$this->input->post('average_sample_four'),
     'average_sample_five'=>$this->input->post('average_sample_five'),
     'average_sample_six'=>$this->input->post('average_sample_six'),
     'ratio_std_one_average'=>$this->input->post('ratio_std_one_average'),
     'ratio_std_two_average'=>$this->input->post('ratio_std_two_average'),
     'ratio_std_three_average'=>$this->input->post('ratio_std_three_average'),
     'ratio_std_four_average'=>$this->input->post('ratio_std_four_average'),
     'ratio_std_five_average'=>$this->input->post('ratio_std_five_average'),
     'ratio_std_six_average'=>$this->input->post('ratio_std_six_average'),
     'ratio_std_seven_average'=>$this->input->post('ratio_std_seven_average'),
     'internal_std_one_average'=>$this->input->post('internal_std_one_average'),
     'internal_std_two_average'=>$this->input->post('internal_std_two_average'),
     'internal_std_three_average'=>$this->input->post('internal_std_three_average'),
     'internal_std_four_average'=>$this->input->post('internal_std_four_average'),
     'internal_std_five_average'=>$this->input->post('internal_std_five_average'),
     'internal_std_six_average'=>$this->input->post('internal_std_six_average'),
     'internal_std_seven_average'=>$this->input->post('internal_std_seven_average')
     

    );

    $data_six = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'requirement'=>$this->input->post(''),
     'comment'=>$this->input->post('')

    );

     $data_seven = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'method'=>$this->input->post('method'),
     'specification'=>$this->input->post('specification'),
     'conclusion'=>$this->input->post('conclusion'),
     'supervisor'=>$this->input->post('supervisor'),
     'date_tested'=>$this->input->post('date'),
     'further_comments'=>$this->input->post('further_comments')

    );

    $this->db->insert('coa',$data_seven);
    $this->db->insert('',$data_six);
    $this->db->insert('',$data_five);
    $this->db->insert('',$data_four);
    $this->db->insert('',$data_three);
    $this->db->insert('',$data_two);
    $this->db->insert('assay_indometric_titration', $data);
    redirect('test/index/'.$assignment_id.'/'.$test_request_id.'/'.$test_type_id);
  }
   function ultraviolet(){

      $assignment_id=$this->input->post('assignment_id');
      $test_request_id=$this->input->post('tr_id');
      $test_type_id=$this->input->post('test_type_id');
      $status=1;
      $area_method_single_component='6b';

      $data=$this->db->select_max('id')->get('assay_hplc_area_method_single_component')->result();
      $assay_hplc_area_method_single_component_id=$data[0]->id;
      $assay_hplc_area_method_single_component_id++;
      

  //test data Insertion
    $data = array(
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,    
     'serial_number'=>$this->input->post('serial_number'),
     'analysis_date'=>$this->input->post('analysis_date'),
     'balance_make'=>$this->input->post('equipmentbalance'),
     'balance_id'=>$this->input->post('balance_id'),
     'weight_of_sample_container_w1'=>$this->input->post('weight_sample_container_one'),
     'weight_of_sample_container_w2'=>$this->input->post('weight_sample_container_two'),
     'weight_of_sample_container_w3'=>$this->input->post('weight_sample_container_three'),
     'weight_of_sample_container_w4'=>$this->input->post('weight_sample_container_four'),
     'weight_of_sample_container_w5'=>$this->input->post('weight_sample_container_five'),
     'weight_of_sample_container_w6'=>$this->input->post('weight_sample_container_six'), 
     'weight_of_container_w1'=>$this->input->post('weight_container_one'),
     'weight_of_container_w2'=>$this->input->post('weight_container_two'),
     'weight_of_container_w3'=>$this->input->post('weight_container_three'),
     'weight_of_container_w4'=>$this->input->post('weight_container_four'),
     'weight_of_container_w5'=>$this->input->post('weight_container_five'),
     'weight_of_container_w6'=>$this->input->post('weight_container_six'),
     'weight_of_sample_w1'=>$this->input->post('weight_sample_one'),
     'weight_of_sample_w2'=>$this->input->post('weight_sample_two'),
     'weight_of_sample_w3'=>$this->input->post('weight_sample_three'),
     'weight_of_sample_w4'=>$this->input->post('weight_sample_four'),
     'weight_of_sample_w5'=>$this->input->post('weight_sample_five'),
     'weight_of_sample_w6'=>$this->input->post('weight_sample_six'),
     'dilution_one'=>$this->input->post('dilution_one'),
     'weight_of_standard_preparation'=>$this->input->post('weight_of_standard_preparation'),
     'standard_description_one'=>$this->input->post('standard_description_one'),
     'standard_description_two'=>$this->input->post('standard_description_two'),
     'potency_one'=>$this->input->post('potency_one'),
     'potency_two'=>$this->input->post('potency_two'),
     'weight_standard_container_std_one'=>$this->input->post('weight_standard_container_of_std_one'),
     'weight_standard_container_std_two'=>$this->input->post('weight_standard_container_of_std_two'),
     'weight_container_of_std_one'=>$this->input->post('weight_container_of_std_one'),
     'weight_container_of_std_two'=>$this->input->post('weight_container_of_std_two'),
     'weight_of_standard_one'=>$this->input->post('weight_of_standard_one'),
     'weight_of_standard_two'=>$this->input->post('weight_of_standard_two'),
     'dilution_standard_one'=>$this->input->post('dilution_standard_one'),
     'dilution_standard_two'=>$this->input->post('dilution_standard_two'),
     'equipment_make'=>$this->input->post('equipmentmake'),
     'equipment_id'=>$this->input->post('make_id'),
     'weight_of_sample_container_w1_two'=>$this->input->post('weight_sample_container_one_one'),
     'weight_of_sample_container_w2_two'=>$this->input->post('weight_sample_container_two_one'),
     'weight_of_sample_container_w3_two'=>$this->input->post('weight_sample_container_three_one'),
     'weight_of_sample_container_w4_two'=>$this->input->post('weight_sample_container_four_one'),
     'weight_of_sample_container_w5_two'=>$this->input->post('weight_sample_container_five_one'),
     'weight_of_sample_container_w6_two'=>$this->input->post('weight_sample_container_six_one'),
     'weight_of_container_w1_two'=>$this->input->post('weight_container_one_two'),
     'weight_of_container_w2_two'=>$this->input->post('weight_container_two_two'),
     'weight_of_container_w3_two'=>$this->input->post('weight_container_three_two'),
     'weight_of_container_w4_two'=>$this->input->post('weight_container_four_two'),
     'weight_of_container_w5_two'=>$this->input->post('weight_container_five_two'),
     'weight_of_container_w6_two'=>$this->input->post('weight_container_six_two'),
     'weight_of_sample_w1_two'=>$this->input->post('weight_sample_one_three'),
     'weight_of_sample_w2_two'=>$this->input->post('weight_sample_two_three'),
     'weight_of_sample_w3_two'=>$this->input->post('weight_sample_three_three'),
     'weight_of_sample_w4_two'=>$this->input->post('weight_sample_four_three'),
     'weight_of_sample_w5_two'=>$this->input->post('weight_sample_five_three'),
     'weight_of_sample_w6_two'=>$this->input->post('weight_sample_six_three'),
     'mobile_phase_preparation'=>$this->input->post('mobile_phase_preparation'),
     'd_one_pkt'=>$this->input->post('d_one_pkt'),
     'd_one_wstd'=>$this->input->post('d_one_wstd'),
     'd_one_awt'=>$this->input->post('d_one_awt'),
     'd_one_df'=>$this->input->post('d_one_df'),
     'd_one_potency'=>$this->input->post('d_one_potency'),
     'd_one_pkstd'=>$this->input->post('d_one_pkstd'),
     'd_one_wt'=>$this->input->post('d_one_wt'),
     'd_one_lc'=>$this->input->post('d_one_lc'),
     'd_two_pkt'=>$this->input->post('d_two_pkt'),
     'd_two_wstd'=>$this->input->post('d_two_wstd'),
     'd_two_awt'=>$this->input->post('d_two_awt'),
     'd_two_df'=>$this->input->post('d_two_df'),
     'd_two_potency'=>$this->input->post('d_two_potency'),
     'd_two_pkstd'=>$this->input->post('d_two_pkstd'),
     'd_two_wt'=>$this->input->post('d_two_wt'),
     'd_two_lc'=>$this->input->post('d_two_lc'),
     'd_three_pkt'=>$this->input->post('d_three_pkt'),
     'd_three_wstd'=>$this->input->post('d_three_wstd'),
     'd_three_awt'=>$this->input->post('d_three_awt'),
     'd_three_df'=>$this->input->post('d_three_df'),
     'd_three_potency'=>$this->input->post('d_three_potency'),
     'd_three_pkstd'=>$this->input->post('d_three_pkstd'),
     'd_three_wt'=>$this->input->post('d_three_wt'),
     'd_three_lc'=>$this->input->post('d_three_lc'),
     'd_four_pkt'=>$this->input->post('d_four_pkt'),
     'd_four_wstd'=>$this->input->post('d_four_wstd'),
     'd_four_awt'=>$this->input->post('d_four_awt'),
     'd_four_df'=>$this->input->post('d_four_df'),
     'd_four_potency'=>$this->input->post('d_four_potency'),
     'd_four_pkstd'=>$this->input->post('d_four_pkstd'),
     'd_four_wt'=>$this->input->post('d_four_wt'),
     'd_four_lc'=>$this->input->post('d_four_lc'),
     'd_five_pkt'=>$this->input->post('d_five_pkt'),
     'd_five_wstd'=>$this->input->post('d_five_wstd'),
     'd_five_awt'=>$this->input->post('d_five_awt'),
     'd_five_df'=>$this->input->post('d_five_df'),
     'd_five_potency'=>$this->input->post('d_five_potency'),
     'd_five_pkstd'=>$this->input->post('d_five_pkstd'),
     'd_five_wt'=>$this->input->post('d_five_wt'),
     'd_five_lc'=>$this->input->post('d_five_lc'),
     'd_six_pkt'=>$this->input->post('d_six_pkt'),
     'd_six_wstd'=>$this->input->post('d_six_wstd'),
     'd_six_awt'=>$this->input->post('d_six_awt'),
     'd_six_df'=>$this->input->post('d_six_df'),
     'd_six_potency'=>$this->input->post('d_six_potency'),
     'd_six_pkstd'=>$this->input->post('d_six_pkstd'),
     'd_six_wt'=>$this->input->post('d_six_wt'),
     'd_six_lc'=>$this->input->post('d_six_lc'),
     'determination_one'=>$this->input->post('d_one_p_lc'),
     'determination_two'=>$this->input->post('d_two_p_lc'),
     'determination_three'=>$this->input->post('d_three_p_lc'),
     'determination_four'=>$this->input->post('d_four_p_lc'),
     'determination_five'=>$this->input->post('d_five_p_lc'),
     'determination_six'=>$this->input->post('d_six_p_lc'),
     'average_determination'=>$this->input->post('average_determination'),
     'equivalent_to'=>$this->input->post('equivalent_to_determination'),
     'sd_determination'=>$this->input->post('sd_determination'),
     'rsd_determination'=>$this->input->post('rsd_determination'),
     'content_from'=>$this->input->post('content_from'),
     'content_to'=>$this->input->post('content_to'),
     'content_results'=>$this->input->post('content_results'),
     'content_comment'=>$this->input->post('content_comment'),
     'sd_acceptance_criteria'=>$this->input->post('sd_acceptance_criteria'),
     'sd_results'=>$this->input->post('sd_results'),
     'sd_comment'=>$this->input->post('sd_comment'),
     'rsd_acceptance_criteria'=>$this->input->post('rsd_acceptance_criteria'),
     'rsd_results'=>$this->input->post('rsd_results'),
     'rsd_comment'=>$this->input->post('rsd_comment'),
     'conclusion'=>$this->input->post('conclusion'),
     'supervisor'=>$this->input->post('supervisor'),
     'date'=>$this->input->post('date'),
     'further_comments'=>$this->input->post('further_comments'),
     'test_status'=>$status
    );
    $data_two = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'name'=>$this->input->post('column_name'),
     'length'=>$this->input->post('column_dimensions'),
     'lot_serial_number'=>$this->input->post('column_serial_number'),
     'manufacturer'=>$this->input->post('column_manufacturer'),
     'column_pressure'=>$this->input->post('column_pressure'),
     'column_oven_temperature'=>$this->input->post('column_oven_temperature'),
     'mobile_phase_flow_rate'=>$this->input->post('column_mp_flow_rate'),
     'detection_wavelength'=>$this->input->post('column_detection_wavelength')

    );

    $data_three = array(

     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'retention_time_one'=>$this->input->post('retention_time_one'),
     'retention_time_two'=>$this->input->post('retention_time_two'),
     'retention_time_three'=>$this->input->post('retention_time_three'),
     'retention_time_four'=>$this->input->post('retention_time_four'),
     'retention_time_five'=>$this->input->post('retention_time_five'),
     'retention_time_six'=>$this->input->post('retention_time_six'),
     'peak_area_one'=>$this->input->post('peak_area_one'),
     'peak_area_two'=>$this->input->post('peak_area_two'),
     'peak_area_three'=>$this->input->post('peak_area_three'),
     'peak_area_four'=>$this->input->post('peak_area_four'),
     'peak_area_five'=>$this->input->post('peak_area_five'),
     'peak_area_six'=>$this->input->post('peak_area_six'),
     'asymmetry_one'=>$this->input->post('asymmetry_one'),
     'asymmetry_two'=>$this->input->post('asymmetry_two'),
     'asymmetry_three'=>$this->input->post('asymmetry_three'),
     'asymmetry_four'=>$this->input->post('asymmetry_four'),
     'asymmetry_five'=>$this->input->post('asymmetry_five'),
     'asymmetry_six'=>$this->input->post('asymmetry_six'),
     'resolution_one'=>$this->input->post('resolution_one'),
     'resolution_two'=>$this->input->post('resolution_two'),
     'resolution_three'=>$this->input->post('resolution_three'),
     'resolution_four'=>$this->input->post('resolution_four'),
     'resolution_five'=>$this->input->post('resolution_five'),
     'resolution_six'=>$this->input->post('resolution_six'),
     'relative_retention_time_one'=>$this->input->post('relative_retention_time_one'),
     'relative_retention_time_two'=>$this->input->post('relative_retention_time_two'),
     'relative_retention_time_three'=>$this->input->post('relative_retention_time_three'),
     'relative_retention_time_four'=>$this->input->post('relative_retention_time_four'),
     'relative_retention_time_five'=>$this->input->post('relative_retention_time_five'),
     'relative_retention_time_six'=>$this->input->post('relative_retention_time_six'),
     'average_retention_time'=>$this->input->post('average_retention_time'),
     'average_peak_area'=>$this->input->post('average_peak_area'),
     'average_asymmetry'=>$this->input->post('average_asymmetry'),
     'average_resolution'=>$this->input->post('average_resolution'),
     'average_relative_retention_time'=>$this->input->post('average_relative_retention_time'),
     'sd_retention_time'=>$this->input->post('standard_dev_retention_time'),
     'sd_peak_area'=>$this->input->post('standard_dev_peak_area'),
     'sd_asymmetry'=>$this->input->post('standard_dev_asymmetry'),
     'sd_resolution'=>$this->input->post('standard_dev_resolution'),
     'sd_relative_retention_time'=>$this->input->post('standard_dev_relative_retention_time'),
     'rsd_retention_time'=>$this->input->post('rsd_retention_time'),
     'rsd_peak_area'=>$this->input->post('rsd_peak_area'),
     'rsd_asymmetry'=>$this->input->post('rsd_asymmetry'),
     'rsd_resolution'=>$this->input->post('rsd_resolution'),
     'rsd_relative_retention_time'=>$this->input->post('rsd_relative_retention_time'),
     'comment_retention_time'=>$this->input->post('comment_retention_time'),
     'comment_peak_area'=>$this->input->post('comment_peak_area'),
     'comment_asymmetry'=>$this->input->post('comment_asymmetry'),
     'comment_resolution'=>$this->input->post('comment_resolution'),
     'comment_relative_retention_time'=>$this->input->post('comment_relative_retention_time')

    );

    $data_four = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'test'=>$this->input->post('test'),
     'chemical_reagent'=>$this->input->post('chemical_reagent'),
     'batch_number'=>$this->input->post('reagent_batch_number'),
     'manufacturer'=>$this->input->post('reagent_manufacturer'),

    );

    $data_five = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'sd_one'=>$this->input->post('sd_one'),
     'sd_two'=>$this->input->post('sd_two'),
     'sd_three'=>$this->input->post('sd_three'),
     'sd_four'=>$this->input->post('sd_four'),
     'sd_five'=>$this->input->post('sd_five'),
     'sample_one_one'=>$this->input->post('sample_one_one'),
     'sample_one_two'=>$this->input->post('sample_one_two'),
     'sample_one_three'=>$this->input->post('sample_one_three'),
     'sample_one_four'=>$this->input->post('sample_one_four'),
     'sample_one_five'=>$this->input->post('sample_one_five'),
     'sample_two_one'=>$this->input->post('sample_two_one'),
     'sample_two_two'=>$this->input->post('sample_two_two'),
     'sample_two_three'=>$this->input->post('sample_two_three'),
     'sample_two_four'=>$this->input->post('sample_two_four'),
     'sample_two_five'=>$this->input->post('sample_two_five'),
     'sample_three_one'=>$this->input->post('sample_three_one'),
     'sample_three_two'=>$this->input->post('sample_three_two'),
     'sample_three_three'=>$this->input->post('sample_three_three'),
     'sample_three_four'=>$this->input->post('sample_three_four'),
     'sample_three_five'=>$this->input->post('sample_three_five'),
     'sample_four_one'=>$this->input->post('sample_four_one'),
     'sample_four_two'=>$this->input->post('sample_four_two'),
     'sample_four_three'=>$this->input->post('sample_four_three'),
     'sample_four_four'=>$this->input->post('sample_four_four'),
     'sample_four_five'=>$this->input->post('sample_five_five'),
     'sample_five_one'=>$this->input->post('sample_five_one'),
     'sample_five_two'=>$this->input->post('sample_five_two'),
     'sample_five_three'=>$this->input->post('sample_five_three'),
     'sample_five_four'=>$this->input->post('sample_five_four'),
     'sample_five_five'=>$this->input->post('sample_five_five'),
     'sample_six_one'=>$this->input->post('sample_six_one'),
     'sample_six_two'=>$this->input->post('sample_six_two'),
     'sample_six_three'=>$this->input->post('sample_six_three'),
     'sample_six_four'=>$this->input->post('sample_six_four'),
     'sample_six_five'=>$this->input->post('sample_six_five'),
     'ratio_std_one_one'=>$this->input->post('ratio_std_one_one'),
     'ratio_std_one_two'=>$this->input->post('ratio_std_one_two'),
     'ratio_std_one_three'=>$this->input->post('ratio_std_one_three'),
     'ratio_std_one_four'=>$this->input->post('ratio_std_one_four'),
     'ratio_std_one_five'=>$this->input->post('ratio_std_one_five'),
     'ratio_std_two_one'=>$this->input->post('ratio_std_two_one'),
     'ratio_std_two_two'=>$this->input->post('ratio_std_two_two'),
     'ratio_std_two_three'=>$this->input->post('ratio_std_two_three'),
     'ratio_std_two_four'=>$this->input->post('ratio_std_two_four'),
     'ratio_std_two_five'=>$this->input->post('ratio_std_two_five'),
     'ratio_std_three_one'=>$this->input->post('ratio_std_three_one'),
     'ratio_std_three_two'=>$this->input->post('ratio_std_three_two'),
     'ratio_std_three_three'=>$this->input->post('ratio_std_three_three'),
     'ratio_std_three_four'=>$this->input->post('ratio_std_three_four'),
     'ratio_std_three_five'=>$this->input->post('ratio_std_three_five'),
     'ratio_std_four_one'=>$this->input->post('ratio_std_four_one'),
     'ratio_std_four_two'=>$this->input->post('ratio_std_four_two'),
     'ratio_std_four_three'=>$this->input->post('ratio_std_four_three'),
     'ratio_std_four_four'=>$this->input->post('ratio_std_four_four'),
     'ratio_std_four_five'=>$this->input->post('ratio_std_four_five'),
     'ratio_std_five_one'=>$this->input->post('ratio_std_five_one'),
     'ratio_std_five_two'=>$this->input->post('ratio_std_five_two'),
     'ratio_std_five_three'=>$this->input->post('ratio_std_five_three'),
     'ratio_std_five_four'=>$this->input->post('ratio_std_five_four'),
     'ratio_std_five_five'=>$this->input->post('ratio_std_five_five'),
     'ratio_std_six_one'=>$this->input->post('ratio_std_six_one'),
     'ratio_std_six_two'=>$this->input->post('ratio_std_six_two'),
     'ratio_std_six_three'=>$this->input->post('ratio_std_six_three'),
     'ratio_std_six_four'=>$this->input->post('ratio_std_six_four'),
     'ratio_std_six_five'=>$this->input->post('ratio_std_six_five'),
     'ratio_std_seven_one'=>$this->input->post('ratio_std_seven_one'),
     'ratio_std_seven_two'=>$this->input->post('ratio_std_seven_two'),
     'ratio_std_seven_three'=>$this->input->post('ratio_std_seven_three'),
     'ratio_std_seven_four'=>$this->input->post('ratio_std_seven_four'),
     'ratio_std_seven_five'=>$this->input->post('ratio_std_seven_five'),
     'internal_std_one_one'=>$this->input->post('internal_std_one_one'),
     'internal_std_one_two'=>$this->input->post('internal_std_one_two'),
     'internal_std_one_three'=>$this->input->post('internal_std_one_three'),
     'internal_std_one_four'=>$this->input->post('internal_std_one_four'),
     'internal_std_one_five'=>$this->input->post('internal_std_one_five'),
     'internal_std_two_one'=>$this->input->post('internal_std_two_one'),
     'internal_std_two_two'=>$this->input->post('internal_std_two_two'),
     'internal_std_two_three'=>$this->input->post('internal_std_two_three'),
     'internal_std_two_four'=>$this->input->post('internal_std_two_four'),
     'internal_std_two_five'=>$this->input->post('internal_std_two_five'),
     'internal_std_three_one'=>$this->input->post('internal_std_three_one'),
     'internal_std_three_two'=>$this->input->post('internal_std_three_two'),
     'internal_std_three_three'=>$this->input->post('internal_std_three_three'),
     'internal_std_three_four'=>$this->input->post('internal_std_three_four'),
     'internal_std_three_five'=>$this->input->post('internal_std_three_five'),
     'internal_std_four_one'=>$this->input->post('internal_std_four_one'),
     'internal_std_four_two'=>$this->input->post('internal_std_four_two'),
     'internal_std_four_three'=>$this->input->post('internal_std_four_three'),
     'internal_std_four_four'=>$this->input->post('internal_std_four_four'),
     'internal_std_four_five'=>$this->input->post('internal_std_four_five'),
     'internal_std_five_one'=>$this->input->post('internal_std_five_one'),
     'internal_std_five_two'=>$this->input->post('internal_std_five_two'),
     'internal_std_five_three'=>$this->input->post('internal_std_five_three'),
     'internal_std_five_four'=>$this->input->post('internal_std_five_four'),
     'internal_std_five_five'=>$this->input->post('internal_std_five_five'),
     'internal_std_six_one'=>$this->input->post('internal_std_six_one'),
     'internal_std_six_two'=>$this->input->post('internal_std_six_two'),
     'internal_std_six_three'=>$this->input->post('internal_std_six_three'),
     'internal_std_six_four'=>$this->input->post('internal_std_six_four'),
     'internal_std_six_five'=>$this->input->post('internal_std_six_five'),
     'internal_std_seven_one'=>$this->input->post('internal_std_seven_one'),
     'internal_std_seven_two'=>$this->input->post('internal_std_seven_two'),
     'internal_std_seven_three'=>$this->input->post('internal_std_seven_three'),
     'internal_std_seven_four'=>$this->input->post('internal_std_seven_four'),
     'internal_std_seven_five'=>$this->input->post('internal_std_seven_five'),
     'average_std'=>$this->input->post('average_std'),
     'average_sample_one'=>$this->input->post('average_sample_one'),
     'average_sample_two'=>$this->input->post('average_sample_two'),
     'average_sample_three'=>$this->input->post('average_sample_three'),
     'average_sample_four'=>$this->input->post('average_sample_four'),
     'average_sample_five'=>$this->input->post('average_sample_five'),
     'average_sample_six'=>$this->input->post('average_sample_six'),
     'ratio_std_one_average'=>$this->input->post('ratio_std_one_average'),
     'ratio_std_two_average'=>$this->input->post('ratio_std_two_average'),
     'ratio_std_three_average'=>$this->input->post('ratio_std_three_average'),
     'ratio_std_four_average'=>$this->input->post('ratio_std_four_average'),
     'ratio_std_five_average'=>$this->input->post('ratio_std_five_average'),
     'ratio_std_six_average'=>$this->input->post('ratio_std_six_average'),
     'ratio_std_seven_average'=>$this->input->post('ratio_std_seven_average'),
     'internal_std_one_average'=>$this->input->post('internal_std_one_average'),
     'internal_std_two_average'=>$this->input->post('internal_std_two_average'),
     'internal_std_three_average'=>$this->input->post('internal_std_three_average'),
     'internal_std_four_average'=>$this->input->post('internal_std_four_average'),
     'internal_std_five_average'=>$this->input->post('internal_std_five_average'),
     'internal_std_six_average'=>$this->input->post('internal_std_six_average'),
     'internal_std_seven_average'=>$this->input->post('internal_std_seven_average')
     

    );

    $data_six = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'requirement'=>$this->input->post(''),
     'comment'=>$this->input->post('')

    );

     $data_seven = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'method'=>$this->input->post('method'),
     'specification'=>$this->input->post('specification'),
     'conclusion'=>$this->input->post('conclusion'),
     'supervisor'=>$this->input->post('supervisor'),
     'date_tested'=>$this->input->post('date'),
     'further_comments'=>$this->input->post('further_comments')

    );

    $this->db->insert('coa',$data_seven);
    $this->db->insert('assay_hplc_internal_method_chromatography_checklist',$data_six);
    $this->db->insert('assay_hplc_internal_method_peak_area_chromatograms',$data_five);
    $this->db->insert('assay_hplc_internal_method_reagents',$data_four);
    $this->db->insert('assay_hplc_internal_method_chromatograms',$data_three);
    $this->db->insert('assay_hplc_internal_method_chromatographic_conditions',$data_two);
    $this->db->insert('assay_hplc_internal_method', $data);
    redirect('test/index/'.$assignment_id.'/'.$test_request_id.'/'.$test_type_id);
  }
   function karl_fisher(){

      $assignment_id=$this->input->post('assignment_id');
      $test_request_id=$this->input->post('tr_id');
      $test_type_id=$this->input->post('test_type_id');
      $status=1;
      $area_method_single_component='6b';

      $data=$this->db->select_max('id')->get('assay_hplc_area_method_single_component')->result();
      $assay_hplc_area_method_single_component_id=$data[0]->id;
      $assay_hplc_area_method_single_component_id++;
      

  //test data Insertion
    $data = array(
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,    
     'serial_number'=>$this->input->post('serial_number'),
     'analysis_date'=>$this->input->post('analysis_date'),
     'balance_make'=>$this->input->post('equipmentbalance'),
     'balance_id'=>$this->input->post('balance_id'),
     'weight_of_sample_container_w1'=>$this->input->post('weight_sample_container_one'),
     'weight_of_sample_container_w2'=>$this->input->post('weight_sample_container_two'),
     'weight_of_sample_container_w3'=>$this->input->post('weight_sample_container_three'),
     'weight_of_sample_container_w4'=>$this->input->post('weight_sample_container_four'),
     'weight_of_sample_container_w5'=>$this->input->post('weight_sample_container_five'),
     'weight_of_sample_container_w6'=>$this->input->post('weight_sample_container_six'), 
     'weight_of_container_w1'=>$this->input->post('weight_container_one'),
     'weight_of_container_w2'=>$this->input->post('weight_container_two'),
     'weight_of_container_w3'=>$this->input->post('weight_container_three'),
     'weight_of_container_w4'=>$this->input->post('weight_container_four'),
     'weight_of_container_w5'=>$this->input->post('weight_container_five'),
     'weight_of_container_w6'=>$this->input->post('weight_container_six'),
     'weight_of_sample_w1'=>$this->input->post('weight_sample_one'),
     'weight_of_sample_w2'=>$this->input->post('weight_sample_two'),
     'weight_of_sample_w3'=>$this->input->post('weight_sample_three'),
     'weight_of_sample_w4'=>$this->input->post('weight_sample_four'),
     'weight_of_sample_w5'=>$this->input->post('weight_sample_five'),
     'weight_of_sample_w6'=>$this->input->post('weight_sample_six'),
     'dilution_one'=>$this->input->post('dilution_one'),
     'weight_of_standard_preparation'=>$this->input->post('weight_of_standard_preparation'),
     'standard_description_one'=>$this->input->post('standard_description_one'),
     'standard_description_two'=>$this->input->post('standard_description_two'),
     'potency_one'=>$this->input->post('potency_one'),
     'potency_two'=>$this->input->post('potency_two'),
     'weight_standard_container_std_one'=>$this->input->post('weight_standard_container_of_std_one'),
     'weight_standard_container_std_two'=>$this->input->post('weight_standard_container_of_std_two'),
     'weight_container_of_std_one'=>$this->input->post('weight_container_of_std_one'),
     'weight_container_of_std_two'=>$this->input->post('weight_container_of_std_two'),
     'weight_of_standard_one'=>$this->input->post('weight_of_standard_one'),
     'weight_of_standard_two'=>$this->input->post('weight_of_standard_two'),
     'dilution_standard_one'=>$this->input->post('dilution_standard_one'),
     'dilution_standard_two'=>$this->input->post('dilution_standard_two'),
     'equipment_make'=>$this->input->post('equipmentmake'),
     'equipment_id'=>$this->input->post('make_id'),
     'weight_of_sample_container_w1_two'=>$this->input->post('weight_sample_container_one_one'),
     'weight_of_sample_container_w2_two'=>$this->input->post('weight_sample_container_two_one'),
     'weight_of_sample_container_w3_two'=>$this->input->post('weight_sample_container_three_one'),
     'weight_of_sample_container_w4_two'=>$this->input->post('weight_sample_container_four_one'),
     'weight_of_sample_container_w5_two'=>$this->input->post('weight_sample_container_five_one'),
     'weight_of_sample_container_w6_two'=>$this->input->post('weight_sample_container_six_one'),
     'weight_of_container_w1_two'=>$this->input->post('weight_container_one_two'),
     'weight_of_container_w2_two'=>$this->input->post('weight_container_two_two'),
     'weight_of_container_w3_two'=>$this->input->post('weight_container_three_two'),
     'weight_of_container_w4_two'=>$this->input->post('weight_container_four_two'),
     'weight_of_container_w5_two'=>$this->input->post('weight_container_five_two'),
     'weight_of_container_w6_two'=>$this->input->post('weight_container_six_two'),
     'weight_of_sample_w1_two'=>$this->input->post('weight_sample_one_three'),
     'weight_of_sample_w2_two'=>$this->input->post('weight_sample_two_three'),
     'weight_of_sample_w3_two'=>$this->input->post('weight_sample_three_three'),
     'weight_of_sample_w4_two'=>$this->input->post('weight_sample_four_three'),
     'weight_of_sample_w5_two'=>$this->input->post('weight_sample_five_three'),
     'weight_of_sample_w6_two'=>$this->input->post('weight_sample_six_three'),
     'mobile_phase_preparation'=>$this->input->post('mobile_phase_preparation'),
     'd_one_pkt'=>$this->input->post('d_one_pkt'),
     'd_one_wstd'=>$this->input->post('d_one_wstd'),
     'd_one_awt'=>$this->input->post('d_one_awt'),
     'd_one_df'=>$this->input->post('d_one_df'),
     'd_one_potency'=>$this->input->post('d_one_potency'),
     'd_one_pkstd'=>$this->input->post('d_one_pkstd'),
     'd_one_wt'=>$this->input->post('d_one_wt'),
     'd_one_lc'=>$this->input->post('d_one_lc'),
     'd_two_pkt'=>$this->input->post('d_two_pkt'),
     'd_two_wstd'=>$this->input->post('d_two_wstd'),
     'd_two_awt'=>$this->input->post('d_two_awt'),
     'd_two_df'=>$this->input->post('d_two_df'),
     'd_two_potency'=>$this->input->post('d_two_potency'),
     'd_two_pkstd'=>$this->input->post('d_two_pkstd'),
     'd_two_wt'=>$this->input->post('d_two_wt'),
     'd_two_lc'=>$this->input->post('d_two_lc'),
     'd_three_pkt'=>$this->input->post('d_three_pkt'),
     'd_three_wstd'=>$this->input->post('d_three_wstd'),
     'd_three_awt'=>$this->input->post('d_three_awt'),
     'd_three_df'=>$this->input->post('d_three_df'),
     'd_three_potency'=>$this->input->post('d_three_potency'),
     'd_three_pkstd'=>$this->input->post('d_three_pkstd'),
     'd_three_wt'=>$this->input->post('d_three_wt'),
     'd_three_lc'=>$this->input->post('d_three_lc'),
     'd_four_pkt'=>$this->input->post('d_four_pkt'),
     'd_four_wstd'=>$this->input->post('d_four_wstd'),
     'd_four_awt'=>$this->input->post('d_four_awt'),
     'd_four_df'=>$this->input->post('d_four_df'),
     'd_four_potency'=>$this->input->post('d_four_potency'),
     'd_four_pkstd'=>$this->input->post('d_four_pkstd'),
     'd_four_wt'=>$this->input->post('d_four_wt'),
     'd_four_lc'=>$this->input->post('d_four_lc'),
     'd_five_pkt'=>$this->input->post('d_five_pkt'),
     'd_five_wstd'=>$this->input->post('d_five_wstd'),
     'd_five_awt'=>$this->input->post('d_five_awt'),
     'd_five_df'=>$this->input->post('d_five_df'),
     'd_five_potency'=>$this->input->post('d_five_potency'),
     'd_five_pkstd'=>$this->input->post('d_five_pkstd'),
     'd_five_wt'=>$this->input->post('d_five_wt'),
     'd_five_lc'=>$this->input->post('d_five_lc'),
     'd_six_pkt'=>$this->input->post('d_six_pkt'),
     'd_six_wstd'=>$this->input->post('d_six_wstd'),
     'd_six_awt'=>$this->input->post('d_six_awt'),
     'd_six_df'=>$this->input->post('d_six_df'),
     'd_six_potency'=>$this->input->post('d_six_potency'),
     'd_six_pkstd'=>$this->input->post('d_six_pkstd'),
     'd_six_wt'=>$this->input->post('d_six_wt'),
     'd_six_lc'=>$this->input->post('d_six_lc'),
     'determination_one'=>$this->input->post('d_one_p_lc'),
     'determination_two'=>$this->input->post('d_two_p_lc'),
     'determination_three'=>$this->input->post('d_three_p_lc'),
     'determination_four'=>$this->input->post('d_four_p_lc'),
     'determination_five'=>$this->input->post('d_five_p_lc'),
     'determination_six'=>$this->input->post('d_six_p_lc'),
     'average_determination'=>$this->input->post('average_determination'),
     'equivalent_to'=>$this->input->post('equivalent_to_determination'),
     'sd_determination'=>$this->input->post('sd_determination'),
     'rsd_determination'=>$this->input->post('rsd_determination'),
     'content_from'=>$this->input->post('content_from'),
     'content_to'=>$this->input->post('content_to'),
     'content_results'=>$this->input->post('content_results'),
     'content_comment'=>$this->input->post('content_comment'),
     'sd_acceptance_criteria'=>$this->input->post('sd_acceptance_criteria'),
     'sd_results'=>$this->input->post('sd_results'),
     'sd_comment'=>$this->input->post('sd_comment'),
     'rsd_acceptance_criteria'=>$this->input->post('rsd_acceptance_criteria'),
     'rsd_results'=>$this->input->post('rsd_results'),
     'rsd_comment'=>$this->input->post('rsd_comment'),
     'conclusion'=>$this->input->post('conclusion'),
     'supervisor'=>$this->input->post('supervisor'),
     'date'=>$this->input->post('date'),
     'further_comments'=>$this->input->post('further_comments'),
     'test_status'=>$status
    );
    $data_two = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'name'=>$this->input->post('column_name'),
     'length'=>$this->input->post('column_dimensions'),
     'lot_serial_number'=>$this->input->post('column_serial_number'),
     'manufacturer'=>$this->input->post('column_manufacturer'),
     'column_pressure'=>$this->input->post('column_pressure'),
     'column_oven_temperature'=>$this->input->post('column_oven_temperature'),
     'mobile_phase_flow_rate'=>$this->input->post('column_mp_flow_rate'),
     'detection_wavelength'=>$this->input->post('column_detection_wavelength')

    );

    $data_three = array(

     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'retention_time_one'=>$this->input->post('retention_time_one'),
     'retention_time_two'=>$this->input->post('retention_time_two'),
     'retention_time_three'=>$this->input->post('retention_time_three'),
     'retention_time_four'=>$this->input->post('retention_time_four'),
     'retention_time_five'=>$this->input->post('retention_time_five'),
     'retention_time_six'=>$this->input->post('retention_time_six'),
     'peak_area_one'=>$this->input->post('peak_area_one'),
     'peak_area_two'=>$this->input->post('peak_area_two'),
     'peak_area_three'=>$this->input->post('peak_area_three'),
     'peak_area_four'=>$this->input->post('peak_area_four'),
     'peak_area_five'=>$this->input->post('peak_area_five'),
     'peak_area_six'=>$this->input->post('peak_area_six'),
     'asymmetry_one'=>$this->input->post('asymmetry_one'),
     'asymmetry_two'=>$this->input->post('asymmetry_two'),
     'asymmetry_three'=>$this->input->post('asymmetry_three'),
     'asymmetry_four'=>$this->input->post('asymmetry_four'),
     'asymmetry_five'=>$this->input->post('asymmetry_five'),
     'asymmetry_six'=>$this->input->post('asymmetry_six'),
     'resolution_one'=>$this->input->post('resolution_one'),
     'resolution_two'=>$this->input->post('resolution_two'),
     'resolution_three'=>$this->input->post('resolution_three'),
     'resolution_four'=>$this->input->post('resolution_four'),
     'resolution_five'=>$this->input->post('resolution_five'),
     'resolution_six'=>$this->input->post('resolution_six'),
     'relative_retention_time_one'=>$this->input->post('relative_retention_time_one'),
     'relative_retention_time_two'=>$this->input->post('relative_retention_time_two'),
     'relative_retention_time_three'=>$this->input->post('relative_retention_time_three'),
     'relative_retention_time_four'=>$this->input->post('relative_retention_time_four'),
     'relative_retention_time_five'=>$this->input->post('relative_retention_time_five'),
     'relative_retention_time_six'=>$this->input->post('relative_retention_time_six'),
     'average_retention_time'=>$this->input->post('average_retention_time'),
     'average_peak_area'=>$this->input->post('average_peak_area'),
     'average_asymmetry'=>$this->input->post('average_asymmetry'),
     'average_resolution'=>$this->input->post('average_resolution'),
     'average_relative_retention_time'=>$this->input->post('average_relative_retention_time'),
     'sd_retention_time'=>$this->input->post('standard_dev_retention_time'),
     'sd_peak_area'=>$this->input->post('standard_dev_peak_area'),
     'sd_asymmetry'=>$this->input->post('standard_dev_asymmetry'),
     'sd_resolution'=>$this->input->post('standard_dev_resolution'),
     'sd_relative_retention_time'=>$this->input->post('standard_dev_relative_retention_time'),
     'rsd_retention_time'=>$this->input->post('rsd_retention_time'),
     'rsd_peak_area'=>$this->input->post('rsd_peak_area'),
     'rsd_asymmetry'=>$this->input->post('rsd_asymmetry'),
     'rsd_resolution'=>$this->input->post('rsd_resolution'),
     'rsd_relative_retention_time'=>$this->input->post('rsd_relative_retention_time'),
     'comment_retention_time'=>$this->input->post('comment_retention_time'),
     'comment_peak_area'=>$this->input->post('comment_peak_area'),
     'comment_asymmetry'=>$this->input->post('comment_asymmetry'),
     'comment_resolution'=>$this->input->post('comment_resolution'),
     'comment_relative_retention_time'=>$this->input->post('comment_relative_retention_time')

    );

    $data_four = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'test'=>$this->input->post('test'),
     'chemical_reagent'=>$this->input->post('chemical_reagent'),
     'batch_number'=>$this->input->post('reagent_batch_number'),
     'manufacturer'=>$this->input->post('reagent_manufacturer'),

    );

    $data_five = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'sd_one'=>$this->input->post('sd_one'),
     'sd_two'=>$this->input->post('sd_two'),
     'sd_three'=>$this->input->post('sd_three'),
     'sd_four'=>$this->input->post('sd_four'),
     'sd_five'=>$this->input->post('sd_five'),
     'sample_one_one'=>$this->input->post('sample_one_one'),
     'sample_one_two'=>$this->input->post('sample_one_two'),
     'sample_one_three'=>$this->input->post('sample_one_three'),
     'sample_one_four'=>$this->input->post('sample_one_four'),
     'sample_one_five'=>$this->input->post('sample_one_five'),
     'sample_two_one'=>$this->input->post('sample_two_one'),
     'sample_two_two'=>$this->input->post('sample_two_two'),
     'sample_two_three'=>$this->input->post('sample_two_three'),
     'sample_two_four'=>$this->input->post('sample_two_four'),
     'sample_two_five'=>$this->input->post('sample_two_five'),
     'sample_three_one'=>$this->input->post('sample_three_one'),
     'sample_three_two'=>$this->input->post('sample_three_two'),
     'sample_three_three'=>$this->input->post('sample_three_three'),
     'sample_three_four'=>$this->input->post('sample_three_four'),
     'sample_three_five'=>$this->input->post('sample_three_five'),
     'sample_four_one'=>$this->input->post('sample_four_one'),
     'sample_four_two'=>$this->input->post('sample_four_two'),
     'sample_four_three'=>$this->input->post('sample_four_three'),
     'sample_four_four'=>$this->input->post('sample_four_four'),
     'sample_four_five'=>$this->input->post('sample_five_five'),
     'sample_five_one'=>$this->input->post('sample_five_one'),
     'sample_five_two'=>$this->input->post('sample_five_two'),
     'sample_five_three'=>$this->input->post('sample_five_three'),
     'sample_five_four'=>$this->input->post('sample_five_four'),
     'sample_five_five'=>$this->input->post('sample_five_five'),
     'sample_six_one'=>$this->input->post('sample_six_one'),
     'sample_six_two'=>$this->input->post('sample_six_two'),
     'sample_six_three'=>$this->input->post('sample_six_three'),
     'sample_six_four'=>$this->input->post('sample_six_four'),
     'sample_six_five'=>$this->input->post('sample_six_five'),
     'ratio_std_one_one'=>$this->input->post('ratio_std_one_one'),
     'ratio_std_one_two'=>$this->input->post('ratio_std_one_two'),
     'ratio_std_one_three'=>$this->input->post('ratio_std_one_three'),
     'ratio_std_one_four'=>$this->input->post('ratio_std_one_four'),
     'ratio_std_one_five'=>$this->input->post('ratio_std_one_five'),
     'ratio_std_two_one'=>$this->input->post('ratio_std_two_one'),
     'ratio_std_two_two'=>$this->input->post('ratio_std_two_two'),
     'ratio_std_two_three'=>$this->input->post('ratio_std_two_three'),
     'ratio_std_two_four'=>$this->input->post('ratio_std_two_four'),
     'ratio_std_two_five'=>$this->input->post('ratio_std_two_five'),
     'ratio_std_three_one'=>$this->input->post('ratio_std_three_one'),
     'ratio_std_three_two'=>$this->input->post('ratio_std_three_two'),
     'ratio_std_three_three'=>$this->input->post('ratio_std_three_three'),
     'ratio_std_three_four'=>$this->input->post('ratio_std_three_four'),
     'ratio_std_three_five'=>$this->input->post('ratio_std_three_five'),
     'ratio_std_four_one'=>$this->input->post('ratio_std_four_one'),
     'ratio_std_four_two'=>$this->input->post('ratio_std_four_two'),
     'ratio_std_four_three'=>$this->input->post('ratio_std_four_three'),
     'ratio_std_four_four'=>$this->input->post('ratio_std_four_four'),
     'ratio_std_four_five'=>$this->input->post('ratio_std_four_five'),
     'ratio_std_five_one'=>$this->input->post('ratio_std_five_one'),
     'ratio_std_five_two'=>$this->input->post('ratio_std_five_two'),
     'ratio_std_five_three'=>$this->input->post('ratio_std_five_three'),
     'ratio_std_five_four'=>$this->input->post('ratio_std_five_four'),
     'ratio_std_five_five'=>$this->input->post('ratio_std_five_five'),
     'ratio_std_six_one'=>$this->input->post('ratio_std_six_one'),
     'ratio_std_six_two'=>$this->input->post('ratio_std_six_two'),
     'ratio_std_six_three'=>$this->input->post('ratio_std_six_three'),
     'ratio_std_six_four'=>$this->input->post('ratio_std_six_four'),
     'ratio_std_six_five'=>$this->input->post('ratio_std_six_five'),
     'ratio_std_seven_one'=>$this->input->post('ratio_std_seven_one'),
     'ratio_std_seven_two'=>$this->input->post('ratio_std_seven_two'),
     'ratio_std_seven_three'=>$this->input->post('ratio_std_seven_three'),
     'ratio_std_seven_four'=>$this->input->post('ratio_std_seven_four'),
     'ratio_std_seven_five'=>$this->input->post('ratio_std_seven_five'),
     'internal_std_one_one'=>$this->input->post('internal_std_one_one'),
     'internal_std_one_two'=>$this->input->post('internal_std_one_two'),
     'internal_std_one_three'=>$this->input->post('internal_std_one_three'),
     'internal_std_one_four'=>$this->input->post('internal_std_one_four'),
     'internal_std_one_five'=>$this->input->post('internal_std_one_five'),
     'internal_std_two_one'=>$this->input->post('internal_std_two_one'),
     'internal_std_two_two'=>$this->input->post('internal_std_two_two'),
     'internal_std_two_three'=>$this->input->post('internal_std_two_three'),
     'internal_std_two_four'=>$this->input->post('internal_std_two_four'),
     'internal_std_two_five'=>$this->input->post('internal_std_two_five'),
     'internal_std_three_one'=>$this->input->post('internal_std_three_one'),
     'internal_std_three_two'=>$this->input->post('internal_std_three_two'),
     'internal_std_three_three'=>$this->input->post('internal_std_three_three'),
     'internal_std_three_four'=>$this->input->post('internal_std_three_four'),
     'internal_std_three_five'=>$this->input->post('internal_std_three_five'),
     'internal_std_four_one'=>$this->input->post('internal_std_four_one'),
     'internal_std_four_two'=>$this->input->post('internal_std_four_two'),
     'internal_std_four_three'=>$this->input->post('internal_std_four_three'),
     'internal_std_four_four'=>$this->input->post('internal_std_four_four'),
     'internal_std_four_five'=>$this->input->post('internal_std_four_five'),
     'internal_std_five_one'=>$this->input->post('internal_std_five_one'),
     'internal_std_five_two'=>$this->input->post('internal_std_five_two'),
     'internal_std_five_three'=>$this->input->post('internal_std_five_three'),
     'internal_std_five_four'=>$this->input->post('internal_std_five_four'),
     'internal_std_five_five'=>$this->input->post('internal_std_five_five'),
     'internal_std_six_one'=>$this->input->post('internal_std_six_one'),
     'internal_std_six_two'=>$this->input->post('internal_std_six_two'),
     'internal_std_six_three'=>$this->input->post('internal_std_six_three'),
     'internal_std_six_four'=>$this->input->post('internal_std_six_four'),
     'internal_std_six_five'=>$this->input->post('internal_std_six_five'),
     'internal_std_seven_one'=>$this->input->post('internal_std_seven_one'),
     'internal_std_seven_two'=>$this->input->post('internal_std_seven_two'),
     'internal_std_seven_three'=>$this->input->post('internal_std_seven_three'),
     'internal_std_seven_four'=>$this->input->post('internal_std_seven_four'),
     'internal_std_seven_five'=>$this->input->post('internal_std_seven_five'),
     'average_std'=>$this->input->post('average_std'),
     'average_sample_one'=>$this->input->post('average_sample_one'),
     'average_sample_two'=>$this->input->post('average_sample_two'),
     'average_sample_three'=>$this->input->post('average_sample_three'),
     'average_sample_four'=>$this->input->post('average_sample_four'),
     'average_sample_five'=>$this->input->post('average_sample_five'),
     'average_sample_six'=>$this->input->post('average_sample_six'),
     'ratio_std_one_average'=>$this->input->post('ratio_std_one_average'),
     'ratio_std_two_average'=>$this->input->post('ratio_std_two_average'),
     'ratio_std_three_average'=>$this->input->post('ratio_std_three_average'),
     'ratio_std_four_average'=>$this->input->post('ratio_std_four_average'),
     'ratio_std_five_average'=>$this->input->post('ratio_std_five_average'),
     'ratio_std_six_average'=>$this->input->post('ratio_std_six_average'),
     'ratio_std_seven_average'=>$this->input->post('ratio_std_seven_average'),
     'internal_std_one_average'=>$this->input->post('internal_std_one_average'),
     'internal_std_two_average'=>$this->input->post('internal_std_two_average'),
     'internal_std_three_average'=>$this->input->post('internal_std_three_average'),
     'internal_std_four_average'=>$this->input->post('internal_std_four_average'),
     'internal_std_five_average'=>$this->input->post('internal_std_five_average'),
     'internal_std_six_average'=>$this->input->post('internal_std_six_average'),
     'internal_std_seven_average'=>$this->input->post('internal_std_seven_average')
     

    );

    $data_six = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'requirement'=>$this->input->post(''),
     'comment'=>$this->input->post('')

    );

     $data_seven = array(
     
     'assignment_id'=>$assignment_id,
     'test_request_id'=>$test_request_id,
     'assay_hplc_internal_method_id'=>$assay_hplc_internal_method_id,
     'method'=>$this->input->post('method'),
     'specification'=>$this->input->post('specification'),
     'conclusion'=>$this->input->post('conclusion'),
     'supervisor'=>$this->input->post('supervisor'),
     'date_tested'=>$this->input->post('date'),
     'further_comments'=>$this->input->post('further_comments')

    );

    $this->db->insert('coa',$data_seven);
    $this->db->insert('assay_hplc_internal_method_chromatography_checklist',$data_six);
    $this->db->insert('assay_hplc_internal_method_peak_area_chromatograms',$data_five);
    $this->db->insert('assay_hplc_internal_method_reagents',$data_four);
    $this->db->insert('assay_hplc_internal_method_chromatograms',$data_three);
    $this->db->insert('assay_hplc_internal_method_chromatographic_conditions',$data_two);
    $this->db->insert('assay_hplc_internal_method', $data);
    redirect('test/index/'.$assignment_id.'/'.$test_request_id.'/'.$test_type_id);
  }
}
?>
