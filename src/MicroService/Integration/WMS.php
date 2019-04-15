<?php
namespace Peak\MicroService\Integration;

class WMS extends \Peak\MicroService\Core
{

	use Common\Handle;

    const API_URL = 'http://sd-wms.9peak.net/ms/';

	public function lsWarehouse ()
	{
        return $this->handle(
            'warehouse',
            [],
            'get'
        );
	}

}
