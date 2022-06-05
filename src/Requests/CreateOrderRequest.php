<?php

namespace Nikidze\BinancepayPhpSdk\Requests;

use Nikidze\BinancepayPhpSdk\Domains\Env;
use Nikidze\BinancepayPhpSdk\Domains\Goods;
use Nikidze\BinancepayPhpSdk\Domains\Merchant;
use Nikidze\BinancepayPhpSdk\Helpers\JsonHelper;
use Nikidze\BinancepayPhpSdk\Helpers\UnsetNullHelper;
use Nikidze\BinancepayPhpSdk\Responses\CreateOrderResponse;

class CreateOrderRequest extends ApiRequest
{

    protected string $endpoint = '/binancepay/openapi/v2/order';

    private Merchant $merchant;

    private Env $env;

    private Goods $goods;

    private string $merchant_trade_no;

    private float $order_amount;

    private string $currency;

    private string $return_url;

    private string $cancel_url;

    private int $order_expire_time;

    private string $support_pay_currency;

    private string $app_id;

    private string $universal_url_attach;

    public function setMerchant(Merchant $merchant): self
    {
        $this->merchant = $merchant;
        return $this;
    }

    public function setEnv(Env $env): self
    {
        $this->env = $env;
        return $this;
    }

    public function setGoods(Goods $goods): self
    {
        $this->goods = $goods;
        return $this;
    }

    public function setMerchantTradeNumber(string $merchant_trade_no): self
    {
        $this->merchant_trade_no = $merchant_trade_no;
        return $this;
    }

    public function setOrderAmount(float $order_amount): self
    {
        $this->order_amount = $order_amount;
        return $this;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;
        return $this;
    }

    public function setReturnUrl(string $return_url): self
    {
        $this->return_url = $return_url;
        return $this;
    }
    public function setCancelUrl(string $cancel_url): self
    {
        $this->cancel_url = $cancel_url;
        return $this;
    }

    public function setOrderExpireTime(int $order_expire_time): self
    {
        $this->order_expire_time = $order_expire_time;
        return $this;
    }

    public function setSupportCurrncy(string $support_pay_currency): self
    {
        $this->support_pay_currency = $support_pay_currency;
        return $this;
    }

    public function setAppId(string $app_id): self
    {
        $this->app_id = $app_id;
        return $this;
    }

    public function setUniversalUrl(string $universal_url_attach): self
    {
        $this->universal_url_attach = $universal_url_attach;
        return $this;
    }

    public function send(): CreateOrderResponse
    {
        return parent::send();
    }

    public function getResponseClass(): string
    {
        return CreateOrderResponse::class;
    }

    protected function generateBody(): void
    {
        $this->json_body = JsonHelper::encode(UnsetNullHelper::unset([
            'merchant' => isset($this->merchant) ? $this->merchant->getForRequest() : null,
            'env' => isset($this->env) ? $this->env->getForRequest() : null,
            'goods' => isset($this->goods) ? $this->goods->getForRequest() : null,
            'merchantTradeNo' => $this->merchant_trade_no ?? null,
            'orderAmount' => $this->order_amount  ?? null,
            'currency' => $this->currency  ?? null,
            'returnUrl' => $this->return_url  ?? null,
            'cancelUrl' => $this->cancel_url  ?? null,
            'orderExpireTime' => $this->order_expire_time  ?? null,
            'supportPayCurrency' => $this->support_pay_currency  ?? null,
            'appId' => $this->app_id  ?? null,
            'universalUrlAttach' => $this->universal_url_attach  ?? null,
        ]));
    }

}
