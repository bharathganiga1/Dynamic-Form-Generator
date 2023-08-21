<?php 
    class College_Model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        //get the info from form and put in database table called College
        public function put_college(){
            $data = array(
                'clg_name' => $this->input->post('clg_name'),
                'clg_email' => $this->input->post('clg_email'),
                'clg_phno' => $this->input->post('clg_phno'),
                'clg_adr' => $this->input->post('clg_adr')
            );

            return $this->db->insert('colleges',$data);
        }
    }