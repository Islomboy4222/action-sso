<?php

namespace App\Entity;

use App\Entity\Trait\CreateUpdatedAt;
use App\Repository\AuthItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuthItemRepository::class)]
class AuthItem
{
    use CreateUpdatedAt;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 64)]
    private ?string $name = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $type = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'authItem', targetEntity: AuthRule::class)]
    private Collection $rule_name;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private array $data = [];

    public function __construct()
    {
        $this->rule_name = new ArrayCollection();
    }

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

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, AuthRule>
     */
    public function getRuleName(): Collection
    {
        return $this->rule_name;
    }

    public function addRuleName(AuthRule $ruleName): self
    {
        if (!$this->rule_name->contains($ruleName)) {
            $this->rule_name->add($ruleName);
            $ruleName->setAuthItem($this);
        }

        return $this;
    }

    public function removeRuleName(AuthRule $ruleName): self
    {
        if ($this->rule_name->removeElement($ruleName)) {
            // set the owning side to null (unless already changed)
            if ($ruleName->getAuthItem() === $this) {
                $ruleName->setAuthItem(null);
            }
        }

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
}
