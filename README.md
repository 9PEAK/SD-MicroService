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
9Peak/MicroService封装了请求和返回值的处理，因此开发人员无需关注这些，编写代码时只需要专注请求的路由和参数——之前强调过集成的都是请求业务。
<br> 方法都是 <pre>protected static</pre> 类型的方法
```php
class ECShop extends \Peak\MicroService\Core {
	
	protected static function getOrderDetail(array $param) {
		return [
			'order_id' => $param['order_id'],
		];
	}

}

```



