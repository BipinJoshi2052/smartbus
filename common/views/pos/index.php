<?php
$this->title = Yii::$app->params['system_name'] . ' | Book Your bus';

use \common\components\Misc;

//$this->registerCssFile(Yii::$app->request->baseUrl . '/common/assets/fonts/flaticon/flaticon.css');
$this->registerCssFile(Yii::$app->request->baseUrl . '/common/assets/css/loaders.css');
$counter = 0;
$this->registerCssFile(Yii::$app->request->baseUrl . '/common/assets/vendor/pos/css/pos.css');

$this->registerJsFile(Yii::$app->request->baseUrl . '/common/assets/vendor/isotope/dist/isotope.pkgd.min.js');
$this->registerJsFile(Yii::$app->request->baseUrl . '/common/assets/vendor/qrgenerator/jquery.qrcode.js');
$this->registerJsFile(Yii::$app->request->baseUrl . '/common/assets/vendor/qrgenerator/qrcode.js');
$this->registerJsFile(Yii::$app->request->baseUrl . '/common/assets/vendor/printthis/printThis.js');
//$this->registerJsFile(Yii::$app->request->baseUrl . '/common/assets/vendor/bootstrap-datepicker/bootstrap-datepicker.min.js');
$this->registerJsFile(Yii::$app->request->baseUrl . '/common/assets/vendor/pos/js/list.js');
$this->registerJsFile(Yii::$app->request->baseUrl . '/common/assets/vendor/pos/js/pos.js');

function getFilters($schedule, $rating) {
    $str = $schedule['vehicle']['type']['name'];
    $str .= " " . $rating . '-star';
    if (isset($schedule['vehicle']['amenities'])) {
        foreach ($schedule['vehicle']['amenities'] as $am) {
            $str .= " " . strtolower($am['name']);
        }
        return $str;
    }

}

$constants = Misc::json_encode([
                                       'seat-status'       => Yii::$app->params['seat-status'],
                                       'seat-reservations' => Yii::$app->params['seat-reservations'],
                                       'booking-status'    => Yii::$app->params['booking-status'],
                                       'max-seats'         => Yii::$app->params['settings']['max_booking_seats']
                               ]);

?>
<script>
   var constants = <?= $constants ?>
</script>

