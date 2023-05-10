<?php

namespace App\Controller\Admin;

use App\Entity\PlaceTest;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PlaceTestCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PlaceTest::class;
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
