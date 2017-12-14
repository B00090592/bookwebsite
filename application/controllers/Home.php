<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
        // If no unique session ID we create one   
            if ($this->session->userdata('visitor_id') == '') {


                    $visitor_reference          =           '';

                    mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
                                                    $charid = strtoupper(md5(uniqid(rand(), true)));
                                                    $hyphen = chr(45);// "-"
                                                    $visitor_reference = chr(123)// "{"
                                                            .substr($charid, 0, 4).$hyphen
                                                            .substr($charid, 4, 4).$hyphen
                                                            .substr($charid, 8, 4).$hyphen
                                                            .substr($charid,12, 4).$hyphen
                                                            .substr($charid,16, 4);

                    $visitor_reference = substr($visitor_reference, 1, 24);            
                    $this->session->set_userdata(array('visitor_id' => $visitor_reference ));
            }    
       
                $session_values     =   $this->session->all_userdata();
                $visitor_id         =   $session_values['visitor_id'];                
               

                $this->load->model('conor_categories');
                $session_values['current_categories'] = $this->conor_categories->getAllCategories();

                $this->load->model('conor_cart');
                $session_values['cart_contents'] = $this->conor_cart->getAllRecords($visitor_id);
         

                $this->load->model('conor_products');
                $session_values['featured_products'] = $this->conor_products->getFeaturedProducts();

         

                $data['header'] = $this->load->view('/blocks/front_header', $session_values, true);
                $data['footer'] = $this->load->view('/blocks/front_footer', $session_values, true);
                $data['navigation'] = $this->load->view('/blocks/front_nav', $session_values, true);
                $data['left'] = $this->load->view('/blocks/front_left', $session_values, true);
                $data['html_content'] = $this->load->view('/blocks/frontend/front_page', $session_values, true);
                
        //        $data['category_navigation'] =   $this->load->view('/blocks/dashboard/section_navigation', $session_values, true);
        //        $data['page_content']     =   $this->load->view('/blocks/dashboard/downloads_forms', $session_values, true);

                $this->load->view('/home', $data);
                
        
            
        }
            

/*
 * Display Dynamic Pages
 */        
        
        /*
        * This is where the basic pages are generated by database.
        */
	public function page($page_id)
	{
            
           if($page_id == '') {
               print 'Error - no page id requested.';
               exit;
           }
           
        // If no unique session ID we create one   
            if ($this->session->userdata('visitor_id') == '') {


                    $visitor_reference          =           '';

                    mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
                                                    $charid = strtoupper(md5(uniqid(rand(), true)));
                                                    $hyphen = chr(45);// "-"
                                                    $visitor_reference = chr(123)// "{"
                                                            .substr($charid, 0, 4).$hyphen
                                                            .substr($charid, 4, 4).$hyphen
                                                            .substr($charid, 8, 4).$hyphen
                                                            .substr($charid,12, 4).$hyphen
                                                            .substr($charid,16, 4);

                    $visitor_reference = substr($visitor_reference, 1, 24);            
                    $this->session->set_userdata(array('visitor_id' => $visitor_reference ));
            }    
       
                $session_values     =   $this->session->all_userdata();
                $visitor_id         =   $session_values['visitor_id'];                
               

                $this->load->model('conor_categories');
                $session_values['current_categories'] = $this->conor_categories->getAllCategories();

                $this->load->model('conor_cart');
                $session_values['cart_contents'] = $this->conor_cart->getAllRecords($visitor_id);
         

                $this->load->model('conor_pages');
                $session_values['page_content'] = $this->conor_pages->getPageRecord($page_id);
                
                

                $data['header'] = $this->load->view('/blocks/front_header', $session_values, true);
                $data['footer'] = $this->load->view('/blocks/front_footer', $session_values, true);
                $data['navigation'] = $this->load->view('/blocks/front_nav', $session_values, true);
                $data['left'] = $this->load->view('/blocks/front_left', $session_values, true);
                $data['html_content'] = $this->load->view('/blocks/frontend/general_pages', $session_values, true);
                
        //        $data['category_navigation'] =   $this->load->view('/blocks/dashboard/section_navigation', $session_values, true);
        //        $data['page_content']     =   $this->load->view('/blocks/dashboard/downloads_forms', $session_values, true);

                $this->load->view('/home', $data);
                
        
            
        }
            

