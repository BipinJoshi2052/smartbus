<?php
    $this->title = Yii::$app->params['system_name'] . " | Welcome " . ucwords(Yii::$app->session[Yii::$app->params['user-session']]->name);

    /* $this->registerCssFile(Yii::$app->request->baseUrl . '/assets/plugins/chartist-js/dist/chartist.min.css');
     $this->registerCssFile(Yii::$app->request->baseUrl . '/assets/plugins/chartist-js/dist/chartist-init.css');
     $this->registerCssFile(Yii::$app->request->baseUrl . '/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css');
     $this->registerCssFile(Yii::$app->request->baseUrl . '/assets/plugins/css-chart/css-chart.css" rel="stylesheet');

     $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/chartist-js/dist/chartist.min.js');
     $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js');
     $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js');
     $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/vectormap/jquery-jvectormap-us-aea-en.js');
     $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/dashboard3.js');*/

?>

<!-- Vector CSS -->
<link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel = "stylesheet"/>
<div class = "container-fluid">

    <div class = "row page-titles">
        <div class = "col-md-5 col-8 align-self-center">
            <h3 class = "text-themecolor">Dashboard</h3>

        </div>
        <div class = "col-md-7 col-4 align-self-center">

        </div>
    </div>

    <!-- Row -->
    <div class = "row">
        <div class = "col-lg-3 col-md-6 col-xs-12 ">
            <div class = "card card-body text-center">
                <!-- Row -->
                <div class = "row">
                    <!-- Column -->
                    <div class = "col p-r-0 align-self-center">
                        <div class = "font-light m-b-20 large-round-icon bg-info">
                            <i class = "fa fa-user"></i>
                        </div>
                        <h2 class = "font-light m-b-0">1795</h2>
                        <h6 class = "text-muted">Clients</h6>
                    </div>
                    <!-- Column -->
                </div>
            </div>
        </div>
        <div class = "col-lg-3 col-md-6 col-xs-12 ">
            <div class = "card card-body text-center">
                <!-- Row -->
                <div class = "row">
                    <!-- Column -->
                    <div class = "col p-r-0 align-self-center">
                        <div class = "font-light m-b-20 large-round-icon bg-info">
                            <i class = "fa fa-bus"></i>
                        </div>
                        <h2 class = "font-light m-b-0">1795</h2>
                        <h6 class = "text-muted">Vendors</h6>
                    </div>
                    <!-- Column -->
                </div>
            </div>
        </div>
        <div class = "col-lg-3 col-md-6 col-xs-12 ">
            <div class = "card card-body text-center">
                <!-- Row -->
                <div class = "row">
                    <!-- Column -->
                    <div class = "col p-r-0 align-self-center">
                        <div class = "font-light m-b-20 large-round-icon bg-info">
                            <i class = "fa fa-map-signs"></i>
                        </div>
                        <h2 class = "font-light m-b-0">1795</h2>
                        <h6 class = "text-muted">Routes</h6>
                    </div>
                    <!-- Column -->
                </div>
            </div>
        </div>
        <div class = "col-lg-3 col-md-6 col-xs-12 ">
            <div class = "card card-body text-center">
                <!-- Row -->
                <div class = "row">
                    <!-- Column -->
                    <div class = "col p-r-0 align-self-center">
                        <div class = "font-light m-b-20 large-round-icon bg-info">
                            <i class = "mdi mdi-map-marker"></i>
                        </div>
                        <h2 class = "font-light m-b-0">1795</h2>
                        <h6 class = "text-muted">Locations</h6>
                    </div>
                    <!-- Column -->
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->

    <!-- Row -->
    <div class = "row">
        <div class = "col-lg-4 col-md-12">
            <!-- Column -->
            <div class = "card">
                <img class = "" src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/background/profile-bg.jpg" alt = "Card image cap">
                <div class = "card-body little-profile text-center">
                    <div class = "pro-img">
                        <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/users/4.jpg" alt = "user"/>
                    </div>
                    <h3 class = "m-b-15"><?php echo ucwords(Yii::$app->user->identity->name); ?></h3>
                    <p>
                        <small>To edit you profile or change your password,<br/>please click on the button below.</small>
                    </p>
                    <a href = "javascript:void(0)" class = "m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded">View Profile</a>

                </div>
            </div>
            <!-- Column -->
        </div>
        <div class = "col-lg-4 col-md-6 col-xs-12">
            <div class = "card">
                <div class = "card-body bg-info">
                    <h4 class = "text-white card-title">New Users</h4>
                </div>

                <div class = "card-body">
                    <div class = "message-box contact-box">
                        <h2 class = "add-ct-btn">
                            <button type = "button" class = "btn btn-circle btn-lg btn-success waves-effect waves-dark">+</button>
                        </h2>
                        <div class = "message-widget contact-widget">
                            <!-- Message -->
                            <a href = "#">
                                <div class = "user-img">
                                    <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/users/1.jpg" alt = "user" class = "img-circle">
                                </div>
                                <div class = "mail-content">
                                    <h5>Pavan kumar</h5> <span class = "mail-desc">info@wrappixel.com</span>
                                </div>
                            </a>
                            <!-- Message -->
                            <a href = "#">
                                <div class = "user-img">
                                    <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/users/2.jpg" alt = "user" class = "img-circle">
                                </div>
                                <div class = "mail-content">
                                    <h5>Sonu Nigam</h5> <span class = "mail-desc">pamela1987@gmail.com</span></div>
                            </a>
                            <!-- Message -->
                            <a href = "#">
                                <div class = "user-img"><span class = "round">A</span> <span class = "profile-status away pull-right"></span></div>
                                <div class = "mail-content">
                                    <h5>Arijit Sinh</h5> <span class = "mail-desc">cruise1298.fiplip@gmail.com</span></div>
                            </a>
                            <!-- Message -->
                            <a href = "#">
                                <div class = "user-img">
                                    <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/users/4.jpg" alt = "user" class = "img-circle">
                                </div>
                                <div class = "mail-content">
                                    <h5>Pavan kumar</h5> <span class = "mail-desc">kat@gmail.com</span></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class = "col-lg-4 col-md-6 col-xs-12">
            <div class = "card">
                <div class = "card-body bg-info">
                    <h4 class = "card-title">New Vendors</h4>
                </div>

                <div class = "card-body">
                    <div class = "message-box contact-box">
                        <h2 class = "add-ct-btn">
                            <button type = "button" class = "btn btn-circle btn-lg btn-success waves-effect waves-dark">+</button>
                        </h2>
                        <div class = "message-widget contact-widget">
                            <?php $i = 0;
                                for ($i = 0; $i < 4; $i++): ?>

                                    <a href = "<?php echo Yii::$app->request->baseUrl; ?>/">
                                        <div class = "user-img">
                                            <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/users/1.jpg" alt = "user" class = "img-circle">
                                        </div>
                                        <div class = "mail-content">
                                            <h5>Pavan kumar</h5> <span class = "mail-desc">info@wrappixel.com</span>
                                        </div>

                                    </a>
                                <?php endfor; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->

    <!-- Row -->
    <div class = "row">
        <div class = "col-lg-6 col-md-6 col-md-12 col-xs-12">
            <div class = "card">
                <div class = "card-body border-bottom">
                    <a href = "<?php echo Yii::$app->request->baseUrl; ?>/" class = "pull-right btn btn-sm btn-rounded btn-primary">
                        View All
                    </a>
                    <h4 class = "card-title">Moderate Actions</h4>
                </div>
                <!-- ============================================================== -->
                <!-- Comment widgets -->
                <!-- ============================================================== -->
                <div class = "comment-widgets">
                    <?php $i = 0;
                        for ($i = 0; $i < 4; $i++): ?>
                            <div class = "d-flex flex-row comment-row">
                                <div class = "p-2"><span class = "round">
                                        <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/users/1.jpg" alt = "user" width = "50">
                                    </span></div>
                                <div class = "comment-text w-100">
                                    <h5>Johnathan Doeting</h5>
                                    <p class = "m-b-10">Added a new route.</p>
                                    <div class = "comment-footer">
                                        <span class = "text-muted pull-right">April 14, 2016 at 12:45 PM</span> <span class = "label label-success">Pending</span> <span class = "action-icons">
                                            <a class = "btn btn-xsm btn-success" href = "javascript:void(0)">
                                                Approve
                                            </a>
                                            <a class = "btn btn-xsm btn-warning" href = "javascript:void(0)">
                                                Reject
                                            </a>
                                            <a class = "btn btn-xsm btn-danger" href = "javascript:void(0)">
                                                Block
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php endfor;
                    ?>

                </div>
            </div>
        </div>
        <div class = "col-lg-6 col-md-6 col-md-12 col-xs-12">
            <div class = "card">
                <div class = "card-body border-bottom">
                    <a href = "<?php echo Yii::$app->request->baseUrl; ?>/" class = "pull-right btn btn-sm btn-rounded btn-primary">
                        View All
                    </a>
                    <h4 class = "card-title">Moderate Comments</h4>
                </div>
                <!-- ============================================================== -->
                <!-- Comment widgets -->
                <!-- ============================================================== -->
                <div class = "comment-widgets">
                    <?php $i = 0;
                        for ($i = 0; $i < 4; $i++): ?>
                            <div class = "d-flex flex-row comment-row">
                                <div class = "p-2">
                                    <span class = "round">A</span>
                                </div>
                                <div class = "comment-text w-100">
                                    <h5>Johnathan Doeting</h5>
                                    <p class = "m-b-10">Added a new route.</p>
                                    <div class = "comment-footer">
                                        <span class = "text-muted pull-right">April 14, 2016 at 12:45 PM</span> <span class = "label label-success">Pending</span> <span class = "action-icons">
                                            <a class = "btn btn-xsm btn-success" href = "javascript:void(0)">
                                                Approve
                                            </a>
                                            <a class = "btn btn-xsm btn-warning" href = "javascript:void(0)">
                                                Reject
                                            </a>

                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php endfor;
                    ?>

                </div>
            </div>
        </div>
    </div>
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <div class = "right-sidebar">
        <div class = "slimscrollright">
            <div class = "rpanel-title"> Service Panel <span>
                    <i class = "ti-close right-side-toggle"></i>
                </span></div>
            <div class = "r-panel-body">
                <ul id = "themecolors" class = "m-t-20">
                    <li><b>With Light sidebar</b></li>
                    <li>
                        <a href = "javascript:void(0)" data-theme = "default" class = "default-theme">1</a>
                    </li>
                    <li>
                        <a href = "javascript:void(0)" data-theme = "green" class = "green-theme">2</a>
                    </li>
                    <li>
                        <a href = "javascript:void(0)" data-theme = "red" class = "red-theme">3</a>
                    </li>
                    <li>
                        <a href = "javascript:void(0)" data-theme = "blue" class = "blue-theme working">4</a>
                    </li>
                    <li>
                        <a href = "javascript:void(0)" data-theme = "purple" class = "purple-theme">5</a>
                    </li>
                    <li>
                        <a href = "javascript:void(0)" data-theme = "megna" class = "megna-theme">6</a>
                    </li>
                    <li class = "d-block m-t-30"><b>With Dark sidebar</b></li>
                    <li>
                        <a href = "javascript:void(0)" data-theme = "default-dark" class = "default-dark-theme">7</a>
                    </li>
                    <li>
                        <a href = "javascript:void(0)" data-theme = "green-dark" class = "green-dark-theme">8</a>
                    </li>
                    <li>
                        <a href = "javascript:void(0)" data-theme = "red-dark" class = "red-dark-theme">9</a>
                    </li>
                    <li>
                        <a href = "javascript:void(0)" data-theme = "blue-dark" class = "blue-dark-theme">10</a>
                    </li>
                    <li>
                        <a href = "javascript:void(0)" data-theme = "purple-dark" class = "purple-dark-theme">11</a>
                    </li>
                    <li>
                        <a href = "javascript:void(0)" data-theme = "megna-dark" class = "megna-dark-theme ">12</a>
                    </li>
                </ul>
                <ul class = "m-t-20 chatonline">
                    <li><b>Chat option</b></li>
                    <li>
                        <a href = "javascript:void(0)">
                            <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/users/1.jpg" alt = "user-img" class = "img-circle">
                            <span>Varun Dhavan</span></a>
                    </li>
                    <li>
                        <a href = "javascript:void(0)">
                            <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/users/2.jpg" alt = "user-img" class = "img-circle">
                            <span>Genelia Deshmukh
                                <small class = "text-warning">Away</small>
                            </span></a>
                    </li>
                    <li>
                        <a href = "javascript:void(0)">
                            <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/users/3.jpg" alt = "user-img" class = "img-circle">
                            <span>Ritesh Deshmukh
                                <small class = "text-danger">Busy</small>
                            </span></a>
                    </li>
                    <li>
                        <a href = "javascript:void(0)">
                            <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/users/4.jpg" alt = "user-img" class = "img-circle">
                            <span>Arijit Sinh
                                <small class = "text-muted">Offline</small>
                            </span></a>
                    </li>
                    <li>
                        <a href = "javascript:void(0)">
                            <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/users/5.jpg" alt = "user-img" class = "img-circle">
                            <span>Govinda Star</span>
                        </a>
                    </li>
                    <li>
                        <a href = "javascript:void(0)">
                            <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/users/6.jpg" alt = "user-img" class = "img-circle">
                            <span>John Abraham</span>
                        </a>
                    </li>
                    <li>
                        <a href = "javascript:void(0)">
                            <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/users/7.jpg" alt = "user-img" class = "img-circle">
                            <span>Hritik Roshan</span></a>
                    </li>
                    <li>
                        <a href = "javascript:void(0)">
                            <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/users/8.jpg" alt = "user-img" class = "img-circle">
                            <span>Pwandeep rajan</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>