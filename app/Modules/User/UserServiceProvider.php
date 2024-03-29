<?php

namespace App\Modules\User;

use App\Modules\Shared\Domain\Events\EventBus;
use App\Modules\Shared\Domain\UuidGenerator;
use App\Modules\Shared\Infrastructure\Events\MessageBus\RabbitMqMessageBus;
use App\Modules\Shared\Infrastructure\RamseyUuidCreator;
use App\Modules\User\Domain\Hasher\DomainHasherInterface;
use App\Modules\User\Domain\Repository\UserRepository;
use App\Modules\User\Infrastructure\Http\Database\Repository\EloquentUserRepository;
use App\Modules\User\Infrastructure\Http\Hasher\Hasher;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Http\Controllers';

    public function register(): void {}

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/Infrastructure/Config/Routes/Routes.php');

        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        $this->app->bind(DomainHasherInterface::class, Hasher::class);
        $this->app->bind(EventBus::class, RabbitMqMessageBus::class);
        $this->app->bind(UuidGenerator::class, RamseyUuidCreator::class);
    }
}
