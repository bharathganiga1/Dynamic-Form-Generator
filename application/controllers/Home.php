<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public $data;
	public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('College_Model');
    }
	public function index()
	{
		$data['title'] = 'Home page';
		$this->load->view('header');
		$this->load->view('home',$data);
		$this->load->view('footer.php');
	}

	public function get_college(){

        $this->load->library('form_validation');
        $this->load->model('College_Model'); 
        $data['title'] = 'Home page';
        $this->form_validation->set_rules('clg_name','Name','required');
        $this->form_validation->set_rules('clg_email','Email','required');
        $this->form_validation->set_rules('clg_phno','Contact Number','required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('header');
            $this->load->view('home',$data);
            $this->load->view('footer.php');
        } else {
            $clg_id = $this->College_Model->put_clg();
            $data['clg_id'] = $clg_id;
            redirect('configurations/index/' . $clg_id);   
        }
    }
}
