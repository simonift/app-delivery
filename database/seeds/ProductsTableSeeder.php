<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;
use App\ProductImage;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        Creación de Categorias, Productos e imagenes de producto aleatorio
        factory(Category::class, 5)->create();
        factory(Product::class, 100)->create();
        factory(ProductImage::class, 200)->create();*/

        /*$categories = factory(Category::class, 0)->create();
        $categories->each(function ($category){
            
            $products = factory(Product::class, 0)->make();
            $category->products()->saveMany($products);

            $products->each(function ($p) {
                $images = factory(ProductImage::class, 3)->make();
                $p->images()->saveMany($images);

            });

        });*/

        Product::create([

            'id' => '3',
            'name' => 'Papas fritas',
            'description' => 'Papas freidas en aceite',
            'long_description' => '',
            'price' => '1000',
            'category_id' => '3',

        ]);
        Product::create([

            'id' => '4',
            'name' => 'Completo',
            'description' => 'Pan humedecido al vapor con ingredientes',
            'long_description' => '',
            'price' => '1100',
            'category_id' => '3',

        ]);
        Product::create([

            'id' => '5',
            'name' => 'Ravioles',
            'description' => 'Ravioles rellenos de espinaca',
            'long_description' => '',
            'price' => '5800',
            'category_id' => '4',

        ]);
        Product::create([

            'id' => '6',
            'name' => 'Fetuccini',
            'description' => 'Fetuccini de espinaca con salsa y queso rallado',
            'long_description' => '',
            'price' => '5000',
            'category_id' => '4',

        ]);
        Product::create([

            'id' => '7',
            'name' => 'Arroz chaufan',
            'description' => 'Arroz chaufan',
            'long_description' => '',
            'price' => '1590',
            'category_id' => '5',

        ]);
        Product::create([

            'id' => '8',
            'name' => 'Chapsui pollo',
            'description' => 'Chapsui de pollo',
            'long_description' => '',
            'price' => '3990',
            'category_id' => '5',

        ]);
        Product::create([

            'id' => '9',
            'name' => 'Sprite 3 Litros',
            'description' => 'Bebida de fantasia',
            'long_description' => 'Bebida de fantasia sabor limon',
            'price' => '1000',
            'category_id' => '6',

        ]);
        Product::create([

            'id' => '10',
            'name' => 'Coca-cola 1 Litro',
            'description' => 'Bebida de fantasia',
            'long_description' => 'Bebida de fantasia sabor Coca-Cola',
            'price' => '1000',
            'category_id' => '6',

        ]);
        Product::create([

            'id' => '11',
            'name' => 'Churrasco XL',
            'description' => 'Sandwich de carne, tomate, palta y mayonesa',
            'long_description' => '',
            'price' => '2400',
            'category_id' => '7',

        ]);
        Product::create([

            'id' => '12',
            'name' => 'Barros Luco XL',
            'description' => 'Sandwich de carne y queso',
            'long_description' => '',
            'price' => '2400',
            'category_id' => '7',

        ]);
        Product::create([

            'id' => '13',
            'name' => 'Pizza napilitana ',
            'description' => 'Base de queso y salsa con jamon y tomate',
            'long_description' => '',
            'price' => '6990',
            'category_id' => '2',

        ]);
        Product::create([

            'id' => '14',
            'name' => 'Pizza vegetariana',
            'description' => 'Base de queso y salsa con aceitunas y pimenton verde',
            'long_description' => '',
            'price' => '7990',
            'category_id' => '2',

        ]);
    }
}
