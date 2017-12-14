<?php

class Conor_taxbands extends CI_Model {

    private $table = 'conor_taxbands';

    function __construct() {
        /* Call the Model constructor */
        parent::__construct();
    }



    /*
     * Retrieve Record
     */
    public function getAllTaxbands() {

        $CI = & get_instance();

        $this->db->select('*');
        $this->db->where('tax_enabled', '1');
        $result = $this->db->get($this->table)->result();


        return $result;
    }



}
