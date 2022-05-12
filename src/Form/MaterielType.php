<?php

namespace App\Form;

use App\Entity\Materiel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaterielType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('keys', null, [
                'label' => 'Clés',
                'attr' => ['class' => 'col-md-2'],
                'row_attr' => ['class' => 'col'],
            ])
            ->add('radio', null, [
                'label' => 'Radio',
                'attr' => ['class' => 'col-md-2'],
                'row_attr' => ['class' => 'col'],
                ])
            ->add('phone', null, [
                'label' => 'Téléphone',
                'row_attr' => ['class' => 'col'],
                ])
            ->add('round_controller', null, [
                'label' => 'Contrôleur de ronde',
                'row_attr' => ['class' => 'col-sm-3'],
                ])
            ->add('torch', null, [
                'label' => 'Torche',
                'row_attr' => ['class' => 'col'],
                ])
            ->add('key_car', null, [
                'label' => 'Clé de voiture',
                'row_attr' => ['class' => 'col-sm-2'],
                ])
            ->add('ivvadr', null, [
                'label' => 'Inspection visuelle du véhicule avant départ de ronde',
                'row_attr' => ['class' => 'col-md-5'],
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Materiel::class,
        ]);
    }
}
