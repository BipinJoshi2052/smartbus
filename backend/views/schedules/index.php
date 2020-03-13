<?php //echo '<pre>';
//print_r($all);
//echo '</pre>';
//die;?>
<div class="container-fluid">
   <div class="row page-titles">
      <div class="col-md-6 align-self-center">
         <h3 class="text-themecolor m-b-0 m-t-0">Schedules</h3>
         <h6 class="text-muted m-0">All available schedules</h6>
      </div>
      <div class="col-md-6 align-self-center text-right">
         <a href="<?= Yii::$app->request->baseUrl; ?>/schedules/create" class="btn btn-primary">
            <i class="mdi mdi-plus m-r-5"></i>
            Add New Schedule
         </a>
      </div>
   </div>

   <div class="card extended">
      <div class="card-body">
          <?php if (isset($all) && is_array($all) && !empty($all) > 0): ?>
             <table class="table  table-striped" data-plugin="datatable">
                <thead>
                <tr>
                    <?php if (!((Yii::$app->user->identity->role == Yii::$app->params['role_num']['vendor']) || (Yii::$app->user->identity->role == Yii::$app->params['role_num']['operator']))) : ?>
                       <th>Company</th>
                    <?php endif; ?>
                   <th>Vehicle</th>
                   <th>From</th>
                   <th>To</th>
                   <th>Departure</th>
                   <th>Bookings</th>
                   <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($all as $a) : ?>
                   <tr>
                       <?php if (!((Yii::$app->user->identity->role == Yii::$app->params['role_num']['vendor']) || (Yii::$app->user->identity->role == Yii::$app->params['role_num']['operator']))) : ?>
                          <td><?= ucwords($a['user0']['company']) ?></td>
                       <?php endif; ?>
                      <td><?= strtoupper($a['vehicle']['number_plate']) ?></td>
                      <td><?= ucwords($a['location_from']) ?></td>
                      <td><?= ucwords($a['location_to']) ?></td>
                      <td><?= $a['departure'] ?></td>
                      <td></td>
                      <td class="text-right">
                         <a class="m-r-10 repeat-schedule" data-identity="<?= \common\components\Misc::encrypt($a['id']); ?>" href="javascript:void();">Repeat</a>
                         <a class="m-r-10" href="<?= Yii::$app->request->baseUrl; ?>/schedules/view/<?= \common\components\Misc::encrypt($a['id']) ?>">View</a>
                         <a class="m-r-10" href="<?= Yii::$app->request->baseUrl; ?>/schedules/edit/<?= \common\components\Misc::encrypt($a['id']) ?>">Edit</a>
                         <a class="delete-item" data-table="vehicle" data-identity="<?= \common\components\Misc::encrypt($a['id']); ?>" href="javascript:void();">Cancel</a>
                      </td>
                   </tr>
                <?php endforeach; ?>

                </tbody>
             </table>
          <?php else: ?>
             <h4 class="m-0">No Schedules Found.</h4>
          <?php endif; ?>
      </div>
   </div>
</div>


<div id="repeat-schedule-modal" class="modal" tabindex="-1" role="dialog" aria-labelledby="repeat-schedule-modal" aria-hidden="true">
   <div class="modal-dialog modal-sm">
      <div class="modal-content">

         <div class="modal-header">
            <h5>Enter Departure Date</h5>
            <button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true"><i class="mdi mdi-close"></i></button>
         </div>
         <div class="modal-body">
            <div class="form-group">


               <input id="dd" name="departure-date" class="form-control required" data-plugin="datepicker-limited" data-startDate="<?= date('d-m-y'); ?>" autocomplete="off">
            </div>


         </div>
         <div class="modal-footer text-right">
            <button id="repeat-schedule" class="btn btn-primary"><i class="mdi mdi-reload mr-8"></i> Repeat Schedule</button>
         </div>
      </div>

      <!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div>