<?php

namespace TarasTestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class LoginForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("login", null, array('label' => 'Enter your login please '))
            ->add("passwordHash", null)
            ->add("enter", SubmitType::class, array('label' => 'Enter'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TarasTestBundle\Entity\User',
            'attr'=>array(
                        'onsubmit'=>'login(document.getElementById(\'login_form_login\').value)')
                )
        );
    }

    public function getName()
    {
        return 'taras_test_bundle_login_form';
    }
}
