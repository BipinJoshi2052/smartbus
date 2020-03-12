<?php

$this->title = Yii::$app->params['system_name'] . ' | terms';

?>
<div class = "container-fluid">
   <div class = "row page-titles">
      <div class = "col-md-6 align-self-center">
         <h3 class = "text-themecolor m-b-0 m-t-0">
            <i class = "mdi mdi-termsger"></i>
            Terms
         </h3>
      </div>
      <div class = "col-md-6 align-self-center text-right">
         <a href = "<?php echo Yii::$app->request->baseUrl; ?>/terms/post" class = "btn btn-primary">
            <i class = "mdi mdi-plus m-r-5"></i>
            Add New terms and conditions
         </a>
      </div>
   </div>
   <div class = "card extended terms-post-wrapper">
      <div class = "card-header">
         <h5 class = "card-title">Terms</h5>
      </div>
      <div class = "card-body">
          <?php if (!empty($terms) && count($terms) > 0): ?>
             <div class = "table-responsive">
                <table class = "table  table-striped terms-post" data-plugin = "datatable">
                   <thead>
                   <tr>
                      <th>S.N</th>
                      <th>Section</th>
                      <th>Terms</th>
                      <th>Action<th>
                   </tr>
                   </thead>
                   <tbody>
                   <?php
                   $count = 0;
                   $sn = 1;
                   foreach ($terms as $b =>$post) :
                       $count++; ?>
                      <tr>
                         <td><?php echo $sn++ ?></td>
                         <td><?php echo (isset($post['section'])) ? trim($post['section']) : '' ?></td>
                         <td><?php echo (isset($post['content']) && strlen($post['content']) > 50) ? substr($post['content'], 0, 50) . '...' : $post['content']?></td>
                         <td class = "text-left">
                            <a class = "btn btn-primary btn-sm" href = "<?php echo Yii::$app->request->baseUrl; ?>/terms/view/<?php echo \common\components\Misc::encrypt($post['id']); ?>" data-id = "<?php echo $post['id']; ?>" data-tab = "terms">View</a>
                            <a class = "btn btn-success btn-sm" href = "<?php echo Yii::$app->request->baseUrl; ?>/terms/post/<?php echo \common\components\Misc::encrypt($post['id']); ?>">Edit</a>
                            <a class = "btn btn-danger btn-sm delete-terms" href = "javascript:void(0);" data-id = "<?php echo $post['id']; ?>" data-tab = "terms">Delete</a>
                         </td>
                      </tr>
                   <?php endforeach; ?>

                   </tbody>
                </table>
             </div>
          <?php else: ?>
             <h3>Sorry, No Terms Found</h3>
          <?php endif; ?>
      </div>
   </div>

</div>
