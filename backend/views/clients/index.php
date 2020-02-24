<?php
$this->title = Yii::$app->params['system_name'] . ' | Clients';
?>
<?php $new = ($editable == false) ? 1 : 0; ?>
<div class="container-fluid">
   <div class="row page-titles">
      <div class="col-md-6 align-self-center">
         <h3 class="text-themecolor m-b-0 m-t-0">Clients</h3>
      </div>
      <div class="col-md-6 align-self-center text-right">
          <?php if (!$new) : ?>
             <a href="<?php echo Yii::$app->request->baseUrl; ?>/clients/" class="btn btn-primary">
                <i class="mdi mdi-plus m-r-5"></i>
                Add New Client
             </a>
          <?php endif; ?>
      </div>
   </div>

   <div class="row">
      <div class="col-md-4 col-sm-12">
         <div class="card extended">
            <div class="card-header">
                <?php if ($new): ?>
                   <h5 class="card-title">Add New Client</h5>
                <?php else: ?>
                   <h5 class="card-title">Edit <?php echo $editable['name']; ?> </h5>
                <?php endif; ?>

            </div>
            <div class="card-body">
               <form method="post" action="<?php echo Yii::$app->request->baseUrl; ?>/clients/update/" enctype="multipart/form-data">
                  <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>"/>
                  <input type="hidden" name="client[id]" value="<?php echo(isset($editable['id']) ? \common\components\Misc::encrypt($editable['id']) : 0) ?>">

                   <?php $counter = 0; ?>
                  <div class="form-group">
                      <?php $counter++; ?>
                     <label for="<?php echo $counter; ?>" class="control-label">Name</label>
                     <input id="<?php echo $counter; ?>" value="<?php echo(isset($editable['name']) ? $editable['name'] : '') ?>" name="client[name]" type="text" class="form-control required">
                  </div>
                  <div class="form-group">
                      <?php $counter++; ?>
                     <label for="<?php echo $counter; ?>" class="control-label">Extra Information</label>
                     <input id="<?php echo $counter; ?>" value="<?php echo(isset($editable['info']) ? $editable['info'] : '') ?>" name="client[info]" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                      <?php $counter++; ?>
                     <label for="<?php echo $counter; ?>" class="control-label">Hyperlink</label>
                     <input id="<?php echo $counter; ?>" name="client[link]" value="<?php echo(isset($editable['link']) ? $editable['link'] : '') ?>" type="text" class="form-control url">
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class=" col-sm-6 col-xs-12">
                            <?php $counter++; ?>
                           <label for="<?php echo $counter; ?>" class="control-label">Show in Home Page</label>
                           <select id="<?php echo $counter; ?>" name="client[on_home]" class="form-control required">
                              <option <?php echo (isset($editable['on_home']) && $editable['on_home'] == 1) ? 'selected = "selected"' : '' ?> value="1">Show</option>
                              <option <?php echo (isset($editable['on_home']) && $editable['on_home'] == 0) ? 'selected = "selected"' : '' ?> value="0">Hide</option>
                           </select>
                        </div>
                        <div class=" col-sm-6 col-xs-12">
                            <?php $counter++; ?>
                           <label for="<?php echo $counter; ?>" class="control-label">Show in About Page</label>
                           <select id="<?php echo $counter; ?>" name="client[on_about]" class="form-control required">
                              <option <?php echo (isset($editable['on_about']) && $editable['on_about'] == 1) ? 'selected = "selected"' : '' ?> value="1">Show</option>
                              <option <?php echo (isset($editable['on_about']) && $editable['on_about'] == 0) ? 'selected = "selected"' : '' ?> value="0">Hide</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label">Upload Logo</label>
                      <?php $counter++; ?>
                     <div class="custom-file">

                        <div class="image-wrapper" <?= (isset($editable['image']) && $editable['image'] != '') ? '' : 'style="display:none;"' ?>>
                           <img src="<?php echo (isset($editable['image']) && $editable['image'] != '') ? Yii::$app->request->baseUrl . '/../common/assets/images/uploads/' . $editable['image'] : '' ?>" class="custom-file-input-image" id="file-<?php echo $counter; ?>-image" alt=""/>
                        </div>
                         <?php if (isset($editable['image']) && $editable['image'] != ''): ?>
                            <div class="image-actions text-right">
                               <a href="javascript:void();" class="remove-image" data-tab="blog" data-id="<?php echo \common\components\Misc::encrypt($editable['id']) ?>">
                                  <i class="mdi mdi-close margin-right-5"></i>
                                  Remove Image
                               </a>
                            </div>
                         <?php endif; ?>
                        <label class="custom-file-label" id="file-<?php echo $counter; ?>-label" for="file-<?php echo $counter; ?>">
                           <i class="fa fa-file"></i>
                           <span>Upload Image</span>
                        </label>
                        <input accept="image/x-png,image/jpeg" type="file" name="image" class="custom-file-input" id="file-<?php echo $counter; ?>" onchange="readURL(this);" aria-describedby="file-<?php echo $counter; ?>" src="<?php echo (isset($editable['image']) && $editable['image'] != '') ? $editable['image'] : '' ?>">
                     </div>
                  </div>

                  <div class="form-group m-t-40 m-b-0 text-right">
                     <button class="btn btn-primary" type="submit">
                        <i class="mdi mdi-check"></i>
                        Save
                     </button>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="col-md-8 col-sm-12">
         <div class="card extended">
            <div class="card-header">
               <h5 class="card-title">Client List</h5>
            </div>
            <div class="card-body ">
                <?php if (isset($clients) && count($clients) > 0): ?>
                   <table class="table  table-striped" data-plugin="datatable">
                      <thead>
                      <tr>
                         <th>Image</th>
                         <th>Name</th>
                         <th>Link</th>
                         <th>Date</th>
                         <th></th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($clients as $client) : ?>
                         <tr>
                            <td>
                               <div class="image-wrapper">
                                   <?php if (isset($client['image']) && $client['image'] != ''): ?>
                                      <img class="img-responsive" src="<?php echo Yii::$app->request->baseUrl . '/../common/assets/images/uploads/' . $client['image']; ?>">
                                   <?php endif; ?>
                               </div>
                            </td>
                            <td><?php echo ucwords($client['name']); ?></td>
                            <td>
                                <?php if ($client['link'] != ''): ?>
                                   <a href="<?php echo $client['link']; ?>"><?php echo $client['link']; ?></a>
                                <?php endif; ?>
                            </td>
                            <td><?php echo \common\components\Misc::dmY($client['created_on']); ?></td>
                            <td class="text-right">
                               <a class="btn btn-primary btn-sm" href="<?php echo Yii::$app->request->baseUrl; ?>/clients/edit/<?php echo \common\components\Misc::encrypt($client['id']) ?>">Edit</a>
                               <a class="btn btn-default btn-sm delete-item" href="javascript:void();" data-tab="Clients" data-id="<?php echo \common\components\Misc::encrypt($client['id']); ?>">Delete</a>
                            </td>
                         </tr>
                      <?php endforeach; ?>

                      </tbody>
                   </table>
                <?php else: ?>
                   <h4>No Clients Found.</h4>
                <?php endif; ?>
            </div>

         </div>
      </div>
   </div>

</div>