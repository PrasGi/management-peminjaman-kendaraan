<?php

namespace Database\Seeders;

use App\Models\Transport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransportSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transport::create(['name_transport' => 'Angkutan Orang']);
        Transport::create(['name_transport' => 'Angkutan Barang']);
    }
}
