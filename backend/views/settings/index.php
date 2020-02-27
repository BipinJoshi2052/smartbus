<?php
$this->title = Yii::$app->params['system_name'] . ' | Website Settings';
if (isset($editable['type']) && $editable['type'] == 'json') {
    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/ace-editor/src/ace.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/ace-editor/src/mode-json.js');
}
$new = ($editable == false) ? 1 : 0; ?>
<div class = "container-fluid">
   <div class = "row page-titles p-0">
      <div class = "col-md-6 align-self-center p-0">
         <ul class = "nav nav-tabs customtab page-tabs" role = "tablist">
            <li class = "nav-item">
               <a class = "nav-link active" data-toggle = "tab" href = "#s-general" role = "tab">
                  <span class = ""><i class = "mdi mdi-settings"></i></span> <span class = "hidden-xs-down">General</span>
               </a>
            </li>
            <li class = "nav-item"><a class = "nav-link" data-toggle = "tab" href = "#s-fonts" role = "tab">
                  <span class = ""><i class = "mdi mdi-pencil"></i></span> <span class = "hidden-xs-down">Fonts</span>
               </a></li>
         </ul>
      </div>
   </div>
   <div class = "tab-content">
      <div class = "tab-pane active" id = "s-general" role = "tabpanel">
         <div class = "row">
            <div class = "col-md-4 col-sm-12">
               <div class = "card extended">
                  <div class = "card-header">
                      <?php if ($new): ?>
                         <h5 class = "card-title">Settings</h5>
                      <?php else: ?>
                         <h5 class = "card-title">Edit Setting </h5>
                      <?php endif; ?>
                  </div>
                   <?php if (!$new): ?>
                      <div class = "card-caution">
                          <?= Yii::$app->params['site-settings-caution-note']; ?>
                      </div>
                   <?php endif; ?>
                  <div class = "card-body">
                     <form method = "post" action = "<?php echo Yii::$app->request->baseUrl; ?>/settings/update/" enctype = "multipart/form-data">
                        <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
                        <input type = "hidden" name = "setting[id]" value = "<?php echo(isset($editable['id']) ? \common\components\Misc::encrypt($editable['id']) : 0) ?>">

                         <?php $counter = 0; ?>

                        <div class = "form-group">
                            <?php $counter++; ?>
                           <label for = "<?php echo $counter; ?>" class = "control-label">Slug</label>
                           <input disabled = "disabled" id = "<?php echo $counter; ?>" name = "setting[slug]" value = "<?php echo(isset($editable['slug']) ? $editable['slug'] : '') ?>" type = "text" class = "form-control">
                        </div>

                        <div class = "form-group">
                            <?php $counter++; ?>
                           <label for = "<?php echo $counter; ?>" class = "control-label">Data Type</label>
                           <select disabled = "disabled" id = "<?php echo $counter; ?>" name = "setting[type]" class = "form-control required">
                              <option <?php echo (isset($editable['type']) && $editable['type'] == 'text') ? 'selected = "selected"' : '' ?> value = "text">Text</option>
                              <option <?php echo (isset($editable['type']) && $editable['type'] == 'textarea') ? 'selected = "selected"' : '' ?> value = "textarea">Textarea</option>
                              <option <?php echo (isset($editable['type']) && $editable['type'] == 'boolean') ? 'selected = "selected"' : '' ?> value = "boolean">Boolean</option>
                              <option <?php echo (isset($editable['type']) && $editable['type'] == 'json') ? 'selected = "selected"' : '' ?> value = "json">JSON</option>
                           </select>
                        </div>
                         <?php if (!empty($editable)) : ?>
                            <div class = "form-group setting-content">
                                <?php $counter++; ?>
                               <label for = "<?php echo $counter; ?>" class = "control-label">Content</label>
                                <?php if ($editable['type'] === 'textarea'): ?>
                                   <textarea rows="7" <?= ($editable['is_editable'] == 0) ? ' disabled="disabled" ' : '' ?> required = "required" id = "<?php echo $counter; ?>" name = "setting[content]" class = "form-control required"><?php echo(isset($editable['content']) ? $editable['content'] : '') ?></textarea>
                                <?php elseif ($editable['type'] === 'json'): ?>
                                   <textarea rows="7" <?= ($editable['is_editable'] == 0) ? ' disabled="disabled" ' : '' ?> required = "required" id = "<?php echo $counter; ?>" name = "setting[content]" class = "form-control required"><?php echo(isset($editable['content']) ? $editable['content'] : '') ?></textarea>
                                <?php elseif ($editable['type'] === 'boolean'): ?>
                                   <select <?= ($editable['is_editable'] == 0) ? ' disabled="disabled" ' : '' ?> id = "<?php echo $counter; ?>" name = "setting[content]" class = "form-control required">
                                      <option <?php echo (isset($editable['content']) && $editable['content'] == '0') ? 'selected = "selected"' : '' ?> value = "0">False</option>
                                      <option <?php echo (isset($editable['content']) && $editable['content'] == '1') ? 'selected = "selected"' : '' ?> value = "1">True</option>
                                   </select>
                                <?php else: ?>
                                   <input <?= ($editable['is_editable'] == 0) ? ' disabled="disabled" ' : '' ?> required = "required" id = "<?php echo $counter; ?>" name = "setting[content]" value = "<?php echo(isset($editable['content']) ? $editable['content'] : '') ?>" type = "text" class = "form-control required">
                                <?php endif; ?>

                            </div>

                         <?php endif; ?>
                        <div class = "form-group">
                            <?php $counter++; ?>
                           <label for = "<?php echo $counter; ?>" class = "control-label">Caption</label>
                           <textarea id = "<?php echo $counter; ?>" name = "setting[caption]" class = "form-control"><?php echo(isset($editable['caption']) ? $editable['caption'] : '') ?></textarea>
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
                     <div class = "row">
                        <div class = "col-md-6 col-sm-12">
                           <h5 class = "card-title">Settings</h5>
                        </div>
                        <div class = "col-md-6 col-sm-12 text-right">
                           <!--                           <a class = "btn btn-primary btn-sm" href = "--><?php //echo Yii::$app->request->baseUrl; ?><!--/settings"><i class = "mdi mdi-plus"></i>Add New Setting</a>-->
                        </div>
                     </div>

                  </div>
                  <div class = "card-body ">
                      <?php if (isset($settings) && count($settings) > 0): ?>
                         <div class = "table-responsive">
                            <table class = "table  table-striped " data-plugin = "datatable">
                               <thead>
                               <tr>
                                  <th>Slug</th>
                                  <th>Content</th>
                                  <th>Action</th>
                               </tr>
                               </thead>
                               <tbody>
                               <?php foreach ($settings as $setting) :
                                   if ($setting['is_editable'] == 1): ?>
                                      <tr>
                                         <td><?php echo ucwords($setting['slug']); ?></td>
                                         <td>
                                             <?php if ($setting['type'] == 'boolean'):
                                                 if ($setting['content'] == '0'): ?>FALSE
                                                 <?php elseif ($setting['content'] == '1'): ?>TRUE
                                                 <?php endif;
                                             elseif ($setting['type'] == 'json'):
                                                 echo substr($setting['content'], 0, 20) . ' ...... ' . substr($setting['content'], -20, 20);
                                             else:
                                                 echo ucwords($setting['content']);
                                             endif; ?>
                                         </td>
                                         <td class = "text-right">
                                            <a class = "m-r-10" href = "<?php echo Yii::$app->request->baseUrl; ?>/settings/edit/<?php echo \common\components\Misc::encrypt($setting['id']) ?>">Edit</a>
                                            <!--                                            <a class = "delete-item" data-table = "setting" data-identity = "--><?php //echo \common\components\Misc::encrypt($setting['id']); ?><!--" href = "javascript:void();">Delete</a>-->
                                         </td>
                                      </tr>
                                   <?php endif;
                               endforeach; ?>

                               </tbody>
                            </table>
                         </div>
                      <?php else: ?>
                         <h4>Settings is empty.</h4>
                      <?php endif; ?>
                  </div>

               </div>
            </div>
         </div>
      </div>
      <div class = "tab-pane " id = "s-fonts" role = "tabpanel">
         <div class = "row">
            <div class = "col-md-4 col-sm-12">
               <div class = "card extended">
                  <div class = "card-header">
                      <?php if ($new): ?>
                         <h5 class = "card-title">Add New Setting</h5>
                      <?php else: ?>
                         <h5 class = "card-title">Edit Setting </h5>
                      <?php endif; ?>
                  </div>
                   <?php if (!$new): ?>
                      <div class = "card-caution">
                          <?= Yii::$app->params['site-settings-caution-note']; ?>
                      </div>
                   <?php endif; ?>
                  <div class = "card-body">
                     <form method = "post" action = "<?php echo Yii::$app->request->baseUrl; ?>/settings/update-fonts/" enctype = "multipart/form-data">
                        <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
                        <input type = "hidden" name = "setting[id]" value = "<?php echo(isset($editable['id']) ? $editable['id'] : 0) ?>">

                         <?php $counter = 0; ?>

                        <div class = "form-group">
                            <?php $counter++; ?>
                           <label for = "<?php echo $counter; ?>" class = "control-label">Slug</label>
                           <input disabled = "disabled" id = "<?php echo $counter; ?>" name = "setting[slug]" value = "<?php echo(isset($editable['slug']) ? $editable['slug'] : '') ?>" type = "text" class = "form-control">
                        </div>

                        <div class = "form-group">
                            <?php $counter++; ?>
                           <label for = "<?php echo $counter; ?>" class = "control-label">Data Type</label>
                           <select disabled = "disabled" id = "<?php echo $counter; ?>" name = "setting[type]" class = "form-control required">
                              <option <?php echo (isset($editable['type']) && $editable['type'] == 'text') ? 'selected = "selected"' : '' ?> value = "text">Text</option>
                              <option <?php echo (isset($editable['type']) && $editable['type'] == 'textarea') ? 'selected = "selected"' : '' ?> value = "textarea">Textarea</option>
                              <option <?php echo (isset($editable['type']) && $editable['type'] == 'boolean') ? 'selected = "selected"' : '' ?> value = "boolean">Boolean</option>
                              <option <?php echo (isset($editable['type']) && $editable['type'] == 'json') ? 'selected = "selected"' : '' ?> value = "json">JSON</option>
                           </select>
                        </div>
                        <div class = "form-group setting-content">
                            <?php $counter++; ?>
                           <label for = "<?php echo $counter; ?>" class = "control-label">Content</label>
                            <?php if (!empty($editable)) : ?>

                                <?php if ($editable['type'] === 'textarea'): ?>
                                  <textarea <?= ($editable['is_editable'] == 0) ? ' disabled="disabled" ' : '' ?> required = "required" id = "<?php echo $counter; ?>" name = "setting[content]" class = "form-control required"><?php echo(isset($editable['content']) ? $editable['content'] : '') ?></textarea>
                                <?php elseif ($editable['type'] === 'json'): ?>
                                  <textarea <?= ($editable['is_editable'] == 0) ? ' disabled="disabled" ' : '' ?> required = "required" id = "<?php echo $counter; ?>" name = "setting[content]" class = "form-control required"><?php echo(isset($editable['content']) ? $editable['content'] : '') ?></textarea>
                                <?php elseif ($editable['type'] === 'boolean'): ?>
                                  <select <?= ($editable['is_editable'] == 0) ? ' disabled="disabled" ' : '' ?> id = "<?php echo $counter; ?>" name = "setting[content]" class = "form-control required">
                                     <option <?php echo (isset($editable['content']) && $editable['content'] == '0') ? 'selected = "selected"' : '' ?> value = "0">False</option>
                                     <option <?php echo (isset($editable['content']) && $editable['content'] == '1') ? 'selected = "selected"' : '' ?> value = "1">True</option>
                                  </select>
                                <?php else: ?>
                                  <input <?= ($editable['is_editable'] == 0) ? ' disabled="disabled" ' : '' ?> required = "required" id = "<?php echo $counter; ?>" name = "setting[content]" value = "<?php echo(isset($editable['content']) ? $editable['content'] : '') ?>" type = "text" class = "form-control required">
                                <?php endif; ?><?php endif; ?>
                        </div>
                        <div class = "form-group">
                            <?php $counter++; ?>
                           <label for = "<?php echo $counter; ?>" class = "control-label">Caption</label>
                           <textarea id = "<?php echo $counter; ?>" name = "setting[caption]" class = "form-control"><?php echo(isset($editable['caption']) ? $editable['caption'] : '') ?></textarea>
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
                     <h5 class = "card-title">Settings</h5>
                  </div>
                  <div class = "card-body ">
                      <?php if (isset($settings) && count($settings) > 0): ?>
                         <div class = "table-responsive">
                            <table class = "table  table-striped " data-plugin = "datatable">
                               <thead>
                               <tr>
                                  <th>Slug</th>
                                  <th>Content</th>
                                  <th>Action</th>
                               </tr>
                               </thead>
                               <tbody>
                               <?php foreach ($settings as $setting) : ?>
                                  <tr>
                                     <td><?php echo ucwords($setting['slug']); ?></td>
                                     <td>
                                         <?php if ($setting['type'] == 'boolean'):
                                             if ($setting['content'] == '0'): ?>FALSE
                                             <?php elseif ($setting['content'] == '1'): ?>TRUE
                                             <?php endif;
                                         elseif ($setting['type'] == 'json'):
                                             echo substr($setting['content'], 0, 20) . ' ...... ' . substr($setting['content'], -20, 20);
                                         else:
                                             echo ucwords($setting['content']);
                                         endif; ?>
                                     </td>
                                     <td class = "text-right">
                                        <a class = "m-r-10" href = "<?php echo Yii::$app->request->baseUrl; ?>/settings/edit/<?php echo \common\components\Misc::encrypt($setting['id']) ?>">Edit</a>
                                        <a class = "delete-item" data-table = "setting" data-identity = "<?php echo \common\components\Misc::encrypt($setting['id']); ?>" href = "javascript:void();">Delete</a>
                                     </td>
                                  </tr>
                               <?php endforeach; ?>

                               </tbody>
                            </table>
                         </div>
                      <?php else: ?>
                         <h4>Settings is empty.</h4>
                      <?php endif; ?>
                  </div>

               </div>
            </div>
         </div>
      </div>

   </div>
</div>


</div>

