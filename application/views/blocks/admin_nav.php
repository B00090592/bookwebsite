<?php
defined('BASEPATH') OR exit('No direct script access allowed');



switch ($tabId) {
    case 1:
            $dashboard = 'current'; 
        break;
    case 2:
            $users = 'current'; 
        break;
    case 3:
            $products = 'current'; 
        break;
    case 4:
            $orders = 'current'; 
        break;
    case 5:
            $pages = 'current'; 
        break;
    default:
            $dashboard = 'current'; 
        }

?>

<!-- 
            Fixed Navigation
            ==================================== -->
            <header id="head" class="navbar-default primary sticky-header">
                <div class="header-top padding30 opened">
                    <div class="container">
                        <div class="headerTopInner row no-margin display-table"  style="text-align:left;">
                            <div class="col-sm-6" style="float:left;">
                                        <h2 >Dance Of Dragons Novel</h2>
                            </div> 
                            <div class="col-sm-6" style="float:right; text-align:right">
                                        <h5 >Welcome <?php echo $user_username ?></h5>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="primary-bg">
                    <div class="container">
                        <div class="mega-menu-wrapper no-beaf nav20">
                            <div class="navbar-header">
                                <!-- responsive nav button -->
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <!-- /responsive nav button -->
                            </div>
                            <!-- main nav -->
                            <nav class="collapse navbar-collapse">
                                <ul class="nav navbar-nav">
                                    <li class="<?php echo $dashboard?>">
                                        <a href="/admin/dashboard">Dashboard</a>
                                    </li>

                                    
<?php
        // Do not display option to Staff User

        if($user_type == 'A') {

            echo '
             
                                    <li class="'.$users.'">
                                        <a href="/admin/users">Users</a>
                                    </li>        
            ';
            
            
        }
?>
                                    <li class="<?php echo $products?>">
                                        <a href="/admin/products">Products</a>
                                    </li>
                                    <li class="<?php echo $orders?>">
                                        <a href="/admin/orders">Orders</a>
                                    </li>
                                    <li class="<?php echo $pages?>">
                                        <a href="/admin/pages">Pages</a>
                                    </li>                                                                       
                                    <li>
                                        <a href="/admin/logout">Log Out</a>
                                    </li>
                                   
                                    
                                    
                                    
                                    
                                </ul>
                            </nav>
                            <!-- /main nav -->
                        </div>
                    </div>
                </div>
            </header>
            <!--
            End Fixed Navigation
            ==================================== -->