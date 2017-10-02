<?php

use Illuminate\Database\Seeder;

class VehicleTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicle_types')->insert([
            [
                'name' => 'PERSONAL'
            ],
            [
                'name' => 'ENTERPRISE'
            ]
        ]);
    }
}
