<?php

$this->registerJsFile(Yii::$app->request->baseUrl . '/common/assets/vendor/pos/js/pos.js');
$this->registerCssFile(Yii::$app->request->baseUrl . '/common/assets/vendor/pos/css/pos.css');
?>
<script>
   constants = [];
</script>
<?php $this->title = 'Welcome'; ?>

<section class = "banner-back" style = " background-image: url(<?php echo Yii::$app->request->baseUrl; ?>/assets/slider/assets/banner.jpg);">
   <div id = "" class = "container">
      <div class = "row">
         <div class = "col-md-12 col-sm-12 col-lg-7 mb-sm-4 padding-right-20" data-animation = "fadeInLeft">
            <div class = "owl-carousel home-slider pagination-1 light-switch" data-pagination = "true" data-autoplay = "true" data-navigation = "false" data-singleitem = "true" data-animation = "fadeInUp">
                <?php foreach ($slider as $s) { ?>
                   <div class = "item">
                      <div class = "hero-text">
                         <h3 class = "entry-title"><span><?php echo $s['title']; ?></span></h3>
                         <h4 class = "entry-sub-title"><?php echo $s['subtitle']; ?></h4>
                         <div class = "entry-content">
                            <p><?php echo $s['description']; ?></p>
                         </div>

                          <?php if ($s['link'] !== '') : ?>
                             <a href = "<?php echo $s['link']; ?>" class = "btn btn-primary entry-link">Book Now</a>
                          <?php endif; ?>
                      </div>
                   </div>
                <?php } ?>
            </div>
         </div>
         <div class = "col-md-12 col-sm-12 col-lg-5 mb-sm-4 padding-left-20 animated fadeInRight visible" data-animation = "fadeInRight">
            <div class = "search-box">
               <div class = "search-box-title">
                  <h4 class = "pull-left"><i class = "icon icon-pin  m-r-2"></i> Search</h4>
                  <ul class = "pull-right nav nav-pills nav-01" id = "pills-tab" role = "tablist">
                     <li class = "nav-item my-search">
                        <a class = "nav-link active tab-01" id = "pills-home-tab" data-toggle = "pill" href = "#pills-home" role = "tab" aria-controls = "pills-home" aria-selected = "true">Bus Ticket</a>
                     </li>
                     <li class = "nav-item rent">
                        <a class = "nav-link tab-01" id = "pills-profile-tab" data-toggle = "pill" href = "#pills-profile" role = "tab" aria-controls = "pills-profile" aria-selected = "false">Rent Vehicle</a>
                     </li>

                  </ul>
                  <div class = "clearfix"></div>
               </div>
               <div class = "search-box-body">
                  <div class = "tab-content tab-content-01" id = "pills-tabContent">
                     <div class = "tab-pane fade show active" id = "pills-home" role = "tabpanel" aria-labelledby = "pills-home-tab">
                        <form action = "<?php echo Yii::$app->request->baseUrl ?>/pos/" method = "get" class = "request-form ftco-animate bg-01 fadeInUp ftco-animated search-ticket">
                           <div class = "search-panel">
                              <div class = "form-group">
                                 <select name = "from" id = "location[id]" class = "inline-form-control required" placeholder = "From" autocomplete = "off" data-plugin = "cities-ajax"></select>
                              </div>
                              <div class = "form-group">
                                 <select name = "to" id = "" class = "inline-form-control required" placeholder = "Destination" autocomplete = "off" data-plugin = "cities-ajax"></select>
                                 <div class = "form-group-action">
                                    <a href = "javascript:void(0);" class = "search-swap-locations" data-id = "search-swap-locations" type = "button">
                                       <i class = "fa fa-exchange m-r-4" aria-hidden = "true"></i> Swap Location
                                    </a>
                                 </div>
                              </div>

                           </div>
                           <div class = "search-panel">
                              <div class = "form-group">
                                 <div>
                                    <input class = "form-control  " type = 'text' id = "departure-date" value = "" placeholder = "Journey Date">
                                 </div>
                                 <div class = "form-group-action">
                                    <a class = "m-r-4" href = "javascript:void(0);" id = '2' onClick = "show(this.id)"> Today</a>
                                    <a href = "javascript:void(0);" id = '1' onClick = "show(this.id)">Tommorow</a>
                                 </div>
                              </div>
                              <div class = "form-group">
                                 <input type = "text" class = "form-control" id = "return-date" placeholder = "Return Date">
                                 <div class = "form-group-action">
                                    <a class = "clear-date" href = "javascript:void(0);">Clear</a>
                                 </div>
                              </div>
                           </div>
                           <div class = "search-panel">
                              <div class = "book-my-ticket">
                                 <button type = "submit" class = "btn btn-primary">Search</button>
                              </div>
                           </div>
                        </form>

                     </div>
                     <div class = "tab-pane fade" id = "pills-profile" role = "tabpanel" aria-labelledby = "pills-profile-tab">
                        <form action = "<?php echo Yii::$app->request->baseUrl ?>/vehicles/search/" method = "get" class = "request-form ftco-animate bg-01 fadeInUp ftco-animated search-ticket">
                           <div class = "search-panel">
                              <div class = "form-group">
                                 <input type = "text" class = "form-control" name = "" placeholder = "Vehicle Type">
                              </div>
                           </div>
                           <div class = "search-panel">
                              <div class = "book-my-ticket">
                                 <button type = "submit" class = "btn btn-pm">Search</button>
                              </div>
                           </div>
                        </form>

                     </div>

                  </div>

               </div>
            </div>

         </div>
      </div>
</section>

