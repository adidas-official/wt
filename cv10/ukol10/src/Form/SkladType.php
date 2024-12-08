<?php

namespace App\Form;

use App\Entity\Sklad;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Text;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class SkladType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'labels.title',
            ])
            ->add('quantity', TextType::class, [
                'label' => 'labels.quantity',
            ])
            ->add('price', TextType::class, [
                'label' => 'labels.price',
            ])
            ->add('category', TextType::class, [
                'label' => 'labels.category',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sklad::class,
        ]);
    }
}
