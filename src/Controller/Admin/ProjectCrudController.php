<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use App\Form\ContentBlockForm;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Project::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'Project')
            ->setPageTitle(Crud::PAGE_EDIT, 'Edit project')
            ->setPageTitle(Crud::PAGE_NEW, 'Create project');
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance->getCreatedAt()) {
            $entityInstance->setCreator($this->getUser());
            $entityInstance->setCreatedAt(new \DateTimeImmutable());
            $entityInstance->setUpdatedAt(new \DateTimeImmutable());
        }

        parent::persistEntity($entityManager, $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $entityInstance->setUpdatedAt(new \DateTimeImmutable());

        parent::updateEntity($entityManager, $entityInstance);
    }

    public function configureFields(string $pageName): iterable
    {
        yield AssociationField::new('creator')
            ->setRequired(true);

        yield TextField::new('title');

        yield TextEditorField::new('shortDescription');

        yield DateTimeField::new('created_at')
            ->setFormat('dd MMMM yyyy HH:mm:ss')
            ->hideOnForm();

        yield DateTimeField::new('updated_at')
            ->setFormat('dd MMMM yyyy HH:mm:ss')
            ->hideOnForm();

        yield CollectionField::new('contentBlocks')
            ->setEntryType(ContentBlockForm::class)
            ->setFormTypeOption('by_reference', false)
            ->setFormTypeOption('allow_add', true)
            ->setFormTypeOption('allow_delete', true);
    }
}
