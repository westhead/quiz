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
        return json_decode(file_get_contents('../../../data/tests.json'));
    }
}
