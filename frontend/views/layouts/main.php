<?php
/* @var $this \yii\web\View */

/* @var $content string */
use frontend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang = "<?= Yii::$app->language ?>">
<head>
   <meta charset = "<?= Yii::$app->charset ?>">
   <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
   <meta name = "viewport" content = "width=device-width, initial-scale=1,maximum-scale=1.0,user-scalable=no">
    <?php $this->registerCsrfMetaTags() ?>
   <title><?php echo Yii::$app->params['system_name'] ?> - <?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
   <link rel = "shortcut icon" href = "<?php echo Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/fav.png"/>
   <!-- General CSS -->
   <link href = "<?php echo Yii::$app->request->baseUrl; ?>/common/assets/css/general.css" rel = 'stylesheet' type = 'text/css'/>
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

   <!-- Fonts CSS -->

   <link href = 'http://fonts.googleapis.com/css?family=Oswald:300,400,500|Arimo:400,500,600' rel = 'stylesheet' type = 'text/css'/>
   <link rel = "stylesheet" href = "//cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css">
   <link href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel = "stylesheet" integrity = "sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin = "anonymous">
   <!--   https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css-->

   <!--   <link href="--><?php //echo Yii::$app->request->baseUrl; ?><!--/common/assets/css/general.css" rel='stylesheet' type='text/css'/>-->

   <!-- Font Awesome Icons -->
   <!--   <link href="--><?php //echo Yii::$app->request->baseUrl; ?><!--/assets/css/font-awesome.min.css" rel='stylesheet' type='text/css'/>-->
   <!--   <link href="--><?php //echo Yii::$app->request->baseUrl; ?><!--/common/assets/fonts/flaticon/flaticon.css" rel='stylesheet' type='text/css'/>-->
   <!-- Bootstrap core CSS -->
   <!--    <link href = "--><?php //echo Yii::$app->request->baseUrl; ?><!--/assets/css/bootstrap.min.css" rel = "stylesheet"/>-->

   <link href = "<?php echo Yii::$app->request->baseUrl; ?>/common/assets/js/jquery-ui/jquery-ui.min.css" rel = "stylesheet"/>
   <link href = "<?php echo Yii::$app->request->baseUrl; ?>/common/assets/vendor/bootstrap4/css/bootstrap.min.css" rel = "stylesheet"/>
   <!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->

   <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/hover-dropdown-menu.css" rel = "stylesheet"/>
   <!-- Icomoon Icons -->
   <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/icons.css" rel = "stylesheet"/>

   <!-- Select2 -->
   <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/select2/css/select2.min.css" rel = "stylesheet"/>

   <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/jquery-ui/jquery-ui.min.css" rel = "stylesheet"/>

   <!-- Alertify -->
   <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/alertify/css/alertify.css" rel = "stylesheet"/>
   <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/alertify/css/themes/bootstrap.css" rel = "stylesheet"/>

   <!-- Animations -->
   <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/animate.min.css" rel = "stylesheet"/>

   <!-- Owl Carousel Slider -->
   <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/owl/owl.carousel.css" rel = "stylesheet"/>
   <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/owl/owl.theme.css" rel = "stylesheet"/>
   <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/owl/owl.transitions.css" rel = "stylesheet"/>
   <!-- PrettyPhoto Popup -->
   <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/prettyPhoto.css" rel = "stylesheet"/>
   <!-- Custom Style -->
   <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/style.css" rel = "stylesheet"/>
   <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/responsive.css" rel = "stylesheet">
   <!-- Color Scheme -->
   <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/color.css" rel = "stylesheet"/>

   <!-- Overrides -->
   <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/aside-modal.css" rel = "stylesheet"/>
   <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/overrides.css" rel = "stylesheet"/>
   <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/overrides-responsive.css" rel = "stylesheet"/>
    <?php if (Yii::$app->controller->id = 'site' && Yii::$app->controller->action->id = 'index'): ?>

    <?php endif; ?>
   <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// --><!--[if lt IE 9]>
   <script src = "https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
   <script src = "https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
<!--   <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>-->
   <script type = "text/javascript" src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/jquery3/jquery.js"></script>

   <script>
      var baseUrl = '<?php echo Yii::$app->request->baseUrl; ?>';
      var flash = '';


      var range_min = 100;
      var range_max = 500;
      var currency = "<?= Yii::$app->params['currency'] ?>";

   </script>
