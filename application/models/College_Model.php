<?php 
    class College_Model extends CI_Model{
        public function __construct(){
            $this->load->library('form_validation');
            $this->load->database();
        }

        //get the info from form and put in database table called College
        public function put_clg($enc_password)
        {
            $data = array(
                'clg_name' => $this->input->post('clg_name'),
                'clg_email' => $this->input->post('clg_email'),
                'clg_pass'=>$enc_password
            );

            $this->db->insert('colleges', $data);
            return; //$this->db->insert_id(); // Return the inserted clg_id
        }
    }