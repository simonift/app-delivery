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

        $categories = factory(Category::class, 5)->create();
        $categories->each(function ($category){
            
            $products = factory(Product::class, 5)->make();
            $category->products()->saveMany($products);

            $products->each(function ($p) {
                $images = factory(ProductImage::class, 3)->make();
                $p->images()->saveMany($images);

            });

        });
        /*Creación de Usuarios Definidos
        $users = factory(App\User::class, 3)
            ->create()
            ->each(function ($u) {
                $u->posts()->save(factory(App\Post::class)->make());
            });*/
    }
}
