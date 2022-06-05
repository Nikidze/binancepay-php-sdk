<?php

namespace Nikidze\BinancepayPhpSdk\Helpers;

class SignatureHelper
{

    public static function generate(array $headers, string $json_body, string $secret): string
    {
        $timestamp = $headers['BinancePay-Timestamp'];
        $nonce = $headers['BinancePay-Nonce'];
        $sg_payload = $timestamp.PHP_EOL.$nonce.PHP_EOL.$json_body.PHP_EOL;
        $hmac = hash_hmac('sha512', $sg_payload, $secret);
        return mb_strtoupper($hmac);
    }
}
