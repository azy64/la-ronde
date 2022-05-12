<?php

namespace App\Entity;

use App\Repository\AgentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgentsRepository::class)
 */
class Agents
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
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $phone_number;

    /**
     * @ORM\OneToMany(targetEntity=LaRonde::class, mappedBy="agent", orphanRemoval=true)
     */
    private $laRondes;

    public function __construct()
    {
        $this->laRondes = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(?string $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    /**
     * @return Collection<int, LaRonde>
     */
    public function getLaRondes(): Collection
    {
        return $this->laRondes;
    }

    public function addLaRonde(LaRonde $laRonde): self
    {
        if (!$this->laRondes->contains($laRonde)) {
            $this->laRondes[] = $laRonde;
            $laRonde->setAgent($this);
        }

        return $this;
    }

    public function removeLaRonde(LaRonde $laRonde): self
    {
        if ($this->laRondes->removeElement($laRonde)) {
            // set the owning side to null (unless already changed)
            if ($laRonde->getAgent() === $this) {
                $laRonde->setAgent(null);
            }
        }

        return $this;
    }
}
