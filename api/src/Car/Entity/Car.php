<?php

declare(strict_types=1);

namespace App\Car\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'cars')]
final class Car
{
    #[ORM\Column(type: 'integer')]
    #[ORM\Id]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Brand::class, inversedBy: 'cars')]
    private Brand $brand;

    #[ORM\Column(type: 'string')]
    private string $photo;

    #[ORM\ManyToOne(targetEntity: Model::class, inversedBy: 'cars')]
    private Model $model;

    #[ORM\Column(type: 'integer')]
    private int $price;

    public function __construct(
        int $id,
        Brand $brand,
        string $photo,
        Model $model,
        int $price,
    ) {
        $this->id    = $id;
        $this->brand = $brand;
        $this->photo = $photo;
        $this->model = $model;
        $this->price = $price;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getBrand(): Brand
    {
        return $this->brand;
    }

    public function getPhoto(): string
    {
        return $this->photo;
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}
