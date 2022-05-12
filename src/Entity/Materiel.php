<?php

namespace App\Entity;

use App\Repository\MaterielRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MaterielRepository::class)
 */
class Materiel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $keys;

    /**
     * @ORM\Column(type="boolean")
     */
    private $radio;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $round_controller;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $torch;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $key_car;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $ivvadr;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isKeys(): ?bool
    {
        return $this->keys;
    }

    public function setKeys(?bool $keys): self
    {
        $this->keys = $keys;

        return $this;
    }

    public function isRadio(): ?bool
    {
        return $this->radio;
    }

    public function setRadio(bool $radio): self
    {
        $this->radio = $radio;

        return $this;
    }

    public function isPhone(): ?bool
    {
        return $this->phone;
    }

    public function setPhone(?bool $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function isRoundController(): ?bool
    {
        return $this->round_controller;
    }

    public function setRoundController(?bool $round_controller): self
    {
        $this->round_controller = $round_controller;

        return $this;
    }

    public function isTorch(): ?bool
    {
        return $this->torch;
    }

    public function setTorch(?bool $torch): self
    {
        $this->torch = $torch;

        return $this;
    }

    public function isKeyCar(): ?bool
    {
        return $this->key_car;
    }

    public function setKeyCar(?bool $key_car): self
    {
        $this->key_car = $key_car;

        return $this;
    }

    public function isIvvadr(): ?bool
    {
        return $this->ivvadr;
    }

    public function setIvvadr(?bool $ivvadr): self
    {
        $this->ivvadr = $ivvadr;

        return $this;
    }
}
