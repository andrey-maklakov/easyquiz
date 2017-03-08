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
 * Questions
 */
class Questions extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     *
     * @var string
     */
    protected $title = '';
    
    /**
     * question
     *
     * @var string
     */
    protected $question = '';
    
    /**
     * explanation
     *
     * @var string
     */
    protected $explanation = '';
    
    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $image = null;
    
    /**
     * multipleAnswers
     *
     * @var bool
     */
    protected $multipleAnswers = false;
    
    /**
     * answers
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ZECHENDORF\Easyquiz\Domain\Model\Answers>
     * @cascade remove
     * @lazy
     */
    protected $answers = null;
    
    /**
     * Returns the question
     *
     * @return string $question
     */
    public function getQuestion()
    {
        return $this->question;
    }
    
    /**
     * Sets the question
     *
     * @param string $question
     * @return void
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }
    
    /**
     * Returns the explanation
     *
     * @return string $explanation
     */
    public function getExplanation()
    {
        return $this->explanation;
    }
    
    /**
     * Sets the explanation
     *
     * @param string $explanation
     * @return void
     */
    public function setExplanation($explanation)
    {
        $this->explanation = $explanation;
    }
    
    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function getImage()
    {
        return $this->image;
    }
    
    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
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
        $this->answers = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
    
    /**
     * Returns the multipleAnswers
     *
     * @return bool $multipleAnswers
     */
    public function getMultipleAnswers()
    {
        return $this->multipleAnswers;
    }
    
    /**
     * Sets the multipleAnswers
     *
     * @param bool $multipleAnswers
     * @return void
     */
    public function setMultipleAnswers($multipleAnswers)
    {
        $this->multipleAnswers = $multipleAnswers;
    }
    
    /**
     * Returns the boolean state of multipleAnswers
     *
     * @return bool
     */
    public function isMultipleAnswers()
    {
        return $this->multipleAnswers;
    }
    
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

}