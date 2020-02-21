<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

/**
 * Class BlogController
 * @package App\Http\Controllers
 */
class BlogController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::latest()->paginate(12);
        return view('blog')->with('posts', $posts);
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $related = Post::whereHas('tags', function ($q) use ($post) {
            return $q->whereIn('title', $post->tags->pluck('title'));
        })
        ->orWhereHas('categories', function ($q) use ($post) {
            return $q->whereIn('title', $post->tags->pluck('title'));
        })
        ->where('id', '!=', $post->id)
        ->limit(3)
        ->get();
        $data = [
            'post' => $post,
            'related' => $related
        ];
        return view('blogPost', $data);
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->paginate(12);
        $data = [
            'category' => $category,
            'posts' => $posts
        ];
        return view('category', $data);
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->paginate(12);
        $data = [
            'tag' => $tag,
            'posts' => $posts
        ];
        return view('tag', $data);
    }

    /**
     * @param $authorId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function author($authorId)
    {
        $author = User::where('id', $authorId)->firstOrFail();
        $posts = $author->posts()->paginate(12);
        $data = [
            'author' => $author,
            'posts' => $posts
        ];
        return view('author', $data);
    }

}
