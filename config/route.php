<?php
/**
 * This file is part of webman.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the MIT-LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author    walkor<walkor@workerman.net>
 * @copyright walkor<walkor@workerman.net>
 * @link      http://www.workerman.net/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Webman\Route;

Route::fallback(function(){
    // 处理跨域 options 请求
    response()->withHeaders([
        'Access-Control-Allow-Credentials' => 'true',
        'Access-Control-Allow-Origin' => request()->header('Origin', '*'),
        'Access-Control-Allow-Methods' => '*',
        'Access-Control-Allow-Headers' => '*',
    ]);
    if (request()->method() == 'OPTIONS') {
        return response();
    }

    return apiJson([], 404);
});


// 引用 routes 中的路由文件
foreach (glob(BASE_PATH . "/routes/*.php") as $filename)
{
    require_once $filename;
}

# 关闭自动路由
Route::disableDefaultRoute();




