<?php

namespace Firestorm\Application\Repository;

/**
 * Class TestQuestionsRepository
 * @package Firestorm\Application\Repository
 */
class TestQuestionsRepository
{
    /** @var \PDO $dbConn */
    protected $dbConn;

    /**
     * TestQuestionsRepository constructor.
     */
    public function __construct()
    {
        /** this would normally be passed by the Service Manager, new connection for brevity */
//        $this->dbConn = new PDO('mysql:host=localhost;dbname=test', $testuser, $testpass);
    }

    /**
     * This will return a result set of the options for the next question
     *
     * @param $lastQuestionID
     * @return array
     */
    public function getNextQuestion($lastQuestionID)
    {
        /** for brevity, we will return the same data each request */
        return [
            'question' => "What is your favourite colour?",
            'answerChoices' =>
            [
                '1' => 'red',
                '2' => 'green',
                '3' => 'blue',
                '4' => 'yellow',
            ]
        ];

        // below are
        /** @var array $question - ideally this would be mapped to a Question Entity, array used for brevity. */
        $question = $this->dbConn
            ->query("SELECT * FROM `testQuestions` as tq WHERE `tq`.`quesrionID` = $lastQuestionID")->fetch();

        /**
         * This would mast often be built with a framework query such as Zend Select so that it can be easily tested.
         * NB: raw SQL used for brevity
         *
         * Fetch the question which has a higher sequence than the last question and retrieve all options,
         */
        $sql = <<<SQL
SELECT * FROM `testQuestions` as tq
INNER JOIN `testQuestionOptions` as tqs USING(`questionID`) 
WHERE `tq`.`testID` = {$question['questionID']} AND `tq`.`sequence` > {$question['sequence']}
ORDER BY `tq`.`sequence` ASC
SQL;

        /** @var array[] $results */
        $results = $this->dbConn->query($sql)->fetchAll();

        /** Ideally this would have been an array of mapped objects but for brevity we return result array */
        return $results;
    }

}
