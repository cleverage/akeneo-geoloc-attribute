<?php

/*
 * This file is part of the Geoloc Attribute Bundle package.
 *
 * (c) Clever Age
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\CleverAge\Bundle\GeolocAttributeBundle\AttributeType;

use PhpSpec\ObjectBehavior;
use Pim\Bundle\CatalogBundle\Validator\ConstraintGuesserInterface;
use Prophecy\Argument;

class GeolocationTypeSpec extends ObjectBehavior
{
    function let(ConstraintGuesserInterface $constraintGuesser)
    {
        $this->beConstructedWith('var_type', 'form_type', $constraintGuesser);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('CleverAge\Bundle\GeolocAttributeBundle\AttributeType\GeolocationType');
    }

    function it_is_a_attribute()
    {
        $this->shouldHaveType('Pim\Bundle\CatalogBundle\AttributeType\AbstractAttributeType');
    }

    function it_has_a_name()
    {
        $this->getName()->shouldReturn('cleverage_attribute_geolocation');
    }
}
