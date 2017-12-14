<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
// Determine if this tab is to be displayed
$tab_open = '';


if ($open_company_tab) {
    if ($session_values['open_company_tab'] == 'director_information')
            {$tab_open = 'in'; $tab_icon = 'true';}
        else
            {$tab_open = 'closed'; $tab_icon = 'false';}}
?>

<div class="panel">

    <div class="panel-heading " id="companyHeading-Three" role="tab" >
        <a id="tabCompanyCollapse-Three" class="panel-title tab-colors-lightblue " data-parent="#companyTabs" data-toggle="collapse" href="#companyCollapse-Three" aria-controls="companyCollapse-Three" aria-expanded="<?php echo $tab_icon; ?>">
            <span class="col-md-4 col-sm-6 col-xs-10 font-size-18"><i class="font-size-24 icon sub3_icon margin-0 padding-right-20" aria-hidden="true"> </i>Directors / Company Secretary Information</span>
            <span class="col-md-6 col-md-6 col-xs-6 hidetablet font-size-14 padding-5 ">For Existing Companies and to Form New Company</span>
        </a>
    </div>



    <div class="perTab panel-collapse collapse <?php echo $tab_open ?>" id="companyCollapse-Three" aria-labelledby="companyHeading-Three" role="tabpanel">
        <div class="panel-body animation-scale-up">

                    <!-- ADD CAPITAL ASSET RECORD -->
              <div class="row" id="addDirector" style="display:none;">

                        <?php
                        $attributes = array('class' => '', 'id' => 'DirectorForm', 'name' => 'DirectorForm');
                        $hidden = Array("directorID" => '0');
                        echo form_open('#', $attributes, $hidden);
                        ?>

                <div class="row padding-15"><h3>Details for Directors or Company Secretary</h3></div>


                <div class="row padding-0">
                    <div class="col-xs-10 col-sm-7">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle">Director or Secretary </div>
                    </div>
                    <div class="col-xs-10 col-sm-4 text-align-left">
                            <?php
                            $array = array('Director','Secretary');
                            $attributes = 'id="subscription_type" size="1"  data-plugin="selectpicker" data-fv-notempty="true" class="form-control"';
                            echo form_dropdown('subscription_type', $array, $session_values['subscription_type'], $attributes);
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
                    <div class="col-xs-12 col-sm-7">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle">First Name</div>
                    </div>
                    <div class="col-xs-10 col-sm-4 text-align-left">
                            <input type="text" name="firstname" value="" id="firstname" class="form-control padding-5" >

                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5"></div>

                 <div class="row padding-0">
                    <div class="col-xs-12 col-sm-7">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle">Last Name</div>
                    </div>
                    <div class="col-xs-10 col-sm-4 text-align-left">
                            <input type="text" name="lastname" value="" id="lastname" class="form-control padding-5" >

                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5"></div>

                
                

                 <div class="row padding-0">
                    <div class="col-xs-12 col-sm-7">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle">PPS Number</div>
                    </div>
                    <div class="col-xs-10 col-sm-4 text-align-left">
                            <input type="text" name="director_pps" value="" id="director_pps" class="form-control padding-5" data-fv-stringlength="true"
                                   maxlength="9" data-fv-stringlength-max="9" data-fv-stringlength-min="8"
                                   data-fv-stringlength-message="PPS number should be either 8 or 9 characters in length">
                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5"></div>


                 <div class="row padding-0">
                    <div class="col-xs-12 col-sm-7">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle">Director Occupation</div>
                    </div>
                    <div class="col-xs-10 col-sm-4 text-align-left">
                            <input type="text" name="director_occupation" value="" id="director_occupation" class="form-control padding-5" READONLY>

                    </div>
                    <div class="col-xs-2 col-sm-1">

                    </div>
                </div>
                <div class="row padding-5"></div>

                

                <div class="row padding-0">
                    <div class="col-xs-10 col-sm-7">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle">Director Nationality</div>
                    </div>
                    <div class="col-xs-10 col-sm-4 text-align-left">
                        
                        <select name="director_nationality" id="director_nationality" class="form-control" data-plugin="select2">
                            <?php    
                                foreach($nationalities as $row){
                                        if($row->name == 'Irish') {
                                            echo '<option value="'.$row->name.'" selected>'.$row->name.'</option>';
                                        } else {
                                            echo '<option value="'.$row->name.'">'.$row->name.'</option>';
                                        }
                                }
                            ?>    
                        </select>                        
                        
                    </div>
                    <div class="col-xs-2 col-sm-1">
                    </div>
                </div>
                <div class="row padding-5"></div>

                
                
                
                <div class="row padding-0">
                    <div class="col-xs-10 col-sm-7">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle">Enter Address</div>
                    </div>
                    <div class="col-xs-10 col-sm-4 text-align-right">
                        <button type="button" class="hideprinter btn btn-block btn-primary btn-sm right" id="directorAddress" >Enter Address</button>
                        <input type="hidden" name="dline1" id="dline1" />
                        <input type="hidden" name="dline2" id="dline2" />
                        <input type="hidden" name="dline3" id="dline3" />
                        <input type="hidden" name="dline4" id="dline4" />
                        <input type="hidden" name="dline5" id="dline5" />
                        <input type="hidden" name="dline6" id="dline6" />
                        <input type="hidden" name="dline7" id="dline7" />
                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5"></div>




                <div class="row padding-0">
                    <div class="col-xs-12 col-sm-7">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle">Date of Birth</div>
                    </div>
                    <div class="col-xs-10 col-sm-4 text-align-left">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="icon fa-calendar" aria-hidden="true"></i>
                                </span>
                                <input type="text" class="form-control padding-5" style="background-color:white;" name="director_date" id="director_date"  value="01/01/1999"  data-plugin="datepicker"  data-date-min-view-mode=”years”  data-plugin-options='{"format": "dd/mm/yyyy"}' data-pattern="[[99]]/[[99]]/[[9999]]" readonly >

                            </div>
                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5"></div>



                <div class="row padding-0">
                    <div class=" col-sm-7 col-xs-6">
                        <div class="control-label font-weight-300 black fowww.nt-size-15 vertical-align-middle">EEA Resident</div>
                    </div>
                    <div class="col-xs-4 text-align-center">
                            <input type="checkbox" class="groupborder icheckbox-primary" id="eea_resident" name="eea_resident"
                                   data-plugin="iCheck" data-checkbox-class="icheckbox_flat-blue" value="1" />
                    </div>
                    <div class="col-xs-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5"></div>




                <div class="row padding-0">
                    <div class=" col-sm-7 col-xs-6">
                        <div class="control-label font-weight-300 black fowww.nt-size-15 vertical-align-middle">Consent to act as a Director</div>
                    </div>
                    <div class="col-xs-4 text-align-center">
                            <input type="checkbox" class="groupborder icheckbox-primary" id="consent_director" name="consent_director"
                                   data-plugin="iCheck" data-checkbox-class="icheckbox_flat-blue" value="1" />
                    </div>
                    <div class="col-xs-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5"></div>





                <div class="row padding-15"><h5>Other Directorship 1</h5></div>


                <div class="row padding-0">
                    <div class="col-xs-12 col-sm-7">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle padding-left-15">Company Name</div>
                    </div>
                    <div class="col-xs-10 col-sm-4 text-align-left">
                            <input type="text" name="other_directorship_name_1" value="" id="other_directorship_name_1" class="form-control padding-5" >

                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5"></div>

                <div class="row padding-0">
                    <div class="col-xs-12 col-sm-7">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle padding-left-15">Company CRO Number</div>
                    </div>
                    <div class="col-xs-10 col-sm-4 text-align-left">
                            <input type="text" name="other_directorship_cro_1" value="" id="other_directorship_cro_1" class="form-control padding-5" >

                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5"></div>

                <div class="row padding-15"><h5>Other Directorship 2</h5></div>


                <div class="row padding-0">
                    <div class="col-xs-12 col-sm-7">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle padding-left-15">Company Name</div>
                    </div>
                    <div class="col-xs-10 col-sm-4 text-align-left">
                            <input type="text" name="other_directorship_name_2" value="" id="other_directorship_name_2" class="form-control padding-5" >

                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5"></div>

                <div class="row padding-0">
                    <div class="col-xs-12 col-sm-7">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle padding-left-15">Company CRO Number</div>
                    </div>
                    <div class="col-xs-10 col-sm-4 text-align-left">
                            <input type="text" name="other_directorship_cro_2" value="" id="other_directorship_cro_2" class="form-control padding-5" >

                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5"></div>

                <div class="row padding-15"><h5>Other Directorship 3</h5></div>



                <div class="row padding-0">
                    <div class="col-xs-12 col-sm-7">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle padding-left-15">Company Name</div>
                    </div>
                    <div class="col-xs-10 col-sm-4 text-align-left">
                            <input type="text" name="other_directorship_name_3" value="" id="other_directorship_name_3" class="form-control padding-5" >

                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5"></div>

                <div class="row padding-0">
                    <div class="col-xs-12 col-sm-7">
                        <div class="control-label font-weight-300 black font-size-15 vertical-align-middle padding-left-15">Company CRO Number</div>
                    </div>
                    <div class="col-xs-10 col-sm-4 text-align-left">
                            <input type="text" name="other_directorship_cro_3" value="" id="other_directorship_cro_3" class="form-control padding-5" >

                    </div>
                    <div class="col-xs-2 col-sm-1">
                        <i class="vertical-align-middle padding-top-10 tooltip-primary font-size-18 icon orange-600 wb-help-circle" data-plugin="webuiPopover"
                           data-trigger="click" data-placement="right" data-delay-show="0"
                           data-delay-hide="1000" data-title="" data-content="&lt;p&gt; If you have a stand-alone PHI policy enter the amount paid during the tax year. These policies cover you for illness payments when off work. If yourself and spouse both have seperate PHI policies please contact us. &lt;/p&gt;"></i>

                    </div>
                </div>
                <div class="row padding-5"></div>







                            <div class="col-sm-12 padding-0">
                                  <div class="col-xs-6 col-sm-6 text-align-right padding-left-10">
                                      <button type="button" class="hideprinter btn btn-warning btn-lg" id="cancelDirectorBtn">Cancel</button>
                                  </div>
                                  <div class="col-xs-6 col-sm-6 text-align-left padding-right-10">
                                      <button type="button" class="hideprinter btn btn_darkgreen btn-lg" id="saveDirectorBtn">Save Director - Secretary</button>
                                  </div>
                            </div>


                            <div class="col-sm-12 padding-25"></div>








                            <div class="col-sm-12 padding-25"></div>



