<?php
defined('TYPO3_MODE') or die();

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

if (TYPO3_MODE === 'BE') {
    /** @var \TYPO3\CMS\Core\Imaging\IconRegistry $iconRegistry */
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);

    $iconRegistry->registerIcon(
        'easyquiz-answers',
        \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
        ['source' => 'EXT:easyquiz/Resources/Public/Icons/tx_easyquiz_domain_model_answers.gif']
    );

    $iconRegistry->registerIcon(
        'easyquiz-questions',
        \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
        ['source' => 'EXT:easyquiz/Resources/Public/Icons/tx_easyquiz_domain_model_questions.gif']
    );

    $iconRegistry->registerIcon(
        'easyquiz-quiz',
        \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
        ['source' => 'EXT:easyquiz/Resources/Public/Icons/tx_easyquiz_domain_model_quiz.gif']
    );

    $iconRegistry->registerIcon(
        'easyquiz-quizparticipation',
        \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
        ['source' => 'EXT:easyquiz/Resources/Public/Icons/tx_easyquiz_domain_model_quizparticipation.gif']
    );

    $iconRegistry->registerIcon(
        'easyquiz-result',
        \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
        ['source' => 'EXT:easyquiz/Resources/Public/Icons/tx_easyquiz_domain_model_result.gif']
    );

    unset($iconRegistry);
}
