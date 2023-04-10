<?php

namespace App\Form;

use App\Entity\PersoItem;
use App\Entity\Perso;
use App\Entity\Item;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PersoItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('qte')
            ->add('perso', EntityType::class, [
                'class' => Perso::class,
                'choice_label' => 'name',
                'required'   => false,
                'placeholder' => 'Choose an option'
            ])
            ->add('item', EntityType::class, [
                'class' => Item::class,
                'choice_label' => 'name',
                'required'   => false,
                'placeholder' => 'Choose an option'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PersoItem::class,
        ]);
    }
}
