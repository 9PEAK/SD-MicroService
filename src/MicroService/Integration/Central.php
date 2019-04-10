<?php
namespace Peak\MicroService\Integration;

class Central extends \Peak\MicroService\Core
{

	use Common\Handle;

	const API_URL = 'http://sd.9peak.net/ms/';

	public function guestLogin ($account, $pwd)
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
