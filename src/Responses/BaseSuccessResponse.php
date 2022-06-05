<?php

namespace Nikidze\BinancepayPhpSdk\Responses;

class BaseSuccessResponse extends BaseResponse
{
    public function isSuccess(): bool
    {
        return true;
    }
}
