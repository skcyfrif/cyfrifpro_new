<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
header('Access-Control-Allow-Origin: http://88.222.241.45:3030');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods: POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Authorization');
class Client extends CI_Controller {

    function __construct() {

        parent::__construct();

        date_default_timezone_set("Asia/Kolkata");

        $this->load->model('Main_M');
        $this->load->model('Admin_M');
        $this->load->model('Common_M');
        $this->load->model('Client_M');
        $this->load->model('Customer_M');
        $this->load->model('Employee_M');

    }

    public function index() {
        redirect(base_url() . "client/login");
    }

    public function login() {
       

        if ($this->Client_M->isLoggedIn() == TRUE || $this->Admin_M->isLoggedIn() == TRUE) {
            redirect(base_url() . "client/dashboard");
        }
        if ($_POST) {

            $email = $this->db->escape_str($_POST['email']);

            $password = md5($this->db->escape($this->input->post('password')));
            $success = $this->Client_M->login($email, $password);

            if ($success == TRUE) {

                redirect(base_url() . "client/dashboard"); 
            } else {
                $this->session->set_flashdata('error', 'Incorrect Credenetials');
                redirect(base_url() . "client/login");
            }
        }

        $this->load->view('admin/login');
    }
   

    public function dashboard() {
        //var_dump($this->Admin_M->isLoggedIn());exit();
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }

        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']);
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']);
            }

        $data['total'] = $this->Admin_M->getSUM('tbl_invoices', 'total', 'client_id', $client_id);
        $data['due'] = $this->Admin_M->getSUM('tbl_invoices', 'due', 'client_id', $client_id);
        $data['received'] = $this->Admin_M->getSUM('tbl_invoices', 'received', 'client_id', $client_id);
        $data['deposited'] = $this->Admin_M->getSUM('tbl_invoices', 'deposited', 'client_id', $client_id);
        //$data['latest_invoice_status']=$this->Common_M->get('tbl_invoice_payment_status');
        $data['panelTitle'] = 'Dashboard';
        $data['subview'] = 'clients/dashboard';
        $this->load->view('admin/common/_layout_admin', $data);
    }




    public function sub_users($employee_id = NULL)
    {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        // Get client ID
        $client_id = $this->session->userdata('client')['id'] ?? $_POST['client_id'];
        
        $additional_conditions = [
            'parent_id !=' => 0,
            'parent_id' => $client_id
        ];
    
        if ($employee_id) {
            $data['clients'] = $this->Client_M->get('tbl_clients', 'created', 'DESC', 'employee_id', $employee_id, $additional_conditions);
        } else {
            $data['clients'] = $this->Client_M->get('tbl_clients', 'created', 'DESC', NULL, NULL, $additional_conditions);
        }
    
        $data['panelTitle'] = 'SubUsers';
        $data['subview'] = 'clients/sub_users';
        $this->load->view('admin/common/_layout_admin', $data);
    }
    
    public function add_subusers($id = NULL)
    {
        // Check if admin or client is logged in
        if (!$this->Admin_M->isLoggedIn() && !$this->Client_M->isLoggedIn()) {
            redirect(base_url() . "client/login");
        }
    
        // Get client ID
        $client_id = $this->session->userdata('client')['id'] ?? $_POST['client_id'];
    
        // Fetch client details in a single query
        $this->db->select('actype, employee_id, business_name, contract_number, category, type, match, data_source, contract_status, contact_type, paid_amount, contract_amount, contact_person_name, contact_person_mobile, contact_person_email, payment_status, crm_id, state_code, gst_number, nature_of_work, man_power, relationship_officer_name, contract_period, service_availed, owner_name, owner_mobile, address, pincode');
        $this->db->from('tbl_clients');
        $this->db->where('id', $client_id);
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            $client = $query->row();
        }
    
        if ($_POST) {
            $formData = [
                'name' => $_POST['name'],
                'business_name' => $client->business_name,
                'email' => $_POST['email'],
                'mobile' => $_POST['mobile'],
                'password' => md5($this->db->escape($this->input->post('password'))),
                'decrypted_password' => $this->input->post('password'),
                'employee_id' => $client->employee_id,
                'parent_id' => $client_id,
                'contract_number' => $client->contract_number,
                'category' => $client->category,
                'type' => $client->type,
                'match' => $client->match,
                'data_source' => $client->data_source,
                'contract_status' => $client->contract_status,
                'contact_type' => $client->contact_type,
                'paid_amount' => $client->paid_amount,
                'contract_amount' => $client->contract_amount,
                'contact_person_name' => $client->contact_person_name,
                'contact_person_mobile' => $client->contact_person_mobile,
                'contact_person_email' => $client->contact_person_email,
                'payment_status' => $client->payment_status,
                'crm_id' => $client->crm_id,
                'state_code' => $client->state_code,
                'gst_number' => $client->gst_number,
                'nature_of_work' => $client->nature_of_work,
                'man_power' => $client->man_power,
                'relationship_officer_name' => $client->relationship_officer_name,
                'contract_period' => $client->contract_period,
                'service_availed' => $client->service_availed,
                'owner_name' => $client->owner_name,
                'owner_mobile' => $client->owner_mobile,
                'address' => $client->address,
                'pincode' => $client->pincode,
                'actype' => $client->actype,
                'created' => date('Y-m-d H:i:s'),
            ];
    
            if ($id) {
                $this->db->where('id', $id);
                $success = $this->db->update('tbl_clients', $formData);
            } else {
                $success = $this->db->insert('tbl_clients', $formData);
            }
    
            if ($success) {
                $this->session->set_flashdata('success', 'Updated Successfully');
                redirect(base_url() . "client/sub_users/");
            }
        }
    
        if ($id) {
            $data['this_element'] = $this->Common_M->getSingleRow('tbl_clients', 'id', $id);
        }
    
        $data['zones'] = $this->Admin_M->get('tbl_zone', 'title', 'ASC');
        $data['employees'] = $this->Admin_M->get('tbl_employees', 'name', 'ASC');
        $data['panelTitle'] = 'Add SubUsers';
        $data['subview'] = 'clients/add_subusers';
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
       $productlist = $this->Customer_M->get('tbl_invoices', 'created', 'DESC', 'client_id', $client_id);
        
        
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="invoices_list.xlsx"');
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'S.No');
        $sheet->setCellValue('B1', 'CLIENT-ID');
        $sheet->setCellValue('C1', 'TYPE');
        $sheet->setCellValue('D1', 'CUSTOMER');
        $sheet->setCellValue('E1', 'CUSTOMER-ID');
        $sheet->setCellValue('F1', 'CUSTOMER-NOTE');
        $sheet->setCellValue('G1', 'ORDER-ID');
        $sheet->setCellValue('H1', 'DATE');
        $sheet->setCellValue('I1', 'DUE_DATE');
        $sheet->setCellValue('J1', 'BILLING-ADDRESS');
        $sheet->setCellValue('K1', 'TERMS');
        $sheet->setCellValue('L1', 'SUPPLY-PLACE');
        $sheet->setCellValue('M1', 'TAX');
        $sheet->setCellValue('N1', 'TAX-PER');
        $sheet->setCellValue('O1', 'PARTIALLY-PAID-AMOUNT');
        $sheet->setCellValue('P1', 'PARTIALLY-PAID-STATUS');
        $sheet->setCellValue('Q1', 'FILEPATH');
        $sheet->setCellValue('R1', 'NUMBER');
        $sheet->setCellValue('S1', 'TERMS-CONDITIONS');
        $sheet->setCellValue('T1', 'STATUS');
        $sheet->setCellValue('U1', 'PAID-FLAG');
        $sheet->setCellValue('V1', 'DUE');
        $sheet->setCellValue('W1', 'RECIVED');
        $sheet->setCellValue('X1', 'DEPOSITED');
        $sheet->setCellValue('Y1', 'TOTAL');
        $sheet->setCellValue('Z1', 'PREVENT-EDIT');
        $sheet->setCellValue('AA1', 'CREATED');
        $sheet->setCellValue('AB1', 'SALES-PERSON');
        $sheet->setCellValue('AC1', 'BANK');
        $sheet->setCellValue('AD1', 'IFSC-CODE');
        $sheet->setCellValue('AE1', 'AC-NO');
        $sheet->setCellValue('AF1', 'PACKAGE-STATUS');


        $sn=2;
        foreach ($productlist as $prod) {
            $sheet->setCellValue('A'.$sn,$prod->id);
            $sheet->setCellValue('B'.$sn,$prod->client_id);
            $sheet->setCellValue('C'.$sn,$prod->type);
            $sheet->setCellValue('D'.$sn,$prod->customer);
            $sheet->setCellValue('E'.$sn,$prod->customer_id);
            $sheet->setCellValue('F'.$sn,$prod->customer_note);
            $sheet->setCellValue('G'.$sn,$prod->order_id);
            $sheet->setCellValue('H'.$sn,$prod->date);
            $sheet->setCellValue('I'.$sn,$prod->due_date);
            $sheet->setCellValue('J'.$sn,$prod->billing_address);
            $sheet->setCellValue('K'.$sn,$prod->terms);
            $sheet->setCellValue('L'.$sn,$prod->supply_place);
            $sheet->setCellValue('M'.$sn,$prod->tax);
            $sheet->setCellValue('N'.$sn,$prod->tax_per);
            $sheet->setCellValue('O'.$sn,$prod->partially_paid_amount);
            $sheet->setCellValue('P'.$sn,$prod->partially_paid_status);
            $sheet->setCellValue('Q'.$sn,$prod->filePath);
            $sheet->setCellValue('R'.$sn,$prod->number);
            $sheet->setCellValue('S'.$sn,$prod->terms_conditions);
            $sheet->setCellValue('T'.$sn,$prod->status);
            $sheet->setCellValue('U'.$sn,$prod->paidFlag);
            $sheet->setCellValue('V'.$sn,$prod->due);
            $sheet->setCellValue('W'.$sn,$prod->received);
            $sheet->setCellValue('X'.$sn,$prod->deposited);
            $sheet->setCellValue('Y'.$sn,$prod->total);
            $sheet->setCellValue('Z'.$sn,$prod->preventEdit);
            $sheet->setCellValue('AA'.$sn,$prod->created);
            $sheet->setCellValue('AB'.$sn,$prod->sales_person);
            $sheet->setCellValue('AC'.$sn,$prod->bank);
            $sheet->setCellValue('AD'.$sn,$prod->ifccode);
            $sheet->setCellValue('AE'.$sn,$prod->acno);
            $sheet->setCellValue('AF'.$sn,$prod->package_status);
            $sn++;
        }
        //TOTAL
        // $sheet->setCellValue('D8','Total');
        // $sheet->setCellValue('E8','=SUM(E2:E'.($sn-1).')');

        $writer = new Xlsx($spreadsheet);
        $writer->save("php://output");
    }





    public function Spreadsheet_format_downlood()
    {
        if($this->session->userdata('client')['parent_id']==0){
            $client_id2 = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id2 = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }


        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Invoices_format.xlsx"');   
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();

        $this->load->model('Client_M'); // Ensure the model is loaded

        

$activeWorksheet->setCellValue('A1', 'S.No');
$activeWorksheet->setCellValue('B1', 'CLIENT_ID' );
$activeWorksheet->setCellValue('C1', 'TYPE');
$activeWorksheet->setCellValue('D1', 'CUSTOMER');
$activeWorksheet->setCellValue('E1', 'CUSTOMER-ID');
$activeWorksheet->setCellValue('F1', 'CUSTOMER-NOTE');
$activeWorksheet->setCellValue('G1', 'ORDER-ID');
$activeWorksheet->setCellValue('H1', 'DATE');
$activeWorksheet->setCellValue('I1', 'DUE_DATE');
$activeWorksheet->setCellValue('J1', 'BILLING-ADDRESS');
$activeWorksheet->setCellValue('K1', 'TERMS');
$activeWorksheet->setCellValue('L1', 'SUPPLY-PLACE');
$activeWorksheet->setCellValue('M1', 'TAX');
$activeWorksheet->setCellValue('N1', 'TAX-PER');
$activeWorksheet->setCellValue('O1', 'PARTIALLY-PAID-AMOUNT');
$activeWorksheet->setCellValue('P1', 'PARTIALLY-PAID-STATUS');
$activeWorksheet->setCellValue('Q1', 'FILEPATH');
$activeWorksheet->setCellValue('R1', 'NUMBER');
$activeWorksheet->setCellValue('S1', 'TERMS-CONDITIONS');
$activeWorksheet->setCellValue('T1', 'STATUS');
$activeWorksheet->setCellValue('U1', 'PAID-FLAG');
$activeWorksheet->setCellValue('V1', 'DUE');
$activeWorksheet->setCellValue('W1', 'RECIVED');
$activeWorksheet->setCellValue('X1', 'DEPOSITED');
$activeWorksheet->setCellValue('Y1', 'TOTAL');
$activeWorksheet->setCellValue('Z1', 'PREVENT-EDIT');
$activeWorksheet->setCellValue('AA1', 'CREATED');
$activeWorksheet->setCellValue('AB1', 'SALES-PERSON');
$activeWorksheet->setCellValue('AC1', 'BANK');
$activeWorksheet->setCellValue('AD1', 'IFSC-CODE');
$activeWorksheet->setCellValue('AE1', 'AC-NO');
$activeWorksheet->setCellValue('AF1', 'PACKAGE-STATUS');

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
        print_r($_FILES['upload_file']['tmp_name']);
        exit();
        $spreadsheet=$reader->load($_FILES['upload_file']['tmp_name']);
        $sheetdata=$spreadsheet->getActiveSheet()->toArray();
        $sheetcount=count($sheetdata);
        if($sheetcount>1)
        {
            $data=array();
            for ($i=1; $i < $sheetcount; $i++) { 
                $client_id=$sheetdata[$i][1];
                $type=$sheetdata[$i][2];
                $customer=$sheetdata[$i][3];
                $customer_id=$sheetdata[$i][4];
                $customer_note=$sheetdata[$i][5];
                $order_id=$sheetdata[$i][6];
                $date=$sheetdata[$i][7];
                $due_date=$sheetdata[$i][8];
                $billing_address=$sheetdata[$i][9];
                $terms=$sheetdata[$i][10];
                $supply_place=$sheetdata[$i][11];
                $tax=$sheetdata[$i][12];
                $tax_per=$sheetdata[$i][13];
                $partially_paid_amount=$sheetdata[$i][14];
                $partially_paid_status=$sheetdata[$i][15];
                $filePath=$sheetdata[$i][16];
                $number=$sheetdata[$i][17];
                $terms_conditions=$sheetdata[$i][18];
                $status=$sheetdata[$i][19];
                $paidFlag=$sheetdata[$i][20];
                $due=$sheetdata[$i][21];
                $received=$sheetdata[$i][22];
                $deposited=$sheetdata[$i][23];
                $total=$sheetdata[$i][24];
                $preventEdit=$sheetdata[$i][25];
                $created=$sheetdata[$i][26];
                $sales_person=$sheetdata[$i][27];
                $bank=$sheetdata[$i][28];
                $ifccode=$sheetdata[$i][29];
                $acno=$sheetdata[$i][30];
                $package_status=$sheetdata[$i][31];

                $data[]=array(
                                                    'client_id'=>$client_id,
                                                    'type'=>$type,
                                                    'customer'=>$customer,
                                                    'customer_id'=>$customer_id,
                                                    'customer_note'=>$customer_note,
                                                    'order_id'=>$order_id,
                                                    'date'=>$date,
                                                    'due_date'=>$due_date,
                                                    'billing_address'=>$billing_address,
                                                    'terms'=>$terms,
                                                    'supply_place'=>$supply_place,
                                                    'tax'=>$tax,
                                                    'tax_per'=>$tax_per,
                                                    'partially_paid_amount'=>$partially_paid_amount,
                                                    'partially_paid_status'=>$partially_paid_status,
                                                    'filePath'=>$filePath,
                                                    'number'=>$number,
                                                    'terms_conditions'=>$terms_conditions,
                                                    'status'=>$status,
                                                    'paidFlag'=>$paidFlag,
                                                    'due'=>$due,
                                                    'received'=>$received,
                                                    'deposited'=>$deposited,
                                                    'total'=>$total,
                                                    'preventEdit'=>$preventEdit,
                                                    'created'=>$created,
                                                    'sales_person'=>$sales_person,
                                                    'bank'=>$bank,
                                                    'ifccode'=>$ifccode,
                                                    'acno'=>$acno,
                                                    'package_status'=>$package_status
                                                );
                            }
            $inserdata=$this->Client_M->insert_batch($data);
            if($inserdata)
            {
                $this->session->set_flashdata('message','<div class="alert alert-success">Successfully Added.</div>');
                redirect('client/invoices');
            } else {
                $this->session->set_flashdata('message','<div class="alert alert-danger">Data Not uploaded. Please Try Again.</div>');
                redirect('client/invoices');
            }
        }
        $data['panelTitle'] = 'All Invoices';
        $data['subview'] = 'clients/invoices';
        $this->load->view('admin/common/_layout_admin', $data);
    }
    







    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url() . "client/login");
    }

    public function delete() {
        $tbl_name = $this->uri->segment(3);
        $rawURL = $this->uri->segment(4);
        $id = $this->uri->segment(5);
        $returnURL = str_replace('-', '/', $rawURL);
//        echo $tbl_name;exit;
        if($tbl_name=="tbl_invoice_payments"){
            $this->db->where('payid', $id);        
        }elseif($tbl_name=="tbl_user_roles"){
            $this->db->where('role_id', $id);
        }elseif($tbl_name=="tbl_warehouses"){
            $this->db->where('wr_id', $id);        
        }else{
            $this->db->where('id', $id);
        }
//        echo $tbl_name;echo $rawURL;echo $returnURL;echo $id;exit();        
        $success = $this->db->delete($tbl_name);
        
//        echo "<pre>";
//        print_r($this->db->last_query());
//        print_r($this->db->error());
//        print_r($success);
//        exit();
        if ($success) {
            $this->session->set_flashdata('success', 'Removed Successfully');
            redirect(base_url() . $returnURL);
        }
    }


    public function add_recurring_expense($id = NULL) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }

        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

            if($this->session->userdata('client')['parent_id']!=0){
                $subuser_id = $this->session->userdata('client')['id'];
            }elseif($this->session->userdata('client')['parent_id']==0){
                $subuser_id = $this->session->userdata('client')['parent_id'];
            }


        if ($_POST) {
            $customer = explode(':', $_POST['customer']);
            $vendor = explode(':', $_POST['vendor']);

            $idata['client_id'] = $client_id;
            $idata['subuser_id'] = $subuser_id;
            $idata['profile_name'] = $_POST['profile_name'];
            //$idata['repeat_every']=$_POST['repeat_every'];
            $idata['paid_through'] = $_POST['paid_through'];
            $idata['start_date'] = $_POST['start_date'];
            $idata['end_date'] = $_POST['end_date'];
            $idata['expense_account'] = $_POST['expense_account'];
            $idata['amount'] = $_POST['amount'];
            $idata['vendor_name'] = $vendor[0];
            $idata['vendor_id'] = $vendor[1];
            $idata['customer_name'] = $customer[0];
            $idata['customer_id'] = $customer[1];
            $idata['note'] = $_POST['note'];
            $idata['created'] = date('Y-m-d H:i:s');

            if ($id) {
                $this->db->where('id', $id);
                $success = $this->db->update('tbl_recurring_expenses', $idata);
            } else {
                $success = $this->db->insert('tbl_recurring_expenses', $idata);
                // echo $this->db->last_query();
                // exit();
            }
            if ($success) {
                $this->session->set_flashdata('success', 'Updated Successfully');
                redirect(base_url() . "client/recurring_expenses");
            }
        }
        if ($id) {
            $data['this_element'] = $this->Common_M->getSingleRow('tbl_recurring_expenses', 'id', $id);
            //echo "<pre>"; print_r($data['this_element']); exit;
            $data['panelTitle'] = 'Update Recurring Expense';
        } else {
            $data['panelTitle'] = 'Add Recurring Expense';
        }
        $data['payment_accounts'] = $this->Common_M->get('tbl_payment_accounts', 'name', 'ASC');
        $data['_RETURN_URL'] = base64_encode('client/add_recurring_expense');
        $data['customers'] = $this->Common_M->get('tbl_customers', 'created', 'DESC', 'client_id', $client_id);
        $data['vendors'] = $this->Common_M->get('tbl_vendors', 'created', 'DESC', 'client_id',$client_id);
        $data['subview'] = 'clients/add_recurring_expense';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function recurring_expenses() {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }
        $data['recurring_expenses'] = $this->Common_M->get('tbl_recurring_expenses', 'created', 'DESC', 'client_id', $client_id);
        $data['panelTitle'] = 'Recurring Expenses';
        $data['subview'] = 'clients/recurring_expenses';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function vendors() {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }

        if($this->session->userdata('client')['parent_id']==0){
            $client_id = $this->session->userdata('client')['id'];
        }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']);
        }

        $data['vendors'] = $this->Common_M->get('tbl_vendors', 'created', 'DESC', 'client_id', $client_id);
        $data['panelTitle'] = 'Vendors';
        $data['subview'] = 'clients/vendors';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function getData() {


        if (isset($_POST['keyword'])) {

            $output = '';
            $keyword = $_POST['keyword'];

            if($this->session->userdata('client')['parent_id']==0){
                $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
                }elseif($this->session->userdata('client')['parent_id']!=0){
                $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
                }

            $sql = "SELECT title,id,saleprice FROM tbl_inventory WHERE client_id='" . $client_id . "' AND (remaining_stock <= stock) AND title LIKE '%$keyword%' GROUP BY title;";

            $query = $this->db->query($sql);
            $result = $query->result();
            $output = '<ul class="list-unstyled list-group">';
            if ($query->num_rows() > 0) {
                foreach ($result as $key) {
                    $output .= '<li data-sprice="' . $key->saleprice . '" onclick="putData(this)" class="liClass list-group-item">' . $key->title . '</li>';
                }
            } else {
                $output .= '<li class="liClass list-group-item">Not Found</li>';
            }
            $output .= '<li class="addLinkC list-group-item"><button type="button" onclick="goToInventory()" class="btn btn-success">+ Add</button></li></ul>';
            echo $output;
        }
    }

    public function sales_persons($id = NULL) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        // if($_GET['client_id'])
        // {
        //   $client_id=$clientId;
        // }
        // else
        // {
        //}

        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

            if($this->session->userdata('client')['parent_id']!=0){
                $subuser_id = $this->session->userdata('client')['id'];
            }elseif($this->session->userdata('client')['parent_id']==0){
                $subuser_id = $this->session->userdata('client')['parent_id'];
            }

       // $client_id = $this->session->userdata('client')['id'];

        if ($_POST) {
            $idata = array(
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'mobile' => $_POST['mobile'],
                'client_id' => $client_id,
                'subuser_id' => $subuser_id,
                'created' => date('Y-m-d H:i:s')
            );
            if ($id) {
                $this->db->where('id', $id);
                $success = $this->db->update('tbl_sales_persons', $idata);
            } else {
                $success = $this->db->insert('tbl_sales_persons', $idata);
            }
            if ($success) {
                if ($_GET['redirect']) {
                    $encrypted = $_GET['redirect'];
                    $url = base64_decode($encrypted);
                    //echo $url;exit();
                    redirect(base_url() . $url);
                } else {
                    redirect(base_url() . 'client/sales_persons');
                }
            }
        }
        if ($id) {
            $data['btnText'] = 'Update';
            $data['this_element'] = $this->Common_M->getSingleRow('tbl_sales_persons', 'id', $id);
        } else {
            $data['btnText'] = 'Add';
        }
        $data['sales_persons'] = $this->Common_M->get('tbl_sales_persons', 'created', 'DESC', 'client_id', $client_id);
        $data['panelTitle'] = 'Sales Persons';
        $data['subview'] = 'clients/sales_persons';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function add_vendor($id = NULL) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }

        if($this->session->userdata('client')['parent_id']==0){
            $client_id = $this->session->userdata('client')['id'];
        }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']);
        }

        if ($_POST) {
            if($this->session->userdata('client')['parent_id']!=0){
                $subuser_id = $this->session->userdata('client')['id'];
            }elseif($this->session->userdata('client')['parent_id']==0){
                $subuser_id = $this->session->userdata('client')['parent_id'];
            }
            $idata['client_id'] = $client_id;
            $idata['subuser_id'] = $subuser_id;
            $idata['name'] = $_POST['name'];
            $idata['email'] = $_POST['email'];
            $idata['display_name'] = $_POST['display_name'];
            $idata['company_name'] = $_POST['company_name'];
            $idata['mobile'] = $_POST['mobile'];
            $idata['website'] = $_POST['website'];
            $idata['gst'] = $_POST['gst'];
            $idata['state_code'] = $_POST['state_code'];
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
            $idata['cp_name'] = $_POST['cp_name'];
            $idata['cp_mobile'] = $_POST['cp_mobile'];
            $idata['cp_email'] = $_POST['cp_email'];
            $idata['currency'] = $_POST['currency'];
            $idata['opening_balance'] = $_POST['opening_balance'];
            $idata['exchange_rate'] = $_POST['exchange_rate'];
            $idata['terms'] = $_POST['terms'];
            $idata['remarks'] = $_POST['remarks'];
            $idata['created'] = date('Y-m-d H:i:s');

            if ($id) {
                $this->db->where('id', $id);
                $success = $this->db->update('tbl_vendors', $idata);
            } else {
                $success = $this->db->insert('tbl_vendors', $idata);
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
                    redirect(base_url() . "client/vendors");
                }
            }
        }

        if ($id) {
            $data['this_element'] = $this->Common_M->getSingleRow('tbl_vendors', 'id', $id);
            $data['panelTitle'] = 'Update Vendor';
        } else {
            $data['panelTitle'] = 'Add Vendor';
        }
        $data['currency'] = $this->Common_M->get('tbl_currencies', 'country', 'ASC');
        $data['clients'] = $this->Common_M->get('tbl_clients', 'business_name', 'ASC');
        $data['countries'] = $this->Common_M->get('tbl_countries', 'name', 'ASC');
        $data['cities'] = $this->Common_M->get('tbl_cities', 'name', 'ASC');
        $data['states'] = $this->Common_M->get('tbl_states', 'name', 'ASC');
        $data['terms'] = $this->Common_M->get('tbl_terms', 'name', 'ASC');
        $data['subview'] = 'clients/add_vendor';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function vendor_report($id = NULL) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

        //$client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];

        $data['this_element'] = $this->Common_M->getSingleRow('tbl_vendors', 'id', $id);
        $data['panelTitle'] = 'Details Vendor';

        $query = $this->db->query("select tbl_client_currencies.*,tbl_currencies.code as ccode,tbl_currencies.country as ccountry from tbl_client_currencies left join tbl_currencies on tbl_client_currencies.code=tbl_currencies.id where tbl_client_currencies.client_id='" . $client_id . "'");
        $data['allcurn'] = $query->result();

        $data['currency_list'] = $this->Common_M->get('tbl_currencies', 'country', 'ASC');
        $data['clients'] = $this->Common_M->get('tbl_clients', 'business_name', 'ASC');
        $data['countries'] = $this->Common_M->get('tbl_countries', 'name', 'ASC');
        $data['cities'] = $this->Common_M->get('tbl_cities', 'name', 'ASC');
        $data['states'] = $this->Common_M->get('tbl_states', 'name', 'ASC');
        $data['terms_list'] = $this->Common_M->get('tbl_terms', 'name', 'ASC');

        //echo "<pre>"; print_r($data); exit;
        $data['subview'] = 'clients/deatils_vendor';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function ajaxResponse() {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
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
        $result = $this->Common_M->get($tbl_name, 'name', 'ASC', $where, $id);
        $display = '';
        foreach ($result as $key) {
            $display .= '<option value="' . $key->id . '">' . $key->name . '</option>';
        }
        echo $display;
    }

    public function add_estimate($id = NULL) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }

        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

            if($this->session->userdata('client')['parent_id']!=0){
                $subuser_id = $this->session->userdata('client')['id'];
            }elseif($this->session->userdata('client')['parent_id']==0){
                $subuser_id = $this->session->userdata('client')['parent_id'];
            }

        if ($_POST) {
            // echo '<pre>';  print_r($_POST);exit()			
            $rdata = explode(':', $_POST['name']);
            $customer_name = $rdata[0];
            $customer_id = $rdata[1];
            // echo $id;echo $name;exit();
            $estimateData = array(
                'client_id' => $client_id,
                'subuser_id' => $subuser_id,
                'customer' => $customer_name,
                'customer_id' => $customer_id,
                'project_name' => $_POST['project_name'],
                'number' => $_POST['number'],
                'sales_person' => $_POST['sales_person'],
                'terms_conditions' => $_POST['terms_conditions'],
                'customer_note' => $_POST['customer_note'],
                'reference' => $_POST['reference'],
                'date' => $_POST['date'],
                'expiry_date' => $_POST['expiry_date'],
                'total' => $_POST['total_amount'],
                'tax_per' => $_POST['tax_per'],
                'tax' => $_POST['tax_amount'],
                'created' => date('Y-m-d H:i:s')
            );
            // echo '<pre>'; print_r($estimateData);exit();

            if (isset($_FILES['file'])) {
                $target_dir = "assets/documents/estimates/";
                $target_file = $target_dir . basename($_FILES["file"]["name"]);
                //$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
                $estimateData['filePath'] = $target_file;
            } else if (isset($_POST['hiddenFilePath'])) {
                $estimateData['filePath'] = $_POST['hiddenFilePath'];
            } else {
                $estimateData['filePath'] = NULL;
            }

            if ($id) {
                $this->db->where('id', $id);
                $success = $this->db->update('tbl_estimates', $estimateData);
                $estimate_id = $id;
            } else {
                // echo '<pre>';  print_r($estimateData);exit();
                $success = $this->db->insert('tbl_estimates', $estimateData);
                //$this->db->last_query();exit();
                $estimate_id = $this->db->insert_id();
            }

            if ($success) {
                $this->db->where('estimate_id', $estimate_id);
                $this->db->delete('tbl_estimate_inventory');
                for ($i = 0; $i < count($_POST['title']); $i++) {
                    $productData = array(
                        'estimate_id' => $estimate_id,
                        'title' => $_POST['title'][$i],
                        'qty' => $_POST['qty'][$i],                        
                        'unit' => $_POST['unit'][$i],
                        'price' => $_POST['price'][$i],
                        'discount' => $_POST['discount'][$i],
                        'tax' => $_POST['tax'][$i],
                        'tax_amount' => $_POST['taxamnt'][$i],
                        'total_amount' => $_POST['total'][$i],
                    );
                    $success2 = $this->db->insert('tbl_estimate_inventory', $productData);
                }
                if ($success2) {
                    redirect(base_url() . "client/estimates");
                }
            }
        }
        if ($id) {
            $data['isEditing'] = TRUE;
            $data['panelTitle'] = 'Update Estimate';
            $data['this_element'] = $this->Common_M->getSingleRow('tbl_estimates', 'id', $id);
            $data['products'] = $this->Common_M->get('tbl_estimate_inventory', 'id', 'DESC', 'estimate_id', $id);
        } else {
            $data['panelTitle'] = 'Create Estimate';
        }

        $data['_URL_add_estimate'] = base64_encode('client/add_estimate');

        $data['inventory'] = $this->Common_M->get('tbl_inventory', 'created', 'DESC', 'client_id', $client_id);

        $data['customers'] = $this->Common_M->get('tbl_customers', 'created', 'DESC', 'client_id', $client_id);

        $data['project'] = $this->Common_M->get('tbl_projects', 'name', 'ASC', 'client_id',$client_id);

        $data['sales_persons'] = $this->Common_M->get('tbl_sales_persons', 'created', 'DESC', 'client_id', $client_id);

        $data['terms'] = $this->Common_M->get('tbl_terms', 'created', 'ASC');

        $data['subview'] = 'clients/add_estimate';

        $this->load->view('clients/common/_layout_admin', $data);

        //$this->load->view('admin/add_estimate2',$data);
    }

    public function estimates() {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }

        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }
        $data['total'] = $this->Admin_M->getSUM('tbl_estimates', 'total', 'client_id', $client_id);
        //$data['due']=$this->Admin_M->getSUM('tbl_estimates','total','status','due');
        //$data['received']=$this->Admin_M->getSUM('tbl_estimates','total','status','received');
        //$data['deposited']=$this->Admin_M->getSUM('tbl_estimates','total','status','deposited');
        $data['estimates'] = $this->Common_M->get('tbl_estimates', 'created', 'DESC', 'client_id', $client_id);
        $data['panelTitle'] = 'All Estimates';
        $data['subview'] = 'clients/estimates';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function add_sales_order($id = NULL) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }

        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

        if ($_POST) {
            if($this->session->userdata('client')['parent_id']!=0){
                $subuser_id = $this->session->userdata('client')['id'];
            }elseif($this->session->userdata('client')['parent_id']==0){
                $subuser_id = $this->session->userdata('client')['parent_id'];
            }
            
            ini_set("display_errors", "1");
            // echo '<pre>';
            // print_r($_POST);exit();
            $rdata = explode(':', $_POST['name']);
            $customer_name = $rdata[0];
            $customer_id = $rdata[1];
            // echo $id;echo $name;exit();
            $sales_orderData = array(
                'client_id' => $client_id,
                'subuser_id' => $subuser_id,
                'customer' => $customer_name,
                'customer_id' => $customer_id,
                'delivery_method' => $_POST['delivery_method'],
                'number' => $_POST['number'],
                'customer_note' => $_POST['customer_note'],
                'terms_conditions' => $_POST['terms_conditions'],
                'sales_person' => $_POST['sales_person'],
                'reference' => $_POST['reference'],
                'sales_ord_id' => $_POST['sales_ord_id'],
                'date' => $_POST['date'],
                'shipment_date' => $_POST['shipment_date'],
                'total' => $_POST['total_amount'],
                'adjustment' => $_POST['adjustment'],
                'tax_per' => $_POST['tax_per'],
                'tax' => $_POST['tax_amount'],
                'created' => date('Y-m-d H:i:s')
            );
//             echo '<pre>';
//             print_r($_POST);exit();
            if (isset($_FILES['file'])) {
                $target_dir = "assets/documents/sales_orders/";
                $target_file = $target_dir . basename($_FILES["file"]["name"]);
                //$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
                $sales_orderData['filePath'] = $target_file;
            } else if (isset($_FILES['hiddenFilePath'])) {
                $sales_orderData['filePath'] = $_POST['hiddenFilePath'];
            } else {
                $sales_orderData['filePath'] = NULL;
            }


            if ($id) {
                $this->db->where('id', $id);
                $success = $this->db->update('tbl_sales_orders', $sales_orderData);
                $sales_order_id = $id;
            } else {
//                 echo '<pre>';
//                 print_r($sales_orderData);
                // exit();
                $success = $this->db->insert('tbl_sales_orders', $sales_orderData);

//                $this->db->last_query();
//                echo $this->db->_error_message();
//                error_log("data in model AFTER INSERT: ");
//                exit();
                $sales_order_id = $this->db->insert_id();
            }
//            print_r($this->db->insert_id());
//            $this->db->last_query();
//                print_r($this->db->error()); 
//                error_log("data in model AFTER INSERT: ");
//                exit();
            if ($success) {
                $this->db->where('sales_order_id', $sales_order_id);
                $this->db->delete('tbl_sales_order_inventory');
                for ($i = 0; $i < count($_POST['title']); $i++) {
                    $productData = array(
                        'sales_order_id' => $sales_order_id,
                        'title' => $_POST['title'][$i],
                        'qty' => $_POST['qty'][$i],
                        'unit' => $_POST['unit'][$i],
                        'price' => $_POST['price'][$i],
                        'discount' => $_POST['discount'][$i],
                        'tax' => $_POST['tax'][$i],
                        'tax_amount' => $_POST['taxamnt'][$i],
                        'total_amount' => $_POST['total'][$i],
                    );
                    $success2 = $this->db->insert('tbl_sales_order_inventory', $productData);
                }
                if ($success2) {
                    $this->session->set_flashdata('success', 'Updated Successfully');
                    redirect(base_url() . "client/sales_orders");
                }
            }
        }
        if ($id) {
            $data['isEditing'] = TRUE;
            $data['panelTitle'] = 'Update Sales Order';
            $data['this_element'] = $this->Common_M->getSingleRow('tbl_sales_orders', 'id', $id);
            $data['products'] = $this->Common_M->get('tbl_sales_order_inventory', 'id', 'DESC', 'sales_order_id', $id);
        } else {
            $data['panelTitle'] = 'Create Sales Order';
        }

        $data['_URL_add_sales_order'] = base64_encode('client/add_sales_order');
        $data['inventory'] = $this->Common_M->get('tbl_inventory', 'created', 'DESC', 'client_id', $client_id);
        $data['customers'] = $this->Common_M->get('tbl_customers', 'created', 'DESC', 'client_id', $client_id);
        $data['sales_persons'] = $this->Common_M->get('tbl_sales_persons', 'created', 'DESC', 'client_id', $client_id);
        $data['subview'] = 'clients/add_sales_order';
        $this->load->view('clients/common/_layout_admin', $data);
        //$this->load->view('admin/add_sales_order2',$data);
    }

    public function sales_orders() {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }

        if($this->session->userdata('client')['parent_id']==0){
            $client_id = $this->session->userdata('client')['id'];
        }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']);
        }


        $data['total'] = $this->Admin_M->getSUM('tbl_sales_orders', 'total', 'client_id', $client_id);
        //$data['due']=$this->Admin_M->getSUM('tbl_sales_orders','total','status','due');
        //$data['received']=$this->Admin_M->getSUM('tbl_sales_orders','total','status','received');
        //$data['deposited']=$this->Admin_M->getSUM('tbl_sales_orders','total','status','deposited');
        $data['sales_orders'] = $this->Common_M->get('tbl_sales_orders', 'created', 'DESC', 'client_id', $client_id);
        $data['sales_persons'] = $this->Common_M->get('tbl_sales_persons', 'created', 'DESC', 'client_id', $client_id);
        $data['panelTitle'] = 'All Sales Orders';
        $data['subview'] = 'clients/sales_orders';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function add_delivery_challan($id = NULL) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }

        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

        if ($_POST) {

            if($this->session->userdata('client')['parent_id']!=0){
                $subuser_id = $this->session->userdata('client')['id'];
            }elseif($this->session->userdata('client')['parent_id']==0){
                $subuser_id = $this->session->userdata('client')['parent_id'];
            }
            $rdata = explode(':', $_POST['name']);
            $customer_name = $rdata[0];
            $customer_id = $rdata[1];
            $delivery_challanData = array(
                'client_id' => $client_id,
                'subuser_id' => $subuser_id,
                'customer' => $customer_name,
                'customer_id' => $customer_id,
                'challan_type' => $_POST['challan_type'],
                'number' => $_POST['number'],
                'terms_conditions' => $_POST['terms_conditions'],
                'customer_note' => $_POST['customer_note'],
                'reference' => $_POST['reference'],
                'date' => $_POST['date'],
                'adjustment' => $_POST['adjustment'],
                'total' => $_POST['total_amount'],
                'tax_per' => $_POST['tax_per'],
                'tax' => $_POST['tax_amount'],
                'created' => date('Y-m-d H:i:s')
            );
            // echo '<pre>';
            // print_r($delivery_challanData);exit();
            if (isset($_FILES['file'])) {
                $target_dir = "assets/documents/delivery_challans/";
                $target_file = $target_dir . basename($_FILES["file"]["name"]);
                //$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
                $delivery_challanData['filePath'] = $target_file;
            } else if (isset($_FILES['hiddenFilePath'])) {
                $delivery_challanData['filePath'] = $_POST['hiddenFilePath'];
            } else {
                $delivery_challanData['filePath'] = NULL;
            }
            if ($id) {
                $this->db->where('id', $id);
                $success = $this->db->update('tbl_delivery_challans', $delivery_challanData);
                $delivery_challan_id = $id;
            } else {
                // echo '<pre>';
                // print_r($delivery_challanData);exit();
                $success = $this->db->insert('tbl_delivery_challans', $delivery_challanData);
                //$this->db->last_query();exit();
                $delivery_challan_id = $this->db->insert_id();
            }
            if ($success) {
                $this->db->where('delivery_challan_id', $delivery_challan_id);
                $this->db->delete('tbl_delivery_challan_inventory');
                for ($i = 0; $i < count($_POST['title']); $i++) {
                    $productData = array(
                        'delivery_challan_id' => $delivery_challan_id,
                        'title' => $_POST['title'][$i],
                        'qty' => $_POST['qty'][$i],
                        'unit' => $_POST['unit'][$i],
                        'price' => $_POST['price'][$i],
                        'discount' => $_POST['discount'][$i],
                        'tax' => $_POST['tax'][$i],
                        'tax_amount' => $_POST['taxamnt'][$i],
                        'total_amount' => $_POST['total'][$i],
                    );
                    $success2 = $this->db->insert('tbl_delivery_challan_inventory', $productData);
                }
                if ($success2) {
                    $this->session->set_flashdata('success', 'Updated Successfully');
                    redirect(base_url() . "client/delivery_challans");
                }
            }
        }
        if ($id) {
            $data['isEditing'] = TRUE;
            $data['panelTitle'] = 'Update Delivery Challan';
            $data['this_element'] = $this->Common_M->getSingleRow('tbl_delivery_challans', 'id', $id);
            $data['products'] = $this->Common_M->get('tbl_delivery_challan_inventory', 'id', 'DESC', 'delivery_challan_id', $id);
        } else {
            $data['panelTitle'] = 'Create Delivery Challan';
        }

        $data['_URL_add_delivery_challan'] = base64_encode('client/add_delivery_challan');
        $data['inventory'] = $this->Common_M->get('tbl_inventory', 'created', 'DESC', 'client_id', $client_id);
        $data['customers'] = $this->Common_M->get('tbl_customers', 'created', 'DESC', 'client_id', $client_id);
        $data['subview'] = 'clients/add_delivery_challan';
        $this->load->view('clients/common/_layout_admin', $data);
        //$this->load->view('admin/add_delivery_challan2',$data);
    }

    public function delivery_challans() {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }

        if($this->session->userdata('client')['parent_id']==0){
            $client_id = $this->session->userdata('client')['id'];
        }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']);
        }


        $data['total'] = $this->Admin_M->getSUM('tbl_delivery_challans', 'total', 'client_id', $client_id);
        //$data['due']=$this->Admin_M->getSUM('tbl_delivery_challans','total','status','due');
        //$data['received']=$this->Admin_M->getSUM('tbl_delivery_challans','total','status','received');
        //$data['deposited']=$this->Admin_M->getSUM('tbl_delivery_challans','total','status','deposited');
        $data['delivery_challans'] = $this->Common_M->get('tbl_delivery_challans', 'created', 'DESC', 'client_id', $client_id);
        $data['panelTitle'] = 'All Delivery Challans';
        $data['subview'] = 'clients/delivery_challans';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function add_credit_note($id = NULL) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

        if ($_POST) {
            if($this->session->userdata('client')['parent_id']!=0){
                $subuser_id = $this->session->userdata('client')['id'];
            }elseif($this->session->userdata('client')['parent_id']==0){
                $subuser_id = $this->session->userdata('client')['parent_id'];
            }

            //echo '<pre>'; print_r($_POST);exit();

            $rdata = explode(':', $_POST['name']);
            $customer_name = $rdata[0];
            $customer_id = $rdata[1];
            // echo $id;echo $name;exit();
            $credit_noteData = array(
                'client_id' => $client_id,
                'customer' => $customer_name,
                'subuser_id' => $subuser_id,
                'customer_id' => $customer_id,
                'invoice' =>  $_POST['invoice'],
                'sales_person' => $_POST['sales_person'],
                'terms_conditions' => $_POST['terms_conditions'],
                'customer_note' => $_POST['customer_note'],
                'reference' => $_POST['reference'],
                'number' => $_POST['number'],
                'date' => $_POST['date'],
                'total' => $_POST['total_amount'],
                'tax_per' => $_POST['tax_per'],
                'tax' => $_POST['tax_amount'],
                'created' => date('Y-m-d H:i:s')
            );

            if (isset($_FILES['file'])) {

                $target_dir = "assets/documents/estimates/";
                $target_file = $target_dir . basename($_FILES["file"]["name"]);
                //$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
                $credit_noteData['filePath'] = $target_file;
            } else if (isset($_FILES['hiddenFilePath'])) {

                $credit_noteData['filePath'] = $_POST['hiddenFilePath'];
            }

            if ($id) {

                $this->db->where('id', $id);
                $success = $this->db->update('tbl_credit_notes', $credit_noteData);
                $credit_note_id = $id;
            } else {
                //echo '<pre>'; print_r($credit_noteData); exit();

                $success = $this->db->insert('tbl_credit_notes', $credit_noteData);
                //$this->db->last_query();exit();
                $credit_note_id = $this->db->insert_id();
            }
            if ($success) {
                $this->db->where('credit_note_id', $credit_note_id);
                $this->db->delete('tbl_credit_note_inventory');
                for ($i = 0; $i < count($_POST['title']); $i++) {

                    $productData = array(
                        'credit_note_id' => $credit_note_id,
                        'title' => $_POST['title'][$i],
                        'account' => $_POST['account'][$i],
                        'qty' => $_POST['qty'][$i],
                        'unit' => $_POST['unit'][$i],
                        'price' => $_POST['price'][$i],
                        'discount' => $_POST['discount'][$i],
                        'tax_amount' => $_POST['taxamnt'][$i],
                        'total_amount' => $_POST['total'][$i],
                    );

                    $success2 = $this->db->insert('tbl_credit_note_inventory', $productData);
//                    echo '<pre>';
//                    print_r($productData);
//                    echo '</pre><br>';
//                    print_r($success2);
//                    echo $this->db->last_query();exit();
                }

                if ($success2) {
//                    redirect(base_url() . "client/credit_notes");
                }
            }
        }
        if ($id) {
            $data['isEditing'] = TRUE;
            $data['panelTitle'] = 'Update Credit Note';
            $data['this_element'] = $this->Common_M->getSingleRow('tbl_credit_notes', 'id', $id);
            $data['products'] = $this->Common_M->get('tbl_credit_note_inventory', 'id', 'DESC', 'credit_note_id', $id);
        } else {
            $data['panelTitle'] = 'Create Credit Note';
        }
        $data['accountEnabled'] = TRUE;
        $data['accounts'] = $this->Common_M->get('tbl_accounts', 'name', 'ASC', 'client_id', $client_id);
        $data['_URL_add_credit_note'] = base64_encode('client/add_credit_note');
        $data['inventory'] = $this->Common_M->get('tbl_inventory', 'created', 'DESC', 'client_id', $client_id);
        $data['customers'] = $this->Common_M->get('tbl_customers', 'created', 'DESC', 'client_id', $client_id);
        $data['sales_persons'] = $this->Common_M->get('tbl_sales_persons', 'created', 'DESC', 'client_id', $client_id);
        $data['subview'] = 'clients/add_credit_note';
        $this->load->view('clients/common/_layout_admin', $data);
        //$this->load->view('admin/add_credit_note2',$data);
    }

    public function credit_notes() {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

        $data['total'] = $this->Admin_M->getSUM('tbl_credit_notes', 'total', 'client_id', $client_id);
        //$data['due']=$this->Admin_M->getSUM('tbl_credit_notes','total','status','due');
        //$data['received']=$this->Admin_M->getSUM('tbl_credit_notes','total','status','received');
        //$data['deposited']=$this->Admin_M->getSUM('tbl_credit_notes','total','status','deposited');
        $data['credit_notes'] = $this->Common_M->get('tbl_credit_notes', 'created', 'DESC', 'client_id', $client_id);
        $data['panelTitle'] = 'All Credit Notes';
        $data['subview'] = 'clients/credit_notes';
        $this->load->view('clients/common/_layout_admin', $data);
    }

    public function add_bill($id = NULL) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
           if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

        if ($_POST) {
            if($this->session->userdata('client')['parent_id']!=0){
                $subuser_id = $this->session->userdata('client')['id'];
            }elseif($this->session->userdata('client')['parent_id']==0){
                $subuser_id = $this->session->userdata('client')['parent_id'];
            }


            // echo '<pre>';
            // print_r($_POST);exit();
            $rdata = explode(':', $_POST['name']);
            $vendor_name = $rdata[0];
            $vendor_id = $rdata[1];
            // echo $id;echo $name;exit();
            $billData = array(
                'client_id' => $client_id,
                'subuser_id' => $subuser_id,
                'vendor' => $vendor_name,
                'vendor_id' => $vendor_id,
                'bill' => $_POST['bill'],
                'vendor_adds' => $_POST['vendor_adds'],
                'vendor_phone' => $_POST['vendor_phone'],
                'vendor_email' => $_POST['vendor_email'],
                'term' => $_POST['term'],
                'date' => $_POST['date'],
                'total' => $_POST['total_amount'],
                'tax_per' => $_POST['tax_per'],
                'adjustment' => $_POST['adjustment'],
                'tax' => $_POST['tax_amount'],
                'created' => date('Y-m-d H:i:s')
            );
            // echo '<pre>';
            // print_r($billData);exit();
            if ($id) {
                $this->db->where('id', $id);
                $success = $this->db->update('tbl_bills', $billData);
                $bill_id = $id;
            } else {
                // echo '<pre>';
                // print_r($billData);exit();
                $success = $this->db->insert('tbl_bills', $billData);
                //$this->db->last_query();exit();
                $bill_id = $this->db->insert_id();
            }
            if ($success) {
                $this->db->where('bill_id', $bill_id);
                $this->db->delete('tbl_bill_inventory');
                for ($i = 0; $i < count($_POST['title']); $i++) {
                    $productData = array(
                        'bill_id' => $bill_id,
                        'title' => $_POST['title'][$i],
                        'qty' => $_POST['qty'][$i],
                        'price' => $_POST['price'][$i],
                        'discount' => $_POST['discount'][$i],                        
                        'unit' => $_POST['unit'][$i],
                        'tax' => $_POST['tax'][$i],
                        'tax_amount' => $_POST['taxamnt'][$i],
                        'total_amount' => $_POST['total'][$i],
                    );
                    $success2 = $this->db->insert('tbl_bill_inventory', $productData);
                }
                if ($success2) {
                    redirect(base_url() . "client/bills");
                }
            }
        }
        if ($id) {
            $data['isEditing'] = TRUE;
            $data['panelTitle'] = 'Update Bill';
            $data['this_element'] = $this->Common_M->getSingleRow('tbl_bills', 'id', $id);
            $data['products'] = $this->Common_M->get('tbl_bill_inventory', 'id', 'DESC', 'bill_id', $id);
        } else {
            $data['panelTitle'] = 'Create Bill';
        }

        $data['_URL_add_bill'] = base64_encode('client/add_bill');
        $data['inventory'] = $this->Common_M->get('tbl_inventory', 'created', 'DESC', 'client_id', $client_id);
        $data['vendors'] = $this->Common_M->get('tbl_vendors', 'created', 'DESC', 'client_id', $client_id);
        $data['terms'] = $this->Common_M->get('tbl_terms', 'created', 'ASC');
        $data['subview'] = 'clients/add_bill';
        $this->load->view('clients/common/_layout_admin', $data);
        //$this->load->view('admin/add_bill2',$data);
    }

    public function bills($id = NULL) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if ($id) {
            $client_id = $id;
        } else {
            $client = $this->session->userdata('client');
           $client_id = ($client['parent_id'] == 0 ? $client['id'] : $client['parent_id']) ?? $_POST['client_id'];
        }
        $data['total'] = $this->Admin_M->getSUM('tbl_bills', 'total', 'client_id', $client_id);
        $data['bills'] = $this->Common_M->get('tbl_bills', 'created', 'DESC', 'client_id', $client_id);
        $data['panelTitle'] = 'All Bills';
        $data['subview'] = 'clients/bills';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function add_purchase_order($id = NULL) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

        

        if ($_POST) {
            // echo '<pre>';
            // print_r($_POST);exit();
            // echo $id;echo $name;exit();
            $rdata = explode(':', $_POST['vendor']);
            $vendor_name = $rdata[0];
            $vendor_id = $rdata[1];

            if($this->session->userdata('client')['parent_id']!=0){
                $subuser_id = $this->session->userdata('client')['id'];
            }elseif($this->session->userdata('client')['parent_id']==0){
                $subuser_id = $this->session->userdata('client')['parent_id'];
            }



            $purchase_orderData = array(
                'client_id' => $client_id,
                'subuser_id' => $subuser_id,
                'vendor' => $vendor_name,
                'vendor_id' => $vendor_id,
                'reference' => $_POST['reference'],
                'preference' => $_POST['preference'],
                'date' => $_POST['date'],
                'delivery_date' => $_POST['delivery_date'],
                'total' => $_POST['total_amount'],
                'tax_per' => $_POST['tax_per'],
                'tax' => $_POST['tax_amount'],
                'created' => date('Y-m-d H:i:s')
            );
            if (isset($_POST['deliver_to']) && ($_POST['deliver_to'] == 'c')) {
                $rdata = explode(':', $_POST['customer']);
                $purchase_orderData['customer'] = $rdata[0];
                $purchase_orderData['customer_id'] = $rdata[1];
            } else if (isset($_POST['deliver_to']) && ($_POST['deliver_to'] == 'o')) {
                $purchase_orderData['oname'] = $_POST['oname'];
                $purchase_orderData['omobile'] = $_POST['omobile'];
                $purchase_orderData['ocity'] = $_POST['city'];
                $purchase_orderData['ostate'] = $_POST['state'];
                $purchase_orderData['ocountry'] = $_POST['country'];    
            }

            // echo '<pre>';
            // print_r($purchase_orderData);exit();
            if ($id) {
                $this->db->where('id', $id);
                $success = $this->db->update('tbl_purchase_orders', $purchase_orderData);
                $purchase_order_id = $id;
            } else {
                // echo '<pre>';
                // print_r($purchase_orderData);exit();
                $success = $this->db->insert('tbl_purchase_orders', $purchase_orderData);
                //$this->db->last_query();exit();
                $purchase_order_id = $this->db->insert_id();
            }
            if ($success) {
                $this->db->where('purchase_order_id', $purchase_order_id);
                $this->db->delete('tbl_purchase_order_inventory');
                for ($i = 0; $i < count($_POST['title']); $i++) {
                    $productData = array(
                        'purchase_order_id' => $purchase_order_id,
                        'title' => $_POST['title'][$i],
                        'qty' => $_POST['qty'][$i],
                        'price' => $_POST['price'][$i],
                        'discount' => $_POST['discount'][$i],
                        'unit' => $_POST['unit'][$i],                        
                        'tax_amount' => $_POST['taxamnt'][$i],
                        'tax' => $_POST['tax'][$i],
                        'total_amount' => $_POST['total'][$i],
                    );
                    $success2 = $this->db->insert('tbl_purchase_order_inventory', $productData);
                }
                if ($success2) {
                    redirect(base_url() . "client/purchase_orders");
                }
            }
        }
        if ($id) {
            $data['isEditing'] = TRUE;
            $data['panelTitle'] = 'Update Purchase Order';
            $data['this_element'] = $this->Common_M->getSingleRow('tbl_purchase_orders', 'id', $id);
            $data['products'] = $this->Common_M->get('tbl_purchase_order_inventory', 'id', 'DESC', 'purchase_order_id', $id);
        } else {
            $data['panelTitle'] = 'Create Purchase Order';
        }

        $data['_URL_add_purchase_order'] = base64_encode('client/add_purchase_order');

        $data['countries'] = $this->Customer_M->get('tbl_countries', 'name', 'ASC');
        $data['cities'] = $this->Customer_M->get('tbl_cities', 'name', 'ASC');
        $data['states'] = $this->Customer_M->get('tbl_states', 'name', 'ASC');
        $data['inventory'] = $this->Common_M->get('tbl_inventory', 'created', 'DESC', 'client_id', $client_id);
        $data['customers'] = $this->Common_M->get('tbl_customers', 'created', 'DESC', 'client_id', $client_id);
        $data['vendors'] = $this->Common_M->get('tbl_vendors', 'created', 'DESC', 'client_id', $client_id);
        $data['subview'] = 'clients/add_purchase_order';
        $this->load->view('clients/common/_layout_admin', $data);
        //$this->load->view('admin/add_purchase_order2',$data);
    }

    public function purchase_orders() {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
          if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }


        $data['total'] = $this->Admin_M->getSUM('tbl_purchase_orders', 'total', 'client_id', $client_id);
        //$data['due']=$this->Admin_M->getSUM('tbl_purchase_orders','total','status','due');
        //$data['received']=$this->Admin_M->getSUM('tbl_purchase_orders','total','status','received');
        //$data['deposited']=$this->Admin_M->getSUM('tbl_purchase_orders','total','status','deposited');
        $data['purchase_orders'] = $this->Common_M->get('tbl_purchase_orders', 'created', 'DESC', 'client_id', $client_id);
        $data['panelTitle'] = 'All Purchase Orders';
        $data['subview'] = 'clients/purchase_orders';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function add_vendor_credit($id = NULL) {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }
            if($this->session->userdata('client')['parent_id']!=0){
                $subuser_id = $this->session->userdata('client')['id'];
            }elseif($this->session->userdata('client')['parent_id']==0){
                $subuser_id = $this->session->userdata('client')['parent_id'];
            } 
        
        if ($_POST) {
            // echo '<pre>';
            // print_r($_POST);exit();
            // echo $id;echo $name;exit();
            $rdata = explode(':', $_POST['vendor']);
            $vendor_name = $rdata[0];
            $vendor_id = $rdata[1];

            $vendor_creditData = array(
                'client_id' => $client_id,
                'subuser_id' => $subuser_id,
                'vendor' => $vendor_name,
                'vendor_id' => $vendor_id,
                'credit_note' => $_POST['credit_note'],
                'order_number' => $_POST['order_number'],
                'date' => $_POST['date'],
                'total' => $_POST['total_amount'],
                'tax_per' => $_POST['tax_per'],
                'tax' => $_POST['tax_amount'],
                'created' => date('Y-m-d H:i:s')
            );
            // echo '<pre>';
            // print_r($vendor_creditData);exit();
            if ($id) {
                $this->db->where('id', $id);
                $success = $this->db->update('tbl_vendor_credits', $vendor_creditData);
                $vendor_credit_id = $id;
            } else {
                // echo '<pre>';
                // print_r($vendor_creditData);exit();
                $success = $this->db->insert('tbl_vendor_credits', $vendor_creditData);
                //$this->db->last_query();exit();
                $vendor_credit_id = $this->db->insert_id();
            }
            if ($success) {
                $this->db->where('vendor_credit_id', $vendor_credit_id);
                $this->db->delete('tbl_vendor_credit_inventory');
                for ($i = 0; $i < count($_POST['title']); $i++) {
                    $productData = array(
                        'vendor_credit_id' => $vendor_credit_id,
                        'title' => $_POST['title'][$i],
                        'qty' => $_POST['qty'][$i],
                        'price' => $_POST['price'][$i],
                        'discount' => $_POST['discount'][$i],
                        'unit' => $_POST['unit'][$i],                        
                        'tax_amount' => $_POST['taxamnt'][$i],
                        'tax' => $_POST['tax'][$i],
                        'total_amount' => $_POST['total'][$i],
                    );
                    $success2 = $this->db->insert('tbl_vendor_credit_inventory', $productData);
                }
                if ($success2) {
                    $this->session->set_flashdata('success', 'Updated Successfully');
                    redirect(base_url() . "client/vendor_credits");
                }
            }
        }
        if ($id) {
            $data['isEditing'] = TRUE;
            $data['panelTitle'] = 'Update Vendor Credit';
            $data['this_element'] = $this->Common_M->getSingleRow('tbl_vendor_credits', 'id', $id);
            $data['products'] = $this->Common_M->get('tbl_vendor_credit_inventory', 'id', 'DESC', 'vendor_credit_id', $id);
        } else {
            $data['panelTitle'] = 'Create Vendor Credit';
        }

        $data['_URL_add_vendor_credit'] = base64_encode('client/add_vendor_credit');
        $data['inventory'] = $this->Common_M->get('tbl_inventory', 'created', 'DESC', 'client_id', $client_id);
        $data['vendors'] = $this->Common_M->get('tbl_vendors', 'created', 'DESC', 'client_id', $client_id);
        $data['subview'] = 'clients/add_vendor_credit';
        $this->load->view('clients/common/_layout_admin', $data);
        //$this->load->view('admin/add_vendor_credit2',$data);
    }

    public function vendor_credits() {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

        $data['total'] = $this->Admin_M->getSUM('tbl_vendor_credits', 'total', 'client_id',$client_id);
        $data['vendor_credits'] = $this->Common_M->get('tbl_vendor_credits', 'created', 'DESC', 'client_id', $client_id);
        $data['panelTitle'] = 'All Vendor Credits';
        $data['subview'] = 'clients/vendor_credits';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function add_recurring_bill($id = NULL) {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

            if($this->session->userdata('client')['parent_id']!=0){
                $subuser_id = $this->session->userdata('client')['id'];
            }elseif($this->session->userdata('client')['parent_id']==0){
                $subuser_id = $this->session->userdata('client')['parent_id'];
            }

        if ($_POST) {
            // echo '<pre>';
            // print_r($_POST);exit();
            $rdata = explode(':', $_POST['name']);
            $vendor_name = $rdata[0];
            $vendor_id = $rdata[1];
            // echo $id;echo $name;exit();
            $recurring_billData = array(
                'client_id' => $client_id,
                'subuser_id' => $subuser_id,
                'vendor' => $vendor_name,
                'vendor_id' => $vendor_id,
                'profile_name' => $_POST['profile_name'],
                'repeat_every' => $_POST['repeat_every'],
                'term' => $_POST['term'],
                'date' => $_POST['date'],
                'end_date' => $_POST['end_date'],
                'total' => $_POST['total_amount'],
                'tax_per' => $_POST['tax_per'],
                'tax' => $_POST['tax_amount'],
                'created' => date('Y-m-d H:i:s')
            );
            // echo '<pre>';
            // print_r($recurring_billData);exit();
            if ($id) {
                $this->db->where('id', $id);
                $success = $this->db->update('tbl_recurring_bills', $recurring_billData);
                $recurring_bill_id = $id;
            } else {
                // echo '<pre>';
                // print_r($recurring_billData);exit();
                $success = $this->db->insert('tbl_recurring_bills', $recurring_billData);
                //$this->db->last_query();exit();
                $recurring_bill_id = $this->db->insert_id();
            }
            if ($success) {
                $this->db->where('recurring_bill_id', $recurring_bill_id);
                $this->db->delete('tbl_recurring_bill_inventory');
                for ($i = 0; $i < count($_POST['title']); $i++) {
                    $productData = array(
                        'recurring_bill_id' => $recurring_bill_id,
                        'title' => $_POST['title'][$i],
                        'qty' => $_POST['qty'][$i],
                        'price' => $_POST['price'][$i],
                        'discount' => $_POST['discount'][$i],
                        'tax_amount' => $_POST['taxamnt'][$i],
                        'tax' => $_POST['tax'][$i],
                        'total_amount' => $_POST['total'][$i],                            
                        'unit' => $_POST['unit'][$i],                            
                    );
                    $success2 = $this->db->insert('tbl_recurring_bill_inventory', $productData);
                }
                if ($success2) {
                    $this->session->set_flashdata('success', 'Updated Successfully');
                    redirect(base_url() . "client/recurring_bills");
                }
            }
        }
        if ($id) {
            $data['isEditing'] = TRUE;
            $data['panelTitle'] = 'Update Recurring Bill';
            $data['this_element'] = $this->Common_M->getSingleRow('tbl_recurring_bills', 'id', $id);
            $data['products'] = $this->Common_M->get('tbl_recurring_bill_inventory', 'id', 'DESC', 'recurring_bill_id', $id);
        } else {
            $data['panelTitle'] = 'Create Recurring Bill';
        }

        $data['_URL_add_recurring_bill'] = base64_encode('client/add_recurring_bill');
        $data['inventory'] = $this->Common_M->get('tbl_inventory', 'created', 'DESC', 'client_id', $client_id);
        $data['vendors'] = $this->Common_M->get('tbl_vendors', 'created', 'DESC', 'client_id', $client_id);
        $data['time'] = $this->Common_M->get('tbl_time', 'id', 'ASC');
        $data['terms'] = $this->Common_M->get('tbl_terms', 'created', 'ASC');
        $data['subview'] = 'clients/add_recurring_bill';
        $this->load->view('clients/common/_layout_admin', $data);
    }

    public function recurring_bills() {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

        $data['total'] = $this->Admin_M->getSUM('tbl_recurring_bills', 'total', 'client_id', $client_id);
        $data['recurring_bills'] = $this->Common_M->get('tbl_recurring_bills', 'created', 'DESC', 'client_id', $client_id);
        $data['panelTitle'] = 'All Recurring Bills';
        $data['subview'] = 'clients/recurring_bills';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function saveInvoiceStatus() {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if ($_POST) {
            //echo json_encode($_POST);exit();
            $status = strtolower($_POST['status']);
            $invoice_id = $_POST['invoice_id'];
            $invoice = $this->Common_M->getSingleRow('tbl_invoices', 'id', $invoice_id);

            if ($status == 'received') {
                $udata['received'] = $treceived = (($invoice->received) + ($_POST['payAmount']));
                $udata['due'] = (($invoice->due) - $_POST['payAmount']);
                if ($invoice->total == $treceived) {
                    $udata['paidFlag'] = 1;
                }
            } else if ($status == 'deposited') {
                $udata['deposited'] = $tdeposited = (($invoice->deposited) + ($_POST['payAmount']));
                $udata['received'] = (($invoice->received) - $_POST['payAmount']);
                if ($invoice->total == $tdeposited) {
                    $udata['paidFlag'] = 2;
                }
            }
            $udata['preventEdit'] = 1;
            $this->db->where('id', $invoice_id);
            $success = $this->db->update('tbl_invoices', $udata);
            if ($success) {
                $idata['invoice_id'] = $invoice_id;
                $idata['status'] = $status;
                $idata['mode'] = $_POST['mode'];
                $idata['instrument_number'] = $_POST['instrument_number'];
                $idata['amount'] = $_POST['payAmount'];
                $idata['created'] = date('Y-m-d H:i:s');
                $ok = $this->db->insert('tbl_invoice_payment_history', $idata);
                if ($ok) {
                    echo json_encode('saved');
                } else {
                    echo json_encode('not_saved');
                }
            }
        }
    }

    public function getInvoiceHistory($invoice_id) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        $history = $this->Common_M->get('tbl_invoice_payment_history', 'created', 'DESC', 'invoice_id', $invoice_id);
        if (count($history) > 0) {
            $content = '';
            foreach ($history as $key) {
                $date = explode(' ', $key->created);
                $day = date('d', strtotime($date[0]));
                $month = date('M', strtotime($date[0]));
                if ($key->status == 'received') {
                    $color = 'blue';
                } else if ($key->status == 'deposited') {
                    $color = 'green';
                }

                $content .= '<div class="new-update clearfix"><i class="icon-ok-sign"></i>
                        <div class="update-done">
                          <a href="' . base_url() . 'admin/invoice/' . $invoice_id . '" title=""><strong>INV-' . $key->invoice_id . '</strong></a> 
                          <span style="color:' . $color . ';">' . strtoupper($key->status) . ' [<small style="color:tomato;"><b>' . strtoupper($key->mode) . '</b></small>]</span> 
                        </div>
                        <span class="amount-price"><i class="fa fa-rupee"></i>' . $key->amount . '</span>
                        <div class="update-date"><span class="update-day">' . $day . '</span>' . $month . '</div>
                      </div>';
            }
            echo $content;
        } else {
            echo 'No transaction done yet';
        }
    }

    public function trimCharacters($string) {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        return preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $string);
    }

    public function getCSCNames($city, $state, $country) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        $country = $this->Common_M->getSingleRow('tbl_countries', 'id', $country);
        $state = $this->Common_M->getSingleRow('tbl_states', 'id', $state);
        $city = $this->Common_M->getSingleRow('tbl_cities', 'id', $city);

        $names = array('city' => $city->name, 'state' => $state->name, 'country' => $country->name);
        // echo '<pre>';
        // print_r($names);
        return $names;
    }

    public function add_invoice($id = NULL) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }
        if ($_POST) {
            if($this->session->userdata('client')['parent_id']!=0){
                $subuser_id = $this->session->userdata('client')['id'];
            }elseif($this->session->userdata('client')['parent_id']==0){
                $subuser_id = $this->session->userdata('client')['parent_id'];
            }
//            echo '<pre>';  
//            print_r($_POST);
//            var_dump($id);
//            exit();

            $rdata = explode(':', $_POST['name']);
            $customer_name = $rdata[0];
            $customer_id = $rdata[1];

            // echo $id;echo $name;exit();
            //'supply_place'=>$_POST['supply_place'],
            //'email'=>$_POST['email'], 
            $invoiceData = array(
                'client_id' => $client_id,
                'subuser_id' => $subuser_id,
                'type' => $_POST['type'],
                'customer' => $customer_name,
                'customer_id' => $customer_id,
                'terms' => $_POST['terms'],
                'order_id' => $_POST['order_id'],
                'number' => $_POST['number'],
                'terms_conditions' => $_POST['terms_conditions'],
                'customer_note' => $_POST['customer_note'],
                'sales_person' => $_POST['sales_person'],
                'date' => $_POST['date'],
                'due_date' => $_POST['due_date'],
                'billing_address' => $_POST['billing_address'],
                'total' => $_POST['total_amount'],
                'due' => $_POST['total_amount'],
                'tax_per' => $_POST['tax_per'],
                'tax' => $_POST['tax_amount'],
                'status' => 'Due',
                'created' => date('Y-m-d H:i:s')
            );
            //echo '<pre>'; print_r($_FILES);exit();
            if (isset($_FILES['file'])) {

                $target_dir = "assets/documents/invoices/";
                $target_file = $target_dir . basename($_FILES["file"]["name"]);
                //$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
                $invoiceData['filePath'] = $target_file;
            } else if (isset($_FILES['existingFilePath'])) {
                $invoiceData['filePath'] = $_POST['existingFilePath'];
            } else {
                $invoiceData['filePath'] = NULL;
            }

            if ($id) {
                $this->db->where('id', $id);
                $success = $this->db->update('tbl_invoices', $invoiceData);
                $invoice_id = $id;
            } else {
                //echo '<pre>'; print_r($invoiceData);exit();
                $success = $this->db->insert('tbl_invoices', $invoiceData);
                //$this->db->last_query();exit();
                $invoice_id = $this->db->insert_id();
            }
             
            if ($success) {
                $this->db->where('invoice_id', $invoice_id);
                $this->db->delete('tbl_invoice_inventory');
                for ($i = 0; $i < count($_POST['title']); $i++) {
                    //echo '<pre>';  print_r($_POST['discount'][$i]);exit();
                    $rdata = explode(':', $_POST['title'][$i]);
                    $in_name = $rdata[0];
                    $in_id = $rdata[1];
                    $productData = array(
                        'invoice_id' => $invoice_id,
                        'client_id' => $client_id,
                        'title' => $in_name,
                        'qty' => $_POST['qty'][$i],
                        'unit' => $_POST['unit'][$i],
                        'price' => $_POST['price'][$i],
                        'discount' => $_POST['discount'][$i],
                        'hsn' => $_POST['hsn'][$i],
                        'tax' => $_POST['tax'][$i],
                        'taxamnt' => $_POST['taxamnt'][$i],
                        'total_amount' => $_POST['total'][$i],
                    );
                    
                    $success2 = $this->db->insert('tbl_invoice_inventory', $productData);
//                    echo '<pre>';
//                    print_r($productData);
//                    var_dump($success2);
//                    var_dump($this->db->error());
//                    echo '</pre>';
                }
                
                
            
//            exit();

                if ($success2) {
                    redirect(base_url() . "client/invoices");
                }
            }
        }
        if ($id) {
            $data['isEditing'] = TRUE;
            $data['panelTitle'] = 'Update Invoice';
            $data['this_element'] = $this->Common_M->getSingleRow('tbl_invoices', 'id', $id);
            $data['products'] = $this->Common_M->get('tbl_invoice_inventory', 'id', 'DESC', 'invoice_id', $id);
        } else {
            $data['panelTitle'] = 'Create Invoice';
        }

        $data['_URL_add_invoice'] = base64_encode('client/add_invoice');
        $data['sales_persons'] = $this->Common_M->get('tbl_sales_persons', 'created', 'DESC', 'client_id', $client_id);
        $data['client'] = $this->Common_M->getSingleRow('tbl_clients', 'id', $client_id);
        $data['inventory'] = $this->Common_M->get('tbl_inventory', 'created', 'DESC', 'client_id', $client_id);
        $data['customers'] = $this->Common_M->get('tbl_customers', 'created', 'DESC', 'client_id', $client_id);
        $data['terms'] = $this->Common_M->get('tbl_terms', 'created', 'ASC');

        $query = $this->db->query("select * from tbl_settings where client_id='" . $client_id . "' and key_name='invoices'");
        $data['setting'] = $query->result();

        $query = $this->db->query("SELECT title,id,sprice,pprice,HSN,SAC,tax,unit FROM tbl_inventory WHERE client_id='" . $client_id . "'");
        $data['proctlist'] = $query->result();

        $data['subview'] = 'clients/add_invoice';
        $this->load->view('admin/common/_layout_admin', $data);
        //$this->load->view('admin/add_invoice2',$data);
    }

    public function invoices_p_list() {
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }
        $query = $this->db->query("SELECT title,id,sprice,pprice,HSN,SAC,tax,unit FROM tbl_inventory WHERE client_id='" . $client_id . "'");
        $proctlist = $query->result();
        $htm = "";
        foreach ($proctlist as $pl) {
            $htm .= "<option value='" . $pl->title . ":" . $pl->id . "'>" . $pl->title . "</option>";
        }

        echo json_encode($htm);
    }

    public function invoices() {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

        $data['total'] = $this->Admin_M->getSUM('tbl_invoices', 'total', 'client_id', $client_id);
        // $data['due']=$this->Admin_M->getSUM('tbl_invoices','total','status','due');
        // $data['received']=$this->Admin_M->getSUM('tbl_invoices','total','status','received');
        // $data['deposited']=$this->Admin_M->getSUM('tbl_invoices','total','status','deposited');

        $data['due'] = $this->Admin_M->getSUM('tbl_invoices', 'due', 'client_id', $client_id);
        $data['received'] = $this->Admin_M->getSUM('tbl_invoices', 'received', 'client_id', $client_id);
        $data['deposited'] = $this->Admin_M->getSUM('tbl_invoices', 'deposited', 'client_id', $client_id);

        $data['invoices'] = $this->Admin_M->get('tbl_invoices', 'created', 'DESC', 'client_id', $client_id);
        $data['panelTitle'] = 'All Invoices';
        $data['subview'] = 'clients/invoices';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function invoice($id) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }
        // $id=base64_decode($id);
        // echo $id;
        $data['invoice'] = $invoice = $this->Common_M->getSingleRow('tbl_invoices', 'id', $id);
        $data['client'] = $this->Common_M->getSingleRow('tbl_clients', 'id', $client_id);
        $data['products'] = $this->Admin_M->get('tbl_invoice_inventory', 'id', 'DESC', 'invoice_id', $invoice->id);
        $data['customer'] = $customer = $this->Common_M->getSingleRow('tbl_customers', 'id', $invoice->customer_id);
        $data['CSCNames'] = $this->getCSCNames($customer->city_id, $customer->state_id, $customer->country_id);

        $query = $this->db->query("select vendor_id from tbl_inventory where id='" . $data['products'][0]->id . "'");
        $data['vindid'] = $query->result();

        $query = $this->db->query("select * from tbl_vendors where id='" . $data['vindid'][0]->vendor_id . "'");
        $data['vendor'] = $query->result();

        $data['vndrCSCNames'] = $this->getCSCNames($data['vendor'][0]->city_id, $data['vendor'][0]->state_id, $data['vendor'][0]->country_id);

        $data['panelTitle'] = 'Invoice';
        $data['subview'] = 'clients/invoice';
        //$this->load->view('admin/common/_layout_admin',$data);
        $this->load->view('admin/common/badmin', $data);
    }

    public function changeStatus($status, $id) {

        $udata['status'] = $status;
        $this->db->where('id', $id);
        $success = $this->db->update('tbl_invoices', $udata);
        if ($success) {
            redirect(base_url() . 'client/invoices');
        }
    }

    function ajax_get_cdata() {
        $ex = explode(":", $_POST['cid']);
        $customer = $this->Common_M->getSingleRow('tbl_customers', 'id', $ex[1]);
        $CSCNames = $this->getCSCNames($customer->city_id, $customer->state_id, $customer->country_id);

        $terms = $this->Common_M->getSingleRow('tbl_terms', 'id', $customer->terms);

        //echo '<pre>'; print_r($customer);exit();


        $Date = date('Y-m-d');
        $toda = "";
        $k = "";

        if ($terms->name == "Net 15") {
            $k = date('Y-m-d', strtotime($Date . ' + 15 days'));
            $toda = date('m-d-Y', strtotime($k));
        } else if ($terms->name == "Net 30") {
            $k = date('Y-m-d', strtotime($Date . ' + 30 days'));
            $toda = date('m-d-Y', strtotime($k));
        } else if ($terms->name == "Net 45") {
            $k = date('Y-m-d', strtotime($Date . ' + 45 days'));
            $toda = date('m-d-Y', strtotime($k));
        } else if ($terms->name == "Net 60") {
            $k = date('Y-m-d', strtotime($Date . ' + 60 days'));
            $toda = date('m-d-Y', strtotime($k));
        } else if ($terms->name == "Due end of the month") {
            $lastDateOfThisMonth = strtotime('last day of this month');
            $k = date('m-d-Y', $lastDateOfThisMonth);
        } else if ($terms->name == "Due end of next month") {
            $lastDateOfThisMonth = strtotime('next month');
            $k = date('m-d-Y', $lastDateOfThisMonth);
        } else {
            $date = date('m-d-Y');
        }


        $hml['terms'] = $terms->name;
        $hml['fromd'] = $Date;
        $hml['tod'] = $k;
        $hml['addr'] = $customer->address . ',' . $CSCNames['city'] . ',' . $CSCNames['state'] . ',' . $CSCNames['country'] . ',' . $customer->postcode;
        echo json_encode($hml);
    }

    public function receipt() {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }
        $prefix = 'tbl_';
        $for = $_GET['for'];
        $inventroyName = substr($for, 0, -1);
        $id = base64_decode(urldecode($_GET['id']));
        //echo $id;
        $tbl_name = $prefix . $for;
        $inventory_tbl_name = $prefix . $inventroyName . '_inventory';
        $inventory_id = $inventroyName . '_id';
        $where_id = $for . '_id';

        $sql = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'$tbl_name'";
        $query = $this->db->query($sql);
        $data['columns'] = $query->result();

        $data['this_element'] = $this->Common_M->getSingleRow($tbl_name, 'id', $id);
        $data['tbl_bill'] = $this->Common_M->getSingleRow('tbl_bills', 'id', $id);
        $data['client'] = $this->Common_M->getSingleRow('tbl_clients', 'id', $client_id);
        $data['products'] = $this->Common_M->get($inventory_tbl_name, 'id', 'DESC', $inventory_id, $id);
