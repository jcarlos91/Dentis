<?php

namespace AppBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Created by PhpStorm.
 * User: charly
 * Date: 10/12/18
 * Time: 02:49 PM
 */
class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('startDateTime', DateTimeType::class, [
                'label' => 'Fecha Inicio',
                'placeholder' => [
                    'year' => 'Year', 'month' => 'Month', 'day' => 'Day',
                    'hour' => 'Hour', 'minute' => 'Minute', 'second' => 'Second',
                ],
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' =>false
            ])
            ->add('endDateTime', DateTimeType::class, [
                'label' => 'Fecha Fin',
                'placeholder' => [
                    'year' => 'Year', 'month' => 'Month', 'day' => 'Day',
                    'hour' => 'Hour', 'minute' => 'Minute', 'second' => 'Second',
                ],
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' =>false
            ])
            ->add('user',TextType::class,[
                'label' => 'Nombre Paciente',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('observations',TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' =>false
            ])
            ->add('userHidden',TextType::class,[
                'label' =>false,
                'attr' => [
                    'class' => 'hidden',
                    'id' => 'userHideen'
                ],
                'required' => false,
                'mapped' => false
            ])
            ->add('save',SubmitType::class,[
                'label' => 'Guardar',
                'attr' => [
                    'class' => 'btn btn-success'
                ]
            ])
        ;
    }

}