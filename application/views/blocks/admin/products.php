<?php
defined('BASEPATH') OR exit('No direct script access allowed');


?>
        		<div class="demo_head">
        			<div class="container">
        				<h1>Products Section</h1>
        				<p> Create and view Products.</p>
        			</div>
        		</div>

     <div class="row" style="padding:20px;">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <h3 class="title3">List of Current Products</h3>
                                    <div class="divider margin20 hr4 hr_left">
                                        <span></span>
                                    </div>
                                    <div class="spn_sc_list_area">
                                        
<?php 
    foreach($current_products as $product){
        
        echo '  
                                        <div class="col-xs-3" style="height:70px;"><img src="/upload/'.$product->image_name.'" style="height:60px;"/></div>
                                        <div class="col-xs-3" style="height:70px;">'.$product->name.'</div>
                                        <div class="col-xs-2" style="height:70px;">'.$product->isbn.'</div>
                                        <div class="col-xs-2" style="height:70px;">'.$product->price.'</div>
                                        <div class="col-xs-2"><a style="text-decoration:underline;" href="/admin/editproduct/'.$product->isbn.'">Edit Product</a></div>
        ';                                
    }
?>    

                                    </div>
                                </div>
     </div>    


     <div class="row" style="padding:40px;">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <h3 class="title3">Product Details - <?php echo $product_record->name; ?></h3>
                                    <div class="divider margin20 hr4 hr_left">
                                        <span></span>
                                    </div>
              
                                </div>
     </div>   
     
     <p>Add some Products</p>
    
     <div class="row" style="padding:20px;">
                    <div class="col-md-12 item_left" style="min-height:400px;">
            <?php
                $attributes = array('name' => 'productForm', 'id' => 'productForm', 'class' => 'row contact-form' );
                echo form_open_multipart('/admin/addProduct', $attributes);
            ?>                              
                            
                            <div class="col-md-6">
                                <label>Product ISBN</label>
                                <input type="text" value="<?php echo $product_record->isbn; ?>" id="product_isbn" name="product_isbn" required class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>Product Name</label>
                                <input type="text" value="<?php echo $product_record->name; ?>" id="product_name" name="product_name" required class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>Product Price</label>
                                <input type="number" value="<?php echo $product_record->price; ?>"  min="1" step="any"  id="product_price" name="product_price" required class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>Upload Image (jpg, jpeg or gif) - Max Size 500kb - Minimun Width 400px</label>
                                <input type="file" id="productfile" name="productfile" required class="form-control"/>                                
                            </div>
                        
                            <div class="col-md-6">
                                <label>Category Type</label>
                                <select id="categorytype" name="categorytype" class="form-control">
                                    <?php foreach($current_categories as $category){
                                   
                                        if($product_record->category_id == $category->category_id) 
                                            {$cat_selected = 'selected';} 
                                        else 
                                           {$cat_selected = '';};
                                           
                                        echo '<option value="'.$category->category_id.'" '.$cat_selected.'>'.$category->category_name.'</option>';
                                    }
                                    ?>
                                    
                                </select>    
                            </div>
                            <div class="col-md-6">
                                <label>Tax Type</label>
                                <select id="taxtype" name="taxtype" class="form-control">
                                    <?php foreach($current_taxbands as $vatband){
                                        
                                        if($product_record->vat_type == $vatband->tax_code) 
                                            {$vat_selected = 'selected'; } 
                                        else 
                                           {$vat_selected = '';};
                                           
                                        echo '<option value="'.$vatband->tax_code.'" '.$vat_selected.'>'.$vatband->tax_name.'</option>';
                                    }
                                    ?>
                                    
                                </select>    
                            </div>
                        
                            <div class="col-md-6">
                                <label>Featured Product</label>
                                <select id="featured" name="featured" class="form-control">
                                    
                                    <?php if($product_record->featured == 'N') {$featured_no = 'selected';} else {$featured_yes = 'selected';} ?>
                                    
                                    <option value="N" <?php echo $featured_no ?> >No</option>
                                    <option value="Y" <?php echo $featured_yes ?> >Yes</option>
                                    
                                </select>    
                            </div>                   
                        
                        
                            <div class="col-md-12">
                                <label>Product Description</label>
                                <textarea name="product_description" id="product_description" required class="form-control"></textarea>
                            </div>
         
                        
                        
                        
                            <div class="col-md-12">
                                <input type="submit" id="addProduct" name="addProduct" value="Save" class="message-sub pull-right btn btn-blue">
                            </div>
                            
                            
            <?php
            echo form_close();
            ?>        
                        
                        
                    </div>

                    
                </div>

            </div>

