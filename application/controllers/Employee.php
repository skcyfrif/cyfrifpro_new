<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();

        date_default_timezone_set("Asia/Kolkata");

        $this->load->model('Main_M');
        $this->load->model('Admin_M');
        $this->load->model('Common_M');
        $this->load->model('Employee_M');
    }
    public function index()
    {
        redirect(base_url()."employee/login");
    }
    public function dashboard()
    {
        //var_dump($this->Admin_M->isLoggedIn());exit();

        if($this->Employee_M->isLoggedIn() != TRUE)
        {
            redirect(base_url()."employee/login");
        }
        $data['panelTitle']='Dashboard';
        $data['subview']='admin/dashboard';
        $this->load->view('admin/common/_layout_admin',$data);
    }
    public function login()
    {
        if($this->Employee_M->isLoggedIn() == TRUE)
        {
            redirect(base_url()."employee/dashboard");
        } 
        //$this->session->sess_destroy();
        if($_POST)
        {
            // echo '<pre>';
            //print_r($_POST);exit();
            $email=$this->db->escape_str($_POST['email']);
            //echo md5($this->input->post('password'));
            $password=md5($this->db->escape($this->input->post('password')));
            //$password = md5($this->input->post('password'));
            //echo $password;
            //echo $email;echo $password;exit();
            $success=$this->Employee_M->login($email,$password);
            //var_dump($success);exit();
            if($success == TRUE)
            {
                //var_dump($success);exit();
                redirect(base_url()."employee/dashboard");//$this->dashboard();
                //echo '<script type="text/javascript">window.location="'.base_url().'admin/dashboard";</script>';
            }
            else
            {
                $this->session->set_flashdata('error','Incorrect Credenetials');
                redirect(base_url()."employee/login");
            }
        }
        $this->load->view('admin/login');
    }
    public function logout()
    {
         $this->session->sess_destroy();
         redirect(base_url()."employee/login");
    }
    public function add_details($Id=NULL)
    {
        if($this->Employee_M->isLoggedIn() != TRUE)
        {
            redirect(base_url()."employee/login");
        } 
        $id=($this->session->userdata('employee')['id']) ?? $Id;
        if($_POST)
        {
            $formData['name']=$_POST['name'];
            //$formData['email']=$_POST['email'];
            $formData['mobile']=$_POST['mobile'];
            $formData['emg_mobile']=$_POST['emg_mobile'];
            $formData['dob']=$_POST['dob'];
            $formData['father_name']=$_POST['father_name'];
            $formData['current_address']=$_POST['current_address'];
            $formData['permanent_address']=$_POST['permanent_address'];
            $formData['father_occupation']=$_POST['father_occupation'];
            $formData['siblings']=$_POST['siblings'];
            $formData['mother_name']=$_POST['mother_name'];
            $formData['adhar_number']=$_POST['adhar_number'];
            $formData['pan_number']=$_POST['pan_number'];
            $formData['passport_number']=$_POST['passport_number'];
            $formData['driving_license']=$_POST['driving_license'];
            if($id)
            {
                $this->db->where('id',$id);
                $success=$this->db->update('tbl_employees',$formData);
                $employee_id=$id;
            }
            else
            {
                $success=$this->db->insert('tbl_employees',$formData);
                $employee_id=$this->db->insert_id();
            }
            
            if($success)
            {
                if(isset($_POST['company']))
                {
                    // echo '<pre>';
                    // print_r($_POST);exit();
                    $this->db->where('employee_id',$employee_id);
                    $this->db->delete('tbl_employee_proffessional_details');
                    for ($i=0;$i<count($_POST['company']);$i++)
                    {
                        $ProData=array(
                            'employee_id' => $employee_id, 
                            'company' => $_POST['company'][$i], 
                            'start_date' => $_POST['start_date'][$i], 
                            'end_date' => $_POST['end_date'][$i],
                            'salary' => $_POST['salary'][$i],
                            'created'=>date('Y-m-d H:i:s')
                        );
                        $ok=$this->db->insert('tbl_employee_proffessional_details',$ProData);
                        //$this->db->last_query();exit();
                    }
                }
                if(isset($_POST['degree']))
                {

                    $this->db->where('employee_id',$employee_id);
                    $this->db->delete('tbl_employee_educational_details');
                    for ($i=0;$i<count($_POST['degree']);$i++)
                    {
                        $EduData=array(
                            'employee_id' => $employee_id, 
                            'degree' => $_POST['degree'][$i],
                            'doneFrom' => $_POST['doneFrom'][$i],
                            'yop' => $_POST['yop'][$i],
                            'marks' => $_POST['marks'][$i],
                            'created'=>date('Y-m-d H:i:s')
                        );
                        $ok=$this->db->insert('tbl_employee_educational_details',$EduData);
                    }
                }
                if($ok)
                {
                    redirect(base_url()."employee/add_details");
                }
            }
        }
        if($id)
        {
            $data['this_element']=$this->Common_M->getSingleRow('tbl_employees','id',$id);
            $data['edu_details']=$this->Common_M->get('tbl_employee_educational_details','created','DESC','employee_id',$id);
            $data['pro_details']=$this->Common_M->get('tbl_employee_proffessional_details','created','DESC','employee_id',$id);
        }
    	
    	$data['panelTitle']='Add Details';
        $data['subview']='employees/add_profile_details';
        $this->load->view('admin/common/_layout_admin',$data);
    }

    public function addDetails($keyhash)
    {
        if($_POST)
        {
            $formData['keyhash']=$keyhash;
            $formData['name']=$_POST['name'];
            $formData['email']=$_POST['email'];
            $formData['mobile']=$_POST['mobile'];
            $formData['emg_mobile']=$_POST['emg_mobile'];
            $formData['dob']=$_POST['dob'];
            $formData['father_name']=$_POST['father_name'];
            $formData['current_address']=$_POST['current_address'];
            $formData['permanent_address']=$_POST['permanent_address'];
            $formData['father_occupation']=$_POST['father_occupation'];
            $formData['siblings']=$_POST['siblings'];
            $formData['mother_name']=$_POST['mother_name'];
            $formData['adhar_number']=$_POST['adhar_number'];
            $formData['pan_number']=$_POST['pan_number'];
            $formData['passport_number']=$_POST['passport_number'];
            $formData['driving_license']=$_POST['driving_license'];
            $formData['created']=date('Y-m-d H:i:s');
            if($id)
            {
                $this->db->where('id',$id);
                $success=$this->db->update('tbl_employees',$formData);
                $employee_id=$id;
            }
            else
            {
                $success=$this->db->insert('tbl_employees',$formData);
                $employee_id=$this->db->insert_id();
            }
            
            if($success)
            {
                if(isset($_POST['company']))
                {
                    // echo '<pre>';
                    // print_r($_POST);exit();
                    $this->db->where('employee_id',$employee_id);
                    $this->db->delete('tbl_employee_proffessional_details');
                    for ($i=0;$i<count($_POST['company']);$i++)
                    {
                        $ProData=array(
                            'employee_id' => $employee_id, 
                            'company' => $_POST['company'][$i], 
                            'start_date' => $_POST['start_date'][$i], 
                            'end_date' => $_POST['end_date'][$i],
                            'salary' => $_POST['salary'][$i],
                            'created'=>date('Y-m-d H:i:s')
                        );
                        $ok=$this->db->insert('tbl_employee_proffessional_details',$ProData);
                        //$this->db->last_query();exit();
                    }
                }
                if(isset($_POST['degree']))
                {

                    $this->db->where('employee_id',$employee_id);
                    $this->db->delete('tbl_employee_educational_details');
                    for ($i=0;$i<count($_POST['degree']);$i++)
                    {
                        $EduData=array(
                            'employee_id' => $employee_id, 
                            'degree' => $_POST['degree'][$i],
                            'doneFrom' => $_POST['doneFrom'][$i],
                            'yop' => $_POST['yop'][$i],
                            'marks' => $_POST['marks'][$i],
                            'created'=>date('Y-m-d H:i:s')
                        );
                        $ok=$this->db->insert('tbl_employee_educational_details',$EduData);
                    }
                }
                if(isset($_FILES['document'])) 
                {
                    for ($i=0;$i<count($_FILES['document']);$i++)
                    {
                        $target_dir = "assets/employees/documents/";
                        $target_file = $target_dir . basename($_FILES["document"]["name"][$i]);
                        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                        move_uploaded_file($_FILES["document"]["tmp_name"][$i], $target_file);
                        $docData['documentPath']=$target_file;
                        $docData['employee_id']=$employee_id;
                        $ok=$this->db->insert('tbl_employee_documents',$docData);
                    }
                }
                
                if($ok)
                {
                    redirect(base_url()."employee/add_details");
                }
            }
        }
        
        $data['panelTitle']='Add Details';
        $data['subview']='employees/add_profile_details_wl';
        $this->load->view('admin/common/_layout_admin',$data);
    }
    
}