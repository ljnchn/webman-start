<?php

/**
 * Here is your custom functions.
 */

use support\Response;
use support\Request;
use App\Enums\ApiCode;

/**
 * @param $data
 * @param int $httpCode
 * @param int $options
 * @return Response
 */
function apiJson($data, int $httpCode = 200, int $options = JSON_UNESCAPED_UNICODE): Response
{
    return new Response($httpCode, ['Content-Type' => 'application/json'], json_encode($data, $options));
}

/**
 * 成功返回json
 *
 * @param string $msg
 * @param array $data
 * @param integer $code
 * @return Response
 */
function successJson(string $msg = 'success', array $data = [], int $code = null): Response
{
    $code = $code ?? ApiCode::SUCCESS();
    return apiJson(['code' => $code, 'msg' => $msg, 'data' => $data], 200);
}

/**
 * 失败返回json
 *
 * @param string $msg
 * @param array $data
 * @param integer $code
 * @return Response
 */
function failJson(string $msg = 'fail', array $data = [], int $code = null): Response
{
    $code = $code ?? ApiCode::FAIL;
    return apiJson(['code' => $code, 'msg' => $msg, 'data' => $data], 200);
}

function getUserId()
{
    $tenantId = request()->uid ?? false;
    if (!$tenantId) {
        throw new \Exception('user id not null');
    }
    return $tenantId;
}

/**
 * 生成登录时的 token
 *
 * @param String $data
 * @return String
 */
function generateToken(string $data): string
{
    $key = config('common.auth.key');
    $alg = config('common.auth.alg');

    return hash_hmac($alg, $data, $key);
}
