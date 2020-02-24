<?php
$this->title = Yii::$app->params['system_name'] . ' | Vehicle Types';
$this->registerCssFile(Yii::$app->request->baseUrl . '/assets/plugins/datatables/datatables.min.css');
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/datatables/datatables.min.js');
$is_authorized = (Yii::$app->params['permissions']) ? 1 : 0;

use common\components\Misc;


?>



<?php $new = ($editable == false) ? 1 : 0; ?>
<div class="container-fluid">
   <div class="row page-titles">
      <div class="col-md-6 align-self-center">
         <h3 class="text-themecolor m-b-0 m-t-0">Vehicle Types</h3>
      </div>
      <div class="col-md-6 align-self-center text-right">
          <?php if (!$new) : ?>
             <a href="<?php echo Yii::$app->request->baseUrl; ?>/vehicles/types" class="btn btn-primary">
                <i class="mdi mdi-plus m-r-5"></i>
                Add New Vehicle Type
             </a>
          <?php endif; ?>
      </div>
   </div>

   <div class="row">
      <div class="col-md-4 col-sm-12">
         <div class="card extended">
            <div class="card-header">
                <?php if ($new): ?>
                   <h5 class="card-title">Add New Vehicle Type</h5>
                <?php else: ?>
                   <h5 class="card-title">Edit <?php echo $editable['name']; ?> </h5>
                <?php endif; ?>
            </div>
            <div class="card-body">
               <form method="post" action="<?php echo Yii::$app->request->baseUrl; ?>/vehicles/update-vehicle-type/">
                  <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>"/>
                  <input type="hidden" name="type[id]" value="<?php echo(isset($editable['id']) ? Misc::encrypt($editable['id']) : 0) ?>">
                  <!--                   --><?php //echo Yii::$app->security->encryptByPublicKey($editable['id']); ?>
                   <?php $counter = 0; ?>
                  <div class="form-group">
                      <?php $counter++; ?>
                     <label for="<?php echo $counter; ?>" class="control-label required">Type</label>
                     <input id="<?php echo $counter; ?>" value="<?php echo(isset($editable['name']) ? $editable['name'] : '') ?>" name="type[name]" type="text" class="form-control required">
                  </div>
                  <div class="form-group">
                      <?php $counter++; ?>
                     <label for="<?php echo $counter; ?>" class="control-label">Remark</label>
                     <input id="<?php echo $counter; ?>" value="<?php echo(isset($editable['remark']) ? $editable['remark'] : '') ?>" name="type[remark]" type="text" class="form-control">
                  </div>
                   <?php if (!$new) :
                       $eVstatus = (isset($editable['verification']['verification_status'])) ? $editable['verification']['verification_status'] : 0;
                       $estatus = ($eVstatus > 0) ? $editable['is_active'] : 0; ?>

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
                                <a href="javascript:void(0);" class="pull-right label label-success toggle-status" data-a="<?= Misc::encrypt($editable['id']) ?>" data-b="<?= Misc::encrypt(Misc::getClass($editable)) ?>"><?= ($editable['is_active'] == 1) ? 'Deactivate' : 'Activate' ?></a>
                             <?php endif; ?>
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
                         <?= ($is_authorized) ? 'Verify & ' : '' ?> Save
                     </button>
                  </div>
               </form>
            </div>
         </div>
      </div>

      <div class="col-md-8 col-sm-12">
         <div class="card extended">
            <div class="card-header">
               <h5 class="card-title">Vehicle Types List</h5>
            </div>
            <div class="card-body">
                <?php if (isset($all) && count($all) > 0): ?>
                   <div class="table-responsive">
                      <table class="table  table-striped" data-plugin="datatable">
                         <thead>
                         <tr>
                            <th>Type</th>
                            <th>Remark</th>
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
                               <td><?php echo($a['name']); ?></td>
                               <td><?php echo($a['remark']); ?></td>
                               <td>
                                   <?php if ($vstatus > 0) : ?>
                                      <span class="label label-success"> <?= Yii::$app->params['verification_status'][$vstatus] ?></span>
                                      <a href="javascript:void(0);" class="label <?= ($status) ? 'label-success' : 'label-danger' ?>  <?= ($is_authorized) ? 'toggle-status' : 'disabled' ?> " <?= ($is_authorized) ? 'data-a="' . Misc::encrypt($a['id']) . '" data-b="' . Misc::encrypt(Misc::getClass($a)) . '"' : '' ?>><?= ($status) ? 'Active' : 'Inactive' ?></a>
                                   <?php elseif ($vstatus == 0): ?>
                                      <span class="label label-danger"><?= ucwords(Yii::$app->params['verification_status'][$vstatus]) ?></span>
                                   <?php elseif ($vstatus < 0): ?>
                                      <span class="label label-light-danger"><?= ucwords(Yii::$app->params['verification_status'][$vstatus]) ?></span>
                                   <?php endif; ?>
                               </td>
                               <td class="text-right">
                                  <a class="label label-secondary m-r-10" href="<?php echo Yii::$app->request->baseUrl; ?>/vehicles/types/edit/<?php echo Misc::encrypt($a['id']) ?>">View | Edit </a>
                               </td>
                            </tr>
                         <?php endforeach; ?>
                         </tbody>
                      </table>
                   </div>
                <?php else: ?>
                   <h4>No Vehicle Types Found.</h4>
                <?php endif; ?>
            </div>

         </div>
      </div>
   </div>

</div>