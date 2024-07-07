@php
    $route = request()->route()->getName();
@endphp

<!-- loader Start -->
@if ($route == 'posts.index')
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
@endif
<!-- loader END -->
<!-- Wrapper Start -->
<div class="wrapper">

    @include('adminer.dashboard.sidebar')
    @include('adminer.dashboard.navbar')
    @include('adminer.dashboard.rsidebar')

    <div id="content-page" class="content-page">
        <div class="container">

            <div class="row">
                @include('adminer.dashboard.alerte')
                @yield('contents')
            </div>

                <div class="col-sm-12 text-center">
                    <img src="../assets/images/page-img/page-load-loader.gif" alt="loader" style="height: 100px;">
                    {{-- @include('logo') --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Wrapper End-->
<footer class="iq-footer bg-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="../dashboard/privacy-policy.html">Privacy Policy</a></li>
                    <li class="list-inline-item"><a href="../dashboard/terms-of-service.html">Terms of Use</a></li>
                </ul>
            </div>
            <div class="col-lg-6 d-flex justify-content-end">
                Copyright 2020 <a href="#">SocialV</a> All Rights Reserved.
            </div>
        </div>
    </div>
</footer>
