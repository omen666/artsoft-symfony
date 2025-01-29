<?php

declare(strict_types=1);

namespace App\Car\Query\FindAll;

use App\Common\BaseCollection;

class Collection extends BaseCollection
{
    public function add(Item $car): void
    {
        $this->collection[$car->getId()] = $car;
    }

    public function current(): Item
    {
        return $this->collection[$this->key()];
    }
}
