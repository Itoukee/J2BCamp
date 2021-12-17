<?php

namespace App\Form;

use App\Entity\ComedianDocuments;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DocsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add("imageFile", VichImageType::class, [
                "label" => "Insérer votre facture",
                "required" => true,
                'storage_resolve_method' => VichImageType::STORAGE_RESOLVE_PATH_RELATIVE,
                'allow_delete'  => true,
                "delete_label" => "",
                'download_link' => false, // not mandatory, default is true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ComedianDocuments::class,
        ]);
    }
}
