<?php

/*
 * This file is part of the Geloc Attribute Bundle package.
 *
 * (c) Clever Age
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\CleverAge\Bundle\GelocAttributeBundle;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class ClerverAgeGelocAttributeBundleSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('CleverAge\Bundle\GelocAttributeBundle\ClerverAgeGelocAttributeBundle');
    }

    function it_is_a_bundle()
    {
        $this->shouldHaveType('Symfony\Component\HttpKernel\Bundle\Bundle');
    }

    function it_creates_doctrine_mapping_driver(ContainerBuilder $containerBuilder)
    {
        $containerBuilder->addCompilerPass(
            Argument::type('CleverAge\Bundle\GelocAttributeBundle\DependencyInjection\Compiler\RegisterTargetEntityPass')
        )->shouldBeCalled();

        $containerBuilder->addCompilerPass(
            Argument::type('Oro\Bundle\EntityBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass')
        )->shouldBeCalled();

        $this->build($containerBuilder);
    }
}
