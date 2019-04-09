<?php
namespace Peak\MicroService\Integration;

class User extends \Peak\MicroService\Core
{

	use Common\Handle;

	public function login ($account, $pwd)
	{
		return $this->handle(
			'guest/login',
			[
				'account' => $account,
				'pwd' => $pwd,
			]
		);
	}

}
