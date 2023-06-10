@extends('admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{route('userUpdateAdmin', $user->id)}}">
                        @csrf
                        @method('PUT')

                        <div class="col-sm-12 text-center">
                            <div class="mb-2">
                                <img class="rounded-circle shadow" alt="{{$user->name}}" src="{{$user->image_path ? Storage::url($user->image_path) : 'No Image' }}" data-holder-rendered="true" height="200px" width="200px" style="object-fit: cover;">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">First Name</label>
                            <div class="col-sm-6">
                                <input type="text" name="name" class="form-control" value="{{$user->name}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Last Name</label>
                            <div class="col-sm-6">
                                <input type="text" name="surname" class="form-control" value="{{$user->lastname}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-6">
                                <input type="text" name="email" class="form-control" value="{{$user->email}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-6">
                                <input type="text" name="password" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">National Code</label>
                            <div class="col-sm-6">
                                <input type="text" name="national_code" class="form-control" value="{{$user->national_code}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Phone Number</label>
                            <div class="col-sm-6">
                                <input type="number" name="phonenumber" class="form-control" value="{{$user->phonenumber}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Gender</label>
                            <div class="col-sm-6">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="" disabled selected>choose...</option>
                                    <option value="Male" {{ $user->gender == 'Male' ? 'selected' : ''}}>Male</option>
                                    <option value="Female" {{ $user->gender == 'Female' ? 'selected' : ''}}>Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Upload Image</label>
                            <div class="col-sm-10">
                                <input type="file" name="avatar" class="form-control round-input">
                            </div>
                        </div>

                        <div class="col-lg-offset-2 col-lg-10 mt-4">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
