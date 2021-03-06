<?php
$this->title = Yii::$app->params['system_name'] . ' | Messages';

?>
<div class = "container-fluid">
   <div class = "row page-titles">
      <div class = "col-md-6 align-self-center">
         <h3 class = "text-themecolor m-b-0 m-t-0">
            <i class = "mdi mdi-blogger"></i>
            Messages
         </h3>
      </div>
      <!--      <div class = "col-md-6 align-self-center text-right">-->
      <!--         <a href = "--><?php //echo Yii::$app->request->baseUrl; ?><!--/blog/post" class = "btn btn-primary">-->
      <!--            <i class = "mdi mdi-plus m-r-5"></i>-->
      <!--            Add New Post-->
      <!--         </a>-->
      <!--      </div>-->
   </div>
   <div class = "card extended blog-post-wrapper">
      <div class = "card-header" style="display: -webkit-inline-flex;" >
         <h5 class = "card-title">Messages</h5>
      </div>


<p style="padding: 15px; font-size: larger">
         <?php if($count) {
            echo '<span class="label label-blue" style="margin-right: 15px;padding: 10px;">'.count($messages). ' Total Messages</span>';
            echo '<span class="label label-success" style="margin-right: 15px;padding: 10px;">'.$count['count_unseen']. ' New Messages</span>';
            echo '<span class="label label-danger" style="margin-right: 15px;padding: 10px;">'.$count['count_seen']. ' Seen messages</span>';
         } ?>
          <span id="refresh" class="label label-primary refresh hidden" style=""><i class="mdi mdi-refresh"></i>&nbsp;Refresh</span>
</p>



      <div class = "card-body">
          <?php if (count($messages) > 0):$c = 0; ?>
             <div class = "table-responsive">
                <table class = "table  table-striped blog-post" data-plugin = "datatable">
                   <thead>
                   <tr>
                      <th>S.N</th>
                      <th>Status</th>
                      <th>Date</th>
                      <th>From</th>
                      <th>Email</th>
                      <th>Message</th>
                      <th></th>
                   </tr>
                   </thead>
                   <tbody>
                   <?php
                   $count = 0;
                   $sn = 1;
                   foreach ($messages as $message) :
                       $count++; ?>
                      <tr>
                         <td><?php echo $sn++ ?></td>
                         <td class = "status" data-id = "<?php echo 'id' . $message['id'] ?>">
                             <?php if ($message['is_new'] == 1) { ?>
                                <span data-for = "new" class = "label label-success">New</span>
                             <?php } else { ?>
                                <span data-for = "seen" class = "label label-danger">Seen</span>
                             <?php } ?>
                         </td>
                         <td>
                             <?php echo $message['created_on']; ?>
                         </td>
                         <td><?php echo $message['name'] ?></td>
                         <td>
                             <?php echo $message['email'] ?>
                         </td>
                         <!--                         <td>-->
                         <!--                             --><?php //if ($post['is_active'] != 1):
                          ?>
                         <!--                                <button class = "btn btn-danger"><i class = "mdi mdi-close"></i></button>-->
                         <!--                             --><?php //else:
                          ?>
                         <!--                                <button class = "btn btn-success"><i class = "mdi mdi-check"></i></button>-->
                         <!--                             --><?php //endif;
                          ?>
                         <!--                         </td>-->
                         <td class = "text-right">

                            <a href = "javascript:void(0);" data-id = "<?php echo $message['id'] ?>" class = "btn btn-primary btn-sm show-message">
                               View
                            </a>
                            <!--                            <a class = "btn btn-primary btn-sm" href = "--><?php //echo Yii::$app->request->baseUrl;
                             ?><!--/blog/post/--><?php //echo \common\components\Misc::encrypt($message['id']);
                             ?><!--">Edit</a>-->

                            <a href = "javascript:void(0);" class = "btn btn-danger btn-sm delete-message" data-id = "<?= $message['id'] ?>" data-tab = "Messages">
                               Delete
                            </a></td>
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

<div class = "modal modal-message" tabindex = "-1" role = "dialog" id = "message-box">
   <div class = "modal-dialog" role = "document">
   </div>
</div>