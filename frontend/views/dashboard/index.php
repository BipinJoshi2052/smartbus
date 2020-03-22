<?php

$this->title = 'Dashboard';

$this->registerCssFile(Yii::$app->request->baseUrl . '/assets/plugins/datatables/datatables.min.css');
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/datatables/datatables.min.js');

use common\components\Misc; ?>


<style type = "text/css">


</style>


<section class = "dash-history">

   <div class = "container">
      <div class = "row client-details">
         <div class = "col-sm-12 col-md-3 col-lg-3">

            <a class = "position-absolute ml-3 mt-3 text-white set-01" href = "<?php echo Yii::$app->request->baseUrl; ?>/dashboard/edit" data-toggle = "tooltip" data-placement = "bottom" title = "" data-original-title = "Edit cover images" style = "z-index: 99;">
               <i class = "fa fa-cog" aria-hidden = "true"></i>
            </a>
            <div class = "profiles p-01  rounded text-center shadow-1 icon-block1">

               <div class = "profile-img p-img">


                  <img id = "blah" src = "<?php echo (isset($details['user']['image']) && $details['user']['image'] != '') ? Yii::$app->request->baseUrl . '/common/assets/images/uploads/' . $details['user']['image'] : Yii::$app->request->baseUrl . '/common/assets/images/no-image.png' ?>" alt = "user" class = "">


                  <div class = "file btn ">
                     <form method = "post" action = "" enctype = "multipart/form-data">
                        <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>

                        <span>
                        <input type = 'file' id = "pic" onchange = "readURL(this);"/>
                        <i class = "fa fa-camera" aria-hidden = "true"></i>
                     </span>
                     </form>

                  </div>
               </div>
            </div>


            <div class = "content">

               <div id = "jquery-accordion-menu" class = "jquery-accordion-menu">
                  <!-- <div class="jquery-accordion-menu-header">DashBoard </div> -->
                  <ul>
                     <li class = "active"> Name : <?php echo Yii::$app->user->identity->name; ?> </li>
                     <li>Email : <?php echo Yii::$app->user->identity->email; ?> </li>
                     <li> Address :<?php echo (isset($details['address'])) ? $details['address'] : '' ?> </li>
                     <li> Phone : <?php echo (isset($details['phone'])) ? $details['phone'] : '' ?></li>
                     <!--				<li> Gender : --><?php //echo $details['gender']; ?><!-- </li>-->

                  </ul>
                  <a class = "change-ps" href = " <?php echo Yii::$app->request->baseUrl; ?>/dashboard/reset/"><i class = "fa fa-key" aria-hidden = "true"></i>Change Password</a>

               </div>
            </div>
         </div>
         <div class = "col-md-9 col-sm-12 history" style="font-size: 15px;">
            <div class = "card extended" >
               <div class = "card-header">
                  <h5 class = "card-title">History</h5>
               </div>
               <div class = "card-body">
                  <table class = "table  table-striped" data-plugin = "datatable">
                     <thead>
                     <tr>
                        <th scope = "col"> Date</th>
                        <th scope = "col">From</th>
                        <th scope = "col">To</th>
                        <th scope = "col">Passenger No</th>
                        <th scope = "col">Price</th>
                        <th scope = "col">Option</th>
                     </tr>
                     </thead>
                     <tbody>
                     <?php foreach ($history as $h) { ?>
                        <tr>
                           <td>
                               <?php echo \common\components\Misc::date_DdmY($h['created_on']) ?></td>
                           <td><?php echo(isset($h['boarding0']['name']) && $h['boarding0']['name'] != '' ? $h['boarding0']['name'] : '') ?></td>
                           <td><?php echo(isset($h['dropping0']['name']) && $h['dropping0']['name'] != '' ? $h['dropping0']['name'] : '') ?></td>
                           <td><?php echo(isset($h['seat_count']) && $h['seat_count'] != '' ? $h['seat_count'] : '') ?></td>
                           <td>Rs <?php echo(isset($h['price']) && $h['price'] != '' ? $h['price'] : ''); ?></td>
                           <td>
                              <div class = "bid-button">
                                 <a href = "javascript:void(0);" class = "btn btn-primary btn-sm btn-outline-primary rounded-1 text-white show-history " data-id = "<?php echo $h['id']; ?>">Detail</a>
                              </div>
                           </td>
                        </tr>
                     <?php } ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <!--         <div class = " col-sm-12 col-md-9 col-lg-9">-->
         <!--            <div class = "dash-var">-->
         <!--               <div class = "dash-head text-left">-->
         <!--                  <h4>History</h4>-->
         <!--               </div>-->
         <!---->
         <!--           -->
         <!---->
         <!---->
         <!--               <div class = "more-info">-->
         <!--                  <a href = "" class = "btn btn-primary btn-outline-primary rounded-0 text-white py-2 px-4"> More</a>-->
         <!--               </div>-->
         <!---->
         <!--            </div>-->
         <!---->
         <!---->
         <!--         </div>-->


      </div>

   </div>

