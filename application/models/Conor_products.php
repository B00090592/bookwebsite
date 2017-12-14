<?php

class Conor_products extends CI_Model {

    private $table = 'conor_products';

    function __construct() {
        /* Call the Model constructor */
        parent::__construct();
    }
 
    
        /*
         * Insert New Record
         */
    

    public function insertRecord($formdata, $filename) {
            $this->db->set('isbn', $formdata['product_isbn']);
            $this->db->set('price', $formdata['product_price']);
            $this->db->set('name', $formdata['product_name']);
            $this->db->set('image_name', $filename);
            $this->db->set('description', $formdata['product_description']);
            $this->db->set('featured', $formdata['featured']);
            $this->db->set('vat_type', $formdata['taxtype']);
            $this->db->set('category_id', $formdata['categorytype']);

            $this->db->insert($this->table);
            
        return 1;
        
    }    
    
    
         /*
         * Get list of all products
         */

    public function getAllProducts() {

        $this->db->select('*');
        $this->db->from($this->table);
        $query      =       $this->db->get();

        return $query->result(); 

    }
    

        
         /*
         * Get featured products - max 3
         */

    public function getFeaturedProducts() {

        $this->db->select('*');
        $this->db->where('featured', 'Y');
        $this->db->from($this->table);
        $this->db->order_by('rand()');
        $this->db->limit(1);
        $query      =       $this->db->get();

        return $query->result(); 

    }

    
         /*
         * Get product Record
         */

    public function getProductRecord($product_id) {


        $this->db->select('*');
        $this->db->where('isbn', $product_id);
        $this->db->from($this->table);
        $record      =       $this->db->get()->row(); 

        
        return $record;
    }    
    
    
         /*
         * Get product Records based on category
         */

    public function getCategoryProducts($category_id) {


        $this->db->select('*');
        $this->db->where('category_id', $category_id);
        $this->db->from($this->table);
        $record      =       $this->db->get()->result(); 

        
        return $record;
    }    
        
    
    
    
}
