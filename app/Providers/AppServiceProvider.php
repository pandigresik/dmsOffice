<?php

namespace App\Providers;

use App\Models\Menus;
use App\Observers\MenusObserver;
use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {        
        // config(['app.locale' => 'id']);
	    // Carbon::setLocale('id');
        if(env('APP_DEBUG')) {
            \DB::listen(function($query) {
                \File::append(
                    storage_path('/logs/query.log'),
                    $query->sql . ' [' . implode(', ', $query->bindings) . ']' . PHP_EOL
            );
            });
        }
        /** code ini hanya akan dijalankan ketika render view menu */
        view()->composer('layouts.menu', function ($view) {                                   
            $items = \App\Models\Menus::with(['permissions'])->orderBy('seq_number')->get();
            $tree = new \Kalnoy\Nestedset\Collection();
            foreach($items as $item){
                $menuTree = new \App\Models\MenusTree();                
                foreach(array_merge($item->getFillable(),['id','_lft','_rgt']) as $f){
                    $menuTree->{$f} = $item->{$f};
                }
                $menuTree->permissions = $item->permissions;
                $menuTree->syncOriginal();
                $tree->add($menuTree);
            }
            $menu = generateMenu($tree->toTree()->all())->withoutWrapperTag();
            $view->with(['menu' => $menu]);
        });

        /** register observer */
        Menus::observe(MenusObserver::class);
    }
}
