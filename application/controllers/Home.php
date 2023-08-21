<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public $data;
	public function index()
	{
		$data['title'] = 'Home page';
		$this->load->view('header');
		$this->load->view('home',$data);
		$this->load->view('footer.php');
	}

	public function get_college(){
		$this->load->library('form_validation');
		$data['title'] = 'Home page';
		$this->form_validation->set_rules('clg_name','Name','required');
		$this->form_validation->set_rules('clg_email','Email','required');
		$this->form_validation->set_rules('clg_phno','Contact Number','required');
		
		if($this->form_validation->run() === FALSE){
			$this->load->view('header');
			$this->load->view('home',$data);
			$this->load->view('footer.php');
            }else{
                $this->College_Model->put_college();
				die('Success!!');	
            }
	}
}
