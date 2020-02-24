<?php
/* @var $this View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */
$this->title = Yii::$app->params['system_name'] . ' | ' . Yii::$app->errorHandler->exception->getMessage();
?>
<style>
   body{
      font-size: 18px;
   }
   .error-body .icon {
      display: inline-block;
      background: #5da6da;
      height: 90px;
      border-radius: 50%;
      width: 90px;
      line-height: 90px;
      font-size: 32px;
      margin-bottom: 20px;
      text-align: center;
   }

   .error-body .icon i {
      color: #ffffff;
   }
   .error-body .icon h1 {
      color: #5da6da;
   }
</style>
<div class="container">
   <div class="error-wrapper">
      <div class="error-body text-center pb-120">
         <div class="text">

            <div class="">
               <!-- <i class = "fa fa-exclamation-circle"></i> -->
              <!--  <i class="fa fa-exclamation"></i> -->
              <div class="error-img" >
                  <img src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/images/bus2.png"  alt = ""/>
              </div>
               
             <!--  <i class="icon icon-bus"></i> -->
            </div>
          <!--   <h1><?php echo Yii::$app->errorHandler->exception->statusCode; ?></h1> -->

          <!--   <h3>Sorry! <?php echo Yii::$app->errorHandler->exception->getMessage(); ?></h3> -->
          <h3 class="opps" >Sorry! Bus Not Found</h3>
          <p> There is no bus found in this route for selected date. Please try a different route or date </p>
           <!--  <p>
               For further inquiry, please send an email to
               <a href="mailto:'<?php echo Yii::$app->params['adminEmail'] ?>'"><?php echo Yii::$app->params['adminEmail'] ?></a>
            </p> -->
            <p><?php echo Yii::$app->params['system_name'] ?></p>

            <div class="error-actions margin-top-90">
               <a class="btn btn-outline-primary " href="<?php echo Yii::$app->request->baseUrl; ?>" role="button"><i class="fa fa-home m-r-6"></i>Go Home</a>
               <a class="btn btn-primary" href="javascript: history.go(-1)" role="button"><i class="fa fa-chevron-left m-r-6"></i>Go Back</a>
            </div>
         </div>
      </div>
   </div>
</div>
