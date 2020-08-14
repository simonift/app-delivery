<?php

use Illuminate\Database\Seeder;

use App\Product;
use App\Category;
use App\ProductImage;

class ProductsImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductImage::create([

            'id' => '3',
            'image' => 'papasfritas.jpg',
            'product_id' => '3',

        ]);
        ProductImage::create([

            'id' => '4',
            'image' => 'completo.jpg',
            'product_id' => '4',

        ]);
        ProductImage::create([

            'id' => '5',
            'image' => 'ravioles.jpg',
            'product_id' => '5',

        ]);
        ProductImage::create([

            'id' => '6',
            'image' => 'fetuccini.jpg',
            'product_id' => '6',

        ]);
        ProductImage::create([

            'id' => '7',
            'image' => 'arrozchaufan.jpg',
            'product_id' => '7',

        ]);
        ProductImage::create([

            'id' => '8',
            'image' => 'chapsui.jpg',
            'product_id' => '8',

        ]);
        ProductImage::create([

            'id' => '9',
            'image' => 'sprite3lt.jpg',
            'product_id' => '9',

        ]);
        ProductImage::create([

            'id' => '10',
            'image' => 'cocacola1lt.jpg',
            'product_id' => '10',

        ]);
        ProductImage::create([

            'id' => '11',
            'image' => 'churrasco.jpg',
            'product_id' => '11',

        ]);
        ProductImage::create([

            'id' => '12',
            'image' => 'barrosluco.jpg',
            'product_id' => '12',

        ]);
        ProductImage::create([

            'id' => '13',
            'image' => 'pizzanapolitana.jpg',
            'product_id' => '13',

        ]);
        ProductImage::create([

            'id' => '14',
            'image' => 'pizzavegetariana.jpg',
            'product_id' => '14',

        ]);
    }
}
