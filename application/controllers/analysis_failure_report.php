<?php
if (!defined('BASEPATH'))	exit('No direct script access allowed');
class Analysis_Failure_Report extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {

			$tests = array('identification_uv','diss_normal');

		
		foreach ($tests as $test) {
		
			$sql = "SELECT count(id_uv.choice), count(diss_normal.choice)
				    FROM identification_uv id_uv, diss_normal
				    WHERE id_uv.choice='Complies' AND diss_normal.choice='Complies'";
			$query = $this -> db -> query($sql);
			$results = $query -> result_array();
			
		}
		
		$total_array = json_encode($results, JSON_PRETTY_PRINT);
		$data['my_series'] = $total_array;
		$data['categories'] = json_encode($tests);
		$this -> load -> view('analysis_failure_report_form', $data);
	}

}
?>