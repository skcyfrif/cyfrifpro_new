<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller 
{

	function __construct(){
	
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");

        $this->load->model('Main_M');
        $this->load->model('Admin_M');
        $this->load->model('Common_M');
        $this->load->model('Employee_M');
    }
	
	public function index(){
    
        //$this->load->view('admin/careers');
        if($this->Admin_M->isLoggedIn() != TRUE && $this->Employee_M->isLoggedIn() != TRUE){
            redirect(base_url()."admin/login");
        }
		
        $data['index']=$this->Admin_M->get('tbl_product_account_types','created','DESC');
        $data['panelTitle']='Product Acoount';
        $data['subview']='admin/account/index';
        $this->load->view('admin/common/_layout_admin',$data);
    }
	
	public function add_product_account($id=NULL){
        if($_POST){
           
            $formData['name']=$_POST['name'];
            $formData['type']=$_POST['type'];
            $formData['status']=$_POST['status'];            
			
            if($id){               
                $this->db->where('id',$id);
                $success=$this->db->update('tbl_product_account_types',$formData);
            }else{               
                $success=$this->db->insert('tbl_product_account_types',$formData);
            }
            
            $this->session->set_flashdata('success','Updated Successfully');
            redirect(base_url()."admin/account");
        }
		
        if($id){
            $data['this_element']=$this->Common_M->getSingleRow('tbl_product_account_types','id',$id);
            $data['panelTitle']='Update Product Account';
        } else {
            $data['panelTitle']='Add Product Account';
        }        
        $data['subview']='admin/account/add_product_account';
        $this->load->view('admin/common/_layout_admin',$data);

    }
	
	public function ajax_product_account($id=NULL){
	
       
           
            $formData['name']=$_POST['name'];
            $formData['type']=$_POST['type'];
            $formData['status']=$_POST['status'];            
			             
            $success=$this->db->insert('tbl_product_account_types',$formData);
            
            
       
            
       

    }


}	