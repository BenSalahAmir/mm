<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Personne;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            ->add('nbravertissement')
            ->add('ban')
            ->add('datedebutblock')
            ->add('datefinblock')
            ->add('idclient', EntityType::class, [
                'class'=> Personne::class,
                'choice_label' =>'email'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
