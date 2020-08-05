<?php

namespace IN\CoreBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TicketType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('site', EntityType::class, [
                'class' => 'INCoreBundle:Site',
                'placeholder' => 'Choisissez un site',

                // uses the User.username property as the visible option string
                'choice_label' => 'siteName',
            ])
            ->add('type', ChoiceType::class, [
                'choices'  => [
                    'Audit' => 'Audit',
                    'Inventaire' => 'Inventaire',
                ],
                'placeholder' => 'Choisissez le type de ticket'
            ])
            ->add('sendTo', EntityType::class, [
                'class' => 'INUserBundle:User',
                'placeholder' => 'Choisissez un agent',

                // uses the User.username property as the visible option string
                'choice_label' => 'username',
            ])
            ->add('priorite')
            ->add('note');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IN\CoreBundle\Entity\Ticket'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'in_corebundle_ticket';
    }


}
