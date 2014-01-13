TYPO3 Extension: realurlconfigurationfordomains
===============================================

Choose an existing RealURL configuration for sys_domains via the TYPO3 Backend.

Introduction
------------
If you have a TYPO3 installation with a lot of sys_domain records and
RealURL for these domains, you'll notice that you often have a 
similar configuration for domains, except that you need to change
the rootpage_id flag. Everytime an editor is working with domains in
TYPO3 (moving a domain within the page tree, adding a new domain),
the integrator must modify the realurl configuration as well. The
extension offers a way to choose a pre-defined domain configuration
in "typo3conf/realurlconf.php".

Installation
------------
Install the extension via the extension manager. A new DB field is
added to all sys_domain records and editable via TCEforms.

Make sure to have a default configuration in your RealURL
configuration, or even multiple ones defined like you've
done before. You can even define more specific names using the key 
of the array as a name.

Once the frontend is loaded, the extension checks if there
are any sys_domain records where an editor has chosen to use an
existing configuration. The extension then sets an entry in the
RealURL configuration dynamically to the existing configuration and
sets the PID of the sys_domain record as rootpage_id option.

Downsides
---------
The extension was written for a special use-case with dozens of
domain records that editors can change and add, while not having
to modifying the source-code (where realurlconf.php belongs to).
There might be some downsides for your use-case:

 * The functionality is currently only added via a FE hook, and only if the database was initialized before. This might be a problem when you create links in the backend (e.g. with the extension "pagepath"), or if you use eID functionality and you create links in it. Also, RealURL itself will not know about these "automatic" configurations in 
 * Please keep in mind, that this will add one more DB SELECT query in every frontend request, regardless of the page is cached or not.


Notes
-----
 * Extension Key: realurlconfigurationfordomains
 * Author: Benjamin Mack
 * Supported TYPO3 versions: TYPO3 6.0 or later
