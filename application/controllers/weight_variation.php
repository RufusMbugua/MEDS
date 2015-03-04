<?php
class Weight_Variation extends CI_Controller {

    function __construct() {
        parent::__construct();
    }
     
    function save_weight_variation_hplc_single_comp() {
        
        $this->load->model('weight_variation_model');
        if ($this->input->post('submit')) {
            $this->weight_variation_model->process();
        }   
    }
}
