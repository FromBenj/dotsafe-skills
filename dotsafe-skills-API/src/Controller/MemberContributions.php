<?php


namespace App\Controller;


use App\Entity\Member;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MemberContributions extends AbstractController
{
    protected $em;

    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function __invoke(Member $data): array
    {
        $contributions = [];
        foreach($data->getContributions() as $contribution) {
            $contributions[] = [
                "technology" => $contribution->getTechnology(),
                "project" => $contribution->getProject()
            ];
        }

        return $contributions;
    }
}
