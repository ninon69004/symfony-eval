<?php

namespace App\Controller\Admin;

use App\Entity\Actor;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class ActorCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Actor::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            TextField::new('firstName'),
            TextField::new('lastName'),
            ImageField::new('image')->setUploadDir("/public/assets/upload/images")
                                    ->setBasePath("assets/upload/images"),
            DateField::new('dateOfBirth'),
            DateField::new('dateOfDeath'),
            AssociationField::new('movies'),
        ];
    }
    
}
