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
    { /*Esta clase construye el formulario que pasaremos luego al Twig con la linea form(form). En el Correo pondremos un
        comprobador de correo para que pongamos un @. En el tipo haremos un ChoiceType para escoger entre personal y profesional.*/
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
    //NO TOCAR. LO NECESITA EL PROGRAMA
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contacto::class,
        ]);
    }
}
