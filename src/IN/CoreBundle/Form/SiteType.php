<?php

namespace IN\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SiteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codeSite')
            ->add('typeTrans')->add('presenceEdm')->add('typeNrj')->add('g900')->add('g1800')->add('u2100')->add('u900')->add('l800')->add('l1800')->add('t46s')->add('tdd')->add('siteName')->add('quartier')->add('district')->add('onAirDate')->add('siteOperationalStatus')->add('siteDeDeplacement')->add('dateDeDeplacement')->add('typeStructure')->add('manufacturer')->add('NetwordTopology')->add('structureOwner')->add('reasonIfNotAvailableForSharing')->add('sharingStatus')->add('streetAddress')->add('commune')->add('cercle')->add('kout')->add('typeOfCoveredArea')->add('latitudeDecimal')->add('longitudeDecimal')->add('latitudeDMS')->add('longitudeDMS')->add('typo')->add('toweManufacturer');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IN\CoreBundle\Entity\Site'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'in_corebundle_site';
    }


}
