<?php
Yii::$app->session->getFlash('success');
$this->title = Yii::$app->params['system_name'] . ' | Sections';
//$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/');
?>
<div class = "container-fluid">

   <div class = "row page-titles">
      <div class = "col-md-12 align-self-center">
         <h3 class = "text-themecolor d_inline_b  m-b-0 m-t-0">
             <?php echo (isset($editable['title'])) ? $editable['title'] . '' : ' ' ?>
         </h3>
         <div class = "clearfix"></div>
      </div>
   </div>

   <div class = "page-section">
      <div class = "row">
         <div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class = "card" style = "display: inline-block">
               <div class = "col-md-3" style = "float: left">
                  <img src = "<?php echo (isset($editable['image']) && $editable['image'] != '') ? Yii::$app->request->baseUrl . '/../common/assets/images/uploads/' . $editable['image'] : Yii::$app->request->baseUrl . '/../common/assets/images/no-image.png' ?>" class = "custom-file-input-image" id = "file--image" alt = ""/>
               </div>
               <div class = "col-md-9" style = "float: left;margin-top: 10px;">
                  <p><b>Title : </b><?php echo (isset($editable['title'])) ? $editable['title'] : '' ?></p>
                  <p><b>Subtitle : </b><?php echo (isset($editable['subtitle'])) ? $editable['subtitle'] : '' ?></p>
                  <p><b>Content : </b><?php echo (isset($editable['post_content'])) ? $editable['post_content'] : '' ?></p>
                  <p><b>Category : </b><?php if ($editable['category'] == '') {
                          echo 'No category';
                      } else {
                          echo $editable['category']['name'];
                      } ?></p>
                  <p>
                     <b>Author : </b><?php if ($editable['author'] !== '') {
                          echo $editable['author']['name'];
                      } ?></p>
               </div>
            </div>
         </div>
         <div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12" style = "display: inline-block" >
            <div class = "card">
               <div class = "col-md-12 header">
                  <h2>Comments on this blog</h2>
               </div>
               <div class = "col-md-12 comment-box">
                   <?php foreach ($editable['blogComments'] as $comment): ?>
                      <div class = "media">
                         <div class = "media-left">
                            <a href = "#">
                               <img class = "img-responsive user-photo" src = "<?= Yii::$app->request->baseUrl . '/../common/assets/images/uploads/' . $comment['user']['image'] ?>">
                            </a>
                         </div>
                         <div class = "media-body">
                            <h4 class = "media-heading"><?php echo $comment['user']['name'] ?></h4>
                            <p><?php echo $comment['comment'] ?></p>
                         </div>
                      </div>
                   <?php endforeach; ?>

               </div>
            </div>
            <div class = "card" >
               <div class = "col-md-12 header">
                  <h2>Add comment</h2>
               </div>
               <form enctype = "multipart/form-data" method = "post" action = "<?php echo Yii::$app->request->baseUrl; ?>/blog/comment/">
                  <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
                  <input type = "hidden" name = "post[user_id]" value = "<?php echo Yii::$app->user->identity->id ?>"/>
                  <input type = "hidden" name = "post[user_role]" value = "<?php echo $editable['id'] ?>"/>
                  <input type = "hidden" name = "post[blog_id]" value = "<?php echo $editable['id'] ?>"/>
                  <div class = "card-body ">
                      <?php $counter = 0; ?>
                     <div class = "form-group">
                         <?php $counter++; ?>
                        <label for = "<?php echo $counter; ?>" class = "control-label ">name</label>
                        <input type = "text" id = "<?php echo $counter; ?>" name = "post[name]"><?php echo (isset($editable['name'])) ? $editable['name'] : '' ?>
                     </div>
                     <div class = "form-group">
                         <?php $counter++; ?>
                        <label for = "<?php echo $counter; ?>" class = "control-label ">email</label>
                        <input type = "email" id = "<?php echo $counter; ?>" name = "post[email]"><?php echo (isset($editable['email'])) ? $editable['email'] : '' ?>
                     </div>
                     <div class = "form-group">
                         <?php $counter++; ?>
                        <label for = "<?php echo $counter; ?>" class = "control-label ">Phone</label>
                        <input type = "number" id = "<?php echo $counter; ?>" name = "post[phone]"><?php echo (isset($editable['phone'])) ? $editable['phone'] : '' ?>
                     </div>
                     <div class = "form-group">
                         <?php $counter++; ?>
                        <label for = "<?php echo $counter; ?>" class = "control-label ">Comment</label>
                        <textarea id = "<?php echo $counter; ?>" name = "post[comment]" class = "ace-editor summernote"><?php echo (isset($editable['comment'])) ? $editable['comment'] : '' ?></textarea>
                     </div>
                     <div class = "form-group">
                        <button class="btn btn-success" type = "submit" value = "1">Submit</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>

</div>
