<?php

namespace App\Form;

use App\Entity\Companies;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanyFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                "label" => "Entrez le nom de l'entreprise",
                "required" => true
            ])
            ->add('phone_number', TelType::class, [
                "label" => "Entrez le numero de telephone de l'entreprise",
                "required" => true
            ])
            ->add('siret', TextType::class, [
                "label" => "Entrez le numero de siret de l'entreprise",
                "required" => true
            ])
            ->add("street_number",TextType::class, [
                'attr'=>[
                    "readonly"=>"readonly",
                    "id"=>"street_number"
                ]
            ])
            ->add("route",TextType::class, [
                'attr'=>[
                    "readonly"=>"readonly",
                    "id"=>"route"
                ]
            ])
            ->add("locality",TextType::class, [
                'attr'=>[
                    "readonly"=>"readonly",
                    "id"=>"locality"
                ]
            ])
            ->add("country",TextType::class, [
                'attr'=>[
                    "readonly"=>"readonly",
                    "id"=>"country"
                ]
            ]);


    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Companies::class,
        ]);
    }
}
