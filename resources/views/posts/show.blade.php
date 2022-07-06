@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-primary">Go Back</a>
    <br>
    <h1>{{$data['post']->title}}</h1>
    <div class="row">
        <div class="col-sm-8 card">
            <img style="width: 200px" src="/storage/cover_images/{{$data['post']->cover_image}}" alt="">
            <br><p>{{$data['post']->body}}</p>
            <br><small>Written on {{$data['post']->created_at}}</small>

            <hr>

            @if(!Auth::guest())
                @if(Auth::user()->id == $data['post']->user_id)
                    <a href="/posts/{{$data['post']->id}}/edit" class="btn btn-default">Edit</a>
                    {!!Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $data['post']->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
                @endif
            @endif
        </div>

        <div class="col-sm-4 side">
            <h3 class="text-center">Add a comment</h3>
            <div class="card">
                <h3>Create Todo</h3>
                {!! Form::open(['action' => 'App\Http\Controllers\CommentsControl@store', 'method' => 'POST']) !!}
                    {{Form::label('title', 'New Todo')}}
                    {{-- <div class="form-group">
                        {{Form::label('name', 'Name')}}
                        {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name...'])}}
                    </div> --}}
                    <div class="form-group">
                        {{Form::label('body', 'Body')}}
                        {{ Form::hidden('p_id', $data['post']->id)}}
                        {{ Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Add comment...'])}}
                    </div>
                    {{Form::submit('Submit'), ['class' => 'btn btn-primary']}}
                {!! Form::close()!!}

            </div>
            @if(count($data['comments']) > 0)
                @foreach($data['comments'] as $comment)
                    @if($data['post']->id == $comment->post_id)
                        <br><br>
                        <div class="card">
                            <p>{{$comment->body}}</p>
                            <small>{{$comment->created_at}}</small>
                            @if(!Auth::guest())
                                @if(Auth::user()->id == $data['post']->user_id)
                                    {!!Form::open(['action' => ['App\Http\Controllers\CommentsControl@destroy', $comment->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::hidden('ps_id', $data['post']->id)}}
                                        <button type="submit"><p class="float-right"><i class="fa fa-trash" type="submit"></i></p></button>
                                    {!!Form::close()!!}
                                @endif
                            @endif
                            
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>

    
          
     
@endsection