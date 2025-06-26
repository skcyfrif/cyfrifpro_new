<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_M extends CI_Model 
{
    public function index()
    {
        //$this->load->view('welcome_message');
    }
    public function get($tbl_name,$order_by,$order,$where=NULL,$condition=NULL,$limit=NULL,$select=NULL,$group_by=NULL)
    {
        if($select)
        {
            $this->db->select($select);
        }
        if($where && $condition)
        {
            //echo $where;exit();
            $this->db->where($where,$condition);
        }
        if($group_by)
        {
            $this->db->group_by($group_by);
        }
        $this->db->order_by($order_by,$order);
        if($limit != NULL)
        {
            $this->db->limit($limit);
        }
        $query=$this->db->get($tbl_name);

        return $query->result();
    }

    public function getInterview($tbl_name, $order_by, $order, $where = NULL, $limit = NULL, $select = NULL, $group_by = NULL)
{
    if ($select) {
        $this->db->select($select);
    }
    if ($where) {
        $this->db->where($where);
    }
    if ($group_by) {
        $this->db->group_by($group_by);
    }
    $this->db->order_by($order_by, $order);
    if ($limit != NULL) {
        $this->db->limit($limit);
    }
    $query = $this->db->get($tbl_name);

    // Uncomment for debugging
    // echo $this->db->last_query();

    return $query->result();
}

    public function getSingleRow($tbl_name,$where,$condition,$limit=NULL)
    {
        //echo $tbl_name;echo $id;
        $this->db->where($where,$condition);
        if($limit)
        {
            $this->db->limit($limit);
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
    public function getSingleRowArr($tbl_name,$whereArr,$limit=NULL)
    {
        //echo $tbl_name;echo $id;
        $this->db->where($whereArr);
        if($limit)
        {
            $this->db->limit($limit);
        }
        $query=$this->db->get($tbl_name);
        //echo $this->db->last_query();exit();
        // echo '<pre>';
        // print_r($query->row());exit();
        if($query->num_rows() == 1)
        {
            return $query->row();
//            return $query->result_array();
        }
        else
        {
            return false;
        } 
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
    public function getByArr($tbl_name,$order_by,$order,$whereArr,$returnType=NULL,$group_by=NULL)
    {
        $this->db->where($whereArr);
        $this->db->order_by($order_by,$order);
        $query=$this->db->get($tbl_name);
        if($returnType)
        {
            return $query->$returnType();
        }
        else
        {
            return $query->result();
        }
        
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
    public function getSUMArr($tbl_name,$clm_name,$whereArr=NULL,$filter=NULL,$durationArr=NULL)
    {
        $sql="SELECT SUM($clm_name) as sum FROM $tbl_name ";
        if($whereArr)
        {
            $tot=count($whereArr);
            $i=1;
            $sql.= 'WHERE ';
            foreach($whereArr as $key => $value)
            {
                if($tot > $i)
                {
                    $sql.= '`'.$key.'`="'.$value.'" AND ';
                }
                else
                {
                    $sql.= '`'.$key.'`="'.$value.'"';
                }
                $i++;
            }
        }
        if($filter)
        {
            if($whereArr)
            {
                $where='AND';
            }
            else
            {
                $where='WHERE';
            }
            $sql .= ' '.$where.' created > DATE_SUB(now(), INTERVAL '.$filter.' MONTH) ';
        }
        if($durationArr)
        {
            if($whereArr)
            {
                $where='AND';
            }
            else
            {
                $where='WHERE';
            }
            $sql .= ' '.$where.' MONTH(created) = '.$durationArr[0].' AND YEAR(created) = '.$durationArr[1].' ORDER BY created ASC';
        }
        //echo $sql;exit();
        $query=$this->db->query($sql);
        //echo $this->db->last_query();exit();
        return $query->row()->sum;
    }
    public function checkInventoryAlertNeeded()
    {
        $whereArr=array(
                
                'client_id'=>$this->session->userdata('client')['id'],
                'out_of_stock_alert'=>1
            );
        $this->db->where($whereArr);
        $query=$this->db->get('tbl_inventory');
        if($query->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
?>