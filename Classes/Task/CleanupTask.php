<?php
namespace ZECHENDORF\Easyquiz\Task;

/***************************************************************
 *
 *    Copyright notice
 *
 *    (c) 2018 Christopher Zechendorf <christopher@zechendorf.com>, ZECHENDORF
 *
 *    All rights reserved
 *
 *    This script is part of the TYPO3 project. The TYPO3 project is
 *    free software; you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation; either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    The GNU General Public License can be found at
 *    http://www.gnu.org/copyleft/gpl.html.
 *
 *    This script is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.    See the
 *    GNU General Public License for more details.
 *
 *    This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * CleanupTask
 */
class CleanupTask extends \TYPO3\CMS\Scheduler\Task\AbstractTask
{
    public function execute()
    {
        // set deleteDate to yesterday
        $deleteDate = date('U') - 60 * 60 *24;

        // delete answers
        $GLOBALS['TYPO3_DB']->sql_query('delete from tx_easyquiz_domain_model_answers where crdate < ' . $deleteDate);

        // delete quizparticipations_answers_mm
        $GLOBALS['TYPO3_DB']->sql_query('delete from tx_easyquiz_quizparticipation_answers_mm where crdate < ' . $deleteDate);

        // delete quizparticipation
        $GLOBALS['TYPO3_DB']->sql_query('delete from tx_easyquiz_domain_model_quizparticipation where crdate < ' . $deleteDate);

        return true;
    }
}
