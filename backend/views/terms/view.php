<?php

Yii::$app->session->getFlash('success');
//$this->section = Yii::$app->params['system_name'] . ' | Sections';
//$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/');
?>
<div class = "container-fluid">

    <div class = "row page-sections">
        <div class = "col-md-12 align-self-center">
            <h3 class = "text-themecolor d_inline_b  m-b-0 m-t-0">
                <?php echo (isset($details['section'])) ? $details['section'] . '' : ' ' ?>
            </h3>
            <div class = "clearfix"></div>
        </div>
    </div>

    <div class = "page-section">
        <div class = "row">
            <div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class = "card" style = "display: inline-block">

                    <div class = "col-md-9" style = "float: left;margin-top: 10px;">
                        <p><b class="font-lg">Section : </b><?php echo (isset($details['section'])) ? $details['section'] : '' ?></p>
                        <p><b class="font-lg">Content : </b><?php echo (isset($details['content'])) ? $details['content'] : '' ?></p>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
