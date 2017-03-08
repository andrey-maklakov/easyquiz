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
 * Result
 */
class Result extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * minPoints
     *
     * @var int
     */
    protected $minPoints = 0;
    
    /**
     * maxPoints
     *
     * @var int
     */
    protected $maxPoints = 0;
    
    /**
     * page
     *
     * @var int
     */
    protected $page = 0;
    
    /**
     * Returns the minPoints
     *
     * @return int $minPoints
     */
    public function getMinPoints()
    {
        return $this->minPoints;
    }
    
    /**
     * Sets the minPoints
     *
     * @param string $minPoints
     * @return void
     */
    public function setMinPoints($minPoints)
    {
        $this->minPoints = $minPoints;
    }
    
    /**
     * Returns the maxPoints
     *
     * @return int $maxPoints
     */
    public function getMaxPoints()
    {
        return $this->maxPoints;
    }
    
    /**
     * Sets the maxPoints
     *
     * @param string $maxPoints
     * @return void
     */
    public function setMaxPoints($maxPoints)
    {
        $this->maxPoints = $maxPoints;
    }
    
    /**
     * Returns the page
     *
     * @return int $page
     */
    public function getPage()
    {
        return $this->page;
    }
    
    /**
     * Sets the page
     *
     * @param int $page
     * @return void
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

}