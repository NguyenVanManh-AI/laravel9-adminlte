<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard/overview" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" data-nav="Dashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/dashboard/overview" data-nav="overview" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/overview" data-nav="overview1" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Dashboard v2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/overview" data-nav="overview2" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Dashboard v3</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/widgets" data-nav="widgets" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Widgets
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" data-nav="Layout Options" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Layout Options
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">6</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/layout/top-nav.html" data-nav="Top Navigation" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Top Navigation</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/top-nav-sidebar.html" data-nav="Top Navigation + Sidebar" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Top Navigation + Sidebar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/boxed.html" data-nav="Boxed" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Boxed</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/fixed-sidebar.html" data-nav="Fixed Sidebar" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Fixed Sidebar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/fixed-sidebar-custom.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Fixed Sidebar <small>+ Custom Area</small></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/fixed-topnav.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Fixed Navbar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/fixed-footer.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Fixed Footer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/collapsed-sidebar.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Collapsed Sidebar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" data-nav="" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Charts
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/dashboard/charts/chartjs" data-nav="charts/chartjs" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>ChartJS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/charts/flot" data-nav="charts/flot" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Flot</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/charts/inline" data-nav="charts/inline" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Inline</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/charts/uplot" data-nav="charts/uplot" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>uPlot</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" data-nav="" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            UI Elements
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/dashboard/ui/general" data-nav="ui/general" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>General</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/ui/icons" data-nav="ui/icons" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Icons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/ui/buttons" data-nav="ui/buttons" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Buttons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/ui/sliders" data-nav="ui/sliders" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Sliders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/ui/modals" data-nav="ui/modals" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Modals & Alerts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/ui/navbar" data-nav="ui/navbar" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Navbar & Tabs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/ui/timeline" data-nav="ui/timeline" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Timeline</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/ui/ribbons" data-nav="ui/ribbons" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Ribbons</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" data-nav="" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Forms
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/forms/general.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>General Elements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/forms/advanced.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Advanced Elements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/forms/editors.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Editors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/forms/validation.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Validation</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" data-nav="" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Tables
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/tables/simple.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Simple Tables</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/tables/data.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>DataTables</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/tables/jsgrid.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>jsGrid</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">EXAMPLES</li>
                <li class="nav-item">
                    <a href="/dashboard/calendar" data-nav="calendar" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Calendar
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/gallery" data-nav="gallery" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Gallery
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/kanban" data-nav="kanban" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Kanban Board
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" data-nav="" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Mailbox
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Inbox</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/compose.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Compose</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/read-mail.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Read</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" data-nav="" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Pages
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/examples/invoice.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Invoice</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/profile.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/e-commerce.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>E-commerce</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/projects.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Projects</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/project-add.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Project Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/project-edit.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Project Edit</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/project-detail.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Project Detail</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/contacts.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Contacts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/faq.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>FAQ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/contact-us.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Contact us</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" data-nav="" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Extras
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>
                                    Login & Register v1
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/examples/login.html" data-nav="" class="nav-link">
                                        <i class="far fa-circle nav-icon nav-circle"></i>
                                        <p>Login v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/examples/register.html" data-nav="" class="nav-link">
                                        <i class="far fa-circle nav-icon nav-circle"></i>
                                        <p>Register v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/examples/forgot-password.html" data-nav="" class="nav-link">
                                        <i class="far fa-circle nav-icon nav-circle"></i>
                                        <p>Forgot Password v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/examples/recover-password.html" data-nav="" class="nav-link">
                                        <i class="far fa-circle nav-icon nav-circle"></i>
                                        <p>Recover Password v1</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>
                                    Login & Register v2
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/examples/login-v2.html" data-nav="" class="nav-link">
                                        <i class="far fa-circle nav-icon nav-circle"></i>
                                        <p>Login v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/examples/register-v2.html" data-nav="" class="nav-link">
                                        <i class="far fa-circle nav-icon nav-circle"></i>
                                        <p>Register v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/examples/forgot-password-v2.html" data-nav="" class="nav-link">
                                        <i class="far fa-circle nav-icon nav-circle"></i>
                                        <p>Forgot Password v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/examples/recover-password-v2.html" data-nav=""
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon nav-circle"></i>
                                        <p>Recover Password v2</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/lockscreen.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Lockscreen</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/legacy-user-menu.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Legacy User Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/language-menu.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Language Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/404.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Error 404</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/500.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Error 500</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/pace.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Pace</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/blank.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Blank Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="starter.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Starter Page</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" data-nav="" class="nav-link">
                        <i class="nav-icon fas fa-search"></i>
                        <p>
                            Search
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/search/simple.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Simple Search</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/search/enhanced.html" data-nav="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Enhanced</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">MISCELLANEOUS</li>
                <li class="nav-item">
                    <a href="iframe.html" data-nav="" class="nav-link">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>Tabbed IFrame Plugin</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://adminlte.io/docs/3.1/" data-nav="" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Documentation</p>
                    </a>
                </li>
                <li class="nav-header">MULTI LEVEL EXAMPLE</li>
                <li class="nav-item">
                    <a href="#level1.1" data-nav="Level 1.1" class="nav-link">
                        <i class="far fa-circle nav-icon nav-circle"></i>
                        <p>Level 1.1</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#level1.2" data-nav="Level 1.2" class="nav-link">
                        <i class="nav-icon far fa-circle nav-circle"></i>
                        <p>
                            Level 1.2
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#level2.1" data-nav="Level 2.1" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Level 2.1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#level2.2" data-nav="Level 2.2" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>
                                    Level 2.2
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#level3.1" data-nav="Level 3.1" class="nav-link">
                                        <i class="far fa-circle nav-icon nav-circle"></i>
                                        <p>Level 3.1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#level3.2" data-nav="Level 3.2" class="nav-link">
                                        <i class="far fa-circle nav-icon nav-circle"></i>
                                        <p>Level 3.2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#level3.3" data-nav="Level 3.3" class="nav-link">
                                        <i class="far fa-circle nav-icon nav-circle"></i>
                                        <p>
                                            Level 3.3
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="#" data-nav="Level 4.1" class="nav-link">
                                                <i class="far fa-circle nav-icon nav-circle"></i>
                                                <p>Level 4.1</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" data-nav="Level 4.2" class="nav-link">
                                                <i class="far fa-circle nav-icon nav-circle"></i>
                                                <p>Level 4.2</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" data-nav="Level 4.3" class="nav-link">
                                                <i class="far fa-circle nav-icon nav-circle"></i>
                                                <p>Level 4.3</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" data-nav="Level 3.4" class="nav-link">
                                        <i class="far fa-circle nav-icon nav-circle"></i>
                                        <p>Level 3.4</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" data-nav="Level 2.3" class="nav-link">
                                <i class="far fa-circle nav-icon nav-circle"></i>
                                <p>Level 2.3</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" data-nav="Level 1.3" class="nav-link">
                        <i class="far fa-circle nav-icon nav-circle"></i>
                        <p>Level 1.3</p>
                    </a>
                </li>
                <li class="nav-header">LABELS</li>
                <li class="nav-item">
                    <a href="#" data-nav="" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Important</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" data-nav="" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>Warning</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" data-nav="" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Informational</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script>

    var basePath = "/dashboard/";
    var pathBehindDashboard = window.location.pathname.substring(basePath.length);

    // Kiểm tra xem có giá trị được lưu trong Local Storage không
    // var selectedNav = localStorage.getItem('selectedNav');
    var selectedNav = pathBehindDashboard;
    if (selectedNav) {
        // Tìm nav-link có data-nav giống với giá trị được lưu và thêm class 'active'
        var $selectedNavLink = $('.nav-link[data-nav="' + selectedNav + '"]');
        $selectedNavLink.addClass('active');

        // Thêm class 'active' cho tất cả các cấp cha
        $selectedNavLink.parents('.nav-item').children('a').addClass('active');

        // Thêm class cho mở rộng menu
        $selectedNavLink.parents('.nav-item').addClass('menu-is-opening menu-open');

        // Sử dụng .css() để thay đổi thuộc tính CSS
        $selectedNavLink.parents('.nav-item').children('ul').css('display', 'block');

        // Xóa class 'fa-dot-circle' từ tất cả các thẻ i nằm trong thẻ nav-link 
        if ($('.nav-link i.nav-circle').hasClass('fa-dot-circle')) {
            $('.nav-link i.nav-circle').removeClass('fa-dot-circle').addClass('fa-circle');
        }
        $selectedNavLink.find('i.nav-circle').removeClass('fa-circle').addClass('fa-dot-circle');
        $selectedNavLink.parents('.nav-item').children('a').find('i.nav-circle').removeClass('fa-circle').addClass('fa-dot-circle');

        // $('.nav-link i').toggleClass('fa-dot-circle fa-circle');
        // $selectedNavLink.find('i.nav-icon').toggleClass('fa-dot-circle fa-circle');
        // $selectedNavLink.parents('.nav-item').find('i.nav-icon').toggleClass('fa-dot-circle fa-circle');
    }

    $(document).ready(function() {
        $('.nav-link').on('click', function(event) {
            // Ngăn chặn hành vi mặc định của liên kết
            event.preventDefault();

            // Lấy giá trị từ thuộc tính data-nav
            var navValue = $(this).data('nav');

            // Lưu giá trị vào Local Storage
            // localStorage.setItem('selectedNav', navValue); ///+++

            // Xóa class 'active' từ tất cả các nav-link khác
            $('.nav-link').removeClass('active');

            // Thêm class 'active' vào nav-link được chọn
            $(this).addClass('active');

            $(this).parents('.nav-item').children('a').addClass('active');

            // Xóa class 'fa-dot-circle' từ tất cả các thẻ i nằm trong thẻ nav-link 
            if ($('.nav-link i.nav-circle').hasClass('fa-dot-circle')) {
                $('.nav-link i.nav-circle').removeClass('fa-dot-circle').addClass('fa-circle');
            }
            $(this).find('i.nav-circle').removeClass('fa-circle').addClass('fa-dot-circle');
            $(this).parents('.nav-item').children('a').find('i.nav-circle').removeClass('fa-circle').addClass('fa-dot-circle');

            // Chuyển hướng đến liên kết sau khi thực hiện xong
            window.location.href = $(this).attr('href');
        });
    });
</script>
