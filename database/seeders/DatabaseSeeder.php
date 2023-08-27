<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $grades = [1, 2, 3, 4, 5, 6,7,8,9,10,11,12,13];
        foreach ($grades as $grade) {
            DB::table('grades')->insert(['grade' => $grade]);

            
        }
        


       
    }
}
