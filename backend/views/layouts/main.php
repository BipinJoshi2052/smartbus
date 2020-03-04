<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang = "<?php echo Yii::$app->language ?>">
<head>
   <meta charset = "<?php echo Yii::$app->charset ?>">
   <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
   <meta name = "viewport" content = "width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <?php $this->registerCsrfMetaTags() ?>
   <title><?php echo Yii::$app->params['system_name'] ?> - <?php echo Html::encode($this->title) ?></title>
   <link rel = "shortcut icon" href = "<?php echo Yii::$app->request->baseUrl ?>/../common/assets/images/uploads/fav.png">
   <link href = "https://fonts.googleapis.com/css?family=Poppins:400,500,600" rel = "stylesheet">
   <link href = "<?php echo Yii::$app->request->baseUrl; ?>/../common/assets/css/general.css" rel = "stylesheet">
   <!-- Bootstrap Core CSS -->
   <link href = "<?php echo Yii::$app->request->baseUrl; ?>/../common/assets/vendor/bootstrap4/css/bootstrap.min.css" rel = "stylesheet">
   <link rel = "stylesheet" href = "https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity = "sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin = "anonymous">
   <link rel = "stylesheet" href = "//cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css">

   <!-- All Form Addon CSS -->
   <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/form-addon.css" rel = "stylesheet">

   <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/spinners.css" rel = "stylesheet">
   <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/animate.css" rel = "stylesheet">


   <!-- summernotes CSS -->
   <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/summernote/dist/summernote.css" rel = "stylesheet"/>

   <!-- Jquery UI CSS -->
   <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel = "stylesheet"/>

   <!-- Custom CSS -->
   <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/style.css" rel = "stylesheet">

   <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/overrides.css" rel = "stylesheet">

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// --><!--[if lt IE 9]>
   <script src = "https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src = "https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
   <!-- ============================================================== -->
   <!-- All Jquery -->
   <!-- ============================================================== -->

   <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/jquery/jquery.min.js"></script>
   <script>
      var baseUrl = "<?php echo Yii::$app->request->baseUrl; ?>";
      var flash = "";
   </script>
    <?php if (Yii::$app->session->hasFlash('flash')) { ?>
       <script>
          flash = <?php echo Yii::$app->session->getFlash('flash'); ?>;
       </script>
    <?php } ?>
    <?php $this->head() ?>
</head>
<body class = "fix-header fix-sidebar card-no-border">
<?php $this->beginBody() ?>
<!--[if lt IE 8]>
<p class = "browserupgrade">You are using an <strong>outdated</strong> browser. Please
   <a href = "http//browsehappy.com/">upgrade your browser</a>
   to improve your experience.
</p><![endif]-->

<div class = "preloader">
   <svg class = "circular" viewBox = "25 25 50 50">
      <circle class = "path" cx = "50" cy = "50" r = "20" fill = "none" stroke-width = "2" stroke-miterlimit = "10"/>
   </svg>
