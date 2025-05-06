<?php

defined('TYPO3') || die();

// Add static typoscript
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'slub_profile_booked',
    'Configuration/TypoScript/',
    'SLUB profile booked'
);
