<?php
    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/list.js');
    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/booking.js');
?>

<a href = "javascript:void(0);" id = "search-filterCollapse" class = "">
    <i class = "icon icon-filter"></i>
</a>
<div class = "page-header">
    <div class = "container">
        <div class = "primary-page-header">
            <div class = "title">
                Confirm Your Booking
            </div>
        </div>
    </div>
</div>

<div class = "booking-page">
    <section class = "page-section">
        <div class = "container">
            <div class = "row">
                <div class = "col-md-8 col-sm-6 col-xs-12">
                    <div class = "contact-details">
                        <h5>Contact Details</h5>
                        <div class = "login">
                            <p class = "">
                                <i class = "fa fa-exclamation-circle margin-right-10"></i>
                                Your Ticket will be sent to this address. For Faster Booking
                                <a href = "<?php echo Yii::$app->request->baseUrl; ?>/site/login/">Login</a>
                                /
                                <a href = "<?php echo Yii::$app->request->baseUrl; ?>/register/">Sign Up</a>
                            </p>
                        </div>
                        <?php $counter = 0; ?>
                        <div class = "form-group">
                            <?php $counter++; ?>
                            <label for = "<?php echo $counter; ?>" class = "control-label">Name</label>
                            <input autocomplete = "off" id = "<?php echo $counter; ?>" name = "booker[name]" type = "text" class = "form-control required" placeholder = "Enter Your Name">
                        </div>
                        <div class = "row">
                            <div class = "col-sm-6 col-xs-12">
                                <div class = "form-group">
                                    <?php $counter++; ?>
                                    <label for = "<?php echo $counter; ?>" class = "control-label">Email Address</label>
                                    <input autocomplete = "off" id = "<?php echo $counter; ?>" name = "booker[email]" type = "text" placeholder = "Email" class = "form-control required">
                                </div>
                            </div>
                            <div class = "col-sm-6 col-xs-12">
                                <div class = "form-group">
                                    <?php $counter++; ?>
                                    <label for = "<?php echo $counter; ?>" class = "control-label">Phone</label>
                                    <input autocomplete = "off" id = "<?php echo $counter; ?>" name = "booker[phone]" type = "text" class = "form-control required">
                                </div>
                            </div>
                        </div>
                        <div class = "form-group">

                            <?php $counter++; ?>
                            <input id = "<?php echo $counter; ?>" name = "booker[insurance]" type = "checkbox" class = "form-control required"/>
                            <label for = "<?php echo $counter; ?>" class = "control-label">I want to Insure my travel (Rs 100 will be charged per ticket).</label>
                        </div>
                    </div>
                    <div class = "passenger-details">
                        <h5>Passenger Details</h5>
                        <div class = "passenger-individual">
                            <h6>Passenger 1 : Seat A5</h6>
                            <div class = "row">
                                <div class = "col-sm-6 col-xs-12">
                                    <div class = "form-group">
                                        <?php $counter++; ?>
                                        <label for = "<?php echo $counter; ?>" class = "control-label">Name</label>
                                        <input autocomplete = "off" id = "<?php echo $counter; ?>" name = "passenger[name]" type = "text" placeholder = "Email" class = "form-control required">
                                    </div>
                                </div>
                                <div class = "col-sm-3 col-xs-12">
                                    <div class = "form-group">
                                        <?php $counter++; ?>
                                        <label for = "<?php echo $counter; ?>" class = "control-label">Gender</label>
                                        <select autocomplete = "off" id = "<?php echo $counter; ?>" name = "booker[gender]" type = "text" class = "form-control required">
                                            <option value = "">Select Gender</option>
                                            <option value = "male">Male</option>
                                            <option value = "female">Female</option>
                                            <option value = "other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class = "col-sm-2 col-xs-12">
                                    <div class = "form-group">
                                        <?php $counter++; ?>
                                        <label for = "<?php echo $counter; ?>" class = "control-label">Age</label>
                                        <input autocomplete = "off" id = "<?php echo $counter; ?>" name = "Passenger[age]" type = "text" class = "form-control required">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class = "passenger-individual">
                            <h6>Passenger 2 : Seat A6</h6>
                            <div class = "row">
                                <div class = "col-sm-6 col-xs-12">
                                    <div class = "form-group">
                                        <?php $counter++; ?>
                                        <label for = "<?php echo $counter; ?>" class = "control-label">Name</label>
                                        <input autocomplete = "off" id = "<?php echo $counter; ?>" name = "passenger[name]" type = "text" placeholder = "Email" class = "form-control required">
                                    </div>
                                </div>
                                <div class = "col-sm-3 col-xs-12">
                                    <div class = "form-group">
                                        <?php $counter++; ?>
                                        <label for = "<?php echo $counter; ?>" class = "control-label">Gender</label>
                                        <select autocomplete = "off" id = "<?php echo $counter; ?>" name = "booker[gender]" type = "text" class = "form-control required">
                                            <option value = "">Select Gender</option>
                                            <option value = "male">Male</option>
                                            <option value = "female">Female</option>
                                            <option value = "other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class = "col-sm-2 col-xs-12">
                                    <div class = "form-group">
                                        <?php $counter++; ?>
                                        <label for = "<?php echo $counter; ?>" class = "control-label">Age</label>
                                        <input autocomplete = "off" id = "<?php echo $counter; ?>" name = "Passenger[age]" type = "text" class = "form-control required">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class = "passenger-individual">
                            <h6>Passenger 3 : Seat A7</h6>
                            <div class = "row">
                                <div class = "col-sm-6 col-xs-12">
                                    <div class = "form-group">
                                        <?php $counter++; ?>
                                        <label for = "<?php echo $counter; ?>" class = "control-label">Name</label>
                                        <input autocomplete = "off" id = "<?php echo $counter; ?>" name = "passenger[name]" type = "text" placeholder = "Email" class = "form-control required">
                                    </div>
                                </div>
                                <div class = "col-sm-3 col-xs-12">
                                    <div class = "form-group">
                                        <?php $counter++; ?>
                                        <label for = "<?php echo $counter; ?>" class = "control-label">Gender</label>
                                        <select autocomplete = "off" id = "<?php echo $counter; ?>" name = "booker[gender]" type = "text" class = "form-control required">
                                            <option value = "">Select Gender</option>
                                            <option value = "male">Male</option>
                                            <option value = "female">Female</option>
                                            <option value = "other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class = "col-sm-2 col-xs-12">
                                    <div class = "form-group">
                                        <?php $counter++; ?>
                                        <label for = "<?php echo $counter; ?>" class = "control-label">Age</label>
                                        <input autocomplete = "off" id = "<?php echo $counter; ?>" name = "Passenger[age]" type = "text" class = "form-control required">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class = "col-md-4 col-sm-6 col-xs-12 booking-details">
                    <div class = "book">
                        <div class = "vehicle-details margin-bottom-30">
                            <div class = ""></div>
                            <h6 class = "sprovider margin-bottom-0">Yatri Travels</h6>
                            <div class = "rating margin-bottom-10">
                                <div class = "star-rating">
                                    <i class = "fa fa-star"></i>
                                    <i class = "fa fa-star"></i>
                                    <i class = "fa fa-star"></i>
                                    <i class = "fa fa-star-o"></i>
                                    <i class = "fa fa-star-o"></i>
                                </div>
                            </div>
                            <div class = "vehicle">Vehicle : Ba 1 Cha 2548</div>
                            <div class = "route">Route : Kathmandu - Jhapa</div>
                            <div class = "departure-time">Date:<strong> Sunday, 24 January, 2018 - 12:45 PM</strong></div>
                            <div class = "assistant">Assistant : Ravi Raj (+977 9808066545)</div>
                            <div class = "payment-partner">Selected Payment : E-Sewa</div>

                        </div>
                        <h5>Payment Details</h5>
                        <div class = "invoice-details">
                            <div class = "invoice-details-body">
                                <ul class = "invoice-list">
                                    <li data-id = "15">
                                        <div class = "seat-name">B8</div>
                                        <div class = "seat-price">800</div>
                                        <div class = "clearfix"></div>
                                    </li>
                                    <li data-id = "19">
                                        <div class = "seat-name">B10</div>
                                        <div class = "seat-price">800</div>
                                        <div class = "clearfix"></div>
                                    </li>
                                    <li data-id = "12">
                                        <div class = "seat-name">B7</div>
                                        <div class = "seat-price">800</div>
                                        <div class = "clearfix"></div>
                                    </li>
                                    <li data-id = "12">
                                        <div class = "seat-name">Insurance</div>
                                        <div class = "seat-price">300</div>
                                        <div class = "clearfix"></div>
                                    </li>
                                </ul>
                                <div class = "ticket-total text-right">
                                    Total:

                                    <span class = "highlighted invoice-total">
                                        <i class = "fa fa-rupee margin-right-8"></i>
                                        2700</span>
                                </div>
                            </div>
                            <div class = "booking-confirm text-right">
                                <a class = "btn btn-danger" href = "<?php echo Yii::$app->request->baseUrl; ?>/booking/success/">Book My Ticket</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

