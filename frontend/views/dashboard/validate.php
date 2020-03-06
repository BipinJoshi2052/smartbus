<div class = "page-section">
   <div class = "row">
      <div class = "col-lg-8 col-md-12 col-sm-12 col-xs-12">
         <div class = "card">
            <div class = "card-body">
<form method = "post" action = "<?php echo Yii::$app->request->baseUrl; ?>/" enctype = "multipart/form-data">
   <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
   <?php $counter = 0; ?>
   <div class = "form-group">
       <?php $counter++; ?>
      <label for = "<?php echo $counter; ?>" class = "control-label required">Title</label>
      <input id = "<?php echo $counter; ?>" name = "post[title]" type = "text" class = "form-control required" value = "<?php echo (isset($editable['title'])) ? $editable['title'] : '' ?>">
   </div>
    <div class = "form-group">
        <?php $counter++; ?>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>
            </div>
         </div>
      </div>
   </div>
</div>