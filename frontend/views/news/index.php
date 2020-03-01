<?php
/* @var $this yii\web\View */
$this->title = 'News List';

use yii\helpers\Html;
use yii\widgets\LinkPager;

?>
<div class = "page-header">
   <div class = "container">
      <h1 class = "title">News List</h1>
   </div>
   <!--  <div class="breadcrumb-box">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a href="#">News</a>
                </li>
                <li class="active">News Lists</li>
            </ul>
        </div>
    </div> -->
</div>
<!-- page-header -->
<section class = "page-section">
   <div class = "container">
      <div class = "post-list">
          <?php if (!empty($news) && count($news) > 0):

              foreach ($news as $b => $post) :?>
                 <div class = " row post-item">
                    <div class = "col-md-4 post-image  ">
                       <img src = "<?php echo (isset($post['image']) && $post['image'] != '') ? Yii::$app->request->baseUrl . '/common/assets/images/uploads/' . $post['image'] : Yii::$app->request->baseUrl . '/common/assets/images/no-image.png' ?>" class="news-img-main"   alt = "" title = ""/>
                    </div>
                    <div class="col-md-8" > 
                        <h2 class = "post-title">
                       <a href = "<?php echo Yii::$app->request->baseUrl; ?>/news/post/<?php echo \common\components\Misc::encrypt($post['id']); ?>"><?php echo $post['title'] ?></a>
                    </h2>
                    <div class = "post-content ">
                       <p>
                           <?php echo (isset($post['post_content'])) ? substr($post['post_content'], 0, 1000) . '...' : '' ?>
                       </p>
                    </div>
                    <div class = "post-meta">
                       <!-- Author  -->
                       <span class = "author">
                        <i class = "fa fa-user"></i> </i><?php echo (isset($post['author']['name'])) ? $post['author']['name'] : '' ?></span>
                       <!-- Meta Date -->

                       <span class = "time">
                        <i class = "fa fa-calendar"></i>
                           <?php
                           $timestamp = explode(' ', $post['created_on']);
                           echo $timestamp[0];
                           ?>
                         </span>
                    </div>
                  
                       <!-- Category -->

<!--                       <span class = "category pull-right">-->
<!--                        <i class = "fa fa-heart"></i>  Travel, Nature, Business</span>-->
                    </div>
                    <div class = "clearfix"></div>
                 </div>
              <?php

              endforeach; ?>

          <?php else: ?>
             <h3>Sorry, No News Found</h3>
          <?php endif; ?>
      </div>
      <div class = "page-number">
          <?php echo LinkPager::widget(['pagination' => $pages]); ?>
      </div>

      <!--        <nav aria-label="...">-->
      <!--  <ul class="pagination justify-content-end">-->
      <!--    <li class="page-item disabled">-->
      <!--    <a class="page-link" href="#" aria-label="Previous">-->
      <!--        <span aria-hidden="true">&laquo;</span>-->
      <!--      </a>-->
      <!--    </li>-->
      <!--    <li class="page-item"><a class="page-link" href="#">1</a></li>-->
      <!--    <li class="page-item active" aria-current="page">-->
      <!--      <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>-->
      <!--    </li>-->
      <!--    <li class="page-item"><a class="page-link" href="#">3</a></li>-->
      <!--    <li class="page-item">-->
      <!--      <a class="page-link" href="#" aria-label="Next">-->
      <!--        <span aria-hidden="true">&raquo;</span>-->
      <!--      </a>-->
      <!--    </li>-->
      <!--  </ul>-->
      <!--</nav>-->
</section>