<?php

namespace AlxDorosenco\VatlayerForLaravel\Factory;

use AlxDorosenco\VatlayerForLaravel\Factory\Prices\Price;
use AlxDorosenco\VatlayerForLaravel\Factory\Rates\Rate;
use AlxDorosenco\VatlayerForLaravel\Factory\Rates\RateList;
use AlxDorosenco\VatlayerForLaravel\Factory\Types\Types;
use AlxDorosenco\VatlayerForLaravel\Factory\Validate\Validate;

class VatlayerFactory
{
    /**
     * @return Price
     */
    public static function price(): Price
    {
        return new Price();
    }

    /**
     * @return Rate
     */
    public static function rate(): Rate
    {
        return new Rate();
    }

    /**
     * @return RateList
     */
    public static function rateList(): RateList
    {
        return new RateList();
    }

    /**
     * @return Types
     */
    public static function types(): Types
    {
        return new Types();
    }

    /**
     * @return Validate
     */
    public static function validate(): Validate
    {
        return new Validate();
    }
}
