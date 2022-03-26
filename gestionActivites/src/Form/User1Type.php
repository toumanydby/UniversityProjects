<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class User1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder


            ->add('nom' ,TextType::class,[
                'label' => 'Nom : ',
                'label_attr' => ['style' => 'color:white ; font-size : 20px'],
                 'attr' => ['class' => 'form-control']
            ])
            ->add('prenom',TextType::class,[
                'label' => 'Prénom : ',
                'label_attr' => ['style' => 'color:white ; font-size : 20px'],
                'attr' => ['class' => 'form-control']
            ])
            ->add('username',TextType::class,[
                'label' => 'Username : ',
                'label_attr' => ['style' => 'color:white ; font-size : 20px'],
                'attr' => ['class' => 'form-control']
            ])
            ->add('plaiPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'label' => 'Password : ',
                'label_attr' => ['style' => 'color:white ; font-size : 20px'],
                'attr' => ['class' => 'form-control'],
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
        ->add('roles', ChoiceType::class,[
        'choices' => [
            'Animateur' => 'ROLE_ANIMATEUR',
            'Administrateur' => 'ROLE_ADMIN'
        ],
        'multiple' => true,
        'expanded' => true,
        'attr' => [
            'style' => 'margin:25px; ' ,"role"=>"group", 'aria-label'=> "Basic checkbox toggle button group"
        ],
            'label_attr' => ['style' => 'color:white ; font-size : 20px'],
        'label' => 'Roles : '

    ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
