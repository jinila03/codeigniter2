<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		//$this->load->helper(array('form','url','file));
		$this->load->database();
		//$this->load->library(array('session','email'));
		$this->load->library(array('session','email','form_validation'));
		$this->load->model('Usermodel');
	}
	// public function index()
	// {
	// 	$this->load->view('welcome_message');
	// }
	// fu
	// $this->load->view('welcome_message');
	public function indexpage1()
	{
		$this->load->view('indexpage');
	}
	public function admin()
	{
		$this->load->view('admin');
	}
	
	public function user()
	{
		$this->load->view('userreg');
	}

	public function userreg()
	{
		$pass=$this->input->post('password');
	$newpassword=$this->Usermodel->hash_password($pass);
	
	
	 $data=array(
		 'name'=>$this->input->post('name'),
		 'address'=>$this->input->post('address'),
		 'regno'=>$this->input->post('regno'),
		 'place'=>$this->input->post('place')
	 );
	 $da=array(
		 'email'=>$this->input->post('email'),
		//  'password'=>$newpassword,
		 'password'=>$pass,

		 'status'=>'1'
		 // 'status'=>'1'
	 );
	 $result=$this->Usermodel->userreg1($data,$da);
	 if($result)
	 {
		echo"<script>alert('Registration successful')</script>";
		redirect('Welcome/user','refresh');
	 }
	 else
	 {
		echo"<script>alert('Reg Unsuccess')</script>";
		redirect('Welcome/user','refresh');
	 }
	}
	
	public function uhome()
	{
		$this->load->view('userhome');
	}
	public function login1()
	{
		$this->load->view('login');
	}




	public function login()
	{
		$this->load->helper('security');
		$id=$this->input->post('email');
		$id1=$this->input->post('password');
		//echo $id1;exit;
		if($this->Usermodel->checklogin($id,$id1))
			{
				$id2=$this->Usermodel->getuserid($id);
				//echo $id2;exit;
				$alldetail=$this->Usermodel->getuserdetail($id2);
				$this->session->set_userdata(array('userid'=>$id2,
				'logined'=>(bool)true,
				'utype'=>$alldetail->utype,
			'status'=>$alldetail->status));
			if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)
			                      AND($_SESSION['utype']==='0')AND($_SESSION['status']==='1'))
		{
		redirect('Welcome/admin','refresh');
		
			}
			else if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)
			AND
			($_SESSION['utype']==='1')AND($_SESSION['status']==='1'))
		{
		redirect('Welcome/uhome','refresh');
		
			}
			else if(isset($_SESSION['logined'])AND($_SESSION['logined']===true)
			AND
			($_SESSION['utype']==='2')AND($_SESSION['status']==='1'))
		{
		redirect('Welcome/indexpage1','refresh');
		
			}
			else
	{
		echo "<script>alert('email or password incorrect')</script>";
		redirect('Welcome/login1','refresh');
	}
	// 	}
			
	
	// else
	// {
	// 	echo "<script>alert('Waiting for admin approval')</script>";
	// 	 redirect('Welcome/login1','refresh');
	// }
}
	}
public function tasked()
	{
	$id=$this->uri->segment(3);
		$data['data']=$this->Usermodel->adminuser($id);
		$this->load->view('taskview',$data);
	//$this->load->view('taskview');
	}
	public function updatetask()

	{
		
		$id=$this->input->post('hide');
	
		$id1=$this->session->userid;
       
        $array=array(
            'task'=>$this->input->post('task'),
			'loginid'=>$id1
		);
		$a=$this->Usermodel->updatetask($array,$id);
		//print_r ($a);exit;
        if($a)
        {
        echo"<script>alert('Updation successfull')</script>";
        redirect('Welcome/tasked','refresh');
        }
        else
        {
        echo"<script>alert('Updation unsuccessfull')</script>";
        redirect('Welcome/tasked','refresh');
        }
	}
	public function taskuserview()
{
	$id=$this->session->userid;
	$search=$this->input->post('search');
	$data['data']=$this->Usermodel->viewtask($search,$id);
	$this->load->view('taskuser',$data);
}
public function adminuser()
{	
	$id=$this->session->userid;
	$search=$this->input->post('search');
	$data['data']=$this->Usermodel->viewuser($search,$id);
	$this->load->view('adminuser',$data);

}
public function task()
{   
    $tid['tid'] = $this->uri->segment(3);
    $data1['id1'] = $this->session->userid;
    $this->load->view('task', $tid);
}
	public function taskreg()
	{
		$id=$this->uri->segment(3);
		//$id1=$this->session->userid;
		$tid=$this->input->post('hide');
		$data=array(
			'task'=>$this->input->post('task'),
			'loginid'=>$id,
			
			
			
		);
		$result=$this->Usermodel->task1($data,$tid);
		if($result)
		{
		   echo"<script>alert('Registration successful')</script>";
		   redirect('Welcome/task','refresh');
		}
		else
		{
		   echo"<script>alert('Reg Unsuccess')</script>";
		   redirect('Welcome/task','refresh');
		}
	}
}
