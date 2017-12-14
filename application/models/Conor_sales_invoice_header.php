<?php

class Conor_sales_invoice_header extends CI_Model {

    private $table = 'conor_sales_invoice_header';

    function __construct() {
        /* Call the Model constructor */
        parent::__construct();
    }


    
    
    /*
     * Retrieve Record
     */
    public function getRecord($salesInvoiceID) { 

        $CI = & get_instance();

        $userid         =  $CI->session->userdata('user_userid');

        $this->db->select('*, DATE_FORMAT(sih_date,"%d/%m/%Y") as idate');
        $this->db->where('sih_userid', $userid);
        $this->db->where('sih_id', $salesInvoiceID);
        $result = $this->db->get($this->table)->result();

        return $result;
    }

    
    /*
     * Update Closing Balance
     */
    

    public function updateClosingBalance($customerID) {


        $CI = & get_instance();

        $userid             =               $CI->session->userdata('user_userid');
        
        $this->db->select_sum('sih_invoice_owed');
        $this->db->where('sih_userid', $userid);
        $this->db->where('sih_customer', $customerID);
        $result = $this->db->get($this->table)->result();
        
        if($result){
            // Update Customer
            
            $amount     =   $result[0]->sih_invoice_owed;

            
            $udata = array(
                'customer_outstanding_amount'            =>  $amount,
            );

            $this->db->where('userid', $userid);
            $this->db->where('customer_id', $customerID);
            $query = $this->db->update('micro_customers', $udata);
            
            
        }

                
                
        
        
        return 1;
    }
    
    
    
    /*
     * Insert Invoice Sales Invoice Header
     */
    
    public function insertRecord($formData) {

        $CI = & get_instance();

        $userid             =               $CI->session->userdata('user_userid');
                
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
              

        $d = $formData['invoicedate'];
        $d = str_replace('/','-',$d);
        $invoice_date = date('Y-m-d' , strtotime($d));

        // Get Last Invoice ID
        
        $this->db->select('max(sih_number) + 1 as next_inv_num');
        $this->db->where('sih_userid', $userid);
        $array = $this->db->get($this->table)->result();
       

        $next_invoice_number = $array[0]->next_inv_num;
        if($next_invoice_number == '') {$next_invoice_number = 6000;}
    

        
        
            $this->db->set('sih_id', $id_reference);
            $this->db->set('sih_number', $next_invoice_number);
            $this->db->set('sih_userid', $userid);
            $this->db->set('sih_date', $invoice_date);
            $this->db->set('sih_customer', $formData['customer']);
            $this->db->set('sih_gas', $formData['gas']);
            $this->db->set('sih_fas', $formData['fas']);
            $this->db->set('sih_timestamp', 'NOW()', FALSE);
            $this->db->insert($this->table);


            return  $id_reference;
    }

    /*
     * Update Invoice Header
     */
    


    public function updateRecord($formData) {


        $CI = & get_instance();

        $userid             =               $CI->session->userdata('user_userid');
                
        $id_reference = '';

        $d = $formData['invoicedate'];
        $d = str_replace('/','-',$d);
        $invoice_date = date('Y-m-d' , strtotime($d));

        
        
        $udata = array(

            'sih_date    '            =>  $invoice_date,
            'sih_customer'            =>  $formData['customer'],
            'sih_gas'                 =>  $formData['gas'],
            'sih_fas'                 =>  $formData['fas'],
        );

        $this->db->where('sih_userid', $userid);
        $this->db->where('sih_id', $formData['salesInvoiceID']);
        $query = $this->db->update($this->table, $udata);
        return 1;
    }
    
    

    /*
     * Update Amounts for Invoice
     */
    
    
    public function updateHeaderAmounts($invoiceID, $total_net_amount, $total_gross_amount, $total_vat_amount) {


        $CI = & get_instance();

        $userid         =  $CI->session->userdata('user_userid');
        
        $uData          =   '';


        $udata = array(
            'sih_gross_amount'          =>  $total_gross_amount,
            'sih_invoice_amount'        =>  $total_net_amount,
            'sih_invoice_vat'           =>  $total_vat_amount,
            'sih_invoice_owed'          =>  $total_net_amount,

        );

        $this->db->where('sih_userid', $userid);
        $this->db->where('sih_id', $invoiceID);
        $query = $this->db->update($this->table, $udata);
        return 1;
    }
    
    
    
