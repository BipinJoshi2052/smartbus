<?php
$this->title = 'Change Password ';
?>


<style type = "text/css">


   .p-01 {
      position: relative;
   }

   .jquery-accordion-menu ul li {
      width: 100%;
      padding: 9px 5px;
      float: left;
      text-decoration: none;
      color: #343a40bd;
      background: #ffffff;
      font-family: roboto;
      overflow: hidden;
      font-weight: 700;
      font-size: 14px;

   }

   .jquery-accordion-menu > ul > li {
      border-bottom: solid 1px #343a4040;
   }

   /*.jquery-accordion-menu ul li a{
      width: 100%;
       padding: 10px 5px;
       float: left;
       text-decoration: none;
       color: white;
       font-size: 13px;
       background: black;
       white-space: nowrap;
       position: relative;
       overflow: hidden;
   }*/
   .jquery-accordion-menu-label {
      min-width: 20px;
      padding: 1px 2px 1px 1px;
      position: absolute;
      right: 18px;
      top: 14px;
      font-size: 11px;
      font-weight: 800;
      color: #555;
      text-align: center;
      line-height: 18px;
      background: #f0f0f0;
      border-radius: 100%;
   }

   .p-img {
      padding-bottom: 10px;
   }


   .icon-block1 a {
      text-decoration: none;
   }

   .icon-block1 i {
      display: inline-block;
      font-size: 16px;
      color: #ffffff;
      text-align: center;
      border: 1px solid #fff;
      width: 30px;
      height: 30px;
      line-height: 30px;
      border-radius: 50%;
      margin: 0 5px;
   }

   .icon-block1 i:hover {
      background-color: #fff;
      color: #2E3434;
      text-decoration: none;
   }

   .set-01 {
      top: -6px;
   }

   .img-dash {
      position: relative;
   }

   .img-dash a {
      position: absolute;
      top: 74%;
      left: 41%;
   }

   .name-1 {
      padding: 8px 0;
      padding-left: 17px;
      color: white;
      /* background: #22b14c; */
      font-family: sans-serif;
   }

   .name-1 h4 {
      margin-bottom: 0px;
      color: #fff;
   }

   .icon-info-01 {
      position: relative;
   }

   .header-top i {
      color: #0e1a35;
   }

   .icon-info-01 .label {
      border: 2px solid #ffffff;
      font-weight: 500;
      padding: 3px 5px;
      text-align: center;
   }

   .label.label-primary {
      border-radius: 50%;
      font-size: 9px;
      left: 8px;
      position: absolute;
      top: -9px;
   }

   .client-dash {
      display: block;
      text-align: right;
   }

   .client-dash li {
      display: inline-block;
      padding-right: 18px;
   }

   .dash-history {
      padding: 10px 0 15px 0;
   }

   .change-ps {
      width: 100%;
      padding: 10px 5px;
      float: left;
      text-decoration: none;
      color: white;
      font-size: 13px;
      background: #58c9ee;
      white-space: nowrap;
      position: relative;


   }

   .change-ps:hover {
      color: white ! important;
   }

   .change-ps i {

      margin: 0 5px;

   }

   .profile-img img {
      width: 100%;
      height: 180px;
      object-fit: cover;
   }

   /*.profile-img .file {
       position: relative;
       margin-top: -20%;
       width: 100%;
       border: none;
       border-radius: 0;
       font-size: 15px;
       background: #212529b8;
   }*/
   .profile-img .file input {
      position: absolute;
      opacity: 0;
      right: 0;
      top: 0;
   }

   .profile-img .file span {
      position: absolute;
      left: 46%;
      z-index: 99;
      top: 69%;
   }

   .title {
      margin-bottom: 0px;
      padding: 4px 0;
   }

   .rounded-1 {
      color: #58c9ee ! important;
   }

   .rounded-1:hover {
      color: white ! important;
   }

   .rounded-0 {
      color: #58c9ee ! important;
   }

   .rounded-0:hover {

      color: white ! important;

   }

   .tb-sm-01 td, .tb-sm-01 th {
      color: #343a40d1;
      padding: 0.4rem;
   }

   .md-history {
      display: flex ! important;
      background: #58c9ee;
   }

   .rounded-1:active, .rounded-1:focus {
      /*  background-color: #6CC0FB;*/
      border-color: #6CC0FB;
      color: #fff ! important;
   }

   .tb-history {
      font-size: 14px;
   }

   @media (max-width: 500px) {
      .tb-history {
         display: block;
         width: 100%;
         overflow-x: auto;
      }
   }

   .dash-head h4 {
      margin-bottom: 15px;
      line-height: 1;
      font-size: 20px;
   }

   .md-more-history span {
      font-weight: 600;
      font-family: sans-serif;
      font-size: 14px;
   }

   .md-history-body {
      padding: 20px;

   }

   .cl-01 {
      color: white;
   }

   .md-title {
      color: white;
   }

   .md-radius {
      border-radius: .3rem ! important;
   }

   .client-details {
      padding: 10px 0;
   }

