<?php
    /* @var $this yii\web\View */
    $this->title = 'Partner';
?>
<div class = "page-header">
    <div class = "container">
        <h1 class = "title"><?php echo $client['title']; ?></h1>
    </div>

</div><!-- page-header -->
<section class = "page-section animated fadeInUp visible" data-animation = "fadeInUp">
    <div class = "container">

        <div class = "row">
            <div class = "col-md-3">
                <!-- Image -->
                <img alt = "" src = "<?php echo Yii::$app->request->baseUrl . '/common/assets/images/uploads/' . $client['client']['image']; ?>">
            </div>
            <div class = "col-md-9">
                <div class = "section-title text-left animated fadeInUp visible" data-animation = "fadeInUp">
                    <!-- Title -->
                    <h2 class = "title"><?php echo $client['title']; ?></h2>
                </div>
                <!-- Content -->
                <div data-animation = "fadeInDown" class = "animated fadeInDown visible">
                    <p>URL: <a href = "<?php echo $client['client']['link']; ?>"><?php echo $client['client']['link']; ?></a></p>
                </div>
                <div data-animation = "fadeInDown" class = "animated fadeInDown visible">
                    <p><?php echo $client['content']; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
