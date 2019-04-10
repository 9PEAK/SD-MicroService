<?php

namespace Peak\MicroService\Integration\Common;

use Peak\MicroService\Auth\Token;
use Peak\MicroService\Integration as DIR;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{


	public function register ()
	{
		$this->sdMsProduct();
	}


	protected function sdMsProduct ()
	{
		$token = new Token([
			'id' => 'sd-product',
			'key' => config('services.sd.sd-product'),
		]);


		$this->app->singleton(DIR\Product::class, function () use ($token){
			return new DIR\Product($token);
		});

		$this->app->singleton(DIR\User::class, function () use ($token){
			return new DIR\User($token);
		});
	}


}
