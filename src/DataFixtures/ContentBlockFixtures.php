<?php

namespace App\DataFixtures;

use App\Entity\ContentBlock;
use App\Entity\ContentBlockType;
use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ContentBlockFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $nbBlock = 4;

        $project = $this->getReference('project_1', Project::class);
        $type_text = $this->getReference('content_block_type_text', ContentBlockType::class);
        $type_image = $this->getReference('content_block_type_image', ContentBlockType::class);

        for ($i = 0; $i < $nbBlock; $i++) {

            if ($i === 0) {
                $block = (new ContentBlock())
                    ->setBlockIndex(2)
                    ->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec purus nec elit tincidunt aliquam. Nullam nec purus nec elit tincidunt aliquam.')
                    ->setContentType($type_text)
                    ->setProject($project);

                $manager->persist($block);
                $this->addReference('content_block_1', $block);
            }

            if ($i === 1) {
                $block = (new ContentBlock())
                    ->setBlockIndex(1)
                    ->setContent('images/project/Projet_exemple_1/placeholder.png')
                    ->setContentType($type_image)
                    ->setProject($project);

                $manager->persist($block);
                $this->addReference('content_block_2', $block);
            }

            if ($i === 2) {
                $block = (new ContentBlock())
                    ->setBlockIndex(3)
                    ->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec purus nec elit tincidunt aliquam. Nullam nec purus nec elit tinc incididunt aliquam.')
                    ->setContentType($type_text)
                    ->setProject($project);

                $manager->persist($block);
                $this->addReference('content_block_3', $block);
            }

            if ($i === 3) {
                $block = (new ContentBlock())
                    ->setBlockIndex(4)
                    ->setContent('images/project/Projet_exemple_1/placeholder.png')
                    ->setContentType($type_image)
                    ->setProject($project);

                $manager->persist($block);
                $this->addReference('content_block_4', $block);
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ProjectFixtures::class,
            ContentBlockTypeFixtures::class
        ];
    }
}
