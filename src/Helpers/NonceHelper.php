<?php

namespace Nikidze\BinancepayPhpSdk\Helpers;

class NonceHelper
{
    
    public static function generate(): string
    {
        $symbols = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle(str_repeat($symbols, ceil(32/strlen($symbols)) )),1,32);
    }

}
