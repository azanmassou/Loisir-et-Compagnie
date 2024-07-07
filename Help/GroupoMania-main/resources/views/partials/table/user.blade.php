<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title"><i class="mdi mdi-account-outline"></i>{{ $user->name }}</h4>

                <div class="row">



                    <div class="dropdown-divider"></div>
                </div>

                <div class="row">
                    <div class="col-lg-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">

                               

                                    <a href="#" class="nav-link">
                                        <div class="nav-profile-image img-fluid">
                                            <img src="{{ asset('masterDashboard/assets/images/faces/face1.jpg') }}" alt="profile">
                                            {{-- <span class="login-status online"></span> --}}
                                            <!--change to offline or busy as needed-->
                                        </div>
                                        {{-- <div class="nav-profile-text d-flex flex-column">
                                            <span class="font-weight-bold mb-2">David Grey. H</span>
                                            <span class="text-secondary text-small">Project Manager</span>
                                        </div> --}}
                                        {{-- <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i> --}}
                                    </a>
            
                               
                                <div class="dropdown-divider"></div>

                               

                                <h4 class="card-title">Actions <label @class([
                                    'badge',
                                    'badge-gradient-success' => $user->role->name === 'admin',
                                    'badge-gradient-warning' => $user->role->name === 'user',
                                    'badge-gradient-info' => $user->role->name === 'root',
                                    'badge-gradient-primary' => !in_array($user->role->name, ['admin', 'user','root']),
                                ])>
                                        {{ $user->role->name }}
                                    </label> </h4>
                                <div class="d-flex">
                                    <form action="{{ route('users.block', ['user' => $user->id]) }}" method="post">
                                        @csrf
                                        <button type="submit"
                                            class="btn mx-1 btn-sm btn-outline-warning btn-icon-text">
                                            <i class="mdi mdi-alert btn-icon-prepend"></i> Bannir </button>
                                    </form>
                                    <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger btn-icon-text">
                                            <i class="mdi mdi-reload btn-icon-prepend"></i> Delete
                                        </button>
                                    </form>
                                </div>

                                {{-- <div class="d-flex">
                                    <em> <i class="mdi mdi-email btn-icon-prepend">
                                        </i> {{ $user->email }}</em>
                                </div>
                                <div class="d-flex">
                                    <em><i class="mdi mdi-clock icon-sm me-2"></i> {{ $user->created_at }}</em>
                                </div> --}}

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="my-1">
                                    <div class="d-flex align-content-center my-3">
                                        <em> <i class="mdi mdi-email btn-icon-prepend">
                                            </i> {{ $user->email }}</em>
                                    </div>
                                    <div class="d-flex align-content-center my-3">
                                        <em><i class="mdi mdi-clock icon-sm me-2"></i> {{ $user->created_at->diffForHumans() }}</em>
                                    </div>
                                </div>
                                <h3> Roling</h3>
                                <form action="{{ route('users.admining', ['user' => $user->id]) }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <select name="role" id="role"
                                            class="form-control @error('role') is-invalid @enderror">
                                            <option value="">Choose .... Role</option>
                                            @foreach ($roles as $role)
                                                <option class="form-control @error('role') is-invalid @enderror "
                                                    value="{{ $role->id }}"
                                                    {{ $user->role->id === $role->id ? 'selected' : '' }}>
                                                    {{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        <div id="role" class="invalid-feedback">
                                            {{ $errors->first('role') }}
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-outline-success btn-icon-text">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="drowpdown-divider"></div>

                    </div>
                </div>

            </div>
        </div>

    </div>

</div>
