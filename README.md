# SD-MicroService

该仓库为SD的微服务框架，仅限SD项目使用。
##### 安装
> composer require 9peak/sd-integration

##### 核心文件
所有的核心文件都必须放置在“src/MicroService/Integration/”目录之下，一个应用对应一个文件。
例如，在微服务中存在两个服务（或者称之为应用）：论坛和商城。那么对应建立的文件应该是
> src/MicroService/Integration/BBS.php <br>
> src/MicroService/Integration/EC

##### 依赖
该库依赖并继承 9Peak/MicroService仓库 （https://github.com/9PEAK/PHP-MicroService）



