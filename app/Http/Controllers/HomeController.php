<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SearchResults;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $search_results = SearchResults::where('user_id', auth()->id())->orderBy('id', 'desc')->get();

        foreach($search_results as $result) {

            $result->results = json_decode($result->results, true);

        }

        return view('home', compact('search_results'));
    }
}
