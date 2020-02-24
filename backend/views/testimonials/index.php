<?php
$this->title = Yii::$app->params['system_name'] . ' | Testimonials';

use \common\components\Misc;

?>
<?php $new = ($editable == false) ? 1 : 0; ?>
<div class="container-fluid">
   <div class="row page-titles">
      <div class="col-md-6 align-self-center">
         <h3 class="text-themecolor m-b-0 m-t-0">Testimonials</h3>
      </div>
      <div class="col-md-6 align-self-center text-right">
          <?php if (!$new) : ?>
             <a href="<?php echo Yii::$app->request->baseUrl; ?>/testimonials/" class="btn btn-primary">
                <i class="mdi mdi-plus m-r-5"></i>
                Add New Testimonial
             </a>
          <?php endif; ?>
      </div>
   </div>

   <div class="row">
      <div class="col-md-4 col-sm-12">
         <div class="card extended">
            <div class="card-header">
                <?php if ($new): ?>
                   <h5 class="card-title">Add New Testimonial</h5>
                <?php else: ?>
                   <h5 class="card-title">Edit <?php echo $editable['name']; ?> </h5>
                <?php endif; ?>
            </div>
            <div class="card-body">
               <form method="post" action="<?php echo Yii::$app->request->baseUrl; ?>/testimonials/update/" enctype="multipart/form-data">
                  <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>"/>
                  <input type="hidden" name="testimonial[id]" value="<?php echo(isset($editable['id']) ? Misc::encrypt($editable['id']) : 0) ?>">

                   <?php $counter = 0; ?>
                  <div class="form-group">
                      <?php $counter++; ?>
                     <label for="<?php echo $counter; ?>" class="control-label">Name</label>
                     <input id="<?php echo $counter; ?>" value="<?php echo(isset($editable['name']) ? $editable['name'] : '') ?>" name="testimonial[name]" type="text" class="form-control required">
                  </div>
                  <div class="form-group">
                      <?php $counter++; ?>
                     <label for="<?php echo $counter; ?>" class="control-label">Position</label>
                     <input id="<?php echo $counter; ?>" name="testimonial[position]" value="<?php echo(isset($editable['position']) ? $editable['position'] : '') ?>" type="text" class="form-control required">
                  </div>
                  <div class="form-group">
                      <?php $counter++; ?>
                     <label for="<?php echo $counter; ?>" class="control-label">Info</label>
                     <input id="<?php echo $counter; ?>" value="<?php echo(isset($editable['info']) ? $editable['info'] : '') ?>" name="testimonial[info]" type="text" class="form-control required">
                  </div>
                  <div class="form-group">
                      <?php $counter++; ?>
                     <label for="<?php echo $counter; ?>" class="control-label">Content</label>
                     <textarea id="<?php echo $counter; ?>" name="testimonial[content]" class="form-control required"><?php echo(isset($editable['content']) ? $editable['content'] : '') ?></textarea>
                  </div>
                  <div class="form-group">
                      <?php $counter++; ?>
                     <div class="custom-file">

                        <div class="image-wrapper" <?= (isset($editable['image']) && $editable['image'] != '') ? '' : 'style="display:none;"' ?>>
                           <img src="<?php echo (isset($editable['image']) && $editable['image'] != '') ? Yii::$app->request->baseUrl . '/../common/assets/images/uploads/' . $editable['image'] : '' ?>" class="custom-file-input-image" id="file-<?php echo $counter; ?>-image" alt=""/>
                        </div>
                         <?php if (isset($editable['image']) && $editable['image'] != ''): ?>
                            <div class="image-actions text-right">
                               <a href="javascript:void();" class="remove-image" data-tab="blog" data-id="<?php echo \common\components\Misc::encrypt($editable['id']) ?>">
                                  <i class="mdi mdi-close margin-right-5"></i>
                                  Remove Image
                               </a>
                            </div>
                         <?php endif; ?>
                        <label class="custom-file-label" id="file-<?php echo $counter; ?>-label" for="file-<?php echo $counter; ?>">
                           <i class="fa fa-file"></i>
                           <span>Upload Image</span>
                        </label>
                        <input accept="image/x-png,image/jpeg" type="file" name="image" class="custom-file-input" id="file-<?php echo $counter; ?>" onchange="readURL(this);" aria-describedby="file-<?php echo $counter; ?>" src="<?php echo (isset($editable['image']) && $editable['image'] != '') ? $editable['image'] : '' ?>">
                     </div>
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
               <h5 class="card-title">Testimonial List</h5>
            </div>
            <div class="card-body">
               <table class="table  table-striped" data-plugin="datatable">
                  <thead>
                  <tr>
                     <th>Image</th>
                     <th>Name</th>
                     <th>Position</th>
                     <th>Date</th>
                     <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($testimonials as $testimonial) : ?>
                     <tr>
                        <td>
                           <div class="image-wrapper">
                               <?php if (isset($testimonial['image']) && $testimonial['image'] != ''): ?>
                                  <img class="img-responsive" src="<?php echo Yii::$app->request->baseUrl . '/../common/assets/images/uploads/' . $testimonial['image']; ?>">
                               <?php endif; ?>
                           </div>
                        </td>
                        <td><?php echo ucwords($testimonial['name']); ?></td>
                        <td>
                            <?php if ($testimonial['position'] != ''): echo $testimonial['position']; endif; ?>
                        </td>

                        <td><?php echo \common\components\Misc::dmY($testimonial['created_on']); ?></td>
                        <td class="text-right">
                           <a class="btn btn-primary btn-sm" href="<?php echo Yii::$app->request->baseUrl; ?>/testimonials/edit/<?php echo \common\components\Misc::encrypt($testimonial['id']) ?>">Edit</a>
                           <a class="btn btn-default btn-sm delete-testimonial" href="javascript:void();" data-tab="Testimonials" data-id="<?php echo $testimonial['id']; ?>">Delete</a>
                        </td>
                     </tr>
                  <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>

</div>