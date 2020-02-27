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
      <div class = "card-header">
         <h5 class = "card-title">Messages</h5>
      </div>
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

                            <a href = "javascript:void(0);" class = "btn btn-default btn-sm delete-message" data-id = "<?= $message['id'] ?>" data-tab = "Messages">
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
<div class = "modal" tabindex = "-1" role = "dialog" id = "message-box">
   <div class = "modal-dialog" role = "document">
      <!--      <div class = "modal-content">-->
      <!--         <div class = "modal-header">-->
      <!--            <h5 class = "modal-title"><span id = "message-title">Message from <span id = "message-name"></span></span></h5>-->
      <!--            <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">-->
      <!--               <span aria-hidden = "true">&times;</span>-->
      <!--            </button>-->
      <!--         </div>-->
      <!--         <div class = "modal-body">-->
      <!--            <div class = "message-header">-->
      <!--               <div class = "row">-->
      <!--                  <div class = "col-md-6 col-sm-12">-->
      <!--                     <div class = "message-header-group">-->
      <!--                        <div class = "header-title"><span class = "strong">From:</span></div>-->
      <!--                        <div class = "header-value"><span class = "strong">Name:</span><span class = "message-name"></span></div>-->
      <!--                        <div class = "header-value"><span class = "strong">Email:</span><span class = "message-email"></span></div>-->
      <!--                     </div>-->
      <!---->
      <!--                  </div>-->
      <!--                  <div class = "col-md-6 col-sm-12">-->
      <!--                     <div class = "message-header-group">-->
      <!--                        <div class = "message-header-group">-->
      <!--                           <div class = "header-title"><span class = "strong">Other Information:</span></div>-->
      <!--                           <div class = "header-value"><span class = "strong">Phone Number:</span> <span class = "message-phone"></span></div>-->
      <!--                           <div class = "header-value"><span class = "strong">Website:</span> <span class = "message-url"></span></div>-->
      <!--                        </div>-->
      <!--                     </div>-->
      <!--                  </div>-->
      <!--               </div>-->
      <!--            </div>-->
      <!--            <div class = "message-body">-->
      <!--               <h4>Message : </h4>-->
      <!--               <div class = "message-content"></div>-->
      <!--            </div>-->
      <!--         </div>-->
      <!--         <div class = "modal-footer">-->
      <!--            <button type = "button" class = "btn btn-secondary" data-dismiss = "modal">Close</button>-->
      <!--         </div>-->
      <!--      </div>-->
   </div>
</div>