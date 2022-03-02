<?php

namespace App\Entity;

use App\Controller\TechnologyMembers;
use App\Controller\TechnologyContributions;
use App\Controller\TechnologyProjectsMembers;
use App\Repository\TechnologyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

#[ApiResource(itemOperations: [
    'get',
    'put',
    'post',
    'delete',
    'technology_contributions' => [
        'method' => 'GET',
        'path' => '/technologies/{id}/contributions',
        'controller' => TechnologyContributions::class,
    ],
    'technology_projects_members' => [
        'method' => 'GET',
        'path' => '/technologies/{id}/projects/members',
        'controller' => TechnologyProjectsMembers::class,
    ],
    'technology_members' => [
        'method' => 'GET',
        'path' => '/technologies/{id}/members',
        'controller' => TechnologyMembers::class,
    ],
])]
#[ORM\Entity(repositoryClass: TechnologyRepository::class)]
class Technology
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToMany(targetEntity: Project::class, mappedBy: 'technologies')]
    private $projects;

    #[ORM\OneToMany(mappedBy: 'technology', targetEntity: Contribution::class, orphanRemoval: true)]
    private $contributions;

    public function __construct()
    {
        $this->projects = new ArrayCollection();
        $this->contributions = new ArrayCollection();
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

    /**
     * @return Collection<int, Project>
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    public function addProject(Project $project): self
    {
        if (!$this->projects->contains($project)) {
            $this->projects[] = $project;
            $project->addTechnology($this);
        }

        return $this;
    }

    public function removeProject(Project $project): self
    {
        if ($this->projects->removeElement($project)) {
            $project->removeTechnology($this);
        }

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
            $contribution->setTechnology($this);
        }

        return $this;
    }

    public function removeContribution(Contribution $contribution): self
    {
        if ($this->contributions->removeElement($contribution)) {
            // set the owning side to null (unless already changed)
            if ($contribution->getTechnology() === $this) {
                $contribution->setTechnology(null);
            }
        }

        return $this;
    }
}
