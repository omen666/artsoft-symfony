<?php

declare(strict_types=1);

namespace App\Car\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'brands')]
class Brand
{
    #[ORM\Column(type: 'integer')]
    #[ORM\Id]
    private int $id;

    #[ORM\Column(type: 'string')]
    private string $name;

    public function __construct(
        int $id,
        string $name
    ) {
        $this->id   = $id;
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
