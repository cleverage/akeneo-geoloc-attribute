<?php

namespace CleverAge\Bundle\GelocAttributeBundle\Model;

use Pim\Bundle\CatalogBundle\Model\AbstractProductValue as BaseProductValue;

class ProductValue extends BaseProductValue
{
    /**
     * @var Geolocation
     */
    private $geolocation;

    /**
     * @return Geolocation
     */
    public function getGeolocation()
    {
        return $this->geolocation;
    }

    /**
     * @param Geolocation $geolocation
     *
     * @return $this
     */
    public function setGeolocation(Geolocation $geolocation)
    {
        $this->geolocation = $geolocation;

        return $this;
    }
}
