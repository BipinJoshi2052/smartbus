<?php
$this->title = "Welcome " . ucwords(Yii::$app->user->identity->name);
$this->registerCssFile(Yii::$app->request->baseUrl . '/assets/plugins/chartist-js/dist/chartist.min.css');
$this->registerCssFile(Yii::$app->request->baseUrl . '/assets/plugins/chartist-js/dist/chartist-init.css');
$this->registerCssFile(Yii::$app->request->baseUrl . '/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css');
$this->registerCssFile(Yii::$app->request->baseUrl . '/assets/plugins/c3-master/c3.min.css');


$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/chartist-js/dist/chartist.min.js');
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js');
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/d3/d3.min.js');
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/c3-master/c3.min.js');

$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js');
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/sparkline/jquery.sparkline.min.js');


$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/dashboard6.js');

?>

<div class="container-fluid">

   <div class="row page-titles">
      <div class="col-md-5 col-8 align-self-center">
         <h3 class="text-themecolor">Dashboard</h3>
         <ol class="breadcrumb">
            <li class="breadcrumb-item">Welcome</li>
            <li class="breadcrumb-item active"><?= Yii::$app->user->identity->name ?></li>
         </ol>
      </div>
      <div class="col-md-7 col-4 align-self-center">
         <div class="d-flex m-t-10 justify-content-end">
            <div class="d-flex m-r-20 m-l-10 hidden-md-down">
               <div class="chart-text m-r-10">
                  <h6 class="m-b-0">
                     <small>LAST WEEK</small>
                  </h6>
                  <h4 class="m-t-0"><?= Yii::$app->params['currency'] ?> 48,356</h4></div>
               <div class="spark-chart">
                  <div id="lastmonthchart"></div>
               </div>
            </div>
            <div class="d-flex m-r-20 m-l-10 hidden-md-down">
               <div class="chart-text m-r-10">
                  <h6 class="m-b-0">
                     <small>THIS WEEK</small>
                  </h6>
                  <h4 class="m-t-0"><?= Yii::$app->params['currency'] ?> 58,356</h4></div>
               <div class="spark-chart">
                  <div id="monthchart"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="dashboard <?= Yii::$app->params['role_assoc'][Yii::$app->user->identity->role] ?>">
      <div class="row">
         <div class="col-lg-6 col-md-6 col-sm-12">
            <!-- Row -->
            <div class="row">

               <div class="col-lg-12">
                  <div class="row">
                     <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card card-analytics">
                           <div class="card-body text-center">
                              <div class="align-self-center">
                                 <div class="spark-card-title">
                                    <h2 class="card-value">35,487</h2>
                                    <h6 class="card-subtitle"><?= date('D, d M, Y') ?></h6>
                                    <h4 class="card-title">Sales</h4>
                                 </div>
                              </div>
                           </div>
                        </div>

                     </div>
                     <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card card-analytics">
                           <div class="card-body text-center">
                              <div class="align-self-center">
                                 <div class="spark-card-title">
                                    <h2 class="card-value">35,487</h2>
                                    <h6 class="card-subtitle"><?= date('D, d M, Y') ?></h6>
                                    <h4 class="card-title">Sales</h4>
                                 </div>
                              </div>
                           </div>
                        </div>

                     </div>
                     <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card card-analytics">
                           <div class="card-body text-center">
                              <div class="align-self-center">
                                 <div class="spark-card-title">
                                    <h2 class="card-value">35,487</h2>
                                    <h6 class="card-subtitle"><?= date('D, d M, Y') ?></h6>
                                    <h4 class="card-title">Sales</h4>
                                 </div>
                              </div>
                           </div>
                        </div>

                     </div>
                     <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card card-analytics">
                           <div class="card-body text-center">
                              <div class="align-self-center">
                                 <div class="spark-card-title">
                                    <h2 class="card-value">35,487</h2>
                                    <h6 class="card-subtitle"><?= date('D, d M, Y') ?></h6>
                                    <h4 class="card-title">Sales</h4>
                                 </div>
                              </div>
                           </div>
                        </div>

                     </div>
                  </div>


               </div>
               <div class="col-lg-12 col-md-12">
                   <?php if (isset($data['schedules']) && !empty($data['schedules'])) : ?>

                      <div class="card">
                         <div class="card-header">
                            <div class="card-actions">
                               <a class="btn-minimize danger"><i class="mdi mdi-chevron-right"></i> view all</a>
                            </div>
                            <h4 class="card-title m-b-0">Vehicle Schedules</h4>
                         </div>


                         <div class="card-body p-h-10">
                            <!--<pre>--><?php //print_r($data['schedules']) ?><!--</pre>-->
                            <table class="table v-middle table-striped table-hover no-border">
                               <tbody>
                               <?php foreach ($data['schedules'] as $k => $s): ?>
                                  <tr>
                                     <td><?= ucwords($s['location_from']) ?> - <?= ucwords($s['location_to']) ?></td>
                                     <td>