</head>
<body>
<?php $this->beginBody() ?>
<div id = "page">
   <div id = "pageloader">
      <div class = "loader-item fa fa-spin text-color"></div>
   </div>

   <header id = "sticker" class = "sticky-navigation site-header header-01">


      <nav class = "navbar navbar-expand-lg navbar-light ">
         <div class = "container">
            <a href = "<?php echo Yii::$app->request->baseUrl; ?>/" class = "navbar-brand">
               <img class = "site_logo" alt = "Site Logo" width = "190" height = "86" src = "<?php echo Yii::$app->request->baseUrl . Yii::$app->params['image_path']['uploads']; ?>logo.png"/>
            </a>
            <button class = "navbar-toggler" type = "button" data-toggle = "collapse" data-target = "#navbarSupportedContent" aria-controls = "navbarSupportedContent" aria-expanded = "false" aria-label = "Toggle navigation">
               <span class = "navbar-toggler-icon"></span>
            </button>

            <div class = "collapse navbar-collapse" id = "navbarSupportedContent">
               <ul class = "navbar-nav ml-auto">
                  <li class = "nav-item">
                     <a href = "<?= Yii::$app->request->baseUrl; ?>/">Home</a>
                  </li>
                  <li class = "nav-item">
                     <a href = "<?= Yii::$app->request->baseUrl; ?>/site/about">About</a>
                  </li>
                  <li class = "nav-item">
                     <a href = "<?= Yii::$app->request->baseUrl; ?>/blog">Blog</a>
                  </li>
                  <li class = "nav-item">
                     <a href = "<?= Yii::$app->request->baseUrl; ?>/news">News</a>
                  </li>

                  <li class = "nav-item">
                     <a href = "<?= Yii::$app->request->baseUrl; ?>/site/careers">Careers</a>
                  </li>

                  <li class = "nav-item">
                     <a href = "<?= Yii::$app->request->baseUrl; ?>/site/contact">Contact</a>
                  </li>
                  <li id = "bookID" class = "nav-item">
                     <a class = "dropdown-toggle" onclick = "openSearch()" data-toggle = "collapse" href = "#collapseExample" role = "button" aria-expanded = "false" aria-controls = "collapseExample">
                        My Ticket
                     </a>
                  </li>


                  <!--   <li class = "nav-item dropdown">
                     <a class = "nav-link dropdown-toggle   pt-0 pb-0" href = "#" id = "navbarMoreDropdown" role = "button" data-toggle = "dropdown" aria-haspopup = "true" aria-expanded = "false">
                        My Tickets
                        <span class = "caret"></span>
                     </a>
                     <div class = "dropdown-menu" aria-labelledby = "navbarMoreDropdown">
                        <a class = "dropdown-item" href = "<?= '@frontend' ?>/site/review-vehicle">Review A Vehicle</a>
                        <div class = "dropdown-divider"></div>
                        <a class = "dropdown-item" href = "<?php echo Yii::$app->request->baseUrl; ?>/site/logout/">
                           <i class = "fa fa-power"></i>
                           Logout
                        </a>
                     </div>
                  </li> -->
               </ul>
               <div class = "navbar-right justify-content-stretch" style = "padding-left: 10px;">
                  <ul class = "navbar-nav ml-auto mg-0">
                      <?php if ((Yii::$app->user->isGuest)): ?>
                         <li class = "nav-item">
                            <a href = "javascript:void(0);" class = "highlighted h1" data-toggle = "modal" data-target = "#login-modal">Login/SignUp</a>
                         </li>
                      <?php else: ?>
                         <li class = "nav-item dropdown">

                            <a class = "nav-link dropdown-toggle  pv-0 ln-22 wid-155" href = "#" id = "navbarMoreDropdown" role = "button" data-toggle = "dropdown" aria-haspopup = "true" aria-expanded = "false">
                               <i class="fa fa-user-o" aria-hidden="true"></i>   <?php echo Yii::$app->user->identity->name; ?>
                               <span class = "caret"></span>
                            </a>
                            <div class = "dropdown-menu dp-01" aria-labelledby = "navbarMoreDropdown">
                               <a class = "dropdown-item" href = "<?php echo Yii::$app->request->baseUrl; ?>/dashboard/">Dashboard</a>
                               <div class = "dropdown-divider"></div>
                               <a class = "dropdown-item" href = "<?php echo Yii::$app->request->baseUrl; ?>/site/logout/">
                                  <i class = "fa fa-power"></i>
                                  Logout
                               </a>
                            </div>
                         </li>

                      <?php endif; ?>

                  </ul>

               </div>

            </div>


      </nav>


      <div class = "collapse" id = "collapseExample">

         <div id = "SearchBox" class = "card card-body cd-01">
            <!-- <button type="button" class="close" data-dismiss="card" aria-label="Close">
                          <span aria-hidden="true">×</span>
                       </button> -->
            <section class = "search-sec" role = "search-sec">

               <button type = "button" onclick = "closeSearch()" class = "close cls" data-dismiss = "search-sec" aria-label = "Close">
                  <span aria-hidden = "true">&times;</span>
               </button>
               <div class = "container">

                  <form action = "#" method = "post" novalidate = "novalidate">

                     <div class = "row">
                        <h4 class = "book-you-ticket">Book You Ticket</h4>
                        <div class = "col-lg-12">
                           <div class = "row">
                              <div class = "col-lg-5 col-md-5 col-sm-12 p-0">
                                 <input type = "text" class = "form-control search-slt ticket-search-02" placeholder = "Enter the Ticket ID">
                              </div>
                              <div class = "col-lg-5 col-md-5 col-sm-12 p-0">
                                 <input type = "text" class = "form-control search-slt" placeholder = "Email or Phone number">
                              </div>

                              <div class = "col-lg-2 col-md-2 col-sm-12 p-0">
                                 <button type = "button" class = "btn btn-warning wrn-btn">Search</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </section>
         </div>
      </div>
   </header>


   <!-- new-header -->


   <!-- new-header -->


   <div class = "floating-social-media">
      <div class = "media-icon">
         <i class = "fa fa-chevron-circle-left"></i>
      </div>
      <div class = "media-data">
         <a href = "#">
            <i class = "fa fa-facebook" style = "color: #0d6aad"></i>
         </a>
         <a href = "#">
            <i class = "fa fa-twitter" style = "color: #0c8fbf"></i>
         </a>
         <a href = "#">
            <i class = "fa fa-youtube" style = "color: #bb0000"></i>
         </a>
         <a href = "#">
            <i class = "fa fa-linkedin" style = "color: #007bb5"></i>
         </a>
         <!--  <a class="chat-live"  href = "#">
             <i class="fa fa-comments-o" aria-hidden="true" style = "color: #007bb5"> </i>
              <span class="badge bd-01">3</span>
          </a> -->

      </div>


   </div><!-- Sticky Navbar --><?php echo $content; ?>


   <!-- chat-box -->


   <section class = "page-section no-pad bg-color">
      <div class = "container">
         <div class = "row">
            <div class = "col-md-12 top-pad-20 bottom-pad-20 text-center">
               <h3 class = "text-capitalize inline-block tb-margin-20 black animated fadeInUp visible" data-animation = "fadeInUp">More queries?
                  <span class = "white">How can we help ?</span></h3>
               <div class = "inline-block lr-pad-20">
                  <a href = "<?= Yii::$app->request->baseUrl; ?>/site/contact"" class = "btn btn-transparent-white btn-lg animated fadeInDown visible" data-animation = "fadeInDown">Contact Us</a>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="operatoe-01" >
     <div class="container" >
        <div class="operator" >
         <div class="section-title">
         <!-- Heading -->
         <h2 class="title">Top Operators</h2>
      </div>
        <ul>
          <li><a href=""> YGL Operator </a></li>
          <li><a href=""> YGL Operator </a></li>
          <li><a href=""> YGL Operator </a></li>
          <li><a href=""> YGL Operator </a></li>
          <li><a href=""> YGL Operator </a></li>
          <li><a href=""> YGL Operator </a></li>
          <li><a href=""> YGL Operator </a></li>
          <li><a href=""> YGL Operator </a></li>
          <li><a href=""> YGL Operator </a></li>
          <li><a href=""> YGL Operator </a></li>
          <li><a href=""> YGL Operator </a></li>
          <li><a href=""> YGL Operator </a></li>
          <li><a href=""> YGL Operator </a></li>
          <li><a href=""> YGL Operator </a></li>
          <li><a href=""> YGL Operator </a></li>
          <li><a href=""> YGL Operator </a></li>
          <li><a href=""> YGL Operator </a></li>
          <li><a href=""> YGL Operator </a></li>
          <li><a href=""> YGL Operator </a></li>
          <li><a href=""> YGL Operator </a></li>
          <li><a href=""> YGL Operator </a></li>
         
        </ul>
        
      </div>
       
     </div>
   </section>


   <footer class = "footer">
      <div class = "footer-widget">
         <div class = "container">
            <div class = "row">
               <div class = "col-xs-12 col-sm-6 col-md-4 widget bottom-xs-pad-20">
                  <div class = "widget-title">
                     <!-- Title -->
                     <h3 class = "title">Links</h3>
                  </div>
                  <ul>

                    <li><a href="<?php echo Yii::$app->request->baseUrl; ?>/"> Home </a></li>
                    <li><a href = "<?= Yii::$app->request->baseUrl; ?>/site/about">About</a> </li>
                    <li><a href="<?= Yii::$app->request->baseUrl; ?>/blog/""> Blog</a></li>
                    <li><a href="<?= Yii::$app->request->baseUrl; ?>/news/""> News </a></li>
                    <li><a href="<?= Yii::$app->request->baseUrl; ?>/site/careers""> Carees</a> </li>
                  </ul>
                  <div class="explore-btn-01">
                  <button type="submit" class="btn btn-1">BOOK NOW</button>
               </div>
                  <!-- Text -->
