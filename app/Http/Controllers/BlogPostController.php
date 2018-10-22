<?php

namespace App\Http\Controllers;

use App\Entity\BlogPost;
use App\Entity\User;
use App\Http\Requests\StoreBlogPost;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

/**
 * Class BlogPostController
 *
 * @package App\Http\Controllers
 */
class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = Auth::user();

        // not logged in or not admin
        if ( !($user instanceof User && $user->hasRole("admin")) ) {
            return redirect()->route('home')->with([
                'error' => 'You don\'t have the required permissions to view that page'
            ]);
        }

        $posts = BlogPost::all();

        return view('blog_post.index', compact($posts));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreBlogPost $request
     * @return Response
     */
    public function store(StoreBlogPost $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param BlogPost $post
     * @return Response
     */
    public function edit(BlogPost $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request  $request
     * @param BlogPost $post
     *
     * @return Response
     */
    public function update(Request $request, BlogPost $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Show posts of a given author
     *
     * @param User $user
     */
    public function user(User $user)
    {

    }
}