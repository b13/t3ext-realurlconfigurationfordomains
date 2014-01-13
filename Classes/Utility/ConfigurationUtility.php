<?php

namespace B13\Realurlconfigurationfordomains\Utility;

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
 * Functionality to show available configurations
 * within FormEngine in the backend field
 */
class ConfigurationUtility {


	/**
	 * List all possible configurations for sys_domain records
	 * interesting:
	 *    - $params['row'] => current DB record
	 *    - $params['items'] => items to show
	 *
	 * @param	array	$params	an array containing all information for this record
	 * @param	t3lib_TCEforms	$pObj the parent object that calls this itemprocfunc
	 * @return	void	No return - the $params and $pObj variables are passed by reference so just change content in then and it is passed back automatically...
	 */
	public function addExistingRealurlConfigurationsForFormEngine(&$params, &$pObj) {
		$params['items'][] = array(' -- none --', '');
		$params['items'][] = array('Default Configuration', '_DEFAULT');
		if (isset($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'])) {
			$availableOptions = array_keys($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl']);
			foreach ($availableOptions as $option) {
				if ($option == '_DEFAULT' || $option == '_DOMAIN') {
					continue;
				}
				$params['items'][] = array($option, $option);
			}
		}
	}
}
