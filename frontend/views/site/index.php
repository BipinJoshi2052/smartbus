<?php

$this->registerJsFile(Yii::$app->request->baseUrl . '/common/assets/vendor/pos/js/pos.js');
$this->registerCssFile(Yii::$app->request->baseUrl . '/common/assets/vendor/pos/css/pos.css');
?>
<script>
   constants = [];
</script>
<?php $this->title = 'Welcome'; ?>
<?php echo $this->render('../snippets/slider') ?>
<?php //echo  $this->render('../snippets/slider2') ?>

<script type = "text/javascript">

   var TxtType = function (el, toRotate, period) {
      this.toRotate = toRotate;
      this.el = el;
      this.loopNum = 0;
      this.period = parseInt(period, 10) || 2000;
      this.txt = '';
      this.tick();
      this.isDeleting = false;
   };

   TxtType.prototype.tick = function () {
      var i = this.loopNum % this.toRotate.length;
      var fullTxt = this.toRotate[i];

      if (this.isDeleting) {
         this.txt = fullTxt.substring(0, this.txt.length - 1);
      } else {
         this.txt = fullTxt.substring(0, this.txt.length + 1);
      }

      this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

      var that = this;
      var delta = 200 - Math.random() * 100;

      if (this.isDeleting) {
         delta /= 2;
      }

      if (!this.isDeleting && this.txt === fullTxt) {
         delta = this.period;
         this.isDeleting = true;
      } else if (this.isDeleting && this.txt === '') {
         this.isDeleting = false;
         this.loopNum++;
         delta = 500;
      }

      setTimeout(function () {
         that.tick();
      }, delta);
   };

   window.onload = function () {
      var elements = document.getElementsByClassName('typewrite');
      for (var i = 0; i < elements.length; i++) {
         var toRotate = elements[i].getAttribute('data-type');
         var period = elements[i].getAttribute('data-period');
         if (toRotate) {
            new TxtType(elements[i], JSON.parse(toRotate), period);
         }
      }
      // INJECT CSS
      var css = document.createElement("style");
      css.type = "text/css";
      css.innerHTML = ".typewrite { color: #fff}";
      css.innerHTML = ".typewrite > .wrap { border-right: 0.0em solid #fff}";

      document.body.appendChild(css);
   };
</script>

