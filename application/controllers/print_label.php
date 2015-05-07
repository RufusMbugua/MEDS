<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Print_Label extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function generate_label(){
        $id = $this -> uri -> segment(3);
                
        $reagents_label =$this->db->select('reagents_inventory_record.comments,reagents_inventory_record.expiry_date,reagents_inventory_record.location,reagents_inventory_record.opened_by,reagents_inventory_record.date_opened,reagents_inventory_record.date,reagents_inventory_record.item_description, reagents_inventory_record.certificate_number, reagents_inventory_record.card_number, reagents_inventory_record.batch_number')->get_where('reagents_inventory_record', array('id' => $id))->result_array();  
        $query=$reagents_label[0];

        $this->load->library('mpdf/mpdf');
        $print = "";
        $i=1;

        $img=base_url().'images/meds_logo.png';// MEDS Logo

        $style=base_url().'style/table.css';
        $date=$query['date'];
        $date_opened=$query['date_opened'];
        $date_expiry=$query['expiry_date'];

        //$date_f=date_format($date,'d/m/y');
         //please debug this
         //for(i=1;i<=j;i++){

        //}
         $print .='
        <link href="'.$style.'" rel="stylesheet" type="text/css" />

        <table width="100%" bgcolor="#ffffff" align="center" border="0">
         <tr>
            <td style="padding:4px">
                <table class="label" width="10%" bgcolor="#ffffff" align="center" border="1">
                    <tr>
                        <td colspan="4" style="text-align:center;padding:4px;"><img src="'.$img.'" height="50px" width="50px"/></td>
                    </tr>  
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:11px;"><b>Reagents:<b></td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. $query['item_description'].'</td>
                    </tr>
                    <tr>
                        <td style ="font-family:Arial;font-size:10px;"><b>Date received:</b></td>
                        <td style ="font-family:Arial;font-size:10px;">'. substr($date,0,10).'</td>
                        <td style ="font-family:Arial;font-size:10px;"><b>Sign:</b></td>
                        <td>_______________________</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Date opened:</b></td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. substr($date_opened,0,10).'</td>
                    </tr>
                    <tr>
                        <td style ="font-family:Arial;font-size:10px;"><b>Opened by: </td>
                        <td style ="font-family:Arial;font-size:10px;">'. $query['opened_by'].'</td>
                        <td style ="font-family:Arial;font-size:10px;"><b>Sign:</b></td>
                        <td>_______________________</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Store location: </td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. $query['location'].'</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Expiry date: </td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. substr($date_expiry,0,10).'</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Remarks: </td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. $query['comments'].'</td>
                    </tr>
                </table>
            </td>
            <td style="">
                <table class="label" width="10%" bgcolor="#ffffff" align="center" border="1">
                    <tr>
                        <td colspan="4" style="text-align:center;padding:4px;"><img src="'.$img.'" height="50px" width="50px"/></td>
                    </tr>  
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:11px;"><b>Reagents:<b></td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. $query['item_description'].'</td>
                    </tr>
                    <tr>
                        <td style ="font-family:Arial;font-size:10px;"><b>Date received:</b></td>
                        <td style ="font-family:Arial;font-size:10px;">'.substr($date,0,10).'</td>
                        <td style ="font-family:Arial;font-size:10px;"><b>Sign:</b></td>
                        <td>_______________________</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Date opened:</b></td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. substr($date_opened,0,10).'</td>
                    </tr>
                    <tr>
                        <td style ="font-family:Arial;font-size:10px;"><b>Opened by: </td>
                        <td style ="font-family:Arial;font-size:10px;">'. $query['opened_by'].'</td>
                        <td style ="font-family:Arial;font-size:10px;"><b>Sign:</b></td>
                        <td>_______________________</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Store location: </td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. $query['location'].'</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Expiry date: </td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. substr($date_expiry,0,10).'</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Remarks: </td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. $query['comments'].'</td>
                    </tr>
                </table>
            </td>
        </tr>
         <tr>
            <td style="padding:4px">
                <table class="label" width="10%" bgcolor="#ffffff" align="center" border="1">
                    <tr>
                        <td colspan="4" style="text-align:center;padding:4px;"><img src="'.$img.'" height="50px" width="50px"/></td>
                    </tr>  
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:11px;"><b>Reagents:<b></td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. $query['item_description'].'</td>
                    </tr>
                    <tr>
                        <td style ="font-family:Arial;font-size:10px;"><b>Date received:</b></td>
                        <td style ="font-family:Arial;font-size:10px;">'.substr($date,0,10).'</td>
                        <td style ="font-family:Arial;font-size:10px;"><b>Sign:</b></td>
                        <td>_______________________</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Date opened:</b></td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. substr($date_opened,0,10).'</td>
                    </tr>
                    <tr>
                        <td style ="font-family:Arial;font-size:10px;"><b>Opened by: </td>
                        <td style ="font-family:Arial;font-size:10px;">'. $query['opened_by'].'</td>
                        <td style ="font-family:Arial;font-size:10px;"><b>Sign:</b></td>
                        <td>_______________________</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Store location: </td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. $query['location'].'</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Expiry date: </td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. substr($date_expiry,0,10).'</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Remarks: </td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. $query['comments'].'</td>
                    </tr>
                </table>
            </td>
            <td style="padding:4px">
                <table class="label" width="10%" bgcolor="#ffffff" align="center" border="1">
                    <tr>
                        <td colspan="4" style="text-align:center;padding:4px;"><img src="'.$img.'" height="50px" width="50px"/></td>
                    </tr>  
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:11px;"><b>Reagents:<b></td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. $query['item_description'].'</td>
                    </tr>
                    <tr>
                        <td style ="font-family:Arial;font-size:10px;"><b>Date received:</b></td>
                        <td style ="font-family:Arial;font-size:10px;">'.substr($date,0,10).'</td>
                        <td style ="font-family:Arial;font-size:10px;"><b>Sign:</b></td>
                        <td>_______________________</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Date opened:</b></td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. substr($date_opened,0,10).'</td>
                    </tr>
                    <tr>
                        <td style ="font-family:Arial;font-size:10px;"><b>Opened by: </td>
                        <td style ="font-family:Arial;font-size:10px;">'. $query['opened_by'].'</td>
                        <td style ="font-family:Arial;font-size:10px;"><b>Sign:</b></td>
                        <td>_______________________</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Store location: </td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. $query['location'].'</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Expiry date: </td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. substr($date_expiry,0,10).'</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Remarks: </td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. $query['comments'].'</td>
                    </tr>
                </table>
            </td>
         </tr>
         <tr>
            <td style="padding:4px">
                <table class="label" width="10%" bgcolor="#ffffff" align="center" border="1">
                    <tr>
                        <td colspan="4" style="text-align:center;padding:4px;"><img src="'.$img.'" height="50px" width="50px"/></td>
                    </tr>  
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:11px;"><b>Reagents:<b></td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. $query['item_description'].'</td>
                    </tr>
                    <tr>
                        <td style ="font-family:Arial;font-size:10px;"><b>Date received:</b></td>
                        <td style ="font-family:Arial;font-size:10px;">'.substr($date,0,10).'</td>
                        <td style ="font-family:Arial;font-size:10px;"><b>Sign:</b></td>
                        <td>_______________________</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Date opened:</b></td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. substr($date_opened,0,10).'</td>
                    </tr>
                    <tr>
                        <td style ="font-family:Arial;font-size:10px;"><b>Opened by: </td>
                        <td style ="font-family:Arial;font-size:10px;">'. $query['opened_by'].'</td>
                        <td style ="font-family:Arial;font-size:10px;"><b>Sign:</b></td>
                        <td>_______________________</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Store location: </td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. $query['location'].'</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Expiry date: </td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. substr($date_expiry,0,10).'</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Remarks: </td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. $query['comments'].'</td>
                    </tr>
                </table>
            </td>
            <td style="padding:4px">
                <table class="label" width="10%" bgcolor="#ffffff" align="center" border="1">
                    <tr>
                        <td colspan="4" style="text-align:center;padding:4px;"><img src="'.$img.'" height="50px" width="50px"/></td>
                    </tr>  
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:11px;"><b>Reagents:<b></td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. $query['item_description'].'</td>
                    </tr>
                    <tr>
                        <td style ="font-family:Arial;font-size:10px;"><b>Date received:</b></td>
                        <td style ="font-family:Arial;font-size:10px;">'.substr($date,0,10).'</td>
                        <td style ="font-family:Arial;font-size:10px;"><b>Sign:</b></td>
                        <td>_______________________</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Date opened:</b></td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. substr($date_opened,0,10).'</td>
                    </tr>
                    <tr>
                        <td style ="font-family:Arial;font-size:10px;"><b>Opened by: </td>
                        <td style ="font-family:Arial;font-size:10px;">'. $query['opened_by'].'</td>
                        <td style ="font-family:Arial;font-size:10px;"><b>Sign:</b></td>
                        <td>_______________________</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Store location: </td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. $query['location'].'</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Expiry date: </td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. substr($date_expiry,0,10).'</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Remarks: </td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. $query['comments'].'</td>
                    </tr>
                </table>
            </td>      
         </tr>
         <tr>
            <td style="padding:4px">
                <table class="label" width="10%" bgcolor="#ffffff" align="center" border="1">
                    <tr>
                        <td colspan="4" style="text-align:center;padding:4px;"><img src="'.$img.'" height="50px" width="50px"/></td>
                    </tr>  
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:11px;"><b>Reagents:<b></td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. $query['item_description'].'</td>
                    </tr>
                    <tr>
                        <td style ="font-family:Arial;font-size:10px;"><b>Date received:</b></td>
                        <td style ="font-family:Arial;font-size:10px;">'.substr($date,0,10).'</td>
                        <td style ="font-family:Arial;font-size:10px;"><b>Sign:</b></td>
                        <td>_______________________</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Date opened:</b></td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. substr($date_opened,0,10).'</td>
                    </tr>
                    <tr>
                        <td style ="font-family:Arial;font-size:10px;"><b>Opened by: </td>
                        <td style ="font-family:Arial;font-size:10px;">'. $query['opened_by'].'</td>
                        <td style ="font-family:Arial;font-size:10px;"><b>Sign:</b></td>
                        <td>_______________________</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Store location: </td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. $query['location'].'</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Expiry date: </td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. substr($date_expiry,0,10).'</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Remarks: </td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. $query['comments'].'</td>
                    </tr>
                </table>
            </td>
            <td style="padding:4px">
                <table class="label" width="10%" bgcolor="#ffffff" align="center" border="1">
                    <tr>
                        <td colspan="4" style="text-align:center;padding:4px;"><img src="'.$img.'" height="50px" width="50px"/></td>
                    </tr>  
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:11px;"><b>Reagents:<b></td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. $query['item_description'].'</td>
                    </tr>
                    <tr>
                        <td style ="font-family:Arial;font-size:10px;"><b>Date received:</b></td>
                        <td style ="font-family:Arial;font-size:10px;">'.substr($date,0,10).'</td>
                        <td style ="font-family:Arial;font-size:10px;"><b>Sign:</b></td>
                        <td>_______________________</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Date opened:</b></td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. substr($date_opened,0,10).'</td>
                    </tr>
                    <tr>
                        <td style ="font-family:Arial;font-size:10px;"><b>Opened by: </td>
                        <td style ="font-family:Arial;font-size:10px;">'. $query['opened_by'].'</td>
                        <td style ="font-family:Arial;font-size:10px;"><b>Sign:</b></td>
                        <td>_______________________</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Store location: </td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. $query['location'].'</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Expiry date: </td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. substr($date_expiry,0,10).'</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Remarks: </td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. $query['comments'].'</td>
                    </tr>
                </table>
            </td>      
         </tr>
         <tr>
            <td style="padding:4px">
                <table class="label" width="10%" bgcolor="#ffffff" align="center" border="1">
                    <tr>
                        <td colspan="4" style="text-align:center;padding:4px;"><img src="'.$img.'" height="50px" width="50px"/></td>
                    </tr>  
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:11px;"><b>Reagents:<b></td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. $query['item_description'].'</td>
                    </tr>
                    <tr>
                        <td style ="font-family:Arial;font-size:10px;"><b>Date received:</b></td>
                        <td style ="font-family:Arial;font-size:10px;">'.substr($date,0,10).'</td>
                        <td style ="font-family:Arial;font-size:10px;"><b>Sign:</b></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Date opened:</b></td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. substr($date_opened,0,10).'</td>
                    </tr>
                    <tr>
                        <td style ="font-family:Arial;font-size:10px;"><b>Opened by: </td>
                        <td style ="font-family:Arial;font-size:10px;">'. $query['opened_by'].'</td>
                        <td style ="font-family:Arial;font-size:10px;"><b>Sign:</b></td>
                        <td>_______________________</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Store location: </td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. $query['location'].'</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Expiry date: </td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. substr($date_expiry,0,10).'</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Remarks: </td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. $query['comments'].'</td>
                    </tr>
                </table>
            </td>
            <td style="padding:4px">
                <table class="label" width="10%" bgcolor="#ffffff" align="center" border="1">
                    <tr>
                        <td colspan="4" style="text-align:center;padding:4px;"><img src="'.$img.'" height="50px" width="50px"/></td>
                    </tr>  
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:11px;"><b>Reagents:<b></td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. $query['item_description'].'</td>
                    </tr>
                    <tr>
                        <td style ="font-family:Arial;font-size:10px;"><b>Date received:</b></td>
                        <td style ="font-family:Arial;font-size:10px;">'.substr($date,0,10).'</td>
                        <td style ="font-family:Arial;font-size:10px;"><b>Sign:</b></td>
                        <td>_______________________</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Date opened:</b></td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. substr($date_opened,0,10).'</td>
                    </tr>
                    <tr>
                        <td style ="font-family:Arial;font-size:10px;"><b>Opened by: </td>
                        <td style ="font-family:Arial;font-size:10px;">'. $query['opened_by'].'</td>
                        <td style ="font-family:Arial;font-size:10px;"><b>Sign:</b></td>
                        <td>_______________________</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Store location: </td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. $query['location'].'</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Expiry date: </td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. substr($date_expiry,0,10).'</td>
                    </tr>
                    <tr>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;"><b>Remarks: </td>
                        <td colspan="2" style ="font-family:Arial;font-size:10px;">'. $query['comments'].'</td>
                    </tr>
                </table>
            </td>      
         </tr>
      </table>
      ';
      $this->load->library('mpdf/mpdf');// Load the library
      $this->mpdf->WriteHTML($print); // Output the results in the browser
      $this->mpdf->Output($filename,'D'); //bring up "Save as Dialog"
    }

    public function getLabelPdf_standalone(){

        //DOMpdf initialization
        require_once("dompdf/doc/dompdf/dompdf_config.inc.php");
        $this->load->helper('dompdf', 'file');
        $this->load->helper('file');

        //DOMpdf configuration
        $dompdf = new DOMPDF();
        $dompdf->set_paper(array(0, 0, 316.8, 432));

        //Initialize Array to hold tests
        $tests = [];

        //Get array of all uri segments
        $t_array = $this -> uri -> segment_array();

        /*Loop through said array above, if index of array element is greater than 4 (where tests uri start)
        push element into tests[] array */
        
        foreach ($t_array as $key => $value) {
            if ($key > 4) {
                array_push($tests, $value);
            }    
        }

        //Variable assignment
        $saveTo = './labels';
        $data['tests'] = $tests;
        $data['trid'] = $this-> uri -> segment(3);
        $trid = $data['trid'];
        // $data['prints_no'] = $this -> uri -> segment(4); 
        $data['description'] = $this -> uri -> segment(4);
        $labelname = "Label" . $data['trid'] . ".pdf";
        $data['settings_view'] = "label_view_standalone";
        $this->base_params($data);
        $html = $this->load->view('label_view_standalone', $data, TRUE);
        $dompdf->load_html($html);
        $dompdf->render();
        write_file($saveTo . "/" . $labelname, $dompdf->output());
        $this -> setLabelStatus($trid, $saveTo, $labelname);
        //$this -> output -> enable_profiler(TRUE);
    }

    public function getLabelPdf() {

        require_once("application/helpers/dompdf/dompdf_config.inc.php");

        $this->load->helper('dompdf', 'file');
        $this->load->helper('file');

        $dompdf = new DOMPDF();
        $dompdf->set_paper(array(0, 0, 316.8, 432));

        $saveTo = './labels';
        $data['trid'] = $this->uri->segment(3);
        $trid = $data['trid'];
        // $data['prints_no'] = $this->uri->segment(4);
        $data['description'] = $this -> uri -> segment(4);
        $labelname = "Label" . $data['trid'] . ".pdf";
        $data['infos'] = Request::getSample($data['trid']);
        $data['settings_view'] = "label_view2";
        $this->base_params($data);
        $html = $this->load->view('label_view2', $data, TRUE);

        $dompdf->load_html($html);
        $dompdf->render();
        write_file($saveTo . "/" . $labelname, $dompdf->output());
        $this -> setLabelStatus($trid, $saveTo, $labelname);
    }
}