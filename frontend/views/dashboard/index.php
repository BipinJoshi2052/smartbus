<?php
$this->title = 'Dashboard';

?>


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
                     <li> Address :<?php echo  (isset($details['address'])) ? $details['address'] : '' ?> </li>
                     <li> Phone : <?php echo  (isset($details['phone'])) ? $details['phone'] : '' ?></li>
                     <!--				<li> Gender : --><?php //echo $details['gender']; ?><!-- </li>-->

                  </ul>
                  <a class = "change-ps" href = " <?php echo Yii::$app->request->baseUrl; ?>/dashboard/reset/"><i class = "fa fa-key" aria-hidden = "true"></i>Change Password</a>

               </div>
            </div>
         </div>
         <div class = " col-sm-12 col-md-9 col-lg-9">


            <div class = "dash-var">
               <div class = "dash-head text-left">
                  <h4>History</h4>
               </div>

               <table class = "table table-striped table-bordered  table-sm tb-sm-01 tb-history text-center ">
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
                  <tr>
                     <th scope = "row">3/2/2020</th>
                     <td>Kathmandu</td>
                     <td>Pokhara</td>
                     <td>2</td>
                     <td>Rs 600</td>
                     <td>
                        <div class = "bid-button">
                           <a href = "" class = "btn btn-primary btn-outline-primary rounded-1 text-white  " data-toggle = "modal" data-target = ".bd-example-modal-lg">Detail</a>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <th scope = "row">3/2/2020</th>
                     <td>Kathmandu</td>
                     <td>Pokhara</td>
                     <td>2</td>
                     <td>Rs 600</td>
                     <td>
                        <div class = "bid-button">
                           <a href = "" class = "btn btn-primary btn-outline-primary rounded-1 text-white  ">Detail</a>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <th scope = "row">3/2/2020</th>
                     <td>Kathmandu</td>
                     <td>Pokhara</td>
                     <td>2</td>
                     <td>Rs 600</td>
                     <td>
                        <div class = "bid-button">
                           <a href = "" class = "btn btn-primary btn-outline-primary rounded-1 text-white  ">Detail</a>
                        </div>
                     </td>
                  </tr>
                  </tbody>
               </table>


               <div class = "more-info">
                  <a href = "" class = "btn btn-primary btn-outline-primary rounded-0 text-white py-2 px-4"> More</a>
               </div>

            </div>


         </div>


      </div>

   </div>

   <!-- Large modal -->
   <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>
    -->
   <div class = "modal fade bd-example-modal-lg" tabindex = "-1" role = "dialog" aria-labelledby = "myLargeModalLabel" aria-hidden = "true">
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
                        <P><span>Depature Date </span>: &nbsp;14th, May 2020 at 6:00 AM</P>
                     </div>


                  </div>
                  <div class = "col-md-4">
                     <div class = "md-more-history">
                        <P><span> Depature  </span> :&nbsp; Pokhara</P>
                     </div>
                  </div>
                  <div class = "col-md-4">
                     <div class = "md-more-history">
                        <P><span> Seat Booked </span> :&nbsp; A1, B1, A2</P>
                     </div>
                  </div>
                  <div class = "col-md-4">
                     <div class = "md-more-history">
                        <P><span> Arrival </span> :&nbsp;Kathmandu</P>
                     </div>
                  </div>
                  <div class = "col-md-4">
                     <div class = "md-more-history">
                        <P><span>Arrival Date </span> :&nbsp; 14th, May 2020 at 6:00 AM</P>
                     </div>
                  </div>

               </div>
            </div>
            <div class = "modal-footer">

            </div>
         </div>
      </div>
   </div>


</section>


