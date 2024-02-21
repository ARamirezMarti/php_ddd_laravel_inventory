<?php

namespace App\Providers;

use App\Modules\Shared\Infrastructure\Events\MessageBus\RabbitMqMessageBus;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $exchangesAndQueues = [
            'user' => [
                'inventory.user.1.user.registered'
            ],
            'inventory' => [
                'inventory.inventory.1.user.created.inventory',
                'inventory.inventory.1.user.deleted.inventory'
            ]
        ];

        $rabbit = new RabbitMqMessageBus();

        foreach ($exchangesAndQueues as $exchange => $queues) {
            $rabbit->generateExchanges($exchange);
            foreach ($queues as $queue) {
                $rabbit->generateQueue($queue);
            }
        }
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        //
    }
}
