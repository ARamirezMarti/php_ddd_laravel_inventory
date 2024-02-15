<?php

namespace App\Providers;

use App\Modules\User\Infrastructure\MessageBus\RabbitMqMessageBus;
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
            ''noexp.user.1.user.registered'
        ];

        $rabbit = new RabbitMqMessageBus();
        
        $this->channel->exchange_declare($this->exchange, 'direct', false, true, false);

        foreach ($queues as $queue) {
            $rabbit->generateQueue($queue);
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
