<?php
namespace Peak\MicroService\Integration;

class Product extends \Peak\MicroService\Core
{

	use Common\Handle;

	const API_URL = 'http://sd.9peak.net/ms/product/';

	/**
	 * 获取商品明细
	 * @param $id int|array 商品id
	 * */
	public function detail ($id):bool
	{
		return $this->handle(
			'detail',
			[
				'id' => $id
			]
		);
	}



	/**
	 * 搜索商品
	 * @param $mfn string mfn
	 * */
	public function search ($mfn=null):bool
	{
		$param = [];
		$mfn && $param['mfn']=$mfn;

		return $this->handle(
			'search',
			$param
		);
	}


//	protected static function search (array $param /*, $query=null, $method='post'*/)
//	{
//		return @ [
//			'id' => $param['id'],
//			'exceptId' => $param['exceptId'],
//			'mfn' => $param['mfn'],
//			'exceptMfn' => $param['exceptMfn'],
//			'name' => $param['name'],
//			'categoryId' => $param['categoryId'],
//		];
//	}




}
