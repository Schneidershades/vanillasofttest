<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\GeneralEmailJob;

class EmailController extends Controller
{
    public function index()
    {
        
    }

    public function store(Request $request)
    {
        dispatch(new GeneralEmailJob($request->all()));

    	$data = [
            'status' => 200,
            'message' => 'success',
        ];
    }
}
