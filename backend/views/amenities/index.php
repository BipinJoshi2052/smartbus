<?php
Yii::$app->session->getFlash('success');
use \common\components\Misc;

$this->registerCssFile(Yii::$app->request->baseUrl . '/assets/plugins/datatables/datatables.min.css');
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/datatables/datatables.min.js');


$this->title = Yii::$app->params['system_name'] . ' | Amenities';
?>
<?php $new = ($editable == false) ? 1 : 0; ?>
<div class="container-fluid">
   <div class="row page-titles">
      <div class="col-md-6 align-self-center">
         <h3 class="text-themecolor m-b-0 m-t-0">Amenities</h3>
      </div>
      <div class="col-md-6 align-self-center text-right">
          <?php if (!$new) : ?>
             <a href="<?php echo Yii::$app->request->baseUrl; ?>/amenities/" class="btn btn-primary">
                <i class="mdi mdi-plus m-r-5"></i>
                Add New
             </a>
          <?php endif; ?>
      </div>
   </div>

   <div class="row">
      <div class="col-md-4 col-sm-12">
         <div class="card extended">
            <div class="card-header">
                <?php if ($new): ?>
                   <h5 class="card-title">Add New Amenity</h5>
                <?php else: ?>
                   <h5 class="card-title">Edit <?php echo ucwords($editable['name']); ?> </h5>
                <?php endif; ?>

            </div>
            <div class="card-body">
               <form method="post" action="<?php echo Yii::$app->request->baseUrl; ?>/amenities/update/" enctype="multipart/form-data">
                  <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>"/>
                  <input type="hidden" name="post[id]" value="<?php echo(isset($editable['id']) ? $editable['id'] : 0) ?>">
                  <input type="hidden" name="post[table]" value="<?php echo(isset($editable['id']) ? $editable['id'] : 0) ?>">

                   <?php $counter = 0; ?>
                  <div class="form-group">
                      <?php $counter++; ?>
                     <label for="<?php echo $counter; ?>" class="control-label required">Name</label>
                     <input id="<?php echo $counter; ?>" value="<?php echo(isset($editable['name']) ? $editable['name'] : '') ?>" name="post[name]" type="text" class="form-control required">
                  </div>

                  <div class="form-group">
                      <?php $counter++; ?>
                     <label for="<?php echo $counter; ?>" class="control-label required">Icon</label>
                     <select id="<?php echo $counter; ?>" name="post[icon]" class="form-control required" data-plugin="select2-icon">
                         <?php foreach (Yii::$app->params['fa-icons'] as $k => $m) : ?>
                            <option data-icon="fa <?= str_replace("_", "-", $m) ?>" <?php echo (isset($editable['icon']) && $editable['icon'] == $m) ? 'selected = "selected"' : '' ?> value="<?= $m ?>"> <?= ucwords(str_replace("_", " ", $m)); ?></option>
                         <?php endforeach; ?>
                     </select>
                  </div>


                   <?php if (!$new) : ?>
                      <div class="form-group">
                          <?php $counter++; ?>
                         <label for="<?php echo $counter; ?>" class="control-label">Verified By</label>
                         <div class="form-control d-block <?= ($editable['verification_id'] > 0) ? 'success' : 'danger' ?>">
                             <?php echo (!empty($editable['verification']['verifiedBy']['status'])) ? '<a href="' . Yii::$app->request->baseUrl . '/users/profile/' . Misc::encrypt($editable['verification']['verifiedBy']['id']) . '" class="success">' . ucwords($editable['verification']['verifiedBy']['name']) . '</a>' : '<span class="danger">Not Verified</span>' ?>
                         </div>
                      </div>
                   <?php endif; ?>
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
               <h5 class="card-title">Amenities List</h5>
            </div>
            <div class="card-body ">
                <?php if (isset($all) && count($all) > 0): ?>
                   <div class="table-responsive">
                      <table class="table  table-striped" data-plugin="datatable">
                         <thead>
                         <tr>
                            <th>name</th>
                            <th>icon</th>
                            <th>Status</th>
                            <th></th>
                         </tr>
                         </thead>
                         <tbody>
                         <?php foreach ($all as $a) : ?>
                            <tr>
                               <td><?= ucwords($a['name']); ?></td>
                               <td><?= ($a['icon'] != '') ? '<i class="ic fa ' . $a['icon'] . '"></i> <span class="ic-text">fa ' . $a['icon'] . '</span>' : '-' ?></td>
                               <td>
                                   <?php if ($a['is_verified']> 0) : ?>
                                      <span class="label label-success">Verified</span>
<!--                                      <a href="javascript:void(0);" class="label --><?//= ($a['is_active'] === 1) ? 'label-success' : 'label-danger' ?><!-- label-success --><?//= ($is_authorized) ? 'toggle-status' : 'disabled' ?><!-- " --><?//= ($is_authorized) ? 'data-a="' . Misc::encrypt($a['id']) . '" data-b="' . Misc::encrypt(Misc::getClass($a)) . '"' : '' ?><!--><?//= ($a['is_active'] === 1) ? 'Active' : 'Inactive' ?><!--</a>-->
                                   <?php else: ?>
                                      <span class="label label-light-danger">Not Verified</span>
                                   <?php endif; ?>
                               </td>
                               <td class="text-right">
                                  <a class="label label-secondary m-r-10" href="<?php echo Yii::$app->request->baseUrl; ?>/amenities/edit/<?php echo Misc::encrypt($a['id']) ?>">View | Edit </a>
                               </td>
                            </tr>
                         <?php endforeach; ?>

                         </tbody>
                      </table>
                   </div>
                <?php else: ?>
                   <h4>No Amenities Found.</h4>
                <?php endif; ?>
            </div>

         </div>
      </div>
   </div>

</div>