<?php
namespace App\Services\Shop;

class JumiaShopService implements ShopServiceInterface
{
    private $config;

    public function __construct($config)
    {
        dump("Jumia config was set in constructor...");

        $this->config = $config;

        dump($this->config);
    }
    public function getProducts(): array
    {
        return [
            'Jumia Product Sample #1',
            'Jumia Product Sample #2',
            'Jumia Product Sample #3',
        ];
    }
}