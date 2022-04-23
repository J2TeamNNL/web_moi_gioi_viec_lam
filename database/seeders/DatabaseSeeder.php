<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Language;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Language::factory(10)->create();
        Company::factory(10)->create();
        $this->call(UserSeeder::class);
    }
}
