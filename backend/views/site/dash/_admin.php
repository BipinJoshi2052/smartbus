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
<div class="row">
   <div class="col-sm-12">
      <div class="card">
         <div class="card-header">
            <div class="card-actions">
               <a class="" data-action="collapse"><i class="ti-minus"></i></a>
               <a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
               <a class="btn-close" data-action="close"><i class="ti-close"></i></a>
            </div>
            <h4 class="card-title m-b-0">Advertisements</h4>
         </div>
         <div class="card-body collapse show">
            <div class="table-responsive">
               <table class="table product-overview">
                  <thead>
                  <tr>
                     <th>Customer</th>
                     <th>Image</th>
                     <th>Ex. Date</th>
                     <th>Status</th>
                     <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                     <td>Steave Jobs</td>
                     <td>
                        <img src="<?= Yii::$app->request->baseUrl ?>/assets/images/gallery/chair.jpg" alt="iMac" width="80">
                     </td>
                     <td>10-7-2017</td>
                     <td>
                        <span class="label label-success font-weight-100">Online</span>
                     </td>
                     <td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="" data-original-title="Edit"><i class="mdi mdi-pencil"></i></a>
                        <a href="javascript:void(0)" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Delete"><i class="mdi mdi-trash"></i></a></td>
                  </tr>
                  <tr>
                     <td>Varun Dhavan</td>
                     <td>
                        <img src="<?= Yii::$app->request->baseUrl ?>/assets/images/gallery/chair2.jpg" alt="iPhone" width="80">
                     </td>

                     <td>09-7-2017</td>
                     <td>
                        <span class="label label-warning font-weight-100">Pending</span>
                     </td>
                     <td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="" data-original-title="Edit"><i class="mdi mdi-pencil"></i></a>
                        <a href="javascript:void(0)" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Delete"><i class="mdi mdi-trash"></i></a></td>
                  </tr>
                  <tr>
                     <td>Ritesh Desh</td>
                     <td>
                        <img src="<?= Yii::$app->request->baseUrl ?>/assets/images/gallery/chair3.jpg" alt="apple_watch" width="80">
                     </td>

                     <td>08-7-2017</td>
                     <td>
                        <span class="label label-success font-weight-100">Online</span>
                     </td>
                     <td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="" data-original-title="Edit"><i class="mdi mdi-pencil"></i></a>
                        <a href="javascript:void(0)" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Delete"><i class="mdi mdi-trash"></i></a></td>
                  </tr>
                  <tr>
                     <td>Hrithik</td>
                     <td>
                        <img src="<?= Yii::$app->request->baseUrl ?>/assets/images/gallery/chair4.jpg" alt="mac_mouse" width="80">
                     </td>

                     <td>02-7-2017</td>
                     <td>
                        <span class="label label-danger font-weight-100">Expired</span>
                     </td>
                     <td><a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="" data-original-title="Edit"><i class="mdi mdi-pencil"></i></a>
                        <a href="javascript:void(0)" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Delete"><i class="mdi mdi-trash"></i></a></td>
                  </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-lg-6 col-md-6 col-md-12 col-xs-12">
      <div class="card">
         <div class="card-body border-bottom">
            <a href="<?php echo Yii::$app->request->baseUrl; ?>/" class="pull-right btn btn-sm btn-rounded btn-primary">
               View All
            </a>
            <h4 class="card-title">Verify Actions</h4>
         </div>
         <!-- ============================================================== -->
         <!-- Comment widgets -->
         <!-- ============================================================== -->
         <div class="comment-widgets">
             <?php $i = 0;
             for ($i = 0; $i < 4; $i++): ?>
                <div class="d-flex flex-row comment-row">
                   <div class="p-2"><span class="round">
                                        <img src="<?php echo Yii::$app->request->baseUrl; ?>/assets/images/users/1.jpg" alt="user" width="50">
                                    </span></div>
                   <div class="comment-text w-100">
                      <h5>Johnathan Doeting</h5>
                      <p class="m-b-10">Added a new route.</p>
                      <div class="comment-footer">
                         <span class="text-muted pull-right">April 14, 2016 at 12:45 PM</span>
                         <span class="label label-success">Pending</span> <span class="action-icons">
                                            <a class="label label-success" href="javascript:void(0)">
                                                Approve
                                            </a>
                                            <a class="label label-danger" href="javascript:void(0)">
                                                Reject
                                            </a>

                                        </span>
                      </div>
                   </div>
                </div>
             <?php endfor;
             ?>

         </div>
      </div>
   </div>
   <div class="col-lg-6 col-md-6 col-md-12 col-xs-12">
      <div class="card">
         <div class="card-body border-bottom">
            <a href="<?php echo Yii::$app->request->baseUrl; ?>/" class="pull-right btn btn-sm btn-rounded btn-primary">
               View All
            </a>
            <h4 class="card-title">Verify Comments</h4>
         </div>
         <!-- ============================================================== -->
         <!-- Comment widgets -->
         <!-- ============================================================== -->
         <div class="comment-widgets">
             <?php $i = 0;
             for ($i = 0; $i < 4; $i++): ?>
                <div class="d-flex flex-row comment-row">
                   <div class="p-2">
                      <span class="round">A</span>
                   </div>
                   <div class="comment-text w-100">
                      <h5>Johnathan Doeting</h5>
                      <p class="m-b-10">Added a new route.</p>
                      <div class="comment-footer">
                         <span class="text-muted pull-right">April 14, 2016 at 12:45 PM</span>
                         <span class="label label-success">Pending</span> <span class="action-icons">
                                            <a class="label label-success" href="javascript:void(0)">
                                                Approve
                                            </a>
                                            <a class="label label-danger" href="javascript:void(0)">
                                                Reject
                                            </a>

                                        </span>
                      </div>
                   </div>
                </div>
             <?php endfor;
             ?>

         </div>
      </div>
   </div>
</div>