<!--                                         --><?//= \common\components\Misc::time_Hia($s['departure']) ?><!-- <br/>-->
                                         <?= \common\components\Misc::date_DdmY($s['departure']) ?>
                                     </td>
                                     <td><?= $s['vehicle']['number_plate'] ?></td>
                                     <td>
                                         <?= $s['total_bookings'] ?>    / <?= $s['vehicle']['seat_count'] ?>
                                     </td>
                                     <td align="right"><a href="<?= Yii::$app->request->baseUrl; ?>/schedules/view/<?= \common\components\Misc::encrypt($s['id']) ?>" class="label label-light-info">Details</a></td>
                                  </tr>
                               <?php endforeach; ?>
                               </tbody>
                            </table>
                         </div>
                      </div>
                   <?php endif; ?>
               </div>

               <div class="col-lg-6 col-md-12">
                  <div class="card">
                     <div class="card-header">
                        <div class="card-actions">
                           <a class="btn-minimize danger"><i class="mdi mdi-chevron-right"></i> view all</a>
                        </div>
                        <h4 class="card-title m-b-0">Top Customers</h4>
                     </div>
                     <div class="card-body p-h-10">
                        <table class="table v-middle no-border">
                           <tbody>
                           <tr>
                              <td style="width:40px"><img src="<?= Yii::$app->request->baseUrl ?>/assets/images/users/1.jpg" width="50" class="img-circle" alt="logo"></td>
                              <td><a href="<?= Yii::$app->request->baseUrl; ?>/user/profile/">Andrew</a></td>
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
                  <!--<div class="card">
               <div class="card-body">
                  <h3 class="card-title">Top Cities</h3>
                  <h6 class="card-subtitle"><? /*= date('M Y') */ ?></h6>
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
            </div>-->
               </div>

               <div class="col-lg-6 com-md-12">
                  <div class="card">
                     <div class="card-header">
                        <div class="card-actions">
                           <a class="btn-minimize danger"><i class="mdi mdi-chevron-right"></i> view all</a>
                        </div>
                        <h4 class="card-title m-b-0">Top Agents</h4>
                     </div>
                     <div class="card-body p-h-10">
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
               </div>
            </div>
         </div>
         <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card">
               <div class="card-body">
                  <div class="row">
                     <div class="col-12">
                        <div class="d-flex flex-wrap">
                           <div>
                              <h3 class="card-title">Sales Overview</h3>
                           </div>
                        </div>
                     </div>
                     <div class="col-12">
                        <div class="amp-pxl" style="height: 360px;"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="card">
               <div class="card-header">
                  <div class="card-actions">
                     <a class="btn-minimize danger"><i class="mdi mdi-chevron-right"></i> view all</a>
                  </div>
                  <h4 class="card-title m-b-0">Vehicle Reviews</h4>
               </div>
               <div class="card-body padding-0">
                  <div class="comment-widgets vehicle-comments">
                     <div class="d-flex flex-row comment-row">
                        <div class="comment-text">
                           <div class="commment-title">
                              <h5 class="pull-left">
                                 BA1JA2542 </h5>
                              <div class="pull-right">
                                 <div class="comment-ratings">
                                     <?php for ($i = 0; $i < 5; $i++) : ?>
                                        <span class="mdi mdi-star"></span>
                                     <?php endfor; ?>

                                 </div>
                              </div>
                              <div class="clearfix"></div>
                           </div>

                           <p class="comment-remark">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has beenorem ...</p>
                           <div class="comment-footer">
                              <span class="text-muted">By Radha Khatri on April 14, 2016</span>
                              <a href="" class=" pull-right label label-light-info">View Details</a>
                              <span class="action-icons">
                             <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                             <a href="javascript:void(0)"><i class="ti-check"></i></a>
                             <a href="javascript:void(0)"><i class="ti-heart"></i></a>
                        </span>
                           </div>
                        </div>
                     </div>
                     <div class="d-flex flex-row comment-row">
                        <div class="comment-text">
                           <div class="commment-title">
                              <h5 class="pull-left">
                                 BA1JA2542 </h5>
                              <div class="pull-right">
                                 <div class="comment-ratings">
                                     <?php for ($i = 0; $i < 5; $i++) : ?>
                                        <span class="mdi mdi-star"></span>
                                     <?php endfor; ?>

                                 </div>
                              </div>
                              <div class="clearfix"></div>
                           </div>

                           <p class="comment-remark">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has beenorem ...</p>
                           <div class="comment-footer">
                              <span class="text-muted">By Radha Khatri on April 14, 2016</span>
                              <a href="" class=" pull-right label label-light-info">View Details</a>
                              <span class="action-icons">
                             <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                             <a href="javascript:void(0)"><i class="ti-check"></i></a>
                             <a href="javascript:void(0)"><i class="ti-heart"></i></a>
                        </span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   var members = {
      'customers': {
         'stats': [2, 4, 4, 6, 8, 5, 6, 4, 8, 6, 6, 2]
      },
      'vendors': {
         'stats': [0, 2, 8, 6, 8, 5, 6, 4, 8, 6, 6, 2]
      },
      'agents': {
         'stats': [2, 4, 4, 6, 8, 5, 6, 4, 8, 6, 6, 2]
      }
   };
   var salesOverview = {
      labels: ['Su', 'M', 'T', 'W', 'T', 'F', 'S', 'Su', 'M', 'T', 'W', 'T', 'F', 'S', 'Su', 'M', 'T', 'W', 'T', 'F', 'S', 'Su', 'M', 'T', 'W', 'T', 'F', 'S'],
      series: [
         [9, 5, 3, 7, 5, 10, 3, 9, 5, 3, 7, 5, 10, 3, 9, 5, 3, 7, 5, 10, 3, 9, 5, 3, 7, 5, 10, 3],
      ]
   }
   var topCities = {
      'title': 'Most Visited',
      'stats': [
         ['Kathmandu', 30],
         ['Pokhara', 20],
         ['Chitwan', 10],
         ['Dharan', 20],
         ['Biratnagar', 20]
      ],
      'colors': {}
   };
   var totals = {
      'sales': {
         'stats': [4, 5, 0, 10, 9, 12, 4, 9, 4, 5, 3, 10, 9, 12, 10, 9, 12, 4, 9],
         'color': '#8BC34A'
      },
      'bookings': {
         'stats': [8, 6, 12, 18, 19, 10, 6, 5, 4, 5, 15, 12, 9, 20, 10, 19, 12, 34, 49],
         'color': '#FF7F0E'
      },
      'departures': {
         'stats': [8, 6, 12, 18, 19, 10, 6, 5, 4, 5, 15, 12, 9, 20, 10, 19, 12, 34, 49],
         'color': '#26C6DA'
      }
   }


</script>