<?php
    class Generates extends CI_Controller{
        public $data;
        public function index($clg_id = null){
            $data['title'] = 'generate form page';
            $data['clg_id'] = $clg_id;

            // Load the Generate_Model
            $this->load->model('Generate_Model');
            
            // Fetch configurations data from the model
            $data['configurations'] = $this->Generate_Model->get_configurations_by_clg_id($clg_id);
            $this->load->view('header');
            $this->load->view('/generate',$data);
            $this->load->view('footer.php');
        }

        
    }
