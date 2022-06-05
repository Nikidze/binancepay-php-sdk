<?php

namespace Nikidze\BinancepayPhpSdk\Responses;

abstract class BaseResponse
{

    protected array $response;

    public function __construct(string $response) {
        $this->response = json_decode($response, true);
    }

    public function getStatus(): string
    {
        return $this->response['status'];
    }

    public function getCode(): string
    {
        return $this->response['code'];
    }

    abstract public function isSuccess(): bool;

}
