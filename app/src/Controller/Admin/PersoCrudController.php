<?php

namespace App\Controller\Admin;

use App\Entity\Perso;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

#[IsGranted('ROLE_ADMIN')]
class PersoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Perso::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            AssociationField::new('race'),
            AssociationField::new('user'),
            AssociationField::new('place'),
            IntegerField::new('pdv'),
            IntegerField::new('vitesse'),
            IntegerField::new('puissance'),
            IntegerField::new('dexterite'),
            IntegerField::new('charisme'),
            IntegerField::new('intelligence'),
            IntegerField::new('constitution'),
            IntegerField::new('sagesse'),
            IntegerField::new('gold'),
            IntegerField::new('xp'),
            TextField::new('imageFile')->setFormType(VichImageType::class)->hideOnIndex(),
            ImageField::new('imageName')->setBasePath('/images/persos/')->onlyOnIndex(),
            DateTimeField::new('created')->onlyOnIndex(),
            DateTimeField::new('updated')->onlyOnIndex()
        ];
    }
}
