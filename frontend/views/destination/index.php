<?php

Yii::$app->session->getFlash('success');
/* @var $this yii\web\View */
$this->title = 'Single Post';
?>

<div class = "page-header">
    <div class = "container">
        <?php if (!empty($details)):
            ?>
                <h1 class = "title"><?php echo $details['title'] ?></h1>
   <?php else : ?>
            Sorry error occured.
        <?php endif; ?>
    </div>

</div>
<!-- page-header -->
<section class = "page-section">
    <div class = "container">
        <div class = "row">
            <?php if (!empty($details)):?>

                    <div class = "col-md-12">
                        <div class = "post-image opacity">
                            <img src = "<?php echo (isset($details['image']) && $details['image'] != '') ? Yii::$app->request->baseUrl . '/common/assets/images/uploads/' . $details['image'] : Yii::$app->request->baseUrl . '/common/assets/images/no-image.png' ?>" width = "520" height = "100" alt = "" title = "" class = "img-01">
                        </div>
                        <div class = "post-content top-pad-20">
                            <p> <?php echo $details['description'] ?></p>

                        </div>
                        <div class = "post-meta">
                            <!-- Author  -->
                            <span class = "author"><i class = "fa fa-edit"></i><?php echo $details['title'] ?></span>
                            <!-- Meta Date -->
                            <span class = "time"><i class = "fa fa-calendar"></i> <?php echo $details['created_on'] ?></span>
                            <!-- blogComments -->
                         
                            <!-- Category -->
                        </div>
                    </div>
    

            <?php else: ?>
                <h3>Sorry, No Blogs Found</h3>
            <?php endif; ?>
        </div>
        <hr>

</section>