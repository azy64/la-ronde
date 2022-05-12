<?php

namespace App\Form;

use App\Entity\Materiel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaterielType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('cle', CheckboxType::class, [
                'label' => 'Clés',
                'attr' => ['class' => 'col-md-2'],
                'row_attr' => ['class' => 'col'],
            ])
            ->add('radio', CheckboxType::class, [
                'label' => 'Radio',
                'attr' => ['class' => 'col-md-2'],
                'row_attr' => ['class' => 'col'],
                ])
            ->add('phone', CheckboxType::class, [
                'label' => 'Téléphone',
                'row_attr' => ['class' => 'col'],
                ])
            ->add('ronde', CheckboxType::class, [
                'label' => 'Contrôleur de ronde',
                'row_attr' => ['class' => 'col-sm-3'],
                ])
            ->add('lamp', CheckboxType::class, [
                'label' => 'Torche',
                'row_attr' => ['class' => 'col'],
                ])
            ->add('contact', CheckboxType::class, [
                'label' => 'Clé de voiture',
                'row_attr' => ['class' => 'col-sm-2'],
                ])
            ->add('ivvadr', CheckboxType::class, [
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
