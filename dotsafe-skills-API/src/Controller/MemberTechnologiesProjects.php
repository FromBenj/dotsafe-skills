<?php


namespace App\Controller;


use App\Entity\Member;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MemberTechnologiesProjects extends AbstractController
{
    protected $em;

    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function __invoke(Member $data): array
    {
        $memberProjects = [];
        foreach($data->getContributions() as $contribution) {
            $technology = $contribution->getTechnology();
            $memberProjects[$technology->getId()]["infos"] = $technology;
            $memberProjects[$technology->getId()]["projects"][] = $contribution->getproject();
        }

        return $memberProjects;
    }
}
