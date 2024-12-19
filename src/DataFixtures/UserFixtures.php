<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = (new User())
            ->setUsername('admin')
            ->setEmail('admin@admin.com')
            ->setPlainPassword('admin')
            ->setRoles(['ROLE_ADMIN']);


        $manager->persist($user);
        $this->addReference('user_admin', $user);

        $manager->flush();
    }
}
