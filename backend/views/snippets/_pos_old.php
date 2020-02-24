<?php

use \common\components\Misc;

$this->registerCssFile(Yii::$app->request->baseUrl . '/../common/assets/vendor/starrjs/starrr.css');
$this->registerCssFile(Yii::$app->request->baseUrl . '/../common/assets/fonts/flaticon/flaticon.css');
$this->registerCssFile(Yii::$app->request->baseUrl . '/assets/plugins/wizard/steps.css');


$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js');
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/list.js');
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/pos.js');
$this->registerJsFile(Yii::$app->request->baseUrl . '/../common/assets/vendor/starrjs/starrr.js');


//$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/moment/min/moment.min.js');
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/wizard/jquery.steps.min.js');
//$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/wizard/jquery.validate.min.js');
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/wizard/steps.js');
?>


<!--<pre>--><?php //print_r($schedules) ; die ?><!--</pre>-->
<?php if (isset($schedules['onward']) && is_array($schedules['onward']) && !empty($schedules['onward']) && count($schedules['onward']) > 0)  : ?>
   <div class="card">
      <div class="card-header">
         <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
               <div class="card-title "><?= ucwords($search['from']) ?> To <?= ucwords($search['to']) ?> <?= (ucwords($search['departure']) != '') ? 'On ' . Misc::date_DdmY($search['departure']) : '' ?>  </div>
               <p class="m-b-0"><?= count($schedules['onward']); ?> Vehicle<?= (count($schedules['onward']) > 1) ? 's' : '' ?> Found</p>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 text-right">
               <button id="toggle-filter" class="btn btn-outline-secondary btn-rounded btn-sm"><i class="mdi mdi-filter"></i>Filter</button>
            </div>
         </div>

      </div>
      <div id="search-details-wrapper" class="search-details-wrapper with-filter">
         <div id="filters-wrapper" class="filters-wrapper">
            <div class="filters">
               <div class="row">
                  <div class="col-sm-6">
                     <div class="filter-title">Filters</div>
                  </div>
                  <div class="col-sm-6">
                     <div class="card-actions text-right">
                        <button class="btn btn-sm btn-outline-secondary">Clear Filters</button>
                     </div>
                  </div>
               </div>
            </div>
            <div class="search-filters">
               <div class="filter filter-rating">
                  <h4 class="filter-title">Rating</h4>
                  <div class="filter-body">
                     <ul class="filter-list">
                        <li>
                           <div class="star-rating">
                              <div class='starrr' data-plugin="star"></div>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
                <?php if (isset($filters['amenities']) && !empty($filters['amenities'])) : ?>
                   <div class="filter filter-amenities">
                      <h4 class="filter-title">Amenities</h4>
                      <div class="filter-body">
                          <?php $counter = 0; ?>
                         <ul class="filter-list">
                             <?php foreach ($filters['amenities'] as $k => $a): ?>
                                <li>
                                    <?php $counter++; ?>
                                   <input type="checkbox" id="check-<?php echo $counter; ?>" class=""/>
                                   <label for="check-<?php echo $counter; ?>"><?= $a['name'] ?></label>
                                </li>
                             <?php endforeach; ?>

                         </ul>
                      </div>
                   </div>
                <?php endif; ?>
                <?php if (isset($filters['vehicle-types']) && !empty($filters['vehicle-types'])) : ?>
                   <div class="filter filter-vehicle-types">
                      <h4 class="filter-title">Vehicle Type</h4>
                      <div class="filter-body">
                         <ul class="filter-list">
                             <?php foreach ($filters['vehicle-types'] as $l => $v): ?>
                                <li>
                                    <?php $counter++; ?>
                                   <input type="checkbox" id="check-<?php echo $counter; ?>" class=""/>
                                   <label for="check-<?php echo $counter; ?>"><?= ucwords($v['name']) ?></label>
                                </li>
                             <?php endforeach; ?>

                         </ul>
                      </div>
                   </div>
                <?php endif; ?>
            </div>
         </div>
         <div id="search-results-wrapper" class="search-results-wrapper">
            <div class="search-body-wrapper">
               <div class="search-header">
                  <div class="row text-center">
                     <div class="col-sm-2 col-xs-12 text-left">
                        <!--           <a href="javascript:void(0);" class="header-item sort" data-sort="s-service-provider">Name</a> /
                                   <a href="javascript:void(0);" class="header-item sort" data-sort="s-departure">Vehicle Type</a>-->
                        <a href="javascript:void(0);" class="header-item sort" data-sort="s-rating">Rating</a>
                     </div>

                     <div class="col-sm-2 col-xs-12">
                        <a href="javascript:void(0);" class="header-item sort" data-sort="s-departure">Departure</a>
                     </div>
                     <div class="col-sm-2 col-xs-12">
                        <a href="javascript:void(0);" class="header-item sort " data-sort="s-arrival"> Arival</a>
                     </div>
                     <div class="col-sm-2 col-xs-12">
                        <a href="javascript:void(0);" class="header-item sort" data-sort="s-duration">Duration</a>
                     </div>
                     <div class="col-sm-2 col-xs-12">
                        <a href="javascript:void(0);" class="header-item sort" data-sort="s-fare">Fare</a>
                     </div>
                     <div class="col-sm-2 col-xs-12">
                        <div class="header-item">
                           <a href="javascript:void(0);" class="header-item sort " data-sort="s-seats">Seats Available</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="search-results">
               <ul class="list search-body">
                   <?php foreach ($schedules['onward'] as $k => $s): ?>
                      <li class="search-list" data-id="<?= $s['id'] ?>">
                         <div class="list-item">
                            <div class="row text-center">
                               <div class="col-sm-2 col-xs-12 text-left">
                                  <div class="vehicle-details">
                                     <h3 class="m-0 item-title title service-provider"><?= ucwords($s['company']) ?></h3>
                                     <div class="s-type"><?= ucwords($s['vehicle']['type']['name']); ?></div>
                                  </div>
                               </div>
                               <div class="col-sm-2 col-xs-12">
                                  <div class="s-departure"><?= Misc::time_Hia($s['departure']) ?> <br / ><?= Misc::date_DdmY($s['departure']) ?></div>
                                  <div class="s-departure-location m-t-10"><?= (isset($s['route'][0]['location']['name'])) ? ucwords($s['route'][0]['location']['name']) : '' ?></div>

                               </div>
                               <div class="col-sm-2 col-xs-12">
                                  <div class="s-arrival"><?= Misc::time_Hia($s['arrival']) ?> <br / ><?= Misc::date_DdmY($s['arrival']) ?></div>
                                   <?php $m = end($s['route']) ?>
                                  <div class="s-departure-location m-t-10"><?= (isset($m['location']['name'])) ? ucwords($m['location']['name']) : '' ?></div>
                               </div>
                               <div class="col-sm-2 col-xs-12">
                                  <div class="s-duration"><?= $s['duration'] ?> Hrs</div>
                               </div>
                               <div class="col-sm-2 col-xs-12">
                                   <?php if (isset($s['prices']['count']['min']) && $s['prices']['count']['min'] > 0) : ?>
                                      <div class="text-small">Starts from</div>
                                       <?= Yii::$app->params['currency'] ?>
                                      <span class="s-fare"><?= $s['prices']['count']['min'] ?></span>
                                   <?php else: ?>
                                      <span class="text-small"> - </span>
                                   <?php endif; ?>


                               </div>
                               <div class="col-sm-2 col-xs-12">
                                  <div class="item-seat-count"><span class="s-seats"><?= $s['seats']['size']['count'] ?> </span> Seats</div>
                                  <div class="progress m-t-5 m-b-10">
                                      <?php
                                      $b = (!empty($s['bookings'])) ? count($s['bookings']) : 0;
                                      $a = $s['seats']['size']['count'] - $b;
                                      $c = ($a / $s['seats']['size']['count']) * 100;
                                      ?>
                                     <div class="progress-bar bg-success" style="width: <?= $c ?>%;" role="progressbar"><span class="sr-only">60% Complete</span></div>
                                  </div>
                               </div>
                            </div>
                            <div class="row">
                               <div class="col-lg-10 col-md-9 col-sm-12">
                                  <div class="vehicle-rating">
                                      <?php for ($i = 0; $i < 5; $i++) : ?>
                                         <i class="mdi <?= ($i < 3) ? 'mdi-star' : 'mdi-star-outline' ?>"></i>
                                      <?php endfor; ?>
                                     <span class="s-rating appearance-none">3</span>
                                     <div class="text-sm"><i class="mdi mdi-account-multiple m-r-5"></i>By 8 People</div>
                                  </div>
                                   <?php if (isset($s['vehicle']['amenities']) && $s['vehicle']['amenities'] > 0) : ?>
                                      <ul class="vehicle-amenities">
                                          <?php foreach ($s['vehicle']['amenities'] as $a): ?>
                                             <li><?= ucwords($a['name']) ?></li>
                                          <?php endforeach; ?>
                                      </ul>
                                   <?php endif; ?>
                               </div>
                               <div class="col-lg-2 col-md-3 col-sm-12  text-center">
                                  <button type="button" class="btn btn-primary select-seat">Select seats</button>
                               </div>
                            </div>
                         </div>
                         <div class="list-options display-none">
                            <div role="tabpanel" class="list-option-tabs">
                               <!-- Nav tabs -->
                               <ul class="nav nav-tabs" role="tablist">
                                  <li role="presentation">
                                     <a href="#seats-<?= $k; ?>" aria-controls="seats" role="tab" data-toggle="tab" class="active">Select Seats</a>
                                  </li>
                                  <li role="presentation">
                                     <a href="#vehicle-<?= $k; ?>" aria-controls="vehicle" role="tab" data-toggle="tab">Vehicle Details</a>
                                  </li>
                                  <li role="presentation">
                                     <a href="#reviews-<?= $k; ?>" aria-controls="reviews" role="tab" data-toggle="tab">Ratings & Reviews</a>
                                  </li>
                                  <li role="presentation">
                                     <a href="#cancellation-<?= $k; ?>" aria-controls="cancellation" role="tab" data-toggle="tab">Cancellation Policy</a>
                                  </li>
                               </ul>
                               <!-- Tab panes -->
                               <div class="tab-content">
                                  <div role="tabpanel" class="tab-pane active" id="seats-<?= $k ?>">

                                     <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">

                                           <div class="seat-layout-wrapper">
                                              <h5>Select Seats</h5>
                                              <div class="seat-arrangement">
                                                 <div class="seat-layout">
                                                     <?php if (isset($s)) : ?>
                                                        <div class="seat-map">
                                                           <img class="" alt="seat layout" src="<?= Yii::$app->request->baseUrl ?>/../common/assets/images/uploads/seatlayout.jpg">
                                                        </div>
                                                     <?php endif; ?>
                                                    <div class="seats">
                                                        <?php $seats = (isset($s['seats'])) ? $s['seats'] : [];
                                                        // Has seat details
                                                        if (!empty($seats)) :

                                                            /* echo '<pre>';
                                                             print_r($seats);
                                                             die;
                                                             echo '</pre>';*/
                                                            foreach ($seats['layout'] as $k => $j):

                                                                $id = (isset($j['id']) && $j['id'] != '') ? $j['id'] : $k;
                                                                $name = (isset($j['name']) && $j['name'] != '') ? $j['name'] : $id;
                                                                $status = (isset($j['status']) && $j['status'] != '') ? $j['status'] : 0;
                                                                $reservation = (isset($j['reservation']) && $j['reservation'] != '') ? $j['reservation'] : 0;
                                                                ?>
                                                               <div class="seat" style="left:<?= $j['position']['left'] ?>; top:<?= $j['position']['top'] ?>; height:<?= $j['size']['height'] ?>; width:<?= $j['size']['width'] ?>" data-seat="<?= $id ?>" data-name="<?= $name ?>" data-status="<?= $status ?>" data-reservation="<?= $reservation ?>">
                                                                  <input type="checkbox" id="seat-<?= $k ?>" class=""/>
                                                                  <label for="seat-<?= $k ?>"></label>

                                                                   <?php // echo substr($name, 0, 2)
                                                                   ?>
                                                               </div>

                                                            <?php endforeach;
                                                        else : // No Seat Details
                                                            if ($s['seat_count'] != '' && $s['seat_count'] > 0) :
                                                                for ($i = 0; $i < $s['seat_count']; $i++) : ?>
                                                                   <div class="seat-wrapper seat" data-plugin="drag" data-seat="<?= $i ?>" data-name="" data-status="" data-reservation=""><?= $i + 1 ?></div>
                                                                <?php endfor;
                                                            endif;
                                                        endif;
                                                        ?>

                                                    </div>
                                                 </div>
                                              </div>
                                           </div>
                                           <div>
                                              <a href="javascript:void(0);" class="btn btn-outline-success">Book</a>
                                           </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                           <div class="timeline-route">
                                              <ul class="timeline-horizontal">
                                                  <?php foreach ($s['route'] as $L => $p): ?>
                                                     <li class="<?= (!(($l % 2) == 0)) ? 'timeline-inverted' : '' ?>">
                                                        <!--                                                             --><? //= $p['location']['name'] ?>
                                                        <div class="timeline-badge success-outline">
                                                            <?= strtoupper(substr($p['location']['name'], 0, 1)) ?>
                                                        </div>
                                                        <div class="timeline-panel">
                                                           <div class="timeline-name"><?= ucwords($p['location']['name']); ?></div>
                                                           <div class="text-muted"><i class="mdi mdi-clock-outline"></i> <?= Misc::time_Hi($p['time']) ?></div>
                                                        </div>

                                                     </li>


                                                  <?php endforeach; ?>


                                              </ul>
                                           </div>

                                        </div>

                                     </div>

                                  </div>
                                  <div role="tabpanel" class="tab-pane" id="vehicle-<?= $k ?>">
                                     <div class="row">
                                        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                                           <div class="about-vehicle">
                                              <div class="vehicle-image">
                                                 <img class="img-responsive" src="<?= Yii::$app->request->baseUrl . '/../common/assets/images' . ((isset($s['vehicle']['image']) && $s['vehicle']['image'] != '') ? '/uploads/' . $s['vehicle']['image'] : '/no-image.png') ?>" alt="">
                                              </div>
                                           </div>
                                        </div>
                                        <div class="col-lg-10 col-md-8 col-sm-8 col-xs-12">
                                           <h5>About Vehicle</h5>
                                           <p><?= $s['vehicle']['model'] ?>,<?= $s['vehicle']['type']['name'] ?><br/>
                                              Number Plate : <?= $s['vehicle']['number_plate'] ?>
                                           </p>
                                           <p>
                                               <?= (isset($s['vehicle']['description']) && $s['vehicle']['description'] != '') ?: 'No additional description available.' ?>. </p>
                                        </div>
                                     </div>
                                  </div>
                                  <div role="tabpanel" class="tab-pane" id="reviews-<?= $k ?>">
                                     <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <?php if (isset($s['vehicle']['ratings']) && !empty($s['vehicle']['ratings'])) : ?>
                                               <div>

                                                  <ul class="ratings-details">
                                                      <?php foreach ($s['vehicle']['ratings'] as $rk => $ri): ?>
                                                         <li>
                                                            <div class="rating-title"> <?= ucwords($ri['type']) ?> : <span class="rating-progress-score"><?= $ri['rating'] ?></span></div>
                                                            <div class="progress m-t-5 m-b-10">
                                                               <div class="progress-bar bg-success" style="width:<?= ($ri['rating'] / 5) * 100 ?>px;height:5px;" role="progressbar"><span class="sr-only">60% Complete</span></div>
                                                            </div>
                                                         </li>
                                                      <?php endforeach; ?>
                                                  </ul>
                                               </div>
                                            <?php else: ?>
                                               <div>This vehicle has not been rated yet.</div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="col-lg-8 col-md-6 col-sm-12">
                                           <h5 class="pull-left">Comments</h5>
                                            <?php if (isset($s['vehicle']['comments']) && !empty($s['vehicle']['comments'])) : ?>
                                               <a class="pull-right" href="javascript:void(0);">View All</a>
                                               <div class="clearfix"></div>
                                               <ul class="vehicle-reviews">
                                                   <?php foreach ($s['vehicle']['comments'] as $vck => $vcv): ?>
                                                      <li>
                                                         <div class="comment">
                                                             <?= $vcv['comment'] ?>
                                                         </div>
                                                         <div class="author">
                                                            <div class="pull-left"><?= ucwords($vcv['name']) ?></div>
                                                            <div class="pull-right"><?= Misc::date_DdmY($vcv['created_on']) ?></div>
                                                            <div class="clearfix"></div>
                                                         </div>
                                                      </li>
                                                   <?php endforeach; ?>

                                               </ul>
                                            <?php else: ?>
                                               <div>No one has commented on this vehicle.</div>
                                            <?php endif; ?>


                                        </div>
                                     </div>
                                  </div>
                                  <div role="tabpanel" class="tab-pane" id="cancellation-<?= $k ?>">
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
                                           <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </li>
                   <?php endforeach; ?>
               </ul>
            </div>
         </div>
         <div class="clearfix"></div>

      </div>
   </div>
