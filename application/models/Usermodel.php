<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usermodel extends CI_Model {

    public function hash_password($pass)
    {
        return password_hash($pass,PASSWORD_BCRYPT);
    }
    public function userreg1($data,$da)
    {
        $this->db->insert("login",$da);
        $loginid=$this->db->insert_id();
        $data['loginid']=$loginid;
        return $this->db->insert('user',$data);
    }
    public function task1($data, $tid)
{
    // Add the task ID to the data array
    $data['loginid'] = $tid;

    // Insert data into the 'task' table
    return $this->db->insert('task', $data);
}

    public function checklogin($id,$id1)
    {

        return $this->db->select('*'); 
      $this->db->from('login');
              $this->db->where('email',$id);
              $this->db->where('password',$id1);

    //   $tablepass=$this->db->get()->row('password');
    //   $p=$this->verifypassword($id1,$tablepass);

    //   echo "hhhh";exit;
    //   return $this->verifypassword($id1,$tablepass);
      
    }
    public function verifypassword($id1,$tablepass)
    {
      return password_verify($id1,$tablepass);
    }
    public function getuserid($id)
    {
      
      $this->db->select('id');
      $this->db->from('login');
      $this->db->where('email',$id);
      return $this->db->get()->row('id');		
    }
    public function getuserdetail($id2)
    {
       $this->db->select('*');
       $this->db->from('login');
       $this->db->where('id',$id2);
       return $this->db->get()->row();
    }
    public function adminuser($id){
        // $this->db->where('regid',$id);
         $this->db->select('*');
             $this->db->from('task',$id);
             //$this->db->join('login','public.loginid=login.logid');
             $query=$this->db->get();
             return $query->result();
     }
     public function updatetask($data,$id)
     {
        return $this->db->update('task',$data);
     }
     public function viewtask($search,$id)
     {
         $this->db->select('*');
         $this->db->from('task');
         $this->db->join('user','user.loginid=task.loginid');
         //$this->db->where('loginid',$id);
         //if(!empty($search)){
         $this->db->where('task',$search);
         $this->db->or_where('name',$search);
        
         $query=$this->db->get();
         return $query->result();
        
 
     }
     public function viewuser($search,$id)
     {
         $this->db->select('*');
         $this->db->from('user');
         //$this->db->join('user','user.loginid=task.loginid');
         //$this->db->where('loginid',$id);
         //if(!empty($search)){
         $this->db->where('name',$search);
         $this->db->or_where('regno',$search);
         $this->db->where('address',$search);
         $this->db->or_where('place',$search);
         $query=$this->db->get();
         return $query->result();
        
 
     }
     
     

}