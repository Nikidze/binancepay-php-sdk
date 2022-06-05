<?php

namespace Nikidze\BinancepayPhpSdk\Helpers;

class JsonHelper
{

    public static function encode(array $array): string
    {
        $json = json_encode($array);
        $json = str_replace('":', '": ', $json);
        return str_replace(',', ', ', $json);
    }

}
