<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_M extends CI_Model 
{
    public function index()
    {
        //$this->load->view('welcome_message');
    }
    public function login($email,$password)
    {
        //echo $email;echo $password;exit();
        $this->db->where(array('email'=>$email,'password'=>$password));
        $query=$this->db->get('tbl_admin');
        //echo $this->db->last_query();exit();
        //echo $query->num_rows();exit();
        if($query->num_rows() == 1)
        {
            //echo 'Ok';exit();
            $row=$query->row();
            $userdata['id']=$row->id;
            $userdata['name']=$row->name;
            $userdata['email']=$row->email;
            $userdata['loggedIn']=TRUE;
            $userdata['isAdmin']=TRUE;
            $userdata['Iam']='Admin';
            $userdata['parent_id']=$row->parent_id;
            $this->session->set_userdata('admin',$userdata);
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
        return(bool) $this->session->userdata('admin')['loggedIn'];
    }
    
    public function get($tbl_name, $order_by, $order, $where = NULL, $condition = NULL, $limit = NULL, $select = NULL)
{
    if ($select) {
        $this->db->select($select);
    }
    if ($where) {
        if (is_array($where)) {
            $this->db->where($where);
        } else if ($condition) {
            $this->db->where($where, $condition);
        }
    }
    $this->db->order_by($order_by, $order);
    if ($limit != NULL) {
        $this->db->limit($limit);
    }
    $query = $this->db->get($tbl_name);
    return $query->result();
}

    public function getSingleRow($tbl_name,$where,$condition,$limit=NULL)
    {
        //echo $tbl_name;echo $id;
        $this->db->where($where,$condition);
        if($limit)
        {
            $this->db->limit(1);
        }
        $query=$this->db->get($tbl_name);
        // echo '<pre>';
        // print_r($query->row());exit();
        if($query->num_rows() == 1)
        {
            return $query->row();
        }
        else
        {
            return false;
        }
        
    }

    
    public function update_schedule($application_id, $data) {
        $this->db->where('id', $application_id);
        return $this->db->update('tbl_career_applications', $data);
    }

    public function get_row($table, $conditions) {
        return $this->db->get_where($table, $conditions)->row();
    }
    
    public function update_status($application_id, $data) {
        $this->db->where('id', $application_id);
        return $this->db->update('tbl_career_applications', $data);
    }
    
    
    

        
    public function getByLike($tbl_name,$order_by,$order,$likeColumn,$likeKeyword,$group_by=NULL)
    {
        $sql="SELECT * FROM $tbl_name WHERE $likeColumn LIKE '%$likeKeyword%' ";
        if($group_by)
        {
            $sql .="GROUP BY $group_by ";
        }
        $sql .="ORDER BY $order_by $order;";
        //echo $sql;exit();
        $query=$this->db->query($sql);
        return $query->result();
    }
    public function getAllSalesReport($order_by,$order,$where=NULL,$condition=NULL)
    {
        $sql="SELECT `tbl_clients`.id AS cId,`tbl_clients`.business_name AS cName,`tbl_clients`.email AS cEmail,`tbl_clients`.mobile AS cMobile,`tbl_clients`.contract_number AS cContractNumer,`tbl_clients`.category AS cCategory,`tbl_clients`.match AS cMatch,`tbl_clients`.data_source AS cDataSource,`tbl_clients`.contract_status AS cContractStatus,`tbl_clients`.contact_type AS cContactType,`tbl_clients`.paid_amount AS cPaidAmount,`tbl_clients`.contract_amount AS cContractAmount,`tbl_clients`.contact_person_name AS cContactPersonName,`tbl_clients`.contact_person_email AS cContactPersonEmail,`tbl_clients`.contact_person_mobile AS cContactPersonMobile,`tbl_clients`.payment_status AS cPaymentStatus,`tbl_clients`.crm_id AS cCrmid,`tbl_clients`.business_name AS cBusinessName,`tbl_clients`.gst_number AS cGSTNumer,`tbl_clients`.nature_of_work AS cNatureOfWork,`tbl_clients`.man_power AS cManPower,`tbl_clients`.relationship_officer_name AS cRelationshipOfficerName,`tbl_clients`.contract_period As cContractPeriod,`tbl_clients`.service_availed AS cServiceAvailed,`tbl_clients`.owner_name AS cOwnerName,`tbl_clients`.address AS cAddress,`tbl_clients`.type AS cType,`tbl_clients`.pincode AS cPincode,`tbl_clients`.created AS cCreated,`tbl_employees`.id AS eId,`tbl_employees`.name AS eName,`tbl_employees`.email AS eEmail,`tbl_employees`.mobile AS eMobile,`tbl_employees`.zone_id AS eZone,`tbl_employees`.region_name AS eRegionName,`tbl_employees`.branch_name AS eBranchName,`tbl_employees`.branch_dm AS eBranchDM,`tbl_employees`.zonal_business_director AS eZonalBusinessDirector,`tbl_zone`.id AS zId,`tbl_zone`.title AS zTitle FROM `tbl_clients`

        LEFT JOIN `tbl_employees` ON `tbl_clients`.employee_id=`tbl_employees`.id 
        LEFT JOIN `tbl_zone` ON `tbl_employees`.zone_id=`tbl_zone`.id ";

        if($where)
        {
            $sql .="WHERE $where = '$condition' ";
        }
        $sql.="GROUP BY cName ORDER BY $order_by $order";
        $query=$this->db->query($sql);
        return $query->result();
    }
    public function getSUM($tbl_name,$clm_name,$where=NULL,$condition=NULL)
    {
        $sql="SELECT SUM($clm_name) as sum FROM $tbl_name ";
        if($where)
        {
            $sql .="WHERE $where = '$condition'";
        }
        $query=$this->db->query($sql);
        return $query->row()->sum;
    } 

    public function getInterview($tbl_name, $order_by, $order)
{
    $this->db->where('(status != "rejected" OR status IS NULL)', NULL, FALSE);
    $this->db->where('scheduledate IS NOT NULL');
    $this->db->where('scheduletime IS NOT NULL');
    $this->db->order_by($order_by, $order);
    $query = $this->db->get($tbl_name);
    
    return $query->result();
}
public function getInterview2($tbl_name, $order_by, $order, $job_id)
{
    $this->db->where('(status != "rejected" OR status IS NULL)', NULL, FALSE);
    $this->db->where('scheduledate IS NOT NULL');
    $this->db->where('scheduletime IS NOT NULL');
    $this->db->where('job_id', $job_id);
    $this->db->order_by($order_by, $order);
    $query = $this->db->get($tbl_name);
    
    return $query->result();
}


public function getReject($tbl_name, $order_by, $order)
{
    $this->db->where('status', 'rejected'); 
    $this->db->order_by($order_by, $order);
    $query = $this->db->get($tbl_name);
    
    return $query->result();
}

public function getReject2($tbl_name, $order_by, $order, $job_id)
{
    $this->db->where('status', 'rejected'); 
    $this->db->order_by($order_by, $order);
    $this->db->where('job_id', $job_id);
    $query = $this->db->get($tbl_name);
    
    return $query->result();
}


public function getApplications($tbl_name, $order_by, $order, $where = NULL, $condition = NULL, $limit = NULL, $select = NULL)
{
    if ($select) {
        $this->db->select($select);
    }
    if ($where) {
        if (is_array($where)) {
            $this->db->where($where);
        } else if ($condition) {
            $this->db->where($where, $condition);
        }
    }
    $this->db->group_start()  // Start a group
    ->where('(status = "accepted" OR status IS NULL)', NULL, FALSE)
    ->group_start()  // Start another group for the scheduling conditions
        ->where('scheduledate IS NULL')
        ->where('scheduletime IS NULL')
    ->group_end()  // End the scheduling conditions group
->group_end();  // End the status conditions group



    $this->db->order_by($order_by, $order);
    if ($limit != NULL) {
        $this->db->limit($limit);
    }
    $query = $this->db->get($tbl_name);
    return $query->result();
}





    

}