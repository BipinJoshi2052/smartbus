<?php

    /* @var $this \yii\web\View */
    /* @var $content string */

    use backend\assets\AppAsset;
    use yii\helpers\Html;

    AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang = "<?= Yii::$app->language ?>">
<head>
    <meta charset = "<?= Yii::$app->charset ?>">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?php echo Yii::$app->params['system_name'] ?> - <?= Html::encode($this->title) ?></title>
    <link rel = "shortcut icon" href = "<?php echo Yii::$app->request->baseUrl ?>/../common/assets/images/uploads/fav.png">
    <link href = "https://fonts.googleapis.com/css?family=Poppins:400,600" rel = "stylesheet">
    <link href = "<?php echo Yii::$app->request->baseUrl; ?>/../common/assets/css/margins-paddings.css" rel = "stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel = "stylesheet">
    <link rel = "stylesheet" href = "https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity = "sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin = "anonymous">

    <!-- All Form Addon CSS -->
    <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/form-addon.css" rel = "stylesheet">

    <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/spinners.css" rel = "stylesheet">
    <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/animate.css" rel = "stylesheet">

    <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/icons/material-design-iconic-font/css/materialdesignicons.min.css" rel = "stylesheet">

    <!-- summernotes CSS -->
    <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/summernote/dist/summernote.css" rel = "stylesheet"/>

    <!-- Custom CSS -->
    <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/style.css" rel = "stylesheet">

    <link href = "<?php echo Yii::$app->request->baseUrl; ?>/assets/css/overrides.css" rel = "stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// --><!--[if lt IE 9]>
    <script src = "https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src = "https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

    <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/jquery/jquery.min.js"></script>
    <script>
        var baseUrl = "<?php echo Yii::$app->request->baseUrl; ?>";
        var pop = "";
    </script>
    <?php if (Yii::$app->session->hasFlash('pop')) { ?>
        <script>
            pop = <?php echo Yii::$app->session->getFlash('pop'); ?>;
        </script>
    <?php } ?>
    <?php $this->head() ?>
</head>
<body class = "fix-header fix-sidebar card-no-border">
    <?php $this->beginBody() ?>
    <!--[if lt IE 8]>
    <p class = "browserupgrade">You are using an <strong>outdated</strong> browser. Please
        <a class = "dropdown-item" href = "http//browsehappy.com/">upgrade your browser</a>
        to improve your experience.
    </p><![endif]-->

    <div class = "preloader">
        <svg class = "circular" viewBox = "25 25 50 50">
            <circle class = "path" cx = "50" cy = "50" r = "20" fill = "none" stroke-width = "2" stroke-miterlimit = "10"/>
        </svg>
    </div>
    <div id = "main-wrapper">

        <header class = "topbar">
            <nav class = "navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class = "navbar-header">
                    <a class = "navbar-brand" href = "<?php echo Yii::$app->request->baseUrl; ?>">
                        <!-- Logo icon -->
                        <b>
                            <!-- Light Logo icon -->
                            <img src = "<?php echo Yii::$app->request->baseUrl ?>/../common/assets/images/uploads/logo-only.png" alt = "homepage" class = "logo-emblem"/>
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class = "d_inline_b">
                            <!-- Light Logo text -->
                            <img src = "<?php echo Yii::$app->request->baseUrl ?>/../common/assets/images/uploads/logo-text.png" class = "logo-text" alt = "homepage"/>
                        </span></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class = "navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class = "navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class = "nav-item">
                            <a class = "nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href = "javascript:void(0)">
                                <i class = "mdi mdi-menu"></i>
                            </a>
                        </li>
                        <li class = "nav-item">
                            <a class = "nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href = "javascript:void(0)">
                                <i class = "mdi mdi-menu"></i>
                            </a>
                        </li>
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class = "navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->

                        <li class = "nav-item">
                            <a class = "nav-link waves-effect waves-dark" href = "<?php echo Yii::$app->request->baseUrl; ?>/site/logout">
                                <i class = "mdi mdi-power"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>



        <div class = "page-wrapper">
            <nav class = "navbar navbar-expand-lg navbar-light bg-light">

                <ul class = "navbar-nav">
                    <li class = "nav-item dropdown">
                        <a href = "#" class = "nav-link dropdown-toggle" data-toggle = "dropdown" role = "button" aria-expanded = "false">Ledgers <span class = "caret"></span></a>
                        <ul class = "dropdown-menu" role = "menu">
                            <li>
                                <a class = "dropdown-item" href = "ledgers">Ledgers</a>
                            </li>
                            <li>
                                <a id = "cs" href = "#" data-target = "#mcah" data-toggle = "modal" class = "dropdown-item mb10">New Ledger</a>
                            </li>
                            <li>
                                <a class = "dropdown-item" href = "journals">View Journals</a>
                            </li>

                        </ul>
                    </li>
                    <li class = "nav-item dropdown">
                        <a href = "#" class = "nav-link dropdown-toggle" data-toggle = "dropdown" role = "button" aria-expanded = "false">Account<span class = "caret"></span></a>
                        <ul class = "dropdown-menu" role = "menu">
                            <li>
                                <a id = "jv" href = "#" data-target = "#journalVoucher" data-toggle = "modal" class = " dropdown-item mb10">Journal Voucher</a>
                            </li>
