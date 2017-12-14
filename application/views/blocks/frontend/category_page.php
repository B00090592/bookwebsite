
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    $product_counter        =       0;
?>
        <div class="row">
                        <div class="col-xs-12 col-sm-5" style='margin-bottom:20px;'>
                            <h2><?php echo $category_record->category_name; ?></h2>
                        </div>    
        </div>    



<?php foreach ($category_products as $product): ?>


            <?php
                $product_counter++;

                $attributes = array('productId' => $product->isbn, 'class' => 'row featured-form' );
                echo form_open('/product/addProduct', $attributes);
            ?>                              


        <div class="row">
                        <div class="col-xs-12 col-sm-5">
                                <div class="product-images-wrapper">
                                        <!-- product-images-gallery -->
                                        <div class="flex-with-thumb">
                                                <!-- Tab panes -->
                                                <ul class="slides">
                                                        <li>
                                                                <a href="img/shop/bag.jpg" class="image-popup-zoomin" data-effect="mfp-zoom-in">
                                                                        <img src="/upload/<?php echo $product->image_name ?>" alt="">
                                                                </a>
                                                        </li>
                                               
                                                </ul>
                                                <!-- // Tab panes -->
                                        </div>
                                        <div class="product_meta">
                                                <span class="sku_wrapper">SKU: 
                                                        <span class="sku"><?php echo $product->isbn; ?></span>.
                                                </span>
                                        </div>
                                        <!-- // product-images-gallery -->
                                </div>

                        </div>

            
                        <div class="col-xs-12 col-sm-7">
                                <div class="product-_-summary">
                                        <h2><?php echo $product->name ?></h2>
                                        <div class="product-value">
                                                <del><small class="regular-price">&euro; <?php $price = ($product->price * 1.14); echo $price; ?></small></del>
                                                <span class="current-price">&euro; <?php echo $product->price ?></span>
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
                                                <p><?php echo $product->description; ?></p>    
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
                                                        <input name="isbn" id="isbn" type="hidden" value="<?php echo $product->isbn ?>">
                                                        <input type="submit" class="btn btn-ash-border" value="Add to Cart" >
                                                </div>
                                        </div>


                                </div>
                        </div>
                </div>
    <hr >


                            
            <?php
            echo form_close();
            ?>        

<?php endforeach; ?>

<?php

    if($counter == 0){
        
        echo ' 
            <div class="row">
                            <div class="col-xs-12 col-sm-5" style="margin-bottom:20px;">
                                <h4>No products available.</h4>
                            </div>    
            </div> 
        ';
        
    }

?>