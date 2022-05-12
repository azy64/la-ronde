<?php

namespace App\Entity;

use App\Repository\LaRondeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LaRondeRepository::class)
 */
class LaRonde
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
    private $date_fin;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_debut;

    /**
     * @ORM\Column(type="text")
     */
    private $observation;

    /**
     * @ORM\Column(type="text")
     */
    private $detail;

    /**
     * @ORM\ManyToOne(targetEntity=Agents::class, inversedBy="laRondes", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $agent;

    /**
     * @ORM\ManyToOne(targetEntity=Site::class, inversedBy="laRondes", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $site;

    /**
     * @ORM\ManyToOne(targetEntity=Materiel::class, cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $materiel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(string $observation): self
    {
        $this->observation = $observation;

        return $this;
    }

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function setDetail(string $detail): self
    {
        $this->detail = $detail;

        return $this;
    }

    public function getAgent(): ?Agents
    {
        return $this->agent;
    }

    public function setAgent(?Agents $agent): self
    {
        $this->agent = $agent;

        return $this;
    }

    public function getSite(): ?Site
    {
        return $this->site;
    }

    public function setSite(?Site $site): self
    {
        $this->site = $site;

        return $this;
    }

    public function getMateriel(): ?Materiel
    {
        return $this->materiel;
    }

    public function setMateriel(?Materiel $materiel): self
    {
        $this->materiel = $materiel;

        return $this;
    }
}
