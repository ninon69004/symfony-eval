<?php

namespace App\Controller\Admin;

use App\Entity\UserMovie;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class UserMovieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return UserMovie::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            AssociationField::new('movie'),
            AssociationField::new('user'),
            BooleanField::new('list'),
            BooleanField::new('seen'),
        ];
    }
   
}
