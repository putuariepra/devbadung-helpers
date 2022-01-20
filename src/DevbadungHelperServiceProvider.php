<?php

namespace DevbadungHelper;

use Illuminate\Support\ServiceProvider;

class DevbadungHelperServiceProvider extends ServiceProvider
{    
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->registerHelpers();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->registerPublishing();
    }
    
    protected function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__.'/../config' => config_path()], 'devbadung-helper-config');
        }
    }

    protected function registerHelpers()
    {
        $helpers = config('devbadunghelpers.paths', []);
        foreach ($helpers as $helper)
        {
            if (substr($helper, 0, 1) != '/') {
                $helper = '/'.$helper;
            }
            if (substr($helper, -1) != '/') {                
                $helper = $helper.'/';
            }
            foreach (glob(app_path().$helper.'*.php') as $filename)
            {
                require_once($filename);
            }        
        }
    }
}