<?php
Yii::$app->session->getFlash('success');
use \common\components\Misc;

$this->registerCssFile(Yii::$app->request->baseUrl . '/assets/plugins/datatables/datatables.min.css');
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/datatables/datatables.min.js');


$this->title = Yii::$app->params['system_name'] . ' | Locations';
?>
<?php $new = ($editable == false) ? 1 : 0; ?>
<div class="container-fluid">
   <div class="row page-titles">
      <div class="col-md-6 align-self-center">
         <h3 class="text-themecolor m-b-0 m-t-0">Locations</h3>
      </div>
      <div class="col-md-6 align-self-center text-right">
          <?php if (!$new) : ?>
             <a href="<?= Yii::$app->request->baseUrl; ?>/locations/" class="btn btn-primary">
                <i class="mdi mdi-plus m-r-5"></i>
                Add New Location
             </a>
          <?php endif; ?>
      </div>
   </div>

   <div class="row">
      <div class="col-md-4 col-sm-12">
         <div class="card extended">
            <div class="card-header">
                <?php if ($new): ?>
                   <h5 class="card-title">Add New Location</h5>
                <?php else: ?>
                   <h5 class="card-title">Edit <?= ucwords($editable['name']); ?> </h5>
                <?php endif; ?>

            </div>
             <?php if (!$new) {
                 $eVstatus = (isset($editable['verification']['verification_status'])) ? $editable['verification']['verification_status'] : 0;
                 $estatus = ($eVstatus > 0) ? $editable['is_active'] : 0;
             } ?>
            <div class="card-body">
               <form method="post" action="<?= Yii::$app->request->baseUrl; ?>/locations/update/" enctype="multipart/form-data">
                  <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>"/>
                  <input type="hidden" name="post[id]" value="<?= (isset($editable['id']) ? $editable['id'] : '') ?>">
                   <?php $counter = 0; ?>
                  <div class="form-group">
                      <?php $counter++; ?>
                     <label for="<?= $counter; ?>" class="control-label required">Name</label>
                     <input id="<?= $counter; ?>" value="<?= (isset($editable['name']) ? $editable['name'] : '') ?>" name="post[name]" type="text" class="form-control required">
                  </div>
                  <div class="form-group">
                      <?php $counter++; ?>
                     <label for="<?= $counter; ?>" class="control-label required">Street</label>
                     <input id="<?= $counter; ?>" value="<?= (isset($editable['street']) ? $editable['street'] : '') ?>" name="post[street]" type="text" class="form-control required">
                  </div>

                  <div class="form-group">
                      <?php $counter++; ?>
                     <label for="<?= $counter; ?>" class="control-label required">City</label>
                     <input id="<?= $counter; ?>" value="<?= (isset($editable['city']) ? $editable['city'] : '') ?>" name="post[city]" type="text" class="form-control required">
                  </div>


                  <div class="row">
                     <div class="col-sm-6 col-xs-12">
                        <div class="form-group">
                            <?php $counter++; ?>
                           <label for="<?= $counter; ?>" class="control-label required">District</label>
                           <input id="<?= $counter; ?>" value="<?= (isset($editable['district']) ? $editable['district'] : '') ?>" name="post[district]" type="text" class="form-control required">
                        </div>
                     </div>
                     <div class=" col-sm-6 col-xs-12">
                        <div class="form-group">
                            <?php $counter++; ?>
                           <label for="<?= $counter; ?>" class="control-label required">State</label>
                           <select id="<?= $counter; ?>" name="post[state]" class="form-control required">
                               <?php foreach (Yii::$app->params['states'] as $k => $state) : ?>
                                  <option <?= (isset($editable['state']) && $editable['state'] == $k) ? 'selected = "selected"' : '' ?> value="<?= $k ?>"> <?= $state ?></option>
                               <?php endforeach; ?>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-xs-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <?php $counter++; ?>
                           <label for="<?= $counter; ?>" class="control-label">Longitude</label>
                           <input id="<?= $counter; ?>" value="<?= (isset($editable['longitude']) ? $editable['longitude'] : '') ?>" name="post[longitude]" type="text" class="form-control">
                        </div>
                     </div>
                     <div class="col-xs-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <?php $counter++; ?>
                           <label for="<?= $counter; ?>" class="control-label">latitude</label>
                           <input id="<?= $counter; ?>" value="<?= (isset($editable['latitude']) ? $editable['latitude'] : '') ?>" name="post[latitude]" type="text" class="form-control">
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                      <?php $counter++; ?>
                     <label for="<?= $counter; ?>" class="control-label">description</label>
                     <textarea id="<?= $counter; ?>" name="post[description]" type="text" class="form-control"><?= (isset($editable['description']) ? $editable['description'] : '') ?></textarea>
                  </div>
                   <?php if (!$new) : ?>
                      <div class="form-group">
                          <?php $counter++; ?>
                         <label for="<?= $counter; ?>" class="control-label">Verification Status</label>

                         <a class="d-hover d-block  <?= ($eVstatus == 0) ? '' : 'no-pointer' ?>" href="<?= ($eVstatus == 0) ? Yii::$app->request->baseUrl . '/verify/actions/' . $editable['verification_id'] : 'javascript:void(0);' ?>">
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

                               <span class="pull-right hover label label-success">Verify / Reject</span>


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

                         </div>
                      </div>
                       <?php if ($editable['created_on'] != '') : ?>
                         <div class="form-group">
                            <label for="<?= $counter; ?>" class="control-label">Created On</label>
                            <div class="form-control d-block">
                                <?= (isset($editable['created_on']) ? Misc::date_DdmY($editable['created_on']) : '') ?>
                                <?php if (isset($editable['createdBy']['name'])) : ?>
                                   by <a href="<?= Yii::$app->request->baseUrl; ?>/users/profile/<?= Misc::encrypt($editable['createdBy']['id']) ?>">  <?= $editable['createdBy']['name'] ?></a>
                                <?php endif; ?>
                            </div>
                         </div>
                       <?php endif; ?><?php if ($editable['updated_on'] != '') : ?>
                         <div class="form-group">
                            <label for="<?= $counter; ?>" class="control-label">Last updated On</label>
                            <div class="form-control d-block">
                                <?= (isset($editable['updated_on']) ? Misc::date_DdmY($editable['updated_on']) : '') ?>
                                <?php if (isset($editable['updatedBy']['name'])) : ?>
                                   by <a href="<?= Yii::$app->request->baseUrl; ?>/users/profile/<?= Misc::encrypt($editable['updatedBy']['id']) ?>">  <?= $editable['updatedBy']['name'] ?></a>
                                <?php endif; ?>
                            </div>
                         </div>
                       <?php endif; ?><?php endif; ?>
                  <div class="form-group m-t-40 m-b-0 text-right">
                     <button class="btn btn-primary" type="submit">
                        <i class="mdi mdi-check"></i>
                        <!--                         --><?//= ($is_authorized) ? 'Verify & ' : '' ?><!-- -->
                        Save
                     </button>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="col-md-8 col-sm-12">
         <div class="card extended">
            <div class="card-header">
               <h5 class="card-title">Location List</h5>
            </div>
            <div class="card-body ">
                <?php if (isset($all) && count($all) > 0): ?>
                   <div class="table-responsive">
                      <table class="table  table-striped" data-plugin="datatable">
                         <thead>
                         <tr>
                            <th>Name</th>
                            <th>Street</th>
                            <th>City</th>
                            <th>District</th>
                            <th>State</th>
                            <th>Status</th>
                            <th></th>
                         </tr>
                         </thead>
                         <tbody>
                         <?php foreach ($all as $a) :
                             $vstatus = (isset($a['verification']['verification_status'])) ? $a['verification']['verification_status'] : 0;
                             $status = ($vstatus > 0) ? $a['is_active'] : 0;
                             ?>

                            <tr>
                               <td><?= ucwords($a['name']); ?></td>
                               <td><?= ucwords($a['street']); ?></td>
                               <td><?= ucwords($a['city']); ?></td>
                               <td><?= ucwords($a['district']); ?></td>
                               <td>
                                   <?= ($a['state'] > 0) ? (Yii::$app->params['states'][$a['state']]) : '' ?>
                               </td>
                               <td>
                                   <?php if ($vstatus > 0) : ?>
                                      <span class="label label-success"> <?= Yii::$app->params['verification_status'][$vstatus] ?></span>
                                      <!--                                      <a href="javascript:void(0);" class="label --><?//= ($status) ? 'label-success' : 'label-danger' ?><!--  --><?//= ($is_authorized) ? 'toggle-status' : 'disabled' ?><!-- " --><?//= ($is_authorized) ? 'data-a="' . Misc::encrypt($a['id']) . '" data-b="' . Misc::encrypt(Misc::getClass($a)) . '"' : '' ?><!----><?//= ($status) ? 'Active' : 'Inactive' ?><!--</a>-->
                                   <?php elseif ($vstatus == 0): ?>
                                      <span class="label label-danger"><?= ucwords(Yii::$app->params['verification_status'][$vstatus]) ?></span>
                                   <?php elseif ($vstatus < 0): ?>
                                      <span class="label label-light-danger"><?= ucwords(Yii::$app->params['verification_status'][$vstatus]) ?></span>
                                   <?php endif; ?>
                               </td>
                               <td class="text-right">
                                  <a class="label label-secondary m-r-10" href="<?= Yii::$app->request->baseUrl; ?>/locations/edit/<?= Misc::encrypt($a['id']) ?>">View | Edit </a>
                               </td>
                            </tr>
                         <?php endforeach; ?>

                         </tbody>
                      </table>
                   </div>
                <?php else: ?>
                   <h4>No Locations Found.</h4>
                <?php endif; ?>
            </div>

         </div>
      </div>
   </div>

</div>