    /*
     * Update Receipt into Invoice Header
     */
    
    
    public function updateReceipt($header_id, $new_discount_rec, $new_amount_paid, $new_amount_owing) {

      $CI = & get_instance();

      $userid         =  $CI->session->userdata('user_userid');
      $udata = array(
          'sih_discount'                =>  $new_discount_rec,
          'sih_invoice_paid'            =>  $new_amount_paid,
          'sih_invoice_owed'            =>  $new_amount_owing,
        );
      $this->db->where('sih_userid', $userid);
      $this->db->where('sih_id', $header_id);
      $query = $this->db->update($this->table, $udata);


      return $query;
    }
    
    
    
  /*
   * Get Listing of  Invoice Headers
   */  
    
        /*
     * Retrieve Record
     */
    public function getRecords($formData) {

        $CI = & get_instance();

        $userid         =  $CI->session->userdata('user_userid');

        $this->db->select('*');
        $this->db->from('micro_sales_invoice_header');
        $this->db->join('micro_customers', 'micro_customers.customer_id = micro_sales_invoice_header.sih_customer');
        $this->db->where('micro_sales_invoice_header.sih_userid', $userid);
        
        
        if($formData['sih_number'] != '' ){
            $this->db->like('micro_sales_invoice_header.sih_number', $formData['sih_number']);            
        }    
                
        if($formData['customer_name'] != '' ){
            $this->db->like('micro_customers.customer_name', $formData['customer_name']);            
        }    
                    
        
        
        $this->db->order_by('micro_sales_invoice_header.sih_number', DESC);        
        $result = $this->db->get()->result();


        return $result;
    }
    
    
    
    

    
     /*
     * Retrieve Record Outstaning by Customer
     */
    
    public function getOustandingAmountsByCustomer($customerID) {

        $CI = & get_instance();

        $userid         =  $CI->session->userdata('user_userid');

        $this->db->select('*');
        $this->db->from('micro_sales_invoice_header');
        $this->db->where('micro_sales_invoice_header.sih_userid', $userid);
        $this->db->where('micro_sales_invoice_header.sih_customer', $customerID);
        $this->db->join('micro_sales_invoice_lines', 'micro_sales_invoice_lines.sil_header_id = micro_sales_invoice_header.sih_id', 'left'); 
        $this->db->where('micro_sales_invoice_lines.sil_amount_owing >', '0.00');
        $this->db->order_by('micro_sales_invoice_header.sih_number', ASC);        

        $result = $this->db->get()->result();

        return $result;
    }
        
        
    
    
    


