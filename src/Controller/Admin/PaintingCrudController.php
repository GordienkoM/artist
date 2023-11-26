<?php

namespace App\Controller\Admin;

use App\Entity\Painting;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PaintingCrudController extends AbstractCrudController
{
    public const GALLERY_IMAGE_BASE_PATH = 'assets/img/galleryImages';
    public const GALLERY_IMAGE_UPLOAD_DIR = 'public/assets/img/galleryImages';
    
    public static function getEntityFqcn(): string
    {
        return Painting::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Картины')
            ->setEntityLabelInSingular('картину')
            ->setPageTitle("index", "Картины")
            ->setPaginatorPageSize(50);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id')->hideOnForm(),
            ImageField::new('gallery_image','Фото в галерее')               
            ->setBasePath(self::GALLERY_IMAGE_BASE_PATH)
            ->setUploadDir(self::GALLERY_IMAGE_UPLOAD_DIR)
            ->setSortable(false), 
            //->setSortable(false)->hideOnForm(), 
            AssociationField::new('category','Категория'),
            AssociationField::new('paintingImages','Изображения')->hideOnIndex()->autocomplete(),
            //TextField::new('gallery_image','Фото в галерее'),          
            TextField::new('name','Название'),  
            TextField::new('nameEn','Название англ.')->hideOnIndex(),
            IntegerField::new('number','Номер'),
            NumberField::new('price','Цена'),
            IntegerField::new('creationYear','Год создания'),
            NumberField::new('hight','Высота')->setNumDecimals(1),
            NumberField::new('width','Ширина')->setNumDecimals(1),
            TextField::new('material','Матерьял'),
            TextField::new('alt','Описание')->hideOnIndex(),
            TextField::new('altEn','Описание англ.'),
            BooleanField::new('enable','Актив.'),
            ArrayField::new('paintingImages','Изображения')->onlyOnIndex(),           

        ];
    }
}
