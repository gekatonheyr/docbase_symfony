<?php

namespace TarasTestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DocViewForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('data_class' => 'TarasTestBundle\Entity\Agreement_reg'));
    }

    public function getName()
    {
        return 'taras_test_bundle_doc_view_form';
    }
}
