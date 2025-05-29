<!doctype html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="http://localhost/course-crm/public/admin-assets/assets/" data-template="vertical-menu-template" data-style="light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Dashboard</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="http://localhost/course-crm/public/admin-assets/assets/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />
    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/vendor/fonts/flag-icons.css" />
    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/css/demo.css" />
    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/swiper/swiper.css" />
    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />
    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="http://localhost/course-crm/public/admin-assets/assets/vendor/css/pages/cards-advance.css" />
    <script src="http://localhost/course-crm/public/admin-assets/assets/vendor/js/helpers.js"></script>
    <script src="http://localhost/course-crm/public/admin-assets/assets/vendor/js/template-customizer.js"></script>
    <script src="http://localhost/course-crm/public/admin-assets/assets/js/config.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <style>
        .app-brand-logo.demo {
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-pack: center;
            justify-content: center;
            display: -ms-flexbox;
            display: flex;
            width: 180px;
            height: 68px;
        }
        .dark-style .menu .app-brand.demo {
            height: 120px;
        }
        .light-style .menu .app-brand.demo {
            height: 80px;
        }
    </style>
</head>
<body>
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
       <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="#" class="app-brand-link">
                    <span class="app-brand-logo demo">
                        <img src="{{ asset('public/assets/img/logo.png')}}" alt="Project logo" width="100%" height="height: auto;" />
                    </span>
                </a>
                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                    <i class="ti menu-toggle-icon d-none d-xl-block align-middle"></i>
                    <i class="ti ti-x d-block d-xl-none ti-md align-middle"></i>
                </a>
            </div>
            <div class="menu-inner-shadow"></div>
            <ul class="menu-inner py-1">
                <li class="menu-item">
                    <a href="{{ route('dashboard.index') }}" class="menu-link">
                        <i class="ti ti-home-2 me-2"></i>
                        <div data-i18n="Dashboard">Dashboard</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('user-management') }}" class="menu-link">
                        <i class="ti ti-users me-2"></i>
                        <div data-i18n="User Management">User Management</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('prospects.index') }}" class="menu-link">
                        <i class="ti ti-user-search me-2"></i>
                        <div data-i18n="Prospects">Prospects</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('leads.index') }}" class="menu-link">
                        <i class="ti ti-user-plus me-2"></i>
                        <div data-i18n="Leads">Leads</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('deals.index') }}" class="menu-link">
                        <i class="ti ti-briefcase me-2"></i>
                        <div data-i18n="Deals">Deals</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('calendar.index') }}" class="menu-link">
                        <i class="ti ti-calendar me-2"></i>
                        <div data-i18n="Calendar">Calendar</div>
                    </a>
                </li>
            </ul>
        </aside>
        <div class="layout-page">
            <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="ti ti-menu-2 ti-md"></i>
                    </a>
                </div>
                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <div class="navbar-nav align-items-center">
                        <div class="nav-item navbar-search-wrapper mb-0">
                            <a class="nav-item nav-link search-toggler d-flex align-items-center px-0" href="javascript:void(0);">
                                <i class="ti ti-search ti-md me-2 me-lg-4 ti-lg"></i>
                                <span class="d-none d-md-inline-block text-muted fw-normal">Search (Ctrl+/)</span>
                            </a>
                        </div>
                    </div>
                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="http://localhost/course-crm/public/admin-assets/assets/img/avatars/1.png" alt class="rounded-circle" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item mt-0" href="">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-2">
                                                <div class="avatar avatar-online">
                                                    <img src="http://localhost/course-crm/public/admin-assets/assets/img/avatars/1.png" alt class="rounded-circle" />
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <div class="d-grid px-2 pt-2 pb-1">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <button class="btn btn-sm btn-danger d-flex" type="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <small class="align-middle">Logout</small>
                                        <i class="ti ti-logout ms-2 ti-14px"></i>
                                    </button>
                                </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">
                    @yield('content')
                </div>
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl">
                        <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                        </div>
                    </div>
                </footer>
                <div class="content-backdrop fade"></div>
            </div>
        </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
    <div class="drag-target"></div>
</div>
<script src="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/jquery/jquery.js"></script>
<script src="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/popper/popper.js"></script>
<script src="http://localhost/course-crm/public/admin-assets/assets/vendor/js/bootstrap.js"></script>
<script src="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/node-waves/node-waves.js"></script>
<script src="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/hammer/hammer.js"></script>
<script src="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/i18n/i18n.js"></script>
<script src="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="http://localhost/course-crm/public/admin-assets/assets/vendor/js/menu.js"></script>
<script src="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/swiper/swiper.js"></script>
<script src="http://localhost/course-crm/public/admin-assets/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="http://localhost/course-crm/public/admin-assets/assets/js/tables-datatables-basic.js"></script>
<script src="http://localhost/course-crm/public/admin-assets/assets/js/main.js"></script>
<script src="http://localhost/course-crm/public/admin-assets/assets/js/pages-auth-multisteps.js"></script>
<script src="http://localhost/course-crm/public/admin-assets/assets/js/dashboards-analytics.js"></script>
</body>
</html>