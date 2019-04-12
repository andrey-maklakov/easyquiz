<?php
/** @var string $_EXTKEY */
$EM_CONF[$_EXTKEY] = [
    'title' => 'Easy Quiz',
    'description' => 'Frontend quiz, allowing for multiple questions.',
    'author' => 'Christopher Zechendorf',
    'author_email' => 'christopher@zechendorf.com',
    'category' => 'plugin',
    'state' => 'stable',
    'clearCacheOnLoad' => true,
    'version' => '9.5.0',
    'constraints' => [
        'depends' => [
            'typo3' => '^9.5',
        ],
        'conflicts' => [
        ],
        'suggests' => [],
    ],
];
