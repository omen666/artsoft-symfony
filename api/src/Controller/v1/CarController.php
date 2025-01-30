<?php

declare(strict_types=1);

namespace App\Controller\v1;

use App\Car\Query\FindAll\Fetcher as FindAllFetcher;
use App\Car\Query\FindIdentity\Fetcher;
use App\Car\Query\FindIdentity\Query;
use DomainException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class CarController extends AbstractController
{
    #[Route('/api/v1/cars', methods: ['GET'])]
    public function cars(FindAllFetcher $fetcher): Response
    {
        return $this->json($fetcher->fetch());
    }

    #[Route('/api/v1/cars/{id}', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function car(int $id, Fetcher $fetcher): Response
    {
        $query     = new Query();
        $query->id = $id;
        try {
            return $this->json($fetcher->fetch($query));
        } catch (DomainException $exception) {
            return $this->json(['error' => $exception->getMessage()], Response::HTTP_NOT_FOUND);
        }
    }
}
