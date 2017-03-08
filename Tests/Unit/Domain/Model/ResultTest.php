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
 * Test case for class \ZECHENDORF\Easyquiz\Domain\Model\Result.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Christopher Zechendorf <christopher@zechendorf.com>
 */
class ResultTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \ZECHENDORF\Easyquiz\Domain\Model\Result
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \ZECHENDORF\Easyquiz\Domain\Model\Result();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getMinPointsReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setMinPointsForIntSetsMinPoints()
	{	}

	/**
	 * @test
	 */
	public function getMaxPointsReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setMaxPointsForIntSetsMaxPoints()
	{	}

	/**
	 * @test
	 */
	public function getPageReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setPageForIntSetsPage()
	{	}
}
