<?php

namespace App\Providers;

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        View::composer('*', function ($view){
            $view->with('posts_footer', Post::all()->random(1));
        });
    }


}
