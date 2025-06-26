<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Clientstore extends CI_Controller {
    function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
        $this->load->model('Main_M');
        $this->load->model('Admin_M');
        $this->load->model('Common_M');
        $this->load->model('Client_M');
    }
    public function currency($id = NULL) {
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']);
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']);
            }
        $query = $this->db->query("select tbl_client_currencies.*,tbl_currencies.code as ccode from tbl_client_currencies left join tbl_currencies on tbl_client_currencies.code=tbl_currencies.id where tbl_client_currencies.client_id='" . $client_id . "'");
        $data['currency'] = $query->result();

        //$data['currency']=$this->Common_M->get('tbl_client_currencies','id','DESC','client_id',$client_id);
        $data['subview'] = 'currency/index';
        $this->load->view('clients/common/_layout_admin', $data);
    }

    public function add_currency($id = NULL) {

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
            //echo '<pre>'; print_r($_POST); exit();            
            $cdata = array(
                'client_id' => $client_id,
                'subuser_id' => $subuser_id,
                'code' => $_POST['code'],
                'symbol' => $_POST['symbol'],
                'name' => $_POST['name'],
                'decimal_place' => $_POST['decimal_place'],
                'formate' => $_POST['formate'],
                'created_at' => date('Y-m-d H:i:s')
            );

            if ($id) {
                $this->db->where('id', $id);
                $success = $this->db->update('tbl_client_currencies', $cdata);
                $bill_id = $id;
            } else {
                $success = $this->db->insert('tbl_client_currencies', $cdata);
                $bill_id = $this->db->insert_id();
            }

            if ($success) {
                redirect(base_url() . "Clientstore/currency");
            }
        }

        if ($id) {
            $data['panelTitle'] = 'Update Currency';
            $data['this_element'] = $this->Common_M->getSingleRow('tbl_client_currencies', 'id', $id);
        } else {
            $data['panelTitle'] = 'Create Currency';
        }

        $data['currency'] = $this->Common_M->get('tbl_currencies', 'country', 'ASC');
        $data['subview'] = 'currency/add_currency';
        $this->load->view('clients/common/_layout_admin', $data);
    }

    public function ajax_currency() {
        $data = $this->Common_M->getSingleRow('tbl_currencies', 'id', $_POST['id']);
        $re = array();
        $re['cn_code'] = $data->cn_code;
        $re['dial_code'] = $data->dial_code;
        $re['country'] = $data->country;
        $re['currency'] = $data->currency;
        $re['code'] = $data->code;
        $re['symbol'] = $data->symbol;
        echo json_encode($re);
    }

    public function ajax_add_currency() {
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
        $cdata = array(
            'client_id' => $client_id,
            'subuser_id' => $subuser_id,
            'code' => $_POST['code'],
            'symbol' => $_POST['symbol'],
            'name' => $_POST['name'],
            'decimal_place' => $_POST['decimal_place'],
            'formate' => $_POST['formate'],
            'created_at' => date('Y-m-d H:i:s')
        );
        $success = $this->db->insert('tbl_client_currencies', $cdata);
        $curid = $this->db->insert_id();
        $htm = '<option value="' . $curid . '">' . $_POST['name'] . '&nbsp;(' . $_POST['code'] . ')</option>';
        echo json_encode($htm);
    }

    public function sales_person($id = NULL) {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }

        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }
        $query = $this->db->query("select * from tbl_sales_persons where client_id='" . $client_id . "' order by id desc");
        $data['sale_person'] = $query->result();
        $data['subview'] = 'sale_person/index';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function add_sales_person($id = NULL) {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
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
            $cdata = array(
                'client_id' => $client_id,
                'subuser_id' => $subuser_id,
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'mobile' => $_POST['mobile'],
                'created' => date('Y-m-d H:i:s')
            );
            if ($id) {
                $this->db->where('id', $id);
                $success = $this->db->update('tbl_sales_persons', $cdata);
            } else {
                //echo "<pre>"; print_r($cdata); exit;
                $success = $this->db->insert('tbl_sales_persons', $cdata);
            }
            if ($success) {
                redirect(base_url() . "Clientstore/sales_person");
            }
        }
        if ($id) {
            $data['panelTitle'] = 'Update Sales Person';
            $data['this_element'] = $this->Common_M->getSingleRow('tbl_sales_persons', 'id', $id);
        } else {
            $data['panelTitle'] = 'Create Sales Person';
        }
        $data['subview'] = 'sale_person/add_sales_person';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function projects($id = NULL) {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']);
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']);
            }

       

        $query = $this->db->query("select tbl_projects.*,tbl_customers.name as cname,tbl_customers.email as cemail from tbl_projects left join  tbl_customers on tbl_projects.cus_id=tbl_customers.id where tbl_projects.client_id='" . $client_id . "' order by id desc");
        $data['project'] = $query->result();

        $query2 = $this->db->query("select * from tbl_project_tasks where client_id='" . $client_id . "' and  project_id='" . $id . "' order by tsk_id ASC");
        $data['task'] = $query2->result();

        $data['subview'] = 'Clientstore/projects/index';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function add_projects($id = NULL) {

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

            $cdata = array(
                'client_id' => $client_id,
                'subuser_id' => $subuser_id,
                'name' => $_POST['name'],
                'content' => $_POST['content'],
                'cus_id' => $_POST['cus_id'],
                'bill_method' => $_POST['bill_method'],
                'p_project_cost' => $_POST['p_project_cost'],
                'p_hour_cost' => $_POST['p_hour_cost'],
                'budget1' => $_POST['budget1'],
                'budget_cost' => $_POST['budget_cost'],
                'budget_hours' => $_POST['budget_hours'],
                'addbudget' => $_POST['addbudget'],
                'created' => date('Y-m-d H:i:s')
            );

            if ($id) {
                $this->db->where('id', $id);
                $success = $this->db->update('tbl_projects', $cdata);

                for ($x = 0; $x < count($_POST['title']); $x++) {

                    $isbill = (isset($_POST['billable'][$x])) ? $_POST['billable'][$x] : '';

                    $taskdata = array(
                        'client_id' => $client_id,
                        'subuser_id'=> $subuser_id,
                        'project_id' => $id,
                        'title' => $_POST['title'][$x],
                        'details' => $_POST['details'][$x],
                        'price' => $_POST['price'][$x],
                        'billable' => $isbill,
                        'status' => 1,
                        'created' => date('Y-m-d H:i:s')
                    );

                    if (isset($_POST['id'][$x]) && $_POST['id'][$x] > 0) {

                        $this->db->where('tsk_id', $_POST['id'][$x]);
                        $this->db->update('tbl_project_tasks', $taskdata);
                    } else {
                        $this->db->insert('tbl_project_tasks', $taskdata);
                    }
                }
            } else {
                $success = $this->db->insert('tbl_projects', $cdata);
                $lastid = $this->db->insert_id();

                for ($x = 0; $x < count($_POST['title']); $x++) {

                    $isbill = (isset($_POST['billable'][$x])) ? $_POST['billable'][$x] : '';

                    $taskdata = array(
                        'client_id' => $client_id,
                        'subuser_id'=> $subuser_id,
                        'project_id' => $lastid,
                        'title' => $_POST['title'][$x],
                        'details' => $_POST['details'][$x],
                        'price' => $_POST['price'][$x],
                        'billable' => $isbill,
                        'status' => 1,
                        'created' => date('Y-m-d H:i:s')
                    );
                    $this->db->insert('tbl_project_tasks', $taskdata);
                }
            }

            if ($success) {
                redirect(base_url() . "Clientstore/projects");
            }
        }

        if ($id) {
            $data['panelTitle'] = 'Update Project';
            $data['this_element'] = $this->Common_M->getSingleRow('tbl_projects', 'id', $id);
            $data['tasks'] = $this->Common_M->getSingleRow('tbl_project_tasks', 'project_id', $id);

            $query = $this->db->query("select * from tbl_project_tasks where client_id='" . $client_id . "' and project_id='" . $id . "' order by tsk_id ASC");
            $data['this_element_tasks'] = $query->result();
        } else {
            $data['panelTitle'] = 'Create Project';
        }
        $query = $this->db->query("select * from tbl_customers where client_id='" . $client_id . "' order by name ASC");
        $data['customers'] = $query->result();

        $data['subview'] = 'Clientstore/projects/add_projects';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function ajax_delete_task() {
        $this->db->where('tsk_id', $_POST['id']);
        $this->db->delete('tbl_project_tasks');
        echo json_encode(1);
    }

    public function payment_mode($id = NULL) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }

        if (isset($id)) {
            $this->db->query("delete from tbl_payment_modes where mode_id='" . $id . "'");
            redirect(base_url() . "Clientstore/payment_mode");
        } else {
            $client = $this->session->userdata('client');
            if($this->session->userdata('client')['parent_id']==0){
                $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
                }elseif($this->session->userdata('client')['parent_id']!=0){
                $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
                }

        }

        $query = $this->db->query("select * from tbl_payment_modes where client_id='" . $client_id . "' order by mode_id desc");
        $data['modes'] = $query->result();

        $data['subview'] = 'Clientstore/payemnt/index';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function add_payment_mode($id = NULL) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }


        $client = $this->session->userdata('client');
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

            $cdata = array(
                'client_id' => $client_id,
                'subuser_id' => $subuser_id,
                'mode' => $_POST['mode']
            );

            if ($id) {
                $this->db->where('mode_id', $id);
                $success = $this->db->update('tbl_payment_modes', $cdata);
            } else {
                $success = $this->db->insert('tbl_payment_modes', $cdata);
                $lastid = $this->db->insert_id();
            }

            if ($success) {
                redirect(base_url() . "Clientstore/payment_mode");
            }
        }

        if ($id) {
            $data['panelTitle'] = 'Update Payemnt';
            $data['this_element'] = $this->Common_M->getSingleRow('tbl_payment_modes', 'mode_id', $id);
        } else {
            $data['panelTitle'] = 'Create Payemnt';
        }



        $data['subview'] = 'Clientstore/payemnt/add_payemnt';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function get_customer_invoices() {
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }
        //echo "select * from tbl_invoices where client_id='".$client_id."' and customer_id='".$_POST['id']."'"; exit;
        $query = $this->db->query("select * from tbl_invoices where client_id='" . $client_id . "' and customer_id='" . $_POST['id'] . "' and due>0 ");
        $data['customerinvoice'] = $query->result();
        $jsn = array();
        $jsn['htm'] = ' <option value="">Select...</option>';
        foreach ($data['customerinvoice'] as $key) {
            $jsn['invoices'][$key->id] = $key;
            $jsn['htm'] .= '<option value="' . $key->id . '">' . $key->number . '</option>';
        }

        echo json_encode($jsn);
    }

    public function get_customer_invoices_list() {
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }
        //echo "select * from tbl_invoices where client_id='".$client_id."' and customer_id='".$_POST['id']."'"; exit;
        $query = $this->db->query("select * from tbl_invoices where client_id='" . $client_id . "' and customer_id='" . $_POST['id'] . "'");
        $data['customerinvoice'] = $query->result();
        $jsn = array();
        $jsn['htm'] = ' <option value="">Select...</option>';
        foreach ($data['customerinvoice'] as $key) {
            $jsn['invoices'][$key->id] = $key;
            $jsn['htm'] .= '<option value="' . $key->id . '">' . $key->number . '</option>';
        }

        echo json_encode($jsn);
    }

    public function get_details_invoices() {
        $query = $this->db->query("select * from tbl_invoices where id='" . $_POST['id'] . "'");
        $data = $query->result();
        //echo "<pre>"; print_r($data); exit;		
        $jsn = array();
        $jsn['date'] = date('d-m-Y', strtotime($data[0]->total));
        $jsn['total'] = $data[0]->total;
        $jsn['due'] = $data[0]->due;
        $jsn['package_status'] = $data[0]->package_status;
        echo json_encode($jsn);
    }

    public function update_profile($id = NULL) {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }

        if (!isset($id)) {
            if ($this->session->userdata('client')) {
                if ($id == $this->session->userdata('client')['id']) {
                    $id = $this->session->userdata('client')['id'];
                } else {
                    echo "You Are Not Allow";
                    exit;
                }
            } else if ($this->session->userdata('admin')) {
                if ($id == $this->session->userdata('admin')['id']) {
                    $id = $this->session->userdata('admin')['id'];
                } else {
                    echo "You Are Not Allow";
                    exit;
                }
            } else if ($this->session->userdata('employee')) {
                if ($id == $this->session->userdata('employee')['id']) {
                    $id = $this->session->userdata('employee')['id'];
                } else {
                    echo "You Are Not Allow";
                    exit;
                }
            }
        }

        if ($this->input->method() == "post") {

            $upData = [];
            $upData['business_name'] = $_POST['business_name'];
            $upData['email'] = $_POST['email'];
            $upData['mobile'] = $_POST['mobile'];
            $upData['password'] = $_POST['password'];
            $upData['contract_number'] = $_POST['contract_number'];
            $upData['category'] = $_POST['category'];
            $upData['type'] = $_POST['type'];
            $upData['match'] = $_POST['match'];
            $upData['data_source'] = $_POST['data_source'];
            $upData['contract_status'] = $_POST['contract_status'];
            $upData['contact_type'] = $_POST['contact_type'];
            $upData['paid_amount'] = $_POST['paid_amount'];
            $upData['contract_amount'] = $_POST['contract_amount'];
            $upData['contact_person_name'] = $_POST['contact_person_name'];
            $upData['contact_person_mobile'] = $_POST['contact_person_mobile'];
            $upData['contact_person_email'] = $_POST['contact_person_email'];
            $upData['payment_status'] = $_POST['payment_status'];
            $upData['gst_number'] = $_POST['gst_number'];
            $upData['nature_of_work'] = $_POST['nature_of_work'];
            $upData['man_power'] = $_POST['man_power'];
            $upData['relationship_officer_name'] = $_POST['relationship_officer_name'];
            $upData['contract_period'] = $_POST['contract_period'];
            $upData['service_availed'] = $_POST['service_availed'];
            $upData['owner_name'] = $_POST['owner_name'];
            $upData['owner_mobile'] = $_POST['owner_mobile'];
            $upData['crm_id'] = $_POST['crm_id'];
            $upData['owner_mobile'] = $_POST['owner_mobile'];
            $upData['address'] = $_POST['address'];
            $upData['pincode'] = $_POST['pincode'];
            if (!empty($_POST['password'])) {
                if($upData['password'] != $upData['password']){
                    $this->session->set_flashdata('error', 'Password and confirm password not matching.');
                    redirect(base_url() . "client/update-profile/" . $_POST['id']);
                    exit;
                }
                $upData['password'] = md5($this->db->escape($this->input->post('password')));
                $upData['decrypted_password'] = $this->input->post('password');
            }
//            echo "<pre>";
//            print_r($upData);
//            echo "</pre>";
           $this->db->where('id', $_POST['id']);
           $this->db->update('tbl_clients', $upData);
            $this->session->set_flashdata('success', 'Profile Updated Successfully');
            redirect(base_url() . "client/update-profile/" . $_POST['id']);
        }


        $data['this_element'] = $this->Common_M->getSingleRow('tbl_clients', 'id', $id);
