<?php

/*
 * This file is part of the Geoloc Attribute Bundle package.
 *
 * (c) Clever Age
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CleverAge\Bundle\GeolocAttributeBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GeolocationType extends AbstractType
{
    /** @var string */
    private $geolocaltionModel;

    public function __construct($geolocaltionModel = null)
    {
        $this->geolocaltionModel = $geolocaltionModel;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options = [])
    {
        $builder
            ->add('latitude', 'text', [
                'label' => 'geolocation.attribute.latitude.label',
            ])
            ->add('longitude', 'text', [
                'label' => 'geolocation.attribute.longitude.label',
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(['data_class' => $this->geolocaltionModel]);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'cleverage_form_geolocation';
    }
}