</div>
<div id = "main-wrapper">

   <header class = "topbar">
      <nav class = "navbar top-navbar navbar-expand-md navbar-light">
         <!-- ============================================================== -->
         <!-- Logo -->
         <!-- ============================================================== -->
         <div class = "navbar-header">
            <a class = "navbar-brand d-block" href = "<?php echo Yii::$app->request->baseUrl; ?>">
               <img src = "<?php echo Yii::$app->request->baseUrl ?>/../common/assets/images/uploads/logo.png" alt = "homepage" class = ""/>

            </a>
         </div>
         <!-- ============================================================== -->
         <!-- End Logo -->
         <!-- ============================================================== -->
         <div class = "navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class = "navbar-nav mr-auto mt-md-0">
               <!-- This is  -->
               <li class = "nav-item">
                  <a class = "nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href = "javascript:void(0)">
                     <i class = "mdi mdi-menu"></i>
                  </a>
               </li>
               <li class = "nav-item">
                  <a class = "nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href = "javascript:void(0)">
                     <i class = "mdi mdi-menu"></i>
                  </a>
               </li>
               <!-- ============================================================== -->
            </ul>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class = "navbar-nav my-lg-0">
               <!-- ============================================================== -->
               <!-- Profile -->
               <!-- ============================================================== -->
               <li class = "nav-item dropdown">
                  <a class = "nav-link dropdown-toggle text-muted waves-effect waves-dark" href = "#" data-toggle = "dropdown" aria-haspopup = "true" aria-expanded = "false">
                     <div class = "img-responsive img-rounded profile-pic">
                         <?php if (Yii::$app->user->identity->image != '') : ?>
                            <img class = "img-responsive img-circle" src = "<?php echo Yii::$app->request->baseUrl; ?>/../common/assets/images/uploads/<?php echo Yii::$app->user->identity->image ?>" alt = "user" class = "">
                         <?php else: ?>
                            <img class = "img-responsive img-circle" src = "<?php echo Yii::$app->request->baseUrl; ?>/../common/assets/images/uploads/profile-pic.png" alt = "user" class = "">
                         <?php endif; ?>
                     </div>
                  </a>

                  <div class = "dropdown-menu mailbox dropdown-menu-right scale-up">
                     <ul class = "dropdown-user">
                        <li>
                           <div class = "dw-user-box">
                              <div class = "u-text">
                                 <h5 class = "m-0"><?php echo ucwords(Yii::$app->user->identity->name) ?></h5>
                                 <p class = "text-muted"><?php echo Yii::$app->user->identity->email ?></p>
                              </div>
                           </div>
                        </li>
                        <li role = "separator" class = "divider"></li>
                        <li><a class = "with-icon" href = "<?php echo Yii::$app->request->baseUrl; ?>"><i class = "mdi mdi-drag"></i> Dashboard</a></li>
                        <li><a class = "with-icon" href = "<?php echo Yii::$app->request->baseUrl; ?>"><i class = "mdi mdi-account"></i> Profile</a></li>
                        <li><a class = "with-icon" href = "<?php echo Yii::$app->request->baseUrl; ?>"><i class = "mdi mdi-wallet"></i> Transactions</a></li>
                        <li><a class = "with-icon" href = "<?php echo Yii::$app->request->baseUrl; ?>"><i class = "mdi mdi-mailbox"></i> Inbox</a></li>
                        <li role = "separator" class = "divider"></li>
                        <li><a class = "with-icon" href = "#"><i class = "fa fa-power-off"></i> Logout</a></li>
                     </ul>
                  </div>

               </li>


               <li class = "nav-item dropdown message-bar">
                  <a class = "nav-link dropdown-toggle text-muted waves-effect waves-dark" href = "javascript:void(0);" id = "2" data-toggle = "dropdown" aria-haspopup = "true" aria-expanded = "false"> <i class = "mdi mdi-email"></i>
                     <?php  
                     if(Yii::$app->params['count_messages']['count_unseen'] > 0) {
                     ?>
                     <div class = "new-notify"><span>
                           <?php
                              echo Yii::$app->params['count_messages']['count_unseen'];
                           ?>
                        </span></div>
                     <?php }?>

                  </a>
                  <div class = "dropdown-menu mailbox dropdown-menu-right scale-up" aria-labelledby = "2">
                     <ul>
                        <li>
                           <div class = "drop-title new-mess" data-id="<?php echo Yii::$app->params['count_messages']['count_unseen']; ?>">You have <?php echo Yii::$app->params['count_messages']['count_unseen']; ?> new messages</div>
                        </li>
                        <li>
                           <div class = "message-center">
                              <!-- Message -->
                               <?php foreach(Yii::$app->params['messages'] as $c => $messages) : ?>
                                  <a href = "javascript:void(0);" data-id = "<?php echo $messages['id'] ?>" class = "noti-mess show-message">
                                     <div class = "mail-content view-message">
                                        <h5>
                                                <?php echo $messages['name']; ?>
                                        </h5>
                                        <div class = "mail-desc"><?php echo substr($messages['message'],'0','90') ?>...</div>
                                        <div class = "time text-sm text-muted text-right"><i class = "mdi mdi-clock-outline"></i>
                                           <?php
                                           $date = $messages['created_on'];
                                           $splitTimeStamp = explode(" ", $date);
                                           $date = $splitTimeStamp[0];
                                           $time = $splitTimeStamp[1];

                                           $splitDate = explode("-", $date);
                                           $year = $splitDate[0];
                                           $month = $splitDate[1];
                                           $day = $splitDate[2];

                                           $dateObj = DateTime::createFromFormat('!m', $month);
                                           $monthName = $dateObj->format('M');

                                           echo $day.' '.$monthName.' '.$year.' at '.$time;
                                           ?>
                                        </div>
                                     </div>
                                  </a>
                               <?php endforeach; ?>
                           </div>
                        </li>
                        <li>
                           <a class = "nav-link text-center" href = "<?php echo Yii::$app->request->baseUrl; ?>/messages/"> <strong>See all Messages</strong> <i class = "fa fa-angle-right"></i> </a>
                        </li>
                     </ul>
                  </div>
               </li>

               <li class = "nav-item">
                  <a class = "nav-link waves-effect waves-dark" href = "<?php echo Yii::$app->request->baseUrl; ?>/site/logout">
                     <i class = "mdi mdi-power"></i>
                  </a>
               </li>
            </ul>
         </div>
      </nav>
   </header>

   <aside class = "left-sidebar">
      <!-- Sidebar scroll-->
      <!--       --><?php //echo $this->render('menu'); ?>
      <div class = "scroll-sidebar">
         <!-- Sidebar navigation-->
         <nav class = "sidebar-nav">
            <ul id = "sidebarnav">
               <!-- SAMPLE //// -->
               <li class = "d_none"><a class = "has-arrow waves-effect waves-dark" href = "javascript:void(0);" aria-expanded = "false"><i class = "mdi mdi-arrange-send-backward"></i><span class = "hide-menu">Multi level dd</span></a>
                  <ul aria-expanded = "false" class = "collapse">
                     <li><a href = "javascript:void(0);">item 1.1</a></li>
                     <li><a href = "javascript:void(0);">item 1.2</a></li>
                     <li><a class = "has-arrow" href = "javascript:void(0);" aria-expanded = "false">Menu 1.3</a>
                        <ul aria-expanded = "false" class = "collapse">
                           <li><a href = "javascript:void(0);">item 1.3.1</a></li>
                           <li><a href = "javascript:void(0);">item 1.3.2</a></li>
                           <li><a href = "javascript:void(0);">item 1.3.3</a></li>
                           <li><a href = "javascript:void(0);">item 1.3.4</a></li>
                        </ul>
                     </li>
                     <li><a href = "javascript:void(0);">item 1.4</a></li>
                  </ul>
               </li>
               <!-- //// SAMPLE -->


               <li class = "<?php echo (Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index') ? 'active' : '' ?>">
                  <a class = "waves-effect waves-dark" href = "<?php echo Yii::$app->request->baseUrl; ?>/" aria-expanded = "false">
                     <i class = "mdi mdi-drag"></i>
                     <span class = "hide-menu">Dashboard</span></a>
               </li>


               <li class = "nav-divider"></li>

               <!--               <li class="--><?php //echo (Yii::$app->controller->id == 'pos' && Yii::$app->controller->action->id == 'index') ? 'active' : '' ?><!--">-->
               <!--                  <a class="waves-effect waves-dark" href="--><?php //echo Yii::$app->request->baseUrl; ?><!--/pos" aria-expanded="false">-->
               <!--                     <i class="mdi mdi-cash-multiple"></i>-->
               <!--                     <span class="hide-menu">Sales Counter</span></a>-->
               <!--               </li>-->
               <!--               <li class="nav-divider"></li>-->
               <li class = "nav-small-cap">Career Management</li>
               <li>
                  <a class = "waves-effect waves-dark" href = "<?php echo Yii::$app->request->baseUrl; ?>/careers/view-applicants" aria-expanded = "false">
                     <i class = "mdi mdi-file-document"></i>
                     <span class = "hide-menu">View Applications
                         <?php
                         if(Yii::$app->params['count_application'] > 0) {
                         ?>
                     <span class="new-notify">
                           <?php
                           echo Yii::$app->params['count_application'];
                           ?>
                        </span>
                        <?php } else { ?>
                            <div class = "new-notify" style="background-color: red"><span>
                           <?php
                           echo Yii::$app->params['count_application'];
                           ?>
                        </span></div>
                         <?php } ?>
                     </span>
                  </a>
               </li>
               <li>
                  <a class = "waves-effect waves-dark" href = "<?php echo Yii::$app->request->baseUrl; ?>/careers/" aria-expanded = "false">
                     <i class = "mdi mdi-wallet-giftcard"></i>
                     <span class = "hide-menu">Vacancies </span>
                  </a>
               </li>
               <li class = "nav-divider"></li>
               <li class = "nav-small-cap">Messages Management</li>
               <li>
                  <a class = "waves-effect waves-dark" href = "<?php echo Yii::$app->request->baseUrl; ?>/messages/" aria-expanded = "false">
                     <i class = "mdi mdi-wallet-giftcard"></i>
                     <span class = "hide-menu">View Messages
                        <?php
                        if(Yii::$app->params['count_messages']['count_unseen'] > 0) {
                            ?>
                           <div class = "new-notify"><span>
                           <?php
                           echo Yii::$app->params['count_messages']['count_unseen'];
                           ?>
                        </span></div>
                            <?php
                        } else { ?>
                          <div class = "new-notify" style="background-color: red"><span>
                           <?php
                           echo Yii::$app->params['count_messages']['count_unseen'];
                           ?>
                        </span></div>
                        <?php } ?>
                     </span>
                  </a>
               </li>
               <li class = "nav-divider"></li>
               <li class = "nav-small-cap">Advertisement Management</li>
               <li>
                  <a class = "waves-effect waves-dark" href = "<?php echo Yii::$app->request->baseUrl; ?>/advertisement/" aria-expanded = "false">
                     <i class = "mdi mdi-wallet-giftcard"></i>
                     <span class = "hide-menu">View Advertisements </span>
                  </a>
               </li>
               <li class = "nav-divider"></li>
               <li class = "nav-small-cap">Verify Management</li>
               <li>
                  <a class = "waves-effect waves-dark" href = "<?php echo Yii::$app->request->baseUrl; ?>/verify/action" aria-expanded = "false">
                     <i class = "mdi mdi-arrange-send-backward"></i>
                     <span class = "hide-menu">Verify Action</span>
                  </a>
               </li>
               <li>
                  <a class = "waves-effect waves-dark" href = "<?php echo Yii::$app->request->baseUrl; ?>/verify/comments" aria-expanded = "false">
                     <i class = "mdi mdi-comment"></i>
                     <span class = "hide-menu">Verify Comments</span>
                  </a>
               </li>
               <li class = "nav-divider"></li>

               <li class = "nav-small-cap">Miscellaneous</li>
               <li><a href = "<?php echo Yii::$app->request->baseUrl; ?>/amenities"> <i class = "mdi mdi-arrange-send-backward"></i><span class = "hide-menu">Amenities</span></a></li>
               <li><a href = "<?php echo Yii::$app->request->baseUrl; ?>/locations"> <i class = "mdi mdi-map-marker"></i><span class = "hide-menu">Locations</span></a></li>
               <li><a href = "<?php echo Yii::$app->request->baseUrl; ?>/vehicles/types"> <i class = "mdi mdi-arrange-send-backward"></i><span class = "hide-menu">Vehicle Types</span></a></li>

               <li class = "nav-divider"></li>
               <li class = "nav-small-cap">Blog Management</li>
               <li>
                  <a class = "waves-effect waves-dark" href = "<?php echo Yii::$app->request->baseUrl; ?>/blog" aria-expanded = "false">
                     <i class = "mdi mdi-arrange-send-backward"></i>
                     <span class = "hide-menu">Blog CRUD</span>
                  </a>
               </li>
               <li>
                  <a class = "waves-effect waves-dark" href = "<?php echo Yii::$app->request->baseUrl; ?>/blog/categories" aria-expanded = "false">
                     <i class = "mdi mdi-arrange-send-backward"></i>
                     <span class = "hide-menu">Blog Category</span>
                  </a>
               </li>
               <li class = "nav-divider"></li>
               <li class = "nav-small-cap">News Management</li>
               <li>
                  <a class = "waves-effect waves-dark" href = "<?php echo Yii::$app->request->baseUrl; ?>/news" aria-expanded = "false">
                     <i class = "mdi mdi-arrange-send-backward"></i>
                     <span class = "hide-menu">News CRUD</span>
                  </a>
               </li>
               <li>
                  <a class = "waves-effect waves-dark" href = "<?php echo Yii::$app->request->baseUrl; ?>/news/categories" aria-expanded = "false">
                     <i class = "mdi mdi-arrange-send-backward"></i>
                     <span class = "hide-menu">News Category</span>
                  </a>
               </li>



               <li class = "nav-divider"></li>
               <li class = "nav-small-cap">Testimonials Management</li>
               <li>
                  <a class = "waves-effect waves-dark" href = "<?php echo Yii::$app->request->baseUrl; ?>/testimonials" aria-expanded = "false">
                     <i class = "mdi mdi-arrange-send-backward"></i>
                     <span class = "hide-menu">Testimonials CRUD</span>
                  </a>
               </li>

               <li class = "nav-divider"></li>
               <li class = "nav-small-cap">Booking Management</li>
               <li>
                  <a class = "has-arrow waves-effect waves-dark" href = "javascript:void(0);" aria-expanded = "false">
                     <i class = "mdi mdi-arrange-send-backward"></i>
                     <span class = "hide-menu">Bookings</span>
                  </a>
                  <ul aria-expanded = "false" class = "collapse">
                     <!--                     <li><a href="--><?php //echo Yii::$app->request->baseUrl; ?><!--/bookings/today">Today</a></li>-->
                     <li><a href = "<?php echo Yii::$app->request->baseUrl; ?>/bookings">All Bookings</a></li>
                     <!--                     <li><a href="--><?php //echo Yii::$app->request->baseUrl; ?><!--/bookings/old">Expired Bookings</a></li>-->
                     <!--                     <li><a href="--><?php //echo Yii::$app->request->baseUrl; ?><!--/bookings/cancelled">Cancelled Bookings</a></li>-->

                  </ul>
               </li>

               <li class = "nav-divider"></li>
               <li class = "nav-small-cap">Schedule Management</li>
               <li><a href = "<?php echo Yii::$app->request->baseUrl; ?>/schedules/create"> <i class = "mdi mdi-plus"></i><span class = "hide-menu">New Schedule</span></a></li>

               <li>
                  <a class = "has-arrow waves-effect waves-dark" href = "javascript:void(0);" aria-expanded = "false">
                     <i class = "mdi mdi-transit-connection-variant"></i>
                     <span class = "hide-menu">Schedules</span>
                  </a>
                  <ul aria-expanded = "false" class = "collapse">
                     <!--                     <li><a href="--><?php //echo Yii::$app->request->baseUrl; ?><!--/schedules/today">Departing Today</a></li>-->
                     <li><a href = "<?php echo Yii::$app->request->baseUrl; ?>/schedules/">All Schedules</a></li>
                     <!--                     <li><a href="--><?php //echo Yii::$app->request->baseUrl; ?><!--/schedules/old">Expired</a></li>-->
                     <!--                     <li><a href="--><?php //echo Yii::$app->request->baseUrl; ?><!--/schedules/cancelled">Cancelled</a></li>-->
                  </ul>
               </li>

               <li class = "nav-divider"></li>
               <li class = "nav-small-cap">Vehicle Management</li>
               <li><a href = "<?php echo Yii::$app->request->baseUrl; ?>/vehicles/create"> <i class = "mdi mdi-plus"></i><span class = "hide-menu">New Vehicle</span></a></li>
               <li>

                  <a class = "has-arrow waves-effect waves-dark" href = "javascript:void(0);" aria-expanded = "false">
                     <i class = "mdi mdi-bus"></i>
                     <span class = "hide-menu">Vehicles</span>
                  </a>
                  <ul aria-expanded = "false" class = "collapse">
                     <li><a href = "<?php echo Yii::$app->request->baseUrl; ?>/vehicles">View all Vehicle</a></li>
                     <li class = "nav-divider"></li>
                  </ul>
               </li>
