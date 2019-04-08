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
		$this->app->singleton(DIR\Product::class, function (){
			return new DIR\Product(
				new Token([
					'id' => 'sd-product',
					'key' => config('services.sd.sd-product'),
				])
			);
		});
	}


}
