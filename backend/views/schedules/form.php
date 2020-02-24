<?php

use \common\components\Misc;

$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js');
$this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js');
$counter = 0;
?>

<form id="schedules-form" method="post" action="<?= Yii::$app->request->baseUrl; ?>/schedules/update/">
   <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>"/>
   <input type="hidden" name="schedule[id]" value="<?= (!$new && isset($editable['id']) ? Misc::encrypt($editable['id']) : 0) ?>">

   <div class="container-fluid">
      <div class="row page-titles">
         <div class="col-md-6 align-self-center">
             <?php
             if ($new): ?>
                <h3 class="text-themecolor m-b-0 m-t-0">Add Schedule</h3>
             <?php else: ?>
                <h3 class="text-themecolor m-t-0"><span class=""><?= ucwords($editable['location_from']); ?></span> to <span class=""><?= ucwords($editable['location_to']); ?></span></h3><p>by <span class="text-bold"><?= ucwords($editable['vehicle']['number_plate']); ?></span> on
                   <span class="highlighted text-bold"><?= Misc::date_DdmY($editable['departure']); ?></span> at <span class="highlighted text-bold"><?= Misc::time_Hia($editable['departure']); ?></span></p>
             <?php endif; ?>
         </div>

         <div class="col-md-6 align-self-center text-right">
            <a href="<?= Yii::$app->request->baseUrl; ?>/schedules" class="btn btn-primary">
               <i class="mdi mdi-arrow-left m-r-5"></i>
               View All
            </a>
             <?php if (!$new) : ?>
                <a href="<?= Yii::$app->request->baseUrl; ?>/schedules/view/<?= Misc::encrypt($editable['id']) ?>" class="btn btn-primary">
                   <i class="mdi mdi-eye m-r-5"></i>
                   View Schedule
                </a>
             <?php endif; ?>
            <button class="btn btn-success" type="submit">
               <i class="mdi mdi-check"></i>
               Save
            </button>
         </div>
      </div>

      <div class="row">
         <div class="col-lg-12  col-md-12">
            <div class="card">
               <div class="card-header ">
                  <h5 class="card-title">Schedule Details</h5>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-lg-4 col-sm-6 ">
                        <div class="form-group">
                            <?php $counter++; ?>
                           <label for="<?= $counter; ?>" class="control-label required">Vehicle</label>
                           <select id="<?= $counter; ?>" name="schedule[vehicle_id]" class="form-control required select select2">
                               <?php if (isset($vehicles) && count($vehicles) > 0):
                                   foreach ($vehicles as $vehicle) : ?>
                                      <option <?= (!$new && isset($editable['id']) && $vehicle['id'] == $editable['user_id']) ? 'selected="selected"' : '' ?> value="<?= $vehicle['id'] ?>"><?= strtoupper($vehicle['number_plate']) ?></option>
                                   <?php endforeach;
                               endif; ?>
                           </select>
                        </div>
                     </div>

                     <div class="col-lg-4 col-sm-6 ">
                        <div class="form-group">
                            <?php $counter++; ?>
                           <label for="<?= $counter; ?>" class="control-label required">Departure Date</label>
                           <input id="<?= $counter; ?>" value="<?= (!$new && isset($editable['departure']) ? Misc::dmY($editable['departure']) : '') ?>" name="schedule[departure]" class="form-control required" data-plugin="datepicker-limited" data-startDate="<?= date('d-m-y'); ?>" autocomplete="off">
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-6 ">
                        <div class="form-group">
                            <?php $counter++; ?>
                           <label for="<?= $counter; ?>" class="control-label required">Arrival Date</label>
                           <input id="<?= $counter; ?>" value="<?= (!$new && isset($editable['arrival']) ? Misc::dmY($editable['arrival']) : '') ?>" name="schedule[arrival]" class="form-control required" data-plugin="datepicker-limited" autocomplete="off">
                        </div>
                     </div>
                      <?php if (!$new) : ?>

                         <div class="col-lg-4 col-sm-6 ">
                            <div class="form-group">
                                <?php $counter++; ?>
                               <label for="<?= $counter; ?>" class="control-label required">Departing City</label>

                               <select name="schedule[location_from]" id="<?= $counter; ?>" class="required" data-plugin="cities-ajax">
                                   <?php if (!$new && isset($editable['location_from'])) : ?>
                                      <option selected="selected" value="<?= $editable['location_from'] ?>"><?= $editable['location_from'] ?></option>
                                   <?php endif; ?> </select>
                            </div>
                         </div>
                         <div class="col-lg-4 col-sm-6">
                            <div class="form-group">
                                <?php $counter++; ?>
                               <label for="<?= $counter; ?>" class="control-label required">Arriving City</label>
                               <select name="schedule[location_to]" id="<?= $counter; ?>" class="required" data-plugin="cities-ajax">
                                   <?php if (!$new && isset($editable['location_to'])) : ?>
                                      <option value="<?= $editable['location_to'] ?>" selected="selected"><?= $editable['location_to'] ?></option>
                                   <?php endif; ?>
                               </select>

                            </div>
                         </div>
                         <div class="col-lg-4 col-sm-6 ">
                            <div class="form-group">
                                <?php $counter++; ?>
                               <label for="<?= $counter; ?>" class="control-label">Duration</label>
                               <input readonly="readonly" disabled="disabled" id="<?= $counter; ?>" value="<?= (!$new && isset($editable['duration']) ? ($editable['duration']) : '') ?>" class="form-control">
                            </div>
                         </div>
                      <?php endif; ?>
                  </div>
               </div>
            </div>
         </div>

         <div class="col-lg-12 col-md-12 ">
            <div class="route-and-pricing">
               <div class="card route-table">
                  <div class="card-header with-actions">
                     <h5 class="card-title pull-left">Route</h5>
                     <div class="card-actions pull-right">
                        <a href="javascript:void(0);" class="btn btn-sm btn-primary add-route-location">
                           <i class="fa fa-plus m-r-5"></i>
                           Add Location
                        </a>
                     </div>
                  </div>
                  <!--                                    <pre>--><?php //print_r($editable['scheduleRoutes']) ;die;?><!--</pre>-->
                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="table" <?= !(!$new && isset($editable['scheduleRoutes']) && count($editable['scheduleRoutes']) > 0) ? 'style = "display:none"' : '' ?> >
                           <thead>
                           <tr class="text-center">
                              <th class="text-left">Location</th>
                              <th>Time</th>
                              <th class="text-left">Note</th>
                              <th>Boarding</th>
                              <th>Dropping</th>
                              <th></th>
                           </tr>
                           </thead>
                           <tbody>
                           <?php if (!$new && isset($editable['scheduleRoutes']) && count($editable['scheduleRoutes']) > 0) :
                               $count = 0; ?><?php foreach ($editable['scheduleRoutes'] as $k => $route) : ?>
                              <tr>
                                 <td class="has-select">
                                    <input type="hidden" value="<?= Misc::encrypt($route['id']) ?>" name="schedule[route][<?= $count; ?>][id]">
                                    <select name="schedule[route][<?= $count; ?>][location]" class="form-control required location" data-plugin="locations-ajax" data-selected="<?= $route['location_id']; ?>">
                                       <option value="<?= $route['location_id'] ?>" selected="selected"><?= $route['location']['name'] ?></option>
                                    </select>
                                 </td>
                                 <td class="has-time">
                                    <input type="time" name="schedule[route][<?= $count; ?>][time]" class="form-control  required time" value="<?= $route['time']; ?>"><!--data-plugin="timepicker"-->
                                 </td>
                                 <td class="has-description">
                                    <input name="schedule[route][<?= $count; ?>][description]" class="form-control " value="<?= $route['description']; ?>">
                                 </td>
                                 <td class="has-checkbox">
                                    <input class="boarding" <?= ($route['is_boarding'] == 1) ? 'checked = "checked"' : '' ?> type="checkbox" name="schedule[route][<?= $count; ?>][boarding]" id="chk-1-<?= $count; ?>">
                                    <label for="chk-1-<?= $count; ?>"></label>
                                 </td>
                                 <td class="has-checkbox">
                                    <input class="dropping" <?= ($route['is_dropping'] == 1) ? 'checked = "checked"' : '' ?> type="checkbox" name="schedule[route][<?= $count; ?>][dropping]" id="chk-2-<?= $count; ?>">
                                    <label for="chk-2-<?= $count; ?>"></label>
                                 </td>
                                 <td class="has-actions">
                                    <a href="javascript:void(0);" class="remove-location">
                                       <i class="mdi mdi-close"></i>
                                    </a>
                                 </td>
                              </tr>
                               <?php $count++;
                           endforeach; ?>

                           <?php endif; ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <!--               <pre>--><?php //print_r($editable['scheduleRoutes']) ?><!--</pre>-->

               <div class="card price-table">
                  <div class="card-header">
                     <h5 class="card-title pull-left">Ticket Prices</h5>
                     <div class="card-actions pull-right">
                        <div class="success">
                           <i class="mdi mdi-arrow-up m-r-5"></i>
                           Save schedule to reload table
                        </div>
                     </div>
                  </div>
                   <?php if (!$new && isset($editable['scheduleRoutes']) && !empty($editable['scheduleRoutes'])) : ?>
                      <div class="card-body">
                         <div class="table-responsive">
                            <table class="table  table-striped table-bordered" <?= (isset($editable['scheduleRoutes']) && !empty($editable['scheduleRoutes'])) ? '' : 'style="display:none"' ?>>
                               <tbody>
                               <?php if (isset($editable['scheduleRoutes']) && !empty($editable['scheduleRoutes'])) :
                                   $route = Misc::getPriceTable($editable['scheduleRoutes']);
                                   $scount = count($route);
                                   foreach ($route as $r => $col) :
                                       ?>
                                      <tr>
                                          <?php $ll = 0;
                                          foreach ($route as $c => $cell) :
                                              if ($r > $c) : ?>
                                                 <td>
                                                    <input type="hidden" name="schedule[prices][<?= $c ?>][<?= $r ?>][from_id]" value="<?= $cell['location_id'] ?>"/>
                                                    <input type="hidden" name="schedule[prices][<?= $c ?>][<?= $r ?>][from]" value="<?= $cell['location']['name'] ?>"/>
                                                    <input type="hidden" name="schedule[prices][<?= $c ?>][<?= $r ?>][to_id]" value="<?= $col['location_id'] ?>"/>
                                                    <input type="hidden" name="schedule[prices][<?= $c ?>][<?= $r ?>][to]" value="<?= $col['location']['name'] ?>"/>
                                                    <input type="hidden" name="schedule[prices][<?= $c ?>][<?= $r ?>][from_address]" value="<?= (($cell['location']['street'] != '') ? $col['location']['street'] . ', ' : '') . (($col['location']['city'] != '') ? $col['location']['city'] . ', ' : '') . (($col['location']['district'] != '') ? $col['location']['district'] . ', ' : '') . (($col['location']['zone'] != '') ? $col['location']['zone'] . ', ' : '') . $col['location']['state'] ?>"/>
                                                    <input type="hidden" name="schedule[prices][<?= $c ?>][<?= $r ?>][to_address]" value="<?= (($col['location']['street'] != '') ? $col['location']['street'] . ', ' : '') . (($col['location']['city'] != '') ? $col['location']['city'] . ', ' : '') . (($col['location']['district'] != '') ? $col['location']['district'] . ', ' : '') . (($col['location']['zone'] != '') ? $col['location']['zone'] . ', ' : '') . $col['location']['state'] ?>"/>

                                                    <input type="number" class="form-control" name="schedule[prices][<?= $c ?>][<?= $r ?>][price]" value="<?= isset($prices[$c][$r]['price']) ? $prices[$c][$r]['price'] : '' ?>">
                                                 </td>
                                              <?php else:
                                                  if ($ll == 0) : ?>
                                                     <td colspan="<?= ($scount - $c) ?>">
                                                        <strong>
                                                            <?= ucwords($cell['location']['name']); ?>
                                                        </strong>
                                                     </td>
                                                  <?php endif;
                                                  $ll++;
                                              endif;
                                          endforeach; ?>
                                      </tr>
                                   <?php endforeach;
                               endif; ?>
                               </tbody>
                            </table>
                         </div>
                      </div>
                   <?php endif; ?>

               </div>

            </div>
         </div>
         <div class="col-lg-12 col-md-12 ">
            <div class="card">
               <div class="card-header">
                  <h5 class="card-title">Cancellation Note</h5>
               </div>

               <div class="card-body">
                  <div class="form-group">
                      <?php $counter++; ?>
                     <textarea data-plugin="summernote" id="<?= $counter; ?>" name="schedule[cancellation_note]" class="form-control"><?= (!$new && isset($editable['cancellation_note']) ? $editable['cancellation_note'] : '') ?></textarea>
                  </div>
               </div>
            </div>
            <div class="card">
               <div class="card-header">
                  <h5 class="card-title">Additional Information</h5>
               </div>

               <div class="card-body">
                  <div class="form-group">
                      <?php $counter++; ?>
                     <textarea data-plugin="summernote" id="<?= $counter; ?>" name="schedule[additional_note]" class="form-control"><?= (!$new && isset($editable['additional_note']) ? $editable['additional_note'] : '') ?></textarea>
                  </div>
               </div>
            </div>
            <div class="card">
               <div class="card-header">
                  <h5 class="card-title">Driver's Information</h5>
               </div>

               <div class="card-body">
                  <div class="form-group">
                      <?php $counter++; ?>
                     <textarea data-plugin="summernote" id="<?= $counter; ?>" name="schedule[drivers_info]" class="form-control"><?= (!$new && isset($editable['drivers_info']) ? $editable['drivers_info'] : '') ?></textarea>
                  </div>
               </div>
            </div>
         </div>
      </div>

   </div>
</form><!--<pre>--><?php //print_r($prices); ?><!--</pre>-->

<!--<pre>--><?php //print_r($editable) ?><!--</pre>--><!--<pre>--><?php //print_r($vehicles) ?><!--</pre>-->