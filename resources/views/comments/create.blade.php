@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{route('commentsStore')}}">
                            @csrf

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Message</label>
                                <div class="col-sm-12">
                                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                    <textarea type="text" name="message" class="form-control">{{old('message')}}</textarea>
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
    </div>

@endsection
