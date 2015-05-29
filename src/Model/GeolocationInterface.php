<?php

/*
 * This file is part of the Geloc Attribute Bundle package.
 *
 * (c) Clever Age
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CleverAge\Bundle\GelocAttributeBundle\Model;

interface GeolocationInterface
{
    /**
     * @return integer
     */
    public function getId();

    /**
     * @return float
     */
    public function getLatitude();
    /**
     * @param float $latitude
     *
     * @return $this
     */
    public function setLatitude($latitude);

    /**
     * @return float
     */
    public function getLongitude();

    /**
     * @param float $longitude
     *
     * @return $this
     */
    public function setLongitude($longitude);
}
