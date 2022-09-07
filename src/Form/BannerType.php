<?php

namespace App\Form;

use App\Entity\Banner;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BannerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nome',
                'attr' => [
                    'placeholder' => 'Digite o nome do seu banner',
                    'class' => 'banner-name form-row'
                ] 
            ])
            ->add('image', TextType::class, [
                'label' => 'Imagem',
                'attr' => [
                    'placeholder' => 'Selecione a imagem do seu banner',
                    'class' => 'banner-imagem form-row'
                ] 
            ])
            ->add('position', TextType::class, [
                'label' => 'Posição',
                'attr' => [
                    'placeholder' => 'Selecione a posição do seu banner',
                    'class' => 'banner-position form-row'
                ] 
            ])
            ->add('sequence', TextType::class, [
                'label' => 'Sequência',
                'attr' => [
                    'placeholder' => 'Digite a sequência do seu banner',
                    'class' => 'banner-sequence form-row'
                ] 
            ])
            ->add('status', TextType::class, [
                'label' => 'Situação',
                'attr' => [
                    'placeholder' => 'Selecione a situação do seu banner',
                    'class' => 'banner-status form-row'
                ] 
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Banner::class,
        ]);
    }
}
