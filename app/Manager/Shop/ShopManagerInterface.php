<?php
namespace App\Manager\Shop;

use App\Services\Shop\ShopServiceInterface;

interface ShopManagerInterface
{
    public function make($name): ShopServiceInterface;
}