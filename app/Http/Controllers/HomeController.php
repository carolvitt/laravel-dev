<?php

namespace App\Http\Controllers;

use App\Models\University;
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
        $query = University::get()->toArray();
        // return $query;
        return view('import', compact('query'));
    }
}
