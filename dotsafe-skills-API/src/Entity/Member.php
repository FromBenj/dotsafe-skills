<?php

namespace App\Entity;

use App\Controller\MemberContributions;
use App\Controller\MemberTechnologiesProjects;
use App\Repository\MemberRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;

#[ApiResource(itemOperations: [
    'get',
    'put',
    'post',
    'delete',
    'member_contributions' => [
        'method' => 'GET',
        'path' => '/members/{id}/contributions',
        'controller' => MemberContributions::class,
    ],
    'member_technologies_projects' => [
        'method' => 'GET',
        'path' => '/members/{id}/technologies/projects',
        'controller' => MemberTechnologiesProjects::class,
    ],
])]
#[ORM\Entity(repositoryClass: MemberRepository::class)]
class Member
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $firstname;

    #[ORM\Column(type: 'string', length: 255)]
    private $lastname;

    #[Assert\Email()]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $email;

    #[ORM\OneToMany(mappedBy: 'member', targetEntity: Contribution::class, orphanRemoval: true)]
    private $contributions;

    public function __construct()
    {
        $this->contributions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection<int, Contribution>
     */
    public function getContributions(): Collection
    {
        return $this->contributions;
    }

    public function addContribution(Contribution $contribution): self
    {
        if (!$this->contributions->contains($contribution)) {
            $this->contributions[] = $contribution;
            $contribution->setMember($this);
        }

        return $this;
    }

    public function removeContribution(Contribution $contribution): self
    {
        if ($this->contributions->removeElement($contribution)) {
            // set the owning side to null (unless already changed)
            if ($contribution->getMember() === $this) {
                $contribution->setMember(null);
            }
        }

        return $this;
    }
}
