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
