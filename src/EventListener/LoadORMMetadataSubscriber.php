<?php

/*
 * This file is part of the Geloc Attribute Bundle package.
 *
 * (c) Clever Age
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CleverAge\Bundle\GelocAttributeBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Mapping\ClassMetadata;

class LoadORMMetadataSubscriber implements EventSubscriber
{
    /** @var string */
    private $pimProductValueModel;
    /** @var string */
    private $productValueModel;
    /** @var string */
    private $geolocationModel;

    public function __construct($pimProductValueModel, $productValueModel, $geolocationModel)
    {
        $this->pimProductValueModel = $pimProductValueModel;
        $this->productValueModel = $productValueModel;
        $this->geolocationModel = $geolocationModel;
    }

    /**
     * {@inheritdoc}
     */
    public function getSubscribedEvents()
    {
        return array(
            'loadClassMetadata',
        );
    }

    /**
     * @paramLoadClassMetadataEventArgs $eventArgs
     */
    public function loadClassMetadata(LoadClassMetadataEventArgs $eventArgs)
    {
        /** @var ClassMetadata $productValueMetadata */
        $productValueMetadata = $eventArgs->getClassMetadata();

        if ($this->productValueModel === $productValueMetadata->getName()) {
            $metadataFactory = $eventArgs->getEntityManager()->getMetadataFactory();

            $pimProductValueMetadata = $metadataFactory->getMetadataFor('Pim\Bundle\CatalogBundle\Model\ProductValue');

            if (false === $pimProductValueMetadata->isMappedSuperclass) {
                $productValueMetadata = clone $pimProductValueMetadata;
                $productValueMetadata->mapOneToOne([
                    'targetEntity'  => $this->geolocationModel,
                    'fieldName' => 'geolocation',
                    'cascade' => ['all'],
                    'joinColumn' => [
                        'referencedColumnName' => 'id',
                        'onDelete'  => 'CASCADE',
                    ],
                ]);

                $metadataFactory->setMetadataFor($this->productValueModel, $productValueMetadata);
            }

            $pimProductValueMetadata->isMappedSuperclass = true;
        }
    }
}
