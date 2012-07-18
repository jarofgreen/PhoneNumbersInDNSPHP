<?php
/**
 * See README.TXT for more.
 * @license BSD License
 */

/**
 * Pass in domain, get array of data.
 * @param String $domainName
 * @return Array
 */
function getPhoneNumbersFromDNS($domainName) {
	$data = dns_get_record($domainName, DNS_TXT);
	if (!$data) {
		throw new Exception('No records returned');
	}
	$out = array();
	foreach($data as $d) {
		$o = getPhoneNumberFromDNSTextString($d['txt']);
		if ($o) $out[] = $o;
	}
	return $out;
}


/**
 * Takes a TXT record from DNS and returns an array of data or null.
 * Seperate funciton for testing purposes.
 * @param String $TXTString
 * @return Array
 */
function getPhoneNumberFromDNSTextString($TXTString) {
	if (strtolower(substr($TXTString,0,9)) == 'v=phone1 ') {
		$bits = explode(' ', $TXTString, 4);
		// we can't use filter_var($bits[1],FILTER_VALIDATE_INT) because on 32 bit systems the range is not big enought for most phone numbers!
		if (count($bits) > 2 && ctype_digit($bits[1]) && ctype_digit($bits[2])) {
			return array(
					'country'=>$bits[1],
					'number'=>$bits[2],
					'name'=>(count($bits) == 4 && trim($bits[3]) ? $bits[3] : $bits[2])
				);
		}
	}
	return null;
}

