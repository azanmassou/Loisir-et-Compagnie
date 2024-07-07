<div class="row">
    <div class="col-8 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">La liste des roles</h4>
                <div class="table-responsive">
                    @if ($roles->isEmpty())
                        <div class="alert alert-solid alert-warning d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                                <use xlink:href="#exclamation-triangle-fill"></use>
                            </svg>
                            <div>
                                Aucun role n'est disponible pour le moment. La base de données est vide.
                            </div>
                        </div>
                    @else
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> name </th>
                                     <th> Users </th>
                                    <th> Update </th>
                                    <th> Delete</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>
                                        
                                            {{$role->id}}
                                        </td>
                                        <td>
            
                                           <label @class([
                                                'badge',
                                                'badge-gradient-success' => $role->name === 'admin',
                                                'badge-gradient-warning' => $role->name === 'user',
                                                'badge-gradient-secondary' => $role->name === 'root',
                                                'badge-gradient-primary' => !in_array($role->name, ['admin', 'user','root']),
                                            ])>
                                                {{  $role->name  }}
                                            </label>
                                        </td>
                                        <td>
                                           <a href="{{route('users.listing', ['role' => $role->id ])}}">listing</a>
                                        </td>
                                        <td>
                                           
                                           
                                              <form action="{{ route('roles.edit', ['role' => $role->id]) }}"
                                                        method="post">
                                                        @method("PATCH")
                                                        @csrf
                                                       
                                                         <button type="submit"
                                                            class="btn btn-sm btn-outline-warning btn-icon-text">
                                                            <i class="mdi mdi-reload btn-icon-prepend"></i> Update
                                                        </button>
                                                    </form>

                                        </td>
                                        <td>
                                         <form action="{{ route('roles.destroy', ['role' => $role->id]) }}"
                                                        method="post">
                                                        @method("DELETE")
                                                        @csrf
                                                       
                                                         <button type="submit"
                                                            class="btn btn-sm btn-outline-danger btn-icon-text">
                                                            <i class="mdi mdi-reload btn-icon-prepend"></i> Delete
                                                        </button>
                                                    </form>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>

    </div>
    <div class="col-4 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Role</h4>
               
                <form action="{{ route('roles.store') }}"
                                                        method="post">
                                                        @csrf
                                                        <div class="form-group">
    {{-- <label for="name">Role</label> --}}
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
        value="{{ old('name')  }}" placeholder="Eg : Admin">
    <div id="name" class="invalid-feedback">
        {{ $errors->first('name') }}
    </div>
</div>
                                                        <button type="submit" classe="btn btn-primary"> Submit
                                                        </button>
                                                    </form>
            </div>
        </div>

    </div>
</div>
@include('components.paginate')
