<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use App\Services\CommentsService;

class CommentsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        AliasLoader::getInstance()->alias('Comments', 'App\Facades\Comments');
		
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['comments'] = $this->app->share(function($app)
		{
			return new CommentsService($app->view);
		});
    }
	
	/**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Connection::class];
    }


}
