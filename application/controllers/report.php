<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Report extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		$sql = "SELECT DATE_FORMAT(ht_date,'%v/%x') as period
				FROM humiditytemp 
				GROUP BY DATE_FORMAT(ht_date,'%v/%x')
				ORDER BY DATE_FORMAT(ht_date,'%v/%x') asc";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		echo "$sql";
			print_r($results);die;
		$weeks = array();
		foreach ($results as $result) {
			$weeks[] = $result['period'];
		}
		foreach ($weeks as $week) {
			$freezer = 0;

			$sql2 = "SELECT ht_location as location,collected_temp as total
				    FROM humiditytemp 
				    WHERE DATE_FORMAT(ht_date,'%v/%x')='$week'
				    GROUP BY ht_location";
			$query = $this -> db -> query($sql);
			$results2 = $query -> result_array();
			

			if ($results) {
				foreach ($results2 as $result) {
					if ($result['location'] == "Freezer") {
						$freezer = intval($result['total']);
					}
				}
			}
			$freezer_data[] = $freezer;

		}

		//Standard Line
		foreach ($freezer_data as $myfreezer) {
			$standard_data[] = intval(-20);
			$max_data[] = intval(-17);
			$min_data[] = intval(-23);
		}

		$main_array[] = array('type' => 'column', 'name' => 'Freezer', 'data' => $freezer_data);
		$main_array[] = array('type' => 'line', 'name' => 'Standard Temperature', 'data' => $standard_data);
		$main_array[] = array('type' => 'line', 'name' => 'Max Temperature', 'data' => $max_data);
		$main_array[] = array('type' => 'line', 'name' => 'Min Temperature', 'data' => $min_data);
		/**/
		$total_array = json_encode($main_array, JSON_PRETTY_PRINT);

		$data['my_series'] = $total_array;
		$data['categories'] = json_encode($weeks);
		//$data['standard'] = json_encode($standard);
		$this -> load -> view('freezer_temp_report', $data);
	}

	function sample_store() {
		$sql = "SELECT DATE_FORMAT(ht_date,'%v/%x') as period
				FROM humiditytemp 
				GROUP BY DATE_FORMAT(ht_date,'%v/%x')
				ORDER BY DATE_FORMAT(ht_date,'%v/%x') asc";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		$weeks = array();
		foreach ($results as $result) {
			$weeks[] = $result['period'];
		}
		foreach ($weeks as $week) {

			$stores = 0;

			$sql = "SELECT ht_location as location,min_temp as total
				    FROM humiditytemp 
				    WHERE DATE_FORMAT(ht_date,'%v/%x')='$week'
				    GROUP BY ht_location";
			$query = $this -> db -> query($sql);
			$results = $query -> result_array();
			if ($results) {
				foreach ($results as $result) {
					if ($result['location'] == "Sample Store") {
						$stores = intval($result['total']);
					}
				}
			}

			$stores_data[] = $stores;

		}
		//Standard Line
		foreach ($stores_data as $myfreezer) {
			$standard_data[] = intval(20);
			$max_data[] = intval(9);
			$min_data[] = intval(25);
		}
		$main_array[] = array('name' => 'Sample Store', 'data' => $stores_data);
		$main_array[] = array('type' => 'line', 'name' => 'Standard Temperature', 'data' => $standard_data);
		$main_array[] = array('type' => 'line', 'name' => 'Max Temperature', 'data' => $max_data);
		$main_array[] = array('type' => 'line', 'name' => 'Min Temperature', 'data' => $min_data);
		$total_array = json_encode($main_array, JSON_PRETTY_PRINT);
		$data['my_series'] = $total_array;
		$data['my_series_ss'] =$this->sample_store_humidity();
		$data['categories'] = json_encode($weeks);
		$this -> load -> view('sample_store_report', $data);
	}
	function sample_store_humidity(){
		$sql = "SELECT DATE_FORMAT(ht_date,'%v/%x') as period
				FROM humiditytemp 
				GROUP BY DATE_FORMAT(ht_date,'%v/%x')
				ORDER BY DATE_FORMAT(ht_date,'%v/%x') asc";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		$weeks = array();
		foreach ($results as $result) {
			$weeks[] = $result['period'];
		}
		foreach ($weeks as $week) {

			$stores = 0;

			$sql = "SELECT ht_location as location,min_humidity as total
				    FROM humiditytemp 
				    WHERE DATE_FORMAT(ht_date,'%v/%x')='$week'
				    GROUP BY ht_location";
			$query = $this -> db -> query($sql);
			$results = $query -> result_array();
			if ($results) {
				foreach ($results as $result) {
					if ($result['location'] == "Sample Store") {
						$stores = intval($result['total']);
					}
				}
			}

			$stores_data[] = $stores;

		}
		//Standard Line
		foreach ($stores_data as $myfreezer) {
			$standard_data[] = intval(20);
			$max_data[] = intval(9);
			$min_data[] = intval(25);
		}
		$main_array[] = array('name' => 'Sample Store', 'data' => $stores_data);
		$main_array[] = array('type' => 'line', 'name' => 'Standard Humidity', 'data' => $standard_data);
		$main_array[] = array('type' => 'line', 'name' => 'Max Humidity', 'data' => $max_data);
		$main_array[] = array('type' => 'line', 'name' => 'Min Humidity', 'data' => $min_data);
		$total_array = json_encode($main_array, JSON_PRETTY_PRINT);
		return $total_array;
		
	}

	function lab() {
		$sql = "SELECT DATE_FORMAT(ht_date,'%v/%x') as period
				FROM humiditytemp 
				GROUP BY DATE_FORMAT(ht_date,'%v/%x')
				ORDER BY DATE_FORMAT(ht_date,'%v/%x') asc";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		$weeks = array();
		foreach ($results as $result) {
			$weeks[] = $result['period'];
		}
		foreach ($weeks as $week) {
			$lab = 0;

			$sql = "SELECT ht_location as location,min_temp as total
				    FROM humiditytemp 
				    WHERE DATE_FORMAT(ht_date,'%v/%x')='$week'
				    GROUP BY ht_location";
			$query = $this -> db -> query($sql);
			$results = $query -> result_array();
			if ($results) {
				foreach ($results as $result) {
					if ($result['location'] == "Laboratory Working Area") {
						$lab = intval($result['total']);
					}

				}
			}
			$lab_data[] = $lab;
		}
		//Standard Line
		foreach ($lab_data as $myfreezer) {
			$standard_data[] = intval(20);
			$max_data[] = intval(25);
			$min_data[] = intval(15);
		}
		
		$main_array[] = array('name' => 'Laboratory Working Area', 'data' => $lab_data);
		$main_array[] = array('type' => 'line', 'name' => 'Standard Temperature', 'data' => $standard_data);
		$main_array[] = array('type' => 'line', 'name' => 'Max Temperature', 'data' => $max_data);
		$main_array[] = array('type' => 'line', 'name' => 'Min Temperature', 'data' => $min_data);
		$total_array = json_encode($main_array, JSON_PRETTY_PRINT);
		$data['my_series'] = $total_array;
		$data['categories'] = json_encode($weeks);
		$this -> load -> view('laboratory_area_report', $data);
	}

	function instrument() {
		$sql = "SELECT DATE_FORMAT(ht_date,'%v/%x') as period
				FROM humiditytemp 
				GROUP BY DATE_FORMAT(ht_date,'%v/%x')
				ORDER BY DATE_FORMAT(ht_date,'%v/%x') asc";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		$weeks = array();
		foreach ($results as $result) {
			$weeks[] = $result['period'];
		}
		foreach ($weeks as $week) {
			$instrument = 0;

			$sql = "SELECT ht_location as location,min_temp as total
				    FROM humiditytemp 
				    WHERE DATE_FORMAT(ht_date,'%v/%x')='$week'
				    GROUP BY ht_location";
			$query = $this -> db -> query($sql);
			$results = $query -> result_array();
			if ($results) {
				foreach ($results as $result) {
					if ($result['location'] == "Instrument Room") {
						$instrument = intval($result['total']);
					}
				}
			}
			$instrument_data[] = $instrument;
		}
		//Standard Line
		foreach ($instrument_data as $myfreezer) {
			$standard_data[] = intval(20);
			$max_data[] = intval(25);
			$min_data[] = intval(15);
		}
		$main_array[] = array('name' => 'Instrument Room', 'data' => $instrument_data);
		$main_array[] = array('type' => 'line', 'name' => 'Standard Temperature', 'data' => $standard_data);
		$main_array[] = array('type' => 'line', 'name' => 'Max Temperature', 'data' => $max_data);
		$main_array[] = array('type' => 'line', 'name' => 'Min Temperature', 'data' => $min_data);
		$total_array = json_encode($main_array, JSON_PRETTY_PRINT);
		$data['my_series'] = $total_array;
		$data['my_series1']=$this->instrument_humidity();
		$data['categories'] = json_encode($weeks);
		$this -> load -> view('instrument_room_report', $data);
	}

	function instrument_humidity(){
		    $sql = "SELECT DATE_FORMAT(ht_date,'%v/%x') as period
					FROM humiditytemp 
					GROUP BY DATE_FORMAT(ht_date,'%v/%x')
					ORDER BY DATE_FORMAT(ht_date,'%v/%x') asc";
			$query = $this -> db -> query($sql);
			$results = $query -> result_array();
			$weeks = array();
			foreach ($results as $result) {
				$weeks[] = $result['period'];
			}
			foreach ($weeks as $week) {
				$instrument = 0;

				$sql = "SELECT ht_location as location,min_humidity as total
					    FROM humiditytemp 
					    WHERE DATE_FORMAT(ht_date,'%v/%x')='$week'
					    GROUP BY ht_location";
				$query = $this -> db -> query($sql);
				$results = $query -> result_array();
				if ($results) {
					foreach ($results as $result) {
						if ($result['location'] == "Instrument Room") {
							$instrument = intval($result['total']);
						}
					}
				}
				$instrument_data[] = $instrument;
			}
			//Standard Line
			foreach ($instrument_data as $myfreezer) {
				$standard_data[] = intval(20);
				$max_data[] = intval(25);
				$min_data[] = intval(15);
			}
			$main_array[] = array('name' => 'Instrument Room', 'data' => $instrument_data);
			$main_array[] = array('type' => 'line', 'name' => 'Standard Humidity', 'data' => $standard_data);
			$main_array[] = array('type' => 'line', 'name' => 'Max Humidity', 'data' => $max_data);
			$main_array[] = array('type' => 'line', 'name' => 'Min Humidity', 'data' => $min_data);
			$total_array = json_encode($main_array, JSON_PRETTY_PRINT);
			return $total_array;

	}

	function refrigerator() {
		$sql = "SELECT DATE_FORMAT(ht_date,'%v/%x') as period
				FROM humiditytemp 
				GROUP BY DATE_FORMAT(ht_date,'%v/%x')
				ORDER BY DATE_FORMAT(ht_date,'%v/%x') asc";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		$weeks = array();
		foreach ($results as $result) {
			$weeks[] = $result['period'];
		}
		foreach ($weeks as $week) {
			$fridge = 0;

			$sql = "SELECT ht_location as location,min_temp as total
				    FROM humiditytemp 
				    WHERE DATE_FORMAT(ht_date,'%v/%x')='$week'
				    GROUP BY ht_location";
			$query = $this -> db -> query($sql);
			$results = $query -> result_array();
			if ($results) {
				foreach ($results as $result) {
					if ($result['location'] == "Laboratory Working Area") {
						$lab = intval($result['total']);
					}
				}
			}
			$fridge_data[] = $fridge;
		}
		//Standard Line
		foreach ($fridge_data as $myfreezer) {
			$standard_data[] = intval(5);
			$max_data[] = intval(8);
			$min_data[] = intval(2);
		}
		$main_array[] = array('name' => 'Refrigerator', 'data' => $fridge_data);
		$main_array[] = array('type' => 'line', 'name' => 'Standard Temperature', 'data' => $standard_data);
		$main_array[] = array('type' => 'line', 'name' => 'Max Temperature', 'data' => $max_data);
		$main_array[] = array('type' => 'line', 'name' => 'Min Temperature', 'data' => $min_data);
		$total_array = json_encode($main_array, JSON_PRETTY_PRINT);
		$data['my_series'] = $total_array;
		$data['categories'] = json_encode($weeks);
		$this -> load -> view('refrigerator_report', $data);
	}

}
?>