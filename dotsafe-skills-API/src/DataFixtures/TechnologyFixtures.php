<?php

namespace App\DataFixtures;

use App\Entity\Technology;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class TechnologyFixtures extends Fixture
{
    public CONST TECHNOLOGIES = [
        "PHP",
        "Java",
        "Python",
        "C++",
        "Symfony",
        "JavaScript",
        "React",
        "Vue",
        "Angular",
        "React Native",
        "Kotlin"
    ];

    public function load(ObjectManager $manager): void
    {
        $i = 1;
        foreach (self::TECHNOLOGIES as $technoName) {
            $technology = new Technology();
            $technology->setName($technoName);
            $manager->persist($technology);
            $this->addReference("technology_" . $i, $technology);
            $i++;
        }

        $manager->flush();
    }
}
