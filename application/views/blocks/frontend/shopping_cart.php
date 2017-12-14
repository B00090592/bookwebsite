
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


        <div class="row">
                        <div class="col-xs-12" style='margin-bottom:20px;'>
                            <h2>Shopping Cart</h2>
                        </div>    
        </div>    


                            <div class="row">
    				<div class="col-xs-12 col-md-8">
                        		<div class="cart-form-wrapper">
                                    <form action="#" method="post">
                                        <table class="shop_table cart" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th class="product-thumbnail">Product</th>
                                                    <th colspan="2" class="product-name">Product</th>
                                                    <th class="product-price">Price</th>
                                                    <th class="product-quantity">QTY</th>
                                                    <th class="product-subtotal">Total</th>
                                                    <th class="product-remove">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
<?php 
         foreach ($cart_contents as $cart_record){
             $subtotal = $subtotal + $cart_record->product_amount;
             $price_total = number_format((float)$subtotal, 2, '.', '');
             echo '                                                 
                                                <tr class="cart_item">
                                                    <td class="product-thumbnail">
                                                        <a href="#">
                                                            <img style="width:40px;" src="/upload/'.$cart_record->product_image.'" alt="">
                                                        </a>
                                                    </td>
                                                    <td class="product-name">
                                                        <a href="#">'.$cart_record->product_name.'</a>
                                                    </td>
                                                    <td class="product-price">
                                                        <span class="amount">&euro; '.$cart_record->product_price.'</span>
                                                    </td>
                                                    <td class="product-quantity">
                                                       <span class="amount">'.$cart_record->product_qty.'</span>
                                                    </td>
                                                    <td class="product-subtotal">
                                                        <span class="amount">&euro; '.$cart_record->product_amount.'</span>
                                                    </td>
                                                    <td class="product-remove">
                                                        <a href="#"></a>
                                                    </td>
                                                </tr>
             ';
             
         }

?>                                                
                                                
                                                
                                                
                                                
                                            </tbody>
                                        </table>
                                        
                                    </form>                     
                                </div>
    						</div>
    						
    						<div class="col-xs-12 col-md-4">
    							<div class="cart-collaterals">
                                    <div class="cart_totals">
                                        <h2>Cart Totals</h2>
                                        <table cellspacing="0">
                                            <tbody>
      
                                                <tr class="order-total">
                                                    <th colspan="3">Order Total</th>
                                                    <td><strong><span class="amount">&euro; &nbsp;<?php echo $price_total ?></span></strong> </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <p><small>Note: buyer beware.</small></p>
                                        <a href="/product/checkout" class="btn btn-blue btn-full margin_top20">Checkout</a>
                                    </div>
                                </div>
    						</div>

