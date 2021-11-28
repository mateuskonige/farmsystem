<?php

namespace Database\Seeders;

use App\Models\Animals;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('animals')->insert(
        [
            'class' => 'Moas'
        ]
    );
    }
}
