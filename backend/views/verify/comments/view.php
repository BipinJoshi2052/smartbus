<?php
//echo '<pre>';
//print_r($actions);
//echo '</pre>';
//die;
$this->title = Yii::$app->params['system_name'] . ' | Sections';
//$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/');
?>
<div class = "container-fluid">
   <form enctype = "multipart/form-data" method = "post" action = "<?php echo Yii::$app->request->baseUrl; ?>/verify/post-comment/">

      <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
      <input type = "hidden" name = "post[id]" value = "<?php echo (isset($actions['id'])) ? $actions['id'] : '' ?>"/>
      <div class = "row page-titles">
         <div class = "col-md-12 align-self-center">
            <h3 class = "text-themecolor d_inline_b  m-b-0 m-t-0">
               <i class = "mdi mdi-pencil"></i> <i class = "mdi mdi-add"></i> Edit Comment
            </h3>
            <div class = "page-actions ">

               <button class = "btn btn-success" type = "submit">
                  <i class = "mdi mdi-check"></i>
                  Save
               </button>
            </div>
            <div class = "clearfix"></div>
         </div>
      </div>

      <div class = "page-section">
         <div class = "row">
            <div class = "col-lg-8 col-md-12 col-sm-12 col-xs-12">
               <div class = "card">
                  <div class = "card-body">
                      <?php $counter = 0; ?>
                     <div class = "form-group">
                        <h4>User Details</h4>
                         <?php if (isset($actions['requesteduser'])) { ?>
                            <p><b>User : </b><?php echo (isset($actions['requesteduser'])) ? $actions['requesteduser']['name'] . ' ( Registered User )' : 'This user is not signed into the system.' ?> </p>
                            <p><b>Email : </b><?php echo (isset($actions['requesteduser'])) ? $actions['requesteduser']['email'] : '' ?> </p>
                            <p><b>Phone : </b><?php echo (isset($actions['requesteduser'])) ? $actions['requesteduser']['phone'] : '' ?> </p>
                            <p><b>Role : </b><?php echo (isset($actions['requesteduser']['role0']['display_name'])) ? $actions['requesteduser']['role0']['display_name'] : '' ?> </p>
                         <?php } else {
                             echo '<p>Anonymous User</p>';
                         } ?><br>
                        <h4>Information from the form</h4>
                        <p><b>Name : </b><?php echo (isset($actions['name'])) ? $actions['name'] : '' ?> </p>
                        <p><b>Email : </b><?php echo (isset($actions['email'])) ? $actions['email'] : '' ?></p>
                        <p><b>Phone : </b><?php echo (isset($actions['phone'])) ? $actions['phone'] : '' ?></p>
                        <p><b>Commented On : </b><?php echo (isset($actions['created_on'])) ? $actions['created_on'] : '' ?></p>
                        <p><b>Blog : </b><?php echo (isset($actions['blog']['title'])) ? $actions['blog']['title'] : '' ?>&nbsp;&nbsp;<a target = "_blank" href = "<?php echo Yii::$app->request->baseUrl; ?>/blog/view/<?php echo \common\components\Misc::encrypt($actions['blog']['id']); ?>">[ View this Blog ]</a></p>
                        <p><b>Comment : </b><br><?php echo (isset($actions['comment'])) ? $actions['comment'] : '' ?></p>
                     </div>

                  </div>
               </div>
            </div>

            <div class = "col-lg-4 col-md-12 col-sm-12 col-xs-12">
               <div class = "card">
                  <div class = "card-body">
                     <div class = "form-group ">
                         <?php $counter++; ?>
                        <label for = "<?= $counter; ?>" class = "control-label required">Verify/Reject</label>
                        <select id = "<?= $counter; ?>" name = "post[verified]" class = "form-control required select" data-placeholder = "" data-allow-clear = "true">
                            <?php if ($actions['edited_status'] == 0) { ?>
                               <option disabled selected>Pending</option>
                               <option value = "1">Verify</option>
                               <option value = "0">Reject</option>

                            <?php } else { ?>
                               <option value = "1" <?= (isset($actions['is_verified']) && $actions['is_verified'] == 1) ? 'selected="selected"' : '' ?>>Verify</option>
                               <option value = "0" <?= (isset($actions['is_verified']) && $actions['is_verified'] == 0) ? 'selected="selected"' : '' ?>>Reject</option>
                            <?php } ?>
                        </select>
                     </div>
                     <div class = "form-group">
                         <?php $counter++; ?>
                        <label for = "<?php echo $counter; ?>" class = "control-label required">Verification Comment</label>
                        <textarea class = "form-control required" name = "post[verification_comment]" id = "<?php echo $counter; ?>" cols = "30" rows = "10"><?php echo (isset($actions['verification_comment'])) ? $actions['verification_comment'] : '' ?></textarea>
                     </div>
                  </div>
               </div>
            </div>
         </div>

   </form>
</div>