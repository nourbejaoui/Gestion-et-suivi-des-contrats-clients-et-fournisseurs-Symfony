<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
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
    private $N_permis;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tel;

    /**
     * @ORM\OneToMany(targetEntity=Contrat::class, mappedBy="client")
     */
    private $contrat;

    /**
     * @ORM\OneToMany(targetEntity=Facture::class, mappedBy="client")
     */
    private $facture;

    /**
     * @ORM\OneToMany(targetEntity=Voiture::class, mappedBy="client")
     */
    private $voiture;

    public function __construct()
    {
        $this->contrat = new ArrayCollection();
        $this->facture = new ArrayCollection();
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

    public function getNPermis(): ?int
    {
        return $this->N_permis;
    }

    public function setNPermis(int $N_permis): self
    {
        $this->N_permis = $N_permis;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * @return Collection|contrat[]
     */
    public function getContrat(): Collection
    {
        return $this->contrat;
    }

    public function addContrat(contrat $contrat): self
    {
        if (!$this->contrat->contains($contrat)) {
            $this->contrat[] = $contrat;
            $contrat->setClient($this);
        }

        return $this;
    }

    public function removeContrat(contrat $contrat): self
    {
        if ($this->contrat->removeElement($contrat)) {
            // set the owning side to null (unless already changed)
            if ($contrat->getClient() === $this) {
                $contrat->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|facture[]
     */
    public function getFacture(): Collection
    {
        return $this->facture;
    }

    public function addFacture(facture $facture): self
    {
        if (!$this->facture->contains($facture)) {
            $this->facture[] = $facture;
            $facture->setClient($this);
        }

        return $this;
    }

    public function removeFacture(facture $facture): self
    {
        if ($this->facture->removeElement($facture)) {
            // set the owning side to null (unless already changed)
            if ($facture->getClient() === $this) {
                $facture->setClient(null);
            }
        }

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
            $voiture->setClient($this);
        }

        return $this;
    }

    public function removeVoiture(voiture $voiture): self
    {
        if ($this->voiture->removeElement($voiture)) {
            // set the owning side to null (unless already changed)
            if ($voiture->getClient() === $this) {
                $voiture->setClient(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->nom;
    }
}
