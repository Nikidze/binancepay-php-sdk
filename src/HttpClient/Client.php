<?php

namespace Nikidze\BinancepayPhpSdk\HttpClient;

use GuzzleHttp\Client as GuzzleHttpClient;
use Nikidze\BinancepayPhpSdk\Requests\ApiRequest;
use Nikidze\BinancepayPhpSdk\Responses\BaseResponse;

class Client
{

    private ApiRequest $request;

    const ENDPOINT = 'https://bpay.binanceapi.com';

    public function send(ApiRequest $request): BaseResponse
    {
        $this->request = $request;
        $response = (new GuzzleHttpClient)->post(
            $this->getRequestUrl(),
            [
                'body' => $this->request->getBody(),
                'headers' => $this->request->getHeaders(),
            ]
        );
        $response_body = $response->getBody()->getContents();
        $response_class = $request->getResponseClass();
        return new $response_class($response_body);
    }

    private function getRequestUrl(): string
    {
        return self::ENDPOINT . $this->request->getEndpoint();
    }
}
