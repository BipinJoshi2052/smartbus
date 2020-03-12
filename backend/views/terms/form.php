<?php
$this->title = Yii::$app->params['system_name'] . ' | Settings';
//$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/');
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/ckeditor/vendor/ckeditor/ckeditor.js');
?>
<div class = "container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class = "row page-titles">
        <div class = "col-md-12 align-self-center">
            <h3 class = "text-themecolor m-b-0 m-t-0">Website Settings</h3>
            <ol class = "breadcrumb">
                <li class = "breadcrumb-item">
                    <a href = "<?php echo Yii::$app->request->baseUrl; ?>">Home</a>
                </li>
                <li class = "breadcrumb-item active">Website Settings</li>
                <li class = "breadcrumb-item active">About Settings</li>
            </ol>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class = "row">
        <div class = "col-md-12">
            <div class = "card">
                <form method = "post" action = "<?php echo Yii::$app->request->baseUrl; ?>/terms/update">
                    <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
                   <input type = "hidden" name = "post[id]" value = "<?php echo (isset($editable['id'])) ? $editable['id'] : '' ?>"/>
                    <div class = "row">
                        <div class = "col-sm-12 col-xs-12">
                            <div class = "card card-bordered card-outline-info">
                                <div class = "card-header">
                                    <h4 class = "m-b-0">Section</h4>
                                </div>
                                <div class = "card-body">
                                   <div class = "form-group col-md-6">
                                      <input  name = "post[section]" type = "text" class = "form-control required" value = "<?php echo (isset($editable['section'])) ? $editable['section'] : '' ?>">
                                   </div>
                                </div>
                                <div class = "card-header">
                                    <h4 class = "m-b-0">Terms</h4>
                                </div>
                                <div class = "card-body">
                                    <div class="form-group">

                              <textarea id = "i-" name = "post[content]" type = "text" class = "form-control ckeditor"><?php echo (isset($editable['content']) ? $editable['content'] : '') ?>

                                                    </textarea>
                                    </div>
                                </div>
                               <div class="card-body">
                               <div class = "form-group">
                                  <button type = "submit" class = "btn btn-success">Save</button>
                               </div>
                               </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>

</div>