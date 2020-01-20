<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MyKeybroard
 *
 * @ORM\Table(name="my_keybroard")
 * @ORM\Entity
 */
class MyKeybroard
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="Дахин давтагдашгүй дугаар"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false, options={"comment"="Гарын хавтаны төрлийн нэрүүд"})
     */
    private $name;

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
}