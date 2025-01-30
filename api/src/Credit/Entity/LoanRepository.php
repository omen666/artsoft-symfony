<?php

declare(strict_types=1);

namespace App\Credit\Entity;

use Doctrine\ORM\EntityManagerInterface;

final readonly class LoanRepository
{
    public function __construct(private EntityManagerInterface $em)
    {
    }

    public function save(Loan $loan): void
    {
        $this->em->persist($loan);
        $this->em->flush();
    }
}
