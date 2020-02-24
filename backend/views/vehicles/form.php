<?php

use \common\components\Misc;

$eVstatus = (!$new && isset($editable['verification']['verification_status'])) ? $editable['verification']['verification_status'] : 0;
$estatus = (!$new && isset($editable['verification']['verification_status']) && $eVstatus > 0) ? 1 : 0;
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js');

$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js');

//$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js');

//$this->registerJsFile(Yii::$app->request->baseUrl . '/../common/assets/vendor/jquery-file-upload/js/jquery.iframe-transport.js');
//$this->registerJsFile(Yii::$app->request->baseUrl . '/../common/assets/vendor/jquery-file-upload/js/jquery.fileupload.js');
//$this->registerJsFile(Yii::$app->request->baseUrl . '/../common/assets/vendor/jquery-file-upload/js/jquery.fileupload.js');

$counter = 0;

$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/vehicles.js', ['position' => \yii\web\View::POS_END]);
$is_authorized
?>

<div class="container-fluid">
   <form method="post" action="<?= Yii::$app->request->baseUrl; ?>/vehicles/update/" enctype="multipart/form-data">

      <div class="row page-titles">
         <div class="col-md-6 align-self-center">
             <?php
             if ($new): ?>
                <h3 class="text-themecolor m-b-0 m-t-0">Add Vehicles</h3>
             <?php else: ?>
                <h3 class="text-themecolor m-b-0 m-t-0">Edit Vehicle : <span class="highlighted"> <?= ucwords($editable->number_plate); ?></span></h3>
             <?php endif; ?>

         </div>
         <div class="col-md-6 align-self-center text-right">
            <a href="<?= Yii::$app->request->baseUrl; ?>/vehicles" class="btn btn-primary">
               <i class="mdi mdi-arrow-left m-r-5"></i>
               View All
            </a>
            <button class="btn btn-success" type="submit">
               <i class="mdi mdi-check"></i>
               Save
            </button>
         </div>
      </div>
      <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>"/>
      <input type="hidden" id="vehicle" name="vehicle[id]" value="<?= (!$new && isset($editable['id']) ? Misc::encrypt($editable['id']) : 0) ?>">
      <div class="row">
         <div class="col-lg-8 col-md-12">
            <div class="card extended">
               <div class="card-body">
                  <div class="row">
                     <div class="col-lg-4 col-sm-6">
                        <div class="form-group ">
                            <?php $counter++; ?>
                           <label for="<?= $counter; ?>" class="control-label required">Vendor</label>
                           <select <?= ($is_authorized) ? '' : 'disabled="disabled"' ?> id="<?= $counter; ?>" name="vehicle[user_id]" class="form-control required select select2" data-placeholder="Select a vendor" data-allow-clear="true">
                              <option value="">Select a Vendor</option>
                               <?php if (isset($vendors) && count($vendors) > 0):
                                   foreach ($vendors as $vendor) : ?>
                                      <option <?= (!$new && isset($editable['id']) && $vendor['id'] == $editable->user_id) ? 'selected="selected"' : '' ?> value="<?= $vendor['id'] ?>"><?= ucwords($vendor->userDetails->company) ?></option>
                                   <?php endforeach;
                               endif; ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-6 ">
                        <div class="form-group">
                            <?php $counter++; ?>
                           <label for="<?= $counter; ?>" class="control-label required">Vehicle Type</label>

                           <select id="<?= $counter; ?>" name="vehicle[type]" class="form-control required select select2" data-plugin="">
                              <option value="">Select Vehicle Type</option>
                               <?php if (isset($types) && count($types) > 0):
                                   foreach ($types as $type) : ?>
                                      <option <?= (!$new && isset($editable['type']) && $type['id'] == $editable['type']) ? 'selected="selected"' : '' ?> value="<?= $type['id'] ?>"><?= ucwords($type['name']) ?></option>
                                   <?php endforeach;
                               endif; ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-6">
                        <div class="form-group">
                            <?php $counter++; ?>
                           <label for="<?= $counter; ?>" class="control-label required">Number Plate</label>
                           <input id="<?= $counter; ?>" value="<?= (!$new && isset($editable['number_plate']) ? ucwords($editable['number_plate']) : '') ?>" name="vehicle[number_plate]" type="text" class="form-control required">
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-6 ">
                        <div class="form-group">
                            <?php $counter++; ?>
                           <label for="<?= $counter; ?>" class="control-label required">Bluebook Number</label>
                           <input id="<?= $counter; ?>" value="<?= (!$new && isset($editable['bluebook_num']) ? ucwords($editable['bluebook_num']) : '') ?>" name="vehicle[bluebook_num]" type="text" class="form-control required">
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-6 ">
                        <div class="form-group">
                            <?php $counter++; ?>
                           <label for="<?= $counter; ?>" class="control-label required">Registration Date</label>
                           <input id="<?= $counter; ?>" value="<?= (!$new && isset($editable['registration_date']) ? $editable['registration_date'] : '') ?>" name="vehicle[registration_date]" class="form-control required" data-plugin="datepicker">
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-6 ">
                        <div class="form-group">
                            <?php $counter++; ?>
                           <label for="<?= $counter; ?>" class="control-label required">Manufacturer</label>
                           <input id="<?= $counter; ?>" value="<?= (!$new && isset($editable['manufacturer']) ? $editable['manufacturer'] : '') ?>" name="vehicle[manufacturer]" class="form-control required">
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-6 ">
                        <div class="form-group">
                            <?php $counter++; ?>
                           <label for="<?= $counter; ?>" class="control-label">Model</label>
                           <input id="<?= $counter; ?>" value="<?= (!$new && isset($editable['model']) ? $editable['model'] : '') ?>" name="vehicle[model]" class="form-control">
                        </div>
                     </div>
                     <div class="col-lg-8 col-sm-6 ">
                        <div class="form-group">
                            <?php
                            $counter++;
                            if (!$new && isset($editable['amenities'])) {
                                $editable['amenities'] = ($editable['amenities'] != '') ? Misc::json_decode($editable['amenities']) : [];

                            }
                            ?>
                           <label for="<?= $counter; ?>" class="control-label">Amenities</label>
                           <select multiple="multiple" id="<?= $counter; ?>" name="vehicle[amenities][]" class="form-control select2">
                               <?php if (isset($amenities) && !empty($amenities)) :
                                   foreach ($amenities as $k => $am): ?>
                                      <option <?= (!$new && isset($editable['amenities']) && is_array($editable['amenities']) && in_array($am['id'], $editable['amenities'])) ? ' selected = "selected" ' : '' ?> value="<?= $am['id'] ?>"><?= $am['name'] ?></option>
                                   <?php endforeach; ?><?php endif; ?>

                           </select>
                        </div>
                     </div>

                  </div>
                  <div class="form-group">
                     <label for="<?= $counter; ?>" class="control-label">Description</label>
                      <?php $counter++; ?>
                     <textarea data-plugin="summernote" id="<?= $counter; ?>" name="vehicle[description]" class="form-control"><?= (!$new && isset($editable['description']) ? $editable['description'] : '') ?></textarea>
                  </div>
               </div>
            </div>

         </div>
         <div class="col-lg-4 col-md-12 ">
            <div class="card extended">
               <div class="card-body">
                   <?php if (!$new) : ?>
                      <div class="form-group">
                          <?php $counter++; ?>
                         <label for="<?= $counter; ?>" class="control-label">Verification Status</label>

                         <a class="d-hover d-block  <?= (($eVstatus == 0) && ($is_authorized)) ? '' : 'no-pointer' ?>" href="<?= (($eVstatus == 0) && ($is_authorized)) ? Yii::$app->request->baseUrl . '/verify/actions/' . $editable['verification_id'] : 'javascript:void(0);' ?>">
                            <div class="form-control d-block <?= ($eVstatus > 0) ? 'success' : 'danger' ?>">
                               <div class="verification-status">
                                   <?php if ($eVstatus == 0) : ?>
                                      <i class="mdi mdi-exclamation danger"></i>
                                   <?php elseif ($eVstatus > 0): ?>
                                      <i class="mdi mdi-check success"></i>
                                   <?php else: ?>
                                      <i class="mdi mdi-close danger"></i>
                                   <?php endif; ?>
                                   <?= ucwords(Yii::$app->params['verification_status'][$eVstatus]) ?>
                               </div>
                                <?php if ($is_authorized) : ?>
                                   <span class="pull-right hover label label-success">Verify / Reject</span>
                                <?php endif; ?>

                            </div>
                         </a>
                      </div>
                       <?php if (isset($editable['verification']['verification_comment']) && $editable['verification']['verification_comment'] != ''): ?>
                         <div class="form-group">
                             <?php $counter++; ?>
                            <label for="<?= $counter; ?>" class="control-label">Admin Comment</label>
                            <div class=" d-block <?= ($eVstatus > 0) ? 'success' : 'danger' ?>">
                                <?= $editable['verification']['verification_comment'] ?>
                            </div>
                         </div>
                       <?php endif; ?>
                      <div class="form-group">
                          <?php $counter++; ?>
                         <label for="<?= $counter; ?>" class="control-label">Status</label>
                         <div class="form-control d-block <?= ($estatus > 0) ? 'success' : 'danger' ?> ">
                             <?= ($estatus > 0) ? 'Active' : 'Inactive' ?>
                             <?php if ($is_authorized == 1 && $eVstatus > 0) : ?>
                                <a href="javascript:void(0);" class="pull-right label label-success toggle-status" data-a="<?= Misc::encrypt($editable['id']) ?>" data-b="<?= Misc::encrypt(Misc::getClass($editable)) ?>"><?= ($estatus) ? 'Deactivate' : 'Activate' ?></a>
                             <?php endif; ?>
                         </div>
                      </div>

                       <?php if ($editable['created_on'] != '') : ?>
                         <div class="form-group">
                            <label for="<?= $counter; ?>" class="control-label">Created On</label>
                            <div class="form-control d-block">
                                <?= (!$new && isset($editable['created_on']) ? Misc::date_DdmY($editable['created_on']) : '') ?>
                                <?php if (!$new && isset($editable['createdBy']['name'])) : ?>
                                   by <a href="<?= Yii::$app->request->baseUrl; ?>/users/profile/<?= Misc::encrypt($editable['createdBy']['id']) ?>">  <?= $editable['createdBy']['name'] ?></a>
                                <?php endif; ?>
                            </div>
                         </div>
                       <?php endif; ?><?php if ($editable['updated_on'] != '') : ?>
                         <div class="form-group-last">
                            <label for="<?= $counter; ?>" class="control-label">Last updated On</label>
                            <div class="form-control d-block">
                                <?= (!$new && isset($editable['updated_on']) ? Misc::date_DdmY($editable['updated_on']) : '') ?>
                                <?php if (!$new && isset($editable['updatedBy']['name'])) : ?>
                                   by <a href="<?= Yii::$app->request->baseUrl; ?>/users/profile/<?= Misc::encrypt($editable['updatedBy']['id']) ?>">  <?= $editable['updatedBy']['name'] ?></a>
                                <?php endif; ?>
                            </div>
                         </div>

                       <?php endif; ?>

                   <?php endif; ?>


               </div>
            </div>
            <div class="card extended">
               <div class="card-body">
                  <div class="form-group">
                     <div class="custom-file">
                         <?php $counter++; ?>
                        <div class="image-wrapper">
                           <img src="<?= (!$new && isset($editable['image'])) ? Yii::$app->request->baseUrl . '/../common/assets/images/uploads/' . $editable['image'] : '' ?>" class="custom-file-input-image" id="file-<?= $counter; ?>-image" alt=""/>
                        </div>
                         <?php if (!$new && isset($editable['image']) && $editable['image'] != ''): ?>
                            <div class="image-actions text-right">
                               <a href="javascript:void();" class="remove-image" data-tab="sections" data-id="<?= \common\components\Misc::encrypt($editable['id']) ?>">
                                  <i class="mdi mdi-close margin-right-5"></i>
                                  Remove Image
                               </a>
                            </div>
                         <?php endif; ?>
                        <label class="custom-file-label" id="file-<?= $counter; ?>-label" for="file-<?= $counter; ?>">
                           <i class="fa fa-file"></i>
                           <span>Upload Image</span>
                        </label>
                        <input accept="image/x-png,image/jpeg" type="file" name="image" class="custom-file-input" id="file-<?= $counter; ?>" onchange="readURL(this);" aria-describedby="file-<?= $counter; ?>" src="">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </form>

   <div class="card extended">
      <div class="card-header">
         <h5 class="card-title">Seats</h5>
      </div>
       <?php if (!$new) : ?>
          <div class="card-body seating">
             <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                   <div class="seat-parameters">
                      <p>Choose vehicle size</p>
                      <div class="row">
                         <div class="col-lg-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <?php $counter++; ?>
                               <select name="vehicle[seat_map]" class="form-control required" id="seat-map">
                                   <?php foreach (Yii::$app->params['vehicle-layout'] as $k => $i): ?>
                                      <option value="<?= $k ?>" data-width="<?= $i['width'] ?>" data-height="<?= $i['height'] ?>"><?= ucwords($k) ?></option>
                                   <?php endforeach; ?>
                               </select>

                            </div>

                         </div>
                         <div class="col-lg-8 col-sm-6 col-xs-12">
                            <div class="form-group">
                               <button class="btn btn-secondary" id="add-seat">Add a seat</button>
                               <button id="update-layout" class="btn btn-secondary">Update seat layout</button>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                   <div class="seating-layout-wrapper">
                       <?php
                       $h = (isset(Yii::$app->params['vehicle-layout'][$editable['seat_map']])) ? Yii::$app->params['vehicle-layout'][$editable['seat_map']]['height'] : Yii::$app->params['vehicle-layout']['default']['height'];
                       $w = (isset(Yii::$app->params['vehicle-layout'][$editable['seat_map']])) ? Yii::$app->params['vehicle-layout'][$editable['seat_map']]['width'] : Yii::$app->params['vehicle-layout']['default']['width'];
                       ?>
                      <div id="seating-layout" style="height:<?= $h ?>px; width:<?= $w ?>px;" class="seating-layout" data-vehicle="<?= Misc::encrypt($editable['id']) ?>">
                         <div class="seats">
                             <?php $seats = (!$new && isset($editable['seats'])) ? Misc::json_decode($editable['seats'], true) : [];
                             // Has seat details
                             if (!empty($seats)) :
                                 foreach ($seats as $k => $s):
                                     $id = (isset($s['id']) && $s['id'] != '') ? $s['id'] : $k;
                                     $name = (isset($s['name']) && $s['name'] != '') ? $s['name'] : $id;
                                     $status = (isset($s['status']) && $s['status'] != '') ? $s['status'] : 0;
                                     $reservation = (isset($s['reservation']) && $s['reservation'] != '') ? $s['reservation'] : 0;
                                     ?>
                                    <div class="seat-wrapper seat" style="left:<?= $s['position']['left'] ?>; top:<?= $s['position']['top'] ?>; height:<?= $s['size']['height'] ?>; width:<?= $s['size']['width'] ?>" data-plugin="drag" data-seat="<?= $id ?>" data-name="<?= $name ?>" data-status="<?= $status ?>" data-reservation="<?= $reservation ?>"><?= substr($name, 0, 2) ?></div>
                                 <?php endforeach;
                             else : // No Seat Details
                                 if ($editable['seat_count'] != '' && $editable['seat_count'] > 0) :
                                     for ($i = 0; $i < $editable['seat_count']; $i++) : ?>
                                        <div class="seat-wrapper seat" data-plugin="drag" data-seat="<?= $i ?>" data-name="" data-status="" data-reservation=""><?= $i + 1 ?></div>
                                     <?php endfor;
                                 endif;
                             endif;
                             ?>

                         </div>
                      </div>
                   </div>
                </div>

             </div>


          </div>
       <?php else: ?>
          <div class="card-body">
             <h3>Please save vehicle to update seats.</h3>
          </div>
       <?php endif; ?>


      <!--====*==== Old Seat Plan ====*====-->
       <?php if (true == false && !$new && isset($editable['seats'])) :
           $seats = (!$new && isset($editable['seats'])) ? Misc::json_decode($editable['seats']) : [];
           $sc = $sr = 0;
           if (empty($seats)) : ?>
              <div class="seat-update-notes">
                 <div><?= Yii::$app->params['settings']['seat_info_change_disclaimer'] ?></div>
              </div>
           <?php endif; ?>
          <div class="card-body">
             <div class="vehicle-layout">
                <div class="vehicle-front">
                   <i class="mdi mdi-steering"></i>
                </div>
                <div id="seat-plan" class="seat-plan">


                    <?php if (!empty($seats)) : ?>
                       <table class="table">
                           <?php foreach ($seats as $k => $r): $sc = 0; ?>
                              <tr>
                                  <?php foreach ($r as $m => $c): ?>
                                     <td>
                                        <input type="text" class="form-control" name="seats[<?= $k ?>][<?= $m ?>]" value="<?= isset($c['name']) ? $c['name'] : '' ?>"></td>
                                      <?php $sc++; endforeach; ?>
                              </tr>
                               <?php $sr++; endforeach; ?>
                       </table>
                    <?php endif; ?>
                </div>
             </div>
              <?php if (empty($seats)) : ?>
                 <div class="row">
                    <div class="col-sm-4 col-xs-12">
                       <div class="form-group">
                           <?php $counter++; ?>
                          <label for="<?= $counter; ?>" class="control-label">Rows</label>
                          <input value="<?= $sc ?>" type="number" id="<?= $counter; ?>" min="<?= Yii::$app->params['settings']['min_vehicle_seats'] ?>" max="<?= Yii::$app->params['settings']['max_vehicle_seats'] ?>" name="" class="form-control seat-rows">
                       </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                       <div class="form-group">
                           <?php $counter++;
                           ?>
                          <label for="<?= $counter; ?>" class="control-label">Columns</label>
                          <input value="<?= $sr ?>" type="number" id="<?= $counter; ?>" min="0" max="8" name="" class="form-control seat-cols">
                       </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                       <div class="form-group ">
                          <label class="danger">Reset Layout ?</label>
                          <a id="update-seat-layout" class="btn btn-primary btn-block" href="javascript:void(0);">Update</a>
                       </div>
                    </div>

                 </div>
              <?php endif; ?>
          </div>
       <?php endif; ?>
      <!--====*==== Old Seat Plan ====*====-->
   </div>
