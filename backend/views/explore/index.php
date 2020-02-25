<?php
Yii::$app->session->getFlash('success');
use \common\components\Misc;

$this->registerCssFile(Yii::$app->request->baseUrl . '/assets/plugins/datatables/datatables.min.css');
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/datatables/datatables.min.js');


$this->title = Yii::$app->params['system_name'] . ' | Explore';
?>
<?php $new = ($editable == false) ? 1 : 0; ?>
<div class="container-fluid">
   <div class="row page-titles">
      <div class="col-md-6 align-self-center">
         <h3 class="text-themecolor m-b-0 m-t-0">Explore</h3>
      </div>
      <div class="col-md-6 align-self-center text-right">
          <?php if (!$new) : ?>
             <a href="<?php echo Yii::$app->request->baseUrl; ?>/explore/" class="btn btn-primary">
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
                   <h5 class="card-title">Add New Explore</h5>
                <?php else: ?>
                   <h5 class="card-title">Edit <?php echo ucwords($editable['title']); ?> </h5>
                <?php endif; ?>

            </div>
            <div class="card-body">
               <form method="post" action="<?php echo Yii::$app->request->baseUrl; ?>/explore/update/" enctype="multipart/form-data">
                  <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>"/>
                  <input type="hidden" name="post[id]" value="<?php echo(isset($editable['id']) ? $editable['id'] : 0) ?>">

                   <?php $counter = 0; ?>
                  <div class="form-group">
                      <?php $counter++; ?>
                     <label for="<?php echo $counter; ?>" class="control-label required">Name</label>
                     <input id="<?php echo $counter; ?>" value="<?php echo(isset($editable['title']) ? $editable['title'] : '') ?>" name="post[title]" type="text" class="form-control required">
                  </div>

                  <div class="form-group">
                      <?php $counter++; ?>
                     <label for="<?php echo $counter; ?>" class="control-label required">Image</label>
                     <div class = "custom-file">

                        <div class = "image-wrapper" <?= (isset($editable['image']) && $editable['image'] != '') ? '' : 'style="display:none;"' ?>>
                           <img src = "<?php echo (isset($editable['image']) && $editable['image'] != '') ? Yii::$app->request->baseUrl . '/../common/assets/images/uploads/' . $editable['image'] : '' ?>" class = "custom-file-input-image" id = "file-<?php echo $counter; ?>-image" alt = ""/>
                        </div>
                         <?php if (isset($editable['image']) && $editable['image'] != ''): ?>
                            <div class = "image-actions text-right">
                               <a href = "javascript:void();" class = "remove-image" data-tab = "advertisement" data-id = "<?php echo \common\components\Misc::encrypt($editable['id']) ?>">
                                  <i class = "mdi mdi-close margin-right-5"></i>
                                  Remove Image
                               </a>
                            </div>
                         <?php endif; ?>
                        <label class = "custom-file-label" id = "file-<?php echo $counter; ?>-label" for = "file-<?php echo $counter; ?>">
                           <i class = "fa fa-file"></i>
                           <span>Upload Image</span>
                        </label>
                        <input accept = "image/x-png,image/jpeg" type = "file" name = "image" class = "custom-file-input" id = "file-<?php echo $counter; ?>" onchange = "readURL(this);" aria-describedby = "file-<?php echo $counter; ?>" src = "<?php echo (isset($editable['image']) && $editable['image'] != '') ? $editable['image'] : '' ?>">
                     </div>
                  </div>

                  <div class = "form-group">
                      <?php $counter++; ?>
                     <label for = "<?php echo $counter; ?>" class = "control-label required">Visibility</label>
                     <select id = "<?php echo $counter; ?>" name = "post[is_active]" class = "form-control required">
                        <option value = "1" <?= (isset($editable['is_active']) && $editable['is_active'] == 1) ? 'selected="selected"' : '' ?>>Visible</option>
                        <option value = "0" <?= (isset($editable['is_active']) && $editable['is_active'] == 0) ? 'selected="selected"' : '' ?>>Hidden</option>
                     </select>
                  </div>

                  <div class="form-group m-t-40 m-b-0 text-right">
                     <button class="btn btn-primary" type="submit">
                        <i class="mdi mdi-check"></i>

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
               <h5 class="card-title">Explore List</h5>
            </div>
            <div class="card-body ">
                <?php if (isset($all) && count($all) > 0): ?>
                   <div class="table-responsive">
                      <table class="table  table-striped" data-plugin="datatable">
                         <thead>
                         <tr>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th></th>
                         </tr>
                         </thead>
                         <tbody>
                         <?php foreach ($all as $a) : ?>
                            <tr>
                               <td><?= ucwords($a['title']); ?></td>
                               <td>
                                   <?php if ($a['image'] != ''): ?>
                                      <div class = "image-wrapper">
                                         <img src = "<?php echo Yii::$app->request->baseUrl; ?>/../common/assets/images/uploads/<?= $a['image'] ?>" alt = "">
                                      </div>
                                   <?php endif; ?>
                               </td>
                                 <td>
                                   <?php if ($a['is_active']> 0) : ?>
                                      <span class="label label-success">Visible</span>
                                      <!--                                      <a href="javascript:void(0);" class="label --><?//= ($a['is_active'] === 1) ? 'label-success' : 'label-danger' ?><!-- label-success --><?//= ($is_authorized) ? 'toggle-status' : 'disabled' ?><!-- " --><?//= ($is_authorized) ? 'data-a="' . Misc::encrypt($a['id']) . '" data-b="' . Misc::encrypt(Misc::getClass($a)) . '"' : '' ?><!--><?//= ($a['is_active'] === 1) ? 'Active' : 'Inactive' ?><!--</a>-->
                                   <?php else: ?>
                                      <span class="label label-light-danger">Not Visible</span>
                                   <?php endif; ?>
                               </td>
                               <td class="text-right">
                                  <a class="label label-secondary m-r-10" href="<?php echo Yii::$app->request->baseUrl; ?>/explore/edit/<?php echo Misc::encrypt($a['id']) ?>">View | Edit </a>
                               </td>
                            </tr>
                         <?php endforeach; ?>

                         </tbody>
                      </table>
                   </div>
                <?php else: ?>
                   <h4>No Image Found.</h4>
                <?php endif; ?>
            </div>

         </div>
      </div>
   </div>

</div>