@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="media-heading d-flex align-items-center justify-content-between">
                                    <div>{{ $comments->user->name }}</div>
                                    <small>
                                        <a href="{{route('commentsEdit', $comments->id)}}">edit</a>
                                        {{ \Illuminate\Support\Carbon::instance($comments->created_at) }}
                                    </small>
                                </h4>
                                <p class="panel-title">
                                    <span class="glyphicon glyphicon-comment"></span>
                                    {{$comments->text}}
                                </p>
                            </div>
                            <div class="p-3">
                                @foreach($comments->childrenRecursive as $comment)
                                    <div class="card mb-2 p-3 @if($comment->user) bg-light @elseif($comment->admin) bg-dark text-white @endif">
                                        <h4 class="media-heading d-flex align-items-center justify-content-between">
                                            <div> @if($comment->user) {{ $comment->user->name }} @elseif($comment->admin) {{ $comment->admin->name }} @endif</div>
                                            <small>
                                                <a href="{{route('commentsEdit', $comment->id)}}">edit</a>
                                                {{ \Illuminate\Support\Carbon::instance($comment->created_at) }}
                                            </small>
                                        </h4>
                                        <p>
                                            {{ $comment->text }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>


                <div class="card mt-4">
                    <div class="card-body">
                        <form method="post" action="{{route('commentsStoreParent')}}">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <input type="hidden" name="parent_id" value="{{$comments->id}}">
                                <label>Message</label>
                                <textarea name="message" class="form-control" required>{{old('message')}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
