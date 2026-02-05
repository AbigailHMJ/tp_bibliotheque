<?php

namespace App\Form;

use App\Entity\Reservation;
use App\Entity\Book;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom : ',
                'attr' => [
                    'placeholder' => 'votre nom',
                ]
            ])
            ->add('email', TextType::class, [
                'label' => 'Email : ',
                'attr' => [
                    'placeholder' => 'votre mail',
                ]
            ])
            ->add('books', EntityType::class, [
            'class' => Book::class,
            'choice_label' => 'title',
            'multiple' => true,
            'expanded' => true,
            'label' => 'Livres : ',
            'required' => false
        ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
