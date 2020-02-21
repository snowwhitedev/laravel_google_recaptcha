<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use App\Stats;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class DashboardController
 * @package App\Http\Controllers\Admin
 */
class DashboardController extends Controller
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
        $data['active'] = 'dashboard';
        $data['csvUsage'] =  Stats::count();
        $data['latestUsage'] =  Stats::latest()->limit(10)->get();
        return view('admin.dashboard', $data);
    }

}
