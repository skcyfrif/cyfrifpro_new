
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
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
        redirect(base_url()."admin/login");
    }

    public function login()
    {
        if($this->Admin_M->isLoggedIn() == TRUE)
        {
            redirect(base_url()."admin/dashboard");
        } 
        //$this->session->sess_destroy();
        if($_POST)
        {
            // echo '<pre>';
            // print_r($_POST);exit();
            $email=$this->db->escape_str($_POST['email']);
           
            //$password=md5($this->db->escape($_POST['password']));
            $password=md5($_POST['password']);

           //echo $email;
           //echo $password;exit();
            $success=$this->Admin_M->login($email,$password);
            //var_dump($success);exit();
            if($success == TRUE)
            {
                //var_dump($success);exit();
                redirect(base_url()."admin/dashboard");//$this->dashboard();
               /*echo '<script type="text/javascript">window.location="'.base_url().'admin/dashboard";</script>';*/
            }
            else
            {
                $this->session->set_flashdata('error','Incorrect Credenetials');
                redirect(base_url()."admin/login");
            }
        }
        $this->load->view('admin/login');
    }
    
    public function dashboard()
    {
        //var_dump($this->Admin_M->isLoggedIn());exit();

        if($this->Admin_M->isLoggedIn() != TRUE)
        {
            redirect(base_url()."admin/login");
        }
        $data['panelTitle']='Dashboard';
        $data['subview']='admin/dashboard';
        $this->load->view('admin/common/_layout_admin',$data);
    }

    public function feedback_admin($id = NULL) {
        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Client_M->isLoggedIn() != TRUE) {
            redirect(base_url() . "client/login");
        }

        if($this->session->userdata('client')['parent_id']==0){
            $client_id = $this->session->userdata('client')['id'];
        }elseif($this->session->userdata('client')['parent_id']!=0){
            $client_id = ($this->session->userdata('client')['parent_id']);
        }


        $data['subject'] = $this->Admin_M->get('tbl_feedback','subject' ,'client_id', $client_id);
        $data['message'] = $this->Admin_M->get('tbl_feedback','message' ,'client_id', $client_id);

        $data['feedback'] = $this->Common_M->get('tbl_feedback', 'created','client_id', $client_id);
        
        $data['clients_details'] = $this->Common_M->get('tbl_clients', 'created', 'DESC', 'client_id', $client_id);
        $data['panelTitle'] = 'Clients Feedback';
        $data['subview'] = 'admin/feedback_admin';
        $this->load->view('admin/common/_layout_admin', $data);
    }


    public function logout()
    {
         $this->session->sess_destroy();
         redirect(base_url()."admin/login");
    }
    public function all_session()
    {
        $this->session->all_userdata();
    }
    public function kill_all_session()
    {
        $this->session->sess_destroy();
    }
    public function delete()
    {
        // if($this->Admin_M->isLoggedIn() != TRUE)
        // {
        //     redirect(base_url()."admin/login");
        // }
        $tbl_name=$this->uri->segment(3);
        $rawURL=$this->uri->segment(4);
        $id=$this->uri->segment(5);
        $returnURL=str_replace('-','/',$rawURL);
        $this->db->where('id',$id);
        //echo $tbl_name;echo $rawURL;echo $returnURL;echo $id;exit();
        $success=$this->db->delete($tbl_name);
        if($success)
        {
            $this->session->set_flashdata('success','Removed Successfully');
            redirect(base_url().$returnURL);
        }
    }




    public function my_profile() {

        if ($this->Admin_M->isLoggedIn() != TRUE && $this->Employee_M->isLoggedIn() != TRUE) {
            redirect(base_url()."admin/login");
        }
    
        $admin_id = $this->session->userdata('admin')['id'];
        if ($_POST) {
            //$formData['password'] = md5($this->db->escape($this->input->post('password')));
            //$formData['decrypted_password'] = $_POST['password'];
            $formData['business_name'] = $_POST['business_name'];
            $formData['business_email'] = $_POST['business_email'];
            $formData['business_mobile'] = $_POST['business_mobile'];
            $formData['gst_number'] = $_POST['gst_number'];
            $formData['website'] = $_POST['website'];
            $formData['person_name'] = $_POST['person_name'];
            $formData['person_mobile'] = $_POST['person_mobile'];
            $formData['person_email'] = $_POST['person_email'];
            $formData['pincode'] = $_POST['pincode'];
            $formData['address'] = $_POST['address'];
           
            if ($_FILES['image']['name'] != '') {
                //echo 'if1';//exit();
                $target_dir = "assets/admins/company_logo/";
                $filename_mo = rand() . $filename;
                $target_file = $target_dir . $filename_mo;
                move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                $formData['imagePath'] = $target_file;
            }
            $this->db->where('id', $admin_id);
            $this->db->update('tbl_admin', $formData);
        }

        $data['this_element'] = $this->Common_M->getSingleRow('tbl_admin', 'id', $admin_id);
        $data['panelTitle'] = 'My Profile';
        $data['subview'] = 'admin/my_profile';
        $this->load->view('admin/common/_layout_admin', $data);
    }
    
    










    public function menus(){
        if($this->Admin_M->isLoggedIn() != TRUE && $this->Employee_M->isLoggedIn() != TRUE)
        {
            redirect(base_url()."admin/login");
        }
        $data['menus']=$this->Admin_M->get('tbl_menus','created','ASC');
        $data['panelTitle']='Menus';
        $data['subview']='admin/menus';
        $this->load->view('admin/common/_layout_admin',$data);
    }
    
    public function add_menu($id=NULL)
    {
        if($this->Admin_M->isLoggedIn() != TRUE && $this->Employee_M->isLoggedIn() != TRUE)
        {
            redirect(base_url()."admin/login");
        }
        if($_POST)
        {
             //echo '<pre>'; print_r($_POST);exit();
             
            $data['name']=$_POST['name'];
            $data['url']=str_replace(' ','-',$this->trimCharacters($_POST['name']));
            $data['content']=$_POST['content'];
            $data['created']=date('Y-m-d H:i:s');
            if($id)
            {
                $this->db->where('id',$id);
                $success=$this->db->update('tbl_menus',$data);
                $rowId=$id;
            }
            else
            {
                $success=$this->db->insert('tbl_menus',$data);
                $rowId=$this->db->insert_id();
            }
            if($success)
            {
                $this->db->where('service_id',$rowId);
                $this->db->delete('tbl_service_details');
                for ($i=0;$i<count($_POST['title']);$i++)
                {
                    $serviceData=array(
                        'service_id' => $rowId, 
                        'title' => $_POST['title'][$i], 
                        'description' => $_POST['description'][$i], 
                        'service_type' => 'main',
                    );
                    $success2=$this->db->insert('tbl_service_details',$productData);
                }
                $this->session->set_flashdata('success','Updated Successfully');
                redirect(base_url()."admin/menus");
            }
            
        }
        if($id)
        {
            $data['this_element']=$this->Common_M->getSingleRow('tbl_menus','id',$id);
            $data['panelTitle']='Update Menu';
        }
        else
        {
            $data['panelTitle']='Add Menu';
        } 
        //$data['service_details']=$this->Commo
        $data['subview']='admin/add_menu';
        $this->load->view('admin/common/_layout_admin',$data);
    }

    public function sub_menus()
    {
        if($this->Admin_M->isLoggedIn() != TRUE && $this->Employee_M->isLoggedIn() != TRUE)
        {
            redirect(base_url()."admin/login");
        }
        $data['sub_menus']=$this->Admin_M->get('tbl_sub_menus','created','DESC');
        $data['panelTitle']='Sub Menus';
        $data['subview']='admin/sub_menus';
        $this->load->view('admin/common/_layout_admin',$data);
    }
    public function add_sub_menu($id=NULL)
    {
        if($this->Admin_M->isLoggedIn() != TRUE && $this->Employee_M->isLoggedIn() != TRUE)
        {
            redirect(base_url()."admin/login");
        }
        if($_POST)
        {
            $data['name']=$_POST['name'];
            $data['menu_id']=$_POST['menu_id'];
            $data['url']=str_replace(' ','-',$this->trimCharacters($_POST['name']));
            $data['content']=$_POST['content'];
            $data['created']=date('Y-m-d H:i:s');
            if($id)
            {
                $this->db->where('id',$id);
                $success=$this->db->update('tbl_sub_menus',$data);
                $rowId=$id;
            }
            else
            {
                $success=$this->db->insert('tbl_sub_menus',$data);
                $rowId=$this->db->insert_id();
            }
            if($success)
            {
                $this->db->where('service_id',$rowId);
                $this->db->delete('tbl_service_details');
                for ($i=0;$i<count($_POST['title']);$i++)
                {
                    $serviceData=array(
                        'service_id' => $rowId, 
                        'title' => $_POST['title'][$i], 
                        'description' => $_POST['description'][$i], 
                        'service_type' => 'sub',
                    );
                    $success2=$this->db->insert('tbl_service_details',$productData);
                }
                $this->session->set_flashdata('success','Updated Successfully');
                redirect(base_url()."admin/sub_menus");
            }
            
        }
        if($id)
        {
            $data['this_element']=$this->Common_M->getSingleRow('tbl_sub_menus','id',$id);
            $data['panelTitle']='Update Sub Menu';
        }
        else
        {
            $data['panelTitle']='Add Sub Menu';
        }
        $data['menus']=$this->Admin_M->get('tbl_menus','name','ASC');
        $data['subview']='admin/add_sub_menu';
        $this->load->view('admin/common/_layout_admin',$data);
    }

    public function careers(){
    
        //$this->load->view('admin/careers');
        if($this->Admin_M->isLoggedIn() != TRUE && $this->Employee_M->isLoggedIn() != TRUE){
            redirect(base_url()."admin/login");
        }
        $data['careers']=$this->Admin_M->get('tbl_careers','created','DESC');
        $data['panelTitle']='Careers';
        $data['subview']='admin/careers';
        $this->load->view('admin/common/_layout_admin',$data);
    }

    public function add_career($id=NULL)
    {
        if($this->Admin_M->isLoggedIn() != TRUE && $this->Employee_M->isLoggedIn() != TRUE)
        {
            redirect(base_url()."admin/login");
        }
        if($_POST)
        {
            //echo '<pre>';
            //print_r($_POST);exit();
            $idata['title']=$_POST['title'];
            $idata['location']=$_POST['location'];
            $idata['salary']=$_POST['salary'];
            $idata['display_salary']=($_POST['display_salary']) ? $_POST['display_salary'] : 0;
            $idata['description']=$_POST['description'];
            $idata['created']=date('Y-m-d H:i:s');
            if($id)
            {

                $this->db->where('id',$id);
                $success=$this->db->update('tbl_careers',$idata);
            }
            else
            {
                $success=$this->db->insert('tbl_careers',$idata);
            }
            if($success)
            {
                $this->session->set_flashdata('success','Updated Successfully');
                redirect(base_url()."admin/careers");
            }
            
        }
        if($id)
        {
            $data['this_element']=$this->Common_M->getSingleRow('tbl_careers','id',$id);
            $data['panelTitle']='Update Career';
        }
        else
        {
            $data['panelTitle']='Add Career';
        }
        
        $data['subview']='admin/add_career';
        $this->load->view('admin/common/_layout_admin',$data);
    }

    public function interview()
{
    if (!$this->Admin_M->isLoggedIn() && !$this->Employee_M->isLoggedIn()) {
        redirect(base_url()."admin/login");
    }
    
    $data['panelTitle'] = 'Applications';
    $data['applications'] = $this->Admin_M->getInterview('tbl_career_applications', 'created', 'DESC');
    $data['subview'] = 'admin/interview';
    
    $this->load->view('admin/common/_layout_admin', $data);
}

