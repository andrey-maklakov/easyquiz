<?php
namespace ZECHENDORF\Easyquiz\Domain\Model;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * QuizParticipation
 */
class QuizParticipation extends AbstractEntity
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
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $quiz = null;
    
    /**
     * answers
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ZECHENDORF\Easyquiz\Domain\Model\Answers>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
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
        $this->answers = GeneralUtility::makeInstance(ObjectStorage::class);
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