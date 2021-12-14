<?php

namespace App\Form;

use App\Entity\Trainings;
use phpDocumentor\Reflection\PseudoTypes\PositiveInteger;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Positive;

class TrainingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'required' => true,
                "label" => "Le nom de la formation"
            ])
            ->add('price', IntegerType::class, [
                'required' => true,
                'constraints' => [new Positive()],
                'attr' => [
                    'min' => 1
                ],
                "label" => "Le prix de la formation"
            ])
            ->add('duration', IntegerType::class, [
                'required' => true,
                'constraints' => [new Positive()],
                'attr' => [
                    'min' => 1
                ],
                "label" => "La durée (en jours)"


            ])
            ->add('description', TextareaType::class, [
                'empty_data' => 'Formation basique',
                "label" => "Une succinte description",
                'attr' => [
                    "max" => 300
                ]

            ])
            ->add("create", SubmitType::class, [
                'attr' => ['class' => "create"]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Trainings::class,
        ]);
    }
}