<!--                  <p>-->
<!--                     --><?php
//                     $about = json_decode(Yii::$app->params['settings']['about_us']);
//                     print $about->{'about_us'};
//                     ?>
<!--                  </p> -->

                  <!--    <p>
                        <strong>Office:</strong> ecosanjal.com <br>No. 12, Ribon Building,
                        <br>Chakrapath, Kathmandu, Nepal.
                     </p>

                     <p>
                        <strong>Call Us:</strong> +977 (1) 456-78-90 or <br>+977 (1) 456-78-90
                     </p> -->


               </div>
               <div class = "col-xs-12 col-sm-6 col-md-4 widget">
                  <div class = "widget-title">
                     <!-- Title -->
                     <h3 class = "title">Contact</h3>
                  </div>
                  <p style="font-size: 15px;" >

                     <strong>Office:</strong>
                      <?php
                      $contact = json_decode(Yii::$app->params['settings']['contact']);
                      print $contact[0]->{'office'};
                      ?>
                  </p>
                  <!-- Phone -->
                  <p style="font-size: 15px;">
                     <strong>Call Us:</strong>
                      <?php
                      $contacts = json_decode(Yii::$app->params['settings']['contact']);
                      $c[]= explode(',',$contacts[0]->{'call_us'});
                      foreach ($c as $con => $contact){
                        foreach ($contact as $co){?>
                          <a href="tel:<?php echo $co; ?>"><?php echo $co; ?></a> / 
                        <?php }
                      }
