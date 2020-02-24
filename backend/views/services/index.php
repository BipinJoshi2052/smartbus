<?php
    $this->title = Yii::$app->params['system_name'] . ' | Services';
?>
<?php $new = ($editable == FALSE) ? 1 : 0; ?>
<div class = "container-fluid">
    <div class = "row page-titles">
        <div class = "col-md-6 align-self-center">
            <h3 class = "text-themecolor m-b-0 m-t-0">Services</h3>
        </div>
        <div class = "col-md-6 align-self-center text-right">
            <?php if (!$new) : ?>
                <a href = "<?php echo Yii::$app->request->baseUrl; ?>/services" class = "btn btn-primary">
                    <i class = "mdi mdi-plus m-r-5"></i>
                    Add New Service
                </a>
            <?php endif; ?>
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-4 col-sm-12">
            <div class = "card extended">
                <div class = "card-header">
                    <?php if ($new): ?>
                        <h5 class = "card-title">Add New Service</h5>
                    <?php else: ?>
                        <h5 class = "card-title">Edit <?php echo $editable['title']; ?> </h5>
                    <?php endif; ?>
                </div>
                <div class = "card-body">
                    <form method = "post" action = "<?php echo Yii::$app->request->baseUrl; ?>/services/update/" enctype = "multipart/form-data">
                        <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
                        <input type = "hidden" name = "service[id]" value = "<?php echo(isset($editable['id']) ? \common\components\Misc::encrypt($editable['id']) : 0) ?>">

                        <?php $counter = 0; ?>
                        <div class = "form-group">
                            <?php $counter++; ?>
                            <label for = "<?php echo $counter; ?>" class = "control-label">Title</label>
                            <input id = "<?php echo $counter; ?>" value = "<?php echo(isset($editable['title']) ? $editable['title'] : '') ?>" name = "service[title]" type = "text" class = "form-control required">
                        </div>
                        <?php $counter = 0; ?>
                        <div class = "form-group">
                            <?php $counter++; ?>
                            <label for = "<?php echo $counter; ?>" class = "control-label">Alternate Title</label>
                            <input id = "<?php echo $counter; ?>" value = "<?php echo(isset($editable['alt_title']) ? $editable['alt_title'] : '') ?>" name = "service[alt_title]" type = "text" class = "form-control required">
                        </div>
                        <?php $counter = 0; ?>
                        <div class = "form-group">
                            <?php $counter++; ?>
                            <label for = "<?php echo $counter; ?>" class = "control-label">Sub Title</label>
                            <input id = "<?php echo $counter; ?>" value = "<?php echo(isset($editable['sub_title']) ? $editable['sub_title'] : '') ?>" name = "service[sub_title]" type = "text" class = "form-control required">
                        </div>
                        <div class = "form-group">
                            <?php $counter++; ?>
                            <label for = "<?php echo $counter; ?>" class = "control-label">Summary</label>
                            <textarea id = "<?php echo $counter; ?>" name = "service[summary]" class = "form-control required"><?php echo(isset($editable['summary']) ? $editable['summary'] : '') ?></textarea>
                        </div>
                        <div class = "form-group">
                            <?php $counter++; ?>
                            <label for = "<?php echo $counter; ?>" class = "control-label">Description</label>
                            <textarea id = "<?php echo $counter; ?>" name = "service[description]" class = "summernote required"><?php echo(isset($editable['description']) ? $editable['description'] : '') ?></textarea>
                        </div>
                        <div class = "form-group">
                            <?php $counter++; ?>
                            <div class = "custom-file">

                                <div class = "image-wrapper" <?= (isset($editable['image']) && $editable['image'] != '') ? '' : 'style="display:none;"' ?>>
                                    <img src = "<?php echo (isset($editable['image']) && $editable['image'] != '') ? Yii::$app->request->baseUrl . '/../common/assets/images/uploads/' . $editable['image'] : '' ?>" class = "custom-file-input-image" id = "file-<?php echo $counter; ?>-image" alt = ""/>
                                </div>
                                <?php if (isset($editable['image']) && $editable['image'] != ''): ?>
                                    <div class = "image-actions text-right">
                                        <a href = "javascript:void();" class = "remove-image" data-tab = "blog" data-id = "<?php echo \common\components\Misc::encrypt($editable['id']) ?>">
                                            <i class = "mdi mdi-close margin-right-5"></i>
                                            Remove Image
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <label class = "custom-file-label" id = "file-<?php echo $counter; ?>-label" for = "file-<?php echo $counter; ?>">
                                    <i class = "fa fa-file"></i>
                                    <span>Upload Image</span>
                                </label>
                                <input accept = "image/x-png,image/jpeg" type = "file" name = "image" class = "custom-file-input" id = "file-<?php echo $counter; ?>" onchange = "readURL(this);" aria-describedby = "file-<?php echo $counter; ?>" src = "<?php echo (isset($editable['image']) && $editable['image'] != '') ? $editable['image'] : '' ?>">
                            </div>         
                        </div>

                        <div class = "form-group m-t-40 m-b-0 text-right">
                            <button class = "btn btn-primary" type = "submit">
                                <i class = "mdi mdi-check"></i>
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class = "col-md-8 col-sm-12">
            <div class = "card extended">
                <div class = "card-header">
                    <h5 class = "card-title">Services</h5>
                </div>

                <div class = "card-body ">
                    <div class = "table-responsive">
                        <?php if (isset($services) && count($services) > 0): ?>
                            <table class = "table  table-striped" data-plugin = "datatable">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($services as $service) : ?>
                                        <tr>
                                            <td>
                                                <div class = "image-wrapper">
                                                    <?php if (isset($service['image']) && $service['image'] != ''): ?>
                                                        <img class = "img-responsive" src = "<?php echo Yii::$app->request->baseUrl . '/../common/assets/images/uploads/' . $service['image']; ?>">
                                                    <?php else: ?>
                                                        <img class = "img-responsive" src = "<?php echo Yii::$app->request->baseUrl . '/../common/assets/images/no-image.png'; ?>">
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                            <td><?php echo ucwords($service['title']); ?></td>
                                            <td class = "text-right">
                                                <a class = "btn btn-primary btn-sm" href = "<?php echo Yii::$app->request->baseUrl; ?>/services/edit/<?php echo \common\components\Misc::encrypt($service['id']) ?>">Edit</a>
                                                <a class = "btn btn-default btn-sm delete-item"  href = "javascript:void();" data-tab = "Services" data-id = "<?php echo \common\components\Misc::encrypt($service['id']); ?>">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        <?php else: ?>
                            <h4 class = "text-center">No services available.</h4>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>