<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--[if IE]>  
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
        <!-- Author Meta -->
        <meta name="author" content="Muhammad Morshed">
        <!-- Meta Description -->
        <meta name="description" content="Conor O' Keeffe Project">
        <!-- Meta Keyword -->
        <meta name="keywords" content="">
        <!-- meta character set -->
        <meta charset="utf-8">

        <!-- Site Title -->
        <title>Project 2017 - Administration Login</title>
		
        <!--
        CSS
        ============================================= -->
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,700,300,800,900' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="/core/login/css/font-awesome.min.css">
        <link rel="stylesheet" href="/core/login/css/bootstrap.min.css">
        <link rel="stylesheet" href="/core/login/css/jquery.pagepiling.css">
        <link rel="stylesheet" href="/core/login/css/main.css">
        <!-- CSS media queries -->
        <link rel="stylesheet" href="/core/login/css/media-queries.css">
		
		
		<!-- Modernizer Script for old Browsers -->
        <script src="/core/login/js/vendor/modernizr-2.6.2.min.js"></script>
		
    </head>
	
    <body>

        <div class="coming-wrapper">

   

            <div class="section coming-soon update">
                <div class="overlay">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-8 col-lg-offset-2 col-lg-8 text-center">
                                <div class="coming-content fullscreen text-center">
                                    <div class="inner-content">
                                        <div class="subscription-text">
                                            <h1>CONOR O'KEEFFE <span>2018 PROJECT</span></h1>
                                            <p>For example Staff login use username : staff and password staff. </p>
                                            <p>For example Admin login use username : admin and password admin. </p>
                                        </div>
                                        <div class="sform7">
            <?php
                $attributes = array('name' => 'loginForm', 'id' => 'loginForm', 'class' => 'clearfix' );
                echo form_open('/admin/login', $attributes);
            ?>                                                    
                                            
                                                <input type="text" placeholder="Enter your Username" id="inputUsername" name="inputUsername"  required class="col-sm-12 input-field">
                                                <input type="password" placeholder="Enter your Password" id="inputPassword" name="inputPassword" required class="col-sm-12 input-field" style='margin-top:10px;'>
                                                <input type="submit"  value="Login" id='login' name='log In' class="col-lg-12 mail-submit">
                        <?php
                        echo form_close();
                        ?>        
                                                
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end .column -->
                        </div> <!-- end .row -->
                    </div> <!-- end .container  -->
                </div> <!-- end .overlay -->
            </div>
            <!-- end .coming soon -->
        </div>


        <!--
        JavaScripts
        ========================== -->
        
        <!-- main jQuery -->
        <script src="/core/login/js/vendor/jquery-1.11.1.min.js"></script>
        <!-- theme custom scripts -->
        <script src="/core/login/js/bootstrap.min.js"></script>
        <script src="/core/login/js/jquery.pagepiling.min.js"></script>
        <script src="/core/login/js/main.js"></script>
    </body>
</html>