//                      print $contact[0]->{'call_us'};
                      ?>
                  </p>
               </div>
               <div class = "col-xs-12 col-sm-12 col-md-4 widget">
                  <div class = "widget-title">
                     <!-- Title -->
                     <h3 class = "title">Follow Us</h3>
                  </div>
                  <div class = "social-icon margin-top-20 gray-bg icons-circle i-3x">
                     <a href = "<?php  $contact = json_decode(Yii::$app->params['settings']['contact']);
                     if(isset($contact[0]->{'facebook'})){echo $contact[0]->{'facebook'};} ?>">
                        <i class = "fa fa-facebook"></i>
                     </a>
                     <a href = "<?php  $contact = json_decode(Yii::$app->params['settings']['contact']);
                     if(isset($contact[0]->{'twitter'})){echo $contact[0]->{'twitter'};} ?>">
                        <i class = "fa fa-twitter"></i>
                     </a>
                     <a href = "<?php  $contact = json_decode(Yii::$app->params['settings']['contact']);
                     if(isset($contact[0]->{'pinterest'})){echo $contact[0]->{'pinterest'};} ?>">
                        <i class = "fa fa-pinterest"></i>
                     </a>
                     <a href = "<?php  $contact = json_decode(Yii::$app->params['settings']['contact']);
                     if(isset($contact[0]->{'google'})){echo $contact[0]->{'google'};} ?>">
                        <i class = "fa fa-google"></i>
                     </a>
                     <a href = "<?php  $contact = json_decode(Yii::$app->params['settings']['contact']);
                     if(isset($contact[0]->{'linkedin'})){echo $contact[0]->{'linkedin'};} ?>">
                        <i class = "fa fa-linkedin"></i>
                     </a>
                  </div>
                  <p class = "form-message" style = "display: none;"></p>
                  <!-- <div class = "contact-form">
                     <form role = "form" name = "contactform" id = "contactform" method = "post" action = "" class = "bv-form">
                        <button type = "submit" class = "bv-hidden-submit" style = "display: none; width: 0px; height: 0px;"></button>
                      
                        <div class = "input-text form-group has-feedback">
                           <input type = "text" name = "contact_name" class = "input-name form-control" placeholder = "Full Name" data-bv-field = "contact_name">
                           <i class = "form-control-feedback bv-no-label" data-bv-icon-for = "contact_name" style = "display: none;" data-original-title = "" title = ""></i>
                           <small class = "help-block" data-bv-validator = "notEmpty" data-bv-for = "contact_name" data-bv-result = "NOT_VALIDATED" style = "display: none;">Please enter a value
                           </small>
                        </div>
                        
                        <div class = "input-email form-group has-feedback">
                           <input type = "email" name = "contact_email" class = "input-email form-control" placeholder = "Email" data-bv-field = "contact_email">
                           <i class = "form-control-feedback bv-no-label" data-bv-icon-for = "contact_email" style = "display: none;" data-original-title = "" title = ""></i>
                           <small class = "help-block" data-bv-validator = "notEmpty" data-bv-for = "contact_email" data-bv-result = "NOT_VALIDATED" style = "display: none;">Please enter a value
                           </small>
                           <small class = "help-block" data-bv-validator = "emailAddress" data-bv-for = "contact_email" data-bv-result = "NOT_VALIDATED" style = "display: none;">Please enter a valid email address
                           </small>
                        </div>
                       
                        <div class = "textarea-message form-group has-feedback">
                           <textarea name = "contact_message" class = "textarea-message form-control" placeholder = "Message" rows = "3" data-bv-field = "contact_message"></textarea>
                           <i class = "form-control-feedback bv-no-label" data-bv-icon-for = "contact_message" style = "display: none;" data-original-title = "" title = ""></i>
                           <small class = "help-block" data-bv-validator = "notEmpty" data-bv-for = "contact_message" data-bv-result = "NOT_VALIDATED" style = "display: none;">Please enter a value
                           </small>
                        </div>
                        
                        <button class = "btn btn-default" type = "submit">Send Now
                           <i class = "icon-paper-plane"></i>
                        </button>
                     </form>
                  </div> -->
               </div>
            </div>

           

         </div>

        
      </div>
      <!-- <div class="container" >

    
      </div> -->

      <!-- footer-top -->
      <div class = "copyright">
         <div class = "container">
            <div class = "row">
               <!-- Copyrights -->
               <div class = "col-sm-8 col-md-8 col-xs-10 ">
                  <div class = "site-disclaimer">© 2015. We can have a one line disclaimer over here to say something that we need to . Book Your Bus.</div>
                  <!--   <ul class = "footer-menu">
                     <li>
                        <a href = "<?php echo Yii::$app->request->baseUrl; ?>/blog">Blog</a>
                     </li>
                     <li>
                        <a href = "<?php echo Yii::$app->request->baseUrl; ?>/news">News</a>
                     </li>
                     <li>
                        <a href = "<?php echo Yii::$app->request->baseUrl; ?>/site/careers">Careers</a>
                     </li>
                     <li>
                        <a href = "<?php echo Yii::$app->request->baseUrl; ?>/site/terms">Terms of Use</a>
                     </li>
                     <li>
                        <a href = "<?php echo Yii::$app->request->baseUrl; ?>/site/privacy">Privacy Policy</a>
                     </li>
                     <li>
                        <a href = "<?php echo Yii::$app->request->baseUrl; ?>/site/faq">FAQ</a>
                     </li>
                  </ul> -->
               </div>
               <div class = " col-sm-4 col-md-4 col-xs-2 text-right page-scroll gray-bg icons-circle i-3x">
                  <!-- Goto Top -->
                  <a href = "#page" class = "go-to-top">
                     <i class = "glyphicon glyphicon-arrow-up"></i>
                  </a>
               </div>
            </div>
         </div>
      </div>
      <!-- footer-bottom -->
   </footer>
