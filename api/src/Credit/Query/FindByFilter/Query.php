<?php

declare(strict_types=1);

namespace App\Credit\Query\FindByFilter;

final class Query
{
    public int $price          = 0;
    public int $initialPayment = 0;
    public int $loanTermMonth  = 0;
}
