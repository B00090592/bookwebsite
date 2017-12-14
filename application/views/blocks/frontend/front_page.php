
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
            <?php
                $attributes = array('productId' => $featured_products[0]->isbn, 'class' => 'row featured-form' );
                echo form_open('/product/addProduct', $attributes);
            ?>                              

        <div class="row">
                        <div class="col-xs-12 col-sm-5">
                                <div class="product-images-wrapper">
                                        <!-- product-images-gallery -->
                            <h1 style="padding:20px; color:navy;">Featured Product</h1>
                                        <div class="flex-with-thumb">
                                                <!-- Tab panes -->
                                                <ul class="slides">
                                                        <li>
                                                                <a href="img/shop/bag.jpg" class="image-popup-zoomin" data-effect="mfp-zoom-in">
                                                                        <img src="/upload/<?php echo $featured_products[0]->image_name ?>" alt="">
                                                                </a>
                                                        </li>
                                               
                                                </ul>
                                                <!-- // Tab panes -->
                                        </div>
                                        <div class="product_meta">
                                                <span class="sku_wrapper">SKU: 
                                                        <span class="sku"><?php echo $featured_products[0]->isbn; ?></span>.
                                                </span>
                                        </div>
                                        <!-- // product-images-gallery -->
                                </div>

                        </div>

            
                        <div class="col-xs-12 col-sm-7">
                                <div class="product-_-summary">
                                        <h2><?php echo $featured_products[0]->name ?></h2>
                                        <div class="product-value">
                                                <del><small class="regular-price">&euro; <?php $price = ($featured_products[0]->price * 1.14); echo $price; ?></small></del>
                                                <span class="current-price">&euro; <?php echo $featured_products[0]->price ?></span>
                                        </div>
                                        <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                        </div>
                                        <p>Availability: <b>In Stock</b></p>
                                        <p>Category: <b>In Stock</b></p>
                                        <div class="short-description">
                                                <p><?php echo $featured_products[0]->description; ?></p>    
                                        </div>
                                        <script>
                                                function increment(myInput) {
                                                        myInput.value = (+myInput.value + 1) || 0;
                                                }
                                                function decrement(myInput) {
                                                  if (myInput.value >=2)
                                                        myInput.value = (myInput.value - 1) || 0;
                                                }
                                        </script>
                                        <div class="product-quantities">
                                                <div class="quantity">
                                                        <span class="qty-control minus" onclick="decrement(this.parentNode.getElementsByTagName('input')[0]);">-</span>
                                                        <input name="qty" class="qty-field" value="1" type="text">
                                                        <span class="qty-control plus" onclick="increment(this.parentNode.getElementsByTagName('input')[0]);">+</span>
                                                </div>
                                                <div class="btn-set">
                                                        <input name="isbn" id="isbn" type="hidden" value="<?php echo $featured_products[0]->isbn ?>">
                                                        <input type="submit" class="btn btn-ash-border" value="Add to Cart" >
                                                </div>
                                        </div>


                                </div>
                        </div>
                </div>


                            
            <?php
            echo form_close();
            ?>        


