<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\View\Factory as ViewFactory;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @todo Find out the value of a separate service provider here - would it not
     * be better to just add this to the AppServiceProvider?
     * 
     * @return void
     */
    public function boot(ViewFactory $view)
    {
        // Using class based composers
        view()->composer(
            '*', 'App\Http\ViewComposers\MasterSiteComposer'
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
