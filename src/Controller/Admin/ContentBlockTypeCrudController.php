<?php

namespace App\Controller\Admin;

use App\Entity\ContentBlockType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ContentBlockTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ContentBlockType::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('type');
    }
}