<section class = "page-section how">
   <div class = "container">
      <div class = "d-none section-title animated fadeInUp visible " data-animation = "fadeInUp">
         <!-- Heading -->
         <h2 class = "title">How it works</h2>
      </div>
      <div class = "d-none add-space mb-60">
         <img src = "<?= Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/adds/test1.jpg" alt = "">
      </div>
      <div class = "row special-feature">
         <!-- Special Feature Box 1 -->
         <div class = "col-md-3 feature-item-wrapper" data-animation = "fadeInLeft">
            <div class = "s-feature-box text-center">
               <div class = "mask-top">
                  <div class = "mask-content">
                     <div class = "white">
                        <!-- Icon -->
                        <i class = "icon-search"></i>
                        <!-- Title -->
                        <h4>Search</h4>
                     </div>
                  </div>
               </div>
               <div class = "mask-bottom white">
                  <!-- Icon -->
                  <i class = "icon-search"></i>
                  <!-- Title -->
                  <h4>Find a bus</h4>
                  <!-- Text -->
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  </p>
               </div>
            </div>
         </div>
         <!-- Special Feature Box 2 -->
         <div class = "col-md-3 feature-item-wrapper" data-animation = "fadeInRight">
            <div class = "s-feature-box text-center">
               <div class = "mask-top">
                  <div class = "mask-content">
                     <div class = "white">
                        <!-- Icon -->
                        <i class = "icon-bus"></i>
                        <!-- Title -->
                        <h4>Select</h4></div>
                  </div>
               </div>
               <div class = "mask-bottom white">
                  <!-- Icon -->
                  <i class = "icon-bus"></i>
                  <!-- Title -->
                  <h4>Select Seats</h4>
                  <!-- Text -->
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  </p>
               </div>
            </div>
         </div>
         <!-- Special Feature Box 3 -->
         <div class = "col-md-3 feature-item-wrapper" data-animation = "fadeInLeft">
            <div class = "s-feature-box text-center">
               <div class = "mask-top">
                  <div class = "mask-content">
                     <div class = "white">
                        <!-- Icon -->
                        <i class = "icon-book8"></i>
                        <!-- Title -->
                        <h4>Book</h4></div>
                  </div>
               </div>
               <div class = "mask-bottom white">
                  <!-- Icon -->
                  <i class = "icon-book8"></i>
                  <!-- Title -->
                  <h4>Book Ticket</h4>
                  <!-- Text -->
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  </p>
               </div>
            </div>
         </div>
         <!-- Special Feature Box 3 -->
         <div class = "col-md-3 feature-item-wrapper" data-animation = "fadeInRight">
            <div class = "s-feature-box text-center">
               <div class = "mask-top">
                  <div class = "mask-content">
                     <div class = "white">
                        <!-- Icon -->
                        <i class = "icon-navigation"></i>
                        <!-- Title -->
                        <h4>Travel</h4>
                     </div>
                  </div>
               </div>
               <div class = "mask-bottom white">
                  <!-- Icon -->
                  <i class = "icon-navigation"></i>
                  <!-- Title -->
                  <h4>Be on the way</h4>
                  <!-- Text -->
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  </p>
               </div>
            </div>
         </div>
      </div>


   </div>
</section>
<section class = "page-section light-bg feature-rich">
   <div class = "container">
      <div class = "row">
         <div class = "col-md-4 animation fadeInLeft animation-visible" data-animation = "fadeInLeft">
            <ul class = "features-list features-list-left">
               <li class = "features-list-item" data-animation = "fadeInUp">
                  <!-- Icon -->
                  <i class = "icon-bulb fa-2x border-black"></i>
                  <div class = "features-content">
                     <!-- Title -->
                     <h5>Easy to use</h5>
                     <!-- Text -->
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit est is.</p>
                  </div>
               </li>
               <li class = "features-list-item" data-animation = "fadeInLeft">
                  <!-- Icon -->
                  <i class = "icon-clock14 fa-2x border-black"></i>
                  <div class = "features-content">
                     <!-- Title -->
                     <h5>Anywhere, Anytime</h5>
                     <!-- Text -->
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit est is.</p>
                  </div>
               </li>
               <li class = "features-list-item" data-animation = "fadeInUp">
                  <!-- Icon -->
                  <i class = "icon-mobile fa-2x border-black"></i>
                  <div class = "features-content">
                     <!-- Title -->
                     <h5>Quick Bookings</h5>
                     <!-- Text -->
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit est is.</p>
                  </div>
               </li>

            </ul>
         </div>
         <div class = "col-md-4 text-center animation fadeInUp animation-visible" data-animation = "pulse">
            <!-- Image -->
            <img class = "app-image" src = "<?= Yii::$app->request->baseUrl ?>/assets/images/sections/iphone6-studio.png" alt = ""/>
         </div>
         <div class = "col-md-4 animation fadeInRight animation-visible" data-animation = "fadeInRight">
            <ul class = "features-list features-list-right">
               <li class = "features-list-item" data-animation = "fadeInRight">
                  <!-- Icon -->
                  <i class = "icon-users3 fa-2x border-black"></i>
                  <div class = "features-content">
                     <!-- Title -->
                     <h5>No Queue</h5>
                     <!-- Text -->
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit est is.</p>
                  </div>
               </li>
               <li class = "features-list-item" data-animation = "fadeInUp">
                  <!-- Icon -->
                  <i class = "icon-bus fa-2x border-black"></i>
                  <div class = "features-content">
                     <!-- Title -->
                     <h5>Best Rated Vehicles</h5>
                     <!-- Text -->
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit est is.</p>
                  </div>
               </li>
               <li class = "features-list-item" data-animation = "fadeInRight">
                  <!-- Icon -->
                  <i class = "fa fa-microphone fa-2x border-black"></i>
                  <div class = "features-content">
                     <!-- Title -->
                     <h5>Customer Support</h5>
                     <!-- Text -->
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit est is.</p>
                  </div>
               </li>

            </ul>
         </div>
      </div>
   </div>
