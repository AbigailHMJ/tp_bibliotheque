<?php

namespace App\Form;

use App\Entity\Reservation;
use App\Entity\Book;
use App\Repository\BookRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Choice;

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
                    'placeholder' => 'votre email',
                ]
            ])
            ->add('books', EntityType::class, [
                'class' => Book::class,
                'choice_label' => 'title',
                'multiple' => true,
                'expanded' => true,
                'label' => 'Livres : ',
                'required' => false,
                'constraints' => [
                    new Count(
                        min : 1,
                        minMessage : 'Veuillez sélectionner au moins un livre.',
                    ),
                ],
            ]);;
            'class' => Book::class,
            'choice_label' => 'title',
            'multiple' => true,
            'expanded' => true,
            'label' => 'Livres : ',
            'required' => false,
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
