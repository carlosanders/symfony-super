<?php

namespace App\Form;

use App\Entity\Documento;
use App\Entity\TipoDocumento;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DocumentoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('descricao')
            ->add('numero')
            ->add('autor')
            ->add('observacao')
            // ->add('tipoDocumento', EntityType::class, [
            //     'choice_label' => 'model',
            //     'class' => TipoDocumento::class,
            //     //'group_by' => 'material',
            //     'label' => 'Weapon',
            //     'multiple' => false,
            //     'required' => false,
            //     ])
            //->add('tipoDocumento', TipoDocumento::class)
            ->add('tipoDocumento')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Documento::class,
        ]);
    }
}