</section>
<?= $this->render('../snippets/user_signup') ?>
<section class = "page-section why-us">
   <div class = "container">
      <div class = "row">
         <div class = "col-md-12">
            <div class = "row text-center">
               <!-- Featute box -->
               <div class = "col-sm-4 col-md-4 travel-block" data-animation = "fadeInLeft">
                  <!-- Icon -->
                  <div class = "icon-wrapper">
                     <i class = " icon-dollar2 medium fa-1x border-color"></i>
                  </div>
                  <h5>Best Price</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus facilisis cvallis.</p>
               </div>
               <!-- Featute box -->
               <div class = "col-sm-4 col-md-4 travel-block" data-animation = "fadeInUp">
                  <!-- Icon -->
                  <div class = "icon-wrapper">
                     <i class = "icon-locked3 medium fa-1x border-color"></i>
                  </div>
                  <h5>Trust & Safety</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus facilisis cvallis.</p>
               </div>
               <!-- Featute box -->
               <div class = "col-sm-4 col-md-4 travel-block" data-animation = "fadeInRight">
                  <!-- Icon -->
                  <div class = "icon-wrapper">
                     <i class = "icon-like medium fa-1x border-color"></i>
                  </div>
                  <h5>Best Transport</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus facilisis cvallis.</p>
               </div>
            </div>
            <div class = "row text-center top-pad-30">
               <!-- Featute box -->
               <div class = "col-sm-4 col-md-4 travel-block" data-animation = "fadeInLeft">
                  <div class = "icon-wrapper">
                     <i class = "icon-plane-outline medium fa-1x border-color"></i>
                  </div>
                  <h5>Infinite destination</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus facilisis cvallis.</p>
               </div>
               <!-- Featute box -->
               <div class = "col-sm-4 col-md-4 travel-block" data-animation = "fadeInUp">
                  <!-- Icon -->
                  <div class = "icon-wrapper">
                     <i class = "icon-gift4 medium fa-1x border-color"></i>
                  </div>
                  <h5>Free Gifts</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus facilisis cvallis.</p>
               </div>
               <!-- Featute box -->
               <div class = "col-sm-4 col-md-4 travel-block" data-animation = "fadeInRight">
                  <!-- Icon -->
                  <div class = "icon-wrapper">
                     <i class = "icon-users5 medium fa-1x border-color"></i>
                  </div>
                  <h5>Dedicated Service</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus facilisis cvallis.</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class = "page-section testimonials">
   <div class = "section-title" data-animation = "fadeInUp">
      <!-- Heading -->
      <h2 class = "title">What Our Clients Say?</h2>
   </div>
   <div class = "container" data-animation = "fadeInUp">
      <div class = "testimonails">
         <div class = "owl-carousel navigation-1 dark-switch " data-pagination = "false" data-items = "3" data-autoplay = "true" data-navigation = "true">
             <?php if (!empty($testimonial) && count($testimonial) > 0):
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
                             <img style = "height: 80px;" class = "img-circle" src = "<?php echo (isset($t['image']) && $t['image'] != '') ? Yii::$app->request->baseUrl . '/common/assets/images/uploads/' . $t['image'] : Yii::$app->request->baseUrl . '/common/assets/images/no-image.png' ?>" width = "80" height = "80" alt = "">
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
</section>

<?php echo $this->render('../snippets/counter') ?>
<!-- features -->
<section class = "page-section payment-partners">
   <div class = "image-bg d-none content-in fixed" data-background = "<?= Yii::$app->request->baseUrl; ?>/assets/images/sections/bg/bg-12.jpg">
      <div class = "overlay"></div>
   </div>
   <div class = "container">
      <div class = "section-title animated fadeInUp visible " data-animation = "fadeInUp">
         <!-- Heading -->
         <h2 class = "title">Payment Partners</h2>
      </div>
       <?php
       $banks = [
               'bok-logo.png',
               'century-logo.png',
               'citizen.png',
               'civilbank_logo.png',
               'Everest.png',
               'gandaki-logo.jpg',
               'garima.png',
               'gibl.jpg',
               'icfc-logo.png',
               'janata.png',
               'kailash.jpg',
               'kamana.png',
               'kumari.png',
               'laxmi.png',
               'macha_logo.png',
               'mahalaxmi.jpg',
               'Mega.png',
               'muktinath-logo.png',
               'ncc-logo.jpg',
               'nibl_small.jpg',
               'nicAsia1.png',
               'nmb-logo.png',
               'prabhu-logo.jpg',
               'prime.png',
               'rbb.jpg',
               'sct_logo1.png',
               'sunrise-logo.png',
       ];
       ?>
      <div class = "clients">
          <?php foreach ($banks as $k => $b): ?>
             <div class = "boxed-block" data-animation = "fadeInLeft">
                <a href = "javascript:void(0);"><img src = "<?= Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/banks/<?= $b ?>" width = "130" height = "130" alt = ""></a>
             </div>
          <?php endforeach; ?>


      </div>
   </div>
</section>
<?php
$vendors = [
        '1.png',
        '2.png',
        '3.png',
        '4.png',
        '5.png',
        '6.png',
        '1.png',
        '2.png',
        '3.png',
        '4.png',
        '5.png',
        '6.png',
        '1.png',
        '2.png',
        '3.png',
        '4.png',
        '5.png',
        '6.png',
];
?>

