<?php

namespace App\DataFixtures;

use App\Entity\ContentBlockType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContentBlockTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $nbContentBlockTypes = 2;

        for ($i = 0; $i < $nbContentBlockTypes; $i++) {

            if ($i === 0) {
                $type = (new ContentBlockType())
                    ->setType('text');

                $manager->persist($type);
                $this->setReference('content_block_type_text', $type);
            }

            if ($i === 1) {
                $type = (new ContentBlockType())
                    ->setType('image');

                $manager->persist($type);
                $this->setReference('content_block_type_image', $type);
            }
        }

        $manager->flush();
    }

    public function getGroups(): array
    {
        return ['content_block_type'];
    }
}
