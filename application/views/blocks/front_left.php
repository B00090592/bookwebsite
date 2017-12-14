<?php
defined('BASEPATH') OR exit('No direct script access allowed');


?>

                                <aside class="widget">
                                    <div class="boxed-title">
                                        <h3 class="widget-title">Book Categories</h3>
                                    </div>
                                    <ul class="product-categories type2">
                                        <?php 
                                            foreach($current_categories as $category){
                                                echo '<li><a href="/product/category/'.$category->category_id.'">'.$category->category_name.'</a></li>';
                                            }
                                        ?>
                                    </ul>
                                </aside>

 <!-- .widget -->
                                <aside class="widget cartWidget">
                                    <div class="boxed-title">
                                        <h3 class="widget-title">Cart</h3>
                                    </div>
                                    <div class="cartWidgetInner">
                                        <ul class="product_list_widget">
                                            
<?php 
         foreach ($cart_contents as $cart_record){
             $subtotal = $subtotal + $cart_record->product_amount;
             $price_total = number_format((float)$cart_record->product_amount, 2, '.', '');
             echo ' 
                                            <li>
                                                <a href="#" class="thumb">
                                                    <img style="width:40px;" src="/upload/'.$cart_record->product_image.'" alt="">
                                                </a>
                                                <div class="pdDesc">
                                                    <a href="#">'.$cart_record->product_name.'</a>
                                                    <a href="#" class="remove">x</a>
                                                    <div class="variation">
                                                        <strong>Quantity :</strong> <span>'.$cart_record->product_qty.'</span>
                                                    </div>
                                                    <span class="quantity"><strong> <span class="amount">&euro;'.$price_total.'</span></strong></span>
                                                </div>
                                            </li>
             ';
             
         }

?>
                                            
                                                       </ul>
                                        <!-- // product list -->
                                        <p class="total text-center">
                                            <span>Subtotal:</span>
                                            <span class="amount">&euro; <?php echo number_format((float)$subtotal, 2, '.', '');; ?></span>
                                        </p>
                                        <p class="buttons">
                                            <a href="/product/cart" class="btn btn-ash-border">View Cart</a>
                                            <a href="/product/checkout" class="btn btn-ash-border">Checkout</a>
                                        </p>
                                    </div>
                                </aside>
                                <!-- // cart widget -->