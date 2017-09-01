<?php
namespace ZECHENDORF\Easyquiz\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2017 Christopher Zechendorf <christopher@zechendorf.com>, ZECHENDORF
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Answers
 */
class Answers extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * questions
     *
     * @var \ZECHENDORF\Easyquiz\Domain\Model\Questions
     */
    protected $questions = '';

    /**
     * answer
     *
     * @var string
     */
    protected $answer = '';

    /**
     * points
     *
     * @var int
     */
    protected $points = 0;

    /**
     * Returns the questions
     *
     * @return \ZECHENDORF\Easyquiz\Domain\Model\Questions $questions
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Sets the questions
     *
     * @param \ZECHENDORF\Easyquiz\Domain\Model\Questions $questions
     * @return void
     */
    public function setQuestions($questions)
    {
        $this->questions = $questions;
    }

    /**
     * Returns the answer
     *
     * @return string $answer
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Sets the answer
     *
     * @param string $answer
     * @return void
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
    }

    /**
     * Returns the points
     *
     * @return int $points
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Sets the points
     *
     * @param string $points
     * @return void
     */
    public function setPoints($points)
    {
        $this->points = $points;
    }

}
