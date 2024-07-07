<div class="card-header">
    <h3 class="card-title">@yield('card-title')</h3>
    <div class="card-tools">
        {{-- <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            <a href="@yield('route')" class="btn btn-primary">Ajouter un @yield('btn-title')</a>
                        </div> --}}
       @if ($user->role->name === 'user')
       <a href="@yield('route')" class="btn btn-primary">Ajouter un @yield('btn-title')</a>
       @endif
    </div>
</div>

@if ($user->role->name === 'admin')
<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <thead>
            <tr>
                <th>#</th>
                <th>@yield('first-title')</th>
                <th>@yield('third-title')</th>
                <th>@yield('second-title')</th>
                <th class="text-end">Actions</th>
               
                

            </tr>
        </thead>
        <tbody>

            @yield('foreach')

        </tbody>
    </table>
</div> 
@endif

@include('components.paginate')

