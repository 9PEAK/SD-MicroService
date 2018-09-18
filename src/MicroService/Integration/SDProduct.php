<?php
namespace Peak\MicroService\Integration;

class SDProduct extends \Peak\MicroService\Core {


	use Base;

    protected  static $searchProduct = 'product/searchProduct';
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



    protected  static $createProduct = 'product/create';
    protected static function createProduct (array $param /*, $query=null, $method='post'*/)
    {
        return $param;
    }


	// 用户模块
	protected static function pwdGetUser (array $param /*, $query=null, $method='post'*/)
	{
		return @[
			'account' => $param['account'],
			'pwd' => $param['pwd'],
		];
	}


    protected static $createPlan = 'purchase/createPlan';
    // 采购plan
    protected static function createPlan (array $param)
    {
        return $param;
    }

}
