<?php
//echo '<pre>';
//print_r($count);
//echo '</pre>';
//die;
$this->title = Yii::$app->params['system_name'] . ' | Blog';

?>
<div class = "container-fluid">
    <div class = "row page-titles">
        <div class = "col-md-6 align-self-center">
            <h3 class = "text-themecolor m-b-0 m-t-0">
                <i class = "mdi mdi-blogger"></i>
                Applicants
            </h3>
        </div>

    </div>
    <div class = "card extended blog-post-wrapper">
        <div class = "card-header">
            <h5 class = "card-title">List of Applicants  </h5>
        </div>
       <p style="padding: 15px; font-size: larger">
           <?php if($count) {
               echo '<span class="label label-light-success" style="margin-right: 15px;padding: 10px;">'.count($applicants). ' Total Messages</span>';
               echo '<span class="label label-success" style="margin-right: 15px;padding: 10px;">'.$count['count_unseen']. ' New Messages</span>';
               echo '<span class="label label-danger" style="margin-right: 15px;padding: 10px;">'.$count['count_seen']. ' Seen messages</span>';
           } ?>
          <span id="refresh" class="label label-primary refresh hidden" style=""><i class="mdi mdi-refresh"></i>&nbsp;Refresh</span>
       </p>


        <div class = "card-body">
            <div class = "table-responsive">
                <table class = "table  table-striped blog-post" data-plugin = "datatable">
                    <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>City</th>
                        <th>Expected Salary</th>
                        <th>Experience</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $count = 0;
                    $sn = 1;
                    $count++; ?>
                    <tr>
                       <?php foreach ($applicants as $app) { ?>
                        <td><?php echo $sn++ ?></td>
                        <td><?php echo $app['name'] ?></td>
                        <td><?php echo $app['email'] ?></td>
                        <td><?php echo $app['city'] ?></td>
                        <td><?php echo $app['expected_salary'] ?></td>
                       <td><?php echo $app['experience'] ?></td>
                        <td >
                          <a class = "btn btn-primary btn-sm" href = "<?php echo Yii::$app->request->baseUrl; ?>/careers/view/<?php echo \common\components\Misc::encrypt($app['id']); ?>" data-id = "<?php echo $app['id']; ?>" data-tab = "applicants">View</a>
                            <!--                                    <a class = "btn btn-primary btn-sm" href = "--><?php //echo Yii::$app->request->baseUrl; ?><!--/blog/post/--><?php //echo \common\components\Misc::encrypt($post['id']); ?><!--">Edit</a>-->
                            <!--                                    <a class = "btn btn-default btn-sm delete-item" href = "javascript:void(0);" data-id = "--><?php //echo $post['id']; ?><!--" data-tab = "Blog">Delete</a>-->
                       </td>
                    </tr>
<?php }?>
                    </tbody>
                </table>
            </div>

            <h3>Sorry, No Posts Found</h3>

        </div>
    </div>

</div>