    public function getTableRecords() {

      $CI = & get_instance();

      $userid =  $CI->session->userdata('user_userid');

      $sql = "select s.sales_invoice_id, s.invoice_number, s.invoice_date, c.customer_name,s.gov_agency_sale, s.fixed_asset_sale,il.net_amount, il.vat_amount, il.gross_amount, il.amount_paid from micro_sales_invoice as s inner join (select l.sales_invoice_number, l.userid, SUM(l.quantity * l.rate) as net_amount,SUM((l.quantity * l.rate) * (l.VAT_rate/100)) as vat_amount, SUM( (l.quantity * l.rate) + ( (l.quantity * l.rate) * (l.VAT_rate /100) ) ) as gross_amount, case when p.payment is null then 0 else p.payment end as amount_paid from micro_sales_invoice_lines as l left outer join (select invoice_number, userid, sum(payment_amount) as payment from micro_payments where userid = ? group BY invoice_number,userid) p on p.invoice_number = l.sales_invoice_number and p.userid = l.userid where l.userid = ? group by l.sales_invoice_number, l.userid) il on s.invoice_number = il.sales_invoice_number and s.userid = il.userid inner join micro_customers as c on c.customer_id = s.customer_id left outer join micro_payments as p on p.invoice_number = s.invoice_number and p.userid = s.userid where s.userid = ? group by s.sales_invoice_id, s.invoice_number, s.invoice_date, c.customer_name, s.gov_agency_sale, s.fixed_asset_sale";
      $query = $this->db->query($sql, array($userid, $userid, $userid));
      /*$this->db->select('s.sales_invoice_id, s.invoice_number, s.invoice_date, c.customer_name,
      s.gov_agency_sale, s.fixed_asset_sale, SUM(l.quantity * l.rate) as net_amount,
      SUM((l.quantity * l.rate) * (l.VAT_rate/100)) as vat_amount,
      SUM( (l.quantity * l.rate) + ( (l.quantity * l.rate) * (l.VAT_rate/100) ) ) as gross_amount,
      SUM(p.payment_amount) as amount_paid')
         ->from($this->table . ' as s')
         ->join('micro_sales_invoice_lines as l', 'l.sales_invoice_number = s.invoice_number and l.userid = s.userid')
         ->join('micro_customers as c', 'c.customer_id = s.customer_id')
         ->join('micro_payments as p', 'p.invoice_number = s.invoice_number and p.userid = s.userid', 'LEFT OUTER')
         ->where('s.userid', $userid)
         ->group_by('s.sales_invoice_id, s.invoice_number, s.invoice_date, c.customer_name, s.gov_agency_sale, s.fixed_asset_sale');
         */
        //$result = $this->db->get()->result();
        return $query->result_object();




        /*$this->db->select('user_id, COUNT(user_id) as total');
$this->db->group_by('user_id');
$this->db->order_by('total', 'desc');
$this->db->get('tablename', 10);*/
    }


    public function filterTableRecords() {

    $CI = & get_instance();

    $userid =  $CI->session->userdata('user_userid');

    $sql = "select s.sales_invoice_id, s.invoice_number, DATE_FORMAT(s.invoice_date, '%D %b %Y') as formatted_date, c.customer_name,s.gov_agency_sale, s.fixed_asset_sale, TRUNCATE(il.net_amount,2) AS formatted_net_amount, TRUNCATE(il.vat_amount,2) AS formatted_vat_amount, TRUNCATE(il.gross_amount,2) AS formatted_gross_amount, TRUNCATE(il.amount_paid,2) AS formatted_paid_amount from micro_sales_invoice as s inner join (select l.sales_invoice_number, l.userid, SUM(l.quantity * l.rate) as net_amount,SUM((l.quantity * l.rate) * (l.VAT_rate/100)) as vat_amount, SUM( (l.quantity * l.rate) + ( (l.quantity * l.rate) * (l.VAT_rate /100) ) ) as gross_amount, case when p.payment is null then 0 else p.payment end as amount_paid from micro_sales_invoice_lines as l left outer join (select invoice_number, userid, sum(payment_amount) as payment from micro_payments where userid = ? group BY invoice_number,userid) p on p.invoice_number = l.sales_invoice_number and p.userid = l.userid where l.userid = ? group by l.sales_invoice_number, l.userid) il on s.invoice_number = il.sales_invoice_number and s.userid = il.userid inner join micro_customers as c on c.customer_id = s.customer_id left outer join micro_payments as p on p.invoice_number = s.invoice_number and p.userid = s.userid where s.userid = ? group by s.sales_invoice_id, s.invoice_number, s.invoice_date, c.customer_name, s.gov_agency_sale, s.fixed_asset_sale";
    $query = $this->db->query($sql, array($userid, $userid, $userid));
  
    return $query->result_object();



    }

    


    public function deleteRecord($invoiceID) {


        $CI = & get_instance();

        $userid         =  $CI->session->userdata('user_userid');
        $uData          =   '';

        $this->db->where('sales_invoice_id',$invoiceID);
        $this->db->set('userid', $userid);
        $this->db->delete($this->table);


        return 1;
    }

}
