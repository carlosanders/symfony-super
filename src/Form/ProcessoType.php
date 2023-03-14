<?php

namespace App\Form;

use App\Entity\Processo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProcessoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numero', DateType::class, [
                'required' => $options['require_due_date'],
            ])
            ->add('descricao', DateType::class, [
                'required' => $options['require_due_date'],
            ])
            ->add('titulo', DateType::class, [
                'required' => $options['require_due_date'],
            ])
            ->add('classificacao')
            ->add('observacao')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Processo::class,
        ]);
    }
}