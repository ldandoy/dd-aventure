<?php

namespace App\Controller\Admin;

use App\Entity\PlaceTest;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class PlaceTestCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PlaceTest::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextEditorField::new('description'),
            TextField::new('skill'),
            TextField::new('text_successed'),
            TextField::new('text_failed'),
            IntegerField::new('xp'),
            IntegerField::new('difficulty'),
            TextField::new('action'),
            AssociationField::new('place_story'),
            BooleanField::new('active'),
            DateTimeField::new('created')->onlyOnIndex(),
            DateTimeField::new('updated')->onlyOnIndex()
        ];
    }
}
