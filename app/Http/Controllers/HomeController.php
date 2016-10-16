<?php

namespace App\Http\Controllers;

use App\TempleCount;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var TempleCount
     */
    private $templeCount;

    /**
     * Create a new controller instance.
     *
     * @param TempleCount $templeCount
     */
    public function __construct(TempleCount $templeCount)
    {
        $this->middleware('auth')->except(['welcome']);
        $this->templeCount = $templeCount;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('home');
    }

    public function welcome()
    {
        $count = $this->templeCount->all()->sum('count');

        return view('welcome', ['count' => $count]);
    }
}
