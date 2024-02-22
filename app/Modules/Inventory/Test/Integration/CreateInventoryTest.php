<?php

namespace App\Modules\Inventory\Test\Integration;

use App\Models\Inventory as ModelsInventory;
use App\Modules\Shared\Infrastructure\RamseyUuidCreator;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Inventory\Domain\Entity\Inventory;
use Inventory\Infrastructure\Http\Repository\EloquentInventoryRepository;
use Tests\TestCase;

class CreateInventoryTest extends TestCase
{
    use WithFaker;
    use DatabaseMigrations;
    private EloquentInventoryRepository $inventoryRepository;

    private RamseyUuidCreator $uuidGenerator;

    public function setUp(): void
    {
        parent::setUp();

        $this->inventoryRepository = new EloquentInventoryRepository();

        $this->uuidGenerator = new RamseyUuidCreator();
    }

    /**
     * @group inventory
     */
    public function test_create_inventory()
    {
        $inventory = new Inventory(
            $this->uuidGenerator->createUuid(),
            $this->faker->randomNumber(),
            $this->faker()->name(),
            $this->faker()->text());
        
        $this->inventoryRepository->save($inventory);

        $this->assertDatabaseHas(ModelsInventory::class,
        [
            'uuid' => $inventory->getUuid(),
            'user_id' => $inventory->getUserId(),
            'name' => $inventory->getName(),
            'description' => $inventory->getDescription(),
            ]
        );
    }

}
