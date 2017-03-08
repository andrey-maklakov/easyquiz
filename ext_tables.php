<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'ZECHENDORF.' . $_EXTKEY,
	'Display',
	'Display Quiz'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Easy Quiz');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_easyquiz_domain_model_quiz', 'EXT:easyquiz/Resources/Private/Language/locallang_csh_tx_easyquiz_domain_model_quiz.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_easyquiz_domain_model_quiz');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_easyquiz_domain_model_questions', 'EXT:easyquiz/Resources/Private/Language/locallang_csh_tx_easyquiz_domain_model_questions.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_easyquiz_domain_model_questions');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_easyquiz_domain_model_answers', 'EXT:easyquiz/Resources/Private/Language/locallang_csh_tx_easyquiz_domain_model_answers.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_easyquiz_domain_model_answers');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_easyquiz_domain_model_result', 'EXT:easyquiz/Resources/Private/Language/locallang_csh_tx_easyquiz_domain_model_result.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_easyquiz_domain_model_result');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_easyquiz_domain_model_quizparticipation', 'EXT:easyquiz/Resources/Private/Language/locallang_csh_tx_easyquiz_domain_model_quizparticipation.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_easyquiz_domain_model_quizparticipation');
