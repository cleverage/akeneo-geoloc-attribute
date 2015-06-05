<?php

/*
 * This file is part of the Geoloc Attribute Bundle package.
 *
 * (c) Clever Age
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\CleverAge\Bundle\GeolocAttributeBundle;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class CleverAgeGeolocAttributeBundleSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('CleverAge\Bundle\GeolocAttributeBundle\CleverAgeGeolocAttributeBundle');
    }

    function it_is_a_bundle()
    {
        $this->shouldHaveType('Symfony\Component\HttpKernel\Bundle\Bundle');
    }

    function it_creates_doctrine_mapping_driver(ContainerBuilder $containerBuilder)
    {
        $containerBuilder->addCompilerPass(
            Argument::type('CleverAge\Bundle\GeolocAttributeBundle\DependencyInjection\Compiler\RegisterTargetEntityPass')
        )->shouldBeCalled();

        $containerBuilder->addCompilerPass(
            Argument::type('Oro\Bundle\EntityBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass')
        )->shouldBeCalled();

        $this->build($containerBuilder);
    }
}
