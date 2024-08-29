<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Category;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EmailType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
                'attr' => ['autocomplete' => 'off', 'id' => 'category-selection', 'name' => 'category']
            ])
            ->add('subject', TextType::class)
            ->add('messageType', ChoiceType::class, [
                'choices' => [
                    'Use Default Message' => 'default',
                    'Custom Message' => 'custom'
                ],
                'expanded' => true,
                'multiple' => false,
                'label' => 'Select message type',
                'attr' => ['id' => 'messageType']
            ])
            ->add('message', TextareaType::class, [
                'required' => false,
                'attr' => ['id' => 'customMessageTextarea']

            ])
            ->add('send', SubmitType::class);
    }

}