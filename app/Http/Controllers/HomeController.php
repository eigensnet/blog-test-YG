<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Notifications\newPostNotification;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::count();
        $comments = Comment::count();
        $tags = Tag::count();
        $categories = Category::count();
        $notifications= (Auth::user()->unreadnotifications()->pluck('data')->isEmpty()) ? null : Auth::user()->unreadnotifications()->pluck('data') ;
        $not=Auth::user()->unreadnotifications()->pluck('data');
        return view('home', get_defined_vars());
    }
}
