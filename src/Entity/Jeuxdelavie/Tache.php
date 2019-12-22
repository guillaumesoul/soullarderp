<?php

namespace App\Entity\Jeuxdelavie;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Jeuxdelavie\TacheRepository")
 * @ApiResource
 */
class Tache
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"tache"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"tache"})
     */
    private $titre;

    /**
     * @ORM\Column(type="float")
     * @Groups({"tache"})
     */
    private $difficulte;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDifficulte(): ?float
    {
        return $this->difficulte;
    }

    public function setDifficulte(float $difficulte): self
    {
        $this->difficulte = $difficulte;

        return $this;
    }
}
