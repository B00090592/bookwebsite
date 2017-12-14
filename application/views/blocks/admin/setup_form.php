<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
// Determine if this tab is to be displayed
$tab_open = '';


if ($open_company_tab) {
    if ($session_values['open_company_tab'] == 'setup_form') 
            {$tab_open = 'in'; $tab_icon = 'true';} 
        else 
            {$tab_open = 'closed'; $tab_icon = 'false';}}
?>

<div class="panel">

    <div class="panel-heading " id="companyHeading-Four" role="tab" >
        <a id="tabCompanyCollapse-Four" class="panel-title tab-colors-lightblue " data-parent="#companyTabs" data-toggle="collapse" href="#companyCollapse-Four" aria-controls="companyCollapse-Four" aria-expanded="<?php echo $tab_icon; ?>">
            <span class="col-md-4 col-sm-6 col-xs-10 font-size-18"><i class="font-size-24 icon sub4_icon margin-0 padding-right-20" aria-hidden="true"> </i>Form New Company</span>
            <span class="col-md-6 col-md-6 col-xs-6 hidetablet font-size-14 padding-5 ">Download Completed Forms</span>
        </a>
    </div>
    

    
    <div class="perTab panel-collapse collapse <?php echo $tab_open ?>" id="companyCollapse-Four" aria-labelledby="companyHeading-Four" role="tabpanel">
        <div class="panel-body  animation-scale-up">
 
            
   
            
                        <div class="row">
                <!-- Start Self Column -->


<?php
$attributes = array('class' => '', 'id' => 'otherDeductionsform', 'name' => 'otherDeductionsform');
echo form_open('#', $attributes);
?>

                
                
                <div class="row padding-15"><h3>Company Forms</h3></div>

        <span id="hideCompanyForms">                
                
                <div class="row padding-15"></div>
                Cathal to provide text.
        </span>        

        <span id="showCompanyForms">                
                <div class="row padding-15"></div>
                <div class="row text-align-center">
                    
                                                                    
                                                                    
                    <button type="button" class="hideprinter btn btn_darkgreen btn-lg" id="downloadCompanyForms">Download Company Forms</button>
                </div>
                <div class="row padding-15"></div>
        </span>        
       

             
                
               




                <div class="col-sm-12 padding-25"></div>

<?php echo form_close(); ?>


            </div>

        </div>
    </div>
    

                       
                            
                               

                                    
</div>
