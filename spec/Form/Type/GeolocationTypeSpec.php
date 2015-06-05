<?php

/*
 * This file is part of the Geoloc Attribute Bundle package.
 *
 * (c) Clever Age
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\CleverAge\Bundle\GeolocAttributeBundle\Form\Type;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GeolocationTypeSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('CleverAge\Bundle\GeolocAttributeBundle\Model\Geolocation');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('CleverAge\Bundle\GeolocAttributeBundle\Form\Type\GeolocationType');
    }

    function it_is_form()
    {
        $this->shouldHaveType('Symfony\Component\Form\AbstractType');
    }

    function it_has_name()
    {
        $this->getName()->shouldReturn('cleverage_form_geolocation');
    }

    function it_has_option(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            ['data_class' => 'CleverAge\Bundle\GeolocAttributeBundle\Model\Geolocation']
        )->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }

    function it_builds_a_form(FormBuilderInterface $builder)
    {
        $builder->add('latitude', 'text', Argument::type('array'))->shouldBeCalled()->willReturn($builder);
        $builder->add('longitude', 'text', Argument::type('array'))->shouldBeCalled()->willReturn($builder);

        $this->buildForm($builder);
    }
}