public function interview2($job_id)
{
    if (!$this->Admin_M->isLoggedIn() && !$this->Employee_M->isLoggedIn()) {
        redirect(base_url() . "admin/login");
    }
    
    $data['panelTitle'] = 'Interview';
    $data['applications'] = $this->Admin_M->getInterview2('tbl_career_applications', 'created', 'DESC', $job_id);
    $data['subview'] = 'admin/interview';
    
    $this->load->view('admin/common/_layout_admin', $data);
}


public function reject_applications()
    {
        if($this->Admin_M->isLoggedIn() != TRUE && $this->Employee_M->isLoggedIn() != TRUE)
        {
            redirect(base_url()."admin/login");
        }
        $data['panelTitle']='Applications';
        $data['applications']=$this->Admin_M->getReject('tbl_career_applications','created','DESC');
        $data['subview']='admin/reject_applications';
        $this->load->view('admin/common/_layout_admin',$data);
    }
    public function reject_applications2($job_id)
    {
        if($this->Admin_M->isLoggedIn() != TRUE && $this->Employee_M->isLoggedIn() != TRUE)
        {
            redirect(base_url()."admin/login");
        }
        $data['panelTitle']='Applications';
        $data['applications']=$this->Admin_M->getReject2('tbl_career_applications', 'created', 'DESC', $job_id);
        $data['subview']='admin/reject_applications';
        $this->load->view('admin/common/_layout_admin',$data);
    }



    public function applications($job_id)
    {
        if($this->Admin_M->isLoggedIn() != TRUE && $this->Employee_M->isLoggedIn() != TRUE)
        {
            redirect(base_url()."admin/login");
        }
        $data['panelTitle']='Applications';
        $data['applications']=$this->Admin_M->getApplications('tbl_career_applications','created','DESC','job_id',$job_id);
        $data['subview']='admin/applications';
        $this->load->view('admin/common/_layout_admin',$data);
    }

    public function schedule_application()
{
    $application_id = $this->input->post('application_id');
    $scheduledate = $this->input->post('scheduledate');
    $scheduletime = $this->input->post('scheduletime');
    
    $data = array(
        'scheduledate' => $scheduledate,
        'scheduletime' => $scheduletime
    );

    if($this->Admin_M->update_schedule($application_id, $data)) {
        echo json_encode(array('status' => 'success'));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Failed to update schedule.'));
    }
}

