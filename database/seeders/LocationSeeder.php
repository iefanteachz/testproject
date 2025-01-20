<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;
class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::create([
            'locatename' => 'SEL',
         ]);
         Location::create([
            'locatename' => 'JHR',
         ]);
         Location::create([
            'locatename' => 'KDH',
         ]);
         Location::create([
            'locatename' => 'KTN',
         ]);
         Location::create([
            'locatename' => 'KUL',
         ]);
         Location::create([
            'locatename' => 'LBN',
         ]);
         Location::create([
            'locatename' => 'MLK',
         ]);
         Location::create([
            'locatename' => 'NSN',
         ]);
         Location::create([
            'locatename' => 'PHG',
         ]);
         Location::create([
            'locatename' => 'PNG',
         ]);
         Location::create([
            'locatename' => 'PRK',
         ]);
         Location::create([
            'locatename' => 'PLS',
         ]);
         Location::create([
            'locatename' => 'PJY',
         ]);
         Location::create([
            'locatename' => 'SBH',
         ]);
         Location::create([
            'locatename' => 'SWK',
         ]);
         Location::create([
            'locatename' => 'SGR',
         ]);
         Location::create([
            'locatename' => 'TRG',
         ]);
    }
}
