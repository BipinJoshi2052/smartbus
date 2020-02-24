<?php
    $this->title = Yii::$app->params['system_name'] . ' | Team';
?>
<?php $new = ($editable == FALSE) ? 1 : 0; ?>
<script> var socialIcons = <?= json_encode(Yii::$app->params['social-icons']); ?></script>

<div class = "container-fluid">
    <div class = "row page-titles">
        <div class = "col-md-6 align-self-center">
            <h3 class = "text-themecolor m-b-0 m-t-0">Team</h3>
        </div>
        <div class = "col-md-6 align-self-center text-right">
            <?php if (!$new) : ?>
                <a href = "<?php echo Yii::$app->request->baseUrl; ?>/team/" class = "btn btn-primary">
                    <i class = "mdi mdi-plus m-r-5"></i>
                    Add New Team Member
                </a>
            <?php endif; ?>
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-4 col-sm-12">
            <div class = "card extended">
                <div class = "card-header">
                    <?php if ($new): ?>
                        <h5 class = "card-title">Add New Team Member</h5>
                    <?php else: ?>
                        <h5 class = "card-title">Edit <?php echo $editable['name']; ?> </h5>
                    <?php endif; ?>
                </div>
                <div class = "card-body">
                    <form method = "post" action = "<?php echo Yii::$app->request->baseUrl; ?>/team/update/" enctype = "multipart/form-data">
                        <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
                        <input type = "hidden" name = "team[id]" value = "<?php echo(isset($editable['id']) ? \common\components\Misc::encrypt($editable['id']) : 0) ?>">

                        <?php $counter = 0; ?>
                        <div class = "form-group">
                            <?php $counter++; ?>
                            <label for = "<?php echo $counter; ?>" class = "control-label">Name</label>
                            <input id = "<?php echo $counter; ?>" value = "<?php echo(isset($editable['name']) ? $editable['name'] : '') ?>" name = "team[name]" type = "text" class = "form-control required">
                        </div>
                        <div class = "form-group">
                            <?php $counter++; ?>
                            <label for = "<?php echo $counter; ?>" class = "control-label">Position</label>
                            <input id = "<?php echo $counter; ?>" name = "team[position]" value = "<?php echo(isset($editable['position']) ? $editable['position'] : '') ?>" type = "text" class = "form-control required">
                        </div>
                        <div class = "form-group">
                            <?php $counter++; ?>
                            <label for = "<?php echo $counter; ?>" class = "control-label">Email</label>
                            <input id = "<?php echo $counter; ?>" value = "<?php echo(isset($editable['email']) ? $editable['email'] : '') ?>" name = "team[email]" type = "text" class = "form-control email">
                        </div>
                        <div class = "form-group">
                            <?php $counter++; ?>
                            <label for = "<?php echo $counter; ?>" class = "control-label">Phone</label>
                            <input id = "<?php echo $counter; ?>" value = "<?php echo(isset($editable['phone']) ? $editable['phone'] : '') ?>" name = "team[phone]" type = "text" class = "form-control">
                        </div>
                        <!--                        <pre>--><?php //print_r($editable['social_media']); die; ?><!--</pre>-->
                        <div class = "form-group bordered social-media-wrapper">
                            <div class = "form-group-title">
                                <span><strong>Social Media</strong></span>
                                <a href = "javascript:void(0);" class = "pull-right add-social-media-item">
                                    <i class = "mdi mdi-plus"></i>
                                    Add Social Media
                                </a>
                                <div class = "clearfix"></div>
                            </div>

                            <div class = "social-media-container">

                                <table class = "table  table-striped social-media-input-table" style = "<?= (isset($editable['social_media']) && $editable['social_media'] != '') ? '' : 'display:none;' ?>">
                                    <tbody>
                                        <?php if (isset($editable['social_media']) && $editable['social_media'] != ''):
                                            $row = 0;
                                            foreach ($editable['social_media'] as $key => $media) : ?>
                                                <tr>
                                                    <td>
                                                        <select name = "team[social][<?= $row ?>][media]" class = "form-control">
                                                            <option value = "">Select Media</option>
                                                            <?php foreach (Yii::$app->params['social-icons'] as $k => $i) : ?>
                                                                <option <?= ($k == $media->media) ? 'selected="selected"' : '' ?> value = "<?= $k ?>">
                                                                    <?php echo ucwords($i['name']) ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <!--                                                        <pre>--><?php //print_r($media); ?><!--</pre>-->
                                                        <?php $counter++; ?>
                                                        <input id = "s-<?php echo $counter; ?>" name = "team[social][<?= $row ?>][link]" type = "text" class = "form-control required" placeholder = "Link" value = "<?= (isset($media->link) && $media->link != '') ? $media->link : '' ?>">
                                                    </td>
                                                    <td>
                                                        <a href = "javascript:void(0);" class = "delete-media">
                                                            <i class = "fa fa-times"></i>
                                                        </a>
                                                    </td>

                                                </tr>
                                                <?php $row++;
                                            endforeach; ?><?php endif; ?>

                                    </tbody>

                                </table>
                            </div>

                        </div>
                        <div class = "form-group">
                            <?php $counter++; ?>
                            <label for = "<?php echo $counter; ?>" class = "control-label">Description</label>
                            <textarea id = "<?php echo $counter; ?>" name = "team[description]" class = "form-control summernote-basic required"><?php echo(isset($editable['description']) ? $editable['description'] : '') ?></textarea>
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
                    <h5 class = "card-title">Team Members</h5>
                </div>
                <div class = "card-body">
                    <?php if (isset($team) && count($team) > 0): ?>

                        <div class = "table-responsive">
                            <table class = "table  table-striped" data-plugin = "datatable">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($team as $member) : ?>
                                        <tr>
                                            <td>
                                                <div class = "image-wrapper">
                                                    <?php if (isset($member['image']) && $member['image'] != ''): ?>
                                                        <img class = "img-responsive" src = "<?php echo Yii::$app->request->baseUrl . '/../common/assets/images/uploads/' . $member['image']; ?>">
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                            <td><?php echo ucwords($member['name']); ?></td>
                                            <td>
                                                <?php if ($member['position'] != ''): echo $member['position']; endif; ?>
                                            </td>

                                            <td><?php echo \common\components\Misc::dmY($member['created_on']); ?></td>
                                            <td class = "text-right">
                                                <a class = "btn btn-primary btn-sm" href = "<?php echo Yii::$app->request->baseUrl; ?>/team/edit/<?php echo \common\components\Misc::encrypt($member['id']) ?>">Edit</a>
                                                <a class = "btn btn-default btn-sm delete-item" href = "javascript:void();" data-id = "<?php echo \common\components\Misc::encrypt($member['id']); ?>" data-tab="Team">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>

                        <h4>Clientele is empty.</h4>

                    <?php endif; ?>

                </div>

            </div>
        </div>
    </div>

</div>