<?php


namespace App\Controller;


use App\Entity\Technology;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TechnologyMembers extends AbstractController
{
    protected $em;

    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function __invoke(Technology $data): array
    {
        $members = [];
        $membersIds = [];
        foreach($data->getContributions() as $contribution) {
            $member = $contribution->getMember();
            if (!in_array($member->getId(), $membersIds, true)) {
                $membersIds[] = $member->getId();
                $members[] = $member;

            }
        }

        return $members;
    }
}
