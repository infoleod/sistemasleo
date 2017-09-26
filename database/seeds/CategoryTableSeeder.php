<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
      $categories = collect(['perros', 'gatos', 'aves', 'otras mascotas', 'accesorios']);

      $categories->each(function ($value){
          factory(Category::Class)->create([
            'name' => ucfirst($value),
            'slug' => str_slug($value)
          ]);
      });
    }
}
