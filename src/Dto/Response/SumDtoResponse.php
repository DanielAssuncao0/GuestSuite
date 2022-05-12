<?php 

namespace App\Dto\Response;

use JMS\Serializer\Annotation as Serialization;

class SumDtoResponse
{
    /**
     * @Serialization\Type("float")
     */
    public float $first;

    /**
     * @Serialization\Type("float")
     */
    public float $second;
}