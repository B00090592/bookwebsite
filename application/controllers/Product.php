<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {


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
            
        }
            
        
        /*
         * Add Product to Cart
         */

	public function addProduct()
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
            
            
                    // VALIDATE INPUT
                    $this->form_validation->set_rules('qty', 'Quantity', 'trim|required|min_length[1]|max_length[2]integer');
                    $this->form_validation->set_rules('isbn', 'ISBN', 'trim|required|min_length[1]|max_length[50]');

                    if ($this->form_validation->run() == FALSE) {

                        // This is the error generated by codeigniter. With more time I could pass this back to the admin and supply
                        // the user of the specific error.
                        print validation_errors();
                        exit;
                    } else {
                        
                            $quantity       =           $_POST['qty'];
                            $ISBN           =           $_POST['isbn'];
                            
                            // Get Product Details                    
                            $this->load->model('conor_products');
                            $product_record  = $this->conor_products->getProductRecord($ISBN);
                            
                            // Insert into Cart
                            $this->load->model('conor_cart');
                            $this->conor_cart->insertRecord($product_record, $quantity, $visitor_id);
                            
                            $this->cart();

                    }            
                        
        }        
        
        /*
         * Display products based on Category
         */

	public function category()
	{
            
           $category_id         =   $this->uri->segment(3);
           if($category_id == '') {
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
                $session_values['current_categories']   =   $this->conor_categories->getAllCategories();
                $session_values['category_record']      =   $this->conor_categories->getCategoryRecord($category_id);

                $this->load->model('conor_cart');
                $session_values['cart_contents'] = $this->conor_cart->getAllRecords($visitor_id);
         

                $this->load->model('conor_products');
                $session_values['category_products'] = $this->conor_products->getCategoryProducts($category_id);

                
                $data['header'] = $this->load->view('/blocks/front_header', $session_values, true);
                $data['footer'] = $this->load->view('/blocks/front_footer', $session_values, true);
                $data['navigation'] = $this->load->view('/blocks/front_nav', $session_values, true);
                $data['left'] = $this->load->view('/blocks/front_left', $session_values, true);
                
                $data['html_content'] = $this->load->view('/blocks/frontend/category_page', $session_values, true);
                
        //        $data['category_navigation'] =   $this->load->view('/blocks/dashboard/section_navigation', $session_values, true);
        //        $data['page_content']     =   $this->load->view('/blocks/dashboard/downloads_forms', $session_values, true);

                $this->load->view('/home', $data);
                
        
            
        }
            

        
        
	
        /*
         * Display Cart Page
         */
        
	public function cart()
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
                $data['html_content'] = $this->load->view('/blocks/frontend/shopping_cart', $session_values, true);
                
        //        $data['category_navigation'] =   $this->load->view('/blocks/dashboard/section_navigation', $session_values, true);
        //        $data['page_content']     =   $this->load->view('/blocks/dashboard/downloads_forms', $session_values, true);

                $this->load->view('/home', $data);
                
                
        }
        
        
	
        /*
         * Product Checkout
         */
        
	public function checkout()
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
                $data['html_content'] = $this->load->view('/blocks/frontend/checkout', $session_values, true);
                
        //        $data['category_navigation'] =   $this->load->view('/blocks/dashboard/section_navigation', $session_values, true);
        //        $data['page_content']     =   $this->load->view('/blocks/dashboard/downloads_forms', $session_values, true);

                $this->load->view('/home', $data);
                
                
        }
        
        
	
        /*
         * Product confirmation
         */
        
	public function confirmation()
	{        
            // Validation
            
            // Save Record to a shopping_cart table
            
            // Delete everything that is in the cart table for that user
            
            // Display page with message saying thanks for custom.
            
            print 'Great';
            
        }    
                
}
