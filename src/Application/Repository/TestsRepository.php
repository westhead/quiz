<?php

namespace Firestorm\Application\Repository;

use Firestorm\Application\HasLoggerTrait;

/**
 * Class TestsRepository
 * @package Firestorm\Application\Repository
 */
class TestsRepository
{
    use HasLoggerTrait;

    /**
     * todo: update this to use SQL query and return results instead of mock data from json
     *
     * @return mixed
     */
    public function getTestList()
    {
        return [
            [
                'id' => 1,
                'name' => 'test 1',
            ],
            [
                'id' => 2,
                'name' => 'test 2',
            ],
            [
                'id' => 3,
                'name' => 'test 3',
            ]
        ];
    }
}