<section class = "page-section operators">
   <div class = "image-bg d-none content-in fixed" data-background = "<?= Yii::$app->request->baseUrl; ?>/assets/images/sections/bg/bg-12.jpg">
      <div class = "overlay"></div>
   </div>
   <div class = "container">
      <div class = "section-title animated fadeInUp visible " data-animation = "fadeInUp">
         <!-- Heading -->
         <h2 class = "title">Vehicle Operators</h2>
      </div>
      <div class = "clients">
          <?php foreach ($vendors as $l => $m): ?>
             <div class = "boxed-block" data-animation = "fadeInLeft">
                <a href = "javascript:void(0);"><img src = "<?= Yii::$app->request->baseUrl; ?>/assets/images/sections/clients/<?= $m ?>" width = "130" height = "130" alt = ""></a>
             </div>
          <?php endforeach; ?>



      </div>
   </div>
</section>


<?= $this->render('../snippets/vendor_signup') ?>
<section class = "page-section top-destination">
   <div class = "container">
      <div class = "section-title" data-animation = "fadeInUp">
         <!-- Heading -->
         <h2 class = "title">Destinations</h2>
      </div>
      <div class = "row text-center top-pad-30">
         <div class = "col-sm-3 col-md-3" data-animation = "fadeInLeft">
            <!-- Image Wrapper -->
            <div class = "img-wrapper">
               <img src = "<?= Yii::$app->request->baseUrl; ?>/assets/images/sections/destination-1.jpg" alt = "" class = "img-responsive">
               <a href = "<?= Yii::$app->request->baseUrl; ?>/assets/images/sections/destination-1.jpg" data-rel = "prettyPhoto[portfolio1]">
                  <i class = "icon-plus6 bg-color text-white fa-2x icons-circle border-color"></i>
               </a>
            </div>
            <!-- Destination Box -->
            <div class = "destination-box">
               <h5>Paris</h5>
               <p class = "pull-right"><strong>From - <span class = "text-color">$550</span></strong></p>
               <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
               <a href = "#" class = "btn-link">Read more</a>
            </div>
         </div>
         <div class = "col-sm-3 col-md-3" data-animation = "fadeInRight">
            <!-- Image Wrapper -->
            <div class = "img-wrapper">
               <img src = "<?= Yii::$app->request->baseUrl; ?>/assets/images/sections/destination-2.jpg" alt = "" class = "img-responsive">
               <a href = "<?= Yii::$app->request->baseUrl; ?>/assets/images/sections/destination-2.jpg" data-rel = "prettyPhoto[portfolio1]">
                  <i class = "icon-plus6 bg-color text-white fa-2x icons-circle border-color"></i>
               </a>
            </div>
            <!-- Destination Box -->
            <div class = "destination-box">
               <h5>Las Vegas</h5>
               <p class = "pull-right"><strong>From - <span class = "text-color">$750</span></strong></p>
               <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
               <a href = "#" class = "btn-link">Read more</a>
            </div>
         </div>
         <div class = "col-sm-3 col-md-3" data-animation = "fadeInLeft">
            <!-- Image Wrapper -->
            <div class = "img-wrapper">
               <img src = "<?= Yii::$app->request->baseUrl; ?>/assets/images/sections/destination-3.jpg" alt = "" class = "img-responsive">
               <a href = "<?= Yii::$app->request->baseUrl; ?>/assets/images/sections/destination-3.jpg" data-rel = "prettyPhoto[portfolio1]">
                  <i class = "icon-plus6 bg-color text-white fa-2x icons-circle border-color"></i>
               </a>
            </div>
            <!-- Destination Box -->
            <div class = "destination-box">
               <h5>San Francisco</h5>
               <p class = "pull-right"><strong>From - <span class = "text-color">$450</span></strong></p>
               <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
               <a href = "#" class = "btn-link">Read more</a>
            </div>
         </div>
         <div class = "col-sm-3 col-md-3" data-animation = "fadeInRight">
            <!-- Image Wrapper -->
            <div class = "img-wrapper">
               <img src = "<?= Yii::$app->request->baseUrl; ?>/assets/images/sections/destination-4.jpg" alt = "" class = "img-responsive">
               <a href = "<?= Yii::$app->request->baseUrl; ?>/assets/images/sections/destination-4.jpg" data-rel = "prettyPhoto[portfolio1]">
                  <i class = "icon-plus6 bg-color text-white fa-2x icons-circle border-color"></i>
               </a>
            </div>
            <!-- Destination Box -->
            <div class = "destination-box">
               <h5>Australia</h5>
               <p class = "pull-right"><strong>From - <span class = "text-color">$450</span></strong></p>
               <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
               <a href = "#" class = "btn-link">Read more</a>
            </div>
         </div>
      </div>
      <div class = "clearfix"></div>
   </div>
</section>
<section class = "page-section latest-news">
   <div class = "container">
      <div class = "section-title" data-animation = "fadeInUp">
         <!-- Heading -->
         <h2 class = "title">Latest News</h2>
      </div>
      <div class = "row bottom-pad-30">
         <div class = "col-sm-4" data-animation = "fadeInLeft">
            <p class = "text-center opacity">
               <img src = "<?= Yii::$app->request->baseUrl; ?>/assets/images/sections/travel-1.jpg" width = "370" height = "185" alt = ""/>
            </p>
            <h4>
               <a href = "#" class = "black">Curabitur nunc neque</a>
            </h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id pariatur molestiae illum cum facere deserunt a enim harum eaque fugit.</p>
            <div class = "meta top-pad-10">
               <!-- Meta Date -->
               <a href = "#" class = "btn-link">Read More</a>
               <span class = "time pull-right"><i class = "icon-clock"></i> 03.11.2015</span>
            </div>
         </div>
         <div class = "col-sm-4 opacity" data-animation = "fadeInUp">
            <p class = "text-center">
               <img src = "<?= Yii::$app->request->baseUrl; ?>/assets/images/sections/travel-2.jpg" width = "370" height = "185" alt = ""/>
            </p>
            <h4>
               <a href = "#" class = "black">Curabitur nunc neque</a>
            </h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id pariatur molestiae illum cum facere deserunt a enim harum eaque fugit.</p>
            <div class = "meta top-pad-10">
               <!-- Meta Date -->
               <a href = "#" class = "btn-link">Read More</a>
               <span class = "time pull-right"><i class = "icon-clock"></i> 03.11.2015</span>
            </div>
         </div>
         <div class = "col-sm-4 opacity" data-animation = "fadeInRight">
            <p class = "text-center">
               <img src = "<?= Yii::$app->request->baseUrl; ?>/assets/images/sections/travel-3.jpg" width = "370" height = "185" alt = ""/>
            </p>
            <h4>
               <a href = "#" class = "black">Curabitur nunc neque</a>
            </h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id pariatur molestiae illum cum facere deserunt a enim harum eaque fugit.</p>
            <div class = "meta top-pad-10">
               <!-- Meta Date -->
               <a href = "#" class = "btn-link">Read More</a>
               <span class = "time pull-right"><i class = "icon-clock"></i> 03.11.2015</span>
            </div>
         </div>
      </div>
      <div class = "clearfix"></div>
   </div>