<div id = "pos" class = "pos">
   <div class = "point-of-sales">
      <div class = "search-bar ">
         <div class = "search-form-wrapper">
             <?php echo $this->render('search', [
                     'search' => $search
             ]) ?>
         </div>
      </div>
      <div class = "search-extended">
         <div class = "container">
            <div class = "row">
               <div class = "col-12 col-sm-6">
                  <p class = "title m-0">
                      <?= ucwords($search['from']) ?> To <?= ucwords($search['to']) ?>
                      <?= (ucwords($search['departure']) != '') ? ', On ' . Misc::date_DdmY($search['departure']) : '' ?> :
                      <?= count($schedules['onward']); ?> vehicle<?= (count($schedules['onward']) > 1) ? 's' : '' ?> found

                  </p>
               </div>
               <div class = "col-12 col-sm-6">
                  <div class = "title inline-input-group">
                     <a href = "javascript:void(0);" id = "search-filter-collapse" class = "btn-with-icon"> <i class = "fa fa-filter"></i>Filter</a>

                     <a href = "<?= Yii::$app->request->baseUrl; ?>/pos/?from=<?= $search['from'] ?>&to=<?= $search['to'] ?>&departure=<?= Misc::date_DdmY(Misc::add_days(-1, $search['departure'])) ?>&return=<?= ($search['return'] != '') ? Misc::add_days(+1, $search['return']) : '' ?>" id = "" class = "btn-with-icon"><i class = "fa fa-chevron-left"></i> Previous Day</a>
                     <a href = "<?= Yii::$app->request->baseUrl; ?>/pos/?from=<?= $search['from'] ?>&to=<?= $search['to'] ?>&departure=<?= Misc::date_DdmY(Misc::add_days(+1, $search['departure'])) ?>&return=<?= ($search['return'] != '') ? Misc::add_days(+1, $search['return']) : '' ?>" id = "" class = "btn-with-icon-right"> Next Day
                        <i class = "fa fa-chevron-right"></i></a>
                  </div>
               </div>
            </div>
         </div>

      </div>
      <div class = "">
         <div class = "advertisements">
            <div class = "row p-r-15 p-l-15">
               <div class = "p-0 col-2 col-sm-2 col-md-2 col-lg-2">
                  <div class = "advert-image-wrapper">
                     <div class = "advert-image">
                        <img class = "image-responsive" alt = "" src = "<?= Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/adds/10.jpg"/>
                     </div>
                  </div>
               </div>
               <div class = "p-0 col-2 col-sm-2 col-md-2 col-lg-2">
                  <div class = "advert-image-wrapper">
                     <div class = "advert-image">
                        <img class = "img-responsive" = "image-responsive" alt = "" src = "<?= Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/adds/7.jpg"/>
                     </div>
                  </div>
               </div>
               <div class = "p-0 col-2 col-sm-2 col-md-2 col-lg-2">
                  <div class = "advert-image-wrapper">
                     <div class = "advert-image">
                        <img class = "image-responsive" alt = "" src = "<?= Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/adds/10.jpg"/>
                     </div>
                  </div>
               </div>
               <div class = "p-0 col-2 col-sm-2 col-md-2 col-lg-2">
                  <div class = "advert-image-wrapper">
                     <div class = "advert-image">
                        <img class = "img-responsive" = "image-responsive" alt = "" src = "<?= Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/adds/7.jpg"/>
                     </div>
                  </div>
               </div>
               <div class = "p-0 col-2 col-sm-2 col-md-2 col-lg-2">
                  <div class = "advert-image-wrapper">
                     <div class = "advert-image">
                        <img class = "image-responsive" alt = "" src = "<?= Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/adds/10.jpg"/>
                     </div>
                  </div>
               </div>
               <div class = "p-0 col-2 col-sm-2 col-md-2 col-lg-2">
                  <div class = "advert-image-wrapper">
                     <div class = "advert-image">
                        <img class = "img-responsive" = "image-responsive" alt = "" src = "<?= Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/adds/7.jpg"/>
                     </div>
                  </div>
               </div>

            </div>
         </div>
      </div>

       <?php if (isset($schedules['onward']) && is_array($schedules['onward']) && !empty($schedules['onward']) && count($schedules['onward']) > 0)  : ?>
          <div class = "">
             <div class = "card">

                <div id = "search-details-wrapper" class = "search-details-wrapper">
                   <div id = "filters-wrapper" class = "filters-wrapper">
                      <div class = "filters">
                         <div class = "row">
                            <div class = "col-sm-6">
                               <div class = "filter-title">Filters</div>
                            </div>
                            <div class = "col-sm-6">
                               <div class = "card-actions text-right">
                                  <button class = "padding-0" href = "javascript:void(0);" onclick = "location.reload();"><i class = "fa fa-close"></i></button>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class = "search-filters">
                         <div class = "filter filter-rating">
                            <h4 class = "filter-title">Rating</h4>
                            <div class = "filter-body">
                               <ul class = "filter-list">
                                  <li>
                                     <ul class = "filter-list">
                                         <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <li>
                                                <?php $counter++; ?>
                                               <input type = "checkbox" id = "check-<?php echo $counter; ?>" value = "<?= $i ?>-star"/>
                                               <label for = "check-<?php echo $counter; ?>">
                                                   <?php for ($s = 1; $s <= $i; $s++): ?>
                                                      <i class = "mdi mdi-star"></i>
                                                   <?php endfor; ?>
                                               </label>
                                            </li>
                                         <?php endfor; ?>
                                     </ul>
                                  </li>
                               </ul>
                            </div>
                         </div>
                          <?php if (isset($filters['vehicle-types']) && !empty($filters['vehicle-types'])) : ?>
                             <div class = "filter filter-vehicle-types">
                                <h4 class = "filter-title">Vehicle Type</h4>
                                <div class = "filter-body">
                                   <ul class = "filter-list">
                                       <?php foreach ($filters['vehicle-types'] as $l => $v): ?>
                                          <li>
                                              <?php $counter++; ?>
                                             <input type = "checkbox" id = "check-<?php echo $counter; ?>" class = "" value = "<?= strtolower($v['name']) ?>"/>
                                             <label for = "check-<?php echo $counter; ?>"><?= ucwords($v['name']) ?></label>
                                          </li>
                                       <?php endforeach; ?>
                                   </ul>
                                </div>
                             </div>
                          <?php endif; ?>

                          <?php if (isset($filters['amenities']) && !empty($filters['amenities'])) : ?>
                             <div class = "filter filter-amenities">
                                <h4 class = "filter-title">Amenities</h4>
                                <div class = "filter-body">
                                   <ul class = "filter-list">
                                       <?php foreach ($filters['amenities'] as $k => $a): ?>
                                          <li>
                                              <?php $counter++; ?>
                                             <input type = "checkbox" id = "check-<?php echo $counter; ?>" value = "<?= strtolower($a['name']) ?>"/>
                                             <label for = "check-<?php echo $counter; ?>"><?= $a['name'] ?></label>
                                          </li>
                                       <?php endforeach; ?>
                                   </ul>
                                </div>
                             </div>
                          <?php endif; ?>
                      </div>
                   </div>
                   <div id = "search-results-wrapper" class = "search-results-wrapper">
                      <div class = "search-body-wrapper">
                         <div class = "search-header" id = "sort-tickets">
                            <div class = "row text-center">
                               <div class = "col-6 col-sm-6 col-md-3 col-lg-2 text-left">
                                  <!--           <a href="javascript:void(0);" class="header-item sort" data-sort="s-service-provider">Name</a> /
                                             <a href="javascript:void(0);" class="header-item sort" data-sort="s-departure">Vehicle Type</a>-->
                                  <a href = "javascript:void(0);" class = "header-item sort" data-sort = "rating">Rating</a>
                               </div>
                               <div class = "col-6 col-sm-6 col-md-3 col-lg-2">
                                  <a href = "javascript:void(0);" class = "header-item sort" data-sort = "departure">Departure</a>
                               </div>
                               <div class = "col-6 col-sm-6 col-md-3 col-lg-2">
                                  <a href = "javascript:void(0);" class = "header-item sort " data-sort = "arrival"> Arival</a>
                               </div>
                               <div class = "col-6 col-sm-6 col-md-3 col-lg-2">
                                  <a href = "javascript:void(0);" class = "header-item sort" data-sort = "duration">Duration</a>
                               </div>
                               <div class = "col-6 col-sm-6 col-md-3 col-lg-2">
                                  <!--                                  <a href = "javascript:void(0);" class = "header-item sort" data-sort = ""></a>-->
                               </div>
                               <div class = "col-6 col-sm-6 col-md-3 col-lg-2">
                                  <div class = "header-item">
                                     <a href = "javascript:void(0);" class = "header-item sort " data-sort = "seats">Seats Available</a>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class = "search-results">
                         <ul id = "search-list" class = "list search-body">
                             <?php foreach ($schedules['onward'] as $k => $s): ?>
                                 <?php $r = rand(1, 5);
                                 $seatCount = $s['seats']['size']['count'] - $s['seats']['size']['bookings']; ?>
                                <li class = "search-list search-list-item <?= getFilters($s, $r) ?>"
                                    data-id = "<?= $s['id'] ?>"
                                    data-rating = "<?= $r ?>"
                                    data-type = "<?= $s['vehicle']['type']['name'] ?>"
                                    data-departure = "<?= $s['departure'] ?>"
                                    data-arrival = "<?= $s['arrival'] ?>"
                                    data-duration = "<?= Misc::timeDifferenceHr($s['departure'], $s['arrival']) ?>"
                                    data-seats = "<?= $seatCount ?>">
                                   <div class = "list-item">
                                      <div class = "row">
                                         <div class = "col-6 col-sm-6 col-md-3 col-lg-2">
                                            <div class = "vehicle-details">
                                               <h4 class = "m-0 item-title title service-provider"><?= ucwords($s['company']) ?></h4>
                                                <?= ucwords($s['vehicle']['type']['name']); ?>
                                            </div>
                                            <div class = "vehicle-rating">
                                                <?php for ($i = 0; $i < 5; $i++) : ?>
                                                   <i class = "mdi <?= ($i < $r) ? 'mdi-star' : 'mdi-star-outline' ?>"></i>
                                                <?php endfor; ?>
                                               <div class = "text-sm"><i class = "mdi mdi-account-multiple m-r-5"></i>By 8 People</div>
                                            </div>
                                         </div>
                                         <div class = "col-6 col-sm-6 col-md-3 col-lg-2">
                                             <?= Misc::time_Hia($s['departure']) ?> <br / ><?= Misc::date_DdmY($s['departure']) ?>
                                            <div class = "s-departure-location m-t-10">
                                                <?= (isset($s['route'][0]['location']['name'])) ? ucwords($s['route'][0]['location']['name']) : '' ?></div>
                                         </div>
                                         <div class = "col-6 col-sm-6 col-md-3 col-lg-2">
                                            <div class = "s-arrival">
                                                <?= Misc::time_Hia($s['arrival']) ?> <br / ><?= Misc::date_DdmY($s['arrival']) ?>
                                            </div>
                                             <?php $m = end($s['route']) ?>
                                            <div class = "s-departure-location m-t-10"><?= (isset($m['location']['name'])) ? ucwords($m['location']['name']) : '' ?></div>
                                         </div>
                                         <div class = "col-6 col-sm-6 col-md-3 col-lg-2">
                                             <?= Misc::timeDifferenceHr($s['departure'], $s['arrival']) ?> Hrs
                                         </div>
                                         <!--  <div class = "col-sm-6  col-md-4 col-lg-2"></div>-->

                                         <div class = "col-12 col-sm-12 col-md-3 col-lg-2 text-center">
                                            <div class = "item-seat-count"><?= $seatCount ?> Seats left.</div>
                                            <div class = "progress mt-10 mb-10">
                                                <?php
                                                $c = ($seatCount / $s['seats']['size']['count']) * 100;
                                                ?>
                                               <div class = "progress-bar bg-success" style = "width: <?= $c ?>%;" role = "progressbar"><span class = "sr-only"><?= $c ?>% Complete</span></div>
                                            </div>
                                            <div>
                                               <a href = "javascript:void(0);" class = "btn btn-primary select-seat">
                                                  <span class = "loader loader-15" style = "display: none"></span>
                                                  <span class = "txt">Select Seats</span>

                                               </a>
                                            </div>
                                         </div>
                                      </div>
                                      <div class = "list-footer">

                                          <?php if (isset($s['vehicle']['amenities']) && $s['vehicle']['amenities'] > 0) : ?>
                                             <ul class = "vehicle-amenities">
                                                 <?php foreach ($s['vehicle']['amenities'] as $a): ?>
                                                    <li><?= ucwords($a['name']) ?></li>
                                                 <?php endforeach; ?>
                                             </ul>
                                          <?php endif; ?>
                                      </div>
                                   </div>
                                </li>
                             <?php endforeach; ?>
                         </ul>
                      </div>
                   </div>
                   <div class = "clearfix"></div>

                </div>
             </div>
          </div>

       <?php else: ?>


           <?php if (!(isset($search) && !empty($search))) : ?>
             <div class = "card">
                <div class = "card-body">
                   <h5 class = "m-0"><i class = "mdi mdi-arrow-up"></i> Start Your search</h5>
                </div>
             </div>
           <?php else: ?>
             <div class = "card">
                <div class = "container">

                   <div class = "card-body">
                      <h5 class = "m-0"><i class = "mdi mdi-arrow-up"></i>No vehicles found. Would you like to try for the
                         <a href = "<?= Yii::$app->request->baseUrl; ?>/pos/?from=<?= $search['from'] ?>&to=<?= $search['to'] ?>&departure=<?= Misc::date_DdmY(Misc::add_days(+1, $search['departure'])) ?>&return=<?= ($search['return'] != '') ? Misc::add_days(+1, $search['return']) : '' ?>">next day</a>.</h5>

                   </div>
                </div>
             </div>
           <?php endif; ?>

       <?php endif; ?>
      <div class = "">
         <div class = "advertisements">
            <div class = "row p-r-15 p-l-15">
               <div class = "p-0 col-2 col-sm-2 col-md-2 col-lg-2">
                  <div class = "advert-image-wrapper">
                     <div class = "advert-image">
                        <img class = "image-responsive" alt = "" src = "<?= Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/adds/10.jpg"/>
                     </div>
                  </div>
               </div>
               <div class = "p-0 col-2 col-sm-2 col-md-2 col-lg-2">
                  <div class = "advert-image-wrapper">
                     <div class = "advert-image">
                        <img class = "img-responsive" = "image-responsive" alt = "" src = "<?= Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/adds/7.jpg"/>
                     </div>
                  </div>
               </div>
               <div class = "p-0 col-2 col-sm-2 col-md-2 col-lg-2">
                  <div class = "advert-image-wrapper">
                     <div class = "advert-image">
                        <img class = "image-responsive" alt = "" src = "<?= Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/adds/10.jpg"/>
                     </div>
                  </div>
               </div>
               <div class = "p-0 col-2 col-sm-2 col-md-2 col-lg-2">
                  <div class = "advert-image-wrapper">
                     <div class = "advert-image">
                        <img class = "img-responsive" = "image-responsive" alt = "" src = "<?= Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/adds/7.jpg"/>
                     </div>
                  </div>
               </div>
               <div class = "p-0 col-2 col-sm-2 col-md-2 col-lg-2">
                  <div class = "advert-image-wrapper">
                     <div class = "advert-image">
                        <img class = "image-responsive" alt = "" src = "<?= Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/adds/10.jpg"/>
                     </div>
                  </div>
               </div>
               <div class = "p-0 col-2 col-sm-2 col-md-2 col-lg-2">
                  <div class = "advert-image-wrapper">
                     <div class = "advert-image">
                        <img class = "img-responsive" = "image-responsive" alt = "" src = "<?= Yii::$app->request->baseUrl; ?>/common/assets/images/uploads/adds/7.jpg"/>
                     </div>
                  </div>
               </div>

            </div>
         </div>
      </div>


      <div id = "booking-modal" class = "modal  booking-modal" tabindex = "-1" role = "dialog" aria-labelledby = "booking-modal" aria-hidden = "true">
         <form id = "booking-form">
            <div class = "modal-dialog">
               <div class = "modal-content">
                  <button type = "button" class = "close close-modal" data-dismiss = "modal" aria-hidden = "true"><i class = "mdi mdi-close"></i></button>
                  <div id = "booking-panel" class = "booking-panel">
                     <div id = "booking-content" class = "booking-content">
                        <div role = "tabpanel" class = "list-option-tabs">
                           <!-- Nav tabs -->
                           <ul class = "nav nav-tabs" role = "tablist">
                              <li role = "presentation">
                                 <a href = "#seats" aria-controls = "seats" role = "tab" data-toggle = "tab" class = "active">Select Seats</a>
                              </li>
                              <li role = "presentation">
                                 <a href = "#route" aria-controls = "vehicle" role = "tab" data-toggle = "tab">Route</a>
                              </li>
                              <li role = "presentation">
                                 <a href = "#vehicle" aria-controls = "vehicle" role = "tab" data-toggle = "tab">Vehicle Details</a>
                              </li>
                              <li role = "presentation">
                                 <a href = "#reviews" aria-controls = "reviews" role = "tab" data-toggle = "tab">Ratings & Reviews</a>
                              </li>
                              <li role = "presentation">
                                 <a href = "#cancellation" aria-controls = "cancellation" role = "tab" data-toggle = "tab">Cancellation Policy</a>
                              </li>
                           </ul>
                           <!-- Tab panes -->
                           <div class = "tab-content">
                              <div role = "tabpanel" class = "tab-pane active" id = "seats">
                                 <div class = "row">
                                    <div class = "col-lg-4 col-md-6 col-sm-12">
                                       <div class = "bd-wrapper">
                                          <div id = "boarding-dropping" class = "boarding-dropping">
                                             <div id = "select-boarding-dropping" class = "row select-boarding-dropping">
                                                <div id = "boarding-stations-list" class = "col">
                                                   <h5>Choose Boarding</h5>
                                                   <div id = "boarding-points" class = "stations boarding-points"></div>

                                                </div>
                                                <div id = "dropping-stations-list" class = "col-md-6 col-sm-12" style = "width:0">
                                                   <h5>Choose Dropping</h5>
                                                   <div id = "dropping-points" class = "stations dropping-points"></div>
                                                </div>
                                             </div>
                                             <div id = "boarding-dropping-selected" class = "boarding-dropping-selected" style = "display: none">

                                                <div class = "selected-stations">
                                                   <div id = "s-boarding" class = "selected-station">
                                                      <div class = "location"></div>
                                                      <div class = "text-sm address"></div>
                                                   </div>
                                                   <div id = "s-dropping" class = "selected-station">
                                                      <div class = "location"></div>
                                                      <div class = "text-sm address"></div>
                                                   </div>
                                                </div>
                                             </div>

                                          </div>
                                       </div>
                                    </div>
                                    <div class = "col-lg-4 col-md-6 col-sm-12">
                                       <div id = "seats-wrapper" class = "seats-wrapper">
                                          <h4 class = "mb-20 text-center">Select your seats </h4>
                                          <div class = "seats-layout-wrapper">
                                             <div id = "seats-layout-container" class = "seats-layout-container">
                                                <div id = "seats-cover" class = "seats-cover">Select Boarding and Dropping points to proceed</div>
                                                <div id = "seats-container" class = "seats"></div>
                                             </div>
                                          </div>
                                          <div class = "seating-layout-wrapper">
                                             <div id = "seating-layout" class = "seating-layout">
                                                <!--  <div id="seat-map" class="seat-map"></div>   -->
                                                <div id = "seats-layout" class = "seats"></div>
                                             </div>
                                          </div>
                                          <div class = "layout-legend mt-20">
                                             <div class = "legend-label">
                                                <span class = "indicator available"></span> <span class = "text">Available</span>
                                             </div>
                                             <div class = "legend-label">
                                                <span class = "indicator selected"></span> <span class = "text">Selected</span>
                                             </div>
                                             <div class = "legend-label">
                                                <span class = "indicator booked"></span> <span class = "text">Booked</span>
                                             </div>
                                             <div class = "legend-label">
                                                <span class = "indicator not-available"></span> <span class = "text">Not Available</span>
                                             </div>
                                          </div>
                                          <div class = "layout-legend mt-20">
                                              <?php foreach (Yii::$app->params['seat-reservations'] as $k => $i): ?><?php if ($k !== 0) : ?>
                                                 <div class = "legend-label">
                                                    <span class = "circle"><?= ucwords(substr($i, 0, 1)) ?></span> <span class = "text"><?= ucwords($i) ?></span>
                                                 </div>
                                              <?php endif; ?><?php endforeach; ?>
                                          </div>
                                       </div>
                                       <div id = "booking-steps" style = "display:none" class = "booking-steps">
                                          <div class = "row">
                                             <div class = "col-md-4 col-sm-12">
                                                <div class = "contact-wrapper">
                                                   <div class = "mb-20">
                                                      <div class = "text-strong text-lg">Contact Details</div>
                                                      <div class = "text-sm">Your ticket will be sent to this address.</div>
                                                   </div>
                                                   <div id = "booking-info" class = "booking-info">
                                                      <div class = "form-group">
                                                          <?php $counter++; ?>
                                                         <label for = "<?php echo $counter; ?>" class = "control-label required">Name</label>
                                                         <input type = "text" id = "<?php echo $counter; ?>" name = "name" class = "form-control required">
                                                      </div>
                                                      <div class = "form-group">
                                                          <?php $counter++; ?>
                                                         <label for = "<?php echo $counter; ?>" class = "control-label required">Email</label>
                                                         <input type = "email" id = "<?php echo $counter; ?>" value = "" name = "email" class = "form-control required">
                                                      </div>
                                                      <div class = "form-group">
                                                          <?php $counter++; ?>
                                                         <label for = "<?php echo $counter; ?>" class = "control-label required">Phone Number</label>
                                                         <input type = "tel" id = "<?php echo $counter; ?>" value = "" name = "phone" class = "form-control required">
                                                      </div>

                                                      <div class = "form-group">
                                                          <?php $counter++; ?>
                                                         <label for = "<?php echo $counter; ?>" class = "control-label required">Requests</label>
                                                         <textarea id = "<?php echo $counter; ?>" name = "additional" class = "form-control required"></textarea>
                                                      </div>
                                                      <!-- <div class="form-group">
                                                       <?php /*$counter++; */ ?>
                                                      <label for="<?php /*echo $counter; */ ?>" class="control-label required">Send ticket to</label>
                                                      <div>
                                                         <div class="d-inline-b m-r-15">
                                                             <?php /*$counter++; */ ?>
                                                            <input name="sendto" type="checkbox" checked="checked" class="checkbox-sm " id="<?php /*echo $counter; */ ?>" value="email">
                                                            <label for="<?php /*echo $counter; */ ?>" class="">Email</label>
                                                         </div>

                                                         <div class="d-inline-b m-r-15">
                                                             <?php /*$counter++; */ ?>
                                                            <input name="sendto"  type="checkbox" class="checkbox-sm " id="<?php /*echo $counter; */ ?>" value="viber">
                                                            <label for="<?php /*echo $counter; */ ?>" class="">Viber</label>
                                                         </div>

                                                      </div>
                                                   </div>-->
                                                   </div>
                                                </div>
                                             </div>
                                             <div class = "col-md-8 col-sm-12">
                                                <div class = "passengers-wrapper">
                                                   <div class = "mb-28">
                                                      <div class = "text-strong text-lg">Passenger Details</div>
                                                      <div class = "text-sm">Please enter details of the passenger(s) travelling.</div>
                                                   </div>
                                                   <div id = "passengers"></div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>

                                    </div>
                                    <div class = "col-lg-4 col-md-6 col-sm-12">
                                       <div class = "booking-form-wrapper">
                                          <!--<div class="booking-disclaimer m-b-30">
                                             It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s.
                                          </div>-->
                                          <div class = "invoice-wrapper">
                                             <div class = "text-strong text-lg m-b-10">
                                                <span class = "text-lg pull-left"><span id = "selected-seat-count " style = "display: none"></span> Seats selected :  </span>
                                                <span id = "selected-seats" class = "selected-seats pull-right">None</span>
                                                <div class = "clearfix"></div>
                                             </div>
                                             <div class = "text-strong text-lg mb-30 danger">
                                                <div class = "pull-left">Total Amount :</div>
                                                <div class = "pull-right">
                                                    <?= Yii::$app->params['currency']; ?>
                                                   <span id = "invoice-total" class = "invoice-total">0</span>
                                                </div>

                                                <div class = "clearfix"></div>
                                             </div>
                                          </div>
                                          <div id = "payment-wrapper" class = "payment-wrapper" style = "display: none;">
                                             <label for = "payment-selector" class = "control-label required">Select your preferred Payment Gateway</label>
                                             <select name = "payment" id = "payment-selector" class = "form-control required">
                                                <option value = "">Pay Via</option>
                                                 <?php foreach (Yii::$app->params['payment_gateways'] as $k => $i): ?>
                                                    <optgroup label = "<?= ucwords($k) ?>">
                                                        <?php foreach ($i as $kk => $ii): ?>
                                                           <option value = "<?= $kk ?>"><?= ucwords($ii['name']) ?></option>
                                                        <?php endforeach; ?>
                                                    </optgroup>

                                                 <?php endforeach; ?>
                                             </select>
                                          </div>
                                          <div id = "book-btn-wrapper" class = "book-btn-wrapper" style = "display: none">
                                             <button type = "button" class = "btn btn-primary" disabled = "disabled" id = "book"><i class = "mdi mdi-thumb-up"></i>Book Seats</button>
                                          </div>
                                          <div id = "enter-detail-buttons" class = "text-right mt-30" style = "display: none">
                                             <button class = "btn  btn-secondary" type = "button" id = "select-seats-again">
                                                <i class = "mdi mdi-chevron-left"></i> Select seats again
                                             </button>
                                             <button class = "btn btn-success m-l-10" type = "button" id = "make-payment">
                                                <i class = "mdi mdi-cards-outline"></i> Proceed to Payment
                                             </button>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div role = "tabpanel" class = "tab-pane" id = "route">
                                 <h5>Route</h5>
                                 <div class = "timeline-route">
                                    <ul id = "timeline" class = "timeline-horizontal">

                                    </ul>
                                 </div>
                              </div>
                              <div role = "tabpanel" class = "tab-pane" id = "vehicle">
                                 <div class = "row">
                                    <div class = "col-lg-2 col-md-4 col-sm-4 col-xs-12">
                                       <div class = "about-vehicle">
                                          <div class = "vehicle-image">
                                             <img id = "vehicle-image" class = "img-responsive" src = "<?= Yii::$app->request->baseUrl . '/common/assets/images/no-image.png' ?>" alt = "No Image">
                                          </div>
                                       </div>
                                    </div>
                                    <div class = "col-lg-10 col-md-8 col-sm-8 col-xs-12">
                                       <h5>About Vehicle</h5>
                                       <p><span id = "vehicle-type"></span><br/>
                                          Number Plate : <span id = "number-plate"></span>
                                       </p>
                                       <div id = "vehicle-description">
                                          No additional description available.
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div role = "tabpanel" class = "tab-pane" id = "reviews">
                                 <div class = "row">
                                    <div class = "col-lg-4 col-md-6 col-sm-12">
                                       <ul id = "ratings-details" class = "ratings-details">
                                          <li>This vehicle has not been rated yet.</li>
                                       </ul>
                                    </div>

                                    <div class = "col-lg-8 col-md-6 col-sm-12">
                                       <div>
                                          <h5 class = "pull-left">Comments</h5>
                                          <a class = "pull-right" href = "javascript:void(0);">View All</a>
                                          <div class = "clearfix"></div>
                                       </div>
                                       <ul id = "vehicle-reviews" class = "vehicle-reviews">
                                          <li>No one has commented on this vehicle.</li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                              <div role = "tabpanel" class = "tab-pane" id = "cancellation">
                                 <div class = "row">
                                    <div class = "col-md-6 col-xs-12">
                                       <div id = "cancellation-rates"></div>
                                    </div>
                                    <div class = "col-md-6 col-xs-12">
                                       <div id = "cancellation-notes"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div id = "booked-panel" class = "booked-panel" style = "display:none;">
                     <div class = "row">
                        <div class = "col-md-4 col-sm-12">
                           <div id = "printable" class = "printable mb-60">
                              <div class = "printable-qr">
                                 <div id = "ticket-qr" class = "ticket-qr"></div>
                              </div>
                              <div class = "printable-title">
                                 <div class = "text-strong text-lg">Your Ticket has been booked.</div>
                                 <div class = "text-sm">Thank you for booking with us.</div>
                              </div>
                              <div class = "printable-ticket">
                                 <div class = "row">
                                    <div class = "col-md-6 col-sm-12">
                                       <div class = "form-group">
                                          <div class = "text-strong">Company</div>
                                          <div class = "text-sm ticket-content"><span id = "company"></span></div>
                                       </div>
                                    </div>
                                    <div class = "col-md-6 col-sm-12">
                                       <div class = "form-group">
                                          <div class = "text-strong">Booking Code</div>
                                          <div class = "text-sm ticket-content"><span id = "code"></span></div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class = "row">
                                    <div class = "col-md-6 col-sm-12">
                                       <div class = "form-group">
                                          <div class = "text-strong">Vehicle</div>
                                          <div class = "text-sm ticket-content"><span id = "vehicle"></span></div>
                                       </div>
                                    </div>
                                    <div class = "col-md-6 col-sm-12">
                                       <div class = "form-group">
                                          <div class = "text-strong">Contact</div>
                                          <div class = "text-sm ticket-content"><span id = "contact"></span></div>
                                       </div>

                                    </div>
                                 </div>
                                 <div class = "row">
                                    <div class = "col-md-6 col-sm-12">
                                       <div class = "form-group">
                                          <div class = "text-strong">Departing from</div>
                                          <div class = "text-sm ticket-content"><span id = "location_from"></span></div>
                                          <div class = "text-sm ticket-content"><span id = "departure"></span></div>
                                       </div>
                                    </div>
                                    <div class = "col-md-6 col-sm-12">
                                       <div class = "form-group">
                                          <div class = "text-strong">Destination</div>
                                          <div class = "text-sm ticket-content"><span id = "location_to"></span></div>
                                          <div class = "text-sm ticket-content"><span id = "arrival"></span></div>
                                       </div>
                                    </div>
                                 </div>

                                 <div class = "row">
                                    <div class = "col-md-6 col-sm-12">
                                       <div class = "form-group ticket-seats">
                                          <div class = "text-strong">Seats</div>
                                          <div class = "text-sm"><span id = "ticket-seats"></span></div>
                                       </div>
                                    </div>
                                    <div class = "col-md-6 col-sm-12">
                                       <div class = "form-group ticket-price">
                                          <div class = "text-strong">Price</div>
                                          <div class = "text-sm"><span id = "price"></span></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class = "printable-footer" style = "background: #efefef">
                                 <h5>Advertisement</h5>
                                 has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                              </div>
                           </div>
                           <div class = "booking-actions text-right">
                              <!--                           <button type="button" class="btn btn-secondary"><i class="mdi mdi-print"></i> Download</button>-->
                              <a href = "<?= Yii::$app->request->baseUrl; ?>/pos" class = "btn btn-secondary"><i class = "mdi mdi-save m-r-5"></i> Book Another</a>
                              <!--                           <button type="button" class="btn btn-secondary"><i class="mdi mdi-save m-r-5"></i> Save</button>-->
                              <button type = "button" class = "btn btn-primary" id = "print-ticket"><i class = "mdi mdi-print m-r-5"></i> Print</button>
                           </div>
                        </div>
                        <div class = "col-md-8 col-sm-12">
                           <div class = "advertisement-wrapper">
                              <div class = "row">
                                 <div class = "col-md-6 col-sm-12">
                                    <div id = "add-1" class = "advertisement">
                                       <img class = "img-responsive" src = "<?= Yii::$app->request->baseUrl . Yii::$app->params['image_path']['uploads'] ?>/1212.jpg" alt = "add">
                                    </div>
                                 </div>
                                 <div class = "col-md-6 col-sm-12">
                                    <div id = "add-1" class = "advertisement">
                                       <img class = "img-responsive" src = "<?= Yii::$app->request->baseUrl . Yii::$app->params['image_path']['uploads'] ?>/1213.jpg" alt = "add">
                                    </div>
                                 </div>


                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /.modal-content -->
            </div>
         </form>

         <!-- /.modal-dialog -->
      </div>

       <?php
       /*for ($i = 1; $i <= 99; $i++) {
           echo '<span class="loader m-40 loader-' . $i . '" style="display: inline-block"></span>';
       }*/
       ?>
   </div>

</div>