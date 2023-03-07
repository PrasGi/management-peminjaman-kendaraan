<?php

namespace App\Http\Controllers;

use App\Exports\SubmitedExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportSubmitedController extends Controller
{
    public function export()
    {
        return Excel::download(new SubmitedExport, 'submited.xlsx');
    }
}
