<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Web portal</title>

    <meta name="description" content="Welcome to the future">
    <meta name="author" content="James">
    <meta name="robots" content="noindex, nofollow">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts and Styles -->
    @yield('css_before')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
    <link rel="stylesheet" href="{{ asset('css/dashmix.css') }}">

    <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
<!-- <link rel="stylesheet" href="{{ asset('css/themes/xwork.css') }}"> -->

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
@yield('css_after')

<!-- Scripts -->
    <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
</head>
<body>
<!-- Page Container -->
<!--
    Available classes for #page-container:

GENERIC

    'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Template._uiHandleTheme())

SIDEBAR & SIDE OVERLAY

    'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
    'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
    'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
    'sidebar-dark'                              Dark themed sidebar

    'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
    'side-overlay-o'                            Visible Side Overlay by default

    'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

    'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

HEADER

    ''                                          Static Header if no class is added
    'page-header-fixed'                         Fixed Header


Footer

    ''                                          Static Footer if no class is added
    'page-footer-fixed'                         Fixed Footer (please have in mind that the footer has a specific height when is fixed)

HEADER STYLE

    ''                                          Classic Header style if no class is added
    'page-header-dark'                          Dark themed Header
    'page-header-glass'                         Light themed Header with transparency by default
                                                (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
    'page-header-glass page-header-dark'         Dark themed Header with transparency by default
                                                (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

MAIN CONTENT LAYOUT

    ''                                          Full width Main Content if no class is added
    'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
    'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
-->
<div id="page-container"
     class="sidebar-o enable-page-overlay side-scroll page-header-fixed page-header-dark main-content-narrow">

    <!-- Sidebar -->
    <!--
        Sidebar Mini Mode - Display Helper classes

        Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
        Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
            If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

        Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
        Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
        Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
    -->
    <nav id="sidebar" aria-label="Main Navigation">
        <!-- Side Header -->
        <div class="bg-header-dark">
            <div class="content-header bg-white-10" style="display: flex; justify-content: center;">
                <!-- Logo -->
                <a class="font-w600 font-size-lg text-white" href="{{url('/')}}">
                            <span class="smini-visible">
                                <span class="text-white-75">W</span><span class="text-white">p</span>
                            </span>
                    <span class="smini-hidden">
                                <img src="{{asset('/media/logo-white.png')}}" style="width: 100px;">
                            </span>
                </a>
                <!-- END Logo -->

            </div>
        </div>
        <!-- END Side Header -->

        <!-- Side Navigation -->
        <div class="content-side content-side-full">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('dashboard*') ? ' active' : '' }}" href="{{url('/dashboard')}}">
                        <i class="nav-main-link-icon si si-cursor"></i>
                        <span class="nav-main-link-name">@lang('messages.Dashboard')</span>
                    </a>
                </li>
                @if(Session::get('user-type')===1)
                    <li class="nav-main-heading">@lang('messages.User Management')</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('salesperson*') ? ' active' : '' }}"
                           href="{{url('/salesperson')}}">
                            <i class="nav-main-link-icon si si-user"></i>
                            <span class="nav-main-link-name">@lang('messages.Salesperson')</span>
                        </a>
                    </li>
                @elseif(Session::get('user-type')===2)
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('customer*') ? ' active' : '' }}"
                           href="{{url('/customer')}}">
                            <i class="nav-main-link-icon si si-user"></i>
                            <span class="nav-main-link-name">@lang('messages.Customers')</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('domain*') ? ' active' : '' }}"
                           href="{{url('/domains')}}">
                            <i class="nav-main-link-icon si si-globe"></i>
                            <span class="nav-main-link-name">@lang('messages.Domains')</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('product*') ? ' active' : '' }}"
                           href="{{url('/products')}}">
                            <i class="nav-main-link-icon si si-puzzle"></i>
                            <span class="nav-main-link-name">@lang('messages.Products')</span>
                        </a>
                    </li>
                @elseif(Session::get('user-type')===3)
                    <li class="nav-main-heading">@lang('messages.Base')</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('domain*') ? ' active' : '' }}"
                           href="{{url('/domains')}}">
                            <i class="nav-main-link-icon si si-globe"></i>
                            <span class="nav-main-link-name">@lang('messages.Domains')</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('product*') ? ' active' : '' }}"
                           href="{{url('/products')}}">
                            <i class="nav-main-link-icon si si-puzzle"></i>
                            <span class="nav-main-link-name">@lang('messages.Products')</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">@lang('messages.Filter')</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('statistics*') ? ' active' : '' }}"
                           href="{{url('/statistics')}}">
                            <i class="nav-main-link-icon si si-pie-chart"></i>
                            <span class="nav-main-link-name">@lang('messages.Statistics')</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('search*') ? ' active' : '' }}"
                           href="{{url('/search')}}">
                            <i class="nav-main-link-icon si si-magnifier"></i>
                            <span class="nav-main-link-name">@lang('messages.Search')</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">@lang('messages.Settings')</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('whitelist*') ? ' active' : '' }}"
                           href="{{url('/whitelist')}}">
                            <i class="nav-main-link-icon fa fa-list"></i>
                            <span class="nav-main-link-name">@lang('messages.Whitelist')</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('blacklist*') ? ' active' : '' }}"
                           href="{{url('/blacklist')}}">
                            <i class="nav-main-link-icon fa fa-list-alt"></i>
                            <span class="nav-main-link-name">@lang('messages.Blacklist')</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <!-- END Side Navigation -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
            <!-- Left Section -->
            <div>
                <!-- Toggle Sidebar -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                <button type="button" class="btn btn-dual mr-1" data-toggle="layout" data-action="sidebar_toggle">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
                <!-- END Toggle Sidebar -->
            </div>
            <!-- END Left Section -->

            <!-- Right Section -->
            <div>
                <!-- User Dropdown -->
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-user d-sm-none"></i>
                        <span class="d-none d-sm-inline-block">{{Session::get('user')->email}}</span>
                        <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                        <div class="bg-primary-darker rounded-top font-w600 text-white text-center p-3">
                            @lang('messages.User Options')
                        </div>
                        <div class="p-2">
                            <a class="dropdown-item" href="{{url('/profile')}}">
                                <i class="far fa-fw fa-user mr-1"></i> @lang('messages.Profile')
                            </a>
                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{url('/logout')}}">
                                <i class="far fa-fw fa-arrow-alt-circle-left mr-1"></i> @lang('messages.Sign Out')
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END User Dropdown -->

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-user d-sm-none"></i>
                        <span class="d-none d-sm-inline-block">{{Session::get('locale') ? Session::get('locale') : 'en'}}</span>
                        <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                        <div class="p-2">
                            <a class="dropdown-item" href="{{url('/locale/en')}}">
                                EN
                            </a>
                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{url('/locale/de')}}">
                                DE
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <!-- END Right Section -->
        </div>
        <!-- END Header Content -->

        <!-- Header Loader -->
        <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
        <div id="page-header-loader" class="overlay-header bg-primary-darker">
            <div class="content-header">
                <div class="w-100 text-center">
                    <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
                </div>
            </div>
        </div>
        <!-- END Header Loader -->
    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">
        @yield('content')
    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer" class="bg-body-light">
        <div class="content py-0">
            <div class="row font-size-sm">
                <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-right">

                </div>
                <div class="col-sm-6 order-sm-1 text-center text-sm-left">

                </div>
            </div>
        </div>
    </footer>
    <!-- END Footer -->
</div>
<!-- END Page Container -->

<!-- Dashmix Core JS -->
<script src="{{ asset('js/dashmix.app.js') }}"></script>

<!-- Laravel Scaffolding JS -->
<script src="{{ asset('js/laravel.app.js') }}"></script>

<script>window.baseUrl = '{{url('/')}}';</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@yield('js_after')
</body>
</html>
