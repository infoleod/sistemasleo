<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\User;
use App\Category;
use App\Image;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Traigo todos los usuarios
        $users = User::all();

        // Traigo todas las categorias
        $categories = Category::all();

        // Traigo todas las imagenes
        $images = Image::where([['id', '>', 1],['id', '<', 7]])->get();

        // Recorro los usuarios y por cada usuario recorro las categorias e inserto un producto
        // Recorremos los usuarios
        $users->each(function($user) use($categories, $images) {
            //Recoremos las categorias
            $categories->each(function($category) use($user, $images) {
                //Recorremos las imagenes asi inseramos una
                $images->each(function($image) use($user, $category ) {
                    factory(Product::class)->create([
                        'user_id' => $user->id,
                        'category_id' => $category->id,
                        'image_id' => $image->id

                    ]);
                });
            });
        });
    }
}