<!--               <li class = "nav-divider"></li>-->
<!--               <li class = "nav-small-cap">Miscellaneous</li>-->
<!--               <li><a href = "--><?php //echo Yii::$app->request->baseUrl; ?><!--/amenities"> <i class = "mdi mdi-arrange-send-backward"></i><span class = "hide-menu">Amenities</span></a></li>-->
<!--               <li><a href = "--><?php //echo Yii::$app->request->baseUrl; ?><!--/vehicles/types"> <i class = "mdi mdi-arrange-send-backward"></i><span class = "hide-menu">Vehicle Types</span></a></li>-->
<!--               <li><a href = "--><?php //echo Yii::$app->request->baseUrl; ?><!--/locations"> <i class = "mdi mdi-map-marker"></i><span class = "hide-menu">Locations</span></a></li>-->


               <li class = "nav-divider"></li>
               <li class = "nav-small-cap">User Management</li>
               <li>
                  <a class = "has-arrow waves-effect waves-dark" href = "javascript:void(0);" aria-expanded = "false">
                     <i class = "mdi mdi-account-multiple"></i>
                     <span class = "hide-menu">Users</span>
                  </a>
                  <ul aria-expanded = "false" class = "collapse">
                      <?php foreach (Yii::$app->params['role_num'] as $k => $v): ?>
                         <li class = "<?php echo (Yii::$app->controller->id == 'users' && Yii::$app->controller->action->id == $k) ? 'active' : '' ?>">
                            <a class = "waves-effect waves-dark" href = "<?php echo Yii::$app->request->baseUrl; ?>/users/type/<?php echo $k ?>" aria-expanded = "false">
                               <i class = "mdi mdi-album"></i>
                               <span class = "hide-menu"><?php echo ucwords($k) ?>s</span>
                            </a>
                         </li>
                      <?php endforeach; ?>
                  </ul>
               </li>
               <li>
                  <a class = "waves-effect waves-dark" href = "<?php echo Yii::$app->request->baseUrl ?>/permissions" aria-expanded = "false">
                     <i class = "mdi mdi-lock"></i>
                     <span class = "hide-menu">Access Control</span>
                  </a>

               </li>

               <li class = "nav-divider"></li>
               <li <?php echo (Yii::$app->controller->id == 'accounts' && Yii::$app->controller->action->id == 'index') ? 'active' : '' ?>>
                  <a class = "has-arrow waves-effect waves-dark" href = "javascript:void(0);" aria-expanded = "false">
                     <i class = "mdi mdi-calculator-variant"></i>
                     <span class = "hide-menu">Accounts</span>
                  </a>
                  <ul aria-expanded = "false" class = "collapse">
                     <li><a href = "<?php echo Yii::$app->request->baseUrl; ?>/accounts">Overview</a></li>
                     <li>
                        <a class = "has-arrow waves-effect waves-dark" href = "javascript:void(0);" aria-expanded = "false">
                           <span class = "hide-menu">Reports</span>
                        </a>
                        <ul aria-expanded = "false" class = "collapse">
                           <li><a href = "<?php echo Yii::$app->request->baseUrl; ?>/accounts/reports/">Trial Balance</a></li>
                           <li><a href = "<?php echo Yii::$app->request->baseUrl; ?>/accounts/reports/">Cash Flow</a></li>
                           <li><a href = "<?php echo Yii::$app->request->baseUrl; ?>/accounts/reports/">SOCI</a></li>
                           <li><a href = "<?php echo Yii::$app->request->baseUrl; ?>/accounts/reports/">SOFP</a></li>
                           <li><a href = "<?php echo Yii::$app->request->baseUrl; ?>/accounts/reports/">Margin Report</a></li>
                        </ul>
                     </li>

                     <li><a href = "<?php echo Yii::$app->request->baseUrl; ?>/accounts/settings">Settings</a></li>

                  </ul>
               </li>
               <li class = "nav-divider"></li>
               <li class = "nav-small-cap">Website Management</li>

               <li>
                  <a class = "has-arrow waves-effect waves-dark" href = "javascript:void(0);" aria-expanded = "false">
                     <i class = "mdi mdi-arrange-send-backward"></i>
                     <span class = "hide-menu">Content</span>
                  </a>
                  <ul aria-expanded = "false" class = "collapse">
                     <li class = "<?php echo (Yii::$app->controller->id == 'slider' && Yii::$app->controller->action->id == 'index') ? 'active' : '' ?>">
                        <a class = "waves-effect waves-dark" href = "<?php echo Yii::$app->request->baseUrl; ?>/slider/" aria-expanded = "false">
                           <span class = "hide-menu">Slider</span>
                        </a>
                     </li>
                     <li class = "<?php echo (Yii::$app->controller->id == 'explore' && Yii::$app->controller->action->id == 'index') ? 'active' : '' ?>">
                        <a class = "waves-effect waves-dark" href = "<?php echo Yii::$app->request->baseUrl; ?>/explore/" aria-expanded = "false">
                           <span class = "hide-menu">Explore</span>
                        </a>
                     </li>
                     <li class = "<?php echo (Yii::$app->controller->id == 'clients' && Yii::$app->controller->action->id == 'index') ? 'active' : '' ?>">
                        <a class = "waves-effect waves-dark" href = "<?php echo Yii::$app->request->baseUrl; ?>/clients/" aria-expanded = "false">
                           <span class = "hide-menu">Clients</span>
                        </a>
                     </li>
                     <li class = "<?php echo (Yii::$app->controller->id == 'clients' && Yii::$app->controller->action->id == 'index') ? 'active' : '' ?>">
                        <a class = "waves-effect waves-dark" href = "<?php echo Yii::$app->request->baseUrl; ?>/clients/management" aria-expanded = "false">
                           <span class = "hide-menu">Clients Page Management</span>
                        </a>
                     </li>
