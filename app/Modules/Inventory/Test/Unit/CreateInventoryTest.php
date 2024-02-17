<?php

namespace Inventory\Test\Unit;

use Inventory\Application\UseCases\createInventory;
use Inventory\Domain\Entity\Inventory;
use Inventory\Domain\Repository\InventoryRepository;
use Hamcrest\Matchers;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Tests\TestCase;

class CreateInventoryTest extends TestCase
{
    use WithFaker;
    private InventoryRepository $inventoryRepositoryMock;

    public function setUp(): void
    {
        parent::setUp();

        $this->inventoryRepositoryMock = Mockery::mock(InventoryRepository::class);
    }

    /**
     * @group inventory
     */
    public function test_create_inventory()
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

        $useCase = new createInventory($this->inventoryRepositoryMock);
        $useCase->__invoke($payload['uuid'], $payload['user_id'], $payload['name'], $payload['description']);
    }
}
