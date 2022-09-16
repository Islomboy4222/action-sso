<?php

namespace App\Entity;

use App\Entity\Trait\CreateUpdatedAt;
use App\Repository\AuthRuleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuthRuleRepository::class)]
class AuthRule
{
    use CreateUpdatedAt;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 64)]
    private ?string $name = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private array $data = [];

    #[ORM\ManyToOne(inversedBy: 'rule_name')]
    private ?AuthItem $authItem = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(?array $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getAuthItem(): ?AuthItem
    {
        return $this->authItem;
    }

    public function setAuthItem(?AuthItem $authItem): self
    {
        $this->authItem = $authItem;

        return $this;
    }
}
