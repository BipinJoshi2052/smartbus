<?php
//echo '<pre>';
//print_r($actions);
//echo '</pre>';
//die;
    $this->title = Yii::$app->params['system_name'] . ' | Clients';
?>
<?php //$new = ($editable == FALSE) ? 1 : 0; ?>
<div class = "container-fluid">
    <div class = "row page-titles">
        <div class = "col-md-6 align-self-center">
            <h3 class = "text-themecolor m-b-0 m-t-0">Verify Comments</h3>
        </div>

    </div>

   <div class = "card extended blog-post-wrapper">
      <div class = "card-header">
         <h5 class = "card-title">Comments</h5>
      </div>
      <div class = "card-body">
          <?php if (!empty($actions) && count($actions) > 0): ?>
             <div class = "table-responsive">
                <table class = "table  table-striped blog-post" data-plugin = "datatable">
                   <thead>
                   <tr>
                      <th>S.N</th>
                      <th>Commented By</th>
                      <th>Blog</th>
                      <th>Commented On</th>
                      <th>Status</th>
                      <th></th>
                   </tr>
                   </thead>
                   <tbody>
                   <?php
                   $count = 0;
                   $sn = 1;
                   foreach ($actions as $action ) :
                       $count++; ?>
                      <tr>
                         <td><?php echo $sn++ ?></td>
                         <td><?php echo (isset($action['requesteduser']['name'])) ? $action['requesteduser']['name'] : 'Anonymous' ?></td>
                         <td><?php echo (isset($action['blog'])) ? $action['blog']['title'] : '' ?></td>
                         <td><?php echo (isset($action['created_on'])) ? $action['created_on'] : '' ?></td>

                         <td>
                             <?php
                             if($action['edited_status']==0) {
                                 echo '<span class="label label-light-danger">Pending..</span>';
                             }elseif($action['is_verified'] == 1 ){
                                 echo '<span class="label label-success">Verified</span>';
                             }else{
                                 echo '<span class="label label-danger">Rejected</span>';
                             }
                             ?>
                         </td>


                         <td><a class = "btn btn-primary btn-sm" href = "<?php echo Yii::$app->request->baseUrl; ?>/verify/view-comment/<?php echo \common\components\Misc::encrypt($action['id']); ?>">View</a></td>

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