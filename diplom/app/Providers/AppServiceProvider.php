<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
//use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
//use \App\Category;
//use \App\Product;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    //https://github.com/jeroennoten/Laravel-AdminLTE#610-menu   6.10.3
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
/*
            $event->menu->add('MAIN NAVIGATION');
            $event->menu->add([
                'text' => 'Blog',
                'url' => 'admin/blog',
            ]);
*/
            $event->menu->add('CATEGORIES');//заголоовк
            $event->menu->add([
                'text' => 'Categories',
                'url' => 'admin/categories',
                //'label' => Category::count(),//кол-во категорий
            ]);
            $event->menu->add([
                'text' => 'Add category',
                'url' => 'admin/categories/create',
            ]);

            $event->menu->add('PRODUCTS');//заголоовк
            $event->menu->add([
                'text' => 'Products',
                'url' => 'admin/products',
                //'label' => Product::count(),//кол-во продуктов
            ]);
            $event->menu->add([
                'text' => 'Add product',
                'url' => 'admin/products/create',
            ]);

        });
    }
}
