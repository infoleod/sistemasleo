<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Seeder de Imagenes
        $this->call(ImagesTableSeeder::class);

        // Seeder de Usuarios
        $this->call(UsersTableSeeder::class);

        //Seeder de Categorias
        $this->call(CategoryTableSeeder::class);

        // Seeder de Productos
        $this->call(ProductsTableSeeder::class);
    }
}