</style>


<section class = "dash-history">

   <div class = "container">
      <div class =         "row client-details">
         <div class = "col-sm-12 col-md-3 col-lg-3">

            <a class = "position-absolute ml-3 mt-3 text-white set-01" href = "<?php echo Yii::$app->request->baseUrl; ?>/dashboard/edit" data-toggle = "tooltip" data-placement = "bottom" title = "" data-original-title = "Edit cover images" style = "z-index: 99;">
               <i class = "fa fa-cog" aria-hidden = "true"></i>
            </a>            <div class = "profiles p-01  rounded text-center shadow-1 icon-block1">

               <div class = "profile-img p-img">

                  <img src = "<?= Yii::$app->request->baseUrl . '/common/assets/images/uploads/' . Yii::$app->user->identity->image ?> " alt = "user" class = "">
                  <div class = "file btn ">

                     <span type = "file" id = "myFile" name = "file"> <input type = "file" name = "file"> <i class = "fa fa-camera" aria-hidden = "true"></i></span>

                  </div>
               </div>
            </div>


            <div class = "content">

               <div id = "jquery-accordion-menu" class = "jquery-accordion-menu">
                  <!-- <div class="jquery-accordion-menu-header">DashBoard </div> -->
                  <ul>
                     <li class = "active"> Name : <?php echo Yii::$app->user->identity->name; ?> </li>
                     <li>Email : <?php echo Yii::$app->user->identity->email; ?> </li>
                     <li> Address :<?php echo $details['address']; ?> </li>
                     <li> Phone : <?php echo $details['phone']; ?></li>
                     <!--				<li> Gender : --><?php //echo $details['gender']; ?><!-- </li>-->

                  </ul>
                  <a class = "change-ps" href =" <?php echo Yii::$app->request->baseUrl; ?>/dashboard/reset/"><i class = "fa fa-key" aria-hidden = "true"></i>Change Password</a>

               </div>
            </div>
         </div>
         <div class=" col-sm-6 col-md-9 col-lg-9" >

               <div class="dash-var" >
                 <form method = "post" action = "<?php echo Yii::$app->request->baseUrl; ?>/dashboard/reset" enctype = "multipart/form-data">
                    <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
                    <input type = "hidden" name = "post[user_id]" value = "<?php echo  Yii::$app->user->identity->id; ?>"/>
                    <?php $counter = 0; ?>
                     <div class="form-row">
                        <div class="form-group col-md-6">
                           <label for="inputEmail4">Old Password</label>
                           <input name="post[old]" type="password" class="form-control" id="">
                        </div>
                     </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                           <label for="inputPassword4">New-Password</label>
                           <input name="post[new]" type="password" class="form-control" id="password">
                           <div class="result" id="result"></div>
                        </div>
                        <div class="form-group col-md-6">
                           <label for="inputPassword4">Repeat-Password</label>
                           <input type="password" name="post[rep]" class="form-control" id="repeat">
                           <div class="password-match"></div>
                        </div>
                       <div class="form-group">
                          <button class="btn btn-success password-btn" disabled type="submit">Confirm</button>
                       </div>
                     </div>
                  </form>
               </div>


         </div>


      </div>

   </div>
</section>
<?php if (isset($response) && $response == 1) {
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("Password Changed!","Your password has been sent.","success");';
    echo '}, 1000);</script>';
}
elseif (isset($response) && $response == 0) {
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("Error!","There was an error processing the request!","error");';
    echo '}, 1000);</script>';
} ?>

