<?php

declare(strict_types=1);

namespace App\Credit\Command\CreateLoan;

use App\Car\Entity\Repository as CarRepository;
use App\Credit\Entity\CreditRepository;
use App\Credit\Entity\Loan;
use App\Credit\Entity\LoanRepository;
use Webmozart\Assert\Assert;

final class Handler
{
    public function __construct(
        private readonly LoanRepository $loanRepository,
        private readonly CreditRepository $creditRepository,
        private readonly CarRepository $carRepository
    ) {
    }

    public function handle(Command $command): void
    {
        $this->validate($command);

        $loan = new Loan(
            $this->carRepository->get($command->carId),
            $this->creditRepository->get($command->programId),
            $command->initialPayment,
            $command->loanTerm,

        );

        $this->loanRepository->save($loan);
    }

    private function validate(Command $command): void
    {
        Assert::notEmpty($command->carId, 'The car id is required.');
        Assert::notEmpty($command->programId, 'The program id is required.');
        Assert::notEmpty($command->initialPayment, 'The initial payment is required.');
        Assert::notEmpty($command->loanTerm, 'The loan term is required.');
    }
}
