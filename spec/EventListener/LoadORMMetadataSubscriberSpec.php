<?php

/*
 * This file is part of the Geloc Attribute Bundle package.
 *
 * (c) Clever Age
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\CleverAge\Bundle\GelocAttributeBundle\EventListener;

use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Mapping\ClassMetadataFactory;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LoadORMMetadataSubscriberSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(
            'Pim\Bundle\CatalogBundle\Model\ProductValue',
            'CleverAge\Bundle\GelocAttributeBundle\Model\ProductValue',
            'CleverAge\Bundle\GelocAttributeBundle\Model\Geolocation'
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('CleverAge\Bundle\GelocAttributeBundle\EventListener\LoadORMMetadataSubscriber');
    }

    function it_is_a_subscriber()
    {
        $this->shouldImplement('Doctrine\Common\EventSubscriber');
    }

    function it_subscribes_event()
    {
        $this::getSubscribedEvents()->shouldReturn(array(
            'loadClassMetadata'
        ));
    }

    function it_add_geolocation_to_product_value(
        LoadClassMetadataEventArgs $eventArgs,
        ClassMetadata $classMetadata,
        ObjectManager $objectManager,
        ClassMetadataFactory $classMetadataFactory
    ) {
        $eventArgs->getClassMetadata()->willReturn($classMetadata);
        $eventArgs->getEntityManager()->willReturn($objectManager);
        $objectManager->getMetadataFactory()->willReturn($classMetadataFactory);

        $classMetadata->fieldMappings = ['id' => ['columnName' => 'id']];
        $classMetadata->getName()->willReturn('Pim\Bundle\CatalogBundle\Model\ProductValue');

        $classMetadata->mapOneToOne([
            'targetEntity'  => 'CleverAge\Bundle\GelocAttributeBundle\Model\Geolocation',
            'fieldName' => 'geolocation',
            'cascade' => ['all'],
            'joinColumn' => [
                'referencedColumnName'  => 'id',
                'onDelete'  => 'CASCADE',
            ]
        ])->shouldBeCalled();

        $classMetadataFactory->setMetadataFor(
            'CleverAge\Bundle\GelocAttributeBundle\Model\ProductValue',
            $classMetadata
        )->shouldBeCalled();

        $this->loadClassMetadata($eventArgs);
    }
}
