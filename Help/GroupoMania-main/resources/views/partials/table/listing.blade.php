<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Role User Liste</h4>
                <div class="table-responsive">
                    @if ($users->isEmpty())
                        <h1>is Empty</h1>
                    @else
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th> Auteur </th>
                                    <th> Email </th>
                                    {{-- <th> Auteur </th> --}}
                                    <th> Role </th>
                                    <th> Status </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <img src="{{ $user->image }}" class="me-2" alt="image">
                                            <button  type="button" class="btn btn-link"><a href="{{route('users.show', ['user' => $user->id])}}">{{ $user->name }}</a></button> 
                                        </td>
                                        <td> {{ $user->email }} </td>
                                        {{-- <td>
                                            <label class="badge badge-gradient-success">DONE</label>
                                            {{ $post->user->name }}
                                        </td> --}}
                                        <td><label @class([
                                            'badge',
                                            'badge-gradient-success' => $user->role->name === 'admin',
                                            'badge-gradient-warning' => $user->role->name === 'user',
                                            // 'badge-gradient-default' => !in_array($user->role->name, ['admin', 'user']),
                                        ])>
                                                {{ $user->role->name }}
                                            </label>
                                        </td>
                                        <td>
                                            <label @class([
                                            'badge',
                                            'badge-gradient-success' => $user->is_blocked === 0,
                                            'badge-gradient-warning' => $user->is_blocked === 1,
                                            // 'badge-gradient-default' => !in_array($user->role->name, ['admin', 'user']),
                                        ])>
                                                {{ $user->is_blocked ? 'Block' : 'Active' }}
                                            </label>
                                           
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

</div>
@include('components.paginate')
