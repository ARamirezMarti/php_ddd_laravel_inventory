<?php

declare(strict_types=1);

namespace App\Modules\Shared\Domain\Subscribers;

interface EventSubscriber
{
	public static function subscribedTo(): array;
}