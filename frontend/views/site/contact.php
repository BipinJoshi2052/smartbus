<?php

Yii::$app->session->getFlash('success');
    /* @var $this yii\web\View */
    $this->title = 'Contact Us';
?>
<div class = "page-header">
    <div class = "container">
        <h1 class = "title">Contact Us</h1>
    </div>
</div><!-- page-header -->


<section id = "contact-us" class = "page-section">
    <div class = "container">
        <div class = "contact-top">
            <div class = "row">
                <div class = "col-md-12 contact-info">
                    <div class = "row text-center">
                        <address class = "col-sm-4 col-md-4">
                            <i class = "fa fa-map-marker i-9x icons-circle text-color light-bg hover-black"></i>
                            <div class = "title">Address</div>
                           <p>49 Archdale, 2B Charleston, New York City, USA </p> 
                        </address>
                        <address class = "col-sm-4 col-md-4">
                            <i class = "fa fa-microphone i-9x icons-circle text-color light-bg hover-black"></i>
                            <div class = "title">Phones</div>
                            <p>
                               Support: +123 (345) 6789 
                            </p>
                            
                        </address>
                        <address class = "col-sm-4 col-md-4">
                            <i class = "fa fa-envelope i-9x icons-circle text-color light-bg hover-black"></i>
                            <div class = "title">  Email Addresses</div>
                            <div> <p> Support:
                                <a href = "mailto:support@example.com">support@example.com</a></p>
                            </div>
                        </address>
                    </div>
                </div>
            </div>

        </div>
        <div class = "contact-bottom">
            <div class = "row">
                <div class = "col-md-4">
                    <p class = "form-message" style = "display: none;"></p>
                    <div class = "contact-form">
                        <!-- Form Begins -->
<!--                       action = "--><?php //echo Yii::$app->request->baseUrl; ?><!--/site/message"-->

                        <form id="contact-form" name="contact-form" method = "post">
                            <!-- Field 1 -->
<!--                           <input type = "hidden" name = "--><?php //echo Yii::$app->request->csrfParam; ?><!--" value = "--><?php //echo Yii::$app->request->csrfToken; ?><!--"/>-->
                           <div class="response hidden">
                              <h5>Message Sent</h5>
                           </div>
                            <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>

                            <div class = "input-text form-group">
                                <input required type = "text" name = "name" class = "input-name form-control" placeholder = "Full Name"/>
                            </div>
                            <!-- Field 2 -->
                            <div class = "input-email form-group">
                                <input required type = "email" name = "email" class = "input-email form-control" placeholder = "Email"/>
                            </div>
                            <!-- Field 3 -->
                            <div class = "input-email form-group">
                                <input required type = "text" name = "phone" class = "input-phone form-control" placeholder = "Phone"/>
                            </div>
                            <!-- Field 4 -->
                            <div class = "textarea-message form-group">
                                <textarea required name = "message" class = "textarea-message height-153 form-control" placeholder = "Message" rows = "2"></textarea>
                            </div>
                            <!-- Button -->
                           <a class="btn btn-default btn-block submit-contact text-white">Send Now <i class = "icon-paper-plane"></i></a>
<!--                            <button class = "btn btn-default btn-block submit-contact" type = "submit">Send Now-->
<!--                                <i class = "icon-paper-plane"></i>-->
<!--                            </button>-->
                        </form>
                        <!-- Form Ends -->
                    </div>
                </div>
                <div class = "col-md-8">
                   <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14126.585456103412!2d85.345977!3d27.728203!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2625d031c11b46df!2sSukedhara%20Police%20Station!5e0!3m2!1sen!2snp!4v1582610053473!5m2!1sen!2snp" width="800" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                   <!--  <div class = "map-section">
                        <div id = "map" class = "map-canvas" data-zoom = "8" data-lat = "-35.2835" data-lng = "149.128" data-type = "roadmap" data-hue = "#ffffff" data-title = "Eco Sanjal" style = "height: 308px;"></div>
                    </div> -->
                </div><!-- map -->
            </div>

        </div>
</section><!-- page-section -->