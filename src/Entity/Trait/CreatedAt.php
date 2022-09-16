<?php
namespace App\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;

trait CreatedAt
{
    #[ORM\Column(type:"datetime", nullable:true)]
    private $createdAt;

    #[ORM\PrePersist()]
    public function createdAt()
    {
        $this->createdAt = new \DateTime();
    }
}