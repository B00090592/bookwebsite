<?php

class Conor_cart extends CI_Model {

    private $table = 'conor_cart';

    function __construct() {
        /* Call the Model constructor */
        parent::__construct();
    }
 

    
    
    
        /*
         * Insert New Record
         */

    public function insertRecord($record, $quantity, $userid) {

        $product_amount  = round($record->price * $quantity);
        

                $id_reference = '';

                mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
                                                $charid = strtoupper(md5(uniqid(rand(), true)));
                                                $hyphen = chr(45);// "-"
                                                $id_reference = chr(123)// "{"
                                                        .substr($charid, 0, 4).$hyphen
                                                        .substr($charid, 4, 4).$hyphen
                                                        .substr($charid, 8, 4).$hyphen
                                                        .substr($charid,12, 4).$hyphen
                                                        .substr($charid,16, 4);

                $id_reference = substr($id_reference, 1, 24);
                
          
            $this->db->set('Identifier', $id_reference);
            $this->db->set('userid', $userid);
            $this->db->set('product_id', $record->isbn);
            $this->db->set('product_price', $record->price);
            $this->db->set('product_name', $record->name);
            $this->db->set('product_image', $record->image_name);
            $this->db->set('product_qty', $quantity);
            $this->db->set('product_amount', $product_amount);

            
            $this->db->insert($this->table);
        
            return 1;
        
    }    
    

    
         /*
         * Get list of all cart records
         */

    public function getAllRecords($userid) {

        
        $this->db->select('*');
        $this->db->where('userid', $userid);
        $this->db->from($this->table);
        $query      =       $this->db->get();

        return $query->result(); 

    }
    
    
}
