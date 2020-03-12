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
                            <input id = "<?php echo $counter; ?>" name = "slider[slide_order]" value = "<?php echo(isset($editable['slide_order']) ? $editable['slide_order'] : '0') ?>" type = "number" class = "form-control required">
                        </div>
                        <div class = "form-group">
                            <?php $counter++; ?>
                            <label for = "<?php echo $counter; ?>" class = "control-label">Slider Image</label>
                            <input accept = "image/x-png,image/jpeg" id = "<?php echo $counter; ?>" name = "image" type = "file" class = "form-control <?php echo ($new) ? 'required' : '' ?>">
                        </div>
                       <div class = "form-group">
                           <?php $counter++; ?>
                          <label for = "<?php echo $counter; ?>" class = "control-label">Title</label>
                          <input id = "<?php echo $counter; ?>" name = "slider[title]" value = "<?php echo(isset($editable['title']) ? $editable['title'] : '') ?>" type = "text" class = "form-control required">
                       </div>
                       <div class = "form-group">
                           <?php $counter++; ?>
                          <label for = "<?php echo $counter; ?>" class = "control-label">Subtitle</label>
                          <input id = "<?php echo $counter; ?>" name = "slider[subtitle]" value = "<?php echo(isset($editable['subtitle']) ? $editable['subtitle'] : '') ?>" type = "text" class = "form-control required">
                       </div>

                        <div class = "form-group">
                            <?php $counter++; ?>
                            <label for = "<?php echo $counter; ?>" class = "control-label">Link</label>
                            <input id = "<?php echo $counter; ?>" name = "slider[link]" value = "<?php echo(isset($editable['link']) ? $editable['link'] : '') ?>" type = "text" class = "form-control required url">
                        </div>
                       <div class = "form-group">
                           <?php $counter++; ?>
                          <label for = "<?php echo $counter; ?>" class = "control-label ">Description</label>
                          <textarea id = "<?php echo $counter; ?>" name = "slider[description]" class = "summernote"><?php echo (isset($editable['description'])) ? $editable['description'] : '' ?></textarea>
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
                                    <th>S.N</th>
                                   <th>Order</th>
                                    <th>Image</th>
                                    <th>Title</th>
<!--                                    <th>Subtitle</th>-->
                                    <th>Created on</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $sn = 1;
                                foreach ($slider as $key => $slide) : ?>
                                    <tr>
                                        <td><?php echo $sn++ ?></td>
                                       <td><?php echo $slide['slide_order'] ?></td>
                                        <td>
                                            <div class = "image-wrapper">
                                                <?php if (isset($slide['image']) && $slide['image'] != ''): ?>
                                                    <img class = "img-responsive" src = "<?php echo Yii::$app->request->baseUrl . '/../common/assets/images/uploads/' . $slide['image']; ?>">
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <td><?php echo ucwords($slide['title']); ?></td>
<!--                                        <td>-->
<!--                                            --><?php //if ($slide['subtitle'] != ''): echo $slide['subtitle']; endif; ?>
<!--                                        </td>-->

                                        <td><?php echo \common\components\Misc::dmY($slide['created_on']); ?></td>
                                        <td class = "text-right">
                                            <a class = "btn btn-sm btn-primary m-r-10" href = "<?php echo Yii::$app->request->baseUrl; ?>/slider/edit/<?php echo \common\components\Misc::encrypt($slide['id']) ?>">Edit</a>
                                            <a class = "btn btn-sm btn-danger delete-slider" data-table = "slider" data-id= "<?php echo $slide['id']; ?>" href = "javascript:void();">Delete</a>
<!--                                            <a class = "btn btn-default btn-sm delete-item" href = "javascript:void(0);" data-id = "--><?php //echo $post['id']; ?><!--" data-tab = "Blog">Delete</a>-->
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