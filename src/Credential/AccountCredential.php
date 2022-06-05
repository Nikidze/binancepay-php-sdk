<?php

namespace Nikidze\BinancepayPhpSdk\Credential;

class AccountCredential
{

    private string $api_key;

    private string $api_secret;

    public function __construct(string $api_key, string $api_secret)
    {
        $this->api_key = $api_key;
        $this->api_secret = $api_secret;
    }

    public function getApiKey(): string
    {
        return $this->api_key;
    }

    public function getApiSecret(): string
    {
        return $this->api_secret;
    }

}
