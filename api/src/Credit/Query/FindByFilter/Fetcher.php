<?php

declare(strict_types=1);

namespace App\Credit\Query\FindByFilter;

use App\Credit\Entity\CreditRepository;
use Webmozart\Assert\Assert;

final class Fetcher
{
    private CreditRepository $repository;

    public function __construct(CreditRepository $repository)
    {
        $this->repository = $repository;
    }

    public function fetch(Query $query): Item
    {
        $this->validate($query);

        $monthlyPayment = ($query->price - $query->initialPayment) / $query->loanTermMonth;
        $loanTermYears  = floor($query->loanTermMonth / 12) + 1;
        if ($query->initialPayment > 200000 && $monthlyPayment < 10000 && $loanTermYears < 5) {
            $item = new Item($this->repository->findByInterestRate(12.3), 9800);
        } else {
            $item = new Item($this->repository->get(2), $monthlyPayment);
        }

        return $item;
    }

    private function validate(Query $query): void
    {
        Assert::notEmpty($query->price, 'The price is required.');
        Assert::notEmpty($query->initialPayment, 'The initialPayment is required.');
        Assert::notEmpty($query->loanTermMonth, 'The loanTerm is required.');
    }
}
