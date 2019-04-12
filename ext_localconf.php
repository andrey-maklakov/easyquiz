<?php
defined('TYPO3_MODE') or die();

/** @var string $_EXTKEY */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'ZECHENDORF.' . $_EXTKEY,
    'Display',
    ['Quiz' => 'display'],
    // non-cacheable actions
    ['Quiz' => 'display']
);

// Add CleanupTask
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\ZECHENDORF\Easyquiz\Task\CleanupTask::class] = [
    'extension' => $_EXTKEY,
    'title' => 'Cleanup',
    'description' => 'This task deletes all quizparticipations older than 24 hours.',
    'additionalFields' => ''
];
