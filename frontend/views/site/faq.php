<?php

    /* @var $this yii\web\View */
    $this->title = 'FAQ';
    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/jquery.mixitup.min.js');
    
?>
<div class = "page-header">
    <div class = "container">
        <h1 class = "title">Frequently Asked Questions</h1>
    </div>
</div><!-- page-header -->
<section class = "page-section faqs">
    <div class = "container">
        <div class = "row">

            <div class = "col-sm-12 col-md-9 work-section">
          <div class = "panel-group list-style" id = "faq-accordion">
                    <div id = "mix-container" class = "portfolio-grid">
                        <?php if (!empty($faq) && count($faq) > 0){

                        foreach ($faq as $f) {
                           if($f['is_active'] == 1){
                        ?>
                        <div class = "panel panel-default mix panel-bg graphic-design all">
                            <div class = "panel-heading">
                                <div class = "panel-title">
                                    <a data-toggle = "collapse" data-parent = "#faq-accordion" href = "#collapse1<?php echo $f['id']; ?>">
                                        <?php echo (isset($f['title']) && $f['title'] != '' ? $f['title'] : '') ?></a>
                                </div>
                            </div>
                            <div id = "collapse1<?php echo $f['id']; ?>" class = "panel-collapse collapse in">
                                <div class = "panel-body">
                                    <?php echo (isset($f['content']) && $f['content'] != '' ? $f['content'] : '') ?>
                                </div>
                            </div>
                        </div>
                        <?php }} }?>
                    </div>
                </div>
            </div>

<!--            <div class = "sidebar col-sm-12 col-md-3">-->
<!--                <div class = "widget">-->
<!---->
<!--                    <h4 class = "title">Filter</h4>-->
<!--                    <div id = "options" class = "filter-menu">-->
<!--                        <ul class = "option-set black nav nav-pills">-->
<!--                            <li class = "filter active" data-filter = "all">Show All</li>-->
<!--                            <li class = "filter" data-filter = ".graphic-design">web design</li>-->
<!--                            <li class = "filter" data-filter = ".web-design">landing pages</li>-->
<!--                            <li class = "filter" data-filter = ".ecommerce">personal blog</li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!---->
<!--                   page-list -->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>
</section>