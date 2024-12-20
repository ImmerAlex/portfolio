<?php

namespace App\Form;

use App\Entity\ContentBlock;
use App\Entity\ContentBlockType;
use App\Entity\Project;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\TextEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ContentBlockForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
                $contentBlock = $event->getData();
                $form = $event->getForm();

                if (!$contentBlock) {
                    return;
                }

                $contentType = $contentBlock->getContentType();

                if ($contentType && $contentType->getType() === 'text') {
                    $form->add('content', TextEditorType::class);
                } else if ($contentType && $contentType->getType() === 'image') {
                    $form->add('content', FileType::class, [
                        'data_class' => null,
                    ]);
                }
                
            });

        $builder
            ->add('project', EntityType::class, [
                'class' => Project::class,
                'choice_label' => 'title',
            ])
            ->add('blockIndex', NumberType::class)
            ->add('contentType', EntityType::class, [
                'class' => ContentBlockType::class,
                'choice_label' => 'type',
            ])
            ->add('content', TextEditorType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContentBlock::class,
        ]);
    }
}