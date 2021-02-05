<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VoitureRepository::class)
 */
class Voiture
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer" )
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255 , unique=true)
     */
    private $Matricule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Marque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Couleur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Carburant;

    /**
     * @ORM\Column(type="integer")
     */
    private $Nbr_place;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;



    /**
     * @ORM\Column(type="date")
     */
    private $Date_circulation;

    /**
     * @ORM\ManyToOne(targetEntity=Agence::class, inversedBy="voiture")
     */
    private $agence;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="voiture")
     */
    private $client;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Disponibilite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?string
    {
        return $this->Matricule;
    }

    public function setMatricule(string $Matricule): self
    {
        $this->Matricule = $Matricule;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->Marque;
    }

    public function setMarque(string $Marque): self
    {
        $this->Marque = $Marque;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->Couleur;
    }

    public function setCouleur(string $Couleur): self
    {
        $this->Couleur = $Couleur;

        return $this;
    }

    public function getCarburant(): ?string
    {
        return $this->Carburant;
    }

    public function setCarburant(string $Carburant): self
    {
        $this->Carburant = $Carburant;

        return $this;
    }

    public function getNbrPlace(): ?int
    {
        return $this->Nbr_place;
    }

    public function setNbrPlace(int $Nbr_place): self
    {
        $this->Nbr_place = $Nbr_place;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

   

    public function getDateCirculation(): ?\DateTimeInterface
    {
        return $this->Date_circulation;
    }

    public function setDateCirculation(\DateTimeInterface $Date_circulation): self
    {
        $this->Date_circulation = $Date_circulation;

        return $this;
    }

    public function getAgence(): ?Agence
    {
        return $this->agence;
    }

    public function setAgence(?Agence $agence): self
    {
        $this->agence = $agence;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getDisponibilite(): ?bool
    {
        return $this->Disponibilite;
    }

    public function setDisponibilite(bool $Disponibilite): self
    {
        $this->Disponibilite = $Disponibilite;

        return $this;
    }
}
