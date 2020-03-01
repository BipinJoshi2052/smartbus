<?php

$this->title = Yii::$app->params['system_name'] . ' | Sections';
//$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/');
?>
<div class = "container-fluid">

   <div class = "row page-titles">
      <div class = "col-md-12 align-self-center">
         <h3 class = "text-themecolor d_inline_b  m-b-0 m-t-0">
            <h4>Applicants Details</h4>
         </h3>
         <div class = "clearfix"></div>
      </div>
   </div>

   <div class = "page-section">
      <div class = "row">
         <div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class = "card col-md-12" style = "display: inline-block">
               <div class = "col-md-12" style = "float: left">
                  <!--                        <img src = "--><?php //echo (isset($editable['image']) && $editable['image'] != '') ? Yii::$app->request->baseUrl . '/../common/assets/images/uploads/' . $editable['image'] : Yii::$app->request->baseUrl . '/../common/assets/images/no-image.png' ?><!--" class = "custom-file-input-image" id = "file--image" alt = ""/>-->

               </div>
               <div class = "col-md-12" style = "float: left;margin-top: 10px;">
                  <p><b class = "font-18">Name: </b><?php echo $view['name'] ?></p>
                  <p><b class = "font-18">Email:</b> <?php echo $view['email'] ?></p>
                  <p><b class = "font-18">Age: </b><?php echo $view['age'] ?></p>
                  <p><b class = "font-18">City: </b><?php echo $view['city'] ?></p>
                  <p><b class = "font-18">Phone: </b><?php echo $view['phone'] ?></p>
               </div>
            </div>
         </div>

         <div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class = "card col-md-12" style = "display: inline-block">
               <div class = "col-md-12 header">
                  <!--                        <h2>Comments on this blog</h2>-->
               </div>
               <div class = "col-md comment-box">
                  <p><b class = "font-18"> Expected salary:</b> <?php echo $view['expected_salary'] ?></p>
                  <p><b class = "font-18">Experience:</b> <?php echo $view['experience'] ?></p>
                  <p><b class = "font-18">Website:</b> <a href="<?php echo $view['website'] ?>"><?php echo $view['website'] ?> </a></p>
                  <p><b class = "font-18">ViewFile:</b>
                    <?php if($view['file'] !=''){

                      echo \yii\helpers\Html::a('PDF', [
                              'careers/pdf',
                              'id' => $view['id'],
                      ], [
                           'class'  => 'btn btn-primary btn-sm',
                            'target' => '_blank',
                              ]);
                           }
                              else{ echo '<span style="color:red">No files Uploaded</span>'; } ?>
                  </p>
                  <b class = "font-18">Other Details:</b>
                  <p class = "font-light"><?php echo $view['other_details'] ?></p>

               </div>
            </div>

         </div>
      </div>
   </div>
</div>

