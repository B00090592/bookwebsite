<?php

class Conor_categories extends CI_Model {

    private $table = 'conor_categories';

    function __construct() {
        /* Call the Model constructor */
        parent::__construct();
    }
 
    
    
         /*
         * Get list of all users
         */

    public function getAllCategories() {

        $this->db->select('*');
        $this->db->where('category_enabled', '1');
        $this->db->from($this->table);
        $query      =       $this->db->get();

        return $query->result(); 

    }
    
    
    
         /*
         * Get list of all users
         */

    public function getCategoryRecord($category_id) {

        $this->db->select('*');
        $this->db->where('category_id', $category_id);
        $this->db->from($this->table);
        $record      =       $this->db->get()->row();

        return $record; 

    }    
    
    
    
    
    
}