public function get_application_schedule() {
    $application_id = $this->input->post('application_id');

    // Fetch the application data
    $application = $this->Admin_M->get_row('tbl_career_applications', ['id' => $application_id]);

    if ($application) {
        // Return the schedule data
        echo json_encode(array('status' => 'success', 'data' => array(
            'scheduledate' => $application->scheduledate,
            'scheduletime' => $application->scheduletime
        )));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Application not found.'));
    }
}


public function toggle_reject_application()
{
    $application_id = $this->input->post('application_id');
    
    // Fetch the current status of the application
    $application = $this->Admin_M->get_row('tbl_career_applications', ['id' => $application_id]);

    if ($application) {
        // Determine the new status
        $new_status = ($application->status === 'rejected') ? 'accepted' : 'rejected';

        // Prepare the data to update the application status
        $data = array('status' => $new_status);

        if ($this->Admin_M->update_status($application_id, $data)) {
            echo json_encode(array('status' => 'success', 'new_status' => $new_status));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Failed to update status.'));
        }
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Application not found.'));
    }
}




    
    public function client_menu($id=NULL)
    {
        if($this->Admin_M->isLoggedIn() != TRUE && $this->Employee_M->isLoggedIn() != TRUE)
        {
            redirect(base_url()."admin/login");
        }
        if($_POST)
        {
            $formData['title']=$_POST['title'];
            $formData['created']=date('Y-m-d H:i:s');

            if($id)
            {
                $this->db->where('id',$id);
                $success=$this->db->update('tbl_client_menu',$formData);
            }
            else
            {
                $success=$this->db->insert('tbl_client_menu',$formData);
            }
            $this->session->set_flashdata('success','Updated Successfully');
            redirect(base_url()."admin/client_menu");
        }
        if($id)
        {
            $data['this_element']=$this->Common_M->getSingleRow('tbl_client_menu','id',$id);
        }
        $data['client_menu']=$this->Admin_M->get('tbl_client_menu','created','DESC');
        $data['panelTitle']='Client Menus';
        $data['subview']='admin/client_menu';
        $this->load->view('admin/common/_layout_admin',$data);
    }

    public function zone()
    {
        $id=($this->uri->segment(3)) ? $this->uri->segment(3) : NULL;
        if($this->Admin_M->isLoggedIn() != TRUE)
        {
            redirect(base_url()."admin/login");
        }
        if($_POST)
        {
            $formData['title']=$_POST['title'];
            $formData['created']=date('Y-m-d H:i:s');

            if($id)
            {
                $this->db->where('id',$id);
                $success=$this->db->update('tbl_zone',$formData);
            }
            else
            {
                $success=$this->db->insert('tbl_zone',$formData);
            }
            $this->session->set_flashdata('success','Updated Successfully');
            redirect(base_url()."admin/zone");
        }
        if($id)
        {
            $data['this_element']=$this->Common_M->getSingleRow('tbl_zone','id',$id);
            $data['btn']='Update';
        }
        else
        {
            $data['btn']='Add';
        }
        $data['zone']=$this->Admin_M->get('tbl_zone','created','DESC');
        $data['panelTitle']='Zone';
        $data['subview']='admin/zone';
        $this->load->view('admin/common/_layout_admin',$data);
    }
    public function employees()
    {
        if($this->Admin_M->isLoggedIn() != TRUE){
            redirect(base_url()."admin/login");
        }
        
        $data['employees']=$this->Admin_M->get('tbl_employees','created','DESC','zone_id',$zone_id);
        $data['panelTitle']='Employees';
        $data['subview']='admin/employees';
        $this->load->view('admin/common/_layout_admin',$data);
    }
    public function clients($employee_id = NULL)
{
    if ($this->Admin_M->isLoggedIn() != TRUE && $this->Employee_M->isLoggedIn() != TRUE) {
        redirect(base_url() . "admin/login");
    }

    if ($employee_id) {
        $conditions = [
            'employee_id' => $employee_id,
            'parent_id' => 0
        ];
        $data['clients'] = $this->Admin_M->get('tbl_clients', 'created', 'DESC', $conditions);
    } else {
        // Fetch all clients with parent_id = 0
        $conditions = [
            'parent_id' => 0
        ];
        $data['clients'] = $this->Admin_M->get('tbl_clients', 'created', 'DESC', $conditions);
    }

    $data['panelTitle'] = 'Clients';
    $data['subview'] = 'admin/clients';
    $this->load->view('admin/common/_layout_admin', $data);
}


    public function users ($employee_id=NULL)
    {

        if($this->Admin_M->isLoggedIn() != TRUE && $this->Employee_M->isLoggedIn() != TRUE)
        {
            redirect(base_url()."admin/login");
        }
        if ($employee_id) {
            $conditions = [
                'employee_id' => $employee_id,
                'parent_id' => 0
            ];
            $data['clients'] = $this->Admin_M->get('tbl_clients', 'created', 'DESC', $conditions);
        } else {
            // Fetch all clients with parent_id = 0
            $conditions = [
                'parent_id' => 0
            ];
            $data['clients'] = $this->Admin_M->get('tbl_clients', 'created', 'DESC', $conditions);
        }
        
        $data['panelTitle']='Users';
        $data['subview']='admin/users';
        $this->load->view('admin/common/_layout_admin',$data);
    }
    
    public function add_client($id=NULL)
    {
        if($this->Admin_M->isLoggedIn() != TRUE && $this->Employee_M->isLoggedIn() != TRUE)
        {
            redirect(base_url()."admin/login");
        }
        if($_POST)
        {
            //$formData['name']=$_POST['name'];
            $formData['business_name']=$_POST['business_name'];
            $formData['email']=$_POST['email'];
            $formData['mobile']=$_POST['mobile'];
            $formData['password']=md5($this->db->escape($this->input->post('password')));
            $formData['decrypted_password']=$this->input->post('password');
            $formData['employee_id']=$_POST['employee_id'];
            $formData['contract_number']=$_POST['contract_number'];
            $formData['category']=$_POST['category'];
            $formData['type']=$_POST['type'];
            $formData['match']=$_POST['match'];
            $formData['data_source']=$_POST['data_source'];
            $formData['contract_status']=$_POST['contract_status'];
            $formData['contact_type']=$_POST['contact_type'];
            $formData['paid_amount']=$_POST['paid_amount'];
            $formData['contract_amount']=$_POST['contract_amount'];
            $formData['contact_person_name']=$_POST['contact_person_name'];
            $formData['contact_person_mobile']=$_POST['contact_person_mobile'];
            $formData['contact_person_email']=$_POST['contact_person_email'];
            // $formData['zone']=$_POST['zone'];
            // $formData['region_name']=$_POST['region_name'];
            // $formData['branch_name']=$_POST['branch_name'];
            // $formData['branch_dm']=$_POST['branch_dm'];
            // $formData['zonal_business_director']=$_POST['zonal_business_director'];
            $formData['payment_status']=$_POST['payment_status'];
            $formData['crm_id']=$_POST['crm_id'];   
            $formData['state_code']=$_POST['state_code'];         
            $formData['gst_number']=$_POST['gst_number'];
            $formData['nature_of_work']=$_POST['nature_of_work'];
            $formData['man_power']=$_POST['man_power'];
            $formData['relationship_officer_name']=$_POST['relationship_officer_name'];
            $formData['contract_period']=$_POST['contract_period'];
            $formData['service_availed']=$_POST['service_availed'];
            $formData['owner_name']=$_POST['owner_name'];
            $formData['owner_mobile']=$_POST['owner_mobile'];
            $formData['address']=$_POST['address'];
            $formData['pincode']=$_POST['pincode'];
            $formData['actype']=$_POST['actype'];
            $formData['created']=date('Y-m-d H:i:s');

            if($id)
            {
                $this->db->where('id',$id);
                $success=$this->db->update('tbl_clients',$formData);

            $updateData = $formData;
            unset($updateData['email'], $updateData['mobile'], $updateData['password'], $updateData['decrypted_password'], $updateData['created']);
            $this->db->where('parent_id', $id);
            $this->db->update('tbl_clients', $updateData);
                
            }
            else
            {
                $success=$this->db->insert('tbl_clients',$formData);
                //echo $this->db->last_query();exit();
            }
            if($success)
            {
                $this->session->set_flashdata('success','Updated Successfully');
                redirect(base_url()."admin/clients/");
            }
        }
        if($id)
        {
            $data['this_element']=$el=$this->Common_M->getSingleRow('tbl_clients','id',$id);
            // echo '<pre>';
            // print_r($el);exit();
        }
        $data['zones']=$this->Admin_M->get('tbl_zone','title','ASC');
        $data['employees']=$this->Admin_M->get('tbl_employees','name','ASC');
        $data['panelTitle']='Add Client';
        $data['subview']='admin/add_client';
        $this->load->view('admin/common/_layout_admin',$data);

    }

    public function add_employee($id=NULL)
    {
        if($_POST)
        {
            // echo '<pre>';
            // print_r($_POST);exit();
            $formData['name']=$_POST['name'];
            $formData['designation']=$_POST['designation'];
            $formData['email']=$_POST['email'];
            $formData['mobile']=$_POST['mobile'];
            $formData['designation_level']=$_POST['designation_level'];
            $formData['reporting_designation_level']=$_POST['reporting_designation_level'];
            $formData['reportingToEmployeeId']=($_POST['reportingToEmployeeId']) ?? NULL;
            $formData['zone_id']=$_POST['zone'];
            $formData['region_name']=$_POST['region_name'];
            $formData['branch_name']=$_POST['branch_name'];
            $formData['branch_dm']=$_POST['branch_dm'];
            $formData['zonal_business_director']=$_POST['zonal_business_director'];
            $formData['created']=date('Y-m-d H:i:s');
            $formData['password']=md5($this->db->escape($this->input->post('password')));
            $formData['decrypted_password']=$this->input->post('password');
            if(isset($_FILES['siteImage'])) 
            {
                $target_dir = "assets/site_visit/";
                $target_file = $target_dir . basename($_FILES["siteImage"]["name"]);
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                move_uploaded_file($_FILES["siteImage"]["tmp_name"], $target_file);
                $formData['addressVerified']=($_POST['addressVerified']) ?? 0;
                $formData['imagePath']=$target_file;
            }
            $formData['documentVerified']=($_POST['documentVerified']) ?? 0;
            $formData['verifier_name']=($_POST['verifier_name']) ?? NULL;
            
            // echo '<pre>';
            // echo $id;
            // print_r($formData);exit();
            if($id)
            {
                //echo 'Update';exit();
                $this->db->where('id',$id);
                $success=$this->db->update('tbl_employees',$formData);
                //$this->db->last_query();exit();
            }
            else
            {
                //echo 'Insert';exit();
                $success=$this->db->insert('tbl_employees',$formData);
            }
            
            $this->session->set_flashdata('success','Updated Successfully');
            redirect(base_url()."admin/employees");
        }
        if($id)
        {
            $data['this_element']=$this->Common_M->getSingleRow('tbl_employees','id',$id);
            $data['panelTitle']='Update Employee';
        }
        else
        {
            $data['panelTitle']='Add Employee';
        }
        $data['zones']=$this->Admin_M->get('tbl_zone','title','ASC');
        $data['designation_levels']=$this->Admin_M->get('tbl_designation_levels','id','DESC');
        $data['subview']='admin/add_employee';
        $this->load->view('admin/common/_layout_admin',$data);

    }
    public function view_employee($id=NULL)
    {
        if($_POST)
        {
            // echo '<pre>';
            // print_r($_POST);exit();
            $formData['name']=$_POST['name'];
            $formData['designation']=$_POST['designation'];
            $formData['email']=$_POST['email'];
            $formData['mobile']=$_POST['mobile'];
            $formData['designation_level']=$_POST['designation_level'];
            $formData['reporting_designation_level']=$_POST['reporting_designation_level'];
            $formData['reportingToEmployeeId']=($_POST['reportingToEmployeeId']) ?? NULL;
            $formData['zone_id']=$_POST['zone'];
            $formData['region_name']=$_POST['region_name'];
            $formData['branch_name']=$_POST['branch_name'];
            $formData['branch_dm']=$_POST['branch_dm'];
            $formData['zonal_business_director']=$_POST['zonal_business_director'];
            $formData['created']=date('Y-m-d H:i:s');
            $formData['password']=md5($this->db->escape($this->input->post('password')));
            $formData['decrypted_password']=$this->input->post('password');
            if(isset($_FILES['siteImage'])) 
            {
                $target_dir = "assets/site_visit/";
                $target_file = $target_dir . basename($_FILES["siteImage"]["name"]);
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                move_uploaded_file($_FILES["siteImage"]["tmp_name"], $target_file);
                $formData['addressVerified']=($_POST['addressVerified']) ?? 0;
                $formData['imagePath']=$target_file;
            }
            $formData['documentVerified']=($_POST['documentVerified']) ?? 0;
            $formData['verifier_name']=($_POST['verifier_name']) ?? NULL;
            
            // echo '<pre>';
            // echo $id;
            // print_r($formData);exit();
            if($id)
            {
                //echo 'Update';exit();
                $this->db->where('id',$id);
                $success=$this->db->update('tbl_employees',$formData);
                //$this->db->last_query();exit();
            }
            else
            {
                //echo 'Insert';exit();
                $success=$this->db->insert('tbl_employees',$formData);
            }
            
            $this->session->set_flashdata('success','Updated Successfully');
            redirect(base_url()."admin/employees");
        }
        if($id)
        {
            $data['this_element']=$this->Common_M->getSingleRow('tbl_employees','id',$id);
            $data['panelTitle']='Employee Details';
        }
        else
        {
            $data['panelTitle']='Add Employee';
        }
        $data['zones']=$this->Admin_M->get('tbl_zone','title','ASC');
        $data['designation_levels']=$this->Admin_M->get('tbl_designation_levels','id','DESC');
        $data['subview']='admin/view_employee';
        $this->load->view('admin/common/_layout_admin',$data);

    }
    public function sales_report()
    {
        if($this->Admin_M->isLoggedIn() != TRUE && $this->Employee_M->isLoggedIn() != TRUE)
        {
            redirect(base_url()."admin/login");
        }
        $data['sales_report']=$this->Admin_M->getAllSalesReport('`tbl_clients`.created','DESC');
        $data['panelTitle']='Sales Report';
        $data['subview']='admin/sales_report';
        $this->load->view('admin/common/_layout_admin',$data);
    }

    public function terms($id=NULL)
    {
        if($_POST)
        {
            $idata['name']=$_POST['name'];
            $idata['created']=date('Y-m-d H:i:s');
            if($id)
            {
                $this->db->where('id',$id);
                $success=$this->db->update('tbl_terms',$idata);
            }
            else
            {
                $success=$this->db->insert('tbl_terms',$idata);
            }
            if($success)
            {
                if($_GET['redirect'])
                {
                    $encrypted=$_GET['redirect'];
                    $url=base64_decode($encrypted);
                    //echo $url;exit();
                    redirect(base_url().$url);
                }
                else
                {
                    redirect(base_url().'admin/terms');
                }
            }
        }
        if($id)
        {
            $data['btn']='Update';
            $data['this_element']=$this->Common_M->getSingleRow('tbl_terms','id',$id);
        }
        else
        {
            $data['btn']='Add';
        }
        $data['terms']=$this->Admin_M->get('tbl_terms','created','DESC');
        $data['panelTitle']='All Terms';
        $data['subview']='admin/terms';
        $this->load->view('admin/common/_layout_admin',$data);
    }
    
    public function getData()
    {
        //echo 1111; exit;
    
        if(isset($_POST['keyword']))
        {
            $output='';
            $keyword=$_POST['keyword'];

            $rdata=explode(':',$keyword);
            $in_name=$rdata[0];
            $in_id=$rdata[1];

            $client_id=$this->session->userdata('client')['id'];            
            $sql="SELECT type,title,id,sprice,pprice,HSN,SAC,tax,unit,IGST,SGST,CGST FROM tbl_inventory WHERE id='".$in_id."'";
            $query = $this->db->query($sql);
            $key=$query->result();

            $rn=array();

            if($key[0]->sprice=="" || $key[0]->sprice<=0){
                $rn['sprice']=$key[0]->pprice;
            }else{
                $rn['sprice']=$key[0]->sprice;
            }

            if($key[0]->HSN!=""){
                $rn['hsn']=$key[0]->HSN;
            }else{
                $rn['hsn']=$key[0]->SAC;
            }

            if($key[0]->IGST!="" && $key[0]->IGST>0){
                $rn['tax']=$key[0]->IGST;
            }else{
                $rn['tax']=$key[0]->SGST+$key[0]->CGST;
            }

            $rn['unit']=$key[0]->unit;
            $rn['type']=$key[0]->type;
            //$rn['tax']=$key[0]->tax;

            echo json_encode($rn);


            //echo "<pre>"; print_r($result); exit;

            /* $output='<ul class="list-unstyled list-group">';


            if($query->num_rows() > 0){

                foreach($result as $key){
                    if($key->sprice=="" || $key->sprice<=0){
                        $p=$key->pprice;
                    }else{
                        $p=$key->sprice;
                    }

                   if($key->tax>0){
                        $tam=($p*$key->tax)/100;
                        $p=$tam+$p;
                    }

                    if($key->HSN!=""){
                        $hsn=$key->HSN;
                    }else{
                        $hsn=$key->SAC;
                    }


                    
                    $output .= '<li data-sprice="'.$p.'" data-unit="'.$key->unit.'" data-hsn="'.$hsn.'" data-tax="'.$key->tax.'" onclick="putData(this)" class="liClass list-group-item">'.$key->title.'</li>';
                }
            }
            else
            {
                $output .='<li class="liClass list-group-item">Not Found</li>';
            }
            $output .='<li class="addLinkC list-group-item"><button type="button" onclick="goToInventory()" class="btn btn-success">+ Add</button></li></ul>';
            echo $output;*/
        }
    }
    
    public function getCSCNames($city,$state,$country)
    {
        $country=$this->Common_M->getSingleRow('tbl_countries','id',$country);
        $state=$this->Common_M->getSingleRow('tbl_states','id',$state);
        $city=$this->Common_M->getSingleRow('tbl_cities','id',$city);

        $names=array('city'=>$city->name,'state'=>$state->name,'country'=>$country->name);
        // echo '<pre>';
        // print_r($names);
        return $names;
    }
    public function trimCharacters($string)
    {
        return preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $string);
    }
    // public function checkExists()
    // {
    //     $input=$_POST['input'];
    //     $this->db->where('name',$input);
    //     $query=$this->db->get('tbl_sub_menus');
    //     echo $query->num_rows();
    // }
    public function contact_data()
    {
        if($this->Admin_M->isLoggedIn() != TRUE && $this->Employee_M->isLoggedIn() != TRUE)
        {
            redirect(base_url()."admin/login");
        }
        $data['contact_data']=$this->Common_M->get('tbl_contact_us','created','ASC');
        $data['panelTitle']='Contact Data';
        $data['subview']='admin/contact_datas';
        $this->load->view('admin/common/_layout_admin',$data);
    }

    public function makeUrl()
    {
        $menus=$this->Admin_M->get('tbl_menus','id','ASC');
        foreach($menus as $key)
        {
            $data['url']=str_replace(' ','-',$this->trimCharacters($key->name));
            $this->db->where('id',$key->id);
            $this->db->update('tbl_menus',$data);
        }
    }
    public function add_question($id=NULL)
    {
        if($this->Admin_M->isLoggedIn() != TRUE && $this->Employee_M->isLoggedIn() != TRUE)
        {
            redirect(base_url()."admin/login");
        }
        if($_POST)
        {
            // echo '<pre>';
            // print_r($_POST);exit();
            // echo $id;echo $name;exit();
            $questionData=array(

                    'question'=>$_POST['question'],
                    'correct_option'=>$_POST['correct_option'],
                    'status'=>1,
                    'created'=>date('Y-m-d H:i:s')
            );
            // echo '<pre>';
            // print_r($invoiceData);exit();
            if($id)
            {
                $this->db->where('id',$id);
                $success=$this->db->update('tbl_questions',$questionData);
                $question_id=$id;
            }
            else
            {
                // echo '<pre>';
                // print_r($invoiceData);exit();
                $success=$this->db->insert('tbl_questions',$questionData);
                //$this->db->last_query();exit();
                $question_id=$this->db->insert_id();
            }
            if($success)
            {
                $this->db->where('question_id',$question_id);
                $this->db->delete('tbl_options');
                for ($i=0;$i<count($_POST['option_name']);$i++)
                {
                    $optionData=array(
                        'question_id' => $question_id, 
                        'option_name' => $_POST['option_name'][$i],
                        'created'=>date('Y-m-d H:i:s')
                    );
                    if($_POST['correct_option'] == $_POST['hiddenAnsNumber'][$i])
                    {
                        $optionData['isAnswer']=1;
                    }
                    $success2=$this->db->insert('tbl_options',$optionData);
                }
                if($success2)
                {
                    redirect(base_url()."admin/questions");
                }
            }
        }
        if($id)
        {
            //$data['isEditing']=TRUE;
            $data['panelTitle']='Update Question';
            $data['this_element']=$this->Common_M->getSingleRow('tbl_questions','id',$id);
            $data['options']=$this->Admin_M->get('tbl_options','id','ASC','question_id',$id);
        }
        else
        {
            $data['panelTitle']='Add Question';
        }
        $data['subview']='admin/add_question';
        $this->load->view('admin/common/_layout_admin',$data);
    }
     public function questions()
    {
        if($this->Admin_M->isLoggedIn() != TRUE && $this->Employee_M->isLoggedIn() != TRUE)
        {
            redirect(base_url()."admin/login");
        }
        $data['questions']=$this->Common_M->get('tbl_questions','created','DESC');
        $data['panelTitle']='Questions';
        $data['subview']='admin/questions';
        $this->load->view('admin/common/_layout_admin',$data);
    }
    public function add_exam($id=NULL)
    {
        if($this->Admin_M->isLoggedIn() != TRUE && $this->Employee_M->isLoggedIn() != TRUE)
        {
            redirect(base_url()."admin/login");
        }
        if($_POST)
        {
            $examData=array(

                    'title'=>$_POST['title'],
                    'opening'=>$_POST['opening'],
                    'time'=>$_POST['time'],
                    'questions'=>implode(',',$_POST['questions']),
                    'description'=>$_POST['description'],
                    'created'=>date('Y-m-d H:i:s')
            );
            if($id)
            {
                $this->db->where('id',$id);
                $success=$this->db->update('tbl_exams',$examData);
                $exam_id=$id;
            }
            else
            {
                $success=$this->db->insert('tbl_exams',$examData);
                //$this->db->last_query();exit();
                $exam_id=$this->db->insert_id();
            }
            if($success)
            {
                redirect(base_url()."admin/exams");
            }
        }
        if($id)
        {
            //$data['isEditing']=TRUE;
            $data['panelTitle']='Update Exam';
            $data['this_element']=$this->Common_M->getSingleRow('tbl_exams','id',$id);
        }
        else
        {
            $data['panelTitle']='Add Exam';
        }
        $data['openings']=$this->Admin_M->get('tbl_careers','title','ASC');
        $data['questions']=$this->Admin_M->get('tbl_questions','question','ASC');
        $data['subview']='admin/add_exam';
        $this->load->view('admin/common/_layout_admin',$data);
    }
    
    public function delete_assign_to_applicant($exm_id,$id){
        $this->db->where('id',$id);
        //echo $tbl_name;echo $rawURL;echo $returnURL;echo $id;exit();
        $success=$this->db->delete('tbl_exam_applicants');
        
        redirect(base_url()."admin/assign_to_applicant/".$exm_id);
    }
    public function assign_to_applicant($id){
        
        
        if($_POST)
        {
            
            $examData=array(

                    'user_email'=>$_POST['user_email'],
                    'exam_id'=>$_POST['exam_id'],
                    'code'=>$_POST['code']
            );
            
            
                $success=$this->db->insert('tbl_exam_applicants',$examData);
//                echo $this->db->last_query();
//                exit();
                $exam_id=$this->db->insert_id();
            
            if($success)
            {
                redirect(base_url()."admin/assign_to_applicant/".$_POST['exam_id']);
            }
        }
        
        $data['exam_id'] = $id;
        $data['applicant_list']=$this->Admin_M->get('tbl_exam_applicants','id','DESC');
        $data['subview']='admin/add_exam_applicant';
        $this->load->view('admin/common/_layout_admin',$data);
    }
    
    public function exams()
    {
        if($this->Admin_M->isLoggedIn() != TRUE && $this->Employee_M->isLoggedIn() != TRUE)
        {
            redirect(base_url()."admin/login");
        }
        $data['exams']=$this->Common_M->get('tbl_exams','created','DESC');
        $data['panelTitle']='Exams';
        $data['subview']='admin/exams';
        $this->load->view('admin/common/_layout_admin',$data);
    }
    public function applicants()
    {
        if($this->Admin_M->isLoggedIn() != TRUE && $this->Employee_M->isLoggedIn() != TRUE)
        {
            redirect(base_url()."admin/login");
        }
        $data['applicants']=$this->Common_M->get('tbl_applied_exams','id','DESC');
        $data['panelTitle']='Applicants';
        $data['subview']='admin/applicants';
        $this->load->view('admin/common/_layout_admin',$data);
    }
    public function view_sheet($apply_id)
    {
        if($this->Admin_M->isLoggedIn() != TRUE && $this->Employee_M->isLoggedIn() != TRUE)
        {
            redirect(base_url()."admin/login");
        }
        if(!$apply_id)
        {
            redirect(base_url().'admin/applicants');
        }
        $data['questions']=$this->Common_M->get('tbl_exam_sheet','id','DESC','apply_id',$apply_id);
        $data['panelTitle']='Exam Sheet';
        $data['subview']='admin/view_sheet';
        $this->load->view('admin/common/_layout_admin',$data);
    }
    public function designation_levels($id=NULL)
    {
        if($this->Admin_M->isLoggedIn() != TRUE)
        {
            redirect(base_url()."admin/login");
        }
        if($_POST)
        {
          $idata=array(

                'level'=>$_POST['level'],
                'created'=>date('Y-m-d H:i:s')
          );
          if($id)
          {
            $this->db->where('id',$id);
            $success=$this->db->update('tbl_designation_levels',$idata);
          }
          else
          {
            $success=$this->db->insert('tbl_designation_levels',$idata);
          }
          if($success)
          {
            redirect(base_url().'admin/designation_levels');
          }
        }
        if($id)
        {
          $data['btnText']='Update';
          $data['this_element']=$this->Common_M->getSingleRow('tbl_designation_levels','id',$id);
        }
        else
        {
          $data['btnText']='Add';
        }
        $data['designation_levels']=$this->Common_M->get('tbl_designation_levels','created','DESC','client_id',$client_id);
        $data['panelTitle']='Designation Levels';
        $data['subview']='admin/designation_levels';
        $this->load->view('admin/common/_layout_admin',$data);
    }
    public function getEmployeesByLevels($levelId)
    {
        $result=$this->Common_M->get('tbl_employees','name','ASC','designation_level',$levelId);
        //echo $this->db->last_query();
        $display='';
        $i=0;
        if(count($result) > 0)
        {
            foreach($result as $key)
            {
                if($i == 0)
                {
                    $selected='selected';
                }
                $display .= '<option value="'.$key->id.'"  '.$selected.' >'.$key->name.'</option>';
                $i++;
            }
        }
        else
        {
            $display='No Employee Found';
        }
        echo $display;
    }
    public function issue_offer_letter($id=NULL)
    {
        if($_POST)
        {
            $formdata['name']=$_POST['name'];
            $formdata['applicant_id']=$_POST['applicant_id'];
            $formdata['designation']=$_POST['designation'];
            $formdata['salary_per_anum']=$_POST['salary_per_anum'];
            $formdata['date']=$_POST['date'];
            $formdata['location']=$_POST['location'];
            $formdata['level']=$_POST['level'];
            $formdata['phone']=$_POST['phone'];
            $formdata['created']=date('Y-m-d H:i:s');
            if($id)
            {
                $this->db->where('id',$id);
                $success=$this->db->update('tbl_offer_letter',$formdata);
            }
            else
            {
                $success=$this->db->insert('tbl_offer_letter',$formdata);
            }
            if($success)
            {
                $this->session->set_flashdata('success','Updated Successfully');
                redirect(base_url()."admin/offer_letters");
            }
        }
        if($id)
        {
            $data['panelTitle']='Update Offer Letter';
            $data['this_element']=$this->Common_M->getSingleRow('tbl_offer_letter','id',$id);
        }
        else
        {
            $data['panelTitle']='Issue Offer Letter';
        }
        
        $data['subview']='admin/issue_offer_letter';
        $this->load->view('admin/common/_layout_admin',$data);
    }

    public function interview_issue_offer_letter($id = NULL)
    {
        if($_POST)
        {
            $formdata['name']=$_POST['name'];
            $formdata['applicant_id']=$_POST['applicant_id'];
            $formdata['designation']=$_POST['designation'];
            $formdata['salary_per_anum']=$_POST['salary_per_anum'];
            $formdata['date']=$_POST['date'];
            $formdata['location']=$_POST['location'];
            $formdata['level']=$_POST['level'];
            $formdata['offerleter_status']=$_POST['status'];
            $formdata['mobile']=$_POST['mobile'];
            $formdata['created']=date('Y-m-d H:i:s');
            if($id)
            {
                $this->db->where('id',$id);
                $success=$this->db->update('tbl_career_applications',$formdata);
            }
            else
            {
                $success=$this->db->insert('tbl_career_applications',$formdata);
            }
            if($success)
            {
                $this->session->set_flashdata('success','Updated Successfully');
                redirect(base_url()."admin/interview_offer_letters");
            }
        }
        if($id)
        {
            $data['panelTitle']='Update Offer Letter';
            $data['this_element']=$this->Common_M->getSingleRow('tbl_career_applications','id',$id);
        }
        else
        {
            $data['panelTitle']='Issue Offer Letter';
        }
        
        $data['subview']='admin/interview_issue_offer_letter';
        $this->load->view('admin/common/_layout_admin',$data);
    }
    



    public function offer_letter($id=NULL)
    {
        $data['offer_letter_details']=$this->Common_M->getSingleRow('tbl_offer_letter','id',$id);
        $data['panelTitle']='Offer Letter';
        $data['subview']='admin/offer_letter';
        $this->load->view('admin/common/_layout_admin',$data);
        $this->load->view('admin/offer_letter');
    }

    public function offer_letter2($job_id)
    {
        $data['offer_letter_details']=$this->Common_M->getSingleRow('tbl_career_applications','id',$job_id);
        $data['panelTitle']='Offer Letter';
        $data['subview']='admin/offer_letter';
        $this->load->view('admin/common/_layout_admin',$data);
        $this->load->view('admin/offer_letter');
    }
    
    public function pay_slip($id=NULL)
    {
        $data['panelTitle']='Pay Slip';
        $data['subview']='admin/add_pay_slip';
        $this->load->view('admin/common/_layout_admin',$data);
    }
    public function offer_letters()
    {
        $data['offer_letters']=$this->Common_M->get('tbl_offer_letter','created','DESC');
        $data['panelTitle']='Offer Letters';
        $data['subview']='admin/offer_letters';
        $this->load->view('admin/common/_layout_admin',$data);
        
    }

    public function interview_offer_letters()
{
    $where = array('offerleter_status' => 'approved'); 
    $data['offer_letters'] = $this->Common_M->getInterview(
        'tbl_career_applications',  
        'created',                  
        'DESC',                     
        $where                      
    );
    $data['panelTitle'] = 'Offer Letters';
    $data['subview'] = 'admin/interview_offer_letters';
    $this->load->view('admin/common/_layout_admin', $data);
}

public function interview_offer_letters2($job_id)
{
    $where = array('offerleter_status' => 'approved', 'job_id' => $job_id);
    $data['offer_letters'] = $this->Common_M->getInterview(
        'tbl_career_applications',  
        'created',                  
        'DESC',                     
        $where                      
    );
    $data['panelTitle'] = 'Offer Letters';
    $data['subview'] = 'admin/interview_offer_letters';
    $this->load->view('admin/common/_layout_admin', $data);
}



}

?>