<?php

class Conor_sales_invoice_lines extends CI_Model {

    private $table = 'conor_sales_invoice_lines';

    function __construct() {
        /* Call the Model constructor */
        parent::__construct();
    }


    

    /*
     * Get Specific Invoice Line
     */
    
    public function getRecord($invoice_line_id) {

        $CI = & get_instance();

        $userid         =  $CI->session->userdata('user_userid');

        $this->db->select('*');
        $this->db->where('sil_userid', $userid);
        $this->db->where('sil_invoice_line_id', $invoice_line_id);
        $result             =       $this->db->get($this->table)->result();
        $record             =       $result[0];
        return $record;
    }

    
    
    /*
     * Retrieve Invoice Lines
     */
    public function getRecords($invoiceID) {

        $CI = & get_instance();

        $userid         =  $CI->session->userdata('user_userid');
        $this->db->select('sil_description as description, sil_quantity as invoice_quantity, sil_price as item_amount,  sil_vat_type as vat_type, sil_net_amount as net_amount, sil_vat_amount as vat_amount, sil_gross_price as gross_amount');

        $this->db->where('sil_userid', $userid);
        $this->db->where('sil_header_id', $invoiceID);
        $result = $this->db->get($this->table)->result();


        return $result;
    }
    
    
    
    /*
     * Insert Invoice Line
     *  
     */
    

    public function insertRecord($invoice_id, $description, $quantity, $item_amount, $gross_amount, $vat_type, $vat_amount, $net_amount, $tax_percentage ) {

        $CI = & get_instance();

            $userid         =  $CI->session->userdata('user_userid');
            
                
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
                

            $this->db->set('sil_header_id', $invoice_id);
            $this->db->set('sil_invoice_line_id', $id_reference);
            $this->db->set('sil_description', $description);
            $this->db->set('sil_quantity', $quantity);
            $this->db->set('sil_price', $item_amount);
            $this->db->set('sil_gross_price', $gross_amount);
            $this->db->set('sil_vat_type', $vat_type);
            $this->db->set('sil_vat_rate', $tax_percentage);
            $this->db->set('sil_vat_amount', $vat_amount);
            $this->db->set('sil_net_amount', $net_amount);
            $this->db->set('sil_amount_owing', $net_amount);
            $this->db->set('sil_userid', $userid);
            $this->db->insert($this->table);

        return $id_reference;
    }



    /*
     * Delete Records
     */
    

    public function deleteRecords($invoice_id) {


        $CI = & get_instance();

        $userid         =  $CI->session->userdata('user_userid');
        $uData          =   '';

        $this->db->where('sil_header_id',$invoice_id);
        $this->db->set('sil_userid', $userid);
        $this->db->delete($this->table);


        return 1;
    }    
    
    
    /*
     * Update Receipt into Invoice Line
     */
    
    
    public function updateReceipt($line_id, $new_discount_rec, $new_amount_paid, $new_amount_owing) {

      $CI = & get_instance();

      $userid         =  $CI->session->userdata('user_userid');
      $udata = array(
          'sil_discount_received'       =>  $new_discount_rec,
          'sil_amount_paid'             =>  $new_amount_paid,
          'sil_amount_owing'            =>  $new_amount_owing,
        );
      $this->db->where('sil_userid', $userid);
      $this->db->where('sil_invoice_line_id', $line_id);
      $query = $this->db->update($this->table, $udata);


      return $query;
    }
    
    
    
    
    
    
    
    
    


}
