<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'ZECHENDORF.' . $_EXTKEY,
    'Display',
    array(
        'Quiz' => 'display',

    ),
    // non-cacheable actions
    array(
        'Quiz' => 'display',

    )
);

// Add CleanupTask
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\ZECHENDORF\Easyquiz\Task\CleanupTask::class] = array(
        'extension' => $_EXTKEY,
        'title' => 'Cleanup',
        'description' => 'This task deletes all quizparticipations older than 24 hours.',
        'additionalFields' => ''
);
