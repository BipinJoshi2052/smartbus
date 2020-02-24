<?php
    // $this->registerJsFile(Yii::$app->request->baseUrl . 'assets/js/booking.js');
?>
<form method = "post" action = "<?php echo Yii::$app->request->baseUrl; ?>/register/update-client">
    <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
</form>

<?php
    /* @var $this yii\web\View */
    $this->title = 'Careers';
?>
<div class="page-header">
    <div class="container">
        <h1 class="title">Search</h1>
    </div>

</div>
<!-- page-header -->
<section id="page-content" class="page-section">
    <div class="container">
    
        <div class="row">
        	
            <div class="col-sm-12 col-md-7">
            		<div class="section-title text-left animated fadeInUp visible" data-animation="fadeInUp">
   <!-- Heading -->
   <h2 class="title">Why Register With Us?</h2>
</div>
            	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br><br>

            	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
               
                

                <p style="padding-top: 30px;">
                    <a href="#" class="btn btn-default">Apply Now</a>
                </p>
            </div>
            <div class="col-sm-12 col-md-5">
            		<div class="section-title text-left animated fadeInUp visible" data-animation="fadeInUp">
   <!-- Heading -->
   <h2 class="title">Register Now</h2>
</div>
                <div class="career-form">
                    <form role="form" class="" name="careerform"  id="careerform"  method="post"  enctype='multipart/form-data'>
                       
                        <p id="form-message2" class="form-message2"></p>
                        <div class="input-text form-group">
                            <input class="input-name form-control" type="text" id="career_name" name="career_name" placeholder="Name" />
                        </div>
                        <div class="input-email form-group">
                            <input type="email" id="femail" name="femail" class="form-input input-email form-control" placeholder='From E-Mail'/>
                        </div>
                       
                        <div class="input-phone form-group">
                           
                            <input class="input-phone form-control" type="text" id="career_phone" name="career_phone" placeholder="Phone" />
                        </div>
                       
                        <div>
                      
                           <input name="LoginForm[password]" type="password" class="form-control required" id="login-password" placeholder="Password" autocomplete="off" required="">
                        </div>
                        <div>
                      
                           <input name="LoginForm[password]" type="password" class="form-control required" id="login-password" placeholder="Retype Password" autocomplete="off" required="">
                        </div>

                      
                        
                        <div class="clearfix"></div>
                        <button type="submit" class="btn btn-default" >Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
