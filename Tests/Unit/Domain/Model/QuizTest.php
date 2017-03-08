<?php

namespace ZECHENDORF\Easyquiz\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Christopher Zechendorf <christopher@zechendorf.com>, ZECHENDORF
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \ZECHENDORF\Easyquiz\Domain\Model\Quiz.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Christopher Zechendorf <christopher@zechendorf.com>
 */
class QuizTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \ZECHENDORF\Easyquiz\Domain\Model\Quiz
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \ZECHENDORF\Easyquiz\Domain\Model\Quiz();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle()
	{
		$this->subject->setTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'title',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getQuestionsReturnsInitialValueForQuestions()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getQuestions()
		);
	}

	/**
	 * @test
	 */
	public function setQuestionsForObjectStorageContainingQuestionsSetsQuestions()
	{
		$question = new \ZECHENDORF\Easyquiz\Domain\Model\Questions();
		$objectStorageHoldingExactlyOneQuestions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneQuestions->attach($question);
		$this->subject->setQuestions($objectStorageHoldingExactlyOneQuestions);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneQuestions,
			'questions',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addQuestionToObjectStorageHoldingQuestions()
	{
		$question = new \ZECHENDORF\Easyquiz\Domain\Model\Questions();
		$questionsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$questionsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($question));
		$this->inject($this->subject, 'questions', $questionsObjectStorageMock);

		$this->subject->addQuestion($question);
	}

	/**
	 * @test
	 */
	public function removeQuestionFromObjectStorageHoldingQuestions()
	{
		$question = new \ZECHENDORF\Easyquiz\Domain\Model\Questions();
		$questionsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$questionsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($question));
		$this->inject($this->subject, 'questions', $questionsObjectStorageMock);

		$this->subject->removeQuestion($question);

	}

	/**
	 * @test
	 */
	public function getResultsReturnsInitialValueForResult()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getResults()
		);
	}

	/**
	 * @test
	 */
	public function setResultsForObjectStorageContainingResultSetsResults()
	{
		$result = new \ZECHENDORF\Easyquiz\Domain\Model\Result();
		$objectStorageHoldingExactlyOneResults = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneResults->attach($result);
		$this->subject->setResults($objectStorageHoldingExactlyOneResults);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneResults,
			'results',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addResultToObjectStorageHoldingResults()
	{
		$result = new \ZECHENDORF\Easyquiz\Domain\Model\Result();
		$resultsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$resultsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($result));
		$this->inject($this->subject, 'results', $resultsObjectStorageMock);

		$this->subject->addResult($result);
	}

	/**
	 * @test
	 */
	public function removeResultFromObjectStorageHoldingResults()
	{
		$result = new \ZECHENDORF\Easyquiz\Domain\Model\Result();
		$resultsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$resultsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($result));
		$this->inject($this->subject, 'results', $resultsObjectStorageMock);

		$this->subject->removeResult($result);

	}
}
