<?php

########################################################################
# Extension Manager/Repository config file for ext "seo_basics".
#
# Auto generated 03-07-2012 11:27
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'RealURL Configuration for Domains',
	'description' => 'Introduces a separate field for sys_domain records to choose an existing RealURL configuration for a domain. Useful if you have lots of domains and you do not want to modify your realurl configuration all the time.',
	'category' => 'misc',
	'shy' => 0,
	'version' => '1.0.0',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'beta',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => 'sys_domain',
	'clearcacheonload' => 1,
	'lockType' => '',
	'author' => 'Benjamin Mack',
	'author_email' => 'benni@typo3.org',
	'author_company' => '',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'realurl' => '1.0.0-1.99.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => '',
);

?>