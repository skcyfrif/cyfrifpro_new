<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_M extends CI_Model 
{
    public function index()
    {
        //$this->load->view('welcome_message');
    }
    public function login($email,$password)
    {
        //echo $email;echo $password;exit();
        $this->db->where(array('email'=>$email,'password'=>$password));
        $query=$this->db->get('tbl_employees');
        //echo $this->db->last_query();exit();
        //echo $query->num_rows();exit();
        if($query->num_rows() == 1)
        {
            //echo 'Ok';exit();
            $row=$query->row();
            $userdata['id']=$row->id;
            $userdata['name']=$row->name;
            $userdata['email']=$row->email;
            $userdata['mobile']=$row->mobile;
            $userdata['loggedIn']=TRUE;
            $userdata['isAdmin']=FALSE;
            $userdata['Iam']='Employee';
            $userdata['parent_id']=$row->parent_id;
            $this->session->set_userdata('employee',$userdata);
            //echo '<pre>';
            //print_r($this->session->all_userdata());//exit();
            return true;
        }
        else
        {
            //echo 'Not ok';exit();
            return false;
        }
    }
    public function isLoggedIn()
    {
        return(bool) $this->session->userdata('employee')['loggedIn'];
    }

}
?>