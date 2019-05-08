<?php

namespace App\FormType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PostType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('name', TextType::class)
            ->add('text', TextareaType::class)
            ->add('save', SubmitType::class);
    }

    public function configureDefaults(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }

}