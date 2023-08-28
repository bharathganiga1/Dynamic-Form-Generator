<?php 
    class Alumni extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('Alumni_Model');
            $this->load->model('Generate_Model');
        }
        public function alumni_register(){

            $this->form_validation->set_rules('alumni_name','Alumni Name','required');
            $this->form_validation->set_rules('alumni_email','Alumni Email','required');
            $this->form_validation->set_rules('clg_id','College Id','required');
            $this->form_validation->set_rules('alumni_pass','Password','required');
            $this->form_validation->set_rules('alumni_pass2','Confirm Password','required');
    
    
            if($this->form_validation->run() === FALSE){
                $this->load->view('header');
                $this->load->view('alumni_register');
                $this->load->view('footer');
            } else {
                $enc_password = md5($this->input->post('alumni_pass'));
                $this->Alumni_Model->alumni_register($enc_password);
                $this->session->set_flashdata('alumni_registered','Alumni Registration is succeded');
                redirect('/Alumni/alumni_login');
            }
            
        }
        public function alumni_login(){
        
            $this->form_validation->set_rules('alumni_email','Email','required');
            $this->form_validation->set_rules('alumni_pass','Password','required');
    
            if($this->form_validation->run() === FALSE){    //suppose validation fails 
                $this->load->view('header');
                $this->load->view('alumni_login');
                $this->load->view('footer.php');
            }else{
                $email = $this->input->post('alumni_email');
                $enc_password =md5($this->input->post('alumni_pass'));
                $data = $this->Alumni_Model->alumni_login($email,$enc_password);//array containing college id and alumni id
                if($data){
                    //create clg data
                    $alumni_data = array(
                        'alumni_id' => $data['alumni_id'],
                        'clg_id' => $data['clg_id'],
                        'email' => $email,
                        'logged_in'=>true
                    );
                    $this->session->set_userdata($alumni_data);
                    $this->session->set_flashdata('valid-login','You have been successfully logged in');
                    redirect('Generates/index/'.$data['clg_id']);
                }else{
                    $this->session->set_flashdata('invalid-login','Invalid Credentials,Please Try again!');
                    $this->load->view('header');
                    $this->load->view('alumni_login');
                    $this->load->view('footer.php');
                }
            }
        }
    }