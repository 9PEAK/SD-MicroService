<?php
namespace Peak\MicroService\Integration;

class SDUser extends \Peak\MicroService\Core {


	use Base;


	protected static function pwdGetUser (array $param /*, $query=null, $method='post'*/)
	{
		return @[
			'account' => $param['account'],
			'pwd' => $param['pwd'],
		];
	}

}
