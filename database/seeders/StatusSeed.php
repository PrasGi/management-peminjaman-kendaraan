<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create([
            'name_status' => 'Pending',
        ]);

        Status::create([
            'name_status' => 'Approved',
        ]);

        Status::create([
            'name_status' => 'Rejected',
        ]);

        Status::create([
            'name_status' => 'Completed',
        ]);
    }
}
