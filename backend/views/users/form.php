<?php

use  \common\components\Misc;

$counter = 0;
$eVstatus = (!$new && isset($editable['verification']['verification_status'])) ? $editable['verification']['verification_status'] : 0;
$estatus = (!$new && isset($editable['verification']['verification_status']) && $eVstatus > 0) ? 1 : 0;

?>


<form method="post" action="<?= Yii::$app->request->baseUrl; ?>/users/update/" enctype="multipart/form-data">
   <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>"/>
   <input type="hidden" name="user[id]" value="<?= (!$new && isset($editable['id']) ? Misc::encrypt($editable['id']) : 0) ?>">
   <input type="hidden" name="userdetails[id]" value="<?= (!$new && isset($editable->id) && isset($editable->userDetails->id)) ? $editable->userDetails->id : 0 ?>">
   <div class="container-fluid">
      <div class="row page-titles">
         <div class="col-md-6 align-self-center">
             <?php
             if ($new): ?>
                <h3 class="text-themecolor m-b-0 m-t-0">Add <?= ucwords($type) ?></h3>
             <?php else: ?>
                <h3 class="text-themecolor m-b-0 m-t-0"><span class="highlighted"> <?= $editable->name; ?></span>
                </h3>
             <?php endif; ?>

         </div>
         <div class="col-md-6 align-self-center text-right">
            <a href="<?= Yii::$app->request->baseUrl; ?>/users/type/<?= $type ?>" class="btn btn-primary">
               <i class="mdi mdi-arrow-left m-r-5"></i>
               View All
            </a>
            <button class="btn btn-success" type="submit">
               <i class="mdi mdi-check"></i>
               Save
            </button>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card extended ">
               <div class="card-header">
                  <h5 class="card-title ">Account Info</h5>
               </div>
               <input type="hidden" name="user[role]" value="<?= $type ?>"/>
               <div class="card-body">

                   <?php if ($new): ?>
                      <div class="form-group">
                          <?php $counter++; ?>
                         <label for="<?= $counter; ?>" class="control-label required">Email</label>
                         <input id="<?= $counter; ?>" name="user[email]" type="text" class="form-control required">
                      </div>
                      <div class="form-group">
                          <?php $counter++; ?>
                         <label for="<?= $counter; ?>" class="control-label required">User Role</label>
                         <select class="form-control" name="user[role]" id="<?= $counter; ?>">
                            <option value="">Select User Role</option>
                             <?php foreach (Yii::$app->params['role_assoc'] as $k => $role) : ?>
                                <option value="<?= $k ?>"><?= ucwords($role) ?></option>
                             <?php endforeach; ?>
                         </select>
                      </div>
                      <div class="form-group">
                          <?php $counter++; ?>
                         <label for="<?= $counter; ?>" class="control-label required">New Password</label>
                         <input id="<?= $counter; ?>" name="user[password]" type="text" class="form-control required">
                      </div>
                      <div class="form-group">
                          <?php $counter++; ?>
                         <label for="<?= $counter; ?>" class="control-label required">Retype Password</label>
                         <input id="<?= $counter; ?>" name="user[password]" type="text" class="form-control required">
                      </div>

                   <?php else: ?>
                      <div class="form-group">
                          <?php $counter++; ?>
                         <label for="<?= $counter; ?>" class="control-label">Role</label>
                         <div class="form-control d-block">
                             <?= ucwords($editable->role0->display_name) ?>
                         </div>
                      </div>
                      <div class="form-group">
                          <?php $counter++; ?>
                         <label for="<?= $counter; ?>" class="control-label">Email</label>
                         <div class="form-control d-block">
                             <?= $editable->email ?>
                         </div>
                      </div>

                      <div class="form-group">
                          <?php $counter++; ?>
                         <label for="<?= $counter; ?>" class="control-label">Password</label>
                         <div class="d-hover d-block  <?= (($eVstatus == 0) && ($is_authorized)) ? '' : 'no-pointer' ?>" href="<?= (($eVstatus == 0) && ($is_authorized)) ? Yii::$app->request->baseUrl . '/verify/actions/' . $editable['verification_id'] : 'javascript:void(0);' ?>">
                            <a data-toggle="modal" data-target="#chgp" href="javascript:void(0);" class="form-control d-block change-password"> Change my password </a>
                         </div>
                      </div>
                      <div class="account-status">
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
                          <?php if (!$new && isset($editable['verification']['verification_comment']) && $editable['verification']['verification_comment'] != ''): ?>
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
                            <div class="form-group">
                               <label for="<?= $counter; ?>" class="control-label">Last updated On</label>
                               <div class="form-control d-block">
                                   <?= (!$new && isset($editable['updated_on']) ? Misc::date_DdmY($editable['updated_on']) : '') ?>
                                   <?php if (!$new && isset($editable['updatedBy']['name'])) : ?>
                                      by <a href="<?= Yii::$app->request->baseUrl; ?>/users/profile/<?= Misc::encrypt($editable['updatedBy']['id']) ?>">  <?= $editable['updatedBy']['name'] ?></a>
                                   <?php endif; ?>
                               </div>
                            </div>
                          <?php endif; ?>

                      </div>
                   <?php endif; ?>
               </div>
            </div>
         </div>
          <?php if (!($type == 'vendor' or $type == 'operator')) : ?>
             <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card extended">
                   <div class="card-header">
                      <h5 class="card-title">Personal Information</h5>
                   </div>
                   <div class="card-body">
                      <div class="form-group">
                          <?php $counter++; ?>
                         <label for="<?= $counter; ?>" class="control-label required">name</label>
                         <input id="<?= $counter; ?>" name="user[name]" type="text" class="form-control required" value="<?= (!$new && isset($editable->name)) ? $editable->name : '' ?>">
                      </div>
                      <div class="form-group">
                          <?php $counter++; ?>
                         <label for="<?= $counter; ?>" class="control-label ">address</label>
                         <textarea id="<?= $counter; ?>" name="userdetails[address]" type="text" class="form-control"><?= (!$new && isset($editable->userDetails->address)) ? ucwords($editable->userDetails->address) : '' ?></textarea>
                      </div>
                      <div class="form-group">
                          <?php $counter++; ?>
                         <label for="<?= $counter; ?>" class="control-label">citizenship number</label>
                         <input id="<?= $counter; ?>" name="userdetails[citizenship]" type="text" class="form-control" value="<?= (!$new && isset($editable->userDetails->citizenship)) ? ucwords($editable->userDetails->citizenship) : '' ?>">
                      </div>
                      <div class="form-group">
                          <?php $counter++; ?>
                         <label for="<?= $counter; ?>" class="control-label">license number</label>
                         <input id="<?= $counter; ?>" name="userdetails[license_no]" type="text" class="form-control" value="<?= (!$new && isset($editable->userDetails->license_no)) ? ucwords($editable->userDetails->license_no) : '' ?>">
                      </div>
                   </div>

                </div>
             </div>
          <?php endif; ?>
          <?php if ($type == 'agent' || $type == 'vendor') : ?>

             <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card extended">
                   <div class="card-header">
                      <h5 class="card-title">Company Information</h5>
                   </div>

                   <div class="card-body">
                      <div class="form-group">
                          <?php $counter++; ?>
                         <label for="<?= $counter; ?>" class="control-label required">company name</label>
                         <input id="<?= $counter; ?>" name="userdetails[company]" type="text" class="form-control required" value="<?= (!$new && isset($editable->userDetails->company)) ? ucwords($editable->userDetails->company) : '' ?>">
                      </div>
                      <div class="form-group">
                          <?php $counter++; ?>
                         <label for="<?= $counter; ?>" class="control-label required">address</label>
                         <input id="<?= $counter; ?>" name="userdetails[address]" type="text" class="form-control required" value="<?= (!$new && isset($editable->userDetails->address)) ? ucwords($editable->userDetails->address) : '' ?>">
                      </div>
                      <div class="form-group">
                          <?php $counter++; ?>
                         <label for="<?= $counter; ?>" class="control-label required">phone</label>
                         <input id="<?= $counter; ?>" name="userdetails[phone]" type="text" class="form-control required" value="<?= (!$new && isset($editable->userDetails->phone)) ? $editable->userDetails->phone : '' ?>">
                      </div>
                      <div class="form-group">
                          <?php $counter++; ?>
                         <label for="<?= $counter; ?>" class="control-label required">company registration number</label>
                         <input id="<?= $counter; ?>" name="userdetails[company_registration_number]" type="text" class="form-control required" value="<?= (!$new && isset($editable->userDetails->company_registration_number)) ? $editable->userDetails->company_registration_number : '' ?>">
                      </div>
                      <div class="form-group">
                          <?php $counter++; ?>
                         <label for="<?= $counter; ?>" class="control-label required">pan number</label>
                         <input id="<?= $counter; ?>" name="userdetails[pan_number]" type="text" class="form-control required" value="<?= (!$new && isset($editable->userDetails->pan_number)) ? $editable->userDetails->pan_number : '' ?>">
                      </div>
                      <div class="form-group">
                          <?php $counter++; ?>
                         <label for="<?= $counter; ?>" class="control-label required">Vat Registered</label>
                         <select id="<?= $counter; ?>" name="userdetails[is_vat]" type="text" class="form-control required">
                            <option <?= (!$new && isset($editable->userDetails->is_vat)) ? 'selected="selected"' : '' ?> value="0">Yes</option>
                            <option <?= (!$new && isset($editable->userDetails->is_vat)) ? 'selected="selected"' : '' ?> value="1">No</option>
                         </select>
                      </div>
                   </div>
                </div>

             </div>
             <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card extended">
                   <div class="card-header ">
                      <h5 class="card-title">Contact Details</h5>
                   </div>
                   <div class="card-body">

                      <div class="form-group">
                          <?php $counter++; ?>
                         <label for="<?= $counter; ?>" class="control-label required">contact person name</label>
                         <input id="<?= $counter; ?>" name="userdetails[contact_person_name]" type="text" class="form-control required" value="<?= (!$new && isset($editable->userDetails->contact_person_name)) ? $editable->userDetails->contact_person_name : '' ?>">
                      </div>
                      <div class="form-group">
                          <?php $counter++; ?>
                         <label for="<?= $counter; ?>" class="control-label ">contact person phone</label>
                         <input id="<?= $counter; ?>" name="userdetails[contact_person_phone]" type="number" class="form-control " value="<?= (!$new && isset($editable->userDetails->contact_person_phone)) ? $editable->userDetails->contact_person_phone : '' ?>">
                      </div>
                      <div class="form-group">
                          <?php $counter++; ?>
                         <label for="<?= $counter; ?>" class="control-label ">contact person email</label>
                         <input id="<?= $counter; ?>" name="userdetails[contact_person_email]" type="text" class="form-control " value="<?= (!$new && isset($editable->userDetails->contact_person_email)) ? $editable->userDetails->contact_person_email : '' ?>">
                      </div>

                   </div>
                </div>

             </div>
             <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card extended">
                   <div class="card-header ">
                      <h5 class="card-title">Transaction History</h5>
                   </div>
                   <div class="card-body">

                   </div>
                </div>

             </div>
             <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card extended">
                   <div class="card-header ">
                      <h5 class="card-title">Payment Details</h5>
                   </div>

                   <div class="card-body">
                       <?php if ($type == 'agent') : ?>
                          <div class="form-group">
                              <?php $counter++; ?>
                             <label for="<?= $counter; ?>" class="control-label required">commission percentage</label>
                             <input id="<?= $counter; ?>" name="userdetails[commission_percentage]" type="text" class="form-control required" value="<?= (!$new && isset($editable->userDetails->commission_percentage)) ? $editable->userDetails->commission_percentage : '' ?>">
                          </div>
                       <?php endif; ?>
                      <div class="form-group">
                          <?php $counter++; ?>
                         <label for="<?= $counter; ?>" class="control-label required">allowed gateways </label>
                         <label class="control-label "><span class="blue ml-10">Hold ctrl for multiple</span> </label>
                          <?php if (isset($editable->userDetails->allowed_gateways) && $editable->userDetails->allowed_gateways != '') {
                              $editable->userDetails->allowed_gateways = Misc::json_decode($editable->userDetails->allowed_gateways);
                          } ?>

                         <select multiple="multiple" id="<?= $counter; ?>" name="userdetails[allowed_gateways][]" type="text" class="form-control required">
                             <?php foreach (Yii::$app->params['payment_gateways'] as $k => $i): ?>
                                <optgroup label="<?= ucwords($k) ?>"></optgroup>
                                 <?php foreach ($i as $m => $n): ?>
                                   <option <?= (isset($editable->userDetails->allowed_gateways) && in_array($m, $editable->userDetails->allowed_gateways)) ? 'selected = "selected"' : '' ?> value="<?= $m ?>"><?= ucwords($n['name']) ?></option>
                                 <?php endforeach; ?><?php endforeach; ?>
                         </select>
                      </div>

                   </div>
                </div>

             </div>

          <?php endif; ?>

         <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card extended  account-info">
               <div class="card-header">
                  <h5 class="card-title">Profile Picture</h5>
               </div>
                <?php if ($new) : ?>
                   <input type="hidden" name="user[role]" value="<?= $type ?>"/>
                <?php endif; ?>


               <div class="card-body">

                  <div class="form-group custom-file">
                     <div class="image-wrapper" <?= (!$new && isset($editable['image']) && $editable['image'] != '') ? '' : 'style="display:none;"' ?>>
                        <img src="<?= (!$new && isset($editable['image']) && $editable['image'] != '') ? Yii::$app->request->baseUrl . '/../common/assets/images/uploads/' . $editable['image'] : '' ?>" class="custom-file-input-image" id="file-<?= $counter; ?>-image" alt=""/>
                     </div>
                      <?php if (!$new && isset($editable['image']) && $editable['image'] != ''): ?>
                         <div class="image-actions text-right">
                            <a href="javascript:void();" class="remove-image" data-tab="user" data-id="<?= \common\components\Misc::encrypt($editable['id']) ?>">
                               <i class="mdi mdi-close margin-right-5"></i>
                               Remove Image
                            </a>
                         </div>
                      <?php endif; ?>
                     <label class="custom-file-label" id="file-<?= $counter; ?>-label" for="file-<?= $counter; ?>">
                        <i class="fa fa-file"></i>
                        <span>Upload Image</span>
                     </label>
                     <input accept="image/x-png,image/jpeg" type="file" name="image" class="custom-file-input" id="file-<?= $counter; ?>" onchange="readURL(this);" aria-describedby="file-<?= $counter; ?>" src="<?= (!$new && isset($editable['image']) && $editable['image'] != '') ? $editable['image'] : '' ?>">
                  </div>
               </div>
            </div>
         </div>
      </div>


   </div>
</form><!-- Trigger the modal with a button -->

<!-- The Modal -->
<div class="modal " id="chgp">
   <div class="modal-dialog modal-sm">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">Change Password</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>

         <!-- Modal body -->
         <div class="modal-body">

         </div>

         <!-- Modal footer -->
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         </div>

      </div>
   </div>
</div><!--<pre>--><?php //print_r(print_r($editable)) ?><!--</pre>-->





