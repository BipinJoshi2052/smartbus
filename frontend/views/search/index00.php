<?php
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/list.js');
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/booking.js');
?>
<a href="javascript:void(0);" id="search-filterCollapse" class="">
   <i class="icon icon-filter"></i>
</a>
<div class="page-header">
   <div class="container">
      <div class="primary-page-header">
         <div class="title">
            <?= ucwords($parameters['dep']) ?>
            <i class="icon icon-arrow-right2"></i>
            <?= ucwords($parameters['arr']) ?> On
            <span class="title-date"><?= \common\components\Misc::date_DdmY($parameters['departure']) ?></span>
         </div>
         <div class="search-count">12 Vehicles found as per your search.</div>
      </div>

   </div>

</div>

<div id="search-page" class="search-page">
   <!-- search-filter  -->
   <?php $filterCount = 0; ?>
   <div id="search-filter">
      <div class="search-filter-header">
         Filter Your Search
      </div>
      <div class="filter-section">
         <div class="search-filter-body">
            <div class="filter-item">
               <div>
                  <label for="amount">Price range:</label>
                  <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
               </div>
               <div id="slider-range"></div>
            </div>
         </div>
      </div>
      <?php if (isset($filters['vehicles']) && !empty($filters['vehicles']) && count($filters['vehicles']) > 0) : ?>
         <div class="filter-section">
            <div class="filter-type title">
               Vehicle Types
            </div>
            <div class="search-filter-body">
               <?php foreach ($filters['vehicles'] as $k => $v): ?>
                  <div class="filter-item">
                     <input id="chk-<?= $filterCount ?>" name="vehicle_types" type="checkbox" value="<?= $v->id ?>">
                     <label for="chk-<?= $filterCount ?>"><?= ucwords($v->name); ?></label>
                  </div>
                  <?php
                  $filterCount++;
               endforeach; ?>

            </div>
         </div>
      <?php endif; ?>
      <?php if (isset($filters['amenities']) && !empty($filters['amenities']) && count($filters['amenities']) > 0) : ?>
         <div class="filter-section">
            <div class="filter-type title">
               Amenities
            </div>
            <div class="search-filter-body">
               <?php foreach ($filters['amenities'] as $k => $a): ?>
                  <div class="filter-item">
                     <input id="chk-<?= $filterCount ?>" type="checkbox" name="amenities" value="<?= $a->id ?>">
                     <label for="chk-<?= $filterCount ?>"><?= ucwords($a->name); ?></label>
                  </div>
                  <?php
                  $filterCount++;
               endforeach; ?>

            </div>
         </div>
      <?php endif; ?>


   </div>
   <!-- Page Content  -->
   <section class="search-results page-section">
      <div class="modify-search">
         <div class="container">
            <form method="get" action="<?php echo Yii::$app->request->baseUrl; ?>/search">

               <div class="search-form">
                  <?php $counter = 0; ?>
                  <div class="row">
                     <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="search-item">
                           <strong>Search Again :</strong>
                        </div>
                     </div>

                     <div class="col-lg-4 col-md-3 col-sm-4 col-xs-12">
                        <div class="search-form-items">
                           <div class="input-group">
                              <input name="dep" id="dep" type="text" class="form-control boarding location text-capitalize" placeholder="From" autocomplete="off" value="<?= $parameters['dep']; ?>">
                              <input name="from" id="from" type="hidden" value="<?= $parameters['from']; ?>">
                              <button id="search-swap-locations" type="button">
                                 <i class="fa fa-arrows-h"></i>
                              </button>
                              <input name="arr" id="arr" type="text" value="<?= $parameters['arr']; ?>" class="form-control dropping location text-capitalize" placeholder="To" autocomplete="off">
                              <input name="to" id="to" type="hidden" value="<?= $parameters['to']; ?>">
                           </div>
                        </div>
                     </div>

                     <div class="col-lg-4 col-md-3 col-sm-4 col-xs-12">
                        <div class="search-form-items">
                           <div class="input-group">
                              <input name="departure" value="<?= $parameters['departure']; ?>" id="departure-date" type="text" class="form-control" placeholder="On" autocomplete="off">
                              <button disabled="disabled" class="" type="button">
                                 <i class="fa fa-calendar"></i>
                              </button>
                              <input name="return" value="<?= $parameters['return']; ?>" id="return-date" type="text" class="form-control" placeholder="Return" autocomplete="off">
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="search-form-items">
                           <button type="submit" class="btn btn-info">
                              <i class="fa fa-search m-r-8"></i> Search
                           </button>
                        </div>

                     </div>
                  </div>
               </div>
            </form>
         </div>

      </div>
      <div class="container">
         <!-- .product -->

         <div class="search-header">
            <div class="row">
               <div class="col-sm-3 col-xs-12">
                  <strong>Sort By :</strong>
                  <a href="javascript:void(0);" class="header-item sort" data-sort="s-service-provider">Name</a>

               </div>
               <div class="col-sm-9 col-xs-12">
                  <div class="row">
                     <div class="col-sm-2 col-xs-12">
                        <a href="javascript:void(0);" class="header-item sort" data-sort="s-type">Type</a>
                     </div>
                     <div class="col-sm-2 col-xs-12">
                        <a href="javascript:void(0);" class="header-item sort" data-sort="s-departure">Departure</a>
                     </div>
                     <div class="col-sm-2 col-xs-12">
                        <a href="javascript:void(0);" class="header-item sort" data-sort="s-duration">Duration</a>
                     </div>
                     <div class="col-sm-2 col-xs-12">
                        <a href="javascript:void(0);" class="header-item sort " data-sort="s-arrival"> Arival</a>
                     </div>
                     <div class="col-sm-2 col-xs-12">
                        <a href="javascript:void(0);" class="header-item sort " data-sort="s-fare">Fare</a>
                     </div>

                     <div class="col-sm-2 col-xs-12">
                        <div class="header-item text-right">
                           <a href="javascript:void(0);" class="header-item sort " data-sort="s-seats">Seats
                              Available</a>
                        </div>
                     </div>

                  </div>
               </div>
            </div>

         </div>

         <ul class="list search-body">
            <li class="search-list">
               <div class="list-item">
                  <div class="row">
                     <div class="col-sm-3 col-xs-12">
                        <div class="vehicle-details">
                           <h3 class="item-title title service-provider">Yatri Travels</h3>
                           <div class="star-rating">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-9 col-xs-12">
                        <div class="row">
                           <div class="col-sm-2 col-xs-12">
                              <div class="s-type">Deluxe Bus</div>
                           </div>
                           <div class="col-sm-2 col-xs-12">
                              <div class="s-departure">18:25 AM</div>
                           </div>
                           <div class="col-sm-2 col-xs-12">
                              <div class="s-duration">5 Hrs</div>
                           </div>
                           <div class="col-sm-2 col-xs-12">
                              <div class="s-arrival">10:45 PM</div>
                           </div>
                           <div class="col-sm-2 col-xs-12">
                              <div class="item-price"><span class="currency">NPR</span> <span class="s-fare">340</span>
                              </div>
                           </div>
                           <div class="col-sm-2 col-xs-12">
                              <div class="item-seat-count"><span class="s-seats">24</span> Seats</div>
                              <div class="item-action">
                                 <a href="javascript:void(0);" class="btn btn-primary select-seat btn-block">Select
                                    Seats</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="list-options display-none">
                  <div role="tabpanel">
                     <!-- Nav tabs -->
                     <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="nav-item">
                           <a class="nav-link active" href="#seats" aria-controls="seats" role="tab" data-toggle="tab">Select Seats</a>
                        </li>
                        <li role="presentation" class="nav-item">
                           <a class="nav-link" href="#vehicle" aria-controls="vehicle" role="tab" data-toggle="tab">Vehicle Details</a>
                        </li>
                        <li role="presentation" class="nav-item">
                           <a class="nav-link" href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">Ratings & Reviews</a>
                        </li>

                        <li role="presentation" class="nav-item">
                           <a class="nav-link" href="#cancellation" aria-controls="cancellation" role="tab" data-toggle="tab">Cancellation
                              Policy</a>
                        </li>
                     </ul>
                     <!-- Tab panes -->
                     <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="seats">
                           <div class="row">
                              <div class="col-lg-4 col-md-4 col-sm-12">
                                 <div class="">
                                    <h5>Amenities</h5>
                                    <ul class="vehicle-amenities">
                                       <li>AC</li>
                                       <li>TV</li>
                                       <li>Charging Point</li>
                                       <li>Pillow</li>
                                       <li>Water Bottle</li>
                                       <li>Light Snacks</li>

                                    </ul>
                                 </div>
                                 <div class="margin-top-30">
                                    <h5>Disclaimer</h5>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                       Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                       unknown printer took a galley of type and scrambled it to make a type specimen
                                       book.</p>
                                 </div>

                              </div>
                              <div class="col-lg-4 col-md-4 col-sm-12">
                                 <div class="seat-layout-wrapper">
                                    <h5>Select Seats</h5>
                                    <div class="seat-arrangement">
                                       <div class="seat-layout">
                                          <div class="cabin-layout">
                                             <div class="flaticon-driver"></div>
                                          </div>
                                          <div class="seat-body" data-si="1" data-sp="200">
                                             <?php
                                             $booked = [1, 2, 3, 4];
                                             $schedule['vehicle']['seat_info'] = json_decode('[[{"name":"A1","id":1},{"name":"A2","id":2},{"name":""},{"name":"B2","id":3},{"name":"B3","id":4}],[{"name":"A3","id":5},{"name":"A4","id":6},{"name":""},{"name":"B4","id":7},{"name":"B5","id":8}],[{"name":"A5","id":9},{"name":"A6","id":10},{"name":""},{"name":"B6","id":11},{"name":"B7","id":12}],[{"name":"A7","id":13},{"name":"A8","id":14},{"name":""},{"name":"B8","id":15},{"name":"B9","id":16}],[{"name":"A9","id":17},{"name":"A10","id":18},{"name":""},{"name":"B10","id":19},{"name":"B11","id":20}],[{"name":"A11","id":21},{"name":"A12","id":22},{"name":""},{"name":"B12","id":23},{"name":"B13","id":24}],[{"name":"A13","id":25},{"name":"A14","id":26},{"name":""},{"name":"B14","id":27},{"name":"B15","id":28}],[{"name":"R1","id":29},{"name":"R2","id":30},{"name":"R3","id":31},{"name":"R4","id":32},{"name":"R5","id":33}]]');
                                             foreach ($schedule['vehicle']['seat_info'] as $c => $cVal) : ?>
                                                <div class="seat-row">
                                                   <?php foreach ($cVal as $r => $rVal) : ?>
                                                      <div class="seat">
                                                         <?php if ((isset($rVal->name) && $rVal->name != '') && (isset($rVal->id) && $rVal->id > 0)): ?>
                                                            <input type="checkbox" name="seats[<?php echo $rVal->id; ?>]" value="<?php echo $rVal->name; ?>" data-name="<?php echo $rVal->name; ?>" id="s-<?php echo $rVal->id; ?>" <?php echo (in_array($rVal->id, $booked)) ? 'disabled="disabled" class="reserved"' : '' ?>>
                                                            <label for="s-<?php echo $rVal->id; ?>"><?php // echo $rVal->name; ?></label>
                                                         <?php else : ?>
                                                            <span class="appearance-none">S</span>
                                                         <?php endif; ?>
                                                      </div>
                                                   <?php endforeach; ?>
                                                </div>
                                             <?php endforeach; ?>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-4 col-md-3 col-sm-12">

                                 <div class="insurance-section">

                                    <h6>Would you like to secure your travel ?</h6>
                                    <div class="insurance-actions">
                                       <div class="form-group">
                                          <div class="yes">
                                             <input id="4" name="booker[insurance]" type="radio" class="form-control required">
                                             <label for="4" class="control-label">Yes, Protect me.</label>
                                          </div>
                                          <div class="no">
                                             <input id="5" name="booker[insurance]" type="radio" class="form-control required">
                                             <label for="5" class="control-label">No, I'm fine</label>
                                          </div>
                                       </div>
                                    </div>
                                    Nrs. 100 will be charged per ticket.
                                    <a target="_blank" href="javascript:void(0);">More Info</a>
                                 </div>

                                 <div class="invoice-section">
                                    <div class="invoice" style="">
                                       <div class="invoice-body">
                                          <h6>Seats Selected :</h6>
                                          <ul class="invoice-list">
                                             <li data-id="15">
                                                <div class="seat-name pull-left">B8, B5, C8</div>
                                                <div class="seat-price pull-right">2400</div>
                                                <div class="clearfix"></div>
                                             </li>
                                             <li data-id="15">
                                                <div class="seat-name pull-left">Insurance</div>
                                                <div class="seat-price pull-right">300</div>
                                                <div class="clearfix"></div>
                                             </li>
                                             <li class="font-bold font-lg" data-id="15">
                                                <div class="seat-name pull-left">Total</div>
                                                <div class="seat-price pull-right">2700</div>
                                                <div class="clearfix"></div>
                                             </li>
                                          </ul>

                                       </div>

                                    </div>
                                 </div>
                                 <div class="payment-options">
                                    <div class="form-group">
                                       <select class="form-control search-form-control" data-plugin="select2" data-placeholder="Payment Via" name="departure" id="departure" autocomplete="off">
                                          <optgroup label="E-Payment">
                                             <option value="Kathmandu">Esewa</option>
                                             <option value="Biratnagar">Khalti</option>
                                          </optgroup>
                                          <optgroup label="E-Banking">
                                             <option value="Jhapa">Nepal Investment Bank</option>
                                             <option value="Jhapa">Kumari Bank</option>
                                             <option value="Jhapa">Laxmi Bank</option>
                                          </optgroup>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="book-seats">
                                    <a class="btn btn-primary process-booking" href="<?php echo Yii::$app->request->baseUrl; ?>/booking/">Proceed</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="vehicle">
                           <div class="row">
                              <div class="col-lg-4 col-md-6 col-sm-12">
                                 <div class="about-vehicle">
                                    <div class="vehicle-image">
                                       <img src="<?php echo Yii::$app->request->baseUrl . Yii::$app->params['image_path']['uploads']; ?>/1.jpg" alt="">
                                    </div>

                                 </div>
                              </div>
                              <div class="col-lg-8 col-md-6 col-sm-12">
                                 <h5>About Vehicle</h5>
                                 <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer took a galley of type and scrambled it to make a type specimen
                                    book.</p>
                              </div>
                           </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="reviews">
                           <div class="row">
                              <div class="col-lg-4 col-md-6 col-sm-12">
                                 <div class="star-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                 </div>
                                 <h5 class="rating-score">2.3</h5> (out of 10)
                                 <p>15 people have rated this vehicle</p>
                                 <ul class="ratings-details">
                                    <li>

                                       <div class="rating-title"> Punctuality :
                                          <span class="rating-progress-score">5</span></div>
                                       <div class="rating-progress">
                                          <div class="progress-rating" style="width:35%"></div>
                                       </div>
                                    </li>
                                    <li>

                                       <div class="rating-title"> Cleanliness :
                                          <span class="rating-progress-score">5</span></div>
                                       <div class="rating-progress">
                                          <div class="progress-rating" style="width:40%"></div>
                                       </div>
                                    </li>
                                    <li>

                                       <div class="rating-title"> Seat comfort :
                                          <span class="rating-progress-score">5</span></div>
                                       <div class="rating-progress">
                                          <div class="progress-rating" style="width:20%"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="rating-title"> Break Location :
                                          <span class="rating-progress-score">5</span></div>
                                       <div class="rating-progress">
                                          <div class="progress-rating" style="width:10%"></div>
                                       </div>
                                    </li>
                                 </ul>
                              </div>

                              <div class="col-lg-8 col-md-6 col-sm-12">
                                 <h5 class="pull-left">Reviews</h5>
                                 <a class="pull-right" href="javascript:void(0);">View All</a>
                                 <div class="clearfix"></div>
                                 <ul class="vehicle-reviews">
                                    <li>
                                       <div class="comment">
                                          Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                          Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                          when an unknown printer took a galley of type and scrambled it to make a type
                                          specimen book.
                                       </div>
                                       <div class="author">
                                          <div class="pull-left">Ajay Pant</div>
                                          <div class="pull-right">Traveller</div>
                                          <div class="clearfix"></div>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="comment">
                                          Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                          Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                          when an unknown printer took a galley of type and scrambled it to make a type
                                          specimen book.
                                       </div>
                                       <div class="author">
                                          <div class="pull-left">Hanuman Chalise</div>
                                          <div class="pull-right">Traveller</div>
                                          <div class="clearfix"></div>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="cancellation">

                           <div class="row">
                              <div class="col-md-4 col-sm-12">
                                 <h5>Cancellation Charges</h5>
                                 <div class="cancellation-charges">
                                    <p>30 days prior to departure - 0%</p>
                                    <p>7 days prior to departure - 25%</p>
                                    <p>5 days prior to departure - 40%</p>
                                    <p>3 days prior to departure - 60%</p>
                                    <p>1 day prior to departure - 75%</p>
                                 </div>

                              </div>
                              <div class="col-md-8 col-sm-12">
                                 <h5>Cancellation Note</h5>
                                 <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer took a galley of type and scrambled it to make a type specimen
                                    book.</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </li>

         </ul>

      </div>
   </section>
</div>

