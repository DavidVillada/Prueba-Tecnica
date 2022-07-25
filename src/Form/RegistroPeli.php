<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class RegistroPeli extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre', TextType::class, array(
            'label' => 'Nombre'
        ))
        ->add('sinopsis', TextType::class, array(
            'label' => 'Sinopsis'
        ))
        ->add('precioUnitario', TextType::class, array(
            'label' => 'PrecioUnitario'
        ))
        ->add('genero', TextType::class, array(
            'label' => 'Genero'
        ))
        ->add('fechaEstreno', DateType::class, array(
            'label' => 'FechaEstreno'
        ))
        ->add('submit', SubmitType::class, array(
            'label' => 'Registro'
        ));
    }


}