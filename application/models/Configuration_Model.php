<?php 
    class Configuration_Model extends CI_Model{
        public function __construct()
        {
            $this->load->database();
        }

        public function put_configuration(){
            $size = $this->input->post('size_length');
            if (empty($size)) {
                $size = 255; // Default value
            }
            $data = array(
                'clg_id' => $this->input->post('clg_id'),
                'field_label' => $this->input->post('field_label'),
                'post_name' => $this->input->post('post_name'),
                'input_type' => $this->input->post('input_type'),
                'size' => $size,
                'is_required' => $this->input->post('is_required') ? 1 : 0,
                'dropdown' => $this->prepareDropdownOptions(),
                'priority' => $this->input->post('priority')
            );
        
            return $this->db->insert('configurations', $data);
        }
        

        public function prepareDropdownOptions() {
            $optionNames = $this->input->post('dropdown_option_name');
            $optionValues = $this->input->post('dropdown_option_value');
            $dropdownOptions = array();
        
            if ($optionNames && $optionValues) {
                foreach ($optionNames as $index => $optionName) {
                    $optionValue = isset($optionValues[$index]) ? $optionValues[$index] : '';
                    $dropdownOptions[] = array('name' => $optionName, 'value' => $optionValue);
                }
            }
        
            return json_encode($dropdownOptions);
        }
    }