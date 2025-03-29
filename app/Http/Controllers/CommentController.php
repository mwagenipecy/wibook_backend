<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function saveComments(Request $request){

        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Comment::create($request->only(['name', 'email', 'message']));

        return back()->with('success', 'Your message has been sent successfully.');


    }
}
