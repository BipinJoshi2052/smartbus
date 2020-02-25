<?php




$this->title = Yii::$app->params['system_name'] . ' | Sections';
//$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/');
?>
<div class = "container-fluid">
   <form enctype = "multipart/form-data" method = "post" action = "<?php echo Yii::$app->request->baseUrl; ?>/clients/up/">

      <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
      <input type = "hidden" name = "post[id]" value = "<?php echo (isset($editable['id'])) ? $editable['id'] : '' ?>"/>
      <div class = "row page-titles">
         <div class = "col-md-12 align-self-center">
            <h3 class = "text-themecolor d_inline_b  m-b-0 m-t-0">
                <?php echo (isset($editable['title'])) ? ' <i class="mdi mdi-pencil"></i> Edit - ' . $editable['title'] . '' : ' <i class="mdi mdi-add"></i> Add New Post' ?>
            </h3>
            <div class = "page-actions ">
               <a class = "btn btn-secondary <?php echo (isset($editable['title'])) ? '' : 'd_none'; ?>" href = "<?php echo Yii::$app->request->baseUrl; ?>/blog/up/">
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

                        <label for = "<?php echo $counter; ?>" class = "control-label required">Client</label>
                        <select id = "<?php echo $counter; ?>" name = "post[client_id]" class = "form-control ">
                     <?php
                           foreach ($clients as $c) {
                               ?>
                              <option value = "<?php echo $c['id'] ?>"><?php echo $c['name'] ?></option>
                           <?php

                       }?>

                        </select>

                     </div>

                     <div class = "form-group">
                         <?php $counter++; ?>
                        <label for = "<?php echo $counter; ?>" class = "control-label ">Title</label>
                        <input  id = "<?php echo $counter; ?>" name = "post[title]" class = "summernote"><?php echo (isset($editable['title'])) ? $editable['title'] : '' ?>
                     </div>
                     <div class = "form-group">
                         <?php $counter++; ?>
                        <label for = "<?php echo $counter; ?>" class = "control-label ">remark</label>
                        <textarea rows="5" id = "<?php echo $counter; ?>" name = "post[remark]" class = "ace-editor summernote"><?php echo (isset($editable['remark'])) ? $editable['remark'] : '' ?></textarea>
                     </div>
                     <div class = "form-group">
                         <?php $counter++; ?>
                        <label for = "<?php echo $counter; ?>" class = "control-label ">Extra Notes</label>
                        <textarea rows="5" id = "<?php echo $counter; ?>" name = "post[extra_notes]" class = "ace-editor summernote"><?php echo (isset($editable['extra_notes'])) ? $editable['extra_notes'] : '' ?></textarea>
                     </div>
                     <div class = "form-group">
                         <?php $counter++; ?>
                        <label for = "<?php echo $counter; ?>" class = "control-label ">Content</label>
                        <textarea rows="5" id = "<?php echo $counter; ?>" name = "post[content]" class = "ace-editor summernote"><?php echo (isset($editable['post_content'])) ? $editable['post_content'] : '' ?></textarea>
                     </div>
                  </div>
               </div>
            </div>
         </div>

   </form>
</div>