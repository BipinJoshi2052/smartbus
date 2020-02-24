<?php
//echo '<pre>';
//print_r($BlogCat);
//echo '</pre>';
//die;
$this->title = Yii::$app->params['system_name'] . ' | News';
?>
<div class = "container-fluid">
    <div class = "row page-titles">
        <div class = "col-md-6 align-self-center">
            <h3 class = "text-themecolor m-b-0 m-t-0">
                <i class = "mdi mdi-blogger"></i>
                Blog Category
            </h3>
        </div>
        <div class = "col-md-6 align-self-center text-right">
            <a href = "<?php echo Yii::$app->request->baseUrl; ?>/blog/list" class = "btn btn-primary">
                <i class = "mdi mdi-plus m-r-5"></i>
                Add Blog Category
            </a>
        </div>
    </div>
    <div class = "card extended blog-post-wrapper">
        <div class = "card-header">
            <h5 class = "card-title">Blog Category</h5>
        </div>
        <div class = "card-body">
            <?php if (!empty($BlogCat) && count($BlogCat) > 0): ?>
                <div class = "table-responsive">
                    <table class = "table  table-striped blog-post" data-plugin = "datatable">
                        <thead>
                        <tr>
                           <th>S.N</th>
                            <th>Name</th>
                            <th>Remark</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $count = 0;
                        $sn = 1;
                        foreach ($BlogCat as $n => $post) :
                            ?>
                            <tr>
                                <td><?php echo $sn; ?></td>
                                <td><?php echo (isset($post['name'])) ? trim($post['name']) : '' ?></td>
                               <td><?php echo $post['remark']?></td>


                                <td class = "text-right">
                                    <a class = "btn btn-primary btn-sm" href = "<?php echo Yii::$app->request->baseUrl; ?>/blog/edit-category/<?php echo \common\components\Misc::encrypt($post['id']); ?>">Edit</a>
                                    <a class = "btn btn-default btn-sm delete-blog-category" href = "javascript:void(0);" data-id = "<?php echo $post['id'] ?>" data-tab = "Blogs">Delete</a>
                                </td>
                            </tr>
                        <?php
                        $sn++;
                        endforeach; ?>

                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <h3>Sorry, No Posts Found</h3>
            <?php endif; ?>
        </div>
    </div>

</div>
