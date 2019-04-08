<?php

namespace Peak\MicroService\Integration\Common;

trait Handle
{

	protected function handle($url, $param, $method='post'):bool
	{
		if ($this->request(static::API_URL.$url, $param, $method)) {

			if (is_string($this->result) ) {
				$this->result = self::response();
				return false;
			}

			if (self::response()->res==1) {
				$this->result = self::response()->dat;
				return true;
			}
			$this->result = self::response();
		}

		return false;
	}


}