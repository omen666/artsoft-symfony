<?php

declare(strict_types=1);

namespace App\Car\Query\FindIdentity;

use App\Car\Entity\Repository;

final class Fetcher
{
    private Repository $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function fetch(Query $query): Item
    {
        return new Item($this->repository->get($query->id));
    }
}
