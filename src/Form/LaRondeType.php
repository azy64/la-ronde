<?php

namespace App\Form;

use App\Entity\LaRonde;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LaRondeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            ->add('date_debut', DateTimeType::class, [
                  'label' => 'Date de début',
                  'row_attr' => ['class' => 'ps-5'],
                  ])
            ->add('date_fin', DateTimeType::class, [
                  'label' => 'Date de fin',
                  'row_attr' => ['class' => 'ps-5'],
                  
                  ])
            ->add('observation', TextareaType::class, [
                'label' => 'Observation',
                'label_attr' => ['class' => 'd-block'],
                'attr' => ['class' => 'w-75'],
                'row_attr' => ['class' => 'ps-5'],
                ])
            ->add('detail', TextareaType::class, [
                'label' => 'Début de la Ronde - Chronologie des Missions',
                'label_attr' => ['class' => 'd-block'],
                'attr' => ['class' => 'w-75'],
                'row_attr' => ['class' => 'ps-5'],
                ])
            ->add('agent',AgentsType::class, [
                'label' => 'Renseignement sur l\'Agent/ Rédacteur',
                'label_attr' => ['class' => 'h2 w-75 m-4 p-2 bg-danger text-white'],
                ])
            ->add('site',SiteType::class, [
                'label' => 'Renseignement du site',
                'label_attr' => ['class' => 'h2 bg-danger m-4 w-75 p-2 text-white'],
                ])
            ->add('materiel',MaterielType::class, [
                'label' => 'Récupération Matériel de ronde - Vérification - Début de Mission',
                'required' => true,
                'label_attr' => ['class' => 'h2 bg-info m-4 p-2 text-white'],
                'attr' => ['class' => 'row m-3',],
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LaRonde::class,
        ]);
    }
}
