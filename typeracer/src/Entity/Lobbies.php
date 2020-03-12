<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lobbies
 *
 * @ORM\Table(name="lobbies", indexes={@ORM\Index(name="exersice_id", columns={"exersice_id"})})
 * @ORM\Entity
 */
class Lobbies
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=45, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="leader", type="string", length=45, nullable=false)
     */
    private $leader;

    /**
     * @var string
     *
     * @ORM\Column(name="user", type="string", length=45, nullable=false)
     */
    private $user;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="started_at", type="datetime", nullable=false)
     */
    private $startedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finished_at", type="datetime", nullable=false)
     */
    private $finishedAt;

    /**
     * @var int
     *
     * @ORM\Column(name="started", type="integer", nullable=false)
     */
    private $started;

    /**
     * @var int
     *
     * @ORM\Column(name="finished", type="integer", nullable=false)
     */
    private $finished;

    /**
     * @var float
     *
     * @ORM\Column(name="speed", type="float", precision=10, scale=0, nullable=false)
     */
    private $speed;

    /**
     * @var \Exersice
     *
     * @ORM\ManyToOne(targetEntity="Exersice")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="exersice_id", referencedColumnName="id")
     * })
     */
    private $exersice;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getLeader(): ?string
    {
        return $this->leader;
    }

    public function setLeader(string $leader): self
    {
        $this->leader = $leader;

        return $this;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(string $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getStartedAt(): ?\DateTimeInterface
    {
        return $this->startedAt;
    }

    public function setStartedAt(\DateTimeInterface $startedAt): self
    {
        $this->startedAt = $startedAt;

        return $this;
    }

    public function getFinishedAt(): ?\DateTimeInterface
    {
        return $this->finishedAt;
    }

    public function setFinishedAt(\DateTimeInterface $finishedAt): self
    {
        $this->finishedAt = $finishedAt;

        return $this;
    }

    public function getStarted(): ?int
    {
        return $this->started;
    }

    public function setStarted(int $started): self
    {
        $this->started = $started;

        return $this;
    }

    public function getFinished(): ?int
    {
        return $this->finished;
    }

    public function setFinished(int $finished): self
    {
        $this->finished = $finished;

        return $this;
    }

    public function getSpeed(): ?float
    {
        return $this->speed;
    }

    public function setSpeed(float $speed): self
    {
        $this->speed = $speed;

        return $this;
    }

    public function getExersice(): ?Exersice
    {
        return $this->exersice;
    }

    public function setExersice(?Exersice $exersice): self
    {
        $this->exersice = $exersice;

        return $this;
    }


}
