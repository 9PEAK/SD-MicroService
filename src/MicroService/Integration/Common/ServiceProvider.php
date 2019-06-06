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
		app()->singleton(DIR\WMS::class, function () {
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


		app()->singleton(DIR\Product::class, function () use (&$token){
			return new DIR\Product($token);
		});

		app()->singleton(DIR\Central::class, function () use (&$token){
			return new DIR\Central($token);
		});

	}


}
