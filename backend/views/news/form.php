<?php
//echo '<pre>';
//print_r($editable);
//echo '</pre>';
//die;
$this->title = Yii::$app->params['system_name'] . ' | Sections';

//$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/');
?>
<div class = "container-fluid">
   <form enctype = "multipart/form-data" method = "post" action = "<?php echo Yii::$app->request->baseUrl; ?>/news/update/">

      <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
      <input type = "hidden" name = "post[id]" value = "<?php echo (isset($editable['id'])) ? $editable['id'] : '' ?>"/>
      <div class = "row page-titles">
         <div class = "col-md-12 align-self-center">
            <h3 class = "text-themecolor d_inline_b  m-b-0 m-t-0">
                <?php echo (isset($editable['title'])) ? ' <i class="mdi mdi-pencil"></i> Edit - ' . $editable['title'] . '' : ' <i class="mdi mdi-add"></i> Add New Post' ?>
            </h3>
            <div class = "page-actions ">
               <a class = "btn btn-secondary <?php echo (isset($editable['title'])) ? '' : 'd_none'; ?>" href = "<?php echo Yii::$app->request->baseUrl; ?>/news/form/">
                  <i class = "mdi mdi-plus"></i>
                  Add New Post
               </a>

               <button class = "btn btn-success" type = "submit">
                  <i class = "mdi mdi-check"></i>
                  Save
               </button>
            </div>
            <div class = "clearfix"></div>
         </div>
      </div>

      <div class = "page-section">
         <div class = "row">
            <div class = "col-lg-8 col-md-12 col-sm-12 col-xs-12">
               <div class = "card">
                  <div class = "card-body">
                      <?php $counter = 0; ?>

                     <div class = "form-group">
                         <?php $counter++; ?>
                        <label for = "<?php echo $counter; ?>" class = "control-label required">Title</label>
                        <input id = "<?php echo $counter; ?>" name = "post[title]" type = "text" class = "form-control required" value = "<?php echo (isset($editable['title'])) ? $editable['title'] : '' ?>">
                     </div>

                     <div class = "form-group">
                         <?php $counter++; ?>
                        <label for = "<?php echo $counter; ?>" class = "control-label ">Content</label>
                        <textarea rows="5" id = "<?php echo $counter; ?>" name = "post[post_content]" class = "summernote"><?php echo (isset($editable['post_content'])) ? $editable['post_content'] : '' ?></textarea>
                     </div>
                     <div class = "form-group">
                         <?php $counter++; ?>
                        <label for = "<?php echo $counter; ?>" class = "control-label ">Subtitle</label>
                        <textarea id = "<?php echo $counter; ?>" name = "post[subtitle]" class = "summernote"><?php echo (isset($editable['subtitle'])) ? $editable['subtitle'] : '' ?></textarea>
                     </div>
                  </div>
               </div>
            </div>
            <div class = "col-lg-4 col-md-12 col-sm-12 col-xs-12">
               <div class = "card">
                  <div class = "card-body">
                                                <div class = "form-group ">
                                                    <?php $counter++; ?>
                                                     <label for = "<?php echo $counter; ?>" class = "control-label ">Active/Inactive</label>
                                                   <select id = "<?php echo $counter; ?>" name = "post[is_active]" required="required" class = "form-control custom-select required-select"  placeholder = "choose">
                                                      <?php if(isset($editable['is_active']) && $editable['is_active'] != ''){?>
                                                         <option <?php if($editable['is_active'] == 0){echo 'selected';}?>value = "0">InActive</option>
                                                         <option <?php if($editable['is_active'] == 1) {echo 'selected';} ?> value = "1">Active</option>
                                                      <?php }
                                                      else{?>
                                                         <option value = "0">Inactive</option>
                                                         <option value = "1">Active</option>
                                                      <?php  }?>
                                                   </select>
                                                    <?php $counter++; ?>
                                                </div>
                  </div>

               </div>


               <div class = "card">
                  <div class = "card-body">
                     <div class = "form-group">
                         <?php $counter++; ?>


                        <label for = "<?php echo $counter; ?>" class = "control-label required">Categories</label>
                        <select id = "<?php echo $counter; ?>" name = "post[category_id]" class = "form-control required">
                           <?php if(isset($editable['category_id']) && $editable['category_id'] != ''){
                          foreach ($categories as $cat){?>

                           <option  <?php if($cat['id'] == $editable['category_id']){echo 'selected';} ?> value="<?php echo $cat['id'] ?>"  > <?php echo $cat['name']?></option>
                           <?php } } else {
                              foreach ($categories as $cat){?>
                           <option value = "<?php echo $cat['id'] ?>"> <?php echo $cat['name']?></option>
                           <?php }} ?>
                        </select>
                     </div>
                  </div>
               </div>

               <div class = "card">
                  <div class = "card-body">
                      <?php $counter++; ?>
                     <div class = "custom-file">

                        <div class = "image-wrapper" <?= (isset($editable['image']) && $editable['image'] != '') ? '' : 'style="display:none;"' ?>>
                           <img src = "<?php echo (isset($editable['image']) && $editable['image'] != '') ? Yii::$app->request->baseUrl . '/../common/assets/images/uploads/' . $editable['image'] : '' ?>" class = "custom-file-input-image" id = "file-<?php echo $counter; ?>-image" alt = ""/>
                        </div>
                         <?php if (isset($editable['image']) && $editable['image'] != ''): ?>
                            <div class = "image-actions text-right">
                               <a href = "javascript:void();" class = "remove-image" data-tab = "news" data-id = "<?php echo \common\components\Misc::encrypt($editable['id']) ?>">
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
               </div>

            </div>

         </div>

   </form>
</div>
<script>

</script>
