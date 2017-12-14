<?php

class Conor_nationality extends CI_Model {

    private $table = 'conor_nationality';

    function __construct() {
        /* Call the Model constructor */
        parent::__construct();
        $this->load->library('encrypt');
    }

        /*
         * If no session has been set - we create one
         */

    public function getRecords() {

        $this->db->select('*');
        $query = $this->db->get($this->table);
        return $query->result();
    
        
    }


    
    
    

}
