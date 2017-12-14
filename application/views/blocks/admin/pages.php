<?php
defined('BASEPATH') OR exit('No direct script access allowed');


?>
        		<div class="demo_head">
        			<div class="container">
        				<h1>Website Pages</h1>
        				<p> Manage website content.</p>
        			</div>
        		</div>

     <div class="row" style="padding:20px;">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <h3 class="title3">List of Current pages</h3>
                                    <div class="divider margin20 hr4 hr_left">
                                        <span></span>
                                    </div>
                                    <div class="spn_sc_list_area">
                                        
<?php 
    foreach($current_pages as $page){

        
        echo '  
                                        <div class="col-xs-6">'.$page->page_menu_name.'</div>
                                        <div class="col-xs-3"></div>
                                        <div class="col-xs-3"><a style="text-decoration:underline;" href="/admin/editpage/'.$page->page_id.'">Edit Page</a></div>
        ';                                
    }
?>    

                                    </div>
                                </div>
     </div>    


     <div class="row" style="padding:40px;">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <h3 class="title3">Page Details <?php echo $page_record->page_menu_name ?></h3>
                                    <div class="divider margin20 hr4 hr_left">
                                        <span></span>
                                    </div>
              
                                </div>
     </div>    
    
     <div class="row" style="padding:20px;">
         
         <?php 
         if($page_record->page_id > 0){
           echo '  <div class="col-xs-12" style="padding-bottom:20px;"><h5><a style="color:green; text-decoration:underline;" href="/admin/pages">Or click here to create a page</a></h5></div>';
         }
         ?>        
         
                    <div class="col-md-12 item_left" style="min-height:400px;">
            <?php
                $attributes = array('name' => 'pagesForm', 'id' => 'pagesForm', 'class' => 'row contact-form' );
                echo form_open('/admin/addPage', $attributes);
            ?>                              
                            
                            <div class="col-md-6">
                                <label>Page Menu Name</label>
                                <input type="hidden" value="<?php echo $page_record->page_id ?>" id="page_id" name="page_id" >
                                <input type="text" value="<?php echo $page_record->page_menu_name ?>" placeholder="Menu Name" id="menu_name" name="menu_name" required class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>Page Title</label>
                                <input type="text" value="<?php echo $page_record->page_title ?>"  placeholder="Page Title" id="page_title" name="page_title" required class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label>Page HTML Content</label>
                                <textarea name="html_content" id="html_content" required class="form-control"><?php echo $page_record->page_content ?></textarea>
                            </div>
         
                            <div class="col-md-12">
                                <input type="submit" id="addPage" name="addPage" value="Save" class="message-sub pull-right btn btn-blue">
                            </div>
                            
                            
            <?php
            echo form_close();
            ?>        
                        
                        
                    </div>

                    
                </div>

            </div>

