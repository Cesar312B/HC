<?php

namespace App\Form;

use App\Entity\CIE;
use App\Entity\Diagnostico;
use App\Entity\Medicamentos;
use App\Entity\Pacientes;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DiagnosticoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('cie',EntityType::class,[
            'label'=>'Clasificación Internacional de Enfermedades CIE',
            'placeholder'=>'Seleccione una Enfermedad',
            'class'=>CIE::class,
            'choice_label'=>function (CIE $materia) {
                return  $materia->getCodigo(). ': ' . $materia->getDescripcion();},
            'attr' => ['data-select' => 'true']
        ])
            
            ->add('tipo_diagnostico',ChoiceType::class,[
                'label'=>'Tipo de Diagnóstico',
                'choices'=>[
                    'Escoja el tipo de diagnóstico' => 'Escoja el tipo de diagnóstico',
                    'PRESUNTIVO' => 'PRESUNTIVO',
                    'DEFINITIVO' => 'DEFINITIVO',
                   ]
            ])
            ->add('solicitud',TextType::class,[
                'required'=>false,
                'label'=>'Pedido de Examen de Laboratorio',
               'attr' => ['class' => 'text-uppercase' ], 
                
            ])

            ->add('solicitud_complementaria',TextType::class,[
                'required'=>false,
                'label'=>'Pedido de Examen Complementario',
               
               'attr' => ['class' => 'text-uppercase' ], 
                
            ])

            ->add('procedimiento',TextType::class,[
                'required'=>false,
                'label'=>'Pedido de Fisioterapia',

                'attr' => ['class' => 'text-uppercase' ], 
            ])

            ->add('interconsulta',TextType::class,[
                'required'=>false,
                'label'=>'Pedido de Interconsulta',
                'attr' => ['class' => 'text-uppercase' ], 
            ])


            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            //'data_class' => Diagnostico::class,
        ]);
    }
}
