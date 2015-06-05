<?php

/*
 * This file is part of the Geoloc Attribute Bundle package.
 *
 * (c) Clever Age
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CleverAge\Bundle\GeolocAttributeBundle;

use CleverAge\Bundle\GeolocAttributeBundle\DependencyInjection\Compiler\RegisterTargetEntityPass;
use Oro\Bundle\EntityBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class CleverAgeGeolocAttributeBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new RegisterTargetEntityPass());

        $container->addCompilerPass(DoctrineOrmMappingsPass::createYamlMappingDriver(
            array($this->getPath().'/Resources/config/doctrine/model' => 'CleverAge\Bundle\GeolocAttributeBundle\Model'),
            array('doctrine.orm.entity_manager')
        ));
    }
}
