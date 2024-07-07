{{-- @extends('layout') --}}

<head>

    {{-- <script defer="" referrerpolicy="origin"
        src="/cdn-cgi/zaraz/s.js?z=JTdCJTIyZXhlY3V0ZWQlMjIlM0ElNUIlNUQlMkMlMjJ0JTIyJTNBJTIyQWRtaW5MVEUlMjAzJTIwJTdDJTIwRGFzaGJvYXJkJTIwMyUyMiUyQyUyMnglMjIlM0EwLjY0MjU0OTU4NzY5NjE3MDklMkMlMjJ3JTIyJTNBMTM2NiUyQyUyMmglMjIlM0E3NjglMkMlMjJqJTIyJTNBNTk5JTJDJTIyZSUyMiUzQTEzNjYlMkMlMjJsJTIyJTNBJTIyaHR0cHMlM0ElMkYlMkZhZG1pbmx0ZS5pbyUyRnRoZW1lcyUyRnYzJTJGaW5kZXgzLmh0bWwlMjIlMkMlMjJyJTIyJTNBJTIyaHR0cHMlM0ElMkYlMkZhZG1pbmx0ZS5pbyUyRnRoZW1lcyUyRnYzJTJGcGFnZXMlMkZleGFtcGxlcyUyRjQwNC5odG1sJTIyJTJDJTIyayUyMiUzQTI0JTJDJTIybiUyMiUzQSUyMlVURi04JTIyJTJDJTIybyUyMiUzQS02MCUyQyUyMnElMjIlM0ElNUIlNUQlN0Q=">
    </script>
    <script nonce="0920d450-ac91-4c17-9772-6d27522109f9">
        try {
            (function(w, d) {
                ! function(du, dv, dw, dx) {
                    du[dw] = du[dw] || {};
                    du[dw].executed = [];
                    du.zaraz = {
                        deferred: [],
                        listeners: []
                    };
                    du.zaraz.q = [];
                    du.zaraz._f = function(dy) {
                        return async function() {
                            var dz = Array.prototype.slice.call(arguments);
                            du.zaraz.q.push({
                                m: dy,
                                a: dz
                            })
                        }
                    };
                    for (const dA of ["track", "set", "debug"]) du.zaraz[dA] = du.zaraz._f(dA);
                    du.zaraz.init = () => {
                        var dB = dv.getElementsByTagName(dx)[0],
                            dC = dv.createElement(dx),
                            dD = dv.getElementsByTagName("title")[0];
                        dD && (du[dw].t = dv.getElementsByTagName("title")[0].text);
                        du[dw].x = Math.random();
                        du[dw].w = du.screen.width;
                        du[dw].h = du.screen.height;
                        du[dw].j = du.innerHeight;
                        du[dw].e = du.innerWidth;
                        du[dw].l = du.location.href;
                        du[dw].r = dv.referrer;
                        du[dw].k = du.screen.colorDepth;
                        du[dw].n = dv.characterSet;
                        du[dw].o = (new Date).getTimezoneOffset();
                        if (du.dataLayer)
                            for (const dH of Object.entries(Object.entries(dataLayer).reduce(((dI, dJ) => ({
                                    ...dI[1],
                                    ...dJ[1]
                                })), {}))) zaraz.set(dH[0], dH[1], {
                                scope: "page"
                            });
                        du[dw].q = [];
                        for (; du.zaraz.q.length;) {
                            const dK = du.zaraz.q.shift();
                            du[dw].q.push(dK)
                        }
                        dC.defer = !0;
                        for (const dL of [localStorage, sessionStorage]) Object.keys(dL || {}).filter((dN => dN
                            .startsWith("_zaraz_"))).forEach((dM => {
                            try {
                                du[dw]["z_" + dM.slice(7)] = JSON.parse(dL.getItem(dM))
                            } catch {
                                du[dw]["z_" + dM.slice(7)] = dL.getItem(dM)
                            }
                        }));
                        dC.referrerPolicy = "origin";
                        dC.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(du[dw])));
                        dB.parentNode.insertBefore(dC, dB)
                    };
                    ["complete", "interactive"].includes(dv.readyState) ? zaraz.init() : du.addEventListener(
                        "DOMContentLoaded", zaraz.init)
                }(w, d, "zarazData", "script");
            })(window, document)
        } catch (e) {
            throw fetch("/cdn-cgi/zaraz/t"), e;
        };
    </script>
    <style type="text/css">
        /* Chart.js */
        @keyframes chartjs-render-animation {
            from {
                opacity: .99
            }

            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            animation: chartjs-render-animation 1ms
        }

        .chartjs-size-monitor,
        .chartjs-size-monitor-expand,
        .chartjs-size-monitor-shrink {
            position: absolute;
            direction: ltr;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            pointer-events: none;
            visibility: hidden;
            z-index: -1
        }

        .chartjs-size-monitor-expand>div {
            position: absolute;
            width: 1000000px;
            height: 1000000px;
            left: 0;
            top: 0
        }

        .chartjs-size-monitor-shrink>div {
            position: absolute;
            width: 200%;
            height: 200%;
            left: 0;
            top: 0
        }
    </style> --}}

