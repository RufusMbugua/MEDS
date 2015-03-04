<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Client_Billing extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }
  function index()
  {
    //$s= $this->uri->segment(3);
    $s=0;
    
    $data['invoice']=$this->db->select('*')->get_where('invoice',array('status' => $s))->result_array();
  
    $this->load->view('proforma_invoice_list',$data);
  }
  function print_page(){

  $this->load->model('proforma_invoice_model');

  $query = $this->proforma_invoice_model->invoice_listget();

  $this->load->library('mpdf/mpdf');
  $img=base_url().'images/meds_logo.png';// MEDS Logo 

  $print.='

  <link href='.base_url()."style/forms.css".' rel="stylesheet" type="text/css" />
  <table class="table_form"  bgcolor="#ffffff" width="80%"  border="0" cellpadding="4px" align="center">
        <tr>
          <td colspan="8" style="padding:8px;">
            <table width="100%" >
              <tr>
                <td style="padding:8px;text-align:left;background-color:#ffffff;"><img src="'.$img.'" height="80px" width="90px"/><br>
                  <h4><b>Mission for Essential Drigs and Supplies</b></h4>
                  <p>(MEDS Center, Off Mombasa Road, Opposite Nation Press-Kenya)</p>
                  <p style="color:#ff0000;text-align:center;"><b>Assuring Quality of Medicines</b></p>
                  <p style="color:#0000ff;text-align:center;">MEDS Quality Control laboratory is WHO pre-qualified</p>  
                </td>
                <td></td>
                <td style="padding:8px;text-align:right;background-color:#ffffff;">
                  <b>P.O Box 78040</b><br>
                  <b>Viwandani, 00507</b><br>
                  <b>Nairobi, Kenya</b><br>
                  Tel: 3920000/500<br>
                  Telkom Wireless:020<br>
                  2124453,2124455,2460022,2532214,2532216.<br>
                  Mobile: 0722-202106, 0734-600310, 0726-937222<br>
                  Fax: 3920600<br>
                  E-mail:sahibu@africaonline.co.ke<br>
                  lab@meds.or.ke<br>
                  Website:www.meds.or.ke<br>
                </td>
              </tr>
              
          </table>
         </td>
        </tr>
        <tr>
          <td colspan="8" style="padding:8px;text-align:center;">
            <table width="100%">
                <tr>
                  <td rowspan="2" style="text-align:left;padding:8px;border-bottom: solid 1px #c4c4ff;border-right: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;"><textarea rows="3" cols="50" name=""></textarea></td>
                  <td style="padding:8px;text-align:center;"><h1><b>PROFORMA INVOICE</b><h1></td>
                </tr>
                <tr>
                  <td colspan="2" style="padding:8px;color:#0000ff;"><b>For Clients with no credit facility with MEDS, kindly pay upfront or issue an irrevocable Letter of Credit</b></td>
                </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="8" style="padding:8px;background-color: #ffffff;"></td>
        </tr>
        <tr>
        <td colspan="8">
           <table id="table_form" width="100%" class="list_view_header"  border="0"  bgcolor="#ffffff" cellpadding="4px">
                  <tr>
                      <td style="text-align:center;border-right: dotted 1px #ddddff;border-left: dotted 1px #ddddff;">S/N</td>
                      <td style="text-align:center;border-right: dotted 1px #ddddff;">Item Code</td>
                      <td style="text-align:center;border-right: dotted 1px #ddddff;">Quantity</td>
                      <td style="text-align:center;border-right: dotted 1px #ddddff;">Unit Price</td>
                      <td style="text-align:center;border-right: dotted 1px #ddddff;">Amount</td>
                      
                  </tr>';
            foreach($query as $row){
                    
            $print .="<tr>"; 
            $print .='<td style="border-right: dotted 1px #c0c0c0;text-align: center;border-left: solid 1px #c0c0c0;border-bottom: solid 1px #c0c0c0;border-top: solid 1px #c0c0c0;" width="16px">'.$row->serial_number.'</td>';
            $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;border-top: solid 1px #c0c0c0;">'.$row->item_code.'</td>';
            $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;border-top: solid 1px #c0c0c0;">'.$row->quantity.'</td>';
            $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;border-top: solid 1px #c0c0c0;">'.$row->unit_price.'</td>';
            $print .='<td style="text-align: center;border-right: solid 1px #c0c0c0;border-bottom: solid 1px #c0c0c0;border-top: solid 1px #c0c0c0;">'.$row->amount.'</td>';        
        
            $print .="</tr>";
            }

  $print .='</table>
            <table width="100%" class="list_view_header"  border="0"  bgcolor="#ffffff" cellpadding="4px" >
            <tr>
              <td colspan="8" style="padding:8px;background-color: #ffffff;"></td>
            </tr>
             <tr>
                <td style="padding:8px;border-right: solid 1px #c0c0c0;border-bottom: solid 1px #c0c0c0;border-top: solid 1px #c0c0c0;border-left: solid 1px #c0c0c0;"><p style="text-align:center;">Thank you for giving us the opportunity to be of service to you</p><p style="text-align:center;">you were served by :Joseph</p><p style="text-align:center;">ISO 9001:2008 Certified</p>
                </td>
                <td></td>
                <td></td>
                <td style="padding:8px;border-right: solid 1px #c0c0c0;border-bottom: solid 1px #c0c0c0;border-top: solid 1px #c0c0c0;border-left: solid 1px #c0c0c0;"><p>Total Freight:</p><p>Misc Chharges:</p><p>Total net amount:</p></td>
            </tr>
            </table>';
  echo $print;
  die;
  $this->load->library('mpdf/mpdf');// Load the library
  $this->mpdf = new mPDF('', 'A4-L', 0, '', 15, 15, 16, 16, 9, 9, '');
  $this->mpdf->simpleTables = true;
  //$this->mpdf->WriteHTML('<br/>');
  //$report_name = $report_name . ".pdf";
  $this->mpdf->WriteHTML($print); // Output the results in the browser
  $this->mpdf->Output($filename,'D'); //bring up "Save as Dialog"
                
}
  function submit(){

   $this->load->model('finance_model');

   if ($this->input->post('submit')){
      $this->finance_model->process_proforma_invoice();
   }
  }
}
?>