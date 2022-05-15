<?php

namespace App\Dto\Response;

use JMS\Serializer\Annotation as Serialization;

class SumResponseDto
{
    /**
     * @Serialization\Type("float")
     */
    public float $first;

    /**
     * @Serialization\Type("float")
     */
    public float $second;

    /**
     * @Serialization\Type("float")
     */
    public float $sum;
}