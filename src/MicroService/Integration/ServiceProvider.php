<?php
namespace Peak\MicroService\Integration;

class ServiceProvider extends \Illuminate\Support\ServiceProvider{


	public function register ()
	{
		$this->sdProduct();
	}


	private function sdProduct()
	{
		$this->app->singleton('Peak\MicroService\Integration\SDProduct', function (){
			return new \Peak\MicroService\Integration\SDProduct(
				[
					'token' => [
						'id' => 'sd-product',
						'key' => config('api.sd.sd-product')
					]
				],
				[
					'api_url' => 'http://sd.9peak.net/ms/'
				]
			);
		});
	}


}
