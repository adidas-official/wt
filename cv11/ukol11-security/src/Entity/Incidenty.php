<?php

namespace App\Entity;

use App\Repository\IncidentyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IncidentyRepository::class)]
class Incidenty
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $url = null;

    #[ORM\Column(length: 255)]
    private ?string $nahlasovatel = null;

    #[ORM\Column(options: ["default" => 1])]
    private ?int $active = 1;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function getNahlasovatel(): ?string
    {
        return $this->nahlasovatel;
    }

    public function setNahlasovatel(string $nahlasovatel): static
    {
        $this->nahlasovatel = $nahlasovatel;

        return $this;
    }

    public function getActive(): ?int
    {
        return $this->active;
    }

    public function setActive(int $active): static
    {
        $this->active = $active;

        return $this;
    }
}
