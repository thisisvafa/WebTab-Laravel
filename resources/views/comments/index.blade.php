@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-12 mb-2">
                <a class="btn btn-outline-success" href="{{route('commentsCreate')}}">Create New Comment</a>
            </div>

            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>text</th>
                                    <th>status</th>
                                    <th>Date</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($comments as $comment)
                                    <tr>
                                        <td>
                                            <a href="{{ route('commentsShow', $comment->id) }}">
                                                {{ $comment->user->name }}{{' '}}{{ $comment->user->lastname }}
                                            </a>
                                        </td>
                                        <td>{{ Str::limit($comment->text, 10) }}</td>
                                        @if ($comment->status == 0)
                                            <td><span class="bg-success py-1 px-2">publish</span></td>
                                        @else
                                            <td><span class="bg-danger py-1 px-2">Unpublished</span></td>
                                        @endif
                                        <td>{{ \Illuminate\Support\Carbon::instance($comment->created_at) }}</td>
                                        <td>
                                            <form action="{{ route('commentsDestroyAdmin', $comment->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" onclick="return confirm('The Child will be Delete! Are you sure?')" type="submit" name="Delete">Delete</button>
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
                                        {{$comments->links()}}
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
