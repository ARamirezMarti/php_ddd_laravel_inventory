<?php

namespace App\Modules\Inventory;

use Inventory\Domain\Repository\InventoryRepository;
use Inventory\Infrastructure\Http\Repository\EloquentInventoryRepository;
use Illuminate\Support\ServiceProvider;
use App\Modules\Shared\Application\Events\EventBus;
use App\Modules\Shared\Domain\UuidGenerator;
use App\Modules\Shared\Infrastructure\Events\MessageBus\RabbitMqMessageBus;
use App\Modules\Shared\Infrastructure\RamseyUuidCreator;

class InventoryServiceProvider extends ServiceProvider
{


    public function register(): void
    {

    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/Infrastructure/Config/Routes/Routes.php');

        $this->app->bind(InventoryRepository::class, EloquentInventoryRepository::class);
        $this->app->bind(EventBus::class,RabbitMqMessageBus::class);
        $this->app->bind(UuidGenerator::class,RamseyUuidCreator::class);

    }

}
