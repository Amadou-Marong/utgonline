<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Course::create([
        //     'name' => 'Laravel',
        // ]);
        // Course::create([
        //     'name' => 'Laravel',
        // ]);
        // Course::create([
        //     'name' => 'Laravel 1',
        // ]);
        // Course::create([
        //     'name' => 'Laravel 2',
        // ]);
        // Course::create([
        //     'name' => 'Laravel 3',
        // ]);
        // Course::create([
        //     'name' => 'Laravel 4',
        // ]);
        // Course::create([
        //     'name' => 'Laravel 5',
        // ]);
        // Course::create([
        //     'name' => 'Laravel 6',
        // ]);
        Course::create([
            'name' => 'Laravel 7',
        ]);
        Course::create([
            'name' => 'Laravel 8',
        ]);
        Course::create([
            'name' => 'Laravel 9',
        ]);
        Course::create([
            'name' => 'Laravel 10',
        ]);
        Course::create([
            'name' => 'Laravel 11',
        ]);
       
        $this->call([
            RolesAndPermissionsSeeder::class
        ]);
    }
}
