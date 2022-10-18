<?php

namespace App\Form;

use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use function Sodium\add;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title' ,null, [
                'attr' => [
                    'placeholder' => 'e.g Chevrolet Tahoe'
                ]
            ])
            ->add('make', ChoiceType::class, [
                'choices' => [
                    'chevrolet' => 'chevrolet',
                    'bmw' => 'bmw',
                    'mercedes' => 'mercedes',
                    'audi' => 'audi'
                ]
            ])
            ->add('model_year')
            ->add('car_condition',ChoiceType::class,[
                'choices' => [
                    'New' => 'New',
                    'Used' => 'Used'
                ],
                'label' => 'Condition'
            ])
            ->add('price',null, [
                'label' => 'Asking Price'
            ])
            ->add('location')
            ->add('description')
            ->add('carFilename', FileType::class,[
                'label' => 'Photo',
                'constraints' => [
                    new File([
                        'maxSize' => '2048k',
                        'mimeTypes' => [
                            "image/jpeg",
                            "image/jpg",
                            "image/png",
                            "image/gif",
                        ],
                        'mimeTypesMessage' => 'Please upload a Photo in JPEG,JPG,PNG or GIF'
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
