<?php

namespace App\DataFixtures;

use App\Entity\Technology;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TechnologyFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $nbTechnologies = 9;

        for ($i = 0; $i < $nbTechnologies; $i++) {

            if ($i === 0) {
                $techno = (new Technology())
                    ->setName('Bootstrap')
                    ->setImagePath('images/technology/bootstrap_icon.png');

                $manager->persist($techno);
                $this->setReference('bootstrap_icon' . $i, $techno);
            }

            if ($i === 1) {
                $techno = (new Technology())
                    ->setName('CSS')
                    ->setImagePath('images/technology/css_icon.png');

                $manager->persist($techno);
                $this->setReference('css_icon' . $i, $techno);
            }

            if ($i === 2) {
                $techno = (new Technology())
                    ->setName('HTML5')
                    ->setImagePath('images/technology/html_icon.png');

                $manager->persist($techno);
                $this->setReference('html_icon' . $i, $techno);
            }

            if ($i === 3) {
                $techno = (new Technology())
                    ->setName('Java')
                    ->setImagePath('images/technology/java_icon.png');

                $manager->persist($techno);
                $this->setReference('jquery_icon' . $i, $techno);
            }


            if ($i === 4) {
                $techno = (new Technology())
                    ->setName('JavaScript')
                    ->setImagePath('images/technology/javascript_icon.png');

                $manager->persist($techno);
                $this->setReference('javascript_icon' . $i, $techno);
            }

            if ($i === 5) {
                $techno = (new Technology())
                    ->setName('MySql')
                    ->setImagePath('images/technology/mysql_icon.png');

                $manager->persist($techno);
                $this->setReference('jquery_icon' . $i, $techno);
            }

            if ($i === 6) {
                $techno = (new Technology())
                    ->setName('PHP')
                    ->setImagePath('images/technology/php_icon.png');

                $manager->persist($techno);
                $this->setReference('php_icon' . $i, $techno);
            }

            if ($i === 7) {
                $techno = (new Technology())
                    ->setName('Symfony')
                    ->setImagePath('images/technology/symfony_icon.png');

                $manager->persist($techno);
                $this->setReference('symfony_icon' . $i, $techno);
            }

            if ($i === 8) {
                $techno = (new Technology())
                    ->setName('Twig')
                    ->setImagePath('images/technology/twig_icon.png');

                $manager->persist($techno);
                $this->setReference('twig_icon' . $i, $techno);
            }
        }

        $manager->flush();
    }
}
