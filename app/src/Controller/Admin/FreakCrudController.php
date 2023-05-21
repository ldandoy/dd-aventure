<?php

namespace App\Controller\Admin;

use App\Entity\Freak;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

#[IsGranted('ROLE_ADMIN')]
class FreakCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Freak::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
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
            AssociationField::new('places'),
            BooleanField::new('active'),
            DateTimeField::new('created')->onlyOnIndex(),
            DateTimeField::new('updated')->onlyOnIndex()
        ];
    }
}