</section>
<section class = "page-section from-blog">
   <div class = "section-title" data-animation = "fadeInUp">
      <!-- Heading -->
      <h2 class = "title">From the Blog</h2>
   </div>
   <div class = "container">
      <div class = "row">
         <div class = "col-sm-4" data-animation = "fadeInRight">
            <p class = "text-center">
               <a href = "<?= Yii::$app->request->baseUrl; ?>/assets/images/sections/big-1.jpg" class = "opacity" data-rel = "prettyPhoto[portfolio]"><img src = "<?= Yii::$app->request->baseUrl; ?>/assets/images/sections/big-1.jpg" width = "370" height = "185" alt = ""></a>
            </p>
            <h5 class = "bottom-margin-10"><a href = "#" class = "black">Creative Design</a></h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id pariatur molestiae illum cum facere deserunt a enim harum eaque fugit.</p>
            <a href = "#" class = "btn-link">Read More</a>
            <div class = "meta top-pad-10">
               <!-- Meta Date -->
               <span class = "time">
                                <i class = "icon-clock"></i> 03.11.2015</span>
               <span class = "pull-right">
                                <i class = "icon-comments2"></i>
                                <a href = "">0 Comments</a>
               </span>
            </div>
         </div>
         <div class = "col-sm-4" data-animation = "fadeInUp">
            <p class = "text-center">
               <a href = "<?= Yii::$app->request->baseUrl; ?>/assets/images/sections/big-2.jpg" class = "opacity" data-rel = "prettyPhoto[portfolio]"><img src = "<?= Yii::$app->request->baseUrl; ?>/assets/images/sections/big-2.jpg" width = "370" height = "185" alt = ""></a>
            </p>
            <h5 class = "bottom-margin-10"><a href = "#" class = "black">Responsive</a></h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id pariatur molestiae illum cum facere deserunt a enim harum eaque fugit.</p>
            <a href = "#" class = "btn-link">Read More</a>
            <div class = "meta top-pad-10">
               <!-- Meta Date -->
               <span class = "time">
                                <i class = "icon-clock"></i> 03.11.2015</span>
               <span class = "pull-right">
                                <i class = "icon-comments2"></i>
                                <a href = "">0 Comments</a>
               </span>
            </div>
         </div>
         <div class = "col-sm-4" data-animation = "fadeInLeft">
            <p class = "text-center">
               <a href = "<?= Yii::$app->request->baseUrl; ?>/assets/images/sections/big-3.jpg" class = "opacity" data-rel = "prettyPhoto[portfolio]"><img src = "<?= Yii::$app->request->baseUrl; ?>/assets/images/sections/big-3.jpg" width = "370" height = "185" alt = ""></a>
            </p>
            <h5 class = "bottom-margin-10"><a href = "#" class = "black">HMTL 5</a></h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id pariatur molestiae illum cum facere deserunt a enim harum eaque fugit.</p>
            <a href = "#" class = "btn-link">Read More</a>
            <div class = "meta top-pad-10">
               <!-- Meta Date -->
               <span class = "time">
                                <i class = "icon-clock"></i> 03.11.2015</span>
               <span class = "pull-right">
                                <i class = "icon-comments2"></i>
                                <a href = "">0 Comments</a>
               </span>
            </div>
         </div>
      </div>
   </div>
</section>

<section class = "call-action bg-color">
   <div class = "container">
      <div class = "row">
         <div class = "col-md-12 top-pad-20 bottom-pad-20 text-center">
            <h3 class = "text-capitalize inline-block tb-margin-20 black animated fadeInUp visible" data-animation = "fadeInUp">More queries?
               <span class = "white">How can we help ?</span></h3>
            <div class = "inline-block lr-pad-20">
               <a href = "<?= Yii::$app->request->baseUrl; ?>/site/contact" class = "btn btn-transparent-white btn-lg animated fadeInDown visible" data-animation = "fadeInDown">Contact Us</a>
            </div>
         </div>
      </div>
   </div>
</section>

