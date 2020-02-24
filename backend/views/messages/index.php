<?php
    $this->title = Yii::$app->params['system_name'] . ' | Messages';
?>

<div class = "container-fluid">
    <div class = "row page-titles">
        <div class = "col-md-6 align-self-center">
            <h3 class = "text-themecolor m-b-0 m-t-0">Messages</h3>
        </div>

        <div class = "col-md-6 align-self-center">
            <div class = "text-right">
                <?php if ($count > 0): ?>
                    You have <span class = "highlight"><?= $count ?></span> new messages
                <?php else: ?>
                    No new messages
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class = "card">

        <div class = "card-body">
            <?php if (count($messages) > 0): $c = 0; ?>
                <div class="delete-multiple" style="display: none">
                    <button class="btn btn-danger">Delete Selected</button>
                </div>
                <div class = "table-responsive">
                    <table class = "table message-table d_table table-striped table-hover" data-plugin = "datatable-no-paging">
                        <thead>
                            <tr>
                                <th style = "width:30px;"></th>
                                <th></th>
                                <th>Date</th>
                                <th>From</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($messages as $message) : ?>
                                <tr class = "<?= ($message->is_new == 1) ? 'new-message' : '' ?>" data-status = "<?= $message->is_new ?>" data-id = "<?= \common\components\Misc::encrypt($message->id); ?>">
                                    <td>
                                        <div class = "checkbox">
                                            <input id = "checkbox-<?= $c ?>" type = "checkbox" class = "check-message" value = "<?= \common\components\Misc::encrypt($message->id) ?>">
                                            <label for = "checkbox-<?= $c ?>"></label>
                                            <?php $c++; ?>
                                        </div>

                                    </td>
                                    <td class = "message-status">
                                        <?php if ($message->is_new == 1): ?>
                                            <i class = "mdi mdi-email-outline  text-danger"></i>
                                        <?php else: ?>
                                            <i class = "mdi mdi-email-open-outline"></i>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class = "message-date"> <?= \common\components\Misc::datetime($message->created_on) ?></div>
                                    </td>
                                    <td>
                                        <div class = "message-name"><?= $message->name ?></div>
                                        <?= ($message->phone != '') ? '<div class="message-phone">' . $message->phone . '</div>' : '' ?>
                                        <?= ($message->url != '') ? '<div class="message-url">' . $message->url . '</div>' : '' ?>
                                    </td>
                                    <td>
                                        <div class = "message-email"> <?= $message->email ?></div>
                                    </td>
                                    <td><?= (strlen($message->message) < 30) ? $message->message : substr($message->message, 0, 30) . '...' ?>
                                        <div class = "d_none message-text"><?= $message->message ?></div>
                                    </td>
                                    <td>
                                        <a href = "javascript:void(0);" class = "btn btn-primary btn-sm show-message">
                                            View
                                        </a>
                                        <a href = "javascript:void(0);" class = "btn btn-default btn-sm delete-item" data-id = "<?= \common\components\Misc::encrypt($message->id); ?>" data-tab = "Messages">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class = "text-center">
                    <h5>No Messages to show</h5>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class = "modal" tabindex = "-1" role = "dialog" id = "message-box">
    <div class = "modal-dialog" role = "document">
        <div class = "modal-content">
            <div class = "modal-header">
                <h5 class = "modal-title"><span id = "message-title">Message from <span id = "message-name"></span></span></h5>
                <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                    <span aria-hidden = "true">&times;</span>
                </button>
            </div>
            <div class = "modal-body">
                <div class = "message-header">
                    <div class = "row">
                        <div class = "col-md-6 col-sm-12">
                            <div class = "message-header-group">
                                <div class = "header-title"><span class = "strong">From:</span></div>
                                <div class = "header-value"><span class = "strong">Name:</span><span class = "message-name"></span></div>
                                <div class = "header-value"><span class = "strong">Email:</span><span class = "message-email"></span></div>
                            </div>

                        </div>
                        <div class = "col-md-6 col-sm-12">
                            <div class = "message-header-group">
                                <div class = "message-header-group">
                                    <div class = "header-title"><span class = "strong">Other Information:</span></div>
                                    <div class = "header-value"><span class = "strong">Phone Number:</span> <span class = "message-phone"></span></div>
                                    <div class = "header-value"><span class = "strong">Website:</span> <span class = "message-url"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class = "message-body">
                    <h4>Message : </h4>
                    <div class = "message-content"></div>
                </div>
            </div>
            <div class = "modal-footer">
                <button type = "button" class = "btn btn-secondary" data-dismiss = "modal">Close</button>
            </div>
        </div>
    </div>
</div>