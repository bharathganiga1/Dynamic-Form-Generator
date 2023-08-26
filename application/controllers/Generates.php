<?php
    class Generates extends CI_Controller{
        public $data;
        public function __construct(){
            parent::__construct();
            $this->load->model('Generate_Model');
        }
        public function index($clg_id = null){
            $data['title'] = 'generate form page';
            $data['clg_id'] = $clg_id;


            // Fetch configurations data from the model
            $data['configurations'] = $this->Generate_Model->get_configurations_by_clg_id($clg_id);
            $this->load->view('header');
            $this->load->view('/generate',$data);
            $this->load->view('footer.php');
        }

        
    }