//        echo "<pre>";
//        print_r($data);
//        exit;
        $data['subview'] = 'setting/add_client';
        $this->load->view('clients/common/_layout_admin', $data);
    }

    public function add_warehouse($id = NULL) {

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
           
            $idata['client_id'] = $client_id;
            $idata['subuser_id'] = $subuser_id;
            $idata['wr_name'] = $_POST['wr_name'];
            $idata['wr_email'] = $_POST['wr_email'];
            $idata['wr_ph'] = $_POST['wr_ph'];
            $idata['wr_addr'] = $_POST['wr_addr'];
            $idata['wr_addr2'] = $_POST['wr_addr2'];
            $idata['wr_state'] = $_POST['wr_state'];
            $idata['wr_country'] = $_POST['wr_country'];
            $idata['wr_city'] = $_POST['wr_city'];
            $idata['wr_zip'] = $_POST['wr_zip'];
            $idata['created'] = date('Y-m-d H:i:s');
//             echo "<pre>"; 
//             print_r($_POST);
//             print_r($idata);
//             exit();
            if ($id) {
                $this->db->where('wr_id', $id);
                $success = $this->db->update('tbl_warehouses', $idata);
            } else {
                $success = $this->db->insert('tbl_warehouses', $idata);
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
                    redirect(base_url() . "client/add-warehouse");
                }
            }
        }

        if ($id) {
            $data['this_element'] = $this->Common_M->getSingleRow('tbl_warehouses', 'wr_id', $id);
            $data['panelTitle'] = 'Update warehouse';
        } else {
            $data['panelTitle'] = 'Add warehouse';
        }

        $data['countries'] = $this->Common_M->get('tbl_countries', 'name', 'ASC');
        $data['cities'] = $this->Common_M->get('tbl_cities', 'name', 'ASC');
        $data['states'] = $this->Common_M->get('tbl_states', 'name', 'ASC');
        $data['subview'] = 'setting/add_warehouse';
        $this->load->view('clients/common/_layout_admin', $data);
    }

    public function warehouse($id = NULL) {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }

        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }
       

        $query = $this->db->query("select * from tbl_warehouses where client_id='" . $client_id . "' order by wr_id desc");
        $data['warehouse'] = $query->result();

        $data['subview'] = 'setting/warehouse';
        $this->load->view('clients/common/_layout_admin', $data);
    }

    public function preferences($id = NULL) {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

        // if (isset($id)) {
        //     $client_id = $id;
        // } else {
        //     $client_id = $this->session->userdata('client')['id'];
        // }

        $query = $this->db->query("select * from tbl_settings where client_id='" . $client_id . "' order by set_id desc");
        $data['this_element'] = $query->result();

        $data['subview'] = 'setting/preferences';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function get_customer_all_invoices() {
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }
        // $client_id = $this->session->userdata('client')['id'];
        //echo "select * from tbl_invoices where client_id='".$client_id."' and customer_id='".$_POST['id']."'"; exit;
        $query = $this->db->query("select * from tbl_invoices where client_id='" . $client_id . "' and customer_id='" . $_POST['id'] . "' and package_status != 3 ");
        $data['customerinvoice'] = $query->result();
        $jsn = array();
        $jsn['htm'] = ' <option value="">Select...</option>';
        foreach ($data['customerinvoice'] as $key) {
            $jsn['invoices'][$key->id] = $key;
            $jsn['htm'] .= '<option value="' . $key->id . '">' . $key->number . '</option>';
        }

        echo json_encode($jsn);
    }
}
