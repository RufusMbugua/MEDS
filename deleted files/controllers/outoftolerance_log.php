<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Outoftolerance_Log extends CI_Controller{

	function Outoftolerance_Log(){

		parent ::__construct();
	}

	function Logs(){

		$id = $this->uri->segment(3);

		$this->load->model('outoftolerance_logmodel');
		$this->outoftolerance_logmodel->log($id);
	}

}
?> 