@extends('layouts.app')

@section('content')
<h1>LIST</h1>
@if(count($comments) > 0)
    @foreach($comments as $comment)
            <div class="card">
                <p>{{$comment->body}}</p>
            </div>
    @endforeach
@endif
@endsection