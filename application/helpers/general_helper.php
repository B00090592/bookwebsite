<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * Convert value to sha256 encryption with sale
 */

if (!function_exists('sha256Password')) {

    function sha256Password($inputPassword = '') {
        return hash('sha256', $inputPassword . 'iyg7Wl3S422q6MV9k9TUiyg7Wl3S422q6MV9k9TU');
    }

}



/*
 * Save user profile to session - Clear down first
 */

if ( ! function_exists('clearUserSession'))
{
    function clearUserSession()
    {

        $CI = & get_instance();
        
     //   $CI->load->library('encryption');
     //   print $CI->encryption->decrypt($user_details->enc_fname);
        
        
        $CI->session->set_userdata(array(
                            'user_userid'                   => '',
                            'user_username'                 => '',                
                            'user_type'                     => 'S',                
                    ));
       // print_r($user_details);
    }   
    
}



/*
 * Save user profile to session - Clear down first
 */

if ( ! function_exists('saveUserToSession'))
{
    function saveUserToSession($user_details = '')
    {
        
        if($user_details->defaultyear < '2014')             
            {$defaultyear = __DEFAULT_YEAR;}
        else 
            {$defaultyear = $user_details->defaultyear;}

        $CI = & get_instance();
        
     //   $CI->load->library('encryption');
     //   print $CI->encryption->decrypt($user_details->enc_fname);
        
        
        $CI->session->set_userdata(array(
                            'user_userid'                   => $user_details->userid,
                            'user_username'                 => $user_details->username,
                            'user_type'                     => $user_details->type,
                    ));
        
    }   
    
}


   
