<?php

namespace PGX\GestionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EtablissementType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('couleurtextenom')
            ->add('noautorisation')
            ->add('capacite')
            ->add('adresse')
            ->add('adressecomplementaire')
            ->add('telephonemobile')
            ->add('telephonefixe')
            ->add('fax')
            ->add('autretelephone')
            ->add('image')
            ->add('statut')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PGX\GestionBundle\Entity\Etablissement'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pgx_gestionbundle_etablissement';
    }
}
