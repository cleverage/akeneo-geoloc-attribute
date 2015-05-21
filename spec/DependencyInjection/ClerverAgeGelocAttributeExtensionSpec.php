<?php

/*
 * This file is part of the Geloc Attribute Bundle package.
 *
 * (c) Clever Age
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\CleverAge\Bundle\GelocAttributeBundle\DependencyInjection;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class ClerverAgeGelocAttributeExtensionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('CleverAge\Bundle\GelocAttributeBundle\DependencyInjection\ClerverAgeGelocAttributeExtension');
    }

    public function it_is_extension()
    {
        $this->shouldHaveType('Symfony\Component\HttpKernel\DependencyInjection\Extension');
        $this->shouldImplement('Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface');
    }

    public function it_sets_up_the_configuration(ContainerBuilder $container)
    {
        $container->getParameter('kernel.bundles')->willReturn([
            'TwigBundle' => '',
        ]);

        $container->prependExtensionConfig('twig', [
            'form' => [
                'resources' => [
                    'ClerverAgeGelocAttribute::form.html.twig',
                ],
            ]
        ])->shouldBeCalled();

        $this->prepend($container);
    }
}
