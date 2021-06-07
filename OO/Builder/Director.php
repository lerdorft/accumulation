<?php


namespace Builder;

/**
 * 导演角色
 *
 * Class Director
 * @package Builder
 */
class Director
{
    /**
     * 建造
     *
     * @param BuilderInterface $builder
     * @return BuilderInterface
     */
    public function build(BuilderInterface $builder)
    {
        return $builder->createVehicle()
            ->addWheel()
            ->addEngine()
            ->addDoor()
            ->getVehicle();
    }
}