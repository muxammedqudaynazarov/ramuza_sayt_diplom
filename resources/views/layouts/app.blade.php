<!DOCTYPE html>
<html lang="kaa">
<head>
    <meta charset="utf-8"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>C-Monitoring KarSU sisteması</title>
    <meta name="description" content=""/>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
          class="template-customizer-theme-css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}"/>
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>
<body>
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="pt-4 demo text-center h4">
                <a href="{{ url('/') }}">
                    C-Monitoring
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <li class="menu-item @if(Request::is('dashboard/files/create')) active @endif">
                    <a href="{{ route('files.create') }}" class="menu-link text-dark border">
                        <i class="menu-icon tf-icons bx bx-upload"></i>
                        <div data-i18n="Resurs kiritiw">Resurs kiritiw</div>
                    </a>
                </li>

                <li class="menu-item @if(Request::is('dashboard')) active @endif">
                    <a href="{{ url('/dashboard') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home"></i>
                        <div data-i18n="Meniń panelim">Meniń panelim</div>
                    </a>
                </li>

                @php
                    $is_false = false;
                    if (Request::is('dashboard/files/s') || Request::is('dashboard/files/a') || Request::is('dashboard/files/d'))
                        $is_false = true;
                @endphp

                <li class="menu-item @if($is_false) open @endif">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-detail"></i>
                        <div data-i18n="Hújjetler">Hújjetler</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item @if(Request::is('dashboard/files/s')) active @endif">
                            <a href="{{ url('/dashboard/files/s') }}" class="menu-link">
                                <div data-i18n="Jiberilgenler">Jiberilgenler</div>
                            </a>
                        </li>
                        <li class="menu-item @if(Request::is('dashboard/files/a')) active @endif">
                            <a href="{{ url('/dashboard/files/a') }}" class="menu-link">
                                <div data-i18n="Qabıl etilgenler">Qabıl etilgenler</div>
                            </a>
                        </li>
                        <li class="menu-item @if(Request::is('dashboard/files/d')) active @endif">
                            <a href="{{ url('/dashboard/files/d') }}" class="menu-link">
                                <div data-i18n="Biykarlanǵanlar">Biykarlanǵanlar</div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Servisler</span>
                </li>
                <li class="menu-item @if(Request::is('dashboard/archive')) active @endif">
                    <a href="{{ route('archive.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-box"></i>
                        <div data-i18n="Arxiv">Arxiv</div>
                    </a>
                </li>

                <li class="menu-item @if(Request::is('dashboard/antiplag')) active @endif">
                    <a href="{{ url('/dashboard/antiplag') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-badge-check"></i>
                        <div data-i18n="Antiplagiat sisteması">Antiplagiat sisteması</div>
                    </a>
                </li>

                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Sazlamalar</span>
                </li>
                <li class="menu-item @if(Request::is('dashboard/options')) active @endif">
                    <a href="{{ url('/options') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-cog"></i>
                        <div data-i18n="Profil">Profil</div>
                    </a>
                </li>

                <li class="menu-item @if(Request::is('dashboard')) active @endif">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <a href="javascript:void(0);" class="menu-link"
                           onclick="event.preventDefault();this.closest('form').submit();">
                            <i class="menu-icon tf-icons bx bx-power-off text-danger"></i>
                            <div data-i18n="Shıǵıw" class="text-danger">Shıǵıw</div>
                        </a>
                    </form>
                </li>
            </ul>
        </aside>
        <div class="layout-page">
            {{--<nav
                class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <div class="navbar-nav align-items-center">
                        <div class="nav-item d-flex align-items-center">
                            <i class="bx bx-search fs-4 lh-0"></i>
                            <input
                                type="text"
                                class="form-control border-0 shadow-none"
                                placeholder="Izlew..."
                                aria-label="Izlew..."
                            />
                        </div>
                    </div>
                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        --}}{{--<li class="nav-item lh-1 me-3">
                            <a
                                class="github-button"
                                href="https://github.com/themeselection/sneat-html-admin-template-free"
                                data-icon="octicon-star"
                                data-size="large"
                                data-show-count="true"
                                aria-label="Star themeselection/sneat-html-admin-template-free on GitHub">Star</a>
                        </li>--}}{{--
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                               data-bs-toggle="dropdown">
                                <div class="avatar">
                                    <img src="{{ asset('assets/img/avatars/1.png') }}" alt
                                         class="w-px-40 h-auto rounded-circle"/>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="../assets/img/avatars/1.png" alt
                                                         class="w-px-40 h-auto rounded-circle"/>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block">John Doe</span>
                                                <small class="text-muted">Admin</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bx bx-cog me-2"></i>
                                        <span class="align-middle">Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="auth-login-basic.html">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>--}}

            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">
                    @yield('content')
                </div>
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">
                            ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                        </div>
                        <div>
                            <a href="" class="footer-link me-4" target="_blank">
                                Sistema haqqında
                            </a>
                            <a href="" class="footer-link me-4" target="_blank">
                                Pikir bildiriw
                            </a>
                            <a href="" class="footer-link me-4" target="_blank">
                                Baylanısıw ushın
                            </a>
                        </div>
                    </div>
                </footer>
                <div class="content-backdrop fade"></div>
            </div>
        </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
</div>

<script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>
