<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Preferences extends CI_Controller {
    function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
        $this->load->model('Main_M');
        $this->load->model('Admin_M');
        $this->load->model('Common_M');
        $this->load->model('Client_M');
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
    }
    public function general($id = NULL) {
        if (isset($id)) {
            $client_id = $id;
        } else {
            $client_id = $this->session->userdata('client')['id'];
        }
        if ($_POST) {
            $cdata = array(
                'client_id' => $client_id,
                'key_name' => 'general',
                'key_value' => serialize($_POST)
            );
            if (isset($_POST['id']) && $_POST['id'] != "") {
                $this->db->where('set_id', $_POST['id']);
                $success = $this->db->update('tbl_settings', $cdata);
            } else {
                $success = $this->db->insert('tbl_settings', $cdata);
            }
            if ($success) {
                redirect(base_url() . "preferences/general");
            }
        }
        $query = $this->db->query("select * from tbl_settings where client_id='" . $client_id . "' and key_name='general'");
        $record = $query->result();
        $record = $record[0];
        $data['this_element'] = $record;
        $data['subview'] = 'preferences/general';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function branding($id = NULL) {
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
         }
        if ($_POST) {
            if (isset($_FILES['file']) && $_FILES["file"]["name"] != "") {
                $target_dir = "clients/company_logo/";
                $target_file = $target_dir . basename($_FILES["file"]["name"]);
                //$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
                $idata['img'] = $target_file;
            } else if (isset($_POST['hiddenFilePath'])) {
                $idata['img'] = $_POST['hiddenFilePath'];
            } else {
                $idata['img'] = NULL;
            }
            $cdata = array('imagePath' => $idata['img']);
            $this->db->where('id', $client_id);
            $success = $this->db->update('tbl_clients', $cdata);
            if ($success) {
                redirect(base_url() . "preferences/branding");
            }
        }
        $query = $this->db->query("select imagePath from tbl_clients where id='" . $client_id . "'");
        $record = $query->result();
        $record = $record[0];
        $data['this_element'] = $record;
        $data['subview'] = 'preferences/branding';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function customers_and_vendors() {

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
                'key_name' => 'customers-and-vendors',
                'key_value' => serialize($_POST)
            );
            if (isset($_POST['id']) && $_POST['id'] != "") {
                $this->db->where('set_id', $_POST['id']);
                $success = $this->db->update('tbl_settings', $cdata);
            } else {
                $success = $this->db->insert('tbl_settings', $cdata);
            }
            if ($success) {
                redirect(base_url() . "preferences/customers-and-vendors");
            }
        }

        $query = $this->db->query("select * from tbl_settings where client_id='" . $client_id . "' and key_name='customers-and-vendors'");
        $record = $query->result();
        $record = $record[0];
        $data['this_element'] = $record;

        //$data['currency']=$this->Common_M->get('tbl_client_currencies','id','DESC','client_id',$client_id);
        $data['subview'] = 'preferences/customers-and-vendors';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function items($id = NULL) {
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
                'key_name' => 'items',
                'key_value' => serialize($_POST)
            );

            if (isset($_POST['id']) && $_POST['id'] != "") {
                $this->db->where('set_id', $_POST['id']);
                $success = $this->db->update('tbl_settings', $cdata);
            } else {
                $success = $this->db->insert('tbl_settings', $cdata);
                //$bill_id=$this->db->insert_id();
            }

            if ($success) {
                redirect(base_url() . "preferences/items");
            }
        }

        $query = $this->db->query("select * from tbl_settings where client_id='" . $client_id . "' and key_name='items'");
        $record = $query->result();
        $record = $record[0];
        //echo '<pre>'; print_r($record); exit();   
        $data['this_element'] = $record;

        //$data['currency']=$this->Common_M->get('tbl_client_currencies','id','DESC','client_id',$client_id);
        $data['subview'] = 'preferences/items';
        $this->load->view('clients/common/_layout_admin', $data);
    }

    public function salesorders($id = NULL) {
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
                'key_name' => 'salesorders',
                'key_value' => serialize($_POST)
            );

            if (isset($_POST['id']) && $_POST['id'] != "") {
                $this->db->where('set_id', $_POST['id']);
                $success = $this->db->update('tbl_settings', $cdata);
            } else {
                $success = $this->db->insert('tbl_settings', $cdata);
            }

            if ($success) {
                redirect(base_url() . "preferences/salesorders");
            }
        }

        $query = $this->db->query("select * from tbl_settings where client_id='" . $client_id . "' and key_name='salesorders'");
        $record = $query->result();
        $record = $record[0];
        $data['this_element'] = $record;
        $data['subview'] = 'preferences/salesorders';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function packages($id = NULL) {
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
                'key_name' => 'packages',
                'key_value' => serialize($_POST)
            );

            if (isset($_POST['id']) && $_POST['id'] != "") {
                $this->db->where('set_id', $_POST['id']);
                $success = $this->db->update('tbl_settings', $cdata);
            } else {
                $success = $this->db->insert('tbl_settings', $cdata);
                //$bill_id=$this->db->insert_id();
            }

            if ($success) {
                redirect(base_url() . "preferences/packages");
            }
        }

        $query = $this->db->query("select * from tbl_settings where client_id='" . $client_id . "' and key_name='packages'");
        $record = $query->result();
        $record = $record[0];
        $data['this_element'] = $record;

        //$data['currency']=$this->Common_M->get('tbl_client_currencies','id','DESC','client_id',$client_id);
        $data['subview'] = 'preferences/packages';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function shipments($id = NULL) {
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
                'key_name' => 'shipments',
                'key_value' => serialize($_POST)
            );

            //echo '<pre>'; print_r($cdata); exit(); 

            if (isset($_POST['id']) && $_POST['id'] != "") {
                $this->db->where('set_id', $_POST['id']);
                $success = $this->db->update('tbl_settings', $cdata);
            } else {
                $success = $this->db->insert('tbl_settings', $cdata);
                //$bill_id=$this->db->insert_id();
            }

            if ($success) {
                redirect(base_url() . "preferences/shipments");
            }
        }

        $query = $this->db->query("select * from tbl_settings where client_id='" . $client_id . "' and key_name='shipments'");
        $record = $query->result();
        $record = $record[0];
        //echo '<pre>'; print_r($record); exit();   
        $data['this_element'] = $record;

        //$data['currency']=$this->Common_M->get('tbl_client_currencies','id','DESC','client_id',$client_id);
        $data['subview'] = 'preferences/shipments';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function delivery_challans($id = NULL) {
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
                'key_name' => 'delivery-challans',
                'key_value' => serialize($_POST)
            );
            if (isset($_POST['id']) && $_POST['id'] != "") {
                $this->db->where('set_id', $_POST['id']);
                $success = $this->db->update('tbl_settings', $cdata);
            } else {
                $success = $this->db->insert('tbl_settings', $cdata);
            }

            if ($success) {
                redirect(base_url() . "preferences/delivery-challans");
            }
        }

        $query = $this->db->query("select * from tbl_settings where client_id='" . $client_id . "' and key_name='delivery-challans'");
        $record = $query->result();
        $record = $record[0];
        //echo '<pre>'; print_r($record); exit();   
        $data['this_element'] = $record;

        //$data['currency']=$this->Common_M->get('tbl_client_currencies','id','DESC','client_id',$client_id);
        $data['subview'] = 'preferences/delivery-challans';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function invoices($id = NULL) {
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
                'key_name' => 'invoices',
                'key_value' => serialize($_POST)
            );

            //echo '<pre>'; print_r($cdata); exit(); 

            if (isset($_POST['id']) && $_POST['id'] != "") {
                $this->db->where('set_id', $_POST['id']);
                $success = $this->db->update('tbl_settings', $cdata);
            } else {
                $success = $this->db->insert('tbl_settings', $cdata);
                //$bill_id=$this->db->insert_id();
            }

            if ($success) {
                redirect(base_url() . "preferences/invoices");
            }
        }

        $query = $this->db->query("select * from tbl_settings where client_id='" . $client_id . "' and key_name='invoices'");
        $record = $query->result();
        $record = $record[0];
        //echo '<pre>'; print_r($record); exit();   
        $data['this_element'] = $record;

        //$data['currency']=$this->Common_M->get('tbl_client_currencies','id','DESC','client_id',$client_id);
        $data['subview'] = 'preferences/invoices';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function payments_received($id = NULL) {
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
                'key_name' => 'payments_received',
                'key_value' => serialize($_POST)
            );

            //echo '<pre>'; print_r($cdata); exit(); 

            if (isset($_POST['id']) && $_POST['id'] != "") {
                $this->db->where('set_id', $_POST['id']);
                $success = $this->db->update('tbl_settings', $cdata);
            } else {
                $success = $this->db->insert('tbl_settings', $cdata);
                //$bill_id=$this->db->insert_id();
            }

            if ($success) {
                redirect(base_url() . "preferences/payments-received");
            }
        }

        $query = $this->db->query("select * from tbl_settings where client_id='" . $client_id . "' and key_name='payments_received'");
        $record = $query->result();
        $record = $record[0];
        //echo '<pre>'; print_r($record); exit();   
        $data['this_element'] = $record;

        //$data['currency']=$this->Common_M->get('tbl_client_currencies','id','DESC','client_id',$client_id);
        $data['subview'] = 'preferences/payments-received';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function credit_notes($id = NULL) {
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
                'key_name' => 'credit_notes',
                'key_value' => serialize($_POST)
            );

            if (isset($_POST['id']) && $_POST['id'] != "") {
                $this->db->where('set_id', $_POST['id']);
                $success = $this->db->update('tbl_settings', $cdata);
            } else {
                $success = $this->db->insert('tbl_settings', $cdata);
                //$bill_id=$this->db->insert_id();
            }

            if ($success) {
                redirect(base_url() . "preferences/credit-notes");
            }
        }

        $query = $this->db->query("select * from tbl_settings where client_id='" . $client_id . "' and key_name='credit_notes'");
        $record = $query->result();
        $record = $record[0];
        //echo '<pre>'; print_r($record); exit();   
        $data['this_element'] = $record;

        //$data['currency']=$this->Common_M->get('tbl_client_currencies','id','DESC','client_id',$client_id);
        $data['subview'] = 'preferences/credit-notes';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function purchase_orders($id = NULL) {
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
                'key_name' => 'purchase_orders',
                'key_value' => serialize($_POST)
            );

            //echo '<pre>'; print_r($cdata); exit(); 

            if (isset($_POST['id']) && $_POST['id'] != "") {
                $this->db->where('set_id', $_POST['id']);
                $success = $this->db->update('tbl_settings', $cdata);
            } else {
                $success = $this->db->insert('tbl_settings', $cdata);
                //$bill_id=$this->db->insert_id();
            }

            if ($success) {
                redirect(base_url() . "preferences/purchase-orders");
            }
        }

        $query = $this->db->query("select * from tbl_settings where client_id='" . $client_id . "' and key_name='purchase_orders'");
        $record = $query->result();
        $record = $record[0];
        //echo '<pre>'; print_r($record); exit();   
        $data['this_element'] = $record;

        //$data['currency']=$this->Common_M->get('tbl_client_currencies','id','DESC','client_id',$client_id);
        $data['subview'] = 'preferences/purchase-orders';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function tax_rate($id = NULL) {
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
//            echo "<pre>";
//            print_r($_POST);
//            echo "</pre>";
            
            $cdata = array(
                'client_id' => $client_id,
                'subuser_id' => $subuser_id,
                'key_name' => 'tax_rate',
                'key_value' => serialize($_POST)
            );
            
//            echo "<pre>";
//            print_r($cdata);
//            echo "</pre>";
//            exit;
            
            if (isset($_POST['id']) && $_POST['id'] != "") {
                $this->db->where('set_id', $_POST['id']);
                $success = $this->db->update('tbl_settings', $cdata);
            } else {
                $success = $this->db->insert('tbl_settings', $cdata);
            }

            if ($success) {
                redirect(base_url() . "preferences/tax-rate");
            }
        }
        $query = $this->db->query("select * from tbl_settings where client_id='" . $client_id . "' and key_name='tax_rate'");
        $record = $query->result();
        $record = $record[0];
        $data['this_element'] = $record;
        $data['subview'] = 'preferences/tax-rate';
        $this->load->view('clients/common/_layout_admin', $data);
    }

    public function gst_setting($id = NULL) {
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
                'key_name' => 'gst_setting',
                'key_value' => serialize($_POST)
            );

            //echo '<pre>'; print_r($cdata); exit(); 

            if (isset($_POST['id']) && $_POST['id'] != "") {
                $this->db->where('set_id', $_POST['id']);
                $success = $this->db->update('tbl_settings', $cdata);
            } else {
                $success = $this->db->insert('tbl_settings', $cdata);
                //$bill_id=$this->db->insert_id();
            }

            if ($success) {
                redirect(base_url() . "preferences/gst-setting");
            }
        }

        $query = $this->db->query("select * from tbl_settings where client_id='" . $client_id . "' and key_name='gst_setting'");
        $record = $query->result();
        $record = $record[0];
        //echo '<pre>'; print_r($record); exit();   
        $data['this_element'] = $record;
        $data['accounts'] = $this->Common_M->get('tbl_accounts', 'name', 'ASC', 'client_id', $this->session->userdata('client')['id']);

        //$data['currency']=$this->Common_M->get('tbl_client_currencies','id','DESC','client_id',$client_id);
        $data['subview'] = 'preferences/gst-setting';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function add_user_role($id = NULL) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if ($_POST) {

            //echo '<pre>'; print_r($_POST); exit;

            if (isset($_POST["cfullaccess"])) {
                $cfullaccess = $_POST["cfullaccess"];
            } else {
                $cfullaccess = implode('', $_POST["cust_access"]);
            }

            if (isset($_POST["vendfullaccess"])) {
                $vendfullaccess = $_POST["vendfullaccess"];
            } else {
                $vendfullaccess = implode('', $_POST["vend_access"]);
            }


            if (isset($_POST["vaccount"])) {
                $vaccount = $_POST["vaccount"];
            } else {
                $vaccount = '';
            }
            if (isset($_POST["Itemfullaccess"])) {
                $Itemfullaccess = $_POST["Itemfullaccess"];
            } else {
                $Itemfullaccess = implode('', $_POST["Item_access"]);
            }


            if (isset($_POST["cmpitmfullaccess"])) {
                $cmpitmfullaccess = $_POST["cmpitmfullaccess"];
            } else {
                $cmpitmfullaccess = implode('', $_POST["cmpitm_access"]);
            }

            if (isset($_POST["whfullaccess"])) {
                $whfullaccess = $_POST["whfullaccess"];
            } else {
                $whfullaccess = implode('', $_POST["wh_access"]);
            }

            if (isset($_POST["tordfullaccess"])) {
                $tordfullaccess = $_POST["tordfullaccess"];
            } else {
                $tordfullaccess = implode('', $_POST["tord_access"]);
            }
            if (isset($_POST["invadjtfullaccess"])) {
                $invadjtfullaccess = $_POST["invadjtfullaccess"];
            } else {
                $invadjtfullaccess = implode('', $_POST["invadjt_access"]);
            }

            if (isset($_POST["plfullaccess"])) {
                $plfullaccess = $_POST["plfullaccess"];
            } else {
                $plfullaccess = implode('', $_POST["pl_access"]);
            }

            if (isset($_POST["invfullaccess"])) {
                $invfullaccess = $_POST["invfullaccess"];
            } else {
                $invfullaccess = implode('', $_POST["inv_access"]);
            }

            if (isset($_POST["cpfullaccess"])) {
                $cpfullaccess = $_POST["cpfullaccess"];
            } else {
                $cpfullaccess = implode('', $_POST["cp_access"]);
            }

            if (isset($_POST["sofullaccess"])) {
                $sofullaccess = $_POST["sofullaccess"];
            } else {
                $sofullaccess = implode('', $_POST["so_access"]);
            }

            if (isset($_POST["pakfullaccess"])) {
                $pakfullaccess = $_POST["pakfullaccess"];
            } else {
                $pakfullaccess = implode('', $_POST["pak_access"]);
            }

            if (isset($_POST["shofullaccess"])) {
                $shofullaccess = $_POST["shofullaccess"];
            } else {
                $shofullaccess = implode('', $_POST["sho_access"]);
            }

            if (isset($_POST["cnfullaccess"])) {
                $cnfullaccess = $_POST["cnfullaccess"];
            } else {
                $cnfullaccess = implode('', $_POST["cn_access"]);
            }

            if (isset($_POST["srfullaccess"])) {
                $srfullaccess = $_POST["srfullaccess"];
            } else {
                $srfullaccess = implode('', $_POST["sr_access"]);
            }
            if (isset($_POST["srrfullaccess"])) {
                $srrfullaccess = $_POST["srrfullaccess"];
            } else {
                $srrfullaccess = implode('', $_POST["srr_access"]);
            }

            if (isset($_POST["bilfullaccess"])) {
                $bilfullaccess = $_POST["bilfullaccess"];
            } else {
                $bilfullaccess = implode('', $_POST["bil_access"]);
            }
            if (isset($_POST["vpfullaccess"])) {
                $vpfullaccess = $_POST["vpfullaccess"];
            } else {
                $vpfullaccess = implode('', $_POST["vp_access"]);
            }

            if (isset($_POST["pofullaccess"])) {
                $pofullaccess = $_POST["pofullaccess"];
            } else {
                $pofullaccess = implode('', $_POST["po_access"]);
            }

            if (isset($_POST["prfullaccess"])) {
                $prfullaccess = $_POST["prfullaccess"];
            } else {
                $prfullaccess = implode('', $_POST["pr_access"]);
            }

            if (isset($_POST["cafullaccess"])) {
                $cafullaccess = $_POST["cafullaccess"];
            } else {
                $cafullaccess = implode('', $_POST["ca_access"]);
            }

            if (isset($_POST["usfullaccess"])) {
                $usfullaccess = $_POST["usfullaccess"];
            } else {
                $usfullaccess = implode('', $_POST["us_access"]);
            }

            if (isset($_POST["exdfullaccess"])) {
                $exdfullaccess = $_POST["exdfullaccess"];
            } else {
                $exdfullaccess = implode('', $_POST["exd_access"]);
            }

            if (isset($_POST["gpfullaccess"])) {
                $gpfullaccess = $_POST["gpfullaccess"];
            } else {
                $gpfullaccess = implode('', $_POST["gp_access"]);
            }

            if (isset($_POST["txfullaccess"])) {
                $txfullaccess = $_POST["txfullaccess"];
            } else {
                $txfullaccess = implode('', $_POST["tx_access"]);
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

            $sales_orderData = array(
                'client_id' => $client_id,
                'subuser_id' => $subuser_id,
                'name' => $_POST['name'],
                'content' => $_POST['content'],
                'customers' => $cfullaccess,
                'vendors' => $vendfullaccess,
                'vendors_ac' => $vaccount,
                'Item' => $Itemfullaccess,
                'composite_items' => $cmpitmfullaccess,
                'warehouses' => $whfullaccess,
                'transfer_orders' => $tordfullaccess,
                'inventory_adjustments' => $invadjtfullaccess,
                'price_list' => $plfullaccess,
                'invoices' => $invfullaccess,
                'customer_payments' => $cpfullaccess,
                'sales_orders' => $sofullaccess,
                'delivery_challan' => '',
                'package' => $pakfullaccess,
                'shipment_order' => $shofullaccess,
                'credit_notes' => $cnfullaccess,
                'sales_return' => $srfullaccess,
                'sales_return_receive' => $srrfullaccess,
                'bills' => $bilfullaccess,
                'vendor_payments' => $vpfullaccess,
                'purchase_orders' => $pofullaccess,
                'purchase_receive' => $prfullaccess,
                'chart_of_zccounts' => $cafullaccess,
                'set_users' => $usfullaccess,
                'set_export_data' => $exdfullaccess,
                'set_general_preferences' => $gpfullaccess,
                'set_taxes' => $txfullaccess,
                'set_payment_terms' => '',
                'activity_reports' => '',
                'sales_reports' => '',
                'purchase_reports' => '',
                'budget_reports' => '',
                'inventory_reports' => ''
            );

            if ($id) {
                $this->db->where('role_id', $id);
                $success = $this->db->update('tbl_user_roles', $sales_orderData);
            } else {
                // echo '<pre>'; print_r($sales_orderData);exit();
                $success = $this->db->insert('tbl_user_roles', $sales_orderData);
                //$this->db->last_query();exit();
                $sales_order_id = $this->db->insert_id();
            }

            if ($success) {

                $this->session->set_flashdata('success', 'Updated Successfully');
                redirect(base_url() . "setting/user-role");
            }
        }
        if ($id) {
            $data['isEditing'] = TRUE;
            $data['panelTitle'] = 'Update User Role';
            $data['this_element'] = $this->Common_M->getSingleRow('tbl_user_roles', 'role_id', $id);
        } else {
            $data['panelTitle'] = 'Create User Role';
        }


        $data['subview'] = 'preferences/add-user-role';
        $this->load->view('clients/common/_layout_admin', $data);
        //$this->load->view('admin/add_sales_order2',$data);
    }

    public function user_role() {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }

        $data['this_element'] = $this->Common_M->get('tbl_user_roles', 'client_id', $this->session->userdata('client')['id']);
        $data['panelTitle'] = 'User role';
        $data['subview'] = 'preferences/user-role';
        $this->load->view('clients/common/_layout_admin', $data);
    }
}
