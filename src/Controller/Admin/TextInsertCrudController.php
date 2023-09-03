<?php

namespace App\Controller\Admin;

use App\Entity\TextInsert;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TextInsertCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TextInsert::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