<section class = "banner-back" style = " background-image: url(<?= Yii::$app->request->baseUrl; ?>/assets/slider/assets/nepal6.jpg);     background-position-y: center; background-size: cover;    background-position-y: -webkit-center; padding:0px;margin-top:0px;margin-bottom:0px; ">

   <div class = " container ">
      <div class = "new-home-banner">


         <div class = " auto-text text-center">
            <h2 class = "typewrite" data-period = "2000" data-type = '[ "BOOK YOUR TICKET <br>IT IS SO EASY ANYONE CAN DO IT  ", "BOOK YOUR TICKET <br> IT IS SO EASY THAT ANYONE CAN DO IT ", "I Love to Develop <br> IT IS SO EASY THAT ANYONE CAN DO IT" ]'>
               <span class = "wrap"></span>

               <!--  <a href="" class="typewrite" data-period="2000" data-type='[ "BOOK YOUR TICKET <br>It is so easy that anyone do it  ", "I am Creative.", "I Love Design.", "I Love to Develop." ]'>
                  <span class="wrap"></span>
                </a> -->
            </h2>

            <div class = "book-my-ticket">
               <button type = "submit" class = "btn btn-pm">READ MORE</button>
            </div>
         </div>


         <div class = "" style = "padding-top: 55px;">


            <form class = "trip-form">
               <ul class = "nav nav-pills nav-01" id = "pills-tab" role = "tablist">
                  <h4><i class = "icon icon-bus"></i> Book Tickets</h4>
                  <li class = "nav-item my-search">
                     <a class = "nav-link active tab-01" id = "pills-home-tab" data-toggle = "pill" href = "#pills-home" role = "tab" aria-controls = "pills-home" aria-selected = "true">BUS TICKET</a>
                  </li>
                  <li class = "nav-item rent">
                     <a class = "nav-link tab-01" id = "pills-profile-tab" data-toggle = "pill" href = "#pills-profile" role = "tab" aria-controls = "pills-profile" aria-selected = "false">RENT</a>
                  </li>

               </ul>
               <hr class = "mt-0">
               <div class = "tab-content" id = "pills-tabContent">
                  <div class = "tab-pane fade show active pd" id = "pills-home" role = "tabpanel" aria-labelledby = "pills-home-tab">
                     <div class = "row ">

                        <!--   <div class="col-lg-4 col-md-5 col-sm-12 swap-01 ">

                            <div class="row" >
                              <div class="col" >
                                 <div class="location-icon" >
                              <span> <i class="fa fa-map-marker" aria-hidden="true"></i></span>
                             <input type="text" class="form-control search-slt " placeholder="Enter Pickup City">

                            </div>
                              </div>
                              <div class="center-part">
                       <button class="btn btn-option" id="search-swap-locations" type="button">
                          <i class="fa fa-arrows-h"></i>
                       </button>

                    </div>
                               <div class="col" >
                                  <div class="location-icon" >
                              <span> <i class="fa fa-map-marker" aria-hidden="true"></i></span>
                            <input type="text" class="form-control search-slt" placeholder="Enter Drop City">
                            </div>
                              </div>

                            </div>
                            </div> -->
                        <!--  <span  class="swap" id="inputGroupPrepend2"><i class="fa fa-exchange" aria-hidden="true"></i></span> -->


                        <div class = "col-lg-2 col-md-5 col-sm-12 ">
                           <div class = "location-icon-1">
                              <span> <i class = "fa fa-map-marker" aria-hidden = "true"></i></span>
                              <input type = "text" class = "form-control search-slt location-1 " placeholder = "Enter Pickup City">

                           </div>

                        </div>
                        <div class = "col-lg-2 col-md-5 col-sm-12 ">

                           <div class = "location-icon-1">
                              <span> <i class = "fa fa-map-marker" aria-hidden = "true"></i></span>
                              <input type = "text" class = "form-control search-slt location-1" placeholder = "Enter Drop City">
                           </div>
                        </div>
                        <div class = "col-lg-3 col-md-5 col-sm-12 ">
                           <div class = "location-icon">
                              <span> <i class = "fa fa-calendar" aria-hidden = "true"></i></span>
                              <input type = "text" class = "form-control search-slt " id = "departure-date" placeholder = " Departure Date">
                           </div>


                        </div>
                        <div class = "col-lg-3 col-md-5 col-sm-12 ">
                           <div class = "location-icon">
                              <span> <i class = "fa fa-calendar" aria-hidden = "true"></i></span>
                              <input type = "text" class = "form-control search-slt" id = "return-date" placeholder = "Return Date">
                           </div>

                        </div>

                        <div class = "col-lg-2 col-md-2 col-sm-12 ">
                           <button type = "button" class = "btn btn-warning wrn-btn">Search</button>
                        </div>
                     </div>
                  </div>
                  <div class = "tab-pane fade" id = "pills-profile" role = "tabpanel" aria-labelledby = "pills-profile-tab">...</div>

               </div>


            </form>
         </div>
      </div>
   </div>


   <!--  <div id=""  class="container banner-01" >

    <div class="row">
         <div class = "col-md-12 col-sm-12 col-lg-7 mb-sm-4 padding-right-20" data-animation = "fadeInLeft">

             <div class = "owl-carousel pagination-1 dark-switch" data-pagination = "true" data-autoplay = "true" data-navigation = "false" data-singleitem = "true" data-animation = "fadeInUp">
                <div class = "item">

                   <div class="hero-text">

 <h1>BOOK  <span>YOUR TICKET NOW</span></h1>

  <h2 class = "entry-title" style="color: #FF9800;">
                     IT IS SO EASY THAT ANYONE CAN DO IT

                   </h2>


                   <div class = "entry-content">
                      <p>Lorem ipsum dolor sit amet,accusantium nobis tempora conse <br>
                      Lorem ipsum dolor sit amet,accusantium nobis tempora consequ.</p>


                   </div>

 <a href="#" class="primary-btn">BOOK TICKET NOW</a>
 </div>


                </div>
                <div class = "item">

                   <div class="hero-text">

 <h1>BOOK  <span>YOUR TICKET NOW</span></h1>

  <h2 class = "entry-title" style="color: #FF9800;">
                     IT IS SO EASY THAT ANYONE CAN DO IT

                   </h2>


                   <div class = "entry-content">
                      <p>Lorem ipsum dolor sit amet,accusantium nobis tempora consequ <br>
                      Lorem ipsum dolor sit amet,accusantium nobis tempora consequatu.</p>


                   </div>

 <a href="#" class="primary-btn">BOOK TICKET NOW</a>
 </div>


                </div>
             </div>

          </div>
          <div class="col-md-12 col-sm-12 col-lg-5 mb-sm-4 padding-left-20 animated fadeInRight visible" data-animation="fadeInRight">


               <ul class="nav nav-pills nav-01" id="pills-tab" role="tablist">
                <h4>Book Tickets</h4>
   <li class="nav-item my-search">
     <a class="nav-link active tab-01" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">BUS TICKET</a>
   </li>
   <li class="nav-item rent">
     <a class="nav-link tab-01" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">RENT</a>
   </li>

 </ul>

             <form action="#" class="request-form ftco-animate bg-01 fadeInUp ftco-animated search-ticket">


 <div class="tab-content tab-content-01" id="pills-tabContent">
   <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">



       <div class="input-group">
          <input class="input-name form-control form-02" type="text" id="career_name" name="career_name" placeholder="From">


          <div class="">
           <span  class="swap" id="inputGroupPrepend2"><i class="fa fa-exchange" aria-hidden="true"></i></span>
         </div>
       </div>

                        <div class="input-text form-group">
                             <input class="input-name form-control" type="text" id="career_name" name="career_name" placeholder="To">
                         </div>

                            <div class="form-group ">

                          <input type="text" class="form-control form-02 fm-01" id="departure-date" placeholder="Arivall Date">
                          <input type="text" class="form-control" id="return-date" placeholder="Return Date">
                        </div>

                     <div class="book-my-ticket">
                         <button type="submit" class="btn btn-pm">Search</button>
                     </div>


                     </div>
   <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>

 </div>


                      </form>

          </div>
       </div> -->

   <!--   <div class="row" >
    <div class="col-sm-12 col-md-8 col-lg-8" >


