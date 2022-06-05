<?php

namespace Nikidze\BinancepayPhpSdk\Helpers;

class UnsetNullHelper
{

    public static function unset(array $array): array
    {
        return array_filter($array, function($value) { return !is_null($value) && $value !== ''; });
    }

}
