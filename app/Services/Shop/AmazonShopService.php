<?php
namespace App\Services\Shop;

class AmazonShopService implements ShopServiceInterface
{
    private $config;

    public function __construct($config)
    {
        dump("Amazon config was set in constructor...");

        $this->config = $config;

        dump($this->config);
    }
    public function getProducts(): array
    {
        return [
            'Amazon Product Sample #1',
            'Amazon Product Sample #2',
            'Amazon Product Sample #3',
        ];
    }
}