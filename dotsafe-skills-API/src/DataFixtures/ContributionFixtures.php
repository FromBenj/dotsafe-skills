<?php

namespace App\DataFixtures;

use App\Entity\Contribution;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;


class ContributionFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager): void
    {
        $projectsNumber = ProjectFixtures::PROJECT_NUMBER;
        $membersNumber = MemberFixtures::MEMBERS_NUMBER;
        for ($i = 1; $i < $projectsNumber; $i++) {
            $firstContribution = new Contribution();
            $secondContribution = new Contribution();
            $thirdContribution = new Contribution();
            $firstContribution->setProject($this->getReference('project_' . $i));
            $secondContribution->setProject($this->getReference('project_' . $i));
            $thirdContribution->setProject($this->getReference('project_' . $i));
            $contributorStart = rand (1,$membersNumber - 3);
            $firstContribution->setMember($this->getReference('member_' . $contributorStart));
            $secondContribution->setMember($this->getReference('member_' . $contributorStart + 1));
            $thirdContribution->setMember($this->getReference('member_' . $contributorStart + 2));
            $firstContribution->setTechnology($this->getReference('technology_' . rand(1, count(TechnologyFixtures::TECHNOLOGIES))));
            $secondContribution->setTechnology($this->getReference('technology_' . rand(1, count(TechnologyFixtures::TECHNOLOGIES))));
            $thirdContribution->setTechnology($this->getReference('technology_' . rand(1, count(TechnologyFixtures::TECHNOLOGIES))));
            $manager->persist($firstContribution);
            $manager->persist($secondContribution);
            $manager->persist($thirdContribution);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return array(
            MemberFixtures::class,
            ProjectFixtures::class,
            TechnologyFixtures::class
        );
    }
}
