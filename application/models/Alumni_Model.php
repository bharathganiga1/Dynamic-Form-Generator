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
            
        }
        
    }