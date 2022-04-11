<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class Menu
{
    public function handle($request, Closure $next, ...$guards)
    {
        View::composer('*', function ($view){
            $view->with('menu', $this->menuItems());
        });
        return $next($request);
    }

    private function menuItems(): array
    {
        $current = Route::currentRouteName();
        $menuItems = config('menu');
        $result = [];
        foreach ($menuItems as $item){
            $item['active'] = false;
            if(!empty($item['child']) && in_array($current, $item['child'])){
                $item['active'] = true;
            }
            $result[] = $item;
        }
        return $result;
    }
}
