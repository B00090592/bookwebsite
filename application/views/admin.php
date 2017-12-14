<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
                 

      <?= $header ?>

    <body class="bordered">
        
        <!-- Preloader Two -->
        <div id="preloader">
            <div class="spinner">
                <div class="rect1"></div>
                <div class="rect2"></div>
                <div class="rect3"></div>
                <div class="rect4"></div>
                <div class="rect5"></div>
            </div>
        </div>
        
        <div id="wrapper" class="main-wrapper">
    
                                    <?= $navigation ?>


            
                                                <?= $body_content ?>

            <!-- shopfeatures -->
            <div class="shopfeatures">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">
                            <div class="shopfeatureBlock border">
                                <i class="fa fa-money"></i>
                                <span class="cms-title">save upto 20% limited time only</span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="shopfeatureBlock border">
                                <i class="fa fa-rocket"></i>
                                <span class="cms-title">Free Shipping on all orders</span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="shopfeatureBlock border last">
                                <i class="fa fa-dollar"></i>
                                <span class="cms-title">30 day money back guarantee</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- // shopfeatures -->

          

        
                                        <?= $footer ?>

        
    </body>
</html>