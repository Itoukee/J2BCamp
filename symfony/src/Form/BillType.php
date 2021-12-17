<?php

namespace App\Form;

use App\Entity\Bills;
use App\Entity\Companies;
use App\Entity\Trainings;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\DBAL\Types\BooleanType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Regex;

class BillType extends AbstractType
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('num_stage', TextType::class, [
                'required' => true,
                'label' => "Le numero de stage(XXX-n caractères)",

            ])
            ->add('case_number', TextType::class, [
                "required" => true,
                "label" => "Le numéro d'affaire",
                'constraints'=>[
                    new Regex('/[0-9]{2}-[0-9]{2,}/')
                ]
            ])
            ->add('bdc', NumberType::class, [
                "required" => false,
                "label" => "Le numero de Bon De Commande"
            ])
            ->add('training', EntityType::class, [
                "label" => "La formation effectuée",
                'class' => Trainings::class,
                'choice_label' => 'name',
                'required' => true
            ])
            ->add('comedian', EntityType::class, [
                "label" => "Le comedien impliqué",
                'class' => User::class,
                'choice_label' => 'email',
                'choices' => $this->userRepository->filterByRole("comedian"),
                'required' => true


            ])
            ->add('company', EntityType::class, [
                "label" => "Dans quelle entreprise",
                'class' => Companies::class,
                'choice_label' => 'name',
                'required' => true


            ])
            ->add('inter_date', DateType::class, [
                'label' => "Le debut de la formation dans l'entreprise",
                "required" => true,
                'widget' => 'single_text'
            ])
            ->add('paid', CheckboxType::class, [
                'label' => 'La facture Entreprise est elle déja payé?',
                'required' => false
            ]);


    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Bills::class,
        ]);
    }
}
