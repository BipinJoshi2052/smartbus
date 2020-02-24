<?php
    /* @var $this yii\web\View */
    $this->title = 'Blog';
?>
<div class="page-header">
    <div class="container">
        <h1 class="title">Blog Grid 3 Column</h1>
    </div>
    <div class="breadcrumb-box">
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
    </div>
</div>
<!-- page-header -->
<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="post-item">
                    <div class="post-image">
                        <img src="<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/blog/big-1.jpg" width="600" height="400" alt="" title="" />
                    </div>
                    <h2 class="post-title">
                        <a href="<?php echo Yii::$app->request->baseUrl; ?>/blog/post">Sample Blog Post</a>
                    </h2>
                    <div class="post-content">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                    <div class="post-meta">
                        <!-- Author  -->
                        <span class="author">
                            <i class="fa fa-user"></i> John Deo</span>
                        <!-- Meta Date -->

                        <span class="time">
                            <i class="fa fa-calendar"></i> 03.11.2014</span>
                        <!-- Category -->

                        <span class="category pull-right">
                            <i class="fa fa-heart"></i> Travel, Nature, Business</span></div>
                </div>
            </div>
            <!-- post -->
            <div class="col-sm-6 col-md-4">
                <div class="post-item">
                    <div class="audio-container embed-container">
                        <iframe class="audio" height="166" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/69966731&amp;auto_play=false&amp;hide_related=false&amp;visual=false" style="width: 100%;"></iframe>
                    </div>
                    <h2 class="post-title">
                        <a href="<?php echo Yii::$app->request->baseUrl; ?>/blog/post">Sample Blog Post</a>
                    </h2>
                    <div class="post-content">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                    <div class="post-meta">
                        <!-- Author  -->
                        <span class="author">
                            <i class="fa fa-user"></i> John Deo</span>
                        <!-- Meta Date -->

                        <span class="time">
                            <i class="fa fa-calendar"></i> 03.11.2014</span>
                        <!-- Category -->

                        <span class="category pull-right">
                            <i class="fa fa-heart"></i> Travel, Nature, Business</span></div>
                </div>
            </div>
            <!-- post -->
            <div class="col-sm-6 col-md-4">
                <div class="post-item">
                    <div class="post-image">
                        <img src="<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/blog/big-2.jpg" width="600" height="400" alt="" title="" />
                    </div>
                    <h2 class="post-title">
                        <a href="<?php echo Yii::$app->request->baseUrl; ?>/blog/post">Sample Blog Post</a>
                    </h2>
                    <div class="post-content">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                    <div class="post-meta">
                        <!-- Author  -->
                        <span class="author">
                            <i class="fa fa-user"></i> John Deo</span>
                        <!-- Meta Date -->

                        <span class="time">
                            <i class="fa fa-calendar"></i> 03.11.2014</span>
                        <!-- Category -->

                        <span class="category pull-right">
                            <i class="fa fa-heart"></i> Travel, Nature, Business</span></div>
                </div>
            </div>
            <!-- post -->
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="post-item">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/blog/big-4.jpg" width="600" height="400" alt="" title="" />
                            </div>
                            <div class="item">
                                <img src="<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/blog/big-5.jpg" width="600" height="400" alt="" title="" />
                            </div>
                            <div class="item">
                                <img src="<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/blog/big-6.jpg" width="600" height="400" alt="" title="" />
                            </div>
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="fa fa-angle-left fa-2x" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span></a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="fa fa-angle-right fa-2x" aria-hidden="true"></span>
                            <span class="sr-only">Next</span></a></div>
                    <h2 class="post-title">
                        <a href="<?php echo Yii::$app->request->baseUrl; ?>/blog/post">Sample Blog Post</a>
                    </h2>
                    <div class="post-content">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                    <div class="post-meta">
                        <!-- Author  -->
                        <span class="author">
                            <i class="fa fa-user"></i> John Deo</span>
                        <!-- Meta Date -->

                        <span class="time">
                            <i class="fa fa-calendar"></i> 03.11.2014</span>
                        <!-- Category -->

                        <span class="category pull-right">
                            <i class="fa fa-heart"></i> Travel, Nature, Business</span></div>
                </div>
            </div>
            <!-- post -->
            <div class="col-sm-6 col-md-4">
                <div class="post-item">
                    <div class="video-container embed-container">
                        <p class="video-box">
                            <iframe class="fitvids" src="https://player.vimeo.com/video/56755157" style="width: 100%;" height="200"></iframe>
                        </p>
                    </div>
                    <h2 class="post-title">
                        <a href="<?php echo Yii::$app->request->baseUrl; ?>/blog/post">Sample Blog Post</a>
                    </h2>
                    <div class="post-content">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                    <div class="post-meta">
                        <!-- Author  -->
                        <span class="author">
                            <i class="fa fa-user"></i> John Deo</span>
                        <!-- Meta Date -->

                        <span class="time">
                            <i class="fa fa-calendar"></i> 03.11.2014</span>
                        <!-- Category -->

                        <span class="category pull-right">
                            <i class="fa fa-heart"></i> Travel, Nature, Business</span></div>
                </div>
            </div>
            <!-- post -->
            <div class="col-sm-6 col-md-4">
                <div class="post-item">
                    <div class="post-image">
                        <img src="<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/blog/big-3.jpg" width="600" height="400" alt="" title="" />
                    </div>
                    <h2 class="post-title">
                        <a href="<?php echo Yii::$app->request->baseUrl; ?>/blog/post">Sample Blog Post</a>
                    </h2>
                    <div class="post-content">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                    <div class="post-meta">
                        <!-- Author  -->
                        <span class="author">
                            <i class="fa fa-user"></i> John Deo</span>
                        <!-- Meta Date -->

                        <span class="time">
                            <i class="fa fa-calendar"></i> 03.11.2014</span>
                        <!-- Category -->

                        <span class="category pull-right">
                            <i class="fa fa-heart"></i> Travel, Nature, Business</span></div>
                </div>
            </div>
            <!-- post -->
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="post-item">
                    <div class="post-image">
                        <img src="<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/blog/big-5.jpg" width="600" height="400" alt="" title="" />
                    </div>
                    <h2 class="post-title">
                        <a href="<?php echo Yii::$app->request->baseUrl; ?>/blog/post">Sample Blog Post</a>
                    </h2>
                    <div class="post-content">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                    <div class="post-meta">
                        <!-- Author  -->
                        <span class="author">
                            <i class="fa fa-user"></i> John Deo</span>
                        <!-- Meta Date -->

                        <span class="time">
                            <i class="fa fa-calendar"></i> 03.11.2014</span>
                        <!-- Category -->

                        <span class="category pull-right">
                            <i class="fa fa-heart"></i> Travel, Nature, Business</span></div>
                </div>
            </div>
            <!-- post -->
            <div class="col-sm-6 col-md-4">
                <div class="post-item">
                    <div class="post-image">
                        <img src="<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/blog/big-1.jpg" width="600" height="400" alt="" title="" />
                    </div>
                    <h2 class="post-title">
                        <a href="<?php echo Yii::$app->request->baseUrl; ?>/blog/post">Sample Blog Post</a>
                    </h2>
                    <div class="post-content">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                    <div class="post-meta">
                        <!-- Author  -->
                        <span class="author">
                            <i class="fa fa-user"></i> John Deo</span>
                        <!-- Meta Date -->

                        <span class="time">
                            <i class="fa fa-calendar"></i> 03.11.2014</span>
                        <!-- Category -->

                        <span class="category pull-right">
                            <i class="fa fa-heart"></i> Travel, Nature, Business</span></div>
                </div>
            </div>
            <!-- post -->
            <div class="col-sm-6 col-md-4">
                <div class="post-item">
                    <div class="post-image">
                        <img src="<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/blog/big-2.jpg" width="600" height="400" alt="" title="" />
                    </div>
                    <h2 class="post-title">
                        <a href="<?php echo Yii::$app->request->baseUrl; ?>/blog/post">Sample Blog Post</a>
                    </h2>
                    <div class="post-content">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                    <div class="post-meta">
                        <!-- Author  -->
                        <span class="author">
                            <i class="fa fa-user"></i> John Deo</span>
                        <!-- Meta Date -->

                        <span class="time">
                            <i class="fa fa-calendar"></i> 03.11.2014</span>
                        <!-- Category -->

                        <span class="category pull-right">
                            <i class="fa fa-heart"></i> Travel, Nature, Business</span></div>
                </div>
            </div>
            <!-- post -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar-right">
                    <ul class="pagination">
                        <li class="disabled">
                            <span>
                                <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                            </span>
                        </li>
                        <li class="active">
                            <span>1
                                <span class="sr-only">(current)</span></span>
                        </li>
                        <li class="">
                            <span>2
                                <span class="sr-only">(current)</span></span>
                        </li>
                        <li class="">
                            <span>3
                                <span class="sr-only">(current)</span></span>
                        </li>
                        <li class="">
                            <span>4
                                <span class="sr-only">(current)</span></span>
                        </li>
                        <li>
                            <span>
                                <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                            </span>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- pagination -->
    </div>
</section>