</div>


<div class="right-sidebar">
   <div class="rpanel-title"> Edit Seat <i class="mdi mdi-close right-side-toggle"></i>
      <div class="clearfix"></div>
   </div>
   <div class="r-panel-body">
      <input type="hidden" id="seat-id" value=""/>
      <div class="form-group">
          <?php $counter++; ?>
         <label for="seat-name" class="control-label">Name <span id="seat-error"></span></label>
         <input type="text" id="seat-name" value="" class="form-control required">
      </div>
      <div class="form-group">
          <?php $counter++; ?>
         <label for="seat-status" class="control-label">Status</label>
         <select id="seat-status" class="form-control required">
             <?php foreach (Yii::$app->params['seat-status'] as $k => $i): ?>
                <option value="<?= $k ?>"><?= ucwords($i) ?></option>
             <?php endforeach; ?>

         </select>
      </div>
      <div class="form-group">
          <?php $counter++; ?>
         <label for="seat-reservations" class="control-label">Reservations</label>
         <select id="seat-reservations" class="form-control required">
             <?php foreach (Yii::$app->params['seat-reservations'] as $k => $i): ?>
                <option value="<?= $k ?>"><?= ucwords($i) ?></option>
             <?php endforeach; ?>
         </select>
      </div>
      <div class="form-group">
         <button type="button" class="btn btn-primary right-side-toggle">Update</button>
         <!--         <button id='Remove-seat' type="button" class="btn btn-primary">Remove</button>-->
      </div>
   </div>
</div>