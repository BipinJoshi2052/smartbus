<?php
Yii::$app->session->getFlash('success');
/* @var $this yii\web\View */
$this->title = 'Single Post';
?>

<div class = "page-header">
   <div class = "container">
       <?php if (!empty($post) && count($post) > 0):
           foreach ($post as $b => $single) :?>
              <h1 class = "title"><?php echo $single['title'] ?></h1>
           <?php

           endforeach; ?>
       <?php else : ?>
          Sorry error occured.
       <?php endif; ?>
   </div>

</div>
<!-- page-header -->
<section class = "page-section">
   <div class = "container">
      <div class = "row">
          <?php if (!empty($post) && count($post) > 0):
              foreach ($post as $b => $single) :?>
                 <div class = "col-md-12">
                    <div class = "post-image opacity">
                       <img src = "<?php echo (isset($single['image']) && $single['image'] != '') ? Yii::$app->request->baseUrl . '/common/assets/images/uploads/' . $single['image'] : Yii::$app->request->baseUrl . '/common/assets/images/no-image.png' ?>" width = "520" height = "100" alt = "" title = "" class = "img-01">
                    </div>
                    <div class = "post-content top-pad-20">
                       <p> <?php echo $single['post_content'] ?></p>

                    </div>
                    <div class = "post-meta">
                       <!-- Author  -->
                       <span class = "author"><i class = "fa fa-user"></i><?php echo $single['author']['name'] ?></span>
                       <!-- Meta Date -->
                       <span class = "time"><i class = "fa fa-calendar"></i> <?php echo $single['created_on'] ?></span>
                       <!-- blogComments -->
                       <span class = "category "><i class = "fa fa-heart"></i> <?php echo $single['slug'] ?></span>
                       <!-- Category -->

                       <span class = "blogComments pull-right"><i class = "fa fa-blogComments"></i> <?php echo count($single['blogComments']) ?></span>
                    </div>
                 </div>
              <?php

              endforeach; ?>

          <?php else: ?>
             <h3>Sorry, No Blogs Found</h3>
          <?php endif; ?>
      </div>
      <hr>
      <div class = "row">
         <div class = "col-md-12 top-pad-20">

             <?php if (!empty($single['blogComments']) && count($single['blogComments']) > 0):?>
            <div class = "blg-comment">
               <h4>Blog Comments</h4>
            </div>
                 <?php foreach ($single['blogComments'] as $c => $comment):?>
                    <div class = "comment-item">

                       <div class = "pull-left author-img">

                          <img class = "img-circle" src = "<?php if(isset($comment['user']) && $comment['user']!=''){echo Yii::$app->request->baseUrl .'/common/assets/images/uploads/'.$comment['user']['image'];}else{echo Yii::$app->request->baseUrl . '/common/assets/images/uploads/no-image.png';} ?>" width = "80" height = "80" alt = "" title = "">
                       </div>
                       <p><?php echo $comment['comment'] ?></p>
                       <div class = "post-meta">
                          <span class = "author"><i class = "fa fa-user"></i><?php if(isset($comment['user'])&&$comment['user']!=''){ echo $comment['user']['name'];}else{echo $comment['name'] ;}?></span>
                          <span class = "time"><i class = "fa fa-calendar"></i><?php echo $comment['created_on'] ?></span>
                       </div>
                    </div>
                 <?php endforeach; ?>
             <?php else: ?>
                <div class = "blg-comment">
                <h4>Sorry, No Comments Found</h4>
             </div>
             <?php endif; ?>
         </div>
      </div>
      <h4>Leave a Reply</h4>
      <form role = "form" enctype = "multipart/form-data" method = "post" action = "<?php echo Yii::$app->request->baseUrl; ?>/blog/update/">
         <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
          <?php
          foreach ($post

          as $b => $p): ?>
         <input type = "hidden" name = "post[blog_id]" value = "<?php echo (isset($p['id'])) ? $p['id'] : '' ?>"/>
         <div class = "row">
            <input type = "hidden" name = "post[user_id]" value = "<?php if (isset(Yii::$app->user->identity->id)) {
                echo Yii::$app->user->identity->id;
            } ?>"/>

            <input type = "hidden" name = "id" value = "<?php echo (isset($p['id'])) ? $p['id'] : '' ?>"/>


             <?php endforeach; ?>
            <!-- Field 1 -->
            <?php if(!isset(Yii::$app->user->identity->id)) :?>
               <div class = "col-md-6">
                  <div class = "input-text form-group">
                     <input type = "text" name = "post[name]" class = "input-name form-control" placeholder = "Full Name"/>
                  </div>
               </div>
               <div class = "col-md-6">
                  <div class = "input-email form-group">
                     <input type = "email" name = "post[email]" class = "input-email form-control" placeholder = "Email"/>
                  </div>
               </div>
               <div class = "col-md-6">
                  <div class = "input-text form-group">
                     <input type = "text" name = "post[phone]" class = "input-name form-control" placeholder = "Phone"/>
                  </div>
               </div>

            <?php endif; ?>
            <div class = "col-md-6">
               <div class = "textarea-message form-group">
                  <textarea name = "post[comment]" class = "textarea-message form-control" placeholder = "Comment" rows = "4"></textarea>
               </div>
               <button class = "btn btn-default" type = "submit">Send Now <i class = "icon-paper-plane"></i></button>
            </div>
      </form>
   </div>
</section>