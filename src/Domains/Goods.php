<?php

namespace Nikidze\BinancepayPhpSdk\Domains;

use Nikidze\BinancepayPhpSdk\Helpers\UnsetNullHelper;

class Goods
{

    private string $goods_type;

    private string $goods_category;

    private string $reference_goods_id;

    private string $goods_name;

    private string $goods_detail;

    //private array $goods_unit_amount;

    public function setGoodsType(string $goods_type): self
    {
        $this->goods_type = $goods_type;
        return $this;
    }
    public function setGoodsCategory(string $goods_category): self
    {
        $this->goods_category = $goods_category;
        return $this;
    }
    public function setReferenceGoodsId(string $reference_goods_id): self
    {
        $this->reference_goods_id = $reference_goods_id;
        return $this;
    }
    public function setGoodsName(string $goods_name): self
    {
        $this->goods_name = $goods_name;
        return $this;
    }
    public function setGoodsDetails(string $goods_detail): self
    {
        $this->goods_detail = $goods_detail;
        return $this;
    }

    public function getForRequest(): array
    {
        return UnsetNullHelper::unset([
            'goodsType' => $this->goods_type ?? null,
            'goodsCategory' => $this->goods_category ?? null,
            'referenceGoodsId' => $this->reference_goods_id ?? null,
            'goodsName' => $this->goods_name ?? null,
            'goodsDetail' => $this->goods_detail ?? null,
        ]);
    }

}
