<?php
//echo '<pre>';
//print_r($page);
//echo '</pre>';
//die;
$this->title = Yii::$app->params['system_name'] . ' | Blog';

?>
<div class = "container-fluid">
   <div class = "row page-titles">
      <div class = "col-md-6 align-self-center">
         <h3 class = "text-themecolor m-b-0 m-t-0">
            <i class = "mdi mdi-blogger"></i>
          Client Page Management
         </h3>
      </div>
      <div class = "col-md-6 align-self-center text-right">
         <a href = "<?php echo Yii::$app->request->baseUrl; ?>/clients/post" class = "btn btn-primary">
            <i class = "mdi mdi-plus m-r-5"></i>
            Add New Post
         </a>
      </div>
   </div>
   <div class = "card extended blog-post-wrapper">
      <div class = "card-header">
         <h5 class = "card-title">View Clients Page List</h5>
      </div>
      <div class = "card-body">
          <?php if (!empty($page) && count($page) > 0): ?>
             <div class = "table-responsive">
                <table class = "table  table-striped " data-plugin = "datatable">
                   <thead style="text-align: center">
                   <tr>
                      <th>S.N</th>
                      <th>Client</th>
                      <th>Title</th>
                      <th>Remark</th>
                      <th>Action</th>
                   </tr>
                   </thead>
                   <tbody>
                   <?php
                   $count = 0;
                   $sn = 1;
                   foreach ($page as $b =>$post) :
                       $count++; ?>
                      <tr>
                         <td><?php echo $sn++ ?></td>
                         <td><?php foreach ($clients as $c): ?><?php if($post['client_id'] == $c['id'] ) {
                           echo $c['name'];    }?>
                         <?php endforeach; ?></td>
                         <td>
                            <?php echo $post['title']?>
                         </td>
                         <td>
                             <?php echo $post['remark']?>
                         </td>

                         <td class = "text-right">
<!--                            <a class = "btn btn-default btn-sm" href = "--><?php //echo Yii::$app->request->baseUrl; ?><!--/clients/view/--><?php //echo \common\components\Misc::encrypt($post['id']); ?><!--" data-id = "--><?php //echo $post['id']; ?><!--" data-tab = "Blog">View</a>-->
                            <a class = "btn btn-primary btn-sm" href = "<?php echo Yii::$app->request->baseUrl; ?>/clients/post/<?php echo \common\components\Misc::encrypt($post['id']); ?>">Edit</a>
                            <a class = "btn btn-default btn-sm delete-client-page-management" href = "javascript:void(0);" data-id = "<?php echo $post['id']; ?>" data-tab = "client-page-management">Delete</a>
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
