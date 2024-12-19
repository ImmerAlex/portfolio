<?php

namespace App\Controller\Admin;

use App\Entity\ContentBlock;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class ContentBlockCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ContentBlock::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'Block content')
            ->setPageTitle(Crud::PAGE_EDIT, 'Edit block content')
            ->setPageTitle(Crud::PAGE_NEW, 'Create block content');
    }

    public function configureFields(string $pageName): iterable
    {
        yield NumberField::new('blockIndex');

        yield TextEditorField::new('content');

        yield AssociationField::new('contentType', 'Type');

        yield AssociationField::new('project', 'Project');
    }
}
