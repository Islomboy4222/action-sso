<?php
namespace App\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;

trait CreateUpdatedAt
{
    #[ORM\Column(type:"datetime", nullable:true)]
    private $createdAt;

    #[ORM\Column(type:"datetime", nullable:true)]
    private $updatedAt;

    #[ORM\PrePersist()]
    public function createdAt()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    #[ORM\PreUpdate()]
    public function updatedAt()
    {
        $this->updatedAt = new \DateTime();
    }
}