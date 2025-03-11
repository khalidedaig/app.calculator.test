<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OperationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('operations')->insert([
            'operation' => '6+2',
            'result' => '8',
            'updated_date' => now(),
        ]);

        DB::table('operations')->insert([
            'operation' => '12-4',
            'result' => '8',
            'updated_date' => now(),
        ]);

        DB::table('operations')->insert([
            'operation' => '2*4',
            'result' => '8',
            'updated_date' => now(),
        ]);

        DB::table('operations')->insert([
            'operation' => '16/2',
            'result' => '8',
            'updated_date' => now(),
        ]);

        DB::table('operations')->insert([
            'operation' => 'sqrt(4)',
            'result' => '16',
            'updated_date' => now(),
        ]);
    }
}
