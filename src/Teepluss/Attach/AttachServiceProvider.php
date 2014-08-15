<?php namespace Teepluss\Attach;

use Illuminate\Support\ServiceProvider;

class AttachServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('teepluss/attach');
    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['attach'] = $this->app->share(function($app)
		{
			return new Attach($app['config'], $app['request'], $app['files']);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('attach');
	}

}
