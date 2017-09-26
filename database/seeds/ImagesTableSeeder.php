<?php

use Illuminate\Database\Seeder;
use App\Image;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Creamos una imagen y cargamos el default de el perfil
      // factory(Image::Class)->create([
      //     'id'            => '1',
      //     'source'        => 'images/profile/default.jpg',
      //     'description'   => 'Default profile no image'
      // ]);


      $images = collect(['/images/products/1.jpg', '/images/products/2.jpg', '/images/products/3.jpg', '/images/products/4.jpg', '/images/products/5.jpg', '/images/products/6.jpg']);

      $images->each(function ($value){
          factory(Image::Class)->create([
            'source' => $value
          ]);
      });

      for ($i=0; $i < 12 ; $i++) {
        factory(Image::Class)->create([
          'source' => 'images/profile/default.jpg'
        ]);
        }
    }
}
