<?php
/* @var $this yii\web\View */
$this->title = 'Single News Post';
?>

<div class="page-header">
   <div class="container">
       <?php if (!empty($post) && count($post) > 0):?>
      <h1 class="title"><?php echo $post['title'] ?></h1>
      <?php endif; ?>
   </div>
</div>
<!-- page-header -->
<section class="page-section">
   <div class="container">
      <div class="row">
          <?php if (!empty($post) && count($post) > 0):?>
             <div class="col-md-12">
                <div class="post-image opacity"><img src="<?php echo (isset($post['image']) && $post['image'] != '') ? Yii::$app->request->baseUrl . '/common/assets/images/uploads/' . $post['image'] : Yii::$app->request->baseUrl . '/common/assets/images/no-image.png' ?>" width="200" height="202" alt="" title=""></div>

                <div class="post-content top-pad-20">
                   <p> <?php echo $post['post_content']?></p>
                </div>
                <div class="post-meta">
                   <!-- Author  -->
                   <span class="author"><i class="fa fa-user"></i><?php echo $post['author']['name']?></span>
                   <!-- Meta Date -->
                   <span class="time"><i class="fa fa-calendar"></i> <?php echo $post['created_on']?></span>
                   <!-- Comments -->
                   <span class="author"><i class="fa fa-user"></i><?php echo (isset($post['category']['name'])) ?  $post['category']['name'] : '' ?></span>
                   <span class="comments pull-right"><i class="fa fa-comments"></i> Comments 112</span>
                </div>
             </div>



          <?php else: ?>
             <h3>Sorry, No News Found</h3>
          <?php endif; ?>
      </div>
      <hr>


   </div>

</section>