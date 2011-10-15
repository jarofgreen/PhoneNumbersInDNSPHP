<?php
/**
 * @license BSD License
 */

if (!isset($argv[1]) || !trim($argv[1])) die("You seen not to have passed anything!\n");

require 'PhoneNumbersInDNS.php';

$data = getPhoneNumbersFromDNS($argv[1]);

foreach($data as $d) {
	print "Name: ".$d['name']."\n";
	print "Number: (+".$d['country'].") ".$d['number']."\n\n";
}