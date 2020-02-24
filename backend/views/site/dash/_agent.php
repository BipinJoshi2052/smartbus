<div class="row">
   <div class="col-md-8 col-xlg-9">
      <!-- Row -->
      <div class="row">
         <!-- Column -->
         <div class="col-lg-4">
            <div class="card">
               <div class="card-body">
                  <h4 class="card-title">Customers Growth</h4>
                  <div class="d-flex flex-row">
                     <div class="p-10 b-r">
                        <h6 class="font-light">Monthly</h6><b>20.40%</b>
                     </div>
                     <div class="p-10">
                        <h6 class="font-light">Daily</h6><b>5.40%</b>
                     </div>
                  </div>
               </div>
               <div id="spark-customers" class="sparkchart"></div>
            </div>
         </div>
         <!-- Column -->
         <!-- Column -->
         <div class="col-lg-4">
            <div class="card">
               <div class="card-body">
                  <h4 class="card-title">Vendors Growth</h4>
                  <div class="d-flex flex-row">
                     <div class="p-10 b-r">
                        <h6 class="font-light">Monthly</h6><b>20.40%</b>
                     </div>
                     <div class="p-10">
                        <h6 class="font-light">Daily</h6><b>5.40%</b>
                     </div>
                  </div>
               </div>
               <div id="spark-vendors" class="sparkchart"></div>
            </div>
         </div>
         <!-- Column -->
         <!-- Column -->
         <div class="col-lg-4">
            <div class="card">
               <div class="card-body">
                  <h4 class="card-title">Agents Growth</h4>
                  <div class="d-flex flex-row">
                     <div class="p-10 b-r">
                        <h6 class="font-light">Monthly</h6><b>20.40%</b>
                     </div>
                     <div class="p-10">
                        <h6 class="font-light">Daily</h6><b>5.40%</b>
                     </div>
                  </div>
               </div>
               <div id="spark-agents" class="sparkchart"></div>
            </div>
         </div>
         <!-- Column -->
      </div>
      <!-- Row -->
      <!-- Row -->
      <div class="row">
         <!-- Column -->
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body">
                  <div class="row">
                     <div class="col-12">
                        <div class="d-flex flex-wrap">
                           <div>
                              <h3 class="card-title">Sales Overview</h3>
                              <h6 class="card-subtitle">Vendor Vs Agent</h6></div>
                           <div class="ml-auto">
                              <ul class="list-inline">
                                 <li>
                                    <h6 class="text-muted text-success"><i class="fa fa-circle font-10 m-r-10 "></i>Vendor</h6></li>
                                 <li>
                                    <h6 class="text-muted  text-info"><i class="fa fa-circle font-10 m-r-10"></i>Agent</h6></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-12">
                        <div class="amp-pxl" style="height: 360px;"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Column -->
         <div class="col-lg-6 col-md-6">
            <div class="card">
               <div class="card-body">
                  <h3 class="card-title">Top Cities</h3>
                  <h6 class="card-subtitle"><?= date('M Y') ?></h6>
                  <div id="top-cities" style="height:285px; width:100%;"></div>
               </div>
               <div>
                  <hr class="m-t-0 m-b-0">
               </div>
               <div class="card-body text-center ">
                  <ul class="list-inline m-b-0">
                     <li>
                        <h6 class="text-muted text-info"><i class="fa fa-circle font-10 m-r-10 "></i>Kathmandu</h6></li>
                     <li>
                        <h6 class="text-muted  text-primary"><i class="fa fa-circle font-10 m-r-10"></i>Chitwan</h6></li>
                     <li>
                        <h6 class="text-muted  text-success"><i class="fa fa-circle font-10 m-r-10"></i>Dharan</h6></li>
                     <li>
                        <h6 class="text-muted  text-info"><i class="fa fa-circle font-10 m-r-10"></i>Pokhara</h6></li>
                     <li>
                        <h6 class="text-muted  text-primary"><i class="fa fa-circle font-10 m-r-10"></i>Biratnagar</h6></li>
                  </ul>
               </div>
            </div>
         </div>
         <!-- Column -->
         <div class="col-lg-6 col-md-6">
            <div class="card card-analytics">
               <div class="card-body">
                  <div class="row">
                     <div class="col-4 align-self-center">
                        <div class="spark-card-title">
                           <h3 class="card-title">Total Sales</h3>
                           <h6 class="card-subtitle"><?= date('D, d M, Y') ?></h6>
                           <h2 class="card-value">35487</h2>
                        </div>

                     </div>
                     <div class="col-8 align-self-center text-right">
                        <div class="spark-count-chart spark-total-sales"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="card card-analytics">
               <div class="card-body">
                  <div class="row">
                     <div class="col-4 align-self-center">
                        <div class="spark-card-title">
                           <h3 class="card-title">Bookings</h3>
                           <h6 class="card-subtitle"><?= date('D, d M, Y') ?></h6>
                           <h2 class="card-value">35487</h2>
                        </div>

                     </div>
                     <div class="col-8 align-self-center text-right">
                        <div class="spark-count-chart spark-bookings"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="card card-analytics">
               <div class="card-body">
                  <div class="row">
                     <div class="col-4 align-self-center">
                        <div class="spark-card-title">
                           <h3 class="card-title">Departures</h3>
                           <h6 class="card-subtitle"><?= date('M, Y') ?></h6>
                           <h2 class="card-value">35487</h2>
                        </div>

                     </div>
                     <div class="col-8 align-self-center text-right">
                        <div class="spark-count-chart spark-departures"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

      </div>
   </div>
   <div class="col-md-4 col-xlg-3">
      <!-- Column -->
      <div class="card earning-widget">
         <div class="card-header">
            <div class="card-actions">
               <a class="btn-minimize danger" data-action="expand"><i class="mdi mdi-chevron-right"></i> view all</a>
            </div>
            <h4 class="card-title m-b-0">Top Customers</h4>
         </div>
         <div class="card-body">
            <table class="table v-middle no-border">
               <tbody>
               <tr>
                  <td style="width:40px"><img src="<?= Yii::$app->request->baseUrl ?>/assets/images/users/1.jpg" width="50" class="img-circle" alt="logo"></td>
                  <td>Andrew</td>
                  <td align="right"><span class="label label-light-info"><?= Yii::$app->params['currency'] ?>  32300</span></td>
               </tr>
               <tr>
                  <td><img src="<?= Yii::$app->request->baseUrl ?>/assets/images/users/2.jpg" width="50" class="img-circle" alt="logo"></td>
                  <td>Kristeen</td>
                  <td align="right"><span class="label label-light-success"><?= Yii::$app->params['currency'] ?>  3300</span></td>
               </tr>
               <tr>
                  <td><img src="<?= Yii::$app->request->baseUrl ?>/assets/images/users/3.jpg" width="50" class="img-circle" alt="logo"></td>
                  <td>Dany John</td>
                  <td align="right"><span class="label label-light-primary"><?= Yii::$app->params['currency'] ?>  4300</span></td>
               </tr>
               <tr>
                  <td><img src="<?= Yii::$app->request->baseUrl ?>/assets/images/users/4.jpg" width="50" class="img-circle" alt="logo"></td>
                  <td>Chris gyle</td>
                  <td align="right"><span class="label label-light-warning"><?= Yii::$app->params['currency'] ?>  5300</span></td>
               </tr>
               <tr>
                  <td><img src="<?= Yii::$app->request->baseUrl ?>/assets/images/users/5.jpg" width="50" class="img-circle" alt="logo"></td>
                  <td>Prabhas</td>
                  <td align="right"><span class="label label-light-danger"><?= Yii::$app->params['currency'] ?>  4567</span></td>
               </tr>
               <tr>
                  <td><img src="<?= Yii::$app->request->baseUrl ?>/assets/images/users/6.jpg" width="50" class="img-circle" alt="logo"></td>
                  <td>Bahubali</td>
                  <td align="right"><span class="label label-light-megna"><?= Yii::$app->params['currency'] ?>  32889</span></td>
               </tr>
               </tbody>
            </table>
         </div>
      </div>
      <!-- Column -->
      <!-- Column -->
      <div class="card earning-widget">
         <div class="card-header">
            <div class="card-actions">
               <a class="btn-minimize danger" data-action="expand"><i class="mdi mdi-chevron-right"></i> view all</a>
            </div>
            <h4 class="card-title m-b-0">Top Vendors</h4>
         </div>
         <div class="card-body">
            <table class="table v-middle no-border">
               <tbody>
               <tr>
                  <td style="width:40px"><img src="<?= Yii::$app->request->baseUrl ?>/assets/images/users/1.jpg" width="50" class="img-circle" alt="logo"></td>
                  <td>Andrew</td>
                  <td align="right"><span class="label label-light-info"><?= Yii::$app->params['currency'] ?>  32300</span></td>
               </tr>
               <tr>
                  <td><img src="<?= Yii::$app->request->baseUrl ?>/assets/images/users/2.jpg" width="50" class="img-circle" alt="logo"></td>
                  <td>Kristeen</td>
                  <td align="right"><span class="label label-light-success"><?= Yii::$app->params['currency'] ?>  3300</span></td>
               </tr>
               <tr>
                  <td><img src="<?= Yii::$app->request->baseUrl ?>/assets/images/users/3.jpg" width="50" class="img-circle" alt="logo"></td>
                  <td>Dany John</td>
                  <td align="right"><span class="label label-light-primary"><?= Yii::$app->params['currency'] ?>  4300</span></td>
               </tr>
               <tr>
                  <td><img src="<?= Yii::$app->request->baseUrl ?>/assets/images/users/4.jpg" width="50" class="img-circle" alt="logo"></td>
                  <td>Chris gyle</td>
                  <td align="right"><span class="label label-light-warning"><?= Yii::$app->params['currency'] ?>  5300</span></td>
               </tr>
               <tr>
                  <td><img src="<?= Yii::$app->request->baseUrl ?>/assets/images/users/5.jpg" width="50" class="img-circle" alt="logo"></td>
                  <td>Prabhas</td>
                  <td align="right"><span class="label label-light-danger"><?= Yii::$app->params['currency'] ?>  4567</span></td>
               </tr>
               <tr>
                  <td><img src="<?= Yii::$app->request->baseUrl ?>/assets/images/users/6.jpg" width="50" class="img-circle" alt="logo"></td>
                  <td>Bahubali</td>
                  <td align="right"><span class="label label-light-megna"><?= Yii::$app->params['currency'] ?>  32889</span></td>
               </tr>
               </tbody>
            </table>
         </div>
      </div>
      <!-- Column -->
      <!-- Column -->
      <div class="card earning-widget">
         <div class="card-header">
            <div class="card-actions">
               <a class="btn-minimize danger" data-action="expand"><i class="mdi mdi-chevron-right"></i> view all</a>
            </div>
            <h4 class="card-title m-b-0">Top Agents</h4>
         </div>
         <div class="card-body">
            <table class="table v-middle no-border">
               <tbody>
               <tr>
                  <td style="width:40px"><img src="<?= Yii::$app->request->baseUrl ?>/assets/images/users/1.jpg" width="50" class="img-circle" alt="logo"></td>
                  <td>Andrew</td>
                  <td align="right"><span class="label label-light-info"><?= Yii::$app->params['currency'] ?>  32300</span></td>
               </tr>
               <tr>
                  <td><img src="<?= Yii::$app->request->baseUrl ?>/assets/images/users/2.jpg" width="50" class="img-circle" alt="logo"></td>
                  <td>Kristeen</td>
                  <td align="right"><span class="label label-light-success"><?= Yii::$app->params['currency'] ?>  3300</span></td>
               </tr>
               <tr>
                  <td><img src="<?= Yii::$app->request->baseUrl ?>/assets/images/users/3.jpg" width="50" class="img-circle" alt="logo"></td>
                  <td>Dany John</td>
                  <td align="right"><span class="label label-light-primary"><?= Yii::$app->params['currency'] ?>  4300</span></td>
               </tr>
               <tr>
                  <td><img src="<?= Yii::$app->request->baseUrl ?>/assets/images/users/4.jpg" width="50" class="img-circle" alt="logo"></td>
                  <td>Chris gyle</td>
                  <td align="right"><span class="label label-light-warning"><?= Yii::$app->params['currency'] ?>  5300</span></td>
               </tr>
               <tr>
                  <td><img src="<?= Yii::$app->request->baseUrl ?>/assets/images/users/5.jpg" width="50" class="img-circle" alt="logo"></td>
                  <td>Prabhas</td>
                  <td align="right"><span class="label label-light-danger"><?= Yii::$app->params['currency'] ?>  4567</span></td>
               </tr>
               <tr>
                  <td><img src="<?= Yii::$app->request->baseUrl ?>/assets/images/users/6.jpg" width="50" class="img-circle" alt="logo"></td>
                  <td>Bahubali</td>
                  <td align="right"><span class="label label-light-megna"><?= Yii::$app->params['currency'] ?>  32889</span></td>
               </tr>
               </tbody>
            </table>
         </div>
      </div>
      <!-- Column -->

   </div>
</div>
