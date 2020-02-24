<?php
$this->title = Yii::$app->params['system_name'] . ' | Sections';
//$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/');
?>
<div class = "container-fluid">
    <form enctype = "multipart/form-data" method = "post" action = "<?php echo Yii::$app->request->baseUrl; ?>/blog/update-category/">

        <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
        <input type = "hidden" name = "post[id]" value = "<?php echo (isset($editable['id'])) ? $editable['id'] : '' ?>"/>
        <div class = "row page-titles">
            <div class = "col-md-12 align-self-center">
                <h3 class = "text-themecolor d_inline_b  m-b-0 m-t-0">
                    <?php echo (isset($editable['name'])) ? ' <i class="mdi mdi-pencil"></i> Edit - ' . $editable['name'] . '' : ' <i class="mdi mdi-add"></i> Add New Post' ?>
                </h3>
                <div class = "page-actions ">
                    <a class = "btn btn-secondary <?php echo (isset($editable['title'])) ? '' : 'd_none'; ?>" href = "<?php echo Yii::$app->request->baseUrl; ?>/news/edit/">
                        <i class = "mdi mdi-plus"></i>
                        Add New Post
                    </a>

                    <button class = "btn btn-success" type = "submit">
                        <i class = "mdi mdi-check"></i>
                        Save
                    </button>
                </div>
                <div class = "clearfix"></div>
            </div>
        </div>

        <div class = "page-section">
            <div class = "row">
                <div class = "col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class = "card">
                        <div class = "card-body">
                            <?php $counter = 0; ?>
                            <div class = "form-group">
                                <?php $counter++; ?>
                                <label for = "<?php echo $counter; ?>" class = "control-label required">Category Name</label>
                                <input id = "<?php echo $counter; ?>" name = "post[name]" type = "text" class = "form-control required" value = "<?php echo (isset($editable['name'])) ? $editable['name'] : '' ?>">
                            </div>

                            <div class = "form-group">
                                <?php $counter++; ?>
                                <label for = "<?php echo $counter; ?>" class = "control-label ">Category Remark</label>
                                <textarea id = "<?php echo $counter; ?>" name = "post[remark]" class = "summernote"><?php echo (isset($editable['remark'])) ? $editable['remark'] : '' ?></textarea>
                            </div>



                        </div>
                    </div>
                </div>

            </div>

    </form>
</div>