<?php

use common\components\Misc;
$is_authorized = (Yii::$app->user->identity->role === Yii::$app->params['role_num']['admin']) ? 1 : 0; ?>
<div class="container-fluid">
   <div class="row page-titles">
      <div class="col-md-6 align-self-center">
         <h3 class="text-themecolor m-b-0 m-t-0">Vehicles</h3>
         <h6 class="text-muted m-b-0 m-t-10">All available vehicles</h6>
      </div>
      <div class="col-md-6 align-self-center text-right">
         <a href="<?php echo Yii::$app->request->baseUrl; ?>/vehicles/create" class="btn btn-primary">
            <i class="mdi mdi-plus m-r-5"></i>
            Add New Vehicle
         </a>
      </div>
   </div>

   <div class="card extended">
      <div class="card-body">

          <?php if (isset($all) && count($all) > 0): ?>
             <table class="table  table-striped" data-plugin="datatable">
                <thead>
                <tr>
                   <th>Company</th>
                   <th>Number Plate</th>
                   <th>Seats</th>
                   <th>Status</th>
                   <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($all as $a) :
                    $vstatus = (isset($a['verification']['verification_status'])) ? $a['verification']['verification_status'] : 0;
                    $status = ($vstatus > 0) ? $a['is_active'] : 0;
                    ?>
                   <tr>
                      <td><?php echo ucwords($a->user->userDetails->company); ?></td>
                      <td><?php echo strtoupper($a->number_plate) ?></td>
                      <td><?php echo $a->seat_count ?></td>
                      <td>
                          <?php if ($vstatus > 0) : ?>
                             <span class="label label-success"> <?= Yii::$app->params['verification_status'][$vstatus] ?></span>
                             <a href="javascript:void(0);" class="label <?= ($status) ? 'label-success' : 'label-danger' ?>  <?= ($is_authorized) ? 'toggle-status' : 'disabled' ?> " <?= ($is_authorized) ? 'data-a="' . Misc::encrypt($a['id']) . '" data-b="' . Misc::encrypt(Misc::getClass($a)) . '"' : '' ?>><?= ($status) ? 'Active' : 'Inactive' ?></a>
                          <?php elseif ($vstatus == 0): ?>
                             <span class="label label-danger"><?= ucwords(Yii::$app->params['verification_status'][$vstatus]) ?></span>
                          <?php elseif ($vstatus < 0): ?>
                             <span class="label label-light-danger"><?= ucwords(Yii::$app->params['verification_status'][$vstatus]) ?></span>
                          <?php endif; ?>
                      </td>
                      <td class="text-right">
                         <a class="m-r-10" href="<?php echo Yii::$app->request->baseUrl; ?>/vehicles/edit/<?php echo \common\components\Misc::encrypt($a['id']) ?>">Edit</a>
                         <a class="delete-item" data-table="vehicle" data-identity="<?php echo \common\components\Misc::encrypt($a['id']); ?>" href="javascript:void();">Delete</a>
                      </td>
                   </tr>
                <?php endforeach; ?>
                </tbody>
             </table>
          <?php else: ?>
             <h4 class="m-0">No Vehicles Found.</h4>
          <?php endif; ?>
      </div>
   </div>
</div>