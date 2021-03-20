<?php


namespace App\Form;

use App\Entity\Producto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductoNuevoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre')
            ->add('precio')
            ->add('marca')
            ->add('categorias')
        ;
    }public function configureOptions(OptionsResolver $resolver)
    {$resolver->setDefaults(
        ['data_class' => Producto::class,        ]
    );
    }

}