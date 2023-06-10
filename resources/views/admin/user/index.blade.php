@extends('admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body">
                    <a href="{{route('userCreateAdmin')}}" class="btn btn-outline-success btn-sm mb-4">Create New User</a>

                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($users as $user)
                                <tr>
                                    @if ($user->image_path)
                                        <td class="text-center"><img src="{{Storage::url($user->image_path)}}" class="img-fluid rounded-circle" style="object-fit: cover; width: 40px; height: 40px"/></td>
                                    @else
                                        <td class="text-center"><p>No Image</p></td>
                                    @endif
                                    <td>
                                        <a href="{{ route('userEditAdmin', $user->id) }}">
                                            {{ $user->name }}{{' '}}{{ $user->lastname }}
                                        </a>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ \Illuminate\Support\Carbon::instance($user->created_at) }}</td>
                                    <td>
                                        <form action="{{ route('userDestroyAdmin', $user->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit" name="Delete">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>


                    <div class="row mt-3 text-center">
                        <div class="col-lg-12">
                            <div class="d-inline-block">
                                <ul class="pagination pagination-rounded mb-0">
                                    {{$users->links()}}
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
