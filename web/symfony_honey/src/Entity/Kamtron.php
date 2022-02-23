<?php

namespace App\Entity;

use App\Repository\KamtronRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KamtronRepository::class)]
class Kamtron
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Request;

    #[ORM\Column(type: 'string', length: 255)]
    private $File;

    #[ORM\Column(type: 'string', length: 255)]
    private $Time;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRequest(): ?string
    {
        return $this->Request;
    }

    public function setRequest(string $Request): self
    {
        $this->Request = $Request;

        return $this;
    }

    public function getFile(): ?string
    {
        return $this->File;
    }

    public function setFile(string $File): self
    {
        $this->File = $File;

        return $this;
    }

    public function getTime(): ?string
    {
        return $this->Time;
    }

    public function setTime(string $Time): self
    {
        $this->Time = $Time;

        return $this;
    }
}
