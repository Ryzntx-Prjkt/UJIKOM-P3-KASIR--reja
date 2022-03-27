<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::count();
        $transaksi = Transaksi::count();
        $transaksi_now = Transaksi::where('created_at', '=', Carbon::today())->count();
        $menu = Menu::count();
        return view('home', compact('user', 'transaksi', 'transaksi_now', 'menu'));
    }
}
