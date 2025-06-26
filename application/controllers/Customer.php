<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Customer extends CI_Controller {

    function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
        $this->load->model('Main_M');
        $this->load->model('Admin_M');
        $this->load->model('Customer_M');
        $this->load->model('Client_M');
        $this->load->model('Common_M');
    }

    public function index() {
        
    }

    public function customers($id = NULL) {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "admin/login");
        }

        if($this->session->userdata('client')['parent_id']==0){
            $client_id = $this->session->userdata('client')['id'];
        }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']);
        }
        $data['customers'] = $this->Customer_M->get('tbl_customers', 'created', 'DESC', 'client_id', $client_id);
        $data['panelTitle'] = 'Customers';
        $data['subview'] = 'customer/customers';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function add_customer($id = NULL) {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "admin/login");
        }

         if($this->session->userdata('client')['parent_id']==0){
          $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
          }elseif($this->session->userdata('client')['parent_id']!=0){
          $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
          }


        if ($_POST) {


            if($this->session->userdata('client')['parent_id']==0){
                $idata['client_id'] = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
                $idata['client_id'] = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }


            if($this->session->userdata('client')['parent_id']!=0){
                $subuser_id = $this->session->userdata('client')['id'];
            }elseif($this->session->userdata('client')['parent_id']==0){
                $subuser_id = $this->session->userdata('client')['parent_id'];
            }

            $idata['subuser_id'] = $subuser_id;
            $idata['name'] = $_POST['name'];
            $idata['type'] = $_POST['type'];
            $idata['email'] = $_POST['email'];
            $idata['gst'] = $_POST['gst'];
            $idata['state_code'] = $_POST['state_code'];
            $idata['mobile'] = $_POST['mobile'];
            $idata['website'] = $_POST['website'];
            $idata['company'] = $_POST['company'];
            $idata['address'] = $_POST['address'];
            $idata['country_id'] = $_POST['country'];
            $idata['state_id'] = $_POST['state'];
            $idata['city_id'] = $_POST['city'];
            $idata['postcode'] = $_POST['postcode'];
            $idata['fax'] = $_POST['fax'];
            $idata['shipaddress'] = $_POST['shipaddress'];
            $idata['shipcountry_id'] = $_POST['shipcountry'];
            $idata['shipstate_id'] = $_POST['shipstate'];
            $idata['shipcity_id'] = $_POST['shipcity'];
            $idata['shippostcode'] = $_POST['shippostcode'];
            $idata['shipfax'] = $_POST['shipfax'];
            $idata['position'] = $_POST['position'];
            $idata['facebook'] = $_POST['facebook'];
            $idata['twitter'] = $_POST['twitter'];
            $idata['skype_id'] = $_POST['skype_id'];
            $idata['remark'] = $_POST['remark'];
            $idata['currency'] = $_POST['currency'];
            $idata['opening_balance'] = $_POST['o_balnce'];
            $idata['pay_info'] = $_POST['pay_info'];
            //$idata['exchange_rate']=$_POST['exchange_rate'];
            $idata['terms'] = $_POST['pterms'];
            $idata['created'] = date('Y-m-d H:i:s');

            if ($id) {
                $this->db->where('id', $id);
                $success = $this->db->update('tbl_customers', $idata);

                if (count($_POST['cp_name']) > 0) {

                    $query2 = $this->db->query("DELETE FROM `tbl_coutact_persons` WHERE client_id='" . $this->session->userdata('client')['id'] . "' AND customer_id='" . $id . "'");

                    for ($i = 0; $i < count($_POST['cp_name']); $i++) {
                        $idata2['name'] = $_POST['cp_name'][$i];
                        $idata2['email'] = $_POST['cp_email'][$i];
                        $idata2['ph'] = $_POST['cp_mobile'][$i];
                        $idata2['client_id'] = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
                        $idata2['customer_id'] = $id;
                        /* if($_POST['cp_id'][$i]!="" && $_POST['cp_id'][$i]>0){
                          $this->db->where('id',$_POST['cp_id'][$i]);
                          $this->db->update('tbl_coutact_persons',$idata2);
                          }else{ */
                        $this->db->insert('tbl_coutact_persons', $idata2);
                        //} 
                    }
                }
            } else {
                $success = $this->db->insert('tbl_customers', $idata);
                $insertId = $this->db->insert_id();

                if (count($_POST['cp_name']) > 0) {
                    for ($i = 0; $i < count($_POST['cp_name']); $i++) {
                        $idata2['name'] = $_POST['cp_name'][$i];
                        $idata2['email'] = $_POST['cp_email'][$i];
                        $idata2['ph'] = $_POST['cp_mobile'][$i];
                        $idata2['client_id'] = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
                        $idata2['customer_id'] = $insertId;
                        $this->db->insert('tbl_coutact_persons', $idata2);
                    }
                }

                //echo $this->db->last_query();exit();
            }



            if ($success) {

                $this->session->set_flashdata('success', 'Updated Successfully');
                if ($_GET['redirect']) {
                    $encrypted = $_GET['redirect'];
                    $url = base64_decode($encrypted);
                    //echo $url;exit();
                    redirect(base_url() . $url);
                } else {
                    redirect(base_url() . "customer/customers");
                }
            }
        }

        if ($id) {

            $data['this_element'] = $this->Customer_M->getSingleRow('tbl_customers', 'id', $id);
            $query = $this->db->query("SELECT * FROM `tbl_coutact_persons` WHERE client_id='" . $this->session->userdata('client')['id'] . "' AND customer_id='" . $id . "' order BY id ASC ");
            $data['customer_contact'] = $query->result();
            $data['panelTitle'] = 'Update Customer';
        } else {

            $data['panelTitle'] = 'Add Customer';
        }

        $query = $this->db->query("select tbl_client_currencies.*,tbl_currencies.code as ccode,tbl_currencies.country as ccountry from tbl_client_currencies left join tbl_currencies on tbl_client_currencies.code=tbl_currencies.id where tbl_client_currencies.client_id='" . $client_id . "'");
        $data['allcurn'] = $query->result();

        $data['currency'] = $this->Common_M->get('tbl_currencies', 'country', 'ASC');
        $data['trems'] = $this->Common_M->get('tbl_terms', 'name', 'ASC');

        //echo "<pre>"; print_r($data['currency']); exit();

        $data['countries'] = $this->Customer_M->get('tbl_countries', 'name', 'ASC');
        $data['cities'] = $this->Customer_M->get('tbl_cities', 'name', 'ASC');
        $data['states'] = $this->Customer_M->get('tbl_states', 'name', 'ASC');
        $data['clients'] = $this->Common_M->get('tbl_clients', 'business_name', 'ASC');
        //$data['terms']=$this->Customer_M->get('tbl_terms','created','ASC');
        $data['subview'] = 'customer/add_customer';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function ajaxResponse() {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "admin/login");
        }
        $rawName = $this->uri->segment(3);
        if ($rawName == 'states') {
            $tbl_name = 'tbl_states';
            $where = 'country_id';
        } else if ($rawName == 'cities') {
            $tbl_name = 'tbl_cities';
            $where = 'state_id';
        }
        $id = $this->uri->segment(4);
        $result = $this->Main_M->get($tbl_name, 'name', 'ASC', $where, $id);
        //echo $this->db->last_query();
        $display = '';
        foreach ($result as $key) {
            $display .= '<option value="' . $key->id . '">' . $key->name . '</option>';
        }
        echo $display;
    }

    public function test() {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "admin/login");
        }
        $str = 'RbXqDRPW2gHYlT4tI2IMsWiTrvETU6epBJIbcddBl5FPaVDA0t4rvtLEwIATt2OPOyK35ft1hwFqHL+LEZQ5vg==';
        $this->load->library('encrypt');
        $returnData = $this->encrypt->decode($str, $key);
        echo $returnData;
    }


    public function Spreadsheet_format_downlood()
    {
        if($this->session->userdata('client')['parent_id']==0){
            $client_id2 = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id2 = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Customers_format.xlsx"');   
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();

        $this->load->model('Customer_M'); // Ensure the model is loaded

$activeWorksheet->setCellValue('A1', 'S.No');
$activeWorksheet->setCellValue('B1', 'CLIENT_ID' );
$activeWorksheet->setCellValue('C1', 'NAME');
$activeWorksheet->setCellValue('D1', 'TYPE');
$activeWorksheet->setCellValue('E1', 'EMAIL');
$activeWorksheet->setCellValue('F1', 'MOBILE');
$activeWorksheet->setCellValue('G1', 'WEBSITE');
$activeWorksheet->setCellValue('H1', 'ADDRESS');
$activeWorksheet->setCellValue('I1', 'COUNTRY_ID');
$activeWorksheet->setCellValue('J1', 'STATE_ID');
$activeWorksheet->setCellValue('K1', 'CITY_ID');
$activeWorksheet->setCellValue('L1', 'POSTCODE');
$activeWorksheet->setCellValue('M1', 'FAX');
$activeWorksheet->setCellValue('N1', 'GST');
$activeWorksheet->setCellValue('O1', 'STATE_CODE');
$activeWorksheet->setCellValue('P1', 'SHIP_ADDRESS');
$activeWorksheet->setCellValue('Q1', 'SHIPCOUNTRY_ID');
$activeWorksheet->setCellValue('R1', 'SHIPSTATE_ID');
$activeWorksheet->setCellValue('S1', 'SHIPCITY_ID');
$activeWorksheet->setCellValue('T1', 'SHIPPOSTCODE');
$activeWorksheet->setCellValue('U1', 'SHIPFAX');
$activeWorksheet->setCellValue('V1', 'CURRENCY');
$activeWorksheet->setCellValue('W1', 'OPENING_BAL');
$activeWorksheet->setCellValue('X1', 'EXCHANGE_RATE');
$activeWorksheet->setCellValue('Y1', 'TERMS');
$activeWorksheet->setCellValue('Z1', 'COMPANY');
$activeWorksheet->setCellValue('AA1', 'POSITION');
$activeWorksheet->setCellValue('AB1', 'FACEBOOK');
$activeWorksheet->setCellValue('AC1', 'TWITTER');
$activeWorksheet->setCellValue('AD1', 'SKYPE_ID');
$activeWorksheet->setCellValue('AE1', 'REMARKS');
$activeWorksheet->setCellValue('AF1', 'PAY_INFO');

$activeWorksheet->setCellValue('A2', '');
$activeWorksheet->setCellValue('B2', $client_id2 );

$activeWorksheet->setCellValue('C2', '');
$activeWorksheet->setCellValue('D2', '');
$activeWorksheet->setCellValue('E2', '');
$activeWorksheet->setCellValue('F2', '');
$activeWorksheet->setCellValue('G2', '');
$activeWorksheet->setCellValue('H2', '');
$activeWorksheet->setCellValue('I2', '');
$activeWorksheet->setCellValue('J2', '');
$activeWorksheet->setCellValue('K2', '');
$activeWorksheet->setCellValue('L2', '');
$activeWorksheet->setCellValue('M2', '');
$activeWorksheet->setCellValue('N2', '');
$activeWorksheet->setCellValue('O2', '');
$activeWorksheet->setCellValue('P2', '');
$activeWorksheet->setCellValue('Q2', '');
$activeWorksheet->setCellValue('R2', '');
$activeWorksheet->setCellValue('S2', '');
$activeWorksheet->setCellValue('T2', '');
$activeWorksheet->setCellValue('U2', '');
$activeWorksheet->setCellValue('V2', '');
$activeWorksheet->setCellValue('W2', '');
$activeWorksheet->setCellValue('X2', '');
$activeWorksheet->setCellValue('Y2', '');
$activeWorksheet->setCellValue('Z2', '');
$activeWorksheet->setCellValue('AA2', '');
$activeWorksheet->setCellValue('AB2', '');
$activeWorksheet->setCellValue('AC2', '');
$activeWorksheet->setCellValue('AD2', '');
$activeWorksheet->setCellValue('AE2', '');
$activeWorksheet->setCellValue('AF2', '');

        $writer = new Xlsx($spreadsheet);
        $writer->save("php://output");

    }

    public function spreadsheet_import()
    {
        $upload_file=$_FILES['upload_file']['name'];
        $extension=pathinfo($upload_file,PATHINFO_EXTENSION);
        if($extension=='csv')
        {
            $reader= new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } else if($extension=='xls')
        {
            $reader= new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else
        {
            $reader= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet=$reader->load($_FILES['upload_file']['tmp_name']);
        $sheetdata=$spreadsheet->getActiveSheet()->toArray();
        $sheetcount=count($sheetdata);
        if($sheetcount>1)
        {
            $data=array();
            for ($i=1; $i < $sheetcount; $i++) { 
                $client_id=$sheetdata[$i][1];
                $name=$sheetdata[$i][2];
                $type=$sheetdata[$i][3];
                $email=$sheetdata[$i][4];
                $gst=$sheetdata[$i][5];
                $state_code=$sheetdata[$i][6];
                $mobile=$sheetdata[$i][7];
                $website=$sheetdata[$i][8];
                $company=$sheetdata[$i][9];
                $address=$sheetdata[$i][10];
                $country_id=$sheetdata[$i][11];
                $state_id=$sheetdata[$i][12];
                $city_id=$sheetdata[$i][13];
                $postcode=$sheetdata[$i][14];
                $fax=$sheetdata[$i][15];
                $shipaddress=$sheetdata[$i][16];
                $shipcountry=$sheetdata[$i][17];
                $shipstate=$sheetdata[$i][18];
                $shipcity=$sheetdata[$i][19];
                $shippostcode=$sheetdata[$i][20];
                $shipfax=$sheetdata[$i][21];
                $position=$sheetdata[$i][22];
                $facebook=$sheetdata[$i][23];
                $twitter=$sheetdata[$i][24];
                $skype_id=$sheetdata[$i][25];
                $remark=$sheetdata[$i][26];
                $currency=$sheetdata[$i][27];
                $opening_balance=$sheetdata[$i][28];
                $pay_info=$sheetdata[$i][29];
                $terms=$sheetdata[$i][30];
                // $created=$sheetdata[$i][31];
                $exchange_rate=$sheetdata[$i][32];
                $data[]=array(
                    'client_id'=>$client_id,
                    'name'=>$name,
                    'type'=>$type,
                    'email'=>$email,
                    'gst'=>$gst,
                    'state_code'=>$state_code,
                    'mobile'=>$mobile,
                    'website'=>$website,
                    'company'=>$company,
                    'address'=>$address,
                    'country_id'=>$country_id,
                    'state_id'=>$state_id,
                    'city_id'=>$city_id,
                    'postcode'=>$postcode,
                    'fax'=>$fax,
                    'shipaddress'=>$shipaddress,
                    'shipcountry_id'=>$shipcountry,
                    'shipstate_id'=>$shipstate,
                    'shipcity_id'=>$shipcity,
                    'shippostcode'=>$shippostcode,
                    'shipfax'=>$shipfax,
                    'position'=>$position,
                    'facebook'=>$facebook,
                    'twitter'=>$twitter,
                    'skype_id'=>$skype_id,
                    'remark'=>$remark,
                    'currency'=>$currency,
                    'opening_balance'=>$opening_balance,
                    'pay_info'=>$pay_info,
                    'terms'=>$terms,
                    // 'created'=>$created,
                    'exchange_rate'=>$exchange_rate
                );
            }
            $inserdata=$this->Customer_M->insert_batch($data);
            if($inserdata)
            {
                $this->session->set_flashdata('message','<div class="alert alert-success">Successfully Added.</div>');
                redirect('customer/customers');
            } else {
                $this->session->set_flashdata('message','<div class="alert alert-danger">Data Not uploaded. Please Try Again.</div>');
                redirect('customer/customers');
            }
        }
        $data['panelTitle'] = 'Customers';
        $data['subview'] = 'customer/customers';
        $this->load->view('admin/common/_layout_admin', $data);
    }
    public function spreadsheet_export()
    {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "admin/login");
        }

        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

        // if ($id) {
        //     $client_id = $id;
        // } else {
        //     $client_id = $this->session->userdata('client')['id'];
        // }


       $productlist = $this->Customer_M->get('tbl_customers', 'created', 'DESC', 'client_id', $client_id);
        
        
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="customers_list.xlsx"');
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'S.No');
        $sheet->setCellValue('B1', 'CLIENT_ID');
        $sheet->setCellValue('C1', 'NAME');
        $sheet->setCellValue('D1', 'TYPE');
        $sheet->setCellValue('E1', 'EMAIL');
        $sheet->setCellValue('F1', 'MOBILE');
        $sheet->setCellValue('G1', 'WEBSITE');
        $sheet->setCellValue('H1', 'ADDRESS');
        $sheet->setCellValue('I1', 'COUNTRY_ID');
        $sheet->setCellValue('J1', 'STATE_ID');
        $sheet->setCellValue('K1', 'CITY_ID');
        $sheet->setCellValue('L1', 'POSTCODE');
        $sheet->setCellValue('M1', 'FAX');
        $sheet->setCellValue('N1', 'GST');
        $sheet->setCellValue('O1', 'STATE_CODE');
        $sheet->setCellValue('P1', 'SHIP_ADDRESS');
        $sheet->setCellValue('Q1', 'SHIPCOUNTRY_ID');
        $sheet->setCellValue('R1', 'SHIPSTATE_ID');
        $sheet->setCellValue('S1', 'SHIPCITY_ID');
        $sheet->setCellValue('T1', 'SHIPPOSTCODE');
        $sheet->setCellValue('U1', 'SHIPFAX');
        $sheet->setCellValue('V1', 'CURRENCY');
        $sheet->setCellValue('W1', 'OPENING_BAL');
        $sheet->setCellValue('X1', 'EXCHAGE_RATE');
        $sheet->setCellValue('Y1', 'TERMS');
        $sheet->setCellValue('Z1', 'COMPANY');
        $sheet->setCellValue('AA1', 'POSITION');
        $sheet->setCellValue('AB1', 'FACEBOOK');
        $sheet->setCellValue('AC1', 'TWITTER');
        $sheet->setCellValue('AD1', 'SKYPE_ID');
        $sheet->setCellValue('AE1', 'REMARKS');
        $sheet->setCellValue('AF1', 'PAY_INFO');

        //$sheet->setCellValue('D1', 'Subtotal');

        $sn=2;
        foreach ($productlist as $prod) {
            //echo $prod->product_name;
            $sheet->setCellValue('A'.$sn,$prod->id );
            $sheet->setCellValue('B'.$sn,$prod->client_id);
            $sheet->setCellValue('C'.$sn,$prod->name);
            $sheet->setCellValue('D'.$sn,$prod->type);
            $sheet->setCellValue('E'.$sn,$prod->email);
            $sheet->setCellValue('F'.$sn,$prod->mobile);
            $sheet->setCellValue('G'.$sn,$prod->website);
            $sheet->setCellValue('H'.$sn,$prod->address);
            $sheet->setCellValue('I'.$sn,$prod->country_id);
            $sheet->setCellValue('J'.$sn,$prod->state_id);
            $sheet->setCellValue('K'.$sn,$prod->city_id);
            $sheet->setCellValue('L'.$sn,$prod->postcode);
            $sheet->setCellValue('M'.$sn,$prod->fax);
            $sheet->setCellValue('N'.$sn,$prod->gst);
            $sheet->setCellValue('O'.$sn,$prod->state_code);
            $sheet->setCellValue('P'.$sn,$prod->shipaddress);
            $sheet->setCellValue('Q'.$sn,$prod->shipcountry_id);
            $sheet->setCellValue('R'.$sn,$prod->shipstate_id);
            $sheet->setCellValue('S'.$sn,$prod->shipcity_id);
            $sheet->setCellValue('T'.$sn,$prod->shippostcode);
            $sheet->setCellValue('U'.$sn,$prod->shipfax);
            $sheet->setCellValue('V'.$sn,$prod->currency);
            $sheet->setCellValue('W'.$sn,$prod->opening_balance);
            $sheet->setCellValue('X'.$sn,$prod->exchange_rate);
            $sheet->setCellValue('Y'.$sn,$prod->terms);
            $sheet->setCellValue('Z'.$sn,$prod->company);
            $sheet->setCellValue('AA'.$sn,$prod->position);
            $sheet->setCellValue('AB'.$sn,$prod->facebook);
            $sheet->setCellValue('AC'.$sn,$prod->twitter);
            $sheet->setCellValue('AD'.$sn,$prod->skype_id);
            $sheet->setCellValue('AE'.$sn,$prod->remark);
            $sheet->setCellValue('AF'.$sn,$prod->pay_info);
            //$sheet->setCellValue('D'.$sn,'=C'.$sn.'*D'.$sn);
            $sn++;
        }
        //TOTAL
        $sheet->setCellValue('D8','Total');
        $sheet->setCellValue('E8','=SUM(E2:E'.($sn-1).')');

        $writer = new Xlsx($spreadsheet);
        $writer->save("php://output");
    }





    public function customer_details($id = NULL) {
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }
        $data['this_element'] = $this->Customer_M->getSingleRow('tbl_customers', 'id', $id);
        $query = $this->db->query("SELECT * FROM `tbl_coutact_persons` WHERE client_id='" . $client_id . "' AND customer_id='" . $id . "' order BY id ASC ");
            $data['customer_contact'] = $query->result();

        //echo "<pre>"; print_r($data['this_element']); exit;

        $query = $this->db->query("select tbl_client_currencies.*,tbl_currencies.code as ccode,tbl_currencies.country as ccountry from tbl_client_currencies left join tbl_currencies on tbl_client_currencies.code=tbl_currencies.id where tbl_client_currencies.client_id='" . $client_id . "'");
        $data['allcurn'] = $query->result();

        $data['currency'] = $this->Common_M->get('tbl_currencies', 'country', 'ASC');
        $data['trems'] = $this->Common_M->get('tbl_terms', 'name', 'ASC');

        $data['countries'] = $this->Customer_M->get('tbl_countries','name','ASC');
        $data['cities'] = $this->Customer_M->get('tbl_cities', 'name','ASC');
        $data['states'] = $this->Customer_M->get('tbl_states', 'name','ASC');
        $data['clients'] = $this->Common_M->get('tbl_clients', 'business_name','ASC');
        $data['terms'] = $this->Customer_M->get('tbl_terms', 'created','ASC');
        $data['panelTitle'] = 'Customers';
        $data['subview'] = 'customer/details_customers';
        $this->load->view('admin/common/_layout_admin', $data);
    }
}

?>