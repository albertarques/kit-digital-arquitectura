<?php

namespace App\Form;

use App\Entity\PostalAdress;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostalAdressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('street_adress')
            ->add('town')
            ->add('postal_code')
            ->add('province')
            ->add('country')
            ->add('created')
            ->add('updated')
            ->add('client_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PostalAdress::class,
        ]);
    }
}