</div>
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="112574783618737"
     theme_color="#44bec7"
     logged_in_greeting="Hello!!! How can I help?"
     logged_out_greeting="Hello!!! How can I help?">
</div>
<!--   <button class="open-button" onclick="openForm()">Chat</button> -->

<!-- <div class="chat-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
   <div class="panel-body">
                    <ul class="chat">
                        <li class="left clearfix"><span class="chat-img pull-left">
                             <img class="img-circle" src="/smartbus/assets/images/sections/blog/1.jpg" width="80" height="80" alt="">
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix"><span class="chat-img pull-right">
                            <img class="img-circle" src="/smartbus/assets/images/sections/blog/1.jpg" width="80" height="80" alt="">
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>13 mins ago</small>
                                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                            </div>
                        </li>
                        <li class="left clearfix"><span class="chat-img pull-left">
                            <img class="img-circle" src="/smartbus/assets/images/sections/blog/1.jpg" width="80" height="80" alt="">
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span>14 mins ago</small>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix"><span class="chat-img pull-right">
                             <img class="img-circle" src="/smartbus/assets/images/sections/blog/1.jpg" width="80" height="80" alt="">
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>15 mins ago</small>
                                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="btn-chat">
                                Send</button>
                        </span>
                    </div>
                </div>

    <button type="submit" class="btn">Send</button> 
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form> -->
<!--<div id = "live-chat">-->
<!---->
<!--   <header class = "clearfix">-->
<!---->
<!--      <a href = "#" class = "chat-close">x</a>-->
<!---->
<!--      <h4>Mehmet Mert</h4>-->
<!---->
<!--      <span class = "chat-message-counter">3</span>-->
<!---->
<!--   </header>-->
<!---->
<!--   <div class = "chat" style="display: none;">-->
<!---->
<!--      <div class = "chat-history">-->
<!---->
<!--         <div class = "chat-message clearfix">-->
<!---->
<!--            <img src = "/smartbus/assets/images/sections/blog/1.jpg" alt = "" width = "32" height = "32">-->
<!---->
<!--            <div class = "chat-message-content clearfix">-->
<!---->
<!--               <span class = "chat-time">13:35</span>-->
<!---->
<!--               <h5>John Doe</h5>-->
<!---->
<!--               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, explicabo quasi ratione odio dolorum harum.</p>-->
<!---->
<!--            </div>  end chat-message-content-->
<!---->
<!--         </div> end chat-message -->
<!---->
<!--         <hr>-->
<!---->
<!--         <div class = "chat-message clearfix">-->
<!---->
<!--            <img src = "/smartbus/assets/images/sections/blog/1.jpg" alt = "" width = "32" height = "32">-->
<!---->
<!--            <div class = "chat-message-content clearfix">-->
<!---->
<!--               <span class = "chat-time">13:37</span>-->
<!---->
<!--               <h5>Marco Biedermann</h5>-->
<!---->
<!--               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, nulla accusamus magni vel debitis numquam qui tempora rem voluptatem delectus!</p>-->
<!---->
<!--            </div>  end chat-message-content -->
<!---->
<!--         </div>  end chat-message -->
<!---->
<!--         <hr>-->
<!---->
<!--         <div class = "chat-message clearfix">-->
<!---->
<!--            <img src = "/smartbus/assets/images/sections/blog/1.jpg" alt = "" width = "32" height = "32">-->
<!---->
<!--            <div class = "chat-message-content clearfix">-->
<!---->
<!--               <span class = "chat-time">13:38</span>-->
<!---->
<!--               <h5>John Doe</h5>-->
<!---->
<!--               <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>-->
<!---->
<!--            </div>  end chat-message-content -->
<!---->
<!--         </div> end chat-message -->
<!---->
<!--         <hr>-->
<!---->
<!--      </div>end chat-history -->
<!---->
<!---->
<!--      <form action = "#" method = "post">-->
<!---->
<!--         <div class = "panel-footer">-->
<!--            <div class = "input-group">-->
<!--               <input id = "btn-input" type = "text" class = "form-control input-sm chat_input" placeholder = "Write your message here...">-->
<!--               <span class = "input-group-btn">-->
<!--                        <button class = "btn btn-primary btn-sm" id = "btn-chat">Send</button>-->
<!--                        </span>-->
<!--            </div>-->
<!--         </div>-->
<!---->
<!--      </form>-->
<!---->
<!--   </div>  end chat -->
<!---->
<!--</div>-->


