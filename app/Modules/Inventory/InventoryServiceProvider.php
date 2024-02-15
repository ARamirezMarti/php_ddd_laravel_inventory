<?php

namespace App\Modules\Inventory;

use App\Modules\Inventory\Domain\Repository\InventoryRepository;
use App\Modules\Inventory\Infrastructure\Http\Repository\EloquentInventoryRepository;
use Illuminate\Support\ServiceProvider;

class InventoryServiceProvider extends ServiceProvider
{

    protected $namespace = 'App\Http\Controllers';

    public function register(): void
    {

    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/Infrastructure/Config/Routes/Routes.php');

        $this->app->bind(InventoryRepository::class, EloquentInventoryRepository::class);
    }

}
