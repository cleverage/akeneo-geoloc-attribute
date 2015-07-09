<?php

namespace spec\CleverAge\Bundle\GeolocAttributeBundle\Updater;

use PhpSpec\ObjectBehavior;
use Pim\Bundle\CatalogBundle\Builder\ProductBuilderInterface;
use Pim\Bundle\CatalogBundle\Model\AttributeInterface;
use Pim\Bundle\CatalogBundle\Model\ProductInterface;
use Pim\Bundle\CatalogBundle\Model\ProductValueInterface;
use Pim\Bundle\CatalogBundle\Validator\AttributeValidatorHelper;
use Prophecy\Argument;

class GeolocationSetterSpec extends ObjectBehavior
{
    function let(
        ProductBuilderInterface $productBuilder,
        AttributeValidatorHelper $attrValidatorHelper
    ) {
        $this->beConstructedWith($productBuilder, $attrValidatorHelper);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('CleverAge\Bundle\GeolocAttributeBundle\Updater\GeolocationSetter');
    }

    function it_is_a_setter()
    {
        $this->shouldHaveType('Pim\Bundle\CatalogBundle\Updater\Setter\AbstractValueSetter');
    }

    function it_sets_geolocation_to_product_value(
        ProductInterface $product,
        AttributeInterface $attribute,
        ProductValueInterface $value
    ) {
        $attribute->getCode()->shouldBeCalled()->willReturn('geolocation');
        $product->getValue('geolocation', 'FR', 'master')->shouldBeCalled()->willReturn($value);

        $value->setData(
            Argument::type('CleverAge\Bundle\GeolocAttributeBundle\Model\Geolocation')
        )->shouldBeCalled();

        $this->setValue([$product], $attribute, ['latitude' => 12, 'longitude' => 12], 'FR', 'master');
    }

    function it_creates_and_sets_geolocation_to_product_value(
        $productBuilder,
        ProductInterface $product,
        AttributeInterface $attribute,
        ProductValueInterface $value
    ) {
        $attribute->getCode()->shouldBeCalled()->willReturn('geolocation');
        $product->getValue('geolocation', 'FR', 'master')->shouldBeCalled()->willReturn(null);

        $productBuilder->addProductValue($product, $attribute, 'FR', 'master')
            ->shouldBeCalled()
            ->willReturn($value);

        $value->setData(
            Argument::type('CleverAge\Bundle\GeolocAttributeBundle\Model\Geolocation')
        )->shouldBeCalled();

        $this->setValue([$product], $attribute, ['latitude' => 12, 'longitude' => 12], 'FR', 'master');
    }
}
