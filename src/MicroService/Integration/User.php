<?php
namespace Peak\MicroService\Integration;

class User extends \Peak\MicroService\Core
{

	use Common\Handle;


	protected static function login (array $param /*, $query=null, $method='post'*/)
	{
		return @[
			'account' => $param['account'],
			'pwd' => $param['pwd'],
		];
	}



	//search user
	protected static function search (array $param)
	{
		return $param;
	}



}