<div class="banner-header-01" >
 <h1 class="upper animation animated-item-1">
                          <span class="text-color">Creative</span> Multi-purpose Theme</h1>
                          <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
</h4>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>


<a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#login-modal">Sign Up</a>

</div>


    </div>
     <div class="col-sm-12 col-md-4 col-lg-4" >
       <form action="#" class="request-form ftco-animate bg-01 fadeInUp ftco-animated">
                   <h2>Book Tickets</h2>
                      <div class="form-group">
                         <label for="" class="label">Departure</label>
                         <input type="text" class="form-control" placeholder="City, Airport, Station, etc">
                      </div>
                      <div class="form-group">
                         <label for="" class="label">Destination</label>
                         <input type="text" class="form-control" placeholder="City, Airport, Station, etc">
                      </div>
                      <div class="d-flex">
                         <div class="form-group mr-2">
                       <label for="" class="label">Pick-up Date</label>
                       <input type="text" class="form-control" id="departure-date" placeholder="Date">
                     </div>
                     <div class="form-group ml-2">
                       <label for="" class="label">Drop-off ate</label>
                       <input type="text" class="form-control" id="return-date" placeholder="Date">
                     </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="label">Pick-up time</label>
                    <input type="text" class="form-control ui-timepicker-input" id="time_pick" placeholder="Time" autocomplete="off">
                  </div>
                   <div class="form-group">
                     <input type="submit" value="Search" class="btn btn-info py-3 px-4">
                   </div>
                   </form>
    </div>

 </div> -->


</section>


<section id = "testimonials" class = "page-section light-bg">
   <div class = "section-title" data-animation = "fadeInUp">
      <!-- Heading -->
      <h2 class = "title">Explore More</h2>
   </div>
   <div class = "container" data-animation = "fadeInUp">
      <div class = "testimonails">
         <div class = "owl-carousel navigation-1 dark-switch " data-pagination = "false" data-items = "3" data-autoplay = "true" data-navigation = "true">
             <?php if (!empty($explore) && count($explore) > 0):
                 foreach ($explore as $e) :
                     ?>
            <div class = "item">
               <div class = "explore-nepal">
                  <img src="<?php echo (isset($e['image']) && $e['image'] != '') ? Yii::$app->request->baseUrl . '/common/assets/images/uploads/' . $e['image'] : Yii::$app->request->baseUrl . '/common/assets/images/no-image.png' ?>"  alt = "" title = "">

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

<section>
   <div class = "container">

      <div class = "section-title animated fadeInUp visible mb-23" data-animation = "fadeInUp" style = "padding-top: 17px;">
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


<section>
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

<?= $this->render('../snippets/counter') ?>


<section>
   <div class = "container">
      <div class = " mx-auto pt-35 pb-10 text-center" data-animation = "fadeInUp">
         <div class = "section-title">
            <!-- Heading -->
            <h2 class = "title">Blog Update</h2>
         </div>
      </div>
      <section class = "blog-me  pb-100" id = "blog">


         <div class = "row" data-animation = "fadeInUp">
             <?php if (!empty($blog) && count($blog) > 0){
                 foreach ($blog as $b){
                     ?>
                    <div class = "col-lg-4 col-md-6">
                        <div class = "single-blog">
                        <div class = "blog-img">
                    <img src="<?php echo (isset($b['image']) && $b['image'] != '') ? Yii::$app->request->baseUrl . '/common/assets/images/uploads/' . $b['image'] : Yii::$app->request->baseUrl . '/common/assets/images/no-image.png' ?>"  alt = "" title = "">
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
             <?php }}else { ?>
                <h3>No Blogs Found</h3>
             <?php } ?>

         </div>

      </section>
   </div>
</section>


<?= $this->render('../snippets/user_signup') ?>


