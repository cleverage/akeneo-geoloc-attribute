<?php

namespace spec\CleverAge\Bundle\GeolocAttributeBundle\Model;

use CleverAge\Bundle\GeolocAttributeBundle\Model\Geolocation;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductValueSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('CleverAge\Bundle\GeolocAttributeBundle\Model\ProductValue');
    }

    function it_is_a_product_value()
    {
        $this->shouldHaveType('Pim\Bundle\CatalogBundle\Model\AbstractProductValue');
    }

    function it_has_not_geolocation_by_default()
    {
        $this->getGeolocation()->shouldReturn(null);
    }

    function its_geolocation_is_mutable(Geolocation $productGeolocation)
    {
        $this->setGeolocation($productGeolocation)->shouldReturn($this);
        $this->getGeolocation()->shouldReturn($productGeolocation);
    }
}
