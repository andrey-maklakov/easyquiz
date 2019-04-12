<?php
namespace ZECHENDORF\Easyquiz\Task;

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

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Scheduler\Task\AbstractTask;

/**
 * CleanupTask
 */
class CleanupTask extends AbstractTask
{
    /**
     * @return bool
     */
    public function execute()
    {
        // set deleteDate to yesterday
        $deleteDate = date('U') - 60 * 60 *24;

        // delete answers
        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_easyquiz_domain_model_answers');

        $queryBuilder
            ->delete('tx_easyquiz_domain_model_answers')
            ->where(
                $queryBuilder->expr()->eq('crdate', $queryBuilder->createNamedParameter($deleteDate, \PDO::PARAM_INT))
            )
            ->execute();


        // delete quizparticipations_answers_mm
        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_easyquiz_quizparticipation_answers_mm');

        $queryBuilder
            ->delete('tx_easyquiz_quizparticipation_answers_mm')
            ->where(
                $queryBuilder->expr()->lt('crdate', $queryBuilder->createNamedParameter($deleteDate, \PDO::PARAM_INT))
            )
            ->execute();


        // delete quizparticipation
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_easyquiz_domain_model_quizparticipation');

        $queryBuilder
            ->delete('tx_easyquiz_domain_model_quizparticipation')
            ->where(
                $queryBuilder->expr()->lt('crdate', $queryBuilder->createNamedParameter($deleteDate, \PDO::PARAM_INT))
            )
            ->execute();

        return true;
    }
}