<section class = "page-section ">
   <div class = "container">
      <div class = "row">
         <div class = "col-sm-6 col-md-6 " data-animation = "fadeInRight">
            <div class = "section-title text-left">
               <!-- Heading -->
               <h2 class = "title">Frequently Asked Questions</h2>
            </div>
             <?php if (!empty($faq) && count($faq) > 0): ?>
                <div class = "panel-group no-list" id = "faq">
                    <?php foreach ($faq as $f) : ?>
                       <div class = "panel panel-default active">
                          <div class = "panel-heading">
                             <div class = "panel-title">
                                <!-- Tab -->
                                <a data-toggle = "collapse" data-parent = "#faq" href = "#item-<?php echo $f['id'] ?>">
                                   <i class = "icon-mobile9"></i>
                                    <?php echo (isset($f['title'])) ? $f['title'] : '' ?>
                                </a>
                             </div>
                          </div>
                          <div id = "item-<?php echo $f['id'] ?>" class = "panel-collapse collapse in">
                             <div class = "panel-body">
                                <!-- Tab Content-->
                                <p><?php echo (isset($f['content'])) ? $f['content'] : '' ?></p>
                             </div>
                          </div>
                       </div>
                    <?php endforeach; ?>
                </div>
                <div class = "m-t-10">
                   <a class = "btn btn-primary" href = "<?= Yii::$app->request->baseUrl; ?>/site/faq">View all</a>
                </div>
             <?php else : ?>
                <h3>No FAQ Found</h3>
             <?php endif; ?>
         </div>
         <div class = "col-sm-6" data-animation = "fadeInLeft">
            <div class = "section-title text-left">
               <!-- Heading -->
               <h2 class = "title">Ask a question</h2>
            </div>
            <p class = "form-message" style = "display: none;"></p>
            <div class = "contact-form">
               <!-- Form Begins -->
               <form id="contact-form" name="contact-form" method = "post">
                  <div class="response hidden">
                     <h5>Message Sent</h5>
                  </div>
                  <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>

                  <div class = "input-text form-group">
                     <input required type = "text" name = "name" class = "input-name form-control" placeholder = "Full Name"/>
                  </div>
                  <!-- Field 2 -->
                  <div class = "input-email form-group">
                     <input required type = "email" name = "email" class = "input-email form-control" placeholder = "Email"/>
                  </div>
                  <!-- Field 3 -->
                  <div class = "input-email form-group">
                     <input required type = "text" name = "phone" class = "input-phone form-control" placeholder = "Phone"/>
                  </div>
                  <!-- Field 4 -->
                  <div class = "textarea-message form-group">
                     <textarea required name = "message" class = "textarea-message height-153 form-control" placeholder = "Message" rows = "2"></textarea>
                  </div>
                  <!-- Button -->
                  <a class="btn btn-default btn-block submit-contact text-white">Send Now <i class = "icon-paper-plane"></i></a>
                  <!--                            <button class = "btn btn-default btn-block submit-contact" type = "submit">Send Now-->
                  <!--                                <i class = "icon-paper-plane"></i>-->
                  <!--                            </button>-->
               </form>
               <!-- Form Ends -->
            </div>
         </div>
      </div>
   </div>

</section>

