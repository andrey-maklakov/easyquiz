<?php
defined('TYPO3_MODE') or die();

call_user_func(function () {
    $_EXTKEY = 'easyquiz';

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'ZECHENDORF.' . $_EXTKEY,
        'Display',
        'Display Quiz'
    );

    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['easyquiz_display'] = 'pi_flexform';
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('easyquiz_display', 'FILE:EXT:easyquiz/Configuration/FlexForms/Display.xml');
});