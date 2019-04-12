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

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Questions
 */
class Questions extends AbstractEntity
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
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
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