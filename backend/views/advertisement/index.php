<?php
$this->title = Yii::$app->params['system_name'] . ' | Advertisement';

?>
<div class = "container-fluid">
   <div class = "row page-titles">
      <div class = "col-md-6 align-self-center">
         <h3 class = "text-themecolor m-b-0 m-t-0">
            <i class = "mdi mdi-wallet-giftcard"></i>
            Advertisements
         </h3>
      </div>
      <div class = "col-md-6 align-self-center text-right">
         <a href = "<?php echo Yii::$app->request->baseUrl; ?>/advertisement/post/" class = "btn btn-primary">
            <i class = "mdi mdi-plus m-r-5"></i>
            Add New Adds
         </a>
      </div>
   </div>
   <div class = "card extended blog-post-wrapper">
      <div class = "card-header">
         <h5 class = "card-title">All Adds</h5>
      </div>
      <div class = "card-body">
          <?php if (!empty($add) && count($add) > 0): ?>
             <div class = "table-responsive">
                <table class = "table  table-striped blog-post" data-plugin = "datatable">
                   <thead>
                   <tr>
                      <th>S.N</th>
                      <th>Image</th>
                      <th>Title</th>
                      <th>Company</th>

                      <th>Visibility</th>
                      <th>Expiring-on</th>
                      <th>Action</th>
                   </tr>
                   </thead>
                   <tbody>
                   <?php
                   $count = 0;
                   $sn = 1;
                   foreach ($add as $a => $post) :
                       $count++; ?>
                      <tr>
                         <td><?php echo $sn++ ?></td>
                         <td>
                             <?php if ($post['image'] != ''): ?>
                                <div class = "image-wrapper">
                                   <img src = "<?php echo Yii::$app->request->baseUrl; ?>/../common/assets/images/uploads/<?= $post['image'] ?>" alt = "">
                                </div>
                             <?php endif; ?>
                         </td>
                         <td><?php echo (isset($post['title'])) ? trim($post['title']) : '' ?></td>
                         <td><?php echo (isset($post['company'])) ? trim($post['company']) : '' ?></td>

                         <td>
                            <form method = "post" action = "<?php echo Yii::$app->request->baseUrl; ?>/advertisement/status" enctype = "multipart/form-data">
                               <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
                               <input type = "hidden" name = "add" value = "<?php echo (isset($post['id'])) ? $post['id'] : '' ?>"/>
                                <?php $counter = 0; ?>

                                <?php if ($post['is_active'] != 1): ?>
                                   <button class = "btn btn-danger" name="inactive" value="0"><i class = "mdi mdi-close"></i></button>
                                <?php else: ?>
                                   <button class = "btn btn-success" name="active" value="1"><i class = "mdi mdi-check"></i></button>
                                <?php endif; ?>
                            </form>

                         </td>
                         <td>
                             <?php echo $post['expiring_on']?>
                         </td>

                         <td class = "text-right">
                            <a class = "btn btn-primary btn-sm" href = "<?php echo Yii::$app->request->baseUrl; ?>/advertisement/post/<?php echo \common\components\Misc::encrypt($post['id']); ?>">Edit</a>
                            <a class = "btn btn-danger btn-sm delete-add" href = "javascript:void(0);" data-id = "<?php echo $post['id'] ?>" data-tab = "Advertisement">Delete</a>
                         </td>
                      </tr>
                   <?php

                   endforeach; ?>

                   </tbody>
                </table>
             </div>
          <?php else: ?>
             <h3>Sorry, No Posts Found</h3>
          <?php endif; ?>
      </div>
   </div>

</div>
