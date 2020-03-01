<?php
//echo '<pre>';
//print_r($response);
//echo '</pre>';
//die;
/* @var $this yii\web\View */
$this->title = 'Careers';
?>
   <div class = "page-header">
      <div class = "container">
         <h1 class = "title">Careers</h1>
      </div>

   </div>
   <!-- page-header -->
   <section id = "page-content" class = "page-section">
   <div class = "container">
   <div class = "row">
   <div class = "col-sm-12 col-md-12 col-lg-7">
   <h4 style = "margin-bottom: 5px;">Careers</h4>
   <!--                <div class="row">-->
   <!--                    <div class="col-sm-6 col-md-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>-->
   <!--                    <div class="col-sm-6 col-md-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>-->
   <!--                </div>-->
   <!--                <hr />-->

   <div class = "panel-group list-style" id = "accordion">
<?php if (!empty($careers) && count($careers) > 0):
    foreach ($careers as $car) :
        if($car['is_active'] == 1):
        ?>
       <div class = "panel panel-default">
          <div class = "panel-heading">
             <div class = "panel-title">
                <a data-toggle = "collapse" data-parent = "#accordion" href = "#collapse<?php echo $car['id']?>">
                   <?php echo $car['title'];?>
                </a>
             </div>
          </div>
          <div id = "collapse<?php echo $car['id']?>" class = "panel-collapse collapse in">
             <div class = "panel-body">
               <?php echo $car['description']?>
             </div>
          </div>
       </div>
       <?php
        endif;
        endforeach;
       endif;
       ?>
       </div>
       <!--                <p>-->
       <!--                    <a href="#" class="btn btn-default">Apply Now</a>-->
       <!--                </p>-->
       </div>
        <?php Yii::$app->session->getFlash('success'); ?>
       <div class = "col-sm-12 col-md-12 col-lg-5">
          <div class = "career-form">
             <form role = "form" action = "<?= Yii::$app->request->baseUrl; ?>/site/careers" class = "form-box" name = "post" id = "careerform" method = "post" enctype = 'multipart/form-data'>
                <h3 class = "title">Apply Now</h3>
                <p id = "form-message2" class = "form-message2"></p>
                <div class = "input-text form-group">
                   <input required class = "input-name form-control" type = "text" id = "name" name = "post[name]" placeholder = "Name"/>
                </div>
                <div class = "input-email form-group">
                   <input required type = "email" id = "email" name = "post[email]" class = "form-input input-email form-control" placeholder = 'From E-Mail'/>
                </div>
                <div class = "row" role = "form">
                   <div class = "col-md-6">
                      <label class = "sr-only">Age</label>
                      <input required type = "text" name = "post[age]"  class = "form-control" placeholder = "Age"/>
                   </div>
                   <div class = "col-md-6">
                      <label class = "sr-only">City</label>
                      <input required type = "text" name = "post[city]" class = "form-control" placeholder = "City"/>
                   </div>
                </div>
                <div class = "input-phone form-group">
                   <label class = "sr-only">Phone</label>
                   <input required class = "input-phone form-control" type = "text" id = "phone" name = "post[phone]" placeholder = "Phone"/>
                </div>
                <div class = "row" role = "form">
                   <div class = "col-md-6">
                      <label class = "sr-only">Salary</label>
                      <input required type = "text" class = "form-control" name = "post[expected_salary]" placeholder = "Expected Salary"/>
                   </div>
                   <div class = "col-md-6">
                      <label class = "sr-only">Experience</label>
                      <input required type = "text" class = "form-control" name = "post[experience]" placeholder = "Experience"/>
                   </div>
                </div>
                <div>
                   <label class = "sr-only">Website</label>
                   <input required class = "form-control" type = "url" name = "post[website]" placeholder = "Website"/>
                </div>
                <div>
                   <label class = "sr-only">Other Details</label>
                   <textarea class = "form-control" id = "career_comment" name = "post[other_details]" placeholder = "Other Details"></textarea>
                </div>
                <div class = "input-file form-group">
                   <input type = "file" id = "file" name = "file" class = "form-control"/>
                </div>
                <div class = "clearfix"></div>
                <button type = "submit" class = "btn btn-default">Submit</button>
             </form>
          </div>
       </div>
       </div>
       </div>
       </section>
        <?php if (isset($response) && $response == 1) {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Application Sent!","Your Application has been sent.\n Please check your mail to hear from us!","success");';
        echo '}, 1000);</script>';
    }
    elseif (isset($response) && $response == 0) {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Error!","There was an error sending your application!","error");';
        echo '}, 1000);</script>';
    } ?>