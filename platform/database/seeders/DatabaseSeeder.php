<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lawyer;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('matter_embeddings')->delete();
        DB::table('matters')->delete();
        DB::table('lawyers')->delete();

        DB::table('users')
        ->insert([
            'email'=>'peter@gmail.com',
            'password'=> bcrypt('password'),
            'name'=>'Peter Braganza'
        ]);

        $this->call([
            LawyerSeeder::class,
            MatterSeeder::class
        ]);
    }
}
