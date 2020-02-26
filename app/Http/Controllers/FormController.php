<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ApiCall;
use App\SearchResults;
use Facade\FlareClient\Api;

class FormController extends Controller
{
    public function index() {

        $validated = request()->validate([
            'source' => 'required',
            'q' => ['required', 'min:3'],
            'from' => 'required',
            'to' => 'required'
        ]);


        $job = new ApiCall($validated);

        dispatch_now($job);

    }
}
