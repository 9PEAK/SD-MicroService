# SD-MicroService

该仓库为SD的微服务框架，仅限SD项目使用。
#### 安装
> composer require 9peak/sd-integration

#### 依赖
该库依赖并继承 9Peak/MicroService仓库 （https://github.com/9PEAK/PHP-MicroService）


#### 集成
所有集成文件都必须放置在“src/MicroService/Integration/”目录之下，一个应用对应一个文件。
例如，在微服务中存在两个服务（或者称之为应用）：论坛和商城。那么对应建立的文件应该是
> src/MicroService/Integration/BBS.php <br>
> src/MicroService/Integration/ECShop.php
需要额外提醒的是，如果某些接口在全系统中如果仅被一个应用使用，是无需编写入集成包的，只需要在项目中编写即可。

#### 封装
集成文件封装了应用间交互时的请求业务——强调一下，是请求业务——以供服务内所有应用复用。
<br> 例如，有多个应用需要查看电商的订单详情，那么在ECShop中就应该有对应的方法
```php
class ECShop extends \Peak\MicroService\Core {
	
	protected static function getOrderDetail(array $param) {
		return [
			'order_id' => $param['order_id'],
		];
	}

}

```


#### 规范
9Peak/MicroService封装了请求和返回值的处理，因此开发人员无需关注这些底层细节，编写代码时只需要专注请求的路由和参数——之前强调过集成的都是请求业务。
<br>以上述代码为例，规范如下：
<ul>
	<li>所有类必须继承 <b>\Peak\MicroService\Core</b></li>
	<li>方法都是 <b>protected static</b> 类型的方法；</li>
	<li>参数是和外部调用时约定的输入参数；</li>
	<li>返回值即是向响应应用提交的参数，必须是数组；</li>
	<li>路由和方法名相关，例如域名是 <i>http://domain/api/</i>，那么使用该方法的路由就是 <i>http://domain/api/getOrderDetail </i>。</li>
</ul>
	
#### 使用

```php

$api = new ECShop (
	[
		'token' => [
			'id' => '{api_key}',
			'key' => '{api_secret}'
		]
	],
	[
		'api_url' => 'http://domain/api/'
	]
);

// 方法一 通用方法
$res = $api->request(
	'getOrderDetail' , // 集成方法
	$param, // 提供给集成方法的参数
	$query, // 追加至url末尾的get参数
	'post' // 请求方法
);


// 方法二 集成方法
$res = $api->getOrderDetail(
	$param, // 提供给集成方法的参数
	$query, // 追加至url末尾的get参数
	'post' // 请求方法
);


if ($res ) {
	$api->result; // 获取返回值 继续后续业务逻辑
} else {
	print_r($api->result); // 请求出错，打印debug数据
}
```


