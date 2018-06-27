# SD-MicroService

该仓库为SD的微服务框架，仅限SD项目使用。
#### 安装
> composer require 9peak/sd-integration

#### 集成
所有集成文件都必须放置在“src/MicroService/Integration/”目录之下，一个应用对应一个文件。
例如，在微服务中存在两个服务（或者称之为应用）：论坛和商城。那么对应建立的文件应该是
> src/MicroService/Integration/BBS.php <br>
> src/MicroService/Integration/ECShop.php

集成文件封装了应用间交互时的请求业务——强调一下，是请求业务，以供服务内所有应用复用。
<br> 例如，有多个应用需要查看电商的订单详情，那么在ECShop中就应该有对应的方法
```php
function getAmazonOrders() {
    $amz = new AmazonOrderList("myStore"); //store name matches the array key in the config file
    $amz->setLimits('Modified', "- 24 hours");
    $amz->setFulfillmentChannelFilter("MFN"); //no Amazon-fulfilled orders
    $amz->setOrderStatusFilter(
        array("Unshipped", "PartiallyShipped", "Canceled", "Unfulfillable")
        ); //no shipped or pending
    $amz->setUseToken(); //Amazon sends orders 100 at a time, but we want them all
    $amz->fetchOrders();
    return $amz->getList();
}
```

#### 依赖
该库依赖并继承 9Peak/MicroService仓库 （https://github.com/9PEAK/PHP-MicroService）



