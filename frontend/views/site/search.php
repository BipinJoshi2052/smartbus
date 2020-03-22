<?php

/* @var $this yii\web\View */
$this->title = 'Bookings';

$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/css/an.css');

//echo '<pre>';
//print_r($details);
//echo '</pre>';
//die;

use  \yii\widgets\LinkPager;

?>

<div class = "page-header">
   <div class = "container">
      <h1 class = "title">Your Bookings</h1>
   </div>
</div>
<section class = "page-section">
   <div class = "container">
      <div class = "row">
          <div class = "col-sm-6">
                       <div class = "ticket bg-grey "  id = "printable">
             <?php if (empty($details)) { ?>
                <h3>Sorry, No Bookings Found</h3>
             <?php }
             else {
                 ?>
                 <?php foreach ($details as $d) {
                     $depart = $d['schedule']['departure'];
                     $e = \common\components\Misc::date_DdmY($d['schedule']['departure']);
                     $start_date = new DateTime($d['schedule']['arrival']);
                     $since_start = $start_date->diff(new DateTime($d['schedule']['departure']));
                     ?>
                   <div class = "section-title" style = "text-align: center;">
                      <!-- Heading -->
                      <h2 class = "title" style = "color: #0C8FBF"><?php echo strtoupper($d['schedule']['location_from']) ?> <i class = "fa fa-arrow-right" style = "color: chocolate"></i> <?php echo strtoupper($d['schedule']['location_to']) ?></h2>
                      <!--               <p><b>Duration : </b>--><?php //echo $since_start->days . ' days ' . $since_start->h . 'hrs ' . $since_start->i . 'minutes'; ?><!--</p>-->
                   </div>
                   <p style = "text-align: center; margin: -27px 0px 22px 0px; "><b>Departure Date: </b> <?php echo $e; ?></p>
                   <div class = "section-title ">
                      <h3 class = "title" style = "color: #0C8FBF"> Booking Details</h3>
                      <hr width = "50%" size = "100" style = "margin: initial">
                   </div>
                   <div class = "booker-details ">
                      <p><b>Booked By:</b> <?php echo $d['name']; ?></p>
                      <p><b><?php
                              if ($d['name'] && $d['name'] != '') {
                                  echo $d['name'] . '\'s Email';
                              }
                              else {
                                  echo 'Booked By:';
                              } ?></b> <?php echo $d['email']; ?></p>
                      <p><b><?php
                              if ($d['name'] && $d['name'] != '') {
                                  echo $d['name'] . '\'s Number';
                              }
                              else {
                                  echo 'Booked By:';
                              } ?></b> <?php echo $d['phone']; ?></p>
                      <p><b>Total seats booked: </b><?php echo $d['seat_count'] ?></p>
                      <p><b>Total Price: </b><?php echo $d['price'] . ' rs'; ?></p>
                   </div>
                 <?php } ?>
                <div class = "section-title">
                   <h3 class = "title" style = "color: #0C8FBF">Passenger Details</h3>
                   <hr width = "50%" size = "100" style = "margin: initial">
                </div>
                <div class = "passenger-details">
                    <?php foreach ($details as $d) {
                        $passenger = json_decode($d['seats']);
                        $payment = json_decode($d['payment']); ?>
                       <div class = "passenger-detail row" >
                           <?php foreach ($passenger as $p) {
                               ?>
                              <div class = "col-md-6" style="margin-top: 10px;">
                                 <p><i class = "fa fa-users"></i> <b> Passenger's Name :</b> <?php echo $p->passenger->name; ?></p>
                                 <p><i class = "fa fa-child"></i><b> Passenger's Age :</b> <?php echo $p->passenger->age; ?></p>
                                 <p><i class = "fa fa-venus-mars"></i><b> Passenger's Gender :</b> <?php echo $p->passenger->gender; ?></p>
                                 <p><i class = "mdi mdi-seat"></i><b> Seat Number:</b><?php echo $p->name . ' ' . $p->id; ?></p>

                              </div>
                           <?php } ?>
                          <div style = "padding: 20px; margin-left:30%  ">
                             <button class = "btn btn-sm btn-primary" onclick = "printTicket('printable')">Print Your Ticket</button>
                          </div>
                       </div>

                    <?php } ?>
                </div>
             <?php } ?>
         </div>

          </div>
          <div class = "col-sm-6">
                       <div class = "addvertisement bg-light "  id = "">
              <?php foreach ($add as $advertisement){ ?>
              <div class = "section-title">
                <h2><?php echo $advertisement['title']; ?></h2>
              </div>
                 <img  src = "<?php echo  Yii::$app->request->baseUrl.'/common/assets/images/uploads/'.$advertisement['image']?>"  alt = "">
                <div>
                   <p style="text-align: center"><?php echo $advertisement['alt_text'] ?></p>
                   <h2>Content:</h2>
                   <p><?php echo $advertisement['content'] ?></p>
                </div>
              
              <?php } ?>
         </div>

          </div>

      </div>

   </div>
</section>
<script>
   function printTicket(printable) {
      var printContents = document.getElementById(printable).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();

      document.body.innerHTML = originalContents;
   }
</script>