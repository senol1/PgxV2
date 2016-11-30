<?php

namespace PGX\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EleveType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('matricule')
            ->add('prenom')
            ->add('nom')
            ->add('email')
            ->add('datenaissance')
            ->add('adresse')
            ->add('telephonemobile')
            ->add('telephonedomicile')
            ->add('genre')
            ->add('cin')
            ->add('image')
            ->add('statut')
            ->add('boursier')
            ->add('abandon')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PGX\UserBundle\Entity\Eleve'
        ));
    }

    public function getParent()
    {
        //return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        return 'fos_user_registration';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pgx_userbundle_eleve';
    }
}
