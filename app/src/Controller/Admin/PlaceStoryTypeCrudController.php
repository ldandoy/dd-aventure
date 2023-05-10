<?php

namespace App\Controller\Admin;

use App\Entity\PlaceStoryType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PlaceStoryTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PlaceStoryType::class;
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
