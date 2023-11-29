<?php

namespace App\Controller\Admin;

use App\Entity\EventPhoto;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EventPhotoCrudController extends AbstractCrudController
{
    public const GALLERY_IMAGE_BASE_PATH = 'assets/img/photos';
    public const GALLERY_IMAGE_UPLOAD_DIR = 'public/assets/img/photos';
    
    public static function getEntityFqcn(): string
    {
        return EventPhoto::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Фотографии событий')
            ->setEntityLabelInSingular('Фотографию события')
            ->setPageTitle("index", "Фотографии событий")
            ->setPaginatorPageSize(50);
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('event','Событие')->autocomplete(),
            IdField::new('id')->hideOnForm(),
            ImageField::new('file','Фото события')               
            ->setBasePath(self::GALLERY_IMAGE_BASE_PATH)
            ->setUploadDir(self::GALLERY_IMAGE_UPLOAD_DIR)
            ->setSortable(false),
            TextField::new('description','Описание'),
            TextField::new('descriptionEn','Описание по-англ.'),          
        ];
    }
    
}
