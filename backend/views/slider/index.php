<?php
    $this->title = Yii::$app->params['system_name'] . ' | Slider';
?>
<?php $new = ($editable == FALSE) ? 1 : 0; ?>
<div class = "container-fluid">
    <div class = "row page-titles">
        <div class = "col-md-6 align-self-center">
            <h3 class = "text-themecolor m-b-0 m-t-0">Slider</h3>
        </div>
        <div class = "col-md-6 align-self-center text-right">
            <?php if (!$new) : ?>
                <a href = "<?php echo Yii::$app->request->baseUrl; ?>/slider/update/" class = "btn btn-primary">
                    <i class = "mdi mdi-plus m-r-5"></i>
                    Add Slide
                </a>
            <?php endif; ?>
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-4 col-sm-12">
            <div class = "card extended">
                <div class = "card-header">
                    <?php if ($new): ?>
                        <h5 class = "card-title">Add Slide</h5>
                    <?php else: ?>
                        <h5 class = "card-title">Edit Slide <?php echo $editable['id']; ?></h5>
                    <?php endif; ?>
                </div>
                <div class = "card-body">
                    <form method = "post" action = "<?php echo Yii::$app->request->baseUrl; ?>/slider/update/" enctype = "multipart/form-data">
                        <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
                        <input type = "hidden" name = "slider[id]" value = "<?php echo(isset($editable['id']) ? $editable['id'] : 0) ?>">
                        <?php $counter = 0; ?>

                        <div class = "form-group">
                            <?php $counter++; ?>
                            <label for = "<?php echo $counter; ?>" class = "control-label">Slide Order</label>
                            <input id = "<?php echo $counter; ?>" name = "slider[slide_index]" value = "<?php echo(isset($editable['slide_index']) ? $editable['slide_index'] : '0') ?>" type = "number" class = "form-control required">
                        </div>
                        <div class = "form-group">
                            <?php $counter++; ?>
                            <label for = "<?php echo $counter; ?>" class = "control-label">Slide Image</label>
                            <input accept = "image/x-png,image/jpeg" id = "<?php echo $counter; ?>" name = "image" type = "file" class = "form-control <?php echo ($new) ? 'required' : '' ?>">
                        </div>

                        <div class = "form-group">
                            <?php $counter++; ?>
                            <label for = "<?php echo $counter; ?>" class = "control-label">Content Alignment</label>
                            <select id = "<?php echo $counter; ?>" name = "slider[content_align]" class = "form-control required">
                                <option <?php echo ($editable['content_align'] == 'left') ? 'selected = "selected"' : '' ?> value = "left">Left</option>
                                <option <?php echo ($editable['content_align'] == 'center') ? 'selected = "selected"' : '' ?> value = "center">Center</option>
                                <option <?php echo ($editable['content_align'] == 'right') ? 'selected = "selected"' : '' ?> value = "right">Right</option>
                            </select>

                        </div>
                        <div class = "form-group">
                            <?php $counter++; ?>
                            <label for = "<?php echo $counter; ?>" class = "control-label">Content</label>
                            <textarea id = "<?php echo $counter; ?>" name = "slider[content]" class = "form-control summernote-basic required"><?php echo(isset($editable['content']) ? $editable['content'] : '') ?></textarea>
                        </div>
                        <div class = "form-group">
                            <?php $counter++; ?>
                            <label for = "<?php echo $counter; ?>" class = "control-label">Link</label>
                            <input id = "<?php echo $counter; ?>" name = "slider[link]" value = "<?php echo(isset($editable['link']) ? $editable['link'] : '') ?>" type = "text" class = "form-control required url">
                        </div>
                        <div class = "form-group">
                            <?php $counter++; ?>
                            <label for = "<?php echo $counter; ?>" class = "control-label">Link Text</label>
                            <input id = "<?php echo $counter; ?>" name = "slider[link_text]" value = "<?php echo(isset($editable['link_text']) ? $editable['link_text'] : '') ?>" type = "text" class = "form-control required">
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
                    <h5 class = "card-title">Slides</h5>
                </div>
                <div class = "card-body">
                    <div class = "table-responsive">
                        <table class = "table  table-striped" data-plugin = "datatable">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Image</th>
                                    <th>Link</th>
                                    <th>Link Text</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($slider as $key => $slide) : ?>
                                    <tr>
                                        <td>Slide <?php echo $slide['id'] ?></td>
                                        <td>
                                            <div class = "image-wrapper">
                                                <?php if (isset($slide['image']) && $slide['image'] != ''): ?>
                                                    <img class = "img-responsive" src = "<?php echo Yii::$app->request->baseUrl . '/../common/assets/images/uploads/' . $slide['image']; ?>">
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <td><?php echo ucwords($slide['link']); ?></td>
                                        <td>
                                            <?php if ($slide['link_text'] != ''): echo $slide['link_text']; endif; ?>
                                        </td>

                                        <td><?php echo \common\components\Misc::dmY($slide['created_on']); ?></td>
                                        <td class = "text-right">
                                            <a class = "m-r-10" href = "<?php echo Yii::$app->request->baseUrl; ?>/slider/edit/<?php echo \common\components\Misc::encrypt($slide['id']) ?>">Edit</a>
                                            <a class = "delete-item" data-table = "slider" data-identity = "<?php echo \common\components\Misc::encrypt($slide['id']); ?>" href = "javascript:void();">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>