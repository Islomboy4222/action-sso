<?php

namespace App\Entity;

use App\Repository\AuthItemChildRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuthItemChildRepository::class)]
class AuthItemChild
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?AuthItem $parent = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?AuthItem $child = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParent(): ?AuthItem
    {
        return $this->parent;
    }

    public function setParent(AuthItem $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function getChild(): ?AuthItem
    {
        return $this->child;
    }

    public function setChild(AuthItem $child): self
    {
        $this->child = $child;

        return $this;
    }
}
