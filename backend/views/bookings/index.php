<div class = "container-fluid">
    <div class = "row page-titles">
        <div class = "col-md-6 align-self-center">
            <h3 class = "text-themecolor m-b-0 m-t-0">Bookings</h3>
            <h6 class = "text-muted m-b-0 m-t-10">All available Bookings</h6>
        </div>
        <div class = "col-md-6 align-self-center text-right">
            <a href = "<?php echo Yii::$app->request->baseUrl; ?>/bookings/form" class = "btn btn-primary">
                <i class = "mdi mdi-plus m-r-5"></i>
                Add New Booking
            </a>
        </div>
    </div>

    <div class = "card extended">
        <div class = "card-body">

            <table class = "table  table-striped" data-plugin = "datatable">
                <thead>
                    <tr>
                        <th>Company</th>
                        <th>Number Pl</th>
                        <th>Route</th>
                        <th>Departure</th>
                        <th>Arrival</th>
                        <th>Seats</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i <= 4; $i++): ?>
                        <tr>
                            <td>Baba Travels</td>
                            <td>Ba A Cha 252<?php echo $i; ?></td>
                            <td>Kathmandu - Pokhara</td>
                            <td>1<?php echo $i; ?>-10-2019 1<?php echo $i; ?> :55AM</td>
                            <td>1<?php echo $i; ?>-10-2019 <?php echo $i; ?>:55PM</td>
                            <td>18 / 32</td>
                            <td>12/01/2019</td>
                            <td class = "text-right">
                                <a class = "btn btn-sm btn-primary" href = "">View Bookings</a>
                            </td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>

        </div>

    </div>

</div>