### 安装

```shell
composer require fangchaogang/kam-php "v1.*"
```

### 配置

在 .env 或者环境变量中加入

```ini
KAM_URL=http://10.10.21.22:8073
```

### 使用
[接口文档](http://blog.52keji.site/articles/2022/01/14/1642237882500)

#### 请求

```php


try {
    $req = new ReceiveRequest();
    //设置接口参数
    $req->setUserinfoId(8622309);
    $req->setCouponUri('1910081553dboosg');
    //请求接口
    $res = $req->request(); /*或者简化调用*/ $req();
    //使用返回结果
    $res->getCouponUri();

    //返回的 Response 对象始终是有效可用的，无需额外判断
    //请求失败或者接口出错时会抛出异常，建议按需捕获
} catch (\Exception $e) {
    //接口逻辑处理失败（明确返回的失败）
    //错误码：$e->getCode()
    //错误信息：$e->getMessage()
}
```


### 更新

```shell
composer update fangchaogang/kam-php
```

### 反馈

若有任何建议或者问题，欢迎给我们 [提 issue](https://github.com/fangchaogang/kam-php/issues/new)
