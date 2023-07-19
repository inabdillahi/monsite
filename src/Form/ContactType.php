<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                "label" => false,
                "attr" => [
                    'class' => "contact-name form-control",
                    'placeholder' => 'Votre nom'
                ],
                "required" => true
            ])
            ->add('email', EmailType::class, [
                "label" => false,
                "attr" => [
                    'class' => "contact-email form-control",
                    'placeholder' => "Email"
                ],
                "required" => true
            ])
            ->add('phone', TelType::class, [
                "label" => false,
                "attr" => [
                    'class' => "contact-email form-control",
                    'placeholder' => "Téléphone"
                ],
                "required" => true
            ])
            ->add('sujet', TextType::class, [
                "label" => false,
                "attr" => [
                    'class' => "contact-name form-control",
                    'placeholder' => "Sujet de votre contact"
                ],
                "required" => true
            ])
            ->add('description', TextareaType::class, [
                "label" => false,
                "attr" => [
                    'class' => "contact-message",
                    'placeholder' => "Décrire un peu le besoin"
                ],
                "required" => true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
