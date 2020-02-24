<?php

    $this->title = Yii::$app->params['system_name'] . ' | Page Sections';
    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/jquery.matchHeight-min.js');
?>
<div class = "container-fluid ">
    <div class = "row page-titles">
        <div class = "col-md-6 align-self-center">
            <h3 class = "text-themecolor m-b-0 m-t-0"><?php echo $page['label']; ?> Sections</h3>
        </div>
        <div class = "col-md-6 align-self-center text-right">
            <a href = "<?php echo Yii::$app->request->baseUrl; ?>/sections/section" class = "btn btn-primary">
                <i class = "mdi mdi-plus m-r-5"></i>
                Add New Section
            </a>
        </div>
    </div>
    <div class = "row">
        <div class = "col-md-4 col-sm-6 col-xs-12 <?php echo ($page['name'] == 'home') ? 'd_none' : '' ?>">
            <form method = "post" enctype = "multipart/form-data" action = "<?php echo Yii::$app->request->baseUrl; ?>/sections/update-page/">
                <div class = "card extended">
                    <div class = "card-header">
                        <h5 class = "card-title">Page Details</h5>
                    </div>
                    <?php if (isset($page['image']) && $page['image'] != ''): ?>
                        <div class = "page-image">
                            <div class = "image-actions">
                                <a href = "javascript:void();" class = "remove-image" data-tab = "Pages" data-id = "<?php echo \common\components\Misc::encrypt($page['id']) ?>">
                                    <i class = "mdi mdi-close margin-right-5"></i>
                                    Remove Image
                                </a>
                            </div>
                            <div class = "image-wrapper">
                                <img class = "img-responsive" src = "<?php echo Yii::$app->request->baseUrl; ?>/../common/assets/images/uploads/<?php echo $page['image']; ?>" alt = "<?php echo $page['name']; ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class = "card-body">
                        <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
                        <input type = "hidden" name = "page[id]" value = "<?php echo $page['id']; ?>">

                        <?php $counter = 0; ?>
                        <div class = "form-group">
                            <?php $counter++; ?>
                            <label for = "<?php echo $counter; ?>" class = "control-label">Page Title</label>
                            <input id = "<?php echo $counter; ?>" value = "<?php echo(isset($page['label']) ? $page['label'] : '') ?>" name = "page[label]" type = "text" class = "form-control required">
                        </div>
                        <div class = "form-group">
                            <?php $counter++; ?>
                            <label for = "<?php echo $counter; ?>" class = "control-label">Page Status</label>

                            <select id = "<?php echo $counter; ?>" name = "page[on_menu]" class = "form-control">
                                <option <?php echo ($page['on_menu'] == 0) ? 'selected= "selected"' : ''; ?> value = "0">Not Published</option>
                                <option <?php echo ($page['on_menu'] == 1) ? 'selected= "selected"' : ''; ?> value = "1">Published</option>
                            </select>
                        </div>
                        <div class = "form-group">
                            <?php $counter++; ?>
                            <label for = "<?php echo $counter; ?>" class = "control-label">Header Background</label>
                            <input accept = "image/x-png,image/jpeg" id = "<?php echo $counter; ?>" name = "image" type = "file" class = "form-control">
                        </div>

                    </div>
                    <div class = "card-footer text-right">
                        <button type = "submit" class = "btn btn-primary">
                            <i class = "mdi mdi-check m-r-5"></i>
                            Save Page
                        </button>
                    </div>
                </div>
            </form>
            <?php if ($page['name'] == 'contact'): ?>
                <script> var socialIcons = <?= json_encode(Yii::$app->params['social-icons']); ?></script>

                <form method = "post" action = "<?php echo Yii::$app->request->baseUrl; ?>/sections/update-social-media/">
                    <div class = "card extended">
                        <div class = "card-header">
                            <h5 class = "card-title pull-left">Social Media</h5>
                            <div class = "card-actions">
                                <a href = "javascript:void(0);" class = "pull-right btn btn-secondary add-social-media-item">
                                    <i class = "mdi mdi-plus"></i>
                                    Add Social Media
                                </a>
                            </div>
                            <div class = "clearfix"></div>
                        </div>
                        <div class = "card-body p-0">

                            <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
                            <input type = "hidden" name = "team[id]" value = "<?= Yii::$app->params['settings']['social_media']['id'] ?>">
                            <?php
                                $social = (Yii::$app->params['settings']['address']['content'] != '') ? json_decode(Yii::$app->params['settings']['social_media']['content']) : [];
                            ?>

                            <table class = "table  table-striped social-media-input-table" style = "<?= (isset($social) && count($social) > 0) ? '' : 'display:none;' ?>">
                                <tbody>
                                    <?php
                                        if (isset($social) && count($social) > 0) :
                                            $row = 0;
                                            foreach ($social as $key => $media) :?>
                                                <tr>
                                                    <td>
                                                        <select name = "team[social][<?= $row ?>][media]" class = "form-control required">
                                                            <option value = "">Select Media</option>
                                                            <?php foreach (Yii::$app->params['social-icons'] as $k => $i) : ?>
                                                                <option <?= ($k == $media->media) ? 'selected="selected"' : '' ?> value = "<?= $k ?>">
                                                                    <?php echo ucwords($i['name']) ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </td>
                                                    <td>

                                                        <input id = "" name = "team[social][<?= $row ?>][link]" type = "text" class = "form-control required" placeholder = "Link" value = "<?= (isset($media->link) && $media->link != '') ? $media->link : '' ?>">
                                                    </td>
                                                    <td>
                                                        <a href = "javascript:void(0);" class = "delete-media">
                                                            <i class = "fa fa-times"></i>
                                                        </a>
                                                    </td>

                                                </tr>
                                                <?php $row++;
                                            endforeach; endif;
                                    ?>

                                </tbody>

                            </table>
                        </div>
                        <div class = "card-footer text-right">
                            <button type = "submit" class = "btn btn-primary">
                                <i class = "mdi mdi-check m-r-5"></i>
                                Save Social Media
                            </button>
                        </div>
                    </div>
                </form>

            <?php endif; ?>
        </div>
        <div class = "col-md-8 col-sm-6 col-xs-12">
            <div class = "card extended">
                <div class = "card-header">
                    <h5 class = "card-title">Sections</h5>
                </div>
                <div class = "card-body">
                    <?php if (!empty($sections) && count($sections) > 0): ?>
                        <div class = "table-responsive">
                            <table class = "table  table-striped" data-plugin = "datatable">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Section Title</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $count = 0;
                                        foreach ($sections as $section) :
                                            $count++; ?>
                                            <tr>
                                                <td><?php echo $count;//echo (isset($section['created_on'])) ?: \common\components\Misc::Ymd($section['created_on'])
                                                    ?></td>
                                                <td><?php echo (isset($section['title'])) ? trim($section['title']) : '' ?></td>
                                                <td class = "text-right">
                                                    <a class = "btn btn-primary btn-sm" href = "<?php echo Yii::$app->request->baseUrl; ?>/sections/section/<?php echo \common\components\Misc::encrypt($section['id']); ?>">Edit</a>
                                                    <a class = "btn btn-default btn-sm delete-item" href = "javascript:void(0);" data-id = "<?php echo \common\components\Misc::encrypt($section['id']); ?>" data-table = "Sections">Delete</a>
                                                </td>
                                            </tr>
                                            <?php

                                        endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <h3>Sorry, No Sections Found</h3>
                    <?php endif; ?>
                </div>
            </div>
            <?php if ($page['name'] == 'contact'): ?>
                <form method = "post" action = "<?php echo Yii::$app->request->baseUrl; ?>/sections/update-contact-info/">
                    <div class = "card extended">
                        <div class = "card-header">
                            <h5 class = "card-title pull-left">Contact Details</h5>
                            <div class = "card-actions">
                                <a href = "javascript:void(0);" class = "btn btn-secondary btn-sm add-contact-details">
                                    <i class = "mdi mdi-plus"></i>
                                    Add More Contact Details
                                </a>
                            </div>
                            <div class = "clearfix"></div>
                        </div>
                        <div class = "card-body p-0">

                            <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
                            <input type = "hidden" name = "setting[id]" value = "<?= Yii::$app->params['settings']['address']['id'] ?>">

                            <?php  $contact = (Yii::$app->params['settings']['address']['content'] != '') ? json_decode(Yii::$app->params['settings']['address']['content']) : [];  ?>
                            <ul class = "p-0 m-0 list-style-none contact-info row" style = "<?= (is_array($contact) && !empty($contact) && count($contact) > 0) ? '' : 'display:none;' ?>">
                                <?php if (is_array($contact) && !empty($contact) && count($contact) > 0) : $row = 0;
                                    foreach ($contact as $k => $c) : ?>
                                        <li class = "col-lg-4 col-md-6 col-sm-12  <?= ($k % 2 == 0) ? 'even' : 'odd' ?>">
                                            <div class = "p-15">
                                                <h5 class = "pull-left">Enter details here</h5>
                                                <a href = "javascript:void(0);" class = " pull-right delete-row">
                                                    <i class = "mdi mdi-close"></i>
                                                </a>
                                                <div class = "clearfix"></div>
                                                <div class = "form-group">
                                                    <?php $counter++; ?>
                                                    <label for = "<?= $row ?>-title" class = "control-label required">Title</label>
                                                    <input id = "<?= $row ?>-title" name = "setting[content][<?= $row ?>][title]" value = "<?= $c->title ?>" type = "text" class = "form-control c-title required">
                                                </div>
                                                <div class = "form-group">
                                                    <?php $counter++; ?>
                                                    <label for = "<?= $row ?>-subtitle" class = "control-label required">Sub Title</label>
                                                    <input id = "<?= $row ?>-subtitle" name = "setting[content][<?= $row ?>][subtitle]" value = "<?= $c->subtitle ?>" type = "text" class = "form-control c-subtitle required">
                                                </div>
                                                <div class = "form-group">
                                                    <?php $counter++; ?>
                                                    <label for = "<?= $row ?>-email" class = "control-label required">Email</label>
                                                    <input id = "<?= $row ?>-email" name = "setting[content][<?= $row ?>][email]" value = "<?= $c->email ?>" type = "text" class = "form-control c-email required">
                                                </div>
                                                <div class = "form-group">
                                                    <?php $counter++; ?>
                                                    <label for = "<?= $row ?>-phone" class = "control-label required">Phone</label>
                                                    <input id = "<?= $row ?>-phone" name = "setting[content][<?= $row ?>][phone]" value = "<?= $c->phone ?>" type = "text" class = "form-control c-phone required">
                                                </div>
                                                <div class = "form-group">
                                                    <?php $counter++; ?>
                                                    <label for = "<?= $row ?>-phone" class = "control-label required">Phone</label>
                                                    <select id = "<?= $row ?>-phone" name = "setting[content][<?= $row ?>][on_footer]" class = "form-control c-footer required">
                                                        <option value = "0">Hide</option>
                                                        <option value = "1">Show</option>
                                                    </select>
                                                </div>
                                                <div class = "form-group">
                                                    <?php $counter++; ?>
                                                    <label for = "<?= $row ?>-address" class = "control-label required">Address</label>
                                                    <textarea id = "<?= $row ?>-address" name = "setting[content][<?= $row ?>][address]" type = "text" class = "form-control c-address required"><?= $c->address ?></textarea>
                                                </div>
                                            </div>
                                        </li>
                                        <?php $row++; endforeach;
                                endif; ?>
                            </ul>
                        </div>
                        <div class = "card-footer text-right">
                            <button type = "submit" class = "btn btn-primary">
                                <i class = "mdi mdi-check m-r-5"></i>
                                Save Contact
                            </button>
                        </div>
                    </div>
                </form>
            <?php endif; ?>

        </div>
    </div>

</div>


