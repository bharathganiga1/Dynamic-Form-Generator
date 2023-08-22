<?php 
    class Configurations extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('Configuration_Model');
        }
        public function index()
        {
            $data['title'] = 'Configuration page';
            $this->load->view('header');
            $this->load->view('fields',$data);
            $this->load->view('footer.php');
        }
        
    }