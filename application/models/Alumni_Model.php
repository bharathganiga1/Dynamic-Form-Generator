<?php 
    class Alumni_Model extends CI_Model{
        public function __construct(){
            $this->load->library('form_validation');
            $this->load->database();
        }
        public function alumni_register($enc_password)
        {
            $data = array(
                'alumni_name' => $this->input->post('alumni_name'),
                'clg_id' =>$this->input->post('clg_id'),
                'alumni_email' => $this->input->post('alumni_email'),
                'alumni_pass'=>$enc_password
            );

            $this->db->insert('alumni', $data);
            return; //$this->db->insert_id(); // Return the inserted clg_id
        }
        public function alumni_login($email, $enc_password) {
            $this->db->where('alumni_email', $email);
            $this->db->where('alumni_pass', $enc_password);
            $query = $this->db->get('alumni');
        
            if ($query->num_rows() == 1) {
                $alumni_data = array(
                    'alumni_id' => $query->row(0)->alumni_id,
                    'clg_id' => $query->row(0)->clg_id 
                );
                return $alumni_data;
            } else {
                return false;
            }
        }
        public function store_alumni_data($alumni_id,$clg_id, $data) {
            // Fetch existing data for the alumni
            $alumni = $this->db->get_where('alumni', array('alumni_id' => $alumni_id))->row();
        
            if ($alumni) {
                $alumni_data = array();
        
                $configurations =$this->Generate_Model->get_configurations_by_clg_id($clg_id);
                foreach ($configurations as $configuration) {
                    $post_name = $configuration['post_name'];
                    $options = json_decode($configuration['options'], true);
                    if (isset($data[$post_name])){


                        //dropdown and radio button select only one index
                        if($configuration['input_type'] === 'Dropdown' || $configuration['input_type'] === 'Radio'){
                            $selected_index = $data[$post_name];
                            
                            if (isset($options[$selected_index])) {
                                $alumni_data[$post_name] = $options[$selected_index];
                            }
                        }else if($configuration['input_type'] === 'Checkbox'){//getting values for checkbox
                            $selected_options = array();
                            $selected_values = isset($data[$post_name]) ? $data[$post_name] : array();

                            foreach ($selected_values as $selected_value) {
                                if (isset($options[$selected_value])) {
                                    $selected_options[] = $options[$selected_value];
                                }
                            }   
                            $alumni_data[$post_name] = $selected_options;
                        }else{
                            $alumni_data[$post_name] = $data[$post_name];
                        }
                    }  
                }
        
                $this->db->where('alumni_id', $alumni_id);
                $this->db->update('alumni', $alumni_data);
        
                return true;
            }
        
            return false;
        }
        
        
    }
    