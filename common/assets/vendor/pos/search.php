<?php $this->registerJsFile(Yii::$app->request->baseUrl . 'common/assets/vendor/pos/js/pos.js');
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
               <div class="search-form">
                  <form class="" action="<?php echo Yii::$app->request->baseUrl ?>/search/" method="get">
                     <div class="search-panel">
                        <!-- <div class = "form-title">Find Your Bus</div> -->
                        <div class="row">
                           <div class="col-lg-6 col-md-6 col-sm-12">
                              <div class="search-form-items">
                                 <div class="input-group">
                                    <input name="from" id="from" type="text" class="form-control boarding location text-capitalize required" required="required" placeholder="From" autocomplete="off" data-plugin="cities-ajax">
                                    <button id="search-swap-locations" type="button">
                                       <i class="fa fa-arrows-h"></i>
                                    </button>
                                    <input name="to" id="to" type="text" class="form-control dropping location text-capitalize  required" required="required" placeholder="To" autocomplete="off" data-plugin="cities-ajax">
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-md-4 col-sm-12">
                              <div class="search-form-items">
                                 <div class="input-group">
                                    <div class="d-inline-b">
                                       <select name="from" id="" class="required form-control" placeholder="On"  autocomplete="off"></select>
                                       <!-- <input name="departure" id="departure-date" type="text" class="form-control" placeholder="On" autocomplete="off">-->
                                    </div>
                                    <button disabled="disabled" class="" type="button">
                                       <i class="fa fa-calendar"></i>
                                    </button>
                                    <div class="d-inline-b">
                                       <select name="to" id="" class="required  form-control"  autocomplete="off"></select>
                                    <!--  <input name="return" id="return-date" type="text" class="form-control" placeholder="Return" autocomplete="off">-->
                                    </div>
                                 </div>
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




