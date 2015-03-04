<?php
class Analytics_Model extends CI_Model
{
    
    public function failure_rate() {
        $query = "SELECT 
    COUNT(remarks) AS total,
    (CASE remarks
        WHEN '0' THEN 'Does Not Comply'
        ELSE remarks
    END) AS remarks,
    test_id,tr.test_name
FROM
    test_results tr
WHERE
    remarks != '' && remarks != '----'
GROUP BY  test_name, remarks
ORDER BY test_id;
        ";
        
        $resultArray = $this->db->query($query)->result_array();
        
        return $resultArray;
    }
    
    public function analyst_performance($date) {
        $query = "SELECT 
    CONCAT_WS(' ', u.fname, u.lname) AS analyst,
    COUNT(analyst_assigned_id) AS total,
    DATE_FORMAT(date_assigned, '%Y-%m-%d') AS date_assigned,
    (CASE
        WHEN tr.request_status IS NULL THEN 0
        ELSE request_status
    END) AS request_status
FROM
    assignment a
        JOIN
    user u ON (a.analyst_assigned_id = u.id)
        JOIN
    test_request tr ON (a.test_request_id = tr.id)
WHERE
    date_assigned LIKE '%".$date."%'
GROUP BY analyst , request_status;
        ";
        
        $resultArray = $this->db->query($query)->result_array();
        
        return $resultArray;
    }
    
    public function turnaround_time() {
        $query = "SELECT 
    tr.active_ingredients,
    ROUND(AVG(DATEDIFF(coa.timestamp,tr.date_time))) AS turnaround
FROM
    test_request tr,
    coa
    GROUP BY active_ingredients;
        ";
        
        $resultArray = $this->db->query($query)->result_array();
        
        return $resultArray;
    }


    public function income_generated($date) {
        $query = "SELECT 
    c.applicant_name, SUM(i.total_amount) as total, DATE_FORMAT(i.date,'%Y-%m-%d') as date
FROM
    invoice i
        JOIN
    test_request tr ON (i.test_request_id = tr.id)
        JOIN
    client c ON (tr.client_id = c.id)
    WHERE i.date LIKE '%".$date."%' 
    GROUP BY applicant_name,i.date;
        ";
        
        $resultArray = $this->db->query($query)->result_array();
        
        return $resultArray;
    }
    
    public function quotation_conversion($date) {
        $query = "SELECT 
    round((SUM(status)/COUNT(*)*100),1)as percentage
FROM
    meds.invoice i WHERE i.date LIKE '%".$date."%';
        ";
        
        $resultArray['percentage'] = $this->db->query($query)->result_array();
        
        $query = "SELECT 
    tr.active_ingredients, sum(i.status) as status
FROM
    meds.invoice i
        JOIN
    test_request tr ON (i.test_request_id = tr.id)
    WHERE status != 0 AND i.date LIKE '%".$date."%'
    GROUP BY active_ingredients;
        ";
        
        $resultArray['drilldown'] = $this->db->query($query)->result_array();
        
        return $resultArray;
    }
    public function samples($date){
        $query = "SELECT 
    tr.active_ingredients,
    s.manufacturer_name,
    s.sample_source,
    tr.applicant_name,
    (CASE 
        request_status 
            WHEN 0 THEN 'Unassigned' 
            WHEN 1 THEN 'Assigned' 
            WHEN 2 THEN 'Done : No Repeat' 
            WHEN 3 THEN 'Done : Repeat' 
            WHEN 4 THEN 'Quarantined' 
            WHEN 5 THEN 'Withdrawn' 
    END) as 
    request_status,
    COUNT(*) as total,
    DATE_FORMAT(tr.date_time,'%Y-%m-%d') as date
FROM
    sample s
        JOIN
    test_request tr ON (s.test_request_id = tr.id)
    WHERE tr.date_time LIKE '%".$date."%'
    GROUP BY 
     tr.active_ingredients,
    s.manufacturer_name,
    s.sample_source,
    tr.applicant_name;
        ";
        
        $resultArray= $this->db->query($query)->result_array();
        
        return $resultArray;
    }
}
