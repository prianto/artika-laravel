<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(UnsplashesTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
    }
}