<!--                     <li class = "--><?php //echo (Yii::$app->controller->id == 'testimonials' && Yii::$app->controller->action->id == 'index') ? 'active' : '' ?><!--">-->
<!--                        <a class = "waves-effect waves-dark" href = "--><?php //echo Yii::$app->request->baseUrl; ?><!--/testimonials/" aria-expanded = "false">-->
<!--                           <span class = "hide-menu">Testimonials</span>-->
<!--                        </a>-->
<!--                     </li>-->
                     <li class = "<?php echo (Yii::$app->controller->id == 'faq' && Yii::$app->controller->action->id == 'index') ? 'active' : '' ?>">
                        <a class = "waves-effect waves-dark" href = "<?php echo Yii::$app->request->baseUrl; ?>/faq/" aria-expanded = "false">
                           <span class = "hide-menu">FAQ</span>
                        </a>
                     </li>
                     <li class = "<?php echo (Yii::$app->controller->id == 'terms' && Yii::$app->controller->action->id == 'index') ? 'active' : '' ?>">
                        <a class = "waves-effect waves-dark" href = "<?php echo Yii::$app->request->baseUrl; ?>/terms/" aria-expanded = "false">
                           <span class = "hide-menu">Terms & Conditions</span>
                        </a>
                     </li>
<!--                     <li class = "--><?php //echo (Yii::$app->controller->id == 'blog' && Yii::$app->controller->action->id == 'index') ? 'active' : '' ?><!--">-->
<!--                        <a class = "waves-effect waves-dark" href = "--><?php //echo Yii::$app->request->baseUrl; ?><!--/blog/" aria-expanded = "false">-->
<!--                           <span class = "hide-menu">Blog</span>-->
<!--                        </a>-->
<!--                     </li>-->
<!--                     <li class = "--><?php //echo (Yii::$app->controller->id == 'blog' && Yii::$app->controller->action->id == 'index') ? 'active' : '' ?><!--">-->
<!--                        <a class = "waves-effect waves-dark" href = "--><?php //echo Yii::$app->request->baseUrl; ?><!--/News/" aria-expanded = "false">-->
<!--                           <span class = "hide-menu">News</span>-->
<!--                        </a>-->
<!--                     </li>-->
                  </ul>
               </li>
               <li>
                  <a class = "has-arrow waves-effect waves-dark" href = "javascript:void(0);" aria-expanded = "false">
                     <i class = "mdi mdi-arrange-send-backward"></i>
                     <span class = "hide-menu">Pages</span>
                  </a>
                  <ul aria-expanded = "false" class = "collapse">
                      <?php foreach (Yii::$app->params['pages'] as $key => $page): ?>
                         <li class = "<?php echo (Yii::$app->controller->id == 'sections' && Yii::$app->controller->action->id == 'pages/' . $key) ? 'active' : '' ?>">
                            <a class = "waves-effect waves-dark" href = "<?php echo Yii::$app->request->baseUrl; ?>/sections/pages/<?php echo $key; ?>" aria-expanded = "false"><?php echo ucwords($key); ?></a>
                         </li>
                      <?php endforeach; ?>
                  </ul>
               </li>

               <li class = "nav-divider"></li>
               <li class = "nav-small-cap">Settings</li>
               <li>
                  <a href = "<?php echo Yii::$app->request->baseUrl; ?>/settings"> <i class = "mdi mdi-settings"></i><span class = "hide-menu">Settings</span></a>
               </li>

            </ul>
         </nav>
         <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->

   </aside>

   <div class = "page-wrapper">
      <!-- Page -->
       <?php echo $content ?>
      <!-- End Page -->

      <!-- ============================================================== -->
      <!-- footer -->
      <!-- ============================================================== -->
      <footer class = "footer">
          <?php echo Yii::$app->params['system_name'] ?>
      </footer>
      <!-- ============================================================== -->
      <!-- End footer -->
      <!-- ============================================================== -->
   </div>
