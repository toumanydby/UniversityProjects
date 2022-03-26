<?php

namespace App\Form;

use App\Entity\Activity;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('activityInscrit', EntityType::class,
            [
                'class' => Activity::class,
                'multiple'=> true,
                'expanded' => true,
                'choice_label' => 'name',
                'attr' => [
                    'style' => 'margin:25px;' ,"role"=>"group", 'aria-label'=> "Basic checkbox toggle button group"
                ],
                'label' => false
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
