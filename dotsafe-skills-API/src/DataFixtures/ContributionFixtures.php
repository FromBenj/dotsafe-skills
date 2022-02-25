<?php

namespace App\DataFixtures;

use App\Entity\Contribution;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;


class ContributionFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i < MemberFixtures::MEMBERS_NUMBER; $i++) {
            $firstContribution = new Contribution();
            $secondContribution = new Contribution();
            $firstContribution->setMember($this->getReference('member_' . $i));
            $secondContribution->setMember($this->getReference('member_' . $i));
            $firstContribution->setProject($this->getReference('project_' . $i));
            $secondContribution->setProject($this->getReference('project_' . $i + 1));
            $firstContribution->setTechnology($this->getReference('technology_' . rand(1, count(TechnologyFixtures::TECHNOLOGIES))));
            $secondContribution->setTechnology($this->getReference('technology_' . rand(1, count(TechnologyFixtures::TECHNOLOGIES))));
            $manager->persist($firstContribution);
            $manager->persist($secondContribution);
        }
        $contribution = new Contribution();
        $contribution->setMember($this->getReference('member_' . MemberFixtures::MEMBERS_NUMBER));
        $contribution->setProject($this->getReference('project_' . rand(1, ProjectFixtures::PROJECT_NUMBER)));
        $contribution->setTechnology($this->getReference('technology_' . rand(1, count(TechnologyFixtures::TECHNOLOGIES))));
        $manager->persist($contribution);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            MemberFixtures::class,
            ProjectFixtures::class,
            TechnologyFixtures::class
        );
    }
}
