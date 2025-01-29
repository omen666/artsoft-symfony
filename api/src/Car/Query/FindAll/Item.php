<?php

declare(strict_types=1);

namespace App\Car\Query\FindAll;

use App\Car\Entity\Car;
use JsonSerializable;

final class Item implements JsonSerializable
{
    public function __construct(private readonly Car $car)
    {
    }

    public function getId(): int
    {
        return $this->car->getId();
    }

    public function jsonSerialize(): array
    {
        return [
            'id'    => $this->car->getId(),
            'brand' => [
                'id'   => $this->car->getBrand()->getId(),
                'name' => $this->car->getBrand()->getName(),
            ],
            'photo' => $this->car->getPhoto(),
            'price' => $this->car->getPrice(),
        ];
    }
}
