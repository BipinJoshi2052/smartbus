<?php

/* @var $this yii\web\View */
$this->title = 'Blog';

use  \yii\widgets\LinkPager;

?>
<div class = "page-header">
   <div class = "container">
      <h1 class = "title">Blog </h1>
   </div>
   <!--    <div class="breadcrumb-box">
          <div class="container">
              <ul class="breadcrumb">
                  <li>
                      <a href="index.html">Home</a>
                  </li>
                  <li>
                      <a href="#">Blog</a>
                  </li>
                  <li class="active">Blog Grid 3 Column</li>
              </ul>
          </div>
      </div> -->
</div>
<!-- page-header -->
<section class = "page-section">
   <div class = "container">
      <div class = "row">

          <?php if (!empty($models) && count($models) > 0):
              foreach ($models as $b => $post) :
                  ?>
                 <div class = "col-md-4 col-sm-6 ">
                    <div class = "post-item">
                       <div class = "post-image">
                          <img src = "<?php echo (isset($post['image']) && $post['image'] != '') ? Yii::$app->request->baseUrl . '/common/assets/images/uploads/' . $post['image'] : Yii::$app->request->baseUrl . '/common/assets/images/no-image.png' ?>" width = "600" height = "400" alt = "" title = ""/>
                       </div>
                       <h2 class = "post-title">
                          <a href = "  <?php echo Yii::$app->request->baseUrl; ?>/blog/view/<?php echo \common\components\Misc::encrypt($post['id']); ?>"><?php echo $post['title'] ?></a>
                       </h2>
                       <div class = "post-content pc-01">
                          <p> <?php echo (isset($post['post_content'])) ? substr($post['post_content'], 0, 300) . '...' : '' ?></p>

                       </div>
                       <div class = "post-meta">
                          <!-- Author  -->
                          <span class = "author">
                            <i class = "fa fa-user"></i><?php echo (isset($post['createdBy']['name'])) ? $post['createdBy']['name'] : '' ?></span>
                          <!-- Meta Date -->
                          <span class = "time">
                            <i class = "fa fa-calendar"></i>
                              <?php
                              $timestamp = explode(' ',$post['created_on']);
                              echo $timestamp[0];
                              ?>
                          </span>
                          <!--                       Category --->
                          <span class = "category pull-right">
                 <i class = "fa fa-heart"></i> <?php echo (isset($post['category']['name'])) ? $post['category']['name'] : '' ?>
                       </span>
                       </div>
                    </div>
                 </div>
              <?php endforeach;
              ?>

          <?php else: ?>
             <h3>Sorry, No Blogs Found</h3>
          <?php endif; ?>
      </div>
      <!-- pagination -->
      <div class = "page-number">

          <?php echo LinkPager::widget(['pagination' => $pages]); ?>
      </div>
   </div>
</section>