</head>

<body class="sidebar-mini sidebar-closed sidebar-collapse" style="height: auto;">

    <div class="wrapper">

        {{-- <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">

                            <div class="media">
                                <img src="dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">

                            <div class="media">
                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">

                            <div class="media">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav> --}}


        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            {{-- <a href="index3.html" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Index</span>
            </a> --}}

            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>

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
                    <div class="sidebar-search-results">
                        <div class="list-group"><a href="#" class="list-group-item">
                                <div class="search-title"><strong class="text-light"></strong>N<strong
                                        class="text-light"></strong>o<strong class="text-light"></strong> <strong
                                        class="text-light"></strong>e<strong class="text-light"></strong>l<strong
                                        class="text-light"></strong>e<strong class="text-light"></strong>m<strong
                                        class="text-light"></strong>e<strong class="text-light"></strong>n<strong
                                        class="text-light"></strong>t<strong class="text-light"></strong> <strong
                                        class="text-light"></strong>f<strong class="text-light"></strong>o<strong
                                        class="text-light"></strong>u<strong class="text-light"></strong>n<strong
                                        class="text-light"></strong>d<strong class="text-light"></strong>!<strong
                                        class="text-light"></strong></div>
                                <div class="search-path"></div>
                            </a></div>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item menu-open">
                            <a href="{{ route('users.index') }}" class="nav-link active">
                                {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                                <p class="mx-5">
                                    Utilisateurs
                                    {{-- <i class="right fas fa-angle-left"></i> --}}
                                </p>
                            </a>
                            {{-- <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./index.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./index2.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./index3.html" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v3</p>
                                    </a>
                                </li>
                            </ul> --}}
                        </li>

                    </ul>
                </nav>

            </div>

        </aside>

        <div class="content-wrapper" style="min-height: 2128.12px;">

            <div class="content-header">
                <div class="container-fluid">
                    {{-- <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard v3</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v3</li>
                            </ol>
                        </div>
                    </div> --}}
                    @yield('contents-title')
                </div>
            </div>


            <div class="content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="card">
                                {{-- <div class="card-header border-0">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title">Online Store Visitors</h3>
                                        <a href="javascript:void(0);">View Report</a>
                                    </div>
                                </div>
                                <div class="card-body"> --}}

                                @yield('contents')
                                
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg">820</span>
                                        <span>Visitors Over Time</span>
                                    </p>
                                    <p class="ml-auto d-flex flex-column text-right">
                                        <span class="text-success">
                                            <i class="fas fa-arrow-up"></i> 12.5%
                                        </span>
                                        <span class="text-muted">Since last week</span>
                                    </p>
                                </div>

                                <div class="position-relative mb-4">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="visitors-chart" height="400" width="918"
                                        style="display: block; width: 459px; height: 200px;"
                                        class="chartjs-render-monitor"></canvas>
                                </div>
                                <div class="d-flex flex-row justify-content-end">
                                    <span class="mr-2">
                                        <i class="fas fa-square text-primary"></i> This Week
                                    </span>
                                    <span>
                                        <i class="fas fa-square text-gray"></i> Last Week
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title">Products</h3>
                                <div class="card-tools">
                                    <a href="#" class="btn btn-tool btn-sm">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    <a href="#" class="btn btn-tool btn-sm">
                                        <i class="fas fa-bars"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Sales</th>
                                            <th>More</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="dist/img/default-150x150.png" alt="Product 1"
                                                    class="img-circle img-size-32 mr-2">
                                                Some Product
                                            </td>
                                            <td>$13 USD</td>
                                            <td>
                                                <small class="text-success mr-1">
                                                    <i class="fas fa-arrow-up"></i>
                                                    12%
                                                </small>
                                                12,000 Sold
                                            </td>
                                            <td>
                                                <a href="#" class="text-muted">
                                                    <i class="fas fa-search"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="dist/img/default-150x150.png" alt="Product 1"
                                                    class="img-circle img-size-32 mr-2">
                                                Another Product
                                            </td>
                                            <td>$29 USD</td>
                                            <td>
                                                <small class="text-warning mr-1">
                                                    <i class="fas fa-arrow-down"></i>
                                                    0.5%
                                                </small>
                                                123,234 Sold
                                            </td>
                                            <td>
                                                <a href="#" class="text-muted">
                                                    <i class="fas fa-search"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="dist/img/default-150x150.png" alt="Product 1"
                                                    class="img-circle img-size-32 mr-2">
                                                Amazing Product
                                            </td>
                                            <td>$1,230 USD</td>
                                            <td>
                                                <small class="text-danger mr-1">
                                                    <i class="fas fa-arrow-down"></i>
                                                    3%
                                                </small>
                                                198 Sold
                                            </td>
                                            <td>
                                                <a href="#" class="text-muted">
                                                    <i class="fas fa-search"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="dist/img/default-150x150.png" alt="Product 1"
                                                    class="img-circle img-size-32 mr-2">
                                                Perfect Item
                                                <span class="badge bg-danger">NEW</span>
                                            </td>
                                            <td>$199 USD</td>
                                            <td>
                                                <small class="text-success mr-1">
                                                    <i class="fas fa-arrow-up"></i>
                                                    63%
                                                </small>
                                                87 Sold
                                            </td>
                                            <td>
                                                <a href="#" class="text-muted">
                                                    <i class="fas fa-search"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    {{-- <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title">Sales</h3>
                                        <a href="javascript:void(0);">View Report</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex">
                                        <p class="d-flex flex-column">
                                            <span class="text-bold text-lg">$18,230.00</span>
                                            <span>Sales Over Time</span>
                                        </p>
                                        <p class="ml-auto d-flex flex-column text-right">
                                            <span class="text-success">
                                                <i class="fas fa-arrow-up"></i> 33.1%
                                            </span>
                                            <span class="text-muted">Since last month</span>
                                        </p>
                                    </div>

                                    <div class="position-relative mb-4">
                                        <div class="chartjs-size-monitor">
                                            <div class="chartjs-size-monitor-expand">
                                                <div class=""></div>
                                            </div>
                                            <div class="chartjs-size-monitor-shrink">
                                                <div class=""></div>
                                            </div>
                                        </div>
                                        <canvas id="sales-chart" height="400" width="918"
                                            style="display: block; width: 459px; height: 200px;"
                                            class="chartjs-render-monitor"></canvas>
                                    </div>
                                    <div class="d-flex flex-row justify-content-end">
                                        <span class="mr-2">
                                            <i class="fas fa-square text-primary"></i> This year
                                        </span>
                                        <span>
                                            <i class="fas fa-square text-gray"></i> Last year
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header border-0">
                                    <h3 class="card-title">Online Store Overview</h3>
                                    <div class="card-tools">
                                        <a href="#" class="btn btn-sm btn-tool">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-tool">
                                            <i class="fas fa-bars"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                        <p class="text-success text-xl">
                                            <i class="ion ion-ios-refresh-empty"></i>
                                        </p>
                                        <p class="d-flex flex-column text-right">
                                            <span class="font-weight-bold">
                                                <i class="ion ion-android-arrow-up text-success"></i> 12%
                                            </span>
                                            <span class="text-muted">CONVERSION RATE</span>
                                        </p>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                        <p class="text-warning text-xl">
                                            <i class="ion ion-ios-cart-outline"></i>
                                        </p>
                                        <p class="d-flex flex-column text-right">
                                            <span class="font-weight-bold">
                                                <i class="ion ion-android-arrow-up text-warning"></i> 0.8%
                                            </span>
                                            <span class="text-muted">SALES RATE</span>
                                        </p>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mb-0">
                                        <p class="text-danger text-xl">
                                            <i class="ion ion-ios-people-outline"></i>
                                        </p>
                                        <p class="d-flex flex-column text-right">
                                            <span class="font-weight-bold">
                                                <i class="ion ion-android-arrow-down text-danger"></i> 1%
                                            </span>
                                            <span class="text-muted">REGISTRATION RATE</span>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div> --}}



                </div>


            </div>

        </div>

    </div>


    {{-- <aside class="control-sidebar control-sidebar-dark" style="display: none;">

            <div class="p-3 control-sidebar-content" style="">
                <h5>Customize AdminLTE</h5>
                <hr class="mb-2">
                <div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>Dark Mode</span>
                </div>
                <h6>Header Options</h6>
                <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Fixed</span></div>
                <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Dropdown Legacy
                        Offset</span></div>
                <div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>No border</span>
                </div>
                <h6>Sidebar Options</h6>
                <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Collapsed</span>
                </div>
                <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Fixed</span></div>
                <div class="mb-1"><input type="checkbox" value="1" checked="checked"
                        class="mr-1"><span>Sidebar Mini</span></div>
                <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar Mini
                        MD</span></div>
                <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar Mini
                        XS</span></div>
                <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav Flat Style</span>
                </div>
                <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav Legacy
                        Style</span></div>
                <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav Compact</span>
                </div>
                <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav Child
                        Indent</span></div>
                <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav Child Hide on
                        Collapse</span></div>
                <div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>Disable Hover/Focus
                        Auto-Expand</span></div>
                <h6>Footer Options</h6>
                <div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>Fixed</span></div>
                <h6>Small Text Options</h6>
                <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Body</span></div>
                <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Navbar</span></div>
                <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Brand</span></div>
                <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar Nav</span>
                </div>
                <div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>Footer</span></div>
                <h6>Navbar Variants</h6>
                <div class="d-flex"><select class="custom-select mb-3 text-light border-0 bg-white">
                        <option class="bg-primary">Primary</option>
                        <option class="bg-secondary">Secondary</option>
                        <option class="bg-info">Info</option>
                        <option class="bg-success">Success</option>
                        <option class="bg-danger">Danger</option>
                        <option class="bg-indigo">Indigo</option>
                        <option class="bg-purple">Purple</option>
                        <option class="bg-pink">Pink</option>
                        <option class="bg-navy">Navy</option>
                        <option class="bg-lightblue">Lightblue</option>
                        <option class="bg-teal">Teal</option>
                        <option class="bg-cyan">Cyan</option>
                        <option class="bg-dark">Dark</option>
                        <option class="bg-gray-dark">Gray dark</option>
                        <option class="bg-gray">Gray</option>
                        <option class="bg-light">Light</option>
                        <option class="bg-warning">Warning</option>
                        <option class="bg-white">White</option>
                        <option class="bg-orange">Orange</option>
                    </select></div>
                <h6>Accent Color Variants</h6>
                <div class="d-flex"></div><select class="custom-select mb-3 border-0">
                    <option>None Selected</option>
                    <option class="bg-primary">Primary</option>
                    <option class="bg-warning">Warning</option>
                    <option class="bg-info">Info</option>
                    <option class="bg-danger">Danger</option>
                    <option class="bg-success">Success</option>
                    <option class="bg-indigo">Indigo</option>
                    <option class="bg-lightblue">Lightblue</option>
                    <option class="bg-navy">Navy</option>
                    <option class="bg-purple">Purple</option>
                    <option class="bg-fuchsia">Fuchsia</option>
                    <option class="bg-pink">Pink</option>
                    <option class="bg-maroon">Maroon</option>
                    <option class="bg-orange">Orange</option>
                    <option class="bg-lime">Lime</option>
                    <option class="bg-teal">Teal</option>
                    <option class="bg-olive">Olive</option>
                </select>
                <h6>Dark Sidebar Variants</h6>
                <div class="d-flex"></div><select class="custom-select mb-3 text-light border-0 bg-primary">
                    <option>None Selected</option>
                    <option class="bg-primary">Primary</option>
                    <option class="bg-warning">Warning</option>
                    <option class="bg-info">Info</option>
                    <option class="bg-danger">Danger</option>
                    <option class="bg-success">Success</option>
                    <option class="bg-indigo">Indigo</option>
                    <option class="bg-lightblue">Lightblue</option>
                    <option class="bg-navy">Navy</option>
                    <option class="bg-purple">Purple</option>
                    <option class="bg-fuchsia">Fuchsia</option>
                    <option class="bg-pink">Pink</option>
                    <option class="bg-maroon">Maroon</option>
                    <option class="bg-orange">Orange</option>
                    <option class="bg-lime">Lime</option>
                    <option class="bg-teal">Teal</option>
                    <option class="bg-olive">Olive</option>
                </select>
                <h6>Light Sidebar Variants</h6>
                <div class="d-flex"></div><select class="custom-select mb-3 border-0">
                    <option>None Selected</option>
                    <option class="bg-primary">Primary</option>
                    <option class="bg-warning">Warning</option>
                    <option class="bg-info">Info</option>
                    <option class="bg-danger">Danger</option>
                    <option class="bg-success">Success</option>
                    <option class="bg-indigo">Indigo</option>
                    <option class="bg-lightblue">Lightblue</option>
                    <option class="bg-navy">Navy</option>
                    <option class="bg-purple">Purple</option>
                    <option class="bg-fuchsia">Fuchsia</option>
                    <option class="bg-pink">Pink</option>
                    <option class="bg-maroon">Maroon</option>
                    <option class="bg-orange">Orange</option>
                    <option class="bg-lime">Lime</option>
                    <option class="bg-teal">Teal</option>
                    <option class="bg-olive">Olive</option>
                </select>
                <h6>Brand Logo Variants</h6>
                <div class="d-flex"></div><select class="custom-select mb-3 border-0">
                    <option>None Selected</option>
                    <option class="bg-primary">Primary</option>
                    <option class="bg-secondary">Secondary</option>
                    <option class="bg-info">Info</option>
                    <option class="bg-success">Success</option>
                    <option class="bg-danger">Danger</option>
                    <option class="bg-indigo">Indigo</option>
                    <option class="bg-purple">Purple</option>
                    <option class="bg-pink">Pink</option>
                    <option class="bg-navy">Navy</option>
                    <option class="bg-lightblue">Lightblue</option>
                    <option class="bg-teal">Teal</option>
                    <option class="bg-cyan">Cyan</option>
                    <option class="bg-dark">Dark</option>
                    <option class="bg-gray-dark">Gray dark</option>
                    <option class="bg-gray">Gray</option>
                    <option class="bg-light">Light</option>
                    <option class="bg-warning">Warning</option>
                    <option class="bg-white">White</option>
                    <option class="bg-orange">Orange</option><a href="#">clear</a>
                </select>
            </div>
        </aside> --}}

    {{-- <footer class="main-footer">
            <strong>Copyright © 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer> --}}

    <div id="sidebar-overlay"></div>
    </div>



    {{-- <script src="plugins/jquery/jquery.min.js"></script>

    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="dist/js/adminlte.js?v=3.2.0"></script>

    <script src="plugins/chart.js/Chart.min.js"></script>

    <script src="dist/js/demo.js"></script>

    <script src="dist/js/pages/dashboard3.js"></script> --}}


</body>
