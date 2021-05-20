<?php

namespace App\Controller\Admin;

use App\Entity\Movie;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

class MovieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Movie::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            TextField::new('name'),
            TextField::new('originalName'),
            DateField::new('releaseDate'),
            ImageField::new('image')->setUploadDir("/public/assets/upload/images")
                                    ->setBasePath("assets/upload/images"),
            TextareaField::new('synopsis'),
            AssociationField::new('genres'),
            AssociationField::new('studios'),
            AssociationField::new('actors'),
            AssociationField::new('userMovies'),
        ];
    }
   
}
