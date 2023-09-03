<?php

namespace App\Controller\Admin;

use App\Entity\PaintingImage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PaintingImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PaintingImage::class;
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
