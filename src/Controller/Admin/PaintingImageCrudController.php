<?php

namespace App\Controller\Admin;

use App\Entity\PaintingImage;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PaintingImageCrudController extends AbstractCrudController
{
    public const GALLERY_IMAGE_BASE_PATH = 'assets/img/paintings';
    public const GALLERY_IMAGE_UPLOAD_DIR = 'public/assets/img/paintings';

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
            ->setPaginatorPageSize(50);
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            ImageField::new('File','Название файла')               
            ->setBasePath(self::GALLERY_IMAGE_BASE_PATH)
            ->setUploadDir(self::GALLERY_IMAGE_UPLOAD_DIR)
            ->setSortable(false), 
            TextField::new('File','Название файла')->onlyOnIndex(),
            //TextField::new('painting','Картина'),
        ];
    }
}
