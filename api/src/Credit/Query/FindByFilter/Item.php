<?php

declare(strict_types=1);

namespace App\Credit\Query\FindByFilter;

use App\Credit\Entity\Credit;
use JsonSerializable;

final class Item implements JsonSerializable
{
    public function __construct(private readonly Credit $credit)
    {
    }

    public function jsonSerialize(): array
    {
        return [
            'programId'      => $this->credit->getId(),
            'interestRate'   => $this->credit->getInterestRate(),
            'monthlyPayment' => $this->credit->getMonthlyPayment(),
            'title'          => $this->credit->getTitle(),
        ];
    }
}
