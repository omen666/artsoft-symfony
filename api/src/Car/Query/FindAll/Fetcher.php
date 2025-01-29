<?php

declare(strict_types=1);

namespace App\Car\Query\FindAll;

use App\Car\Entity\Repository;

final class Fetcher
{
    private Repository $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function fetch(): Collection
    {
        $collection = new Collection();
        foreach ($this->repository->findAll() as $entity) {
            $collection->add(new Item($entity));
        }

        return $collection;
    }
}
