<?php

namespace App\Form;

use App\Entity\Race;
use App\Entity\Perso;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PersoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,[
                'required'      => true,
                'attr' => [
                    'placeholder'   => 'Nommez votre personnage',
                ]
            ])
            ->add('race', EntityType::class, [
                'class'         => Race::class,
                'choice_label'  => 'name',
                'required'      => true,
                'placeholder'   => 'Choisissez une race',
                'autocomplete'  => true,
            ])
            ->add('imageFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => true,
                'asset_helper' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Perso::class,
        ]);
    }
}
