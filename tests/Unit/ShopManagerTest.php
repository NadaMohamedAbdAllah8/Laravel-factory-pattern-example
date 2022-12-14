<?php
namespace Tests\Unit;

use App\Manager\Shop\ShopManagerInterface;
use Tests\TestCase;

class ShopManagerTest extends TestCase
{
    public function test_can_use_ebay_service()
    {
        $factory = app(ShopManagerInterface::class);

        $service = $factory->make('ebay');

        $products = $service->getProducts();

        dump($products);

        self::assertEquals([
            'Ebay Product Sample #1',
            'Ebay Product Sample #2',
            'Ebay Product Sample #3',
        ], $products);
    }

    public function test_can_use_amazon_service()
    {
        $factory = app(ShopManagerInterface::class);

        $service = $factory->make('amazon');

        $products = $service->getProducts();

        dump($products);

        self::assertEquals([
            'Amazon Product Sample #1',
            'Amazon Product Sample #2',
            'Amazon Product Sample #3',
        ], $products);
    }

    public function test_can_use_jumia_service()
    {
        $factory = app(ShopManagerInterface::class);

        $service = $factory->make('jumia');

        $products = $service->getProducts();

        dump($products);

        self::assertEquals([
            'Jumia Product Sample #1',
            'Jumia Product Sample #2',
            'Jumia Product Sample #3',
        ], $products);
    }

    public function test_cannot_mix_ebay_amazon_services()
    {
        $factory = app(ShopManagerInterface::class);

        $service = $factory->make('ebay');

        $products = $service->getProducts();

        dump($products);

        self::assertNotEquals([
            'Amazon Product Sample #1',
            'Ebay Product Sample #2',
            'Ebay Product Sample #3',
        ], $products);
    }
}