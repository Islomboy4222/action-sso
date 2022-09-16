<?php

namespace App\Entity;

use App\Entity\Trait\CreatedAt;
use App\Repository\AuthAssignmentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuthAssignmentRepository::class)]
class AuthAssignment
{
    use CreatedAt;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?AuthItem $item_name = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $user_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getItemName(): ?AuthItem
    {
        return $this->item_name;
    }

    public function setItemName(AuthItem $item_name): self
    {
        $this->item_name = $item_name;

        return $this;
    }

    public function getUserId(): ?Users
    {
        return $this->user_id;
    }

    public function setUserId(Users $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }
}
