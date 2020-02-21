<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class PostsController
 * @package App\Http\Controllers\Admin
 */
class PostsController extends Controller
{
    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['active'] = 'posts';
        $data['posts'] = Post::latest()->paginate(10);
        return view('admin.posts.index', $data);
    }

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Post $post)
    {
        $data['active'] = 'posts';
        $data['post'] = $post;
        $data['categories'] = Category::all();
        $data['tags'] = Tag::all();
        return view('admin.posts.edit', $data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $data['active'] = 'posts';
        $data['categories'] = Category::all();
        $data['tags'] = Tag::all();
        return view('admin.posts.create', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $post = Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => Auth::id()
        ]);

        if ($request->has('categories'))
        {
            $post->categories()->sync($request->input('categories'));
        }

        if ($request->has('tags'))
        {
            $tags = $request->input('tags');
            $tagArr = [];
            foreach ($tags as $tag)
            {
                if ((int)$tag != 0)
                {
                    $tagArr[] = (int)$tag;
                } else {
                    $find = Tag::where('title', $tag)->first();
                    if ($find)
                    {
                        $tagArr[] = $find->id;
                    } else {
                        $find = Tag::create([
                            'title' => $tag
                        ]);
                        $tagArr[] = $find->id;
                    }
                }
            }
            $post->tags()->sync($tagArr);
        }

        return redirect()->to(route('posts.index'))->with("message", "Post Added Successfully");
    }

    /**
     * @param Post $post
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Post $post, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);

        if ($request->has('categories'))
        {
            $post->categories()->sync($request->input('categories'));
        }

        if ($request->has('tags'))
        {
            $tags = $request->input('tags');
            $tagArr = [];
            foreach ($tags as $tag)
            {
                if ((int)$tag != 0)
                {
                    $tagArr[] = (int)$tag;
                } else {
                    $find = Tag::where('title', $tag)->first();
                    if ($find)
                    {
                        $tagArr[] = $find->id;
                    } else {
                        $find = Tag::create([
                            'title' => $tag
                        ]);
                        $tagArr[] = $find->id;
                    }
                }
            }
            $post->tags()->sync($tagArr);
        }

        return redirect()->back()->with("message", "Post updated Successfully");
    }

    /**
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $post->tags()->delete();
        $post->categories()->delete();
        $post->delete();
        return redirect()->to(route('posts.index'))->with("message", "Post deleted Successfully");
    }

}
