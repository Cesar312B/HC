<?php

namespace App\Form;

use App\Entity\OtrosAntecedentes;
use App\Entity\Vacunas;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Range;

class OtrosAntecedentes1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('alergias')

            
            ->add('vacunas',EntityType::class,[
               'class'=>Vacunas::class,
               'required' => false,
               'placeholder'=>'Seleccione una Vacuna', 
               'choice_label'=>'Nombre',
               'attr' => ['data-select' => 'true']
            ])
            ->add('n_dosis',NumberType::class,[
                'label'=>'Número de dosis',
                'required' => false,
                'constraints' => new Range(['min' =>0]),
            ])
            ->add('fecha_vacuna',BirthdayType::class,[
                'required' => false,
                'years' => range(2017, date("Y")),
                'constraints' => new Range(['max'=>"now"]),
                'label'=>'Fecha de Vacunación',
                'placeholder' => [
                'year' => 'Año', 'month' => 'Mes', 'day' => 'Día',
                ]
            ])
          
          
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => OtrosAntecedentes::class,
        ]);
    }
}
