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
        public function store_alumni_data($alumni_id, $data) {
            // Fetch existing data for the alumni
            $alumni = $this->db->get_where('alumni', array('alumni_id' => $alumni_id))->row();
        
            if ($alumni) {
                // Fetch existing data as an associative array or initialize if null
                $existing_data = json_decode($alumni->alumni_data, true);
                if(!$existing_data){
                    $existing_data =array();
                }
        
                // Merge the new data with existing data
                $merged_data = array_merge($existing_data, $data);
        
                // Convert the merged data back to JSON format
                $json_data = json_encode($merged_data);
        
                // Update the alumni table with the new JSON data
                $this->db->where('alumni_id', $alumni_id);
                $this->db->update('alumni', array('alumni_data' => $json_data));
        
                return true;
            }
        
            return false;
        }
        
    }