<?php

declare(strict_types=1);

namespace App\Car\Query\FindIdentity;

use App\Car\Entity\Car;

final class Item implements \JsonSerializable
{
    public function __construct(private readonly Car $car)
    {
    }

    public function jsonSerialize(): array
    {
        return [
            'id'    => $this->car->getId(),
            'brand' => [
                'id'   => $this->car->getBrand()->getId(),
                'name' => $this->car->getBrand()->getName(),
            ],
            'model' => [
                'id'   => $this->car->getModel()->getId(),
                'name' => $this->car->getModel()->getName(),
            ],
            'photo' => $this->car->getPhoto(),
            'price' => $this->car->getPrice(),
        ];
    }
}