<script type = "text/javascript">
   (function () {

      $('#live-chat header').on('click', function () {

         $('.chat').slideToggle(300, 'swing');
         $('.chat-message-counter').fadeToggle(300, 'swing');

      });

      $('.chat-close').on('click', function (e) {

         e.preventDefault();
         $('#live-chat').fadeOut(300);

      });

   })();
</script>


</div>

<script type = "text/javascript">

   function openForm() {
      document.getElementById("myForm").style.display = "block";
   }

   function closeForm() {
      document.getElementById("myForm").style.display = "none";
   }
</script>
<script type = "text/javascript">

   function openSearch() {
      document.getElementById("SearchBox").style.display = "block";
   }

   function closeSearch() {
      document.getElementById("SearchBox").style.display = "none";
   }
</script>


<div class = "modal right fade login-modal" id = "login-modal" tabindex = "-1" role = "dialog" aria-labelledby = "login-modal">
   <div class = "modal-dialog" role = "document">
      <div class = "modal-content">
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
               <span aria-hidden = "true">&times;</span>
            </button>
            <div class = "modal-title" id = "login-modal">Login</div>
         </div>

         <div class = "modal-body">
            <div class = "social-media-login">
               <div class = "social-login-title">
                  Login / Sign up
               </div>
               <div class = "social-buttons">
                   <?= \yii\authclient\widgets\AuthChoice::widget([
                                                                          'baseAuthUrl' => ['site/auth'],
                                                                          'popupMode'   => true,
                                                                  ]) ?>
                  <!--
                  <a href="#" class="btn btn-fb">
                     <i class="fa fa-facebook"></i>
                  </a>
                  <a href="#" class="btn btn-tw">
                     <i class="fa fa-twitter"></i>
                  </a>
                  <a href="#" class="btn btn-gp">
                     <i class="fa fa-google-plus"></i>
                  </a>
                  -->
               </div>
            </div>
            <div class = "form-login">
               <form method = "post" action = "<?php echo Yii::$app->request->baseUrl; ?>/site/login/" id = "login-form">
                  <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
                  <div class = "form-group">
                     <label class = "sr-only required" for = "login-email">Email address</label>
                     <input name = "LoginForm[username]" type = "email" class = "form-control required" autocomplete = "off" id = "login-email" placeholder = "Email address" required>
                  </div>
                  <div class = "form-group">
                     <label class = "sr-only required" for = "login-password">Password</label>
                     <input name = "LoginForm[password]" type = "password" class = "form-control required" id = "login-password" placeholder = "Password" autocomplete = "off" required>
                  </div>
                  <div class = "form-group">
                     <div class = "help-block">
                        <a class = "pull-left" href = "<?=  Yii::$app->request->baseUrl; ?>/site/reset-password/">Forgot Password ?</a>
                        <button type = "submit" class = "btn btn-primary pull-right">Login</button>
                        <div class = "clearfix"></div>
                     </div>
                  </div>
               </form>
            </div>

            <div class = "sign-up text-center">
               <form enctype = "multipart/form-data" method = "post" class = "register-form" id = "signup-form" action="<?php echo Yii::$app->request->baseUrl; ?>/register/insert/">
                  <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
                  <input type="hidden" name="role" value="5">
                  <p class = "title">Don't have an Account?</p>
                  <h6 class = "title"> Register Now.</h6>
                  <div id = "success"></div>
                  <input type = "email" placeholder = "Email *" name = "email" class = "form-control bg-white" data-bv-field = "email">
                  <i class = "form-control-feedback bv-no-label" data-bv-icon-for = "email" style = "display: none;" data-original-title = "" title = ""></i>
                  <input type = "text" placeholder = "Phone *" name = "phone" class = "form-control bg-white">
