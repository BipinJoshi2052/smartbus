<div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">


            <!-- SAMPLE //// -->
            <li class="d_none"><a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false"><i class="mdi mdi-arrange-send-backward"></i><span class="hide-menu">Multi level dd</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="javascript:void(0);">item 1.1</a></li>
                    <li><a href="javascript:void(0);">item 1.2</a></li>
                    <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">Menu 1.3</a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="javascript:void(0);">item 1.3.1</a></li>
                            <li><a href="javascript:void(0);">item 1.3.2</a></li>
                            <li><a href="javascript:void(0);">item 1.3.3</a></li>
                            <li><a href="javascript:void(0);">item 1.3.4</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);">item 1.4</a></li>
                </ul>
            </li>
            <!-- //// SAMPLE -->


            <li class="<?= (Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index') ? 'active' : '' ?>">
                <a class="waves-effect waves-dark" href="<?= Yii::$app->request->baseUrl; ?>/" aria-expanded="false">
                    <i class="mdi mdi-drag"></i>
                    <span class="hide-menu">Dashboard</span></a>
            </li>


            <li class="nav-divider"></li>

            <li class="<?= (Yii::$app->controller->id == 'pos' && Yii::$app->controller->action->id == 'index') ? 'active' : '' ?>">
                <a class="waves-effect waves-dark" href="<?= Yii::$app->request->baseUrl; ?>/pos" aria-expanded="false">
                    <i class="mdi mdi-cash-multiple"></i>
                    <span class="hide-menu">Sales Counter</span></a>
            </li>

            <li class="nav-divider"></li>
            <li class="nav-small-cap">Booking Management</li>
            <li>
                <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
                    <i class="mdi mdi-arrange-send-backward"></i>
                    <span class="hide-menu">Bookings</span>
                </a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="<?= Yii::$app->request->baseUrl; ?>/bookings/today">Today</a></li>
                    <li><a href="<?= Yii::$app->request->baseUrl; ?>/bookings">All Bookings</a></li>
                    <li><a href="<?= Yii::$app->request->baseUrl; ?>/bookings/old">Expired Bookings</a></li>
                    <li><a href="<?= Yii::$app->request->baseUrl; ?>/bookings/cancelled">Cancelled Bookings</a></li>

                </ul>
            </li>

            <li class="nav-divider"></li>
            <li class="nav-small-cap">Schedule Management</li>
            <li><a href="<?= Yii::$app->request->baseUrl; ?>/schedules/create"> <i class="mdi mdi-plus"></i><span class="hide-menu">New Schedule</span></a></li>

            <li>
                <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
                    <i class="mdi mdi-transit-connection-variant"></i>
                    <span class="hide-menu">Schedules</span>
                </a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="<?= Yii::$app->request->baseUrl; ?>/schedules/today">Departing Today</a></li>
                    <li><a href="<?= Yii::$app->request->baseUrl; ?>/schedules/">Active</a></li>
                    <li><a href="<?= Yii::$app->request->baseUrl; ?>/schedules/old">Expired</a></li>
                    <li><a href="<?= Yii::$app->request->baseUrl; ?>/schedules/cancelled">Cancelled</a></li>
                </ul>
            </li>

            <li class="nav-divider"></li>
            <li class="nav-small-cap">Vehicle Management</li>
            <li><a href="<?= Yii::$app->request->baseUrl; ?>/vehicles/create"> <i class="mdi mdi-plus"></i><span class="hide-menu">New Vehicle</span></a></li>
            <li>

                <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
                    <i class="mdi mdi-bus"></i>
                    <span class="hide-menu">Vehicles</span>
                </a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="<?= Yii::$app->request->baseUrl; ?>/vehicles/add">Add a Vehicle</a></li>
                    <li><a href="<?= Yii::$app->request->baseUrl; ?>/vehicles">View all Vehicle</a></li>
                    <li class="nav-divider"></li>
                </ul>
            </li>
            <li class="nav-divider"></li>
            <li class="nav-small-cap">Miscellaneous</li>
            <li><a href="<?= Yii::$app->request->baseUrl; ?>/amenities"> <i class="mdi mdi-arrange-send-backward"></i><span class="hide-menu">Amenities</span></a></li>
            <li><a href="<?= Yii::$app->request->baseUrl; ?>/vehicles/types"> <i class="mdi mdi-arrange-send-backward"></i><span class="hide-menu">Vehicle Types</span></a></li>
            <li><a href="<?= Yii::$app->request->baseUrl; ?>/locations"> <i class="mdi mdi-map-marker"></i><span class="hide-menu">Locations</span></a></li>


            <li class="nav-divider"></li>
            <li class="nav-small-cap">User Management</li>
            <li>
                <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
                    <i class="mdi mdi-account-multiple"></i>
                    <span class="hide-menu">Users</span>
                </a>
                <ul aria-expanded="false" class="collapse">
                    <?php foreach (Yii::$app->params['role_num'] as $k => $v): ?>
                        <li class="<?= (Yii::$app->controller->id == 'users' && Yii::$app->controller->action->id == $k) ? 'active' : '' ?>">
                            <a class="waves-effect waves-dark" href="<?= Yii::$app->request->baseUrl; ?>/users/type/<?= $k ?>" aria-expanded="false">
                                <i class="mdi mdi-album"></i>
                                <span class="hide-menu"><?= ucwords($k) ?>s</span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <li>
                <a class="waves-effect waves-dark" href="<?= Yii::$app->request->baseUrl ?>/permissions" aria-expanded="false">
                    <i class="mdi mdi-lock"></i>
                    <span class="hide-menu">Access Control</span>
                </a>

            </li>

            <li class="nav-divider"></li>
            <li <?= (Yii::$app->controller->id == 'accounts' && Yii::$app->controller->action->id == 'index') ? 'active' : '' ?>>
                <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
                    <i class="mdi mdi-calculator-variant"></i>
                    <span class="hide-menu">Accounts</span>
                </a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="<?= Yii::$app->request->baseUrl; ?>/accounts">Overview</a></li>
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
                            <span class="hide-menu">Reports</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?= Yii::$app->request->baseUrl; ?>/accounts/reports/">Trial Balance</a></li>
                            <li><a href="<?= Yii::$app->request->baseUrl; ?>/accounts/reports/">Cash Flow</a></li>
                            <li><a href="<?= Yii::$app->request->baseUrl; ?>/accounts/reports/">SOCI</a></li>
                            <li><a href="<?= Yii::$app->request->baseUrl; ?>/accounts/reports/">SOFP</a></li>
                            <li><a href="<?= Yii::$app->request->baseUrl; ?>/accounts/reports/">Margin Report</a></li>
                        </ul>
                    </li>

                    <li><a href="<?= Yii::$app->request->baseUrl; ?>/accounts/settings">Settings</a></li>

                </ul>
            </li>
            <li class="nav-divider"></li>
            <li class="nav-small-cap">Website Management</li>

            <li>
                <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
                    <i class="mdi mdi-arrange-send-backward"></i>
                    <span class="hide-menu">Content</span>
                </a>
                <ul aria-expanded="false" class="collapse">
                    <li class="<?= (Yii::$app->controller->id == 'slider' && Yii::$app->controller->action->id == 'index') ? 'active' : '' ?>">
                        <a class="waves-effect waves-dark" href="<?= Yii::$app->request->baseUrl; ?>/slider/" aria-expanded="false">
                            <span class="hide-menu">Slider</span>
                        </a>
                    </li>
                    <li class="<?= (Yii::$app->controller->id == 'clients' && Yii::$app->controller->action->id == 'index') ? 'active' : '' ?>">
                        <a class="waves-effect waves-dark" href="<?= Yii::$app->request->baseUrl; ?>/clients/" aria-expanded="false">
                            <span class="hide-menu">Clients</span>
                        </a>
                    </li>
                    <li class="<?= (Yii::$app->controller->id == 'testimonials' && Yii::$app->controller->action->id == 'index') ? 'active' : '' ?>">
                        <a class="waves-effect waves-dark" href="<?= Yii::$app->request->baseUrl; ?>/testimonials/" aria-expanded="false">
                            <span class="hide-menu">Testimonials</span>
                        </a>
                    </li>
                    <li class="<?= (Yii::$app->controller->id == 'faq' && Yii::$app->controller->action->id == 'index') ? 'active' : '' ?>">
                        <a class="waves-effect waves-dark" href="<?= Yii::$app->request->baseUrl; ?>/faq/" aria-expanded="false">
                            <span class="hide-menu">FAQ</span>
                        </a>
                    </li>
                    <li class="<?= (Yii::$app->controller->id == 'terms' && Yii::$app->controller->action->id == 'index') ? 'active' : '' ?>">
                        <a class="waves-effect waves-dark" href="<?= Yii::$app->request->baseUrl; ?>/terms/" aria-expanded="false">
                            <span class="hide-menu">Terms & Conditions</span>
                        </a>
                    </li>
                    <li class="<?= (Yii::$app->controller->id == 'blog' && Yii::$app->controller->action->id == 'index') ? 'active' : '' ?>">
                        <a class="waves-effect waves-dark" href="<?= Yii::$app->request->baseUrl; ?>/blog/" aria-expanded="false">
                            <span class="hide-menu">Blog</span>
                        </a>
                    </li>
                    <li class="<?= (Yii::$app->controller->id == 'blog' && Yii::$app->controller->action->id == 'index') ? 'active' : '' ?>">
                        <a class="waves-effect waves-dark" href="<?= Yii::$app->request->baseUrl; ?>/News/" aria-expanded="false">
                            <span class="hide-menu">News</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
                    <i class="mdi mdi-arrange-send-backward"></i>
                    <span class="hide-menu">Pages</span>
                </a>
                <ul aria-expanded="false" class="collapse">
                    <?php foreach (Yii::$app->params['pages'] as $key => $page): ?>
                        <li class="<?= (Yii::$app->controller->id == 'sections' && Yii::$app->controller->action->id == 'pages/' . $key) ? 'active' : '' ?>">
                            <a class="waves-effect waves-dark" href="<?= Yii::$app->request->baseUrl; ?>/sections/pages/<?= $key; ?>" aria-expanded="false"><?= ucwords($key); ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>

            <li class="nav-divider"></li>
            <li class="nav-small-cap">Settings</li>
            <li>
                <a href="<?= Yii::$app->request->baseUrl; ?>/settings"> <i class="mdi mdi-settings"></i><span class="hide-menu">Settings</span></a>
            </li>

        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>