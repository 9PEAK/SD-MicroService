<?php
namespace Peak\MicroService\Integration;

class SDProduct extends \Peak\MicroService\Core {


	use Base;


	protected static function searchProduct (array $param /*, $query=null, $method='post'*/)
	{
		return @ [
			'id' => $param['id'],
			'exceptId' => $param['exceptId'],
			'mfn' => $param['mfn'],
			'exceptMfn' => $param['exceptMfn'],
			'name' => $param['name'],
			'categoryId' => $param['categoryId'],
		];
	}

}
