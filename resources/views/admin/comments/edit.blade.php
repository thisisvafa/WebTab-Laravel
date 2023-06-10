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

                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{route('commentsUpdateAdmin', $comment->id)}}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="col-sm-2 control-label">First Name</label>
                            <div class="col-sm-6">
                                <textarea type="message" name="message" class="form-control">{{$comment->text}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-6">
                                <select name="status" id="status" class="form-control">
                                    <option value="" disabled selected>choose...</option>
                                    <option value="0" {{ $comment->status == '0' ? 'selected' : ''}}>publish</option>
                                    <option value="1" {{ $comment->status == '1' ? 'selected' : ''}}>unpublished</option>
                                </select>
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
