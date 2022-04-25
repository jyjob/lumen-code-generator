# lumen代码生成器

#### 介绍
lumen代码生成，目前仅支持特定项目生成，内部使用

#### 安装教程

composer安装
``` bash
$ composer require jiyongwang/lumen-code-generator
```

在app.php添加服务提供者
```php
$app->register(jiyongwang\LumenCodeGenerator\Providers\LumenCodeGeneratorProvider::class);
```

#### 使用说明

```shell script
php artisan make:xbull_admin Help

请输入命名空间，分层级例如：Help/Help:
 > xb_help

请输入对应的数据库表表名，例如：xb_help，需要表前缀:
 > xb_help

 请输入对应的功能名称用于备注，例如：帮助中心:
 > 帮助中心

 请输入需要生成的代码层级：1.model 2.repository 3.service 4.controller 5.request_vo 6.transform
数字以逗号隔开,输入n代表都需要:
 > n

 请输入作者，例如：abc
 > zhang san

```

#### 参与贡献

1.  laravel代码生成 [keepondream/laravel-service](https://github.com/keepondream/laravel-service)
