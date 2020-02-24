<?php
    /* @var $this yii\web\View */
    $this->title = 'Single Post';
?>

<div class="page-header">
    <div class="container">
        <h1 class="title">Sample Blog Post</h1>
    </div>
    <div class="breadcrumb-box">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="#">Pages</a></li>
                <li class="active">Sample Blog Pos</li>
            </ul>
        </div>
    </div>
</div>
<!-- page-header -->
<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="post-image opacity"><img src="<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/blog/single-post.jpg" width="1170" height="382" alt="" title=""></div>
                <div class="post-content top-pad-20">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem praesentium deleniti nostrum laborum rem id nihil tempora. Adipisci ea commodi unde nam placeat cupiditate quasi a ducimus rem consequuntur ex eligendi minima voluptatem assumenda voluptas quidem sit maiores odio velit voluptate.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem praesentium deleniti nostrum laborum rem id nihil tempora. Adipisci ea commodi unde nam placeat cupiditate quasi a ducimus rem consequuntur ex eligendi minima voluptatem assumenda voluptas quidem sit maiores odio velit voluptate.</p>
                </div>
                <div class="post-meta">
                    <!-- Author  -->
                    <span class="author"><i class="fa fa-user"></i> John Deo</span>
                    <!-- Meta Date -->
                    <span class="time"><i class="fa fa-calendar"></i> 03.11.2014</span>
                    <!-- Comments -->
                    <span class="category "><i class="fa fa-heart"></i> Travel, Nature, Business</span>
                    <!-- Category -->
                    <span class="comments pull-right"><i class="fa fa-comments"></i> Comments 112</span>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12 top-pad-20">
                <h4>Comments</h4>
                <div class="comment-item">
                    <div class="pull-left author-img"><img class="img-circle" src="<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/testimonials/1.jpg" width="80" height="80" alt="" title=""></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem praesentium deleniti nostrum laborum rem id nihil tempora. Adipisci ea commodi unde nam placeat cupiditate quasi a ducimus rem consequuntur ex eligendi minima voluptatem assumenda voluptas quidem sit maiores odio velit voluptate.</p>
                    <div class="post-meta">
                        <!-- Author  -->
                        <span class="author"><i class="fa fa-user"></i> John Deo</span>
                        <!-- Meta Date -->
                        <span class="time"><i class="fa fa-calendar"></i> 03.11.2014</span>
                        <!-- Category -->
                        <span class="comments pull-right"><i class="fa fa-comments"></i> <a href="#">reply</a></span>
                    </div>
                </div>
                <div class="comment-item">
                    <div class="pull-left author-img"><img class="img-circle" src="<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/testimonials/1.jpg" width="80" height="80" alt="" title=""></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem praesentium deleniti nostrum laborum rem id nihil tempora. Adipisci ea commodi unde nam placeat cupiditate quasi a ducimus rem consequuntur ex eligendi minima voluptatem assumenda voluptas quidem sit maiores odio velit voluptate.</p>
                    <div class="post-meta">
                        <!-- Author  -->
                        <span class="author"><i class="fa fa-user"></i> John Deo</span>
                        <!-- Meta Date -->
                        <span class="time"><i class="fa fa-calendar"></i> 03.11.2014</span>
                        <!-- Category -->
                        <span class="comments pull-right"><i class="fa fa-comments"></i> <a href="#">reply</a></span>
                    </div>
                </div>
                <div class="comment-item">
                    <div class="pull-left author-img"><img class="img-circle" src="<?php echo Yii::$app->request->baseUrl; ?>/assets/images/sections/testimonials/1.jpg" width="80" height="80" alt="" title=""></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem praesentium deleniti nostrum laborum rem id nihil tempora. Adipisci ea commodi unde nam placeat cupiditate quasi a ducimus rem consequuntur ex eligendi minima voluptatem assumenda voluptas quidem sit maiores odio velit voluptate.</p>
                    <div class="post-meta">
                        <!-- Author  -->
                        <span class="author"><i class="fa fa-user"></i> John Deo</span>
                        <!-- Meta Date -->
                        <span class="time"><i class="fa fa-calendar"></i> 03.11.2014</span>
                        <!-- Category -->
                        <span class="comments pull-right"><i class="fa fa-comments"></i> <a href="#">reply</a></span>
                    </div>
                </div>
            </div>
        </div>
        <h4>Leave a Reaply</h4>
        <div class="row">
            <form role="form" name="contactform"  method="post">
                <!-- Field 1 -->
                <div class="col-md-6">
                    <div class="input-text form-group">
                        <input type="text" name="contact_name" class="input-name form-control" placeholder="Full Name" />
                    </div>
                    <!-- Field 2 -->
                    <div class="input-email form-group">
                        <input type="email" name="contact_email" class="input-email form-control" placeholder="Email"/>
                    </div>
                </div>
                <div class="col-md-8">
                    <!-- Field 4 -->
                    <div class="textarea-message form-group">
                        <textarea name="contact_message" class="textarea-message form-control" placeholder="Message" rows="4" ></textarea>
                    </div>
                    <!-- Button -->
                    <button class="btn btn-default" type="submit">Send Now <i class="icon-paper-plane"></i></button>
                </div>
        </div>
        </form>
    </div>
    </div>
    </div>
</section>