<?php

namespace CleverAge\Bundle\GeolocAttributeBundle\Normalizer;

use CleverAge\Bundle\GeolocAttributeBundle\Model\GeolocationInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class GeolocationNormaliser implements NormalizerInterface
{
    protected $supportedFormats = ['csv', 'json'];

    /**
     * {@inheritdoc}
     */
    public function normalize($object, $format = null, array $context = array())
    {
        return [
            'latitude' => $object->getLatitude(),
            'longitude' => $object->getLongitude(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof GeolocationInterface && in_array($format, $this->supportedFormats);
    }
}
