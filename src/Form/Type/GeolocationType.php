<?php

/*
 * This file is part of the Geloc Attribute Bundle package.
 *
 * (c) Clever Age
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CleverAge\Bundle\GelocAttributeBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GeolocationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options = [])
    {
        $builder
            ->add('latitude', 'text', [
                'label' => 'cleverage.geolocation.latitude.label',
            ])
            ->add('longitude', 'text', [
                'label' => 'cleverage.geolocation.longitude.label',
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(['data_class' => 'CleverAge\Bundle\GelocAttributeBundle\Model\ProductGeolocation']);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'cleverage_form_geolocation';
    }
}
