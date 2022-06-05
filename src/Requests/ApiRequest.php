<?php

namespace Nikidze\BinancepayPhpSdk\Requests;

use Nikidze\BinancepayPhpSdk\Credential\AccountCredential;
use Nikidze\BinancepayPhpSdk\Helpers\NonceHelper;
use Nikidze\BinancepayPhpSdk\Helpers\SignatureHelper;
use Nikidze\BinancepayPhpSdk\HttpClient\Client;
use Nikidze\BinancepayPhpSdk\Responses\BaseResponse;

abstract class ApiRequest
{

    private AccountCredential $credential;

    protected array $headers;

    protected string $json_body;

    protected string $endpoint;


    public function __construct(AccountCredential $credential) {
        $this->credential = $credential;
    }

    public function generateHeaders(): void
    {
        $this->headers = [
            'content-type' => 'application/json',
            'BinancePay-Timestamp' => (string)(int)(microtime(true) * 1000),
            'BinancePay-Nonce' => NonceHelper::generate(),
            'BinancePay-Certificate-SN' => $this->credential->getApiKey(),
        ];
        $this->headers['BinancePay-Signature'] = $this->getSignature();
    }

    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    public function getHeaders(): array
    {
        if(!($this->headers ?? null)) $this->generateHeaders();
        return $this->headers;
    }

    public function getBody(): string
    {
        if(!($this->json_body ?? null)) $this->generateBody();
        return $this->json_body;
    }

    public function send(): BaseResponse
    {
        return (new Client)->send($this);
    }

    private function getSignature(): string
    {
        return SignatureHelper::generate($this->headers, $this->getBody(), $this->credential->getApiSecret());
    }

    abstract public function getResponseClass(): string;

    abstract protected function generateBody(): void;

}
