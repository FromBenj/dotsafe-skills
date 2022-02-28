<?php


namespace App\Controller;


use App\Entity\Member;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MemberProjects extends AbstractController
{
    protected $em;

    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function __invoke(Member $data): array
    {
        $projects = [];
        $projectsIds = [];
        foreach($data->getContributions() as $contribution) {
            if (!in_array($contribution->getProject()->getId(), $projectsIds, true)) {
                $projects[] = $contribution->getProject();
            }
        }
        $a = $data->getContributions();
        dd(["technology" => $a[1]->getTechnology(),
        []
        );

        return $projects;
    }
}
