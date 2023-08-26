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

	public function register(){

        $data['title'] = 'Register Page';

        $this->form_validation->set_rules('clg_name','Name','required');
        $this->form_validation->set_rules('clg_email','Email','required');
        $this->form_validation->set_rules('clg_pass','Password','required');
        $this->form_validation->set_rules('clg_pass2','Confirm Password','matches[clg_pass]');

        if($this->form_validation->run() === FALSE){
            $this->load->view('header');
            $this->load->view('register',$data);
            $this->load->view('footer.php');
            //die("fails");
        } else {
            $enc_password = md5($this->input->post('clg_pass'));
            $this->College_Model->register($enc_password);
            $this->session->set_flashdata('registered','Registration is succeded');
            redirect('/Home/login');  //redirect to login page
        }
    }
    public function login(){

        $this->form_validation->set_rules('clg_email','Email','required');
        $this->form_validation->set_rules('clg_pass','Password','required');

        if($this->form_validation->run() === FALSE){    //suppose validation fails 
            
            $this->load->view('header');
            $this->load->view('login');
            $this->load->view('footer.php');
        }else{
            $email = $this->input->post('clg_email');
            $enc_password =md5($this->input->post('clg_pass'));
            $clg_id = $this->College_Model->login($email,$enc_password);
            if($clg_id){
                //create clg data
                $clg_data = array(
                    'clg_id' => $clg_id,
                    'email' => $email,
                    'logged_in'=>true
                );
                $this->session->set_userdata($clg_data);
                $this->session->set_flashdata('valid-login','You have been successfully logged in');
                redirect('Configurations/index/'.$clg_id);
            }else{
                $this->session->set_flashdata('invalid-login','Invalid Credentials,Please Try again!');
                $this->load->view('header');
                $this->load->view('login');
                $this->load->view('footer.php');
            }
        }
            
    }
    public function logout(){
        //unset userdata
        $this->session->unset_userdata('clg_id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('logged_in');

        $this->session->set_flashdata('log-out','You have been Logged out!');

        redirect('home/login');
    }
}
