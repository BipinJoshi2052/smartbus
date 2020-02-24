<?php
$this->title = Yii::$app->params['system_name'] . ' | Sections';
//$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/');
?>
<div class = "container-fluid">
   <form enctype = "multipart/form-data" method = "post" action = "<?php echo Yii::$app->request->baseUrl; ?>/verify/post/">

      <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
      <input type = "hidden" name = "post[id]" value = "<?php echo (isset($actions['id'])) ? $actions['id'] : '' ?>"/>
      <input type = "hidden" name = "post[table_name]" value = "<?php echo (isset($actions['table_name'])) ? $actions['table_name'] : '' ?>"/>
      <input type = "hidden" name = "post[table_id]" value = "<?php echo (isset($actions['table_id'])) ? $actions['table_id'] : '' ?>"/>
      <div class = "row page-titles">
         <div class = "col-md-12 align-self-center">
            <h3 class = "text-themecolor d_inline_b  m-b-0 m-t-0">
               <i class = "mdi mdi-pencil"></i> <i class = "mdi mdi-add"></i> Edit Action
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
                        <p><b>Requested By : </b><?php echo (isset($actions['requesteduser']['name'])) ? $actions['requesteduser']['name'] : '' ?>
                        <p><b>Table name : </b><?php echo (isset($actions['table_name'])) ? $actions['table_name'] : '' ?> </p>
                        <p><b>Requested On : </b><?php echo (isset($actions['requested_on'])) ? $actions['requested_on'] : '' ?>
                        <p><b>Comment : </b><?php echo (isset($actions['comment'])) ? $actions['comment'] : '' ?>
<!--                        <p><b>Comment : </b>--><?php //echo (isset($actions['comment'])) ? $actions['comment'] : '' ?>
                             <?php if (!empty($actions['verifieduser'])) : ?>
                        <p><b>Verified By : </b><?php echo (isset($actions['verifieduser'])) ? $actions['verifieduser']['name'] : '' ?>
                            <?php endif; ?>
                     </div>
                     <div class = "form-group">
                         <?php $counter++; ?>
                        <label for = "<?php echo $counter; ?>" class = "control-label required">Verification Comment</label>
                        <textarea class = "form-control required" name = "post[verification_comment]" id = "<?php echo $counter; ?>" cols = "30" rows = "10"><?php echo (isset($actions['verification_comment'])) ? $actions['verification_comment'] : '' ?></textarea>
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
                               <option value = "1" <?= (isset($actions['verification_status']) && $actions['verification_status'] == 1) ? 'selected="selected"' : '' ?>>Verify</option>
                               <option value = "0" <?= (isset($actions['verification_status']) && $actions['verification_status'] == 0) ? 'selected="selected"' : '' ?>>Reject</option>
                            <?php } ?>
                        </select>
                     </div>
                  </div>
               </div>
            </div>
         </div>

   </form>
</div>