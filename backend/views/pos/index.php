<?php
$this->title = Yii::$app->params['system_name'] . ' | POS';
?>
<div class="container-fluid pos">
   <div class="page-titles p-t-0 p-b-0">
      <div class="search-transport search-form">
         <form class="form-inline" action="<?php echo Yii::$app->request->baseUrl ?>/pos/" method="get">
            <div class="search-panel">
               <a class="button" href="javascript:void(0);"> <i class="mdi mdi-chevron-left"></i></a>
               <select name="from" id="" class="inline-form-control required" placeholder="On" autocomplete="off" data-plugin="cities-ajax"></select>
               <button class="btn search-swap-locations" id="search-swap-locations" type="button">
                  <i class="fa fa-arrows-h"></i>
               </button>
               <select name="to" id="" class="inline-form-control required" autocomplete="off" data-plugin="cities-ajax"></select>
               <span class="spacer"></span>
               <input name="departure" id="departure-date" type="text" class="inline-form-control" placeholder="On" autocomplete="off">
               <button disabled="disabled" class="" type="button">
                  <i class="fa fa-calendar"></i>
               </button>
               <input name="return" id="return-date" type="text" class="inline-form-control" placeholder="Return" autocomplete="off">
               <button type="submit" class="btn btn-info">
                  <i class="fa fa-search m-r-8"></i> Search
               </button>

                  <a class="button" href="<?=  Yii::$app->request->baseUrl; ?>/pos/"> <i class="mdi mdi-chevron-left"></i></a>

            </div>

         </form>
      </div>
      <form style="display: none" method="get" action="<?php echo Yii::$app->request->baseUrl; ?>/pos/">
<!--         <input type="hidden" name="--><?php //echo Yii::$app->request->csrfParam; ?><!--" value="--><?php //echo Yii::$app->request->csrfToken; ?><!--"/>-->
          <?php $counter = 0; ?>
         <div class="">
            <div class="pos-search-wrapper">
               <div class="row">
                  <div class="col-sm-1 col-xs-1">
                     <div class="date-back">
                        <a href="javascript:void(0);"> <i class="mdi mdi-chevron-left"></i></a>
                     </div>
                  </div>
                  <div class="col-sm-10 col-xs-10">
                     <div class="search-body">
                        <div class="row">
                           <div class="col-sm-5">
                              <div class="search-locations-picker">
                                 <div class="location-from">
                                     <?php $counter++; ?>
                                    <label for="<?php echo $counter; ?>" class="control-label required">From</label>
                                    <select name="from" id="<?php echo $counter; ?>" class="required" data-plugin="cities-ajax">
                                        <?php if (isset($search['from']) && $search['from'] != '') : ?>
                                           <option selected="selected" value="<?= $search['from'] ?>"><?= ucwords($search['from']) ?></option>
                                        <?php endif; ?>
                                    </select>
                                 </div>
                                 <div class="location-swap">
                                    <div class="fake-label"></div>
                                    <a href="javascript:void(0);" class="reverse-date"><i class="mdi mdi-swap-horizontal"></i></a>
                                 </div>
                                 <div class="location-to">
                                     <?php $counter++; ?>
                                    <label for="<?php echo $counter; ?>" class="control-label required">To</label>
                                    <select name="to" id="<?php echo $counter; ?>" class="required" data-plugin="cities-ajax">
                                        <?php if (isset($search['to']) && $search['to'] != '') : ?>
                                           <option selected="selected" value="<?= $search['to'] ?>"><?= ucwords($search['to']) ?></option>
                                        <?php endif; ?>
                                    </select>
                                 </div>
                                 <div class="clearfix"></div>
                              </div>

                           </div>
                           <div class="col-sm-5">
                              <div class="row">
                                 <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <?php $counter++; ?>
                                       <label for="<?php echo $counter; ?>" class="control-label">Departure Date</label>
                                       <input autocomplete="off" id="<?php echo $counter; ?>" value="<?= (isset($search['departure']) && $search['departure'] != '') ? $search['departure'] : '' ?>" name="departure" class="form-control" data-plugin="datepicker" data-startAt="<?php echo date('d-m-y') ?>">
                                    </div>
                                 </div>
                                 <div class="col-lg-6 col-sm-12 ">
                                    <div class="form-group">
                                        <?php $counter++; ?>
                                       <label for="<?php echo $counter; ?>" class="control-label">Return Date (Optional)</label>
                                       <input autocomplete="off" id="<?php echo $counter; ?>" value="<?= (isset($search['return']) && $search['return'] != '') ? $search['return'] : '' ?>" name="return" class="form-control " data-plugin="datepicker">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-2">
                              <div class="form-group">
                                 <div class="fake-label"></div>
                                 <div class="quick-dates d_none">
                                    <a href="" class="btn btn-primary btn-sm">Today</a>
                                    <a href="" class="btn btn-primary btn-sm">Tomorrow</a>
                                 </div>
                                 <button class="btn btn-success btn-block ">
                                    <i class="fa fa-search"></i>
                                    Search
                                 </button>
                              </div>
                           </div>
                        </div>
                     </div>


                  </div>
                  <div class="col-sm-1 col-xs-1">
                     <div class="date-forward">

                        <a href="javascript:void(0);"> <i class="mdi mdi-chevron-right"></i></a>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </form>
   </div>
   <div class="point-of-sales">
       <?php echo $this->render('../snippets/_pos', [
               'schedules' => $schedules,
               'search'    => $search,
               'filters'   => $filters
       ]); ?>
   </div>

</div>