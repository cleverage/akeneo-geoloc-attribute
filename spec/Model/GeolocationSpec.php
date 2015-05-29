<?php

/*
 * This file is part of the Geloc Attribute Bundle package.
 *
 * (c) Clever Age
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\CleverAge\Bundle\GelocAttributeBundle\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GeolocationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('CleverAge\Bundle\GelocAttributeBundle\Model\Geolocation');
        $this->shouldImplement('CleverAge\Bundle\GelocAttributeBundle\Model\GeolocationInterface');
    }

    function it_has_id_default()
    {
        $this->getId()->shouldReturn(null);
    }

    function it_has_not_latitude_default()
    {
        $this->getLatitude()->shouldReturn(null);
    }

    function its_latitude_is_mutable()
    {
        $this->setLatitude(12.1234568)->shouldReturn($this);
        $this->getLatitude()->shouldReturn(12.1234568);
    }

    function it_has_not_longitude_default()
    {
        $this->getLongitude()->shouldReturn(null);
    }

    function its_longitude_is_mutable()
    {
        $this->setLongitude(12.1234568)->shouldReturn($this);
        $this->getLongitude()->shouldReturn(12.1234568);
    }
}
