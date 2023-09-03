<?php

namespace App\Controller\Admin;

use App\Entity\Painting;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PaintingCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Painting::class;
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
