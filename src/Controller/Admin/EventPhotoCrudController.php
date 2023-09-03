<?php

namespace App\Controller\Admin;

use App\Entity\EventPhoto;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EventPhotoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EventPhoto::class;
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
