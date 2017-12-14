<?php

class Conor_visitors extends CI_Model {

    private $table = 'conor_visitors';

    function __construct() {
        /* Call the Model constructor */
        parent::__construct();
    }
 
    
        /*
         * Insert New Record
         */
    

    public function insertRecord($formdata, $filename) {
            $this->db->set('name_id', $formdata['visitors_name_id']);
            $this->db->set('sname', $formdata['visitors_sname']);
            $this->db->set('email', $formdata['visitors_email']);
            $this->db->set('subject', $formdata['visitors_subject']);
            $this->db->set('message', $formdata['visitors_message']);
            

            $this->db->insert($this->table);
            
        return 1;
        
    }    
    
    
         /*
         * Get list of all visitors
         */

    public function getAllVisitors() {

        $this->db->select('*');
        $this->db->from($this->table);
        $query      =       $this->db->get();

        return $query->result(); 

    }  
 
        
    
    
    
}
