<?php

namespace BaseballBundle\DataFixtures\ODM;

use Hautelook\AliceBundle\Doctrine\DataFixtures\AbstractLoader;
use Hautelook\AliceBundle\Doctrine\DataFixtures\LoaderInterface;

class BaseballFixturesLoader extends AbstractLoader implements LoaderInterface
{
    /**
     * @return array
     */
    public function getFixtures()
    {
        return [
            __DIR__.'/schedule.yml',
        ];
    }
}
