<?php

namespace App\Form;

use App\Entity\CameraRoll;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CameraRollType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('shipment_id')
            ->add('created')
            ->add('updated')
            ->add('client_id')
            ->add('shipment')
            ->add('size')
            ->add('paper_size')
            ->add('type')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CameraRoll::class,
        ]);
    }
}
