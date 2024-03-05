<?php

namespace Inventory\Test\Unit;

use App\Modules\Inventory\Domain\Events\userCreatedInventory;
use App\Modules\Shared\Application\Events\EventBus;
use App\Modules\Shared\Domain\UuidGenerator;
use Hamcrest\Matchers;
use Illuminate\Foundation\Testing\WithFaker;
use Inventory\Application\UseCases\createInventory;
use Inventory\Domain\Entity\Inventory;
use Inventory\Domain\Repository\InventoryRepository;
use Mockery;
use Tests\TestCase;

class CreateInventoryTest extends TestCase
{
    use WithFaker;
    private InventoryRepository $inventoryRepositoryMock;
    private EventBus $eventBusMock;
    private UuidGenerator $uuidGenerator;

    public function setUp(): void
    {
        parent::setUp();

        $this->inventoryRepositoryMock = Mockery::mock(InventoryRepository::class);
        $this->eventBusMock = Mockery::mock(EventBus::class);
        $this->uuidGenerator = Mockery::mock(UuidGenerator::class);
    }

    /**
     * @group inventory
     */
    public function testCreateInventory(): void
    {
        $payload = [
            'uuid'        => $this->faker->uuid(),
            'user_id'     => $this->faker->randomNumber(),
            'name'        => $this->faker->name(),
            'description' => $this->faker->text(),
        ];

        $this->inventoryRepositoryMock
            ->shouldReceive('save')
            ->with(Matchers::anInstanceOf(Inventory::class))
            ->once()
            ->andReturnNull();

        $this->uuidGenerator
            ->shouldReceive('createUuid')
            ->once()
            ->andReturn(Matchers::stringValue());

        $this->eventBusMock
            ->shouldReceive('publish')
            ->with(Matchers::anInstanceOf(userCreatedInventory::class))
            ->once()
            ->andReturnNull();

        $useCase = new createInventory($this->inventoryRepositoryMock, $this->eventBusMock, $this->uuidGenerator);
        $useCase->__invoke($payload['uuid'], $payload['user_id'], $payload['name'], $payload['description']);
    }
}
