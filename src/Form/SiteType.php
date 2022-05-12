<?php

namespace App\Form;

use App\Entity\Site;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => '',
                'label_attr' => ['class' => 'visually-hidden'],
                'attr' => ['placeholder' => 'Nom du site', 'class' => 'col-md-6 m-2 '],
                'row_attr' => ['class' => 'ps-5'],
                
            ],)
            ->add('adresse', TextType::class, [
                'label' => '',
                'label_attr' => ['class' => 'visually-hidden'],
                'attr' => ['placeholder' => 'adresse du site', 'class' => 'col-md-6 m-2'],
                'row_attr' => ['class' => 'ps-5'],
                
            ],)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Site::class,
        ]);
    }
}