</section>
<!-- Large modal -->
<!--<button type = "button" class = "btn btn-primary" data-toggle = "modal" data-target = ".history-modal">Large modal</button>-->

<div class = "modal fade history-modal" tabindex = "-1" role = "dialog" aria-labelledby = "myLargeModalLabel" aria-hidden = "true" id = "show-history">
   <div class = "modal-dialog modal-lg" role = "document">
      <div class = "modal-content md-radius">
         <div class = "modal-header md-history ">
            <h5 class = "modal-title md-title">History</h5>
            <button type = "button" class = "close cl-01" data-dismiss = "modal" aria-label = "Close">
               <span aria-hidden = "true">&times;</span>
            </button>
         </div>
         <div class = "modal-body md-history-body">
            <div class = "row">
               <div class = "col-md-4">
                  <div class = "md-more-history">
                     <p>
                        <span class = "label label-default">Date:</span>
                        <span id = "booking-date"></span>
                     </p>
                  </div>
               </div>
               <div class = "col-md-4">
                  <div class = "md-more-history">
                     <p style="display: inline-block">
                        <span class = "label label-default">Departure:</span>
                        <span id = "bookingFrom"></span>
                     </p>
                  </div>
               </div>
               <div class = "col-md-4">
                  <div class = "md-more-history">
                     <span class = "label label-default">Seats:</span>
                     <ul id = "seat" style="display: inline-flex">

                     </ul>
                  </div>
               </div>
               <div class = "col-md-4">
                  <div class = "md-more-history">
                     <p>
                        <span class = "label label-default">Departure:</span>
                        <span id = "bookingTo"></span>
                     </p>
                  </div>
               </div>
               <div class = "col-md-4">
                  <div class = "md-more-history">
                     <p style="display: inline-block">
                        <span class = "label label-default">Email:</span>
                        <span id = "email"></span>
                     </p>
                  </div>
               </div>
            </div>
         </div>
         <div class = "modal-footer">

         </div>
      </div>
   </div>
</div>


<script>
   var hist =<?php echo json_encode($history); ?>;
   var modal = $('.history-modal');
   $("body").on("click", ".show-history", function () {
      var id = $(this).data('id');
      var history = hist[id];
      var dropping = history['dropping0'];
      var boarding = history['boarding0'];
      var seats = history['seats'];
      var date =new Date(history['created_on']);
      modal.find('#booking-date').html(date.toDateString());
      modal.find('#bookingFrom').html(boarding['name'].toUpperCase());
    var s = '';
      seats.forEach(function (seat) {
          s += '<li>' + seat['id'] +'</li>&nbsp;';
          // modal.find('#seat').append(s);
      });
       modal.find('#seat').html(s);
      modal.find('#bookingTo').html(dropping['name'].toUpperCase());
      modal.find('#email').html(history['email']);
      modal.modal('show')
   });
</script>