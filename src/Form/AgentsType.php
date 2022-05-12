<?php

namespace App\Form;

use App\Entity\Agents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AgentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => '',
                'label_attr' => ['class' => 'visually-hidden'],
                'attr' => ['placeholder' => 'Nom de l\'agent', 'class' => 'col-md-6 m-2'],
                'row_attr' => ['class' => 'ps-5'],
            ],)
            ->add('prenom', TextType::class, [
                'label' => '',
                'label_attr' => ['class' => 'visually-hidden'],
                'attr' => ['placeholder' => 'Prenom de l\'agent', 'class' => 'col-md-6 m-2'],
                'row_attr' => ['class' => 'ps-5'],
            ],)
            ->add('adresse',null, [
                'label' => '',
                'label_attr' => ['class' => 'visually-hidden'],
                'attr' => ['placeholder' => 'Adresse de l\'agent', 'class' => 'col-md-6 m-2',
                'type' => 'address',],
                'row_attr' => ['class' => 'ps-5'],
                
            ],)
            ->add('phone_number', TextType::class, [
                'label' => '',
                'label_attr' => ['class' => 'visually-hidden'],
                'attr' => ['placeholder' => 'Numero de Téléphone l\'agent', 'class' => 'col-md-6 m-2'],
                'row_attr' => ['class' => 'ps-5'],
                
            ],)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Agents::class,
        ]);
    }
}
