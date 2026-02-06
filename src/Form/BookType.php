<?php

namespace App\Form;

use App\Entity\Book;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\PositiveOrZero;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;



class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('stock',IntegerType::class,[
                'label'=> 'Stock :',
                'attr' => [
                    'min' =>0,
                ],
                'constraints' => [
                    new PositiveOrZero(
                        message : ' Le stock ne peux pas être négatif.'
                    )
                ]
            ])
            ->add('title',TextType::class, [
                'label'=> 'Titre du livre :',
                'attr' => [
                    'placeholder' => 'Ecrire ici',
                ]

            ])
            ->add('author',TextType::class,[
                'label'=> "Nom de l'auteur :",
                'attr' => [
                    'placeholder' => 'Ecrire ici',
                ]
            ])
            ->add('category',TextType::class,[
                'label' => 'Categorie du livre :',
                'attr' =>[
                    'placeholder' => "Ecrire ici",
                ]
            ])
            ->add('description',TextType::class,[
                'label' => 'Description du livre :',
                'attr' =>[
                    'placeholder' => 'Ajouter une description'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
