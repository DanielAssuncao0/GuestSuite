<?php 

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="sum");
 * @ORM\Entity()
 */
class Sum
{
    /**
     * @var int
     * 
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private int $id;

    /**
     * @var float
     * 
     * @ORM\Column(name="first", type="float")
     * @Assert\NotBlank
     * @Assert\Type("\Number")
     */
    private int $first;

    /**
     * @var float
     * 
     * @ORM\Column(name="second", type="float")
     * @Assert\NotBlank
     * @Assert\Type("\Number")
     */
    private int $second;

    /**
     * @var float
     * 
     * @ORM\Column(name="sum", type="float")
     */
    private int $sum;

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirst(): float
    {
        return $this->first;
    }

    public function getSecond(): float
    {
        return $this->second;
    }

    public function getSum(): float
    {
        return $this->sum;
    }

    public function setFirst(float $first): void
    {
        $this->first = $first;
    }

    public function setSecond(float $second): void
    {
        $this->second = $second;
    }

    public function setSum(float $sum): void
    {
        $this->sum = $sum;
    }
}