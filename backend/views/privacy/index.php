<?php

$this->title = Yii::$app->params['system_name'] . ' | Privacy';

?>
<div class = "container-fluid">
   <div class = "row page-titles">
      <div class = "col-md-6 align-self-center">
         <h3 class = "text-themecolor m-b-0 m-t-0">
            <i class = "mdi mdi-termsger"></i>
            Privacy
         </h3>
      </div>
      <div class = "col-md-6 align-self-center text-right">
         <a href = "<?php echo Yii::$app->request->baseUrl; ?>/privacy/post" class = "btn btn-primary">
            <i class = "mdi mdi-plus m-r-5"></i>
            Add New Privacy and Policies
         </a>
      </div>
   </div>
   <div class = "card extended Privacy-post-wrapper">
      <div class = "card-header">
         <h5 class = "card-title">Privacy</h5>
      </div>
      <div class = "card-body">
          <?php if (!empty($Privacy) && count($Privacy) > 0): ?>
             <div class = "table-responsive">
                <table class = "table  table-striped Privacy-post" data-plugin = "datatable">
                   <thead>
                   <tr>
                      <th>S.N</th>
                      <th>Section</th>
                      <th>Privacy</th>
                      <th>Action<th>
                   </tr>
                   </thead>
                   <tbody>
                   <?php
                   $count = 0;
                   $sn = 1;
                   foreach ($Privacy as $b =>$post) :
                       $count++; ?>
                      <tr>
                         <td><?php echo $sn++ ?></td>
                         <td><?php echo (isset($post['section'])) ? trim($post['section']) : '' ?></td>
                         <td><?php echo (isset($post['content']) && strlen($post['content']) > 50) ? substr($post['content'], 0, 50) . '...' : $post['content']?></td>
                         <td class = "text-left">
                            <a class = "btn btn-primary btn-sm" href = "<?php echo Yii::$app->request->baseUrl; ?>/privacy/view/<?php echo \common\components\Misc::encrypt($post['id']); ?>" data-id = "<?php echo $post['id']; ?>" data-tab = "Privacy">View</a>
                            <a class = "btn btn-success btn-sm" href = "<?php echo Yii::$app->request->baseUrl; ?>/privacy/post/<?php echo \common\components\Misc::encrypt($post['id']); ?>">Edit</a>
                            <a class = "btn btn-danger btn-sm delete-privacy" href = "javascript:void(0);" data-id = "<?php echo $post['id']; ?>" data-tab = "privacy">Delete</a>
                         </td>
                      </tr>
                   <?php endforeach; ?>

                   </tbody>
                </table>
             </div>
          <?php else: ?>
             <h3>Sorry, No Privacy Found</h3>
          <?php endif; ?>
      </div>
   </div>

</div>
