<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
// Determine if this tab is to be displayed
$tab_open = '';


if ($open_company_tab) {
    if ($session_values['open_company_tab'] == 'tax_registration') 
            {$tab_open = 'in'; $tab_icon = 'true';} 
        else 
            {$tab_open = 'closed'; $tab_icon = 'false';}}
?>

<div class="panel">

    <div class="panel-heading " id="companyHeading-Five" role="tab" >
        <a id="tabCompanyCollapse-Five" class="panel-title tab-colors-lightblue " data-parent="#companyTabs" data-toggle="collapse" href="#companyCollapse-Five" aria-controls="companyCollapse-Five" aria-expanded="<?php echo $tab_icon; ?>">
            <span class="col-md-12 col-sm-12 col-xs-10 font-size-18"><i class="font-size-24 icon sub5_icon margin-0 padding-right-20" aria-hidden="true"> </i>Tax Registration New Companies</span>
        </a>
    </div>
    

    
    <div class="perTab panel-collapse collapse <?php echo $tab_open ?>" id="companyCollapse-Five" aria-labelledby="companyHeading-Five" role="tabpanel">
        <div class="panel-body  animation-scale-up">

            
            <div class="row">
                <!-- Start Self Column -->


<?php
$attributes = array('class' => '', 'id' => 'taxRegistrationform', 'name' => 'taxRegistrationform');
echo form_open('#', $attributes);
?>

                <div class="row padding-15"><h3>Personal Details</h3></div>


                <div class="row padding-0">
                    <div class="col-xs-12 col-sm-8">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle padding-left-15">Your First Name</div>
                    </div>
                    <div class="col-xs-10 col-sm-3 text-align-left">
                            <input type="text" class="form-control padding-5" name="yfirstname" id="yfirstname" value="<?php echo $taxregistration->yfirstname ?>" />
                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5"></div>                

                <div class="row padding-0">
                    <div class="col-xs-12 col-sm-8">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle padding-left-15">Your Last Name</div>
                    </div>
                    <div class="col-xs-10 col-sm-3 text-align-left">
                            <input type="text" class="form-control padding-5" name="ylastname" id="ylastname" value="<?php echo $taxregistration->ylastname ?>" />
                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5"></div>                
                

                <div class="row padding-0">
                    <div class="col-xs-12 col-sm-8">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle padding-left-15">Your Date of Birth</div>
                    </div>
                    <div class="col-xs-10 col-sm-3 text-align-left">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="icon fa-calendar" aria-hidden="true"></i>
                                </span>
                                <input type="text" class="form-control padding-5" style="background-color:white;" name="ydob" id="ydob"  value="<?php echo $taxregistration->ydob ?>"  data-plugin="datepicker"  data-date-min-view-mode=”years”  data-plugin-options='{"format": "dd/mm/yyyy"}' data-pattern="[[99]]/[[99]]/[[9999]]" readonly >
                                
                            </div>
                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5 ceased_trading_div"></div>
                
                <div class="row padding-0">
                    <div class="col-xs-12 col-sm-8">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle padding-left-15">Your Email Address</div>
                    </div>
                    <div class="col-xs-10 col-sm-3 text-align-left">
                            <input type="text" class="form-control padding-5" name="yemail" id="yemail" value="<?php echo $taxregistration->yemail ?>" placeholder="email@email.com"/>
                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5"></div>
                
                <div class="row padding-0">
                    <div class="col-xs-12 col-sm-8">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle padding-left-15">Your Phone Number</div>
                    </div>
                    <div class="col-xs-10 col-sm-3 text-align-left">
                            <input type="text" class="form-control padding-5" name="yphone" id="yphone" data-plugin="formatter" data-pattern="[[99999999999]][[99]]" value="<?php echo $taxregistration->yphone ?>" />
                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5"></div>

                

                <div class="row padding-0">
                    <div class="col-xs-10 col-sm-8">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle padding-left-15">Your Postal Address</div>
                    </div>
                    <div class="col-xs-10 col-sm-3 text-align-right">
                        
                        <?php 
                         if( $taxregistration->yline1 == '') {
                             echo '<button type="button" class="hideprinter btn btn-block btn-primary btn-sm right" id="yourAddress" >Enter Address</button>'; 
                         } else {
                             echo '<button type="button" class="hideprinter btn btn-block btn_darkgreen btn-sm right" id="yourAddress" >Completed</button>';
                         }
                       ?>
                        
                        <input type="hidden" name="yline1" id="yline1" value="<?php echo $taxregistration->yline1 ?>" />
                        <input type="hidden" name="yline2" id="yline2" value="<?php echo $taxregistration->yline2 ?>" />
                        <input type="hidden" name="yline3" id="yline3" value="<?php echo $taxregistration->yline3 ?>" />
                        <input type="hidden" name="yline4" id="yline4" value="<?php echo $taxregistration->yline4 ?>" />
                        <input type="hidden" name="yline5" id="yline5" value="<?php echo $taxregistration->yline5 ?>" />
                        <input type="hidden" name="yline6" id="yline6" value="<?php echo $taxregistration->yline6 ?>" />
                        <input type="hidden" name="yline7" id="yline7" value="<?php echo $taxregistration->yline7 ?>" />                        
                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-15"></div>
                
                
                <div class="row padding-15"><h3>Rental / Lease Details</h3></div>


                <div class="row padding-0">
                    <div class="col-xs-12 col-sm-8">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle padding-left-15">Landlord Name</div>
                    </div>
                    <div class="col-xs-10 col-sm-3 text-align-left">
                            <input type="text" class="form-control padding-5" name="landlordname" id="landlordname" value="<?php echo $taxregistration->landlordname ?>" />
                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5"></div>                  
                
                <div class="row padding-0">
                    <div class="col-xs-10 col-sm-8">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle padding-left-15">Landlord Address</div>
                    </div>
                    <div class="col-xs-10 col-sm-3 text-align-right">
                        
                        <?php 
                         if( $taxregistration->lline1 == '') {
                             echo '<button type="button" class="hideprinter btn btn-block btn-primary btn-sm right" id="landlordAddress" >Enter Address</button>'; 
                         } else {
                             echo '<button type="button" class="hideprinter btn btn-block btn_darkgreen btn-sm right" id="landlordAddress" >Completed</button>';
                         }
                       ?>
                        
                        <input type="hidden" name="lline1" id="lline1" value="<?php echo $taxregistration->lline1 ?>" />
                        <input type="hidden" name="lline2" id="lline2" value="<?php echo $taxregistration->lline2 ?>" />
                        <input type="hidden" name="lline3" id="lline3" value="<?php echo $taxregistration->lline3 ?>" />
                        <input type="hidden" name="lline4" id="lline4" value="<?php echo $taxregistration->lline4 ?>" />
                        <input type="hidden" name="lline5" id="lline5" value="<?php echo $taxregistration->lline5 ?>" />
                        <input type="hidden" name="lline6" id="lline6" value="<?php echo $taxregistration->lline6 ?>" />
                        <input type="hidden" name="lline7" id="lline7" value="<?php echo $taxregistration->lline7 ?>" />                        
                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5"></div>             
                
               
                <div class="row padding-0">
                    <div class="col-xs-12 col-sm-8">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle padding-left-15">Rental / Lease period in Years</div>
                    </div>
                    <div class="col-xs-10 col-sm-3 text-align-left">
                            <?php    
                                $landlord_lease_array = array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20');
                                $attributes = 'id="landlord_lease_type" size="1"  data-size="5" data-plugin="selectpicker" data-fv-notempty="true" class="form-control" style="z-index:999"';
                                echo form_dropdown('landlord_lease_type', $landlord_lease_array, $taxregistration->landlord_lease_type, $attributes);
                            ?>    
                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5"></div>                   

                <div class="row padding-0">
                    <div class="col-xs-12 col-sm-8">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle padding-left-15">Date company started paying the Rent</div>
                    </div>
                    <div class="col-xs-10 col-sm-3 text-align-left">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="icon fa-calendar" aria-hidden="true"></i>
                                </span>
                                <input type="text" class="form-control padding-5" style="background-color:white;" name="landlord_start_date" id="landlord_start_date"  value="<?php echo $taxregistration->landlord_start_date ?>"  data-plugin="datepicker"  data-date-min-view-mode=”years”  data-plugin-options='{"format": "dd/mm/yyyy"}' data-pattern="[[99]]/[[99]]/[[9999]]" readonly >
                                
                            </div>
                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5 ceased_trading_div"></div>                
                
                <div class="row padding-0">
                    <div class="col-xs-12 col-sm-8">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle padding-left-15">Landlord Payment Period</div>
                    </div>
                    <div class="col-xs-10 col-sm-3 text-align-left">
                            <?php    
                                $landlord_period_array = array('Weekly','Monthly','Yearly');
                                $attributes = 'id="landlord_payment_period" size="1"  data-size="5" data-plugin="selectpicker" data-fv-notempty="true" class="form-control" style="z-index:999"';
                                echo form_dropdown('landlord_payment_period', $landlord_period_array, $taxregistration->landlord_payment_period, $attributes);
                            ?>    
                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5"></div>              



                <div class="row padding-0">
                    <div class="col-xs-12 col-sm-8">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle padding-left-15">Amount paid to Landlord as per Payment Period selected above</div>
                    </div>
                    <div class="col-xs-10 col-sm-3 text-align-left">
                        <div class="groupborder input-group">
                            <span class="input-group-addon">
                                <i class="icon fa-euro" aria-hidden="true"></i>
                            </span>
                            <input type="text" class="hideborder form-control padding-5" name="landlord_payment" id="landlord_payment" data-plugin="formatter" data-pattern="[[99999999999]][[99]]" value="<?php echo $taxregistration->landlord_payment ?>" />
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-15"></div>
                
                
                
                
<div class="row padding-15"><h3>Bank Details</h3></div>

                <div class="row padding-0">
                    <div class="col-xs-12 col-sm-8">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle padding-left-15">Bank / Building Society Name</div>
                    </div>
                    <div class="col-xs-10 col-sm-3 text-align-left">
                            <input type="text" class="form-control padding-5" name="bankname" id="bankname" value="<?php echo $taxregistration->bankname ?>" />
                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5"></div>                  
                
                <div class="row padding-0">
                    <div class="col-xs-10 col-sm-8">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle padding-left-15">Bank / Building Society Address</div>
                    </div>
                    <div class="col-xs-10 col-sm-3 text-align-right">
                        
                        <?php 
                         if( $taxregistration->bline1 == '') {
                             echo '<button type="button" class="hideprinter btn btn-block btn-primary btn-sm right" id="bankAddress" >Enter Address</button>'; 
                         } else {
                             echo '<button type="button" class="hideprinter btn btn-block btn_darkgreen btn-sm right" id="bankAddress" >Completed</button>';
                         }
                       ?>
                        
                        <input type="hidden" name="bline1" id="bline1" value="<?php echo $taxregistration->bline1 ?>" />
                        <input type="hidden" name="bline2" id="bline2" value="<?php echo $taxregistration->bline2 ?>" />
                        <input type="hidden" name="bline3" id="bline3" value="<?php echo $taxregistration->bline3 ?>" />
                        <input type="hidden" name="bline4" id="bline4" value="<?php echo $taxregistration->bline4 ?>" />
                        <input type="hidden" name="bline5" id="bline5" value="<?php echo $taxregistration->bline5 ?>" />
                        <input type="hidden" name="bline6" id="bline6" value="<?php echo $taxregistration->bline6 ?>" />
                        <input type="hidden" name="bline7" id="bline7" value="<?php echo $taxregistration->bline7 ?>" />                        
                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5"></div>          
                
                
                <div class="row padding-0">
                    <div class="col-xs-12 col-sm-8">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle padding-left-15">IBAN</div>
                    </div>
                    <div class="col-xs-10 col-sm-3 text-align-left">
                            <input type="text" class="maxlength form-control padding-5" name="bank_iban" id="bank_iban" maxlength="34" data-plugin="maxlength formatter" data-pattern="[[99999999999]][[99]]" value="<?php echo $taxregistration->bank_iban ?>" />
                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5"></div>                
                
                
                <div class="row padding-0">
                    <div class="col-xs-12 col-sm-8">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle padding-left-15">BIC</div>
                    </div>
                    <div class="col-xs-10 col-sm-3 text-align-left">
                            <input type="text" class="maxlength form-control padding-5" name="bank_bic" id="bank_bic" maxlength="11" data-plugin="maxlength formatter" data-pattern="[[99999999999]][[99]]" value="<?php echo $taxregistration->bank_bic ?>" />
                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5"></div>                
                
                