//        echo "<pre>".$inventory_tbl_name;
//        print_r($data['products']);
//        echo "</pre>";exit;
        $data['panelTitle'] = ucwords(str_replace('_', ' ', $inventroyName));
        $data['subview'] = 'clients/receipt';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function graph() {
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

        if ($_GET['for'] == 'invoice') {
            $whereArrDue = array('due!=' => 0, 'client_id' => $client_id);
            $whereArrReceived = array('received!=' => 0, 'client_id' =>$client_id);
            $whereArrDeposited = array('deposited!=' => 0, 'client_id' => $client_id);

            $data['due'] = $this->Common_M->getByArr('tbl_invoices', 'created', 'ASC', $whereArrDue);
            $data['received'] = $this->Common_M->getByArr('tbl_invoices', 'created', 'ASC', $whereArrReceived);
            $data['deposited'] = $this->Common_M->getByArr('tbl_invoices', 'created', 'ASC', $whereArrDeposited);
            $data['panelTitle'] = 'Invoice Graph';
            $data['subview'] = 'clients/chart';
        } else if ($_GET['for'] == 'profit_and_loss') {
            if ($id) {
                $client_id = $id;
            } else {
                $client_id = $this->session->userdata('client')['id'];
            }

            $year = $_GET['year'];
            $whereArr = array('client_id' => $client_id);

            $dataPoints = '';
            $j = 0;
            for ($i = 1; $i <= 12; $i++) {
                $month = $i;
                $durationArr = array($month, $year);

                $totalTaxAmount = $this->Common_M->getSUMArr('tbl_invoices', 'tax', $whereArr, NULL, $durationArr);
                $totalSales = $this->Common_M->getSUMArr('tbl_invoices', 'total', $whereArr, NULL, $durationArr);
                $totalBills = $this->Common_M->getSUMArr('tbl_bills', 'total', $whereArr, NULL, $durationArr);
                $totalPurchaseOrders = $this->Common_M->getSUMArr('tbl_purchase_orders', 'total', $whereArr, NULL, $durationArr);
                $totalRecurringBills = $this->Common_M->getSUMArr('tbl_recurring_bills', 'total', $whereArr, NULL, $durationArr);
                $totalRecurringExpenses = $this->Common_M->getSUMArr('tbl_recurring_expenses', 'amount', $whereArr, NULL, $durationArr);

                $grossProfit = $totalSales - ($totalPurchaseOrders + $totalBills + $totalRecurringBills + $totalRecurringExpenses);
                $netProfit = ($grossProfit - $totalTaxAmount);
                //echo $netProfit.'<br>';


                if ($netProfit < 0) {
                    $dataPoints .= '{ x: new Date(' . $year . ', ' . str_pad($j, 2, "0", STR_PAD_LEFT) . ', 1), y: ' . $netProfit . ', indexLabel: "Loss", markerType: "cross", markerColor: "tomato" },';
                } else {
                    $dataPoints .= '{ x: new Date(' . $year . ', ' . str_pad($j, 2, "0", STR_PAD_LEFT) . ', 1), y: ' . $netProfit . ', indexLabel: "Profit", markerType: "triangle",  markerColor: "#6B8E23" },';
                }
                $j++;
            }
            $data['dataPoints'] = $dataPoints;
            //exit();
            $data['panelTitle'] = 'Profit And Loss Graph';
            $data['subview'] = 'clients/profit_and_loss_chart';
        }
        // echo '<pre>';
        // print_r($due);exit();
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function reports() {

        $data['panelTitle'] = 'All Reports';
        $data['subview'] = 'clients/reports';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function report() {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        $prefix = 'tbl_';
        $for = str_replace('-', '_', $_GET['for']);
        $of = $_GET['of'];
        $by = ($_GET['by']) ?? NULL;
        $client_id = $this->session->userdata('client')['id'];
        $inventroyName = substr($for, 0, -1);
        //$id=base64_decode(urldecode($_GET['id']));
        //echo $id;
        $tbl_name = $prefix . $for;
        // $inventory_tbl_name=$prefix.$inventroyName.'_inventory';
        // $inventory_id=$inventroyName.'_id';
        //$where_id=$for.'_id';

        $sql = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$tbl_name'";
        $query = $this->db->query($sql);
        $data['columns'] = $query->result();

        $whereArr = array(
            'client_id' => $client_id
        );
        //$data['reports']=$this->Common_M->get($tbl_name,'created','DESC','client_id',$client_id,NULL,NULL,$by);

        $data['reports'] = $this->Common_M->getByArr($tbl_name, 'created', 'DESC', $whereArr, NULL, $by);

        //$data['products']=$this->Common_M->get($inventory_tbl_name,'id','DESC',$inventory_id,$id);
        $data['panelTitle'] = ucwords(str_replace('_', ' ', $for)) . ' Report'; //ucwords(str_replace('_',' ',$inventroyName));
        $data['subview'] = 'clients/report';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function get_reports() {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/dashboard");
        }
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

        $by = $_GET['by'];
        $data['client_id'] = $client_id;
        if ($by == 'customer') {
            $data['panelTitle'] = 'Invoice By Customers';
            $subview = 'clients/report_by_customer';
            $data['customers'] = $this->Common_M->get('tbl_invoices', 'created', 'DESC', 'client_id', $client_id, NULL, NULL, 'customer_id');
        } else if ($by == 'sales_person') {
            $data['panelTitle'] = 'Invoices By Sales Person';
            $subview = 'clients/report_by_sales_person';
            $data['sales_persons'] = $this->Common_M->get('tbl_invoices', 'created', 'DESC', 'client_id', $client_id, NULL, NULL, 'sales_person');
        } else if ($by == 'item') {
            $data['panelTitle'] = 'Sales By Item';
            $subview = 'clients/report_by_item';
            $data['items'] = $items = $this->Common_M->get('tbl_inventory', 'created', 'DESC', 'client_id', $client_id);
            // echo '<pre>';
            // print_r($items);exit();
        }
        $data['subview'] = $subview;
        $this->load->view('clients/common/_layout_admin', $data);
    }

    public function status_report() {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

        $for = $_GET['for'];
        $status = $for;
        $where = $status . '>';
        $data['panelTitle'] = 'Invoice ' . ucfirst($for);
        //$client_id = $this->session->userdata('client')['id'];
        $sql = "SELECT * FROM `tbl_invoices` WHERE client_id='$client_id' AND $for > 0 GROUP BY id ORDER BY created DESC ;";
        $query = $this->db->query($sql);
        $data['invoices'] = $query->result();
        $data['for'] = $for;
        $data['subview'] = 'clients/status_report';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function inventory_report() {
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

        $data['inventory'] = $this->Common_M->get('tbl_inventory', 'created', 'DESC', 'client_id', $client_id);
        $data['panelTitle'] = 'Inventory Status';
        $data['subview'] = 'clients/inventory_report';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function profit_and_loss($id = NULL) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }

        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']);
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']);
            }

        // if ($id) {
        //     $client_id = $id;
        // } else {
        //     $client_id = $this->session->userdata('client')['id'];
        // }

        if ($_GET['filter']) {
            $filter = $_GET['filter'];
        } else {
            $filter = NULL;
        }
        $whereArr = array('client_id' => $client_id);
        $data['totalTaxAmount'] = $this->Common_M->getSUMArr('tbl_invoices', 'tax', $whereArr, $filter);
        $data['totalSales'] = $this->Common_M->getSUMArr('tbl_invoices', 'total', $whereArr, $filter);
        $data['totalBills'] = $this->Common_M->getSUMArr('tbl_bills', 'total', $whereArr, $filter);
        $data['totalPurchaseOrders'] = $this->Common_M->getSUMArr('tbl_purchase_orders', 'total', $whereArr, $filter);
        $data['totalRecurringBills'] = $this->Common_M->getSUMArr('tbl_recurring_bills', 'total', $whereArr, $filter);
        $data['totalRecurringExpenses'] = $this->Common_M->getSUMArr('tbl_recurring_expenses', 'amount', $whereArr, $filter);
        // echo $totalSales.'<br>';
        // echo $totalBills.'<br>';
        // echo $totalPurchaseOrders.'<br>';
        // echo ($totalSales - ($totalBills + $totalPurchaseOrders));
        $data['panelTitle'] = 'Profit And Loss';
        $data['subview'] = 'clients/profit_and_loss';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function cronOneMinuteFunction() {
        $this->updateInvoiceInventory();
        $this->isNotifyRequire();
        //$this->cronRunningTest();
    }

    public function updateInvoiceInventory() {
        $sql = "SELECT title,SUM(qty) as total FROM tbl_invoice_inventory GROUP BY title";
        $query = $this->db->query($sql);
        $result = $query->result();
        foreach ($result as $key) {
            $thisProduct = $this->Common_M->getSingleRow('tbl_inventory', 'title', $key->title);
            $udata['remaining_stock'] = ($thisProduct->stock - $key->total);
            $this->db->where('title', $thisProduct->title);
            $this->db->update('tbl_inventory', $udata);
        }
        // echo '<pre>';
        // print_r($query->result()); 
        // exit();
    }

    public function isNotifyRequire() {

        $inventory = $this->Common_M->get('tbl_inventory', 'created', 'DESC');
        foreach ($inventory as $key) {
            if (($key->remaining_stock - 5) <= 0) {
                $udata['out_of_stock_alert'] = 1;
            } else {
                $udata['out_of_stock_alert'] = 0;
            }
            $this->db->where('id', $key->id);
            $this->db->update('tbl_inventory', $udata);
        }
    }

    public function my_profile() {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }
        if ($_POST) {
            $formData['business_name'] = $_POST['business_name'];
            $formData['password'] = md5($this->db->escape($this->input->post('password')));
            $formData['decrypted_password'] = $_POST['password'];
            $formData['website'] = $_POST['website'];
            $formData['state_code'] = $_POST['state_code'];
            $formData['gst_number'] = $_POST['gst_number'];
            $formData['owner_name'] = $_POST['owner_name'];
            $formData['owner_mobile'] = $_POST['owner_mobile'];
            $formData['address'] = $_POST['address'];
            $formData['pincode'] = $_POST['pincode'];
            $formData['ac_holder'] = $_POST['ac_holder'];
            $formData['bank'] = $_POST['bank'];
            $formData['ifccode'] = $_POST['ifccode'];
            $formData['acno'] = $_POST['acno'];

            if ($_FILES['image']['name'] != '') {
                //echo 'if1';//exit();
                $target_dir = "assets/clients/company_logo/";
                $filename_mo = rand() . $filename;
                $target_file = $target_dir . $filename_mo;
                move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                $formData['imagePath'] = $target_file;
            }
            $this->db->where('id', $client_id);
            $this->db->update('tbl_clients', $formData);
        }

        $data['this_element'] = $this->Common_M->getSingleRow('tbl_clients', 'id', $client_id);
        $data['panelTitle'] = 'My Profile';
        $data['subview'] = 'clients/my_profile';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function cronRunningTest() {

        $data['time'] = date('Y-m-d H:i:s');
        $this->db->insert('tbl_cron_test', $data);
    }

    public function information_hub() {
        $this->load->view('information_hub');
    }

    public function account_types($id = NULL) {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        $data['account_types'] = $this->Common_M->get('tbl_account_types', 'created', 'DESC');
        $data['panelTitle'] = 'Account Types';
        $data['subview'] = 'clients/account_types';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function add_account_types($id = NULL) {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

            if($this->session->userdata('client')['parent_id']!=0){
                $subuser_id = $this->session->userdata('client')['id'];
            }elseif($this->session->userdata('client')['parent_id']==0){
                $subuser_id = $this->session->userdata('client')['parent_id'];
            }
        if ($_POST) {
            $idata = array(
                'client_id' => $client_id,
                'subuser_id' => $subuser_id,
                'type' => $_POST['type'],
                'name' => $_POST['name'],                
                'ac_code' => $_POST['ac_code'],
                'content' => $_POST['content'],
                'created' => date('Y-m-d H:i:s'));

            if ($id) {

                $this->db->where('id', $id);
                //echo "<pre>"; print_r($id); exit;
                $success = $this->db->update('tbl_account_types', $idata);
            } else {
                $success = $this->db->insert('tbl_account_types', $idata);
            }

            if ($success) {
                $this->session->set_flashdata('success', 'Updated Succeesfully');
                redirect(base_url() . 'client/account_types');
            }
        }

        if ($id) {
            $data['btn'] = 'Update';
            $data['this_element'] = $this->Common_M->getSingleRow('tbl_account_types', 'id', $id);
        } else {
            $data['btn'] = 'Add';
        }

        $data['panelTitle'] = 'Add Account Types';
        $data['subview'] = 'clients/add_account_types';
        $this->load->view('clients/common/_layout_admin', $data);
    }

    public function ajax_add_account_types($id = NULL) {

        //echo "<pre>"; print_r($_POST); exit;

        $idata = array(
            'client_id' => $this->session->userdata('client')['id'],
            'type' => $_POST['type'],
            'name' => $_POST['name'],
            'ac_code' => $_POST['ac_code'],
            'content' => $_POST['content'],
            'created' => date('Y-m-d H:i:s'));

        $success = $this->db->insert('tbl_account_types', $idata);

        $insertId = $this->db->insert_id();

        $htm = '<option value="' . $insertId . '">' . $_POST['name'] . '</option>';
        echo json_encode($htm);
    }

    public function accounts() {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }
        $data['accounts'] = $this->Common_M->get('tbl_accounts', 'created', 'DESC', 'client_id', $client_id);
        $data['panelTitle'] = 'All Accounts';
        $data['subview'] = 'clients/accounts';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function add_account($id = null) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

            if($this->session->userdata('client')['parent_id']!=0){
                $subuser_id = $this->session->userdata('client')['id'];
            }elseif($this->session->userdata('client')['parent_id']==0){
                $subuser_id = $this->session->userdata('client')['parent_id'];
            }

        if ($_POST) {
//            echo "<pre>"; print_r($_POST); exit;
            $idata = array(
                'client_id' => $client_id,
                'subuser_id' => $subuser_id,
                'type_id' => $_POST['type_id'],
                'name' => $_POST['name'],
                'code' => $_POST['code'],
                'sub_account' => $_POST['sub_account'],
                'parent_account' => $_POST['parent_account'],
                'description' => $_POST['description'],
                'created' => date('Y-m-d H:i:s')
            );

            if ($id) {

                $this->db->where('id', $id);
                $success = $this->db->update('tbl_accounts', $idata);
            } else {
                //echo "<pre>"; print_r($idata); exit;
                $success = $this->db->insert('tbl_accounts', $idata);
            }

            if ($success) {
                //echo "<pre>"; print_r($id); exit;
                $this->session->set_flashdata('success', 'Updated Succeesfully');

                if ($_GET['redirect']) {

                    $encrypted = $_GET['redirect'];
                    $url = base64_decode($encrypted);
                    //echo $url;exit();
                    redirect(base_url() . $url);
                } else {

                    redirect(base_url() . "client/accounts");
                }
            }
        }
        if ($id) {
            $data['panelTitle'] = 'Update Account';
            $data['this_element'] = $this->Common_M->getSingleRow('tbl_accounts', 'id', $id);
        } else {
            $data['panelTitle'] = 'Add Account';
        }
        $data['account_types'] = $this->Common_M->get('tbl_account_types', 'created', 'DESC');
        $data['subview'] = 'clients/add_account';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function add_expense($id = NULL) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

            if($this->session->userdata('client')['parent_id']!=0){
                $subuser_id = $this->session->userdata('client')['id'];
            }elseif($this->session->userdata('client')['parent_id']==0){
                $subuser_id = $this->session->userdata('client')['parent_id'];
            }
        if ($_POST) {
            $customer = explode(':', $_POST['customer']);
            $vendor = explode(':', $_POST['vendor']);

            $idata['client_id'] = $client_id;
            $idata['subuser_id'] = $subuser_id;
            $idata['account_id'] = $_POST['account_id'];
            $idata['paid_through'] = $_POST['paid_through'];
            $idata['invoice'] = $_POST['invoice'];
            $idata['vendor_name'] = $vendor[0];
            $idata['vendor_id'] = $vendor[1];
            $idata['customer_name'] = $customer[0];
            $idata['customer_id'] = $customer[1];
            $idata['note'] = $_POST['note'];
            $idata['created'] = date('Y-m-d H:i:s');
            if (isset($_FILES['file'])) {
                $target_dir = "assets/documents/expenses/";
                $target_file = $target_dir . basename($_FILES["file"]["name"]);
                //$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
                $idata['filePath'] = $target_file;
            } else if (isset($_FILES['hiddenFilePath'])) {
                $idata['filePath'] = $_POST['hiddenFilePath'];
            } else {
                $idata['filePath'] = NULL;
            }

            if ($id) {
                $this->db->where('id', $id);
                $success = $this->db->update('tbl_expenses', $idata);
            } else {
                $success = $this->db->insert('tbl_expenses', $idata);
                // echo $this->db->last_query();
                // exit();
            }
            if ($success) {
                $this->session->set_flashdata('success', 'Updated Successfully');
                redirect(base_url() . "client/expenses");
            }
        }

        if ($id) {
            $data['this_element'] = $this->Common_M->getSingleRow('tbl_expenses', 'id', $id);
            
            $data['panelTitle'] = 'Update Expense';
        } else {
            $data['panelTitle'] = 'Add Expense';
        }

        $data['_RETURN_URL'] = base64_encode('client/add_expense');
        $data['accounts'] = $this->Common_M->get('tbl_accounts', 'created', 'DESC', 'client_id',$client_id);
        $data['payment_accounts'] = $this->Common_M->get('tbl_payment_accounts', 'name', 'ASC'); //,'client_id',$this->session->userdata('client')['id']);
        $data['customers'] = $this->Common_M->get('tbl_customers', 'created', 'DESC', 'client_id', $client_id);
        $data['vendors'] = $this->Common_M->get('tbl_vendors', 'created', 'DESC', 'client_id', $client_id);
        $data['subview'] = 'clients/add_expense';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function expense_report($id = NULL) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }


        $expn = $this->Common_M->getSingleRow('tbl_expenses', 'id', $id);
        $data['this_element'] = $expn;
        $data['panelTitle'] = 'Expense Details';

        //$data['accounts']=$this->Common_M->get('tbl_accounts','created','DESC','client_id',$this->session->userdata('client')['id']);
//        $data['payment_accounts']=$this->Common_M->get('tbl_payment_accounts','name','ASC');
        //$data['customers']=$this->Common_M->get('tbl_customers','created','DESC','client_id',$this->session->userdata('client')['id']);

        $query = $this->db->query("select * from tbl_accounts where id='" . $expn->account_id . "'");
        $data['accounts'] = $query->result();

        $queryx = $this->db->query("select * from tbl_payment_accounts where id='" . $expn->paid_through . "'");
        $data['payment_accounts'] = $queryx->result();

        $queryy = $this->db->query("select * from tbl_customers where id='" . $expn->customer_id . "'");
        $data['customers'] = $queryy->result();

        $queryz = $this->db->query("select * from tbl_vendors where id='" . $expn->vendor_id . "'");
        $data['vendors'] = $queryz->result();

        $data['subview'] = 'clients/deatils_expense';

        $this->load->view('clients/common/_layout_admin', $data);
    }

    public function expenses() {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }
        $data['expenses'] = $this->Common_M->get('tbl_expenses', 'created', 'DESC', 'client_id', $client_id);
        $data['panelTitle'] = 'Expenses';
        $data['subview'] = 'clients/expenses';
        $this->load->view('clients/common/_layout_admin', $data);
    }

    public function add_milleage() {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if ($_POST) {
            $mileage_account = $_POST['mileage_account'];
            $unit = $_POST['unit'];
        }
        $data['panelTitle'] = 'Expenses';
        $data['subview'] = 'clients/add_milleage';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function payment_recieved() {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }


        $query = $this->db->query("select tbl_invoice_payments.*,tbl_customers.name as cname ,tbl_invoices.number as invoice  from tbl_invoice_payments 
		 left join tbl_customers on tbl_invoice_payments.cust_id=tbl_customers.id 
		 left join tbl_invoices on tbl_invoice_payments.invoice=tbl_invoices.id where tbl_invoice_payments.client_id='" . $client_id . "'");
        $data['invoicpay'] = $query->result();

        //echo "<pre>"; print_r($data['invoicpay']); exit;


        $data['panelTitle'] = 'Payment Recieved';
        $data['subview'] = 'Clientstore/invoice/invoices';
        $this->load->view('clients/common/_layout_admin', $data);
    }

    public function add_payment_recieved($id = NULL) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

        if ($_POST) {
            if($this->session->userdata('client')['parent_id']!=0){
                $subuser_id = $this->session->userdata('client')['id'];
            }elseif($this->session->userdata('client')['parent_id']==0){
                $subuser_id = $this->session->userdata('client')['parent_id'];
            }

            $query = $this->db->query("select * from tbl_invoices where id='" . $_POST['invoice'] . "'");
            $curinv = $query->result();
            if ($_POST['recvamnt'] >= $curinv[0]->due) {
                $updata = array(
                    'due' => 0,
                    'received' => $curinv[0]->total,
                    'status' => 'Deposited'
                );
            } else {
                $due = $curinv[0]->due - $_POST['recvamnt'];
                $recv = $curinv[0]->due + $_POST['recvamnt'];
                $updata = array(
                    'due' => $due,
                    'received' => $recv,
                    'status' => 'Due'
                );
            }
            //echo "<pre>"; print_r($_POST); exit;

            $this->db->where('id', $curinv[0]->id);
            $this->db->update('tbl_invoices', $updata);

            $invoiceData = array(
                'client_id' => $client_id,
                'subuser_id' => $subuser_id,
                'cust_id' => $_POST['name'],
                'amount' => $_POST['amount'],
                'bank_charge' => $_POST['bank_charge'],
                'pay_mode' => $_POST['mode'],
                'deposit_to' => $_POST['deposite_to'],
                'reference' => $_POST['reference'],
                'pay_date' => $_POST['date'],
                'payment' => $_POST['payemnt'],
                'tax' => $_POST['tax'],
                'tax_account' => $_POST['tds_tax'],
                'invoice' => $_POST['invoice'],
                'invoice_amnt' => $_POST['recvamnt'],
                'created' => date('Y-m-d H:i:s')
            );

            if (isset($_FILES['file'])) {
                $target_dir = "assets/documents/invoices/";
                $target_file = $target_dir . basename($_FILES["file"]["name"]);
                //$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
                $invoiceData['files'] = $target_file;
            } else if (isset($_FILES['existingFilePath'])) {
                $invoiceData['files'] = $_POST['existingFilePath'];
            } else {
                $invoiceData['files'] = NULL;
            }

            if ($id) {
                $this->db->where('payid', $id);
                $success = $this->db->update('tbl_invoice_payments', $invoiceData);
                $invoice_id = $id;
            } else {
                
                $queryx = $this->db->query("select * from tbl_invoice_payments where invoice='" . $_POST['invoice'] . "'");
                $counterx = $queryx->num_rows();
                
                $invoiceData['counter'] = ($counterx+1);
                
                // echo "<pre>"; print_r($invoiceData); exit;       
                $success = $this->db->insert('tbl_invoice_payments', $invoiceData);
                $invoice_id = $this->db->insert_id();
            }

            if ($success) {
                redirect(base_url() . "client/payment_recieved");
            }
        }
        if ($id) {
            $data['isEditing'] = TRUE;
            $data['panelTitle'] = 'Update Payemnt Record';
            $patmnts = $this->Common_M->getSingleRow('tbl_invoice_payments', 'payid', $id);
            $data['this_element'] = $patmnts;
            //echo "<pre>"; print_r($patmnts); exit; 			
            $data['invoice'] = $this->Common_M->getSingleRow('tbl_invoices', 'id', $patmnts->invoice);
        } else {
            $data['panelTitle'] = 'Create Payemnt Record';
        }

        $data['_URL_add_invoice'] = base64_encode('Clientstore/invoice/add_invoice');

        $data['sales_persons'] = $this->Common_M->get('tbl_sales_persons', 'created', 'DESC', 'client_id', $client_id);

        $data['client'] = $this->Common_M->getSingleRow('tbl_clients', 'id', $client_id);
        $data['inventory'] = $this->Common_M->get('tbl_inventory', 'created', 'DESC', 'client_id', $client_id);
        $data['customers'] = $this->Common_M->get('tbl_customers', 'created', 'DESC', 'client_id',$client_id);
        //$data['terms']=$this->Common_M->get('tbl_terms','created','ASC');

        $data['modes'] = $this->Common_M->get('tbl_payment_modes', 'created', 'ASC', 'client_id', $client_id);

        $data['subview'] = 'Clientstore/invoice/add_invoice';
        $this->load->view('clients/common/_layout_admin', $data);
        //$this->load->view('admin/add_invoice2',$data);
    }

    public function payment_recieved_invoice($str = NULL) {
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }
        $id = base64_decode(urldecode($str));
        $query = $this->db->query("select tbl_invoice_payments.*,tbl_customers.name as cname ,tbl_customers.email as email ,tbl_customers.mobile as mobile ,tbl_customers.company as company,tbl_customers.website as website,tbl_invoices.number as invoice,tbl_payment_modes.mode as paymode from tbl_invoice_payments left join tbl_customers on  tbl_invoice_payments.cust_id=tbl_customers.id left join tbl_invoices on tbl_invoice_payments.invoice=tbl_invoices.id left join tbl_payment_modes on tbl_invoice_payments.pay_mode=tbl_payment_modes.mode_id where  tbl_invoice_payments.payid='" . $id . "'");
        $data['invoice'] = $query->result();
        $data['client'] = $this->Common_M->getSingleRow('tbl_clients', 'id', $client_id);
        $data['panelTitle'] = 'Payment Recieved Invoice';
        $data['subview'] = 'Clientstore/invoice/invoice';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function add_recurinvoice($id = NULL) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

        if ($_POST) {
            if($this->session->userdata('client')['parent_id']!=0){
                $subuser_id = $this->session->userdata('client')['id'];
            }elseif($this->session->userdata('client')['parent_id']==0){
                $subuser_id = $this->session->userdata('client')['parent_id'];
            }

            $rdata = explode(':', $_POST['name']);
            $customer_name = $rdata[0];
            $customer_id = $rdata[1];
            $invoiceData = array(
                'client_id' => $client_id,
                'subuser_id' => $subuser_id,
                'customer' => $customer_name,
                'customer_id' => $customer_id,
                'terms' => $_POST['terms'],
                'order_id' => $_POST['order_id'],
                'number' => $_POST['number'],
                'terms_conditions' => $_POST['terms_conditions'],
                'customer_note' => $_POST['customer_note'],
                'sales_person' => $_POST['sales_person'],
                'date' => $_POST['date'],
                'due_date' => $_POST['due_date'],
                'repet_every' => $_POST['repet_every'],
                'billing_address' => $_POST['billing_address'],
                'total' => $_POST['total_amount'],
                'due' => $_POST['total_amount'],
                'tax_per' => $_POST['tax_per'],
                'tax' => $_POST['tax_amount'],
                'status' => 'Due',
                'created' => date('Y-m-d H:i:s')
            );
            //echo '<pre>'; print_r($_FILES);exit();
            if (isset($_FILES['file'])) {

                $target_dir = "assets/documents/invoices/";
                $target_file = $target_dir . basename($_FILES["file"]["name"]);
                //$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
                $invoiceData['filePath'] = $target_file;
            } else if (isset($_FILES['existingFilePath'])) {
                $invoiceData['filePath'] = $_POST['existingFilePath'];
            } else {
                $invoiceData['filePath'] = NULL;
            }

            if ($id) {
                $this->db->where('id', $id);
                $success = $this->db->update('tbl_recurring_invoices', $invoiceData);
                $invoice_id = $id;
            } else {
//                echo '<pre>'; print_r($invoiceData);exit();
                $success = $this->db->insert('tbl_recurring_invoices', $invoiceData);
                //$this->db->last_query();exit();
                $invoice_id = $this->db->insert_id();
//                echo '<pre>';
//                print_r($success);
//                echo '</pre><br>';
//                echo $invoice_id;exit;
            }
            if ($success) {
                $this->db->where('invoice_id', $invoice_id);
                $this->db->delete('tbl_recurring_invoice_inventory');
                for ($i = 0; $i < count($_POST['title']); $i++) {
                    $productData = array(
                        'invoice_id' => $invoice_id,
                        'client_id' => $client_id,
                        'title' => $_POST['title'][$i],
                        'qty' => $_POST['qty'][$i],
                        'unit' => $_POST['unit'][$i],
                        'price' => $_POST['price'][$i],
                        'discount' => $_POST['discount'][$i],
                        'hsn' => $_POST['hsn'][$i],
                        'tax' => $_POST['tax'][$i],
                        'tax_amount' => $_POST['taxamnt'][$i],
                        'total_amount' => $_POST['total'][$i],
                    );
                    $success2 = $this->db->insert('tbl_recurring_invoice_inventory', $productData);
//                                    echo '<pre>';
//                print_r($productData);
//                echo '</pre><br>';
//                print_r($success2);
//                echo $this->db->last_query();exit();
                }
//                exit;
                if ($success2) {
                    redirect(base_url() . "client/recurring_invoice");
                }
            }
        }
        if ($id) {
            $data['isEditing'] = TRUE;
            $data['panelTitle'] = 'Update Invoice';
            $data['this_element'] = $this->Common_M->getSingleRow('tbl_recurring_invoices', 'id', $id);
            $data['products'] = $this->Common_M->get('tbl_recurring_invoice_inventory', 'id', 'DESC', 'invoice_id', $id);
        } else {
            $data['panelTitle'] = 'Create Invoice';
        }

        $data['_URL_add_invoice'] = base64_encode('client/add_invoice');
        $data['sales_persons'] = $this->Common_M->get('tbl_sales_persons', 'created', 'DESC', 'client_id', $client_id);
        $data['client'] = $this->Common_M->getSingleRow('tbl_clients', 'id', $client_id);
        $data['inventory'] = $this->Common_M->get('tbl_inventory', 'created', 'DESC', 'client_id', $client_id);
        $data['customers'] = $this->Common_M->get('tbl_customers', 'created', 'DESC', 'client_id', $client_id);
        $data['terms'] = $this->Common_M->get('tbl_terms', 'created', 'ASC');
        $data['subview'] = 'Clientstore/add_recurinvoice';
        $this->load->view('clients/common/_layout_admin', $data);
        //$this->load->view('admin/add_invoice2',$data);
    }

    public function recurring_invoice() {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }

        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

        $data['total'] = $this->Admin_M->getSUM('tbl_recurring_invoices', 'total', 'client_id', $client_id);
        // $data['due']=$this->Admin_M->getSUM('tbl_invoices','total','status','due');
        // $data['received']=$this->Admin_M->getSUM('tbl_invoices','total','status','received');
        // $data['deposited']=$this->Admin_M->getSUM('tbl_invoices','total','status','deposited');

        $data['due'] = $this->Admin_M->getSUM('tbl_recurring_invoices', 'due', 'client_id', $client_id);
        $data['received'] = $this->Admin_M->getSUM('tbl_recurring_invoices', 'received', 'client_id', $client_id);
        $data['deposited'] = $this->Admin_M->getSUM('tbl_recurring_invoices', 'deposited', 'client_id', $client_id);

        $data['invoices'] = $this->Admin_M->get('tbl_recurring_invoices', 'created', 'DESC', 'client_id', $client_id);
        $data['panelTitle'] = 'All Recurring Invoices';
        $data['subview'] = 'Clientstore/recurinvoices';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function recurinvoice($id) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }
        // $id=base64_decode($id);
        // echo $id;
        $data['invoice'] = $invoice = $this->Common_M->getSingleRow('tbl_recurring_invoices', 'id', $id);
        $data['client'] = $this->Common_M->getSingleRow('tbl_clients', 'id', $client_id);
        $data['products'] = $this->Admin_M->get('tbl_recurring_invoice_inventory', 'id', 'DESC', 'invoice_id', $invoice->id);
        $data['customer'] = $customer = $this->Common_M->getSingleRow('tbl_customers', 'id', $invoice->customer_id);
        $data['CSCNames'] = $this->getCSCNames($customer->city_id, $customer->state_id, $customer->country_id);
        $data['panelTitle'] = 'Invoice';
        $data['subview'] = 'Clientstore/recurinvoice';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function update_client() {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Employee_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "admin/login");
        }

        if ($_POST) {
            //$formData['name']=$_POST['name'];
            $formData['business_name'] = $_POST['business_name'];
            $formData['email'] = $_POST['email'];
            $formData['mobile'] = $_POST['mobile'];
            $formData['password'] = md5($this->db->escape($this->input->post('password')));
            $formData['decrypted_password'] = $this->input->post('password');
            $formData['employee_id'] = $_POST['employee_id'];
            $formData['contract_number'] = $_POST['contract_number'];
            $formData['category'] = $_POST['category'];
            $formData['type'] = $_POST['type'];
            $formData['match'] = $_POST['match'];
            $formData['data_source'] = $_POST['data_source'];
            $formData['contract_status'] = $_POST['contract_status'];
            $formData['contact_type'] = $_POST['contact_type'];
            $formData['paid_amount'] = $_POST['paid_amount'];
            $formData['contract_amount'] = $_POST['contract_amount'];
            $formData['contact_person_name'] = $_POST['contact_person_name'];
            $formData['contact_person_mobile'] = $_POST['contact_person_mobile'];
            $formData['contact_person_email'] = $_POST['contact_person_email'];
            // $formData['zone']=$_POST['zone'];
            // $formData['region_name']=$_POST['region_name'];
            // $formData['branch_name']=$_POST['branch_name'];
            // $formData['branch_dm']=$_POST['branch_dm'];
            // $formData['zonal_business_director']=$_POST['zonal_business_director'];
            $formData['payment_status'] = $_POST['payment_status'];
            $formData['crm_id'] = $_POST['crm_id'];
            $formData['gst_number'] = $_POST['gst_number'];
            $formData['nature_of_work'] = $_POST['nature_of_work'];
            $formData['man_power'] = $_POST['man_power'];
            $formData['relationship_officer_name'] = $_POST['relationship_officer_name'];
            $formData['contract_period'] = $_POST['contract_period'];
            $formData['service_availed'] = $_POST['service_availed'];
            $formData['owner_name'] = $_POST['owner_name'];
            $formData['owner_mobile'] = $_POST['owner_mobile'];
            $formData['address'] = $_POST['address'];
            $formData['pincode'] = $_POST['pincode'];
            $formData['actype'] = $_POST['actype'];
            $formData['created'] = date('Y-m-d H:i:s');

            if ($id) {
                $this->db->where('id', $id);
                $success = $this->db->update('tbl_clients', $formData);
            } else {
                $success = $this->db->insert('tbl_clients', $formData);
                //echo $this->db->last_query();exit();
            }

            if ($success) {
                $this->session->set_flashdata('success', 'Updated Successfully');
                redirect(base_url() . "admin/clients/");
            }
        }

        if ($id) {
            $data['this_element'] = $el = $this->Common_M->getSingleRow('tbl_clients', 'id', $id);
        }
        $data['zones'] = $this->Admin_M->get('tbl_zone', 'title', 'ASC');
        $data['employees'] = $this->Admin_M->get('tbl_employees', 'name', 'ASC');
        $data['panelTitle'] = 'Add Client';
        $data['subview'] = 'admin/add_client';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function update_currency() {

        $query = $this->db->query("select * from currencies");
        $currencies = $query->result();
        //echo "<pre>"; print_r($currencies); exit;
        foreach ($currencies as $cn) {
            $formData['symbol'] = $cn->symbol;
            $formData['code'] = $cn->code;
            $this->db->where('country', $cn->country);
            $success = $this->db->update('tbl_currencies', $formData);
        }
    }

    public function manage_package($id = NULL) {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

/*       $query = $this->db->query("select tbl_invoice_payments.*,tbl_customers.name as cname ,tbl_invoices.number as invoice  from tbl_invoice_payments 
		 left join tbl_customers on tbl_invoice_payments.cust_id=tbl_customers.id 
		 left join tbl_invoices on tbl_invoice_payments.invoice=tbl_invoices.id where tbl_invoice_payments.client_id='" . $client_id . "'");*/

        $query = $this->db->query("select tbl_package_details.*,tbl_customers.name as cname ,tbl_invoices.number as invoice  from tbl_package_details
                left join tbl_customers on tbl_package_details.customer_id=tbl_customers.id 
		left join tbl_invoices on tbl_package_details.invoice_id=tbl_invoices.id
                where tbl_package_details.client_id='" . $client_id . "'");
        $data['invoicpay'] = $query->result();

        //echo "<pre>"; print_r($data['invoicpay']); exit;


        $data['panelTitle'] = 'Package';
        $data['subview'] = 'clients/manage_package';
        $this->load->view('clients/common/_layout_admin', $data);
    }

    public function add_package_details($id = NULL) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

            if($this->session->userdata('client')['parent_id']!=0){
                $subuser_id = $this->session->userdata('client')['id'];
            }elseif($this->session->userdata('client')['parent_id']==0){
                $subuser_id = $this->session->userdata('client')['parent_id'];
            }

        if ($this->input->method() == "post") {
          //  $client_id = $this->session->userdata('client')['id'];
            $postData = $this->input->post();
            $package_info = [];
            for ($i = 0; $i < count($postData['pkg_dt']); $i++) {
                $package_info[$i] = ['dt' => $postData['pkg_dt'][$i], 'info' => $postData['info'][$i]];
            }
            
            $chk_data = $this->db->get('tbl_package_details');            
            if ($chk_data->num_rows() >= 1) {     
              
                if(!empty($chk_data->row())){
                    $this->session->set_flashdata('error', 'Data Already present..');
                    redirect(base_url() . "client/manage_package");
                }
            }
            
            
            $inserArray = array(
                'client_id' => $client_id,
                'subuser_id' => $subuser_id,
                'customer_id' => $postData['customer_id'],
                'invoice_id' => $postData['invoice_id'],
                'package_status' => $postData['package_status'],
                'package_info' => json_encode($package_info)
            );
            if (!empty($id)) {
                $this->db->where('id', $id);
                $success = $this->db->update('tbl_package_details', $inserArray);
            } else {
                $this->db->insert('tbl_package_details', $inserArray);
            }
//            print_r($inserArray);
//            exit;
            redirect(base_url() . "client/manage_package");
        }

        $data['client'] = $this->Common_M->getSingleRow('tbl_clients', 'id', $client_id,);

        $data['customers'] = $this->Common_M->get('tbl_customers', 'created', 'DESC', 'client_id', $client_id,);

        if ($id) {
            $data['isEditing'] = TRUE;
            $data['panelTitle'] = 'Update Package Details';
            $query = $this->db->get('tbl_package_details');            
            if ($query->num_rows() >= 1) {
                $get_data = $query->row();
                $data['get_data'] = $get_data;
            }
            $data['customers'] = $this->Common_M->get('tbl_customers', 'created', 'DESC', 'id', $get_data->customer_id);
            $data['invoice'] = $invoice = $this->Common_M->getSingleRow('tbl_invoices', 'id', $get_data->invoice_id);
            $data['panelTitle'] = 'Update Package Details';
        } else {
            $data['panelTitle'] = 'Add Package Details';
        }

        $data['subview'] = 'clients/add_package_details';
        $this->load->view('clients/common/_layout_admin', $data);
    }

    public function feedback($id = NULL) {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }

        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

            if($this->session->userdata('client')['parent_id']!=0){
                $subuser_id = $this->session->userdata('client')['id'];
            }elseif($this->session->userdata('client')['parent_id']==0){
                $subuser_id = $this->session->userdata('client')['parent_id'];
            }



        $data['feedback'] = $this->Common_M->get('tbl_feedback', 'created', 'DESC', 'client_id', $client_id);
        $data['panelTitle'] = 'Feedback From';
        $data['subview'] = 'clients/feedback';
        $this->load->view('admin/common/_layout_admin', $data);
    }
    

    public function add_feedback($id = NULL) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
    
        $client = $this->session->userdata('client');
        $client_id = $client['parent_id'] == 0 ? $client['id'] : $client['parent_id'];
        $subuser_id = $client['parent_id'] != 0 ? $client['id'] : $client['parent_id'];

        $data['client'] = $this->Common_M->getSingleRow('tbl_clients', 'id', $client_id);
        $data['subuser_email'] = $this->Common_M->getSingleRow('tbl_clients', 'id', $subuser_id);

        $subuserdata = $data['subuser_email'];
        $client = $data['client'];
        $email = $client->email;
        $mobile = $client->owner_mobile;
        $name = $client->owner_name;


        if($this->session->userdata('client')['parent_id']==0){
            $subuser_email = $client->email;
            }elseif($this->session->userdata('client')['parent_id']!=0){
                $subuser_email = $subuserdata->email;
            }
    
        if ($_POST) {
            $feedback = array(
                'client_id' => $client_id,
                'subuser_id' => $subuser_id,
                'client_email' => $email,
                'email' => $subuser_email,
                'client_phone' => $mobile,
                'client_name' => $name,
                'subject' => $this->input->post('subject', TRUE),
                'message' => $this->input->post('message', TRUE),
            );
    
            if ($id) {
                $this->db->where('id', $id);
                $success = $this->db->update('tbl_feedback', $feedback);
                $feedback_id = $id;
            } else {
                $success = $this->db->insert('tbl_feedback', $feedback);
                $feedback_id = $this->db->insert_id();
            }
    
            if ($success) {
                $this->session->set_flashdata('success', 'Feedback saved successfully.');
                redirect('client/feedback');
            } else {
                $this->session->set_flashdata('error', 'There was an issue saving the feedback.');
            }
        }
    
        if ($id) {
            $data['isEditing'] = TRUE;
            $data['panelTitle'] = 'Update Feedback';
            $data['this_element'] = $this->Common_M->getSingleRow('tbl_feedback', 'id', $id);
        } else {
            $data['panelTitle'] = 'Create Feedback';
        }
    
        $data['subview'] = 'clients/add_feedback';
        $this->load->view('clients/common/_layout_admin', $data);
    }
    

    
    public function getInvoiceItms(){
        if ($this->input->method() == "post") {
            $inv_itm_list = $this->Common_M->get('tbl_invoice_inventory', 'id', 'ASC', 'invoice_id', $_POST['id']);
            $html = '';
            if(!empty($_POST['id'])){
                if($inv_itm_list){
                    $html = '<div><b>Item List</b></div>';
                    $html .= '<div class="span12">';
                    $html .= "<div class='span6'><b>Title</b></div>";
                    $html .= "<div class='span2'><b>Qty</b></div>";
                    $html .= "<div class='span2'><b>Discount</b></div>";
                    $html .= "<div class='span2'><b>Total amount</b></div>";
                    $html .= '</div>';
                }

                foreach($inv_itm_list as $itm_li){
                    $html .= '<div class="span12">';
                    $html .= "<div class='span6'>".$itm_li->title."</div>";
                    $html .= "<div class='span2'>".$itm_li->qty."</div>";
                    $html .= "<div class='span2'>".$itm_li->discount."</div>";
                    $html .= "<div class='span2'>".$itm_li->total_amount."</div>";
                    $html .= '</div>';
                }
            }
            echo $html;
        }
    }
    
    public function apilogin() {

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(200);
        exit();
    }

    if ($_POST) {
        $email = $this->db->escape_str($this->input->post('email'));
        $password = md5($this->db->escape($this->input->post('password')));
        $success = $this->Client_M->login($email, $password);

            if ($success == TRUE) {

            echo json_encode([
                'status' => 'success',
                'redirect' => base_url() . 'client/autologin'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Incorrect credentials.'
            ]);
        }
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'No data received.'
        ]);
    }
}
public function autologin() {
    if (isset($_GET['email']) && isset($_GET['password'])) {
            $email = $this->db->escape_str($_GET['email']);

            $password = md5($this->db->escape($_GET['password']));
            $success = $this->Client_M->login($email, $password); 

       if ($success == TRUE) {

            redirect(base_url() . 'client/dashboard');
        } else {
            redirect(base_url() . 'client/login'); 
        }
    } else {
        redirect(base_url() . 'client/login');
    }
}

    
}

?>