<!--                  <input type = "password" class = "form-control bg-white" id = "password" name="password" placeholder = "Password *">-->
                  <div class = "clearfix"></div>
                  <div class = "buttons-box clearfix">
                     <button class = "btn full btn-black" id = "submit">Register Now</button>
                  </div>
                  <hr>
                  <div class = "login-footer">
                     <h4>Are You a <span> Bus Woner</span></h4>

                     <a href = "#" class = "btn btn-primary btn-lg" data-toggle = "modal" data-target = "#login-modal">Register Your Vechical</a>

                  </div>
               </form>

            </div>

         </div>
      </div><!-- modal-content -->
   </div><!-- modal-dialog -->
</div><!-- modal -->
<!-- jQuery -->
<div id="fb-root"></div>
<script>
   window.fbAsyncInit = function() {
      FB.init({
         xfbml            : true,
         version          : 'v6.0'
      });
   };

   (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->

<script type = "text/javascript" src = "<?php echo Yii::$app->request->baseUrl; ?>/common/assets/vendor/bootstrap4/js/bootstrap.min.js"></script>


<!-- <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity = "sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin = "anonymous"></script> -->


<!-- Scripts -->
<script>
   /* ==== CSRF TOKEN ==== */

   $.ajaxSetup({
      data: {
         _csrf: $('meta[name="csrf-token"]').prop('content')
      }
   });
</script>
<?php // \common\components\Misc::setFlash('danger', 'sadfasdfas');
if (Yii::$app->session->hasFlash('flash')): ?>
   <script>
      var flash = <?php echo Yii::$app->session->getFlash('flash'); ?>;
   </script>
<?php endif; ?>

<script>
   var settings = <?= json_encode(Yii::$app->params['settings']) ?>;
</script>
<!-- Menu jQuery plugin -->
<!--    <script type = "text/javascript" src = "--><?php //echo Yii::$app->request->baseUrl; ?><!--/assets/js/hover-dropdown-menu.js"></script>-->

<!-- Menu jQuery Bootstrap Addon -->
<!--    <script type = "text/javascript" src = "--><?php //echo Yii::$app->request->baseUrl; ?><!--/assets/js/jquery.hover-dropdown-menu-addon.js"></script>-->

<!-- Scroll Top Menu -->
<script type = "text/javascript" src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/jquery.easing.1.3.js"></script>

<!-- Sticky Menu -->
<script type = "text/javascript" src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/jquery.sticky.js"></script>

<!-- Bootstrap Validation -->
<script type = "text/javascript" src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/bootstrapValidator.min.js"></script>


<!-- Jquery Validation -->
<script type = "text/javascript" src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/jquery-validate/jquery.validate.min.js"></script>
<script type = "text/javascript" src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/jquery-validate/additional-methods.min.js"></script>
<script type = "text/javascript" src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/form-validation-rules.js"></script>

<!--  Moments JS -->
<script type = "text/javascript" src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/moment/moment.js"></script>

<!--  Bootstrap min-js Picker -->
<!-- <script type = "text/javascript" src = "<?php echo Yii::$app->request->baseUrl; ?>/common/assets/vendor/bootstrap4/css/bootstrap.min.js"></script> -->
<!--<script type="text/javascript"-->
<!--        src="--><?php //echo Yii::$app->request->baseUrl; ?><!--/assets/js/bootstrap-datetimepicker.min.js"></script>-->
<script type = "text/javascript" src = "<?php echo Yii::$app->request->baseUrl; ?>/common/assets/js/jquery-ui/jquery-ui.min.js"></script>
<!-- Alertify -->
<script type = "text/javascript" src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/alertify/alertify.min.js"></script>

<!-- Select 2 -->
<script type = "text/javascript" src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/select2/js/select2.full.min.js"></script>

<!-- Portfolio Filter -->
<!--    <script type = "text/javascript" src = "--><?php //echo Yii::$app->request->baseUrl; ?><!--/assets/js/jquery.mixitup.min.js"></script>-->

<!-- Animations -->
<script type = "text/javascript" src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/jquery.appear.js"></script>
<script type = "text/javascript" src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/effect.js"></script>

<script type = "text/javascript" src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!--    <script type = "text/javascript" src = "--><?php //echo Yii::$app->request->baseUrl; ?><!--/assets/plugins/typeahead/dist/bloodhound.min.js"></script>-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Owl Carousel Slider -->

<script type = "text/javascript" src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/owl.carousel.min.js"></script><!-- Pretty Photo Popup -->

<!--    <script type = "text/javascript" src = "--><?php //echo Yii::$app->request->baseUrl; ?><!--/assets/js/jquery.prettyPhoto.js"></script><!-- Parallax BG -->

<script type = "text/javascript" src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/jquery.parallax-1.1.3.js"></script><!-- Fun Factor / Counter -->

<script type = "text/javascript" src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/jquery.countTo.js"></script>
<script type = "text/javascript" src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/jquery.mb.YTPlayer.js"></script><!-- Custom Js Code --><!-- Google Map -->


<script type = "text/javascript" src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/init-all.js"></script>
<script type = "text/javascript" src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/custom.js"></script>
<!-- Load Facebook SDK for JavaScript -->

<?php if (Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id = 'index'): ?>

<?php endif; ?>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
