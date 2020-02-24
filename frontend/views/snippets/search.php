<?php //$this->registerJsFile(Yii::$app->request->baseUrl . 'common/assets/vendor/pos/js/pos.js');
?>
<section class="search-form-wrapper" role="tabpanel">
   <div class="search-form-header">
      <div class="container">
         <ul class="nav nav-tabs" role="tablist">
            <li role="presentation">
               <a class="nav-item" href="#tickets" aria-controls="tickets" aria-selected="true" role="tab" data-toggle="tab">
                  <i class="icon icon-bus"></i>
                  Book Tickets
               </a>
            </li>
            <li role="presentation">
               <a class="nav-item" href="#vehicles" aria-controls="vehicles" role="tab" data-toggle="tab">
                  <i class="icon icon-car"></i>
                  Rent Vehicles
               </a>
            </li>
         </ul>
      </div>
   </div>
   <div class="search-form-body">
      <div class="container-fluid">
         <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="tickets">
               <div class="search-transport search-form">
               <div class="container">

                  <form class="" action="<?php echo Yii::$app->request->baseUrl ?>/pos/" method="get">
                     <div class="search-panel">
                        <div class="row">
                           <div class="col-sm-5">
                              <div class="row">
                                 <div class="col-sm-5 p-0">
                                    <select name="from" id="" class="form-control" placeholder="On" autocomplete="off" data-plugin="cities-ajax"></select>

                                 </div>
                                 <div class="col p-0">
                                    <button class="btn search-swap-locations" id="search-swap-locations" type="button">
                                       <i class="fa fa-arrows-h"></i>
                                    </button>

                                 </div>
                                 <div class="col-sm-5 p-0">
                                    <select name="to" id="" class="form-control" autocomplete="off" data-plugin="cities-ajax"></select>

                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-5">
                              <div class="row">
                                 <div class="col-sm-5 p-0">
                                    <input name="departure" id="departure-date" type="text" class="form-control" placeholder="On" autocomplete="off">

                                 </div>
                                 <div class="col p-0">
                                    <button disabled="disabled" class="" type="button">
                                       <i class="fa fa-calendar"></i>
                                    </button>
                                 </div>
                                 <div class="col-sm-5 p-0">
                                    <input name="return" id="return-date" type="text" class="form-control" placeholder="Return" autocomplete="off">
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-2">
                              <button type="submit" class="btn btn-info">
                                 <i class="fa fa-search m-r-8"></i> Search
                              </button>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>

               </div>
      <?php if(true == false) :?>
         <div class="search-transport search-form ">
            <form class="form-inline" action="<?php echo Yii::$app->request->baseUrl ?>/pos/" method="get">
               <div class="search-panel">
                  <select name="from" id="" class="inline-form-control" placeholder="On" autocomplete="off" data-plugin="cities-ajax"></select>
                  <button class="btn search-swap-locations" id="search-swap-locations" type="button">
                     <i class="fa fa-arrows-h"></i>
                  </button>
                  <select name="to" id="" class="inline-form-control" autocomplete="off" data-plugin="cities-ajax"></select>
                  <span class="spacer"></span>
                  <input name="departure" id="departure-date" type="text" class="inline-form-control" placeholder="On" autocomplete="off">
                  <button disabled="disabled" class="" type="button">
                     <i class="fa fa-calendar"></i>
                  </button>
                  <input name="return" id="return-date" type="text" class="inline-form-control" placeholder="Return" autocomplete="off">
                  <button type="submit" class="btn btn-info">
                     <i class="fa fa-search m-r-8"></i> Search
                  </button>
               </div>

            </form>

         </div>
      <?php endif; ?>


            </div>
            <div role="tabpanel" class="tab-pane" id="vehicles">
               <div class="search-form">
                  <form class="" action="<?php echo Yii::$app->request->baseUrl ?>/search-vehicles" method="get">
                     <div class="search-panel">
                        <!-- <div class = "form-title">Find Your Bus</div> -->
                        <div class="row">
                           <div class="col-lg-10 col-md-6 col-sm-12">
                              <div class="search-form-items">
                                 <input id="vehicle-type" type="text" class="form-control typeahead" placeholder="Type" name="type">
                              </div>
                           </div>

                           <div class="col-lg-2 col-md-2 col-sm-12">
                              <div class="search-form-items">
                                 <button type="submit" class="btn btn-info btn-block btn-adj">
                                    <i class="fa fa-search m-r-8"></i> Search
                                 </button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>

               </div>

            </div>


         </div>
      </div>
   </div>

</section>




