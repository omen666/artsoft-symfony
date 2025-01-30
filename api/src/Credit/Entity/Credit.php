<?php

declare(strict_types=1);

namespace App\Credit\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'credits')]
final class Credit
{
    #[ORM\Column(type: 'integer')]
    #[ORM\Id]
    private int $id;

    #[ORM\Column(type: 'decimal', precision: 3, scale: 1)]
    private float $interestRate;

    #[ORM\Column(type: 'string', length: 255)]
    private string $title;

    public function __construct(
        int $id,
        float $interestRate,
        string $title
    ) {
        $this->id             = $id;
        $this->interestRate   = $interestRate;
        $this->monthlyPayment = $monthlyPayment;
        $this->title          = $title;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getInterestRate(): float
    {
        return $this->interestRate;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
