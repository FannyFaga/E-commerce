<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class RegisterUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class,[
                'label' => 'Votre Email',
                'attr' => [
                    'placeholder' => 'Entrez votre Email',
                ]
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'constraints' => [
                    new Length([
                        'min' => 4,
                        'max'=>16
                    ]),
                ],
                'first_options'  => [
                    'label' => 'Votre Mot de passe:',
                    'attr' => [
                        'placeholder' => 'Choisissez votre mot de passe'
                    ]
                ],
                'second_options' => [
                    'label' => 'Confirmer votre mot de passe:',
                    'attr' => [
                        'placeholder' => 'Confirmez votre mot de passe'
                    ]
                ]
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Votre nom:',
                'constraints' => [
                    new Length([
                        'min' => 3,
                        'max'=>30
                    ]),
                ],
                'attr' => [
                    'placeholder' => 'Indiquez votre nom'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Votre prénom:',
                'constraints' => [
                    new Length([
                        'min' => 4,
                        'max'=>30
                    ]),
                ],

                'attr' => [
                    'placeholder' => 'Indiquez votre prénom'
                ]
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Valider',
                'attr' => [
                    'class' => 'btn btn-success'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
