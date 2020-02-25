<section id = "testimonials" class = "page-section light-bg">
   <div class = "section-title" data-animation = "fadeInUp">
      <!-- Heading -->
      <h2 class = "title">What Our Clients Say?</h2>
   </div>
   <div class = "container" data-animation = "fadeInUp">
      <div class = "testimonails">
         <div class = "owl-carousel navigation-1 dark-switch " data-pagination = "false" data-items = "3" data-autoplay = "true" data-navigation = "true">


             <?php if (!empty($testimonial) && count($testimonial) > 0):
                 echo '<pre>';
                 print_r($testimonial);
                 echo '</pre>';
                 foreach ($testimonial as $t) :
                     ?>
                    <div class = "item">
                       <div class = "desc-border bottom-arrow">
                          <blockquote class = "small-text text-center">
                              <?php echo (isset($t['content'])) ? $t['content'] : '' ?>
                          </blockquote>
                       </div>
                       <div class = "client-details text-center">
                          <div class = "client-image">
                             <img class = "img-circle" src = "<?php echo (isset($t['image']) && $t['image'] != '') ? Yii::$app->request->baseUrl . '/common/assets/images/uploads/' . $t['image'] : Yii::$app->request->baseUrl . '/common/assets/images/no-image.png' ?>" width = "80" height = "80" alt = "">
                          </div>
                          <div class = "client-details">
                             <!-- Name -->
                             <strong class = "text-color"><?php echo (isset($t['name'])) ? $t['name'] : '' ?></strong>
                             <!-- Company -->
                             <span><?php echo (isset($t['position'])) ? $t['position'] : '' ?></span>
                          </div>
                       </div>
                    </div>
                 <?php endforeach;
                 ?>
             <?php else : ?>
                <h3>No Testomonials Found</h3>
             <?php endif; ?>
         </div>
      </div>
   </div>
</section><!-- testimonials -->