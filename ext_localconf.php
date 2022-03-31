<?php

use Slub\SlubProfileBooked\Controller\BookedController;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') || die();

// Add tsconfig page
ExtensionManagementUtility::addPageTSConfig(
    '@import "EXT:slub_profile_booked/Configuration/TsConfig/Page.tsconfig"'
);

// Configure plugin - booked list
ExtensionUtility::configurePlugin(
    'SlubProfileBooked',
    'BookedList',
    [
        BookedController::class => 'list'
    ],
    [
        BookedController::class => 'list'
    ],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);
