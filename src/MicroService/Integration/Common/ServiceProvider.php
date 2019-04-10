<?php

namespace Peak\MicroService\Integration\Common;

use Peak\MicroService\Auth\Token;
use Peak\MicroService\Integration as DIR;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{


	public function register ()
	{
		$this->sdMsProduct();
		$this->sdMsWms();
	}


	public function sdMsWms ()
	{
		$this->app->singleton(DIR\WMS::class, function () use (&$token){
			return new DIR\WMS(new Token([
				'id' => 'sd-wms',
				'key' => config('services.sd.sd-wms'),
			]));
		});
	}

	protected function sdMsProduct ()
	{
		$token = new Token([
			'id' => 'sd-product',
			'key' => config('services.sd.sd-product'),
		]);


		$this->app->singleton(DIR\Product::class, function () use (&$token){
			return new DIR\Product($token);
		});

		$this->app->singleton(DIR\Central::class, function () use (&$token){
			return new DIR\Central($token);
		});

	}


}
