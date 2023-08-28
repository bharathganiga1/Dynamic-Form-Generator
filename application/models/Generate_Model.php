<?php
    class Generate_Model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_configurations_by_clg_id($clg_id) {
            $query = $this->db->get_where('configurations', array('clg_id' => $clg_id));
            return $query->result_array();
        }

        
    }
?>
