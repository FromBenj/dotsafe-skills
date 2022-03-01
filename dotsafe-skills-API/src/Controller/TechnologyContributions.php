<?php


namespace App\Controller;


use App\Entity\Technology;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TechnologyContributions extends AbstractController
{
    protected $em;

    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function __invoke(Technology $data): array
    {
        $contributions = [];
        foreach($data->getContributions() as $contribution) {
            $contributions[] = [
                "member" => $contribution->getMember(),
                "project" => $contribution->getProject()
            ];
        }

        return $contributions;
    }
}
