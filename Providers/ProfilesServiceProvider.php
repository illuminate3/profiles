<?php
namespace App\Modules\Profiles\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;

class ProfilesServiceProvider extends ServiceProvider
{
	/**
	 * Register the Profiles module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.

		$this->registerNamespaces();
		$this->registerProviders();
	}

	/**
	 * Register the Menus module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
//		Lang::addNamespace('profiles', realpath(__DIR__.'/../Resources/Lang'));
		View::addNamespace('profiles', realpath(__DIR__.'/../Resources/Views'));
	}


	/**
	 * Boot the service provider.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->publishes([
			__DIR__ . '/../Config/profiles.php' => config_path('profiles.php'),
// 			__DIR__ . '/../Publish/assets/vendors' => base_path('public/assets/vendors/'),
// 			__DIR__ . '/../Publish/Plugins' => base_path('app/Plugins/'),
// 			__DIR__ . '/../Publish/views/plugins/' => base_path('resources/views/plugins/'),
		]);
/*
		$this->publishes([
			__DIR__ . '/../Publish/assets/vendors' => base_path('public/assets/vendors/'),
		], 'js');

		$this->publishes([
			__DIR__ . '/../Publish/Plugins' => base_path('app/Plugins/'),
		], 'plugins');

		$this->publishes([
			__DIR__ . '/../Publish/views/plugins/' => base_path('resources/views/plugins/'),
		], 'views');
*/
/*
		AliasLoader::getInstance()->alias(
			'Menu',
			'Menu\Menu'
		);
*/

	}


	/**
	* add Prvoiders
	*
	* @return void
	*/
	private function registerProviders()
	{
		$app = $this->app;

		$app->register('App\Modules\Profiles\Providers\RouteServiceProvider');
//		$app->register('Menu\MenuServiceProvider');
	}


}
