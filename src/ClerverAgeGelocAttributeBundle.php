<?php

/*
 * This file is part of the Geloc Attribute Bundle package.
 *
 * (c) Clever Age
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CleverAge\Bundle\GelocAttributeBundle;

use CleverAge\Bundle\GelocAttributeBundle\DependencyInjection\Compiler\RegisterTargetEntityPass;
use Oro\Bundle\EntityBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ClerverAgeGelocAttributeBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new RegisterTargetEntityPass());

        $container->addCompilerPass(DoctrineOrmMappingsPass::createYamlMappingDriver(
            array(dirname(__FILE__).'/Resources/config/doctrine/model' => 'CleverAge\Bundle\GelocAttributeBundle\Model'),
            array('doctrine.orm.entity_manager')
        ));
    }
}
