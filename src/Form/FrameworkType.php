<?php

namespace App\Form;

use App\Entity\Framework;
use Webmozart\Assert\Assert;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class FrameworkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            -> add('file', FileType::class)
            ->add('niveau')
            -> add('Modifier', SubmitType::class, array(
                'attr'=> array(
                   'class' => "btn-success"
                )
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Framework::class,
        ]);
    }
}
