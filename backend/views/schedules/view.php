<?php
$this->title = "View Schedule";

use \common\components\Misc;


$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js');
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js');

$this->registerJsFile(Yii::$app->request->baseUrl . '/../common/assets/vendor/horizontal-timeline/timeline.js');
$this->registerCssFile(Yii::$app->request->baseUrl . '/../common/assets/vendor/horizontal-timeline/timeline.css');


//$this->registerCssFile(Yii::$app->request->baseUrl . '/../common/assets/fonts/flaticon.css');
?>
<!--<pre>--><?php //print_r($schedule) ;die;?><!--</pre>-->
<div class="container-fluid view-schedule">
   <div class="row page-titles">
      <div class="col-lg-8 col-md-8 col-sm-12 align-self-center">
         <div class="schedule-title loc">
            <h3 class="text-themecolor m-b-0 m-t-0">
                <?= (isset($schedule['location_from']) && $schedule['location_from'] != '') ? ucwords($schedule['location_from']) : '' ?> - <?= (isset($schedule['location_to']) && $schedule['location_to'] != '') ? ucwords($schedule['location_to']) : '' ?>
            </h3>

         </div>
         <div class="schedule-title">
            <i class="mdi mdi-bus"></i>
             <?= $schedule['vehicle']['number_plate'] ?>
         </div>

         <div class="schedule-title time">
            <i class="mdi mdi-clock-outline "></i>
             <?= Misc::time_Hia($schedule['departure']) ?>
         </div>
         <div class="schedule-title date">
            <i class="mdi mdi-calendar "></i>
             <?= Misc::date_DdmY($schedule['departure']) ?>
         </div>


         <div class="schedule-title booking-count">
            <i class="mdi mdi-clipboard-outline "></i>
             <?= $schedule['total_bookings'] ?> /
             <?= $schedule['vehicle']['seat_count'] ?>
         </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 align-self-center text-right">
         <a href="<?= Yii::$app->request->baseUrl; ?>/schedules" class="btn btn-primary">
            <i class="mdi mdi-arrow-left m-r-5"></i>
            View All
         </a>

         <a href="<?= Yii::$app->request->baseUrl; ?>/schedules/edit/<?= Misc::encrypt($schedule['id']) ?>" class="btn btn-primary">
            <i class="mdi mdi-pencil m-r-5"></i>
            Edit Schedule
         </a>
      </div>
   </div>
    <?php if (isset($schedule['scheduleRoutes']) && !empty($schedule['scheduleRoutes'])) : ?>

       <div class="card card-extended">
          <div class="card-body">
             <div class="cd-horizontal-timeline">
                <div class="timeline">
                   <div class="events-wrapper">
                      <div class="events">
                         <ol>
                            <!-- DD/MM/YYYY  -->
                             <?php foreach ($schedule['scheduleRoutes'] as $k => $i): ?>
                                 <?php $t = ($schedule['departure'] . ' ' . $i['time']) ?>
                                <li>
                                    <?= strtotime($t); ?>
                                   <br/>
                                   <a href="#0" data-date="<?= date('H:i', strtotime( $i['time'])) ?>" class="<?= ($k == 1) ? 'selected' : '' ?>"><?= Misc::time_Hia($i['time']) ?></a>
                                </li>
                             <?php endforeach; ?>
                            <!-- <li><a href="#0" data-date="28/02/2014">28 Feb</a></li>
                             <li><a href="#0" data-date="20/04/2014">20 Mar</a></li>
                             <li><a href="#0" data-date="20/05/2014">20 May</a></li>
                             <li><a href="#0" data-date="09/07/2014">09 Jul</a></li>
                             <li><a href="#0" data-date="30/08/2014">30 Aug</a></li>
                             <li><a href="#0" data-date="15/09/2014">15 Sep</a></li>
                             <li><a href="#0" data-date="01/11/2014">01 Nov</a></li>
                             <li><a href="#0" data-date="10/12/2014">10 Dec</a></li>
                             <li><a href="#0" data-date="19/01/2015">29 Jan</a></li>
                             <li><a href="#0" data-date="03/03/2015">3 Mar</a></li>-->
                            <!--                                <li><a href="#0" data-date="--><? //= date('d/m/y h:i:s', strtotime(($schedule['departure'] . ' ' . $i['time']))) ?><!--" class="--><? //= ($k == 1) ? 'selected' : '' ?><!--">--><? //= Misc::time_Hia($i['time']) ?><!--</a></li>-->

                         </ol>
                         <span class="filling-line" aria-hidden="true"></span>
                      </div> <!-- .events -->
                   </div> <!-- .events-wrapper -->

                   <ul class="cd-timeline-navigation">
                      <li><a href="#0" class="prev inactive">Prev</a></li>
                      <li><a href="#0" class="next">Next</a></li>
                   </ul> <!-- .cd-timeline-navigation -->
                </div> <!-- .timeline -->


             </div>

          </div>
       </div>
    <?php endif; ?>
   <div class="card card-extended text-center">
       <?php if (isset($schedule['seats']) && $schedule['seats'] != '') :
           $seats = Misc::json_decode($schedule['seats']);
           $h = (isset(Yii::$app->params['vehicle-layout'][$schedule['vehicle']['seat_map']]['height']) && Yii::$app->params['vehicle-layout'][$schedule['vehicle']['seat_map']]['height'] > 0) ? Yii::$app->params['vehicle-layout'][$schedule['vehicle']['seat_map']]['height'] : 0;
           $w = (isset(Yii::$app->params['vehicle-layout'][$schedule['vehicle']['seat_map']]['width']) && Yii::$app->params['vehicle-layout'][$schedule['vehicle']['seat_map']]['width'] > 0) ? Yii::$app->params['vehicle-layout'][$schedule['vehicle']['seat_map']]['width'] : 0;
           ?>

          <div class="card-body seating">
             <div class="seating-layout-wrapper">
                <div id="seating-layout" style="height:<?= $h ?>px; width:<?= $w ?>px;" class="seating-layout" data-vehicle="<?= Misc::encrypt($schedule['id']) ?>">
                   <div class="seats">
                       <?php $seats = (isset($schedule['seats'])) ? Misc::json_decode($schedule['seats'], true) : [];

                       // Has seat details
                       if (!empty($seats)) :

                           foreach ($seats as $k => $s):

                               $id = (isset($s['id']) && $s['id'] != '') ? $s['id'] : $k;
                               $name = (isset($s['name']) && $s['name'] != '') ? $s['name'] : $id;
                               $status = (isset($s['status']) && $s['status'] != '') ? $s['status'] : 0;
                               $reservation = (isset($s['reservation']) && $s['reservation'] != '') ? $s['reservation'] : 0;
                               $booked = (isset($s['booking']) && $s['booking'] != '') ? $s['booking'] : 0;
                               ?>

                              <div class="seat-wrapper seat  <?= ($booked != 0) ? 'booked' : ''; ?> <?= ($status != 1) ? 'disabled' : '' ?>" style="left:<?= $s['position']['left'] ?>; top:<?= $s['position']['top'] ?>; height:<?= $s['size']['height'] ?>; width:<?= $s['size']['width'] ?>" data-seat="<?= $id ?>" data-name="<?= $name ?>" data-status="<?= $status ?>" data-reservation="<?= $reservation ?>"><?= substr($name, 0, 2) ?></div><?php endforeach;
                       else : // No Seat Details
                           if ($schedule['seat_count'] != '' && $schedule['seat_count'] > 0) :
                               for ($i = 0;
                                    $i < $schedule['seat_count'];
                                    $i++) : ?>
                                  <div class="seat-wrapper seat" data-plugin="drag" data-seat="<?= $i ?>" data-name="" data-status="" data-reservation=""><?= $i + 1 ?></div>
                               <?php endfor;
                           endif;
                       endif;
                       ?>

                   </div>
                </div>
             </div>


          </div>

       <?php endif; ?>
   </div>


    <?php if (isset($schedule['bookings']) && !empty($schedule['bookings'])) : ?>
       <div class="card card-extended">
          <div class="card-header">
             <div class="card-title">Bookings</div>
          </div>

          <div class="card-body">
             <table class="table  table-striped" data-plugin="datatable">
                <thead>
                <tr>
                   <th>Booking Code</th>
                   <th>Customer</th>
                   <th>Seats</th>
                   <th>Date</th>
                   <th></th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($schedule['bookings'] as $k => $b): ?>
                   <tr>
                      <td><?= $b['data']['booking_code'] ?></td>
                      <td> <?= ucwords($b['data']['name']) ?>,<br/>
                          <?= ucwords($b['data']['phone']) ?>,<br/>
                          <?= ucwords($b['data']['email']) ?>
                      </td>

                      <td>
                          <?php foreach ($b['data']['seats'] as $ss): ?>
                              <?= $ss['name'] ?> :  <?= $ss['passenger']['name'] ?>,  <?= $ss['passenger']['age'] ?>,  <?= ucwords($ss['passenger']['gender']) ?><br/>
                          <?php endforeach; ?>

                      </td>
                      <td><?= Misc::date_DdmY($b['data']['created_on']) ?></td>

                      <td><a class="m-r-10" data-identity="Jj0G8HnzP" href="javascript:void();">Cancel</a></td>
                   </tr>
                <?php endforeach; ?>
                </tbody>
             </table>
          </div>
       </div>
    <?php endif; ?>

   <!--   <pre>--><?php //print_r($schedule) ?><!--</pre>-->
</div>





