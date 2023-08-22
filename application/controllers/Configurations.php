<?php 
    class Configurations extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('Configuration_Model');
        }
        public function index($clg_id = null)
        {
            $data['title'] = 'Configuration page';
            $data['clg_id'] = $clg_id;
            $this->load->view('header');
            $this->load->view('fields',$data);
            $this->load->view('footer.php');
        }

        public function get_configurations()
        {
            $this->load->library('form_validation');
            $this->load->model('Configuration_Model');
            $this->load->model('College_Model');

            $this->form_validation->set_rules('field_label', 'Field Label', 'trim|required');
            $this->form_validation->set_rules('post_name', 'Post Name', 'trim|required');
            $this->form_validation->set_rules('input_type', 'Input Type', 'trim|required');
            $this->form_validation->set_rules('size_length', 'Size/Length', 'trim');
            //$this->form_validation->set_rules('dropdown_option_name[]', 'Dropdown Option Name', 'required');
            //$this->form_validation->set_rules('dropdown_option_value[]', 'Dropdown Option Value', 'required');
            $this->form_validation->set_rules('is_required', 'Required', 'trim');
            $this->form_validation->set_rules('priority', 'Priority', 'trim|required|integer|greater_than_equal_to[1]');


            if($this->form_validation->run() === FALSE)
            {
                $data['clg_id'] = $this->input->post('clg_id');
                $this->load->view('header');
                $this->load->view('fields',$data);
                $this->load->view('footer.php');
            } 
            else{
                $action = $this->input->post('action');
                if($action === 'add-more'){
                    $this->Configuration_Model->put_configuration();
                    $data['clg_id'] = $this->input->post('clg_id');
                    redirect('configurations',$data);
                    //die("add-more");
                }else if($action === 'save-configuration'){
                    $this->Configuration_Model->put_configuration();
                    die("success");
                }
            }
        }
    }