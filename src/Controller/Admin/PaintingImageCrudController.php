<?php

namespace App\Controller\Admin;

use App\Entity\PaintingImage;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PaintingImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PaintingImage::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Изображения картин')
            ->setEntityLabelInSingular('изображению картин')
            ->setPageTitle("index", "Изображения картин")
            ->setPaginatorPageSize(10);
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('File','Название файла'),
            //TextField::new('painting','Картина'),
        ];
    }
}
