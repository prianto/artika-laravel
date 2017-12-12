<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $category = new Category;
      $category->name = 'Nature & Culture';
      $category->slug = 'nature-culture';
      $category->save();

      $category = new Category;
      $category->name = 'Socio & Techno';
      $category->slug = 'socio-techno';
      $category->save();
    }
}
