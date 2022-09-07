<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nome',
                'attr' => [
                    'placeholder' => 'Digite o nome da sua categoria',
                    'class' => 'category-name form-row'
                ] 
            ])
            ->add('status', TextType::class, [
                'label' => 'Situação',
                'attr' => [
                    'placeholder' => 'Selecione a situação da sua categoria',
                    'class' => 'category-status form-row'
                ] 
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }
}
