<?php

namespace App\Form;

use App\Entity\Perso;
use App\Entity\Race;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

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
            ->add('save', SubmitType::class, [
                'label' => 'Créer'
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
