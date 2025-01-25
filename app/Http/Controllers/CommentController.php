<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function storeComment(Request $request){
        $data = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'subject' => 'required',
                'message' => 'required',
                'blog_id' => 'required|exists:blogs,id'

            ]
        );
        Comment::create($data);
        return back()->with('successComment', 'Comment added successfully');
    }
}
