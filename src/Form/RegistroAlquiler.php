<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class RegistroAlquiler extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('usuario_id', ChoiceType::class, array(
            'label' => 'Usuario: ',
            'choices' => array(
                'Juan' => 1,
                'David' => 2
            )
        ))
        ->add('pelicula_id', ChoiceType::class, array(
            'label' => 'Pelicula: ',
            'choices' => array(
                'Chuky' => 1,
                'Sao' => 3,
                'Anabelle' => 7
            )
        ))
        ->add('fechaInicio', DateType::class, array(
            'label' => 'Fecha Inicio: '
        ))
        ->add('fechaFin', DateType::class, array(
            'label' => 'Fecha Fin:'
        ))
        ->add('submit', SubmitType::class, array(
            'label' => 'Registro'
        ));
    }


}