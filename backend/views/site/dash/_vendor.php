<pre style="display: none"><?php print_r($data['schedules']) ?></pre>
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
                      <h4 class="card-title m-b-0">Bookings</h4>
                   </div>
                   <div class="card-body p-h-10">

                      <table class="table v-middle no-border">
                         <tbody>
                         <?php foreach ($data['schedules'] as $k => $s): ?>
                            <tr>
                               <td><?=ucwords($s['location_from']) ?> - <?= ucwords($s['location_to']) ?></td>
                               <td><?= \common\components\Misc::date_HiaDdMy ($s['departure']) ?></td>
                               <td><?= $s['vehicle']['number_plate'] ?></td>
                               <td><?= $s['bookings']['count'] ?>/<?= $s['vehicle']['seat_count'] ?></td>
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

<pre><?php print_r($data['schedules']) ?></pre>