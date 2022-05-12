<?php

namespace App\Entity;

use App\Repository\SiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SiteRepository::class)
 */
class Site
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
    private $adresse;

    /**
     * @ORM\OneToMany(targetEntity=LaRonde::class, mappedBy="site", orphanRemoval=true)
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

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
            $laRonde->setSite($this);
        }

        return $this;
    }

    public function removeLaRonde(LaRonde $laRonde): self
    {
        if ($this->laRondes->removeElement($laRonde)) {
            // set the owning side to null (unless already changed)
            if ($laRonde->getSite() === $this) {
                $laRonde->setSite(null);
            }
        }

        return $this;
    }
}
