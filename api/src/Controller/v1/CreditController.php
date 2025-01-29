<?php

namespace App\Controller\v1;

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
        $query->price          = $request->get('price');
        $query->initialPayment = $request->get('initialPayment');
        $query->loanTermMonth  = $request->get('loanTerm');


        return $this->json($fetcher->fetch($query));
    }
}