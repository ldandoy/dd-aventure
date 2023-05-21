<?php

namespace App\Controller\Admin;

use App\Entity\Pnj;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

#[IsGranted('ROLE_ADMIN')]
class PnjCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Pnj::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            AssociationField::new('job'),
            AssociationField::new('place'),
            BooleanField::new('active'),
            TextField::new('imageFile')->setFormType(VichImageType::class)->hideOnIndex(),
            ImageField::new('imageName')->setBasePath('/images/pnjs/')->onlyOnIndex(),
            DateTimeField::new('created')->onlyOnIndex(),
            DateTimeField::new('updated')->onlyOnIndex()
        ];
    }
}
