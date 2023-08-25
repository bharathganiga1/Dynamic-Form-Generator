<?php 
    class College_Model extends CI_Model{
        public function __construct(){
            $this->load->library('form_validation');
            $this->load->database();
        }

        //get the info from form and put in database table called College
        public function register($enc_password)
        {
            $data = array(
                'clg_name' => $this->input->post('clg_name'),
                'clg_email' => $this->input->post('clg_email'),
                'clg_pass'=>$enc_password
            );

            $this->db->insert('colleges', $data);
            return; //$this->db->insert_id(); // Return the inserted clg_id
        }

        public function login($email,$enc_password) {
            $this->db->where('clg_email', $email);
            $this->db->where('clg_pass', $enc_password);
            $query = $this->db->get('colleges');
        
            if ($query->num_rows() == 1) {
                return $query->row(0)->clg_id;
            } else {
                return false;
            }
        }
        
        
    }