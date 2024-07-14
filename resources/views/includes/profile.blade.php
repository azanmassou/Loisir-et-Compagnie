<div class="container emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog"
                        alt="Profile Image" />
                    <div class="file btn btn-lg btn-primary">
                        Change Photo
                        <input type="file" name="file" />
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>@yield('profile-name')</h5>
                    <h5>@yield('profile-detail')</h5>
                    {{-- <h6>Web Developer and Designer</h6> --}}
                    <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                    @yield('profile-line')
                </div>
            </div>
            <div class="col-md-2 text-end">
                
                @component('components.dropdown')

                    @slot('slot')
                        @yield('dropdown-li')
                    @endslot
                    
                @endcomponent

            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                @yield('profile-left')
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    @yield('profile-data')
                </div>
            </div>
        </div>
    </form>
</div>
