<?php

namespace App\Providers;

use App\Models\Category;
use Cart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /*$cats =  Category::orderByRaw('-name ASC')->get();
        foreach ($cats as  $k => $cat){
            if($cat->parent_id != null){
                if($cat->parent_id == 1){
                    $super_cat[$cat->id][] = $cat;
                }else{
                    $children[$k]['name'] = $cat->name ;
                    $children[$k]['slug'] = $cat->slug ;
                    $super_cat[$cat->parent_id][0]['children'] =$children;

                }
            }
        }*/

        View::composer('site.partials.nav', function ($view) {
            $view->with('categories', Category::orderByRaw('-name ASC')->get()->nest());
            //$view->with('categories', $super_cat);
        });

        View::composer('site.partials.header', function ($view) {
            $view->with('cartCount', Cart::getContent()->count());
        });

    }
}
