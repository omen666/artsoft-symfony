<?php

declare(strict_types=1);

namespace App\Credit\Entity;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use DomainException;

final class CreditRepository
{
    private EntityRepository $repo;

    public function __construct(EntityManagerInterface $em)
    {
        $this->repo = $em->getRepository(Credit::class);
    }

    public function get(int $id): Credit
    {
        $car = $this->repo->find($id);
        if ($car === null) {
            throw new DomainException('Credit is not found.');
        }

        return $car;
    }

    public function findAll(): array
    {
        return $this->repo->findAll();
    }

    public function findByInterestRate(float $interestRate): Credit
    {
        return $this->repo->findOneBy(['interestRate' => $interestRate]);
    }
}
