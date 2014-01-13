<?php

namespace B13\Realurlconfigurationfordomains\Hooks;

/***************************************************************
 *  Copyright notice - MIT License (MIT)
 *
 *  (c) 2014 b:dreizehn GmbH,
 * 		Benjamin Mack <benjamin.mack@b13.de>
 *  All rights reserved
 *
 *  Permission is hereby granted, free of charge, to any person obtaining a copy
 *  of this software and associated documentation files (the "Software"), to deal
 *  in the Software without restriction, including without limitation the rights
 *  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 *  copies of the Software, and to permit persons to whom the Software is
 *  furnished to do so, subject to the following conditions:
 *
 *  The above copyright notice and this permission notice shall be included in
 *  all copies or substantial portions of the Software.
 *
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 *  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 *  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 *  THE SOFTWARE.
 ***************************************************************/

/**
 * Various hooks for the frontend
 */
class FrontendHooks {

	/**
	 * hook to call after the DB connection has been established
	 * @param $params
	 * @param $pObj
	 */
	public function addDynamicDomainConfigurations($params, $pObj) {
			// do a SQL query to find all domains that have a configuration shown
		if (isset($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl']) && $GLOBALS['TYPO3_DB']) {
			$domainRecords = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows(
				'domainName, pid, tx_realurlconfigurationfordomains_useconfig',
				'sys_domain',
				'tx_realurlconfigurationfordomains_useconfig!="" AND hidden=0 AND redirectTo=""'
			);
			if (is_array($domainRecords)) {
				foreach ($domainRecords as $domainRecord) {
					if (!isset($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'][$domainRecord['domainName']]) && isset($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'][$domainRecord['tx_realurlconfigurationfordomains_useconfig']])) {
						$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'][$domainRecord['domainName']] = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'][$domainRecord['tx_realurlconfigurationfordomains_useconfig']];
						$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'][$domainRecord['domainName']]['pagePath']['rootpage_id'] = $domainRecord['pid'];
					}
				}
			}
		}
	}
}
