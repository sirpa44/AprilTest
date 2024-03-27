<?php

namespace App\DataFixtures;

use App\Entity\Prospect;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');


        for ($i = 0; $i < 20; $i++) {
            $prospect = new Prospect;
            $prospect->setLastName($faker->lastName());
            $prospect->setFirstName($faker->firstName());
            $prospect->setPhone($faker->phoneNumber());
            $prospect->setEmail($faker->email());

            $manager->persist($prospect);
        }

        $manager->flush();
    }
}
