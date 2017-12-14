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
        
        <!-- compare-basket -->
        <div class="compare-basket">
            <div class="container-fluid">
                <a href="compare.php" class="compare-action ajax-view btn btn-ash btn-icon pull-right"><i class="fa fa-check"></i> Compare</a>
                <ul class="compareProductList pull-right clearfix"></ul>
            </div>
        </div>
        <!-- // compare-basket -->
    
        <div id="wrapper" class="main-wrapper">
    
            <!-- 
            Fixed Navigation
            ==================================== -->
                                                
            <?= $navigation ?>

            <!--
            End Fixed Navigation
            ==================================== -->


            <div class="shopWrapper">
                <div class="container">
                    <div class="row"  style='margin-top:25px;'>
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <div id="secondary" class="widget-area" role="complementary">
            <?= $left ?>
                            </div>
                            <!-- // secondary -->
                        </div>





                        <!-- // col-xs-12 col-sm-3 -->
                        <div class="col-xs-12 col-sm-8 col-md-9">
                            <div id="primary" class="content-area">
                                <main id="main" class="site-main" role="main">
                                    
                    <?= $html_content ?>

                                    
                                    
                                </main>
                                <!-- // #main -->
                            </div>
                            <!-- // #primary -->
                        </div>
                        <!-- // .col-xs-12.col-sm-9 -->
                        
                        
                        
                        
                        
                        
                        
                    </div>
                </div>
            </div>

                                           <?= $footer ?>

            
    </body>
</html>