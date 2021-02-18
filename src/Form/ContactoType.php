<?php

namespace App\Form;

use App\Entity\Contacto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class ContactoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nombre')
            ->add('Apellido')
            ->add('Telefono')
            ->add('Correo', EmailType::class, [
                'help' => 'Tiene que contener un @ y un .'

            ])
            ->add('tipo', ChoiceType::class, [
                'choices' => [
                    'Personal' => 'personal',
                    'Profesional' => 'profesional',
                ],
            ])
            ->add('Notas')
            ->add('Crear', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contacto::class,
        ]);
    }
}
