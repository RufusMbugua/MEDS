<?php
error_reporting(1);
class Analytics extends CI_Controller
{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('analytics_model');
    }
    
    /**
     * [index description]
     * @return [type] [description]
     */
    public function index() {
        $data['content'] = 'analytics/dashboard';
        $this->template($data);
    }
    
    /**
     * [template description]
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function template($data) {
        $data['head'] = 'analytics/head';
        $data['footer'] = 'analytics/footer';
        $data['header'] = 'analytics/header';
        
        $this->load->view('analytics/index', $data);
    }
    
    /**
     * [turnaround_time description]
     * @return [type] [description]
     */
    public function turnaround_time() {
        $results = $this->analytics_model->turnaround_time();
        
        /**
         * Formats Data
         */
        foreach ($results as $result) {
            $active_ingredients = $result['active_ingredients'];
            
            // echo $test;
            $data[$active_ingredients] = $result['turnaround'];
        }
        
        /**
         * Prepares Array for HighCharts, group data by Remark
         * @var [type]
         */
        foreach ($data as $key => $value) {
            $category[] = $key;
            
            $fData[] = (int)$value;
        }
        krsort($fData);
        $colors = array('black', 'grey', '#66aaf7');
        $counter = 0;
        
        $resultArray[] = array('name' => 'Active Ingredients', 'data' => array_values($fData));
        
        $this->populateGraph($resultArray, '', $category, '', 'percentage', 0, 'bar', $filter);
    }
    
    /**
     * [failure_rate description]
     * @return [type] [description]
     */
    public function failure_rate() {
        $results = $this->analytics_model->failure_rate();
        
        /**
         * Formats Data
         */
        foreach ($results as $result) {
            $test = $result['test_name'];
            
            // echo $test;
            $data[$test][$result['remarks']]+= $result['total'];
        }
        
        /**
         * Cleans Data
         * @var [type]
         */
        foreach ($data as $test => $value) {
            foreach ($value as $remark => $total) {
                if (array_key_exists('Complies', $value)) {
                    $gData[$test][$remark] = (int)$total;
                } else {
                    $gData[$test]['Complies'] = 0;
                }
                if (array_key_exists('Does Not Comply', $value)) {
                    $gData[$test][$remark] = (int)$total;
                } else {
                    $gData[$test]['Does Not Comply'] = 0;
                }
            }
        }
        
        /**
         * Prepares Array for HighCharts, group data by Remark
         * @var [type]
         */
        foreach ($gData as $key => $value) {
            $category[] = $key;
            foreach ($value as $k => $total) {
                $fData[$k][] = $total;
            }
        }
        krsort($fData);
        $colors = array('red', 'green');
        $counter = 0;
        foreach ($fData as $key => $value) {
            $resultArray[] = array('name' => $key, 'data' => $value, 'color' => $colors[$counter]);
            $counter++;
        }
        
        $this->populateGraph($resultArray, '', $category, '', 'percentage', 0, 'column');
    }
    
    /**
     * [income_generated description]
     * @return [type] [description]
     */
    public function income_generated($date, $scope) {
        
        $date = explode('-', $date);
        switch ($scope) {
            case 'day':
                $date = $date[0] . '-' . $date[1] . '-' . $date[2];
                break;

            case 'month':
                $date = $date[0] . '-' . $date[1];
                break;

            case 'year':
                $date = $date[0];
                break;
        }
        $results = $this->analytics_model->income_generated($date);
        
        foreach ($results as $key => $value) {
            $data[] = array('name' => $value['applicant_name'], 'y' => (int)$value['total']);
        }
        $resultArray[] = array('name' => 'Income Generated', 'data' => $data);
        $filter = array('Duration' => '<select class="filter_scope"><option>Choose</option><option value="day">Day</option><option value="month">Month</option><option value="year">Year</option></select>');
        
        $this->populateGraph($resultArray, ' ', $category, 'percentage', '', 0, 'pie', $filter);
    }
    
    /**
     * [quotation_conversion description]
     * @return [type] [description]
     */
    public function quotation_conversion($date, $scope) {
        
        $date = explode('-', $date);
        switch ($scope) {
            case 'day':
                $date = $date[0] . '-' . $date[1] . '-' . $date[2];
                break;

            case 'month':
                $date = $date[0] . '-' . $date[1];
                break;

            case 'year':
                $date = $date[0];
                break;
        }
        $results = $this->analytics_model->quotation_conversion($date);
        
        foreach ($results['percentage'] as $key => $value) {
            $data = array(array('name' => 'Paid', 'y' => (int)$value['percentage'], 'drilldown' => 'complete'), array('name' => 'Unpaid', 'y' => 100 - (int)$value['percentage']));
        }
        $resultArray[] = array('name' => '% Quotation', 'data' => $data);
        
        // echo '<pre>';print_r($resultArray);die;
        
        foreach ($results['drilldown'] as $key => $value) {
            $drilldown[] = array($value['active_ingredients'], (int)$value['status']);
        }
        $drilldownArray[] = array('id' => 'complete', 'data' => $drilldown);
        $filter = array('Duration' => '<select class="filter_scope"><option>Choose</option><option value="day">Day</option><option value="month">Month</option><option value="year">Year</option></select>');
        
        $this->populateGraph($resultArray, $drilldownArray, $category, 'percentage', '', 0, 'pie', $filter);
        
        // echo '<pre>';print_r($resultArray);die;
        
        
    }
    
    /**
     * [analyst_performance description]
     * @return [type] [description]
     */
    public function analyst_performance($date, $scope) {
        
        $date = explode('-', $date);
        switch ($scope) {
            case 'day':
                $date = $date[0] . '-' . $date[1] . '-' . $date[2];
                break;

            case 'month':
                $date = $date[0] . '-' . $date[1];
                break;

            case 'year':
                $date = $date[0];
                break;
        }
        $results = $this->analytics_model->analyst_performance($date);
        
        /**
         * Formats Data
         */
        foreach ($results as $result) {
            $analyst = $result['analyst'];
            // echo $test;
            $data[$analyst][$result['request_status']] = $result['total'];
        }
        // echo '<pre>';print_r($data);die;
        /**
         * Cleans Data
         * @var [type]
         */
        foreach ($data as $test => $value) {
            foreach ($value as $remark => $total) {
                if (array_key_exists('0', $value)) {
                    $gData[$test][$remark] = (int)$total;
                } else {
                    $gData[$test]['0'] = 0;
                }
                if (array_key_exists('1', $value)) {
                    $gData[$test][$remark] = (int)$total;
                } else {
                    $gData[$test]['1'] = 0;
                }
                if (array_key_exists('2', $value)) {
                    $gData[$test][$remark] = (int)$total;
                } else {
                    $gData[$test]['2'] = 0;
                }
            }
        }
        // echo '<pre>';print_r($gData);die;
        /**
         * Prepares Array for HighCharts, group data by Remark
         * @var [type]
         */
        foreach ($gData as $key => $value) {
            $category[] = $key;
            foreach ($value as $k => $total) {
                switch ($k) {
                    case 0:
                        $k = 'Unassigned';
                        break;

                    case 1:
                        $k = 'Pending';
                        break;

                    case 2:
                        $k = 'Complete';
                        break;
                }
                $fData[$k][] = $total;
            }
        }
        krsort($fData);
        $colors = array('#dcdad8', '#f2b266', '#62d56a');
        $counter = 0;
        foreach ($fData as $key => $value) {
            $resultArray[] = array('name' => $key, 'data' => $value, 'color' => $colors[$counter]);
            $counter++;
        }
        
        $filter = array('Duration' => '<select class="filter_scope"><option>Choose</option><option value="day">Day</option><option value="month">Month</option><option value="year">Year</option></select>');
        
        $this->populateGraph($resultArray, '', $category, '', 'percentage', 0, 'bar', $filter);
    }
    
    public function samples($graph_filter) {
        $graph_filter = urldecode($graph_filter);
        $graph_filter = (array)json_decode(urldecode($graph_filter));
        
        // var_dump($graph_filter['date']);die;
        
        $date = $graph_filter['date'];
        $scope = $graph_filter['scope'];
        $choice = $graph_filter['choice'];
        
        $date = explode('-', $date);
        
        // var_dump( $date);die;
        switch ($scope) {
            case 'day':
                $date = $date[0] . '-' . $date[1] . '-' . $date[2];
                break;

            case 'month':
                $date = $date[0] . '-' . $date[1];
                break;

            case 'year':
                $date = $date[0];
                break;
        }
        
        // echo $date;
        $results = $this->analytics_model->samples($date);
        
        // $categoryOptions = '';
        // echo '<pre>';print_r($results);
        foreach ($results as $key => $value) {
            $applicants[] = $value['applicant_name'];
            
            // $categoryOptions.= '<option>' . $value['request_status'] . '</option>';
            $data[$value['request_status']][$value['active_ingredients']][$value['applicant_name']] = $value['total'];
        }
        $options = '';
        $categoryOptions = array_keys($data);
        foreach ($categoryOptions as $value) {
            $options.= '<option>' . $value . '</option>';
        }
        
        $applicants = array_unique($applicants);
        foreach ($applicants as $key => $value) {
            $applicantArray[] = $value;
        }
        $applicants = $applicantArray;
        
        $applicantCounter = 0;
        foreach ($data[$choice] as $key => $value) {
            foreach ($applicants as $applicant) {
                if (array_key_exists($applicant, $value)) {
                    $gData[$key][$applicant] = $value[$applicant];
                } else {
                    $gData[$key][$applicant] = 0;
                }
            }
        }
        // echo '<pre>';print_r($gData);die;
        foreach ($gData as $key => $value) {
            $stack = $key;
            $fData = array();
            foreach ($value as $k => $v) {
                $category[] = $k;
                
                $fData[] = array('name' => $v, 'y' => (int)$v);
            }
            $resultArray[] = array('name' => $key, 'data' => $fData);
        }
         $category = array_unique($category);
         $category = array_values($category);
        // echo '<pre>';print_r($category);die;
        $filter["Duration"] = '<select class="filter_scope"><option>Choose</option><option value="day">Day</option><option value="month">Month</option><option value="year">Year</option></select>';
        $filter["Category"] = '<select class="category_scope">' . $options . '</select>';
        
        $this->populateGraph($resultArray, '', $category, '', 'percentage', 0, 'bar', $filter);
        
        // echo '<pre>';print_r();die;
        
        
    }
    
    /**
     * [populateGraph description]
     * @param  string  $resultArray  [description]
     * @param  string  $drilldown    [description]
     * @param  string  $category     [description]
     * @param  string  $criteria     [description]
     * @param  string  $stacking     [description]
     * @param  integer $margin       [description]
     * @param  string  $type         [description]
     * @param  string  $resultSize   [description]
     * @param  string  $for          [description]
     * @param  string  $parent       [description]
     * @param  string  $statistics   [description]
     * @param  string  $color_scheme [description]
     * @return [type]                [description]
     */
    public function populateGraph($resultArray = '', $drilldown = '', $category = '', $criteria = '', $stacking = '', $margin = 0, $type = '', $filter = NULL) {
        $datas = array();
        $chart_size = (count($category) < 5) ? 5 : count($category);
        
        //echo $given_size*80;die;
        $datas['container'] = 'chart_' . $criteria . mt_rand();
        $datas['chart_type'] = $type;
        
        switch ($type) {
            case 'line':
            case 'column':
                
                // $datas['chart_width'] = '100%';//($resultSize != '') ? $given_size * 30 : $chart_size * 30;
                $datas['chart_length'] = $chart_size * 40;
                $datas['chart_label_rotation'] = (int) - 65;
                $datas['chart_legend_floating'] = false;
                $datas['chart_margin'] = 50;
                break;

            default:
                $datas['chart_length'] = $chart_size * 40;
                $datas['chart_label_rotation'] = (int)0;
                $datas['chart_legend_floating'] = false;
                $datas['chart_margin'] = 0;
                
                //$datas['chart_width'] = 100;
                break;
        }
        $datas['filter'] = $filter;
        
        $datas['chart_stacking'] = $stacking;
        $datas['color_scheme'] = array('#66aaf7', '#f66c6f', '#8bbc21', '#910000', '#1aadce', '#492970', '#f28f43', '#77a1e5', '#c42525', '#a6c96a');
        
        $datas['chart_categories'] = $category;
        $datas['chart_title'] = 'Values';
        $datas['chart_drilldown'] = $drilldown;
        $datas['chart_series'] = $resultArray;
        echo json_encode($datas);
    }
}
