<?php
class Temperature_Humidity_Model extends CI_Model{
 function __construct(){

      parent::__construct();
    }
    
 function process(){  
  //Variable Sets
  $limits=" ";
  $id=1;
  $user =$this->input->post('user');
  $ht_location=$this->input->post('ht_location');
  
  
 
  if($ht_location==1){
   $temp_id=$this->input->post('temp_id');
   $collected_temp=$this->input->post('collected_temp');
   $standard_max_limit=$this->input->post('max_temp');
   $standard_min_limit=$this->input->post('min_temp');
   $min_temp_corrected=$this->input->post('min_temp_corrected');
   $max_temp_corrected=$this->input->post('max_temp_corrected');
   $min_temp=$this->input->post('min_temp');
   $max_temp=$this->input->post('max_temp');
   $ht_date=$this->input->post('ht_date');
   $ht_location=$this->input->post('ht_location');
   $min_humidity=$this->input->post('min_humidity');
   $min_humidity_corrected=$this->input->post('min_humidity_corrected');
   $max_humidity=$this->input->post('max_humidity');
   $max_humidity_corrected=$this->input->post('max_humidity_corrected');
   $equipment_used=$this->input->post('equipmentused');
   $standard_min_temp=$this->input->post('standard_min_temp');
   $standard_max_temp=$this->input->post('standard_max_temp');
   $standard_max_humidity=$this->input->post('standard_max_humidity');
   $standard_min_humidity=$this->input->post('standard_min_humidity');
   $humidity_limits="relative humidity of 60% to 70%";
   $ht_location="Freezer";
   $limits= "-1C to 5C";

   //Data Insertion
  $data= array(  
   'collected_temp'=>$collected_temp,
   'standard_max_limit'=>$standard_max_limit,
   'standard_min_limit'=>$standard_min_limit,
   'ht_date'=>$ht_date,
   'ht_location'=>$ht_location,
   'limits'=>$limits,
   'humidity_limits'=>$humidity_limits,
   'min_temp'=>$min_temp,
   'min_temp_corrected'=>$min_temp_corrected,
   'max_temp'=>$max_temp,
   'max_temp_corrected'=>$max_temp_corrected,
   'min_humidity'=>$min_humidity,
   'min_humidity_corrected'=>$min_humidity_corrected,
   'max_humidity'=>$max_humidity,
   'max_humidity_corrected'=>$max_humidity_corrected,
   'equipment_used'=>$equipment_used,
   'standard_min_temp'=>$standard_min_temp,
   'standard_max_temp'=>$standard_max_temp,
   'standard_max_humidity'=>$standard_max_humidity,
   'standard_min_humidity'=>$standard_min_humidity,
   'who'=>$user,
   
   
  );
  $this->db->insert('humiditytemp',$data);
  redirect('temperature_humidity_list/records/'.$id);
  }elseif($ht_location==2){
   $temp_id=$this->input->post('temp_id');
   $collected_temp=$this->input->post('collected_temp');
   $standard_max_limit=$this->input->post('max_temp');
   $standard_min_limit=$this->input->post('min_temp');
   $min_temp=$this->input->post('l_min_temp');
   $min_temp_corrected=$this->input->post('l_min_temp_corrected');
   $max_temp=$this->input->post('l_max_temp');
   $max_temp_corrected=$this->input->post('l_max_temp_corrected');
   $ht_date=$this->input->post('ht_date');
   $ht_location=$this->input->post('ht_location');
   $min_humidity=$this->input->post('l_min_humidity');
   $min_humidity_corrected=$this->input->post('l_min_humidity_corrected');
   $max_humidity=$this->input->post('l_max_humidity');
   $max_humidity_corrected=$this->input->post('l_max_humidity_corrected');
   $equipment_used=$this->input->post('equipmentusedb');
   $standard_min_temp=$this->input->post('l_standard_min_temp');
   $standard_max_temp=$this->input->post('l_standard_max_temp');
   $standard_max_humidity=$this->input->post('l_standard_max_humidity');
   $standard_min_humidity=$this->input->post('l_standard_min_humidity');
   $humidity_limits="relative humidity of 60% to 70%";
   $ht_location="Laboratory Working Area";
   $limits= "15C to 25C";
  
   //Data Insertion
  $data= array(  
   'collected_temp'=>$collected_temp,
   'standard_max_limit'=>$standard_max_limit,
   'standard_min_limit'=>$standard_min_limit,
   'ht_date'=>$ht_date,
   'ht_location'=>$ht_location,
   'limits'=>$limits,
   'humidity_limits'=>$humidity_limits,
   'min_temp'=>$min_temp,
   'min_temp_corrected'=>$min_temp_corrected,
   'max_temp'=>$max_temp,
   'max_temp_corrected'=>$max_temp_corrected,
   'min_humidity'=>$min_humidity,
   'min_humidity_corrected'=>$min_humidity_corrected,
   'max_humidity'=>$max_humidity,
   'max_humidity_corrected'=>$max_humidity_corrected,
   'equipment_used'=>$equipment_used,
   'standard_min_temp'=>$standard_min_temp,
   'standard_max_temp'=>$standard_max_temp,
   'standard_max_humidity'=>$standard_max_humidity,
   'standard_min_humidity'=>$standard_min_humidity,
   'who'=>$user,
   
   
  );
  $this->db->insert('humiditytemp',$data);
  redirect('temperature_humidity_list/records/'.$id);
  }else  if($ht_location==3){
   $temp_id=$this->input->post('temp_id');
   $collected_temp=$this->input->post('collected_temp');
   $standard_max_limit=$this->input->post('max_temp');
   $standard_min_limit=$this->input->post('min_temp');
   $min_temp=$this->input->post('s_min_temp');
   $min_temp_corrected=$this->input->post('s_min_temp_corrected');
   $max_temp=$this->input->post('s_max_temp');
   $max_temp_corrected=$this->input->post('s_max_temp_corrected');
   $ht_date=$this->input->post('ht_date');
   $ht_location=$this->input->post('ht_location');
   $min_humidity=$this->input->post('s_min_humidity');
   $min_humidity_corrected=$this->input->post('s_min_humidity_corrected');
   $max_humidity=$this->input->post('s_max_humidity');
   $max_humidity_corrected=$this->input->post('s_max_humidity_corrected');
   $equipment_used=$this->input->post('equipmentuseda');
   $standard_min_temp=$this->input->post('s_standard_min_temp');
   $standard_max_temp=$this->input->post('s_standard_max_temp');
   $standard_max_humidity=$this->input->post('s_standard_max_humidity');
   $standard_min_humidity=$this->input->post('s_standard_min_humidity');
   $humidity_limits="relative humidity of 60% to 70%";
   $ht_location="Sample Store";
   $limits= "9C to 25C";

   //Data Insertion
  $data= array(  
   'collected_temp'=>$collected_temp,
   'standard_max_limit'=>$standard_max_limit,
   'standard_min_limit'=>$standard_min_limit,
   'ht_date'=>$ht_date,
   'ht_location'=>$ht_location,
   'limits'=>$limits,
   'humidity_limits'=>$humidity_limits,
   'min_temp'=>$min_temp,
   'min_temp_corrected'=>$min_temp_corrected,
   'max_temp'=>$max_temp,
   'max_temp_corrected'=>$max_temp_corrected,
   'min_humidity'=>$min_humidity,
   'min_humidity_corrected'=>$min_humidity_corrected,
   'max_humidity'=>$max_humidity,
   'max_humidity_corrected'=>$max_humidity_corrected,
   'equipment_used'=>$equipment_used,
   'standard_min_temp'=>$standard_min_temp,
   'standard_max_temp'=>$standard_max_temp,
   'standard_max_humidity'=>$standard_max_humidity,
   'standard_min_humidity'=>$standard_min_humidity,
   'who'=>$user,
   
   
  );
  $this->db->insert('humiditytemp',$data);
  redirect('temperature_humidity_list/records/'.$id);

  }else  if($ht_location==4){
   $temp_id=$this->input->post('temp_id');
   $collected_temp=$this->input->post('collected_temp');
   $standard_max_limit=$this->input->post('max_temp');
   $standard_min_limit=$this->input->post('min_temp');
   $min_temp=$this->input->post('i_min_temp');
   $min_temp_corrected=$this->input->post('i_min_temp_corrected');
   $max_temp=$this->input->post('i_max_temp');
   $max_temp_corrected=$this->input->post('i_max_temp_corrected');
   $ht_date=$this->input->post('ht_date');
   $ht_location=$this->input->post('ht_location');
   $min_humidity=$this->input->post('i_min_humidity');
   $min_humidity_corrected=$this->input->post('i_min_humidity_corrected');
   $max_humidity=$this->input->post('i_max_humidity');
   $max_humidity_corrected=$this->input->post('i_max_humidity_corrected');
   $equipment_used=$this->input->post('equipmentusedc');
   $standard_min_temp=$this->input->post('i_standard_min_temp');
   $standard_max_temp=$this->input->post('i_standard_max_temp');
   $standard_max_humidity=$this->input->post('i_standard_max_humidity');
   $standard_min_humidity=$this->input->post('i_standard_min_humidity');
   $humidity_limits="relative humidity of 60% to 70%";
   $ht_location="Instrument Room";
   $limits= "15C to 25C";

   //Data Insertion
  $data= array(  
   'collected_temp'=>$collected_temp,
   'standard_max_limit'=>$standard_max_limit,
   'standard_min_limit'=>$standard_min_limit,
   'ht_date'=>$ht_date,
   'ht_location'=>$ht_location,
   'limits'=>$limits,
   'humidity_limits'=>$humidity_limits,
   'min_temp'=>$min_temp,
   'min_temp_corrected'=>$min_temp_corrected,
   'max_temp'=>$max_temp,
   'max_temp_corrected'=>$max_temp_corrected,
   'min_humidity'=>$min_humidity,
   'min_humidity_corrected'=>$min_humidity_corrected,
   'max_humidity'=>$max_humidity,
   'max_humidity_corrected'=>$max_humidity_corrected,
   'equipment_used'=>$equipment_used,
   'standard_min_temp'=>$standard_min_temp,
   'standard_max_temp'=>$standard_max_temp,
   'standard_max_humidity'=>$standard_max_humidity,
   'standard_min_humidity'=>$standard_min_humidity,
   'who'=>$user,
   
   
  );
  $this->db->insert('humiditytemp',$data);
  redirect('temperature_humidity_list/records/'.$id);
  }else  if($ht_location==5){
   $temp_id=$this->input->post('temp_id');
   $collected_temp=$this->input->post('collected_temp');
   $standard_max_limit=$this->input->post('max_temp');
   $standard_min_limit=$this->input->post('min_temp');
   $min_temp=$this->input->post('ref_min_temp');
   $min_temp_corrected=$this->input->post('ref_min_temp_corrected');
   $max_temp=$this->input->post('ref_max_temp');
   $max_temp_corrected=$this->input->post('ref_max_temp_corrected');
   $ht_date=$this->input->post('ht_date');
   $ht_location=$this->input->post('ht_location');
   $min_humidity=$this->input->post('ref_min_humidity');
   $min_humidity_corrected=$this->input->post('ref_min_humidity_corrected');
   $max_humidity=$this->input->post('ref_max_humidity');
   $max_humidity_corrected=$this->input->post('ref_max_humidity_corrected');
   $equipment_used=$this->input->post('equipmentusedd');
   $standard_min_temp=$this->input->post('ref_standard_min_temp');
   $standard_max_temp=$this->input->post('ref_standard_max_temp');
   $standard_max_humidity=$this->input->post('ref_standard_max_humidity');
   $standard_min_humidity=$this->input->post('ref_standard_min_humidity');
   $equipment_used=$this->input->post('ref_equipment_used');
   $humidity_limits="relative humidity of 60% to 70%";
   $ht_location="Refrigerator";
   $limits= "15C to 25C";

   //Data Insertion
  $data= array(  
   'collected_temp'=>$collected_temp,
   'standard_max_limit'=>$standard_max_limit,
   'standard_min_limit'=>$standard_min_limit,
   'ht_date'=>$ht_date,
   'ht_location'=>$ht_location,
   'limits'=>$limits,
   'humidity_limits'=>$humidity_limits,
   'min_temp'=>$min_temp,
   'min_temp_corrected'=>$min_temp_corrected,
   'max_temp'=>$max_temp,
   'max_temp_corrected'=>$max_temp_corrected,
   'min_humidity'=>$min_humidity,
   'min_humidity_corrected'=>$min_humidity_corrected,
   'max_humidity'=>$max_humidity,
   'max_humidity_corrected'=>$max_humidity_corrected,
   'equipment_used'=>$equipment_used,
   'standard_min_temp'=>$standard_min_temp,
   'standard_max_temp'=>$standard_max_temp,
   'standard_max_humidity'=>$standard_max_humidity,
   'standard_min_humidity'=>$standard_min_humidity,
   'who'=>$user,
   
   
  );
  $this->db->insert('humiditytemp',$data);
  redirect('temperature_humidity_list/records/'.$id);    
     
  }else{
    redirect('temperature_humidity_list/records/'.$id);    
  
  }
 }

}
?>
