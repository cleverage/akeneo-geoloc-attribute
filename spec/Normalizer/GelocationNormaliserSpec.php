<?php

namespace spec\CleverAge\Bundle\GelocAttributeBundle\Normalizer;

use CleverAge\Bundle\GelocAttributeBundle\Model\GeolocationInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GelocationNormaliserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('CleverAge\Bundle\GelocAttributeBundle\Normalizer\GelocationNormaliser');
    }

    function it_is_normalizer()
    {
        $this->shouldImplement('Symfony\Component\Serializer\Normalizer\NormalizerInterface');
    }

    function it_normalizes_product_geolocation(GeolocationInterface $geolocation)
    {
        $geolocation->getLatitude()->willReturn(12);
        $geolocation->getLongitude()->willReturn(13);

        $this->normalize($geolocation)->shouldReturn([
            'latitude' => 12,
            'longitude' => 13,
        ]);

    }

    function it_supports_product_geolocation(GeolocationInterface $geolocation)
    {
        $this->supportsNormalization($geolocation, 'csv');
    }
}
