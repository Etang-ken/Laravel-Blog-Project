<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Comment;
// use App\Models\Post;

// class CommentsController extends Controller
// {
//     public function viewComments()
//     {
//         $comments = Comment::all();
//         return view('posts.show')->with('comments', $comments);
//     }
//     public function comment(Request $request) 
//     {
//         $comment = new Comment;
//         // $post_id = Post::find($id);
//         $comment->body = $request->input('body');
//         $comment->post_id = $request->input('p_id');
//         $comment->save();

//         return redirect('/posts/'.$comment->post_id)->with('success', 'New Comment');
//     }
// }
