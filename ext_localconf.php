<?php

if (!defined ('TYPO3_MODE')) {
	die('Access denied.');
}


// hook to call after the DB is available
$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_fe.php']['connectToDB']['tx_realurlconfigurationfordomains'] = 'B13\\Realurlconfigurationfordomains\\Hooks\\FrontendHooks->addDynamicDomainConfigurations';
