<?php

namespace App\DataFixtures;

use App\Entity\Prospect;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $userPasswordHasher)
    {}

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 20; $i++) {
            $prospect = new Prospect;
            $prospect
                ->setLastName($faker->lastName())
                ->setFirstName($faker->firstName())
                ->setPhone($faker->phoneNumber())
                ->setEmail($faker->email());

            $manager->persist($prospect);
        }

        $manager->flush();

        $admin = new User;
        $admin
            ->setFirstName($faker->firstName())
            ->setLastName($faker->lastName())
            ->setEmail('admin@admin.admin')
            ->setPassword($this->userPasswordHasher->hashPassword($admin, 'password'))
            ->setRoles(['ROLE_ADMIN']);

        $manager->persist($admin);

        $user = new User;
        $user
            ->setFirstName($faker->firstName())
            ->setLastName($faker->lastName())
            ->setEmail('user@user.user')
            ->setPassword($this->userPasswordHasher->hashPassword($user, 'password'));

        $manager->persist($user);

        $manager->flush();
    }
}
