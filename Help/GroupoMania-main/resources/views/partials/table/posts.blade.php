<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">La liste des recents postes</h4>
                <div class="table-responsive">
                    @if ($posts->isEmpty())
                        <div class="alert alert-solid alert-warning d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                                <use xlink:href="#exclamation-triangle-fill"></use>
                            </svg>
                            <div>
                                Aucun post n'est disponible pour le moment. La base de données est vide.
                            </div>
                        </div>
                    @else
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th> Auteur </th>
                                    <th> Title </th>
                                    <th> Status </th>
                                    <th> Last Update </th>
                                    <th> Options </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>
                                            <img src="{{ $post->image }}" class="me-2" alt="image">
                                            <button type="button" class="btn btn-link">{{ $post->user->name }}</button>
                                        </td>
                                        <td>

                                            <button 
                                                class="btn btn-link btn-sm"><a href="{{route('posts.show', ['post' => $post->id])}}">Voir le Post</a></button>
                                        </td>
                                        <td>
                                            <label @class([
                                                'badge',
                                                'badge-gradient-success' => $post->is_blocked === 0,
                                                'badge-gradient-danger' => $post->is_blocked === 1,
                                                // 'badge-gradient-default' => !in_array($user->role->name, ['admin', 'user']),
                                            ])>
                                                {{ $post->is_blocked ? 'block' : 'active' }}
                                            </label>
                                            {{-- <label class="badge badge-gradient-success" @class(['p-4', 'font-bold' =>  ])>DONE</label> --}}

                                        </td>
                                        <td><i
                                                class="mdi mdi-clock icon-sm me-2"></i>{{ $post->created_at->diffForHumans() }}
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-2 mx-4">

                                                    <form action="{{ route('posts.block', ['post' => $post->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit" {{-- class="btn btn-sm btn-outline-danger btn-icon-text" --}}
                                                            @class([
                                                                'btn btn-sm btn-icon-text',
                                                                'btn-outline-danger' => $post->is_blocked === 0,
                                                                'btn-outline-success' => $post->is_blocked === 1,
                                                                // 'badge-gradient-default' => !in_array($user->role->name, ['admin', 'user']),
                                                            ])>
                                                            <i class="mdi mdi-reload btn-icon-prepend"></i>
                                                            {{ $post->is_blocked ? 'On' : 'Off' }}
                                                        </button>
                                                    </form>

                                                </div>
                                                <div class="col-sm-2 mx-4">
                                                    <form action="{{ route('posts.destroy', ['post' => $post->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button type="submit"
                                                            class="btn btn-sm btn-outline-danger btn-icon-text">
                                                            <i class="mdi mdi-reload btn-icon-prepend"></i> Delete
                                                        </button>
                                                    </form>

                                                </div>
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