<?php else: ?>

<?php endif; ?>

<pre><?php print_r($schedules) ?></pre>

<div class="modal fade booking-modal" tabindex="-1" role="dialog" aria-labelledby="booking-panel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="booking-panel">Book</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         </div>
         <div class="modal-body">
            <form method="post" action="<?php echo Yii::$app->request->baseUrl; ?>/pos/">
               <input type="hidden" name="<?php echo Yii::$app->request->csrfParam; ?>" value="<?php echo Yii::$app->request->csrfToken; ?>"/>
                <?php $counter = 0; ?>
               <div class="card extended">
                  <div class="pos-search-wrapper">
                     <div class="row">
                        <div class="col-sm-1 col-xs-1">
                           <div class="date-back">
                              <a href="javascript:void(0);"> <i class="mdi mdi-chevron-left"></i></a>
                           </div>
                        </div>
                        <div class="col-sm-10 col-xs-10">
                           <div class="search-body">
                              <div class="row">
                                 <div class="col-sm-5">
                                    <div class="search-locations-picker">
                                       <div class="location-from">
                                           <?php $counter++; ?>
                                          <label for="<?php echo $counter; ?>" class="control-label required">From</label>
                                          <select name="from" id="<?php echo $counter; ?>" class="required" data-plugin="cities-ajax">
                                              <?php if (isset($search['from']) && $search['from'] != '') : ?>
                                                 <option selected="selected" value="<?= $search['from'] ?>"><?= ucwords($search['from']) ?></option>
                                              <?php endif; ?>
                                          </select>
                                       </div>
                                       <div class="location-swap">
                                          <div class="fake-label"></div>
                                          <a href="javascript:void(0);" class="reverse-date"><i class="mdi mdi-swap-horizontal"></i></a>
                                       </div>
                                       <div class="location-to">
                                           <?php $counter++; ?>
                                          <label for="<?php echo $counter; ?>" class="control-label required">To</label>
                                          <select name="to" id="<?php echo $counter; ?>" class="required" data-plugin="cities-ajax">
                                              <?php if (isset($search['to']) && $search['to'] != '') : ?>
                                                 <option selected="selected" value="<?= $search['to'] ?>"><?= ucwords($search['to']) ?></option>
                                              <?php endif; ?>
                                          </select>
                                       </div>
                                       <div class="clearfix"></div>
                                    </div>

                                 </div>
                                 <div class="col-sm-5">
                                    <div class="row">
                                       <div class="col-lg-6 col-sm-12">
                                          <div class="form-group">
                                              <?php $counter++; ?>
                                             <label for="<?php echo $counter; ?>" class="control-label">Departure Date</label>
                                             <input autocomplete="off" id="<?php echo $counter; ?>" value="<?= (isset($search['departure']) && $search['departure'] != '') ? $search['departure'] : '' ?>" name="departure" class="form-control" data-plugin="datepicker" data-startAt="<?php echo date('d-m-y') ?>">
                                          </div>
                                       </div>
                                       <div class="col-lg-6 col-sm-12 ">
                                          <div class="form-group">
                                              <?php $counter++; ?>
                                             <label for="<?php echo $counter; ?>" class="control-label">Return Date (Optional)</label>
                                             <input autocomplete="off" id="<?php echo $counter; ?>" value="<?= (isset($search['return']) && $search['return'] != '') ? $search['return'] : '' ?>" name="return" class="form-control " data-plugin="datepicker">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-2">
                                    <div class="form-group">
                                       <div class="fake-label"></div>
                                       <div class="quick-dates d_none">
                                          <a href="" class="btn btn-primary btn-sm">Today</a>
                                          <a href="" class="btn btn-primary btn-sm">Tomorrow</a>
                                       </div>
                                       <button class="btn btn-success btn-block ">
                                          <i class="fa fa-search"></i>
                                          Search
                                       </button>
                                    </div>
                                 </div>
                              </div>
                           </div>


                        </div>
                        <div class="col-sm-1 col-xs-1">
                           <div class="date-forward">

                              <a href="javascript:void(0);"> <i class="mdi mdi-chevron-right"></i></a>

                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>

<div class="booking-panel">
   <form id="booking-form">
      <h3>Account</h3>
      <fieldset>

      </fieldset>

      <h3>Profile</h3>
      <fieldset>
         <legend>Invoice</legend>
      </fieldset>

      <h3>Booking Details</h3>
      <fieldset>
         <legend>You are to young</legend>

         <p>Please go away ;-)</p>
      </fieldset>

      <h3>Finish</h3>
      <fieldset>
         <legend>Passenger Information</legend>

         <input id="acceptTerms-2" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms-2">I agree with the Terms and Conditions.</label>
      </fieldset>
   </form>
<script>

</script>