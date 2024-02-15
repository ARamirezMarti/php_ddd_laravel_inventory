<?php

namespace User\Infrastructure\Events;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class userRegistered implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->queue="emails";
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        echo "Sending email to registered user";
    }
}
