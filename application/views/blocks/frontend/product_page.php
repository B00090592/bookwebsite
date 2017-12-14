
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
// Determine if this tab is to be displayed
$tab_open = '';


if ($open_asset_tab) {
    if ($session_values['open_asset_tab'] == 'fixed_assets') {
        $tab_open = 'in';
        $tab_icon = 'true';
    } else {
        $tab_open = 'closed';
        $tab_icon = 'false';
    }
}
?>

<div class="panel">
    <div class="panel-heading " id="assetHeading-One" role="tab" >
        <a id="tabAssetCollapse-One" class="panel-title tab-colors-lightblue " data-parent="#assetTabs" data-toggle="collapse" href="#assetCollapse-One" aria-controls="assetCollapse-One" aria-expanded="<?php echo $tab_icon; ?>">
            <span class="col-md-4 col-sm-6 col-xs-10 font-size-18">Fixed Assets</span>
            <span class="col-md-6 col-md-6 col-xs-6 hidetablet font-size-14 padding-5 ">Manage fixed assets</span>
        </a>
    </div>
    <div class="perTab panel-collapse collapse <?php echo $tab_open ?>" id="assetCollapse-One" aria-labelledby="assetHeading-One" role="tabpanel">
        <div class="panel-body animation-scale-up">


            <!-- ADD SALES INVOICE RECORD -->
            <div class="row" id="addFixedAsset" style="display:none;">
                <?php
                $attributes = array('class' => '', 'id' => 'fixedAssetForm', 'name' => 'fixedAssetForm');
                $hidden = Array("fixedAssetID" => '0');
                echo form_open('#', $attributes, $hidden);
                ?>
                <div class="row padding-15"><h3>Fixed Asset Details</h3></div>

                
                
                
                <div class="row padding-5">
                    <div class="col-xs-12 col-sm-7">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle">Was your capital asset purchased during this accounting year?</div>
                    </div>
                    <div class="col-xs-10 col-sm-4 text-align-left">
                            <div class="padding-top-10 text-align-center">
                                <input data-plugin="iCheck" data-radio-class="iradio_flat-blue" class="icheckbox-primary thisyearpurchase" type="radio" id="thisyearpurchaseyes" name="thisyearpurchase" value="1" checked/>
                                <label for="thisyearpurchaseyes" class=" font-weight-300 black font-size-15">Yes</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input data-plugin="iCheck" data-radio-class="iradio_flat-blue" class="icheckbox-primary thisyearpurchase" type="radio" id="thisyearpurchaseno" name="thisyearpurchase" value="0" />
                                <label for="thisyearpurchaseno" class=" font-weight-300 black font-size-15">No</label>
                            </div>
                    </div>
                    <div class="col-xs-2 col-sm-1"></div>
                    
                </div>
 
                
                
                
                
                
                
                
                
                <div class="row" id="thisyearpurchase" style="padding:0px; margin:0px;" >


                    <div class="row padding-5">
                        <div class="col-xs-12 col-sm-7">
                            <div class="control-label font-weight-300 black font-size-15 vertical-align-middle">Asset name</div>
                        </div>
                        <div class="col-xs-10 col-sm-4 text-align-left">
                            <input type="text" name="n_asset_name" value="" id="n_asset_name" class="form-control padding-5" >
                        </div>
                        <div class="col-xs-2 col-sm-1"></div>
                    </div>
                    
                
                    <div class="row padding-5">
                        <div class="col-xs-12 col-sm-7">
                            <div class="control-label font-weight-300 black font-size-15 vertical-align-middle">Purchase Date</div>
                        </div>
                        <div class="col-xs-10 col-sm-4 text-align-left">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="icon fa-calendar" aria-hidden="true"></i>
                                </span>
                                <input type="text" class="form-control padding-5" name="n_purchase_date" id="n_purchase_date"  value=""  data-plugin="datepicker"  data-date-min-view-mode=”years”  data-plugin-options='{"format":"dd/mm/yyyy"}' data-pattern="[[99]]/[[99]]/[[9999]]" readonly >
                                
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-1"></div>
                    </div>
                               
                                        
                
                    <div class="row padding-5">
                        <div class="col-xs-12 col-sm-7">
                            <div class="control-label font-weight-300 black font-size-15 vertical-align-middle">Bank Account</div>
                        </div>
                        <div class="col-xs-10 col-sm-4 text-align-left">
                            <div class="groupborder input-group">
                                    <?php
                                      $bankaccount_details = array('' => 'Please select...');

                                      foreach ($bankaccounts as $bankaccount) {

                                        $bankaccount_details[$bankaccount->mnl_code] = $bankaccount->mnl_name;
                                      }
                                      //$array = array('Select customer',101,102,103,104,105);
                                      $attributes = 'id="assettype" data-plugin="select2" class="form-control"';
                                      echo form_dropdown('assettype', $bankaccount_details, '', $attributes);
                                    ?>          
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-1"></div>
                    </div>
                                        
                    
                    
                
                    <div class="row padding-5">
                        <div class="col-xs-12 col-sm-7">
                            <div class="control-label font-weight-300 black font-size-15 vertical-align-middle">Cost Price</div>
                        </div>
                        <div class="col-xs-10 col-sm-4 text-align-left">
                            <div class="groupborder input-group">
                                <span class="input-group-addon">
                                    <i class="icon fa-euro" aria-hidden="true"></i>
                                </span>
                                <input type="text" class="hideborder form-control padding-5" name="n_asset_price" id="n_asset_price" />
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-1"></div>
                    </div>
                    
                                        
                
                    <div class="row padding-5">
                        <div class="col-xs-12 col-sm-7">
                            <div class="control-label font-weight-300 black font-size-15 vertical-align-middle">Vat Type</div>
                        </div>
                        <div class="col-xs-10 col-sm-4 text-align-left">
                                
                            <select class="form-control" name="n_vat_type" id="n_vat_type" size="1" data-plugin="selectpicker" data-fv-notempty="true">
                                <?php
                                    foreach($taxbands as $tax_record){
                                        echo"<option value=" . $tax_record->micro_tax_code .">" . $tax_record->micro_tax_label ."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-xs-2 col-sm-1"></div>
                    </div>                    
                                        
                
                    <div class="row padding-5">
                        <div class="col-xs-12 col-sm-7">
                            <div class="control-label font-weight-300 black font-size-15 vertical-align-middle">Vat Amount</div>
                        </div>
                        <div class="col-xs-10 col-sm-4 text-align-left">
                            <div class="groupborder input-group">
                                <span class="input-group-addon">
                                    <i class="icon fa-euro" aria-hidden="true"></i>
                                </span>
                                <input type="text" class="hideborder form-control padding-5 numberAndDecimal" name="n_vat_amount" id="n_vat_amount" readonly/>
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-1"></div>
                    </div>

                                        
                
                    <div class="row padding-5">
                        <div class="col-xs-12 col-sm-7">
                            <div class="control-label font-weight-300 black font-size-15 vertical-align-middle">Net Amount</div>
                        </div>
                        <div class="col-xs-10 col-sm-4 text-align-left">
                            <div class="groupborder input-group">
                                <span class="input-group-addon">
                                    <i class="icon fa-euro" aria-hidden="true"></i>
                                </span>
                                <input type="text" class="hideborder form-control padding-5 numberAndDecimal" name="n_net_amount" id="n_net_amount" readonly/>
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-1"></div>
                    </div>
                    
                </div>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
 
                <div class="row" id="notthisyearpurchase" style="padding:0px; margin:0px;" >
                
                
                    <div class="row padding-5">
                        <div class="col-xs-12 col-sm-7">
                            <div class="control-label font-weight-300 black font-size-15 vertical-align-middle">Asset name</div>
                        </div>
                        <div class="col-xs-10 col-sm-4 text-align-left">
                            <input type="text" name="t_asset_name" value="" id="t_asset_name" class="form-control padding-5" >
                        </div>
                        <div class="col-xs-2 col-sm-1"></div>
                    </div>
                    
                
                    <div class="row padding-5">
                        <div class="col-xs-12 col-sm-7">
                            <div class="control-label font-weight-300 black font-size-15 vertical-align-middle">Purchase Date</div>
                        </div>
                        <div class="col-xs-10 col-sm-4 text-align-left">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="icon fa-calendar" aria-hidden="true"></i>
                                </span>
                                <input type="text" class="form-control padding-5" name="t_purchase_date" id="t_purchase_date"  value=""  data-plugin="datepicker"  data-date-min-view-mode=”years”  data-plugin-options='{"format":"dd/mm/yyyy"}' data-pattern="[[99]]/[[99]]/[[9999]]" readonly >
                                
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-1"></div>
                    </div>
                                        
                
                    <div class="row padding-5">
                        <div class="col-xs-12 col-sm-7">
                            <div class="control-label font-weight-300 black font-size-15 vertical-align-middle">Enter Cost Price</div>
                        </div>
                        <div class="col-xs-10 col-sm-4 text-align-left">
                            <div class="groupborder input-group">
                                <span class="input-group-addon">
                                    <i class="icon fa-euro" aria-hidden="true"></i>
                                </span>
                                <input type="text" class="hideborder form-control padding-5 numberAndDecimal" name="t_asset_price" id="t_asset_price" />
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-1"></div>
                    </div>
                                        
                             
                    

                    
                    
                </div>
                






                
                

                <div class="row padding-25"></div>

                <div class="col-sm-12 padding-0">
                    <div class="col-xs-6 col-sm-6 text-align-right padding-left-10">
                        <button type="button" class="hideprinter btn btn-outline btn-danger btn-lg" id="cancelFixedAssetBtn">Cancel</button>
                    </div>
                    <div class="col-xs-6 col-sm-6 text-align-left padding-right-10">
                        <button type="button" class="hideprinter btn btn_darkgreen btn-lg" id="saveFixedAssetBtn">Save Fixed Asset</button>
                    </div>
                </div>

                <div class="col-sm-12 padding-25"></div>

                <?php echo form_close(); ?>
            </div>
            <!-- END NEW SALES INVOICE FORM -->

        </div>





        <!-- DISPLAY NOMINAL TRANSACTIONS -->
        <button type="button" id="addFixedAssetBtn" class="hideprinter btn btn-warning btn-block btn-round font-size-16 margin-top-20 margin-bottom-20">
            <i class="icon padding-top-3 fa-plus-square" aria-hidden="true"></i>
            <strong id="showFixedAssetBtnText">Add Fixed Asset Form</strong>
        </button>


        <div class="row" id="fixedAssetList">


            <div id="fixedAssetTable"></div>
            <div class="col-sm-12 padding-30"></div>

        </div>
    </div>



</div>



