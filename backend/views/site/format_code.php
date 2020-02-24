<?php
    ob_start();
    if (ob_get_contents()) {
        ob_clean();
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns = "http://www.w3.org/1999/xhtml" xml:lang = "en" lang = "en">
<head>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta http-equiv = "Content-Type" content = "text/html; charset=utf-8"/>
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta content = "<?php echo Yii::app()->request->csrfToken; ?>" name = "csrf-token"/>

    <!--        <meta charset="utf-8"/>-->
    <!-- Favicon -->
    <link rel = "shortcut icon" href = "<?php echo Yii::app()->request->baseUrl; ?>/css/images/travolution_icon1.png" type = "image/x-icon"/>

    <!--[if lt IE 9]>
    <script src = "http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script><![endif]-->

    <!--  CSS  -->
    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/assets/vendors/font-awesome/css/font-awesome.css" rel = "stylesheet" type = "text/css"/>

    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/css/vendor/font-awesome/css/font-awesome.min.css" rel = "stylesheet" type = "text/css"/>

    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/assets/vendors/bootstrap/css/bootstrap.min.css" rel = "stylesheet" type = "text/css"/>
    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/css/animate.css" rel = "stylesheet" type = "text/css"/>
    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/css/admin.css" rel = "stylesheet" type = "text/css"/>
    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.css" rel = "stylesheet" type = "text/css"/>
    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/css/vendor/fileinput.css" rel = "stylesheet" type = "text/css"/>
    <!--Forms-->
    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/toggle-switch/toggles.css" rel = "stylesheet" type = "text/css"/>
    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/checkbox/icheck.css" rel = "stylesheet" type = "text/css"/>
    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/checkbox/minimal/blue.css" rel = "stylesheet" type = "text/css"/>
    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/checkbox/minimal/green.css" rel = "stylesheet" type = "text/css"/>
    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/checkbox/minimal/grey.css" rel = "stylesheet" type = "text/css"/>
    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/checkbox/minimal/orange.css" rel = "stylesheet" type = "text/css"/>
    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/checkbox/minimal/pink.css" rel = "stylesheet" type = "text/css"/>
    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/checkbox/minimal/purple.css" rel = "stylesheet" type = "text/css"/>
    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css" rel = "stylesheet"/>

    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/noty-master/js/noty/themes/animate.css" rel = "stylesheet" type = "text/css"/>
    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/dropzone/dropzone.css" rel = "stylesheet"/>
    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/bootstrap-datepicker/css/datepicker.css" rel = "stylesheet" type = "text/css"/>
    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/bootstrap-timepicker/compiled/timepicker.css" rel = "stylesheet" type = "text/css"/>
    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/bootstrap-colorpicker/css/colorpicker.css" rel = "stylesheet" type = "text/css"/>

    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/tag-it-master/css/jquery.tagit.css" rel = "stylesheet" type = "text/css"/>

    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/nepalidatapicker/nepali.datepicker.v2.css" rel = "stylesheet" type = "text/css"/>
    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/css/jquerysctipttop.css" rel = "stylesheet" type = "text/css"/>
    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/kalendar/kalendar.css" rel = "stylesheet"/>
    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/scroll/nanoscroller.css" rel = "stylesheet"/>
    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/morris/morris.css" rel = "stylesheet"/>
    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/data-tables/DT_bootstrap.css" rel = "stylesheet"/>
    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/advanced-datatable/css/demo_table.css" rel = "stylesheet"/>
    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/advanced-datatable/css/datatable_overrides.css" rel = "stylesheet" type = "text/css"/>
    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/css/backend-modules.css" rel = "stylesheet" type = "text/css"/>
    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/css/aside-modal.css" rel = "stylesheet" type = "text/css"/>
    <!--Override Stylesheet-->
    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/css/backend-override.css" rel = "stylesheet" type = "text/css"/>
    <link href = "<?php echo Yii::app()->request->baseUrl; ?>/css/printable.css" rel = "stylesheet" type = "text/css"/>

    <script>
        var exp_data = [];
        var budget_actual_data = [[], []];
        var path = "<?php echo Yii::app()->request->baseUrl; ?>";
        var logo_path = "<?php echo Yii::app()->request->baseUrl; ?>";
    </script>
</head>

<body class = "light_theme  fixed_header  left_nav_hide ">
    <?php
        $users = Yii::app()->db
            ->createCommand("SELECT `id`,`name` FROM  `users` WHERE `id` != '" . Yii::app()->user->id . "' AND `isActive` =1 AND role < 6")
            ->queryAll();

        $companies = Yii::app()->db
            ->createCommand("SELECT * FROM  `company`")
            ->queryAll();
    ?>

    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/js/jquery-2.1.0.js"></script>
    <div class = "loader-allPages">
        <div class = "loader-loadspin">
            <img src = "<?php echo Yii::app()->request->baseUrl; ?>/css/images/loading_list.gif" alt = ""/>
            <span class = "loader-spinner-msg">Loading...</span>
        </div>
    </div>
    <div class = "recalLedgerLoader" style = "display: none">
        <div class = "loadspin">
            <img src = "<?php echo Yii::app()->request->baseUrl; ?>/css/images/loading_list.gif" alt = ""/>
            <span class = "spinner-msg">Calculating Balances</span>
        </div>
    </div>
    <div class = "wrapper">
        <nav class = "navbar navbar-default navbar-fixed-top">
            <div class = "container">
                <a href = "../../web/index.php" class = "menutoggle">
                    <i class = "fa fa-desktop"></i>
                </a>
                <div class = "navbar-header">
                    <button type = "button" class = "navbar-toggle collapsed" data-toggle = "collapse" data-target = "#navbar" aria-expanded = "false" aria-controls = "navbar">
                        <span class = "sr-only">Toggle navigation</span> <span class = "icon-bar"></span> <span class = "icon-bar"></span> <span class = "icon-bar"></span>
                    </button>
                </div>
                <div id = "navbar" class = "navbar-collapse collapse">
                    <ul class = "nav navbar-nav navbar-nav-left">
                        <li class = "dropdown">
                            <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown" role = "button" aria-expanded = "false">Masters <span class = "caret"></span></a>
                            <ul class = "dropdown-menu" role = "menu">
                                <li>
                                    <a href = "../../web/index.php">Affiliates</a>
                                </li>
                                <li class = "divider"></li>
                                <li>
                                    <a id = "cs" href = "#" data-target = "#mcs" data-toggle = "modal" class = "mb10">Create Supplier</a>
                                </li>
                                <li>
                                    <a id = "ca" href = "#" data-target = "#mca" data-toggle = "modal" class = "mb10">Create Agents</a>
                                </li>
                                <li>
                                    <a id = "cas" href = "#" data-target = "#air-sup" data-toggle = "modal" class = "mb10">Create Airlines</a>
                                </li>
                                <li>
                                    <a id = "cts" href = "#" data-target = "#ts-sup" data-toggle = "modal" class = "mb10">Create Transport Supplier</a>
                                </li>
                                <li>
                                    <a id = "ag" href = "#" data-target = "#mag" data-toggle = "modal" class = "mb10">Create Guide</a>
                                </li>
                                <li class = "divider"></li>
                                <li>
                                    <a id = "ag" href = "#" data-target = "#mnbt" data-toggle = "modal" class = "mb10">New Business Type</a>
                                </li>
                                <li class = "divider"></li>
                                <li>
                                    <a href = "../../web/index.php"> Client Database</a>
                                </li>
                                <li class = "divider"></li>
                                <?php if (Yii::app()->user->role >= 3) { ?>
                                    <li>
                                        <a href = "../../web/index.php">Opening Balances</a>
                                    </li>
                                    <li>
                                        <a href = "../../web/index.php">Budgeting</a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class = "dropdown">
                            <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown" role = "button" aria-expanded = "false">Ledgers <span class = "caret"></span></a>
                            <ul class = "dropdown-menu" role = "menu">
                                <li>
                                    <a href = "../../web/index.php">Ledgers</a>
                                </li>
                                <li class = "divider"></li>
                                <li>
                                    <a id = "cs" href = "#" data-target = "#manb" data-toggle = "modal" class = "mb10">New Bank</a>
                                </li>
                                <li>
                                    <a id = "cs" href = "#" data-target = "#mnr" data-toggle = "modal" class = "mb10">New Cash Register</a>
                                </li>
                                <li>
                                    <a id = "cs" href = "#" data-target = "#mcah" data-toggle = "modal" class = "mb10">New Custom Ledger</a>
                                </li>
                                <li class = "divider"></li>
                                <li>
                                    <a href = "../../web/index.php">View Journals</a>
                                </li>
                                <li class = "divider"></li>
                            </ul>
                        </li>
                        <li class = "dropdown">
                            <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown" role = "button" aria-expanded = "false">Account<span class = "caret"></span></a>
                            <ul class = "dropdown-menu" role = "menu">
                                <li>
                                    <a id = "jv" href = "#" data-target = "#journalVoucher" data-toggle = "modal" class = "mb10">Journal Voucher</a>
                                </li>
                                <li>
                                    <a id = "jv" href = "#" data-target = "#journalVoucherMultiple" data-toggle = "modal" class = "mb10">Journal Voucher (Multiple)</a>
                                </li>
                                <li>
                                    <a id = "pv" href = "#" data-target = "#mpv" data-toggle = "modal" class = "mb10">Payment Voucher</a>
                                </li>
                                <!--                                    <li class="divider"></li>-->
                                <!--                                    <li class="dropdown-header">Transfers</li>-->
                                <!--                                    <li><a id="cona" href="#" data-target="#mcona" data-toggle="modal" class="mb10">Contra Account </a></li>-->
                                <li class = "divider"></li>
                                <li>
                                    <a href = "../../web/index.php">Advances</a>
                                </li>
                                <li class = "divider"></li>
                                <li>
                                    <a href = "../../web/index.php">Party Payments</a>
                                </li>
                                <li class = "divider"></li>
                                <li>
                                    <a id = "irs" href = "#" data-target = "#mirs" data-toggle = "modal" class = "mb10">Issue Receipt</a>
                                </li>
                                <li>
                                    <a href = "../../web/index.php">Bills</a>
                                </li>
                                <li class = "divider"></li>
                                <li>
                                    <a id = "cs" href = "#" data-target = "#upgrade" data-toggle = "modal" class = "mb10">Payroll</a>
                                </li>
                                <li>
                                    <a id = "cs" href = "#" data-target = "#upgrade" data-toggle = "modal" class = "mb10">Bank Reconciliation</a>
                                </li>
                                <li class = "divider"></li>
                                <li>
                                    <a href = "../../web/index.php">Tax & Currency</a>
                                </li>
                            </ul>
                        </li>
                        <li class = "dropdown">
                            <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown" role = "button" aria-expanded = "false">Sales <span class = "caret"></span></a>
                            <ul class = "dropdown-menu" role = "menu">
                                <li>
                                    <a href = "../../web/index.php">New Sales</a>
                                </li>
                                <li>
                                    <a href = "../../web/index.php">View Sales</a>
                                </li>
                                <li class = "divider"></li>
                                <li>
                                    <a href = "../../web/index.php">New Package</a>
                                </li>
                                <li>
                                    <a href = "../../web/index.php">View Packages</a>
                                </li>
                                <li class = "divider"></li>
                                <li>
                                    <a href = "../../web/index.php">Group Reports</a>
                                </li>
                                <li>
                                    <a href = "../../web/index.php">W.I.P Summary</a>
                                </li>
                                <li class = "divider"></li>
                                <!-- <li><a id="cs" href="#" data-target="#upgrade" data-toggle="modal" class="mb10"> Ticket Sales </a></li> -->
                            </ul>
                        </li>

                        <li class = "dropdown">
                            <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown" role = "button" aria-expanded = "false">Reports <span class = "caret"></span></a>
                            <ul class = "dropdown-menu" role = "menu">
                                <?php if (Yii::app()->user->role >= 5) { ?>
                                    <li>
                                        <a href = "../../web/index.php">Audit Trail</a>
                                    </li>
                                    <li class = "divider"></li>
                                <?php } ?>
                                <li>
                                    <a href = "../../web/index.php">Trial Balance</a>
                                </li>
                                <li>
                                    <a id = "cs" href = "#" data-target = "#upgrade" data-toggle = "modal" class = "mb10">Margin Reports</a>
                                </li>
                                <li class = "divider"></li>
                                <li>
                                    <a href = "../../web/index.php"> Statement of Comprehensive Income</a>
                                </li>
                                <li>
                                    <a href = "../../web/index.php">Statement of Financial Position</a>
                                </li>
                                <li class = "divider"></li>
                                <li>
                                    <a id = "cs" href = "#" data-target = "#upgrade" data-toggle = "modal" class = "mb10">Payroll Report</a>
                                </li>
                                <!-- <li><a id="cs" href="#" data-target="#upgrade" data-toggle="modal" class="mb10">Ticketing Report </a></li> -->
                                <li class = "divider"></li>
                                <li>
                                    <a id = "cs" href = "#" data-target = "#upgrade" data-toggle = "modal" class = "mb10"> Cash Flow</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href = "../../web/index.php">Settings</a>
                        </li>
                    </ul>
                    <div class = "navbar-collapse collapse">
                        <ul class = "nav navbar-nav navbar-right">
                            <li class = "dropdown">
                                <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown" role = "button" aria-expanded = "false">
                                    <?php
                                        if ($current_company = Misc::get_company_details(Yii::app()->user->getState('company'))) {
                                            echo $current_company['nameinuse'];
                                        }
                                        else {
                                            echo "All";
                                        }
                                    ?>

                                    <span class = "caret"></span>
                                </a>
                                <ul class = "dropdown-menu" role = "menu">
                                    <li>
                                        <a href = "#" class = "set-company" data-com = "all">All</a>
                                    </li>
                                    <li class = "divider"></li>
                                    <li class = "dropdown-header">Select Company</li>
                                    <?php foreach ($companies as $conpany => $value) { ?>
                                        <li>
                                            <a class = "set-company" data-com = "<?php echo $value['idcompany'] ?>"><?php echo $value['nameinuse'] ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class = "dropdown">
                                <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown" role = "button" aria-expanded = "false">
                                    <?php
                                        if (Yii::app()->user->getState('fiscal_from') && Yii::app()->user->getState('fiscal_to')) {
                                            echo date('dS M, Y', strtotime(Yii::app()->user->getState('fiscal_from'))) . ' - ' . date('dS M, Y', strtotime(Yii::app()->user->getState('fiscal_to')));
                                        }
                                        else {
                                            echo "Years";
                                        }
                                    ?>
                                    <span class = "caret"></span>
                                </a>
                                <ul class = "dropdown-menu" role = "menu">
                                    <li>
                                        <a href = "#" class = "set-fiscal" data-from = "all" data-to = "all">All</a>
                                    </li>
                                    <?php
                                        $fiscal = Yii::app()->db->createCommand("SELECT * FROM  `fiscal`")->queryAll();
                                        if (!empty($fiscal)):
                                            foreach ($fiscal as $fis):
                                                ?>
                                                <li class = "divider"></li>
                                                <li>
                                                    <a href = "#" class = "set-fiscal" data-from = "<?php echo $fis['from']; ?>" data-to = "<?php echo $fis['to']; ?>"><?php echo date('dS M, Y', strtotime($fis['from'])) . ' - ' . date('dS M, Y', strtotime($fis['to'])); ?></a>
                                                </li>
                                                <?php
                                            endforeach;
                                        endif;
                                    ?>
                                </ul>
                            </li>
                            <li class = "dropdown">
                                <a href = "javascript:void(0);" data-toggle = "dropdown">
                                    <i class = "fa fa-flag-o"></i>
                                    <span class = "badge badge color_1" id = "flagCount"></span></a>
                                <ul class = "drop_down_task dropdown-menu" id = "notification_ul" style = "height:420px; overflow-y:scroll;"></ul>
                                <ul class = "drop_down_task dropdown-menu mark-all">
                                    <li style = "text-align:center; cursor:pointer;">
                                        <a class = "notification" data-id = "all">Mark all as read.</a>
                                    </li>
                                </ul>
                            </li>
                            <li class = "dropdown">
                                <a href = "../../web/index.php" data-toggle = "dropdown">
                                    <i class = "fa fa-envelope-o"></i>
                                    <span class = "badge badge color_1" id = "msgCount"></span></a>
                                <ul class = "drop_down_task dropdown-menu">

                                    <li>
                                        <p class = "number">You have <span id = "msgCount-1"></span> New Messages</p>
                                        <a href = "../../web/index.php" class = "Goinbox">Go to Inbox</a>
                                    </li>
                                    <li>
                                        <ul id = "ul-messages"></ul>
                                    </li>

                                    <li>
                                        <p>
                                            <a href = "#" data-target = "#compose" data-toggle = "modal" class = "mb10">Compose New Message</a>
                                        </p>
                                    </li>

                                </ul>
                            </li>
                            <li class = "dropdown">
                                <a href = "javascript:void(0);" data-toggle = "dropdown">
                                    <i class = "fa fa-user"></i>
                                </a>
                                <ul class = "dropdown-menu">

                                    <li>
                                        <a href = "#" data-target = "#userNotes" data-toggle = "modal">My Note</a>
                                    </li>

                                    <li>
                                        <a href = "<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/logout">Logout</a>
                                    </li>

                                </ul>
                            </li>
                            <li>
                                <a href = "javascript:;" class = "toggle-menu menu-right push-body jPushMenuBtn rightbar-switch">
                                    <i class = "fa fa-bars chat"></i>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div class = "inner">

            <div class = "contentpanel">

                <?php echo $content; ?>

            </div>

        </div>

    </div>

    <!-- sidebar chats -->
    <nav class = "atm-spmenu atm-spmenu-vertical atm-spmenu-right side-chat hidden-print">
        <div class = "header" style = "height:77px;"></div>
        <div href = "#" class = "sub-header">
            <p><?php echo date('D, d M, Y | h:i:A'); ?></p>
            <br/><br/>
            <div class = "icon">
                <i class = "fa fa-group"></i>
            </div>
            <p>Group Updates</p>
        </div>
        <div class = "content">
            <p class = "title">Recently Added</p>
            <ul class = "nav nav-pills nav-stacked contacts" id = "NfyRec"></ul>
            <p class = "title">Recently Updated</p>
            <ul class = "nav nav-pills nav-stacked contacts" id = "NfyUpd"></ul>
        </div>
    </nav>
    <!-- /sidebar chats -->
    <footer>
        <div class = "footer-inner hidden-print">
            <div class = "">
                <?php echo date('Y'); ?> &copy; Klientscape Software.
            </div>

        </div>
        <div class = "clearfix"></div>
    </footer>
    <!-- Modals -->

    <!--Create Business types-->
    <div class = "modal fade" id = "mnbt" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
            <!--
            <form class="form-horizontal row-border" name="newBusiness">
            -->
            <?php
                echo CHtml::beginForm('addBusiness', 'post', array(
                    'class' => 'form-horizontal row-border',
                    'name'  => 'newBusiness',
                ));
            ?>
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                    <h4 class = "modal-title" id = "myModalLabel">New Business Type</h4>
                </div>
                <div class = "modal-body">
                    <div class = "block-web">
                        <div class = "form-group">
                            <label for = "business[type]" class = "col-sm-2">Type</label>
                            <div class = "col-sm-10">
                                <input type = "text" class = "form-control rs" name = "business[type]"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class = "modal-footer">
                    <button type = "submit" class = "btn btn-success" data-post = "addBusiness">Add</button>
                    <button type = "reset" class = "btn btn-default" data-dismiss = "modal">Discard</button>
                </div>
            </div>
            <?php echo CHtml::endForm(); ?>
            <!--
            </form>
            -->
        </div>
    </div>
    <!--End Business Types-->

    <!--Create suppliers-->
    <div class = "modal fade" id = "mcs" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
            <!--
            <form class="form-horizontal row-border" name="newSuppliers">
            -->
            <?php
                echo CHtml::beginForm('createSupplier', 'post', array(
                    'class' => 'form-horizontal row-border',
                    'name'  => 'newSuppliers',
                ));
            ?>
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                    <h4 class = "modal-title" id = "myModalLabel">Create Supplier</h4>
                </div>
                <div class = "modal-body clearfix">
                    <div class = "row">
                        <div class = "col-md-6">
                            <div class = "porlets-content">
                                <div class = "form-group">
                                    <label class = "col-sm-2">Name</label>
                                    <div class = "col-sm-10">
                                        <input type = "text" class = "form-control rs" name = "newSupplier[name]" id = "supplierName"/>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">Reference</label>
                                    <div class = "col-sm-10">
                                        <input type = "text" class = "form-control rs" name = "newSupplier[ref]"/>
                                    </div>

                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">Email</label>
                                    <div class = "col-sm-10">
                                        <ul class = "af-emails">
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newSupplier[email][0]"/>
                                            </li>
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newSupplier[email][1]"/>
                                            </li>
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newSupplier[email][2]"/>
                                            </li>
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newSupplier[email][3]"/>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- <a href="#" class="btn btn-default more-email pull-right " data-type="s"><i class="fa fa-plus"></i></a>-->

                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">Phone</label>
                                    <div class = "col-sm-10">
                                        <ul class = "af-phone">
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newSupplier[phone][0]"/>
                                            </li>
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newSupplier[phone][1]"/>
                                            </li>
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newSupplier[phone][2]"/>
                                            </li>
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newSupplier[phone][3]"/>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--  <a href="#" class="btn btn-default more-phone pull-right " data-type="s"><i class="fa fa-plus"></i></a>-->
                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">Address</label>
                                    <div class = "col-sm-10">
                                        <textarea class = "form-control rs" name = "newSupplier[address]"></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class = "porlets-content">

                                <div class = "form-group">
                                    <div class = "col-sm-2">
                                        <div class = "chkbox pull-left">
                                            <span>VAT</span>
                                            <input type = "checkbox" class = "isVAT" name = "newSupplier[VATRegistered]" value = "1">
                                        </div>
                                    </div>
                                    <div class = "col-md-4">
                                        <div class = "input-group">
                                            <input type = "number" class = "form-control rs tax_rate" placeholder = "Tax Rate" name = "newSupplier[tax_rate]"/>
                                            <span class = "input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>

                                <div class = "form-group">
                                    <label class = "col-sm-2">PAN</label>
                                    <div class = "col-sm-10">
                                        <input type = "number" class = "form-control rs" placeholder = "Valid PAN Number" name = "newSupplier[PAN]"/>
                                    </div>

                                </div>
                                <!--
                                <div class="form-group">
                                    <label class="col-sm-2">Supplier Code</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="newSupplier[code]" value="SUP-"    />
                                    </div>

                                </div>
                                -->
                                <div class = "form-group">
                                    <label class = "col-sm-2">Opening Balance</label>
                                    <div class = "col-sm-10">
                                        <input type = "number" class = "form-control rs" step = "0.01" name = "newSupplier[openingBalance]" placeholder = "Opening Balance In RS">
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">Credit Days</label>
                                    <div class = "col-sm-4">
                                        <input type = "number" class = "form-control rs" step = "1" name = "newSupplier[creditDays]" placeholder = "Credit Days in days"/>
                                    </div>

                                    <label class = "col-sm-2">Credit %</label>
                                    <div class = "col-sm-4">
                                        <input type = "number" class = "form-control rs" step = "0.01" name = "newSupplier[creditPercent]" placeholder = "Interest on Credit"/>
                                    </div>
                                </div>

                                <div class = "form-group">
                                    <label class = "col-sm-2">Business</label>
                                    <div class = "col-sm-4">
                                        <select class = "form-control rs supplierTOS" name = "newSupplier[tos]">
                                            <option value = ""> Type of business</option>
                                        </select>
                                    </div><!--/col-sm-10-->
                                    <label class = "col-sm-2">Type</label>
                                    <div class = "col-sm-4">
                                        <div class = "square-green single-row">
                                            <select class = "form-control" name = "newSupplier[group]">
                                                <optgroup label = "Assets">
                                                    <option value = "0">Fixed Asset</option>
                                                    <option value = "1">Current Asset</option>

                                                </optgroup>
                                                <optgroup label = "Equity">
                                                    <option value = "2">Capital & Equity</option>
                                                </optgroup>
                                                <optgroup label = "Expenses">
                                                    <option value = "3" selected = "selected">Purchases</option>
                                                    <option value = "4">Indirect Expense</option>
                                                    <option value = "5">Non - Cash Items</option>
                                                </optgroup>
                                                <optgroup label = "Liabilities">
                                                    <option value = "6">Current Liability</option>
                                                </optgroup>
                                                <optgroup label = "Income">
                                                    <option value = "7">Sales</option>
                                                    <option value = "8">Other Income</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class = "clearfix"></div>
                    </div>
                    <div class = "porlets-content">
                        <div class = "header">
                            <h4>Add Rates</h4>
                        </div>
                        <div class = "table-responsive">
                            <table cellpadding = "0" cellspacing = "0" border = "0" class = "display table table-bordered">
                                <thead>
                                    <tr>
                                        <th style = "width:25px;">
                                            <i class = "fa fa-plus" id = "supplierRates"></i>
                                        </th>
                                        <th style = "width:25%;">Particular</th>
                                        <th>Currency</th>
                                        <th style = "width:10%;">Cost</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input name = "sRate[0][particular]" type = "text" class = "form-control rs" placeholder = "Particular / Services"/>
                                        </td>
                                        <td>
                                            <select name = "sRate[0][currency]" class = "form-control rs supplierRateCurrency"></select>
                                        </td>
                                        <td>
                                            <input name = "sRate[0][amount]" class = "form-control rs" placeholder = "Cost"/>
                                        </td>
                                        <td>
                                            <textarea class = "form-control rs" placeholder = "Remarks" name = "sRate[0][remarks]"></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class = "modal-footer">
                    <button type = "submit" class = "btn btn-success" data-post = "createSupplier">
                        <i class = "fa fa-check"></i>
                        Create Supplier
                    </button>
                    <button type = "reset" class = "btn btn-default" data-dismiss = "modal">Discard</button>
                </div>
            </div>
            <?php echo CHtml::endForm(); ?>
            <!--
            </form>
            -->
        </div>
    </div>
    <!--End Create suppliers-->

    <!--Create Guides-->
    <div class = "modal fade" id = "mag" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
            <!--
            <form action="" class="form-horizontal row-border" name="newGuides">
            -->
            <?php
                echo CHtml::beginForm('createGuide', 'post', array(
                    'class' => 'form-horizontal row-border',
                    'name'  => 'newGuides',
                ));
            ?>
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                    <h4 class = "modal-title" id = "myModalLabel">Create Guide</h4>
                </div>
                <div class = "modal-body clearfix">
                    <div class = "row">
                        <div class = "col-md-6">
                            <div class = "porlets-content">
                                <div class = "form-group">
                                    <label class = "col-sm-2">Name</label>
                                    <div class = "col-sm-10">
                                        <input type = "text" class = "form-control rs" name = "newGuide[name]" id = "supplierName"/>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">Reference</label>
                                    <div class = "col-sm-10">
                                        <input type = "text" class = "form-control rs" name = "newGuide[ref]"/>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">Email</label>
                                    <div class = "col-sm-10">
                                        <ul class = "af-emails">
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newGuide[email][0]"/>
                                            </li>
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newGuide[email][1]"/>
                                            </li>
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newGuide[email][2]"/>
                                            </li>
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newGuide[email][3]"/>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">Phone</label>
                                    <div class = "col-sm-10">
                                        <ul class = "af-phone">
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newGuide[phone][0]"/>
                                            </li>
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newGuide[phone][1]"/>
                                            </li>
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newGuide[phone][2]"/>
                                            </li>
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newGuide[phone][3]"/>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">Address</label>
                                    <div class = "col-sm-10">
                                        <textarea class = "form-control rs" name = "newGuide[address]"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class = "col-md-6">
                            <div class = "porlets-content">
                                <div class = "form-group">
                                    <div class = "col-sm-2">
                                        <div class = "chkbox pull-left">
                                            <span>VAT</span>
                                            <input type = "checkbox" class = "isVAT" name = "newGuide[VATRegistered]" value = "1">
                                        </div>
                                    </div>
                                    <div class = "col-md-4">
                                        <div class = "input-group">
                                            <input type = "number" class = "form-control rs tax_rate" placeholder = "Tax Rate" name = "newGuide[tax_rate]"/>
                                            <span class = "input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">PAN</label>
                                    <div class = "col-sm-10">
                                        <input type = "text" class = "form-control rs" placeholder = "Valid PAN Number" name = "newGuide[PAN]"/>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">PIN</label>
                                    <div class = "col-sm-10">
                                        <input type = "text" class = "form-control rs" name = "newGuide[PIN]"/>
                                    </div>
                                </div>
                                <!--
                                <div class="form-group">
                                    <label class="col-sm-2">Guide Code</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="newGuide[code]" value="GUI-"    />
                                    </div>
                                </div>
                                -->
                                <div class = "form-group">
                                    <label class = "col-sm-2">Opening Balance</label>
                                    <div class = "col-sm-10">
                                        <input type = "number" class = "form-control rs" step = "0.01" name = "newGuide[openingBalance]" placeholder = "Opening Balance In RS">
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">Credit Days</label>
                                    <div class = "col-sm-4">
                                        <input type = "number" class = "form-control rs" step = "1" name = "newGuide[creditDays]" placeholder = "Credit Days in days"/>
                                    </div>
                                    <label class = "col-sm-2">Interest %</label>
                                    <div class = "col-sm-4">
                                        <input type = "number" class = "form-control rs" step = "0.01" name = "newGuide[creditPercent]" placeholder = "Interest on Credit"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class = "porlets-content">
                        <div class = "header">
                            <h4>Add Rates</h4>
                        </div>
                        <div class = "table-responsive">
                            <table cellpadding = "0" cellspacing = "0" border = "0" class = "display table table-bordered">
                                <thead>
                                    <tr>
                                        <th style = "width:25px;">
                                            <i class = "fa fa-plus" id = "guideRates"></i>
                                        </th>
                                        <th style = "width:25%;">Particular</th>
                                        <th style = "width:25%;">Cost</th>
                                        <th style = "">Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input name = "guideRate[0][particular]" type = "text" class = "form-control rs" placeholder = "Particular / Services"/>
                                        </td>
                                        <td>
                                            <input name = "guideRate[0][amount]" class = "form-control rs" placeholder = "Cost"/>
                                        </td>
                                        <td>
                                            <textarea class = "form-control rs" placeholder = "Remarks" name = "guideRate[0][remarks]"></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class = "modal-footer">

                    <button type = "submit" class = "btn btn-success" data-post = "createGuide">
                        <i class = "fa fa-check"></i>
                        Create Guide
                    </button>
                    <button type = "button" class = "btn btn-default" data-dismiss = "modal">Discard</button>

                </div>
            </div>
            <?php echo CHtml::endForm(); ?>
            <!--
            </form>
            -->
        </div>
    </div>
    <!--End Create Guide-->

    <!--Create Agents-->
    <div class = "modal fade" id = "mca" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
            <!--
            <form action="" class="form-horizontal row-border" name="newAgents">
            -->
            <?php
                echo CHtml::beginForm('createAgent', 'post', array(
                    'class' => 'form-horizontal row-border',
                    'name'  => 'newAgents',
                ));
            ?>
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                    <h4 class = "modal-title" id = "myModalLabel">Create Agent</h4>
                </div>
                <div class = "modal-body clearfix">

                    <div class = 'row'>
                        <div class = 'col-md-6'>
                            <div class = "porlets-content">
                                <div class = "form-group">
                                    <label class = "col-sm-2">Name</label>
                                    <div class = "col-sm-10">
                                        <input type = "text" class = "form-control rs" name = "newAgent[name]" id = "supplierName"/>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">Reference</label>
                                    <div class = "col-sm-10">
                                        <input type = "text" class = "form-control rs" name = "newAgent[ref]"/>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">Email</label>
                                    <div class = "col-sm-10">
                                        <ul class = "af-emails">
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newAgent[email][0]"/>
                                            </li>
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newAgent[email][1]"/>
                                            </li>
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newAgent[email][2]"/>
                                            </li>
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newAgent[email][3]"/>
                                            </li>

                                        </ul>
                                    </div>
                                    <!-- <a href="#" class="btn btn-default more-email pull-right " data-type="ag"><i class="fa fa-plus"></i></a>-->

                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">Phone</label>
                                    <div class = "col-sm-10">
                                        <ul class = "af-phone">
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newAgent[phone][0]"/>
                                            </li>
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newAgent[phone][1]"/>
                                            </li>
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newAgent[phone][2]"/>
                                            </li>
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newAgent[phone][3]"/>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--  <a href="#" class="btn btn-default more-phone pull-right " data-type="ag"><i class="fa fa-plus"></i></a>-->

                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">Address</label>
                                    <div class = "col-sm-10">
                                        <textarea class = "form-control rs" name = "newAgent[address]"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class = 'col-md-6'>
                            <div class = "porlets-content">
                                <div class = "form-group">
                                    <div class = "col-sm-2">
                                        <div class = "chkbox pull-left">
                                            <span>VAT</span>
                                            <input type = "checkbox" class = "isVAT" name = "newAgent[VATRegistered]" value = "1">
                                        </div>
                                    </div>
                                    <div class = "col-md-4">
                                        <div class = "input-group">
                                            <input type = "number" class = "form-control rs tax_rate" placeholder = "Tax Rate" name = "newAgent[tax_rate]"/>
                                            <span class = "input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">PAN</label>
                                    <div class = "col-sm-10">
                                        <input type = "text" class = "form-control rs" placeholder = "Valid PAN Number" name = "newAgent[PAN]"/>
                                    </div>
                                </div>
                                <!--
                                <div class="form-group">
                                    <label class="col-sm-2">Agent Code</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="newAgent[code]" value="AGN-"    />
                                    </div>
                                </div>
                                -->
                                <div class = "form-group">
                                    <label class = "col-sm-2">Opening Balance</label>
                                    <div class = "col-sm-10">
                                        <input type = "number" class = "form-control rs" step = "0.01" name = "newAgent[openingBalance]" placeholder = "Opening Balance In RS">
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">Credit Days</label>
                                    <div class = "col-sm-4">
                                        <input type = "number" class = "form-control rs" step = "1" name = "newAgent[creditDays]" placeholder = "Credit Days in days"/>
                                    </div>
                                    <label class = "col-sm-2">Interest %</label>
                                    <div class = "col-sm-4">
                                        <input type = "number" class = "form-control rs" step = "0.01" name = "newAgent[creditPercent]" placeholder = "Interest on Credit"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class = "modal-footer">

                    <button type = "submit" class = "btn btn-success" data-post = "createAgent">
                        <i class = "fa fa-check"></i>
                        Create Agent
                    </button>
                    <button type = "button" class = "btn btn-default" data-dismiss = "modal">Discard</button>

                </div>
            </div>
            <?php echo CHtml::endForm(); ?>
            <!--
            </form>
            -->
        </div>
    </div>
    <!-- End Create Agent -->

    <!--Create Airlines suppliers-->
    <div class = "modal fade" id = "air-sup" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
            <!--
            <form action="" class="form-horizontal row-border" name="newATsupplier">
            -->
            <?php
                echo CHtml::beginForm('createATsupplier', 'post', array(
                    'class' => 'form-horizontal row-border',
                    'name'  => 'newATsupplier',
                ));
            ?>
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                    <h4 class = "modal-title" id = "myModalLabel">Create Airlines Supplier</h4>
                </div>
                <div class = "modal-body clearfix">

                    <div class = 'row'>
                        <div class = 'col-md-6'>
                            <div class = "porlets-content">
                                <div class = "form-group">
                                    <label class = "col-sm-2">Name</label>
                                    <div class = "col-sm-10">
                                        <input type = "text" class = "form-control rs" name = "newATsupplier[name]"/>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">Reference</label>
                                    <div class = "col-sm-10">
                                        <input type = "text" class = "form-control rs" name = "newATsupplier[ref]"/>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">Email</label>
                                    <div class = "col-sm-10">
                                        <ul class = "af-emails">
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newATsupplier[email][0]"/>
                                            </li>
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newATsupplier[email][1]"/>
                                            </li>
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newATsupplier[email][2]"/>
                                            </li>
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newATsupplier[email][3]"/>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--  <a href="#" class="btn btn-default more-email pull-right " data-type="ar"><i class="fa fa-plus"></i></a>-->

                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">Phone</label>
                                    <div class = "col-sm-10">
                                        <ul class = "af-phone">
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newATsupplier[phone][0]"/>
                                            </li>
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newATsupplier[phone][1]"/>
                                            </li>
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newATsupplier[phone][2]"/>
                                            </li>
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newATsupplier[phone][3]"/>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--  <a href="#" class="btn btn-default more-phone pull-right " data-type="ar"><i class="fa fa-plus"></i></a>-->

                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">Address</label>
                                    <div class = "col-sm-10">
                                        <textarea class = "form-control rs" name = "newATsupplier[address]"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class = 'col-md-6'>
                            <div class = "porlets-content">
                                <div class = "form-group">
                                    <div class = "col-sm-2">
                                        <div class = "chkbox pull-left">
                                            <span>VAT</span>
                                            <input type = "checkbox" class = "isVAT" name = "newATsupplier[VATRegistered]" value = "1">
                                        </div>
                                    </div>
                                    <div class = "col-md-4">
                                        <div class = "input-group">
                                            <input type = "number" class = "form-control rs tax_rate" placeholder = "Tax Rate" name = "newATsupplier[tax_rate]"/>
                                            <span class = "input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">PAN</label>
                                    <div class = "col-sm-10">
                                        <input type = "text" class = "form-control rs" placeholder = "Valid PAN Number" name = "newATsupplier[PAN]"/>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">PIN</label>
                                    <div class = "col-sm-10">
                                        <input type = "text" class = "form-control rs" name = "newATsupplier[PIN]"/>
                                    </div>
                                </div>
                                <!--
                                <div class="form-group">
                                    <label class="col-sm-2">TS Code</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="newATsupplier[code]" value="AIR-"    />
                                    </div>
                                </div>
                                -->
                                <div class = "form-group">
                                    <label class = "col-sm-2">Opening Balance</label>
                                    <div class = "col-sm-10">
                                        <input type = "number" class = "form-control rs" step = "0.01" name = "newATsupplier[openingBalance]" placeholder = "Opening Balance In RS">
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">Credit Days</label>
                                    <div class = "col-sm-4">
                                        <input type = "number" class = "form-control rs" step = "1" name = "newATsupplier[creditDays]" placeholder = "Credit Days in days"/>
                                    </div>
                                    <label class = "col-sm-2">Interest %</label>
                                    <div class = "col-sm-4">
                                        <input type = "number" class = "form-control rs" step = "0.01" name = "newATsupplier[creditPercent]" placeholder = "Interest on Credit"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class = "porlets-content">
                        <div class = "header">
                            <h4>Add Rates</h4>
                        </div>
                        <div class = "table-responsive">
                            <table cellpadding = "0" cellspacing = "0" border = "0" class = "display table table-bordered">
                                <thead>
                                    <tr>
                                        <th style = "width:25px;">
                                            <i class = "fa fa-plus" id = "airlineRates"></i>
                                        </th>
                                        <th style = "width:25%;">Particular</th>
                                        <th>Currency</th>
                                        <th style = "width:10%;">Cost</th>
                                        <th style = "">Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input name = "airlineRate[0][particular]" type = "text" class = "form-control rs" placeholder = "Particular / Services"/>
                                        </td>
                                        <td>
                                            <select name = "airlineRate[0][currency]" class = "form-control rs supplierRateCurrency"></select>
                                        </td>
                                        <td>
                                            <input name = "airlineRate[0][amount]" class = "form-control rs" placeholder = "Cost"/>
                                        </td>
                                        <td>
                                            <textarea class = "form-control rs" placeholder = "Remarks" name = "airlineRate[0][remarks]"></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class = "modal-footer">
                    <button type = "submit" class = "btn btn-success" data-post = "createATsupplier">
                        <i class = "fa fa-check"></i>
                        Create Airline Supplier
                    </button>
                    <button type = "button" class = "btn btn-default" data-dismiss = "modal">Discard</button>
                </div>
            </div>

        </div>
        <?php echo CHtml::endForm(); ?>
        <!--
        </form>
        -->
    </div>
    <!--End Create Airlines suppliers-->

    <!--Create Transport suppliers-->
    <div class = "modal fade" id = "ts-sup" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
            <!--
            <form action="" class="form-horizontal row-border" name="newTsuppliers">
            -->
            <?php
                echo CHtml::beginForm('createTsupplier', 'post', array(
                    'class' => 'form-horizontal row-border',
                    'name'  => 'newTsuppliers',
                ));
            ?>
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                    <h4 class = "modal-title" id = "myModalLabel">Create Transport Supplier</h4>
                </div>
                <div class = "modal-body clearfix">

                    <div class = "porlets-content clearfix">
                        <div class = "row">
                            <div class = "col-md-6">

                                <div class = "form-group">
                                    <label class = "col-sm-2">Name</label>
                                    <div class = "col-sm-10">
                                        <input type = "text" class = "form-control rs" name = "newTsupplier[name]"/>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">Reference</label>
                                    <div class = "col-sm-10">
                                        <input type = "text" class = "form-control rs" name = "newTsupplier[ref]"/>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">Email</label>
                                    <div class = "col-sm-10">
                                        <ul class = "af-emails">
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newTsupplier[email][0]"/>
                                            </li>
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newTsupplier[email][1]"/>
                                            </li>
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newTsupplier[email][2]"/>
                                            </li>
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newTsupplier[email][3]"/>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--  <a href="#" class="btn btn-default more-email pull-right " data-type="g"><i class="fa fa-plus"></i></a>-->

                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">Phone</label>
                                    <div class = "col-sm-10">
                                        <ul class = "af-phone">
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newTsupplier[phone][0]"/>
                                            </li>
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newTsupplier[phone][1]"/>
                                            </li>
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newTsupplier[phone][2]"/>
                                            </li>
                                            <li>
                                                <input type = "text" class = "form-control rs" name = "newTsupplier[phone][3]"/>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--  <a href="#" class="btn btn-default more-phone pull-right " data-type="g"><i class="fa fa-plus"></i></a>-->

                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">Address</label>
                                    <div class = "col-sm-10">
                                        <textarea class = "form-control rs" name = "newTsupplier[address]"></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class = "col-md-6">
                                <div class = "form-group">
                                    <div class = "col-sm-2">
                                        <div class = "chkbox pull-left">
                                            <span>VAT</span>
                                            <input type = "checkbox" class = "isVAT" name = "newTSupplier[VATRegistered]" value = "1">
                                        </div>
                                    </div>
                                    <div class = "col-md-4">
                                        <div class = "input-group">
                                            <input type = "number" class = "form-control rs tax_rate" placeholder = "Tax Rate" name = "newTSupplier[tax_rate]"/>
                                            <span class = "input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>

                                <div class = "form-group">
                                    <label class = "col-sm-2">PAN</label>
                                    <div class = "col-sm-10">
                                        <input type = "text" class = "form-control rs" placeholder = "Valid PAN Number" name = "newTsupplier[PAN]"/>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">PIN</label>
                                    <div class = "col-sm-10">
                                        <input type = "text" class = "form-control rs" name = "newTsupplier[PIN]"/>
                                    </div>
                                </div>
                                <!--
                                <div class="form-group">
                                    <label class="col-sm-2">TS Code</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="newTsupplier[code]" value="TNS-"    />
                                    </div>
                                </div>
                                -->
                                <div class = "form-group">
                                    <label class = "col-sm-2">Opening Balance</label>
                                    <div class = "col-sm-10">
                                        <input type = "number" class = "form-control rs" step = "0.01" name = "newTsupplier[openingBalance]" placeholder = "Opening Balance In RS">
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class = "col-sm-2">Credit Days</label>
                                    <div class = "col-sm-4">
                                        <input type = "number" class = "form-control rs" step = "1" name = "newTsupplier[creditDays]" placeholder = "Credit Days in days"/>
                                    </div>
                                    <label class = "col-sm-2">Interest %</label>
                                    <div class = "col-sm-4">
                                        <input type = "number" class = "form-control rs" step = "0.01" name = "newTsupplier[creditPercent]" placeholder = "Interest on Credit"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class = "porlets-content">
                        <div class = "col-md-6">
                            <div class = "header">
                                <h4>Add Drivers</h4>
                            </div>
                            <div class = "table-responsive">
                                <table cellpadding = "0" cellspacing = "0" border = "0" class = "display table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                <i class = "fa fa-plus" id = "moreDrivers"></i>
                                            </th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Mobile</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <input name = "driver[0][name]" type = "text" class = "form-control rs" placeholder = "Name"/>
                                            </td>
                                            <td>
                                                <input name = "driver[0][phone_1]" type = "text" class = "form-control rs" placeholder = "Phone"/>
                                            </td>
                                            <td>
                                                <input name = "driver[0][phone_2]" type = "text" class = "form-control rs" placeholder = "Mobile"/>
                                            </td>
                                            <td>
                                                <textarea name = "driver[0][address]" class = "form-control rs" placeholder = "Address"></textarea>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class = "header">
                                <h4>Add Vehicles</h4>
                            </div>
                            <div class = "table-responsive">
                                <table cellpadding = "0" cellspacing = "0" border = "0" class = "display table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                <i class = "fa fa-plus" id = "moreVehicles"></i>
                                            </th>
                                            <th>Vehicle Type</th>
                                            <th>Vehicle #</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <input name = "vehicle[0][vehicle_type]" type = "text" class = "form-control rs" placeholder = "Vehicle Type"/>
                                            </td>
                                            <td>
                                                <input name = "vehicle[0][vehicle_num]" type = "text" class = "form-control rs" placeholder = "Vehicle #"/>
                                            </td>
                                            <td>
                                                <input name = "vehicle[0][price]" type = "text" class = "form-control rs" placeholder = "Price"/>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class = "modal-footer">

                    <button type = "submit" class = "btn btn-success" data-post = "createTsupplier">
                        <i class = "fa fa-check"></i>
                        Create Transport Supplier
                    </button>
                    <button type = "button" class = "btn btn-default" data-dismiss = "modal">Discard</button>

                </div>
            </div>

            <?php echo CHtml::endForm(); ?>
            <!--
            </form>
            -->
        </div>
    </div>
    <!--End Create Transport suppliers-->

    <!-- Create Cash Register-->
    <div class = "modal fade" id = "mnr" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
            <!--
            <form action="" class="form-horizontal row-border" name="CashRegister">
            -->
            <?php
                echo CHtml::beginForm('createCash', 'post', array(
                    'class' => 'form-horizontal row-border',
                    'name'  => 'CashRegister',
                ));
            ?>
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                    <h4 class = "modal-title" id = "myModalLabel">New Cash Register</h4>
                </div>
                <div class = "modal-body clearfix">
                    <div class = "block-web">

                        <div class = "form-group">
                            <label class = "col-sm-2">Register Name</label>
                            <div class = "col-sm-5">
                                <input type = "text" class = "form-control rs" name = "cash[name]">
                            </div>
                            <!--
                            <label class="col-sm-2">Ledger Code</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" value="CSH-" name="cash[code]" >
                            </div>
                            -->
                        </div>
                        <!--                                <div class="form-group">
                                                            <label class="col-sm-2">Currency</label>
                                                            <div class="col-sm-10">
                                                                <select name="cash[currency]">
                                                                    <option>Please Select Currency</option>
                                                                    <option value="NRS" selected="selected">NRS</option>
                                                                    <option value="USD">USD</option>
                                                                    <option value="CNY">CNY</option>
                                                                </select>
                                                            </div>
                                                        </div>-->
                        <div class = "form-group">
                            <label class = "col-sm-2">Opening Balance</label>
                            <div class = "col-sm-10">
                                <input class = "form-control rs" type = "number" step = "0.01" name = "cash[openingbalance]">
                            </div>
                        </div>

                    </div>
                </div>
                <div class = "modal-footer">
                    <button type = "submit" class = "btn btn-success" data-post = "createCash">
                        <i class = "fa fa-check"></i>
                        Add Cash
                    </button>
                    <button type = "button" class = "btn btn-default" data-dismiss = "modal">Discard</button>
                </div>
            </div>

            <?php echo CHtml::endForm(); ?>
            <!--
            </form>
            -->
        </div>
    </div>
    <!-- End Create Cash Register -->

    <!-- Add New Bank-->
    <div class = "modal fade" id = "manb" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
            <!--
            <form action="" class="form-horizontal row-border" name="addNewBank">
            -->
            <?php
                echo CHtml::beginForm('createBank', 'post', array(
                    'class' => 'form-horizontal row-border',
                    'name'  => 'addNewBank',
                ));
            ?>
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                    <h4 class = "modal-title" id = "myModalLabel">Add New Bank</h4>
                </div>
                <div class = "modal-body clearfix">
                    <div class = "block-web">

                        <div class = "form-group">
                            <label class = "col-sm-2">Bank Name</label>
                            <div class = "col-sm-5">
                                <input type = "text" class = "form-control rs" name = "bank[name]">
                            </div>
                            <!--
                            <label class="col-sm-2">Ledger Code</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" value="BNK-" name="bank[code]" >
                            </div>
                            -->
                        </div>

                        <!--                                <div class="form-group">
                                                            <label class="col-sm-2">Currency</label>
                                                            <div class="col-sm-10">
                                                                <select name="bank[currency]">
                                                                    <option>Please Select Currency</option>
                                                                    <option value="NRS" selected="selected">NRS</option>
                                                                    <option value="USD">USD</option>
                                                                    <option value="CNY">CNY</option>
                                                                </select>
                                                            </div>
                                                        </div>-->
                        <div class = "form-group">
                            <label class = "col-sm-2">Opening Balance</label>
                            <div class = "col-sm-10">
                                <input class = "form-control rs" type = "number" step = "0.01" name = "bank[openingbalance]">
                            </div>
                        </div>
                    </div>
                </div>
                <div class = "modal-footer">
                    <button type = "submit" class = "btn btn-success" data-post = "createBank">
                        <i class = "fa fa-check"></i>
                        Add Bank
                    </button>
                    <button type = "button" class = "btn btn-default" data-dismiss = "modal">Discard</button>
                </div>
            </div>

            <?php echo CHtml::endForm(); ?>
            <!--
            </form>
            -->
        </div>
    </div>
    <!-- End Add New Bank -->

    <!-- Create Custom Ledgers-->
    <div class = "modal fade" id = "mcah" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
            <!--
            <form action="" class="form-horizontal row-border">
            -->
            <?php
                echo CHtml::beginForm('createCustomLedger', 'post', array(
                    'class' => 'form-horizontal row-border',
                    'name'  => 'customledgerForm',
                ));
            ?>
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                    <h4 class = "modal-title" id = "myModalLabel">Create Custom Ledgers</h4>
                </div>
                <div class = "modal-body">
                    <div class = "row">

                        <div class = "col-md-12">
                            <div class = "block-web">
                                <div class = "form-group">
                                    <label class = "col-sm-2">Name</label>
                                    <div class = "col-sm-5">
                                        <input type = "text" class = "form-control rs" name = "ledger[name]"/>
                                    </div>
                                    <!--
                                    <label class="col-sm-2">Ledger Code</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="ledger[code]" value="LDG-" />
                                    </div>
                                    -->
                                </div><!--/form-group-->
                                <div class = "form-group">
                                    <label class = "col-sm-2">Group</label>
                                    <div class = "col-sm-10">
                                        <div class = "square-green single-row">
                                            <select class = "form-control rs manageOB" name = "ledger[group]">
                                                <option>Please Select a group</option>
                                                <optgroup label = "Assets">
                                                    <option value = "0" data-ob = "dr">Fixed Asset</option>
                                                    <option value = "1" data-ob = "dr">Current Asset</option>
                                                </optgroup>
                                                <optgroup label = "Equity">
                                                    <option value = "2" data-ob = "cr">Capital & Equity</option>
                                                </optgroup>
                                                <optgroup label = "Expenses">
                                                    <option value = "3" data-ob = "no">Purchases</option>
                                                    <option value = "4" data-ob = "no">Indirect Expense</option>
                                                    <option value = "5" data-ob = "no">Non - Cash Items</option>
                                                </optgroup>
                                                <optgroup label = "Liabilities">
                                                    <option value = "6" data-ob = "cr">Current Liability</option>
                                                </optgroup>
                                                <optgroup label = "Income">
                                                    <option value = "7" data-ob = "no">Sales</option>
                                                    <option value = "8" data-ob = "no">Other Income</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class = "form-group">
                                    <label class = "col-sm-2">Opening Balance</label>
                                    <div class = "col-sm-10">
                                        <input class = "form-control rs ob_type" type = "number" step = "0.01" name = "ledger[openingbalance]">
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <div class = "col-sm-10 col-md-offset-2">
                                        <label for = "ob-dr">
                                            <input type = "radio" id = "ob-dr" value = "dr" name = "ledger[ob_type]"/>
                                            Debit
                                        </label>
                                        <label for = "ob-cr">
                                            <input type = "radio" id = "ob-cr" value = "cr" name = "ledger[ob_type]"/>
                                            Credit
                                        </label>
                                    </div>
                                </div>

                            </div><!--/block-web-->
                        </div>

                    </div>
                </div>
                <div class = "modal-footer">

                    <button type = "submit" class = "btn btn-success" data-post = "createCustomLedger">
                        <i class = "fa fa-check"></i>
                        Create Ledger
                    </button>
                    <button type = "button" class = "btn btn-default" data-dismiss = "modal">Discard</button>

                </div>
            </div>

            <?php echo CHtml::endForm(); ?>
            <!--
            </form>
            -->
        </div>
    </div>
    <!-- End Create Custom Ledgers -->

    <!-- Multiple Entry Journal Voucher -->
    <div class = "modal fade" id = "journalVoucherMultiple" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
            <!--
            <form action="" class="form-horizontal row-border" name="journalv">
            -->
            <?php
                echo CHtml::beginForm('journalMEntry', 'post', array(
                    'class' => 'form-horizontal row-border',
                    'name'  => 'journalv',
                ));
            ?>
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                    <h4 class = "modal-title" id = "myModalLabel">Multiple Entry Journal Voucher <span id = "jvm-journal"></span></h4>
                </div>
                <div class = "modal-body double-modal-fix h550">
                    <div class = "porlets-content">
                        <div class = "col-md-3">
                            <div class = "form-group">
                                <p class = ""><strong>Company :</strong> <span class = "jvm-datepicker">
                                        <input name = "vouchertotal_m[company]" type = "text" class = "form-control rs autoCompany ui-autocomplete-input jvm-company" placeholder = "Company"/>
                                        <input type = "hidden" name = "vouchertotal_m[companyId]" class = "companyAuto-i"/>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class = "col-md-3">
                            <div class = "form-group">
                                <p class = ""><strong>Transaction Date: <span class = "jvm-datepicker">
                                            <input type = "text" class = "form-control form-control-inline input-medium default-date-picker" name = "vouchertotal_m[tranDate]" data-date-format = "dd/mm/yyyy" data-date = "13/07/2013" value = "<?php echo date('d-m-Y'); ?>">
                                        </span></strong></p>
                            </div>
                        </div>
                        <div class = "col-md-3">
                            <div class = "btn-group" data-toggle = "buttons" id = "drcr-type" data-flag = "dr">
                                <button class = "jvm-select btn btn-success" data-val = "dr">
                                    Multiple Debit
                                </button>
                                <button class = "jvm-select btn btn-default" data-val = "cr">
                                    Multiple Credit
                                </button>
                            </div>
                        </div>
                        <div class = "col-md-3">
                            <div class = "form-group">
                                <p class = "jvm-dt"><strong>Date: <span><?php echo date('D') . ', ' . date('d  M, Y'); ?></span></strong></p>
                            </div>
                        </div>
                        <div class = "clearfix"></div>
                        <div class = "table-responsive">
                            <table cellpadding = "0" cellspacing = "0" border = "0" class = "display table table-bordered jvcr-table">
                                <thead>
                                    <tr>
                                        <th class = "jvm-plus"><span class = "addMore">+</span></th>
                                        <th class = "jvm-ac">Account</th>
                                        <th class = "jvm-dr">Debit</th>
                                        <th class = "jvm-cr">Credit</th>
                                        <th class = "jvm-tax">Tax</th>
                                    </tr>
                                </thead>
                                <tbody id = "jvm-rows">
                                    <tr data-index = "4">
                                        <td>
                                            <a href = "#" title = "remove">X</a>
                                        </td>
                                        <td>
                                            <input name = "jvm[4][ledger]" type = "text" class = "form-control rs jvm-ac-inp ui-autocomplete-input ledgerSearchAuto " placeholder = "A/C"/>
                                            <input type = "hidden" name = "jvm[4][ledgerId]"/>
                                        </td>
                                        <td>
                                            <input type = "text" class = "form-control rs jvm-dr-inp jvInp numInput" placeholder = "Dr" name = "jvm[4][dr]" autocomplete = "off"/>
                                        </td>
                                        <td>
                                            <input type = "text" class = "form-control rs jvm-cr-inp jvInp numInput disabled" readonly placeholder = "Cr" name = "jvm[4][cr]" value = "0.00" autocomplete = "off"/>
                                        </td>
                                        <td>
                                            <div class = "clearfix">
                                                <a class = "AddTax" href = "#">+ TAX</a>
                                            </div>
                                            <ul class = "taxTable"></ul>
                                        </td>
                                    </tr>
                                    <tr data-index = "3">
                                        <td>
                                            <a href = "#" title = "remove">X</a>
                                        </td>
                                        <td>
                                            <input name = "jvm[3][ledger]" type = "text" class = "form-control rs jvm-ac-inp ui-autocomplete-input ledgerSearchAuto " placeholder = "A/C"/>
                                            <input type = "hidden" name = "jvm[3][ledgerId]"/>
                                        </td>
                                        <td>
                                            <input type = "text" class = "form-control rs jvm-dr-inp jvInp numInput" placeholder = "Dr" name = "jvm[3][dr]" autocomplete = "off"/>
                                        </td>
                                        <td>
                                            <input type = "text" class = "form-control rs jvm-cr-inp jvInp numInput disabled" readonly placeholder = "Cr" name = "jvm[3][cr]" value = "0.00" autocomplete = "off"/>
                                        </td>
                                        <td>
                                            <div class = "clearfix">
                                                <a class = "AddTax" href = "#">+ TAX</a>
                                            </div>
                                            <ul class = "taxTable"></ul>
                                        </td>
                                    </tr>
                                    <tr data-index = "2">
                                        <td>
                                            <a href = "#" title = "remove">X</a>
                                        </td>
                                        <td>
                                            <input name = "jvm[2][ledger]" type = "text" class = "form-control rs jvm-ac-inp ui-autocomplete-input ledgerSearchAuto " placeholder = "A/C"/>
                                            <input type = "hidden" name = "jvm[2][ledgerId]"/>
                                        </td>
                                        <td>
                                            <input type = "text" class = "form-control rs jvm-dr-inp jvInp numInput" placeholder = "Dr" name = "jvm[2][dr]" autocomplete = "off"/>
                                        </td>
                                        <td>
                                            <input type = "text" class = "form-control rs jvm-cr-inp jvInp numInput disabled" readonly placeholder = "Cr" name = "jvm[2][cr]" value = "0.00" autocomplete = "off"/>
                                        </td>
                                        <td>
                                            <div class = "clearfix">
                                                <a class = "AddTax" href = "#">+ TAX</a>
                                            </div>
                                            <ul class = "taxTable"></ul>
                                        </td>
                                    </tr>
                                    <tr data-index = "1">
                                        <td>
                                            <a href = "#" title = "remove">X</a>
                                        </td>
                                        <td>
                                            <input name = "jvm[1][ledger]" type = "text" class = "form-control rs jvm-ac-inp ui-autocomplete-input ledgerSearchAuto " placeholder = "A/C"/>
                                            <input type = "hidden" name = "jvm[1][ledgerId]"/>
                                        </td>
                                        <td>
                                            <input type = "text" class = "form-control rs jvm-dr-inp jvInp numInput" placeholder = "Dr" name = "jvm[1][dr]" autocomplete = "off"/>
                                        </td>
                                        <td>
                                            <input type = "text" class = "form-control rs jvm-cr-inp jvInp numInput disabled" readonly placeholder = "Cr" name = "jvm[1][cr]" value = "0.00" autocomplete = "off"/>
                                        </td>
                                        <td>
                                            <div class = "clearfix">
                                                <a class = "AddTax" href = "#">+ TAX</a>
                                            </div>
                                            <ul class = "taxTable"></ul>
                                        </td>
                                    </tr>
                                    <tr data-index = "0">
                                        <td></td>
                                        <td>
                                            <input name = "jvm[0][ledger]" type = "text" class = "form-control rs jvm-ac-inp ui-autocomplete-input ledgerSearchAuto " placeholder = "A/C"/>
                                            <input type = "hidden" name = "jvm[0][ledgerId]" id = "jvm-main-drcr-ledgerid"/>
                                        </td>
                                        <td>
                                            <input type = "text" class = "form-control rs jvm-dr-inp jvInp numInput disabled" readonly placeholder = "Dr" name = "jvm[0][dr]" autocomplete = "off" value = "0.00"/>
                                        </td>
                                        <td>
                                            <input type = "text" class = "form-control rs jvm-cr-inp jvInp numInput" placeholder = "Cr" name = "jvm[0][cr]" autocomplete = "off"/>
                                        </td>
                                        <td>
                                            <div class = "clearfix">
                                                <a class = "AddTax" href = "#">+ TAX</a>
                                            </div>
                                            <ul class = "taxTable"></ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div clas = "jvm-totals clearfix">
                            <div class = "col-md-6">
                                <div class = "dr_total">
                                    <label>Total Debit:</label>
                                    <input type = "text" id = "journal-total-debit" class = "fake-input" name = "vouchertotal_m[totalDebit]"/>
                                    <span id = "debit-diff"></span>
                                </div>
                                <div id = "dr-in-words"></div>
                            </div>
                            <div class = "col-md-6">
                                <div class = "cr_total">
                                    <label>Total Credit:</label>
                                    <input type = "text" id = "journal-total-credit" class = "fake-input" name = "vouchertotal_m[totalCredit]"/>
                                    <span id = "credit-diff"></span>
                                </div>
                                <div id = "cr-in-words"></div>
                            </div>
                        </div>
                        <div class = "form-group">
                            <div class = "col-md-12">
                                <textarea style = "margin-top:10px;" class = "form-control" name = "vouchertotal_m[remarks]" placeholder = "Please Enter Narrative  Here"></textarea>
                            </div>
                        </div>
                        <div class = "form-group">
                            <div class = "col-sm-2">
                                <label class = "">Assign transaction to group</label>
                                <input name = "vouchertotal_m[g_ledger]" type = "text" class = "form-control rs ui-autocomplete-input groupAuto"/>
                                <input type = "hidden" class = "auto-i" id = "g_ledgerid_m" name = "vouchertotal_m[g_ledgerid]"/>
                            </div>
                            <div class = "col-sm-4">
                                <label class = "">Transaction Remarks</label>
                                <input id = "g_ledger_remarks_m" name = "vouchertotal_m[g_ledger_remarks]" type = "text" class = "form-control rs"/>
                            </div>
                            <div class = "col-sm-2">
                                <span class = "jvm-visible">
                                    <label>
                                        <input type = "checkbox" value = "1" name = "vouchertotal_m[visible]">
                                        Visible to all
                                    </label>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class = "modal-footer">
                        <button type = "button" id = "jvm-retotal" class = "btn btn-default  pull-left">Recalculate Voucher</button>
                        <button type = "button" class = "btn btn-success  jvm-submit" data-post = "journalMEntry" data-continue = "0">Submit Journal</button>
                        <button type = "button" class = "btn btn-primary  jvm-submit" data-post = "JournalMEntry" data-continue = "1">Submit Journal & Continue</button>
                        <button type = "button" class = "btn btn-default" data-dismiss = "modal" data-continue = "0">Discard</button>
                    </div>
                </div>
            </div>
            <?php echo CHtml::endForm(); ?>
            <!--
            </form>
            -->
        </div>
    </div>

    <!--Single Journal Voucher -->

    <div class = "modal fade" id = "journalVoucher" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
            <!--
            <form action="" class="form-horizontal row-border" name="journalv">
            -->
            <?php
                echo CHtml::beginForm('journalEntry', 'post', array(
                    'class' => 'form-horizontal row-border',
                    'name'  => 'journalv',
                ));
            ?>
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                    <h4 class = "modal-title" id = "myModalLabel">Journal Voucher</h4>
                </div>
                <div class = "modal-body double-modal-fix h550">
                    <div class = "row">
                        <div class = "col-md-4">
                            <div class = "form-group">

                            </div>
                        </div>
                    </div>
                    <div class = "">
                        <div class = "row">
                            <div class = "col-md-4">
                                <p class = "jv-dt"><strong>Date: <span><?php echo date('D') . ', ' . date('d/m/y'); ?></span></strong></p>
                                <!-- <p class="jv-nm">  <strong>Journal #: <span> JJV-0005 </span></strong></p>-->
                            </div>

                            <div class = "col-md-4">
                                <div class = "form-group">
                                    <label class = "col-sm-4">
                                        Transaction Date:
                                    </label>
                                    <div class = "col-sm-8">
                                        <input type = "text" class = "form-control  default-date-picker" name = "vouchertotal[tranDate]" data-date-format = "dd/mm/yyyy" data-date = "13/07/2013" value = "<?php echo date('d-m-Y'); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class = "col-md-4">
                                <div class = "form-group">
                                    <label class = "col-md-3">
                                        Company :
                                    </label>
                                    <div class = "col-md-9">
                                        <select name = "vouchertotal[company]">
                                            <?php foreach ($companies as $company => $value) { ?>
                                                <option value = "<?php echo $value['idcompany'] ?>"><?php echo $value['nameinuse']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class = "clearfix"></div>
                        <div class = "table-responsive">
                            <div class = "col-md-6">
                                <table cellpadding = "0" cellspacing = "0" border = "0" class = "display table table-bordered jvdr-table">
                                    <thead>
                                        <tr>
                                            <th class = "jv-plus"><span class = "addMore">+</span></th>
                                            <th class = "jv-dr">Particulars</th>
                                            <th class = "jv-dr">Debit</th>
                                            <th class = "jv-plus"></th>
                                        </tr>
                                    </thead>
                                    <tbody id = "dr-rows">
                                        <tr>
                                            <td>
                                                <i class = "fa fa-arrow-right"></i>
                                            </td>
                                            <td>
                                                <input name = "jvDebit[ledger]" type = "text" class = "form-control rs jv-pr-inp ui-autocomplete-input ledgerSearchAuto "/>
                                                <input type = "hidden" name = "jvDebit[ledgerid]"/>
                                            </td>
                                            <td>
                                                <input name = "jvDebit[amount]" type = "text" class = "form-control rs jv-dr-inp jvInp numInput"/>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                    <tbody id = "dr-tax-rows">

                                    </tbody>

                                </table>
                            </div>
                            <div class = "col-md-6">
                                <table cellpadding = "0" cellspacing = "0" border = "0" class = "display table table-bordered jvcr-table">
                                    <thead>
                                        <tr>
                                            <th class = "jv-plus"><span class = "addMore">+</span></th>
                                            <th class = "jv-dr">Particulars</th>
                                            <th class = "jv-dr">Credit</th>
                                            <th class = "jv-plus"></th>
                                        </tr>
                                    </thead>
                                    <tbody id = "cr-rows">
                                        <tr>
                                            <td>
                                                <i class = "fa fa-arrow-right"></i>
                                            </td>
                                            <td>
                                                <input name = "jvCredit[ledger]" type = "text" class = "form-control rs jv-pr-inp ui-autocomplete-input ledgerSearchAuto ">
                                                <input type = "hidden" name = "jvCredit[ledgerid]"/>
                                            </td>
                                            <td>
                                                <input type = "text" class = "form-control rs jv-cr-inp jvInp numInput" name = "jvCredit[amount]"/>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                    <tbody id = "cr-tax-rows">

                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <div clas = "jv-totals clearfix">
                            <div class = "col-md-6">
                                <div class = "dr_total">
                                    <label>Total Debit:</label>
                                    <input type = "text" id = "journal-total-debit" class = "fake-input" name = "vouchertotal[totalDebit]"/>
                                    <span id = "debit-diff"></span>
                                </div>
                                <div id = "dr-in-words"></div>
                            </div>
                            <div class = "col-md-6">
                                <div class = "cr_total">
                                    <label>Total Credit:</label>
                                    <input type = "text" id = "journal-total-credit" class = "fake-input" name = "vouchertotal[totalCredit]"/>
                                    <span id = "credit-diff"></span>
                                </div>
                                <div id = "cr-in-words"></div>
                            </div>
                        </div>
                        <div class = "form-group">
                            <div class = "col-md-12">
                                <textarea style = "margin-top:10px;" class = "form-control" name = "vouchertotal[remarks]" placeholder = "Please Enter Narrative  Here"></textarea>
                            </div>
                        </div>
                        <div class = "form-group">

                            <div class = "col-sm-2">
                                <label class = "">Assign transaction to group</label>
                                <input name = "vouchertotal[g_ledger]" type = "text" class = "form-control rs ui-autocomplete-input groupAuto"/>
                                <input type = "hidden" id = "g_ledgerid" name = "vouchertotal[g_ledgerid]"/>
                            </div>

                            <div class = "col-sm-4">
                                <label class = "">Transaction Remarks</label>
                                <input id = "g_ledger_remarks" name = "vouchertotal[g_ledger_remarks]" type = "text" class = "form-control rs"/>

                            </div>
                            <div class = "col-sm-2">
                                <span class = "jv-visible">
                                    <label>
                                        <input type = "checkbox" value = "1" name = "vouchertotal[visible]">
                                        Visible to all
                                    </label>
                                </span>
                            </div>

                        </div>
                    </div>
                    <div class = "modal-footer">
                        <button type = "button" id = "jv-retotal" class = "btn btn-default  pull-left">Recalculate Voucher</button>
                        <!-- <button type="button" id="jv-clear" class="btn btn-default  pull-left">Clear Empty Rows</button>-->
                        <button type = "button" class = "btn btn-success  jv-submit" data-post = "journalEntry">Submit Journal</button>
                        <button type = "button" class = "btn btn-primary  jv-submit" data-post = "JournalEntry" data-continue = "1">Submit Journal & Continue</button>
                        <button type = "button" class = "btn btn-default" data-dismiss = "modal">Discard</button>

                    </div>
                </div>
            </div>
            <?php echo CHtml::endForm(); ?>
            <!--
            </form>
            -->
        </div>
    </div>
    <!-- End Journal Voucher -->
    <!-- Create Payment Voucher -->
    <div class = "modal fade" id = "mpv" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
            <!--
            <form action="" class="form-horizontal row-border" name="paymentVoucher">
            -->
            <?php
                echo CHtml::beginForm('pVEntry', 'post', array(
                    'class' => 'form-horizontal row-border',
                    'name'  => 'paymentVoucher',
                ));
            ?>
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                    <h4 class = "modal-title" id = "myModalLabel">Payment Voucher</h4>
                </div>
                <div class = "modal-body clearfix">
                    <div class = "block-web">
                        <div class = "form-group">
                            <label class = "col-sm-1">Acc Head</label>
                            <div class = "col-sm-5">
                                <input type = "text" class = "form-control  ui-autocomplete-input ledgerCustomAuto" id = "PVCustom" autocomplete = "off" placeholder = "Account Head" name = "pv[accHead]"/>
                                <input class = "auto-i" name = "pv[accHeadId]" type = "hidden" value = ""/>
                            </div>
                            <label class = "col-sm-1">Register</label>
                            <div class = "col-sm-5">
                                <input type = "text" class = "form-control  ui-autocomplete-input regAuto" autocomplete = "off" placeholder = "Register" name = "pv[register]"/>
                                <input class = "auto-i" name = "pv[registerId]" type = "hidden" value = ""/>
                            </div>
                        </div>

                        <div class = "form-group">
                            <label class = "col-sm-1">Amount</label>
                            <div class = "col-sm-5">
                                <input id = "pvamount" type = "number" class = "form-control" name = "pv[amount]">
                            </div>

                            <label class = "col-sm-1">Paid to</label>
                            <div class = "col-sm-5">
                                <input type = "text" class = "form-control" name = "pv[name]">
                            </div>

                        </div>
                        <div class = "form-group">
                            <label class = "col-sm-1">In Words</label>
                            <div class = "col-sm-11">
                                <input class = "form-control rs" type = "text" id = "in-words">
                            </div>
                        </div>
                        <div class = "form-group">
                            <label class = "col-sm-1">Description</label>
                            <div class = "col-sm-11">
                                <textarea class = "form-control" name = "pv[remarks]"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class = "modal-footer">
                    <button type = "submit" class = "btn btn-success" data-post = "pVEntry">Submit Voucher</button>
                    <button type = "submit" class = "btn btn-success" data-post = "pVEntry" data-continue = "1">Submit Voucher & Continue</button>
                    <button type = "reset" class = "btn btn-default" data-dismiss = "modal">Discard</button>

                </div>
            </div>

            <?php echo CHtml::endForm(); ?>
            <!--
            </form>
            -->
        </div>
    </div>
    <!-- End Create Voucher -->

    <!-- Contra Account -->
    <!--    <div class="modal fade" id="mcona" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog">
                        <form action="" class="form-horizontal row-border">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Contra Account</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="block-web">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p class="jv-dt">Date:<span><?php
        //    echo date('D') . ', ';
        //    echo date('d/m/y');
    ?></span></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" style="text-align:right">
                                                <p class="jv-nm">Journal #:<span>JASHA-0005</span></p>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="table-responsive">
                                            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered jv-table">
                                                <thead>
                                                    <tr>

                                                        <th class="jv-pr">From (USD)</th>
                                                        <th class="jv-memo">To (NPR)</th>

                                                    </tr>
                                                </thead>
                                                <tbody id="dr-rows">
                                                    <tr>
                                                        <td>
                                                            <input name="jvDebit[0][ledger]" type="text" class="form-control rs jv-pr-inp ui-autocomplete-input" />
                                                            <input type="hidden" name="jvDebit[0][ledgerid]" />
                                                        </td>
                                                        <td><input type="text" name="jvDebit[0][memo]" class="form-control rs"/></td>

                                                    </tr>
                                                </tbody>
                                                <tbody id="tax-rows">

                                                </tbody>
                                                <tbody id="cr-rows">

                                                </tbody>
                                                <tfoot>



                                            </table>


                                            <div> Exchange :<input name="jvDebit[0][ledger]" type="text" class="form-control rs jv-pr-inp ui-autocomplete-input" />
                                                <input type="hidden" name="jvDebit[0][ledgerid]" />
                                            </div>




                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">

                                    <button type="submit" class="btn btn-success">Contra</button>
                                    <button type="reset" class="btn btn-default" data-dismiss="modal">Discard</button>

                                </div>
                            </div>

                        </form>



                    </div>
                </div>-->
    <!-- End Contra Account -->

    <!-- Receipts  -->
    <div class = "modal fade" id = "mirs" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
            <!--
            <form action="" class="form-horizontal row-border">
            -->
            <?php
                echo CHtml::beginForm('', 'post', array(
                    'class' => 'form-horizontal row-border',
                    'name'  => '',
                ));
            ?>
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                    <h4 class = "modal-title" id = "myModalLabel">Receipt </h4>
                </div>
                <div class = "modal-body">
                    <p>Received with thanks from
                        <input type = "text" name = "reciept[supplier]" value = "" required id = "receipt-supplier"/>
                    </p>

                    <p>the sum of
                        <input type = "text" name = "reciept[amount]" value = "" required id = "receipt-amount"/>
                    </p>

                    <p>in <span>
                            <input type = "radio" name = "reciept[pm]" id = "rec_cas" value = "0" checked = "checked"/>
                            <label for = "rec_cas">Cash</label>
                            <input type = "radio" name = "reciept[pm]" id = "rec_chq" value = "1"/>
                            <label for = "rec_chq">Cheque</label>
                            <br/>
                            <input type = "text" name = "reciept[chkNum]" id = "rec_chq_num" placeholder = "Cheque Number" style = "display: none;"/>
                        </span>
                    </p>

                    <p>
                        <span class = "pull-right">Issued By : <?php echo Yii::app()->user->name; ?></span>
                    </p>
                </div>
                <div class = "modal-footer">
                    <button type = "submit" class = "btn btn-success" data-post = "issueReceipt">Issue & Print</button>
                    <button type = "reset" class = "btn btn-default" data-dismiss = "modal">Discard</button>
                </div>
            </div>

            <?php echo CHtml::endForm(); ?>
            <!--
            </form>
            -->
        </div>
    </div>
    <!-- End Receipts -->

    <!--View Ledgers-->
    <div class = "modal fade" id = "mvl" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
            <!--
            <form class="form-horizontal row-border" name="newBusiness">
            -->
            <?php
                echo CHtml::beginForm('', 'post', array(
                    'class' => 'form-horizontal row-border',
                    'name'  => 'newBusiness',
                ));
            ?>
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                    <h4 class = "modal-title" id = "myModalLabel"></h4>
                </div>
                <div class = "modal-body clearfix">
                    <div class = "block-web">

                    </div>
                </div>
                <div class = "modal-footer">

                    <button type = "button" class = "btn btn-default" data-dismiss = "modal">
                        <i class = "fa fa-file-text-o"></i>
                        Export PDF
                    </button>
                    <button type = "button" class = "btn btn-default" data-dismiss = "modal">
                        <i class = "fa fa-print"></i>
                        Print
                    </button>
                    <button type = "button" class = "btn btn-default" data-dismiss = "modal">
                        <i class = "fa fa-check"></i>
                        OK
                    </button>
                </div>
            </div>
            <?php echo CHtml::endForm(); ?>
            <!--
            </form>
            -->
        </div>
    </div>
    <!--End View Ledgers-->

    <!-- Upgrade Package -->
    <div class = "modal fade" id = "upgrade" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
            <!--
            <form action="" class="form-horizontal row-border">
            -->
            <?php
                echo CHtml::beginForm('', 'post', array(
                    'class' => 'form-horizontal row-border',
                    'name'  => '',
                ));
            ?>
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                    <h4 class = "modal-title" id = "myModalLabel">Upgrade Package</h4>
                </div>
                <div class = "modal-body">
                    <div class = "row">
                        <div class = "col-md-3">
                            <img src = "<?php echo Yii::app()->request->baseUrl; ?>/css/images/upgradenoweasit.png" alt = ""/>
                        </div>
                        <div class = "col-md-9">
                            <p>Your current package plan does not include these features. To upgrade your package plan please contact the vendor.</p>
                            <p>Thank You</p>
                            <address>
                                <strong>Klientscape Software Pvt. Ltd.</strong><br/> Bishal Nagar, Kathmandu,<br/> Nepal<br/> <abbr title = "Email">E:</abbr>
                                <a href = "../../web/index.php">info@klientscape.com</a>
                            </address>
                        </div>

                    </div>

                </div>
                <div class = "modal-footer">

                    <button type = "button" class = "btn btn-default" data-dismiss = "modal">Ok</button>

                </div>
            </div>

            <?php echo CHtml::endForm(); ?>
            <!--
            </form>
            -->
        </div>
    </div>
    <!-- End of upgrade package -->

    <!-- Modal Compose Message  -->
    <div class = "modal fade" id = "compose" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
            <!--
            <form action="" class="form-horizontal row-border">
            -->
            <?php
                echo CHtml::beginForm('sendMessage', 'post', array(
                    'class' => 'form-horizontal row-border',
                    'name'  => '',
                ));
            ?>
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                    <h4 class = "modal-title" id = "myModalLabel">Send Message</h4>
                </div>
                <div class = "modal-body">
                    <div class = "porlets-content">
                        <div class = "compose-mail">
                            <div class = "col-md-12">

                                <div class = "form-group">
                                    <label>To:</label>
                                    <p>
                                        <span class = "msg-to-wrapper">
                                            <?php for ($mes = 0; $mes < count($users); $mes++) { ?>
                                                <input type = "checkbox" name = "message[msgto][]" value = "<?php echo $users[$mes]['id'] ?>">
                                                <label class = "msg-to-label"><?php echo $users[$mes]['name'] ?></label>
                                            <?php } ?>
                                        </span></p>
                                </div>
                                <div class = "form-group">
                                    <label class = "" for = "subject">Subject:</label>
                                    <input type = "text" class = "form-control" id = "subject" name = "message[subject]">
                                </div>
                                <div class = "form-group">
                                    <textarea class = "form-control" placeholder = "Enter text ..." class = "col-xs-12" rows = "25" name = "message[msgbody]"></textarea>
                                    <!-- <textarea class="form-control ckeditor" id="messageEditor" placeholder="Enter text ..." class="col-xs-12" rows="25" name="message['body']"></textarea>-->
                                    <!--                                            <div class="compose-editor">
                                                                                    <textarea id="text-editor" class="compose-editor2" placeholder="Enter text ..." class="col-xs-12" rows="25" name="message['body']"></textarea>
                                                                                </div>-->
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class = "modal-footer">
                    <button type = "submit" class = "btn btn-success" data-post = "sendMessage">Send Message</button>
                    <button type = "reset" class = "btn btn-default" data-dismiss = "modal">Discard</button>
                </div>
            </div>

            <?php echo CHtml::endForm(); ?>
            <!--
            </form>
            -->
        </div>
    </div>
    <!-- END Modal Compose Message  -->
    <!-- Read Message -->
    <div class = "modal fade" id = "readMessage" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
            <!--
            <form action="" class="form-horizontal row-border">
            -->
            <?php
                echo CHtml::beginForm('', 'post', array(
                    'class' => 'form-horizontal row-border',
                    'name'  => '',
                ));
            ?>
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                    <h4 class = "modal-title" id = "myModalLabel">
                        <i class = "fa fa-envelope-o"></i>
                        <span class = "read_subject"></span></h4>
                </div>
                <div class = "modal-body">
                    <div class = "row">
                        <div class = "col-md-12 read-message">
                            <p>
                                <strong> From : </strong><span id = "read_from"></span> <span class = "pull-right" id = "read_date"></span>
                            </p>
                            <p>
                                <strong> Subject : </strong> <span class = "read_subject"></span>
                            </p>
                            <p id = "read_message"></p>

                        </div>

                    </div>

                </div>
                <div class = "modal-footer">

                    <button type = "button" class = "btn btn-default" data-dismiss = "modal">Ok</button>

                </div>
            </div>

            <?php echo CHtml::endForm(); ?>
            <!--
            </form>
            -->
        </div>
    </div>
    <!-- End of Read Message -->

    <!-- View Journal Entry-->
    <div class = "modal fade" id = "mvje" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
            <!--
            <form action="" class="form-horizontal row-border">
            -->
            <?php
                echo CHtml::beginForm('', 'post', array(
                    'class' => 'form-horizontal row-border',
                    'name'  => '',
                ));
            ?>
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                    <h4 class = "modal-title" id = "myModalLabel pull-left">View Journal </h4>
                </div>
                <div class = "modal-body">
                    <div class = "block-web">
                        <div class = "porlets-content">
                            <div class = "row">
                                <div class = "col-md-4" style = "display:inline-block; width: 31%;">
                                    <p>Date :<span id = "journalViewDate"></p>
                                </div>
                                <div class = "col-md-4" style = "display:inline-block; width: 31%;">
                                    <p>Journal # : <span id = "journalViewCode"></p>
                                </div>
                                <div class = "col-md-4" style = "display:inline-block; width: 31%;">
                                    <p>Transaction Date # : <span id = "journalViewTdate"></p>
                                </div>
                            </div>
                        </div>
                        <div class = "table-responsive">
                            <table class = "table table-responsive table-hover table-bordered JournalEntryTable" style = "margin:20px 0;">
                                <thead>
                                    <tr>
                                        <th>
                                            <input type = "checkbox" id = "check-all-box"/>
                                        </th>
                                        <!-- <th>Ledger Code</th> -->
                                        <th>Ledger Name</th>
                                        <th>Group</th>
                                        <th>Particular</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>

                            </table>
                            <div class = "JVremarks">
                                <strong>Narrative</strong>
                                <p id = "journalViewRemarks"></p>
                            </div>
                            <div class = "JVvisibleRemarks">
                                <strong>Visible Remarks</strong>
                                <p id = "journalVisibleRemarks"></p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class = "modal-footer">

                    <!-- <button type="button" class="btn btn-default pdf-journals"><i class="fa fa-file-text-o"></i>Export PDF</button> -->
                    <button type = "button" class = "btn btn-default print-journals">
                        <i class = "fa fa-print"></i>
                        Print / Export PDF
                    </button>
                    <button type = "button" class = "btn btn-default" data-dismiss = "modal">
                        <i class = "fa fa-check"></i>
                        OK
                    </button>
                </div>
            </div>
            <?php echo CHtml::endForm(); ?>
            <!--
            </form>
            -->
        </div>
    </div>
    <!--End View Journal Entry-->

    <!-- Read Journal Remarks -->
    <div class = "modal fade" id = "mrrjv" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
            <!--
            <form action="" class="form-horizontal row-border">
            -->
            <?php
                echo CHtml::beginForm('', 'post', array(
                    'class' => 'form-horizontal row-border',
                    'name'  => '',
                ));
            ?>
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                    <h4 class = "modal-title" id = "myModalLabel"></h4>
                </div>
                <div class = "modal-body">
                    <div class = "porlets-content">
                        <p class = "jv-remarks-view"></p>
                    </div>
                </div>
                <div class = "modal-footer">

                    <button type = "button" class = "btn btn-default" data-dismiss = "modal">Ok</button>

                </div>
            </div>

            <?php echo CHtml::endForm(); ?>
            <!--
            </form>
            -->
        </div>
    </div>
    <!-- End of Read Journal Remarks  -->

    <!-- Agent / Suppliers List when [ or ] is pressed -->
    <div class = "modal fade" id = "agSuplist" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
            <!--
            <form action="" class="form-horizontal row-border">
            -->
            <?php
                echo CHtml::beginForm('', 'post', array(
                    'class' => 'form-horizontal row-border',
                    'name'  => '',
                ));
            ?>
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                    <h4 class = "modal-title" id = "myModalLabel">List Of <span id = "supHeadType"></span></h4>
                </div>
                <div class = "modal-body">
                    <div class = "row">
                        <div class = "col-md-6">
                            <table class = "table table-bordered agSuplistTable">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Business Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <div class = "modal-footer">

                    <button type = "button" class = "btn btn-default" data-dismiss = "modal">Ok</button>

                </div>
            </div>

            <?php echo CHtml::endForm(); ?>
            <!--
            </form>
            -->
        </div>
    </div>

    <div class = "modal fade" id = "agRateList" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
            <!--
            <form action="" class="form-horizontal row-border">
            -->
            <?php
                echo CHtml::beginForm('', 'post', array(
                    'class' => 'form-horizontal row-border',
                    'name'  => '',
                ));
            ?>
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                    <h4 class = "modal-title" id = "myModalLabel">List Of Rates</h4>
                </div>
                <div class = "modal-body">
                    <div class = "row">
                        <div class = "col-md-6">
                            <table class = "table table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Particular/Service</th>
                                        <th>Currency</th>
                                        <th>Rate</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <div class = "modal-footer">

                    <button type = "button" class = "btn btn-default" data-dismiss = "modal">Ok</button>

                </div>
            </div>

            <?php echo CHtml::endForm(); ?>
            <!--
            </form>
            -->
        </div>
    </div>

    <div class = "modal fade" id = "agTransportRateList" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
            <!--
            <form action="" class="form-horizontal row-border">
            -->
            <?php
                echo CHtml::beginForm('', 'post', array(
                    'class' => 'form-horizontal row-border',
                    'name'  => '',
                ));
            ?>
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                    <h4 class = "modal-title" id = "myModalLabel">List Of Rates</h4>
                </div>
                <div class = "modal-body">
                    <div class = "row">
                        <div class = "col-md-6">
                            <table class = "table table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Vehicle Type</th>
                                        <th>Vehicle No.</th>
                                        <th>Rate</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <div class = "modal-footer">

                    <button type = "button" class = "btn btn-default" data-dismiss = "modal">Ok</button>

                </div>
            </div>

            <?php echo CHtml::endForm(); ?>
            <!--
            </form>
            -->
        </div>
    </div>

    <div class = "modal fade" id = "agledgerList" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
            <!--
            <form action="" class="form-horizontal row-border">
            -->
            <?php
                echo CHtml::beginForm('', 'post', array(
                    'class' => 'form-horizontal row-border',
                    'name'  => '',
                ));
            ?>
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                    <h4 class = "modal-title" id = "myModalLabel">List Of Ledgers</h4>
                </div>
                <div class = "modal-body">
                    <div class = "row">
                        <div class = "col-md-6">
                            <table class = "table table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <div class = "modal-footer">

                    <button type = "button" class = "btn btn-default" data-dismiss = "modal">Ok</button>

                </div>
            </div>

            <?php echo CHtml::endForm(); ?>
            <!--
            </form>
            -->
        </div>
    </div>

    <div class = "modal fade" id = "agGroupList" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
            <!--
            <form action="" class="form-horizontal row-border">
            -->
            <?php
                echo CHtml::beginForm('', 'post', array(
                    'class' => 'form-horizontal row-border',
                    'name'  => '',
                ));
            ?>
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                    <h4 class = "modal-title" id = "myModalLabel">List Of Groups</h4>
                </div>
                <div class = "modal-body">
                    <div class = "row">
                        <div class = "col-md-6">
                            <table class = "table table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <div class = "modal-footer">

                    <button type = "button" class = "btn btn-default" data-dismiss = "modal">Ok</button>

                </div>
            </div>

            <?php echo CHtml::endForm(); ?>
            <!--
            </form>
            -->
        </div>
    </div>

    <div class = "modal fade" id = "agBillList" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
            <!--
            <form action="" class="form-horizontal row-border">
            -->
            <?php
                echo CHtml::beginForm('', 'post', array(
                    'class' => 'form-horizontal row-border',
                    'name'  => '',
                ));
            ?>
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                    <h4 class = "modal-title" id = "myModalLabel">List Of Bills</h4>
                </div>
                <div class = "modal-body">
                    <div class = "row">
                        <div class = "col-md-6">
                            <table class = "table table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Code</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <div class = "modal-footer">

                    <button type = "button" class = "btn btn-default" data-dismiss = "modal">Ok</button>

                </div>
            </div>

            <?php echo CHtml::endForm(); ?>
            <!--
            </form>
            -->
        </div>
    </div>

    <div class = "modal fade" id = "agPackageList" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
            <!--
            <form action="" class="form-horizontal row-border">
            -->
            <?php
                echo CHtml::beginForm('', 'post', array(
                    'class' => 'form-horizontal row-border',
                    'name'  => '',
                ));
            ?>
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                    <h4 class = "modal-title" id = "myModalLabel">List Of Packages</h4>
                </div>
                <div class = "modal-body">
                    <div class = "row">
                        <div class = "col-md-6">
                            <table class = "table table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Package Name</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <div class = "modal-footer">

                    <button type = "button" class = "btn btn-default" data-dismiss = "modal">Ok</button>

                </div>
            </div>

            <?php echo CHtml::endForm(); ?>
            <!--
            </form>
            -->
        </div>
    </div>

    <div class = "modal fade" id = "agCompanyList" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
            <!--
            <form action="" class="form-horizontal row-border">
            -->
            <?php
                echo CHtml::beginForm('', 'post', array(
                    'class' => 'form-horizontal row-border',
                    'name'  => '',
                ));
            ?>
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                    <h4 class = "modal-title" id = "myModalLabel">List Of Companies</h4>
                </div>
                <div class = "modal-body">
                    <div class = "row">
                        <div class = "col-md-6">
                            <table class = "table table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Company Name</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <div class = "modal-footer">

                    <button type = "button" class = "btn btn-default" data-dismiss = "modal">Ok</button>

                </div>
            </div>

            <?php echo CHtml::endForm(); ?>
            <!--
            </form>
            -->
        </div>
    </div>
    <!-- End of upgrade package -->

    <div class = "modal fade no-reset" id = "userNotes" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
            <!--
            <form action="" class="form-horizontal row-border">
            -->
            <?php
                echo CHtml::beginForm('', 'post', array(
                    'class' => 'form-horizontal row-border',
                    'name'  => '',
                ));
            ?>
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                    <h4 class = "modal-title" id = "myModalLabel">My Note</h4>
                </div>
                <div class = "modal-body">
                    <div class = "row">
                        <div class = "col-md-12">
                            <p class = "user_notes"><?php echo Misc::get_user('notes'); ?></p>
                        </div>
                    </div>
                </div>
                <div class = "modal-footer">
                    <button type = "button" class = "btn btn-default" data-dismiss = "modal">Ok</button>
                </div>
            </div>

            <?php echo CHtml::endForm(); ?>
            <!--
            </form>
            -->
        </div>
    </div>

    <div class = "printable-slips"></div>

    <!-- End Modals -->

    <script>
        $.ajaxSetup({
            data: {
                YII_CSRF_TOKEN: $('meta[name=csrf-token]').prop('content'),
            }
        });
    </script>

    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/js/jquery-ui.min.js" type = "text/javascript"></script>
    <!-- <script src="plugins/file-uploader/js/vendor/jquery.ui.widget.js"></script> -->
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/js/controls.js" type = "text/javascript"></script>
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/vendors/bootstrap/js/bootstrap.min.js" type = "text/javascript"></script>
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/js/common-script.js"></script>
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/js/jquery.slimscroll.min.js"></script>
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/js/fileinput.js" type = "text/javascript"></script>

    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/js/jquery.sparkline.js"></script>
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/js/sparkline-chart.js"></script>

    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/js/graph.js"></script>
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/js/edit-graph.js"></script>
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/kalendar/kalendar.js" type = "text/javascript"></script>
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/kalendar/edit-kalendar.js" type = "text/javascript"></script>

    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/sparkline/sparkline-chart.js"></script>
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/sparkline/jquery.sparkline.js" type = "text/javascript"></script>

    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/sparkline/jquery.customSelect.min.js"></script>
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/ckeditor 4.4.7_standard/ckeditor.js" type = "text/javascript"></script>

    <!-- J Notify -->

    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/noty-master/js/noty/packaged/jquery.noty.packaged.min.js" type = "text/javascript"></script>
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/noty-master/js/noty/themes/default.js" type = "text/javascript"></script>
    <!--
        <script type="text/javascript" src="<?php //echo Yii::app()->request->baseUrl;?>/assets/js/jquery.periodic.js" type="text/javascript"></script>-->

    <!--forms-->
    <script type = "text/javascript" src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/toggle-switch/toggles.min.js"></script>
    <script type = "text/javascript" src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/checkbox/zepto.js"></script>
    <script type = "text/javascript" src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/checkbox/icheck.js"></script>
    <script type = "text/javascript" src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/js/icheck-init.js"></script>
    <script type = "text/javascript" src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/js/icheck.js"></script>
    <script type = "text/javascript" src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type = "text/javascript" src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <script type = "text/javascript" src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
    <script type = "text/javascript" src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/bootstrap_dialog/js/bootstrap-dialog.min.js" type = "text/javascript"></script>
    <script type = "text/javascript" src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/js/form-components.js"></script>
    <script type = "text/javascript" src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/input-mask/jquery.inputmask.min.js"></script>
    <script type = "text/javascript" src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/input-mask/demo-mask.js"></script>
    <script type = "text/javascript" src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
    <script type = "text/javascript" src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/dropzone/dropzone.min.js"></script>
    <script type = "text/javascript" src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/ckeditor/ckeditor.js"></script>

    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/map/jquery-jvectormap-1.2.2.min.js"></script>
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/map/jquery-jvectormap-world-mill-en.js"></script>
    <!--        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script> -->
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/js/printelement.min.js" type = "text/javascript"></script>
    <!-- Datatables -->
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/data-tables/jquery.dataTables.js"></script>
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/data-tables/DT_bootstrap.js"></script>
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/JQuery-DataTables-Editable-1.3/media/js/jquery.jeditable.js" type = "text/javascript"></script>
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/JQuery-DataTables-Editable-1.3/media/js/jquery.dataTables.editable.js" type = "text/javascript"></script>
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/js/jquery.validate.min.js" type = "text/javascript"></script>
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/js/form-validation-rules.js" type = "text/javascript"></script>
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/data-tables/dynamic_table_init.js"></script>
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/demo-slider/demo-slider.js"></script>
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/knob/jquery.knob.min.js"></script>
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/js/jPushMenu.js"></script>
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/js/side-chats.js"></script>
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/js/jquery.slimscroll.min.js"></script>
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/scroll/jquery.nanoscroller.js"></script>

    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/jspdf/FileSaver.js"></script>
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/jspdf/libs/sprintf.js"></script>
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/jspdf/libs/base64.js"></script>
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/jspdf/jspdf.debug.js"></script>

    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/plugins/tag-it-master/js/tag-it.min.js" type = "text/javascript"></script>
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/js/moment.min.js" type = "text/javascript"></script>

    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/js/functions.js" type = "text/javascript"></script>
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/js/printable.js" type = "text/javascript"></script>
    <!--        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/ajaxSubmit.js" type="text/javascript"></script>-->
    <!--        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/editablescript.js" type="text/javascript"></script>-->
    <script src = "<?php echo Yii::app()->request->baseUrl; ?>/assets/vendors/jQuery-doubleScroll-master/jquery.doubleScroll.js" type = "text/javascript"></script>
    <script>

        <?php if (Yii::app()->controller->action->id == 'budget') { ?>
        budgeting();
        <?php } ?>

        //exportPdfSelector($('#navbar'), 'filename');

    </script>

</body>

</html>