<?php echo form_close(); ?>

                            <!-- END NEW DIRECTOR / SECRETARY FORM -->
            </div>



              <!-- END NEW ASSET BUTTON -->
              <button type="button" id="addDirectorBtn" class="hideprinter btn btn-primary btn-block btn-round font-size-16 margin-top-20 margin-bottom-20">
                  <i class="icon padding-top-3 fa-plus-square" aria-hidden="true"></i>
                  <strong id="showDirectorBtnText">Add details for Directors or Company Secretary</strong>
              </button>


















              <!-- CAPITAL ASSETS TABLE -->

            <div class="row">

            <div class="col-xs-12 col-sm-12">

                <table class="table table-striped" id="directorTable" data-plugin="floatThead">
                    <thead>
                        <tr>
                            <th class="font-weight-600 black font-size-15">Name</th>
                            <th class="font-weight-600 black font-size-15">Date </th>
                            <th class="font-weight-600 black font-size-15">Type</th>
                            <th colspan="2" class="font-weight-600 black font-size-15 text-align-center">Manage</th>
                        </tr>
                    </thead>


                    <tbody aria-relevant="all" aria-live="polite" id="directorTableRows">

                                    <?php
                                        $directorRecords = '';
                                        foreach ($directors as $record) {


                                              if ($record->type == '0') {
                                                  $subscription_type      =       "Director";
                                              } else {
                                                  $subscription_type      =       "Secretary";
                                              }



                                                  $directorRecords .= '
                                                      <tr  class="black director_'.$record->directorid.'">
                                                          <td class=\'table-align-centre\'>
                                                              <p>' . substr($record->date_of_birth,8,2)."/".substr($record->date_of_birth,5,2)."/".substr($record->date_of_birth,0,4)  . '</p>
                                                          </td>
                                                          <td class=\'table-align-centre\'>
                                                              <p>'.$record->firstname.' '.$record->lastname.'</p>
                                                          </td>
                                                          <td>
                                                              <p>' . $subscription_type . '</p>
                                                          </td>

                                                          <td class="text-align-center">
                                                                  <p><a href="javascript:void(null)" recid="' . $record->directorid . '" class="editDirectorRecord black"><i class="icon wb-edit margin-right-10" aria-hidden="true"></i>Edit</a></p>
                                                          </td>
                                                          <td class="text-align-center">
                                                                  <p><a href="javascript:void(null)" recid="' . $record->directorid . '" class="deleteDirectorRecordModal black"><i class="icon wb-rubber margin-right-10" aria-hidden="true"></i>Delete</a></p>
                                                          </td>
                                                      </tr>
                                                  ';
                                          }

                                    print $directorRecords;

                                    ?>


                    </tbody>


                </table>
              </div>

                            <div class="col-sm-12 padding-5"></div>
                            <div class="col-sm-12 text-align-center">
                                      <button type="submit" class="hideprinter btn btn_darkgreen btn-lg" id="saveDirectorStepBtn">Save &amp Continue</button>
                            </div>
                            <div class="col-sm-12 padding-15"></div>


          </div>
        </div>



            <!-- Seperate Assessment Modal Dialog Box -->

            <div class="modal fade modal-3d-flip-vertical" id="directorsecretarymodal" aria-hidden="true" aria-labelledby="" role="dialog" tabindex="100" >
                <div class="modal-dialog modal-center">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Warning</h4>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you wish to delete this Record?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                            <button type="button" id="delDirectorSecretaryrecBtn" class="btn btn_darkgreen" delRecID="0">Delete Director or Secretary</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal -->


    </div>






</div>
