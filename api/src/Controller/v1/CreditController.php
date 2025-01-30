<?php

namespace App\Controller\v1;

use App\Credit\Command\CreateLoan\Command;
use App\Credit\Command\CreateLoan\Handler;
use App\Credit\Query\FindByFilter\Fetcher;
use App\Credit\Query\FindByFilter\Query;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CreditController extends AbstractController
{
    #[Route('/api/v1/credit/calculate', methods: ['GET'])]
    public function calculate(Request $request, Fetcher $fetcher): Response
    {
        $query                 = new Query();
        $query->price          = (int)$request->get('price', 0);
        $query->initialPayment = (int)$request->get('initialPayment', 0);
        $query->loanTermMonth  = (int)$request->get('loanTerm', 0);

        try {
            return $this->json($fetcher->fetch($query));
        } catch (\Exception $e) {
            return $this->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    #[Route('/api/v1/request', methods: ['POST'])]
    public function loan(Request $request, Handler $handler): Response
    {
        $command = new Command(
            (int)$request->get('carId', 0),
            (int)$request->get('programId', 0),
            (int)$request->get('initialPayment', 0),
            (int)$request->get('loanTerm', 0)
        );

        try {
            $handler->handle($command);

            return $this->json(["success" => true]);
        } catch (\Exception $e) {
            return $this->json(["success" => false, "error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}