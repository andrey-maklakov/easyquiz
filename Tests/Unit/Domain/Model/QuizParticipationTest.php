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
 * Test case for class \ZECHENDORF\Easyquiz\Domain\Model\QuizParticipation.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Christopher Zechendorf <christopher@zechendorf.com>
 */
class QuizParticipationTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \ZECHENDORF\Easyquiz\Domain\Model\QuizParticipation
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \ZECHENDORF\Easyquiz\Domain\Model\QuizParticipation();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getSessionReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getSession()
		);
	}

	/**
	 * @test
	 */
	public function setSessionForStringSetsSession()
	{
		$this->subject->setSession('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'session',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getUserReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setUserForIntSetsUser()
	{	}

	/**
	 * @test
	 */
	public function getQuizReturnsInitialValueForQuiz()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getQuiz()
		);
	}

	/**
	 * @test
	 */
	public function setQuizForQuizSetsQuiz()
	{
		$quizFixture = new \ZECHENDORF\Easyquiz\Domain\Model\Quiz();
		$this->subject->setQuiz($quizFixture);

		$this->assertAttributeEquals(
			$quizFixture,
			'quiz',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAnswersReturnsInitialValueForAnswers()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getAnswers()
		);
	}

	/**
	 * @test
	 */
	public function setAnswersForObjectStorageContainingAnswersSetsAnswers()
	{
		$answer = new \ZECHENDORF\Easyquiz\Domain\Model\Answers();
		$objectStorageHoldingExactlyOneAnswers = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneAnswers->attach($answer);
		$this->subject->setAnswers($objectStorageHoldingExactlyOneAnswers);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneAnswers,
			'answers',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addAnswerToObjectStorageHoldingAnswers()
	{
		$answer = new \ZECHENDORF\Easyquiz\Domain\Model\Answers();
		$answersObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$answersObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($answer));
		$this->inject($this->subject, 'answers', $answersObjectStorageMock);

		$this->subject->addAnswer($answer);
	}

	/**
	 * @test
	 */
	public function removeAnswerFromObjectStorageHoldingAnswers()
	{
		$answer = new \ZECHENDORF\Easyquiz\Domain\Model\Answers();
		$answersObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$answersObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($answer));
		$this->inject($this->subject, 'answers', $answersObjectStorageMock);

		$this->subject->removeAnswer($answer);

	}
}
