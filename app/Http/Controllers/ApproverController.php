<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Submited;
use App\Models\Unit;
use Illuminate\Http\Request;

class ApproverController extends Controller
{
    public function index()
    {
        $unit = Unit::all();
        foreach ($unit as $u) {
            // dd(Submited::count() * 100);
            $submit = Submited::all();
            if (count($submit)) {
                $u->total = Submited::where('unit_id', $u->id)->count() / Submited::count() * 100;
            } else {
                $u->total = 0;
            }
        }

        return view('home-approver', [
            'data_submited' => Submited::all(),
            'data_unit' => $unit
        ]);
    }

    public function show(Submited $submited)
    {
        return view('approver-edit', [
            'data' => $submited,
            'status' => Status::all()
        ]);
    }
}
