<?php

namespace App\Entity;

use App\Repository\AgenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgenceRepository::class)
 */
class Agence
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="integer")
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adress_ville;

    /**
     * @ORM\OneToMany(targetEntity=Voiture::class, mappedBy="agence")
     */
    private $voiture;

    public function __construct()
    {
        $this->voiture = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getAdressVille(): ?string
    {
        return $this->adress_ville;
    }

    public function setAdressVille(string $adress_ville): self
    {
        $this->adress_ville = $adress_ville;

        return $this;
    }

    /**
     * @return Collection|voiture[]
     */
    public function getVoiture(): Collection
    {
        return $this->voiture;
    }

    public function addVoiture(voiture $voiture): self
    {
        if (!$this->voiture->contains($voiture)) {
            $this->voiture[] = $voiture;
            $voiture->setAgence($this);
        }

        return $this;
    }

    public function removeVoiture(voiture $voiture): self
    {
        if ($this->voiture->removeElement($voiture)) {
            // set the owning side to null (unless already changed)
            if ($voiture->getAgence() === $this) {
                $voiture->setAgence(null);
            }
        }

        return $this;
    }

   public function __toString()
    {
        return $this->nom;
    }
}
