<?php

namespace App\Form;

use App\Entity\Option;
use app\Entity\PropertySearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class PropertySearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('minSurface', IntegerType::class, [
            'required' => false,
            'label' => false,
            'attr' => [
                'placeholder' => 'Surface minimale'
            ]
        ])
            ->add('maxPrice', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Budget max'
                ]
            ])
            ->add('options', EntityType::class, [
                'required' => false,
                'label' => false,
                'class' => Option::class,
                'choice_label' => 'name',
                'multiple' => true,
                'attr' => [
                    'placeholder' => 'Options'
                ]
            ])
            ->add('address', null, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Adresse'
                ]
            ])
            ->add('distance', ChoiceType::class, [
                'label' => false,
                'required' => false,
                'choices' => [
                '10km' => 10,
                '1000km' => 1000],
                'attr' => [
                    'placeholder' => 'Distance'

                ]
            ])
            ->add('lat', HiddenType::class)
            ->add('lng', HiddenType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PropertySearch::class,
            'method' => 'get',
            'csrf protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
