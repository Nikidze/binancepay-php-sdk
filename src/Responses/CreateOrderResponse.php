<?php

namespace Nikidze\BinancepayPhpSdk\Responses;

class CreateOrderResponse extends BaseSuccessResponse
{
    public function getPrepayId(): string
    {
        return $this->response['data']['prepayId'];
    }

    public function getTerminalType(): string
    {
        return $this->response['data']['terminalType'];
    }

    public function getExpireTime(): int
    {
        return $this->response['data']['expireTime'];
    }

    public function getQrcodeLink(): string
    {
        return $this->response['data']['qrcodeLink'];
    }

    public function getQrContent(): string
    {
        return $this->response['data']['qrContent'];
    }

    public function getCheckoutUrl(): string
    {
        return $this->response['data']['checkoutUrl'];
    }

    public function getDeeplink(): string
    {
        return $this->response['data']['deeplink'];
    }

    public function getUniversalUrl(): string
    {
        return $this->response['data']['universalUrl'];
    }

}
