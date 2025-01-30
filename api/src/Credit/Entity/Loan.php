<?php

declare(strict_types=1);

namespace App\Credit\Entity;

use App\Car\Entity\Car;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'loans')]
final class Loan
{
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    #[ORM\Id]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Car::class, inversedBy: 'loans')]
    private Car $car;

    #[ORM\ManyToOne(targetEntity: Credit::class, inversedBy: 'loans')]
    private Credit $program;

    #[ORM\Column(type: 'integer')]
    private int $initialPayment;

    #[ORM\Column(type: 'integer')]
    private int $loanTerm;

    public function __construct(
        Car $car,
        Credit $program,
        int $initialPayment,
        int $loanTerm
    ) {
        $this->car            = $car;
        $this->program        = $program;
        $this->initialPayment = $initialPayment;
        $this->loanTerm       = $loanTerm;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCar(): Car
    {
        return $this->car;
    }

    public function getProgram(): Credit
    {
        return $this->program;
    }

    public function getInitialPayment(): int
    {
        return $this->initialPayment;
    }

    public function getLoanTerm(): int
    {
        return $this->loanTerm;
    }
}
