<?php

namespace App\Http\Controllers\Admin;

use App\SiteMap;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class SiteMapController
 * @package App\Http\Controllers\Admin
 */
class SiteMapController extends Controller
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
        $active = 'settings';
        $siteMapSettings = SiteMap::first();
        $data = [
          'siteMapSettings' => $siteMapSettings,
            'active' => $active
        ];
        return view('admin.sitemap', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $siteMapSettings = SiteMap::first();
        $siteMapSettings->update($request->all());
        return redirect()->back()->with("message", "Updated Successfully.");
    }

}
