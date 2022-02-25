<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;


class ProjectFixtures extends Fixture
{
    public CONST PROJECT_NUMBER = 30;

    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= self::PROJECT_NUMBER; $i++) {
            $faker  =  Factory::create('fr_FR');
            $project = new Project();
            $project->setName($faker->company);
            $manager->persist($project);
            $this->addReference("project_" . $i, $project);

        }

        $manager->flush();
    }
}
