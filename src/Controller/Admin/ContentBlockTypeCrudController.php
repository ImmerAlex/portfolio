<?php

namespace App\Controller\Admin;

use App\Entity\ContentBlockType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ContentBlockTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ContentBlockType::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'Content block type')
            ->setPageTitle(Crud::PAGE_EDIT, 'Edit content block type')
            ->setPageTitle(Crud::PAGE_NEW, 'Create content block type');
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('type');
    }
}
