<?php

class Conor_customer extends CI_Model {

    private $table = 'conor_customers';

    function __construct() {
        /* Call the Model constructor */
        parent::__construct();
    }



    /*
     * Retrieve Record
     */
    public function getRecords() {

        $CI = & get_instance();

        $userid         =  $CI->session->userdata('user_userid');

        $this->db->select('*');
        $this->db->where('userid', $userid);
        $result = $this->db->get($this->table)->result();


        return $result;
    }


    /*
     * Retrieve Record
     */
    public function filterRecords($formData) {

        $CI = & get_instance();
        
  
        $userid         =  $CI->session->userdata('user_userid');

        $this->db->select('*');
        $this->db->where('userid', $userid);
        
        if($formData['customer_ref'] != '' ){
            $this->db->like('customer_ref', $formData['customer_ref']);            
        }    
                
        if($formData['customer_name'] != '' ){
            $this->db->like('customer_name', $formData['customer_name']);            
        }    
                
        if($formData['contact_phone'] != '' ){
            $this->db->like('contact_phone', $formData['contact_phone']);            
        }    
                
        if($formData['contact_email'] != '' ){
            $this->db->like('contact_email', $formData['contact_email']);            
        }    
                
        if($formData['contact_name'] != '' ){
            $this->db->like('contact_name', $formData['contact_name']);            
        }    
        

        $result = $this->db->get($this->table)->result();


        return $result;
    }


    /*
     * Retrieve Record
     */
    public function getRecord($customerID) {

        $CI = & get_instance();

        $userid         =  $CI->session->userdata('user_userid');

        $this->db->select('*');
        $this->db->where('userid', $userid);
        $this->db->where('customer_id', $customerID);
        $result = $this->db->get($this->table)->result();

        return $result;
    }

    /*
     * Retrieve Record
     */
    public function getIdAndName() {

        $CI = & get_instance();

        $userid         =  $CI->session->userdata('user_userid');

        $this->db->select('customer_id, customer_name');
        $this->db->where('userid', $userid);
        $result = $this->db->get($this->table)->result();


        return $result;
    }

    public function insertRecord($formData) {


        $CI = & get_instance();

        $userid = $CI->session->userdata('user_userid');
        //$uData          =   '';

                
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
                
                $customer_ref       =   strtoupper($formData['customer_ref']);
        
            $this->db->set('customer_id', $id_reference);
            $this->db->set('customer_name', $formData['customer_name']);
            $this->db->set('customer_address1', $formData['cline1']);
            $this->db->set('customer_address2', $formData['cline2']);
            $this->db->set('customer_address3', $formData['cline3']);
            $this->db->set('customer_address4', $formData['cline4']);
            $this->db->set('customer_address5', $formData['cline5']);
            $this->db->set('customer_address6', $formData['cline6']);
            $this->db->set('customer_address7', $formData['cline7']);
            $this->db->set('contact_name', $formData['customer_contact_name']);
            $this->db->set('contact_phone', $formData['customer_contact_phone']);
            $this->db->set('contact_email', $formData['customer_contact_email']);
            $this->db->set('userid', $userid);
            $this->db->set('customer_ref', $customer_ref);

            $this->db->insert($this->table);


        return 1;
    }



    public function updateRecord($formData) {

        $CI = & get_instance();

        $userid         =  $CI->session->userdata('user_userid');
        $uData          =   '';

        $customer_ref       =   strtoupper($formData['customer_ref']);
        
        $udata = array(
          'customer_name'           =>  $formData['customer_name'],
          'customer_address1'       =>  $formData['cline1'],
          'customer_address2'       =>  $formData['cline2'],
          'customer_address3'       =>  $formData['cline3'],
          'customer_address4'       =>  $formData['cline4'],
          'customer_address5'       =>  $formData['cline5'],
          'customer_address6'       =>  $formData['cline6'],
          'customer_address7'       =>  $formData['cline7'],
          'contact_name'            =>  $formData['customer_contact_name'],
          'contact_phone'           =>  $formData['customer_contact_phone'],
          'contact_email'           =>  $formData['customer_contact_email'],
          'customer_ref'            =>  $customer_ref,
        );

        $this->db->where('userid', $userid);
        $this->db->where('customer_id', $formData['customerID']);
        $query = $this->db->update($this->table, $udata);

        return 1;
    }
    
    
    
    /*
     * Function to update the customer current balance only
     */


    public function updateCustomerBalance($customer_id, $new_customer_balance) {

        $CI = & get_instance();

        $userid         =  $CI->session->userdata('user_userid');
        $uData          =   '';
        
        $udata = array(
          'customer_outstanding_amount'           =>  $new_customer_balance,
        );

        $this->db->where('userid', $userid);
        $this->db->where('customer_id', $customer_id);
        $query = $this->db->update($this->table, $udata);

        return 1;
    }

    
    
    
    public function deleteRecord($customerID) {

        $CI = & get_instance();

        $userid         =  $CI->session->userdata('user_userid');

        $this->db->where('customer_id',$customerID);
        $this->db->set('userid', $userid);
        $this->db->delete($this->table);
        return 1;
    }


}
