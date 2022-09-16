<?php
namespace App\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;

trait Timestamps
{
    #[ORM\Column(type:"datetime")]
    private $registrationDate;

    #[ORM\Column(type:"datetime")]
    private $statusChanged;

    #[ORM\PrePersist()]
    public function registrationDate()
    {
        $this->registrationDate = new \DateTime();
        $this->statusChanged = new \DateTime();
    }

    #[ORM\PreUpdate()]
    public function statusChanged()
    {
        $this->statusChanged = new \DateTime();
    }
}