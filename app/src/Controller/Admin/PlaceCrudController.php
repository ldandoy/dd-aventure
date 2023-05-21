<?php

namespace App\Controller\Admin;

use App\Entity\Place;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

#[IsGranted('ROLE_ADMIN')]
class PlaceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Place::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('zone'),
            AssociationField::new('city'),
            TextField::new('name'),
            TextEditorField::new('description'),
            AssociationField::new('placeStories'),
            BooleanField::new('active'),
            BooleanField::new('Donjon'),
            TextField::new('imageFile')->setFormType(VichImageType::class)->hideOnIndex(),
            ImageField::new('imageName')->setBasePath('/images/places/')->onlyOnIndex(),
            DateTimeField::new('created')->onlyOnIndex(),
            DateTimeField::new('updated')->onlyOnIndex()
        ];
    }
}
