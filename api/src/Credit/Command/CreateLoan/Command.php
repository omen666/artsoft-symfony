<?php

declare(strict_types=1);

namespace App\Credit\Command\CreateLoan;

final class Command
{
    public function __construct(
        public readonly int $carId,
        public readonly int $programId,
        public readonly int $initialPayment,
        public readonly int $loanTerm,
    ) {
    }
}
