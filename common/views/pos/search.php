<?php //$this->registerJsFile(Yii::$app->request->baseUrl . 'common/assets/vendor/pos/js/pos.js');
?>

<div class = "search-transport search-form">
   <div class = "container">
      <form class = "" action = "<?php echo Yii::$app->request->baseUrl ?>/pos/" method = "get">
         <div class = "search-panel">
            <div class = "row">
               <div class = "col-sm-5 mb-3">
                  <div class = "first-part">
                     <select name = "from" id = "from" class = "required" data-plugin = "cities-ajax" placeholder="Departure">
                         <?php if (isset($search['from']) && $search['from'] != '') : ?>
                            <option selected = "selected" value = "<?= $search['from'] ?>"><?= ucwords($search['from']) ?></option>
                         <?php endif; ?>
                     </select>

                  </div>
                  <div class = "center-part">
                     <button class = "btn btn-option" id = "search-swap-locations" type = "button">
                        <i class = "fa fa-arrows-h"></i>
                     </button>

                  </div>
                  <div class = "second-part">
                     <select name = "to" id = "to" class = "required" data-plugin = "cities-ajax" placeholder="Destination">
                         <?php if (isset($search['to']) && $search['to'] != '') : ?>
                            <option selected = "selected" value = "<?= $search['to'] ?>"><?= ucwords($search['to']) ?></option>
                         <?php endif; ?>
                     </select>

                  </div>
                  <div class = "clearfix"></div>
               </div>
               <div class = "col-sm-5 mb-3">
                  <div class = "first-part">
                     <input placeholder = "Date" autocomplete = "off" id = "departure-date" value = "<?= (isset($search['departure']) && $search['departure'] != '') ? $search['departure'] : '' ?>" name = "departure" class = "form-control">
                  </div>
                  <div class = "center-part">
                     <button class = "btn  btn-option" id = "clear-dates" type = "button">
                        <i class = "fa fa-times"></i>
                     </button>
                  </div>
                  <div class = "second-part">
                     <input placeholder = "Return" autocomplete = "off" id = "return-date" value = "<?= (isset($search['return']) && $search['return'] != '') ? $search['return'] : '' ?>" name = "return" class = "form-control">
                  </div>
                  <div class = "clearfix"></div>
               </div>
               <div class = "col-sm-2 mb-sm-3">
                  <button type = "submit" class = "btn btn-info  br-0 btn-search">
                     <i class = "fa fa-search m-r-8"></i> Search
                  </button>
               </div>
            </div>
         </div>
      </form>

   </div>
</div>




