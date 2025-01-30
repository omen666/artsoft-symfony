<?php

declare(strict_types=1);

namespace App\Credit\Entity;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use DomainException;

final class LoanRepository
{
    private EntityRepository $repo;

    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em   = $em;
        $this->repo = $em->getRepository(Loan::class);
    }

    public function save(Loan $loan): void
    {
        $this->em->persist($loan);
        $this->em->flush();
    }

}
