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
        /** @var ClassMetadata $classMetadata */
        $classMetadata = $eventArgs->getClassMetadata();

        if ($this->pimProductValueModel === $classMetadata->getName()) {
            $classMetadata->name = $this->productValueModel;

            $classMetadata->mapOneToOne([
                'targetEntity'  => $this->geolocationModel,
                'fieldName' => 'geolocation',
                'cascade' => ['all'],
                'joinColumn' => [
                    'referencedColumnName' => 'id',
                    'onDelete'  => 'CASCADE',
                ],
            ]);
        }
    }
}
