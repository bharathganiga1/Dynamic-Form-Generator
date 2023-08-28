<?php 
    class Configurations extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('Configuration_Model');
            $this->load->model('Generate_Model');
        }
        public function index($clg_id = null)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('Home/login');
            }
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
            $this->form_validation->set_rules('option_value[]', 'Dropdown Option Value', 'trim');
            $this->form_validation->set_rules('is_required', 'Required', 'trim');

            //to send one controller to another
            $clg_id = $this->input->post('clg_id');
            if($this->form_validation->run() === FALSE)
            {
                //error_log("validation fails");
                $data['clg_id'] = $this->input->post('clg_id');
                $this->load->view('header');
                $this->load->view('fields',$data);
                $this->load->view('footer.php');
            } 
            else{
                $action = $this->input->post('action');
                if($action === 'add-more'){
                    $this->Configuration_Model->put_configuration();
                    redirect('configurations/index/' . $clg_id);
                    //die("add-more");
                }else if($action === 'save-configuration'){
                    $this->Configuration_Model->put_configuration();
                    redirect('Generates/index/' . $clg_id);
                }
            }
        }
        public function edit_Priority($clg_id){
            $data['clg_id'] = $clg_id;
            $data['configurations'] = $this->Generate_Model->get_configurations_by_clg_id($clg_id);
            $action = $this->input->post('action');

            if($action === 'edit'){
                $this->load->view('header');
                $this->load->view('/edit',$data);
                $this->load->view('footer.php');
            }else{
                redirect('home');
            }
        }
        public function update_priorities($clg_id) {
            $submitted_priorities = $this->input->post('priority');
        
            foreach ($submitted_priorities as $config_id => $priority) {
                $this->Configuration_Model->update_priority($config_id, $priority);
            }
        
            redirect('Generates/index/' . $clg_id); 
        }
        
    }