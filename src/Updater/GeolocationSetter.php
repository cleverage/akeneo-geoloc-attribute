<?php

namespace CleverAge\Bundle\GeolocAttributeBundle\Updater;

use CleverAge\Bundle\GeolocAttributeBundle\Model\Geolocation;
use Pim\Bundle\CatalogBundle\Model\AttributeInterface;
use Pim\Bundle\CatalogBundle\Model\ProductInterface;
use Pim\Bundle\CatalogBundle\Model\ProductValue;
use Pim\Bundle\CatalogBundle\Updater\Setter\AbstractValueSetter;

class GeolocationSetter extends AbstractValueSetter
{
    /** @var array */
    protected $supportedTypes = ['cleverage_attribute_geolocation'];

    /**
     * {@inheritdoc}
     */
    public function setValue(array $products, AttributeInterface $attribute, $data, $locale = null, $scope = null)
    {
        foreach ($products as $product) {
            $this->setGelocation($attribute, $product, $data, $locale, $scope);
        }
    }

    /**
     * @param AttributeInterface $attribute
     * @param ProductInterface   $product
     * @param array              $data
     * @param string|null        $locale
     * @param string|null        $scope
     */
    protected function setGelocation(AttributeInterface $attribute, $product, $data, $locale, $scope)
    {
        /** @var ProductValue $value */
        $value = $product->getValue($attribute->getCode(), $locale, $scope);

        if (null === $value) {
            $value = $this->productBuilder->addProductValue($product, $attribute, $locale, $scope);
        }

        $productGeolocation = new Geolocation();
        $productGeolocation->setLatitude($data['latitude']);
        $productGeolocation->setLongitude($data['longitude']);

        $value->setData($productGeolocation);
    }
}
