<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\SiteMap;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

/**
 * Class SiteMapGeneratorController
 * @package App\Http\Controllers
 */
class SiteMapGeneratorController extends Controller
{

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = User::all();
        $posts = Post::all();
        $categories = Category::all();
        $tags = Tag::all();
        $sitemap_settings = SiteMap::first();
        return response()->view('sitemap', [
            'authors' => $authors,
            'posts' => $posts,
            'categories' => $categories,
            'tags' => $tags,
            'sitemap_settings' => $sitemap_settings,
        ])->header('Content-Type', 'text/xml');

    }
}
