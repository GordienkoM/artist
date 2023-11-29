<?php

namespace App\Controller\Admin;

use App\Entity\Event;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EventCrudController extends AbstractCrudController
{
    public const GALLERY_IMAGE_BASE_PATH = 'assets/img/events';
    public const GALLERY_IMAGE_UPLOAD_DIR = 'public/assets/img/events';
    
    public static function getEntityFqcn(): string
    {
        return Event::class;
    }
    
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('События')
            ->setEntityLabelInSingular('событие')
            ->setPageTitle("index", "События")
            ->setPaginatorPageSize(10);
    }
  
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name','Название'),
            TextField::new('nameEn','Название по-англ.'),
            ImageField::new('image','Главное фото события')               
            ->setBasePath(self::GALLERY_IMAGE_BASE_PATH)
            ->setUploadDir(self::GALLERY_IMAGE_UPLOAD_DIR)
            ->setSortable(false),
            BooleanField::new('enable','Актив.'),           
        ];
    }
    
}
