<?php
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
                            49 Archdale, 2B Charleston, New York City, USA
                        </address>
                        <address class = "col-sm-4 col-md-4">
                            <i class = "fa fa-microphone i-9x icons-circle text-color light-bg hover-black"></i>
                            <div class = "title">Phones</div>
                            <div>Support: +123 (345) 6789</div>
                        </address>
                        <address class = "col-sm-4 col-md-4">
                            <i class = "fa fa-envelope i-9x icons-circle text-color light-bg hover-black"></i>
                            <div class = "title">Email Addresses</div>
                            <div>Support:
                                <a href = "mailto:support@example.com">support@example.com</a>
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
                        <form role = "form" name = "contactform" id = "contactform" method = "post" action = "http://zozothemes.com/html/mist/light/php/contact-form.php">
                            <!-- Field 1 -->
                            <div class = "input-text form-group">
                                <input type = "text" name = "contact_name" class = "input-name form-control" placeholder = "Full Name"/>
                            </div>
                            <!-- Field 2 -->
                            <div class = "input-email form-group">
                                <input type = "email" name = "contact_email" class = "input-email form-control" placeholder = "Email"/>
                            </div>
                            <!-- Field 3 -->
                            <div class = "input-email form-group">
                                <input type = "text" name = "contact_phone" class = "input-phone form-control" placeholder = "Phone"/>
                            </div>
                            <!-- Field 4 -->
                            <div class = "textarea-message form-group">
                                <textarea name = "contact_message" class = "textarea-message hight-82 form-control" placeholder = "Message" rows = "2"></textarea>
                            </div>
                            <!-- Button -->
                            <button class = "btn btn-default btn-block" type = "submit">Send Now
                                <i class = "icon-paper-plane"></i>
                            </button>
                        </form>
                        <!-- Form Ends -->
                    </div>
                </div>
                <div class = "col-md-8">
                    <div class = "map-section">
                        <div id = "map" class = "map-canvas" data-zoom = "8" data-lat = "-35.2835" data-lng = "149.128" data-type = "roadmap" data-hue = "#ffffff" data-title = "Eco Sanjal" style = "height: 308px;"></div>
                    </div>
                </div><!-- map -->
            </div>

        </div>
</section><!-- page-section -->