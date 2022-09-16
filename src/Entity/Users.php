<?php

namespace App\Entity;

use App\Entity\Trait\Timestamps;
use App\Repository\UsersRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
class Users
{
    use Timestamps;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 256, unique:true)]
    private ?string $email = null;

    #[ORM\Column(length: 60)]
    private ?string $password = null;

    #[ORM\Column(length: 60, unique:true)]
    private ?string $token = null;

    #[ORM\Column(nullable: true)]
    private ?int $status = null;

    #[ORM\Column(length: 128)]
    private ?string $last_name = null;

    #[ORM\Column(length: 128)]
    private ?string $first_name = null;

    #[ORM\Column(length: 128)]
    private ?string $middle_name = null;

    #[ORM\Column(length: 16)]
    private ?string $phone = null;

    #[ORM\Column(nullable: true)]
    private ?int $region_id = null;

    #[ORM\Column(nullable: true)]
    private ?int $city_id = null;

    #[ORM\Column(length: 32, nullable: true)]
    private ?string $geoname_id = null;

    #[ORM\Column(nullable: true)]
    private ?int $gender = null;

    #[ORM\Column(length: 255)]
    private ?string $position = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $about = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $birth_date = null;

    #[ORM\Column(length: 256, nullable: true)]
    private ?string $pseudonym = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $student_projects = null;

    #[ORM\Column(nullable: true)]
    private ?int $main_media_id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $moderator_comments = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(?int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getMiddleName(): ?string
    {
        return $this->middle_name;
    }

    public function setMiddleName(string $middle_name): self
    {
        $this->middle_name = $middle_name;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getRegionId(): ?int
    {
        return $this->region_id;
    }

    public function setRegionId(?int $region_id): self
    {
        $this->region_id = $region_id;

        return $this;
    }

    public function getCityId(): ?int
    {
        return $this->city_id;
    }

    public function setCityId(?int $city_id): self
    {
        $this->city_id = $city_id;

        return $this;
    }

    public function getGeonameId(): ?string
    {
        return $this->geoname_id;
    }

    public function setGeonameId(?string $geoname_id): self
    {
        $this->geoname_id = $geoname_id;

        return $this;
    }

    public function getGender(): ?int
    {
        return $this->gender;
    }

    public function setGender(?int $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(string $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getAbout(): ?string
    {
        return $this->about;
    }

    public function setAbout(?string $about): self
    {
        $this->about = $about;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birth_date;
    }

    public function setBirthDate(?\DateTimeInterface $birth_date): self
    {
        $this->birth_date = $birth_date;

        return $this;
    }

    public function getPseudonym(): ?string
    {
        return $this->pseudonym;
    }

    public function setPseudonym(?string $pseudonym): self
    {
        $this->pseudonym = $pseudonym;

        return $this;
    }

    public function getStudentProjects(): ?int
    {
        return $this->student_projects;
    }

    public function setStudentProjects(?int $student_projects): self
    {
        $this->student_projects = $student_projects;

        return $this;
    }

    public function getMainMediaId(): ?int
    {
        return $this->main_media_id;
    }

    public function setMainMediaId(?int $main_media_id): self
    {
        $this->main_media_id = $main_media_id;

        return $this;
    }

    public function getModeratorComments(): ?string
    {
        return $this->moderator_comments;
    }

    public function setModeratorComments(?string $moderator_comments): self
    {
        $this->moderator_comments = $moderator_comments;

        return $this;
    }
}
