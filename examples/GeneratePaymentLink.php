<?php

use GuzzleHttp\Exception\ClientException;
use Nikidze\BinancepayPhpSdk\Credential\AccountCredential;
use Nikidze\BinancepayPhpSdk\Domains\Env;
use Nikidze\BinancepayPhpSdk\Domains\Goods;
use Nikidze\BinancepayPhpSdk\Requests\CreateOrderRequest;
use Nikidze\BinancepayPhpSdk\Responses\ErrorResponse;

$goods = new Goods;

$goods->setGoodsType('01')
    ->setGoodsCategory('D000')
    ->setReferenceGoodsId('id')
    ->setGoodsName('Green Salad');

$env = new Env;

$env->setTerminalType(ENV::WEB)
    ->getForRequest();

$credential = new AccountCredential('api_key', 'api_secret');

$request = new CreateOrderRequest($credential);

try {
    $response = $request->setMerchantTradeNumber('1453')
        ->setOrderAmount(7)
        ->setCurrency('BUSD')
        ->setGoods($goods)
        ->setEnv($env)
        ->send();
    $url = $response->getCheckoutUrl();
} catch (ClientException $e) {
    $response = $e->getResponse();
    $response_body = $response->getBody()->getContents();
    $response = new ErrorResponse($response_body);
    $error_msg = $response->getMessage();
}
