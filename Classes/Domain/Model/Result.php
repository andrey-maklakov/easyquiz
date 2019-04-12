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
 * Result
 */
class Result extends AbstractEntity
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