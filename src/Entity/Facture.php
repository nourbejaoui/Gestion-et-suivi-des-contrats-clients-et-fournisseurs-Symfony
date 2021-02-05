<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FactureRepository::class)
 */
class Facture
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_facture;

    /**
     * @ORM\Column(type="float")
     */
    private $montant;



    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="facture")
     */
    private $client;

    /**
     * @ORM\Column(type="boolean")
     */
    private $payee;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateFacture(): ?\DateTimeInterface
    {
        return $this->date_facture;
    }

    public function setDateFacture(\DateTimeInterface $date_facture): self
    {
        $this->date_facture = $date_facture;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

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

    public function getPayee(): ?bool
    {
        return $this->payee;
    }

    public function setPayee(bool $payee): self
    {
        $this->payee = $payee;

        return $this;
    }
}