<div class="row padding-15"><h3>Employer Registration Details</h3></div>
                

                <div class="row padding-0">
                    <div class="col-xs-12 col-sm-8">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle padding-left-15">Are registered as an employer for PAYE/PRSI</div>
                    </div>
                    <div class="col-xs-10 col-sm-3 text-align-center">
                            <input type="checkbox" class="groupborder icheckbox-primary" id="employer_registered" name="employer_registered"
                                   data-plugin="iCheck" data-checkbox-class="icheckbox_flat-blue" value="1" <?php $taxregistration->employer_registered == '1' ? print 'CHECKED' : print ''; ?> />
                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5"></div>                
                                          
                
                
                <div class="row padding-0">
                    <div class="col-xs-12 col-sm-8">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle padding-left-15">Number of Employees Full Time (over than 30 hours) </div>
                    </div>
                    <div class="col-xs-10 col-sm-3 text-align-left">
                            <?php    
                                $employer_fulltime_array = array('0','1','2','3','4','5','6','7','8','9','10','15','20','25','30','35','40','45','50','60','70');
                                $attributes = 'id="employer_fulltime_qty" size="1"  data-size="5" data-plugin="selectpicker" data-fv-notempty="true" class="form-control" style="z-index:999"';
                                echo form_dropdown('employer_fulltime_qty', $employer_fulltime_array, $taxregistration->employer_fulltime_qty, $attributes);
                            ?>    
                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5"></div>                             
                                
                
                <div class="row padding-0">
                    <div class="col-xs-12 col-sm-8">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle padding-left-15">Number of Employees Part Time (less than 30 hours) </div>
                    </div>
                    <div class="col-xs-10 col-sm-3 text-align-left">
                            <?php    
                                $employer_parttime_array = array('0','1','2','3','4','5','6','7','8','9','10','15','20','25','30','35','40','45','50','60','70');
                                $attributes = 'id="employer_parttime_qty" size="1"  data-size="5" data-plugin="selectpicker" data-fv-notempty="true" class="form-control" style="z-index:999"';
                                echo form_dropdown('employer_parttime_qty', $employer_parttime_array, $taxregistration->employer_parttime_qty, $attributes);
                            ?>    
                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5"></div>                             
                
                

                <div class="row padding-0">
                    <div class="col-xs-12 col-sm-8">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle padding-left-15">Select date first employee started</div>
                    </div>
                    <div class="col-xs-10 col-sm-3 text-align-left">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="icon fa-calendar" aria-hidden="true"></i>
                                </span>
                                <input type="text" class="form-control padding-5" style="background-color:white;" name="employee_date" id="employee_date"  value="<?php echo $taxregistration->employee_date ?>"  data-plugin="datepicker"  data-date-min-view-mode=”years”  data-plugin-options='{"format": "dd/mm/yyyy"}' data-pattern="[[99]]/[[99]]/[[9999]]" readonly >
                                
                            </div>
                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5 ceased_trading_div"></div>                
                

                <div class="row padding-0">
                    <div class="col-xs-12 col-sm-8">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle padding-left-15">Payroll System - Tick for Manual</div>
                    </div>
                    <div class="col-xs-10 col-sm-3 text-align-center">
                            <input type="checkbox" class="groupborder icheckbox-primary" id="payroll_type" name="payroll_type"
                                   data-plugin="iCheck" data-checkbox-class="icheckbox_flat-blue" value="1" <?php $taxregistration->payroll_type == '1' ? print 'CHECKED' : print ''; ?> />
                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5"></div>





                <div class="row padding-15"></div>
                <div class="row text-align-center">
                    <button type="button" class="hideprinter btn btn-warning btn-lg" id="downloadRegistrationForms">Generate Form</button>
                    <button type="button" class="hideprinter btn btn_darkgreen btn-lg" id="saveTaxRegistrationDetails">Save &amp Continue</button>
                </div>
                <div class="row padding-15"></div>
                <!-- end Block -->





                <div class="col-sm-12 padding-25"></div>

<?php echo form_close(); ?>


            </div>            

        </div>
    </div>
    


                                    
</div>
