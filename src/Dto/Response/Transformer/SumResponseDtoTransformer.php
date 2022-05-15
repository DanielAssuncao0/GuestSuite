<?php 

namespace App\Dto\Response\Transformer;

use App\Dto\Response\SumResponseDto;
use App\Entity\Sum;

class SumResponseDtoTransformer extends AbstractResponseDtoTransformer
{
    /**
     * @param Sum $sum
     * 
     * @return SumResponseDto
     */
    public function transformFromObject($sum) : SumResponseDto
    {
        $dto = new SumResponseDto();
        if($sum instanceof Sum) {
            $dto->first = $sum->getFirst();
            $dto->second = $sum->getSecond();
            $dto->sum = $sum->getSum();
        }

        return $dto;
    }
}