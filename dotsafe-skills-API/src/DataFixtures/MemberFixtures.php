<?php

namespace App\DataFixtures;

use App\Entity\Member;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class MemberFixtures extends Fixture
{
    public CONST MEMBERS_NUMBER = 15;

    public function load(ObjectManager $manager): void
    {
        $faker  =  Factory::create('en_US');
        for ($i=1; $i <= self::MEMBERS_NUMBER; $i++) {
            $member = new Member();
            $member->setFirstname($faker->firstName);
            $member->setLastname($faker->lastName);
            $email = strtolower($member->getFirstname() . '.' . $member->getLastname() . '@dotsafe.fr');
            $member->setEmail($email);
            $manager->persist($member);
            $this->addReference("member_" . $i, $member);
        }

        $manager->flush();
    }
}
