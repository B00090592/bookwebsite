<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    /*
     * Display Login Page or Home Page
     * depending on status
     */

    public function index() {
        $this->load->library('session');


        if ($this->session->userdata('user_userid')) {
            if ($this->session->userdata('user_userid') != '') {

                // Load Dashboard

                redirect('/admin/dashboard', 'refresh');
            } else {

                // No session userid value
                $this->load->view('login');
            }
        } else {
            // No session data set


            $this->load->view('login');
        }
    }

    /*
     * Administrator Dashboard
     */

    public function dashboard() {

        $this->load->library('session');


        if ($this->session->userdata('user_userid')) {
            if ($this->session->userdata('user_userid') != '') {


                $user_id = $this->session->userdata('user_userid');
                $user_type = $this->session->userdata('user_type');
                $user_name = $this->session->userdata('user_username');

                $session_values = $this->session->all_userdata();
                $session_values['tabId'] = 1;



                $data['header'] = $this->load->view('/blocks/admin_header', $session_values, true);
                $data['footer'] = $this->load->view('/blocks/admin_footer', $session_values, true);
                $data['navigation'] = $this->load->view('/blocks/admin_nav', $session_values, true);

                $this->load->view('/admin', $data);
            } else {

                // No session userid value
                $this->load->view('login');
            }
        } else {
            // No session data set


            $this->load->view('login');
        }
    }

    /*
     * Configure Users
     */

    public function users() {


        $this->load->library('session');


        if ($this->session->userdata('user_userid')) {
            if ($this->session->userdata('user_userid') != '') {
                if ($this->session->userdata('$user_type') != 'S') {


                    $user_id = $this->session->userdata('user_userid');
                    $user_type = $this->session->userdata('user_type');
                    $user_name = $this->session->userdata('user_username');

                    $session_values = $this->session->all_userdata();
                    $session_values['tabId'] = 2;


                    
                    // Get list of all Users: 

                    $this->load->model('conor_user');
                    $session_values['current_users'] = $this->conor_user->getAllUsers();


                    $data['body_content'] = $this->load->view('/blocks/admin/users', $session_values, true);

                    $data['header'] = $this->load->view('/blocks/admin_header', $session_values, true);
                    $data['footer'] = $this->load->view('/blocks/admin_footer', $session_values, true);
                    $data['navigation'] = $this->load->view('/blocks/admin_nav', $session_values, true);

                    $this->load->view('/admin', $data);
                }
            } else {

                // No session userid value
                $this->load->view('login');
            }
        } else {
            // No session data set


            $this->load->view('login');
        }
    }

    /*
     * Add User
     */

    public function addUser() {


        $this->load->library('session');


        if ($this->session->userdata('user_userid')) {
            if ($this->session->userdata('user_userid') != '') {
                if ($this->session->userdata('$user_type') != 'S') {   // Not a Staff User



                    // VALIDATE INPUT
                    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[40]');
                    $this->form_validation->set_rules('type', 'type', 'trim|required|min_length[1]|max_length[1]');
                    
                    // No validation on password - if an update (user can leave blank and it is not updated).
                    if($_POST['user_id'] == ''){
                        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[40]');
                    }

                    if ($this->form_validation->run() == FALSE) {

                        // This is the error generated by codeigniter. With more time I could pass this back to the admin and supply
                        // the user of the specific error.
                        print validation_errors();
                        exit;
                    } else {

                        $inputUsername  =   trim($this->input->post('username'));
                        $inputPassword  =   trim($this->input->post('password'));
                        $inputType      =   $this->input->post('type');
                        $userid         =   $this->input->post('user_id');
                        
                        $this->load->model('conor_user');

                        if($userid == '') {
                            
                            // We insert a new record
                            
                            $encryptedPassword = sha256Password($inputPassword);

                            // Get Last UserID Value so we can increment 
                            // Have made username unique - so no duplication for user and hassle with password lookup.

                            $last_userid = $this->conor_user->getLastID();
                            $last_userid++;
                            $this->conor_user->insertRecord($inputUsername, $encryptedPassword, $inputType, $last_userid);
                            
                        } else {
                            
                            // We update a record
                            if($inputPassword != ''){
                                // We need to update password
                                $encryptedPassword = sha256Password($inputPassword);

                            }
                                $this->conor_user->updateRecord($inputUsername, $encryptedPassword, $inputType, $userid);
                            
                        }
                        
                        
                        redirect('/admin/users', 'refresh');
                    }
                }
            } else {

                // No session userid value
                $this->load->view('login');
            }
        } else {
            // No session data set


            $this->load->view('login');
        }
    }

    

    /*
     * Add User
     */

    public function deleteUser() {

           $user_id         =   $this->uri->segment(3);
           if($user_id == '') {
               print 'Error - no page id requested.';
               exit;
           }
           
        
        $this->load->library('session');

        if ($this->session->userdata('user_userid')) {
            if ($this->session->userdata('user_userid') != '') {
                if ($this->session->userdata('$user_type') != 'S') {   // Not a Staff User

                        
                        $this->load->model('conor_user');
                        
                   
                        $this->conor_user->deleteRecord($user_id);
                            
                        
                        
                        redirect('/admin/users', 'refresh');
                    
                }
            } else {

                // No session userid value
                $this->load->view('login');
            }
        } else {
            // No session data set


            $this->load->view('login');
        }
    }
    

    /*
     * Edit Page
     */

    public function edituser() {

           $user_id         =   $this->uri->segment(3);
           if($user_id == '') {
               print 'Error - no page id requested.';
               exit;
           }
           
        

        $this->load->library('session');


        if ($this->session->userdata('user_userid')) {
            if ($this->session->userdata('user_userid') != '') {

        
                $session_values = $this->session->all_userdata();
                $session_values['tabId'] = 2;


                    $this->load->model('conor_user');
    
                    // Get User Records
                    
                    $session_values['user_record'] = $this->conor_user->getUserRecord($user_id);


                    // Get list of all Users: 

                    $session_values['current_users'] = $this->conor_user->getAllUsers();


                    $data['body_content'] = $this->load->view('/blocks/admin/users', $session_values, true);

                    $data['header'] = $this->load->view('/blocks/admin_header', $session_values, true);
                    $data['footer'] = $this->load->view('/blocks/admin_footer', $session_values, true);
                    $data['navigation'] = $this->load->view('/blocks/admin_nav', $session_values, true);




                $this->load->view('/admin', $data);
            } else {

                // No session userid value
                $this->load->view('login');
            }
        } else {
            // No session data set


            $this->load->view('login');
        }
    }
    
    
    /*
     * Configure Products
     */

    public function products() {


        $this->load->library('session');


        if ($this->session->userdata('user_userid')) {
            if ($this->session->userdata('user_userid') != '') {


                $user_id = $this->session->userdata('user_userid');
                $user_type = $this->session->userdata('user_type');
                $user_name = $this->session->userdata('user_username');

                $session_values = $this->session->all_userdata();
                $session_values['tabId'] = 3;

                $this->load->model('conor_products');
                $session_values['current_products'] = $this->conor_products->getAllProducts();

                $this->load->model('conor_categories');
                $session_values['current_categories'] = $this->conor_categories->getAllCategories();

                $this->load->model('conor_taxbands');
                $session_values['current_taxbands'] = $this->conor_taxbands->getAllTaxbands();
                
                
                $data['body_content'] = $this->load->view('/blocks/admin/products', $session_values, true);

                $data['header'] = $this->load->view('/blocks/admin_header', $session_values, true);
                $data['footer'] = $this->load->view('/blocks/admin_footer', $session_values, true);
                $data['navigation'] = $this->load->view('/blocks/admin_nav', $session_values, true);

                $this->load->view('/admin', $data);
            } else {

                // No session userid value
                $this->load->view('login');
            }
        } else {
            // No session data set


            $this->load->view('login');
        }
    }

    /*
     * Add Products
     */

    public function addProduct() {


        $this->load->library('session');


        if ($this->session->userdata('user_userid')) {
            if ($this->session->userdata('user_userid') != '') {


                // VALIDATE INPUT
                $this->form_validation->set_rules('product_isbn', 'ISBN', 'trim|required|min_length[1]|max_length[40]');
                $this->form_validation->set_rules('product_name', 'Name', 'trim|required|min_length[1]|max_length[240]');
                $this->form_validation->set_rules('product_price', 'Price', 'trim|required|min_length[1]|max_length[14]');
                $this->form_validation->set_rules('product_description', 'Description', 'trim|required|min_length[1]|max_length[5000]');

                $this->form_validation->set_rules('categorytype', 'Category Type', 'trim|required|min_length[1]|max_length[2]');
                $this->form_validation->set_rules('taxtype', 'Vat Type', 'trim|required|min_length[1]|max_length[2]');
                $this->form_validation->set_rules('featured', 'Featured', 'trim|required|min_length[1]|max_length[1]');

                if ($this->form_validation->run() == FALSE) {

                    // This is the error generated by codeigniter. With more time I could pass this back to the admin and supply
                    // the user of the specific error.

                    print validation_errors();
                    exit;
                } else {

                    // Upload File

                    $file_path = realpath(APPPATH . '../upload');

                    $config['upload_path'] = $file_path;
                    $config['allowed_types'] = 'gif|jpg|jpeg';
                    $config['file_ext_tolower'] = TRUE;
                    $config['overwrite'] = TRUE;
                    $config['max_size'] = '512';
                    $config['min_width'] = '400';


                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('productfile')) {
                        print 'error  with file upload';
                        exit;
                    } else {

                        $filename = $this->upload->data('file_name');

                        $this->load->model('conor_products');
                        $this->conor_products->insertRecord($_POST, $filename);

                        redirect('/admin/products', 'refresh');
                    }
                }
            } else {

                // No session userid value
                $this->load->view('login');
            }
        } else {
            // No session data set


            $this->load->view('login');
        }
    }

    /*
     * Edit Page
     */

    public function editproduct() {

           $product_id         =   $this->uri->segment(3);
           if($product_id == '') {
               print 'Error - no page id requested.';
               exit;
           }
           
        

        $this->load->library('session');


        if ($this->session->userdata('user_userid')) {
            if ($this->session->userdata('user_userid') != '') {

        
                $session_values = $this->session->all_userdata();
                $session_values['tabId'] = 3;


                $this->load->model('conor_products');
    
                    // Get User Records
                    
                $session_values['product_record'] = $this->conor_products->getProductRecord($product_id);

  

                $this->load->model('conor_products');
                $session_values['current_products'] = $this->conor_products->getAllProducts();
                
                $this->load->model('conor_categories');
                $session_values['current_categories'] = $this->conor_categories->getAllCategories();

                $this->load->model('conor_taxbands');
                $session_values['current_taxbands'] = $this->conor_taxbands->getAllTaxbands();
                
                
                $data['body_content'] = $this->load->view('/blocks/admin/products', $session_values, true);

                $data['header'] = $this->load->view('/blocks/admin_header', $session_values, true);
                $data['footer'] = $this->load->view('/blocks/admin_footer', $session_values, true);
                $data['navigation'] = $this->load->view('/blocks/admin_nav', $session_values, true);



                $this->load->view('/admin', $data);
            } else {

                // No session userid value
                $this->load->view('login');
            }
        } else {
            // No session data set


            $this->load->view('login');
        }
    }
        
    /*
     * Configure Orders
     */

    public function orders() {


        $this->load->library('session');


        if ($this->session->userdata('user_userid')) {
            if ($this->session->userdata('user_userid') != '') {


                $user_id = $this->session->userdata('user_userid');
                $user_type = $this->session->userdata('user_type');
                $user_name = $this->session->userdata('user_username');

                $session_values = $this->session->all_userdata();
                $session_values['tabId'] = 4;


                $data['body_content'] = $this->load->view('/blocks/admin/orders', $session_values, true);

                $data['header'] = $this->load->view('/blocks/admin_header', $session_values, true);
                $data['footer'] = $this->load->view('/blocks/admin_footer', $session_values, true);
                $data['navigation'] = $this->load->view('/blocks/admin_nav', $session_values, true);

                $this->load->view('/admin', $data);
            } else {

                // No session userid value
                $this->load->view('login');
            }
        } else {
            // No session data set


            $this->load->view('login');
        }
    }

    /*
     * Manage Pages
     */

    public function pages() {


        $this->load->library('session');


        if ($this->session->userdata('user_userid')) {
            if ($this->session->userdata('user_userid') != '') {


                $user_id = $this->session->userdata('user_userid');
                $user_type = $this->session->userdata('user_type');
                $user_name = $this->session->userdata('user_username');

                $session_values = $this->session->all_userdata();
                $session_values['tabId'] = 5;

                $this->load->model('conor_pages');
                $session_values['current_pages'] = $this->conor_pages->getAllPages();



                $data['body_content'] = $this->load->view('/blocks/admin/pages', $session_values, true);


                $data['header'] = $this->load->view('/blocks/admin_header', $session_values, true);
                $data['footer'] = $this->load->view('/blocks/admin_footer', $session_values, true);
                $data['navigation'] = $this->load->view('/blocks/admin_nav', $session_values, true);




                $this->load->view('/admin', $data);
            } else {

                // No session userid value
                $this->load->view('login');
            }
        } else {
            // No session data set


            $this->load->view('login');
        }
    }

    /*
     * Edit Page
     */

    public function editpage() {

           $page_id         =   $this->uri->segment(3);
           if($page_id == '') {
               print 'Error - no page id requested.';
               exit;
           }
           
        

        $this->load->library('session');


        if ($this->session->userdata('user_userid')) {
            if ($this->session->userdata('user_userid') != '') {


        
                $session_values = $this->session->all_userdata();
                $session_values['tabId'] = 5;

                $this->load->model('conor_pages');
                $session_values['current_pages'] = $this->conor_pages->getAllPages();

                $session_values['page_record'] = $this->conor_pages->getPageRecord($page_id);

                $data['body_content'] = $this->load->view('/blocks/admin/pages', $session_values, true);


                $data['header'] = $this->load->view('/blocks/admin_header', $session_values, true);
                $data['footer'] = $this->load->view('/blocks/admin_footer', $session_values, true);
                $data['navigation'] = $this->load->view('/blocks/admin_nav', $session_values, true);




                $this->load->view('/admin', $data);
            } else {

                // No session userid value
                $this->load->view('login');
            }
        } else {
            // No session data set


            $this->load->view('login');
        }
    }

    /*
     * Insert / Update Pages
     */

    public function addPage() {


        $this->load->library('session');

        if ($this->session->userdata('user_userid')) {
            if ($this->session->userdata('user_userid') != '') {
                if ($this->session->userdata('$user_type') != 'S') {


                    // VALIDATE INPUT
                    $this->form_validation->set_rules('menu_name', 'Menu Name', 'trim|required|min_length[5]|max_length[40]');
                    $this->form_validation->set_rules('page_title', 'Page Title', 'trim|required|min_length[5]|max_length[40]');
                    $this->form_validation->set_rules('html_content', 'Content', 'trim|required|min_length[1]|max_length[20000]');


                    if ($this->form_validation->run() == FALSE) {

                        // This is the error generated by codeigniter. With more time I could pass this back to the admin and supply
                        // the user of the specific error.

                        print validation_errors();
                        exit;
                    } else {


                        $this->load->model('conor_pages');
                        
                        // Insert the Page
                        if($_POST[page_id] == ''){
                            $this->conor_pages->insertRecord($_POST);
                        } else {
                        // Update the Page    
                            $this->conor_pages->updateRecord($_POST);                            
                        }
                        redirect('/admin/pages', 'refresh');
                    }
                }
            } else {

                // No session userid value
                $this->load->view('login');
            }
        } else {
            // No session data set


            $this->load->view('login');
        }
    }

    /*
     * Authenticate User - Update Session Flash Data and Login them into the dashboard
     */

    public function login() {





        // VALIDATE INPUT
        $this->form_validation->set_rules('inputUsername', 'Username', 'trim|required|min_length[5]|max_length[40]');
        $this->form_validation->set_rules('inputPassword', 'Password', 'trim|required|min_length[5]|max_length[40]');


        if ($this->form_validation->run() == FALSE) {

            // This is the error generated by codeigniter. With more time I could pass this back to the login page to advise
            // the user of the specific error.

            print validation_errors();
            exit;
        } else {


            // Authenticate Login Details
            $inputUsername = $this->input->post('inputUsername');
            $inputPassword = $this->input->post('inputPassword');


//            $this->load->library('uasecurity');

            $encryptedPassword = sha256Password($inputPassword);


            $this->load->model('conor_user');
            $user_details = $this->conor_user->authenticateUser($inputUsername, $encryptedPassword);


            // If not authenticated we need to send the user back to login page with error
            if ($user_details == '0') {

                // Would put in Error message and send user back to the log in page
                $errorMessage = "<p>Unable to log in with given credentials. Please try again.</p>";

                $this->load->view('/login', $data);
            } else {

                // Clear Session Data
                clearUserSession($user_details);

                // Save User details to Session
                saveUserToSession($user_details);



                // Update Login Dates and Times and User
//                $this->user->updateLoginData();


                redirect('/admin/dashboard', 'refresh');
            }
        }
    }

    /*
     * Logout of system
     */

    public function logout() {

        // Clear out Session data
        $this->session->sess_destroy();
        redirect('/admin', 'refresh');
    }

}
