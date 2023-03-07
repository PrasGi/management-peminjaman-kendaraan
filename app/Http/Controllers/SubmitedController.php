<?php

namespace App\Http\Controllers;

use App\Models\Submited;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class SubmitedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validate = $request->validate([
            'tanggal_peminjaman' => 'required|date_format:Y-m-d',
            'jam_peminjaman' => 'required|date_format:H:i',
            'tanggal_pengembalian' => 'required|date_format:Y-m-d',
            'jam_pengembalian' => 'required|date_format:H:i',
            'company_id' => 'required',
            'unit_id' => 'required',
            'transport_id' => 'required',
        ]);

        $validate['user_id'] = auth()->user()->id;
        $validate['name_admin'] = auth()->user()->name_user;
        $validate['status_id'] = 1;

        try {
            Submited::create($validate);
            return redirect()->route('home-admin');
        } catch (\Throwable $th) {
            return response()->json([
                'error' => true,
                'error_message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Submited $submited)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Submited $submited)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Submited $submited)
    {
        $validate = $request->validate([
            'status_id' => 'required'
        ]);

        if ($submited->update($validate)) {
            return redirect()->route('home-approver');
        }

        return response()->json([
            'error' => true,
            'error_message' => 'Failed to update data'
        ], 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Submited $submited)
    {
        if ($submited->delete()) {
            return redirect()->route('home-approver');
        }

        return response()->json([
            'error' => true,
            'error_message' => 'Failed to delete data'
        ], 500);
    }
}
