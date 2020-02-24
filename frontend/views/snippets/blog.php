<div class="section-title text-left animated fadeInUp visible" data-animation="fadeInUp">

   <h2 class="title">Blog Updates</h2>
</div>
<ul class="latest-posts">
   <?php for ($i = 1; $i <= 3; $i++) : ?>
      <li data-animation="fadeInLeft" class="animated fadeInLeft visible">
         <div class="post-thumb">
            <a href="<?= Yii::$app->request->baseUrl; ?>/news/post/">
               <img class="img-rounded" src="<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/blog/<?= $i ?>.jpg" alt="" title="" width="84" height="84">
            </a>
         </div>
         <div class="post-details">
            <div class="title">
               <a href="<?= Yii::$app->request->baseUrl; ?>/news/post/">
                  New Service Launched
               </a>

            </div>
            <div class="description">
              The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those intereste.
            </div>
            <div class="meta">
              
               <span class="time">
                    <i class="fa fa-calendar"></i>
                    03.11.2014</span>
            </div>
         </div>
      </li>
   <?php endfor; ?>

</ul>