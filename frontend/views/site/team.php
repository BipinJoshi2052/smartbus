<?php
    /* @var $this yii\web\View */
    $this->title = 'Our Team';
?>
<!--Page Title-->
<section class = "page-title">
    <div class = "fixed-bg " style = "background-image: url('<?php echo Yii::$app->request->baseUrl; ?>/assets/images/resources/banner-bg1.jpg')">

    </div>
    <div class = "container text-center">
        <h1>Our Team</h1>
        <ul class = "title-menu">
            <li>
                <a href = "<?php echo Yii::$app->request->baseUrl; ?>/">home</a>
            </li>
            <li>/</li>
            <li>Our Team</li>
        </ul>
    </div>
</section>
<?php if (isset($content) && count($content) > 0): ?>
    <?php foreach ($content as $key => $section) : ?>
        <section class = "padding-top-120 padding-bottom-60">
            <div class = "container">
                <?php if ($section['image'] != '' && $section['image_position'] == 'left'): ?>
                    <div class = "row">
                        <div class = "col-md-5 col-sm-12">
                            <div class = "img-wrapper">
                                <?php if ($section['image'] != ''): ?>
                                    <figure>
                                        <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/resources/<?php echo $section['image'] ?>" alt = "<?php echo $section['title']; ?>">
                                    </figure>
                                <?php else: ?>
                                    <div class = "no-image">
                                        <i class = "fa fa-camera"></i>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                        <div class = "col-md-7 col-sm-12">
                            <?php if ($section['title'] != '' || $section['sub_title']): ?>
                                <div class = "sec-title">
                                    <?php if ($section['title'] != ''): ?>
                                        <h5 class = "text-center"><?php echo $section['title']; ?></h5>
                                        <hr class = "short-underline lg-margin"/>
                                    <?php endif; ?>
                                    <?php if ($section['sub_title'] != ''): ?>
                                        <h5 class = "margin-bottom-15 alt-font"><?php echo $section['sub_title']; ?></h5>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($section['content'] != ''): ?>
                                <div class = "sec-content">
                                    <?php echo $section['content']; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($section['button_text'] != '' && $section['button_link'] != '') : ?>
                                <div class = "sec-action text-<?php echo $section['button_position'] ?>">
                                    <a href = "<?php echo $section['button_link']; ?>" class = "thm-btn transparent"><?php echo $section['button_text'] ?></a>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                <?php elseif
                ($section['image'] != '' && $section['image_position'] == 'right'
                ): ?>
                    <div class = "row">
                        <div class = "col-md-7 col-sm-12">
                            <?php if ($section['title'] != '' || $section['sub_title']): ?>
                                <div class = "sec-title">
                                    <?php if ($section['title'] != ''): ?>
                                        <h5 class = "text-center"><?php echo $section['title']; ?></h5>
                                        <hr class = "short-underline lg-margin"/>
                                    <?php endif; ?>
                                    <?php if ($section['sub_title'] != ''): ?>
                                        <h5 class = "margin-bottom-15 alt-font"><?php echo $section['sub_title']; ?></h5>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($section['content'] != ''): ?>
                                <div class = "sec-content">
                                    <?php echo $section['content']; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($section['button_text'] != '' && $section['button_link'] != '') : ?>
                                <div class = "sec-action text-<?php echo $section['button_position'] ?>">
                                    <a href = "<?php echo $section['button_link']; ?>" class = "thm-btn transparent"><?php echo $section['button_text'] ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class = "col-md-5 col-sm-12">
                            <div class = "img-wrapper">
                                <?php if ($section['image'] != ''): ?>
                                    <figure>
                                        <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/resources/<?php echo $section['image'] ?>" alt = "<?php echo $section['title']; ?>">
                                    </figure>
                                <?php else: ?>
                                    <div class = "no-image">
                                        <i class = "fa fa-camera"></i>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php else: ?><?php if ($section['title'] != '' || $section['sub_title']): ?>
                    <div class = "sec-title">
                        <?php if ($section['title'] != ''): ?>
                            <h5 class = "text-center"><?php echo $section['title']; ?></h5>
                            <hr class = "short-underline lg-margin"/>
                        <?php endif; ?>

                        <?php if ($section['sub_title'] != ''): ?>
                            <h5 class = "margin-bottom-15 alt-font"><?php echo $section['sub_title']; ?></h5>
                        <?php endif; ?>
                    </div>
                <?php endif; ?><?php if ($section['content'] != ''): ?>
                    <div class = "sec-content">
                        <?php echo $section['content']; ?>
                    </div>
                <?php endif; ?><?php if ($section['button_text'] != '' && $section['button_link'] != '') : ?>
                    <div class = "sec-action text-<?php echo $section['button_position'] ?>">
                        <a href = "<?php echo $section['button_link']; ?>" class = "thm-btn transparent"><?php echo $section['button_text'] ?></a>
                    </div>
                <?php endif; ?><?php endif; ?>
            </div>
        </section>
    <?php endforeach; ?>
