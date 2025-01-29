<?php

declare(strict_types=1);

namespace App\Credit\Query\FindByFilter;

use App\Credit\Entity\Repository;
use App\Credit\Query\FindByFilter\Query;

final class Fetcher
{
    private Repository $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function fetch(Query $query): Item
    {
        $monthlyPayment = ($query->price - $query->initialPayment) / $query->loanTermMonth;
        $loanTermYears  = floor($query->loanTermMonth / 12) + 1;
        if ($query->initialPayment > 200000 && $monthlyPayment < 10000 && $loanTermYears < 5) {
            $item = new Item($this->repository->findByInterestRate(12.3));
        } else {
            $item = new Item($this->repository->get(2));
        }

        return $item;
    }
}
