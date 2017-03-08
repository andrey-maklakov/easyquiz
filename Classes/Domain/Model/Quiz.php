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
 * Quiz
 */
class Quiz extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     *
     * @var string
     */
    protected $title = '';
    
    /**
     * questions
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ZECHENDORF\Easyquiz\Domain\Model\Questions>
     * @cascade remove
     * @lazy
     */
    protected $questions = null;
    
    /**
     * results
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ZECHENDORF\Easyquiz\Domain\Model\Result>
     * @cascade remove
     * @lazy
     */
    protected $results = null;
    
    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
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
        $this->questions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->results = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
    
    /**
     * Adds a Questions
     *
     * @param \ZECHENDORF\Easyquiz\Domain\Model\Questions $question
     * @return void
     */
    public function addQuestion(\ZECHENDORF\Easyquiz\Domain\Model\Questions $question)
    {
        $this->questions->attach($question);
    }
    
    /**
     * Removes a Questions
     *
     * @param \ZECHENDORF\Easyquiz\Domain\Model\Questions $questionToRemove The Questions to be removed
     * @return void
     */
    public function removeQuestion(\ZECHENDORF\Easyquiz\Domain\Model\Questions $questionToRemove)
    {
        $this->questions->detach($questionToRemove);
    }
    
    /**
     * Returns the questions
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ZECHENDORF\Easyquiz\Domain\Model\Questions> $questions
     */
    public function getQuestions()
    {
        return $this->questions;
    }
    
    /**
     * Sets the questions
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ZECHENDORF\Easyquiz\Domain\Model\Questions> $questions
     * @return void
     */
    public function setQuestions(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $questions)
    {
        $this->questions = $questions;
    }
    
    /**
     * Adds a Result
     *
     * @param \ZECHENDORF\Easyquiz\Domain\Model\Result $result
     * @return void
     */
    public function addResult(\ZECHENDORF\Easyquiz\Domain\Model\Result $result)
    {
        $this->results->attach($result);
    }
    
    /**
     * Removes a Result
     *
     * @param \ZECHENDORF\Easyquiz\Domain\Model\Result $resultToRemove The Result to be removed
     * @return void
     */
    public function removeResult(\ZECHENDORF\Easyquiz\Domain\Model\Result $resultToRemove)
    {
        $this->results->detach($resultToRemove);
    }
    
    /**
     * Returns the results
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ZECHENDORF\Easyquiz\Domain\Model\Result> $results
     */
    public function getResults()
    {
        return $this->results;
    }
    
    /**
     * Sets the results
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ZECHENDORF\Easyquiz\Domain\Model\Result> $results
     * @return void
     */
    public function setResults(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $results)
    {
        $this->results = $results;
    }

}