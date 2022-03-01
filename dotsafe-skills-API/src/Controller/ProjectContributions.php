<?php


namespace App\Controller;


use App\Entity\Project;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProjectContributions extends AbstractController
{
    protected $em;

    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function __invoke(Project $data): array
    {
        $contributions["technologies"] = [];
        foreach ($data->getContributions() as $contribution) {
            if (!in_array($contribution->getTechnology(), $contributions["technologies"], true)) {
                $contributions["technologies"][] = $contribution->getTechnology();
            }
            $contributions[$contribution->getTechnology()->getName()][] = $contribution->getMember();
        }

        return $contributions;
    }
}
