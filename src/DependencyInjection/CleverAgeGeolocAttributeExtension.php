<?php

/*
 * This file is part of the Geoloc Attribute Bundle package.
 *
 * (c) Clever Age
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CleverAge\Bundle\GeolocAttributeBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class CleverAgeGeolocAttributeExtension extends Extension implements PrependExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(array $config, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config/service'));
        $loader->load('attribute.yml');
        $loader->load('model.yml');
    }

    /**
     * {@inheritDoc}
     */
    public function prepend(ContainerBuilder $container)
    {
        $bundles = $container->getParameter('kernel.bundles');

        if (isset($bundles['TwigBundle'])) {
            $container->prependExtensionConfig('twig', [
                'form' => [
                    'resources' => [
                        'CleverAgeGeolocAttributeBundle::form.html.twig',
                    ],
                ],
            ]);
        }
    }
}
