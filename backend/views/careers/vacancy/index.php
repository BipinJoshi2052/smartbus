
<?php

$this->title = Yii::$app->params['system_name'] . ' | Vacancy';

?>
<div class = "container-fluid">
    <div class = "row page-titles">
        <div class = "col-md-6 align-self-center">
            <h3 class = "text-themecolor m-b-0 m-t-0">
                <i class = "mdi mdi-blogger"></i>
                Vacancies
            </h3>
        </div>
        <div class = "col-md-6 align-self-center text-right">
            <a href = "<?php echo Yii::$app->request->baseUrl; ?>/careers/post" class = "btn btn-primary">
                <i class = "mdi mdi-plus m-r-5"></i>
                Add New Vacancy
            </a>
        </div>
    </div>
    <div class = "card extended blog-post-wrapper">
        <div class = "card-header">
            <h5 class = "card-title">Vacancies</h5>
        </div>
        <div class = "card-body">
            <?php if (!empty($vacancy) && count($vacancy) > 0): ?>
                <div class = "table-responsive">
                    <table class = "table  table-striped blog-post" data-plugin = "datatable">
                        <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $count = 0;
                        $sn = 1;
                        foreach ($vacancy as $b =>$post) :
                            $count++; ?>
                            <tr>
                                <td><?php echo $sn++ ?></td>
                                <td><?php echo (isset($post['title'])) ? trim($post['title']) : '' ?></td>
                                <td>
                                    <form method = "post" action = "<?php echo Yii::$app->request->baseUrl; ?>/careers/status" enctype = "multipart/form-data">
                                        <input type = "hidden" name = "<?php echo Yii::$app->request->csrfParam; ?>" value = "<?php echo Yii::$app->request->csrfToken; ?>"/>
                                        <input type = "hidden" name = "vacancy" value = "<?php echo (isset($post['id'])) ? $post['id'] : '' ?>"/>
                                        <?php $counter = 0; ?>

                                        <?php if ($post['is_active'] != 1): ?>
                                            <button class = "btn btn-danger" name="inactive" value="0"><i class = "mdi mdi-close"></i></button>
                                        <?php else: ?>
                                            <button class = "btn btn-success" name="active" value="1"><i class = "mdi mdi-check"></i></button>
                                        <?php endif; ?>
                                    </form>
                                </td>
                                <td class = "text-left">
<!--                                    <a class = "btn btn-default btn-sm" href = "--><?php //echo Yii::$app->request->baseUrl; ?><!--/blog/view/--><?php //echo \common\components\Misc::encrypt($post['id']); ?><!--" data-id = "--><?php //echo $post['id']; ?><!--" data-tab = "Blog">View</a>-->
                                    <a class = "btn btn-primary btn-sm" href = "<?php echo Yii::$app->request->baseUrl; ?>/careers/post/<?php echo \common\components\Misc::encrypt($post['id']); ?>">Edit</a>
                                    <a class = "btn btn-danger btn-sm delete-vacancy" href = "javascript:void(0);" data-id = "<?php echo $post['id']; ?>" data-tab = "vacancy">Delete</a>
                                </td>
                            </tr>
                        <?php

                        endforeach; ?>

                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <h3>Sorry, No Vacancy Found</h3>
            <?php endif; ?>
        </div>
    </div>

</div>