<section id = "testimonials" class = "page-section light-bg">
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
</section><!-- testimonials -->
<?= $this->render('../snippets/vendor_signup') ?>


<?php if (Yii::$app->params['map'] == true): ?>
   <section>
      <div class = "row">
         <div class = "col-sm-6 com-xs-12 padding-right-0">
            <section id = "video-section" class = "video-section">
               <div class = "image-bg content-in fixed " data-background = "<?php echo Yii::$app->request->baseUrl . Yii::$app->params['image_path']['uploads']; ?>005.jpg">
                  <div class = "overlay-strips"></div>
               </div>
               <div class = "container-fluid">
                  <div class = "row">
                     <div class = "col-sm-12 no-pad">
                        <!-- Video -->
                        <div id = "bg-video">
                           <div class = "player" data-property = "{videoURL:'https://www.youtube.com/watch?v=UGPxfizP1aI',containment:'#video-section',startAt:0, mute:true, autoPlay:false,
                                    showControls:true}"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </section><!-- video -->
         </div>
         <div class = "col-sm-6 com-xs-12 padding-left-0">
            <div class = "map-section">
               <div id = "map" class = "map-canvas" data-zoom = "8" data-lat = "-35.2835" data-lng = "149.128" data-type = "roadmap" data-hue = "#ffffff" data-title = "Eco Sanjal" style = "height: 552px;"></div>
            </div>
         </div>
      </div>
   </section>

<?php endif; ?>


<section class = "faq-01" style = " background-image: url(<?= Yii::$app->request->baseUrl; ?>/assets/slider/assets/nepal6.jpg);     background-position-y: center; background-size: cover;">

   <div class = " ">

      <div class = "row m-0">

         <div class = "col-sm-12 col-md-6 col-lg-6 pd-1" data-animation = "fadeInRight">
            <div class = "explore-01">


               <div class = "section-title text-left">
                  <!-- Heading -->
                  <h2 class = "title" style = "color: white;">Book Your Ticket</h2>
               </div>

               <span>We Make Your Travel Fun</span>
               <p>We Provie You The Best Service For Your Exploretion</p>

               <div class = "explore-btn">
                  <button type = "submit" class = "btn btn-1">BOOK NOW</button>
               </div>
            </div>
         </div>
         <div class = "col-md-6 col-sm-12 col-xs-12 pd-1 bc-01 padding-left-20" data-animation = "fadeInRight">
            <div class = "section-title text-left">
               <!-- Heading -->
               <h2 class = "title">Frequently Asked Questions</h2>
            </div>
            <div class = "panel-group no-list" id = "accordion1" data-animation = "fadeInLeft">
                <?php if (!empty($faq) && count($faq) > 0):
                foreach ($faq as $f) :
                ?>
               <div class = "panel panel-default active">
                  <div class = "panel-heading">
                     <div class = "panel-title">
                        <!-- Tab -->
                        <a data-toggle = "collapse" data-parent = "#accordion1" href = "#item<?php echo $f['id'] ?>">
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
            <!--     <div class = "text-center margin-top-10">
               <a href = "<?php echo Yii::$app->request->baseUrl; ?>/site/faq" class = "btn btn-primary">Read More</a>
            </div> -->
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
</section><!-- clients -->
<section class = "page-section">
   <div class = "container">
      <div class = "row top-padding-40">
         <div class = "col-md-5 text-center" data-appear-animation = "fadeInLeft">
            <div class = "double-img">
               <!-- Images -->
               <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/iphone6.png" width = "250" height = "415" alt = "" class = "relative animated fadeInLeft visible" data-animation = "fadeInLeft">
               <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/iphone6.png" width = "290" height = "415" alt = "" class = "image-right relative animated fadeInRight visible" data-animation = "fadeInRight">
            </div>
         </div>
         <div class = "col-md-7" data-appear-animation = "fadeInRight">
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

<!--<section id = "my-video">
    <div class = "image-bg content-in fixed" data-background = "<?php /*echo Yii::$app->request->baseUrl; */ ?>/assets/images/sections/bg/full-img2.jpg">
        <div class = "overlay-strips"></div>
    </div>
    <div class = "container-fluid">
        <div class = "row">
            <div class = "col-sm-12 no-pad">

                <div id = "bg-video">
                    <div class = "player" data-property = "{videoURL:&#39;https://www.youtube.com/watch?v=Y-OLlJUXwKU&#39;,containment:&#39;#my-video&#39;,startAt:0, mute:true, autoPlay:true, showControls:false}"></div>
                </div>
                <div id = "video-controls" style = "display: block;">
                    <a class = "fa fa-pause text-color color-border" id = "video-play" href = "#"></a>
                    <br/>
                    <h6 class = "text-color bold">Demo Video</h6>
                </div>
            </div>
        </div>
    </div>
</section>-->