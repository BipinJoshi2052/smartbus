<!--<pre>
    <?php

use \common\components\Misc;

/*print_r($users); */ ?>
</pre>
-->
<div class="container-fluid">
   <div class="row page-titles">
      <div class="col-md-6 align-self-center">
         <h3 class="text-themecolor m-b-0 m-t-0">Users</h3>
         <h6 class="text-muted m-b-0 m-t-10">All available Users</h6>
      </div>
      <div class="col-md-6 align-self-center text-right">
         <a href="<?= Yii::$app->request->baseUrl; ?>/users" class="d_none btn btn-primary">
            <i class="mdi mdi-arrow-left m-r-5"></i>
            View All
         </a>
         <a class="btn btn-success" href="<?= Yii::$app->request->baseUrl; ?>/users/create/<?= $type; ?>">
            <i class="mdi mdi-check"></i>
            Add New <?= ucwords($type); ?>
         </a>
      </div>
   </div>
   <div class="card extended">
      <div class="card-body">
          <?php if (isset($users) && count($users) > 0): ?>
             <table class="table  table-striped" data-plugin="datatable">
                <thead>
                <tr>
                   <th></th>
                   <th>name</th>
                   <th>company</th>
                   <th>email</th>
                   <th>phone</th>
                   <th>role</th>
                   <th>status</th>
                   <th>date</th>
                   <th></th>
                </tr>
                </thead>
                <tbody>
                <?php $uc = 0;
                foreach ($users as $a) : $uc++;
                    $vstatus = (isset($a['verification']['verification_status'])) ? $a['verification']['verification_status'] : 0;
                    $status = ($vstatus > 0 && $a->status > 0) ? 1 : 0; ?>
                   <tr>
                      <td><?= $uc ?></td>
                      <td><?= ucwords($a->name); ?></td>
                      <td><?= (isset($a->userDetails->company) ? $a->userDetails->company : ''); ?></td>
                      <td><?= ($a->email); ?></td>
                      <td><?= isset($a->userDetails->phone) ? $a->userDetails->phone : ''; ?></td>
                      <td><?= ucwords(Yii::$app->params['role_assoc'][$a->role]); ?></td>
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
                      <td><?= Misc::date_DdmY($a->created_on) ?></td>

                      <td class="text-right">
                         <a class="m-r-10" href="<?= Yii::$app->request->baseUrl; ?>/users/edit/<?= Misc::encrypt($a->id) ?>">Edit</a>
                      </td>
                   </tr>
                <?php endforeach; ?>

                </tbody>
             </table>
          <?php else: ?>
             <h4 class="m-0">No Users Found.</h4>
          <?php endif; ?>
      </div>
   </div>

</div>