<?php

use \common\components\Misc;

$this->registerCssFile(Yii::$app->request->baseUrl . '/assets/plugins/datatables/datatables.min.css');
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/datatables/datatables.min.js');
$this->registerJsFile(Yii::$app->request->baseUrl . '/../common/assets/vendor/isotope/dist/isotope.pkgd.min.js');
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/js/permissions.js');
$this->registerCssFile(Yii::$app->request->baseUrl . '/assets/css/permissions.css');


$this->title = Yii::$app->params['system_name'] . ' | Permissions'; ?>

<div class="container-fluid">
   <div class="row page-titles">
      <div class="col-md-12 align-self-center">
         <h3 class="text-themecolor m-b-0 m-t-0">Permissions</h3>
      </div>
   </div>
    <?php if (isset($permissions) && !empty($permissions)) : ?>
       <!--       <pre>--><?php //print_r($permissions) ?><!--</pre>-->
       <div class="row">
          <div class="col-lg-3 col-md-4 col-sm-12 mb-sm-4">
             <label for="role-filter" class="control-label">Select Role</label>
             <select class="form-control" id="role-filter">
                <option value="">User Roles</option>
                 <?php foreach (Yii::$app->params['role_assoc'] as $r => $rr): ?>
                    <option value="<?= ($rr) ?>"><?= ucwords($rr) ?></option>
                 <?php endforeach; ?>
             </select>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-12 mb-sm-4">
             <label for="interface-filter" class="control-label">Select Interface</label>
             <select class="form-control" id="interface-filter">
                <option value="">Frontend/Backend</option>
                 <?php foreach (Yii::$app->params['permission-interfaces'] as $p => $pp): ?>
                    <option value="<?= ($pp) ?>"><?= ucwords($pp) ?></option>
                 <?php endforeach; ?>
             </select>
          </div>

       </div>
       <div class="card">
          <div class="card-body">
             <div class="permissions">
                 <?php foreach ($permissions as $rk => $role): ?>
                    <div class="permission-roles <?= Yii::$app->params['role_assoc'][$rk] ?>">
                        <?php foreach ($role as $ik => $interface): ?>
                           <div class="permission-interfaces <?= $ik ?>">
                               <?php foreach ($interface as $ck => $controller): ?><?php foreach ($controller as $ak => $action): ?>
                                  <div style="display: none;" class="permission-item <?= Yii::$app->params['role_assoc'][$rk] ?> <?= $ik ?> <?= $ck ?>" data-role="<?= Yii::$app->params['role_assoc'][$rk] ?>" data-interface="<?= $ik ?>" data-controller="<?= $ck ?>">
                                     <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-12">
                                            <?= ucwords(Yii::$app->params['role_assoc'][$rk]) ?>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-12">
                                            <?= ucwords($ik) ?>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-12">
                                            <?= $action ['remark'] ?>
                                        </div>

                                        <div class="col-lg-2 col-md-3 col-sm-12">
                                            <?= ucwords($action ['action']) ?>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-12">
                                           <select name="change-action" id="">
                                              <option value="1" <?= ($action ['status'] == 1) ? 'selected="selected"' : '' ?>>Allowed</option>
                                              <option value="0" <?= ($action ['status'] == 1) ? 'selected="selected"' : '' ?>>Forbidden</option>
                                           </select>
                                        </div>

                                        <div class="col-lg-2 col-md-3 col-sm-12">

                                        </div>
                                     </div>
                                  </div>

                               <?php endforeach; ?>

                               <?php endforeach; ?>
                           </div>

                        <?php endforeach; ?>
                    </div>
                 <?php endforeach; ?>
             </div>
          </div>
       </div>
    <?php endif; ?>


</div>