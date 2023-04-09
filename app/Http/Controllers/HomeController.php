<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $sidebarCheck;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sidebarCheck= 'user';
        return view('home',compact('sidebarCheck'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $sidebarCheck= 'admin';
        return view('adminHome',compact('sidebarCheck'));
    }
    public function sellerHome()
    {
        $sidebarCheck= 'seller';
        return view('sellerHome',compact('sidebarCheck'));
    }

    public function marketPlace()
    {
        $sidebarCheck= 'marketplace';
        return view('seller.market-place',compact('sidebarCheck'));
    }
    public function property()
    {
        $sidebarCheck= 'property';
        return view('seller.property',compact('sidebarCheck'));
    }
    public function carMotor()
    {
        $sidebarCheck= 'carMotor';
        return view('seller.cars-motors',compact('sidebarCheck'));
    }
    public function job()
    {
        $sidebarCheck= 'job';
        return view('seller.job',compact('sidebarCheck'));
    }

}
