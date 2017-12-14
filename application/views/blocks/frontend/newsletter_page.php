
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
            <?php
                $attributes = array('name' => 'newsletterForm', 'id' => 'newsletterForm', 'class' => 'row contact-form' );
                echo form_open('/newsletter_send', $attributes);
            ?>       
<div class="row">
                    <div class="col-xs-11 col-sm-5 col-md-5 item_left">
                        <h3 class="subtitle">Here to make life easy,
                        Subscirbe to Our News Letter!</h3>
                        <p>Our Newsletter is great. All data entered is kept securely. </p>
                        <p>Yet to complete this newsletter database!</p>
                    </div>

                    <div class="col-xs-11 col-sm-5 col-md-5 item_right">
                        <h3 class="subtitle">Newsletter Sign-Up</h3>
                        <div class="row">
                            <form action="#" method="post" id="contact-form" class="contact-form">
                                <div class="col-md-6">
                                    <input type="text" name="fname" placeholder="First Name" required class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="lname" placeholder="Last Name" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" placeholder="Email" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="subject" placeholder="Subject" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <textarea name="message" class="form-control" placeholder="Message"></textarea>
                                    <input type="submit" value="Send Message" class="message-sub pull-right btn btn-blue">
                                </div>
                            </form>
                        </div>
                        <div id="success">
                            <p>Your message was sent succssfully! I will be in touch as soon as I can.</p>
                        </div>
                        <div id="error">
                            <p>Something went wrong, try refreshing and submitting the form again.</p>
                        </div> 
                    </div>
                </div>

            <?php
            echo form_close();
            ?>        
