<?php


namespace App\Controller;


use App\Entity\Technology;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TechnologyProjectsMembers extends AbstractController
{
    protected $em;

    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function __invoke(Technology $data): array
    {
        $projectsMembers = [];
        foreach($data->getContributions() as $contribution) {
            $project = $contribution->getProject();
            $projectsMembers[$project->getId()]["infos"] = $project;
            $projectsMembers[$project->getId()]["members"][] = $contribution->getMember();
        }

        return $projectsMembers;
    }
}
