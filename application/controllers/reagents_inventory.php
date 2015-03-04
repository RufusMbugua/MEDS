<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reagents_Inventory extends CI_Controller {
function __construct()
 {
   parent::__construct();
 }
function index(){
	$this->load->view('reagents_inventory_record_form');
        }

function save(){
	$this->load->model('reagents_inventorymodel');        
	
	if($this->input->post('submit')){
		$this->reagents_inventorymodel->process();
	
	}
	redirect('reagents_inventory_record/Get');
	}	


function print_labels(){
  $id= $this->uri->segment(3);

  $this->load->model('reagents_inventorymodel');

  $query=$this->db->select('*')->get_where('reagents_inventory_record',array('id'=>$id))->result_array();
    
  $this->load->library('mpdf/mpdf');
  $img=base_url().'images/meds_logo.png';// MEDS Logo 

  $print.='
        <table width="100%" border="0" align="center" bgcolor="e8e8ff">
		      <tr>
			      	<td style="padding:8px;">';
			      	//foreach ($query as $row => $value){

				      	 $print.='
				      	  <table width="40%" cellpadding="8px" border="0" bgcolor="ffffff">
						  	  <tr>
						      		<td colspan="4" style="text-align:center;border-bottom: solid 1px #ddddff;"><a href='.$img.'><img src="'.$img.'"height="35px" width="35px"/></a></td>
						  	  </tr>
						      <tr>
						          <td style="border-bottom: solid 1px #ddddff;border-right: dotted 1px #ddddff;" align="left">Reagent Name</td>
						           <td colspan="3" style="border-bottom: solid 1px #ddddff;text-align: left;">'.$query[0]["item_description"].'</td>
						      </tr>
						      <tr>
						          <td style="border-bottom: solid 1px #ddddff;border-right: dotted 1px #ddddff;text-align: left;">Date Received</td>
						          <td style="border-bottom: solid 1px #ddddff;border-right: dotted 1px #ddddff;text-align: left;">'.substr($query[0]["date"],0,10).'</td>
						          <td style="border-bottom: solid 1px #ddddff;border-right: dotted 1px #ddddff;text-align: left;">Received By</td>
						          <td colspan="2" style="border-bottom: solid 1px #ddddff;text-align: left;">'.$query[0]["received_by"].'</td>
						      </tr>
						      <tr>   
						          <td style="border-bottom: solid 1px #ddddff;border-right: dotted 1px #ddddff;" align="left">Date Opened</td>
						          <td style="border-bottom: solid 1px #ddddff;border-right: dotted 1px #ddddff;text-align: left;">'.$query[0]["date_opened"].'</td>
						          <td style="border-bottom: solid 1px #ddddff;border-right: dotted 1px #ddddff;" align="left">Opened By</td>
						          <td style="border-bottom: solid 1px #ddddff;text-align: left;">'.$query[0]["opened_by"].'</td>
						      </tr>
						      <tr>
						      	  <td style="border-bottom: solid 1px #ddddff;border-right: dotted 1px #ddddff;" align="left">Store Location</td>
						      	  <td colspan="4" style="border-bottom: solid 1px #ddddff;text-align: left;">'.$query[0]["location"].'</td>
						      </tr>
						      <tr>
						          <td style="border-bottom: solid 1px #ddddff;border-right: dotted 1px #ddddff;" align="left">Expiry Date</td>
						          <td colspan="4" style="border-bottom: solid 1px #ddddff;text-align: left;">'.$query[0]["expiry_date"].'</td>
						      </tr>
						      <tr>
						          <td style="border-bottom: solid 1px #ddddff;border-right: dotted 1px #ddddff;" align="left">Remarks</td>
						          <td colspan="4" style="border-bottom: solid 1px #ddddff;text-align: left;"></td>
						      </tr>
						  </table>
					</td>';

				//}

				$print.='

			  </tr>

		</table>';
  echo $print;
  die;

  $this->load->library('mpdf/mpdf');// Load the library
  //$this->mpdf = new mPDF('', 'A4-L', 0, '', 15, 15, 16, 16, 9, 9, '');
  //$this->mpdf->simpleTables = true;
  $this->mpdf->WriteHTML($print); // Output the results in the browser
  $this->mpdf->Output($filename,'D'); //bring up "Save as Dialog"
  
                	
}
}
?>