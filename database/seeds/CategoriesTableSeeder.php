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
        Category::create([

        	'id' => '2',
            'name' => 'Pizzas',
            'description' => 'Pizzas',
            'image' => 'pizzas.jpg',

        ]);
        Category::create([

        	'id' => '3',
            'name' => 'Comida Rapida',
            'description' => 'Comida rapida',
            'image' => 'comidarapida.jpg',

        ]);
        Category::create([

        	'id' => '4',
            'name' => 'Comida Italiana',
            'description' => 'Platos tipicos de Italia',
            'image' => 'comidaitaliana.png',

        ]);
        Category::create([

        	'id' => '5',
            'name' => 'Comida China',
            'description' => 'Platos tipicos de China',
            'image' => 'comidachina.jpg',

        ]);
        Category::create([

        	'id' => '6',
            'name' => 'Bebidas',
            'description' => 'Bebidas',
            'image' => 'bebidas.png',

        ]);
        Category::create([

        	'id' => '7',
            'name' => 'Sandwiches',
            'description' => 'Sandwich',
            'image' => 'sandwiches.jpg',

        ]);
    }
}
