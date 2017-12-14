<?php

class Conor_user extends CI_Model {

    private $table = 'conor_user';

    function __construct() {
        /* Call the Model constructor */
        parent::__construct();
        $this->load->library('encrypt');
    }
 


        /*
         * check if user exists
         */

    public function authenticateUser($userName, $encryptedPassword) {


        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('sha256_password', $encryptedPassword);
        $this->db->where('username', $userName);
        $query      =       $this->db->get();
        
        if ($query->num_rows() == 1)
        {
            return $query->row(); 
        }
        else 
        {
            return 0; //Add some logic to handle if there are zero results
        }        
    }
    
        
         /*
         * Get page record
         */

    public function getUserRecord($id) {

        $this->db->select('*');
        $this->db->where('userid', $id);
        $this->db->from($this->table);
        $record      =       $this->db->get()->row();

        return $record; 

    }
    
        /*
         * Get last inported record userid
         */

    public function getLastID() {

        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('userid', desc);
        $this->db->limit('1');
        $record      =       $this->db->get()->row();

        return $record->userid;
        
    }    
    
    
        /*
         * Insert New Record
         */

    public function insertRecord($username, $encryptedPassword, $userType, $new_userid) {

        
            $this->db->set('userid', $new_userid);
            $this->db->set('username', $username);
            $this->db->set('type', $userType);
            $this->db->set('sha256_password', $encryptedPassword);

            $this->db->insert($this->table);
            
        return 1;
        
    }    
    
    
         /*
         * Get list of all users
         */

    public function getAllUsers() {

        $this->db->select('*');
        $this->db->from($this->table);
        $query      =       $this->db->get();

            return $query->result(); 

    }
    
    
    
    /*
     * Update Record 
     */

    public function updateRecord($inputUsername, $encryptedPassword, $inputType, $userid) {
        
            $data = array();
            $data['username']   =  $inputUsername;
            $data['type']       =  $inputType;
            
            // If we have a value for password we update this field also.
            
            if($encryptedPassword != ''){
                $data['sha256_password'] =  $encryptedPassword;
            }    
                
            $this->db->where('userid',  $userid);
            $this->db->update($this->table, $data);            
        
            return 1;
    }
        
        
    /*
     * Delete Record 
     */

    public function deleteRecord($userid) {

            $this->db->where('userid',  $userid);
            $this->db->delete($this->table);            
        
            return 1;
    }
        
    



    
    
}
