<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Submited;
use App\Models\Transport;
use App\Models\Unit;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('home-admin', [
            'units' => Unit::all(),
            'companies' => Company::all(),
            'transports' => Transport::all(),
            'submiteds' => Submited::where('user_id', auth()->user()->id)->get(),
        ]);
    }
}
