<?php
defined('BASEPATH') OR exit('No direct script access allowed');


?>
        		<div class="demo_head">
        			<div class="container">
        				<h1>Users Section</h1>
        				<p> Create and view Users. </p>
        			</div>
        		</div>


     <div class="row" style="padding:20px;">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                    <h3 class="title3">List of Current Users</h3>
                                  
                                    <div class="divider margin20 hr4 hr_left">
                                        <span></span>
                                    </div>
                                    <div class="spn_sc_list_area">
                                        
<?php 
    foreach($current_users as $user){
        
        if($user->type == 'A') { $type = 'Administrator'; } else { $type = 'Staff'; }
            echo '  
                                            <div class="col-xs-4">'.$user->username.'</div>
                                            <div class="col-xs-4">'.$type.'</div>
                                            <div class="col-xs-2"><a style="text-decoration:underline;" href="/admin/edituser/'.$user->userid.'">Edit User</a></div>
                                            <div class="col-xs-2">
                 '; 
            
        // We don't get too delete our own profile - otherwise we could end up with a system with no users to access it
        // Could put in a dialog confirm box here to ask user are they sure they wish to delete - no time to do     
            
        if($user_userid != $user->userid){
            echo '  
                                                <a style="text-decoration:underline;  color:red;" href="/admin/deleteuser/'.$user->userid.'">Delete User</a>
                 '; 
        }
            echo '  
                                            </div>
            ';                                
    }
?>    

                                    </div>
                                </div>
     </div>    


     <div class="row" style="padding:20px;">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <h3 class="title3">User Details <?php echo $user_record->username ?></h3>
                                    <div class="divider margin20 hr4 hr_left">
                                        <span></span>
                                    </div>
              
                                </div>
     </div>    
    
     <div class="row" style="padding-left:20px;padding-right:20px;">
         
         

         <?php 
         if($user_record->userid > 0){
           echo '  <div class="col-xs-12" style="padding-bottom:20px; color:red;"><h3>Lease Password Blank to keep existing password</h3></div>';
           echo '  <div class="col-xs-12" style="padding-bottom:20px;"><h5><a style="color:green; text-decoration:underline;" href="/admin/users">Or click here to create a new user</a></h5></div>';
         }
         ?>        
                    <div class="col-md-12 item_left" style="min-height:400px;">

            <?php
                $attributes = array('name' => 'customerForm', 'id' => 'customerForm', 'class' => 'row contact-form' );
                echo form_open('/admin/addUser', $attributes);
            ?>                              
                            
                            <div class="col-md-6">
                                <input type="hidden" value="<?php echo $user_record->userid ?>" id="user_id" name="user_id" >
                                
                                <label>Username</label>
                                <input type="text" name="username" value="<?php echo $user_record->username ?>"id="username" required class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>Password</label>
                                <input type="text" name="password" value="" id="password" name="password" class="form-control">
                            </div>
                        
                    <?php if($user_record->type == 'S') {$staff_status = 'selected';} else { $admin_status = 'selected';}  ?>                
                        
                            <div class="col-md-6">
                                <label>Account Type</label>
                                <select id="type" name="type" class="form-control">
                                    <option value="S" <?=$staff_status?> >Staff</option>
                                    <option value="A" <?=$admin_status?> >Administrator</option>
                                    
                                </select>    
                            </div>
         
                            <div class="col-md-12">
                                <input type="submit" id="addUser" name="addUser" value="Save" class="message-sub pull-right btn btn-blue">
                            </div>
                            
                            
            <?php
            echo form_close();
            ?>        
                        
                        
                    </div>

                    
                </div>

            </div>

