<?php

namespace Nikidze\BinancepayPhpSdk\Responses;

class ErrorResponse extends BaseResponse
{
    public function getMessage(): string
    {
        return $this->response['errorMessage'];
    }

    public function isSuccess(): bool
    {
        return false;
    }

}
