<?php

namespace App\Observers;

use App\Models\Menus;
use App\Models\MenusTree;

class MenusObserver
{
    /**
     * Handle the Menus "created" event.
     *
     * @param  \App\Models\Menus  $menus
     * @return void
     */
    public function created(Menus $menus)
    {        
        MenusTree::fixTree();
    }

    /**
     * Handle the Menus "updated" event.
     *
     * @param  \App\Models\Menus  $menus
     * @return void
     */
    public function updated(Menus $menus)
    {
        //
    }

    /**
     * Handle the Menus "deleted" event.
     *
     * @param  \App\Models\Menus  $menus
     * @return void
     */
    public function deleted(Menus $menus)
    {
        //
    }

    /**
     * Handle the Menus "restored" event.
     *
     * @param  \App\Models\Menus  $menus
     * @return void
     */
    public function restored(Menus $menus)
    {
        //
    }

    /**
     * Handle the Menus "force deleted" event.
     *
     * @param  \App\Models\Menus  $menus
     * @return void
     */
    public function forceDeleted(Menus $menus)
    {
        //
    }
}
