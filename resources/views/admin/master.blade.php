@php
    use App\Models\Service;
    use App\Models\BookingNotification;
    $services = Service::all();
    $notification = BookingNotification::with('user')->get();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ghargharma Doctor @yield('title')</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('full/assets/css/all.min.css') }}" rel="stylesheet" type="text/css">

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css"> --}}

    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{ asset('global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('full/assets/js/app.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/dashboard.js') }}"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/blue-logo.png') }}">
    <link rel="stylesheet" href="{{ asset('global_assets/summernote/summernote-bs4.min.css') }}">

    <!-- /theme JS files -->
    <script src="{{ asset('global_assets/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('global_assets/datatables/extensions/buttons.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/form_multiselect.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/bootstrap_multiselect.js') }}"></script>
    <script src="{{ asset('global_assets/datatables/datatables_extension_colvis.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('global_assets/leaflet/leaflet.css') }}" />
    @yield('custom-style')
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body>

    <!-- Main navbar -->
    <div class="navbar navbar-expand-lg navbar-dark navbar-static d-flex justify-content-between " style="height: 70px">
        <ul class="d-flex flex-1 d-lg-none mb-0">
            <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
                <i class="icon-paragraph-justify3"></i>
            </button>
        </ul>

        <ul class="collapse navbar-collapse order-2 order-lg-1 justify-content-center mb-0" id="navbar-mobile">
            <img src="/images/white-logo.png" alt="doctor" height="50px" width="45px" />
            <h1 style="" class="ml-2 mb-0">GHARGHARMA DOCTOR</h1>
            @can('Superadmin')
                <h4 class="font-weight-semibold badge badge-success"
                    style="margin-left: 20px; margin-top: 10px; font-size: 20px">Superadmin Dashboard</h1>
                @elsecan('Admin')
                    <h1 class="font-weight-semibold badge badge-success"
                        style="margin-left: 20px; margin-top: 10px; font-size: 20px">Admin Dashboard </h1>
                @elsecan('Employee')
                    <h1 class="font-weight-semibold badge badge-success"
                        style="margin-left: 20px; margin-top: 10px; font-size: 20px">Employee -
                        {{ Auth::user()->subroles->subrole }} Dashboard</h1>
                @elsecan('Doctor')
                    <h1 class="font-weight-semibold badge badge-success"
                        style="margin-left: 20px; margin-top: 10px; font-size: 20px">Doctor Dashboard</h1>
                @elsecan('Vendor')
                    <h1 class="font-weight-semibold badge badge-success"
                        style="margin-left: 20px; margin-top: 10px; font-size: 20px">Vendor Dashboard</h1>
                @elsecan('User')
                    <h1 class="font-weight-semibold badge badge-success"
                        style="margin-left: 20px; margin-top: 10px; font-size: 20px">User Dashboard</h1>
                @elsecan('Driver')
                    <h1 class="font-weight-semibold badge badge-success"
                        style="margin-left: 20px; margin-top: 10px; font-size: 20px">Driver Dashboard</h1>
                @elsecan('Investor')
                    <h1 class="font-weight-semibold badge badge-success"
                        style="margin-left: 20px; margin-top: 10px; font-size: 20px">Investor Dashboard</h1>
                @elsecan('Director')
                    <h1 class="font-weight-semibold badge badge-success"
                        style="margin-left: 20px; margin-top: 10px; font-size: 20px">Director Dashboard</h1>
                @elsecan('RO')
                    @if (Helper::relationship_manager() == 1)
                        <h1 class="font-weight-semibold badge badge-success"
                            style="margin-left: 20px; margin-top: 10px; font-size: 20px">Relationship Manager Dashboard</h1>
                    @elseif (Helper::relationship_manager_upgrade_case1() >= 5)
                        <h1 class="font-weight-semibold badge badge-success"
                            style="margin-left: 20px; margin-top: 10px; font-size: 20px">Relationship Manager Dashboard</h1>
                    @else
                        <h1 class="font-weight-semibold badge badge-success"
                            style="margin-left: 20px; margin-top: 10px; font-size: 20px">Relationship Officer Dashboard</h1>
                    @endif
                @endcan
        </ul>
        @php $helper_admin_alert= Helper::admin_alert();  @endphp

        <ul class="navbar-nav flex-row order-1 order-lg-2 flex-1 flex-lg-0 justify-content-end align-items-center">
            @canany(['SuperAdmin', 'Admin'])
                <li class="nav-item nav-item-dropdown-lg dropdown">
                    <a href="#" class="navbar-nav-link navbar-nav-link-toggler" data-toggle="dropdown">
                        <i class="icon-bell3"></i>
                        @php
                            $tts = count($helper_admin_alert['notifications']) > 0 ? $helper_admin_alert['notifications']->sum('total') : 0;
                            if ($tts > 0) {
                                echo '<span class="badge badge-warning badge-pill ml-auto ml-lg-0">' . $tts . '</span>';
                            }
                        @endphp
                    </a>

                    <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-lg-350">
                        <div class="dropdown-content-header">
                            <span class="font-weight-semibold">Notifications</span>
                        </div>
                        @if (count($notification) > 0)
                            <div class="dropdown-content-body dropdown-scrollable  px-0">
                                <ul class="media-list">
                                    @foreach ($notification as $item)
                                        @if ($item->watched == 'unseen')
                                            <li class="p-2 my-0" style="background-color: #ddd">
                                                <a href="{{ route('notification.view', ['type' => $item->type, 'id' => $item->id]) }}"
                                                    class=" d-flex flex-nowrap">
                                                    <span class="mr-2">
                                                        <i class="icon-circle"></i>
                                                    </span>
                                                    <div class="media-body">
                                                        <div class="media-title">
                                                            <span class="font-weight-semibold">{{ $item->title }}</span>
                                                            <span class="text-muted float-right font-size-sm">
                                                                {{ \Carbon\Carbon::parse($item->created_at)->format('d M') }}
                                                                at
                                                                {{ \Carbon\Carbon::parse($item->created_at)->format('g:i A') }}
                                                            </span>
                                                        </div>

                                                        <span class="text-muted">{{ $item->body }}</span>
                                                    </div>
                                                </a>
                                            </li>
                                        @else
                                            <li class=" p-2 my-0">
                                                {{-- <div class="mr-3 position-relative">
                                            <img src="" width="36" height="36" class="rounded-circle" alt="">
                                        </div> --}}
                                                <a href="{{ route('notification.view', ['type' => $item->type, 'id' => $item->id]) }}"
                                                    class="d-flex flex-nowrap">
                                                    <span class="mr-2">
                                                        <i class="icon-circle"></i>
                                                    </span>
                                                    <div class="media-body">
                                                        <div class="media-title">
                                                            <span class="font-weight-semibold">{{ $item->title }}</span>
                                                            <span class="text-muted float-right font-size-sm">
                                                                {{ \Carbon\Carbon::parse($item->created_at)->format('d M') }}
                                                                at
                                                                {{ \Carbon\Carbon::parse($item->created_at)->format('g:i A') }}
                                                            </span>
                                                        </div>

                                                        <span class="text-muted">{{ $item->body }}</span>
                                                    </div>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="dropdown-content-footer justify-content-center p-0">
                                <a href="{{ route('notification.all') }}"
                                    class="btn btn-light btn-block border-0 rounded-top-0" data-popup="tooltip"
                                    title="View All"><i class="icon-menu7"></i></a>
                            </div>
                        @else
                            <div class="dropdown-content-body dropdown-scrollable  px-0">
                                <div class="text-muted text-center">No Notifications.</div>
                            </div>
                        @endif


                    </div>
                </li>
            @endcan
            <li class="nav-item nav-item-dropdown-lg dropdown dropdown-user h-100">
                <a href="#"
                    class="navbar-nav-link navbar-nav-link-toggler dropdown-toggle d-inline-flex align-items-center h-100"
                    data-toggle="dropdown">
                    <img src="/images/blue-logo.png" class="rounded-pill mr-lg-2" height="34" alt="">
                    <span class="d-none d-lg-inline-block">{{ Auth::user()->name }}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    @canany(['Vendor', 'Doctor', 'Driver', 'RO'])
                        <a href="{{ env('REACT_URL') }}/login" class="dropdown-item"><i
                                class="icon-user"></i>User Dashboard</a>
                    @endcanany
                    <a href="{{ route('getchange.password') }}" class="dropdown-item"><i
                            class="icon-cog5"></i>Change
                        Password</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                            class="icon-switch2"></i>Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

            <!-- Sidebar content -->
            <div class="sidebar-content">

                <!-- User menu -->
                <div class="sidebar-section sidebar-user my-1 ml-3 align-self-center">
                    <button type="button"
                        class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-main-toggle d-lg-none">
                        <i class="icon-cross2"></i>
                    </button>
                </div>
                <!-- /user menu -->


                <!-- Main navigation -->
                <div class="sidebar-section">
                    <ul class="nav nav-sidebar" data-nav-type="accordion">

                        <!-- Main -->
                        <li class="nav-item">
                            <a href="{{ route('home') }}"
                                class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                                <i class="icon-home4"></i>
                                <span>
                                    Dashboard
                                </span>
                            </a>
                        </li>
                        {{-- @canany(['Admin', 'SuperAdmin'])
                        <li
                        class="nav-item nav-item-submenu {{ request()->routeIs('webanalytics.*') ? 'nav-item-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ request()->routeIs('webanalytics.*') ? 'nav-item-open active' : '' }}"><i
                                    class="icon-stats-growth"></i> <span>Analytics</span></a>

                            <ul class="nav nav-group-sub" data-submenu-title="Layouts"
                                style="display:{{ request()->routeIs('webanalytics.*') ? 'block' : 'none' }}">
                                <li class="nav-item">
                                    <a href="{{ route('webanalytics.index') }}"
                                        class="nav-link {{ request()->routeIs('webanalytics.index') ? 'active' : '' }}">
                                        <i class="icon-dash"></i>
                                        <span>
                                            Web
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan --}}
                        @canany(['DCEO/CEO', 'Business Development Officer'])
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}"
                                    class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                                    <i class="icon-user"></i>
                                    <span>
                                        Manage Employees
                                    </span>
                                </a>
                            </li>
                        @endcan
                        @can('Marketing Supervisor')
                            <li class="nav-item">
                                <a href="{{ route('relationmanager.index') }}"
                                    class="nav-link {{ request()->routeIs('relationmanager.*') ? 'active' : '' }}">
                                    <i class="icon-box"></i>
                                    <span>
                                        My RM/RO
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('family_referred.ms') }}"
                                    class="nav-link {{ request()->routeIs('family_referred.ms', 'family_referred_single.index') ? 'active' : '' }}">
                                    <i class="icon-box"></i>
                                    <span>
                                        My RM/RO Member
                                    </span>
                                </a>
                            </li>
                        @endcan
                        @can('RO')
                            <li class="nav-item">
                                <a href="{{ route('relationmanager.profile') }}"
                                    class="nav-link {{ request()->routeIs('relationmanager.profile') ? 'active' : '' }}">
                                    <i class="icon-box"></i>
                                    <span>
                                        My Profile
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('relationmanager.index') }}"
                                    class="nav-link {{ request()->routeIs('relationmanager.index') ? 'active' : '' }}">
                                    <i class="icon-box"></i>
                                    <span>
                                        My RM/RO
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('referral.index') }}"
                                    class="nav-link {{ request()->routeIs('referral.*') ? 'active' : '' }}">
                                    <i class="icon-box"></i>
                                    <span>
                                        Refer A Member
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('family_referred.index') }}"
                                    class="nav-link {{ request()->routeIs('family_referred.index', 'family_referred_single.index', 'family_referred.details') ? 'active' : '' }}">
                                    <i class="icon-box"></i>
                                    <span>
                                        My Member
                                    </span>
                                </a>
                            </li>
                        @endcan
                        @canany(['Superadmin', 'Admin'])
                            <li class="nav-item">
                                <a href="{{ route('users.users') }}"
                                    class="nav-link {{ request()->routeIs('users.users') ? 'active' : '' }}">
                                    <i class="icon-user-check"></i>
                                    <span>
                                        Manage Users
                                    </span>
                                </a>
                            </li>
                        @endcanany
                        @canany(checkPermission('2'), ['Superadmin', 'Admin'])
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}"
                                    class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}">
                                    <i class="icon-user-check"></i>
                                    <span>
                                        Manage Employees
                                    </span>
                                </a>
                            </li>
                        @endcanany
                        @canany(checkPermission('15'), ['Superadmin', 'Admin'])
                            <li
                                class="nav-item nav-item-submenu {{ request()->routeIs('users.doctordetail', 'users.nursedetails*', 'users.driverdetails*', 'users.vendordetail', 'users.relationmanagerdetail', 'family_referred.detail') ? 'nav-item-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('users.doctordetail', 'users.vendordetail', 'users.nursedetails*', 'users.driverdetails*', 'users.relationmanagerdetail', 'family_referred.detail') ? 'nav-item-open active' : '' }}"><i
                                        class="icon-people"></i> <span>Our Partners</span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="Layouts"
                                    style="display:{{ request()->routeIs('users.doctordetail', 'users.vendordetail', 'users.nursedetails*', 'users.driverdetails*', 'users.relationmanagerdetail', 'family_referred.detail') ? 'block' : 'none' }}">
                                    <li class="nav-item">
                                        @canany(checkPermission('3'), ['Superadmin', 'Admin'])
                                            <a href="{{ route('users.doctordetail') }}"
                                                class="nav-link {{ request()->routeIs('users.doctordetail') ? 'active' : '' }}">
                                                <i class="icon-user"></i>
                                                <span>
                                                    Our Doctor
                                                </span>
                                            </a>
                                        @endcanany
                                        @canany(checkPermission('5'), ['Superadmin', 'Admin'])
                                            <a href="{{ route('users.nursedetails') }}"
                                                class="nav-link {{ request()->routeIs('users.nursedetails') ? 'active' : '' }}">
                                                <i class="icon-user"></i>
                                                <span>
                                                    Our Nurses
                                                </span>
                                            </a>
                                        @endcanany
                                        @canany(checkPermission('6'), ['Superadmin', 'Admin'])
                                            <a href="{{ route('users.driverdetails') }}"
                                                class="nav-link {{ request()->routeIs('users.driverdetails') ? 'active' : '' }}">
                                                <i class="icon-user"></i>
                                                <span>
                                                    Our Drivers
                                                </span>
                                            </a>
                                        @endcanany
                                        @canany(checkPermission('4'), ['Superadmin', 'Admin'])
                                            <a href="{{ route('users.vendordetail') }}"
                                                class="nav-link {{ request()->routeIs('users.vendordetail') ? 'active' : '' }}">
                                                <i class="icon-user"></i>
                                                <span>
                                                    Our Vendors
                                                </span>
                                            </a>
                                        @endcanany
                                        @canany(checkPermission('13'), ['Superadmin', 'Admin'])
                                            <a href="{{ route('users.relationmanagerdetail') }}"
                                                class="nav-link {{ request()->routeIs('users.relationmanagerdetail', 'family_referred.detail') ? 'active' : '' }}">
                                                <i class="icon-user"></i>
                                                <span>
                                                    Our Relationship Officer
                                                </span>
                                            </a>
                                        @endcanany
                                    </li>
                                </ul>
                            </li>
                        @endcanany

                        @canany(['Superadmin', 'Admin'])
                            <li
                                class="nav-item nav-item-submenu {{ request()->routeIs('teamcategory.*', 'team.*', 'investor.*', 'director.*') ? 'nav-item-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('teamcategory.*', 'team.*', 'investor.*', 'director.*') ? 'nav-item-open active' : '' }}"><i
                                        class="icon-people"></i> <span>Our Promoter</span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="Layouts"
                                    style="display:{{ request()->routeIs('teamcategory.*', 'team.*', 'director.*', 'investor.*') ? 'block' : 'none' }}">
                                    <li class="nav-item">
                                        <a href="{{ route('teamcategory.index') }}"
                                            class="nav-link {{ request()->routeIs('teamcategory.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Advisor Category
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('team.index') }}"
                                            class="nav-link {{ request()->routeIs('team.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Advisor Member
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('investor.index') }}"
                                            class="nav-link {{ request()->routeIs('investor.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Our Investor
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('director.index') }}"
                                            class="nav-link {{ request()->routeIs('director.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Our Director
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li
                                class="nav-item nav-item-submenu {{ request()->routeIs('notrelated.package', 'kyc.admin_*') ? 'nav-item-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('notrelated.package', 'kyc.admin_*') ? 'nav-item-open active' : '' }}"><i
                                        class="icon-people"></i> <span>CRM</span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="Layouts"
                                    style="display:{{ request()->routeIs('notrelated.package', 'kyc.admin_*') ? 'block' : 'none' }}">
                                    <li class="nav-item">
                                        <a href="{{ route('notrelated.package') }}"
                                            class="nav-link {{ request()->routeIs('notrelated.package') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Package Not Booked Users
                                            </span>
                                        </a>
                                    </li>
                                    @canany(checkPermission('2'), ['Superadmin', 'Admin'])
                                        <li class="nav-item">
                                            <a href="{{ route('kyc.admin_index') }}"
                                                class="nav-link {{ request()->routeIs('kyc.admin_*') ? 'active' : '' }}">
                                                <i class="icon-dash"></i>
                                                <span>
                                                    Global Form @if (Helper::unseen_kyc() > 0)
                                                        &nbsp;<span
                                                            class="badge badge-warning">{{ Helper::unseen_kyc() }}</span>
                                                    @endif
                                                </span>
                                            </a>
                                        </li>
                                    @endcanany
                                </ul>
                            </li>
                        @endcanany
                        @canany(checkPermission('18'), ['Superadmin', 'Admin'])
                            <li
                                class="nav-item nav-item-submenu {{ request()->routeIs('subrole.*', 'authentication.log', 'permission.*', 'incentive.*', 'user-role.*', 'relationmanager.*', 'role.*', 'check-version.*') ? 'nav-item-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('subrole.*', 'authentication.log', 'permission.*', 'incentive.*', 'incentive_calculation.index', 'user-role.*', 'relationmanager.*', 'role.*', 'check-version.*') ? 'nav-item-open active' : '' }}"><i
                                        class="icon-cog"></i> <span>Settings</span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="Layouts"
                                    style="display:{{ request()->routeIs('subrole.*', 'authentication.log', 'permission.*', 'incentive.*', 'incentive_calculation.index', 'user-role.*', 'relationmanager.*', 'role.*', 'check-version.*') ? 'block' : 'none' }}">
                                    <li class="nav-item">
                                        <a href="{{ route('authentication.log') }}"
                                            class="nav-link {{ request()->routeIs('authentication.log') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Authentication Logs
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('role.index') }}"
                                            class="nav-link {{ request()->routeIs('role.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Role
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('permission.index') }}"
                                            class="nav-link {{ request()->routeIs('permission.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Employee Sub Roles And Permissions
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('user-role.index') }}"
                                            class="nav-link {{ request()->routeIs('user-role.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Deactivate Role/Account
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('check-version.index') }}"
                                            class="nav-link {{ request()->routeIs('check-version.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                App Version Update
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('incentive.index') }}"
                                            class="nav-link {{ request()->routeIs('incentive.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Incentive Manager
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('incentive_calculation.index') }}"
                                            class="nav-link {{ request()->routeIs('incentive_calculation.index') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Incentive Calculation
                                            </span>
                                        </a>
                                    </li>
                                    @can('Marketing Supervisor')
                                        <li class="nav-item">
                                            <a href="{{ route('relationmanager.index') }}"
                                                class="nav-link {{ request()->routeIs('relationmanager.*') ? 'active' : '' }}">
                                                <i class="icon-dash"></i>
                                                <span>
                                                    Relationship Officer
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcanany
                        @canany(checkPermission('14'), ['Superadmin', 'Admin'])
                            <li
                                class="nav-item nav-item-submenu {{ request()->routeIs('details.*', 'about.*', 'banner.*', 'ourservice.*', 'termcondition.*', 'frequentlyaskedquestion.*', 'enquiry.*', 'details.information', 'packageslider.*') ? 'nav-item-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('details.*', 'about.*', 'banner.*', 'ourservice.*', 'termcondition.*', 'frequentlyaskedquestion.*', 'enquiry.*', 'details.information', 'packageslider.*') ? 'nav-item-open active' : '' }}"><i
                                        class="icon-office"></i> <span>Company Profile</span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="Layouts"
                                    style="display:{{ request()->routeIs('details.*', 'about.*', 'banner.*', 'ourservice.*', 'termcondition.*', 'frequentlyaskedquestion.*', 'enquiry.*', 'details.information', 'packageslider.*') ? 'block' : 'none' }}">
                                    <li class="nav-item">
                                        <a href="{{ route('details.index') }}"
                                            class="nav-link {{ request()->routeIs('details.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Company Details
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('about.index') }}"
                                            class="nav-link {{ request()->routeIs('about.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                About Us
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('banner.index') }}"
                                            class="nav-link {{ request()->routeIs('banner.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Home Slider
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('ourservice.index') }}"
                                            class="nav-link {{ request()->routeIs('ourservice.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Our Services
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('termcondition.index') }}"
                                            class="nav-link {{ request()->routeIs('termcondition.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Legal
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('frequentlyaskedquestion.index') }}"
                                            class="nav-link {{ request()->routeIs('frequentlyaskedquestion.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Frequently Asked Question
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('enquiry.index') }}"
                                            class="nav-link {{ request()->routeIs('enquiry.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Enquiry
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('details.information') }}"
                                            class="nav-link {{ request()->routeIs('details.information') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Contact Information
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('packageslider.index') }}"
                                            class="nav-link {{ request()->routeIs('packageslider.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Package Slider
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        @endcanany
                        @canany(checkPermission('19'), ['Superadmin', 'Admin'])
                            <li
                                class="nav-item nav-item-submenu {{ request()->routeIs('vacancy.*', 'skills.*') ? 'nav-item-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('vacancy.*', 'skills.*') ? 'nav-item-open active' : '' }}"><i
                                        class="icon-briefcase"></i> <span>Career</span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="Layouts"
                                    style="display:{{ request()->routeIs('vacancy.*', 'skills.*') ? 'block' : 'none' }}">

                                    <li class="nav-item">
                                        <a href="{{ route('skills.index') }}"
                                            class="nav-link {{ request()->routeIs('skills.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Job Skills
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('vacancy.index') }}"
                                            class="nav-link {{ request()->routeIs('vacancy.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Vacancy
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcanany
                        @canany(checkPermission('20'), ['Superadmin', 'Admin'])
                            <li
                                class="nav-item nav-item-submenu {{ request()->routeIs('labdepartment.*', 'labprofile.*', 'labtest.*', 'labpackage.*') ? 'nav-item-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('labdepartment.*', 'labprofile.*', 'labtest.*', 'labpackage.*') ? 'nav-item-open active' : '' }}"><i
                                        class="icon-lab"></i> <span>Lab Setup</span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="Layouts"
                                    style="display:{{ request()->routeIs('labdepartment.*', 'labprofile.*', 'labtest.*', 'labpackage.*') ? 'block' : 'none' }}">
                                    <li class="nav-item">
                                        <a href="{{ route('labdepartment.index') }}"
                                            class="nav-link {{ request()->routeIs('labdepartment.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Lab Department
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('labprofile.index') }}"
                                            class="nav-link {{ request()->routeIs('labprofile.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Lab Profile
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('labtest.index') }}"
                                            class="nav-link {{ request()->routeIs('labtest.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Lab Test
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('labpackage.index') }}"
                                            class="nav-link {{ request()->routeIs('labpackage.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Lab Packages
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcanany
                        @canany(['Superadmin', 'Admin'])
                            <li class="nav-item">
                                <a href="{{ route('sendnotification.index') }}"
                                    class="nav-link {{ request()->routeIs('sendnotification.*') ? 'active' : '' }}">
                                    <i class="icon-bell2"></i>
                                    <span>
                                        Send Notification
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('filternotification.index') }}"
                                    class="nav-link {{ request()->routeIs('filternotification.*') ? 'active' : '' }}">
                                    <i class="icon-bell2"></i>
                                    <span>
                                        Filter Notification
                                    </span>
                                </a>
                            </li>
                        @endcanany
                        @canany(checkPermission('21'), ['Superadmin', 'Admin'])
                            <li
                                class="nav-item nav-item-submenu {{ request()->routeIs('package.*') ? 'nav-item-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('package.*') ? 'nav-item-open active' : '' }}"><i
                                        class="icon-info22"></i> <span>Packages </span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="Layouts"
                                    style="display:{{ request()->routeIs('package.*') ? 'block' : 'none' }}">
                                    {{-- <li class="nav-item">
                                <a href="{{ route('service.index') }}"
                                    class="nav-link {{ request()->routeIs('service.*') ? 'active' : '' }}">
                                    <i class="icon-dash"></i>
                                    <span>
                                        Pathology Screening
                                    </span>
                                </a>
                            </li> --}}
                                    <li class="nav-item">
                                        <a href="{{ route('package.index') }}"
                                            class="nav-link {{ request()->routeIs('package.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Manage Package
                                            </span>
                                        </a>
                                    </li>
                                    {{-- <li class="nav-item">
                                <a href="{{ route('screeningservice.index') }}"
                                    class="nav-link {{ request()->routeIs('screeningservice.*') ? 'active' : '' }}">
                                    <i class="icon-dash"></i>
                                    <span>
                                        Screening Services
                                    </span>
                                </a>
                            </li> --}}
                                </ul>
                            </li>
                        @endcanany
                        @canany(['Superadmin', 'Admin'])
                            {{-- <li class="nav-item">
                                <a href="{{ route('steam.index') }}"
                                    class="nav-link {{ request()->routeIs('steam.*') ? 'active' : '' }}">
                                    <i class="icon-users"></i>
                                    <span>
                                       Screening Team
                                    </span>
                                </a>
                            </li> --}}

                            {{-- <li
                                class="nav-item nav-item-submenu {{ request()->routeIs('notification.*','sendnotification.*') ? 'nav-item-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('notification.*','sendnotification.*') ? 'nav-item-open active' : '' }}"><i
                                        class="icon-info22"></i> <span>Notification @if ($tts > 0)
                                            &nbsp;<span class="badge badge-warning">{{ $tts }}</span>
                                        @endif </span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="Layouts"
                                    style="display:{{ request()->routeIs('notification.*','sendnotification.*') ? 'block' : 'none' }}">
                                    <li class="nav-item">
                                        <a href="{{route('sendnotification.index')}}"
                                            class="nav-link {{ request()->routeIs('sendnotification.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Send Notification
                                            </span>
                                        </a>
                                    </li>
                                    @foreach ($helper_admin_alert['notifications'] as $noti)
                                        <li class="nav-item">
                                            <a href="{{ route('notification.index', ['type' => $noti['type']]) }}"
                                                class="nav-link {{ request()->segment(3) == $noti['type'] ? 'active' : '' }}">
                                                <i class="icon-dash"></i>
                                                <span>
                                                    {{ $noti['type'] }} @if ($noti['total'] > 0)
                                                        &nbsp;<span
                                                            class="badge badge-warning">{{ $noti['total'] }}</span>
                                                    @endif
                                                </span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li> --}}
                        @endcanany
                        @canany(checkPermission('17'), ['Superadmin', 'Admin'])
                            <li
                                class="nav-item nav-item-submenu {{ request()->routeIs('category.*', 'brand.*', 'shipping.*', 'cancelreason.*', 'order.confirm') ? 'nav-item-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('category.*', 'brand.*', 'shipping.*', 'cancelreason.*', 'order.confirm') ? 'nav-item-open active' : '' }}"><i
                                        class="icon-cart"></i> <span>Ecommerce</span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="Layouts"
                                    style="display:{{ request()->routeIs('category.*', 'brand.*', 'shipping.*', 'cancelreason.*', 'order.confirm') ? 'block' : 'none' }}">
                                    <li class="nav-item">
                                        <a href="{{ route('category.index') }}"
                                            class="nav-link {{ request()->routeIs('category.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Category
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('brand.index') }}"
                                            class="nav-link {{ request()->routeIs('brand.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Brand
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('shipping.index') }}"
                                            class="nav-link {{ request()->routeIs('shipping.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Shipping Charges
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('cancelreason.index') }}"
                                            class="nav-link {{ request()->routeIs('cancelreason.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Order Cancel Reason
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('order.confirm') }}"
                                            class="nav-link {{ request()->routeIs('order.confirm') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Order Confirm
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcanany
                        @canany(checkPermission('22'), ['Superadmin', 'Admin'])
                            <li
                                class="nav-item nav-item-submenu {{ request()->routeIs('medicalreport.*', 'report.*', 'labtestbookings.*') ? 'nav-item-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('medicalreport.*', 'report.*', 'labtestbookings.*') ? 'nav-item-open active' : '' }}"><i
                                        class="icon-people"></i> <span>Reports</span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="Layouts"
                                    style="display:{{ request()->routeIs('medicalreport.*', 'report.*') ? 'block' : 'none' }}">
                                    <li class="nav-item">
                                        <a href="{{ route('medicalreport.index') }}"
                                            class="nav-link {{ request()->routeIs('medicalreport.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Pathology Report
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('report.searchReport') }}"
                                            class="nav-link {{ request()->routeIs('report.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Search Report
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('labtestbookings.index') }}"
                                            class="nav-link {{ request()->routeIs('labtestbookings.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Lab Test Bookings
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcanany
                        @canany(checkPermission('23'), ['Superadmin', 'Admin'])
                            <li
                                class="nav-item nav-item-submenu {{ request()->routeIs('sampleReason.*', 'secondSampleReason.*', 'sampleDrop.*', 'skipSample.*') ? 'nav-item-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('sampleReason.*', 'secondSampleReason.*', 'sampleDrop.*', 'skipSample.*') ? 'nav-item-open active' : '' }}"><i
                                        class="icon-folder"></i> <span>Sample Details </span>
                                </a>

                                <ul class="nav nav-group-sub" data-submenu-title="Layouts"
                                    style="display:{{ request()->routeIs('sampleReason.*', 'secondSampleReason.*', 'sampleDrop.*', 'skipSample.*') ? 'block' : 'none' }}">
                                    <li class="nav-item">
                                        <a href="{{ route('sampleReason.index') }}"
                                            class="nav-link {{ request()->routeIs('sampleReason.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                First Sample Uncollected Reason
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('secondSampleReason.index') }}"
                                            class="nav-link {{ request()->routeIs('secondSampleReason.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Second Sample Uncollected Reason
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('sampleDrop.index') }}"
                                            class="nav-link {{ request()->routeIs('sampleDrop.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Assign Sample Drop Team
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('skipSample.index') }}"
                                            class="nav-link {{ request()->routeIs('skipSample.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Skip Sample Collection
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li
                                class="nav-item nav-item-submenu {{ request()->routeIs('screeningteam.*', 'booked.*', 'activated.*', 'deactivated.*', 'notbooked.*', 'pending.*', 'consultant.*', 'onlineDoctorConsultation.*') ? 'nav-item-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('screeningteam.*', 'booked.*', 'activated.*', 'deactivated.*', 'notbooked.*', 'pending.*', 'consultant.*', 'onlineDoctorConsultation.*') ? 'nav-item-open active' : '' }}"><i
                                        class="icon-folder"></i> <span>User Packages @if ($helper_admin_alert['total_packages'] > 0)
                                            &nbsp;<span
                                                class="badge badge-warning">{{ $helper_admin_alert['total_packages'] }}</span>
                                        @endif
                                    </span>
                                </a>

                                <ul class="nav nav-group-sub" data-submenu-title="Layouts"
                                    style="display:{{ request()->routeIs('screeningteam.*', 'booked.*', 'activated.*', 'deactivated.*', 'notbooked.*', 'pending.*', 'consultant.*', 'onlineDoctorConsultation.*') ? 'block' : 'none' }}">
                                    <li class="nav-item">
                                        <a href="{{ route('onlineDoctorConsultation.index') }}"
                                            class="nav-link {{ request()->routeIs('onlineDoctorConsultation.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Online Doctor Consultation
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('rescheduleRequest.index') }}"
                                            class="nav-link {{ request()->routeIs('rescheduleRequest.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Home Visit Reschedule Request
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('screeningteam.editTeam') }}"
                                            class="nav-link {{ request()->routeIs('screeningteam.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Screening Team
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('booked.index') }}"
                                            class="nav-link {{ request()->routeIs('booked.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Activated(Add First Screening) @if ($helper_admin_alert['bookeds'] > 0)
                                                    &nbsp;<span
                                                        class="badge badge-warning">{{ $helper_admin_alert['bookeds'] }}</span>
                                                @endif
                                            </span>
                                        </a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a href="{{ route('pending.index') }}"
                                            class="nav-link {{ request()->routeIs('pending.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                First Screening Pending @if ($helper_admin_alert['pendings'] > 0)
                                                    &nbsp;<span
                                                        class="badge badge-warning">{{ $helper_admin_alert['pendings'] }}</span>
                                                @endif
                                            </span>
                                        </a>
                                    </li> --}}
                                    <li class="nav-item">
                                        <a href="{{ route('activated.index') }}"
                                            class="nav-link {{ request()->routeIs('activated.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Activated @if ($helper_admin_alert['activateds'] > 0)
                                                    &nbsp;<span
                                                        class="badge badge-warning">{{ $helper_admin_alert['activateds'] }}</span>
                                                @endif
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('consultant.index') }}"
                                            class="nav-link {{ request()->routeIs('consultant.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Screening Consultation @if ($helper_admin_alert['consultation'] > 0)
                                                    &nbsp;<span
                                                        class="badge badge-warning">{{ $helper_admin_alert['consultation'] }}</span>
                                                @endif
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('deactivated.index') }}"
                                            class="nav-link {{ request()->routeIs('deactivated.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Deactivated @if ($helper_admin_alert['deactivateds'] > 0)
                                                    &nbsp;<span
                                                        class="badge badge-warning">{{ $helper_admin_alert['deactivateds'] }}</span>
                                                @endif
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('notbooked.index') }}"
                                            class="nav-link {{ request()->routeIs('notbooked.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Not Booked @if ($helper_admin_alert['notbookeds'] > 0)
                                                    &nbsp;<span
                                                        class="badge badge-warning">{{ $helper_admin_alert['notbookeds'] }}</span>
                                                @endif
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcanany
                        @canany(checkPermission('16'), ['Superadmin', 'Admin'])
                            <li
                                class="nav-item nav-item-submenu {{ request()->routeIs('news.*', 'gallery.*', 'advertisement.*', 'menu.*', 'expo.*') ? 'nav-item-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('news.*', 'gallery.*', 'advertisement.*', 'menu.*', 'expo.*') ? 'nav-item-open active' : '' }}"><i
                                        class="icon-newspaper"></i> <span>News Portal</span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="Layouts"
                                    style="display:{{ request()->routeIs('news.*', 'gallery.*', 'advertisement.*', 'menu.*', 'expo.*') ? 'block' : 'none' }}">
                                    <li class="nav-item">
                                        <a href="{{ route('menu.index') }}"
                                            class="nav-link {{ request()->routeIs('menu.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Menu
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('news.index') }}"
                                            class="nav-link {{ request()->routeIs('news.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                News
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('gallery.index') }}"
                                            class="nav-link {{ request()->routeIs('gallery.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Gallery
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('advertisement.index') }}"
                                            class="nav-link {{ request()->routeIs('advertisement.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Advertisement
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('expo.index') }}"
                                            class="nav-link {{ request()->routeIs('expo.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Expo and Events
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcanany
                        @canany(checkPermission('24'), ['Superadmin', 'Admin'])
                            <li
                                class="nav-item nav-item-submenu {{ request()->routeIs('primarychangerequest.*', 'leaverequest.*', 'removerequest.*', 'becomeprimary.*') ? 'nav-item-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('primarychangerequest.*', 'leaverequest.*', 'removerequest.*', 'becomeprimary.*') ? 'nav-item-open active' : '' }}"><i
                                        class="icon-people"></i> <span>Family Settings <span
                                            class="badge badge-warning">{{ Helper::remove_family_request() + Helper::become_primary_request() + Helper::member_leave_request() + Helper::primary_change_request() }}</span></span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="Layouts"
                                    style="display:{{ request()->routeIs('primarychangerequest.*', 'leaverequest.*', 'removerequest.*', 'becomeprimary.*') ? 'block' : 'none' }}">
                                    <li class="nav-item">
                                        <a href="{{ route('primarychangerequest.index') }}"
                                            class="nav-link {{ request()->routeIs('primarychangerequest.index') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Primary Switch Request
                                                <span
                                                    class="badge badge-warning">{{ Helper::primary_change_request() }}</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('becomeprimary.index') }}"
                                            class="nav-link {{ request()->routeIs('becomeprimary.index') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Primary Change Request
                                                <span
                                                    class="badge badge-warning">{{ Helper::become_primary_request() }}</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('leaverequest.index') }}"
                                            class="nav-link {{ request()->routeIs('leaverequest.index') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Family Leave Request
                                                <span
                                                    class="badge badge-warning">{{ Helper::member_leave_request() }}</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('removerequest.index') }}"
                                            class="nav-link {{ request()->routeIs('removerequest.index') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Remove Family Request
                                                <span
                                                    class="badge badge-warning">{{ Helper::remove_family_request() }}</span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcanany
                        @canany(checkPermission('25'), ['Superadmin', 'Admin'])
                            <li class="nav-item nav-item-submenu {{ request()->routeIs('') ? 'nav-item-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('symptom.*', 'department.*', 'nurselist.*', 'doctorlist.*', 'hospital.*', 'appointment.*') ? 'nav-item-open active' : '' }}"><i
                                        class="icon-info22"></i> <span>Doctor Department </span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="Layouts"
                                    style="display:{{ request()->routeIs('symptom.*', 'department.*', 'doctorlist.*', 'nurselist.*', 'hospital.*', 'appointment.*') ? 'block' : 'none' }}">
                                    <li class="nav-item">
                                        <a href="{{ route('doctorlist.index') }}"
                                            class="nav-link {{ request()->routeIs('doctorlist.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Doctor Roster
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('appointment.index') }}"
                                            class="nav-link {{ request()->routeIs('appointment.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Appointments @if ($helper_admin_alert['appointments'] > 0)
                                                    &nbsp;<span
                                                        class="badge badge-warning">{{ $helper_admin_alert['appointments'] }}</span>
                                                @endif
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('symptom.index') }}"
                                            class="nav-link {{ request()->routeIs('symptom.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Symptom
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('department.index') }}"
                                            class="nav-link {{ request()->routeIs('department.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Doctor Department
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('nurselist.index') }}"
                                            class="nav-link {{ request()->routeIs('nurselist.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Nurse Roster
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('hospital.index') }}"
                                            class="nav-link {{ request()->routeIs('hospital.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Hospital
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcanany
                        @canany(checkPermission('26'), ['Superadmin', 'Admin'])
                            <li
                                class="nav-item nav-item-submenu {{ request()->routeIs('insurance.*', 'insurancetype.*') ? 'nav-item-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('insurance.*', 'insurancetype.*') ? 'nav-item-open active' : '' }}"><i
                                        class="icon-people"></i> <span>Insurance</span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="Layouts"
                                    style="display:{{ request()->routeIs('insurance.*', 'insurancetype.*') ? 'block' : 'none' }}">
                                    <li class="nav-item">
                                        <a href="{{ route('insurance.index') }}"
                                            class="nav-link {{ request()->routeIs('insurance.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Insurance Company Details
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('insurancetype.index') }}"
                                            class="nav-link {{ request()->routeIs('insurancetype.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Insurance Types
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li
                                class="nav-item nav-item-submenu {{ request()->routeIs('insuranceclaim.*', 'deathinsuranceclaim.*', 'deathclaim.*') ? 'nav-item-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('insuranceclaim.*', 'deathinsuranceclaim.*', 'deathclaim.*') ? 'nav-item-open active' : '' }}"><i
                                        class="icon-people"></i> <span>Insurance Claim Report</span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="Layouts"
                                    style="display:{{ request()->routeIs('insuranceclaim.*', 'deathinsuranceclaim.*', 'deathclaim.*') ? 'block' : 'none' }}">
                                    <li class="nav-item">
                                        <a href="{{ route('deathinsuranceclaim.index') }}"
                                            class="nav-link {{ request()->routeIs('deathinsuranceclaim.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Death Insurance Claim
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('deathclaim.index') }}"
                                            class="nav-link {{ request()->routeIs('deathclaim.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Separate Death Insurance Claim
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('insuranceclaim.index') }}"
                                            class="nav-link {{ request()->routeIs('insuranceclaim.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Other Insurance Claim
                                                {{-- @if ($helper_admin_alert['insuranceClaims'] > 0)
                                                    &nbsp;<span
                                                        class="badge badge-warning">{{ $helper_admin_alert['insuranceClaims'] }}</span>
                                                @endif --}}
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcanany
                        @canany(checkPermission('27'), ['Superadmin', 'Admin'])
                            <li
                                class="nav-item nav-item-submenu {{ request()->routeIs('ambulance.*', 'driver.*', 'trip.*') ? 'nav-item-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('ambulance.*', 'driver.*', 'trip.*') ? 'nav-item-open active' : '' }}"><i
                                        class="icon-info22"></i> <span>Ambulance </span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="Layouts"
                                    style="display:{{ request()->routeIs('ambulance.*', 'driver.*', 'trip.*') ? 'block' : 'none' }}">
                                    <li class="nav-item">
                                        <a href="{{ route('ambulance.index') }}"
                                            class="nav-link {{ request()->routeIs('ambulance.*') ? 'active' : '' }}">
                                            <i class="icon-search4"></i>
                                            <span>
                                                Ambulance
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('driver.index') }}"
                                            class="nav-link {{ request()->routeIs('driver.*') ? 'active' : '' }}">
                                            <i class="icon-box"></i>
                                            <span>
                                                Driver
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('trip.index') }}"
                                            class="nav-link {{ request()->routeIs('trip.*') ? 'active' : '' }}">
                                            <i class="icon-box"></i>
                                            <span>
                                                Trip
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcanany
                        @canany(checkPermission('28'), ['Superadmin', 'Admin'])
                            <li
                                class="nav-item nav-item-submenu {{ request()->routeIs('screeninguserreview.*', 'screeningemployeereview.*', 'gdfeedback.*') ? 'nav-item-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('screeninguserreview.*', 'screeningemployeereview.*', 'gdfeedback.*') ? 'nav-item-open active' : '' }}"><i
                                        class="icon-menu3"></i> <span>Feedback</span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="Layouts"
                                    style="display:{{ request()->routeIs('screeninguserreview.index', 'screeningemployeereview.index') ? 'block' : 'none' }}">
                                    <li class="nav-item">
                                        <a href="{{ route('screeninguserreview.index') }}"
                                            class="nav-link {{ request()->routeIs('screeninguserreview.*') ? 'active' : '' }}">
                                            <i class="icon-file-text"></i>
                                            <span>
                                                User Feedback
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('screeningemployeereview.index') }}"
                                            class="nav-link {{ request()->routeIs('screeningemployeereview.*') ? 'active' : '' }}">
                                            <i class="icon-file-text"></i>
                                            <span>
                                                Employee Feedback
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('gdfeedback.index') }}"
                                            class="nav-link {{ request()->routeIs('gdfeedback.*') ? 'active' : '' }}">
                                            <i class="icon-file-text"></i>
                                            <span>
                                                GD Feedback
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcanany
                        @canany(['Superadmin', 'Admin'])
                            {{-- <li class="nav-item nav-item-submenu">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('category.*', 'product.*', 'tags.*', 'brand.*') ? 'active' : '' }}"><i
                                        class="icon-menu3"></i> <span>Vendor</span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                                    <li class="nav-item">
                                        <a href="{{ route('category.index') }}"
                                            class="nav-link {{ request()->routeIs('category.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Category
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('product.index') }}"
                                            class="nav-link {{ request()->routeIs('product.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Product
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('tags.index') }}"
                                            class="nav-link {{ request()->routeIs('tags.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Tags
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('brand.index') }}"
                                            class="nav-link {{ request()->routeIs('brand.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Brand
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li> --}}
                            {{-- <li class="nav-item nav-item-submenu">
                                <a href="#"
                                    class="nav-link {{ request()->segment(2) == 'medicalreport' ? 'active' : '' }} "><i
                                        class="icon-info22"></i> <span>Test Report</span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                                    <li class="nav-item ">
                                        @if ($services != null)
                                            @foreach ($services as $item)
                                                <a href="{{ route('medicalreport.index',$item->id) }}"
                                                    class="nav-link {{ request()->segment(3) == $item->id ? 'active' : '' }}">
                                                    <i class="icon-dash"></i>
                                                    <span>
                                                        {{$item->service_name}}
                                                    </span>
                                                </a>
                                            @endforeach
                                        @endif                                       
                                    </li>
                                </ul>
                            </li> --}}

                            {{-- <li class="nav-item">
                                <a href="{{ route('userpackages.index') }}"
                                    class="nav-link {{ request()->routeIs('userpackages.*') ? 'active' : '' }}">
                                    <i class="icon-box"></i>
                                    <span>
                                        User Packages
                                    </span>
                                </a>
                            </li> --}}
                            </li>
                        @endcan
                        @can('Employee')
                            <li class="nav-item">
                                <a href="{{ route('employee.index') }}"
                                    class="nav-link {{ request()->routeIs('employee.*') ? 'active' : '' }}">
                                    <i class="icon-user"></i>
                                    <span>
                                        Profile
                                    </span>
                                </a>
                            </li>
                        @endcan
                        @can('Dietician')
                        <li class="nav-item">
                            <a href="{{ route('dietician.index') }}"
                                class="nav-link {{ request()->routeIs('dietician.*') ? 'active' : '' }}">
                                <i class="icon-file-text"></i>
                                <span>
                                    Dietician Screening Form
                                </span>
                            </a>
                        </li>
                        @endcanany
                        @canany(['GD Nurse', 'Lab Technician'])
                            <li class="nav-item">
                                <a href="{{ route('individualSample.index') }}"
                                    class="nav-link {{ request()->routeIs('individualSample.*') ? 'active' : '' }}">
                                    <i class="icon-file-text"></i>
                                    <span>
                                        Individual Sample Collection
                                    </span>
                                </a>
                            </li>
                        @endcan
                        @can('GD Nurse')
                            <li class="nav-item">
                                <a href="{{ route('medicalreport.index') }}"
                                    class="nav-link {{ request()->routeIs('medicalreport.*') ? 'active' : '' }}">
                                    <i class="icon-file-text"></i>
                                    <span>
                                        Sample Collection
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('nurse-screening-form.index') }}"
                                    class="nav-link {{ request()->routeIs('nurse-screening-form.*') ? 'active' : '' }}">
                                    <i class="icon-file-text"></i>
                                    <span>
                                        Nurse Screening Form
                                    </span>
                                </a>
                            </li>
                        @endcan
                        @can('GD Doctor')
                        @if(Auth::user()->employee->department == 2)
                            <li class="nav-item">
                                <a href="{{ route('dental-screening-form.index') }}"
                                    class="nav-link {{ request()->routeIs('dental-screening-form.*') ? 'active' : '' }}">
                                    <i class="icon-file-text"></i>
                                    <span>
                                        Dental Screening Form
                                    </span>
                                </a>
                            </li>
                        @endif
                        @if(Auth::user()->employee->department == 3)
                            <li class="nav-item">
                                <a href="{{ route('ophthalmologist.index') }}"
                                    class="nav-link {{ request()->routeIs('ophthalmologist.*') ? 'active' : '' }}">
                                    <i class="icon-file-text"></i>
                                    <span>
                                        Ophthalmologist Screening Form
                                    </span>
                                </a>
                            </li>
                        @endif
                        @if(Auth::user()->employee->department == 18)
                            <li class="nav-item">
                                <a href="{{ route('physio-screening-form.index') }}"
                                    class="nav-link {{ request()->routeIs('physio-screening-form.*') ? 'active' : '' }}">
                                    <i class="icon-file-text"></i>
                                    <span>
                                        Physiotherapist  Screening Form
                                    </span>
                                </a>
                            </li>
                        @endif
                        @if(Auth::user()->employee->department == 1)
                            <li class="nav-item">
                                <a href="{{ route('doctor-screening-form.index') }}"
                                    class="nav-link {{ request()->routeIs('doctor-screening-form.*') ? 'active' : '' }}">
                                    <i class="icon-file-text"></i>
                                    <span>
                                        Doctor Screening Form
                                    </span>
                                </a>
                            </li>
                        @endif
                        @endcan
                        @canany(['GD Doctor', 'GD Nurse', 'Fitness Trainer','Dietician'])
                            <li class="nav-item">
                                <a href="{{ route('findings.reportIndex') }}"
                                    class="nav-link {{ request()->routeIs('findings.*') ? 'active' : '' }}">
                                    <i class="icon-file-text"></i>
                                    <span>
                                        Pathology Report Findings
                                    </span>
                                </a>
                            </li>
                        @endcan
                        @can('GD Doctor')
                            <li class="nav-item">
                                <a href="{{ route('onlineDoctorConsultation.findingsIndex') }}"
                                    class="nav-link {{ request()->routeIs('onlineDoctorConsultation.*') ? 'active' : '' }}">
                                    <i class="icon-file-text"></i>
                                    <span>
                                        Online Consultation Findings
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('onlineconsultation.index') }}"
                                    class="nav-link {{ request()->routeIs('onlineconsultation.*') ? 'active' : '' }}">
                                    <i class="icon-file-text"></i>
                                    <span>
                                        Online Consultation Meeting
                                    </span>
                                </a>
                            </li>
                        @endcan
                        @canany(['GD Doctor', 'Admin'])
                            <li class="nav-item">
                                <a href="{{ route('upload_medical_history_consultation.index', ['package' => 'package']) }}"
                                    class="nav-link {{ request()->routeIs('upload_medical_history_consultation.*') ? 'active' : '' }}">
                                    <i class="icon-file-text"></i>
                                    <span>
                                        External Medical History
                                        @can('Admin')
                                            @if (Helper::external_medical_history() != 0)
                                                <span
                                                    class="badge badge-warning">{{ Helper::external_medical_history() }}</span>
                                            @endif
                                        @endcan
                                        @can('GD Doctor')
                                            @if (Helper::external_medical_history_doctor() != 0)
                                                <span
                                                    class="badge badge-warning">{{ Helper::external_medical_history_doctor() }}</span>
                                            @endif
                                        @endcan
                                    </span>
                                </a>
                            </li>
                        @endcanany
                        @can('Doctor')
                            <li class="nav-item">
                                <a href="{{ route('doctorprofile.index') }}"
                                    class="nav-link {{ request()->routeIs('doctorprofile.*') ? 'active' : '' }}">
                                    <i class="icon-user"></i>
                                    <span>
                                        Doctor Profile
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('booking.index') }}"
                                    class="nav-link {{ request()->routeIs('booking.*') ? 'active' : '' }}">
                                    <i class="icon-calendar"></i>
                                    <span>
                                        Doctor Scheduling
                                    </span>
                                </a>
                            </li>

                            @php
                                $doctor_schedule = Helper::doctor_schedule();
                                $total_schedule = $doctor_schedule['schedule'] + $doctor_schedule['complete'] + $doctor_schedule['cancel'];
                            @endphp

                            <li
                                class="nav-item nav-item-submenu {{ request()->routeIs('scheduled.*', 'completed.*', 'cancelled.*') ? 'nav-item-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('scheduled.*', 'completed.*', 'cancelled.*') ? 'nav-item-open active' : '' }}"><i
                                        class="icon-folder"></i> <span>Appointment @if ($total_schedule > 0)
                                            &nbsp;<span class="badge badge-warning">{{ $total_schedule }}</span>
                                        @endif
                                    </span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="Layouts"
                                    style="display:{{ request()->routeIs('scheduled.*', 'completed.*', 'cancelled.*') ? 'block' : 'none' }}">
                                    {{-- @if (Helper::schedule_data() != 0) --}}
                                    <li class="nav-item">
                                        <a href="{{ route('scheduled.index') }}"
                                            class="nav-link {{ request()->routeIs('scheduled.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span> Scheduled @if ($doctor_schedule['schedule'] > 0)
                                                    &nbsp;<span
                                                        class="badge badge-warning">{{ $doctor_schedule['schedule'] }}</span>
                                                @endif
                                            </span>
                                        </a>
                                    </li>
                                    {{-- @endif --}}
                                    <li class="nav-item">
                                        <a href="{{ route('completed.index') }}"
                                            class="nav-link {{ request()->routeIs('completed.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Completed @if ($doctor_schedule['complete'] > 0)
                                                    &nbsp;<span
                                                        class="badge badge-warning">{{ $doctor_schedule['complete'] }}</span>
                                                @endif
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('cancelled.index') }}"
                                            class="nav-link {{ request()->routeIs('cancelled.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Cancelled @if ($doctor_schedule['cancel'] > 0)
                                                    &nbsp;<span
                                                        class="badge badge-warning">{{ $doctor_schedule['cancel'] }}</span>
                                                @endif
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('patient.index') }}"
                                    class="nav-link {{ request()->routeIs('patient.*') ? 'active' : '' }}">
                                    <i class="icon-file-text"></i>
                                    <span>
                                        Patient Details
                                    </span>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ route('mettings.index') }}"
                                    class="nav-link {{ request()->routeIs('mettings.*') ? 'active' : '' }}">
                                    <i class="icon-file-play"></i>
                                    <span>
                                        Meeting
                                    </span>
                                </a>
                            </li> --}}
                        @endcan
                        @can('Vendor')
                            <li class="nav-item">
                                <a href="{{ route('vendor.index') }}"
                                    class="nav-link {{ request()->routeIs('vendor.*') ? 'active' : '' }}">
                                    <i class="icon-user"></i>
                                    <span>
                                        Vendor Profile
                                    </span>
                                </a>
                            </li>
                            @if (Helper::is_exclusive())
                                <li class="nav-item">
                                    <a href="{{ route('vendorslider.index') }}"
                                        class="nav-link {{ request()->routeIs('vendorslider.*') ? 'active' : '' }}">
                                        <i class="icon-menu3"></i>
                                        <span>
                                            Slider
                                        </span>
                                    </a>
                                </li>
                            @endif
                            @if (Helper::is_exclusive())
                                <li class="nav-item">
                                    <a href="{{ route('vendorads.index') }}"
                                        class="nav-link {{ request()->routeIs('vendorads.index') ? 'active' : '' }}">
                                        <i class="icon-menu3"></i>
                                        <span>
                                            VendorAdvertisement
                                        </span>
                                    </a>
                                </li>
                            @endif
                            <li
                                class="nav-item nav-item-submenu {{ request()->routeIs('product.*', 'tags.*', 'brand.*') ? 'nav-item-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('product.*', 'tags.*', 'brand.*') ? 'nav-item-open active' : '' }}"><i
                                        class="icon-menu3"></i> <span>Vendor</span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="Layouts"
                                    style="display:{{ request()->routeIs('product.index', 'tags.*', 'brand.*', 'product.stockmanage') ? 'block' : 'none' }}">
                                    <li class="nav-item">
                                        <a href="{{ route('product.index') }}"
                                            class="nav-link {{ request()->routeIs('product.index') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Product
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('tags.index') }}"
                                            class="nav-link {{ request()->routeIs('tags.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Tags
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('product.stockmanage') }}"
                                            class="nav-link {{ request()->routeIs('product.stockmanage') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Stock Management
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('order.index') }}"
                                    class="nav-link {{ request()->routeIs('order.*') ? 'active' : '' }}">
                                    <i class="icon-user"></i>
                                    <span>
                                        Order
                                    </span>
                                </a>
                            </li>
                            @can('Fitness')
                                <li class="nav-item">
                                    <a href="{{ route('fitnesstype.index') }}"
                                        class="nav-link {{ request()->routeIs('fitnesstype.*') ? 'active' : '' }}">
                                        <i class="icon-user"></i>
                                        <span>
                                            Fitness Type
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('fitness-price.index') }}"
                                        class="nav-link {{ request()->routeIs('fitness-price.*') ? 'active' : '' }}">
                                        <i class="icon-user"></i>
                                        <span>
                                            Fitness Price
                                        </span>
                                    </a>
                                </li>
                            @endcan
                        @endcan
                        {{-- @canany(['User', 'Vendor', 'Doctor', 'Driver', 'Nurse'])
                            @if (Helper::switch_role() === 2)
                                <li class="nav-item">
                                    <a href="{{ route('partner.index') }}"
                                        class="nav-link {{ request()->routeIs('partner.index') ? 'active' : '' }}">
                                        <i class="icon-user"></i>
                                        <span>
                                            Switch Role
                                        </span>
                                    </a>
                                </li>
                            @endif
                        @endcanany --}}
                        @can('User')
                            <li class="nav-item">
                                <a href="{{ route('member.index') }}"
                                    class="nav-link {{ request()->routeIs('member.*') ? 'active' : '' }}">
                                    <i class="icon-user"></i>
                                    <span>
                                        User Profile
                                    </span>
                                </a>
                            </li>
                            {{-- 
                                <a href="{{ route('addfamily.index') }}"
                                    class="nav-link {{ request()->routeIs('addfamily.*') ? 'active' : '' }}">
                                    <i class="icon-user"></i>
                                    <span>
                                        Add Family
                                    </span>
                                </a>
                                <a href="{{ route('userpackage.index') }}"
                                    class="nav-link {{ request()->routeIs('userpackage.*') ? 'active' : '' }}">
                                    <i class="icon-gallery"></i>
                                    <span>
                                        My Packages
                                    </span>
                                </a>
                                <a href="{{ route('bookingreview.index') }}"
                                    class="nav-link {{ request()->routeIs('bookingreview.*') ? 'active' : '' }}">
                                    <i class="icon-calendar"></i>
                                    <span>
                                        My Appointments
                                    </span>
                                </a>
                                <a href="{{ route('myservice.index') }}"
                                    class="nav-link {{ request()->routeIs('myservice.*') ? 'active' : '' }}">
                                    <i class="icon-calendar"></i>
                                    <span>
                                        My Services
                                    </span>
                                </a>
                                <a href="{{ route('insuranceclaim.index') }}"
                                    class="nav-link {{ request()->routeIs('insuranceclaim.*') ? 'active' : '' }}">
                                    <i class="icon-file-text"></i>
                                    <span>
                                        My Insurance
                                    </span>
                                </a>
                                <a href="{{ route('usermedicalreport.index') }}"
                                    class="nav-link {{ request()->routeIs('usermedicalreport.*') ? 'active' : '' }}">
                                    <i class="icon-file-text"></i>
                                    <span>
                                        Pathology Report
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('users.calorie') }}"
                                    class="nav-link {{ request()->routeIs('users.calorie') ? 'active' : '' }}">
                                    <i class="icon-calculator2"></i>
                                    <span>
                                        Calorie Intake
                                    </span>
                                </a>
                            </li>
                        --}}
                        @endcan
                        @can('Driver')
                            <li class="nav-item">
                                <a href="{{ route('driver.index') }}"
                                    class="nav-link {{ request()->routeIs('driver.*') ? 'active' : '' }}">
                                    <i class="icon-file-text"></i>
                                    <span>
                                        Profile
                                    </span>
                                </a>
                            </li>
                        @endcan
                        @can('Lab Technician')
                            <li class="nav-item">
                                <a href="{{ route('uploadreport.index') }}"
                                    class="nav-link {{ request()->routeIs('uploadreport.*') ? 'active' : '' }}">
                                    <i class="icon-file-text"></i>
                                    <span>
                                        Test Report Entry
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('medicalreport.index') }}"
                                    class="nav-link {{ request()->routeIs('medicalreport.*') ? 'active' : '' }}">
                                    <i class="icon-file-text"></i>
                                    <span>
                                        Pathology Report
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('rejectReport.index') }}"
                                    class="nav-link {{ request()->routeIs('rejectReport.*') ? 'active' : '' }}">
                                    <i class="icon-file-text"></i>
                                    <span>
                                        Rejected Pathology Report
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('labtestbookings.index') }}"
                                    class="nav-link {{ request()->routeIs('labtestbookings.*') ? 'active' : '' }}">
                                    <i class="icon-box"></i>
                                    <span>
                                        Lab Test Report
                                    </span>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ route('reportPdf.index') }}"
                                    class="nav-link {{ request()->routeIs('reportPdf.*') ? 'active' : '' }}">
                                    <i class="icon-file-text"></i>
                                    <span>
                                        PDF Report
                                    </span>
                                </a>
                            </li> --}}
                        @endcan
                        @if (Helper::is_hr() == 0)
                            @canany(['Employee', 'Admin', 'Superadmin'])
                                <li class="nav-item">
                                    <a href="{{ route('referral.index') }}"
                                        class="nav-link {{ request()->routeIs('referral.*') ? 'active' : '' }}">
                                        <i class="icon-box"></i>
                                        <span>
                                            Refer a Member
                                        </span>
                                    </a>
                                @endcanany
                        @endif
                        @canany(['Superadmin', 'Admin'])
                            <li class="nav-item">
                                <a href="{{ route('company-profile.index') }}"
                                    class="nav-link {{ request()->routeIs('company-profile.*') ? 'active' : '' }}">
                                    <i class="icon-file-text"></i>
                                    <span>
                                        Company / School Profile
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('deactivate.index') }}"
                                    class="nav-link {{ request()->routeIs('deactivate.*') ? 'active' : '' }}">
                                    <i class="icon-file-text"></i>
                                    <span>
                                        Student Deactivation
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('activate.index') }}"
                                    class="nav-link {{ request()->routeIs('activate.*') ? 'active' : '' }}">
                                    <i class="icon-file-text"></i>
                                    <span>
                                        Student Activation
                                    </span>
                                </a>
                            </li>                          
                            <li class="nav-item">
                                <a href="{{ route('screening-recommend-files.index') }}"
                                    class="nav-link {{ request()->routeIs('screening-recommend-files.*') ? 'active' : '' }}">
                                    <i class="icon-file-text"></i>
                                    <span>
                                        Screening Recommend Files
                                    </span>
                                </a>
                            </li>                          
                        @endcanany
                        @can('Nurse')
                            <li class="nav-item">
                                <a href="{{ route('nurse.index') }}"
                                    class="nav-link {{ request()->routeIs('nurse.*') ? 'active' : '' }}">
                                    <i class="icon-user"></i>
                                    <span>
                                        Profile
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('nurseshift.index') }}"
                                    class="nav-link {{ request()->routeIs('nurseshift.*') ? 'active' : '' }}">
                                    <i class="icon-calendar"></i>
                                    <span>
                                        Choose Shift
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('nursebooking.index') }}"
                                    class="nav-link {{ request()->routeIs('nursebooking.*') ? 'active' : '' }}">
                                    <i class="icon-calendar"></i>
                                    <span>
                                        Bookings
                                    </span>
                                </a>
                            </li>
                        @endcan
                        @can('Lab Dept Head')
                            <li class="nav-item">
                                <a href="{{ route('medicalreport.index') }}"
                                    class="nav-link {{ request()->routeIs('medicalreport.*') ? 'active' : '' }}">
                                    <i class="icon-file-text"></i>
                                    <span>
                                        Pathology Report
                                    </span>
                                </a>
                            </li>
                        @endcan
                        @can('Campaign Admin')
                        <li
                        class="nav-item nav-item-submenu {{ request()->routeIs('campaign.*','completedcampaign.*') ? 'nav-item-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ request()->routeIs('campaign.*','completedcampaign.*') ? 'nav-item-open active' : '' }}"><i
                                    class="icon-menu3"></i> <span>Campaigns</span></a>

                            <ul class="nav nav-group-sub" data-submenu-title="Layouts"
                                style="display:{{ request()->routeIs('campaign.*','completedcampaign.*') ? 'block' : 'none' }}">
                                <li class="nav-item">
                                    <a href="{{ route('campaign.index') }}"
                                        class="nav-link {{ request()->routeIs('campaign.*') ? 'active' : '' }}">
                                        <i class="icon-dash"></i>
                                        <span>
                                            Ongoing Campaign
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('completedcampaign.index') }}"
                                        class="nav-link {{ request()->routeIs('completedcampaign.*') ? 'active' : '' }}">
                                        <i class="icon-dash"></i>
                                        <span>
                                            Completed Campaign
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>                         
                        <li
                        class="nav-item nav-item-submenu {{ request()->routeIs('campaignusers.*','completedcampaignusers.*') ? 'nav-item-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ request()->routeIs('campaignusers.*','completedcampaignusers.*') ? 'nav-item-open active' : '' }}"><i
                                    class="icon-menu3"></i> <span>Campaign Users</span></a>

                            <ul class="nav nav-group-sub" data-submenu-title="Layouts"
                                style="display:{{ request()->routeIs('campaignusers.*','completedcampaignusers.*') ? 'block' : 'none' }}">
                                <li class="nav-item">
                                    <a href="{{ route('campaignusers.index') }}"
                                        class="nav-link {{ request()->routeIs('campaignusers.*') ? 'active' : '' }}">
                                        <i class="icon-dash"></i>
                                        <span>
                                            Ongoing
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('completedcampaignusers.index') }}"
                                        class="nav-link {{ request()->routeIs('completedcampaignusers.*') ? 'active' : '' }}">
                                        <i class="icon-dash"></i>
                                        <span>
                                            Completed
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>   
                        @endcan
                        @canany([checkPermission('28'), ['Superadmin', 'Admin']])
                            <li
                                class="nav-item nav-item-submenu {{ request()->routeIs('reportsubject.*', 'reportproblem.*') ? 'nav-item-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('reportsubject.*', 'reportproblem.*') ? 'nav-item-open active' : '' }}"><i
                                        class="icon-menu3"></i> <span> Report Problem</span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="Layouts"
                                    style="display:{{ request()->routeIs('reportsubject.*', 'reportproblem.*') ? 'block' : 'none' }}">
                                    <li class="nav-item">
                                        <a href="{{ route('reportsubject.index') }}"
                                            class="nav-link {{ request()->routeIs('reportsubject.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Report Subject
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('reportproblem.index') }}"
                                            class="nav-link {{ request()->routeIs('reportproblem.*') ? 'active' : '' }}">
                                            <i class="icon-dash"></i>
                                            <span>
                                                Reported Problems
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan
                        <!-- /main -->
                    </ul>
                </div>
                <!-- /main navigation -->

            </div>
            <!-- /sidebar content -->

        </div>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Inner content -->
            <div class="content-inner">

                <!-- Page header -->
                @yield('header')
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">
                    @yield('content')
                </div>
                <!-- /content area -->


                <!-- Footer -->
                <div class="navbar navbar-expand-lg navbar-light border-bottom-0 border-top">
                    <div class="text-center d-lg-none w-100">
                        <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse"
                            data-target="#navbar-footer">
                            <i class="icon-unfold mr-2"></i>
                            Footer
                        </button>
                    </div>

                    <div class="navbar-collapse collapse" id="navbar-footer">
                        <span class="navbar-text py-2">
                            Today Date:
                            <script>
                                document.write(new Date())
                            </script>
                        </span>

                        <ul class="navbar-nav ml-lg-auto">
                            <span class="navbar-text py-2">
                                All Rights Reserved. &copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>
                            </span>
                        </ul>
                    </div>
                </div>
                <!-- /footer -->

            </div>
            <!-- /inner content -->

        </div>
        <!-- /main content -->
        @if (Session::has('success'))
            <p id="pnotify-solid-success" hidden>{{ Session::get('success') }}</p>
        @endif
        @if (Session::has('errors'))
            <p id="pnotify-solid-warning" hidden>{{ Session::get('errors')->first() }}</p>
        @endif
        @if (Session::has('error'))
            <p id="pnotify-solid-warning2" hidden>{{ Session::get('error') }}</p>
        @endif
    </div>
    <!-- /page content -->

    <script src="{{ asset('global_assets/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('global_assets/leaflet/leaflet.js') }}"></script>
    <script src="{{ asset('global_assets/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/extra_pnotify.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/pnotify.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#pnotify-solid-success").trigger('click');
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#pnotify-solid-warning").trigger('click');
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#pnotify-solid-warning2").trigger('click');
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(':input[type="number"]').attr({
                "min": 0
            });
        });
    </script>
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script> --}}
    @yield('custom-script')
    <script src="{{ asset('global_assets/js/demo_pages/form_select2.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/select2.min.js') }}"></script>
</body>

</html>