/*
 * Display Newsletter Page
 */        
        
        
	public function newsletter()
	{
            
 
           
        // If no unique session ID we create one   
            if ($this->session->userdata('visitor_id') == '') {


                    $visitor_reference          =           '';

                    mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
                                                    $charid = strtoupper(md5(uniqid(rand(), true)));
                                                    $hyphen = chr(45);// "-"
                                                    $visitor_reference = chr(123)// "{"
                                                            .substr($charid, 0, 4).$hyphen
                                                            .substr($charid, 4, 4).$hyphen
                                                            .substr($charid, 8, 4).$hyphen
                                                            .substr($charid,12, 4).$hyphen
                                                            .substr($charid,16, 4);

                    $visitor_reference = substr($visitor_reference, 1, 24);            
                    $this->session->set_userdata(array('visitor_id' => $visitor_reference ));
            }    
       
                $session_values     =   $this->session->all_userdata();
                $visitor_id         =   $session_values['visitor_id'];                
               

                $this->load->model('conor_categories');
                $session_values['current_categories'] = $this->conor_categories->getAllCategories();

                $this->load->model('conor_cart');
                $session_values['cart_contents'] = $this->conor_cart->getAllRecords($visitor_id);
         

                
                

                $data['header'] = $this->load->view('/blocks/front_header', $session_values, true);
                $data['footer'] = $this->load->view('/blocks/front_footer', $session_values, true);
                $data['navigation'] = $this->load->view('/blocks/front_nav', $session_values, true);
                $data['left'] = $this->load->view('/blocks/front_left', $session_values, true);
                $data['html_content'] = $this->load->view('/blocks/frontend/newsletter_page', $session_values, true);
    
                $this->load->view('/home', $data);
                
        
            
        }
            	
/*
 * Display Newsletter Page
 */        
        
        
	public function newsletter_send()
	{
            
 
           
        // If no unique session ID we create one   
            if ($this->session->userdata('visitor_id') == '') {


                    $visitor_reference          =           '';

                    mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
                                                    $charid = strtoupper(md5(uniqid(rand(), true)));
                                                    $hyphen = chr(45);// "-"
                                                    $visitor_reference = chr(123)// "{"
                                                            .substr($charid, 0, 4).$hyphen
                                                            .substr($charid, 4, 4).$hyphen
                                                            .substr($charid, 8, 4).$hyphen
                                                            .substr($charid,12, 4).$hyphen
                                                            .substr($charid,16, 4);

                    $visitor_reference = substr($visitor_reference, 1, 24);            
                    $this->session->set_userdata(array('visitor_id' => $visitor_reference ));
            }    
       
                $session_values     =   $this->session->all_userdata();
                $visitor_id         =   $session_values['visitor_id'];      
                
                
               

                $this->load->model('conor_categories');
                $session_values['current_categories'] = $this->conor_categories->getAllCategories();

                $this->load->model('conor_cart');
                $session_values['cart_contents'] = $this->conor_cart->getAllRecords($visitor_id);
                
            
                // INSERT INTO VISITORS TABLE CONTACT FORM INFORMATION
                
                
                
                $this->form_validation->set_rules('visitors_name_id', 'name_id', 'trim|required|min_length[1]|max_length[40]');
                $this->form_validation->set_rules('visitors_name', 'sname', 'trim|required|min_length[1]|max_length[240]');
                $this->form_validation->set_rules('visitors_email', 'email', 'trim|required|min_length[1]|max_length[240]');
                $this->form_validation->set_rules('visitors_subject', 'subject', 'trim|required|min_length[1]|max_length[240]');
                $this->form_validation->set_rules('visitors_message', 'message', 'trim|required|min_length[1]|max_length[500]');
                
                
                
                
     
                $data['header'] = $this->load->view('/blocks/front_header', $session_values, true);
                $data['footer'] = $this->load->view('/blocks/front_footer', $session_values, true);
                $data['navigation'] = $this->load->view('/blocks/front_nav', $session_values, true);
                $data['left'] = $this->load->view('/blocks/front_left', $session_values, true);
                $data['html_content'] = $this->load->view('/blocks/frontend/newsletter_confirmation', $session_values, true);
    
                $this->load->view('/home', $data);
                
        
            
        }
            	        
}
