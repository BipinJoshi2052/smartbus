<?php
    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js');
    //    $this->registerJsFile(Yii::$app->request->baseUrl . '/assets/plugins/wicked-timepicker/wickedpicker.min.js');
    //    $this->registerCssFile(Yii::$app->request->baseUrl . '/assets/plugins/wicked-timepicker/wickedpicker.min.css');

    $counter = 0;
    $new = (empty($editable)) ? 1 : 0;
?>
<form method = "post" action = "<?php echo Yii::$app->request->baseUrl; ?>/bookings/update/" enctype = "multipart/form-data">
    <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
    <input type = "hidden" name = "schedule[id]" value = "<?php echo(isset($editable['id']) ? $editable['id'] : 0) ?>">

    <div class = "container-fluid">
        <div class = "row page-titles">
            <div class = "col-md-6 align-self-center">
                <?php
                    if ($new): ?>
                        <h3 class = "text-themecolor m-b-0 m-t-0">Add Booking</h3>
                    <?php else: ?>
                        <h3 class = "text-themecolor m-b-0 m-t-0">Edit Booking <span class = "highlighted"> <?php echo $editable->number_plate; ?></span>
                        </h3>
                    <?php endif; ?>

            </div>
            <div class = "col-md-6 align-self-center text-right">
                <a href = "<?php echo Yii::$app->request->baseUrl; ?>/vehicles" class = "btn btn-primary">
                    <i class = "mdi mdi-arrow-left m-r-5"></i>
                    View All
                </a>
                <button class = "btn btn-success" type = "submit">
                    <i class = "mdi mdi-check"></i>
                    Save
                </button>
            </div>
        </div>
        <div class = "card extended">

            <div class = "card-body">
                <div class = "row">
                    <div class = "col-lg-3 col-sm-12 ">
                        <div class = "form-group">
                            <?php $counter++; ?>
                            <label for = "<?php echo $counter; ?>" class = "control-label required">From</label>
                            <select id = "<?php echo $counter; ?>" class = "required" data-plugin = "locations-ajax"></select>
                        </div>
                    </div>
                    <div class = "col-lg-3 col-sm-12 ">
                        <div class = "form-group">
                            <?php $counter++; ?>
                            <label for = "<?php echo $counter; ?>" class = "control-label required">To</label>
                            <select id = "<?php echo $counter; ?>" class = "required" data-plugin = "locations-ajax"></select>
                        </div>
                    </div>
                    <div class = "col-lg-3 col-sm-12 ">
                        <div class = "form-group">
                            <?php $counter++; ?>
                            <label for = "<?php echo $counter; ?>" class = "control-label required">Departure Date</label>
                            <input id = "<?php echo $counter; ?>" value = "<?php echo(isset($editable['registration_date']) ? $editable['registration_date'] : '') ?>" name = "schedule[registration_date]" class = "form-control required" data-plugin = "datepicker" data-startAt = "<?php echo date('d-m-y') ?>">
                        </div>
                    </div>
                    <div class = "col-lg-2 col-sm-12 ">
                        <div class = "form-group">
                            <?php $counter++; ?>
                            <label for = "<?php echo $counter; ?>" class = "control-label">Return Date (Optional)</label>
                            <input id = "<?php echo $counter; ?>" value = "<?php echo(isset($editable['registration_date']) ? $editable['registration_date'] : '') ?>" name = "schedule[registration_date]" class = "form-control " data-plugin = "datepicker">
                        </div>
                    </div>

                    <div class = "col-lg-1 col-sm-12 text-right">
                        <div class = "form-group">
                            <?php $counter++; ?>
                            <button class="btn btn-success margin-top-25">
                                <i class="fa fa-search"></i>
                                Search
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class = "card extended">
            <div class = "card-header ">
                <h5 class = "card-title pull-left">5 Vehicles Found</h5>

            </div>
            <div class = "card-body">
                <div class = "table-responsive">
                    <table class = "table  table-striped" data-plugin = "datatable">
                        <thead>
                            <tr>
                                <th>Company</th>
                                <th>Number Pl</th>
                                <th>Seats</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Baba Travels</td>
                                <td>Ba A Cha 2512</td>
                                <td>18 / 32</td>
                                <td>12/01/2019</td>
                                <td class = "text-right">
                                    <a class = "btn btn-sm btn-success" href = "">Book</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Rukma Travels</td>
                                <td>Ba A Cha 2365</td>
                                <td>12 / 24</td>
                                <td>12/01/2019</td>
                                <td class = "text-right">
                                    <a class = "btn btn-sm btn-success" href = "">Book</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Nepal Travels</td>
                                <td>Ba A Cha 9587</td>
                                <td>5 / 32</td>
                                <td>12/01/2019</td>
                                <td class = "text-right">
                                    <a class = "btn btn-sm btn-success" href = "">Book</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</form>



