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
                Thank you for booking with us
            </div>
        </div>
    </div>
</div>

<div class = "booking-page">
    <section class = "page-section">
        <div class = "container">
            <div class = "row">
                <div class = "col-md-4 col-sm-6 col-xs-12 booking-details">
                    <div class = "book">
                        <div class = "branding">
                            <img class = "bill-logo" src = "<?php echo Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/logo.png">
                        </div>
                        <h5 class = "margin-bottom-8">Booking Details</h5>
                        <div class = "booker-details margin-bottom-30">
                            <p>Your Ticket has been sent to the following recipient.</p>
                            <div class = "">Name : Hari Prasad Sitaula</div>
                            <div class = "">Email : info@gmail.com</div>
                            <div class = "">Phone : 9808088964</div>
                        </div>
                        <div class = "vehicle-details margin-bottom-30">
                            <div class = "sprovider ">Service Provider : Yatri Travels</div>
                            <div class = "vehicle">Vehicle : Ba 1 Cha 2548</div>
                            <div class = "route">Route : Kathmandu - Jhapa</div>
                            <div class = "departure-time">Date: Sunday, 24 January, 2018 - 12:45 PM</div>
                            <div class = "assistant">Assistant : Ravi Raj (+977 9808066545)</div>
                            <div class = "payment-partner">Selected Payment : E-Sewa</div>

                        </div>
                        <div class = "vehicle-details margin-bottom-30">
                            <h6 class = " margin-bottom-8">Passenger Details</h6>
                            <div class = "">Passenger 1 - Seat A1 : Hari Prasad Sitaula</div>
                            <div class = "">Passenger 2 - Seat A2 : Ram Babu Basnet</div>
                            <div class = "">Passenger 3 - Seat A3 : Kunti Moktan</div>
                            <div class = "">Passenger 4 - Seat A4 : Ravi Niraula</div>

                        </div>
                        <h5 class = "margin-bottom-8">Payment Details</h5>
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
                                    Total: <span class = "highlighted invoice-total">
                                        <i class = "fa fa-rupee margin-right-8"></i>
                                        2700</span>
                                </div>
                            </div>
                        </div>
                        <div class = "booking-confirm text-right">
                            <a class = "btn btn-danger" href = "javascript:void(0);">Print Ticket</a>
                            <a class = "btn btn-primary" href = "<?php echo Yii::$app->request->baseUrl; ?>/">Book more tickets</a>
                        </div>
                    </div>

                </div>
                <div class = "col-md-8 col-sm-6 col-xs-12 adds"></div>
            </div>
        </div>
    </section>
</div>

