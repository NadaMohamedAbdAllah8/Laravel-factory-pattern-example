<?php
namespace App\Manager\Shop;

use App\Manager\Shop\ShopManagerInterface;
use App\Services\Shop\AmazonShopService;
use App\Services\Shop\EbayShopService;
use App\Services\Shop\JumiaShopService;
use App\Services\Shop\ShopServiceInterface;
use Illuminate\Support\Arr;

class ShopManager implements ShopManagerInterface
{
    private $shops = [];

    private $app;

    // app as a parameter because we do not have access on it
    public function __construct($app)
    {
        $this->app = $app;
    }

    public function make($name): ShopServiceInterface
    {
        $service = Arr::get($this->shops, $name);

        // No need to create the service every time
        if ($service) {
            return $service;
        }

        $createMethod = 'create' . ucfirst($name) . 'ShopService';

        if (!method_exists($this, $createMethod)) {
            throw new \Exception("Shop $name is not supported");
        }

        $service = $this->{$createMethod}();

        $this->shops[$name] = $service;

        return $service;
    }

    private function createEbayShopService(): EbayShopService
    {
        dump("Creating EbayShopService...");

        $config = $this->app['config']['shops.ebay'];

        $service = new EbayShopService($config);

        // Do the necessary configuration to use the Ebay service
        return $service;
    }

    private function createAmazonShopService(): AmazonShopService
    {
        dump("Creating AmazonShopService...");

        $config = $this->app['config']['shops.amazon'];

        $service = new AmazonShopService($config);

        return $service;
    }

    private function createJumiaShopService(): JumiaShopService
    {
        dump("Creating JumiaShopService...");

        $config = $this->app['config']['shops.Jumia'];

        $service = new JumiaShopService($config);

        return $service;
    }
}