<?php

class Conor_pages extends CI_Model {

    private $table = 'conor_pages';

    function __construct() {
        /* Call the Model constructor */
        parent::__construct();
        $this->load->library('encrypt');
    }
 


        /*
         * Insert New Record
         */

    public function insertRecord($formData) {

        
            $this->db->set('page_menu_name', $formData['menu_name']);
            $this->db->set('page_title', $formData['page_title']);
            $this->db->set('page_content', $formData['html_content']);
            
            $this->db->insert($this->table);
            
        return 1;
        
    }    
    

         /*
         * Get all pages
         */

    public function getAllPages() {

        $this->db->select('*');
        $this->db->from($this->table);
        $records      =       $this->db->get()->result();


        return $records; 

    }
    
    
         /*
         * Get page record
         */

    public function getPageRecord($id) {

        $this->db->select('*');
        $this->db->where('page_id', $id);
        $this->db->from($this->table);
        $record      =       $this->db->get()->row();

        return $record; 

    }
    
    
    /*
     * Update Record 
     */

    public function updateRecord($formData) {

        $CI = & get_instance();
        
            $this->db->set('page_menu_name', $formData['menu_name']);
            $this->db->set('page_title', $formData['page_title']);
            $this->db->set('page_content', $formData['html_content']);
            
        
        
            $data = array( 'page_menu_name' => $formData['menu_name'], 'page_title' => $formData['page_title'], 'page_content' => $formData['html_content'] );
            $this->db->where('page_id',  $formData['page_id']);
            $this->db->update($this->table, $data);            
        
            return 1;
    }
    
    



    
    
}