</div>
<div class = "modal" tabindex = "-1" role = "dialog" id = "message-box">
   <div class = "modal-dialog" role = "document">
   </div>
</div>
<!-- CSRF TOKEN -->
<script>
   $.ajaxSetup({
      data: {
         "<?php echo Yii::$app->request->csrfParam; ?>": "<?php echo Yii::$app->request->csrfToken; ?>"
      }
   });
</script>

<script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/plugins.min.js"></script>

<script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/moments/moments.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/../common/assets/vendor/notify/bootstrap-notify.min.js"></script>

<script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/form-plugins.js"></script>
<!--    <script src = "--><?php //echo Yii::$app->request->baseUrl; ?><!--/assets/icons/material-design-iconic-font/material-icons-list-json.json"></script>-->
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/form-validation-rules.js"></script>


<script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/summernote/dist/summernote.min.js"></script>
<!--Custom JavaScript -->
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/base-functions.js"></script>
<?php $this->endBody(); ?>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/main.js"></script>
<script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/custom.js"></script>
<?php if (Yii::$app->session->hasFlash('flash')): ?>
   <script>
      var flash = <?php echo Yii::$app->session->getFlash('flash'); ?>;
      //console.log(flash);
      $.each(flash, function () {
         notify(this.message, this.type);
      });

   </script>
<?php endif; ?>

</body>
</html>
<?php $this->endPage() ?>
