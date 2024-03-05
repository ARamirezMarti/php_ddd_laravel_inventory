<?php

namespace Inventory\Domain\Entity;

class Inventory
{
    public function __construct(private string $uuid, private string $userId, private string $name, private string $description) {}

    public function getUuid()
    {
        return $this->uuid;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }
}
