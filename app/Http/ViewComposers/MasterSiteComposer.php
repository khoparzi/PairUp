<?php

namespace App\Http\ViewComposers;

use \Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class MasterSiteComposer
{
    /**
     * Sets up the auth info for all views
     * 
     * @todo Why this this composer method called twice? Are there are several partials being rendered?
     */
    public function compose(View $view)
    {
        $user = Auth::user();
        $username = $user ? $user->name : null;

        $view->with('username', $username);
    }
}
