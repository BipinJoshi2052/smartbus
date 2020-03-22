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
                     <select id = "<?php echo $counter; ?>" name = "page[page_status]" class = "form-control">
                        <option <?php echo ($page['page_status'] == 0) ? 'selected= "selected"' : ''; ?> value = "0">Not Published</option>
                        <option <?php echo ($page['page_status'] == 1) ? 'selected= "selected"' : ''; ?> value = "1">Published</option>
                     </select>
                  </div>
                  <div class = "form-group">
                      <?php $selected = $page['on_menu'];
                      $sel = json_decode($selected);
                      $counter++;
                      ?>
                     <input type = "checkbox" <?php if (isset($sel->header) && $sel->header == 'header') {
                         echo 'checked="checked"';
                     } ?> id = "<?php echo $counter; ?>" name = "on_menu[header]" value = "header">
                     <label class = "checkbox-inline" for = "<?php echo $counter; ?>"> Header</label><br>
                      <?php $counter++; ?>
                     <input type = "checkbox" <?php if (isset($sel->footer) && $sel->footer == 'footer') {
                         echo 'checked="checked"';
                     } ?> id = "<?php echo $counter; ?>" name = "on_menu[footer]" value = "footer">
                     <label for = "<?php echo $counter; ?>"> Footer</label><br>

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
             <script> var socialIcons = <?= json_encode(Yii::$app->params['social-icons']);
                 ?></script>
<!--          --><?php //$social = json_encode(Yii::$app->params['social-icons']); ?>
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
                      <!--                    <pre>--><?php //print_r(json_encode(Yii::$app->params['social-icons'])); die; ?>
                      <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
                      <input type = "hidden" name = "team[id]" value = "<?= (isset($editable['id']) ? \common\components\Misc::encrypt($editable['id']) : 0); ?>">
<!--                                            <pre>--><?php //print_r($social);  ?><!--</pre>-->
                       <?php $social = (Yii::$app->params['settings']['social_media'] != '') ? json_decode(Yii::$app->params['settings']['social_media'], true) : [];
                       ?>
<!--                      <pre>--><?php //print_r($social);
//                           ?><!--</pre>-->
                      <table class = "table  table-striped social-media-input-table" style = "<?= (isset($social) && count($social) > 0) ? '' : 'display:none;' ?>">
                         <tbody>
                         <?php
                         if (isset($social) && count($social) > 0) :
                             $row = 0;
                             foreach ($social as $key => $media) : ?>

                                <tr>
                                   <td>
                                      <select name = "team[social][<?= $row ?>][media]" class = "form-control required">
                                         <option value = "">Select Media</option>
                                          <?php foreach (Yii::$app->params['social-icons'] as $k => $i) : ?>
                                             <option <?= ($k == $media['media']) ? 'selected="selected"' : '' ?> value = "<?= $k ?>">
                                                 <?php echo ucwords($i['name']) ?></option>
                                          <?php endforeach; ?>
                                      </select>
                                   </td>
                                   <td>
                                      <input  name = "team[social][<?= $row ?>][link]" type = "text" class = "form-control required" placeholder = "Link" value = "<?= (isset($media['link']) && $media['link'] != '') ? $media['link'] : '' ?>">
                                   </td>
                                   <td>
                                      <a href = "javascript:void();" class = "remove-link" data-tab = "link">
                                         <i class = "fa fa-times"></i>
                                      </a>
                                   </td>
                                </tr>
                                 <?php $row++;
                             endforeach; ?>
                         <?php else: ?>
                            <tr>
                               <td>
                                  <select name = "team[social][0][media]" class = "form-control required">
                                     <option value = "">Select Media</option>
                                      <?php foreach (Yii::$app->params['social-icons'] as $k => $i) : ?>
                                         <option value = "<?= $k ?>">
                                             <?php echo ucwords($i['name']) ?></option>
                                      <?php endforeach; ?>
                                  </select>
                               </td>
                               <td>
                                  <input id = "" name = "team[social][0][link]" type = "text" class = "form-control required" placeholder = "Link" value = "">
                               </td>
                               <td>
                                  <a href = "javascript:void();" class = "remove-link" data-tab = "link" data-id = "">
                                     <i class = "fa fa-times"></i>
                                  </a>
                               </td>

                            </tr>
                         <?php endif;
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
                   <div class = "">
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
                             $count++;
                             ?>
                            <tr>
                               <td><?php echo $count;//echo (isset($section['created_on'])) ?: \common\components\Misc::Ymd($section['created_on'])
                                   ?></td>
                               <td><?php echo (isset($section['title'])) ? trim($section['title']) : '' ?></td>
                               <td class = "text-right">
                                  <a class = "btn btn-primary btn-sm" href = "<?php echo Yii::$app->request->baseUrl; ?>/sections/section/<?php echo \common\components\Misc::encrypt($section['id']); ?>">Edit</a>
                                  <a class = "btn btn-default btn-sm delete-page-sections" href = "javascript:void(0);" data-id = "<?php echo $section['id']; ?>" data-table = "Sections">Delete</a>
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
      </div>
   </div>
</div>


