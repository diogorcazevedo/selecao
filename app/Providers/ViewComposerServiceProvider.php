<?php

namespace App\Providers;

use App\Modules\Project\Entities\Project;
use Illuminate\Support\ServiceProvider;


class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $projects = Project::all();
        view()->composer('*',function($view)use($projects){
            $view->with(['projects'=>$projects]);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
