<?php

namespace App\Exports;

use App\Models\Submited;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class SubmitedExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DB::table('submiteds')
            ->join('users', 'submiteds.user_id', '=', 'users.id')
            ->join('units', 'submiteds.unit_id', '=', 'units.id')
            ->join('companies', 'submiteds.company_id', '=', 'companies.id')
            ->join('transports', 'submiteds.transport_id', '=', 'transports.id')
            ->join('statuses', 'submiteds.status_id', '=', 'statuses.id')
            ->get();
    }
}
