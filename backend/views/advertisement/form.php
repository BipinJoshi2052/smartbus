<?php
$this->title = Yii::$app->params['system_name'] . ' | Sections';
//$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/');
?>
<div class = "container-fluid">
    <form enctype = "multipart/form-data" method = "post" action = "<?php echo Yii::$app->request->baseUrl; ?>/advertisement/update/">

        <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
        <input type = "hidden" name = "post[id]" value = "<?php echo (isset($editable['id'])) ? $editable['id'] : '' ?>"/>
        <div class = "row page-titles">
            <div class = "col-md-12 align-self-center">
                <h3 class = "text-themecolor d_inline_b  m-b-0 m-t-0">
                    <?php echo (isset($editable['title'])) ? ' <i class="mdi mdi-pencil"></i> Edit - ' . $editable['title'] . '' : ' <i class="mdi mdi-add"></i> Add New Advertisement' ?>
                </h3>
                <div class = "page-actions ">
                    <a class = "btn btn-secondary <?php echo (isset($editable['title'])) ? '' : 'd_none'; ?>" href = "<?php echo Yii::$app->request->baseUrl; ?>/blog/post/">
                        <i class = "mdi mdi-plus"></i>
                        Add New advertisement
                    </a>

                    <button class = "btn btn-success" type = "submit">
                        <i class = "mdi mdi-check"></i>
                       save
                    </button>
                </div>
                <div class = "clearfix"></div>
            </div>
        </div>

        <div class = "page-section">
            <div class = "row">
                <div class = "col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class = "card">
                        <div class = "card-body">
                            <?php $counter = 0; ?>
                            <div class = "form-group ">
                                <?php $counter++; ?>
                                <label for = "<?php echo $counter; ?>" class = "control-label required">Name</label>
                                <input id = "<?php echo $counter; ?>" name = "post[name]" type = "text" class = "form-control required" value = "<?php echo (isset($editable['name'])) ? $editable['name'] : '' ?>">
                            </div>

                            <div class = "form-group ">
                                <?php $counter++; ?>
                                <label for = "<?php echo $counter; ?>" class = "control-label ">Alt text</label>
                                <textarea id = "<?php echo $counter; ?>" name = "post[alt_text]" class = "summernote required"><?php echo (isset($editable['alt_text'])) ? $editable['alt_text'] : '' ?></textarea>
                            </div>

                           <div class = "form-group">
                                <?php $counter++; ?>
                                <label for = "<?php echo $counter; ?>" class = "control-label ">title</label>
                                <textarea id = "<?php echo $counter; ?>" name = "post[title]" class = "summernote required"><?php echo (isset($editable['title'])) ? $editable['title'] : '' ?></textarea>
                            </div>

                            <div class = "form-group">
                                <?php $counter++; ?>
                                <label for = "<?php echo $counter; ?>" class = "control-label ">Content</label>
                                <textarea id = "<?php echo $counter; ?>" name = "post[content]" class = "ace-editor summernote required"><?php echo (isset($editable['content'])) ? $editable['content'] : '' ?></textarea>
                            </div>
                           <div class = "form-group ">
                               <?php $counter++; ?>
                              <label for = "<?php echo $counter; ?>" class = "control-label required">Price</label>
                              <input id = "<?php echo $counter; ?>" name = "post[price]" type = "text" class = "form-control required" value = "<?php echo (isset($editable['price'])) ? $editable['price'] : '' ?>">
                           </div>
                        </div>
                    </div>
                </div>
               <div class = "col-lg-4 col-md-6 col-sm-6 col-xs-6">
                  <div class = "card">
                     <div class = "card-body ">
                        <div class = "form-group ">
                            <?php $counter++; ?>
                           <label for = "<?php echo $counter; ?>" class = "control-label required">Company</label>
                           <input id = "<?php echo $counter; ?>" name = "post[company]" type = "text" class = "form-control required" value = "<?php echo (isset($editable['company'])) ? $editable['company'] : '' ?>">
                        </div>
                        <div class = "form-group ">
                            <?php $counter++; ?>
                           <label for = "<?php echo $counter; ?>" class = "control-label required">Contact Person</label>
                           <input id = "<?php echo $counter; ?>" name = "post[contact_person]" type = "text" class = "form-control required" value = "<?php echo (isset($editable['contact_person'])) ? $editable['contact_person'] : '' ?>">
                        </div>
                        <div class = "form-group ">
                            <?php $counter++; ?>
                           <label for = "<?php echo $counter; ?>" class = "control-label required">Phone</label>
                           <input id = "<?php echo $counter; ?>" name = "post[phone]" type = "text" class = "form-control required" value = "<?php echo (isset($editable['phone'])) ? $editable['phone'] : '' ?>">
                        </div>

                     <div class = "form-group ">
                            <?php $counter++; ?>
                           <label for = "<?php echo $counter; ?>" class = "control-label required">Email</label>
                           <input id = "<?php echo $counter; ?>" name = "post[email]" type = "email" class = "form-control required" value = "<?php echo (isset($editable['email'])) ? $editable['email'] : '' ?>">
                        </div>

                     <div class = "form-group ">
                            <?php $counter++; ?>
                           <label for = "<?php echo $counter; ?>" class = "control-label required">Address</label>
                           <input id = "<?php echo $counter; ?>" name = "post[address]" type = "text" class = "form-control required" value = "<?php echo (isset($editable['address'])) ? $editable['address'] : '' ?>">
                        </div>
                        <div class = "form-group">
                            <?php $counter++; ?>
                           <label for = "<?php echo $counter; ?>" class = "control-label required">Visibility</label>
                           <select id = "<?php echo $counter; ?>" name = "post[is_active]" class = "form-control required">
                              <option value = "1" <?= (isset($editable['is_active']) && $editable['is_active'] == 1) ? 'selected="selected"' : '' ?>>Visible</option>
                              <option value = "0" <?= (isset($editable['is_active']) && $editable['is_active'] == 0) ? 'selected="selected"' : '' ?>>Hidden</option>
                           </select>
                        </div>

                     </div>
                  </div>
               </div>
               <div class = "col-lg-4 col-md-12 col-sm-12 col-xs-12">
                  <div class = "card">
                     <div class = "card-body">
                         <?php $counter++; ?>

                        <div class = "form-group ">
                            <?php $counter++; ?>
                           <label for = "<?php echo $counter; ?>" class = "control-label required">
                              Status:
                               <?php if(isset($editable['expiring_on'])){ if ($editable['expiring_on'] < date('Y-m-d H:i:s')){ ?>
                                  <span class="red font-20">Expired</span><br>Expired on :
                               <?php }else{ ?>
                                  <span class="green font-20">Live</span><br>Expiring on :
                               <?php } } echo (isset($editable['expiring_on'])) ? $editable['expiring_on'] : '' ?>
                           </label>
                           <input id = "<?php echo $counter; ?>" name = "post[expiring_on]" type = "date" class = "form-control" value = "<?php echo (isset($editable['expiring_on'])) ? $editable['expiring_on'] : '' ?>">
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
                   </div>

               </div>
            </div>

    </form>
</div>