<?php if (true == false) : ?>
   <section class = "operatoe-01">
      <div class = "container">
         <div class = "operator">
            <div class = "section-title">
               <!-- Heading -->
               <h2 class = "title">Top Operators</h2>
            </div>
            <ul>
               <li><a href = ""> YGL Operator </a></li>
               <li><a href = ""> YGL Operator </a></li>
               <li><a href = ""> YGL Operator </a></li>
               <li><a href = ""> YGL Operator </a></li>
               <li><a href = ""> YGL Operator </a></li>
               <li><a href = ""> YGL Operator </a></li>
               <li><a href = ""> YGL Operator </a></li>
               <li><a href = ""> YGL Operator </a></li>
               <li><a href = ""> YGL Operator </a></li>
               <li><a href = ""> YGL Operator </a></li>
               <li><a href = ""> YGL Operator </a></li>
               <li><a href = ""> YGL Operator </a></li>
               <li><a href = ""> YGL Operator </a></li>
               <li><a href = ""> YGL Operator </a></li>
               <li><a href = ""> YGL Operator </a></li>
               <li><a href = ""> YGL Operator </a></li>
               <li><a href = ""> YGL Operator </a></li>
               <li><a href = ""> YGL Operator </a></li>
               <li><a href = ""> YGL Operator </a></li>
               <li><a href = ""> YGL Operator </a></li>
               <li><a href = ""> YGL Operator </a></li>

            </ul>

         </div>

      </div>


      <script>
         var time = new Date().toLocaleDateString('en-GB', {
            day: 'numeric',
            month: 'short',
            year: 'numeric'
         });

         function show(id) {
            if (id == 1) {

               value = new Date(Date.now() + 24 * 60 * 60 * 1000);
               document.getElementById('departure-date').value = value.toLocaleDateString('en-GB', {
                  day: 'numeric',
                  month: 'short',
                  year: 'numeric'
               })
            }
            if (id == 2) {
               document.getElementById('departure-date').value = time;
            }
         }
      </script>
   </section>
   <section id = "destinations" class = "page-section">
      <div class = "section-title" data-animation = "fadeInUp">
         <!-- Heading -->
         <h2 class = "title">Destinations</h2>
      </div>
      <div class = "" data-animation = "fadeInUp">
         <div class = "explore-11">
            <div id = "explore-11" class = "owl-carousel navigation-1 dark-switch " data-pagination = "false" data-items = "3" data-autoplay = "true" data-navigation = "true">
                <?php if (!empty($explore) && count($explore) > 0):
                    foreach ($explore as $e) :
                        ?>
                       <div class = "item">
                          <div class = "explore-nepal">
                             <img src = "<?php echo (isset($e['image']) && $e['image'] != '') ? Yii::$app->request->baseUrl . '/common/assets/images/uploads/' . $e['image'] : Yii::$app->request->baseUrl . '/common/assets/images/no-image.png' ?>" alt = "" title = "">
                             <div class = "overlay-explore">
                                <div class = "text-01">
                                   <a href = "<?php Yii::$app->request->baseUrl; ?>./destination/index/<?php echo \common\components\Misc::encrypt($e['id']); ?>"><?php echo $e['title'] ?></a>
                                   <p> <?php echo (isset($e['description'])) ? substr($e['description'], 0, 50) . '...' : '' ?></p>
                                </div>
                             </div>
                          </div>
                       </div>
                    <?php endforeach;
                    ?>
                <?php else : ?>
                   <h3>No Image Found</h3>
                <?php endif; ?>
            </div>
         </div>
      </div>
   </section><!-- testimonials -->
   <section class = "page-section ">
      <div class = "container">
         <div class = "mx-auto pt-35 pb-10 text-center" data-animation = "fadeInUp">
            <div class = "section-title">
               <!-- Heading -->
               <h2 class = "title">News Update</h2>
            </div>
         </div>
         <div class = "row" data-animation = "fadeInUp">
             <?php if (!empty($news) && count($news) > 0) {
                 foreach ($news as $n) {
                     ?>
                    <div class = "col-sm-12 col-md-4 col-lg-4">
                       <div class = "post-slide8">
                          <div class = "post-img">
                             <img src = "<?php echo (isset($n['image']) && $n['image'] != '') ? Yii::$app->request->baseUrl . '/common/assets/images/uploads/' . $n['image'] : Yii::$app->request->baseUrl . '/common/assets/images/no-image.png' ?>" alt = "" title = "">
                             <div class = "post-date">
                                 <?php
                                 $date = $n['created_on'];
                                 $splitTimeStamp = explode(" ", $date);
                                 $date = $splitTimeStamp[0];
                                 $time = $splitTimeStamp[1];
                                 $splitDate = explode("-", $date);
                                 $year = $splitDate[0];
                                 $month = $splitDate[1];
                                 $day = $splitDate[2];
                                 $dateObj = DateTime::createFromFormat('!m', $month);
                                 $monthName = $dateObj->format('M');
                                 $dayName = $dateObj->format('1');
                                 ?>
                                <span class = "date"><?php echo $day ?></span>
                                <span class = "month"><?php echo $monthName ?></span>
                             </div>
                          </div>
                          <div class = "blog-content">
                             <div class = "blog-title">
                                <h4><a href = "<?php echo Yii::$app->request->baseUrl; ?>/news/post/<?php echo \common\components\Misc::encrypt($n['id']); ?>"><?php echo $n['title'] ?></a></h4>
                             </div>
                          </div>
                       </div>
                    </div>
                 <?php }
             }
             else { ?>
                <h3>No News Found</h3>
             <?php } ?>
         </div>
      </div>
   </section>
   <section class = "page-section">
      <div class = "container">
         <div class = " mx-auto pt-35 pb-10 text-center" data-animation = "fadeInUp">
            <div class = "section-title">
               <!-- Heading -->
               <h2 class = "title">From The Blog</h2>
            </div>
         </div>
         <div class = "blog-me" id = "blog">
            <div class = "row" data-animation = "fadeInUp">
                <?php if (!empty($blog) && count($blog) > 0) {
                    foreach ($blog as $b) {
                        ?>
                       <div class = "col-lg-4 col-md-6">
                          <div class = "single-blog">
                             <div class = "blog-img">
                                <img src = "<?php echo (isset($b['image']) && $b['image'] != '') ? Yii::$app->request->baseUrl . '/common/assets/images/uploads/' . $b['image'] : Yii::$app->request->baseUrl . '/common/assets/images/no-image.png' ?>" alt = "" title = "">
                                <div class = "post-category">
                                   <a href = "#"><?php echo (isset($b['category']['name'])) ? $b['category']['name'] : '' ?></a>
                                </div>
                             </div>
                             <div class = "blog-content">
                                <div class = "blog-title">
                                   <h4><a href = " <?php echo Yii::$app->request->baseUrl; ?>/blog/view/<?php echo \common\components\Misc::encrypt($b['id']); ?>"><?php echo $b['title'] ?></a></h4>
                                   <div class = "meta">
                                      <ul>
                                         <li><i class = "fa fa-calendar"></i>
                                             <?php
                                             $timestamp = explode(' ', $b['created_on']);
                                             echo $timestamp[0];
                                             ?>
                                         </li>
                                      </ul>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    <?php }
                }
                else { ?>
                   <h3>No Blogs Found</h3>
                <?php } ?>
            </div>
         </div>
      </div>
   </section>
   <section id = "clients" class = "page-section">
      <div class = "container">
         <div class = "section-title">
            <!-- Heading -->
            <h2 class = "title">Partners</h2>
         </div>
         <div class = "row">
            <div class = "col-md-12 text-center">
               <div class = "owl-carousel navigation-1" data-pagination = "false" data-items = "6" data-autoplay = "true" data-navigation = "true">
                   <?php foreach ($clients as $c => $client): ?>
                      <a href = "<?php echo Yii::$app->request->baseUrl; ?>/site/partner/<?php echo \common\components\Misc::encrypt($client['id']); ?>">
                         <img src = "<?php echo Yii::$app->request->baseUrl . '/common/assets/images/uploads/' . $client['image']; ?>" width = "170" height = "170" alt = ""/>
                      </a>
                   <?php endforeach; ?>
               </div>
            </div>
         </div>
      </div>
   </section><!-- clients -->
   <section class = "page-section">
      <div class = "container">
         <div class = "row top-padding-40">
            <div class = " col-sm-12 col-md-12 col-lg-5  text-center" data-appear-animation = "fadeInLeft">
               <div class = "double-img">
                  <!-- Images -->
                  <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/iphone6.png" width = "250" height = "415" alt = "" class = "relative animated fadeInLeft visible" data-animation = "fadeInLeft">
                  <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/iphone6.png" width = "290" height = "415" alt = "" class = "image-right relative animated fadeInRight visible" data-animation = "fadeInRight">
               </div>
            </div>
            <div class = "col-sm-12 col-md-12 col-lg-7" data-appear-animation = "fadeInRight">
               <div class = "section-title text-left">
                  <!-- Heading -->
                  <h2 class = "title">COMING SOON</h2>
               </div>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem praesentium deleniti nostrum laborum rem id nihil tempora.</p>
               <h4>Benefits Of Our App</h4>
               <!-- Lists -->
               <ul>
                  <li>
                     <!-- Icon -->
                     <i class = "fa fa-bell-o fa-2x pull-left"></i>
                     <!-- Text -->
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore aliqua.</p>
                  </li>
                  <li>
                     <!-- Icon -->
                     <i class = "fa fa-star-o fa-2x pull-left"></i>
                     <!-- Text -->
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore aliqua.</p>
                  </li>
                  <li>
                     <!-- Icon -->
                     <i class = "fa fa-magic fa-2x pull-left"></i>
                     <!-- Text -->
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore aliqua.</p>
                  </li>
                  <li>
                     <!-- Icon -->
                     <i class = "fa fa-comment-o fa-2x pull-left"></i>
                     <!-- Text -->
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore aliqua.</p>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </section>
   <section id = "banks" class = "page-section">
      <div class = "container">
         <div class = "section-title">
            <!-- Heading -->
            <h2 class = "title">Payment Partners</h2>
         </div>
         <div class = "row">
            <div class = "col-md-12 text-center">
               <div class = "owl-carousel navigation-1" data-pagination = "false" data-items = "6" data-autoplay = "true" data-navigation = "true">
                  <a href = "<?php echo Yii::$app->request->baseUrl; ?>/partner/">
                     <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/clients/1.png" width = "170" height = "170" alt = ""/>
                  </a>
                  <a href = "<?php echo Yii::$app->request->baseUrl; ?>/partner/">
                     <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/clients/2.png" width = "170" height = "170" alt = ""/>
                  </a>
                  <a href = "<?php echo Yii::$app->request->baseUrl; ?>/partner/">
                     <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/clients/3.png" width = "170" height = "170" alt = ""/>
                  </a>
                  <a href = "#">
                     <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/clients/4.png" width = "170" height = "170" alt = ""/>
                  </a>
                  <a href = "<?php echo Yii::$app->request->baseUrl; ?>/partner/">
                     <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/clients/5.png" width = "170" height = "170" alt = ""/>
                  </a>
                  <a href = "<?php echo Yii::$app->request->baseUrl; ?>/partner/">
                     <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/clients/6.png" width = "170" height = "170" alt = ""/>
                  </a>
                  <a href = "<?php echo Yii::$app->request->baseUrl; ?>/partner/">
                     <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/clients/1.png" width = "170" height = "170" alt = ""/>
                  </a>
                  <a href = "<?php echo Yii::$app->request->baseUrl; ?>/partner/">
                     <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/clients/2.png" width = "170" height = "170" alt = ""/>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </section><!-- banks -->
   <section class = "page-section d-none">
      <div class = "container">
         <div class = "section-title animated fadeInUp visible " data-animation = "fadeInUp">
            <!-- Heading -->
            <h2 class = "title">How it works</h2>
         </div>
         <div class = " hw-01 text-center mb-5  " data-animation = "fadeInUp">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo assumenda, dolorum <br> necessitatibus eius earum voluptates sed!</p>
         </div>
         <div class = "how-it-works d-flex bus-work" data-animation = "fadeInUp">
            <div class = "step">
               <span class = "number"><span>01</span></span>
               <span class = "caption">Time &amp; Place</span>
            </div>
            <div class = "step">
               <span class = "number"><span>02</span></span>
               <span class = "caption">Bus</span>
            </div>
            <div class = "step">
               <span class = "number"><span>03</span></span>
               <span class = "caption">Details</span>
            </div>
            <div class = "step">
               <span class = "number"><span>04</span></span>
               <span class = "caption">Checkout</span>
            </div>
            <div class = "step step-01">
               <span class = "number"><span>05</span></span>
               <span class = "caption">Done</span>
            </div>
         </div>
      </div>
   </section>
   <section class = "page-section faq ">
      <div class = "container">
         <div class = "row">
            <div class = "col-md-6 col-sm-12 ">
               <div class = "section-title animated fadeInUp visible " data-animation = "fadeInUp">
                  <!-- Heading -->
                  <h2 class = "title">Frequently Asked Questions</h2>
               </div>
               <div class = "panel-group no-list" id = "faq" data-animation = "fadeInLeft">
                   <?php if (!empty($faq) && count($faq) > 0):
                       foreach ($faq as $f) :
                           ?>
                          <div class = "panel panel-default active">
                             <div class = "panel-heading">
                                <div class = "panel-title">
                                   <!-- Tab -->
                                   <a data-toggle = "collapse" data-parent = "#faq" href = "#item<?php echo $f['id'] ?>">
                                      <i class = "icon-mobile9"></i>
                                       <?php echo (isset($f['title'])) ? $f['title'] : '' ?>
                                   </a>
                                </div>
                             </div>
                             <div id = "item<?php echo $f['id'] ?>" class = "panel-collapse collapse in">
                                <div class = "panel-body">
                                   <!-- Tab Content-->
                                   <p><?php echo (isset($f['content'])) ? $f['content'] : '' ?></p>
                                </div>
                             </div>
                          </div>
                       <?php endforeach;
                       ?>
                   <?php else : ?>
                      <h3>No FAQ Found</h3>
                   <?php endif; ?>
               </div>
            </div>
            <div class = "col-md-6 col-sm-12 ">

            </div>
         </div>
         <div class = "margin-top-10">
            <a href = "<?php echo Yii::$app->request->baseUrl; ?>/site/faq" class = "btn btn-primary">Read More</a>
         </div>


      </div>
   </section>
<?php endif; ?>