<!--                            <li>-->
<!--                                <a id = "jv" href = "#" data-target = "#journalVoucherMultiple" data-toggle = "modal" class = "dropdown-item mb10">Journal Voucher (Multiple)</a>-->
<!--                            </li>-->
                            <li>
                                <a id = "pv" href = "#" data-target = "#mpv" data-toggle = "modal" class = "dropdown-item mb10">Payment Voucher</a>
                            </li>
                            <!--                                    <li class="divider"></li>-->
                            <!--                                    <li class="dropdown-header">Transfers</li>-->
                            <!--                                    <li><a id="cona" href="#" data-target="#mcona" data-toggle="modal" class="mb10">Contra Account </a></li>-->
                            <!--
                                                        <li>
                                                            <a class = "dropdown-item" href = "advances">Advances</a>
                                                        </li>

                                                        <li>
                                                            <a class = "dropdown-item" href = "partyPayments">Party Payments</a>
                                                        </li>

                                                        <li>
                                                            <a id = "irs" href = "#" data-target = "#mirs" data-toggle = "modal" class = "dropdown-item mb10">Issue Receipt</a>
                                                        </li>
                                                        <li>
                                                            <a class = "dropdown-item" href = "bills">Bills</a>
                                                        </li>

                                                        <li>
                                                            <a id = "cs" href = "#" data-target = "#upgrade" data-toggle = "modal" class = "dropdown-item mb10">Payroll</a>
                                                        </li>
                                                        <li>
                                                            <a id = "cs" href = "#" data-target = "#upgrade" data-toggle = "modal" class = "mb10">Bank Reconciliation</a>
                                                        </li>

                                                        <li>
                                                            <a class = "dropdown-item" href = "accSettings">Tax & Currency</a>
                                                        </li>-->
                        </ul>
                    </li>

                    <li class = "nav-item dropdown">
                        <a href = "#" class = "nav-link dropdown-toggle" data-toggle = "dropdown" role = "button" aria-expanded = "false">Reports <span class = "caret"></span></a>
                        <ul class = "dropdown-menu" role = "menu">

                            <li>
                                <a class = "dropdown-item" href = "trialbalance">Trial Balance</a>
                            </li>
                            <li>
                                <a class = "dropdown-item" href = "trialbalance">Cash Flow</a>
                            </li>
                            <li>
                                <a class = "dropdown-item" href = "trialbalance">Balance Sheet</a>
                            </li>

                            <!--  <li>
                                  <a class = "dropdown-item" href = "soci"> Statement of Comprehensive Income</a>
                              </li>
                              <li>
                                  <a class = "dropdown-item" href = "sofp">Statement of Financial Position</a>
                              </li>

                              <li>
                                  <a id = "cs" href = "#" data-target = "#upgrade" data-toggle = "modal" class = "mb10">Payroll Report</a>
                              </li>-->

                        </ul>
                    </li>

                </ul>
            </nav>
            <!-- Page -->
            <?= $content ?>
            <!-- End Page -->

            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class = "footer">
                <?php echo Yii::$app->params['system_name'] ?>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
    </div>

    <!--  Various Modals  -->
    <!-- Create Cash Register-->
    <div class = "modal fade" id = "mnr" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
            <!--
            <form action="" class="form-horizontal row-border" name="CashRegister">
            -->

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
                                            <a class = "dropdown-item" href = "#" title = "remove">X</a>
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
                                            <a class = "dropdown-item" href = "#" title = "remove">X</a>
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
                                            <a class = "dropdown-item" href = "#" title = "remove">X</a>
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
                                            <a class = "dropdown-item" href = "#" title = "remove">X</a>
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

            <!--
            </form>
            -->
        </div>
    </div>
    <!-- End Create Voucher -->
    <!-- Receipts  -->
    <div class = "modal fade" id = "mirs" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
            <!--
            <form action="" class="form-horizontal row-border">
            -->

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
                        <span class = "pull-right">Issued By : </span>
                    </p>
                </div>
                <div class = "modal-footer">
                    <button type = "submit" class = "btn btn-success" data-post = "issueReceipt">Issue & Print</button>
                    <button type = "reset" class = "btn btn-default" data-dismiss = "modal">Discard</button>
                </div>
            </div>

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

            <!--
            </form>
            -->
        </div>
    </div>
    <!--End View Ledgers-->

    <!-- View Journal Entry-->
    <div class = "modal fade" id = "mvje" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" data-backdrop = "static">
        <div class = "modal-dialog">
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

        </div>
    </div>
    <!--End View Journal Entry-->

    <!-- CSRF TOKEN -->
    <script>
        $.ajaxSetup({
            data: {
                _csrf: $('meta[name=csrf-token]').prop('content')
            }
        });
    </script>

    <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/plugins.min.js"></script>
    <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/moments/moments.js"></script>
    <script src = "<?php echo Yii::$app->request->baseUrl; ?>/../common/assets/vendor/notify/bootstrap-notify.min.js"></script>

    <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/form-plugins.js"></script>
    <!--    <script src = "--><?php //echo Yii::$app->request->baseUrl; ?><!--/assets/icons/material-design-iconic-font/material-icons-list-json.json"></script>-->
    <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/form-validation-rules.js"></script>
    <?php if (Yii::$app->controller->id == 'admin' && Yii::$app->controller->action->id == 'index') : ?>
        <script src = "<?php echo Yii::$app->request->baseUrl; ?> /assets/plugins/chartjs/chart.min.js"></script>
    <?php endif; ?>
    <?php //\common\components\Misc::setFlash('danger', 'sadfasdfas');
        if (Yii::$app->session->hasFlash('flash')): ?>
            <script>
                var flash = <?php echo Yii::$app->session->getFlash('flash'); ?>;
                $.notify({
                    // options
                    message: flash.message
                }, {
                    // settings
                    type: flash.type,
                    allow_dismiss: true,

                    newest_on_top: true,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                    delay: 0,
                    timer: 1000,
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    },
                    template: '<div data-notify="container" class="notify_container alert alert-{0}" role="alert">' +
                    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                    '<span class="data-notify-message" data-notify="message">{2}</span>' +
                    '</div>'
                });
            </script>
        <?php endif; ?>
    <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/plugins/summernote/dist/summernote.min.js"></script>
    <!--Custom JavaScript -->
    <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/base-functions.js"></script>
    <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/main.js"></script>
    <script src = "<?php echo Yii::$app->request->baseUrl; ?>/assets/js/custom.js"></script>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
