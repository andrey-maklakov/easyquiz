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
 * QuizParticipation
 */
class QuizParticipation extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * session
     *
     * @var string
     */
    protected $session = '';
    
    /**
     * user
     *
     * @var int
     */
    protected $user = 0;
    
    /**
     * quiz
     *
     * @var \ZECHENDORF\Easyquiz\Domain\Model\Quiz
     * @lazy
     */
    protected $quiz = null;
    
    /**
     * answers
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ZECHENDORF\Easyquiz\Domain\Model\Answers>
     * @lazy
     */
    protected $answers = null;
    
    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }
    
    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->answers = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
    
    /**
     * Returns the session
     *
     * @return string $session
     */
    public function getSession()
    {
        return $this->session;
    }
    
    /**
     * Sets the session
     *
     * @param string $session
     * @return void
     */
    public function setSession($session)
    {
        $this->session = $session;
    }
    
    /**
     * Returns the user
     *
     * @return int $user
     */
    public function getUser()
    {
        return $this->user;
    }
    
    /**
     * Sets the user
     *
     * @param int $user
     * @return void
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
    
    /**
     * Returns the quiz
     *
     * @return \ZECHENDORF\Easyquiz\Domain\Model\Quiz $quiz
     */
    public function getQuiz()
    {
        return $this->quiz;
    }
    
    /**
     * Sets the quiz
     *
     * @param \ZECHENDORF\Easyquiz\Domain\Model\Quiz $quiz
     * @return void
     */
    public function setQuiz(\ZECHENDORF\Easyquiz\Domain\Model\Quiz $quiz)
    {
        $this->quiz = $quiz;
    }
    
    /**
     * Adds a Answers
     *
     * @param \ZECHENDORF\Easyquiz\Domain\Model\Answers $answer
     * @return void
     */
    public function addAnswer(\ZECHENDORF\Easyquiz\Domain\Model\Answers $answer)
    {
        $this->answers->attach($answer);
    }
    
    /**
     * Removes a Answers
     *
     * @param \ZECHENDORF\Easyquiz\Domain\Model\Answers $answerToRemove The Answers to be removed
     * @return void
     */
    public function removeAnswer(\ZECHENDORF\Easyquiz\Domain\Model\Answers $answerToRemove)
    {
        $this->answers->detach($answerToRemove);
    }
    
    /**
     * Returns the answers
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ZECHENDORF\Easyquiz\Domain\Model\Answers> $answers
     */
    public function getAnswers()
    {
        return $this->answers;
    }
    
    /**
     * Sets the answers
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ZECHENDORF\Easyquiz\Domain\Model\Answers> $answers
     * @return void
     */
    public function setAnswers(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $answers)
    {
        $this->answers = $answers;
    }

}