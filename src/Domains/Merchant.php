<?php

namespace Nikidze\BinancepayPhpSdk\Domains;

class Merchant
{

    private string $sub_merchant_id;

    public function setSubMerchantId(string $sub_merchant_id): self
    {
        $this->sub_merchant_id = $sub_merchant_id;
        return $this;
    }

    public function getForRequest(): array
    {
        return [
            'subMerchantId' => $this->sub_merchant_id  ?? null,
        ];
    }

}
