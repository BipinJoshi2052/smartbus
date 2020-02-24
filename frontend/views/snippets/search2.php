<?php //$this->registerJsFile(Yii::$app->request->baseUrl . 'common/assets/vendor/pos/js/pos.js');
?>
<!--Find Form -->
<div class="find-form">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div role="tabpanel" class="travel-tab">
               <!-- Nav tabs -->
               <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#hotels" aria-controls="hotels" role="tab" data-toggle="tab"><i class="icon-building-o"></i>Hotels</a></li>
                  <li role="presentation"><a href="#flights" aria-controls="flights" role="tab" data-toggle="tab"><i class="icon-plane3"></i>Flights</a></li>
                  <li role="presentation"><a href="#rentals" aria-controls="rentals" role="tab" data-toggle="tab"><i class=" icon-home7"></i>Rentals</a></li>
                  <li role="presentation"><a href="#cars" aria-controls="cars" role="tab" data-toggle="tab"><i class=" icon-directions-car"></i>Cars</a></li>
               </ul>
               <!-- Tab panes -->
               <div class="tab-content">
                  <!-- Hotels Tab -->
                  <div role="tabpanel" class="tab-pane active" id="hotels">
                     <h5>Search Your Hotels</h5>
                     <div class="row">
                        <!-- Destination -->
                        <div class="col-sm-3">
                           <div class="form-group">
                              <label for="exampleInputName1">Your Destination</label>
                              <input type="text" class="form-control" id="exampleInputName1" placeholder="Enter Your Destination">
                           </div>
                        </div>
                        <!-- check in -->
                        <div class="col-sm-2">
                           <div class="form-group">
                              <label for="exampleInputName2">Check In</label>
                              <div class="input-group date date-picker">
                                 <input type="text" class="form-control" />
                                 <span class="input-group-addon">
                                                            <span class="icon-calendar12 fa-1x"></span>
                                                            </span>
                              </div>
                           </div>
                        </div>
                        <!-- check Out -->
                        <div class="col-sm-2">
                           <div class="form-group">
                              <label for="exampleInputName2">Check Out</label>
                              <div class="input-group date date-picker">
                                 <input type="text" class="form-control" />
                                 <span class="input-group-addon">
                                                            <span class="icon-calendar12 fa-1x"></span>
                                                            </span>
                              </div>
                           </div>
                        </div>
                        <!-- No of Rooms -->
                        <div class="col-sm-1">
                           <div class="input-group" id="no-rooms">
                              <label for="exampleInputName2">Rooms</label>
                              <div class="input-group-btn">
                                 <div class="btn-group" role="group">
                                    <div class="dropdown dropdown-lg">
                                       <select class="fancy-select" name="rooms">
                                          <option>01</option>
                                          <option>02</option>
                                          <option>03</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- Adults -->
                        <div class="col-sm-1">
                           <div class="input-group" id="n">
                              <label for="exampleInputName2">adults</label>
                              <div class="input-group-btn">
                                 <div class="btn-group" role="group">
                                    <div class="dropdown dropdown-lg">
                                       <select class="fancy-select" name="adults">
                                          <option>01</option>
                                          <option>02</option>
                                          <option>03</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- Kids -->
                        <div class="col-sm-1">
                           <div class="input-group" id="Kids">
                              <label for="exampleInputName2">Kids</label>
                              <div class="input-group-btn">
                                 <div class="btn-group" role="group">
                                    <div class="dropdown dropdown-lg">
                                       <select class="fancy-select" name="kids">
                                          <option>01</option>
                                          <option>02</option>
                                          <option>03</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- Search Now -->
                        <div class="col-sm-2">
                           <a href="#" class="btn btn-default">Search Now</a>
                        </div>
                     </div>
                  </div>
                  <!-- flights -->
                  <div role="tabpanel" class="tab-pane" id="flights">
                     <h5>Search Your Flights</h5>
                     <div class="row">
                        <!-- From -->
                        <div class="col-sm-2">
                           <div class="form-group">
                              <label for="exampleInputName2">From</label>
                              <input type="text" class="form-control" id="exampleInputName2" placeholder="City,Airport">
                           </div>
                        </div>
                        <!-- To -->
                        <div class="col-sm-2">
                           <div class="form-group">
                              <label for="exampleInputName3">To</label>
                              <input type="text" class="form-control" id="exampleInputName3" placeholder="City,Airport">
                           </div>
                        </div>
                        <!-- Departing -->
                        <div class="col-sm-2">
                           <div class="form-group">
                              <label>Departing</label>
                              <div class="input-group date date-picker">
                                 <input type="text" class="form-control" />
                                 <span class="input-group-addon">
                                                            <span class="icon-calendar12 fa-1x"></span>
                                                            </span>
                              </div>
                           </div>
                        </div>
                        <!-- Returning -->
                        <div class="col-sm-2">
                           <div class="form-group">
                              <label>Returning</label>
                              <div class="input-group date date-picker">
                                 <input type="text" class="form-control" />
                                 <span class="input-group-addon">
                                                            <span class="icon-calendar12 fa-1x"></span>
                                                            </span>
                              </div>
                           </div>
                        </div>
                        <!-- Passengers -->
                        <div class="col-sm-1">
                           <div class="input-group" id="passengers">
                              <label>Passengers</label>
                              <div class="input-group-btn">
                                 <div class="btn-group" role="group">
                                    <div class="dropdown dropdown-lg">
                                       <select class="fancy-select" name="passengers">
                                          <option>01</option>
                                          <option>02</option>
                                          <option>03</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- Passengers -->
                        <div class="col-sm-2">
                           <a href="#" class="btn btn-default">Search Now</a>
                        </div>
                     </div>
                  </div>
                  <!-- Rentals -->
                  <div role="tabpanel" class="tab-pane" id="rentals">
                     <h5>Search Your Rentals</h5>
                     <div class="row">
                        <div class="col-sm-4">
                           <div class="form-group">
                              <label for="exampleInputName4">Your Destination</label>
                              <input type="text" class="form-control" id="exampleInputName4" placeholder="Enter Your Destination">
                           </div>
                        </div>
                        <!-- check in -->
                        <div class="col-sm-2">
                           <div class="form-group">
                              <label>Check In</label>
                              <div class="input-group date date-picker">
                                 <input type="text" class="form-control" />
                                 <span class="input-group-addon">
                                                            <span class="icon-calendar12 fa-1x"></span>
                                                            </span>
                              </div>
                           </div>
                        </div>
                        <!-- Check out -->
                        <div class="col-sm-2">
                           <div class="form-group">
                              <label>Check Out</label>
                              <div class="input-group date date-picker">
                                 <input type="text" class="form-control" />
                                 <span class="input-group-addon">
                                                            <span class="icon-calendar12 fa-1x"></span>
                                                            </span>
                              </div>
                           </div>
                        </div>
                        <!-- Rooms -->
                        <div class="col-sm-1">
                           <div class="input-group" id="rooms">
                              <label>Rooms</label>
                              <div class="input-group-btn">
                                 <div class="btn-group" role="group">
                                    <div class="dropdown dropdown-lg">
                                       <select class="fancy-select" name="rooms">
                                          <option>01</option>
                                          <option>02</option>
                                          <option>03</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- Guests -->
                        <div class="col-sm-1">
                           <div class="input-group" id="guests">
                              <label>guests</label>
                              <div class="input-group-btn">
                                 <div class="btn-group" role="group">
                                    <div class="dropdown dropdown-lg">
                                       <select class="fancy-select" name="guests">
                                          <option>01</option>
                                          <option>02</option>
                                          <option>03</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- Search button -->
                        <div class="col-sm-2">
                           <a href="#" class="btn btn-default">Search Now</a>
                        </div>
                     </div>
                  </div>
                  <!-- Cars -->
                  <div role="tabpanel" class="tab-pane" id="cars">
                     <h5>Search Your Rental Cars</h5>
                     <div class="row">
                        <!-- Pick-up Location -->
                        <div class="col-sm-4">
                           <div class="form-group">
                              <label for="exampleInputName5">Pick-up Location</label>
                              <input type="text" class="form-control" id="exampleInputName5" placeholder="Enter Your Destination">
                           </div>
                        </div>
                        <!-- Pick Up Date -->
                        <div class="col-sm-3">
                           <div class="form-group">
                              <label>Pick-up Date</label>
                              <div class="input-group date date-picker">
                                 <input type="text" class="form-control" />
                                 <span class="input-group-addon">
                                                            <span class="icon-calendar12 fa-1x"></span>
                                                            </span>
                              </div>
                           </div>
                        </div>
                        <!-- Pick up time -->
                        <div class="col-sm-3">
                           <div class="form-group">
                              <label>Pick-up Time</label>
                              <div class="input-group date time-picker">
                                 <input type="text" class="form-control" />
                                 <span class="input-group-addon">
                                                            <span class="icon-clock9 fa-1x"></span>
                                                            </span>
                              </div>
                           </div>
                        </div>
                        <!-- car type -->
                        <div class="col-sm-1">
                           <div class="input-group" id="car-type">
                              <label>Car Type</label>
                              <div class="input-group-btn">
                                 <div class="btn-group" role="group">
                                    <div class="dropdown dropdown-lg">
                                       <select class="fancy-select" name="car-type">
                                          <option>Select car type</option>
                                          <option>Economy</option>
                                          <option>Compact</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <!-- Drop off location-->
                        <div class="col-sm-4">
                           <div class="form-group">
                              <label for="exampleInputName6">Drop-off Location</label>
                              <input type="text" class="form-control" id="exampleInputName6" placeholder="Enter Your Destination">
                           </div>
                        </div>
                        <!-- Drop off Date-->
                        <div class="col-sm-3">
                           <div class="form-group">
                              <label>Drop-off Date</label>
                              <div class="input-group date date-picker">
                                 <input type="text" class="form-control" />
                                 <span class="input-group-addon">
                                                            <span class="icon-calendar12 fa-1x"></span>
                                                            </span>
                              </div>
                           </div>
                        </div>
                        <!-- Drop off Time -->
                        <div class="col-sm-3">
                           <div class="form-group">
                              <label>Drop-off Time</label>
                              <div class="input-group date time-picker">
                                 <input type="text" class="form-control" />
                                 <span class="input-group-addon">
                                                            <span class="icon-clock9 fa-1x"></span>
                                                            </span>
                              </div>
                           </div>
                        </div>
                        <!-- search now -->
                        <div class="col-sm-2">
                           <a href="#" class="btn btn-default btn-block">Search Now</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>