<?php endif; ?>


<section class = "team-area padding-top-0 padding-bottom-30 style-two d_none">
    <div class = "container">
          <div class = "team-content">
            <div class = "team-block">
                <div class = "img-wrapper text-center">
                    <figure>
                        <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/team/5.jpg" alt = "Team Image">
                    </figure>
                </div>
                <div class = "text-block">
                  <h5>Peer Kjaer</h5>
                    <h6>Partner</h6>
                    <p>Our incoming specialist with a global outreach! 30 years in managerial positions with Tumlare, Kuoni, Carlson Wagolit and Liberty international Tourism Group – in all seven Nordic countries! Lived and worked many years in Japan and speaks fluent Japanese!</p>
                    <ul class = "social-links d_none">
                        <li>
                            <a href = "#">
                                <i class = "fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href = "#">
                                <i class = "fa fa-skype"></i>
                            </a>
                        </li>
                        <li>
                            <a href = "#">
                                <i class = "fa fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href = "#">
                                <i class = "fa fa-vimeo"></i>
                            </a>
                        </li>
                        <li>
                            <a href = "#">
                                <i class = "fa fa-google-plus"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class = "team-block">
                <div class = "img-wrapper">
                    <figure>
                        <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/team/6.jpg" alt = "Team Image">
                    </figure>
                </div>
                <div class = "text-block">
                    <a href = "team-details.html"><h5>Dewashree Koirala</h5></a>
                    <h6>Partner</h6>
                    <p>Our Nepalese big data and social media expert! Expertise within big data analysis, research, strategy building, online presence and SEO. Speaks five languages fluently and loves to dance and host events.</p>
                    <ul class = "social-links d_none">
                        <li>
                            <a href = "#">
                                <i class = "fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href = "#">
                                <i class = "fa fa-skype"></i>
                            </a>
                        </li>
                        <li>
                            <a href = "#">
                                <i class = "fa fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href = "#">
                                <i class = "fa fa-vimeo"></i>
                            </a>
                        </li>
                        <li>
                            <a href = "#">
                                <i class = "fa fa-google-plus"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class = "team-block">
                <div class = "img-wrapper">
                    <figure>
                        <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/team/7.jpg" alt = "Team Image">
                    </figure>
                </div>
                <div class = "text-block">
                    <a href = "team-details.html"><h5>Lars Braedstrup-Holm</h5></a>
                    <h6>Partner</h6>
                    <p>Our Danish/ Swedish marketing specialist! Previous experience from Visit Sweden in Denmark and Norway, the city of Malmo and director of sales and marketing in the hotel industry. Expert knowledge within MICE, leisure, events, communication and project management. Lived and worked in Miami for years. Loves to play golf.</p>
                    <ul class = "social-links d_none">
                        <li>
                            <a href = "#">
                                <i class = "fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href = "#">
                                <i class = "fa fa-skype"></i>
                            </a>
                        </li>
                        <li>
                            <a href = "#">
                                <i class = "fa fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href = "#">
                                <i class = "fa fa-vimeo"></i>
                            </a>
                        </li>
                        <li>
                            <a href = "#">
                                <i class = "fa fa-google-plus"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class = "team-area padding-top-0 padding-bottom-30 style-two round">
    <div class = "container">
        <?php if (isset($team) && count($team) > 0): ?>
            <div class = "team-content">
                <?php foreach ($team as $key => $member) : ?>

                    <div class = "team-block">
                        <div class = "img-wrapper text-center">
                            <?php if ($member['image'] != ''): ?>
                                <figure>
                                    <img src = "<?php echo Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/<?php echo $member['image'] ?>" alt = "Team Image">
                                </figure>

                            <?php else: ?>
                                <div class = "no-image">
                                    <i class = "fa fa-camera no-img "></i>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class = "text-block">
                          <h5><?php echo ucwords($member['name']); ?></h5>
                            <h6><?php echo $member['position']; ?></h6>
                            <p><?php echo $member['description']; ?></p>
                            <ul class = "social-links">
                                <li>
                                    <a href = "#">
                                        <i class = "fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href = "#">
                                        <i class = "fa fa-skype"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href = "#">
                                        <i class = "fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href = "#">
                                        <i class = "fa fa-vimeo"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href = "#">
                                        <i class = "fa fa-google-plus"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <h4 class = "text-center margin-bottom-90">Team members not found.</h4>
        <?php endif; ?>

    </div>
</section>

