<?php

if (!defined ('TYPO3_MODE')) {
	die('Access denied.');
}

// add new fields to sys_domain
\TYPO3\CMS\Core\Utility\GeneralUtility::loadTCA('sys_domain');
$TCA['sys_domain']['columns'] += array(
	'tx_realurlconfigurationfordomains_useconfig' => array(
		'label' => 'LLL:EXT:realurlconfigurationfordomains/Resources/Private/Language/db.xml:sys_domain.tx_realurlconfigurationfordomains_useconfig',
		'exclude' => 1,
		'config' => array(
			'type' => 'select',
			'size' => 1,
			'minitems' => 0,
			'maxitems' => 1,
			'items' => array(
			),
			'itemsProcFunc' => 'B13\\Realurlconfigurationfordomains\\Utility\\ConfigurationUtility->addExistingRealurlConfigurationsForFormEngine'
		)
	)
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('sys_domain', 'tx_realurlconfigurationfordomains_useconfig', '', 'after:forced');
