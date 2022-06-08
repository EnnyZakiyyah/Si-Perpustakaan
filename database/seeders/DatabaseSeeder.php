<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\User;
use App\Models\Katalog;
use App\Models\Category;
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
        User::factory(3)->create();

        Katalog::factory(20)->create();
        
        Category::create([
            'name' => 'Majalah',
            'slug' => 'majalah'
        ]);

        Category::create([
            'name' => 'Buku',
            'slug' => 'buku'
        ]);

        Author::create([
            'name' => 'Enny Zakiyyah',
            'username' => 'ennyzakiyyah'
        ]);
        Author::create([
            'name' => 'Ana Wildatun',
            'username' => 'anawildatun'
        ]);
    }
}
