<?php

declare(strict_types=1);

namespace App\Car\Entity;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use DomainException;

final class Repository
{
    private EntityRepository $repo;

    public function __construct(EntityManagerInterface $em)
    {
        $this->repo = $em->getRepository(Car::class);
    }

    public function get(int $id): Car
    {
        $car = $this->repo->find($id);
        if ($car === null) {
            throw new DomainException('Car is not found.');
        }

        return $car;
    }

    public function findAll(): array
    {
        return $this->repo->findAll();
    }
}
