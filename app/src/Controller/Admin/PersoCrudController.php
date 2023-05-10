<?php

namespace App\Controller\Admin;

use App\Entity\Perso;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PersoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Perso::class;
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
