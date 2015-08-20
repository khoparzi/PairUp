<?php

namespace App\Http\ViewComposers;

use \Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class MasterSiteComposer
{
    /**
     * Sets up the auth info for all views
     */
    public function compose(View $view)
    {
        $user = Auth::user();
        $username = $user ? $user->name : null;

        $view->with('username', $username);
    }
}
