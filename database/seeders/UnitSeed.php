<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Unit::create(['name_unit' => 'Unit 1']);
        Unit::create(['name_unit' => 'Unit 2']);
        Unit::create(['name_unit' => 'Unit 3']);
        Unit::create(['name_unit' => 'Unit 4']);
        Unit::create(['name_unit' => 'Unit 5']);
        Unit::create(['name_unit' => 'Unit 6']);
    }
}
