<?php

namespace App\Modules\Inventory;

use Inventory\Domain\Repository\InventoryRepository;
use Inventory\Infrastructure\Http\Repository\EloquentInventoryRepository;
use Illuminate\Support\ServiceProvider;

class InventoryServiceProvider extends ServiceProvider
{


    public function register(): void
    {

    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/Infrastructure/Config/Routes/Routes.php');

        $this->app->bind(InventoryRepository::class, EloquentInventoryRepository::class);
    }

}
