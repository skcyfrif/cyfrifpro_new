<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {

    function __construct() {

        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");

        $this->load->model('Main_M');
        $this->load->model('Admin_M');
        $this->load->model('Inventory_M');
        $this->load->model('Common_M');
        $this->load->model('Client_M');
    }

    public function index() {
        
    }

    public function inventory($id = NULL) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }

        $seuserdata = $this->session->userdata('client');
        if ($seuserdata['actype'] == 3) {
            $this->main_inventory();
        } else if ($seuserdata['actype'] == 2) {
            $this->main_inventory();
        } else {
            $this->client_inventory();
        }
    }

    public function encryptdecrypt($data, $method) {
        $this->load->library('encrypt');
        if ($data && $method == 'encrypt') {

            $returnData = $this->encrypt->encode($data, $key);
        } else if ($data && $method == 'decrypt') {

            $returnData = $this->encrypt->decode($data, $key);
        }
        return $returnData;
    }

    public function add_inventory($id = NULL) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
            $seuserdata = $this->session->userdata('client');

            if($this->session->userdata('client')['parent_id']!=0){
                $subuser_id = $this->session->userdata('client')['id'];
            }elseif($this->session->userdata('client')['parent_id']==0){
                $subuser_id = $this->session->userdata('client')['parent_id'];
            }

            if($this->session->userdata('client')['parent_id']==0){
                $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
                }elseif($this->session->userdata('client')['parent_id']!=0){
                $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
                }
       
        if ($seuserdata['actype'] == 3) {
            if ($_POST) {
                $rdata = explode(':', $_POST['vendor']);
                $vendor_name = $rdata[0];
                $vendor_id = $rdata[1];
                $idata['client_id'] = $client_id;
                $idata['subuser_id'] = $subuser_id;
                $idata['title'] = $_POST['title'];
                $idata['sku'] = $_POST['sku'];
                $idata['type'] = $_POST['type'];
                $idata['unit'] = $_POST['unit'];
                $idata['ptype'] = 1;
                $idata['parents'] = 0;
                $idata['brand'] = $_POST['brand'];
                $idata['vendor_id'] = $vendor_id;
                $idata['vendor'] = $vendor_name;
                $idata['dim'] = $_POST['dim'];
                $idata['weight'] = $_POST['Weight'];
                $idata['manufacturer'] = $_POST['manufacturer'];
                $idata['UPC'] = $_POST['UPC'];
                $idata['HSN'] = $_POST['HSN'];
                $idata['SAC'] = $_POST['SAC'];
                $idata['tax'] = $_POST['tax'];
                $idata['grp_id'] = $_POST['grp_id'];
                $idata['IGST'] = $_POST['IGST'];
                $idata['SGST'] = $_POST['SGST'];
                $idata['CGST'] = $_POST['CGST'];
                $idata['sprice'] = $_POST['sprice'];
                $idata['saccount'] = $_POST['saccount'];
                $idata['sdesc'] = $_POST['sdesc'];
                $idata['pprice'] = $_POST['pprice'];
                $idata['paccount'] = $_POST['paccount'];
                $idata['pdesc'] = $_POST['pdesc'];
                $idata['inv_acc'] = $_POST['inv_acc'];
                $idata['op_stock'] = $_POST['op_stock'];
                $idata['rate_per_unit'] = $_POST['rate_per_unit'];
                $idata['reorder'] = $_POST['reorder'];
                $idata['created'] = date('Y-m-d H:i:s');

                if (isset($_FILES['file']) && $_FILES["file"]["name"] != "") {
                    $target_dir = "assets/product/";
                    $target_file = $target_dir . basename($_FILES["file"]["name"]);
                    //$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
                    $idata['img'] = $target_file;
                } else if (isset($_POST['hiddenFilePath'])) {

                    $idata['img'] = $_POST['hiddenFilePath'];
                } else {
                    $idata['img'] = NULL;
                }


                if ($id) {
                    //echo $id;exit();
                    $this->db->where('id', $id);
                    $success = $this->db->update('tbl_inventory', $idata);
                    //echo $this->db->last_query();exit();
                } else {
                    $success = $this->db->insert('tbl_inventory', $idata);
                }

                if ($success) {
                    //echo 'ok';exit();
                    if ($_GET['redirect']) {
                        $encrypted = $_GET['redirect'];
                        $url = base64_decode($encrypted);
                        echo "<script>window.close();</script>";
                    } else {
                        //echo 'Ok';exit();
                        $this->session->set_flashdata('success', 'Updated Successfully');
                        redirect(base_url() . 'inventory/inventory');
                    }
                }
            }
        } else if ($seuserdata['actype'] == 2) {
            if ($_POST) {

                $rdata = explode(':', $_POST['vendor']);
                $vendor_name = $rdata[0];
                $vendor_id = $rdata[1];
                $idata['client_id'] = $client_id;
                $idata['subuser_id'] = $subuser_id;
                $idata['title'] = $_POST['title'];
                $idata['sku'] = $_POST['sku'];
                $idata['type'] = $_POST['type'];
                $idata['unit'] = $_POST['unit'];
                $idata['ptype'] = 1;
                $idata['parents'] = 0;
                $idata['brand'] = $_POST['brand'];
                $idata['vendor_id'] = $vendor_id;
                $idata['vendor'] = $vendor_name;
                $idata['dim'] = $_POST['dim'];
                $idata['weight'] = $_POST['Weight'];
                $idata['manufacturer'] = $_POST['manufacturer'];
                $idata['UPC'] = $_POST['UPC'];
                $idata['HSN'] = $_POST['HSN'];
                $idata['SAC'] = $_POST['SAC'];
                $idata['tax'] = $_POST['tax'];
                $idata['grp_id'] = $_POST['grp_id'];
                $idata['IGST'] = $_POST['IGST'];
                $idata['SGST'] = $_POST['SGST'];
                $idata['CGST'] = $_POST['CGST'];
                $idata['sprice'] = $_POST['sprice'];
                $idata['saccount'] = $_POST['saccount'];
                $idata['sdesc'] = $_POST['sdesc'];
                $idata['pprice'] = $_POST['pprice'];
                $idata['paccount'] = $_POST['paccount'];
                $idata['pdesc'] = $_POST['pdesc'];
                $idata['inv_acc'] = $_POST['inv_acc'];
                $idata['op_stock'] = $_POST['op_stock'];
                $idata['rate_per_unit'] = $_POST['rate_per_unit'];
                $idata['reorder'] = $_POST['reorder'];
                $idata['created'] = date('Y-m-d H:i:s');

                if (isset($_FILES['file']) && $_FILES["file"]["name"] != "") {
                    $target_dir = "assets/product/";
                    $target_file = $target_dir . basename($_FILES["file"]["name"]);
                    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
                    $idata['img'] = $target_file;
                } else if (isset($_POST['hiddenFilePath'])) {

                    $idata['img'] = $_POST['hiddenFilePath'];
                } else {
                    $idata['img'] = NULL;
                }

                if ($id) {
                    //echo $id;exit();
                    $this->db->where('id', $id);
                    $success = $this->db->update('tbl_inventory', $idata);
                    //echo $this->db->last_query();exit();
                } else {
                    $success = $this->db->insert('tbl_inventory', $idata);
                }

                if ($success) {
                    if ($_GET['redirect']) {
                        $encrypted = $_GET['redirect'];
                        $url = base64_decode($encrypted);
                        echo "<script>window.close();</script>";
                    } else {
                        $this->session->set_flashdata('success', 'Updated Successfully');
                        redirect(base_url() . 'inventory/inventory');
                    }
                }
            }
        } else {
            if ($_POST) {
                $rdata = explode(':', $_POST['vendor']);
                $vendor_name = $rdata[0];
                $vendor_id = $rdata[1];
                $idata['client_id'] = $client_id;
                $idata['subuser_id'] = $subuser_id;

                if (isset($client_id)) {
                    $idata['type'] = $_POST['type'];
                    $idata['title'] = $_POST['title'];
                    $idata['unit'] = $_POST['unit'];
                    $idata['sprice'] = $_POST['saleprice'];
                    $idata['saccount'] = $_POST['saccount'];
                    $idata['stock'] = $_POST['stock'];
                    $idata['pprice'] = $_POST['purchaseprice'];
                    $idata['paccount'] = $_POST['paccount'];
                } else {
                    $idata['title'] = $_POST['title'];
                    $idata['doe'] = ($_POST['doe']) ?? NULL;
                    $idata['dom'] = ($_POST['dom']) ?? NULL;
                    $idata['bn'] = $_POST['bn'];
                    $idata['bd'] = $_POST['bd'];
                    $idata['pon'] = $_POST['pon'];
                    $idata['pod'] = $_POST['pod'];
                    $idata['vendor_id'] = $vendor_id;
                    $idata['vendor'] = $vendor_name;
                    $idata['term'] = $_POST['term'];
                    $idata['stock'] = $_POST['stock'];
                    $idata['remaining_stock'] = $_POST['stock'];
                    $idata['type'] = $_POST['type'];
                    $idata['saleprice'] = $_POST['saleprice'];
                    $idata['sunit'] = $_POST['sunit'];
                    $idata['saccount'] = $_POST['saccount'];
                    $idata['sdescription'] = $_POST['sdescription'];
                    $idata['purchaseprice'] = $_POST['purchaseprice'];
                    $idata['punit'] = $_POST['punit'];
                    $idata['paccount'] = $_POST['paccount'];
                    $idata['pdescription'] = $_POST['pdescription'];
                }
                if (isset($_FILES['file']) && $_FILES["file"]["name"] != "") {
                    $target_dir = "assets/product/";
                    $target_file = $target_dir . basename($_FILES["file"]["name"]);
                    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
                    $idata['img'] = $target_file;
                } else if (isset($_POST['hiddenFilePath'])) {

                    $idata['img'] = $_POST['hiddenFilePath'];
                } else {
                    $idata['img'] = NULL;
                }

                $idata['created'] = date('Y-m-d H:i:s');

                if ($id) {
                    $this->db->where('id', $id);
                    $success = $this->db->update('tbl_inventory', $idata);
                } else {
                    $success = $this->db->insert('tbl_inventory', $idata);
                }
                if ($success) {
                    if ($_GET['redirect']) {
                        $encrypted = $_GET['redirect'];
                        $url = base64_decode($encrypted);
                        echo "<script>window.close();</script>";
                    } else {
                        $this->session->set_flashdata('success', 'Updated Successfully');
                        redirect(base_url() . 'inventory/inventory');
                    }
                }
            }
        }

        if ($id) {
            $data['panelTitle'] = 'Update Inventory';
            $data['this_element'] = $this->Inventory_M->getSingleRow('tbl_inventory', 'id', $id);
        } else {
            $data['panelTitle'] = 'Add Inventory';
        }
        $data['manufac'] = $this->Common_M->get('tbl_manufactures', 'created', 'DESC', 'client_id', $client_id);
        $data['brand'] = $this->Common_M->get('tbl_brands', 'created', 'DESC', 'client_id', $client_id);

        $query = $this->db->query("select * from tbl_account_types where client_id='" . $client_id . "' and type='2' order by name ASC");
        $data['purchdropdn'] = $query->result_array();
        $query = $this->db->query("select * from tbl_account_types where client_id='" . $client_id . "' and type='1' order by name ASC");
        $data['saledrpdn'] = $query->result_array();

        $data['accounts'] = $this->Common_M->get('tbl_accounts', 'name', 'ASC');
        $data['_URL_add_inventory'] = base64_encode('inventory/add_inventory');
        $data['clients'] = $this->Common_M->get('tbl_clients', 'business_name', 'ASC');
        $data['terms'] = $this->Common_M->get('tbl_terms', 'created', 'ASC');
        $data['vendors'] = $this->Common_M->get('tbl_vendors', 'created', 'DESC', 'client_id', $client_id);
        $data['groupitme'] = $this->Common_M->get('tbl_group_items', 'created', 'DESC', 'client_id', $client_id);

        if ($seuserdata['actype'] == 3) {
            $data['subview'] = 'inventory/add_inventory';
        } else if ($seuserdata['actype'] == 2) {
            $data['subview'] = 'inventory/add_inventory';
        } else {
            $data['subview'] = 'inventory/client_add_inventory';
        }

        $this->load->view('clients/common/_layout_admin', $data);
    }

    public function main_inventory($id = NULL) {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }

        if($this->session->userdata('client')['parent_id']==0){
            $client_id = $this->session->userdata('client')['id'];
        }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']);
        }

        if ($_GET['serachfor']) {
            $data['searchfor'] = urldecode($_GET['serachfor']);
        }

        $query = $this->db->query("SELECT tbl_inventory.*,tbl_vendors.name as vname,tbl_brands.name as bname,tbl_group_items.title as gropitem FROM tbl_inventory left join tbl_vendors on tbl_inventory.vendor_id=tbl_vendors.id left join tbl_brands on tbl_inventory.brand=tbl_brands.id left join tbl_group_items on tbl_inventory.grp_id=tbl_group_items.gt_id WHERE tbl_inventory.client_id='" . $client_id . "' AND tbl_inventory.parents='0' AND tbl_inventory.ptype='1' order by id desc");
        $data['inventory'] = $query->result();

        $data['panelTitle'] = 'Inventory';
        $data['subview'] = 'inventory/main-inventory';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function client_inventory($id = NULL) {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }

        if($this->session->userdata('client')['parent_id']==0){
            $client_id = $this->session->userdata('client')['id'];
        }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']);
        }

        if ($_GET['serachfor']) {
            $data['searchfor'] = urldecode($_GET['serachfor']);
        }

        $data['inventory'] = $this->Inventory_M->get('tbl_inventory', 'id', 'DESC', 'client_id', $client_id);

        $data['panelTitle'] = 'Inventory';
        $data['subview'] = 'inventory/client-inventory';
        $this->load->view('clients/common/_layout_admin', $data);
    }

    public function import_inventory($id = NULL) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }


        $data['subview'] = 'inventory/import';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function group_items($id = NULL) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
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



        if ($_GET['serachfor']) {
            $data['searchfor'] = urldecode($_GET['serachfor']);
        }

        $query = $this->db->query("SELECT * FROM tbl_group_items WHERE client_id='" . $client_id . "'");
        $data['inventory'] = $query->result();

        $data['panelTitle'] = 'Group Items';
        $data['subview'] = 'inventory/group-items';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    /* public function add_group_items($id=NULL){

      $parentid="";
      if($_POST){
      //echo "<pre>"; print_r($_POST); exit;
      $idata['client_id']=($this->session->userdata('client')['id']) ?? $_POST['client_id'];
      $idata['title']=$_POST['title'];
      $idata['sku']=$_POST['sku'];
      $idata['type']=$_POST['type'];
      $idata['unit']=$_POST['unit'];
      $idata['ptype']=2;
      $idata['parents']=0;
      $idata['brand']=$_POST['brand'];
      $idata['dim']=$_POST['dim'];
      $idata['weight']=$_POST['Weight'];
      $idata['manufacturer']=$_POST['manufacturer'];
      $idata['saccount']=$_POST['saccount'];
      $idata['paccount']=$_POST['paccount'];
      $idata['inv_acc']=$_POST['inv_acc'];
      $idata['created']=date('Y-m-d H:i:s');
      $idata['attr']=implode(',',$_POST['attribute']);
      if(isset($_FILES['file']) && $_FILES["file"]["name"]!=""){
      $target_dir = "assets/product/";
      $target_file = $target_dir . basename($_FILES["file"]["name"]);
      //$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
      $idata['img']=$target_file;
      } else if(isset($_POST['hiddenFilePath'])){
      $idata['img']=$_POST['hiddenFilePath'];
      }else{
      $idata['img']=NULL;
      }


      if($id){
      //echo $id;exit();
      $this->db->where('id',$id);
      $success=$this->db->update('tbl_inventory',$idata);
      $parentid=$id;
      }else{
      $success=$this->db->insert('tbl_inventory',$idata);
      $parentid=$this->db->insert_id();
      }

      $count=count($_POST['prod']);
      for($c=0;$c<$count;$c++){
      $rdata=explode(':',$_POST['prod'][$c]['vendor']);
      $vendor_name=$rdata[0];
      $vendor_id=$rdata[1];
      $vardata=array();
      $vardata['client_id']=($this->session->userdata('client')['id']) ?? $_POST['client_id'];
      $vardata['title']=$_POST['title'];
      $vardata['sku']=$_POST['prod'][$c]['unccode'];
      $vardata['type']=$_POST['type'];
      $vardata['unit']=$_POST['unit'];
      $vardata['ptype']=2;
      $vardata['parents']=$parentid;
      $vardata['brand']=$_POST['brand'];
      $vardata['vendor_id']=$vendor_id;
      $vardata['vendor']=$vendor_name;
      $vardata['dim']=$_POST['dim'];
      $vardata['weight']=$_POST['Weight'];
      $vardata['manufacturer']=$_POST['manufacturer'];
      $vardata['UPC']=$_POST['prod'][$c]['UPC'];
      $vardata['EAN']=$_POST['prod'][$c]['EAN'];
      $vardata['MPN']=$_POST['prod'][$c]['MPN'];
      $vardata['ISBN']=$_POST['prod'][$c]['ISBN'];
      $vardata['sprice']=$_POST['prod'][$c]['sprice'];
      $vardata['saccount']=$_POST['saccount'];
      $vardata['sdesc']="";
      $vardata['pprice']=$_POST['prod'][$c]['pprice'];
      $vardata['paccount']=$_POST['paccount'];
      $vardata['pdesc']="";
      $vardata['inv_acc']=$_POST['inv_acc'];
      $vardata['op_stock']=$_POST['prod'][$c]['op_stock'];
      $vardata['rate_per_unit']=$_POST['prod'][$c]['rate_per_unit'];
      $vardata['reorder']=$_POST['prod'][$c]['reorder'];
      $vardata['created']=date('Y-m-d H:i:s');
      if(isset($_POST['prod'][$c]['attrids'])){
      $vardata['attr']=implode(',',$_POST['prod'][$c]['attrids']);
      }

      if(isset($_POST['prod'][$c]['varid'])){
      if(isset($_POST['prod'][$c]['attrids'])){
      $this->db->query("delete from tbl_inventory where parents='".$parentid."'");
      }
      $this->db->where('id',$_POST['prod'][$c]['varid']);
      $success=$this->db->update('tbl_inventory',$vardata);
      }else{
      $success=$this->db->insert('tbl_inventory',$vardata);
      }

      }

      if($success){
      if($_GET['redirect']){
      $encrypted=$_GET['redirect'];
      $url=base64_decode($encrypted);
      echo "<script>window.close();</script>";
      }else{
      $this->session->set_flashdata('success','Updated Successfully');
      redirect(base_url().'inventory/group-items');
      }
      }
      }
      if($id)
      {
      $data['panelTitle']='Update Group Items';
      $data['this_element']=$this->Inventory_M->getSingleRow('tbl_inventory','id',$id);
      $query = $this->db->query("select * from tbl_inventory where client_id='".$this->session->userdata('client')['id']."' and parents='".$id."' order by id ASC");
      $data['variation']=$query->result_array();
      }
      else
      {
      $data['panelTitle']='Add Group Items';
      }


      $client_id=$this->session->userdata('client')['id'];

      $data['manufac']=$this->Common_M->get('tbl_manufactures','created','DESC','client_id',$this->session->userdata('client')['id']);
      $data['brand']=$this->Common_M->get('tbl_brands','created','DESC','client_id',$this->session->userdata('client')['id']);

      $query = $this->db->query("select * from tbl_account_types where client_id='".$client_id."' and type='2' order by name ASC");
      $data['purchdropdn']=$query->result_array();

      $query = $this->db->query("select * from tbl_attributes where client_id='".$client_id."' and parents='0' order by id desc");
      $data['attrbute']=$query->result_array();

      $client_id=$this->session->userdata('client')['id'];
      $query = $this->db->query("select * from tbl_account_types where client_id='".$client_id."' and type='1' order by name ASC");
      $data['saledrpdn']=$query->result_array();

      $data['accounts']=$this->Common_M->get('tbl_accounts','name','ASC');
      $data['_URL_add_inventory']=base64_encode('inventory/add_inventory');
      $data['clients']=$this->Common_M->get('tbl_clients','business_name','ASC');
      $data['terms']=$this->Common_M->get('tbl_terms','created','ASC');
      $data['vendors']=$this->Common_M->get('tbl_vendors','created','DESC','client_id',$this->session->userdata('client')['id']);

      $query = $this->db->query("select id from tbl_attributes where client_id='".$client_id."'");
      $idclm=$query->result_array();
      $attrbuteid=array_column($idclm,'id');

      $query = $this->db->query("select name from tbl_attributes where client_id='".$client_id."'");
      $nameclm=$query->result_array();
      $attrbutename=array_column($nameclm,'name');
      $data['editattr']=array_combine($attrbuteid,$attrbutename);
      //$data['purchaseAccounts']=$this->Inventory_M->get('tbl_purchaseAccount','name','ASC');
      $data['subview']='inventory/add_group-items';
      $this->load->view('admin/common/_layout_admin',$data);

      } */

    public function add_group_items($id = NULL) {

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



        $idata = array();
        if ($_POST) {

            $idata['client_id'] = $client_id;
            $idata['subuser_id'] = $subuser_id;
            $idata['title'] = $_POST['title'];

            if ($id) {
                $this->db->where('gt_id', $id);
                $success = $this->db->update('tbl_group_items', $idata);
                $parentid = $id;
            } else {
                $success = $this->db->insert('tbl_group_items', $idata);
                $parentid = $this->db->insert_id();
            }

            if ($success) {
                $this->session->set_flashdata('success', 'Updated Successfully');
                redirect(base_url() . 'inventory/group-items');
            }
        }

        if ($id) {
            $data['panelTitle'] = 'Update Group Items';
            $data['this_element'] = $this->Inventory_M->getSingleRow('tbl_group_items', 'gt_id', $id);
        } else {
            $data['panelTitle'] = 'Add Group Items';
        }


        $data['subview'] = 'inventory/add_group-items';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function delete_group_items($id) {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }

        $this->db->where('gt_id', $id);
        $success = $this->db->delete('tbl_group_items');
        $this->session->set_flashdata('success', 'Item Deleted Successfully');
        redirect(base_url() . 'inventory/group-items');
    }

    public function import_group_items($id = NULL) {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }

        $data['subview'] = 'inventory/import';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function attribute($id = NULL) {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
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

        if ($_GET['serachfor']) {
            $data['searchfor'] = urldecode($_GET['serachfor']);
        }


        $data['attr'] = $this->Common_M->get('tbl_attributes', 'created', 'DESC', 'client_id', $client_id);

        $data['panelTitle'] = 'Attribute';
        $data['subview'] = 'inventory/attribute';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function add_attribute($id = NULL) {
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

            $rdata = explode(':', $_POST['vendor']);
            $vendor_name = $rdata[0];
            $vendor_id = $rdata[1];
            $idata['client_id'] = $client_id;
            $idata['subuser_id'] = $subuser_id;
            $idata['name'] = $_POST['name'];
            $idata['parents'] = $_POST['parent'];
            $idata['created'] = date('Y-m-d H:i:s');

            if ($id) {
                $this->db->where('id', $id);
                $success = $this->db->update('tbl_attributes', $idata);
            } else {
                $success = $this->db->insert('tbl_attributes', $idata);
            }

            if ($success) {
                //echo 'ok';exit();
                if ($_GET['redirect']) {
                    $encrypted = $_GET['redirect'];
                    $url = base64_decode($encrypted);
                    //echo $url;exit();
                    //redirect(base_url().$url);
                    echo "<script>window.close();</script>";
                } else {
                    //echo 'Ok';exit();
                    $this->session->set_flashdata('success', 'Updated Successfully');
                    redirect(base_url() . 'inventory/attribute');
                }
            }
        }

        if ($id) {
            $data['panelTitle'] = 'Update Inventory';
            $query = $this->db->query("SELECT * FROM tbl_attributes WHERE id='" . $id . "'");
            $data['this_element'] = $query->result();

            //echo "<pre>"; print_r($data); exit;
        } else {

            $data['panelTitle'] = 'Add Inventory';
        }


       // $client_id = $this->session->userdata('client')['id'];

        $query = $this->db->query("SELECT * FROM tbl_attributes WHERE parents='0' AND client_id='" . $client_id . "'");
        $data['allpr'] = $query->result();

        $data['subview'] = 'inventory/add_attribute';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function brand($id = NULL) {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }

        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }


        if ($_GET['serachfor']) {
            $data['searchfor'] = urldecode($_GET['serachfor']);
        }


        $data['attr'] = $this->Common_M->get('tbl_brands', 'created', 'DESC', 'client_id', $client_id);

        $data['panelTitle'] = 'Brands';
        $data['subview'] = 'inventory/brand';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function add_brand($id = NULL) {

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

            $rdata = explode(':', $_POST['vendor']);
            $vendor_name = $rdata[0];
            $vendor_id = $rdata[1];
            $idata['client_id'] = $client_id;
            $idata['subuser_id'] = $subuser_id;
            $idata['name'] = $_POST['name'];
            $idata['created'] = date('Y-m-d H:i:s');

            if (isset($_FILES['file']) && $_FILES["file"]["name"] != "") {
                $target_dir = "assets/brand/";
                $target_file = $target_dir . basename($_FILES["file"]["name"]);
                //$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
                $idata['img'] = $target_file;
            } else if (isset($_POST['hiddenFilePath'])) {

                $idata['img'] = $_POST['hiddenFilePath'];
            } else {
                $idata['img'] = NULL;
            }

            //echo "<pre>"; print_r($idata); exit;

            if ($id) {
                $this->db->where('id', $id);
                $success = $this->db->update('tbl_brands', $idata);
            } else {
                $success = $this->db->insert('tbl_brands', $idata);
            }

            if ($success) {
                //echo 'ok';exit();
                if ($_GET['redirect']) {
                    $encrypted = $_GET['redirect'];
                    $url = base64_decode($encrypted);
                    echo "<script>window.close();</script>";
                } else {
                    $this->session->set_flashdata('success', 'Updated Successfully');
                    redirect(base_url() . 'inventory/brand');
                }
            }
        }

        if ($id) {
            $data['panelTitle'] = 'Update Brand';
            $query = $this->db->query("SELECT * FROM tbl_brands WHERE id='" . $id . "'");
            $data['this_element'] = $query->result();

            //echo "<pre>"; print_r($data); exit;
        } else {

            $data['panelTitle'] = 'Add Brand';
        }


       // $client_id = $this->session->userdata('client')['id'];

        $query = $this->db->query("SELECT * FROM tbl_brands WHERE client_id='" . $client_id . "'");
        $data['allpr'] = $query->result();

        $data['subview'] = 'inventory/add_brand';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function manufacture($id = NULL) {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
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

        if ($_GET['serachfor']) {
            $data['searchfor'] = urldecode($_GET['serachfor']);
        }


        $data['attr'] = $this->Common_M->get('tbl_manufactures', 'created', 'DESC', 'client_id', $client_id);

        $data['panelTitle'] = 'Manufacture';
        $data['subview'] = 'inventory/manufacture';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function add_manufacture($id = NULL) {

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

            $rdata = explode(':', $_POST['vendor']);
            $vendor_name = $rdata[0];
            $vendor_id = $rdata[1];
            $idata['client_id'] = $client_id;
            $idata['subuser_id'] = $subuser_id;
            $idata['name'] = $_POST['name'];
            $idata['created'] = date('Y-m-d H:i:s');

            //echo "<pre>"; print_r($idata); exit;

            if ($id) {
                $this->db->where('id', $id);
                $success = $this->db->update('tbl_manufactures', $idata);
            } else {
                $success = $this->db->insert('tbl_manufactures', $idata);
            }

            if ($success) {
                //echo 'ok';exit();
                if ($_GET['redirect']) {
                    $encrypted = $_GET['redirect'];
                    $url = base64_decode($encrypted);
                    echo "<script>window.close();</script>";
                } else {
                    $this->session->set_flashdata('success', 'Updated Successfully');
                    redirect(base_url() . 'inventory/manufacture');
                }
            }
        }

        if ($id) {
            $data['panelTitle'] = 'Update Manufacture';
            $query = $this->db->query("SELECT * FROM tbl_manufactures WHERE id='" . $id . "'");
            $data['this_element'] = $query->result();

            //echo "<pre>"; print_r($data); exit;
        } else {

            $data['panelTitle'] = 'Add Manufacture';
        }


       // $client_id = $this->session->userdata('client')['id'];

        $query = $this->db->query("SELECT * FROM tbl_manufactures WHERE client_id='" . $client_id . "'");
        $data['allpr'] = $query->result();

        $data['subview'] = 'inventory/add_manufacture';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function setattribute() {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }
        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }

        $co = count($_POST['attribute']);
       // $client_id = $this->session->userdata('client')['id'];
        $vendors = $this->Common_M->get('tbl_vendors', 'created', 'DESC', 'client_id',$client_id);
        $htm = "";
        if ($co == 1) {
            $q = 0;
            $query = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][0] . "' order by name ASC");
            $atr1 = $query->result_array();
            foreach ($atr1 as $k) {
                $htm .= '<tr><td><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k["id"] . '"/>' . $k["name"] . '</td><td><input type="text" name="prod[' . $q . '][unccode]" value="" required /></td><td><input type="text" name="prod[' . $q . '][op_stock]" value="" required /></td><td><input type="text" name="prod[' . $q . '][rate_per_unit]" value="" required /></td><td><input type="text" name="prod[' . $q . '][pprice]" value="" required /></td><td><input type="text" name="prod[' . $q . '][sprice]" value="" required /></td><td><input type="text" name="prod[' . $q . '][UPC]" value="" required /></td><td><input type="text" name="prod[' . $q . '][EAN]" value="" required /></td><td><input type="text" name="prod[' . $q . '][ISBN]" value="" required /></td><td><input type="text" name="prod[' . $q . '][reorder]" value="" required /></td><td> <select onchange="openUrl(this)" name="prod[' . $q . '][vendor]"  required>';

                if ($vendors) {
                    foreach ($vendors as $key) {
                        $htm .= '<option value="' . $key->name . ':' . $key->id . '">' . $key->name . '</option>';
                    }
                } else {
                    $htm .= '<option value="" >Select vendor</option>';
                }
                $htm .= '<option value="goVendor" style="font-weight: bold">+ Add</option></select></td></tr>';

                $q++;
            }
        } else if ($co == 2) {
            $q = 0;
            $query = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][0] . "' order by name ASC");
            $atr1 = $query->result_array();

            $query1 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][1] . "' order by name ASC");
            $atr2 = $query1->result_array();

            foreach ($atr1 as $k) {
                foreach ($atr2 as $k2) {
                    $htm .= '<tr><td><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k2["id"] . '"/>' . $k["name"] . '-' . $k2["name"] . '</td><td><input type="text" name="prod[' . $q . '][unccode]" value="" required /></td><td><input type="text" name="prod[' . $q . '][op_stock]" value="" required /></td><td><input type="text" name="prod[' . $q . '][rate_per_unit]" value="" required /></td><td><input type="text" name="prod[' . $q . '][pprice]" value="" required /></td><td><input type="text" name="prod[' . $q . '][sprice]" value="" required /></td><td><input type="text" name="prod[' . $q . '][UPC]" value="" required /></td><td><input type="text" name="prod[' . $q . '][EAN]" value="" required /></td><td><input type="text" name="prod[' . $q . '][ISBN]" value="" required /></td><td><input type="text" name="prod[' . $q . '][reorder]" value="" required /></td><td> <select onchange="openUrl(this)" name="prod[' . $q . '][vendor]"  required>';

                    if ($vendors) {
                        foreach ($vendors as $key) {
                            $htm .= '<option value="' . $key->name . ':' . $key->id . '">' . $key->name . '</option>';
                        }
                    } else {
                        $htm .= '<option value="" >Select vendor</option>';
                    }
                    $htm .= '<option value="goVendor" style="font-weight: bold">+ Add</option></select></td></tr>';

                    $q++;
                }
            }
        } else if ($co == 3) {
            $q = 0;
            $query = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][0] . "' order by name ASC");
            $atr1 = $query->result_array();

            $query1 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][1] . "' order by name ASC");
            $atr2 = $query1->result_array();

            $query2 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][2] . "' order by name ASC");
            $atr3 = $query2->result_array();

            foreach ($atr1 as $k) {
                foreach ($atr2 as $k2) {
                    foreach ($atr3 as $k3) {

                        $htm .= '<tr><td><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k2["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k3["id"] . '"/>' . $k["name"] . '-' . $k2["name"] . '-' . $k3["name"] . '</td><td><input type="text" name="prod[' . $q . '][unccode]" value="" required /></td><td><input type="text" name="prod[' . $q . '][op_stock]" value="" required /></td><td><input type="text" name="prod[' . $q . '][rate_per_unit]" value="" required /></td><td><input type="text" name="prod[' . $q . '][pprice]" value="" required /></td><td><input type="text" name="prod[' . $q . '][sprice]" value="" required /></td><td><input type="text" name="prod[' . $q . '][UPC]" value="" required /></td><td><input type="text" name="prod[' . $q . '][EAN]" value="" required /></td><td><input type="text" name="prod[' . $q . '][ISBN]" value="" required /></td><td><input type="text" name="prod[' . $q . '][reorder]" value="" required /></td><td> <select onchange="openUrl(this)" name="prod[' . $q . '][vendor]"  required>';

                        if ($vendors) {
                            foreach ($vendors as $key) {
                                $htm .= '<option value="' . $key->name . ':' . $key->id . '">' . $key->name . '</option>';
                            }
                        } else {
                            $htm .= '<option value="" >Select vendor</option>';
                        }
                        $htm .= '<option value="goVendor" style="font-weight: bold">+ Add</option></select></td></tr>';

                        $q++;
                    }
                }
            }
        } else if ($co == 4) {
            $q = 0;
            $query = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][0] . "' order by name ASC");
            $atr1 = $query->result_array();

            $query1 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][1] . "' order by name ASC");
            $atr2 = $query1->result_array();

            $query2 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][2] . "' order by name ASC");
            $atr3 = $query2->result_array();

            $query3 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][3] . "' order by name ASC");
            $atr4 = $query3->result_array();

            foreach ($atr1 as $k) {
                foreach ($atr2 as $k2) {
                    foreach ($atr3 as $k3) {
                        foreach ($atr4 as $k4) {
                            $htm .= '<tr><td><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k2["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k3["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k4["id"] . '"/>' . $k["name"] . '-' . $k2["name"] . '-' . $k3["name"] . '-' . $k4["name"] . '</td><td><input type="text" name="prod[' . $q . '][unccode]" value="" required /></td><td><input type="text" name="prod[' . $q . '][op_stock]" value="" required /></td><td><input type="text" name="prod[' . $q . '][rate_per_unit]" value="" required /></td><td><input type="text" name="prod[' . $q . '][pprice]" value="" required /></td><td><input type="text" name="prod[' . $q . '][sprice]" value="" required /></td><td><input type="text" name="prod[' . $q . '][UPC]" value="" required /></td><td><input type="text" name="prod[' . $q . '][EAN]" value="" required /></td><td><input type="text" name="prod[' . $q . '][ISBN]" value="" required /></td><td><input type="text" name="prod[' . $q . '][reorder]" value="" required /></td><td> <select onchange="openUrl(this)" name="prod[' . $q . '][vendor]"  required>';

                            if ($vendors) {
                                foreach ($vendors as $key) {
                                    $htm .= '<option value="' . $key->name . ':' . $key->id . '">' . $key->name . '</option>';
                                }
                            } else {
                                $htm .= '<option value="" >Select vendor</option>';
                            }
                            $htm .= '<option value="goVendor" style="font-weight: bold">+ Add</option></select></td></tr>';

                            $q++;
                        }
                    }
                }
            }
        } else if ($co == 5) {
            $q = 0;
            $query = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][0] . "' order by name ASC");
            $atr1 = $query->result_array();

            $query1 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][1] . "' order by name ASC");
            $atr2 = $query1->result_array();

            $query2 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][2] . "' order by name ASC");
            $atr3 = $query2->result_array();

            $query3 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][3] . "' order by name ASC");
            $atr4 = $query3->result_array();

            $query5 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][4] . "' order by name ASC");
            $atr5 = $query5->result_array();

            foreach ($atr1 as $k) {
                foreach ($atr2 as $k2) {
                    foreach ($atr3 as $k3) {
                        foreach ($atr4 as $k4) {
                            foreach ($atr5 as $k5) {
                                $htm .= '<tr><td><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k2["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k3["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k4["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k5["id"] . '"/>' . $k["name"] . '-' . $k2["name"] . '-' . $k3["name"] . '-' . $k4["name"] . '-' . $k5["name"] . '</td><td><input type="text" name="prod[' . $q . '][unccode]" value="" required /></td><td><input type="text" name="prod[' . $q . '][op_stock]" value="" required /></td><td><input type="text" name="prod[' . $q . '][rate_per_unit]" value="" required /></td><td><input type="text" name="prod[' . $q . '][pprice]" value="" required /></td><td><input type="text" name="prod[' . $q . '][sprice]" value="" required /></td><td><input type="text" name="prod[' . $q . '][UPC]" value="" required /></td><td><input type="text" name="prod[' . $q . '][EAN]" value="" required /></td><td><input type="text" name="prod[' . $q . '][ISBN]" value="" required /></td><td><input type="text" name="prod[' . $q . '][reorder]" value="" required /></td><td> <select onchange="openUrl(this)" name="prod[' . $q . '][vendor]"  required>';

                                if ($vendors) {
                                    foreach ($vendors as $key) {
                                        $htm .= '<option value="' . $key->name . ':' . $key->id . '">' . $key->name . '</option>';
                                    }
                                } else {
                                    $htm .= '<option value="" >Select vendor</option>';
                                }
                                $htm .= '<option value="goVendor" style="font-weight: bold">+ Add</option></select></td></tr>';

                                $q++;
                            }
                        }
                    }
                }
            }
        } else if ($co == 6) {
            $q = 0;
            $query = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][0] . "' order by name ASC");
            $atr1 = $query->result_array();

            $query1 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][1] . "' order by name ASC");
            $atr2 = $query1->result_array();

            $query2 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][2] . "' order by name ASC");
            $atr3 = $query2->result_array();

            $query3 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][3] . "' order by name ASC");
            $atr4 = $query3->result_array();

            $query5 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][4] . "' order by name ASC");
            $atr5 = $query5->result_array();

            $query6 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][5] . "' order by name ASC");
            $atr6 = $query6->result_array();

            foreach ($atr1 as $k) {
                foreach ($atr2 as $k2) {
                    foreach ($atr3 as $k3) {
                        foreach ($atr4 as $k4) {
                            foreach ($atr5 as $k5) {
                                foreach ($atr6 as $k6) {
                                    $htm .= '<tr><td><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k2["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k3["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k4["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k5["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k6["id"] . '"/>' . $k["name"] . '-' . $k2["name"] . '-' . $k3["name"] . '-' . $k4["name"] . '-' . $k5["name"] . '-' . $k6["name"] . '</td><td><input type="text" name="prod[' . $q . '][unccode]" value="" required /></td><td><input type="text" name="prod[' . $q . '][op_stock]" value="" required /></td><td><input type="text" name="prod[' . $q . '][rate_per_unit]" value="" required /></td><td><input type="text" name="prod[' . $q . '][pprice]" value="" required /></td><td><input type="text" name="prod[' . $q . '][sprice]" value="" required /></td><td><input type="text" name="prod[' . $q . '][UPC]" value="" required /></td><td><input type="text" name="prod[' . $q . '][EAN]" value="" required /></td><td><input type="text" name="prod[' . $q . '][ISBN]" value="" required /></td><td><input type="text" name="prod[' . $q . '][reorder]" value="" required /></td><td> <select onchange="openUrl(this)" name="prod[' . $q . '][vendor]"  required>';

                                    if ($vendors) {
                                        foreach ($vendors as $key) {
                                            $htm .= '<option value="' . $key->name . ':' . $key->id . '">' . $key->name . '</option>';
                                        }
                                    } else {
                                        $htm .= '<option value="" >Select vendor</option>';
                                    }
                                    $htm .= '<option value="goVendor" style="font-weight: bold">+ Add</option></select></td></tr>';

                                    $q++;
                                }
                            }
                        }
                    }
                }
            }
        } else if ($co == 7) {
            $q = 0;
            $query = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][0] . "' order by name ASC");
            $atr1 = $query->result_array();

            $query1 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][1] . "' order by name ASC");
            $atr2 = $query1->result_array();

            $query2 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][2] . "' order by name ASC");
            $atr3 = $query2->result_array();

            $query3 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][3] . "' order by name ASC");
            $atr4 = $query3->result_array();

            $query5 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][4] . "' order by name ASC");
            $atr5 = $query5->result_array();

            $query6 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][5] . "' order by name ASC");
            $atr6 = $query6->result_array();

            $query7 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][6] . "' order by name ASC");
            $atr7 = $query7->result_array();

            foreach ($atr1 as $k) {
                foreach ($atr2 as $k2) {
                    foreach ($atr3 as $k3) {
                        foreach ($atr4 as $k4) {
                            foreach ($atr5 as $k5) {
                                foreach ($atr6 as $k6) {
                                    foreach ($atr7 as $k7) {
                                        $htm .= '<tr><td><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k2["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k3["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k4["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k5["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k6["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k7["id"] . '"/>' . $k["name"] . '-' . $k2["name"] . '-' . $k3["name"] . '-' . $k4["name"] . '-' . $k5["name"] . '-' . $k6["name"] . '-' . $k7["name"] . '</td><td><input type="text" name="prod[' . $q . '][unccode]" value="" required /></td><td><input type="text" name="prod[' . $q . '][op_stock]" value="" required /></td><td><input type="text" name="prod[' . $q . '][rate_per_unit]" value="" required /></td><td><input type="text" name="prod[' . $q . '][pprice]" value="" required /></td><td><input type="text" name="prod[' . $q . '][sprice]" value="" required /></td><td><input type="text" name="prod[' . $q . '][UPC]" value="" required /></td><td><input type="text" name="prod[' . $q . '][EAN]" value="" required /></td><td><input type="text" name="prod[' . $q . '][ISBN]" value="" required /></td><td><input type="text" name="prod[' . $q . '][reorder]" value="" required /></td><td> <select onchange="openUrl(this)" name="prod[' . $q . '][vendor]"  required>';

                                        if ($vendors) {
                                            foreach ($vendors as $key) {
                                                $htm .= '<option value="' . $key->name . ':' . $key->id . '">' . $key->name . '</option>';
                                            }
                                        } else {
                                            $htm .= '<option value="" >Select vendor</option>';
                                        }
                                        $htm .= '<option value="goVendor" style="font-weight: bold">+ Add</option></select></td></tr>';

                                        $q++;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        } else if ($co == 8) {
            $q = 0;
            $query = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][0] . "' order by name ASC");
            $atr1 = $query->result_array();

            $query1 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][1] . "' order by name ASC");
            $atr2 = $query1->result_array();

            $query2 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][2] . "' order by name ASC");
            $atr3 = $query2->result_array();

            $query3 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][3] . "' order by name ASC");
            $atr4 = $query3->result_array();

            $query5 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][4] . "' order by name ASC");
            $atr5 = $query5->result_array();

            $query6 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][5] . "' order by name ASC");
            $atr6 = $query6->result_array();

            $query7 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][6] . "' order by name ASC");
            $atr7 = $query7->result_array();

            $query8 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][7] . "' order by name ASC");
            $atr8 = $query8->result_array();

            foreach ($atr1 as $k) {
                foreach ($atr2 as $k2) {
                    foreach ($atr3 as $k3) {
                        foreach ($atr4 as $k4) {
                            foreach ($atr5 as $k5) {
                                foreach ($atr6 as $k6) {
                                    foreach ($atr7 as $atr7) {
                                        foreach ($atr8 as $k8) {
                                            $htm .= '<tr><td><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k2["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k3["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k4["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k5["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k6["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k7["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k8["id"] . '"/>' . $k["name"] . '-' . $k2["name"] . '-' . $k3["name"] . '-' . $k4["name"] . '-' . $k5["name"] . '-' . $k6["name"] . '-' . $k7["name"] . '-' . $k8["name"] . '</td><td><input type="text" name="prod[' . $q . '][unccode]" value="" required /></td><td><input type="text" name="prod[' . $q . '][op_stock]" value="" required /></td><td><input type="text" name="prod[' . $q . '][rate_per_unit]" value="" required /></td><td><input type="text" name="prod[' . $q . '][pprice]" value="" required /></td><td><input type="text" name="prod[' . $q . '][sprice]" value="" required /></td><td><input type="text" name="prod[' . $q . '][UPC]" value="" required /></td><td><input type="text" name="prod[' . $q . '][EAN]" value="" required /></td><td><input type="text" name="prod[' . $q . '][ISBN]" value="" required /></td><td><input type="text" name="prod[' . $q . '][reorder]" value="" required /></td><td> <select onchange="openUrl(this)" name="prod[' . $q . '][vendor]"  required>';

                                            if ($vendors) {
                                                foreach ($vendors as $key) {
                                                    $htm .= '<option value="' . $key->name . ':' . $key->id . '">' . $key->name . '</option>';
                                                }
                                            } else {
                                                $htm .= '<option value="" >Select vendor</option>';
                                            }
                                            $htm .= '<option value="goVendor" style="font-weight: bold">+ Add</option></select></td></tr>';

                                            $q++;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        } else if ($co == 9) {
            $q = 0;
            $query = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][0] . "' order by name ASC");
            $atr1 = $query->result_array();

            $query1 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][1] . "' order by name ASC");
            $atr2 = $query1->result_array();

            $query2 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][2] . "' order by name ASC");
            $atr3 = $query2->result_array();

            $query3 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][3] . "' order by name ASC");
            $atr4 = $query3->result_array();

            $query5 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][4] . "' order by name ASC");
            $atr5 = $query5->result_array();

            $query6 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][5] . "' order by name ASC");
            $atr6 = $query6->result_array();

            $query7 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][6] . "' order by name ASC");
            $atr7 = $query7->result_array();

            $query8 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][7] . "' order by name ASC");
            $atr8 = $query8->result_array();

            $query9 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][8] . "' order by name ASC");
            $atr9 = $query9->result_array();

            foreach ($atr1 as $k) {
                foreach ($atr2 as $k2) {
                    foreach ($atr3 as $k3) {
                        foreach ($atr4 as $k4) {
                            foreach ($atr5 as $k5) {
                                foreach ($atr6 as $k6) {
                                    foreach ($atr7 as $atr7) {
                                        foreach ($atr8 as $k8) {
                                            foreach ($atr9 as $k9) {
                                                $htm .= '<tr><td><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k2["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k3["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k4["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k5["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k6["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k7["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k8["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k9["id"] . '"/>' . $k["name"] . '-' . $k2["name"] . '-' . $k3["name"] . '-' . $k4["name"] . '-' . $k5["name"] . '-' . $k6["name"] . '-' . $k7["name"] . '-' . $k8["name"] . '-' . $k9["name"] . '</td><td><input type="text" name="prod[' . $q . '][unccode]" value="" required /></td><td><input type="text" name="prod[' . $q . '][op_stock]" value="" required /></td><td><input type="text" name="prod[' . $q . '][rate_per_unit]" value="" required /></td><td><input type="text" name="prod[' . $q . '][pprice]" value="" required /></td><td><input type="text" name="prod[' . $q . '][sprice]" value="" required /></td><td><input type="text" name="prod[' . $q . '][UPC]" value="" required /></td><td><input type="text" name="prod[' . $q . '][EAN]" value="" required /></td><td><input type="text" name="prod[' . $q . '][ISBN]" value="" required /></td><td><input type="text" name="prod[' . $q . '][reorder]" value="" required /></td><td> <select onchange="openUrl(this)" name="prod[' . $q . '][vendor]"  required>';

                                                if ($vendors) {
                                                    foreach ($vendors as $key) {
                                                        $htm .= '<option value="' . $key->name . ':' . $key->id . '">' . $key->name . '</option>';
                                                    }
                                                } else {
                                                    $htm .= '<option value="" >Select vendor</option>';
                                                }
                                                $htm .= '<option value="goVendor" style="font-weight: bold">+ Add</option></select></td></tr>';

                                                $q++;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        } else if ($co == 10) {
            $q = 0;
            $query = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][0] . "' order by name ASC");
            $atr1 = $query->result_array();

            $query1 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][1] . "' order by name ASC");
            $atr2 = $query1->result_array();

            $query2 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][2] . "' order by name ASC");
            $atr3 = $query2->result_array();

            $query3 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][3] . "' order by name ASC");
            $atr4 = $query3->result_array();

            $query5 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][4] . "' order by name ASC");
            $atr5 = $query5->result_array();

            $query6 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][5] . "' order by name ASC");
            $atr6 = $query6->result_array();

            $query7 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][6] . "' order by name ASC");
            $atr7 = $query7->result_array();

            $query8 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][7] . "' order by name ASC");
            $atr8 = $query8->result_array();

            $query9 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][8] . "' order by name ASC");
            $atr9 = $query9->result_array();

            $query10 = $this->db->query("select * from tbl_attributes where client_id='" . $client_id . "' and parents='" . $_POST['attribute'][9] . "' order by name ASC");
            $atr10 = $query10->result_array();

            foreach ($atr1 as $k) {
                foreach ($atr2 as $k2) {
                    foreach ($atr3 as $k3) {
                        foreach ($atr4 as $k4) {
                            foreach ($atr5 as $k5) {
                                foreach ($atr6 as $k6) {
                                    foreach ($atr7 as $atr7) {
                                        foreach ($atr8 as $k8) {
                                            foreach ($atr9 as $k9) {
                                                foreach ($atr10 as $k10) {
                                                    $htm .= '<tr><td><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k2["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k3["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k4["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k5["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k6["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k7["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k8["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k9["id"] . '"/><input type="hidden" name="prod[' . $q . '][attrids][]" value="' . $k10["id"] . '"/>' . $k["name"] . '-' . $k2["name"] . '-' . $k3["name"] . '-' . $k4["name"] . '-' . $k5["name"] . '-' . $k6["name"] . '-' . $k7["name"] . '-' . $k8["name"] . '-' . $k9["name"] . '-' . $k10["name"] . '</td><td><input type="text" name="prod[' . $q . '][unccode]" value="" required /></td><td><input type="text" name="prod[' . $q . '][op_stock]" value="" required /></td><td><input type="text" name="prod[' . $q . '][rate_per_unit]" value="" required /></td><td><input type="text" name="prod[' . $q . '][pprice]" value="" required /></td><td><input type="text" name="prod[' . $q . '][sprice]" value="" required /></td><td><input type="text" name="prod[' . $q . '][UPC]" value="" required /></td><td><input type="text" name="prod[' . $q . '][EAN]" value="" required /></td><td><input type="text" name="prod[' . $q . '][ISBN]" value="" required /></td><td><input type="text" name="prod[' . $q . '][reorder]" value="" required /></td><td> <select onchange="openUrl(this)" name="prod[' . $q . '][vendor]"  required>';

                                                    if ($vendors) {
                                                        foreach ($vendors as $key) {
                                                            $htm .= '<option value="' . $key->name . ':' . $key->id . '">' . $key->name . '</option>';
                                                        }
                                                    } else {
                                                        $htm .= '<option value="" >Select vendor</option>';
                                                    }
                                                    $htm .= '<option value="goVendor" style="font-weight: bold">+ Add</option></select></td></tr>';

                                                    $q++;
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        } else {
            
        }

        echo json_encode($htm);
    }

    public function bom($id = NULL) {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }


        if($this->session->userdata('client')['parent_id']==0){
            $client_id = ($this->session->userdata('client')['id']) ?? $_POST['client_id'];
            }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']) ?? $_POST['client_id'];
            }
       
        if ($_GET['serachfor']) {
            $data['searchfor'] = urldecode($_GET['serachfor']);
        }

        $query = $this->db->query("SELECT * FROM tbl_inventory where client_id='" . $client_id . "' AND inv_acc='Finished Goods' order by created DESC");
        $data['bom'] = $query->result();

        $query = $this->db->query("SELECT * FROM tbl_inventory where client_id='" . $client_id . "' AND inv_acc='Raw Material' order by created DESC");
        $data['raw'] = $query->result();

        //$data['bom']=$this->Common_M->get('tbl_boms','created','DESC','client_id',$client_id); 

        $data['panelTitle'] = 'BOM';
        $data['subview'] = 'rawmaterial/bom';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    public function add_bom($id = NULL) {
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

            //echo "<pre>"; print_r($_POST); exit;

            $idata['client_id'] = $client_id;
            $idata['subuser_id'] = $subuser_id;
            $idata['title'] = $_POST['title'];
            $idata['price'] = $_POST['price'];
            $idata['created'] = date('Y-m-d H:i:s');

            if ($id) {
                $this->db->where('id', $id);
                $success = $this->db->update('tbl_boms', $idata);
                $this->db->query("delete from tbl_sub_boms where bom_id='" . $id . "'");
                foreach ($_POST['rawdata'] as $l) {
                    $ldata['client_id'] = $client_id;
                    $idata['subuser_id'] = $subuser_id;
                    $ldata['bom_id'] = $id;
                    $ldata['stitle'] = $l['rawname'];
                    $ldata['sprice'] = $l['price'];
                    $ldata['created'] = date('Y-m-d H:i:s');
                    $success = $this->db->insert('tbl_sub_boms', $ldata);
                }
            } else {
                $success = $this->db->insert('tbl_boms', $idata);
                $insert_id = $this->db->insert_id();

                foreach ($_POST['rawdata'] as $l) {
                    $ldata['client_id'] = $client_id;
                    $idata['subuser_id'] = $subuser_id;
                    $ldata['bom_id'] = $insert_id;
                    $ldata['stitle'] = $l['rawname'];
                    $ldata['sprice'] = $l['price'];
                    $ldata['created'] = date('Y-m-d H:i:s');
                    $success = $this->db->insert('tbl_sub_boms', $ldata);
                }
            }

            if ($success) {
                $this->session->set_flashdata('success', 'Updated Successfully');
                redirect(base_url() . 'inventory/bom');
            }
        }

        if ($id) {
            $data['panelTitle'] = 'Update Manufacture';
            $query = $this->db->query("SELECT * FROM tbl_boms WHERE id='" . $id . "'");
            $data['this_element'] = $query->result();

            $query = $this->db->query("SELECT * FROM tbl_sub_boms WHERE bom_id='" . $id . "'");
            $data['subbom'] = $query->result();
        } else {

            $data['panelTitle'] = 'Add Manufacture';
        }


        //$client_id = $this->session->userdata('client')['id'];

        $query = $this->db->query("SELECT * FROM tbl_inventory WHERE client_id='" . $client_id . "' AND inv_acc='Finished Goods'");
        $data['allpr'] = $query->result();

        $data['subview'] = 'rawmaterial/add_bom';
        $this->load->view('admin/common/_layout_admin', $data);
    }

    function bom_price() {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }

        $query = $this->db->query("SELECT * FROM tbl_inventory where id='" . $_POST['id'] . "'");
        $prc = $query->result();
        //echo "<pre>"; print_r($prc);
        echo json_encode($prc[0]->sprice);
    }
}

?>