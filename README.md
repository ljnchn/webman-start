# 自用 webman 框架初始化

[webman](https://www.workerman.net/doc/webman/) 是我非常喜欢的一款高性能 HTTP 服务框架，根据自己的需求做了一些目录的改动跟初始化的东西。主要用于提供 API 接口。 此代码在 PHP8.1 环境使用的，8.1 版本以下的可以自己改造一下，去除掉 enum 的支持。

## 目录结构

├──Admin
│   ├── Controller
│   └── Models
├── Api
│   ├── Controller
│   └── Models
├── Enums
├── Middleware
├── Models
└── functions.php

app 目录下的文件夹全部大写（强迫症，这样代码引用的时候就能都是大写了）

根目录增加了 routes 文件专门用来存放路由文件（PS 各个路由文件并不是独立的，只是拆分为多个文件，便于管理查看）

app目录增加子目录（Admin ，Api）用于多应用模式

实例为两个应用模块，一个为 Admin，一个为 Api，各自可以有单独的 Models 文件夹，也有共用的 Models 文件夹。这两个模块分别对应根目录 routes 中 admin.php 路由文件和 api.php 路由文件。



## 使用方式

- 执行 composer install

- 复制目录下的 .env.example 文件为 .env

- 修改 .env 中环境变量
- 启动
  - 调试模式 `php webman start`
  - 正式环境 `php webman start -d`

## 额外使用的依赖包

```php
    "psr/container": "^v1", // 依赖注入
    "php-di/php-di": "^6.4", // 依赖注入
    "doctrine/annotations": "^1.13", // 依赖注入

    "illuminate/database": "^9.9", // laravel 默认的数据库
    "illuminate/pagination": "^9.12", // laravel 默认的数据库分页
    "illuminate/events": "^9.11", // laravel 默认的数据库事件
    "illuminate/redis": "^9.9",	// redis 依赖

    "vlucas/phpdotenv": "^5.4", // .env 文件支持
    "symfony/translation": "^6.0", // 多语言支持
    "symfony/cache": "^6.0", // 缓存支持
    "archtechx/enums": "^0.3.0" // enum 快捷使用
```

## 多应用解决方案

与 webman 官网提供的多应用解决方案不同，我主要才用路由文件来实现。

以示例代码来看，Admin 和 Api 分别对应不同的应用。分别对应 routes/admin.php, routes/api.php，启动后的地址为 http://localhost:8787/admin、http://localhost:8787/api/。然后 nginx 转发时，对应不同的域名即可。



